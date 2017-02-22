<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?echo $base_url;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?echo $base_url;?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?echo $base_url;?>assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?echo $base_url;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body id="login">
<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">好時機管理系統</h2>
        <input type="text" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">登入</button>
    </form>

</div> <!-- /container -->
<script src="<?echo $base_url;?>vendors/jquery-1.9.1.min.js"></script>
<script src="<?echo $base_url;?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>