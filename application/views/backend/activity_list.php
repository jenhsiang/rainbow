<!--/span-->
<div class="span9" id="content">

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <form action="?" method="post">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">活動管理</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="table-toolbar">
                            <div class="btn-group">
                                <a href="edit_activity.php"><button class="btn btn-success" name="new" value="1">新增活動 <i class="icon-plus icon-white"></i></button></a>
                            </div>
                        </div>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                            <thead>
                            <tr>
                                <th>活動ID</th>
                                <th style="width: 50%;">活動名稱</th>
                                <th>活動狀態</th>
                                <th>功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($activity))
                            {
                                foreach($activity as $item)
                                { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $item["id"];?></td>
                                        <td><?php echo $item["name"];?></td>
                                        <td><?php echo $item["state_title"];?></td>
                                        <td><button name="edit" value="<?php echo $item["id"]; ?>">編輯活動</button><button  name="sign" value="<?php echo $item["id"]; ?>">報名紀錄</button><button  name="vote" value="<?php echo $item["id"]; ?>">決賽名單</button><button  name="winner" value="<?php echo $item["id"]; ?>">得獎名單</button></td>
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