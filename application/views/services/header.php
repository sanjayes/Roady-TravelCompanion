<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="x-ua-compatible" content="ie=edge">
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
<link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet">

<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
</head>

<body>
<header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
  <ul class="header-inner">

    <!-- Logo -->
    <li class="logo"> <a href="<?php echo site_url('ServiceController/service_home') ?>"><img src="<?php echo base_url() ?>assets /img/logo.png" alt="Practo"></a>
      <div id="menu-trigger"><i class="jtv jtv-menu"></i></div>
    </li>

    <!-- Settings -->
    <li class="pull-right dropdown hidden-xs"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo site_url('ServiceController/profile'); ?>">Profile</a></li>
        <li><a href="<?php echo site_url('ServiceController/logout'); ?>">Logout</a></li>
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
        <li><a href="<?php echo site_url('ServiceController/logout'); ?>">Logout</a></li>
      </ul>
    </li>
    <li> <a href="<?php echo site_url('ServiceController/service_home') ?>"> <i class="jtv jtv-home"></i> <span>Home</span> </a> </li>
    <li> <a href="<?php echo site_url('ServiceController/booking') ?>"> <i class="jtv jtv-assignment-check"></i> <span>Bookings</span> </a></li>
    <li> <a href="<?php echo site_url('ServiceController/profile') ?>"> <i class="jtv jtv-account-o"></i> <span>Profile</span> </a> </li>
    <li> <a href="<?php echo site_url('ServiceController/logout') ?>"> <i class="jtv jtv-power"></i> <span>Logout</span> </a> </li>
  </ul>
</aside>
