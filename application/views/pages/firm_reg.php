<!--forget-->
<form action="?" method="post"  enctype="multipart/form-data">
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
        <input placeholder="姓名" type="text" value="" name="name" class="loginInput">
        <input placeholder="連絡電話" type="text" value="" name="tel" class="loginInput">
        <input placeholder="E-mail" type="email" value="" name="email" class="loginInput">
        <input placeholder="介紹人代碼(非必填)" type="text" value="<?php if(isset($recommend)){ echo $recommend;}?>" name="ref" class="loginInput">
    </div>

    <div class="inputAll">
        <select name="bank" style=" width: 100%;font-size: 15px;color: #9e9c9c; height: 50px;">
            <?php
            foreach($bank as $key=>$item)
            {
                echo '<option value="'.$item["id"].'">'.$item["code"].$item["name"].'</option>';
            }
            ?>
        </select>
        <input placeholder="分行名稱(必填)" type="text" value="" name="bank_sub" class="loginInput">
        <input placeholder="帳號(必填)" type="text" value="" name="bank_acc" class="loginInput">
    </div>
    <div class="upload">
        <p>存摺照片</p>
        <div class="uploadbox"><img id="blah" src="assets/images/sample.jpg" alt="圖片預覽">
            <label id="upload" for="imgInp" class="choose-file">上傳檔案圖片</label>
            <input id="imgInp" type="file" class="id_image_large" name="imgInp">
        </div>
    </div>
    <div class="inputAll">
        <input placeholder="密碼" type="password" value=""  name="psd" class="loginInput">
        <input placeholder="請再輸入一次密碼" type="password" value=""  name="psd_check" class="loginInput">
    </div>
    <div class="inputAll">
        <input placeholder="請輸入驗證碼" type="text" id="inputCode" value=""  class="loginInput" style="width: 50%;">
        <div class="code" id="checkCode" onclick="createCode()" ></div>
        <label style="line-height: 30px;padding-left: 20px;"><input type="checkbox" name="allow" value="1"><a href="<?php  echo $base_url?>index.php/provision">我同意彩虹橋服務條款</a></label>
    </div>
    <div class="buttonOne">
        <button name="send" value="1" onclick=" return validateCode();">註冊</button>
    </div>

</div>
    </form>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>