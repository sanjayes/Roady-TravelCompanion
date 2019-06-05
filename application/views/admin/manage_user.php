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
        <h3>Users</h3>
      </header>
      <div class="tile">
        <div>
          <!-- Search -->
          <div class="top-search">
            <input class="ts-input" id="myInput" placeholder="Search..." type="text">
            <i class="ts-reset jtv jtv-close"></i>
          </div>
        </div>
        <table id="data-table" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>User Status</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
              foreach( $list as $row )
              {
                    $name=$row->u_name;
                    $email=$row->u_email;
                    $phone=$row->phno;
                    $status=$row->status;
               ?>
               <form action="<?php echo site_url('AdminController/mngusr_action') ?>" method="post">
                 <tr>
                   <input type="hidden" value="<?php echo $email ?>" name="email">
		               <input type="hidden" value="<?php echo $status ?>" name="status">
                   <td><?php echo $name; ?></td>
                   <td><?php echo $email; ?></td>
                   <td><?php echo $phone; ?></td>
                   <td>
                     <?php if( $status == 1 ) { ?>
                        <input class="btn bg-red" type="submit" value="Unblock">
                      <?php } else {?>
                        <input class="btn bg-blue" type="submit" value="Block">
                      <?php } ?>
                   </td>
                 </tr>

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
                         <?php
                           if ($status == 1) {
                             echo '<input class="btn bg-blue" type="submit" value="Unblock">';
                           } else {
                             echo '<input class="btn bg-red" type="submit" value="Block">';
                           }
                         ?>
                         <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
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

<?php
  include('footer.php');
}
else{
	$CI->signin();
}
  ?>
