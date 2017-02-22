<!--buyer-->
<div class="greyBox">
    <div class="serviceIcon"><img src="assets/images/paper.png"></div>
    <p class="serviceA">購買人資料</p>
    <p class="serviceB">林小明<br>0912345678<br>付款方式</p>
</div>
<div class="greyBox">
    <div class="serviceIcon"><img src="assets/images/paper.png"></div>
    <p class="serviceA">預約明細</p>
    <p class="serviceB">林小明<br>0912345678<br>付款方式</p>
</div>
<div class="buttonTwo">
    <button>取消</button>
    <button>確認預約</button>
</div>
</div>
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
    });
    new UISearch( document.getElementById( 'sb-search' ) );
</script>