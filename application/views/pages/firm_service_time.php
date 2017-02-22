<!--forget-->
    <form action="?" method="post">
        <section class="score">
            <div class="scoreChoice">
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">星期</p>
                    <p style="width: 12%; float: left; padding-top: 24px;">休息</p>
                    <p style="width: 33%; float: left; padding-top: 24px; text-align: center;">開始時間</p>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <p style="width: 33%; float: left; padding-top: 24px; text-align: center;">結束時間</p>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周一</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" style="zoom: 2;" name="wr1" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_1s"] == $service_time[0]["service_time_1e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws1">
                        <?php

                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_1s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we1">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_1e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周二</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" name="wr2" style="zoom: 2;" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_2s"] == $service_time[0]["service_time_2e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws2">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_2s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we2">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_2e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周三</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" style="zoom: 2;" name="wr3" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_3s"] == $service_time[0]["service_time_3e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws3">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_3s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we3">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_3e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周四</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" style="zoom: 2;" name="wr4" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_4s"] == $service_time[0]["service_time_4e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws4">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_4s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we4">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_4e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周五</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" style="zoom: 2;" name="wr5" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_5s"] == $service_time[0]["service_time_5e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws5">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_5s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we5">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_5e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周六</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" style="zoom: 2;" name="wr6" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_6s"] == $service_time[0]["service_time_6e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws6">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_6s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we6">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_6e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="clear:both;">
                    <p style="width: 14%; float: left; padding-top: 24px;">周日</p>
                    <p style="width: 12%; float: left; padding-top: 24px;"><input type="checkbox" style="zoom: 2;" name="wr7" value="1" <?php if(!empty($service_time[0]) && $service_time[0]["service_time_7s"] == $service_time[0]["service_time_7e"]){echo "checked";}?>></p>
                    <select style="width: 33%; float: left;" name="ws7">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_7s"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 8%; float: left; padding-top: 24px; text-align: center;">到</p>
                    <select style="width: 33%; float: left;" name="we7">
                        <?php
                        foreach($time_line as $key=>$item)
                        {
                            if(!empty($service_time[0]) && $service_time[0]["service_time_7e"] == $key)
                            {
                                echo '<option value="'.$key.'" selected>'.$item.'</option>';
                            }else
                            {
                                echo '<option value="'.$key.'">'.$item.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <p style="width: 100%; height:10px;float: left;"> &nbsp;</p>
                </div>

            </div>
            <div class="buttonOne"  style="clear:both;">
                <button name="save" value="1">更新</button>
            </div>
        </section>

</form>
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