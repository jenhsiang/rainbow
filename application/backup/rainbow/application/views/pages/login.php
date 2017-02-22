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
            var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9); //所有候选组成验证码的字符，当然也可以用中文的
            for (var i = 0; i < codeLength; i++)
            {
                var charNum = Math.floor(Math.random() * 10);
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
        <input placeholder="電話/帳號" type="text" value="" name="acc" class="loginInput">
        <div class="number">
            <input placeholder="密碼" type="password" value="" name="psd" class="loginInput"><a href="<?echo $base_url.'index.php/forget';?>" class="link">忘記密碼?</a>
        </div>
    </div>
    <div class="inputAll">
        <input placeholder="請輸入驗證碼" type="text" id="inputCode" value=""  class="loginInput" style="width: 50%;">
        <div class="code" id="checkCode" onclick="createCode()" ></div>
    </div>
    <div class="buttonOne">
        <button name="login" value="1"  onclick=" return validateCode();">登入</button>
    </div>
    <div class="buttonOne">
        <button class="white" name="reg" value="1">註冊</button>
    </div>
</div>
    </form>
</div>