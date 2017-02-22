<form action="?" method="post">
<section class="score">
    <div class="scoreChoice">
        <select onchange="cat_select(this);">
            <option>分類</option>
            <?php
            if(!empty($cat))
            {
                for($i=0; $i<count($cat);$i++)
                {
                    ?>
                    <option value="<?php echo $cat[$i]["id"];?>" <?php if(isset($cat_select) && $cat_select == $cat[$i]["id"]){ echo "selected";}?> ><?php echo $cat[$i]["name"];?></option>
                    <?php
                }
            }
            ?>
        </select>
        <input type="hidden" id="base_url" value="<?php echo $base_url;?>">
    </div>
</section>
<section class="nears nearA">
    <section class="nears">

        <div class="productBox">

            <?php
            if(!empty($service))
            {
                for($i=0; $i<count($service); $i++)
                {
                    if($i == 16)
                    {
                        break;
                    }
                    ?>
                    <div class="clear">
                        <?php
                        for($x=0; $x<4; $x++)
                        {
                            if($i+$x == count($service))
                            {
                                break;
                            }
                            ?>
                            <div class="product"><a href="<?php echo $base_url;?>index.php/service?id=<?php echo $service[$i+$x]["id"];?>"><span style="background-image:url(<?php echo $base_url;?>service_img/<?php echo $service[$i+$x]["img"];?>)" class="productImg"></span>
                                    <p class="proA"><?php echo $service[$i+$x]["name"];?></p>
                                    <p class="proB"><span>NT$ <?php echo $service[$i+$x]["special_fee"];?></span><br> <?php echo "NT$ ".$service[$i+$x]["fee"];?></p></a>
                                <button class="proD" name="remove" value="<?php echo $service[$i+$x]["id"];?>">移除</button>
                            </div>

                            <?php
                        }
                        $i = $i+3;
                        ?>
                    </div>
                    <?php
                }
            }else{
                echo '<div style="text-align: center; font-size: 22px; padding-top: 60px;">目前尚無最愛的服務</div>';
            }
            ?>

            <!--<div class="productBoxPage"><a href=""><</a><a href="">1</a><a href="" class="arrive">2</a><a href="">3</a><a href="">></a></div>-->
        </div>
    </section>
</section>
</form>
</div>
<script>
    function cat_select(item){
        var base_url = document.getElementById("base_url");
        var url = base_url.value+"index.php/fav?cat="+item.value;
        location.href = url;
    }
</script>