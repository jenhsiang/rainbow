
<div class="login">
    <form action="?" method="post" enctype="multipart/form-data">
    <div class="upload">
        <p>編輯簡介</p>
    </div>
    <div class="inputAll">
        <textarea placeholder="簡介內容" type="text" name="about" value="" class="loginInput"><?php  if(!empty($firm[0]["about"])){echo $firm[0]["about"];}?></textarea>
    </div>
    <div class="upload">
        <p>上傳服務封面照片</p>
        <div class="uploadbox"><img id="blah"
                <?php
                if(!empty($firm[0]["img1"]))
                {
                    echo 'src="'.$base_url.'service_img/'.$firm[0]["img1"].'"';
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
    <div class="upload">
        <p>上傳服務封面照片</p>
        <div class="uploadbox"><img id="blah2"
                <?php
                if(!empty($firm[0]["img2"]))
                {
                    echo 'src="'.$base_url.'service_img/'.$firm[0]["img2"].'"';
                }else
                {
                    echo 'src=""';
                }
                ?>
                                    alt="圖片預覽" style="max-width: 100%;">
            <label id="upload" for="imgInp2" class="choose-file">上傳檔案圖片</label>
            <input id="imgInp2" type="file" class="id_image_large" name="imgInp2">
        </div>
    </div>
    <div class="upload">
        <p>上傳服務封面照片</p>
        <div class="uploadbox"><img id="blah3"
                <?php
                if(!empty($firm[0]["img3"]))
                {
                    echo 'src="'.$base_url.'service_img/'.$firm[0]["img3"].'"';
                }else
                {
                    echo 'src=""';
                }
                ?>
                                    alt="圖片預覽" style="max-width: 100%;">
            <label id="upload" for="imgInp3" class="choose-file">上傳檔案圖片</label>
            <input id="imgInp3" type="file" class="id_image_large" name="imgInp3">
        </div>
    </div>
    <div class="buttonOne">
        <button name="save" value="1">儲存簡介</button>
    </div>
        </form>
</div>
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
<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp2").change(function(){
        readURL2(this);
    });
</script>
<script type="text/javascript">
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp3").change(function(){
        readURL3(this);
    });
</script>