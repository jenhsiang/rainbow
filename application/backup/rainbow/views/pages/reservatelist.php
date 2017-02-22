<section class="score">
    <?
        if(!empty($service))
        {
            foreach($service as $item)
            {


    ?>
        <a href="<?echo $base_url.'index.php/reservation?id='.$item["id"]?>" class="scoreList">
                <div class="scoreImg"><img src="<?echo $base_url;?>service_img/<?echo $item["img"];?>"><p style="padding-top: 8px; color: red; text-align: center;"><? echo $item["state_name"];?></p></div>
                <div class="pname">
                    <p><?echo $item["name"];?></p>
                    <p><?echo $item["address"];?></p>
                    <p>消費金額： NT$ <?echo $item["fee"];?></p>
                    <p>預約時間：<?echo $item["re_date"]." ".$item["re_time"];?></p>
                </div></a>
    <?
            }
        }else{
            echo '<div style="text-align: center; font-size: 22px; padding-top: 60px;">目前尚無預約的服務</div>';
        }
    ?>
    </section>
</div>