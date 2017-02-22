<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
<form action="?" method="post">
    <section class="record">
        <p class="title"><?php echo $service[0]["name"];?><span>NT$ <?php echo $service[0]["fee"];?></span></p>
        <div class="recordImg"><img src="<?php echo $base_url;?>service_img/<?php echo $service[0]["img"];?>"></div>
        <div class="recordTime">
            <p><img src="<?php echo $base_url;?>assets_view/images/clock.png"><span class="date">日期/時段</span><span><input name="re_date" value="<?php echo $service[0]["re_date"];?>" style="border-width:1px; border-color: #0d3349; border-style: solid; "></span><span><input name="re_time" value="<?php echo $service[0]["re_time"];?>-<?php echo $service[0]["re_time2"];?>" style="border-width:1px; border-color: #0d3349; border-style: solid; "></span></p>
        </div>
        <div class="recordContent">
            <!--<button>再次預約</button>-->
            <p><?php echo $service[0]["intro"];?></p>
        </div>
        <div class="service">
            <!--<div class="serviceIcon"><img src="<?php echo $base_url;?>service_img/<?php echo $service[0]["img3"];?>"></div>-->
            <p class="serviceB">預約地點：<?php echo $service[0]["address"];?></p>
            <p class="serviceB">預約人： <?php echo $service[0]["user_name"];?></p>
            <p class="serviceB">聯絡電話：<a href="tel:<?php echo $service[0]["tel"];?>"><?php echo $service[0]["tel"];?>點我撥號</a></p>
        </div>
        <div class="comment" style="text-align: center;">
            <?php
            if($service[0]["state"] ==  4)
            {
                echo '<span style="text-align: center; font-size: 22px; color: red;">爭議訂單，我們盡快回覆給您。</span>';
                echo '<button class="eva" name="talk" value="'.$service[0]["id"].'">留言給他</button>';
            }
            else if($service[0]["state"] != 1)
            {
                if($expire)
                {
                    echo '<button class="eva" name="eva" value="'.$service[0]["id"].'">我要評價</button>';
                    echo '<button class="eva" name="update" value="'.$service[0]["id"].'">更新日期</button>';

                }else
                {
                    echo '<button class="eva" name="talk" value="'.$service[0]["id"].'">留言給他</button>';
                }
            }else
            {
                echo '<span style="text-align: center; font-size: 22px; color: red;">該服務已取消</span>';
            }

            ?>

        </div>
    </section>
</form>
</div>