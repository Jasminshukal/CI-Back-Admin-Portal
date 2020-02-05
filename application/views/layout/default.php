<?php
    $main_url=base_url("assets/");
    define("MAIN_URL",$main_url);
?>
<!DOCTYPE html>

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
        <meta content="Smart WebTech is the India based offshore development company pioneer in website development, mobile application development and web data scraping" name="description" />
        <meta content="Mr Jasmin Shukal" name="author" />
        <!-- BEGIN include file local STYLE -->
        <?php foreach($include_css as $key=>$value)
        {   ?>
                <link href="<?=MAIN_URL.$value; ?>" rel="stylesheet" type="text/css" content="THIS CSS COME FROM CORE/MY_CONTROLLER <?=$key+1;?> " />    
            <?php 
        }
        ?>
        <link rel="shortcut icon" href="<?php echo $main_url;?>/upload/<?=$this->settings['favicon'];?>" /> 
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
    <!-- <body class="page-header-fixed page-sidebar-closed-hide-logo"> -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo">
    <!-- <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-reversed"> -->
        <div class="loader"></div>

        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?=base_url();?>">
                        <p alt="logo" class="logo-default" style="color:red; font-weight: 600;">
                            </p> </a> 
                            <!-- <img src="<?php echo $main_url; ?>layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a> -->
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
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
                                    <li>
                                        <a href="<?=base_url("logout")?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>

            <?php
            $per_arr=array(); 
            $per_arr=$this->session->userdata("access");

            ?>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
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
                        <!-- <img src="<?php echo $main_url; ?>pages/img/Au Royaume des enfants.png"> -->

                        <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                            </li>
                            <li class="nav-item start">
                                <a href="<?=base_url()?>" class="nav-link ">
                                   <img style="background: #FFF;" src="<?php echo $main_url; ?>/upload/<?=$this->settings['app_logo'];?>" alt="" width="100%" />
                                </a>
                            </li>
                            <!-- <li class="nav-item <?php if($menu=="Dashboard"){ echo "active"; } ?> ">
                                        <a href="<?=base_url("Dashboard")?>" class="nav-link ">
                                            <i class="fa fa-building"></i> <span class="title">Dashboard</span>
                                        </a>
                            </li> -->
                            <?php if(isset($per_arr->Users)) {if($per_arr->Users==1){ ?>
                            <li class="nav-item <?php if($menu=="Users"){ echo "active"; } ?> ">
                                        <a href="<?=base_url("Users")?>" class="nav-link ">
                                            <i class="fa fa-user"></i> <span class="title">Users</span>
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

                                <!-- -address-book -->
                                <!-- Personal -->
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
                        <!-- BEGIN PAGE HEADER-->
                       
                        <!-- BEGIN PAGE TITLE-->
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
       
        
        <!-- BEGIN CORE PLUGINS -->
        <?php foreach($include_js as $key=>$value)
        {   ?>
                <!-- <link href="<?=MAIN_URL.$value; ?>" rel="stylesheet" type="text/css" content="THIS JS COME FROM CORE/MY_CONTROLLER <?=$key+1;?> " />     -->
                <script src="<?=MAIN_URL.$value; ?>" type="text/javascript" content="THIS JS COME FROM CORE/MY_CONTROLLER <?=$key+1;?> "></script>
            <?php 
        }
        ?>

        
        <script>
            $(document).ready(function()
            {
                var ready = false;
                $(document).ready(function () {
                    $(".loader").fadeOut("slow");
                });
            });
        </script>
    </body>

</html>