<section class="nears nearA">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemC.png"></span>
        <p><span><?echo $cat["name"];?></span></p>
    </div>
    <?if(!empty($service))
    {
        for($i=0;$i<count($service);$i++)
        {
            if($i%2 == 0)
            {
                echo '<div class="productBox">';
            }
    ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service[$i]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service[$i]["img"];?>">
            <p class="proA"><?echo $service[$i]["name"];?></p>
            <p class="proB"><span>NT$ <?echo $service[$i]["special_fee"];?></span>NT$ <?echo $service[$i]["fee"];?></p>
            <p class="proC"> <img src="<?echo $base_url;?>assets_view/images/like.png">20人訂購</p></a>
    <?
            if($i%2 == 1 || $i==count($service)-1)
            {
                echo '</div>';
            }
        }
    }
    ?>


</section>
</div>