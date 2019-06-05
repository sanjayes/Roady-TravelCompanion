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
      <h3>Service Booking</h3>
    </header>
    <div class="tile">
      <div class="table-responsive m-t-20">
        <div>
          <!-- Search -->
          <div class="top-search">
            <input class="ts-input" id="myInput" placeholder="Search..." type="text">
            <i class="ts-reset jtv jtv-close"></i>
          </div>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Vehicle no.</th>
              <th>Vehicle</th>
              <th>Date</th>
              <th>Time</th>
              <th>Wash</th>
              <th>Mechanical</th>
              <th>Electrical</th>
              <th>Tyre</th>
              <th>Accessories</th>
              <th>Other</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
              foreach( $list as $row )
              {
                    $name = $row->u_name;
                    $phone = $row->phno;
                    $vno = $row->v_no;
                    $date = $row->date;
                    $time = $row->time;
                    $veh = $row->veh_type;
                    $w = $row->wash;
                    $m = $row->mechanical;
                    $e = $row->electrical;
                    $t = $row->tyre;
                    $a = $row->accessories;
                    $o = $row->others;
               ?>
               <form action="<?php echo site_url('ServiceController/booking') ?>" method="post">
                 <tr>
                   <td><?php echo $name ?></td>
                   <td><?php echo $phone ?></td>
                   <td><?php echo $vno ?></td>
                   <td><?php echo $veh ?></td>
                   <td><?php echo $date ?></td>
                   <td><?php echo $time ?></td>
                   <td>
                    <?php if ( $w == 1 ){ ?>
                       <button class="btn btn-danger btn-icon"><i class="jtv jtv-check"></i></button>
                     <?php } else { ?>
                       <button class="btn btn-icon" disabled><i class="jtv jtv-close"></i></button>
                     <?php } ?>
                   </td>
                   <td>
                     <?php if ( $m == 1 ){ ?>
                        <button class="btn btn-danger btn-icon"><i class="jtv jtv-check"></i></button>
                      <?php } else { ?>
                        <button class="btn btn-icon" disabled><i class="jtv jtv-close"></i></button>
                      <?php } ?>
                   </td>
                   <td>
                     <?php if ( $e== 1 ){ ?>
                        <button class="btn btn-danger btn-icon"><i class="jtv jtv-check"></i></button>
                      <?php } else { ?>
                        <button class="btn btn-icon" disabled><i class="jtv jtv-close"></i></button>
                      <?php } ?>
                   </td>
                   <td>
                     <?php if ( $t == 1 ){ ?>
                        <button class="btn btn-danger btn-icon"><i class="jtv jtv-check"></i></button>
                      <?php } else { ?>
                        <button class="btn btn-icon" disabled><i class="jtv jtv-close"></i></button>
                      <?php } ?>
                   </td>
                   <td>
                     <?php if ( $a == 1 ){ ?>
                        <button class="btn btn-danger btn-icon"><i class="jtv jtv-check"></i></button>
                      <?php } else { ?>
                        <button class="btn btn-icon" disabled><i class="jtv jtv-close"></i></button>
                      <?php } ?>
                   </td>
                   <td>
                     <?php if ( $o == 1 ){ ?>
                        <button class="btn btn-danger btn-icon"><i class="jtv jtv-check"></i></button>
                      <?php } else { ?>
                        <button class="btn btn-icon" disabled><i class="jtv jtv-close"></i></button>
                      <?php } ?>
                   </td>
                 </tr>
               </form>
              <?php
              }
              ?>
          </tbody>
        </table>
      </div>
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
