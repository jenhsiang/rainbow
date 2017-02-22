<form name="form1" action=" https://test.esafe.com.tw/Service/Etopm.aspx" method="POST">
    <section class="reservate">
        <div class="reservateList">
            <p class="reservateTitle">日期</p>
            <div class="reservateChoice" style="line-height: 40px;">
                <?echo $order["re_date"];?>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">時段</p>
            <div class="reservateChoice" style="line-height: 40px;">
                <?echo $order["re_time"];?>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">預約地點</p>
            <div class="reservateChoice" style="line-height: 40px;">
                <?echo $order["address"];?>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">聯絡人</p>
            <div class="reservateChoice" style="line-height: 40px;">
                <?echo $order["name"];?>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">聯絡電話</p>
            <div class="reservateChoice" style="line-height: 40px;">
                <?echo $order["tel"];?>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">費用</p>
            <div class="reservateChoice" style="line-height: 40px;">
                <?echo $order["fee"];?>
            </div>
        </div>

            <div class="reservateList">
                <p class="reservateTitle">使用銀幣</p>
                <div class="reservateChoice" style="line-height: 40px;">
                    <?echo $order["gold2"];?>
                </div>
                <input placeholder="" type="hidden" id="gold_to_use" name="gold_to_use" value="<? if(!empty($order)){echo $order["gold2"];}?>">
            </div>

            <div class="reservateList">
                <p class="reservateTitle">使用金幣</p>
                <div class="reservateChoice" style="line-height: 40px;">
                    <?echo $order["gold"];?>
                </div>
                <input placeholder="" type="hidden" id="gold_to_use" name="gold_to_use" value="<? if(!empty($order)){echo $order["gold"];}?>">
            </div>

        <div class="reservateList">
            <p class="reservateTitle">備註</p>
            <div class="reservateChoice">
                <textarea placeholder="" type="text" value="" name="remark" readonly> <?echo $order["remark"];?></textarea>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">付款方式</p>
            <div class="reservateChoice">
                <select>
                    <option>線上刷卡</option>
                </select>
            </div>
        </div>
        <div class="reservateList">
            <p class="reservateTitle">&nbsp;</p>
            <div class="reservateChoice">
                <button name="confirm" value="1">確認付款</button>
            </div>
        </div>
    </section>
    <input type="hidden" name="web" value="<? echo urlencode("S1609299019"); ?>">
    <input type="hidden" name="MN" Value="<? echo urlencode($order["fee"] - $order["gold"]);?>">
    <input type="hidden" name="OrderInfo" Value="<? echo urlencode("美妝服務");?>">
    <input type="hidden" name="Td" Value="<?  $mn = (int)microtime(true); echo urlencode($mn);?>">
    <input type="hidden" name="sna" Value="<? echo urlencode($order["name"]);?>">
    <input type="hidden" name="sdt" Value="<? echo urlencode($order["tel"]);?>">
    <<input type="hidden" name="note1" Value="<? echo urlencode($order["remark"]);?>">
    <input type="hidden" name="ChkValue" Value="<? echo urlencode($chkvalue);?>">
</form>
</div>
