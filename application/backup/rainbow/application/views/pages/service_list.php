<section class="nears nearA">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemC.png"></span>
        <p><span><?echo $cat["name"];?></span></p>
    </div>



</section>
<section class="nears">
    <div class="productBox">
        <?
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
                    <div class="product"><a href="<?echo $base_url;?>index.php/service?id=<?echo $service[$i+$x]["id"];?>"><span style="background-image:url('<?echo $base_url;?>service_img/<?echo $service[$i+$x]["img"];?>')" class="productImg"></span>
                            <p class="proA"><?echo $service[$i+$x]["name"];?></p>
                            <p class="proB"><span>NT$ <?echo $service[$i+$x]["special_fee"];?></span><br> <?echo "NT$ ".$service[$i+$x]["fee"];?></p></a>
                        <!--<button class="proD" name="fav" value="<?echo $service[$i+$x]["id"];?>">加入最愛</button>-->
                    </div>

                    <?
                }
                $i = $i+3;
                ?>
            </div>
            <?
        }
        ?>


    </div>
</section>
</div>