<?php
$CI = &get_instance();
$a = $CI->valid_session();
if ( $a == 1 )
{
  include('header.php');
?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

  <section id="content">
    <div class="container">
      <div class="tile">
        <table id="data-table" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th data-column-id="name">Name</th>
              <th data-column-id="mail">E-Mail</th>
              <th data-column-id="phone">Phone</th>
              <th data-column-id="type">Account Type</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach( $list as $row )
              {
                $name=$row->u_name;
                $email=$row->u_email;
                $phone=$row->phno;
                $u_type=$row->u_type;
            ?>
            <tr>
              <td><?php echo "$name"; ?></td>
              <td><?php echo "$email"; ?></td>
              <td><?php echo "$phone"; ?></td>
              <td><?php echo "$u_type"; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Data Table -->
  <script>
      jQuery(document).ready(function(){
          //Basic Example
          jQuery("#data-table").bootgrid({
              css: {
                  icon: 'jtv icon',
                  iconColumns: 'jtv-view-module',
                  iconDown: 'jtv-expand-more',
                  iconRefresh: 'jtv-refresh',
                  iconUp: 'jtv-expand-less',
                  iconSearch: 'jtv-search'
              },
          });
      });
  </script>

<?php
include('footer.php');
}
else{
	$CI->signin();
}
?>
