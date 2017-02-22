<section class="score">
    <div class="scoreChoice">
        <select id="score" onchange="select_star(this)">
            <option>評分等級</option>
            <option value="1">1分 - 不會再來</option>
            <option value="2">2分 - 勉強接受</option>
            <option value="3">3分 - 捧場支持</option>
            <option value="4">4分 - 過人水平</option>
            <option value="5">5分 - 彩虹之光</option>
        </select>
    </div>
    <?php
        if(!empty($score))
        {
            for($i=0; $i<count($score); $i++)
            {

    ?>
                <div class="scoreList stardiv<?echo $score[$i]["score"];?>">
                    <!--<div class="scoreImg"><img src="<?echo $base_url;?>assets_view/images/productB.png"></div>-->
                    <div class="pname">
                        <p class="comment">評價等級
                        <?
                            for($x=0;$x<$score[$i]["score"];$x++)
                            {
                                echo '<img src="'.$base_url.'assets_view/images/starPink.png">';
                            }
                            for($x=0;$x<(5-$score[$i]["score"]);$x++)
                            {
                                echo '<img src="'.$base_url.'assets_view/images/starGrey.png">';
                            }
                        ?>
                       </p>
                        <p><?echo $score[$i]["time"];?></p>
                        <p><?echo $score[$i]["content"];?></p>
                    </div>
                </div>
    <?
            }
        }

    ?>



</section>

</div>
<script>
    function select_star(item)
    {
        var name = "stardiv";
        for(var i=1;i<=5;i++)
        {
            var div = document.getElementsByClassName(name+i);
            if(i != item.value)
            {
                for(var x=0;x<div.length;x++)
                {
                    div[x].style.display='none';
                }
            }else
            {
                for(var x=0;x<div.length;x++)
                {
                    div[x].style.display='block';
                }
            }

        }

    }
</script>