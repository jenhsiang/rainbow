<!DOCTYPE html>
<html>
<head>
    <title>彩虹橋</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=0">
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--link(rel='icon', type='image/ico', href='assets/images/favicon.ico')-->
    <link href="<?echo $base_url;?>assets_view/css/main.css" rel="stylesheet">
    <script src="<?echo $base_url;?>assets_view/js/jquery.js"></script>
    <script src="<?echo $base_url;?>assets_view/js/action.js"></script>
    <!--Slicknav-->
    <script src="<?echo $base_url;?>assets_view/js/slicknav/modernizr2.6.2.min.js"></script>
    <script src="<?echo $base_url;?>assets_view/js/slicknav/jquery.slicknav.js"></script>
    <script>
        $(document).ready(function(){
            $('#menu').slicknav();
        });

    </script>
    <!--owl-->
    <script src="<?echo $base_url;?>assets_view/js/owl/owl.carousel.js"></script>
</head>
<body>
<div class="content">
    <nav class="navFive"><a href="<?echo $base_url;?>index.php" class="arrive"><img src="<?echo $base_url;?>assets_view/images/navAW.png">
            <p>首頁</p></a><a href="<?echo $base_url;?>"><img src="<?echo $base_url;?>assets_view/images/navB.png">
            <p>最愛</p></a><a href=""><img src="<?echo $base_url;?>assets_view/images/navC.png">
            <p>預約</p></a><a href=""><img src="<?echo $base_url;?>assets_view/images/navD.png">
            <p>諮詢</p></a><a href="<?echo $base_url;?>index.php/login"><img src="<?echo $base_url;?>assets_view/images/navE.png">
            <p>設定</p></a></nav>
    <nav class="nav">
        <div class="logo"><a href=""><img src="<?echo $base_url;?>assets_view/images/logo.png"></a></div>
        <div id="menu" class="navMain"><a href="<?echo $base_url;?>index.php">
                <p>首頁</p></a><a href="<?echo $base_url;?>index.php">
                <p>最愛</p></a><a href="">
                <p>預約</p></a><a href="">
                <p>諮詢</p></a><a href="<?echo $base_url;?>index.php/login">
                <p>設定</p></a>
                 <? if(empty($login)) {?>
                    <a href="<?echo $base_url;?>index.php/login"><p>會員登入</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_login"><p>廠商登入</p></a>
                    <a href="<?echo $base_url;?>index.php/reg""><p>會員註冊</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_reg"><p>廠商註冊</p></a>
                <? }elseif($login == 1){ ?>
                    <a href="<?echo $base_url;?>index.php/logout"><p>登出</p></a>
                <? }elseif($login == 2){ ?>
                     <a href="<?echo $base_url;?>index.php/firm_info"><p>資料設定</p></a>
                     <a href="<?echo $base_url;?>index.php/firm_list"><p>服務管理</p></a>
                     <a href=""><p>訂單管理</p></a>
                     <a href="<?echo $base_url;?>index.php/logout"><p>登出</p></a>
                <?}?>
                </div>
        <div class="area">
            <select name="area" onchange="changearea(this)">
                <option value="中正區">中正區</option>
                <option value="大同區">大同區</option>
                <option value="中山區">中山區</option>
                <option value="松山區">松山區</option>
                <option value="大安區">大安區</option>
                <option value="萬華區">萬華區</option>
                <option value="信義區">信義區</option>
                <option value="士林區">士林區</option>
                <option value="北投區">北投區</option>
                <option value="內湖區">內湖區</option>
                <option value="南港區">南港區</option>
                <option value="文山區">文山區</option>
            </select>
        </div>
        <div class="search">
            <form><span class="sb-icon-search"></span>
                <input placeholder="輸入關鍵字" type="text" value="" name="search" class="sb-search-input">
            </form>
        </div>
    </nav>