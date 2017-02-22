<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
<!--Slicknav-->
<script src="<?echo $base_url;?>assets_view/js/slicknav/modernizr2.6.2.min.js"></script>
<script src="<?echo $base_url;?>assets_view/js/slicknav/jquery.slicknav.js"></script>
<script>
    $(document).ready(function(){
        $('#menu').slicknav();
    });

</script>
<!--owl-->
<script src="<?echo $base_url;?>assets_view/js/owl/owl.carousel.js"></script>
<!--swiper-->
<script src="<?echo $base_url;?>assets_view/js/swiper/idangerous.swiper-2.0.min.js"></script>
<form action="?" method="post">
<section class="detail">
    <p class="title"><?if(!empty($service[0]["name"])){echo $service[0]["name"];}?></p>
</section>
<section class="owl-carousel">
    <div class="item"><img src="<?echo $base_url;?>service_img/<?if(!empty($service[0]["img"])){echo $service[0]["img"];}?>"></div>
    <div class="item"><img src="<?echo $base_url;?>service_img/<?if(!empty($service[0]["img2"])){echo $service[0]["img2"];}?>"></div>
    <div class="item"><img src="<?echo $base_url;?>service_img/<?if(!empty($service[0]["img3"])){echo $service[0]["img3"];}?>"></div>
</section>
<section class="detail">
    <div class="detailComment">
        <p class="detailCommentA">
            <?
            /*
                for($i=1; $i<=5; $i++)
                {
                    if($i<=$service[0]["eva"])
                    {
                        echo '<img src="'.$base_url.'assets_view/images/starPink.png">';
                    }else
                    {
                        echo '<img src="'.$base_url.'assets_view/images/starGrey.png">';
                    }
                }
            */
            ?>
            <span style="color: #fc92d0;">目前評價：<? echo $service[0]["eva"];?>分</span>
            <a href="<?echo $base_url;?>index.php/score_list?id=<?if(!empty($service[0]["id"])){echo $service[0]["id"];}?>">所有評論</a></p>
        <p class="detailCommentB"><span>NT$ <?if(!empty($service[0]["special_fee"])){echo $service[0]["special_fee"];}?></span ><del>NT$ <?if(!empty($service[0]["fee"])){echo $service[0]["fee"]."</del>";}?><a href="<?echo $base_url;?>index.php/about?id=<?if(!empty($service[0]["id"])){echo $service[0]["firm"];}?>">關於我</a></p>
    </div>
    <div class="detailTime">
        <p>可約時間<span style="color: #fc92d0;">(本服務<? echo $service[0]["time"];?>小時)</span></p>
        <p class="detailTimeS">日期</p>
        <div class="detailTimeL ">
            <input type="text" id="datepicker" name="re_date" class="loginInput" style="width: 100%;height: 40px; border: 1px solid #cacaca;-webkit-border-radius: 25px; text-align: center;">
            <!--
            <select name="re_date" id="re_date" onChange="changeddate()">
                <?
                if(!empty($able_date))
                {
                    for($i=0; $i<count($able_date); $i++)
                    {
                        echo '<option value="'.$i.'">'.$able_date[$i].'</option>';
                    }
                }
                ?>
            </select>
          -->
        </div>
        <p class="detailTimeS">時段</p>
        <div class="detailTimeL">
            <select  name="re_time" id="re_time">
                <?
                if(!empty($able_time[0]))
                {
                    for($i=0; $i<count($able_time[0]); $i++)
                    {
                        echo '<option value="'.$able_time[0][$i].'">'.$able_time[0][$i].'</option>';
                    }
                }
                ?>
            </select>
            <input type="hidden" id="able_time_json" value='<? echo $able_time_json;?>'>
        </div>
        <div class="buttonThree">
            <button name="fav" value="<?echo $service[0]["id"]?>">加入最愛</button>
            <button name="ask" value="<?echo $service[0]["id"]?>">服務諮詢</button>
            <button name="rev" value="<?echo $service[0]["id"]?>">立即預約</button>
        </div>
        <input type="hidden" id="service_id" value="<?echo $service[0]["id"]?>">
    </div>
    <div class="detailContent">
        <?if(!empty($service[0]["img4"])){echo '<img src="<?echo $base_url;?>service_img/'.$service[0]["img4"].'">';}?>
        <p><?if(!empty($service[0]["intro"])){echo $service[0]["intro"];}?></p>
    </div>
    <div class="service">
        <div class="serviceIcon"><img src="<?echo $base_url;?>assets_view/images/service.png"></div>
        <p class="serviceA"><?if(!empty($service[0]["attendant"])){echo $service[0]["attendant"];}?></p>
        <p class="detailContent" style="margin-left: 0px;"><?if(!empty($service[0]["img3"])){echo '<img src="'.$base_url.'service_img/'.$service[0]["img3"].'" style="max-width:100%;">';}?></p>
        <p class="serviceB"><?if(!empty($service[0]["attendant_intro"])){echo $service[0]["attendant_intro"];}?></p>
    </div>
    <div class="service">
        <p class="serviceA" style="margin-left: 0px; text-align: center;">壓我加入彩虹</p>
        <p class="detailContent" style="margin-left: 0px; text-align: center;"><a href="<?if(!empty($share_url)){echo $share_url;}?>"><img src="<?echo $base_url;?>assets_view/images/finger.png" style="max-width:50%;"></a></p>
    </div>
</section>
    </form>
</div>
<script type="text/javascript">
    function changeddate() {
        var able_time_json = document.getElementById("able_time_json");
        var re_date = document.getElementById("re_date");
        var re_time = document.getElementById("re_time");
        //alert(cat_sub_json.value);
        var temp_able_time = JSON.parse(able_time_json.value);
        $('#re_time').find('option').remove().end();
        var new_option;
        var selected = re_date.value;

        for (var i=0;i<temp_able_time[selected].length;i++)
        {
            new_option = new Option(temp_able_time[selected][i], temp_able_time[selected][i]);
            re_time.options.add(new_option);
        }

    }

</script>
<script>
    $(document).ready(function() {
        $('.slicknav_btn').click(function(){
            //$('span').toggleClass('slicknav_icon');
            $('span').toggleClass('slicknav_icon_open');
        });
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                }
            }
        })
    });
    new UISearch( document.getElementById( 'sb-search' ) );
</script>
<script type="text/javascript">
    $("#datepicker").change(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Index/get_service_time'); ?>",
            data: { date: $("#datepicker").val(), id: $("#service_id").val()},
            success: function(data) {
                var options = JSON.parse(data);
                var re_time = document.getElementById("re_time");
                $('#re_time').find('option').remove().end();
                var new_option;
                for (var i=0;i<options.length;i++)
                {
                    new_option = new Option(options[i], options[i]);
                    re_time.options.add(new_option);
                }
                if(options.length == 0)
                {
                    alert('當日預約額滿或無發可預約時段');
                }
            }
        });
    });
</script>