<form action="?" method="post" enctype="multipart/form-data">
<div class="login">
    <div class="selectAll">
        <p>請選擇分類</p>
        <select  class="loginInput" name="cat">
            <option>分類</option>
            <?php
            if(!empty($cat))
            {
                for($i=0; $i<count($cat);$i++)
                {
                    ?>
                    <option value="<?php echo $cat[$i]["id"];?>"><?php echo $cat[$i]["name"];?></option>
                    <?php
                }
            }
            ?>

        </select>
    </div>
    <div class="upload">
        <p>上傳作品</p>
        <div class="uploadbox"><img id="blah" src="assets/images/sample.jpg" alt="圖片預覽">
            <label id="upload" for="imgInp" class="choose-file">上傳檔案圖片</label>
            <input id="imgInp" type="file" class="id_image_large" name="imgInp">
        </div>
    </div>
    <div class="inputAll">
        <textarea placeholder="作品介紹" type="text" value="" name="intro" class="loginInput"></textarea>
    </div>
    <div class="buttonOne">
        <button name="save" value="1">新增作品</button>
    </div>
</div>
    </form>
<form action="?" method="post">
<section class="nears nearA">
    <section class="nears">
        <div class="productBox">

            <?php
            if(!empty($photo))
            {
                for($i=0; $i<count($photo); $i++)
                {
                    if($i == 16)
                    {
                        break;
                    }
                    ?>
                    <div class="clear" >
                        <?php
                        for($x=0; $x<4; $x++)
                        {
                            if($i+$x == count($photo))
                            {
                                break;
                            }
                            ?>
                            <div class="product" style="border-bottom: dashed; margin-bottom: 8px;"><span style="background-image:url('<?php echo $base_url;?>service_img/<?php echo $photo[$i+$x]["img"];?>')" class="productImg"></span>
                                <p class="proA"><textarea name="<?php echo $photo[$i+$x]["id"];?>" style="border-style: solid; border-width: 1px; border-color: #d4d2d2;width: 100%;"><?php echo $photo[$i+$x]["intro"];?></textarea></p>
                                <button class="proD" name="update" value="<?php echo $photo[$i+$x]["id"];?>" style="margin-bottom: 5px;">更新</button>
                                <button class="proD" name="remove" value="<?php echo $photo[$i+$x]["id"];?>">刪除</button>
                            </div>

                            <?php
                        }
                        $i = $i+3;
                        ?>
                    </div>
                    <?php
                }
            }
            ?>

            <!--<div class="productBoxPage"><a href=""><</a><a href="">1</a><a href="" class="arrive">2</a><a href="">3</a><a href="">></a></div>-->
        </div>
    </section>
</section>
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