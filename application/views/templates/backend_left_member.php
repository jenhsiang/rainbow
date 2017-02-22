<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li <?php if(!empty($choose) && $choose == 1){echo'class="active"';}?>>
                    <a href="<?php echo $base_url.'index.php/backend/member_list'?>"><i class="icon-chevron-right"></i>管理會員</a>
                </li>


            </ul>
        </div>