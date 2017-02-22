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
    <!-- Swiper-->
    <link href="<?echo $base_url;?>assets_view/css/swiper/idangerous.swiper.css" rel="stylesheet">
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
    <script>

        document.oncontextmenu = function(){
            window.event.returnValue=false; //將滑鼠右鍵事件取消
        }

    </script>

</head>
<body>
<div class="content">
    <nav class="navFive">
        <a href="<?echo $base_url;?>index.php" class="arrive"><img src="<?echo $base_url;?>assets_view/images/navA.png"><p>首頁</p></a>
        <a href="<?echo $base_url;?>index.php/fav"><img src="<?echo $base_url;?>assets_view/images/navB.png"><p>最愛</p></a>
        <a href="<?echo $base_url;?>index.php/reservatelist"><img src="<?echo $base_url;?>assets_view/images/navC.png"><p>預約</p></a>
        <a href="<?echo $base_url;?>index.php/ask_list"><img src="<?echo $base_url;?>assets_view/images/navD.png"><p>諮詢</p></a>
        <a href="<?echo $base_url;?>index.php/member_info?ur=<? if(isset($uid)){ echo $uid;}?>"><img src="<?echo $base_url;?>assets_view/images/navE.png"><p>設定</p></a>
            </nav>
    <nav class="nav">
        <div class="logo"><a href=""><img src="<?echo $base_url;?>assets_view/images/logo.png"></a></div>
        <div id="menu" class="navMain">
            <a href="<?echo $base_url;?>index.php">
                <p>首頁</p></a><a href="<?echo $base_url;?>index.php">
                <? if(empty($login)) {?>
                <a href="<?echo $base_url;?>index.php/login"><p>會員登入/註冊</p></a>
                <a href="<?echo $base_url;?>index.php/firm_login"><p>廠商登入/註冊</p></a>
                <!--<a href="<?echo $base_url;?>index.php/reg""><p>會員註冊</p></a>
            <a href="<?echo $base_url;?>index.php/firm_reg"><p>廠商註冊</p></a>-->
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
        <div class="area">
            <? if(isset($gold))
            {
                echo '<span style="color: #ce77ff; float: right; line-height: 28px; font-size: 14px;"><img src="'.$base_url.'assets_view/images/gold.png" style="height:20px;">'.$gold.'</span>';
                echo '<span style="color: #ce77ff; float: right; line-height: 28px; font-size: 14px;"><img src="'.$base_url.'assets_view/images/gold2.png" style="height:20px;">'.$gold2.'</span>';
            }
            ?>

        </div>
        <div class="search">
            <form action="?" method="post" ><span class="sb-icon-search"></span>
                <div class="inputAll">
                    <input placeholder="輸入關鍵字" type="text" value="" name="search" class="sb-search-input">
                    <select class="sb-search-select" id="city" name="city">
                        <<?
                        if(isset($city))
                        {
                            foreach($city as $key=>$item)
                            {
                                ?>
                                <option value="<?echo $item["id"]?>"><?echo $item["city"]?></option>
                                <?
                            }
                        }
                        ?>
                    </select>
                    <select class="sb-search-select" id="zone" name="zone">
                        <?
                        if(isset($area))
                        {
                            foreach($area as $key=>$item)
                            {
                                ?>
                                <option value="<?echo $item["id"]?>"><?echo $item["area"]?></option>
                                <?
                            }
                        }
                        ?>
                    </select>
                    <select class="sb-search-select" id="cat" name="cat">
                        <?
                        if(!empty($cat))
                        {
                            for($i=0; $i<count($cat);$i++)
                            {
                                ?>
                                <option value="<?echo $cat[$i]["id"];?>"><?echo $cat[$i]["name"];?></option>
                                <?
                            }
                        }
                        ?>
                    </select>
                    <select class="sb-search-select" name="way">
                        <option value="1">到府服務</option>
                        <option value="2">到店服務</option>
                        <option value="3">兩者皆有</option>
                    </select>
                    <button class="sb-search-button" name="search" value="1">搜尋</button>
                </div>
            </form>
            <script type="text/javascript">
                $("#city").change(function() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Index/get_city'); ?>",
                        data: { city: $("#city").val()},
                        success: function(data) {
                            var step1 = data.split("-");
                            var area = step1[0].split(",");
                            var id = step1[1].split(",");
                            var zone = document.getElementById("zone");
                            $('#zone').find('option').remove().end();
                            var new_option;
                            //alert(selected);
                            for (var i=0;i<area.length;i++)
                            {
                                new_option = new Option(area[i], id[i]);
                                zone.options.add(new_option);
                            }
                        }
                    });
                });
            </script>
        </div>
    </nav>