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
//        $this->getTrendLine();
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 趋势分析
     * @return \think\response\View
     */
    public function trend(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 搜索词分析
     * @return \think\response\View
     */
    public function searchwords(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 观点分析
     * @return \think\response\View
     */
    public function opinion(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 媒体分析
     * @return \think\response\View
     */
    public function media(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 传播分析
     * @return \think\response\View
     */
    public function spread(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 受众分析
     * @return \think\response\View
     */
    public function audience(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 事件分析
     * @return \think\response\View
     */
    public function event(){
        $params = input('get.');
        $task_id = input('get.task_id', '');
        return $this->checkTaskId($params, $task_id);
    }

    /**
     * 获取舆情概况
     */
    public function getAnalysisIndex(){
        $params = input('post.');
        $task_id = input('post.task_id', '');
        $ret = ['error_code' => 0,'data' => [], 'msg' => ''];
        $params['params'] = $params;
        $ret['task_id'] = $task_id;
        $index = [];
        $index[0] = ['舆情总量' => 0];
        $index[1] = ['舆情总量' => 0];
        $index[2] = ['舆情总量' => 0];
        $media_types = ['舆情总量'];
        $media_type = D('MediaType')->getMedTypeList();

        for($i=0;$i<count($media_type);$i++){
            array_push($media_types, $media_type[$i]['type_name']);
            $index[0][$media_type[$i]['type_name']] = 0;
            $index[1][$media_type[$i]['type_name']] = 0;
            $index[2][$media_type[$i]['type_name']] = 0;
        }

        $ret['media_types'] = $media_types;

        // 舆情指数；
        $eTime = time();
        $date = date('Y-m-d', $eTime);
        $per_day = 86400;
        $begin_time = strtotime($date);
        $end_time = $begin_time + $per_day;

        $cond = [];
        $cond['a.publish_time'] = "between $begin_time and $end_time";
        $res = D('DataMonitor')->getDataNumberByMediaType($cond);
        for($i=0;$i<count($res);$i++){
            $name = $res[$i]['media_type'];
            $count = $res[$i]['count'];
            $index[0][$name] = $count;
        }

        $begin_time = strtotime($date.'-1 day');
        $end_time = $begin_time + $per_day;

        $cond['a.publish_time'] = "between $begin_time and $end_time";
        $res = D('DataMonitor')->getDataNumberByMediaType($cond);
        for($i=0;$i<count($res);$i++){
            $name = $res[$i]['media_type'];
            $count = $res[$i]['count'];
            $index[1][$name] = $count;
        }

        $begin_time = strtotime($date.'-6 days');
        $end_time = $begin_time + $per_day * 6;

        $cond['a.publish_time'] = "between $begin_time and $end_time";
        $res = D('DataMonitor')->getDataNumberByMediaType($cond);
        for($i=0;$i<count($res);$i++){
            $name = $res[$i]['media_type'];
            $count = $res[$i]['count'];
            $index[2][$name] = $count;
        }

        for($i=0;$i<count($index);$i++){
            foreach ($index[$i] as $k => $v){
                $index[$i]['舆情总量'] += (int)$v;
            }
        }

        $ret['index'] = $index;

        $nature = [];
        $nature[0] = ['name' => '正面', 'value' => 0];
        $nature[1] = ['name' => '负面', 'value' => 0];
        $nature[2] = ['name' => '中立', 'value' => 0];

        $res = D('DataMonitor')->getNatureNum();

        for($i=0;$i<count($res);$i++){
            switch ($res[$i]['nature']){
                case '正面':{
                    $nature[0]['value'] = $res[$i]['count'];
                    break;
                }
                case '负面':{
                    $nature[1]['value'] = $res[$i]['count'];
                    break;
                }
                case '中立':{
                    $nature[2]['value'] = $res[$i]['count'];
                    break;
                }
            }
        }
        $ret['nature'] = $nature;
        $events = [];
//        $events[0] = ['id' => 1, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[1] = ['id' => 2, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[2] = ['id' => 3, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[3] = ['id' => 4, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[4] = ['id' => 5, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[5] = ['id' => 6, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[6] = ['id' => 7, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[7] = ['id' => 8, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[8] = ['id' => 9, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
//        $events[9] = ['id' => 10, 'name' => '测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试测试测试测试测饿测试测试', 'count' => 100];
        $ret['event'] = $events;
        $this->jsonReturn($ret);
    }

    /**
     * 获取舆情内容
     */
    public function getPublicList(){
        $params = input('post.');
        $task_id = input('post.task_id', '');
        $nature = input('post.nature', 0);
        $ret = ['error_code' => 0,'data' => [], 'msg' => ''];
        $cond = [];
        if(!$task_id){
            $ret['task_id'] = $task_id;
        }
        if($nature == 2){
            $cond['nature'] = '负面';
        }

        // 查找逻辑， 未实现
        $select = ['a.id as id,a.title as title, a.url as url, nature,b.name as media_type,a.publish_time'];
        $public = D('DataMonitor')->getNewest($select,$cond,'id desc',10);
        $ret['data'] = $public;
        $this->jsonReturn($ret);
    }

    /**
     * 获取舆情趋势图
     */
    public function getTrendLine(){
        $params = input('post.');
        $obj = input('post.obj', '');
        $task_id = input('post.task_id', '');
        $sTime = input('post.begin_time_str', '');
        $eTime = input('post.end_time_str', '');
        $ret = ['error_code' => 0, 'msg' => ''];
        $ret['params'] = $params;
        $ret['task_id'] = $task_id;

        /**
         * 获取横坐标
         */
        $per_day = 86400;
        $days = (strtotime($eTime) - strtotime($sTime)) / $per_day;

        $xAxis = [];
        $timeRange = [];

        if($days == 0){ // 时间间隔为一天
            $range = 1;
            $hour = (int)date("H", strtotime($eTime)); //获取当前小时数
            if($eTime == date('Y-m-d', time())){
                $hour = (int)date("H", time());
            }
            $begin = strtotime($sTime);
            for($i=$hour;$i<24;$i++){
                array_push($xAxis, ($i<=9 ? '0'.$i : $i) . ':00');
                array_push($timeRange, $begin-(24-$i)*3600);
            }
            for($i=0;$i<=$hour;$i++){
                array_push($xAxis, ($i<=9 ? '0' . $i : $i) . ':00');
                array_push($timeRange, $begin+$i*3600);
            }
        } else if($days == 6){ // 时间间隔为7天
            $range = 2;
            $begin_time = strtotime($eTime.'-6 days');
            for($i=0;$i<7;$i++){
                $end_time = $begin_time + $per_day*$i;
                array_push($timeRange, $end_time);
                array_push($xAxis, date('m-d', $end_time));
            }
        } else if($days == 29){ // 时间间隔为30天
            $range = 3;
            $begin_time = strtotime($eTime.'-29 days');
            for($i=0;$i<30;$i++){
                $end_time = $begin_time + $per_day*$i;
                array_push($timeRange, $end_time);
                array_push($xAxis, date('m-d', $end_time));
            }
        } else{ // 时间间隔为自定义
            $range = 4;
            $begin_time = strtotime($eTime.'-' . $days . ' days');
            for($i=0;$i<$days;$i++){
                $end_time = $begin_time + $per_day*$i;
                array_push($timeRange, $end_time);
                array_push($xAxis, date('m-d', $end_time));
            }
        }

        $ret['xAxis'] = $xAxis;
        $ret['timeRange'] = $timeRange;
        // 查找逻辑
        $data = [];

        // strtotime('2017-12-04'), strtotime('2017-12-10')
        $ret['res']  = [];
        $cond = [];
        switch ($obj){
            case 'media':{  // media trend
                $media_type = D('MediaType')->getMedTypeList();

                for($i=0;$i<count($media_type);$i++){
                    $data[$i]['media_type'] = $media_type[$i]['type_name'];
                    $data[$i]['data'] = [];
                    for($j=0;$j<count($timeRange);$j++){
                        array_push($data[$i]['data'], 0);
                    }
                }

                for($i=0;$i<count($timeRange);$i++){
                    $begin = $timeRange[$i];
                    $end = $timeRange[$i] + 3600 * ($range == 1 ? 1 : 24);
                    $cond['a.publish_time'] = "between $begin and $end";
                    $res = D('DataMonitor')->getDataNumberByMediaType($cond);
                    for($j=0;$j<count($res);$j++){
                        $type = $res[$j]['media_type'];
                        $index = array_search($type, $media_type);
                        $data[$index]['data'][$i] += $res[$j]['count'];
                    }
                }
                break;
            }
            case 'public':{// public trend
                $data[0] = ['media_type' => '热点舆情', 'data' => []];
                $data[1] = ['media_type' => '健康度', 'data' => []];
                for($j=0;$j<count($timeRange);$j++){
                    array_push($data[0]['data'], 0);
                    array_push($data[1]['data'], 0);
                }

                for($i=0;$i<count($timeRange);$i++){
                    $begin = $timeRange[$i];
                    $end = $timeRange[$i] + 3600 * ($range == 1 ? 1 : 24);
                    $cond['publish_time'] = "between $begin and $end";
                    $cond['nature'] = "负面";
                    $res = D('DataMonitor')->getNatureNum($cond);
                    for($j=0;$j<count($res);$j++){
                        $type = $res[$j]['nature'];
                        if($type == '负面'){
                            $data[1]['data'][$i] += $res[$j]['count'];
                        }
                        $data[0]['data'][$i] += $res[$j]['count'];
                        if($data[0]['data'][$i]){
                            $data[1]['data'][$i] = round(($data[1]['data'][$i] / $data[0]['data'][$i]) * 100, 2);
                        }
                    }
                }
                break;
            }
        }
        $ret['data'] = $data;
        $this->jsonReturn($ret);
    }

    /**
     * 获取媒体分布饼形图
     */
    public function getMediaDistribution(){
        $params = input('post.');
        $task_id = input('post.task_id', '');
        $ret = ['error_code' => 0, 'msg' => ''];
        $ret['task_id'] = $task_id;

        $select = ['count(id) as num,source as media_type'];
        $group = 'source';
        $data = D('DataMonitor')->getNumBySource($select,[],$group);
        $ret['data'] = $data;
        $this->jsonReturn($ret);
    }

    /**
     * 检测task_id
     * @param $params
     * @param $task_id
     * @return \think\response\View
     */
    public function checkTaskId(&$params, &$task_id){
        if(!$task_id){
            $list = D('Task')->getTaskList([],[],'create_time desc');
            if(!count($list)){
                $params['task_id'] = '';
                $params['task_name'] = '';
                return view('', ['error' => '抱歉，目前暂无采集任务！', 'params' => $params]);
            } else{
                $task_id = $list[0]['id'];
                $params['task_id'] = $task_id;
                $params['task_name'] = $list[0]['name'];
            }
        }
        else{
            $list = D('Task')->getTaskList([],['id' => $task_id],'create_time desc');
            $params['task_name'] = $list[0]['name'];
        }

        return view('', ['error' => '', 'params' => $params]);
    }

}
