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
  <!-- Register -->
  <div class="lc-block toggled">
    <div class="lcb-float"><i class="jtv jtv-pin-account"></i></div>
    <form action="<?php echo site_url('MainController/form_signup_srvc') ?>" method="post" enctype="multipart/form-data">
      <?php echo $this->session->flashdata('warn'); ?>
      <div class="form-group">
        <input type="text" class="form-control name" placeholder="Company Name" name="name" onchange="Validatename();" id="name" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" placeholder="Official Email Address" name="email" onchange="Validateemail();" id="email" required>
      </div>
      <div class="form-group">
        <input type="tel" class="form-control" placeholder="Official Phone" name="phno" onchange="ValidatePhone();" id="mobile" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Location" name="loc" required>
      </div>
      <div class="form-group">
        <input type="file" class="form-control" placeholder="Upload Valid Documents" name="img" accept="image/jpeg" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="passwd" required>
      </div>
      <div class="clearfix"></div>
      <div class="checkbox cr-alt">
        <label>
          <input type="checkbox" name="agree">
          <i class="input-helper"></i> Accept the license agreement </label>
      </div>
      <button type="submit" class="btn btn-block btn-success m-t-25" class="btn btn-register float-button-light" onclick="if(!this.form.agree.checked){alert('You must agree to the terms first.');return false}">Register</button>
      <ul class="login-navigation">
        <li data-block="#l-login" onclick="location.href='<?php echo site_url('MainController/index') ?>'" class="bg-blue">Login</li>
        <li data-block="#l-register" onclick="location.href='<?php echo site_url('MainController/signup') ?>'" class="bg-red">Registration</li>
        <li data-block="#l-forget-password" onclick="location.href='<?php echo site_url('MainController/lostpasswd') ?>'" class="bg-orange">Forgot Password?</li>
      </ul>
    </form>
  </div>

  <!-- Javascript Libraries -->
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/functions.js"></script>

  <!-- Validation -->
  <script>
  function Validatename()
  {
    var val = document.getElementById('name').value;
    if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/))
    {
      alert("Only Alphabets & Minimum 3 Characters");
      $("#name").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
      document.getElementById('name').value = "";
      return false;
    }
    return true;
  }

  function Validateemail()
  {
       var email = document.getElementById('email');
         var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if (!filter.test(email.value)) {
          email.value="";
          alert("Provide a valid email address");
          $("#vemail").html('Please provide a valid email address').fadeIn().delay(4000).fadeOut();
          return false;
          }
      return false;
  }

  function ValidatePhone()
  {
    var val = document.getElementById('mobile').value;
    if (!val.match(/^[7-9][0-9]{9,9}$/))
    {
      alert("Only Digits & Minimum 10 digits");
      $("#mobile_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
      document.getElementById('mobile').value = "";
      return false;
    }
    return true;
  }
  </script>

  <!-- Capitalize -->
  <script>
  jQuery(document).ready(function() {
    jQuery('#name').keyup(function()
    {
      var str = jQuery('#name').val();
      var spart = str.split(" ");
      for ( var i = 0; i < spart.length; i++ )
      {
        var j = spart[i].charAt(0).toUpperCase();
        spart[i] = j + spart[i].substr(1);
      }
      jQuery('#name').val(spart.join(" "));
    });
  });
  </script>
</body>

</html>
