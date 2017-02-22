<form action="?" method="post">
    <style type="text/css">
        .code
        {
            background:url(code_bg.jpg);
            font-family:Arial;
            font-style:italic;
            color:blue;
            font-size:26px;
            border:0;
            padding:2px 3px;
            letter-spacing:3px;
            font-weight:bolder;
            float:right;
            cursor:pointer;
            width:50%;
            height:52px;
            line-height:50px;
            text-align:center;
            vertical-align:middle;

        }
        a
        {
            text-decoration:none;
            font-size:12px;
            color:#288bc4;
        }
        a:hover
        {
            text-decoration:underline;
        }
    </style>
    <script language="javascript" type="text/javascript">
        window.onload=function(){
            createCode();
        }
    </script>
    <script language="javascript" type="text/javascript">

        var code;
        function createCode() {
            code = "";
            var codeLength = 6; //验证码的长度
            var checkCode = document.getElementById("checkCode");
            var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
                'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'); //所有候选组成验证码的字符，当然也可以用中文的
            for (var i = 0; i < codeLength; i++)
            {
                var charNum = Math.floor(Math.random() * 52);
                code += codeChars[charNum];
            }
            if (checkCode)
            {
                checkCode.className = "code";
                checkCode.innerHTML = code;
            }
        }
        function validateCode()
        {
            var inputCode = document.getElementById("inputCode").value;
            if (inputCode.length <= 0)
            {
                alert("請輸入驗證碼！");
                return false;
            }
            else if (inputCode.toUpperCase() != code.toUpperCase())
            {
                alert("驗證碼有誤！");
                createCode();
                return false;
            }
            else
            {
                return true;
            }
        }
    </script>
<div class="login">
    <div class="inputAll">
        <input placeholder="姓名" type="text" value="" name="name" class="loginInput">
        <input placeholder="手機號碼(帳號)" type="text" value="" name="tel" class="loginInput">
        <input placeholder="Email(必填)" type="email" value="" name="email" class="loginInput">
        <input placeholder="介紹人代碼(非必填)" type="text" value="<?if(isset($recommend)){ echo $recommend;}?>" name="ref" class="loginInput">
        <input placeholder="密碼" type="password" value="" name="psd" class="loginInput">
        <input placeholder="請再輸入一次密碼" type="password" value="" name="psd2" class="loginInput">

    </div>
    <div class="inputAll">
        <input placeholder="請輸入驗證碼" type="text" id="inputCode" value=""  class="loginInput" style="width: 50%;">
        <div class="code" id="checkCode" onclick="createCode()" ></div>
        <label style="line-height: 30px;padding-left: 20px;"><input type="checkbox" name="allow" value="1"><a href="<? echo $base_url?>index.php/provision">我同意彩虹橋服務條款</a></label>
    </div>

    <div class="buttonOne">
        <button name="send" value="1"  onclick=" return validateCode();">註冊</button>
    </div>
    <div class="buttonOne">
        <p style="color: #990073; font-weight: bold; font-size: 20px; line-height: 28px;">若您為廠商，也歡迎加入彩虹平台。</p>
        <button name="firm" value="1">加入彩虹</button>
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