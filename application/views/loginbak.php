<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from practoadmin.justthemevalley.com/practoadmin2/user_login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2019 10:09:37 GMT -->
<head>
<meta charset="utf-8">
<meta name="description" content="Practo - The Ultimate Multipurpose Admin Template">
<meta name="keywords" content="Practo, Admin, Template, Bootstrap">
<link rel="shortcut icon" href="<?php echo base_url() ?>assets1/favicon.ico">
<title>Login</title>

<!-- START GLOBAL CSS -->
<link href="<?php echo base_url() ?>assets1/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url() ?>assets1/css/waves.min.css" type="text/css" rel="stylesheet"/>
<!-- END GLOBAL CSS -->

<!-- START PAGE PLUG-IN CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets1/fonts/font-awesome/css/font-awesome.min.css"/>
<!-- END PAGE PLUG-IN CSS -->

<!-- START TEMPLATE GLOBAL CSS -->
<link href="<?php echo base_url() ?>assets1/css/user_login_v2.css" type="text/css" rel="stylesheet"/>
<!-- END TEMPLATE GLOBAL CSS -->

</head>
<body>
<div class="login-background">
  <div class="login-left-section"> <img src="<?php echo base_url() ?>assets1/img/logo2.png" alt="logo-image">
    <h2>Welcome to Roady</h2>
  </div>
  <!--  START LOGIN -->
  <div class="login-page">
    <div class="main-login-contain">
      <div class="login-form">
        <form action="<?php echo site_url('MainController/form_login') ?>" method="post">
          <h4>Login to your account</h4>
          <p><?php echo $this->session->flashdata('ack'); ?></p>
          <div class="form-group">
            <input required type="email" name='email'>
            <label class="control-label">Enter Email</label>
            <i class="bar"></i> </div>
          <div class="form-group">
            <input required type="password" name='passwd'>
            <label class="control-label">Enter Password</label>
            <i class="bar"></i> </div>
          <div class="goto-login">
            <div class="forgot-password-login"> <a href="<?php echo site_url('MainController/lostpasswd') ?>"> <i class="icon icon_lock"></i> Forgot password? </a> </div>
            <button type="submit" class="btn btn-login float-button-light">Submit</button>
          </div>
          <div class="social-media-section">
            <div>
              <a class="social-hexagon"> <i class="fa fa-facebook"></i> </a>
              <a class="social-hexagon"> <i class="fa fa-twitter"></i> </a>
              <a class="social-hexagon"> <i class="fa fa-linkedin"></i> </a>
            </div>
            <div class="login-bottom-text">
              <p>Don't have an account?</p>
              <a href="<?php echo site_url('MainController/signup') ?>">Sign Up</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--  END LOGIN -->
</div>

<!-- START CORE JAVASCRIPT -->
<script src="<?php echo base_url() ?>assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets1/js/waves.min.js"></script>
<!-- END CORE JAVASCRIPT -->

</body>

<!-- Mirrored from practoadmin.justthemevalley.com/practoadmin2/user_login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2019 10:09:38 GMT -->
</html>
