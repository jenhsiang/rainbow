<div>
    <div style="width: 90%; float: left; margin-left: 10%; text-align: left; margin-top: 40px;margin-bottom: 20px;"><p>我的錢包</p></div>
</div>
<div style="border-bottom: 1px solid #cacaca;width: 100%; float: left; height: 1px;"></div>

<div style="padding-top: 20px;">
    <div style="width: 90%; float: left; margin-left: 10%; line-height: 30px;color: #edbb64;font-size: 22px;margin-top: 15px;"><p><?php  echo '<img src="'.$base_url.'assets_view/images/gold.png" style="height:20px;">'.$member[0]["gold"]; ?></p></div>
    <div style="width: 90%; float: left; margin-left: 10%; line-height: 30px;color: #888279;font-size: 22px;margin-top: 15px;"><p><?php  echo '<img src="'.$base_url.'assets_view/images/gold2.png" style="height:20px;">'.$member[0]["gold2"]; ?></p></div>
</div>

<div style="padding-top: 20px;">
    <div style="width: 90%; float: left; margin-left: 10%; text-align: left; margin-top: 40px; margin-bottom: 20px;"><p>我的消費紀錄</p></div>
</div>
<section class="score">
    <?php
    if(!empty($service))
        {
            foreach($service as $item)
            {
    ?>
        <a href="<?php echo $base_url.'index.php/reservation?id='.$item["id"]?>" class="scoreList">
                <div class="scoreImg"><img src="<?php echo $base_url;?>service_img/<?php echo $item["img"];?>"></div>
                <div class="pname">
                    <p><?php echo $item["name"];?></p>
                    <p>消費金額： NT$ <?php echo $item["fee"];?></p>
                    <?php  echo '<p>使用金幣：'.$item["gold"].'使用銀幣：'.$item["gold2"].'</p>';?>
                    <p>預約時間：<?php echo $item["re_date"]." ".$item["re_time"];?></p>
                </div></a>
                <?php
            }
        }else{
            echo '<div style="text-align: center; font-size: 22px; padding-top: 60px;">目前尚無預約的服務</div>';
        }
    ?>
    </section>
<div style="padding-top: 20px;">
    <div style="width: 90%; float: left; margin-left: 10%; text-align: left; margin-top: 40px; margin-bottom: 20px;"><p>我的推薦紀錄</p></div>
</div>
<section class="score">
    <?php
    if(!empty($member_list))
    {
        foreach($member_list as $item)
        {


            ?>
            <a href="" class="scoreList">
                <div class="scoreImg"><p><?php echo $item["name"];?></p></div>
                <div class="pname">

                    <p>獲得銀幣：100 <span style="float: right;"><?php echo $item["join_time"];?></span></p>

                </div></a>
            <?php
        }
    }else{
        echo '<div style="text-align: center; font-size: 22px; padding-top: 60px;">目前尚無推薦紀錄</div>';
    }
    ?>
</section>
</div>