<?php
include "../../../../model/model.php";
?>
<div class="app_panel_content Filter-panel">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
			<select name="booking_id" id="booking_id" title="Booking ID" style="width:100%" onchange="refund_reflect()">
				<option value="">Select Booking</option>
				<?php 
				$sq_booking = mysqlQuery("select * from bus_booking_master where booking_id in ( select booking_id from bus_booking_entries where status='Cancel' ) and delete_status='0' order by booking_id desc");
				while($row_booking = mysqli_fetch_assoc($sq_booking)){

					$date = $row_booking['created_at'];
					$yr = explode("-", $date);
					$year =$yr[0];
					$sq_customer = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$row_booking[customer_id]'"));
					if($sq_customer['type'] == 'Corporate'||$sq_customer['type'] == 'B2B'){
						$customer_name = $sq_customer['company_name'];
					}else{
						$customer_name = $sq_customer['first_name'].' '.$sq_customer['last_name'];
					}
					?>
					<option value="<?= $row_booking['booking_id'] ?>"><?= get_bus_booking_id($row_booking['booking_id'],$year).' : '.$customer_name ?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
</div>

<div id="div_refund_content" class="main_block"></div>

<script>
$('#booking_id').select2();

function refund_reflect()
{
	var booking_id = $('#booking_id').val();

	$.post('refund/refund_reflect.php', { booking_id : booking_id }, function(data){
		$('#div_refund_content').html(data);
	});
}
</script>
<script src="<?= BASE_URL ?>js/app/footer_scripts.js"></script>