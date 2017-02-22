<div class="span9" id="content">




    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">活動管理</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">


                    <form class="form-horizontal" action="?" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>編輯選單</legend>

                            <div class="control-group">
                                <label class="control-label" for="typeahead">選單名稱 </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="name" value="<?php if(!empty($menu[0]["name"])){echo $menu[0]["name"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">選單狀態</label>
                                <div class="controls">
                                    <select id="select01" class="chzn-select" name="state">
                                        <option value="0" <?php if(!empty($menu[0]["state"]) && $menu[0]["state"]==0){echo "selected";}?>>隱藏</option>
                                        <option value="1" <?php if(!empty($menu[0]["state"]) && $menu[0]["state"]==1){echo "selected";}?>>顯示</option>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">頁面類型</label>
                                <div class="controls">
                                    <select id="select01" class="chzn-select" name="type">
                                        <option value="1" <?php if(!empty($menu[0]["type"]) && $menu[0]["type"]==1){echo "selected";}?>>單獨頁面</option>
                                        <option value="2" <?php if(!empty($menu[0]["type"]) && $menu[0]["type"]==2){echo "selected";}?>>列表頁面</option>
                                        <option value="3" <?php if(!empty($menu[0]["type"]) && $menu[0]["type"]==3){echo "selected";}?>>經驗分享版型頁面</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select01">選單排序(越大越前面)</label>
                                <div class="controls">
                                    <input type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" name="order" value="<?php if(isset($menu[0]["order"])){echo $menu[0]["order"];}?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="form-actions">

                                <button class="btn btn-primary" name="<?php if(!empty($menu[0])){echo "update";}else{echo "save";}?>" value="<?php if(!empty($menu[0])){echo $menu[0]["id"];}else{echo "1";}?>">確認儲存</button>
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
