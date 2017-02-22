<!--Slicknav-->
<script src="<?echo $base_url;?>assets_view/js/slicknav/modernizr2.6.2.min.js"></script>
<script src="<?echo $base_url;?>assets_view/js/slicknav/jquery.slicknav.js"></script>
<script>
    $(document).ready(function(){
        $('#menu').slicknav();
    });

</script>
<!--owl-->
<script src="<?echo $base_url;?>assets_view/js/owl/owl.carousel.js"></script>
<!--swiper-->
<script src="<?echo $base_url;?>assets_view/js/swiper/idangerous.swiper-2.0.min.js"></script>

<section class="owl-carousel">
    <?if(!empty($firm[0]["img1"])){echo '<div class="item"><img src="'.$base_url.'service_img/'.$firm[0]["img1"].'"></div>';}?>
    <?if(!empty($firm[0]["img2"])){echo '<div class="item"><img src="'.$base_url.'service_img/'.$firm[0]["img2"].'"></div>';}?>
    <?if(!empty($firm[0]["img3"])){echo '<div class="item"><img src="'.$base_url.'service_img/'.$firm[0]["img3"].'"></div>';}?>
</section>
<section>
    <div class="tabs tabs-style-underline">
        <nav>
            <ul>
                <li><a href="#section-underline-1" class="icon icon-home"><span>簡介</span></a></li>
                <li><a href="#section-underline-2" class="icon icon-gift"><span>作品</span></a></li>
                <li><a href="#section-underline-3" class="icon icon-upload"><span>服務</span></a></li>
            </ul>
        </nav>
        <div class="content-wrap">
            <section id="section-underline-1">
                <p class="about"><?if(isset($firm[0])){echo $firm[0]["about"];}?></p>
            </section>
            <section id="section-underline-2">
                <div class="nears nearA">
                    <div class="productBox">
                        <div class="clear">
                            <?
                                foreach($photo as $item)
                                {
                            ?>
                            <a href="<? echo $base_url.'index.php/about_photo?id='.$item["id"];?>" class="product">
                                <span style="background-image:url('<? echo $base_url;?>service_img/<? echo $item["img"];?>')" class="productImg"></span>
                                <p class="proA"><? echo $item["intro"];?></p>
                            </a>
                            <?
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-underline-3">
                <div class="nears nearA">
                    <div class="productBox">
                        <div class="clear">
                            <?
                            foreach($service as $item)
                            {
                            ?>
                            <a href="<? echo $base_url.'index.php/service?id='.$item["id"];?>" class="product">
                                <span style="background-image:url('<? echo $base_url;?>service_img/<? echo $item["img"];?>')" class="productImg"></span>
                                <p class="proA"><? echo $item["name"];?></p>
                                <p class="proB"><span><? echo "NT$ ".$item["special_fee"];?></span><br><? echo "NT$ ".$item["fee"];?></p>
                            </a>
                                <?
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
</div>
<script src="<?echo $base_url;?>assets_view/js/tab/cbpFWTabs.js">         </script>
<script>
    $(document).ready(function() {
        $('.slicknav_btn').click(function(){
            //$('span').toggleClass('slicknav_icon');
            $('span').toggleClass('slicknav_icon_open');
        });
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                }
            }
        })
        //Thumbs
        $('.thumbs-cotnainer').each(function(){
            $(this).swiper({
                slidesPerView:'auto',
                offsetPxBefore:10,
                offsetPxAfter:0,
                calculateHeight: true
            })
        })
    });
</script>
<script>
    (function() {
        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
            new CBPFWTabs( el );
        });
    })();
    //- new UISearch( document.getElementById( 'sb-search' ) );
</script>