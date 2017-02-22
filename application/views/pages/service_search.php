<section class="nears nearA">
    <div class="title"><span class="icon"><img src="<?php echo $base_url;?>assets_view/images/icon-itemC.png"></span>
        <p><span>搜尋結果</span></p>
    </div>

</section>
<section class="nears">
    <div class="productBox">
        <?php
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
                    <div class="product"><a href="<?php echo $base_url;?>index.php/service?id=<?php echo $service[$i+$x]["id"];?>"><span style="background-image:url('<?php echo $base_url;?>service_img/<?php echo $service[$i+$x]["img"];?>')" class="productImg"></span>
                            <p class="proA"><?php echo $service[$i+$x]["name"];?></p>
                            <p class="proB"><span>NT$ <?php echo $service[$i+$x]["special_fee"];?></span ><br> <?php echo "NT$ ".$service[$i+$x]["fee"];?></p></a>
                        <!--<button class="proD" name="fav" value="<?php echo $service[$i+$x]["id"];?>">加入最愛</button>-->
                    </div>

                    <?php
                }
                $i = $i+3;
                ?>
            </div>
            <?php
        }
        ?>


    </div>
</section>
</div>