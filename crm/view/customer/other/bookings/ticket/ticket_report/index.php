<?php
include "../../../../../../model/model.php";

$customer_id = $_SESSION['customer_id'];
?>
    <!-- Filter-panel -->

    <div class="app_panel_content Filter-panel">
		<div class="row">		
			<div class="col-md-3">
				<select name="ticket_id_filtert" id="ticket_id_filtert" style="width:100%" onchange="ticket_report_list_reflect()">
			        <option value="">Select Booking</option>
			        <?php 
			        $sq_ticket = mysqlQuery("select * from ticket_master where customer_id='$customer_id' and delete_status='0' order by ticket_id desc");
			        while($row_ticket = mysqli_fetch_assoc($sq_ticket)){

						$date = $row_ticket['created_at'];
						$yr = explode("-", $date);
						$year =$yr[0];
			          $sq_customer = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$row_ticket[customer_id]'"));
			          ?>
			          <option value="<?= $row_ticket['ticket_id'] ?>"><?= get_ticket_booking_id($row_ticket['ticket_id'],$year).' : '.$sq_customer['first_name'].' '.$sq_customer['last_name'] ?></option>
			          <?php
			        }
			        ?>
			    </select>
			</div>
		</div>
	</div>

<div id="div_ticket_report_list" class="main_block"></div>

<script>
$('#ticket_id_filtert').select2();
	function ticket_report_list_reflect()
	{
		var ticket_id = $('#ticket_id_filtert').val();

		$.post('bookings/ticket/ticket_report/ticket_report_list_reflect.php', { ticket_id : ticket_id }, function(data){
			$('#div_ticket_report_list').html(data);
		});
	}
	ticket_report_list_reflect();
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>
