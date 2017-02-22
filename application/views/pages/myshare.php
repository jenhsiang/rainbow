<!--forget-->
<form action="?" method="post">
<div class="login">

    <div style="text-align: center;">
        <p style="font-size: 20px;padding-bottom: 10px;">邀請您的朋友使用本app</p>
        <div style="padding-left:2%;">
            <a href="http://line.naver.jp/R/msg/text/?<?php  echo $line_word;?>"><img src="<?php echo $base_url;?>assets_view/images/line_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
            <a href="http://www.facebook.com/share.php?u=<?php  echo $fb_word;?>"><img src="<?php echo $base_url;?>assets_view/images/fb_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
            <a href="whatsapp://send?text=<?php  echo $line_word;?>"><img src="<?php echo $base_url;?>assets_view/images/whatsapp_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
            <a href="https://twitter.com/intent/tweet?text=<?php  echo $line_word;?>"><img src="<?php echo $base_url;?>assets_view/images/twitter_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
        </div>

        <!--
        <p style="font-size: 20px;padding-bottom: 10px; margin-top: 10px;">邀請廠商加入我們的行列</p>
        <div style="padding-left:2%; width: 100%;">
            <a href="http://line.naver.jp/R/msg/text/?<?php  echo $line_word2;?>"><img src="<?php echo $base_url;?>assets_view/images/line_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
            <a href="http://www.facebook.com/share.php?u=<?php  echo $fb_word2;?>"><img src="<?php echo $base_url;?>assets_view/images/fb_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
            <a href="whatsapp://send?text=<?php  echo $line_word2;?>"><img src="<?php echo $base_url;?>assets_view/images/whatsapp_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
            <a href="https://twitter.com/intent/tweet?text=<?php  echo $line_word2;?>"><img src="<?php echo $base_url;?>assets_view/images/twitter_share.jpg" style="max-width: 20%; margin-right: 2%;"></a>
        </div>
        -->
        <div style="float: left; width: 44%; margin-left: 5%; margin-right: 2%;">
            <p style="font-size: 20px;padding-bottom: 10px; padding-top: 20px;">邀請好友</p>
            <p><img src="<?php  echo $reg_qr_img;?>" style="max-width: 70%;"></p>
        </div>
        <div  style="float: left; width: 44%; margin-right: 5%;">
            <p style="font-size: 20px;padding-bottom: 10px; padding-top: 20px;">邀請廠商</p>
            <p><img src="<?php  echo $firm_reg_qr_img;?>" style="max-width: 70%;"></p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div>

</div>
    </form>
</div>