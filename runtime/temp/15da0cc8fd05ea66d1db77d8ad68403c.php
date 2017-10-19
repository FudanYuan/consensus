<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:77:"/Applications/XAMPP/xamppfiles/htdocs/git_consensus/app/view/Index/index.html";i:1508234105;s:76:"/Applications/XAMPP/xamppfiles/htdocs/git_consensus/app/view/Common/top.html";i:1508418816;s:79:"/Applications/XAMPP/xamppfiles/htdocs/git_consensus/app/view/Common/search.html";i:1507659259;s:79:"/Applications/XAMPP/xamppfiles/htdocs/git_consensus/app/view/Common/bottom.html";i:1508223178;s:83:"/Applications/XAMPP/xamppfiles/htdocs/git_consensus/app/view/Common/popup_warn.html";i:1507624885;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>华夏经纬舆情监测系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="华夏经纬舆情监测系统">
    <meta name="author" content="yzs">

    <!-- ionicons -->
    <!--<link rel="shortcut icon" href="__PUBLIC__/__PUBLIC__/images/logo.ico" />-->
    <!--<link rel="bookmark" href="__PUBLIC__/__PUBLIC__/images/logo.ico" />-->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Slider -->
    <link href="__PUBLIC__/css/bootstrap-slider.css" rel="stylesheet"/>

    <!-- Tag Input -->
    <link href="__PUBLIC__/css/jquery.tagsinput.css" rel="stylesheet">

    <!-- Date Time Picker -->
    <!--<link href="__PUBLIC__/css/datetimepicker.css" rel="stylesheet">-->

    <!-- Select2 -->
    <!--<link href="__PUBLIC__/css/select2/select2.css" rel="stylesheet"/>-->

    <!-- Morris -->
    <link href="__PUBLIC__/css/morris.css" rel="stylesheet"/>

    <!-- Datepicker -->
    <link href="__PUBLIC__/css/datepicker.css" rel="stylesheet"/>

    <!-- Animate -->
    <link href="__PUBLIC__/css/animate.min.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="__PUBLIC__/css/owl.carousel.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/owl.theme.default.min.css" rel="stylesheet">

    <!-- jQuery steps -->
    <!--<link href="__PUBLIC__/css/jquery.steps.css" rel="stylesheet"/>-->

    <!-- Gritter -->
    <!--<link href="__PUBLIC__/css/gritter/jquery.gritter.css" rel="stylesheet">-->

    <!-- Dropzone -->
    <!--<link href="__PUBLIC__/css/dropzone/css/dropzone.css" rel="stylesheet">-->

    <!-- Simplify -->
    <link href="__PUBLIC__/css/simplify.min.css" rel="stylesheet">

    <!--<link href="__PUBLIC__/css/site.css" rel="stylesheet">-->

    <!-- MyCss -->
    <link href="__PUBLIC__/css/tax.css" rel="stylesheet">
    <link href="__PUBLIC__/js/multiple-select/multiple-select.css" rel="stylesheet">

    <!-- Jquery -->
    <script src="__PUBLIC__/js/jquery.min.js"></script>

    <!-- MyJs-->
    <script src="__PUBLIC__/js/myJs/myChart.js"></script>
</head>
<body class="overflow-hidden">
<div class="wrapper preload">
    <header class="top-nav">
        <div class="top-nav-inner">
            <!-- 小屏显示 -->
            <div class="nav-header">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav-notification pull-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i></a>
                        <span class="badge badge-danger bounceIn">1</span>
                        <ul class="dropdown-menu dropdown-sm pull-right user-dropdown">
                            <li class="user-avatar">
                                <img src="__PUBLIC__/images/profile/profile1.jpg" alt="" class="img-circle">
                                <div class="user-content">
                                    <h5 class="no-m-bottom">管理员</h5>
                                    <div class="m-top-xs">
                                        <a href="javascript:;" class="logout">安全退出</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">账户设置</a>
                            </li>
                            <li>
                                <a href="#">通知管理</a>
                            </li>
                            <li>
                                <a href="#">操作记录</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    系统消息
                                    <span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <a href="__PRO_PATH__/" class="brand">
                    <i class="fa fa-database"></i><span class="brand-name">华夏经纬舆情监测系统</span>
                </a>
            </div><!-- 小屏显示 -->

            <!-- 大屏显示 -->
            <div class="nav-container">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav-notification">
                    <li class="search-list">
                        <!--<div class="search-input-wrapper">-->
                            <!--<div class="search-input">-->
                                <!--<input type="text" class="form-control input-sm inline-block" placeholder="搜索">-->
                                <!--<a href="#" class="input-icon text-normal"><i class="ion-ios7-search-strong"></i></a>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!-- 搜索栏 -->
                    </li>
                </ul>

                <div class="pull-right m-right-sm">
                    <div class="user-block hidden-xs">
                        <a href="#" id="userToggle" data-toggle="dropdown">
                            <img src="__PUBLIC__/images/profile/profile2.jpg" alt=""
                                 class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                                管理员
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="panel border dropdown-menu user-panel">
                            <div class="panel-body paddingTB-sm">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-edit fa-lg"></i><span class="m-left-xs">账户设置</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-inbox fa-lg"></i>
                                            <span class="m-left-xs">通知管理</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bookmark-o fa-lg"></i>
                                            <span class="m-left-xs">操作记录</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" id="clearCache">清除缓存</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 信息推送 -->
                    <ul class="nav-notification">
                        <li><a href="javascript:;" id="searchToggle"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a></li>
                        <li>
                            <a href="#" data-toggle="dropdown"><i class="fa fa-envelope fa-lg"></i></a>
                            <span class="badge badge-purple bounceIn animation-delay5 active">2</span>
                            <ul class="dropdown-menu message pull-right">
                                <li><a>You have 4 new unread messages</a></li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="__PUBLIC__/images/profile/profile2.jpg" alt="User Avatar">
                                        <div class="detail">
                                            <strong>John Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-check text-success"></i> 27m ago
                                            </small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="__PUBLIC__/images/profile/profile3.jpg" alt="User Avatar">
                                        <div class="detail">
                                            <strong>Jane Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-check text-success"></i> 5hr ago
                                            </small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="__PUBLIC__/images/profile/profile4.jpg" alt="User Avatar">
                                        <div class="detail m-left-sm">
                                            <strong>Bill Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-reply"></i> Yesterday</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="__PUBLIC__/images/profile/profile5.jpg" alt="User Avatar">
                                        <div class="detail">
                                            <strong>Baby Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-reply"></i> 9 Feb 2013</small>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="#">View all messages</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="dropdown"><i class="fa fa-bell fa-lg"></i></a>
                            <span class="badge badge-info bounceIn animation-delay6 active">4</span>
                            <ul class="dropdown-menu notification dropdown-3 pull-right">
                                <li><a href="#">You have 5 new notifications</a></li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-warning">
													<i class="fa fa-warning"></i>
												</span>
                                        <span class="m-left-xs">Server #2 not responding.</span>
                                        <span class="time text-muted">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-success">
													<i class="fa fa-plus"></i>
												</span>
                                        <span class="m-left-xs">New user registration.</span>
                                        <span class="time text-muted">2m ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-danger">
													<i class="fa fa-bolt"></i>
												</span>
                                        <span class="m-left-xs">Application error.</span>
                                        <span class="time text-muted">5m ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-success">
													<i class="fa fa-usd"></i>
												</span>
                                        <span class="m-left-xs">2 items sold.</span>
                                        <span class="time text-muted">1hr ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-success">
													<i class="fa fa-plus"></i>
												</span>
                                        <span class="m-left-xs">New user registration.</span>
                                        <span class="time text-muted">1hr ago</span>
                                    </a>
                                </li>
                                <li><a href="#">View all notifications</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="logout">
                                <i class="fa fa-power-off fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- 大屏显示 -->
            </div>
        </div><!-- ./top-nav-inner -->
    </header>
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="main-menu">
                <ul class="accordion">
                    <li class="menu-header">
                        DashBoard
                    </li>
                    <li class="bg-palette1" id="tax-nav-dashborad">
                        <a href="__PRO_PATH__/">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-home fa-lg"></i></span>
                                <span class="text m-left-sm">舆情概况</span>
                            </span>
                            <span class="menu-content-hover block">Home</span>
                        </a>
                    </li>

                    <?php if(authority('DataMonitor')): ?>
                    <li class="openable bg-palette2" id="tax-nav-monitor">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-line-chart fa-lg"></i></span>
								<span class="text m-left-sm">实时舆情</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Data</span>
                        </a>
                        <ul class="submenu bg-palette4">
                            <?php if(authority('DataMonitorInfo')): ?>
                            <li id="tax-nav-monitor-sub1">
                                <a href="__PRO_PATH__/DataMonitor/info">
                                    <span class="submenu-label">全部舆情</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataMonitorCollect')): ?>
                            <li id="tax-nav-monitor-sub2"><a href="__PRO_PATH__/DataMonitor/collect"><span
                                    class="submenu-label">我的收藏</span></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; if(authority('DataWarn')): ?>
                    <li class="openable bg-palette1" id="tax-nav-data-warn">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-database fa-lg"></i></span>
								<span class="text m-left-sm">舆情预警</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Analysis</span>
                        </a>
                        <ul class="submenu bg-palette1">
                            <?php if(authority('DataWarnInfo')): ?>
                            <li id="tax-nav-data-warn-sub1">
                                <a href="__PRO_PATH__/DataMonitor/warn">
                                    <span class="submenu-label">预警舆情</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataWarnConfig')): ?>
                            <li id="tax-nav-data-warn-sub2">
                                <a href="__PRO_PATH__/DataMonitor/warn_config">
                                    <span class="submenu-label">预警设置</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; if(authority('DataAnalysis')): ?>
                    <li class="openable bg-palette1" id="tax-nav-data-analysis">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-database fa-lg"></i></span>
								<span class="text m-left-sm">舆情分析</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Analysis</span>
                        </a>
                        <ul class="submenu bg-palette1">
                            <?php if(authority('DataAnalysisTrend')): ?>
                            <li id="tax-nav-data-analysis-sub1">
                                <a href="__PRO_PATH__/DataAnalysis/trend">
                                    <span class="submenu-label">趋势分析</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataAnalysisSearchWords')): ?>
                            <li id="tax-nav-data-analysis-sub2">
                                <a href="__PRO_PATH__/DataAnalysis/searchwords">
                                    <span class="submenu-label">搜索词分析</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataAnalysisOpinion')): ?>
                            <li id="tax-nav-data-analysis-sub3">
                                <a href="__PRO_PATH__/DataAnalysis/opinion">
                                    <span class="submenu-label">观点分析</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataAnalysisMedia')): ?>
                            <li id="tax-nav-data-analysis-sub4">
                                <a href="__PRO_PATH__/DataAnalysis/media">
                                    <span class="submenu-label">媒体分析</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataAnalysisSpread')): ?>
                            <li id="tax-nav-data-analysis-sub5">
                                <a href="__PRO_PATH__/DataAnalysis/spread">
                                    <span class="submenu-label">传播分析</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataAnalysisAudience')): ?>
                            <li id="tax-nav-data-analysis-sub6">
                                <a href="__PRO_PATH__/DataAnalysis/audience">
                                    <span class="submenu-label">受众分析</span>
                                </a>
                            </li>
                            <?php endif; if(authority('DataAnalysisEvent')): ?>
                            <li id="tax-nav-data-analysis-sub7">
                                <a href="__PRO_PATH__/DataAnalysis/event">
                                    <span class="submenu-label">事件分析</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; if(authority('DataReport')): ?>
                    <li class="openable bg-palette3" id="tax-nav-data-report">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
								<span class="text m-left-sm">舆情报告</span>
                            </span>
                            <span class="menu-content-hover block">Report</span>
                        </a>
                    </li>
                    <?php endif; if(authority('Task')): ?>
                    <li class="openable bg-palette3" id="tax-nav-task">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-cloud fa-lg"></i></span>
								<span class="text m-left-sm">舆情采集</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Task</span>
                        </a>
                        <ul class="submenu bg-palette4">
                            <?php if(authority('TaskInfo')): ?>
                            <li id="tax-nav-task-sub1">
                                <a href="__PRO_PATH__/Task/index">
                                    <span class="submenu-label">采集舆情</span>
                                </a>
                            </li>
                            <?php endif; if(authority('TaskConfig')): ?>
                            <li id="tax-nav-task-sub2">
                                <a href="__PRO_PATH__/Task/config">
                                    <span class="submenu-label">采集设置</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li class="openable bg-palette4" id="tax-nav-warehouse">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-bank fa-lg"></i></span>
								<span class="text m-left-sm">库管理</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Warehouse</span>
                        </a>
                        <ul class="submenu bg-palette4">
                            <?php if(authority('Theme')): ?>
                            <li id="tax-nav-warehouse-sub2">
                                <a href="__PRO_PATH__/Theme/index">
                                    <span class="submenu-label">主题库</span>
                                </a>
                            </li>
                            <?php endif; if(authority('WebSite')): ?>
                            <li id="tax-nav-warehouse-sub3"><a href="__PRO_PATH__/WebSite/index"><span
                                    class="submenu-label">媒体库</span></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if(authority('DataProcess')): ?>
                    <li class="openable bg-palette1" id="tax-nav-data-process">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-database fa-lg"></i></span>
								<span class="text m-left-sm">数据管理</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Process</span>
                        </a>
                        <ul class="submenu bg-palette4">
                            <?php if(authority('DataProcessClean')): ?>
                            <li id="tax-nav-data-process-sub1"><a href="__PRO_PATH__/DataProcess/clean"><span
                                    class="submenu-label">数据清洗</span></a></li>
                            <?php endif; if(authority('Update_Backup')): ?>
                            <li id="tax-nav-data-process-sub2">
                                <a href="__PRO_PATH__/DataProcess/update_backup">
                                    <span class="submenu-label">更新备份</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li class="openable bg-palette4" id="tax-nav-setting">
                        <a href="javascript:;">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-cog fa-lg"></i></span>
								<span class="text m-left-sm">系统设置</span>
                                <span class="submenu-icon"></span>
                            </span>
                            <span class="menu-content-hover block">Setting</span>
                        </a>
                        <ul class="submenu bg-palette4">
                            <?php if(authority('Tag')): ?>
                            <li id="tax-nav-setting-sub1"><a href="__PRO_PATH__/Tag/index"><span
                                    class="submenu-label">标签设置</span></a></li>
                            <?php endif; if(authority('Authority')): ?>
                            <li id="tax-nav-setting-sub2">
                                <a href="__PRO_PATH__/UserAdmin/index">
                                    <span class="submenu-label">权限设置</span>
                                </a>
                            </li>
                            <?php endif; if(authority('Role')): ?>
                            <li id="tax-nav-setting-sub3">
                                <a href="__PRO_PATH__/UserAdmin/roles">
                                    <span class="submenu-label">角色设置</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="sidebar-fix-bottom clearfix">
                <div class="user-dropdown dropup pull-left">
                    <a href="#" class="dropdwon-toggle font-18" data-toggle="dropdown"><i class="ion-person-add"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="inbox.html">
                                Inbox
                                <span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Notification
                                <span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebarRight-toggle">
                                Message
                                <span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Setting</a>
                        </li>
                    </ul>
                </div>
                <a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>
            </div>
        </div><!-- sidebar-inner -->
    </aside>
<!-- 搜索栏 -->
<div class="row" id="searchDiv" style="display: none">
    <div class="col-sm-12">
        <section id="search" style="font-size: 18px; margin-bottom: 0;">
            <label for="search-input"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px"></i><span class="sr-only">搜索一下</span></label>
            <input id="search-input" class="form-control input-lg" placeholder="搜索一下" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">
            <a id="search-clear" href="#" class="fa fa-times-circle hide" aria-hidden="true"><span class="sr-only">清除</span></a>
        </section>
    </div>
</div>
<style>
    .unit{
        font-size: 25%;
    }
</style>

<div class="main-container">
    <div class="padding-md">
        <!-- 总览 -->
        <div class="row m-top-md">
            <div class="col-lg-2 col-sm-2">
                <div class="statistic-box bg-success m-bottom-md" style="background-color: #1b6d85">
                    <div class="statistic-title"><a style="color: white" href="__PRO_PATH__/DataMonitor/index">文章总数</a></div>
                    <div class="statistic-value">7798<span class="unit"></span></div>
                    <div class="statistic-icon-background">
                        <i class="ion-eye"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2">
                <div class="statistic-box bg-success m-bottom-md">
                    <div class="statistic-title"><a style="color: white" href="__PRO_PATH__/DataMonitor/index">正面舆情</a></div>
                    <div class="statistic-value">7621<span class="unit"></span></div>
                    <div class="statistic-icon-background">
                        <i class="ion-eye"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2">
                <div class="statistic-box bg-danger m-bottom-md">
                    <div class="statistic-title"><a style="color: white" href="__PRO_PATH__/Company/index">负面舆情</a></div>
                    <div class="statistic-value">177<span class="unit"></span></div>
                    <div class="statistic-icon-background">
                        <i class="ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2">
                <div class="statistic-box bg-info m-bottom-md">
                    <div class="statistic-title"><a style="color: white" href="__PRO_PATH__/Theme/index">舆情跟踪</a></div>
                    <div class="statistic-value">20<span class="unit"></span></div>
                    <div class="statistic-icon-background">
                        <i class="ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2">
                <div class="statistic-box bg-purple m-bottom-md">
                    <div class="statistic-title"><a style="color: white" href="__PRO_PATH__/WebSite/index">今日预警</a></div>
                    <div class="statistic-value">0<span class="unit"></span></div>
                    <div class="statistic-icon-background">
                        <i class="ion-ios7-cart-outline"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2">
                <div class="statistic-box bg-success m-bottom-md" style="background-color: #00AA88">
                    <div class="statistic-title"><a style="color: white" href="__PRO_PATH__/WebSite/index">舆情级别</a></div>
                    <div class="statistic-value"><span style="font-size: 25px">一般</span></div>
                    <div class="statistic-icon-background">
                        <i class="ion-ios7-cart-outline"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- 任务图 -->
        <!--<div class="row">-->
            <!--<div class="task-widget smart-widget-collapsed">-->
                <!--<div class="task-widget-body clearfix">-->
                    <!--<div class="pie-chart-wrapper">-->
                        <!--<div class="chart task-pie-chart line-normal" data-percent="<?php echo $task['percent']; ?>">-->
                            <!--<h1 class="m-top-lg m-bottom-none"><?php echo $task['percent']; ?></h1>-->
                            <!--<div>Percent</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="widget-detail">-->
                        <!--<small class="text-upper text-muted block font-sm">本周任务</small>-->
                        <!--<h1 class="no-margin"><?php echo $count['task']; ?><span class="unit"></span></h1>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="task-widget-statatistic">-->
                    <!--<ul class="clearfix">-->
                        <!--<li class="bg-grey border-success">-->
                            <!--<div class="text-muted text-upper font-sm">已完成</div>-->
                            <!--<?php echo $task['completed']; ?><span class="unit">条</span>-->
                        <!--</li>-->
                        <!--<li class="bg-grey border-danger">-->
                            <!--<div class="text-muted text-upper font-sm">未处理</div>-->
                            <!--<?php echo $task['todeal']; ?><span class="unit">条</span>-->
                        <!--</li>-->
                        <!--<li class="bg-grey border-purple">-->
                            <!--<div class="text-muted text-upper font-sm">预计耗时</div>-->
                            <!--<?php echo $task['time_consume']; ?><span class="unit">h</span>-->
                        <!--</li>-->
                    <!--</ul>&lt;!&ndash; ./row &ndash;&gt;-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

        <!-- 数据总览 -->
        <!--<div class="row">-->
            <!--&lt;!&ndash; 企业信息 &ndash;&gt;-->
            <!--<div class="col-lg-6">-->
                <!--<p id="bubble_num_limit" hidden="hidden">-1</p>-->
                <!--<div class="smart-widget widget-green">-->
                    <!--<div class="smart-widget-header">-->
                        <!--企业数据-->
                        <!--<span class="smart-widget-option">-->
                            <!--<span class="refresh-icon-animated">-->
                                <!--<i class="fa fa-circle-o-notch fa-spin"></i>-->
                            <!--</span>-->
                            <!--<a href="javascript:;" class="widget-toggle-hidden-option">-->
                                <!--<i class="fa fa-cog"></i>-->
                            <!--</a>-->
                            <!--<a href="javascript:;" class="widget-collapse-option" data-toggle="collapse">-->
                                <!--<i class="fa fa-chevron-up"></i>-->
                            <!--</a>-->
                            <!--<a href="javascript:;" class="widget-refresh-option">-->
                                <!--<i class="fa fa-refresh"></i>-->
                            <!--</a>-->
                        <!--</span>-->
                    <!--</div>-->
                    <!--<div class="smart-widget-inner">-->
                        <!--<div class="smart-widget-hidden-section">-->
                            <!--<ul class="widget-color-list clearfix">-->
                                <!--<li style="background-color:#20232b;" data-color="widget-dark"></li>-->
                                <!--<li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>-->
                                <!--<li style="background-color:#23b7e5;" data-color="widget-blue"></li>-->
                                <!--<li style="background-color:#2baab1;" data-color="widget-green"></li>-->
                                <!--<li style="background-color:#edbc6c;" data-color="widget-yellow"></li>-->
                                <!--<li style="background-color:#fbc852;" data-color="widget-orange"></li>-->
                                <!--<li style="background-color:#e36159;" data-color="widget-red"></li>-->
                                <!--<li style="background-color:#7266ba;" data-color="widget-purple"></li>-->
                                <!--<li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>-->
                                <!--<li style="background-color:#fff;" data-color="reset"></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                        <!--<div class="smart-widget-body no-padding">-->
                            <!--<div class="padding-sm">-->
                                <!--<div class="btn-group">-->
                                    <!--<button type="button" class="btn btn-default dropdown-toggle"-->
                                            <!--data-toggle="dropdown">-->
                                        <!--显示数量<span class="caret"></span>-->
                                    <!--</button>-->
                                    <!--<ul class="dropdown-menu pull-left" role="menu">-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(1, 10)">Top 10</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(1, 20)">Top 20</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(1, 30)">Top 30</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(1, 40)">Top 40</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(1, 50)">Top 50</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(1, -1)">全部</a></li>-->
                                    <!--</ul>-->
                                <!--</div>-->
                                <!--<div id="company_theme_bubble_chart" class="echarts" style="height:300px;"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>&lt;!&ndash; ./smart-widget-inner &ndash;&gt;-->
                <!--</div>&lt;!&ndash; ./smart-widget &ndash;&gt;-->
            <!--</div>&lt;!&ndash; ./col &ndash;&gt;-->

            <!--&lt;!&ndash; 主题气泡图 &ndash;&gt;-->
            <!--<p id="theme_bubble_limit" hidden="hidden"></p>-->
            <!--<div class="col-lg-6">-->
                <!--<div class="smart-widget widget-green">-->
                    <!--<div class="smart-widget-header">-->
                        <!--主题数据-->
                        <!--<span class="smart-widget-option">-->
                            <!--<span class="refresh-icon-animated">-->
                                <!--<i class="fa fa-circle-o-notch fa-spin"></i>-->
                            <!--</span>-->
                            <!--<a href="javascript:;" class="widget-toggle-hidden-option">-->
                                <!--<i class="fa fa-cog"></i>-->
                            <!--</a>-->
                            <!--<a href="javascript:;" class="widget-collapse-option" data-toggle="collapse">-->
                                <!--<i class="fa fa-chevron-up"></i>-->
                            <!--</a>-->
                            <!--<a href="javascript:;" class="widget-refresh-option">-->
                                <!--<i class="fa fa-refresh"></i>-->
                            <!--</a>-->
                        <!--</span>-->
                    <!--</div>-->
                    <!--<div class="smart-widget-inner">-->
                        <!--<div class="smart-widget-hidden-section">-->
                            <!--<ul class="widget-color-list clearfix">-->
                                <!--<li style="background-color:#20232b;" data-color="widget-dark"></li>-->
                                <!--<li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>-->
                                <!--<li style="background-color:#23b7e5;" data-color="widget-blue"></li>-->
                                <!--<li style="background-color:#2baab1;" data-color="widget-green"></li>-->
                                <!--<li style="background-color:#edbc6c;" data-color="widget-yellow"></li>-->
                                <!--<li style="background-color:#fbc852;" data-color="widget-orange"></li>-->
                                <!--<li style="background-color:#e36159;" data-color="widget-red"></li>-->
                                <!--<li style="background-color:#7266ba;" data-color="widget-purple"></li>-->
                                <!--<li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>-->
                                <!--<li style="background-color:#fff;" data-color="reset"></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                        <!--<div class="smart-widget-body no-padding">-->
                            <!--<div class="padding-sm">-->
                                <!--<div class="btn-group">-->
                                    <!--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">-->
                                        <!--显示数量<span class="caret"></span>-->
                                    <!--</button>-->
                                    <!--<ul class="dropdown-menu pull-left" role="menu">-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(2, 10)">Top 10</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(2, 20)">Top 20</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(2, 30)">Top 30</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(2, 40)">Top 40</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(2, 50)">Top 50</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="javascript:;" onclick="changeNumBubble(2, -1)">全部</a></li>-->
                                    <!--</ul>-->
                                <!--</div>-->
                                <!--<div id="theme_company_bubble_chart" class="echarts" style="height:300px;"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>&lt;!&ndash; ./smart-widget-inner &ndash;&gt;-->
                <!--</div>&lt;!&ndash; ./smart-widget &ndash;&gt;-->
            <!--</div>&lt;!&ndash; ./col &ndash;&gt;-->
        <!--</div>-->

        <!-- 企业分布 -->
        <!--<div class="row">-->
            <!--<div class="col-lg-6">-->
                <!--<div class="smart-widget widget-green smart-widget-collapsed">-->
                    <!--<div class="smart-widget-header">-->
                        <!--企业信息-->
                        <!--<span class="smart-widget-option">-->
										<!--<span class="refresh-icon-animated">-->
											<!--<i class="fa fa-circle-o-notch fa-spin"></i>-->
										<!--</span>-->
			                            <!--<a href="javascript:;" class="widget-toggle-hidden-option">-->
			                                <!--<i class="fa fa-cog"></i>-->
			                            <!--</a>-->
			                            <!--<a href="javascript:;" class="widget-collapse-option" data-toggle="collapse">-->
			                                <!--<i class="fa fa-chevron-up"></i>-->
			                            <!--</a>-->
			                            <!--<a href="javascript:;" class="widget-refresh-option">-->
			                                <!--<i class="fa fa-refresh"></i>-->
			                            <!--</a>-->
			                            <!--<a href="javascript:;" class="widget-remove-option">-->
			                                <!--<i class="fa fa-times"></i>-->
			                            <!--</a>-->
			                        <!--</span>-->
                    <!--</div>-->
                    <!--<div class="smart-widget-inner">-->
                        <!--<div class="smart-widget-hidden-section">-->
                            <!--<ul class="widget-color-list clearfix">-->
                                <!--<li style="background-color:#20232b;" data-color="widget-dark"></li>-->
                                <!--<li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>-->
                                <!--<li style="background-color:#23b7e5;" data-color="widget-blue"></li>-->
                                <!--<li style="background-color:#2baab1;" data-color="widget-green"></li>-->
                                <!--<li style="background-color:#edbc6c;" data-color="widget-yellow"></li>-->
                                <!--<li style="background-color:#fbc852;" data-color="widget-orange"></li>-->
                                <!--<li style="background-color:#e36159;" data-color="widget-red"></li>-->
                                <!--<li style="background-color:#7266ba;" data-color="widget-purple"></li>-->
                                <!--<li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>-->
                                <!--<li style="background-color:#fff;" data-color="reset"></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                        <!--<div class="smart-widget-body no-padding">-->
                            <!--<div class="padding-sm">-->
                                <!--<div id="company_rank_chart" class="echarts" style="height:400px;"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>&lt;!&ndash; ./smart-widget-inner &ndash;&gt;-->
                <!--</div>&lt;!&ndash; ./smart-widget &ndash;&gt;-->
            <!--</div>&lt;!&ndash; ./col &ndash;&gt;-->
            <!--<div class="col-lg-6">-->
                <!--<div class="smart-widget widget-green smart-widget-collapsed">-->
                    <!--<div class="smart-widget-header">-->
                        <!--TOTAL SALES-->
                        <!--<span class="smart-widget-option">-->
										<!--<span class="refresh-icon-animated">-->
											<!--<i class="fa fa-circle-o-notch fa-spin"></i>-->
										<!--</span>-->
			                            <!--<a href="javascript:;" class="widget-toggle-hidden-option">-->
			                                <!--<i class="fa fa-cog"></i>-->
			                            <!--</a>-->
			                            <!--<a href="javascript:;" class="widget-collapse-option" data-toggle="collapse">-->
			                                <!--<i class="fa fa-chevron-up"></i>-->
			                            <!--</a>-->
			                            <!--<a href="javascript:;" class="widget-refresh-option">-->
			                                <!--<i class="fa fa-refresh"></i>-->
			                            <!--</a>-->
			                            <!--<a href="javascript:;" class="widget-remove-option">-->
			                                <!--<i class="fa fa-times"></i>-->
			                            <!--</a>-->
			                        <!--</span>-->
                    <!--</div>-->
                    <!--<div class="smart-widget-inner">-->
                        <!--<div class="smart-widget-hidden-section">-->
                            <!--<ul class="widget-color-list clearfix">-->
                                <!--<li style="background-color:#20232b;" data-color="widget-dark"></li>-->
                                <!--<li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>-->
                                <!--<li style="background-color:#23b7e5;" data-color="widget-blue"></li>-->
                                <!--<li style="background-color:#2baab1;" data-color="widget-green"></li>-->
                                <!--<li style="background-color:#edbc6c;" data-color="widget-yellow"></li>-->
                                <!--<li style="background-color:#fbc852;" data-color="widget-orange"></li>-->
                                <!--<li style="background-color:#e36159;" data-color="widget-red"></li>-->
                                <!--<li style="background-color:#7266ba;" data-color="widget-purple"></li>-->
                                <!--<li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>-->
                                <!--<li style="background-color:#fff;" data-color="reset"></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                        <!--<div class="smart-widget-body no-padding">-->
                            <!--<div class="padding-sm">-->
                                <!--<div id="placeholder" style="height:400px;"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>&lt;!&ndash; ./smart-widget-inner &ndash;&gt;-->
                <!--</div>&lt;!&ndash; ./smart-widget &ndash;&gt;-->
            <!--</div>&lt;!&ndash; ./col &ndash;&gt;-->
        <!--</div>-->

        <!-- 数据总览 -->
        <div class="row">
            <!-- 最新舆情 -->
            <div class="col-lg-6">
                <p id="bubble_num_limit" hidden="hidden">-1</p>
                <div class="smart-widget widget-green">
                    <div class="smart-widget-header">
                        最新舆情
                        <span class="smart-widget-option">
                            <span class="refresh-icon-animated">
                                <i class="fa fa-circle-o-notch fa-spin"></i>
                            </span>
                            <a href="javascript:;" class="widget-toggle-hidden-option">
                                <i class="fa fa-cog"></i>
                            </a>
                            <a href="javascript:;" class="widget-collapse-option" data-toggle="collapse">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a href="javascript:;" class="widget-refresh-option">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </span>
                    </div>
                    <div class="smart-widget-inner">
                        <div class="smart-widget-hidden-section">
                            <ul class="widget-color-list clearfix">
                                <li style="background-color:#20232b;" data-color="widget-dark"></li>
                                <li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>
                                <li style="background-color:#23b7e5;" data-color="widget-blue"></li>
                                <li style="background-color:#2baab1;" data-color="widget-green"></li>
                                <li style="background-color:#edbc6c;" data-color="widget-yellow"></li>
                                <li style="background-color:#fbc852;" data-color="widget-orange"></li>
                                <li style="background-color:#e36159;" data-color="widget-red"></li>
                                <li style="background-color:#7266ba;" data-color="widget-purple"></li>
                                <li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>
                                <li style="background-color:#fff;" data-color="reset"></li>
                            </ul>
                        </div>
                        <div class="smart-widget-body no-padding">
                            <div class="padding-sm">
                                <table class="table table-hover" style="background:#fff;">
                                    <tbody>
                                    <?php if(is_array($news) || $news instanceof \think\Collection): if( count($news)==0 ) : echo "" ;else: foreach($news as $k=>$model): ?>
                                    <tr>
                                        <td><a target="_blank" href="<?php echo $model['url']; ?>"><?php echo formatText($model['title'],18); ?></a></td>
                                        <td><?php echo formatText($model['origin'],4); ?></td>
                                        <td><?php echo formatTime($model['time']); ?></td>
                                        <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- ./smart-widget-inner -->
                </div><!-- ./smart-widget -->
            </div><!-- ./col -->

            <!-- 媒体覆盖 -->
            <p id="theme_bubble_limit" hidden="hidden"></p>
            <div class="col-lg-6">
                <div class="smart-widget widget-green">
                    <div class="smart-widget-header">
                        媒体覆盖
                        <span class="smart-widget-option">
                            <span class="refresh-icon-animated">
                                <i class="fa fa-circle-o-notch fa-spin"></i>
                            </span>
                            <a href="javascript:;" class="widget-toggle-hidden-option">
                                <i class="fa fa-cog"></i>
                            </a>
                            <a href="javascript:;" class="widget-collapse-option" data-toggle="collapse">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a href="javascript:;" class="widget-refresh-option">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </span>
                    </div>
                    <div class="smart-widget-inner">
                        <div class="smart-widget-hidden-section">
                            <ul class="widget-color-list clearfix">
                                <li style="background-color:#20232b;" data-color="widget-dark"></li>
                                <li style="background-color:#4c5f70;" data-color="widget-dark-blue"></li>
                                <li style="background-color:#23b7e5;" data-color="widget-blue"></li>
                                <li style="background-color:#2baab1;" data-color="widget-green"></li>
                                <li style="background-color:#edbc6c;" data-color="widget-yellow"></li>
                                <li style="background-color:#fbc852;" data-color="widget-orange"></li>
                                <li style="background-color:#e36159;" data-color="widget-red"></li>
                                <li style="background-color:#7266ba;" data-color="widget-purple"></li>
                                <li style="background-color:#f5f5f5;" data-color="widget-light-grey"></li>
                                <li style="background-color:#fff;" data-color="reset"></li>
                            </ul>
                        </div>
                        <div class="smart-widget-body no-padding">
                            <div class="padding-sm">
                                <div id="meida_distribution_pie_chart" style="height: 300px"></div>
                            </div>
                        </div>
                    </div><!-- ./smart-widget-inner -->
                </div><!-- ./smart-widget -->
            </div><!-- ./col -->
        </div>
    </div>
</div><!-- /main-container -->
<footer class="footer">
				<span class="footer-brand">
					<strong class="text-danger" id="time">正在获取系统时间...</strong>
				</span>
    <p class="no-margin pull-right">
        &copy; 2017 <strong>华夏经纬舆情监测系统</strong>. ALL Rights Reserved.
    </p>
</footer>
</div><!-- /wrapper -->

<a href="javascript:;" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>
</body>
</html>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Bootstrap -->
<script src="__PUBLIC__/js/bootstrap.min.js"></script>

<!-- Flot -->
<script src='__PUBLIC__/js/jquery.flot.min.js'></script>

<!-- Slimscroll -->
<script src='__PUBLIC__/js/jquery.slimscroll.min.js'></script>

<!-- Morris -->
<script src='__PUBLIC__/js/rapheal.min.js'></script>
<script src='__PUBLIC__/js/morris.min.js'></script>

<!-- Datepicker -->
<script src='__PUBLIC__/js/uncompressed/datepicker.js'></script>

<!-- Sparkline -->
<script src='__PUBLIC__/js/sparkline.min.js'></script>

<!-- Skycons -->
<script src='__PUBLIC__/js/uncompressed/skycons.js'></script>

<!-- Popup Overlay -->
<script src='__PUBLIC__/js/jquery.popupoverlay.min.js'></script>

<!-- Easy Pie Chart -->
<script src='__PUBLIC__/js/jquery.easypiechart.min.js'></script>

<!-- Sortable -->
<script src='__PUBLIC__/js/uncompressed/jquery.sortable.js'></script>

<!-- Owl Carousel -->
<script src='__PUBLIC__/js/owl.carousel.min.js'></script>

<!-- Modernizr -->
<script src='__PUBLIC__/js/modernizr.min.js'></script>

<!-- Echarts -->
<script src="__PUBLIC__/js/Echarts/echarts.js"></script>

<!-- Simplify -->
<script src="__PUBLIC__/js/simplify/simplify.js"></script>
<div class="custom-popup" id="warn-popup" style="width:200px;display:none;">
	<div class="popup-body text-center">
		<h5></h5>
		<div class="text-center m-top-lg">
			<a class="btn btn-success m-center-sm warn-do">返回</a>
		</div>
	</div>
</div>
<script>
var url = "";
function popWarn(con, href){
	href = href || '';
	if(href!=''){
		url = href;
	}
	$('#warn-popup h5').html(con);
	$('#warn-popup').popup('show');
}
$('.warn-do').on('click', function(){
	$('#warn-popup').popup('hide');
	if(url != ''){
		window.location.href = url;
	}
});
$(function(){
	//Delete Widget Confirmation
	$('#confirm-popup').popup({
		vertical: 'top',
		transition: 'all 0.3s'
	});
});
</script>
<!-- show time -->
<script>
    function startTime() {
        var today = new Date();//定义日期对象
        var yyyy = today.getFullYear();//通过日期对象的getFullYear()方法返回年
        var MM = today.getMonth() + 1;//通过日期对象的getMonth()方法返回年
        var dd = today.getDate();//通过日期对象的getDate()方法返回年
        var hh = today.getHours();//通过日期对象的getHours方法返回小时
        var mm = today.getMinutes();//通过日期对象的getMinutes方法返回分钟
        var ss = today.getSeconds();//通过日期对象的getSeconds方法返回秒
        // 如果分钟或小时的值小于10，则在其值前加0，比如如果时间是下午3点20分9秒的话，则显示15：20：09
        hh = checkTime(hh);
        MM = checkTime(MM);
        dd = checkTime(dd);
        mm = checkTime(mm);
        ss = checkTime(ss);
        var day; //用于保存星期（getDay()方法得到星期编号）
        if (today.getDay() == 0)   day = "星期日 ";
        if (today.getDay() == 1)   day = "星期一 ";
        if (today.getDay() == 2)   day = "星期二 ";
        if (today.getDay() == 3)   day = "星期三 ";
        if (today.getDay() == 4)   day = "星期四 ";
        if (today.getDay() == 5)   day = "星期五 ";
        if (today.getDay() == 6)   day = "星期六 ";
        document.getElementById('time').innerHTML = hh + ":" + mm + ":" + ss + "  " + yyyy + "-" + MM + "-" + dd + " " + day;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(startTime, 1000);//每一秒中重新加载startTime()方法

    $('.logout').on('click', function () {
        $.get('__PRO_PATH__/UserAdmin/dologout', {}, function (res) {
            if (res.errorcode == 0) {
                window.location.href = '__PRO_PATH__/UserAdmin/login';
            } else {
                popWarn(res.msg);
            }
        });
    });
    $('#clearCache').on('click', function () {
        $.get('__PRO_PATH__/Index/clearcache', function (res) {
            if (res.errorcode == 0) {
                popWarn('清空缓存成功');
            } else {
                popWarn('清空缓存失败');
            }
        });
    });
    $('#logout').on('click', function () {
        $.get('__PRO_PATH__/UserAdmin/dologout', {}, function (res) {
            if (res.errorcode == 0) {
                window.location.href = '__PRO_PATH__/UserAdmin/login';
            } else {
                popWarn(res.msg);
            }
        });
    });
    
    $('#searchToggle').on('click', function () {
        $('#searchDiv').toggle({transition: 'all 0.3s'});
    });

    $('.contact').on('click', function () {
        popWarn('请联系管理员：Admin <br/><br/> 联系方式：1234567890');
    })
</script>

<script>
    $('#tax-nav-dashborad').addClass('active');

    //Flot Chart (Total Sales)
    var d1 = [];
    for (var i = 0; i <= 10; i += 1) {
        //d1.push([i, parseInt(Math.random() * 30)]);
        d1 = [[0,700],[1,1200],[2,1100],[3,900],[4,500],[5,700],[6,500],[7,600],[8,1200],[9,1700],[10,1200]];
    }

    function plotWithOptions() {
        $.plot("#placeholder", [d1], {
            series: {
                lines: {
                    show: true,
                    fill: true,
                    fillColor: '#eee',
                    steps: false,

                },
                points: {
                    show: true,
                    fill: false
                }
            },

            grid: {
                color: '#fff',
                hoverable: true,
                autoHighlight: true,
            },
            colors: [ '#bbb'],
        });
    }

    $("<div id='tooltip'></div>").css({
        position: "absolute",
        display: "none",
        border: "1px solid #222",
        padding: "4px",
        color: "#fff",
        "border-radius": "4px",
        "background-color": "rgb(0,0,0)",
        opacity: 0.90
    }).appendTo("body");

    $("#placeholder").bind("plothover", function (event, pos, item) {

        var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
        $("#hoverdata").text(str);

        if (item) {
            var x = item.datapoint[0],
                    y = item.datapoint[1];

            $("#tooltip").html("Total Sales : " + y)
                    .css({top: item.pageY+5, left: item.pageX+5})
                    .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });

    //plotWithOptions();

    //Morris Chart (Total Visits)
//    var totalVisitChart = Morris.Bar({
//        element: 'totalSalesChart',
//        data: [
//            { y: '2008', a: 100, b: 90 },
//            { y: '2009', a: 75,  b: 65 },
//            { y: '2010', a: 50,  b: 40 },
//            { y: '2011', a: 75,  b: 65 },
//            { y: '2012', a: 50,  b: 40 },
//            { y: '2013', a: 75,  b: 65 },
//            { y: '2014', a: 100, b: 90 }
//        ],
//        xkey: 'y',
//        ykeys: ['a', 'b'],
//        labels: ['Total Visits', 'Bounce Rate'],
//        barColors: ['#999', '#eee'],
//        grid: false,
//        gridTextColor: '#777',
//    });

    var params = {};
    // 获取参数设置
    function getParams(){
        var tblimit = $('#theme_bubble_limit').text();
        params['limit'] = parseInt(tblimit);
        var bnlimit = $('#bubble_num_limit').text();
        params['bubble_num_limit'] = parseInt(bnlimit);
    }

    // 改变气泡图显示数量
    function changeNumBubble(obj, num){
        switch(obj){
            case 1:
                $('#bubble_num_limit').text(num);
                getParams();
                showCompanyBubble(params);
                break;
            case 2:
                $('#theme_bubble_limit').text(num);
                getParams();
                showThemeBubble(params);
                break;
        }
    }

    $(function () {
        $('.chart').easyPieChart({
            easing: 'easeOutBounce',
            size: '140',
            lineWidth: '7',
            barColor: '#7266ba',
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });

        $('#bubble_num_limit').text(10);
        $('#theme_bubble_limit').text(10);
        getParams();

//        showThemeBubble(params);
//        showCompanyBubble(params);
        showMedia();
        //showCompanyRankPie(params);
        $('.sortable-list').sortable();

        $('.todo-checkbox').click(function () {

            var _activeCheckbox = $(this).find('input[type="checkbox"]');

            if (_activeCheckbox.is(':checked')) {
                $(this).parent().addClass('selected');
            }
            else {
                $(this).parent().removeClass('selected');
            }

        });

        //Delete Widget Confirmation
        $('#deleteWidgetConfirm').popup({
            vertical: 'top',
            pagecontainer: '.container',
            transition: 'all 0.3s'
        });
    });
</script>
<script src="__PUBLIC__/js/simplify/simplify_dashboard.js"></script>
<!--<script src="https://cdn.jsdelivr.net/backbonejs/1.2.2/backbone-min.js" integrity="sha256-p6bkfFqmxtebrKOS+wyGi+Qf3d111eWUQP67keyXJ6Q=" crossorigin="anonymous"></script>-->
<!--<script src="__PUBLIC__/js/MyJs/search.js"></script>-->

<script type="text/template" id="results-template">
            <h2 class="page-header">Search for '<span class="text-color-default"><%- content.query %></span>'</h2>
                                               <% if (content.nbHits > 0) { %>
    <div class="row fontawesome-icon-list">
        <%= results %>
                </div>
                <% } else { %>
    <div class="alert alert-danger text-lg" role="alert">
                <h3 class="margin-top margin-bottom-lg"><i class="fa fa-meh-o" aria-hidden="true"></i> Oops! No icons matched your query.</h3>
        A few things that might help:
                <ol>
        <li>
        Use <a class="alert-link" href="https://fortawesome.com">Fort Awesome</a> (our latest project) to add your
        own icons and take your icon game to the next level!
        </li>
        <li>
        Really, really want to see an icon in Font Awesome?
    <a class="alert-link" href="mailto:dave@fortawesome.com">Drop me an email</a> to commission the icons you need!
        </li>
        <li>
        Are we missing something in our search results?
    <a class="alert-link" href="https://github.com/FortAwesome/Font-Awesome/issues/new">Open an issue on GitHub!</a>
        (Make sure to <a class="alert-link" href="https://github.com/FortAwesome/Font-Awesome/issues">search existing
        issues first</a>.)
    </li>
        </ol>
        </div>
        <% } %>
</script>