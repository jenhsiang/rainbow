
<section class="score">
    <form action="?" method="post">
    <div class="buttonOne" style="text-align: right;padding-right: 15px;">
        <button class="pink" style="width: 25%;" name="new" value="1">新增服務</button>
    </div>
    <div class="scoreChoice">
        <select>
            <option>分類</option>
            <option>分類選擇</option>
        </select>
    </div>
        <?
            if(!empty($service_list))
            {
                foreach($service_list as $service)
                {

        ?>
                <a href="<?echo $base_url.'index.php/service_managment?id='.$service["id"] ;?>" class="scoreList">
                <div class="scoreImg">
                    <?
                        if(!empty($service["img"]))
                        {
                            echo '<img src="'.$base_url.'service_img/'.$service["img"].'">';
                        }else
                        {
                            echo '<img src="'.$base_url.'assets_view/images/productB.png">';
                        }
                    ?>
                </div>
                <div class="pname">
                    <p><? echo $service["name"];?></p>
                    <p><? echo "價格：NT$ ".$service["fee"];?></p>
                    <p><?if(!empty($service["special_fee"])){echo "優惠價格：NT$ ".$service["special_fee"];}?></p>
                </div></a>
        <?
                }
        }
        ?>
    </form>
</section>
</div>
