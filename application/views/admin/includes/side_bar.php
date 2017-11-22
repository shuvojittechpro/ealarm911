<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-user"></i> <span>Basu Ealarm911!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
        <img src="<?php echo $this->config->item('images_url')?>admin.jpg" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
        <span>Welcome,</span>
        <h2>Administrator</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="<?php echo base_url('admin/dashboard')?>">Dashboard</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="<?php echo base_url('admin/user/index')?>">List</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-question"></i> Security Questions <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="<?php echo base_url('admin/security_questions/index')?>">Management</a></li>
            </ul>
            </li>
            
        </ul>
        </div>
        <div class="menu_section">
        <h3></h3>
        <ul class="nav side-menu">
            
        </ul>
        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('admin/home/process_logout')?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>