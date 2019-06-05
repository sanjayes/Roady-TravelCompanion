<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo base_url() ?>assets1/favicon.ico">
<title>Register</title>


<!-- START GLOBAL CSS -->
<link href="<?php echo base_url() ?>assets1/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url() ?>assets1/css/waves.min.css" type="text/css" rel="stylesheet"/>
<!-- END GLOBAL CSS -->

<!-- START PAGE PLUG-IN CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets1/fonts/font-awesome/css/font-awesome.min.css"/>
<!-- END PAGE PLUG-IN CSS -->

<!-- START TEMPLATE GLOBAL CSS -->
<link href="<?php echo base_url() ?>assets1/css/user_register_v2.css" type="text/css" rel="stylesheet"/>
<!-- END TEMPLATE GLOBAL CSS -->

</head>
<body>
<div class="register-background">
  <div class="register-left-section"> <img src="<?php echo base_url() ?>assets1/img/logo2.png" alt="logo-image">
    <h2>Welcome to Roady</h2>
  </div>
  <!--  START REGISTER -->
  <div class="register-page">
    <div class="main-register-contain">
      <div class="register-form">
        <form action="<?php echo site_url('MainController/form_signup'); ?>" method="post">
          <h4>Create a new account</h4>
          <?php echo $this->session->flashdata('warn'); ?>
          <div class="form-group">
            <input required type="text" id="cname" class="name" onchange="Validatename();" name="name">
            <label class="control-label">Enter Name</label>
            <i class="bar"></i> </div>
            <label style="display:none" id="name"></label>
          <div class="form-group">
            <input required type="email" id="email" onchange="Validateemail1();" name="email">
            <label class="control-label">Enter Email</label>
            <i class="bar"></i> </div>
            <label style="display:none; color:red" id="vemail"></label>
          <div class="form-group">
            <p id="vphone" style="color:red;"></p>
            <input required type="text" onchange="Validatep();" id="mobile" name="phno">
            <label class="control-label">Enter Phone</label>
            <i class="bar"></i> </div>
          <div class="form-group">
            <input required type="password" id="password" data-toggle="tooltip" name="passwd">
            <span class="input-group-btn">
			        <button id= "show_password" class="pull-right">
								<span class="glyphicon glyphicon-eye-open"></span>
              </button>
            </span>
            <label class="control-label">Enter Password</label>
            <i class="bar"></i> </div>
          <div class="goto-register">
            <button type="submit" name="register" class="btn btn-register float-button-light">Submit</button>
          </div>
          <div class="social-media-section">
            <div> <a class="social-hexagon"> <i class="fa fa-facebook"></i> </a> <a class="social-hexagon"> <i class="fa fa-twitter"></i> </a> <a class="social-hexagon"> <i class="fa fa-linkedin"></i> </a> </div>
            <div class="register-bottom-text">
              <p><a href="<?php echo site_url('MainController/signup_srvc') ?>">Register as a Service</a></p>
              <a href="<?php echo site_url('MainController/index') ?>">Sign In</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--  END REGISTER -->
</div>

<!-- START CORE JAVASCRIPT -->
<script src="<?php echo base_url() ?>assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets1/js/waves.min.js"></script>
<!-- END CORE JAVASCRIPT -->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

<!-- Show-Hide -->
<script>
$("#show_password").hover(
  function functionName() {
    //Change the attribute to text
    $("#password").attr("type", "text");
    $(".glyphicon")
      .removeClass("glyphicon-eye-open")
      .addClass("glyphicon-eye-close");
  },
  function() {
    //Change the attribute back to password
    $("#password").attr("type", "password");
    $(".glyphicon")
      .removeClass("glyphicon-eye-close")
      .addClass("glyphicon-eye-open");
  }
);
</script>

<!-- Validate -->
<script>
function Validatep()
{
  var val = document.getElementById('mobile').value;
  if (!val.match(/^[7-9][0-9]{9,9}$/))
  {
    alert("Must. 10 and Numbers Allowed..!");
    $("#mobile_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
    document.getElementById('mobile').value = "";
    return false;
  }
  return true;
}
</script>

<script>
function Validateemail1()
{
     var email = document.getElementById('email');
       var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       if (!filter.test(email.value)) {
        email.value="";
        alert("Please provide a valid email address");
        $("#vemail").html('Please provide a valid email address').fadeIn().delay(4000).fadeOut();
        return false;
        }
    return false;
}
</script>

<script>
function Validatename()
{
  var val = document.getElementById('cname').value;
  if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/))
  {
    alert("Min. 3 and Only Alphabets Allowed..!");
    $("#name_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
    document.getElementById('cname').value = "";
    return false;
  }
  return true;
}
</script>

<!-- Capitalize -->
<script>
jQuery(document).ready(function() {
  jQuery('#cname').keyup(function()
  {
    var str = jQuery('#cname').val();


    var spart = str.split(" ");
    for ( var i = 0; i < spart.length; i++ )
    {
      var j = spart[i].charAt(0).toUpperCase();
      spart[i] = j + spart[i].substr(1);
    }
    jQuery('#cname').val(spart.join(" "));

  });
});
</script>

</body>

</html>
