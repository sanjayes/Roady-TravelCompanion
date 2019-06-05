<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from practoadmin.justthemevalley.com/practoadmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2019 09:54:53 GMT -->
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta charset="UTF-8">
<meta name="description" content="Practo - The Ultimate Multipurpose Admin Template">
<meta name="keywords" content="Practo, Admin, Template, Bootstrap">
<title>Roady | Travel Companion</title>
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.icon">
<link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/jquery.bootgrid.override.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/lightgallery.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/lightgallery.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
</head>

<body>
<header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
  <ul class="header-inner">

    <!-- Logo -->
    <li class="logo"> <a href="<?php echo site_url('AdminController/admin_dash') ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="Practo"></a>
      <div id="menu-trigger"><i class="jtv jtv-menu"></i></div>
    </li>

    <!-- Settings -->
    <li class="pull-right dropdown hidden-xs"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo site_url('AdminController/logout'); ?>">Logout</a></li>
      </ul>
    </li>

    <!-- Time -->
    <li class="pull-right hidden-xs">
      <div id="time"> <span id="t-hours"></span> <span id="t-min"></span> <span id="t-sec"></span> </div>
    </li>
  </ul>
</header>
<aside id="sidebar">

  <!--| MAIN MENU |-->
  <ul class="side-menu">
    <li class="sm-sub sms-profile"> <a class="clearfix" href="#"> <img src="<?php echo base_url() ?>assets/img/profile-pic.jpg" alt=""> <span class="f-11"> <span class="d-block"><?php echo $this->session->userdata('name'); ?></span> <small class="text-lowercase"><?php echo $this->session->userdata('email'); ?></small> </span> </a>
      <ul>
        <li><a href="<?php echo site_url('AdminController/logout'); ?>">Logout</a></li>
      </ul>
    </li>
    <li> <a href="<?php echo site_url('AdminController/admin_dash') ?>"> <i class="jtv jtv-home"></i> <span>Home</span> </a> </li>
    <li> <a href="<?php echo site_url('AdminController/app_srvc') ?>"><i class="jtv jtv-check-all"></i><span>Approval Requests</span></a></li>
    <li> <a href="<?php echo site_url('AdminController/mng_srvc') ?>"><i class="jtv jtv-directions-car"></i><span>Manage Providers</span></a></li>
    <li> <a href="<?php echo site_url('AdminController/mng_usr') ?>"> <i class="jtv jtv-accounts-alt"></i> <span>Users</span> </a> </li>
    <li> <a href="<?php echo site_url('AdminController/logout') ?>"> <i class="jtv jtv-power"></i> <span>Logout</span> </a> </li>
  </ul>
</aside>
