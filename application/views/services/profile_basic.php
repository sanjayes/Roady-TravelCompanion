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
        $img = $row->img;
      ?>

      <div class="tile" id="profile-main">
        <div class="pm-overview c-overflow-dark">
          <div class="pmo-pic">
            <div class="p-relative"> <a href="#"> <img class="img-responsive" src="<?php echo base_url('uploads/srvc_details/').$img ?>" alt=""> </a>
            </div>
          </div>
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
        </div>
        <div class="pm-body clearfix">
          <ul class="tab-nav tn-justified">
            <li><a href="<?php echo site_url('ServiceController/profile') ?>">Service Details</a></li>
            <li class="active"><a>Basic Information</a></li>
          </ul>
          <div class="pmb-block">
            <div class="pmbb-header">
              <ul class="actions">
                <li class="dropdown"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
                  <ul class="dropdown-menu pull-right">
                    <li> <a data-pmb-action="edit" href="#">Edit</a> </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="pmbb-body p-l-30">
              <div class="pmbb-view">
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
                  <dt>Documents</dt>
                  <dd></dd>
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
                  <dt class="p-t-10">Company Name</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" placeholder="eg. ARK Autos & Service">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Owner Name</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" placeholder="eg. Arun Thomas">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Registration no.</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type="text" class="form-control" placeholder="eg. 34567 456789">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">License no.</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" placeholder="eg. 3456 456 567 ">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Mobile Phone</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" placeholder="eg. +01 123 456 78">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Email Address</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="email" class="form-control" placeholder="eg. johndoe@gmail.com" disabled>
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
