<!--/span-->
<div class="span9" id="content">

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <form action="?" method="post">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">醫生管理</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="table-toolbar">
                            <a href="edit_activity.php"><button class="btn btn-success" name="new" value="1">新增醫師 <i class="icon-plus icon-white"></i></button></a>
                        </div>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                            <thead>
                            <tr>
                                <th>醫生ID</th>
                                <th>醫師姓名</th>
                                <th>排序</th>
                                <th>隱藏/顯示</th>
                                <th>功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($doctor))
                            {
                                foreach($doctor as $item)
                                { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $item["id"];?></td>
                                        <td><?php echo $item["name"];?></td>
                                        <td><?php echo $item["order"];?></td>
                                        <td><?php echo $item["state"];?></td>
                                        <td><button name="edit" value="<?php echo $item["id"]; ?>">編輯文章</button><button name="del" value="<?php echo $item["id"]; ?>">刪除文章</button></td>
                                    </tr>
                                <?php     }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <!-- /block -->
    </div>
</div>
</div>