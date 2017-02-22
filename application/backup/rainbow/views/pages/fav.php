<form action="?" method="post">
<section class="score">
    <div class="scoreChoice">
        <select onchange="cat_select(this);">
            <option>分類</option>
            <?
            if(!empty($cat))
            {
                for($i=0; $i<count($cat);$i++)
                {
                    ?>
                    <option value="<?echo $cat[$i]["id"];?>" <?if(isset($cat_select) && $cat_select == $cat[$i]["id"]){ echo "selected";}?> ><?echo $cat[$i]["name"];?></option>
                    <?
                }
            }
            ?>
        </select>
        <input type="hidden" id="base_url" value="<?echo $base_url;?>">
    </div>
</section>
<section class="nears nearA">
    <section class="nears">

        <div class="productBox">

            <?
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
                        <?
                        for($x=0; $x<4; $x++)
                        {
                            if($i+$x == count($service))
                            {
                                break;
                            }
                            ?>
                            <div class="product"><a href="<?echo $base_url;?>index.php/service?id=<?echo $service[$i+$x]["id"];?>"><span style="background-image:url(<?echo $base_url;?>service_img/<?echo $service[$i+$x]["img"];?>)" class="productImg"></span>
                                    <p class="proA"><?echo $service[$i+$x]["name"];?></p>
                                    <p class="proB"><span>NT$ <?echo $service[$i+$x]["special_fee"];?></span><br> <?echo "NT$ ".$service[$i+$x]["fee"];?></p></a>
                                <button class="proD" name="remove" value="<?echo $service[$i+$x]["id"];?>">移除</button>
                            </div>

                            <?
                        }
                        $i = $i+3;
                        ?>
                    </div>
                    <?
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