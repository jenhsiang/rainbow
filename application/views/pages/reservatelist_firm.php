<section class="score">
    <?php
    if(!empty($service))
    {
        foreach($service as $item)
        {


            ?>
            <a href="<?php echo $base_url.'index.php/reservation_firm?id='.$item["id"]?>" class="scoreList">
                <div class="scoreImg"><img src="<?php echo $base_url;?>service_img/<?php echo $item["img"];?>"><p style="padding-top: 8px; color: red; text-align: center;"><?php  echo $item["state_name"];?></p></div>
                <div class="pname">
                    <p><?php echo $item["name"];?></p>
                    <p>預約地點：<?php echo $item["address"];?></p>
                    <p>預約人： <?php echo $item["user_name"];?></p>
                    <p>聯絡電話：<?php echo $item["tel"];?></p>
                    <p>預約時間：<?php echo $item["re_date"]." ".$item["re_time"];?></p>
                    <p>消費金額： NT$ <?php echo $item["fee"];?></p>
                </div></a>
            <?php
        }
    }
    ?>
</section>
</div>