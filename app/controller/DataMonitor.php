<?php
/**
 * 舆情--控制器
 * Created by PhpStorm.
 * User: acer-pc
 * Date: 2017/10/5
 * Time: 0:45
 */
namespace app\controller;

class DataMonitor extends Common{
    public $exportCols = ['id','theme_3_id','websitetype_id','task_id','title','content',
        'source','media_type','nature','url','relevance','time','status','createtime', 'updatetime'];
    public $colsText = ['序号', '三级主题', '网站类型','任务编号','标题','内容','来源'];

    /**
     * 数据总览
     * @return \think\response\View
     */
    public function index(){
        $params = input('post.');
        $theme_list = D('Theme')->getT3List_data();
        $ret = ['theme_list' => $theme_list, 'list' => [],'params' => $params];
        return view('', $ret);
    }

    /**
     * 数据列表
     */
    public function info(){
        $params = input('get.');
        $c_name = input('get.c_name', '');
        $theme2_id = input('get.theme_id',-1);
        $theme_3_id = input('get.theme_3_id',-1);
        $tag_id = input('get.tag_id',-1);
        $keywords = input('get.keywords', '');
        $order = input('get.sortCol', 'a.id');
        $stime = input('get.begintime_str', '');
        $etime = input('get.endtime_str', '');
        $cond_and = [];
        $cond_or = [];
        if(!$order) {
            $params['sortCol'] = 'a.id asc';
        }
        if($c_name){
            $cond_and['b.name'] = ['like','%'.$c_name.'%'];
        }
        if($keywords){
            $cond_or['b.name'] = ['like','%'.$keywords.'%'];
            $cond_or['c.name'] = ['like','%'.$keywords.'%'];
            $cond_or['d.name'] = ['like','%'.$keywords.'%'];
            $cond_or['e.name'] = ['like','%'.$keywords.'%'];
            $cond_or['a.url']  = ['like','%'.$keywords.'%'];
            $cond_or['a.event'] =['like','%'.$keywords.'%'];
        }
        if($theme2_id != -1){
            $theme3_list = D('Theme')->getT3ByT2id($theme2_id);
            $theme3_ids = [];
            for($i = 0; $i < count($theme3_list); $i++){
                array_push($theme3_ids, $theme3_list[$i]['t3_id']);
            }
            $cond_and['c.id'] = ['in', $theme3_ids];
        }
        if($theme_3_id != -1){
            unset($cond_and['c.id']);
            $cond_and['a.id'] = ['=', $theme_3_id];
        }

        if($tag_id != -1){
            $cond = D('Tag')->getCompanyTag($tag_id);
            $cond_and = array_merge($cond_and,$cond);
        }

        if($stime && $etime){
            $cond_and['a.createtime'] = ['between', [strtotime($stime), strtotime($etime)]];
        }
        else if(!$stime && $etime){
            $cond_and['a.createtime'] = ['between', [0, strtotime($etime)]];
        }
        else if($stime && !$etime){
            $cond_and['a.createtime'] = ['between', [strtotime($stime), time()]];
        }

        $tags = D('Tag')->getList(['section' => 5]);
        $data = D('DataMonitor')->getDataCondition($cond_or,$cond_and,$order);

        $theme_list = D('Theme')->getT1List([],[],[]);
        $cond = [];
        for($i = 0; $i < count($theme_list); $i++){
            $cond['b.id'] = ['=',$theme_list[$i]['t1_id']];
            $theme_2_list = D('Theme')->getT2List([],$cond,[]);
            $theme_list[$i]['t1_content'] = $theme_2_list;
        }

        $ret = ['theme_list' => $theme_list, 'list' => $data, 'tags' => $tags,'cond' => $params];
        return view('', $ret);
    }

    /**
     *  我的收藏
     * @return \think\response\View
     */
    public function collect(){
        return view('', []);
    }

    /**
     * 舆情预警
     * @return \think\response\View
     */
    public function warn(){
        return view('', []);
    }

    /**
     * 舆情设置
     * @return \think\response\View
     */
    public function warn_config(){
        return view('', []);
    }


    /**
     * 获取全部舆情
     */
    public function getPublicList(){
        $params = input('post.');
        $relevance = input('post.relevance', -1);
        $nature = input('post.nature',-1);
        $area = input('post.area',-1);
        $media_type = input('post.media_type',-1);
        $keywords = input('post.keywords', '');
        $stime = input('post.begintime_str', '');
        $etime = input('post.endtime_str', '');
        $order = input('post.sortCol', 'time');
        $cond_and = [];
        $cond_or = [];
        if($nature != -1){
            if($nature == 0){
                $nature_select = '正面';
            }else if($nature == 1){
                $nature_select = '中立';
            }else{
                $nature_select = '负面';
            }
            $cond_and['nature'] = ['=', $nature_select];
        }

        if($relevance != -1){
            $cond_and['relevance'] = ['=', $relevance];
        }

        if($area!=-1){
            $cond_and['area'] = ['=',$area];
        }
        if($media_type != -1){
            $cond_and['media_type'] = ['=',$media_type];
        }
        if($keywords){
            $cond_or['title'] = ['like','%'.$keywords.'%'];
            $cond_or['content'] = ['like','%'.$keywords.'%'];
            $cond_or['source'] = ['like','%'.$keywords.'%'];
            $cond_or['media_type'] = ['like','%'.$keywords.'%'];
            $cond_or['nature']  = ['like','%'.$keywords.'%'];
            $cond_or['url'] =['like','%'.$keywords.'%'];
        }
        if($stime && $etime){
            $cond_and['time'] = ['between', [strtotime($stime), strtotime($etime)]];
        }
        else if(!$stime && $etime){
            $cond_and['time'] = ['between', [0, strtotime($etime)]];
        }
        else if($stime && !$etime){
            $cond_and['time'] = ['between', [strtotime($stime), time()]];
        }


        $ret = ['errorcode' => 0, 'data' => [], 'params' => $params, 'msg' => "",'keywords' =>$keywords];
        $list = [];
        //$list = D('DataMonitor')->publicList($cond_or,$cond_and,$order);
        $list[1] =['id' => 4, 'title' => '测试测试测试测试测试测试测试测试测试1', 'source' => '测试', 'url' => 'http://weibo.com/login.php', 'media_type' => '测试', 'nature' => '测试', 'publishtime' => 1507120988, 'similar_num' => 2, 'relevance' => 1, 'is_collect' => 1];
        $list[2] =['id' => 5, 'title' => '测试测试测试测试测试测试测试测试测试2', 'source' => '测试', 'url' => 'http://weibo.com/login.php', 'media_type' => '测试', 'nature' => '测试', 'publishtime' => 1507120988, 'similar_num' => 2, 'relevance' => 2, 'is_collect' => 0];
        $list[3] =['id' => 6, 'title' => '测试测试测试测试测试测试测试测试测试3', 'source' => '测试', 'url' => 'http://weibo.com/login.php', 'media_type' => '测试', 'nature' => '测试', 'publishtime' => 1466248396, 'similar_num' => 2, 'relevance' => 3, 'is_collect' => 1];
        $ret['data'] = $list;
        $this->jsonReturn($ret);
    }

    /**
     * 取消／收藏舆情
     */
    public function doCollect(){
        $params = input('post.');
        $id = input('post.id', -1);
        $isCollected = input('post.is_collect');
        $ret = ['errorcode' => 0, 'msg' => '','id' => $id,'isCollected' => $isCollected];
        // 收藏逻辑
        if($id != '-1'){
            $data = D('DataMonitor')->getDataById($id);
            if(!empty($data)) {
                if ($isCollected == 1) {
                    $data['is_collect'] = 0;
                } else {
                    $data['is_collect'] = 1;
                }
                $ret['data'] = $data;
                D('DataMonitor')->saveData($data, $id);
            }
        }
        $this->jsonReturn($ret);
    }

    /**
     * 编辑舆情，人工研判
     */
    public function edit(){
        $params = input('post.');
        $id = input('post.id', -1);
        $nature = input('post.nature', '');
        $relevance = input('post.relevance', '');
        $ret = ['errorcode' => 0, 'msg' => ''];
        // 编辑逻辑
        if($id != '-1'){
            // 修改成功，msg为 '编辑成功'，否则 '编辑失败'
        }
        $this->jsonReturn($ret);
    }

    /**
     * 删除舆情
     */
    public function remove(){
        $ret = ['code' => 1, 'msg' => '成功'];
        $ids = input('get.ids');
        try{
            // 重写/model/DataMonitor的remove函数即可
            $res = D('DataMonitor')->remove(['id' => ['in', $ids]]);
        }catch(MyException $e){
            $ret['code'] = 2;
            $ret['msg'] = '删除失败';
        }
        $this->jsonReturn($ret);
    }


    ///////////// 未修改 ///////////
    /**
     * 获取数据量
     */
    public function datamonitor_Number(){
        $data_number = D('DataMonitor')->getDataNumber();
        return view('',['data_count' => $data_number]);
    }

    /**
     * 添加数据
     */
    public function datamonitor_create(){
        $data = input('post.');
        if (!empty($data)) {
            $res = D('DataMonitor')->addData($data);
            if (!empty($res['errors'])) {
                return view('', ['errors' => $res['errors'], 'data' => $data]);
            } else {
                $url = PRO_PATH . '/DataMonitor/index';
                return "<script>window.location.href='" . $url . "'</script>";
            }
        }
    }

    /**
     * 编辑数据信息
     */
    public function datamonitor_edit(){
        $id = input('get.id');
        $data = input('post.');
        if (!empty($data)) {
            $res = D('DataMonitor')->saveData($id, $data);
            if (!empty($res['errors'])) {
                return view('', ['errors' => $res['errors'], 'data' => $data]);
            } else {
                $url = PRO_PATH . '/DataMonitor/index';
                return "<script>window.location.href='" . $url . "'</script>";
            }
        } else {
            $data = D('DataMonitor')->getById($id);
            return view('', ['errors' => [], 'data' => $data]);
        }
    }

    /**
     * 数据气泡图
     */
    public function  getBubbleData(){
        $data = input('get.');
        $ret = ['errorcode' => 0, 'data' => [], 'msg' => ''];
        if(empty($data['begintime_str'])||(isset($data['begintime_str']) && !$data['begintime_str'])){
            $begin_time = 0;
        }else{
            $begin_time = strtotime($data['begintime_str']);
        }
        if(empty($data['endtime_str'])||(isset($data['endtime_str']) && !$data['endtime_str'])){
            $end_time = time();
        }else{
            $end_time = strtotime($data['endtime_str']);
        }
        if(empty($data['bubble_num_limit'])||(isset($data['bubble_num_limit']) && !$data['bubble_num_limit'])){
            $limit = D('DataMonitor')->getDataNumber();
        }else {
            if ($data['bubble_num_limit'] == -1) {
                $limit = D('DataMonitor')->getDataNumber();
            } else {
                $limit = $data['bubble_num_limit'];
            }
        }
        $cond = "$begin_time < a.createtime and a.createtime < $end_time";
        $list = D('DataMonitor')->getBubbleData([],$cond,$limit);
        $ret['data'] = $list;
        $this->jsonReturn($ret);
    }

    /**
     * 数据柱状图
     */
    public function getBarData(){
        $data = input('get.');
        $ret = ['errorcode' => 0, 'data' => [], 'msg' => ''];
        $list = D('DataMonitor')->getBarData($data);
        $ret['data'] = $list;
        $this->jsonReturn($ret);
    }


    /**
     * 数据删除
     */
    public function datamonitor_remove(){
        $ret = ['code' => 1, 'msg' => '成功'];
        $ids = input('get.ids');
        try {
            $res = D('DataMonitor')->remove(['id' => ['in', $ids]]);
        } catch (MyException $e) {
            $ret['code'] = 2;
            $ret['msg'] = '删除失败';
        }
        $this->jsonReturn($ret);
    }

    /**
     * 统计网站类型与主题的关系
     */
    public function websiteThemePie(){
        $data = input('get.');
        $ret = ['errorcode' => 0, 'data' => [], 'msg' => ''];
        $list = D('DataMonitor')->getTypePie($data);
        $ret['data'] = $list;
        $this->jsonReturn($ret);
    }

    /**
     * 数据导出
     */
    public function export(){
        $cond_or = [];
        $cond_and = [];
        $order = [];
        $list = D('DataMonitor')->getDataCondition([],[],[],-1);
        $data = [];
        // 匹配键值
        array_push($data, $this->exportCols);
        foreach ($list as $value) {
            $temp = [];
            foreach ($this->exportCols as $key => $k){
                array_push($temp, $value[$k]);
            }
            array_push($data, $temp);
        }
        D('Excel')->export($data, 'dataMonitor.xls');
    }
}
