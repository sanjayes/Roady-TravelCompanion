<?php
$CI = &get_instance();
$a = $CI->valid_session();
if ( $a == 1 )
{
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
        <h3>Approval Request</h3>
      </header>
      <p><?php echo $this->session->flashdata('msg'); ?></p>
      <div class="tile">
        <div>
          <!-- Search -->
          <div class="top-search">
            <input class="ts-input" id="myInput" placeholder="Search..." type="text">
            <i class="ts-reset jtv jtv-close"></i>
          </div>
        </div>
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Service Centre</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Location</th>
              <th>Documents</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
            foreach( $list as $row )
            {
              $name = $row->u_name;
              $email = $row->u_email;
              $phone = $row->phno;
              $loc = $row->loc;
              $doc = $row->file;
              $status = $row->approval_status;
              ?>
                <tr>
                  <td><?php echo $name ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $phone ?></td>
                  <td><?php echo $loc ?></td>
                  <td>
                    <div class="lightbox photos">
                      <a href="<?php echo base_url('uploads/srvc_data/').$doc ?>">View Document</a>
                    </div>
                  </td>
                  <td>
                    <a data-toggle="modal" data-id="<?php echo $email ?>" href="#modalApprove" class="approve btn btn-sm bg-blue">Approve</a>
                    <a data-toggle="modal" data-id="<?php echo $email ?>" href="#modalReject" class="reject btn btn-sm bg-red">Reject</a>
                  </td>
                </tr>

                <!-- Modal Approve -->
                <div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                      </div>
                      <div class="modal-body">
                        <p>Approve this user</p>
                      </div>
                      <div class="modal-footer">
                        <form action="<?php echo site_url('AdminController/appsrvc_action') ?>" method="post">
                          <input type="hidden" id="email" name="email" value="">
                          <input class="btn bg-blue" type="submit" name="app" value="Approve">
                        </form>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Reject -->
                <div class="modal fade" id="modalReject" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Mail Body to be sent to the Provider</h4>
                      </div>
                      <form action="<?php echo site_url('AdminController/appsrvc_action') ?>" method="post">
                        <div class="modal-body">
                          <textarea rows="4" cols="77" name="message">We are sorry to inform that your request was rejected due to invalid document. We request you to resubmit your request with valid document.</textarea>
                        </div>
                        <div class="modal-footer">
                          <form action="<?php echo site_url('AdminController/appsrvc_action') ?>" method="post">
                            <input type="hidden" id="email1" name="email" value="">
                            <input class="btn bg-red" type="submit" name="app" value="Reject">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                          </form>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="table-responsive m-t-20">
      <header class="page-header">
        <h3>Approved</h3>
      </header>
      <p><?php echo $this->session->flashdata('mail'); ?></p>
        <table class="table">
          <thead>
            <tr>
              <th>Service Centre</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Location</th>
              <th>Documents</th>
              <th>Remainder</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach( $approved as $row )
            {
              $name = $row->u_name;
              $email = $row->u_email;
              $phone = $row->phno;
              $loc = $row->loc;
              $doc = $row->file;
              $status = $row->approval_status;
              ?>
            <tr>
              <td><?php echo $name ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $phone ?></td>
              <td><?php echo $loc ?></td>
              <td>
                <div class="lightbox photos">
                  <a href="<?php echo base_url('uploads/srvc_data/').$doc ?>">View Document</a>
                </div>
              </td>
              <td>
                <a data-toggle="modal" data-id="<?php echo $email ?>" href="#modalMail" class="mail btn btn-sm bg-red">Remainder</a>
              </td>
            </tr>

            <!-- Modal Mail -->
            <div class="modal fade" id="modalMail" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Mail Body to be sent to the Provider</h4>
                  </div>
                  <form action="<?php echo site_url('AdminController/remainder') ?>" method="post">
                    <div class="modal-body">
                      <p>A Mail with a Remainder will be sent to the Provider</p>
                    </div>
                    <div class="modal-footer">
                      <form action="<?php echo site_url('AdminController/appsrvc_action') ?>" method="post">
                        <input type="hidden" id="mail" name="email" value="">
                        <input class="btn bg-red" type="submit" name="app" value="Reject">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </form>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
  </section>

  <!-- Approve -->
  <script>
    $(document).on("click", ".btn.approve",function(){
      var approve = $(this).data("id");
      $(".modal-footer #email").val(approve);
    });
  </script>

  <!-- Reject -->
  <script>
    $(document).on("click", ".btn.reject",function(){
      var approve = $(this).data("id");
      $(".modal-footer #email1").val(approve);
    });
  </script>

  <!-- Mail -->
  <script>
    $(document).on("click", ".btn.mail",function(){
      var approve = $(this).data("id");
      $(".modal-footer #mail").val(approve);
    });
  </script>


<?php
include('footer.php');
}
else{
  $CI->signin();
}
?>
