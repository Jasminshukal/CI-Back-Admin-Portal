<?php
    $main_url=base_url("");
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->settings['name']; ?> - <?php if(($title)){ echo $title; } ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for reversed sidebar option" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=$main_url; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$main_url; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$main_url; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$main_url; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=$main_url; ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=$main_url; ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=$main_url; ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$main_url; ?>assets/layouts/layout/css/themes/<?=$this->settings['theam_color'];?>.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=$main_url; ?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/global/plugins/crop_image/css/cropper.css">

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo $main_url;?>assets/upload/<?=$this->settings['favicon'];?>" /> 
        <style type="text/css">
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('<?php echo $main_url; ?>/loder/new3.gif') 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
        </style>
        </head>

    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-reversed">
    <!-- <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-reversed"> -->
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?=base_url();?>" class="logo-default" style="margin: 12px 0 0; color: #fff; font-weight: bold; font-size: larger; text-decoration: none;">
                            <?=$this->settings['name'];?>
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                    <img alt="" class="img-circle img-circle_avatar_profile" src="<?php echo base_url("assets/profile_img/");
                                    $res=$this->session->userdata("profile_image");
                                    if(isset($res) && $res!="")
                                    {
                                        echo $this->session->userdata("profile_image"); 
                                    }
                                    else
                                    {
                                        echo "assets/profile_img/default.png";
                                    }
                                    ?>">

                                    <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata("profile_name"); ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo base_url("Setting/Personal"); ?>">
                                            <i class="icon-user"></i> Personal Info </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url("ChangePassword")?>">
                                            <i class="icon-calendar"></i>Change Password</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?=base_url("logout")?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <?php
            $per_arr=array(); 
            $per_arr=$this->session->userdata("access");

            ?>
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper ">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="nav-item start">
                                <a href="<?=base_url()?>" class="nav-link ">
                                   <img style="background: #FFF;" src="<?php echo $main_url; ?>assets/upload/<?=$this->settings['app_logo'];?>" alt="" width="100%" />
                                </a>
                            </li>
                            <?php if(isset($per_arr->Users)) {if($per_arr->Users==1){ ?>
                            <li class="nav-item <?php if($menu=="Users"){ echo "active"; } ?> ">
                                        <a href="<?=base_url("Users")?>" class="nav-link ">
                                            <i class="fa fa-user"></i> <span class="title">Users</span>
                                        </a>
                            </li>
                            <?php } }?>

                            <?php if(isset($per_arr->Order)) {if($per_arr->Order==1){ ?>
                            <li class="nav-item <?php if($menu=="Order"){ echo "active"; } ?> ">
                                        <a href="<?=base_url("Order")?>" class="nav-link ">
                                            <i class="fa fa-shopping-cart"></i> <span class="title">Order</span>
                                        </a>
                            </li>
                            <?php } }?>

                            <?php if(isset($per_arr->Email_template)){ if($per_arr->Email_template==1){ ?>
                            <li class="nav-item <?php if($menu=="Email_template"){ echo "active"; } ?> ">
                                        <a href="<?=base_url("Email_template")?>" class="nav-link ">
                                            <i class="fa fa-user"></i> <span class="title">Email Template</span>
                                        </a>
                            </li>
                            <?php } } ?>
                            
                            <?php if(isset($per_arr->Setting)){if($per_arr->Setting==1){ ?>
                              <li class="nav-item <?php if($menu=="Setting"){ echo "active"; } ?> ">
                                        <a href="<?=base_url("Setting")?>" class="nav-link ">
                                            <i class="fa fa-cog"></i> <span class="title">System Setting</span>
                                        </a>
                            </li>
                            <?php } }?>

                            <li class="nav-item  <?php if($menu=="Setting_"){ echo "active"; } ?>">
                                        <a href="<?php echo base_url("Setting/Personal")?>" class="nav-link ">
                                            <i class="fa fa-wrench"></i> <span class="title">Edit Profile</span>
                                        </a>
                            </li>

                            <li class="nav-item  ">
                                        <a href="<?php echo base_url("logout")?>" class="nav-link ">
                                            <i class="fa fa-power-off"></i> <span class="title">Logout</span>
                                        </a>
                            </li>


                            
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                    <?php
                        if(!isset($Breadcrumb))
                        {
                        ?>
                        <h1 class="page-title"> <?php if(!empty($page_heading)){ echo $page_heading; } ?>
                            <small><?php if(!empty($page_sub_heading)){ echo $page_sub_heading; } ?></small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <?php if(!empty($breadcrumb_home_logo)){ echo $breadcrumb_home_logo; } ?>
                                <?php if(!empty($arr_breadcrumb)){
                                    foreach($arr_breadcrumb as $key=> $value){ ?>
                                            <li>

                                                <a href="<?php echo $value; ?>"><?php echo $key; ?></a>
                                                <i class="fa fa-angle-right"></i>
                                            </li>        
                                   <?php }
                                    } ?>
                                
                                <li>
                                    <span><?php if(!empty($page_heading)){ echo $page_heading; } ?></span>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                                <a class="btn <?=$this->settings['danger_color'];?>" href="<?php if(!empty($back_button)){ echo $back_button; }else{ echo base_url();} ?>">Back</a>
                                <div style="display: none;" class="btn-group pull-right">
                                    <button type="button" class="btn btn-fit-height default dropdown-toggle" data-toggle="dropdown"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-bell"></i> Action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-shield"></i> Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Something else here</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-bag"></i> Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            ?>                        
                   
                        <?php
                        if($this->session->flashdata('message')) 
                        {
                            echo "<div class='form-group'><div class='col-md-12'><div class='alert alert-info'>";
                            echo $this->session->flashdata('message');;
                            echo "</div></div></div>";
                        }
                        if(!empty($error))
                        {
                            echo '<div class="form-group">
                        <div class="col-md-12">
                        <div class="alert alert-danger">';
                            echo $error;
                            echo "</div></div></div>";
                        }
                    ?>
                        <?php echo $data; ?>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                    <div class="page-quick-sidebar">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                    <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                    <span class="badge badge-success">7</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-bell"></i> Alerts </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-info"></i> Notifications </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-speech"></i> Activities </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-settings"></i> Settings </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"><?php echo $this->settings['footer_text']; ?>
                <!-- &nbsp;|&nbsp; <a target="_blank" href="http://www.smart-webtech.com/">Smart-Webtech</a> -->
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
<script src="<?=$main_url; ?>assets/global/plugins/respond.min.js"></script>
<script src="<?=$main_url; ?>assets/global/plugins/excanvas.min.js"></script> 
<script src="<?=$main_url; ?>assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=$main_url; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=$main_url; ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=$main_url; ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?=$main_url; ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/global/plugins/crop_image/js/cropper.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    <!-- Google Code for Universal Analytics -->
</body>


</html>