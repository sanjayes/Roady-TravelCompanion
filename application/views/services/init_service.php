<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from practoadmin.justthemevalley.com/practoadmin/profile-about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2019 05:28:37 GMT -->
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
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.ico">
<link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">
</head>

<body>
<div class="container">
  <form action="<?php echo site_url('ServiceController/insert_inits') ?>" method="post">
    <div class="tile" id="profile-main">
      <ul class="tab-nav tn-justified">
        <li><a href="<?php echo site_url('ServiceController/init_profile') ?>">Basic Information</a></li>
        <li class="active"><a href="#">Service Details</a></li>
      </ul>
      <div class="pmb-block">
        <div class="pmbb-body p-l-30">
          <div class="pmbb-view">
            <dl class="dl-horizontal col-xs-12">
              <dt class="p-t-10">Company Infrastructure</dt>
              <dd>
                <div class="fg-line">
                  <select class="selectpicker"  class="form-control">
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Worker's Count</dt>
              <dd>
                <div class="fg-line">
                  <input type='number' name="w_count" class="form-control">
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Services per day</dt>
              <dd>
                <div class="fg-line">
                  <input type='number' name="s_count" class="form-control">
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Home Service</dt>
              <dd>
                <div class="fg-line">
                  <label class="radio-inline cr-alt">
                    <input type="radio" name="home_service" value="1">
                    <i class="input-helper"></i> Available </label>
                  <label class="radio-inline cr-alt">
                    <input type="radio" name="home_service" value="0">
                    <i class="input-helper"></i> Not Available </label>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Recovery Van</dt>
              <dd>
                <div class="fg-line">
                  <label class="radio-inline cr-alt">
                    <input type="radio" name="van" value="1">
                    <i class="input-helper"></i> Available </label>
                  <label class="radio-inline cr-alt">
                    <input type="radio" name="van" value="0">
                    <i class="input-helper"></i> Not Available </label>
                </div>
              </dd>
            </dl>
            <div class="m-t-30">
              <input type="submit" class="btn btn-primary btn-sm" value="SUBMIT">
              <button type="button" onclick="location.href='<?php echo site_url('ServiceController/logout'); ?>'" class="btn btn-danger btn-sm">LOGOUT</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<footer id="footer"> Copyright © 2019 Roady | Travel Companion</footer>

<!-- Javascript Libraries -->
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo.js"></script>
</body>

<!-- Mirrored from practoadmin.justthemevalley.com/practoadmin/profile-about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2019 05:28:39 GMT -->
</html>
