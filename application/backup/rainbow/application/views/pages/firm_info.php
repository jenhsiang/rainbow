<!--forget-->
<form action="?" method="post"  enctype="multipart/form-data">
<div class="login">
    <div class="inputAll">
        <input placeholder="彩虹代碼" type="text" value="會員代碼：<?if(!empty($firm[0])){echo $firm[0]["code"];}?>" name="code" class="loginInput" disabled>
        <input placeholder="帳號" type="text" value="帳號：<?if(!empty($firm[0])){echo $firm[0]["acc"];}?>" name="code" class="loginInput" disabled>
        <input placeholder="姓名" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["name"];}?>" name="name" class="loginInput">
        <input placeholder="連絡電話" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["tel"];}?>" name="tel" class="loginInput">
        <input placeholder="聯絡E-mail" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["email"];}?>" name="email" class="loginInput">
        <input placeholder="店家地址" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["address"];}?>" name="address" class="loginInput">

        <select name="bank" style=" width: 100%;font-size: 15px;color: #9e9c9c; height: 50px;">
            <?
            foreach($bank as $key=>$item)
            {
                if($firm[0]["bank"] == $item["id"])
                {
                    echo '<option value="'.$item["id"].'" selected >'.$item["code"].$item["name"].'</option>';
                }else
                {
                    echo '<option value="'.$item["id"].'">'.$item["code"].$item["name"].'</option>';
                }

            }
            ?>
        </select>
        <input placeholder="分行" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["bank_sub"];}?>" name="bank_sub" class="loginInput">
        <input placeholder="帳號" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["bank_acc"];}?>" name="bank_acc" class="loginInput">

    </div>
    <div class="upload">
        <p>存摺照片</p>
        <div class="uploadbox"><img id="blah"
        <?

        if(!empty($firm[0]["bank_img"]))
        {
            echo 'src="'.$base_url.'service_img/'.$firm[0]["bank_img"].'"';
        }else
        {
            echo 'src=""';
        }

            ?>
         alt="圖片預覽">
            <label id="upload" for="imgInp" class="choose-file">上傳檔案圖片</label>
            <input id="imgInp" type="file" class="id_image_large" name="imgInp">
        </div>
    </div>
    <div class="inputAll">
    <input placeholder="密碼" type="password" value=""  name="psd" class="loginInput">
    <input placeholder="請再輸入一次密碼" type="password" value=""  name="psd_check" class="loginInput">
    </div>
    <div class="buttonOne">
        <button name="save" value="<?if(!empty($firm[0])){echo $firm[0]["id"];}?>">更新</button>
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