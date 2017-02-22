<form action="?" method="post">
<section class="record">
    <p class="title"><?php echo $service[0]["name"];?><span>NT$ <?php echo $service[0]["fee"];?></span></p>
    <div class="recordImg"><img src="<?php echo $base_url;?>service_img/<?php echo $service[0]["img"];?>"></div>
    <div class="recordTime">
        <p><img src="<?php echo $base_url;?>assets_view/images/clock.png"><span class="date">日期/時段</span><span><?php echo $service[0]["re_date"];?></span><span><?php echo $service[0]["re_time"];?>-<?php echo $service[0]["re_time2"];?></span></p>
    </div>
    <div class="recordContent">
        <!--<button>再次預約</button>-->
        <p class="serviceB">聯絡電話：<a href="tel:<?php echo $service[0]["tel"];?>"><?php echo $service[0]["tel"];?>點我撥號</a></p>
        <p><?php echo $service[0]["intro"];?></p>
    </div>
    <div class="service">
        <!--<div class="serviceIcon"><img src="<?php echo $base_url;?>service_img/<?php echo $service[0]["img3"];?>"></div>-->
        <p class="serviceA"><?php echo $service[0]["attendant"];?></p>
        <p class="serviceB"><?php echo $service[0]["attendant_intro"];?></p>
    </div>
    <div class="comment" style="text-align: center;">
        <?php

        if($service[0]["state"] == 4)
            {
                echo '<span style="text-align: center; font-size: 22px; color: red;">爭議訂單，我們將盡快給您回覆。</span>';
            }
            else if($service[0]["state"] == 3 || $service[0]["state"] == 2)
            {
                if($expire)
                {
                    echo '<button class="eva" name="eva" value="'.$service[0]["id"].'">修改評價</button>';

                }else
                {
                    echo '<button class="cancel" name="cancel" value="'.$service[0]["id"].'" onclick="return check_cancel()">取消預約</button>';

                }
            }else if($service[0]["state"] != 1)
            {
                if($expire)
                {
                    echo '<button class="eva" name="eva" value="'.$service[0]["id"].'">我要評價</button>';
                    echo '<button class="eva" name="special" value="'.$service[0]["id"].'" onclick="return check_argue()">爭議訂單</button>';
                }else
                {
                    echo '<button class="cancel" name="cancel" value="'.$service[0]["id"].'" onclick="return check_cancel()">取消預約</button>';
                    echo '<button class="eva" name="special" value="'.$service[0]["id"].'">爭議訂單</button>';
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
<script>
    function check_argue()
    {
        if (confirm('確認是否提出爭議')) {
            // Save it!
            return true;
        } else {
            // Do nothing!
            return false;
        }
    }
    function check_cancel()
    {
        if (confirm('確認是否取消預約')) {
            // Save it!
            return true;
        } else {
            // Do nothing!
            return false;
        }
    }
</script>