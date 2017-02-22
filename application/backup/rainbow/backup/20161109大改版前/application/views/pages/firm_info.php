<!--forget-->
<form action="?" method="post">
<div class="login">
    <div class="inputAll">
        <input placeholder="姓名" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["name"];}?>" name="name" class="loginInput">
        <input placeholder="連絡電話" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["tel"];}?>" name="tel" class="loginInput">
        <input placeholder="聯絡E-mail" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["email"];}?>" name="email" class="loginInput">
        <input placeholder="店家地址" type="text" value="<?if(!empty($firm[0])){echo $firm[0]["address"];}?>" name="address" class="loginInput">
        <input placeholder="密碼" type="password" value=""  name="psd" class="loginInput">
        <input placeholder="請再輸入一次密碼" type="password" value=""  name="psd_check" class="loginInput">
    </div>
    <div class="buttonOne">
        <button name="save" value="<?if(!empty($firm[0])){echo $firm[0]["id"];}?>">更新</button>
    </div>
</div>
    </form>
</div>