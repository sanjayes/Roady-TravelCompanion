<?php
$CI = &get_instance();
$a = $CI->valid_session();
if ($a == 1) {
  include('header.php');
  ?>
  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>

  <section id="content">
    <div class="container">
      <header class="page-header">
        <h3>Manage Providers</h3>
      </header>
      <div class="tile">
        <div>
          <!-- Search -->
          <div class="top-search">
            <input class="ts-input" id="myInput" placeholder="Search..." type="text">
            <i class="ts-reset jtv jtv-close"></i>
          </div>
        </div>
        <table class="table table-bordered table-vmiddle sortable">
          <thead>
            <tr>
              <th>Service Centre</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Location</th>
              <th>Documents</th>
              <!-- <th>Details</th> -->
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
            foreach ($list as $row) {
              $name = $row->u_name;
              $email = $row->u_email;
              $phone = $row->phno;
              $status = $row->status;
              $loc = $row->loc;
              $doc = $row->file;
              $app_status = $row->approval_status;
              $pro_st = $row->profile_status;
              ?>
                <tr>
                  <input type="hidden" value="<?php echo $email ?>" name="email">
                  <input type="hidden" value="<?php echo $status ?>" name="status">
                  <td><?php echo $name ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $phone ?></td>
                  <td><?php echo $loc ?></td>
                  <td>
                    <div class="lightbox photos">
                      <a href="<?php echo base_url('uploads/srvc_data/').$doc ?>">View Document</a>
                    </div>
                  </td>
                  <!-- <td>
                    <a data-toggle="modal" data-id="<?php echo $email ?>" href="#modalProfile" class="profile">Details</a>
                  </td> -->
                  <td>
                    <?php if ($status == 1) { ?>
                        <a data-toggle="modal" data-id="<?php echo $email ?>" href="#modalDefault" class="btn btn-sm bg-red block">Unblock</a>
                    <?php } else { ?>
                      <a data-toggle="modal" data-id="<?php echo $email ?>" href="#modalDefault" class="btn btn-sm bg-blue block">Block</a>
                    <?php } ?>
                  </td>
                </tr>

              <!-- Modal Profile -->
              <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Profile</h4>
                    </div>
                    <div class="modal-body">
                      <div class="tile" id="profile-main">
                          <div class="pmb-block">
                            <div class="pmbb-header">
                              <h2><i class="jtv jtv-account m-r-5"></i> Basic Information</h2>
                            </div>
                            <div class="pmbb-body p-l-30">
                              <div class="pmbb-view">
                                <dl class="dl-horizontal">
                                  <dt>Company Name</dt>
                                  <dd></dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Owner</dt>
                                  <dd></dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Birthday</dt>
                                  <dd></dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Martial Status</dt>
                                  <dd></dd>
                                </dl>
                              </div>
                            </div>
                          </div>
                          <div class="pmb-block">
                            <div class="pmbb-header">
                              <h2><i class="jtv jtv-phone m-r-5"></i> Service Information</h2>
                            </div>
                            <div class="pmbb-body p-l-30">
                              <div class="pmbb-view">
                                <dl class="dl-horizontal">
                                  <dt>Mobile Phone</dt>
                                  <dd>+01 123 456 78</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Email Address</dt>
                                  <dd>johndoe@gmail.com</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Twitter</dt>
                                  <dd>@jdtwitter</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Skype</dt>
                                  <dd>johndoe@fb</dd>
                                </dl>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal Default -->
              <div class="modal fade" id="modalDefault" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                      <p>This user will not be able to Login</p>
                    </div>
                    <div class="modal-footer">
                      <form action="<?php echo site_url('AdminController/mngsrvc_action') ?>" method="post">
                        <input type="hidden" id="email" name="email" value="">
                        <?php if ($status == 1) { ?>
                          <input class="btn bg-blue" type="submit" name="app" value="Unblock">
                        <?php } else { ?>
                          <input class="btn bg-red" type="submit" value="Block">
                        <?php } ?>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              </form>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Approve -->
  <script>
    $(document).on("click", ".btn.block",function(){
      var approve = $(this).data("id");
      $(".modal-footer #email").val(approve);
    });
  </script>

  <?php
  include('footer.php');
} else {
  $CI->signin();
}
?>
