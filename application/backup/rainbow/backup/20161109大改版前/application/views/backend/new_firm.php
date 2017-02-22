<!--/span-->
<div class="span9" id="content">
    <form action="?" method="post">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">廠商管理</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>新增廠商</legend>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">廠商id(系統產生)</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" id="focusedInput" type="text" value="<?if(!empty($firm[0]["id"])){echo$firm[0]["id"];}?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">廠商名稱</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="name" value="<?if(!empty($firm[0]["name"])){echo$firm[0]["name"];}?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">連絡電話</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="tel" value="<?if(!empty($firm[0]["tel"])){echo $firm[0]["tel"];}?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea2">備註</label>
                                <div class="controls">
                                    <textarea class="input-xlarge textarea" placeholder="Enter text ..." style="width: 810px; height: 200px" name="other"><?if(!empty($firm[0]["other"])){echo $firm[0]["other"];}?></textarea>
                                </div>
                            </div>


                            <div class="form-actions">
                                <?
                                if(!empty($firm)){
                                    echo '<button type="submit" name="save" value="'.$firm[0]["id"].'" class="btn btn-primary">儲存</button>';
                                }else
                                {
                                    echo '<button type="submit" name="save" value="1" class="btn btn-primary">新增</button>';
                                }
                                ?>

                                <button type="reset" name="back" value="1" class="btn">取消</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
        </form>
    <link href="<?echo $base_url;?>vendors/datepicker.css" rel="stylesheet" media="screen">
    <link href="<?echo $base_url;?>vendors/uniform.default.css" rel="stylesheet" media="screen">
    <link href="<?echo $base_url;?>vendors/chosen.min.css" rel="stylesheet" media="screen">

    <link href="<?echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">