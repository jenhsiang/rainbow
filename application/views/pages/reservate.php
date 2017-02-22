<form action="?" method="post">
<section class="reservate">
    <div style="width: 100%; padding-top: 10px;">
        <a href="<?php echo $base_url."index.php/detail1";?>"><div style="width: 33%;height: 40px;float: left;padding-top: 12px; text-align: center;background-color: #c185d0;color: white;">遲到罰則</div></a>
        <a href="<?php echo $base_url."index.php/detail1";?>"><div style="width: 33%;height: 40px;float: left;padding-top: 12px; text-align: center;background-color: #c185d0;color: white;">未到罰款</div></a>
        <a href="<?php echo $base_url."index.php/detail1";?>"><div style="width: 33%;height: 40px;float: left;padding-top: 12px; text-align: center;background-color: #c185d0;color: white;">注意事項</div></a>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">日期</p>
        <div class="reservateChoice">
            <input placeholder="" type="text" value="<?php  if(!empty($re_date)){echo $re_date;}?>" name="re_date">
            <!--
            <select name="re_date" id="re_date" onChange="changeddate()">
                <?php
            if(!empty($able_date))
                {
                    for($i=0; $i<count($able_date); $i++)
                    {
                        if($re_date == $i)
                        {
                            echo '<option value="'.$i.'" selected>'.$able_date[$i].'</option>';
                        }else
                        {
                            echo '<option value="'.$i.'">'.$able_date[$i].'</option>';
                        }
                    }
                }
                ?>
            </select>
            --->
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">時段</p>
        <div class="reservateChoice">
            <input placeholder="" type="text" value="<?php  if(!empty($re_time)){echo $re_time;}?>" name="re_time">
            <!--
            <select  name="re_time" id="re_time">
                <?php
            if(!empty($able_time[0]))
                {
                    for($i=0; $i<count($able_time[0]); $i++)
                    {

                        if($re_time == $able_time[0][$i])
                        {
                            echo '<option value="'.$able_time[0][$i].'" selected>'.$able_time[0][$i].'</option>';
                        }else
                        {
                            echo '<option value="'.$able_time[0][$i].'">'.$able_time[0][$i].'</option>';
                        }
                    }
                }
                ?>
            </select>
            -->
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">預約地點</p>
        <div class="reservateChoice">
            <input placeholder="" type="text" value="<?php if(!empty($service["way"]) && $service["way"] == 2){ echo $service["city"].$service["zone"].$service["address"];}?>" name="address">
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">聯絡人</p>
        <div class="reservateChoice">
            <input placeholder="" type="text" value="<?php  if(!empty($member)){echo $member["name"];}?>" name="name">
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">聯絡電話</p>
        <div class="reservateChoice">
            <input placeholder="" type="text" value="<?php  if(!empty($member)){echo $member["tel"];}?>" name="tel">
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">費用</p>
        <div class="reservateChoice">
            <input placeholder="" type="number" value="<?php  if(!empty($fee)){echo $fee;}?>" name="fee" readonly>
        </div>
    </div>

    <div class="reservateList">
        <p class="reservateTitle">使用彩虹幣</p>
        <div class="reservateChoice">
            <input style="width: 50%; float: left;" placeholder="銀幣餘<?php  if(!empty($member)){echo $member["gold2"];}?>" type="number" value="" id="gold2" name="gold2" max="<?php  if(!empty($member["gold2"]) && $member["gold2"] > 100){echo "100";}else{echo $member["gold2"];}?>" onchange="check_gold2(this)">
            <input style="width: 50%; float: left;" placeholder="金幣餘<?php  if(!empty($member)){echo $member["gold"];}?>" type="number" value="" id="gold" name="gold" max="<?php  if(!empty($member)){echo $member["gold"];}?>" onchange="check_gold(this)">
        </div>
        <input placeholder="" type="hidden" id="gold_to_use2" name="gold_to_use2" value="<?php  if(!empty($member)){echo $member["gold2"];}?>">
        <input placeholder="" type="hidden" id="gold_to_use" name="gold_to_use" value="<?php  if(!empty($member)){echo $member["gold"];}?>">
    </div>

    <div class="reservateList">
        <p class="reservateTitle">備註</p>
        <div class="reservateChoice">
            <textarea placeholder="" type="text" value="" name="remark"></textarea>
        </div>
    </div>

    <div class="reservateList">
        <p class="reservateTitle">&nbsp;</p>
        <div class="reservateChoice">
            <button name="confirm" value="1">確認預約</button>
        </div>
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

    function check_gold(item) {
        var gold_to_use = document.getElementById("gold_to_use");
        if(item.value > gold_to_use.value)
        {
            item.value = gold_to_use.value;
        }else if(item.value < 0)
        {
            item.value = 0;
        }
    }

    function check_gold2(item) {
        var gold_to_use = document.getElementById("gold_to_use2");
        if(item.value > 100)
        {
            item.value = 100;
        }
        else if(parseInt(item.value) > parseInt(gold_to_use.value))
        {
            item.value = gold_to_use.value;
        }else if(item.value < 0)
        {
            item.value = 0;
        }
    }

    function set_gold(item) {
        var gold = document.getElementById("gold");
        var gold2 = document.getElementById("gold2");
        if(item.value == 1)
        {
            gold.style.display = "none";
            gold2.style.display = "block";
        }else
        {
            gold.style.display = "block";
            gold2.style.display = "none";
        }
    }

</script>