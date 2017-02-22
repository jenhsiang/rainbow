<div class="span9" id="content">




    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">經驗分享頁面管理</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">


                    <form class="form-horizontal" action="?" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>列表頁面編輯</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">文章標題 </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="title" value="<?php if(!empty($content[0]["title"])){echo $content[0]["title"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">所屬選單</label>
                                <div class="controls">
                                    <select id="select01" class="chzn-select" name="parent">
                                        <?php
                                            foreach($menu as $item)
                                            {
                                                if($item["id"] == $content[0]["parent"])
                                                {
                                                    echo '<option value="'.$item["id"].'" selected>'.$item["name"].'</option>';
                                                }else
                                                {
                                                    echo '<option value="'.$item["id"].'">'.$item["name"].'</option>';
                                                }
                                            }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">年紀 </label>
                                <div class="controls">
                                    <input type="number" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="old" value="<?php if(!empty($content[0]["old"])){echo $content[0]["old"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">服務項目 </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="service" value="<?php if(!empty($content[0]["service"])){echo $content[0]["service"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">文章簡述 </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="intro" value="<?php if(!empty($content[0]["intro"])){echo $content[0]["intro"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fileInput">文章照片上傳</label>
                                <div class="controls">
                                    <?php
                                    if(!empty($content[0]["img"]))
                                    {
                                        echo '<img src="'.$base_url.'upload/'.$content[0]["img"].'" style="max-width: 50%;">';
                                    }
                                    ?>
                                </div>
                                <div class="controls">
                                    <input class="input-file uniform_on" id="fileInput" type="file" name="img">
                                    <p class="help-block">檔案名稱必須為英文。</p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">文章狀態</label>
                                <div class="controls">
                                    <select id="select01" class="chzn-select" name="state">
                                        <option value="0" <?php if(!empty($content[0]["state"]) && $content[0]["state"]==0){echo "selected";}?>>隱藏</option>
                                        <option value="1" <?php if(!empty($content[0]["state"]) && $content[0]["state"]==1){echo "selected";}?>>顯示</option>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">顯示頁頭</label>
                                <div class="controls">
                                    <select id="select01" class="chzn-select" name="first">
                                        <option value="0" <?php if(!empty($content[0]["first"]) && $content[0]["first"]==0){echo "selected";}?>>否</option>
                                        <option value="1" <?php if(!empty($content[0]["first"]) && $content[0]["first"]==1){echo "selected";}?>>是</option>

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="select01">文章排序(越大越前面)</label>
                                <div class="controls">
                                    <input type="number" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="order" value="<?php if(isset($content[0]["order"])){echo $content[0]["order"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">內文</label>
                                <div class="controls">
                                    <textarea id="edm_content" name="edm_content" style="width: 600px; height: 200px"><?php if(!empty($content[0]["content"])){echo $content[0]["content"];}?></textarea>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-primary" name="<?php if(!empty($content[0])){echo "update";}else{echo "save";}?>" value="<?php if(!empty($content[0])){echo $content[0]["id"];}else{echo 1;}?><?php ?>">儲存</button>
                                <button class="btn" name="back" value="1">返回</button>
                            </div>
                        </fieldset>
                    </form>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
</div>
<hr>
<footer>
    <p></p>
</footer>
</div>
<!--/.fluid-container-->
<link href="<?php echo $base_url;?>vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="<?php echo $base_url;?>vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="<?php echo $base_url;?>vendors/chosen.min.css" rel="stylesheet" media="screen">

<link href="<?php echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

<script src="<?php echo $base_url;?>vendors/jquery-1.9.1.js"></script>
<script src="<?php echo $base_url;?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url;?>vendors/jquery.uniform.min.js"></script>
<script src="<?php echo $base_url;?>vendors/chosen.jquery.min.js"></script>
<script src="<?php echo $base_url;?>vendors/bootstrap-datepicker.js"></script>

<script src="<?php echo $base_url;?>vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo $base_url;?>vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

<script src="<?php echo $base_url;?>vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<script type="text/javascript" src="<?php echo $base_url;?>vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $base_url;?>assets/form-validation.js"></script>

<script src="<?php echo $base_url;?>assets/scripts.js"></script>
<script>

    jQuery(document).ready(function() {
        FormValidation.init();
    });


    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.bar').css({width:$percent+'%'});
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
        $('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>
<script src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo $base_url;?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<script src="<?php echo $base_url;?>ckeditor/samples/js/sample.js"></script>

<script>
    initSample();

    function fill_textarea(){
        var content = document.getElementById("edm_content");
        var suggestion = document.getElementById("edm_suggestion");
        var data = CKEDITOR.instances.edm_content.getData();
        content.innerHTML = data;
        alert(content.value);
        var data = CKEDITOR.instances.edm_suggestion.getData();
        suggestion.value = data;
    }

    function showfortemp4(item)
    {
        var temp4_item1 =  document.getElementById("temp4_item1");
        var temp4_item2 =  document.getElementById("temp4_item2");
        var temp4_item3 =  document.getElementById("temp4_item3");
        if(item.value == 4)
        {
            temp4_item1.style.display = "block";
            temp4_item2.style.display = "block";
            temp4_item3.style.display = "block";
        }else
        {
            temp4_item1.style.display = "none";
            temp4_item2.style.display = "none";
            temp4_item3.style.display = "none";
        }
    }
</script>

<script>
    CKEDITOR.replace( 'edm_content', {
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
    CKEDITOR.replace( 'edm_content2', {
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
    CKEDITOR.replace( 'edm_suggestion', {
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
</script>
</body>

</html>