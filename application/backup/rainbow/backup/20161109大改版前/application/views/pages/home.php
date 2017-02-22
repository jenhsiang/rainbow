<section class="owl-carousel">
    <div class="item"><img src="<?echo $base_url;?>assets_view//images/bannerA.png"></div>
    <div class="item"><img src="<?echo $base_url;?>assets_view//images/bannerB.png"></div>
    <div class="item"><img src="<?echo $base_url;?>assets_view//images/bannerC.png"></div>
</section>
<!--items-->
<section class="itemAll"><a href="<?echo $base_url;?>index.php/service_list?item=1" class="items itemA">
        <div class="icon"><img src="<?echo $base_url;?>assets_view/images/itemA.png"></div>
        <div class="title"><span>美容</span><br>美容．美體．脫毛</div></a><a href="<?echo $base_url;?>index.php/service_list?item=2" class="items itemB">
        <div class="icon"><img src="<?echo $base_url;?>assets_view/images/itemB.png"></div>
        <div class="title"><span>美甲</span><br>美甲．手足護理</div></a><a href="<?echo $base_url;?>index.php/service_list?item=3" class="items itemC">
        <div class="icon"><img src="<?echo $base_url;?>assets_view/images/itemC.png"></div>
        <div class="title"><span>美髮</span><br>美髮</div></a><a href="<?echo $base_url;?>index.php/service_list?item=4" class="items itemD">
        <div class="icon"><img src="<?echo $base_url;?>assets_view/images/itemD.png"></div>
        <div class="title"><span>美睫</span><br>美睫</div></a><a href="<?echo $base_url;?>index.php/service_list?item=5" class="items itemE">
        <div class="icon"><img src="<?echo $base_url;?>assets_view/images/itemE.png"></div>
        <div class="title"><span>文繡</span></div></a></section>
<!-- Near-->
<section class="near"><img src="<?echo $base_url;?>assets_view/images/icon-place.png">離我最近</section>
<section class="nears nearA">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemA.png"></span>
        <p><span>美容</span>美容．美體．脫毛</p><a href="<?echo $base_url;?>index.php/service_list?item=1" class="more">更多<img src="<?echo $base_url;?>assets_view/images/more.png"></a>
    </div>
    <div class="productBox">
            <?if(!empty($service1[0]))
            {
            ?>
                <a href="<?echo $base_url;?>index.php/service?id=<?echo $service1[0]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service1[0]["img"];?>">
            <p class="proA"><?echo $service1[0]["name"];?></p>
            <p class="proB"><span>NT$ <?echo $service1[0]["special_fee"];?></span>NT$ <?echo $service1[0]["fee"];?></p>
            <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
            }
            ?>

        <?if(!empty($service1[1]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service1[1]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service1[1]["img"];?>">
                <p class="proA"><?echo $service1[1]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service1[1]["special_fee"];?></span>NT$ <?echo $service1[1]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>

    </div>
</section>
<section class="nears nearB">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemB.png"></span>
        <p><span>美甲</span>美甲．美睫．手足護理</p><a href="<?echo $base_url;?>index.php/service_list?item=2" class="more">更多<img src="<?echo $base_url;?>assets_view/images/more.png"></a>
    </div>
    <div class="productBox">
        <?if(!empty($service2[0]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service2[0]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service2[0]["img"];?>">
                <p class="proA"><?echo $service2[0]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service2[0]["special_fee"];?></span>NT$ <?echo $service2[0]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>

        <?if(!empty($service2[1]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service2[1]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service2[1]["img"];?>">
                <p class="proA"><?echo $service2[1]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service2[1]["special_fee"];?></span>NT$ <?echo $service2[1]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>

    </div>
</section>
<section class="nears nearC">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemC.png"></span>
        <p><span>美髮美妝</span>美髮．美妝</p><a href="<?echo $base_url;?>index.php/service_list?item=3" class="more">更多<img src="<?echo $base_url;?>assets_view/images/more.png"></a>
    </div>
    <div class="productBox">
        <?if(!empty($service3[0]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service3[0]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service3[0]["img"];?>">
                <p class="proA"><?echo $service3[0]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service3[0]["special_fee"];?></span>NT$ <?echo $service3[0]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>

        <?if(!empty($service3[1]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service3[1]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service3[1]["img"];?>">
                <p class="proA"><?echo $service3[1]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service3[1]["special_fee"];?></span>NT$ <?echo $service3[1]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>
    </div>
</section>
<section class="nears nearD">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemD.png"></span>
        <p><span>美睫</span></p><a href="<?echo $base_url;?>index.php/service_list?item=4" class="more">更多<img src="<?echo $base_url;?>assets_view/images/more.png"></a>
    </div>
    <div class="productBox">
        <?if(!empty($service4[0]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service4[0]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service4[0]["img"];?>">
                <p class="proA"><?echo $service4[0]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service4[0]["special_fee"];?></span>NT$ <?echo $service4[0]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>

        <?if(!empty($service4[1]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service4[1]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service4[1]["img"];?>">
                <p class="proA"><?echo $service4[1]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service4[1]["special_fee"];?></span>NT$ <?echo $service4[1]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>
    </div>
</section>
<section class="nears nearE">
    <div class="title"><span class="icon"><img src="<?echo $base_url;?>assets_view/images/icon-itemE.png"></span>
        <p><span>紋繡 半永久術</span></p><a href="<?echo $base_url;?>index.php/service_list?item=5" class="more">更多<img src="<?echo $base_url;?>assets_view/images/more.png"></a>
    </div>
    <div class="productBox">
        <?if(!empty($service5[0]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service5[0]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service5[0]["img"];?>">
                <p class="proA"><?echo $service5[0]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service5[0]["special_fee"];?></span>NT$ <?echo $service5[0]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>

        <?if(!empty($service5[1]))
        {
            ?>
            <a href="<?echo $base_url;?>index.php/service?id=<?echo $service5[1]["id"];?>" class="product"><img src="<?echo $base_url;?>service_img/<?echo $service5[1]["img"];?>">
                <p class="proA"><?echo $service5[1]["name"];?></p>
                <p class="proB"><span>NT$ <?echo $service5[1]["special_fee"];?></span>NT$ <?echo $service5[1]["fee"];?></p>
                <p class="proC"><img src="<? echo $base_url; ?>assets_view/images/like.png">20人訂購</p></a>
            <?
        }
        ?>
    </div>
</section>
</div>
<script>

    function changearea(obj)
    {
        var new_location = location.href;
        var v = new_location.indexOf("?");
        if(v >= 0)
        {
            new_location=new_location.substring( 0 , v-1 );
            new_location = new_location + "?area="+obj.value;
        }else
        {
            new_location = new_location + "?area="+obj.value;
        }

        location.replace(new_location);
    }
</script>