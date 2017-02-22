<!--forget-->
<form action="?" method="post">
<div class="login">
    <div class="inputAll">
        <input placeholder="彩虹代碼" type="text" value="會員代碼：<?if(!empty($member_info[0])){echo $member_info[0]["code"];}?>" name="code" class="loginInput" disabled>
        <input placeholder="帳號" type="text" value="帳號：<?if(!empty($member_info[0])){echo $member_info[0]["acc"];}?>" name="code" class="loginInput" disabled>
        <input placeholder="姓名" type="text" value="<?if(!empty($member_info[0])){echo $member_info[0]["name"];}?>" name="name" class="loginInput">
        <input placeholder="連絡電話" type="text" value="<?if(!empty($member_info[0])){echo $member_info[0]["tel"];}?>" name="tel" class="loginInput">
        <input placeholder="聯絡E-mail" type="text" value="<?if(!empty($member_info[0])){echo $member_info[0]["email"];}?>" name="email" class="loginInput">
        <input placeholder="密碼" type="password" value=""  name="psd" class="loginInput">
        <input placeholder="請再輸入一次密碼" type="password" value=""  name="psd_check" class="loginInput">
    </div>
    <div class="buttonOne">
        <button name="save" value="<?if(!empty($member_info[0])){echo $member_info[0]["id"];}?>">更新</button>
    </div>
</div>
    </form>
</div>