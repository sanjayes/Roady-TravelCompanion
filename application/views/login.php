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
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.ico">
<link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">
</head>

<body class="login-content">

<!-- Login -->
<div class="lc-block toggled">
  <div class="lcb-float"><i class="jtv jtv-pin-account"></i></div>
  <form action="<?php echo site_url('MainController/form_login') ?>" method="post">
    <p><?php echo $this->session->flashdata('ack'); ?></p>
    <div class="form-group">
      <input type="email" class="form-control" name='email' placeholder="Email" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name='passwd' placeholder="Password" required>
    </div>
    <div class="clearfix"></div>
    <button type="submit" class="btn btn-block btn-primary btn-float m-t-25">Sign In</button>
  </form>
  <ul class="login-navigation">
    <li data-block="#l-register" onclick="location.href='<?php echo site_url('MainController/signup_srvc') ?>'" class="bg-green">Service Register</li>
    <li data-block="#l-forget-password" onclick="location.href='<?php echo site_url('MainController/lostpasswd') ?>'" class="bg-orange">Forgot Password?</li>
  </ul>
</div>


<!-- Javascript Libraries -->
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
</body>

</html>
