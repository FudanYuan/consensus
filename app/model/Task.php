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
use think\Db;

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
        $res = $this->field('id,name,time_predict as pre_time,
            task_num as count,task_status,begin_time,end_time')
            ->where($cond_or)
            ->where($cond_and)
            ->order($order)
            ->select();
        return $res;
    }

    /**
     * 根据id获取任务详情
     * @param string $select
     * @param $id
     * @return mixed
     */
    public function getById($select='*',$id){
        $res = $this->field($select)
            ->where(['id' => $id])
            ->find();
        return $res;
    }

    /**
     * 根据id获取主题信息
     * @param string $select
     * @param $id
     * @return mixed
     */
    public function getThemeById($select='*', $id){
        $res = $this->alias('a')->field($select)
            ->join('vox_task_theme b','b.task_id = a.id')
            ->join('vox_theme_2 c','c.id = b.theme_id')
            ->join('vox_theme_1 d','d.id = c.t1_id')
            ->where(['a.id' => $id])
            ->select();
        return $res;
    }

    /**
     * 根据id获取媒体信息
     * @param string $select
     * @param $id
     * @return mixed
     */
    public function getMediaById($select='*', $id){
        $res = $this->alias('a')->field($select)
            ->join('vox_task_media_type e','e.task_id = a.id')
            ->join('vox_media_type f','f.id = e.media_type_id')
            ->where(['a.id' => $id])
            ->select();
        return $res;
    }

    /**
     * 根据名字获取task_id
     * @param $name
     * @return mixed
     */
    public function getTaskIdByName($name){
        $res = $this->field('id')
            ->where(['name' => $name])
            ->find();
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
     * 操作任务列表
     * @param $data
     * @param array $cond
     * @return false|int
     * @throws MyException
     */
    public function operate($data, $cond = []){
        if($data['task_status'] == 2){
            $data['end_time'] = $_SERVER['REQUEST_TIME'];
        }
        $data['update_time'] = $_SERVER['REQUEST_TIME'];
        $res = $this->save($data, $cond);
        if ($res === false) throw new MyException('2', '操作失败');
        return $res;
    }

    /**
     * 添加新任务
     * @param $data
     * @return array
     */
    public function addData($data){
        $ret = [];
        $this->timeToStamp($data);
        $this->unsetOtherField($data);
        $data_filter = $this->getTableField($data);
        $errors = $this->filterField($data_filter);
        $ret['errors'] = $errors;
        if (empty($errors)) {
            $data_filter['create_time'] = $_SERVER['REQUEST_TIME'];
            if (!isset($data_filter['status']))
                $data_filter['status'] = 1;
            if($data_filter['loop'] == 0){
                $data_filter['loop'] = 86400;
            }elseif ($data_filter['loop'] == 1){
                $data_filter['loop'] = 604800;
            }elseif ($data_filter['loop'] == 2){
                $data_filter['loop'] = 2592000;
            }
            if(!isset($data_filter['task_status'])){
                $data_filter['task_status'] = 0;
            }
            if(!isset($data_filter['time_predict'])){
                $data_filter['time_predict'] = $data_filter['task_num']*10000;
            }
            $task_id = Db::table('vox_task')->insertGetId($data_filter);
            $ret['task_id'] = $task_id;
        }
        return $ret;
    }

    /**
     *  更新任务
     * @param $id
     * @param $data
     * @return array
     */
    public function saveData($id, $data){
        $ret = [];
        $this->timeToStamp($data);
        $this->unsetOtherField($data);
        $data_filter = $this->getTableField($data);
        $errors = $this->filterField($data_filter);
        $ret['errors'] = $errors;
        if(empty($errors)){
            if(!isset($data['update_time'])){
                $data['update_time'] = $_SERVER['REQUEST_TIME'];
            }
            $this->save($data_filter, ['id' => $id]);
        }
        return $ret;
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
        if (isset($data['begin_time']) && !$data['begin_time']) {
            $errors['begin_time'] = '开始时间不能为空';
        }

        if(isset($data['begin_time']) && $data['begin_time'] && $data['begin_time'] < $_SERVER['REQUEST_TIME']){
            $errors['begin_time'] = '开始时间不能早于当前时间';
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
    private function unsetOtherField(&$data)
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
    private function timeToStamp(&$data)
    {
        isset($data['begin_time_str']) && $data['begin_time'] = $data['begin_time_str'] ? strtotime($data['begin_time_str']) : 0;
        isset($data['end_time_str']) && $data['end_time'] = $data['end_time_str'] ? strtotime($data['end_time_str']) : 0;
    }

    /**
     * 去除非表字段
     * @param $data
     * @return array
     */
    public function getTableField($data){
        $list = [];
        foreach ($this->fields as $v){
            if(isset($data[$v])){
                $list[$v] = $data[$v];
            }
        }
        return $list;
    }
}