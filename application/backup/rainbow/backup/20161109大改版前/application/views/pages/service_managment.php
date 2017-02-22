<div class="login">
    <form action="?" method="post" enctype="multipart/form-data">
    <div class="selectAll">
        <p>請選擇分類</p>
        <select class="loginInput" name="cat">
            <option value="1">美容 美體</option>
            <option value="2">美甲</option>
            <option value="3">美睫</option>
            <option value="4">美髮</option>
            <option value="5">紋繡 半永久術</option>
        </select>
    </div>
    <div class="upload">
        <p>上傳服務封面照片</p>
        <div class="uploadbox"><img id="blah"
        <?
            if(!empty($service["img"]))
            {
                echo 'src="'.$base_url.'service_img/'.$service["img"].'"';
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
            <p>上傳說明照片</p>
            <div class="uploadbox"><img id="blah2"
                    <?
                    if(!empty($service["img2"]))
                    {
                        echo 'src="'.$base_url.'service_img/'.$service["img2"].'"';
                    }else
                    {
                        echo 'src=""';
                    }
                    ?>
                                        alt="圖片預覽" style="max-width: 100%">
                <label id="upload" for="imgInp2" class="choose-file">上傳檔案圖片</label>
                <input id="imgInp2" type="file" class="id_image_large" name="imgInp2">
            </div>
        </div>
        <div class="upload">
            <p>上傳第二章說明照片</p>
            <div class="uploadbox"><img id="blah3"
                    <?
                    if(!empty($service["img3"]))
                    {
                        echo 'src="'.$base_url.'service_img/'.$service["img3"].'"';
                    }else
                    {
                        echo 'src=""';
                    }
                    ?>
                                        alt="圖片預覽" style="max-width: 100%">
                <label id="upload" for="imgInp3" class="choose-file">上傳檔案圖片</label>
                <input id="imgInp3" type="file" class="id_image_large" name="imgInp3">
            </div>
        </div>
        <div class="inputAll">
        <input placeholder="服務名稱" type="text" value="<?if(!empty($service["name"])){echo $service["name"];}?>" name="name" class="loginInput">
        <input placeholder="服務員姓名" type="text" value="<?if(!empty($service["attendant"])){echo $service["attendant"];}?>" name="attendant" class="loginInput">
        <textarea placeholder="服務簡介" type="text" value="" name="intro" class="loginInput"><?if(!empty($service["intro"])){echo $service["intro"];}?></textarea>
        <textarea placeholder="服務人介紹" type="text" value="" name="attendant_intro" class="loginInput"><?if(!empty($service["attendant_intro"])){echo $service["attendant_intro"];}?></textarea>
    </div>
    <div class="selectAll">
        <p>服務時間設定</p>
        <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
        <div class="detailTimeL">
            <div class="timeLine">
                <?
                if(!empty($service_time_arr))
                {
                    for($i=1; $i<=16; $i++)
                    {
                        if($service_time_arr[$i] == 1)
                        {
                            echo '<span class="timezone timeLineOn"  id="'.$i.'">&nbsp;</span>';
                        }else
                        {
                            echo '<span class="timezone"  id="'.$i.'">&nbsp;</span>';
                        }
                    }
                }else
                {
                    for($i=1; $i<=16; $i++)
                    {
                        echo '<span class="timezone"  id="'.$i.'">&nbsp;</span>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
        <div class="detailTimeL">
            <div class="timeLine">
                <?
                if(!empty($service_time_arr))
                {
                    for($i=17; $i<=32; $i++)
                    {
                        if($service_time_arr[$i] == 1)
                        {
                            echo '<span class="timezone timeLineOn"  id="'.$i.'">&nbsp;</span>';
                        }else
                        {
                            echo '<span class="timezone"  id="'.$i.'">&nbsp;</span>';
                        }
                    }
                }else
                {
                    for($i=17; $i<=32; $i++)
                    {
                        echo '<span class="timezone"  id="'.$i.'">&nbsp;</span>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
        <div class="detailTimeL">
            <div class="timeLine">
                <?
                if(!empty($service_time_arr))
                {
                    for($i=33; $i<=48; $i++)
                    {
                        if($service_time_arr[$i] == 1)
                        {
                            echo '<span class="timezone timeLineOn"  id="'.$i.'">&nbsp;</span>';
                        }else
                        {
                            echo '<span class="timezone"  id="'.$i.'">&nbsp;</span>';
                        }
                    }
                }else
                {
                    for($i=33; $i<=48; $i++)
                    {
                        echo '<span class="timezone"  id="'.$i.'">&nbsp;</span>';
                    }
                }
                ?>
            </div>
        </div>
        <input type="hidden" name="service_time" id="service_time" value="">
        <p>課程時間</p>
        <select class="loginInput" name="time">
            <option value="1">1小時</option>
            <option value="2">2小時</option>
            <option value="3">3小時</option>
            <option value="4">4小時</option>
            <option value="5">5小時</option>
        </select>
        <p>請選擇服務方式</p>
        <select class="loginInput" name="way" onchange="changeway(this)">
            <option value="1">到府服務</option>
            <option value="2">店內服務</option>
        </select>
        <p id="city_title" style="display: none;">請選擇所在區域</p>
        <select class="loginInput" name="city" id="city" style="display: none;">
            <option value="台北市">台北市</option>
        </select>
        <select class="loginInput" name="zone" id="zone" style="display: none;">
            <option value="中正區">中正區</option>
            <option value="大同區">大同區</option>
            <option value="中山區">中山區</option>
            <option value="松山區">松山區</option>
            <option value="大安區">大安區</option>
            <option value="萬華區">萬華區</option>
            <option value="信義區">信義區</option>
            <option value="士林區">士林區</option>
            <option value="北投區">北投區</option>
            <option value="內湖區">內湖區</option>
            <option value="南港區">南港區</option>
            <option value="文山區">文山區</option>
        </select>

    </div>
        <div class="inputAll">
            <input placeholder="店址" type="text" value="<?if(!empty($service["address"])){echo $service["address"];}?>" name="address" class="loginInput" id="address" style="display: none;">
            </div>
    <div class="inputAll">
        <input placeholder="價格" type="text" value="<?if(!empty($service["fee"])){echo $service["fee"];}?>" name="fee" class="loginInput">
        <input placeholder="優惠價格" type="text" value="<?if(!empty($service["special_fee"])){echo $service["special_fee"];}?>" name="special_fee" class="loginInput">
    </div>

        <?
            if(!empty($service)){
                echo '<div class="buttonOne"><button name="update" value="'.$service["id"].'" onclick="servicetime()">更新</button></div>';
                echo '<div class="buttonOne"><button name="back" value="1" onclick="servicetime()">返回</button></div>';
                echo '<div class="buttonOne"><button name="del" value="'.$service["id"].'" onclick="servicetime()">刪除</button></div>';
            }else
            {
                echo '<div class="buttonOne"><button name="save" value="1" onclick="servicetime()">確認</button></div>';
                echo '<div class="buttonOne"><button name="back" value="1" onclick="servicetime()">返回</button></div>';
            }
        ?>


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
<script type="text/javascript">
    /*
    $(".timezone").click(function () {
        var select_time = document.getElementsByClassName("timeLineOn");
        for(var i= 0; i<select_time.length; i++)
        {
            alert(select_time[i].id);
        }

    });
    */
    function servicetime()
    {
        var select_time = document.getElementsByClassName("timeLineOn");
        var servicetime = [];
        for(var i= 0; i<select_time.length; i++)
        {
            servicetime.push(select_time[i].id);
        }
        var service_time = document.getElementById("service_time");
        service_time.value = JSON.stringify(servicetime);
    }
    function changeway(obj)
    {
        var city_title = document.getElementById("city_title");
        var address = document.getElementById("address");
        var city = document.getElementById("city");
        var zone = document.getElementById("zone");
        if(obj.value == 1)
        {
            city_title.style.display = "none";
            address.style.display = "none";
            city.style.display = "none";
            zone.style.display = "none";
        }else
        {
            city_title.style.display = "block";
            address.style.display = "block";
            city.style.display = "block";
            zone.style.display = "block";
        }
    }

</script>