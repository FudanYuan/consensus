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
}