<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap" style="margin-top:10%"></div>
 <body style="overflow: hidden">

 <?php
 if($email)
 {
?>
   <div class="container" scroll="false">
   	<div class="row">
   		<div class="col-md-4 col-md-offset-4">
               <div class="panel panel-default">
                 <div class="panel-body">
                   <div class="text-center">
                     <h3><i class="fa fa-lock fa-4x"></i></h3>
                     <h2 class="text-center">Enter One Time Password!</h2>
                     <p>Chech your email and enter OTP</p>
                     <div class="panel-body">
                       <?php
             					$s=$this->session->userdata('msg');
             					if($s!="")
             					{
                         echo "<font color='#FF0000'>".$s."</font>";
             					}
             					?>
                       <form id="register-form" role="form" class="form" method="post" action="<?php echo site_url('MainController/otpcheck')?>">

                         <div class="form-group">
                           <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-key color-blue"></i></span>
                             <input id="otp" name="otp" placeholder="One Time Password" class="form-control"  type="password" required>
                           </div>
                         </div>
                         <div class="form-group">
                           <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                         </div>

                       </form>

                     </div>
                   </div>
                 </div>
               </div>
             </div>
   	</div>
   </div>
<?php
 }
 else {
   ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
                    <?php
          					$s=$this->session->userdata('msg');
          					if($s!="")
          					{ echo "<font color='#FF0000'>".$s."</font>";
          					}
          					?>
                    <form id="register-form" role="form" class="form" method="post" action="<?php echo site_url('MainController/forgotpasswordemailcheck')?>">

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>

                      <input type="hidden" class="hide" name="token" id="token" value="">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php } ?>
</body>
