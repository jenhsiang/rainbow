<form action="?" method="post">
<section class="record">
    <p class="title"><?echo $service[0]["name"];?><span>NT$ <?echo $service[0]["fee"];?></span></p>
    <div class="recordImg"><img src="<?echo $base_url;?>service_img/<?echo $service[0]["img"];?>"></div>
    <div class="recordTime">
        <p><img src="<?echo $base_url;?>assets_view/images/clock.png"><span class="date">日期/時段</span><span><?echo $service[0]["re_date"];?></span><span><?echo $service[0]["re_time"];?>-<?echo $service[0]["re_time2"];?></span></p>
    </div>
    <div class="recordContent">
        <!--<button>再次預約</button>-->
        <p class="serviceB">聯絡電話：<a href="tel:<?echo $service[0]["tel"];?>"><?echo $service[0]["tel"];?>點我撥號</a></p>
        <p><?echo $service[0]["intro"];?></p>
    </div>
    <div class="service">
        <!--<div class="serviceIcon"><img src="<?echo $base_url;?>service_img/<?echo $service[0]["img3"];?>"></div>-->
        <p class="serviceA"><?echo $service[0]["attendant"];?></p>
        <p class="serviceB"><?echo $service[0]["attendant_intro"];?></p>
    </div>
    <div class="comment" style="text-align: center;">
        <?

            if($service[0]["state"] == 4)
            {
                echo '<span style="text-align: center; font-size: 22px; color: red;">爭議訂單，我們將盡快給您回覆。</span>';
            }
            else if($service[0]["state"] != 1)
            {
                if($expire)
                {
                    echo '<button class="eva" name="eva" value="'.$service[0]["id"].'">我要評價</button>';
                    echo '<button class="eva" name="special" value="'.$service[0]["id"].'">爭議訂單</button>';
                }else
                {
                    echo '<button class="cancel" name="cancel" value="'.$service[0]["id"].'">取消預約</button>';
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