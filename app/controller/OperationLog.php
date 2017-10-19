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

    /**
     * 操作日志
     * @return \think\response\View
     */
    public function index()
    {
        return view('', []);
    }
}