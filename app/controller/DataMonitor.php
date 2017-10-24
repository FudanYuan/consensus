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
    public $exportCols = ['id','theme_3_id','media_id','task_id','title','content','digest',
        'source','userID','media_type','nature','url','relevance','publishtime','similar_num','is_collect','is_warn','status','createtime', 'updatetime'];
    public $colsText = ['序号', '三级主题', '媒体id','任务编号','标题','内容','概述','来源','用户ID','媒体类型','舆情属性','网址','关联度','发表时间','相似文章数','是否收藏','是否预警'];

    /**
     * 数据总览
     * @return \think\response\View
     */
    public function index(){
        return view('', []);
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
            $order = ['relevance desc'];
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
            $cond_or['digest'] =['like','%'.$keywords.'%'];
            $cond_or['userID'] =['like','%'.$keywords.'%'];
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
        $ret = ['errorcode' => 0, 'data' => [], 'params' => $params, 'msg' => ""];
        $list = D('DataMonitor')->publicList($cond_or,$cond_and,$order,-1);
        $ret['data'] = $list;
        $this->jsonReturn($ret);
    }
    /**
     * 获取收藏舆情
     */
    public function getCollectList(){
        $params = input('post.');
        $relevance = input('post.relevance', -1);
        $nature = input('post.nature',-1);
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
            $order = ['relevance desc'];
        }
        if($keywords){
            $cond_or['title'] = ['like','%'.$keywords.'%'];
            $cond_or['content'] = ['like','%'.$keywords.'%'];
            $cond_or['source'] = ['like','%'.$keywords.'%'];
            $cond_or['media_type'] = ['like','%'.$keywords.'%'];
            $cond_or['nature']  = ['like','%'.$keywords.'%'];
            $cond_or['url'] =['like','%'.$keywords.'%'];
            $cond_or['digest'] =['like','%'.$keywords.'%'];
            $cond_or['userID'] =['like','%'.$keywords.'%'];
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
        $ret = ['errorcode' => 0, 'data' => [], 'params' => $params, 'msg' => ""];
        $cond_and['is_collect'] = ['=',1];
        $list = D('DataMonitor')->publicList($cond_or,$cond_and,$order,-1);
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
     * 数据导出
     */
    public function export(){
        $list = D('DataMonitor')->getListExport();
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

    /**
     * 编辑舆情，人工研判
     */
    public function edit(){
        $params = input('post.');
        $id = input('post.id', -1);
        $nature = input('post.nature', '');
        $relevance = input('post.relevance', '');
        $ret = ['errorcode' => 0, 'msg' => '修改成功','nature' =>$nature,'relevance'=>$relevance];
        // 编辑逻辑
        if($id != '-1'){
            // 修改成功，msg为 '编辑成功'，否则 '编辑失败'
            $data = D('DataMonitor')->getDataById($id);
            if($nature){
                $data['nature'] = $nature;
            }
            if($relevance){
                $data['relevance'] = $relevance;
            }
            D('DataMonitor')->saveData($data,$id);
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


    /**
     * 获取预警关键词列表
     */
    public function getKeywordsConfig(){
        $ret = ['errorcode' => 0, 'msg' => ''];
        // 查询结果，
        // 逻辑： 先判断关键词预警是否开启，若开启，获取关键词列表，否则返回数据为空
        $ret['switch'] = 1;
        $list = ['测试1', '测试2', '测试3', '测试4', '测试5', '测试6'];
        $ret['nature'] = ['正面' => 1, '中立' => 1, '负面' => 1];
        $ret['media'] = ['微信' => 1, '新闻' => 0, '微博' => 1];
        $ret['keywords'] = $list;
        $this->jsonReturn($ret);
    }

    /**
     * 保存关键词配置
     */
    public function setKeywordsConfig(){
        $params = input('post.');
        /**
         * 参数说明：
         * keywordsSwitch boolean
         * keywords array      |
         * # nature array      | ==> 此三项的元素均为字符串
         * # media array       |
         * 加 '#' 的三项要注意，需要将其构造为下面这种格式：
         * nature： ['正面' => 1, '中立' => 1, '负面' => 1];
         * media：['微信' => 1, '新闻' => 0, '微博' => 1];
         * 对于nature来说比较简单，但对于media，就要读取media数据表读取所有的媒体类型，
         * 然后根据传入的数据构造如上数据。
         *
         * 注：要对参数进行检测，返回error信息，
         * keywords 不能为空，
         * nature 至少选择一项
         * media 至少选择一项
         * $ret['error'], 例如$ret['error'] = ['keywords' => '关键词不能为空']
         */
        $keywordsSwitch = $params['keywordsSwitch'];
        if(!isset($params['keywords'])){
            $keywords = [];
        } else {
            $keywords = $params['keywords'];
        }
        if(!isset($params['nature'])){
            $nature = [];
        } else {
            $nature = $params['nature'];
        }
        if(!isset($params['media'])){
            $media = [];
        } else {
            $media = $params['media'];
        }
        $ret = ['errorcode' => 0, 'msg' => ''];
        // 更新预警设置逻辑
        // code here

        $this->jsonReturn($ret);
    }


    /**
     * 获取警戒线配置
     */
    public function getThresholdConfig(){
        /**
         * status: 1 预警中； 2 关闭； 3 删除
         */
        $ret = ['errorcode' => 0, 'msg' => ''];
        // 查询结果
        $list = [];
        $list[0] = ['id' => 1, 'task' => '生态环境', 'dayAllCount' => 10, 'dayNegativeCount' => 10, 'status' => 1];
        $list[1] = ['id' => 2, 'task' => '生态环境', 'dayAllCount' => 10, 'dayNegativeCount' => 10, 'status' => 1];
        $list[2] = ['id' => 3, 'task' => '生态环境', 'dayAllCount' => 10, 'dayNegativeCount' => 10, 'status' => 2];
        $ret['list'] = $list;
        // 任务列表
        $ret['tasks'] = ['测试1', '生态环境', '测试3', '测试4', '测试5', '测试6'];
        $this->jsonReturn($ret);
    }

    /**
     * 删除警戒线预警
     */
    public function removeThresholdConfig(){
        $ret = ['code' => 1, 'msg' => '删除成功'];
        $ids = input('post.ids');
        try{
            // 重写/model/DataMonitor的remove函数即可
            // $res = D('DataMonitor')->remove(['id' => ['in', $ids]]);
        }catch(MyException $e){
            $ret['code'] = 2;
            $ret['msg'] = '删除失败';
        }
        $this->jsonReturn($ret);
    }


    /**
     * 保存关键词配置
     */
    public function createThresholdConfig(){
        /**
         * 参数默认：
         * task ''
         * dayAllCount -1
         * dayNegativeCount -1
         * 参数过滤：
         * task '' 请选择类目名称
         * dayAllCount -1 请设置每日舆情总量
         * dayNegativeCount -1 请设置每日负面舆情
         */
        $params = input('post.');
        $task = input('post.task', '');
        $dayAllCount = input('post.dayAllCount', -1);
        $dayNegativeCount = input('post.dayNegativeCount', -1);
        $ret = ['errorcode' => 0, 'msg' => ''];
        // 添加预警设置逻辑
        // code here

        $this->jsonReturn($ret);
    }

    /**
     * 编辑警戒线预警配置
     */
    public function saveThresholdConfig(){
        /**
         * 参数默认：
         * dayAllCount -1
         * dayNegativeCount -1
         * 参数过滤：
         * dayAllCount -1 请设置每日舆情总量
         * dayNegativeCount -1 请设置每日负面舆情
         */
        $params = input('post.');
        $id = input('post.id');
        $status = input('post.status');
        $task = input('post.task', '');
        $dayAllCount = input('post.dayAllCount', -1);
        $dayNegativeCount = input('post.dayNegativeCount', -1);
        $ret = ['errorcode' => 0, 'msg' => ''];
        // 编辑预警设置逻辑
        // code here

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

}
