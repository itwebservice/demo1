<?php 
include "../../../../model/model.php";

$exc_id = $_POST['exc_id'];
$sql_booking_date = mysqli_fetch_assoc(mysqlQuery("select * from excursion_master where exc_id = '$exc_id' and delete_status='0'")) ;
$booking_date = $sql_booking_date['created_at'];
$yr = explode("-", $booking_date);
$year =$yr[0];
?>
<div class="modal fade profile_box_modal" id="exc_display_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Booking Information(<?= get_exc_booking_id($exc_id,$year) ?>)</h4>
      </div>
      <div class="modal-body profile_box_padding">
	     <div class="row mg_bt_20">    
		  	<div class="col-xs-12">
		  		<div class="profile_box">
		           	<h3 class="editor_title">Activity Information</h3>
		            <div class="table-responsive">
                    <table class="table table-bordered no-marg">
	                    <thead>
                       <tr class="table-heading-row">
                       	<th>S_No.</th>
                       	<th>Date_time&nbsp;&nbsp;</th>
                       	<th>City_name</th>
                       	<th>Activity_name</th>
                       	<th>Transfer_Option</th>
                       	<th>Total_adult</th>
                       	<th>total_child</th>
                       	<th>total_infant</th>
                       	<th>adult_cost</th>
                       	<th>child_cost</th>
                       	<th>infant_cost</th>
                       	<th>total_vehicle</th>
                       	<th>transfer_cost</th>
                       	<th>Activity_Cost</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php 
                       $bg="";
                       $sq_entry_count = mysqli_num_rows(mysqlQuery("select * from excursion_master_entries where exc_id='$exc_id'"));
                       if($sq_entry_count==0){
                          include_once('exc_member_tbl.php'); 
                       }
                       else{
                          $count = 0;
                          $sq_entry = mysqlQuery("select * from excursion_master_entries where exc_id='$exc_id'"); 
                          while($row_entry = mysqli_fetch_assoc($sq_entry)){
                            if($row_entry['status']=="Cancel"){
                              $bg="danger";
                            }
                            else{
                              $bg="#fff";
                            }
                            $sq_city = mysqli_fetch_assoc(mysqlQuery("select * from city_master where city_id='$row_entry[city_id]'"));
                            $sq_exc = mysqli_fetch_assoc(mysqlQuery("select * from excursion_master_tariff where entry_id='$row_entry[exc_name]'"));
                            $count++;
                            ?>
                            <tr class="<?php echo $bg; ?>">
                              <td><?php echo $count; ?></td>
                              <td><?php echo get_datetime_user($row_entry['exc_date']); ?></td>
                              <td><?php echo $sq_city['city_name']; ?></td>
                              <td><?php echo $sq_exc['excursion_name']; ?></td>
                              <td><?php echo $row_entry['transfer_option']; ?></td>
                              <td><?php echo $row_entry['total_adult']; ?></td>
                              <td><?php echo $row_entry['total_child']; ?></td>
                              <td><?php echo $row_entry['total_infant']; ?></td>
                              <td><?php echo $row_entry['adult_cost']; ?> </td>
                              <td><?php echo $row_entry['child_cost']; ?> </td>
                              <td><?php echo $row_entry['infant_cost']; ?> </td>
                              <td><?php echo $row_entry['total_vehicles']; ?> </td>
                              <td><?php echo $row_entry['transfer_cost']; ?> </td>
                              <td><?php echo $row_entry['total_cost']; ?> </td>
                            </tr>
                            <?php
                          }
                       }
                       ?>
                     </tbody>
		                </table>
		            </div>
		            </div>
		        </div>  
		    </div>
		</div>	

</div>

</div>
</div>
</div>
  
</div>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>
<script>
$('#exc_display_modal').modal('show');
</script>