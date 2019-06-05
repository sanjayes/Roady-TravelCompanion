<?php
$CI = &get_instance();
$a = $CI->valid_session();
$profile['data'] = $CI->profile_check();
foreach ($profile['data'] as $row) {
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
  $status = $row->profile_status;

  if($status == 0){
    $CI->init_profile();
  }else
  {
    if ( $a == 1 )
    {
      include('header.php');
    ?>
      <section id="content">
        <div class="container c-boxed">
          <div id="calendar"></div>

          <!-- Add event -->
          <div class="modal fade" id="addNew-event" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Today's Booking</h4>
                </div>
                <div class="modal-body">
                  <div class="table-responsive m-t-20">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Vehicle Number</th>
                          <th>Name</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer id="footer"> Copyright © 2019 Roady</footer>

      <!-- Javascript Libraries -->
      <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.bootgrid-override.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.flot.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.flot.resize.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.flot.orderBars.js"></script>
      <script src="<?php echo base_url() ?>assets/js/curvedLines.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.flot.orderBars.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.easypiechart.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/sweet-alert.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap-growl.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/fullcalendar.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/flot-charts/curved-line-chart.js"></script>
      <script src="<?php echo base_url() ?>assets/js/flot-charts/bar-chart.js"></script>
      <script src="<?php echo base_url() ?>assets/js/charts.js"></script>
      <script src="<?php echo base_url() ?>assets/js/functions.js"></script>
      <script src="<?php echo base_url() ?>assets/js/demo.js"></script>
      <script>
      jQuery(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var cId = jQuery('#calendar'); //Change the name if you want. I'm also using thsi add button for more actions

        //Generate the Calendar
        cId.fullCalendar({
          header: {
            right: '',
            center: 'prev, title, next',
            left: ''
          },

          theme: true, //Do not remove this as it ruin the design
          selectable: true,
          selectHelper: true,
          editable: true,

          //Add Events
          events: [
            //   {
            //       title: 'Hangout with friends',
            //       start: new Date(y, m, 1),
            //       allDay: true,
            //       className: 'bg-cyan'
            //   },
          ],

          //On Day Select
          select: function(start, end, allDay) {
            jQuery('#addNew-event').modal('show');
            jQuery('#addNew-event input:text').val('');
            jQuery('#getStart').val(start);
            jQuery('#getEnd').val(end);
          }
        });

        //Calendar views
        jQuery('body').on('click', '#fc-actions [data-view]', function(e){
          e.preventDefault();
          var dataView = jQuery(this).attr('data-view');

          jQuery('#fc-actions li').removeClass('active');
          jQuery(this).parent().addClass('active');
          cId.fullCalendar('changeView', dataView);
        });
      });
      </script>
    </body>
    </html>
    <?php
}
else{
	$CI->signin();
}}}
?>
