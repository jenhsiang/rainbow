<!DOCTYPE html>
<html>

<head>
    <title>Tables</title>
    <!-- Bootstrap -->
    <link href="<?php echo $base_url;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>assets/styles.css" rel="stylesheet" media="screen">
    <link href="<?php echo $base_url;?>assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $base_url;?>vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo $base_url;?>http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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
                    <li class=""><a href="<?php echo $base_url."index.php/backend/firm_list"?>">管理廠商</a></li>
                    <li class=""><a href="<?php echo $base_url."index.php/backend/member_list"?>">管理會員</a></li>
                    <li class=""><a href="<?php echo $base_url."index.php/backend/service_list"?>">管理服務</a></li>
                    <li class=""><a href="<?php echo $base_url."index.php/backend/order_list"?>">管理預約</a></li>
                    <li class=""><a href="<?php echo $base_url."index.php/backend/a_list"?>">管理爭議</a></li>
                    <li class=""><a href="<?php echo $base_url."index.php/backend/m_count"?>">月統計</a></li>
                    <li class=""><a href="<?php echo $base_url."index.php/backend/set"?>">傭金設定</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li>
                    <a href="">預約管理</a>
                </li>

            </ul>
        </div>
        <!--/span-->
        <div class="span9" id="content">




            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Bootstrap dataTables with Toolbar</div>
                    </div>
                    <form action="?" method="post" enctype="multipart/form-data">
                    <div class="block-content collapse in">
                        <div class="span12">
                            <!--
                            <div class="table-toolbar">
                                <div class="btn-group">
                                    <a href="#"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            -->

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                <thead>
                                <tr>
                                    <th>訂單ID</th>
                                    <th>服務名稱</th>
                                    <th>彩虹價格</th>
                                    <th>廠商</th>
                                    <th>訂購人</th>
                                    <th>預約時間</th>
                                    <th>狀態</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($order))
                                {
                                    foreach($order as $item)
                                    {
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$item["id"].'</td>';
                                        echo '<td>'.$item["name"].'<p><a href="'.$base_url.'index.php/service?id='.$item["s_id"].'" target="_blank">瀏覽</a></p></td>';
                                        echo '<td>'.$item["fee"].'</td>';
                                        echo '<td>'.$item["f_name"].'<br>'.$item["f_tel"].'</td>';
                                        echo '<td>'.$item["m_name"].'<br>'.$item["m_tel"].'</td>';
                                        echo '<td>'.$item["re_date"].'<br>'.$item["re_time"].'</td>';
                                        echo '<td>'.$item["state"].'</td>';

                                        echo '</tr>';
                                    }
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                        </form>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <p>&copy; Vincent Gabriel 2013</p>
    </footer>
</div>
<!--/.fluid-container-->

<script src="<?php echo $base_url;?>vendors/jquery-1.9.1.js"></script>
<script src="<?php echo $base_url;?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url;?>vendors/datatables/js/jquery.dataTables.min.js"></script>


<script src="<?php echo $base_url;?>assets/scripts.js"></script>
<script src="<?php echo $base_url;?>assets/DT_bootstrap.js"></script>
<script>
    $(function() {

    });
</script>
</body>

</html>
</div>