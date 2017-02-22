<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li <?php if(!empty($choose == 1)){echo'class="active"';}?>>
                    <a href="<?php echo $base_url.'index.php/import_fee'?>"><i class="icon-chevron-right"></i> 匯入傭金表</a>
                </li>
                <li  <?php if(!empty($choose == 2)){echo'class="active"';}?>>
                    <a href="<?php echo $base_url.'index.php/view_fee'?>"><i class="icon-chevron-right"></i> 瀏覽傭金表</a>
                </li>

            </ul>
        </div>