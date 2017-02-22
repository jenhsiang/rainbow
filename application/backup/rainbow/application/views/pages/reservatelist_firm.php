<section class="score">
    <?
    if(!empty($service))
    {
        foreach($service as $item)
        {


            ?>
            <a href="<?echo $base_url.'index.php/reservation_firm?id='.$item["id"]?>" class="scoreList">
                <div class="scoreImg"><img src="<?echo $base_url;?>service_img/<?echo $item["img"];?>"><p style="padding-top: 8px; color: red; text-align: center;"><? echo $item["state_name"];?></p></div>
                <div class="pname">
                    <p><?echo $item["name"];?></p>
                    <p>預約地點：<?echo $item["address"];?></p>
                    <p>預約人： <?echo $item["user_name"];?></p>
                    <p>聯絡電話：<?echo $item["tel"];?></p>
                    <p>預約時間：<?echo $item["re_date"]." ".$item["re_time"];?></p>
                    <p>消費金額： NT$ <?echo $item["fee"];?></p>
                </div></a>
            <?
        }
    }
    ?>
</section>
</div>