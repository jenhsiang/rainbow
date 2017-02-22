<html>
<head>
    <title>彩虹橋</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=0">
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--link(rel='icon', type='image/ico', href='assets/images/favicon.ico')-->
    <link href="<?php echo $base_url;?>assets_view/css/main.css" rel="stylesheet">
    <script src="<?php echo $base_url;?>assets_view/js/jquery.js"></script>
    <script src="<?php echo $base_url;?>assets_view/js/action.js"></script>
    <!--Slicknav-->
    <script src="<?php echo $base_url;?>assets_view/js/slicknav/modernizr2.6.2.min.js"></script>
    <script src="<?php echo $base_url;?>assets_view/js/slicknav/jquery.slicknav.js"></script>
    <script>
        $(document).ready(function(){
            $('#menu').slicknav();
        });

    </script>
    <!--owl-->
    <script src="<?php echo $base_url;?>assets_view/js/owl/owl.carousel.js"></script>
    <!--swiper-->
    <script src="<?php echo $base_url;?>assets_view/js/swiper/idangerous.swiper-2.0.min.js"></script>
</head>
<body>
<form action="?" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="hidden" name="uid" value="<?php echo $uid;?>">
<section class="chatB"><a href="<?php echo $base_url;?>index.php/service?id=<?php echo $id;?>" class="back">返回</a>
    <div class="windows">
        <p><?php echo $to;?><span></span></p>
    </div>
    <div class="typeBox">
        <input placeholder="輸入訊息" name="message">
    </div>
    <div class="chat">
        <div class="date">提醒您,在未預約完成前,建議不要提供個人聯繫方式。</div>
        <?php
        if(!empty($message))
            {
                for($i=0; $i<count($message);$i++)
                {
                    ?>
                    <div class="chatBox <?php if($message[$i]["user_type"]==$login){echo "myself";}else{echo "somebody";}?>"><span class="time"><?php echo $message[$i]["time"];?></span><span class="box"><?php echo $message[$i]["content"];?></span></div>
                    <?php
                }
            }

        if(!empty($message_unread))
        {
            for($i=0; $i<count($message_unread);$i++)
            {
                ?>
                <div class="chatBox <?php if($message_unread[$i]["user_type"]==$login){echo "myself";}else{echo "somebody";}?>"><span class="time"><?php echo $message_unread[$i]["time"];?></span><span class="box"><?php echo $message_unread[$i]["content"];?></span></div>
                <?php
            }
        }

        ?>
        <!--
        <div class="latest">最新回應</div>
        <div class="date">今天</div>
        <div class="chatBox somebody"><span class="time">6:27 PM</span><span class="box">最新回應</span></div>
        <div class="chatBox somebody"><span class="time">6:27 PM</span><span class="box">最新回應</span></div>
        <div class="chatBox somebody"><span class="time">6:27 PM</span><span class="box">最新回應</span></div>
        <div class="chatBox somebody"><span class="time">6:27 PM</span><span class="box">最新回應</span></div>
        <div class="chatBox somebody"><span class="time">6:27 PM</span><span class="box">最新回應</span></div>
        -->
    </div>
</section>
    </form>
</body>
</html>
<script>
    $(document).ready(function() {
        $('.slicknav_btn').click(function(){
            //$('span').toggleClass('slicknav_icon');
            $('span').toggleClass('slicknav_icon_open');
        });
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                }
            }
        })
    });
    new UISearch( document.getElementById( 'sb-search' ) );
</script>