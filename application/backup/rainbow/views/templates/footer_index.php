</body>
</html>
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
                offsetPxBefore:0,
                offsetPxAfter:0,
                calculateHeight: true
            })
        })
    });
</script>


<!-- Slick -->
<script src="<?echo $base_url;?>js/slick/slick.min.js"></script>
<!-- END Slick -->
<script src="<?echo $base_url;?>js/action.js"></script>
</body>
</html>
