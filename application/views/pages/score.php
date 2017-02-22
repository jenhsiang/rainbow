<form action="?" method="post">
<section class="reservate">
    <div class="reservateList">
        <p class="reservateTitle">評價等級</p>
        <div class="reservateChoice">
            <select name="score">
                <?php
                if(!empty($score[0])){


                ?>
                <option value="1" <?php if($score[0]["score"] == 1){ echo "selected";}?>>1分 - 不會再來</option>
                <option value="2" <?php if($score[0]["score"] == 2){ echo "selected";}?>>2分 - 勉強接受</option>
                <option value="3" <?php if($score[0]["score"] == 3){ echo "selected";}?>>3分 - 捧場支持</option>
                <option value="4" <?php if($score[0]["score"] == 4){ echo "selected";}?>>4分 - 過人水平</option>
                <option value="5" <?php if($score[0]["score"] == 5){ echo "selected";}?>>5分 - 彩虹之光</option>
                    <?php
                }else{
                ?>
                    <option value="1">1分 - 不會再來</option>
                    <option value="2">2分 - 勉強接受</option>
                    <option value="3">3分 - 捧場支持</option>
                    <option value="4">4分 - 過人水平</option>
                    <option value="5">5分 - 彩虹之光</option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">評價內容</p>
        <div class="reservateChoice">
            <textarea placeholder="" type="text" name="content" style="font-size: 22px;"><?php if(!empty($score[0]["content"])){echo $score[0]["content"];}?></textarea>
        </div>
    </div>
    <div class="reservateList">
        <p class="reservateTitle">&nbsp;</p>
        <div class="reservateChoice">
            <button name="<?php if(!empty($score[0])){ echo 'update';}else{echo 'save';}?>" value="<?php echo $id;?>">送出評價</button>
        </div>
    </div>
</section>
    </form>
</div>