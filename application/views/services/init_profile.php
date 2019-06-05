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
<link href="<?php echo base_url() ?>assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">

</head>

<body>
<div class="container">
  <!-- <div class="tile" id="profile-main"> -->
    <?php
    foreach ($data as $row) {
      $email = $row->u_email;
      $phno = $row->phno;
      $comp = $row->u_name;
      $owner = $row->owner_name;
      $reg = $row->reg_id;
      $lic = $row->lic_no;
      $street = $row->street;
      $city = $row->city;
      $dt = $row->district;
      $st = $row->state;
      $pin = $row->pin;
    ?>
    <form action="<?php echo site_url('ServiceController/insert_initp') ?>" method="post" enctype="multipart/form-data">
      <!-- <div class="pmb-block"> -->
        <div class="pmbb-body p-l-30">
          <div class="pmbb-view">
            <dl class="dl-horizontal col-xs-12">
              <dt class="p-t-10">Company Name</dt>
              <dd>
                <div class="fg-line">
                  <input type="text" class="form-control" value="<?php echo $comp ?>" disabled>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-12">
              <dt class="p-t-10">Company Owner</dt>
              <dd>
                <div class="fg-line">
                  <input type="text" name="owner" class="form-control" value="<?php echo $owner ?>" required>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">E-Mail</dt>
              <dd>
                <div class="fg-line">
                  <input type="text" class="form-control" value="<?php echo $email ?>" disabled>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Contact</dt>
              <dd>
                <div class="fg-line">
                  <input type="text" class="form-control" value="<?php echo $phno ?>" disabled>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Registration Number</dt>
              <dd>
                <div class="fg-line">
                  <input type="number" name="reg_no" value="<?php echo $reg ?>" class="form-control" required>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">License Number</dt>
              <dd>
                <div class="fg-line">
                  <input type="number" name="lic_no" value="<?php echo $lic ?>" class="form-control" required>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Address</dt>
              <dd>
                <div class="fg-line">
                  <input type="text" name="street" value="<?php echo $street ?>" class="form-control" required>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">City</dt>
              <dd>
                <div class="fg-line">
                  <input type="text" name="city" value="<?php echo $city ?>" class="form-control" required>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-4">
              <dt class="p-t-10">State</dt>
              <dd>
                <div class="fg-line">
                  <select name="state" id="state" onchange="return dist()" class="form-control" required>
                    <option value="0">--Select State--</option>
                    <?php
                    foreach($dis as $row)
                    {
                      $id = $row->st_id;
                      $name = $row->state;
                    ?>
                      <option value="<?php echo $id;?>"><?php echo $name ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-4">
              <dt class="p-t-10">District</dt>
              <dd>
                <div class="fg-line">
                  <select name="district" id="district" class="form-control" required>
                    <option value="0">--Select District--</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-4">
              <dt class="p-t-10">PIN CODE</dt>
              <dd>
                <div class="fg-line">
                  <input type="number" name="pin" value="<?php echo $pin ?>" class="form-control" required>
                </div>
              </dd>
            </dl>
            <dl class="dl-horizontal col-xs-6">
              <dt class="p-t-10">Company Infrastructure</dt>
              <dd>
                <div class="fg-line">
                  <select name="infra" class="form-control">
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                  </select>
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
      <!-- </div> -->
    </form>
  <?php
  }
  ?>
  <!-- </div> -->
</div>

<!-- State-District -->
<script>
function dist()
{
  var state=document.getElementById('state').value;
  var data=new FormData();
  data.append('sid',state);
  $.ajax({
    method:'post',
    url:"<?php echo site_url("ServiceController/districtselect"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
      var r=JSON.parse(result);
      $('#district').html("<option value=0>"+"Select District"+"</option>");
      for(i=0;i<r.length;i++){
        $('#district').append("<option value="+r[i].id+">"+r[i].value+"</option>");
      }
    }
  });
}
</script>

<footer id="footer"> Copyright © 2019 Roady | Travel Companion</footer>

<!-- Javascript Libraries -->
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
<script src="<?php echo base_url() ?>assets/js/fileinput.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo.js"></script>

</body>

<!-- Mirrored from practoadmin.justthemevalley.com/practoadmin/profile-about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2019 05:28:39 GMT -->
</html>
