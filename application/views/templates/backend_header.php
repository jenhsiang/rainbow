<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Admin Home Page</title>
    <!-- Bootstrap -->
    <link href="<?php echo $base_url;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>assets/styles.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $base_url;?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Panel</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Vincent Gabriel <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="login.html">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="">
                        <a href="<?php echo $base_url.'index.php/backend/menu_list'?>">選單管理</a>
                    </li>
                    <li class="">
                        <a href="<?php echo $base_url.'index.php/backend/s_page_list'?>">獨立文章管理</a>
                    </li>
                    <li class="">
                        <a href="<?php echo $base_url.'index.php/backend/m_page_list'?>">列表文章管理</a>
                    </li>
                    <li class="">
                        <a href="<?php echo $base_url.'index.php/backend/e_page_list'?>">經驗分享管理</a>
                    </li>
                    <li class="">
                        <a href="<?php echo $base_url.'index.php/backend/doctor_list'?>">醫師管理</a>
                    </li>
                    <!--
                    <li class="">
                        <a href="<?php echo $base_url.'index.php//backend/member_list'?>">診療時間管理</a>
                    </li>
                    -->


                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>