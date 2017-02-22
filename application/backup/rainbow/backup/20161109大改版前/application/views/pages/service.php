<section class="detail">
    <p class="title"><?if(!empty($service[0]["name"])){echo $service[0]["name"];}?></p>
    <div class="detailImg"><img src="<?echo $base_url;?>service_img/<?if(!empty($service[0]["img"])){echo $service[0]["img"];}?>"></div>
    <div class="detailComment">
        <p class="detailCommentA">目前評價<img src="<?echo $base_url;?>assets_view/images/starPink.png"><img src="<?echo $base_url;?>assets_view/images/starPink.png"><img src="<?echo $base_url;?>assets_view/images/starPink.png"><img src="<?echo $base_url;?>assets_view/images/starHalf.png"><img src="<?echo $base_url;?>assets_view/images/starGrey.png"><a href="">所有評論</a></p>
        <p class="detailCommentB"><span>NT$ <?if(!empty($service[0]["special_fee"])){echo $service[0]["special_fee"];}?></span>NT$ <?if(!empty($service[0]["fee"])){echo $service[0]["fee"];}?></p>
    </div>
    <div class="detailTime">
        <p>可約時間</p>
        <p class="detailTimeS">日期</p>
        <div class="detailTimeL">
            <select>
                <option>2016/09/23</option>
                <option>2016/09/24</option>
                <option>2016/09/25</option>
                <option>2016/09/26</option>
                <option>2016/09/27</option>
            </select>
        </div>
        <p class="detailTimeS">時段</p>
        <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span>
        </div>
        <p class="detailTimeS">&nbsp;</p>
        <div class="detailTimeL">
            <div class="timeLine">
                <?
                if(!empty($service_time_arr))
                {
                    for($i=1;$i<=16;$i++)
                    {
                        if($service_time_arr[$i] == 1)
                        {
                            echo '<span>&nbsp;</span>';
                        }else
                        {
                            echo '<span class="timeLineNo">&nbsp;</span>';
                        }
                    }
                }

                ?>
                <!--<span>&nbsp;</span><span class="timeLineOn">&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span class="timeLineNo">&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>-->
                </div>
        </div>
        <p class="detailTimeS">&nbsp</p>
        <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span>
        </div>
        <p class="detailTimeS">&nbsp;</p>
        <div class="detailTimeL">
            <div class="timeLine">
                <?
                if(!empty($service_time_arr))
                {
                    for($i=17;$i<=32;$i++)
                    {
                        if($service_time_arr[$i] == 1)
                        {
                            echo '<span>&nbsp;</span>';
                        }else
                        {
                            echo '<span class="timeLineNo">&nbsp;</span>';
                        }
                    }
                }

                ?>
                <!--<span>&nbsp;</span><span class="timeLineOn">&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span class="timeLineNo">&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>-->
            </div>
        </div>
        <p class="detailTimeS">&nbsp</p>
        <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span>
        </div>
        <p class="detailTimeS">&nbsp;</p>
        <div class="detailTimeL">
            <div class="timeLine">
                <?
                if(!empty($service_time_arr))
                {
                    for($i=33;$i<=48;$i++)
                    {
                        if($service_time_arr[$i] == 1)
                        {
                            echo '<span>&nbsp;</span>';
                        }else
                        {
                            echo '<span class="timeLineNo">&nbsp;</span>';
                        }
                    }
                }

                ?>
                <!--<span>&nbsp;</span><span class="timeLineOn">&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span class="timeLineNo">&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>-->
            </div>
        </div>

        <p class="detailTimeS">&nbsp;</p>
        <div class="detailTimeL">
            <div class="detailTimeEx">
                <div class="booking"><span>可預約時段</span><span class="timeLineOff">&nbsp;</span></div>
                <div class="booking"><span>已預約時段</span><span class="timeLineOn">&nbsp;</span></div>
                <div class="booking"><span>不可預約時段</span><span class="timeLineNo">&nbsp;</span></div>
                <div class="booking"><span>預約時段單位 / <?if(!empty($service[0]["time"])){echo $service[0]["time"];}?>小時</span></div>
            </div>
        </div>
        <div class="detailTimeBTN">
            <button  onclick="javascript:location.href='<?echo $base_url;?>index.php/reservate'">立即預約</button>
        </div>
    </div>
    <div class="detailContent"><?if(!empty($service[0]["img2"])){echo '<img src="'.$base_url.'service_img/'.$service[0]["img2"].'">';}?>
        <p><?if(!empty($service[0]["intro"])){echo $service[0]["intro"];}?></p>
    </div>
    <div class="service">
        <div class="serviceIcon"><img src="<?echo $base_url;?>assets_view/images/service.png"></div>
        <p class="serviceA"><?if(!empty($service[0]["attendant"])){echo $service[0]["attendant"];}?></p>
        <p class="detailContent" style="margin-left: 0px;"><?if(!empty($service[0]["img3"])){echo '<img src="'.$base_url.'service_img/'.$service[0]["img3"].'" style="max-widht:100%;">';}?></p>
        <p class="serviceB"><?if(!empty($service[0]["attendant_intro"])){echo $service[0]["attendant_intro"];}?></p>
    </div>
    <div class="buttonOne"><button name="back" value="1" onclick="javascript:location.href='<?echo $base_url;?>index.php/service_list?item=<?if(!empty($service[0]["cat"])){echo $service[0]["cat"];}?>'">返回</button></div>
</section>
</div>