<?php
/**
 * 任务--控制器
 * author：yzs
 * create：2017.8.15
 */
namespace app\controller;

use app\model\MyException;

class Task extends Common{

    /**
     * 任务首页
     * @return \think\response\View
     */
    public function index(){
        return view('', []);
    }

    /**
     * 任务详情
     * @return \think\response\View
     */
    public function info(){
        $id = input('get.id');
        return view('', ['id' => $id]);
    }

    /**
     * 获取任务列表
     */
    public function getTaskList(){
        $params = input('post.');
        $ret = ['error_code' => 0, 'msg' => '成功'];
        if(empty($params)){
            $list = D('Task')->getTaskList([],[],'create_time desc');
            if(!count($list)){
                $ret["error_code"] = 1;
                $ret["msg"] = '暂无任务';
                $this->jsonReturn($ret);
            }
            $ret["data"] = $list;
            $this->jsonReturn($ret);
        }
        $task_name = input('post.name','');
        $taskStatus = input('post.task_status',-1);
        $order = input('post.sortCol', 'create_time desc');
        $page = input('post.current_page',0);
        $per_page = input('post.per_page',0);
        $cond_and = [];
        $cond_or = [];
        if($task_name){
            $cond_and['name'] = $task_name;
        }
        if($taskStatus!=-1){
            $cond_and['task_status'] = $taskStatus;
        }
        $list = D('Task')->getTaskList($cond_or,$cond_and,$order);
        for($i=0;$i<count($list);$i++){
            $curTime = time();
            $beginTime = $list[$i]['begin_time'];
            $preTime = $list[$i]['time_predict'];
            $time = $curTime - $beginTime;//计算已耗时间
            if($time < 0){
                $time = 0;
            }
            ///未修改////
            /// 采集进度条逻辑////
            if($curTime>($beginTime+$preTime)){
                $progress = 100;
            }else if($curTime<$beginTime){
                $progress = 0;
            }else{
                if($time>0){
                    $progress =($time/$preTime)*100;
                }else{
                    $progress = 100;
                }
            }
            $list[$i]['time_predict'] = round($preTime/3600,1);
            $list[$i]['progress'] =round($progress,2);
            $list[$i]['time'] = round($time/3600, 1);
            $list[$i]['count'] = number_format($list[$i]['count']);
        }

        //分页时需要获取记录总数，键值为 total
        $ret["total"] = count($list);
        //根据传递过来的分页偏移量和分页量截取模拟分页 rows 可以根据前端的 dataField 来设置
        $ret["data"] = array_slice($list, ($page-1)*$per_page, $per_page);
        $ret['current_page'] = $page;
        $log['user_id'] = $this->getUserId();
        $log['IP'] = $this->getUserIp();
        $log['section'] = '舆情采集';
        $log['action_descr'] = '用户查看采集列表';
        D('operationLog')->addData($log);
        $this->jsonReturn($ret);
    }

    /**
     * 获取任务详情
     */
    public function getTaskInfo(){
        $id = input('post.id');
        $ret = ['error_code' => 0, 'msg' => '保存成功'];

        $select =['id, name, `loop`, match_accuracy,
        match_type, necessary_keywords, unnecessary_keywords, begin_time'];
        $info = D('Task')->getById($select, $id);

        $select_theme =['c.id as theme_2_id,
        c.name as theme_2_name,
        d.id as theme_1_id,
        d.name as theme_1_name'];

        $theme_info = D('Task')->getThemeById($select_theme, $id);

        $select_media =['f.id as media_type_id,
        f.name as media_type_name'];
        $media_type_info = D('Task')->getMediaById($select_media, $id);
        $ret['info'] = $info;
        $ret['theme'] = $theme_info;
        $ret['media_type'] = $media_type_info;
        $this->jsonReturn($ret);
    }

    /**
     * 新建
     */
    public function create(){
        $data = input('post.');
        $theme_list = D('Theme')->getT1List([],[],[]);
        for($i = 0; $i < count($theme_list); $i++){
            $cond['b.id'] = ['=',$theme_list[$i]['t1_id']];
            $theme_2_list = D('Theme')->getT2List([],$cond,[]);
            $theme_list[$i]['t1_content'] = $theme_2_list;
        }
        $media_type_list = D('MediaType')->getMedTypeList();
        if(!empty($data)) {
            $ret = ['error_code' => 0, 'msg' => '成功'];
            if (!isset($data['theme'])) {
                $data['theme'] = [];
            }
            if (!isset($data['media_type'])) {
                $data['media_type'] = [];
            }

            $theme = $data['theme'];
            $theme_2_ids = implode(',', $theme);
            $theme_3_ids = D('Theme')->getT3ByT2(['b.id' => ['in', $theme_2_ids]]);
            $data['theme'] = [];
            for($i=0;$i<count($theme_3_ids);$i++){
                array_push($data['theme'], $theme_3_ids[$i]['t3_id']);
            }

            // 添加task
            $res = D('Task')->addData($data);

            if (!empty($res['errors'])) {
                $ret['error_code'] = 1;
                $ret['msg'] = '新建失败';
                $ret['errors'] = $res['errors'];
            } else {
                $log['user_id'] = $this->getUserId();
                $log['IP'] = $this->getUserIp();
                $log['section'] = '舆情采集';
                $log['action_descr'] = '用户新建采集任务 #' . $data['name'];
                D('operationLog')->addData($log);
            }
            $this->jsonReturn($ret);
        }
        return view('', ['theme_list' => $theme_list, 'media_type_list' => $media_type_list]);
    }

    /**
     * 编辑
     */
    public function edit(){
        $id = input('get.id');
        $theme_list = D('Theme')->getT1List([],[],[]);
        for($i = 0; $i < count($theme_list); $i++){
            $cond['b.id'] = ['=',$theme_list[$i]['t1_id']];
            $theme_2_list = D('Theme')->getT2List([],$cond,[]);
            $theme_list[$i]['t1_content'] = $theme_2_list;
        }
        $media_type_list = D('MediaType')->getMedTypeList();
        $data = input('post.');
        if(!empty($data)) {
            $ret = ['error_code' => 0, 'msg' => '保存成功'];
            $task_id = $data['id'];
            if (!isset($data['theme'])) {
                $data['theme'] = [];
            }
            if (!isset($data['media_type'])) {
                $data['media_type'] = [];
            }
            $theme = $data['theme'];
            $theme_2_ids = implode(',', $theme);
            $theme_3_ids = D('Theme')->getT3ByT2(['b.id' => ['in', $theme_2_ids]]);
            $data['theme'] = [];
            for($i=0;$i<count($theme_3_ids);$i++){
                array_push($data['theme'], $theme_3_ids[$i]['t3_id']);
            }

            $res = D('Task')->saveData($task_id, $data);
            if(!empty($res['errors'])){
                $ret['error_code'] = 1;
                $ret['errors'] = $res['errors'];
                $ret['msg'] = '保存失败';
            } else {
                $log['user_id'] = $this->getUserId();
                $log['IP'] = $this->getUserIp();
                $log['section'] = '舆情采集';
                $log['action_descr'] = '用户编辑采集任务 #' . $task_id;
                D('operationLog')->addData($log);
            }
            $this->jsonReturn($ret);
        }
        return view('', ['id' => $id, 'theme_list' => $theme_list, 'media_type_list' => $media_type_list]);
    }

    /**
     * 删除
     */
    public function remove(){
        $ret = ['error_code' => 0, 'msg' => '删除成功'];
        $ids = input('post.ids');
        try{
            D('Task')->remove(['id' => ['in', $ids]]);
        }catch(MyException $e){
            $ret['error_code'] = 1;
            $ret['msg'] = '删除失败';
        }
        $this->jsonReturn($ret);
    }

    /**
     * 操作task
     * 1-暂停
     * 2-终止
     * 3-开始/继续
     */
    public function operate(){
        $ret = ['error_code' => 0, 'msg' => '操作成功'];
        $ids = input('post.ids');
        $task_status = input('post.task_status');
        $task_status_str = '';
        switch ($task_status){
            case 1: {
                $task_status_str = '暂停';
                break;
            }
            case 2: {
                $task_status_str = '终止';
                break;
            }
            case 3: {
                $task_status_str = '开始/继续';
                break;
            }
        }
        try{
            $data['task_status'] = $task_status;
            D('Task')->operate($data, ['id' => ['in', $ids]]);
            $log['user_id'] = $this->getUserId();
            $log['IP'] = $this->getUserIp();
            $log['section'] = '舆情采集';
            $log['action_descr'] = '用户'. $task_status_str .'采集任务 #' . $ids;
            D('operationLog')->addData($log);
        }catch(MyException $e){
            $ret['error_code'] = 1;
            $ret['msg'] = '操作失败';
        }
        $this->jsonReturn($ret);
    }
}
?>