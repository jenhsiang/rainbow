<form action="?" method="post">
<div class="login">

    <div class="inputAll" style="text-align: center;">
        <p><img src="<? echo $base_url;?>service_img/<? echo $photo[0]["img"];?>" style="max-width: 100%;"></p>
        <p class="proA"><? echo $photo[0]["intro"];?></p>
    </div>
    <div class="buttonTwo">
        <button name="last" value="<? echo $last;?>" >上一張</button>
        <button name="next" value="<? echo $next;?>">下一張</button>
        <input type="hidden" name="firm_id" value="<? echo $photo[0]["firm_id"];?>">
    </div>
    <div class="buttonOne">
        <button name="back" value="1" >返回關於我</button>
    </div>
</div>
    </form>
</div>