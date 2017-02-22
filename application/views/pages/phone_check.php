<form action="?" method="post">
<div class="login">
    <div class="inputAll">
        <input placeholder="請輸入簡訊中的認證碼" type="text" value="" name="code" class="loginInput">
    </div>
    <div class="buttonOne">
        <button name="check" value="1">確認送出</button>
    </div>

</div>
    </form>
<?php
if(!empty($url))
    {
        echo '<iframe src="'.$url.'" width="0" height="0" frameborder="0" scrolling="no"></iframe>';
    }
?>

</div>