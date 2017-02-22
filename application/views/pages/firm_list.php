
<section class="score">
    <form action="?" method="post">
    <div class="buttonOne" style="text-align: right;padding-right: 15px;">
        <button class="pink" style="width: 25%;" name="new" value="1">建立服務</button>
    </div>
    <div class="scoreChoice">
        <select onchange="cat_select(this);">
            <option>分類</option>
            <?php
            if(!empty($cat))
                {
                    for($i=0; $i<count($cat);$i++)
                    {
                        ?>
                        <option value="<?php echo $cat[$i]["id"];?>"><?php echo $cat[$i]["name"];?></option>
                        <?php
                    }
                }
            ?>

        </select>
        <input type="hidden" id="base_url" value="<?php echo $base_url;?>">
    </div>
        <?php
        if(!empty($service_list))
            {
                foreach($service_list as $service)
                {

        ?>
                <a href="<?php echo $base_url.'index.php/service_managment?id='.$service["id"] ;?>" class="scoreList">
                <div class="scoreImg">
                    <?php
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
                    <p><?php  echo $service["name"];?><?php if(!$service["ready"]){echo "<p style='font-weight: bold; color: #ff2832;'>(未上架，資料尚未填寫完整。)</p>";}elseif($service["ready"] == 2){echo "<p style='font-weight: bold; color: #ff2832;'>(暫停服務中)</p>";}?></p>

                    <p style="text-decoration:line-through;"><?php  echo "價格：NT$ ".$service["fee"];?></p>
                    <p><?php if(!empty($service["special_fee"])){echo "優惠價格：NT$ ".$service["special_fee"];}?></p>
                </div></a>
                    <?php
                }
        }
        ?>
    </form>
</section>
</div>
<script>
    function cat_select(item){
        var base_url = document.getElementById("base_url");
        var url = base_url.value+"index.php/firm_list?cat="+item.value;
        location.href = url;
    }
</script>
