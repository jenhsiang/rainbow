<!--/span-->
<div class="span9" id="content">
    <form action="?" method="post">
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Bootstrap dataTables with Toolbar</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <!--<a href="#"><button class="btn btn-success" name="new" value="1">Add New <i class="icon-plus icon-white"></i></button></a>-->
                    </div>
                    <div class="btn-group pull-right">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                        <th>補習班ID</th>
                        <th>補習班名稱</th>
                        <th>聯絡電話</th>
                        <th>聯絡人</th>
                        <th>功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                        if(!empty($firm))
                        {
                            foreach($firm as $item)
                            {
                                echo '<tr class="odd gradeX">';
                                echo '<td>'.$item["id"].'</td>';
                                echo '<td>'.$item["name"].'</td>';
                                echo '<td>'.$item["tel"].'</td>';
                                echo '<td>'.$item["acc"].'</td>';
                                echo '<td class="center"> <button style="width: 100%;" name="check" value="'.$item["id"].'">審核通過</button></td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="<?echo $base_url;?>vendors/jquery-1.9.1.js"></script>
    <script src="<?echo $base_url;?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?echo $base_url;?>vendors/datatables/js/jquery.dataTables.min.js"></script>


    <script src="<?echo $base_url;?>assets/scripts.js"></script>
    <script src="<?echo $base_url;?>assets/DT_bootstrap.js"></script>
    <script>
        $(function() {

        });
    </script>
    <!-- /block -->
    <!--/.fluid-container-->

</div>
        </form>