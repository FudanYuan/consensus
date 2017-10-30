<?php
/**
 * 数据分析--控制器
 * Created by shiren.
 * time 2017.10.19
 */
namespace app\controller;

class DataAnalysis extends Common
{
    public $exportCols = [];
    public $colsText = [];

    /**
     * 舆情概况
     * @return \think\response\View
     */
    public function index(){
        $params = input('get.');
        return view('', []);
    }

    /**
     * 趋势分析
     * @return \think\response\View
     */
    public function trend(){
        return view('', []);
    }

    /**
     * 搜索词分析
     * @return \think\response\View
     */
    public function searchwords(){
        return view('', []);
    }

    /**
     * 观点分析
     * @return \think\response\View
     */
    public function opinion(){
        return view('', []);
    }

    /**
     * 媒体分析
     * @return \think\response\View
     */
    public function media(){
        return view('', []);
    }

    /**
     * 传播分析
     * @return \think\response\View
     */
    public function spread(){
        return view('', []);
    }

    /**
     * 受众分析
     * @return \think\response\View
     */
    public function audience(){
        return view('', []);
    }

    /**
     * 事件分析
     * @return \think\response\View
     */
    public function event(){
        return view('', []);
    }

    /**
     * 获取舆情概况
     */
    public function getAnalysisIndex(){
        $params = input('post.');
        $task_id = input('post.task_id', -1);
        $ret = ['errorcode' => 0,'data' => [], 'msg' => ''];
        $cond = [];
        if($task_id == -1){
            $task_id = 3; //这里为测试，实际上要获取task表中最后一条有效数据的id
        }
        $ret['task_id'] = $task_id;
        $index = [];
        $index[0] = ['count' => 12219, 'search' => 1123, 'weibo' => 1212, 'note' => 1999, 'news' => 1231];
        $index[1] = ['count' => 12219, 'search' => 1123, 'weibo' => 1212, 'note' => 1999, 'news' => 1231];
        $index[2] = ['count' => 12219, 'search' => 1123, 'weibo' => 1212, 'note' => 1999, 'news' => 1231];
        $ret['index'] = $index;

        $nature = [];
        $nature[0] = ['name' => '正面', 'value' => 12000];
        $nature[1] = ['name' => '中立', 'value' => 1200];
        $nature[2] = ['name' => '负面', 'value' => 2000];
        $ret['nature'] = $nature;

        $events = [];
        $events[0] = ['id' => 1, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[1] = ['id' => 2, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[2] = ['id' => 3, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[3] = ['id' => 4, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[4] = ['id' => 5, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[5] = ['id' => 6, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[6] = ['id' => 7, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[7] = ['id' => 8, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[8] = ['id' => 9, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $events[9] = ['id' => 10, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $ret['event'] = $events;
        $this->jsonReturn($ret);
    }

    /**
     * 获取舆情内容
     */
    public function getPublicList(){
        $params = input('post.');
        $task_id = input('post.task_id', -1);
        $nature = input('post.nature', 0);
        $ret = ['errorcode' => 0,'data' => [], 'msg' => ''];
        $cond = [];
        if($task_id == -1){
            $task_id = 3; //这里为测试，实际上要获取task表中最后一条有效数据的id
        }
        if($nature == 1){
            $cond['nature'] = ['=', '负面'];
        }

        // 查找逻辑， 未实现

        // 测试数据
        $public = [];
        $public[0] = ['id'=>1, 'title'=>'测试测试测试测试测试测试测试测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[1] = ['id'=>2, 'title'=>'测试测试测试测试测试测试测试测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[2] = ['id'=>3, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[3] = ['id'=>4, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[4] = ['id'=>5, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[5] = ['id'=>6, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[6] = ['id'=>7, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[7] = ['id'=>8, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[8] = ['id'=>9, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];
        $public[9] = ['id'=>10, 'title'=>'测试测试测试测试测试测试测试','nature'=>'正面', 'media_type'=>'微博', 'publishtime' => 289989228];

        $ret['data'] = $public;
        $this->jsonReturn($ret);
    }

    /**
     * 获取舆情趋势图
     */
    public function getTrendLine(){
        $params = input('post.');
        $task_id = input('post.task_id', -1);
        $timeRange = input('post.timeRange', 0);
        /**
         * timeRange: 0->最近24小时
         *            1->最近7天
         *            2->最近30天
         */
        $ret = ['errorcode' => 0,'data' => [], 'msg' => ''];
        $cond = [];
        if($task_id == -1){
            $task_id = 3; //这里为测试，实际上要获取task表中最后一条有效数据的id
        }
        if($timeRange == 1){

        }

        $ret['timeRange'] = ['周一','周二','周三','周四','周五','周六','周日'];
        // 查找逻辑， 未实现

        // 测试数据
        $trend = [];
        $trend[0] = ['media_type'=>'微博', 'data' => [120, 132, 101, 134, 90, 230, 210]];
        $trend[1] = ['media_type'=>'微信', 'data' => [120, 132, 101, 134, 90, 230, 210]];
        $trend[2] = ['media_type'=>'新闻', 'data' => [120, 132, 101, 134, 90, 230, 210]];
        $trend[3] = ['media_type'=>'论坛', 'data' => [120, 132, 101, 134, 90, 230, 210]];

        $ret['data'] = $trend;
        $this->jsonReturn($ret);
    }
}
