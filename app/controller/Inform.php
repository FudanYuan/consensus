<?php
/**
 * 通知公告--控制器
 * Created by shiren.
 * time 2017.10.19
 */
namespace app\controller;

class Inform extends Common
{
    public $exportCols = [];
    public $colsText = [];

    /**
     * 通知公告
     * @return \think\response\View
     */
    public function index()
    {
        return view('', []);
    }

    /**
     * 获取通知公告列表
     */
    public function getInformList(){
        $params = input('post.');
        // 获取当前登陆的用户id，根据此id查询表，返回结果
        $user_id = $this->getUserId();
        $page = input('post.current_page',0);
        $per_page = input('post.per_page',0);
        $ret = ['errorcode' => 0, 'data' => [], 'msg' => ""];
        $cond['target_user_id'] = ['=', $user_id];
        $list = D('Inform')->getList($cond);
        //分页时需要获取记录总数，键值为 total
        $ret["total"] = count($list);
        //根据传递过来的分页偏移量和分页量截取模拟分页 rows 可以根据前端的 dataField 来设置
        $ret["data"] = array_slice($list, ($page-1)*$per_page, $per_page);
        $ret['current_page'] = $page;
        $this->jsonReturn($ret);
    }

    /**
     * 删除公告
     */
    public function remove(){
        $ret = ['code' => 1, 'msg' => '删除成功'];
        $ids = input('post.ids');
        try{
            $res = D('Inform')->remove(['id' => ['in', $ids]]);
        }catch(MyException $e){
            $ret['code'] = 2;
            $ret['msg'] = '删除失败';
        }
        $this->jsonReturn($ret);
    }

    /**
     * 标为已读
     */
    public function markRead(){
        $ret = ['code' => 1, 'msg' => '标记成功'];
        $ids = input('post.ids');
        try{
            $res = D('Inform')->markRead(['id' => ['in', $ids]]);
        }catch(MyException $e){
            $ret['code'] = 2;
            $ret['msg'] = '标记失败';
        }
        $this->jsonReturn($ret);
    }
}