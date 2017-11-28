<?php
/**
 * 任务模型
 * Created by PhpStorm.
 * User: acer-pc
 * Date: 2017/10/4
 * Time: 11:25
 */

namespace app\model;

use think\Model;


class Task extends Model
{
    protected $table = 'vox_task';
    protected $pk = 'id';
    protected $fields = array(
        'id', 'name', 'loop', 'match_accuracy', 'match_type',
        'necessary_keywords','unnecessary_keywords', 'begin_time',
        'end_time', 'task_num','quantity_complete', 'time_predict',
        'task_status', 'status','create_time', 'update_time'
    );
    protected $type = [
        'id' => 'integer',
        'begin_time' => 'integer',
        'match_accuracy' => 'integer',
        'match_type' => 'integer',
        'end_time ' => 'integer',
        'task_status' => 'integer',
        'task_num' => 'integer',
        'time_predict' => 'integer',
        'status' => 'integer',
        'create_time' => 'integer',
        'update_time' => 'integer'
    ];

    private $strField = ['begin_time', 'end_time'];

    public function getTaskIdByName($name){
        $res = $this->field('id')
            ->where(['name' => $name])
            ->find();
        return $res;
    }
    /**
     * 获取任务列表
     * @param $cond_or
     * @param $cond_and
     * @param $order
     * @return mixed
     */
    public function getTaskList($cond_or,$cond_and,$order){
        if(!isset($cond_and['status'])){
            $cond_and['status'] = ['<>', 2];
        }
        $res = $this->field('id,name,time_predict as pretime,
            task_num as count,task_status,begin_time,end_time')
            ->where($cond_or)
            ->where($cond_and)
            ->order($order)
            ->select();
        return $res;
    }

    /**
     * 获取总任务量
     */
    public function getTaskNumber()
    {
        $res = $this->field('count(id) as task')
            ->select();
        return $res[0]['task'];
    }

    /**
     * 获取任务已完成数量
     */
    public function getCompletedNum()
    {
        $res = $this->field('count(id) as com_num')
            ->where('task_status = 2')
            ->select();
        return $res[0]['com_num'];
    }

    /**
     * 获取已完成任务所占百分比
     */
    public function getPercentCompleted()
    {
        $TotalNum = $this->field('count(id) as t_num')
            ->select();
        $CompletedNum = $this->field('count(id) as com_num')
            ->where('task_status = 2')
            ->select();
        if ($TotalNum[0]['t_num']) {
            $percent = ($CompletedNum[0]['com_num'] / $TotalNum[0]['t_num']) * 100;
        } else {
            $percent = 0;
        }
        return 0;
    }

    /**
     * 获取正在执行的任务数量
     */
    public function getTodealNum()
    {
        $res = $this->field('count(id) as to_num')
            ->where('task_status = 0 or task_status = 1')
            ->select();
    }

    /**
     * 删除任务
     * @param array $cond
     * @return false|int
     * @throws MyException
     */
    public function remove($cond = []){
        $res = $this->save(['status' => 2], $cond);
        if ($res === false) throw new MyException('2', '删除失败');
        return $res;
    }

    /**
     * 继续任务
     * @param array $cond
     * @return false|int
     * @throws MyException
     */
    public  function go_on($cond = []){
        $res = $this->save(['task_status' => 0], $cond);
        if ($res === false) throw new MyException('2', '继续失败');
        return $res;
    }

    /**
     * 结束任务
     * @param array $cond
     * @return false|int
     * @throws MyException
     */
    public function end_task($cond = []){
        $res = $this->save(['task_status' => 2], $cond);
        if ($res === false) throw new MyException('2', '结束失败');
        return $res;
    }

    /**
     * 中断任务
     * @param array $cond
     * @return false|int
     * @throws MyException
     */
    public function break_off($cond = []){
        $res = $this->save(['task_status' => 1], $cond);
        if ($res === false) throw new MyException('2', '中断失败');
        return $res;
    }

    ////////// 添加 //////////
    /**
     * 添加新任务
     * @param $data
     * @return array
     */
    public function addData($data){
        $ret = [];
        $errors = $this->filterField($data);
        $ret['errors'] = $errors;
        if (empty($errors)) {
            $data['create_time'] = time();
            if (!isset($data['status']))
                $data['status'] = 1;
            if($data['loop'] == 0){
                $data['loop'] = 86400;
            }elseif ($data['loop'] == 1){
                $data['loop'] = 604800;
            }elseif ($data['loop'] == 2){
                $data['loop'] = 2592000;
            }
            $data['task_status'] = 0;
            $task_id = $this->save_1($data);
            $ret['task_id'] = $task_id;
        }
        return $ret;
    }

    /**
     * 添加任务操作
     * @param $data
     * @return int|string
     */
    private function  save_1($data){
        $insert_data = ['name'=>$data['name'],'loop'=>$data['loop'],'match_accuracy'=>$data['match_accuracy'],
            'match_type'=>$data['match_type'],'necessary_keywords'=>$data['necessary_keywords'],
            'unnecessary_keywords'=>$data['unnecessary_keywords'],
            'begin_time' => strtotime($data['begin_time_str']),'status' => $data['status'],
            'task_num' => $data['task_num'],'time_predict' =>($data['task_num']*10000),
            'create_time' => $data['create_time'],'task_status' => 0];
        $res = $this->insertGetId($insert_data);
        return $res;
    }

    /**
     * 过滤必要字段
     * @param $data
     * @return array
     */
    private function filterField($data)
    {
        $errors = [];
        if (isset($data['loop']) && $data['loop'] == '-1') {
            $errors['loop'] = '采集周期不能为空';
        }
        if (isset($data['begintime_str']) && !$data['begintime_str']) {
            $errors['begintime_str'] = '开始时间不能为空';
        }
        if (isset($data['theme']) && !$data['theme']) {
            $errors['theme'] = '采集主题不能为空';
        }
        if (isset($data['website']) && !$data['website']) {
            $errors['website'] = '采集媒体类型不能为空';
        }
        if(isset($data['name']) && !$data['name']){
            $errors['name'] = '任务名字不能为空';
        }
        if (isset($data['necessary_keywords']) && !$data['necessary_keywords']) {
            $errors['necessary_keywords'] = '必要关键词不能为空';
        }
        if(isset($data['unnecessary_keywords']) && !$data['unnecessary_keywords']){
            $errors['unnecessary_keywords'] = '非必要关键词不能为空';
        }
        return $errors;
    }

    /**
     * 清除非数据库字段
     * @param $data
     */
    private function unsetOhterField(&$data)
    {
        foreach ($this->strField as $v) {
            $str = $v . '_str';
            if (isset($data[$str])) unset($data[$str]);
        }
    }

    /**
     * 将字符串时间转化成时间戳
     * @param $data
     */
    private function timeTostamp(&$data)
    {
        isset($data['begintime_str']) && $data['begin_time'] = $data['begintime_str'] ? strtotime($data['begintime_str']) : 0;
        isset($data['endtime_str']) && $data['end_time'] = $data['endtime_str'] ? strtotime($data['endtime_str']) : 0;
    }
}