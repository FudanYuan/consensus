<?php
/**
 * 操作日志--控制器
 * Created by shiren.
 * time 2017.10.19
 */
namespace app\controller;

class OperationLog extends Common
{
    public $exportCols = [];
    public $colsText = [];

    const USER_TOKEN = 'admin_user_token';
    const TOKEN_USER = 'admin_token_user';

    /**
     * 操作日志
     * @return \think\response\View
     */
    public function index()
    {
        return view('', []);
    }

    /**
     *
     */
    public function getLogList(){
        $params = input('post.');
        $token = session('token');
        $username = json_decode(cache_hash_hget(self::TOKEN_USER, $token), true);
        $page = input('post.current_page',0);
        $per_page = input('post.per_page',0);
        $ret = ['errorcode' => 0, 'data' => [], 'params' => $params, 'msg' => ""];
        //$list = D('DataMonitor')->publicList($cond_or,$cond_and,$order);
        $list = [];
        $list[0] = ['username'=>$username['username'], 'IP'=>'111.1212.121'];
        //分页时需要获取记录总数，键值为 total
        $ret["total"] = count($list);
        //根据传递过来的分页偏移量和分页量截取模拟分页 rows 可以根据前端的 dataField 来设置
        $ret["data"] = array_slice($list, ($page-1)*$per_page, $per_page);
        $ret['current_page'] = $page;
        $this->jsonReturn($ret);
    }
}