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
    <!--swiper-->
    <script src="<?echo $base_url;?>assets_view/js/swiper/idangerous.swiper-2.0.min.js"></script>


</head>
<body onload="body_onload();">
<div class="content">
    <nav class="navFive">
        <a href="<?echo $base_url;?>index.php" <?if(!empty($locate) && $locate == 1){ echo 'class="arrive"';}?>><img src="<?echo $base_url;?>assets_view/images/navA.png"><p>首頁</p></a>
        <a href="<?echo $base_url;?>index.php/fav" <?if(!empty($locate) && $locate == 2){ echo 'class="arrive"';}?>><img src="<?echo $base_url;?>assets_view/images/navB.png"><p>最愛</p></a>
        <a href="<?echo $base_url;?>index.php/reservatelist" <?if(!empty($locate) && $locate == 3){ echo 'class="arrive"';}?>><img src="<?echo $base_url;?>assets_view/images/navC.png"><p>預約</p></a>
        <a href="<?echo $base_url;?>index.php/ask_list" <?if(!empty($locate) && $locate == 4){ echo 'class="arrive"';}?>><img src="<?echo $base_url;?>assets_view/images/navD.png"><p>諮詢</p></a>
        <a href="<?echo $base_url;?>index.php/member_info?ur=<? if(isset($uid)){ echo $uid;}?>" <?if(!empty($locate) && $locate == 5){ echo 'class="arrive"';}?>><img src="<?echo $base_url;?>assets_view/images/navE.png"><p>設定</p></a>
    </nav>
    <nav class="nav ">
        <div class="logo"><a href=""><img src="<?echo $base_url;?>assets_view/images/logo.png"></a></div>
        <div id="menu" class="navMain">
            <a href="<?echo $base_url;?>index.php">
                <p>首頁</p></a><a href="<?echo $base_url;?>index.php">

            <? if(empty($login)) {?>
                    <a href="<?echo $base_url;?>index.php/login"><p>會員登入/註冊</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_login"><p>廠商登入/註冊</p></a>
                    <!--<a href="<?echo $base_url;?>index.php/reg""><p>會員註冊</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_reg"><p>廠商註冊</p></a> -->
                <? }elseif($login == 1){ ?>
                    <a href="<?echo $base_url;?>index.php/member_info"><p>資料設定</p></a>
                    <a href="<?echo $base_url;?>index.php/wallet"><p>彩虹錢包</p></a>
                    <a href="<?echo $base_url;?>index.php/myshare"><p>分享彩虹</p></a>
                    <a href="<?echo $base_url;?>index.php/reservatelist"><p>預約紀錄</p></a>
                    <a href="<?echo $base_url;?>index.php/ask_list"><p>諮詢紀錄</p></a>
                    <a href="<?echo $base_url;?>index.php/fav"><p>我的最愛</p></a>
                    <a href="<?echo $base_url;?>index.php/logout"><p>登出</p></a>
                <? }elseif($login == 2){ ?>
                     <a href="<?echo $base_url;?>index.php/firm_info"><p>資料設定</p></a>
                    <a href="<?echo $base_url;?>index.php/myshare"><p>分享彩虹</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_about"><p>編輯關於我</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_service_time"><p>我的服務時間</p></a>
                    <a href="<?echo $base_url;?>index.php/firm_photo"><p>作品管理</p></a>
                     <a href="<?echo $base_url;?>index.php/firm_list"><p>服務管理</p></a>
                     <a href="<?echo $base_url;?>index.php/reservatelist_firm"><p>預約紀錄</p></a>
                    <a href="<?echo $base_url;?>index.php/ask_list"><p>諮詢紀錄</p></a>
                     <a href="<?echo $base_url;?>index.php/logout"><p>登出</p></a>
                <?}?>
        </div>


        <a href="javascript:history.back()" class="back" style="width: 50px;">返回
        </a>
        <? if(isset($gold))
        {
            echo '<span style="color: #ce77ff; float: right; line-height: 28px; font-size: 14px;"><img src="'.$base_url.'assets_view/images/gold.png" style="height:20px;">'.$gold.'</span>';
            echo '<span style="color: #ce77ff; float: right; line-height: 28px; font-size: 14px;"><img src="'.$base_url.'assets_view/images/gold2.png" style="height:20px;">'.$gold2.'</span>';
        }
        ?>
    </nav>