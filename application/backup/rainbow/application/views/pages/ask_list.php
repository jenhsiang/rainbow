<section class="score">
        <?php
        if(!empty($pair))
        {
            foreach($pair as $item)
            {
                ?>
                <a href="<?echo $base_url;?>index.php/ask?id=<?echo $item["service_id"];?>&uid=<?echo $item["user_id"];?>" class="scoreList">
                <div class="scoreImg"><img src="<?echo $base_url;?>service_img/<?echo $service[$item["service_id"]]["img"];?>"></div>
                <div class="ptime">
                    <!--<p><span><img src="assets/images/icon-advisory.png"></span>2016/09/09 23:17</p>-->
                </div>
                <div class="pname">
                    <p><?echo $service[$item["service_id"]]["name"];?></p>
                    <p style="width: 50%; float:left;"><?echo $user[$item["user_id"]];?></p>
                    <p style="width: 50%; float:left; color: red;"><?if($unread[$item["user_id"]."_".$item["service_id"]] != 0){ echo '未讀訊息：'.$unread[$item["user_id"]."_".$item["service_id"]];}?></p>
                </div></a>
        <?
            }
        }else{
            echo '<div style="text-align: center; font-size: 22px; padding-top: 60px; font-family: "微軟正黑體", "Microsoft JhengHei", "新細明體", "PMingLiU", Verdana, Geneva, sans-serif">目前尚無洽詢紀錄</div>';
        }
        ?>

</section>
</div>