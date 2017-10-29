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

}
