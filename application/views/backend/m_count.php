<!DOCTYPE html>
<html>

<head>
    <title>Forms</title>
    <!-- Bootstrap -->
    <link href="<?echo $base_url;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?echo $base_url;?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?echo $base_url;?>assets/styles.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?echo $base_url;?>vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?echo $base_url;?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
                    <a href=""><i class="icon-chevron-right"></i> 月統計</a>
                </li>

            </ul>
        </div>
        <!--/span-->
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">查看月統計</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" action="?" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>搜尋月統計</legend>
                                    <div class="control-group success">
                                        <label class="control-label" for="selectError">年份</label>
                                        <div class="controls">
                                            <select id="selectError"  name="y">
                                                <option>2016</option>
                                                <option>2017</option>
                                            </select>
                                            <span class="help-inline"></span>
                                        </div>
                                    </div>
                                    <div class="control-group success">
                                        <label class="control-label" for="selectError">月份</label>
                                        <div class="controls">
                                            <select id="selectError" name="m">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                            <span class="help-inline"></span>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" name="search" value="1">搜尋</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>
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
<link href="<?php echo $base_url;?>vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="<?php echo $base_url;?>vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="<?php echo $base_url;?>vendors/chosen.min.css" rel="stylesheet" media="screen">

<link href="<?php echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

<script src="<?php echo $base_url;?>vendors/jquery-1.9.1.js"></script>
<script src="<?php echo $base_url;?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url;?>vendors/jquery.uniform.min.js"></script>
<script src="<?php echo $base_url;?>vendors/chosen.jquery.min.js"></script>
<script src="<?php echo $base_url;?>vendors/bootstrap-datepicker.js"></script>

<script src="<?php echo $base_url;?>vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

<script src="<?php echo $base_url;?>vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<script type="text/javascript" src="<?php echo $base_url;?>vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $base_url;?>assets/form-validation.js"></script>

<script src="<?php echo $base_url;?>assets/scripts.js"></script>
<script>

    jQuery(document).ready(function() {
        FormValidation.init();
    });


    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.bar').css({width:$percent+'%'});
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
        $('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>
</body>

</html>