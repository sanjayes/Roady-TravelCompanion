<?php
$CI = &get_instance();
$a = $CI->valid_session();
if ( $a == 1 )
{
  include('header.php');
?>
  <section id="content">
    <div class="container">
      <header class="page-header">
        <h3><?php echo $this->session->userdata('name') ?><small><?php echo $this->session->userdata('email') ?></small></h3>
      </header>

      <?php
      foreach ( $data as $row ) {
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
        $infra = $row->infrastructure;
        $sc = $row->s_count;
        $h_svc = $row->h_svc;
        $van = $row->van;
      ?>

      <div class="tile" id="profile-main">
        <!-- <div class="pm-overview c-overflow-dark">
          <div class="pmo-block pmo-contact hidden-xs">
            <ul>
              <li><i class="jtv jtv-phone"></i><?php echo $phno ?></li>
              <li><i class="jtv jtv-email"></i><?php echo $email ?></li>
              <li> <i class="jtv jtv-pin"></i>
                <address class="m-b-0">
                <?php echo $street ?><br/>
                <?php echo $dt ?><br>
                <?php echo $st ?>
                </address>
              </li>
            </ul>
          </div>
        </div> -->
        <!-- <div class="pm-body clearfix"> -->
          <ul class="tab-nav tn-justified">
            <!-- <li class="active"><a>Service Details</a></li>
            <li><a href="<?php echo site_url('ServiceController/profile_basic') ?>">Basic Information</a></li> -->
          </ul>
          <div class="pmb-block">
            <!-- <div class="pmbb-header">
              <ul class="actions">
                <li class="dropdown"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
                  <ul class="dropdown-menu pull-right">
                    <li> <a data-pmb-action="edit" href="#">Edit</a> </li>
                  </ul>
                </li>
              </ul>
            </div> -->
            <div class="pmbb-body p-l-30">
              <div class="pmbb-view">
                <dl class="dl-horizontal">
                  <dt>Infrastructure</dt>
                  <dd><?php echo $infra ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Services per day</dt>
                  <dd><?php echo  $sc ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Home Services</dt>
                  <dd>
                    <?php if ($h_svc == 1) { ?>
                      <button disabled><i class="jtv jtv-check"></i></button>
                    <?php } else { ?>
                      <button disabled><i class="jtv jtv-close"></i></button>
                    <?php } ?>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Recovery Van</dt>
                  <dd>
                    <?php if ($van == 1) { ?>
                      <button disabled><i class="jtv jtv-check"></i></button>
                    <?php } else { ?>
                      <button disabled><i class="jtv jtv-close"></i></button>
                    <?php } ?>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Company Name</dt>
                  <dd><?php echo $comp ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Owner Name</dt>
                  <dd><?php echo $owner ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Registration no.</dt>
                  <dd><?php echo  $reg ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>License no.</dt>
                  <dd><?php echo $lic ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Mobile Phone</dt>
                  <dd><?php echo $phno ?></dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Email Address</dt>
                  <dd><?php echo $email ?></dd>
                </dl>
              </div>
            </div>
            <div class="pmbb-body p-l-30">
              <div class="pmbb-edit">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Infrastructure</dt>
                  <dd>
                    <div class="fg-line col-xs-10">
                      <select name="infra" class="form-control">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                      </select>
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Services per day</dt>
                  <dd>
                    <div class="fg-line col-xs-10">
                      <input type='number' name="s_count" class="form-control" value="<?php echo $sc ?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Home Services</dt>
                  <dd>
                    <div class="fg-line col-xs-10">
                      <label class="radio-inline cr-alt">
                        <input type="radio" name="home_service" value="1">
                        <i class="input-helper"></i> Available </label>
                      <label class="radio-inline cr-alt">
                        <input type="radio" name="home_service" value="0">
                        <i class="input-helper"></i> Not Available </label>
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Recovery Van</dt>
                  <dd>
                    <div class="fg-line col-xs-10">
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
                  <button class="btn btn-primary btn-sm">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
        }
      ?>

    </div>
  </section>
<?php
  include('footer.php');
}
else{
	$CI->signin();
}
?>
