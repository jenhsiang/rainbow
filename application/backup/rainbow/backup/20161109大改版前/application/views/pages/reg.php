<form action="?" method="post">
<div class="login">
    <div class="inputAll">
        <input placeholder="姓名" type="text" value="" name="name" class="loginInput">
        <input placeholder="手機號碼(帳號)" type="text" value="" name="tel" class="loginInput">
        <input placeholder="Email(非必填)" type="text" value="" name="email" class="loginInput">
        <input placeholder="密碼" type="password" value="" name="psd" class="loginInput">
        <input placeholder="請再輸入一次密碼" type="password" value="" name="psd2" class="loginInput">
    </div>
    <div class="buttonOne">
        <button name="send" value="1">註冊</button>
    </div>
    <div class="buttonOne">
        <button class="white" name="login" value="1">登入</button>
    </div>
</div>
    </form>
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