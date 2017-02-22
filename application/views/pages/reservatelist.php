<section class="score">
    <?php
    if(!empty($service))
        {
            foreach($service as $item)
            {


    ?>
        <a href="<?php echo $base_url.'index.php/reservation?id='.$item["id"]?>" class="scoreList">
                <div class="scoreImg"><img src="<?php echo $base_url;?>service_img/<?php echo $item["img"];?>"><p style="padding-top: 8px; color: red; text-align: center;"><?php  echo $item["state_name"];?></p></div>
                <div class="pname">
                    <p><?php echo $item["name"];?></p>
                    <p><?php echo $item["address"];?></p>
                    <p>消費金額： NT$ <?php echo $item["fee"];?></p>
                    <p>預約時間：<?php echo $item["re_date"]." ".$item["re_time"];?></p>
                </div></a>
                <?php
            }
        }else{
            echo '<div style="text-align: center; font-size: 22px; padding-top: 60px;">目前尚無預約的服務</div>';
        }
    ?>
    </section>
</div>