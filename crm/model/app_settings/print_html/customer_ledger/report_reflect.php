<?php
include "../../../../model/model.php";
include "../print_functions.php";
$role = $_SESSION['role'];
$branch_admin_id = $_SESSION['branch_admin_id'];
$branch_status = $_POST['branch_status'];
$branch_id = $_POST['branch_id_filter']; 
$customer_id = $_GET['customer_id'];
$from_date1 = $_GET['from_date'];
$to_date1 = $_GET['to_date'];

$from_date = get_date_db($from_date1);
$to_date = get_date_db($to_date1);
$count = 0;

if ($branch_admin_id != 0) {
  $branch_details = mysqli_fetch_assoc(mysqlQuery("select * from branches where branch_id='$branch_admin_id'"));
} else {
  $branch_details = mysqli_fetch_assoc(mysqlQuery("select * from branches where branch_id='1'"));
}
?>

<!-- header -->
<section class="print_header main_block">
	<div class="col-md-8 no-pad">
	<span class="title"><i class="fa fa-file-text"></i> Outstanding Payment Summary Report</span>
		<div class="print_header_logo">
		<img src="<?php echo $admin_logo_url; ?>" class="img-responsive mg_tp_10">
		</div>
	</div>
	<div class="col-md-4 no-pad">
		<div class="print_header_contact text-right">
		<span class="title"><?php echo $app_name; ?></span><br>
		<p><?php echo ($branch_status=='yes' && $role!='Admin') ? $branch_details['address1'].','.$branch_details['address2'].','.$branch_details['city'] : $app_address ?></p>
		<p class="no-marg"><i class="fa fa-phone" style="margin-right: 5px;"></i> <?php echo ($branch_status=='yes' && $role!='Admin') ? 
		$branch_details['contact_no'] : $app_contact_no ?></p>
		<p><i class="fa fa-envelope" style="margin-right: 5px;"></i> <?php echo $app_email_id; ?></p>

		</div>
	</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="print_info_block">
					<ul class="main_block noType">
						<?php $cust_name=mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$customer_id'")); ?>
					<li class="col-md-12"><span>CUSTOMER NAME : </span><?= ($cust_name['type'] == 'Corporate'||$cust_name['type'] == 'B2B') ? $cust_name['company_name'] : $cust_name['first_name'].' '.$cust_name['last_name']  ?></li>
					<li class="col-md-6"><span>FROM DATE : </span> <?= $from_date1 ?></li>
					<li class="col-md-6"><span>TO DATE : </span> <?= $to_date1 ?></li>
					</ul>
				</div>
			</div>
		</div>

    <!-- print-detail -->
		<div class="row"> <div class="col-md-12"> <div class="table-responsive">

		<table class="table table-bordered" id="tbl_list" style="width:1500px !important;padding: 0 !important; background: #fff;">
			<thead>
				<tr class="table-heading-row">
					<th>S_No.</th>
					<th>Service(booking_date)</th>
					<th>booking_ID</th>
					<th class="text-right info">Sale</th>
					<th class="text-right success">Paid</th>
					<th class="text-right danger">Cancel</th>
					<th class="text-right warning">Balance</th>
				</tr>
			</thead>
			<tbody>
			<?php
			//B2C
			if($customer_id!="" || $from_date!='' && $to_date!=''){
				$query = "select * from b2c_sale where 1 ";

				if($customer_id!=""){
					$query .=" and customer_id='$customer_id'";
				}
				if($from_date!='' || $to_date!=''){
					$query .=" and DATE(created_at) between '$from_date' and '$to_date'";
				}
				$sq_booking = mysqlQuery($query);
				while($row_sale = mysqli_fetch_assoc($sq_booking)){
					
					$date = $row_sale['created_at'];
					$yr = explode("-", $date);
					$year =$yr[0];
					$sq_payment_info = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum,sum(`credit_charges`) as sumc from b2c_payment_master where booking_id='$row_sale[booking_id]' and clearance_status!='Pending' and clearance_status!='Cancelled'"));
					$credit_card_charges = $sq_payment_info['sumc'];
					$paid_amount = $sq_payment_info['sum'];
					
					$costing_data = json_decode($row_sale['costing_data']);
					$enq_data = json_decode($row_sale['enq_data']);
					$net_total = $costing_data[0]->net_total;
				
					$cancel_amount = $row_sale['cancel_amount'];
					$total_cost1 = $net_total - $cancel_amount;
					
					if ($row_sale['status'] == 'Cancel') {
						if ($cancel_amount <= $paid_amount) {
							$balance_amount = 0;
						} else {
							$balance_amount =  $cancel_amount - $paid_amount;
						}
					} else {
						$cancel_amount = ($cancel_amount == '') ? '0' : $cancel_amount;
						$balance_amount = $net_total - $paid_amount;
					}
					if(floatval($balance_amount) > 0){
					?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= "B2C Booking".'('.$row_sale['service'].')'. get_date_user($row_sale['created_at']) ?></td>
						<td><?= get_b2c_booking_id($row_sale['booking_id'],$year) ?></td>
						<td class="info text-right"><?= number_format($net_total,2)?></td>
						<td class="text-right success"><?= number_format($paid_amount,2) ?></td>
						<td class="danger text-right"><?= number_format($cancel_amount,2)?></td>
						<td class="warning text-right"><?= number_format($balance_amount,2)?></td>
					</tr>
					<?php
					}
					$total_amount +=$net_total;
					$total_paid   +=$paid_amount;
					$total_balance+=$balance_amount;
					$total_cancel +=$cancel_amount;
				}
			}
			//FIT
			$query = "select * from package_tour_booking_master where 1 and delete_status='0' ";
			if($customer_id!=""){
				$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
				$query .=" and booking_date between '$from_date' and '$to_date'";
			}
			$sq_booking = mysqlQuery($query);
			while($row_booking = mysqli_fetch_assoc($sq_booking)){
				
				$date = $row_booking['booking_date'];
				$yr = explode("-", $date);
				$year =$yr[0];
				$sale_total_amount=$row_booking['net_total'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(amount) as sum from package_payment_master where booking_id='$row_booking[booking_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				$cancel_est = mysqli_fetch_assoc(mysqlQuery("select * from package_refund_traveler_estimate where booking_id='$row_booking[booking_id]'"));
				$cancel_amount = $cancel_est['cancel_amount'];
				if ($cancel_amount != '') {
					if ($cancel_amount <= $paid_amount) {
						$balance_amount = 0;
					} else {
						$balance_amount =  $cancel_amount - $paid_amount;
					}
				} else {
					$cancel_amount = ($cancel_amount == '') ? '0' : $cancel_amount;
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
					$sq_entry = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from package_travelers_details where booking_id='$row_booking[booking_id]'"));
					$pass_name = ($sq_entry['first_name'] != '' ) ? ' ('.$sq_entry['first_name']." ".$sq_entry['last_name'].')' : '';
					?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= "Package Booking ".' ('.get_date_user($row_booking['booking_date']).')' ?></td>
						<td><?= get_package_booking_id($row_booking['booking_id'],$year).$pass_name ?></td>
						<td class="info text-right"><?= number_format($sale_total_amount,2)?></td>
						<td class="text-right success"><?= number_format($paid_amount,2) ?></td>
						<td class="danger text-right"><?= number_format($cancel_amount,2)?></td>
						<td class="warning text-right"><?= number_format($balance_amount,2)?></td>
					</tr>
					<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
			}
			//visa
			$query = "select * from visa_master where 1 and delete_status='0'";
			if($customer_id!=""){
				$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
				$query .=" and created_at between '$from_date' and '$to_date'";
			}
			$sq_visa = mysqlQuery($query);
			while($row_visa = mysqli_fetch_assoc($sq_visa)){
			
				$date = $row_visa['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];

				//Sale
				$sale_total_amount=$row_visa['visa_total_cost'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//Cancel
				$cancel_amount=$row_visa['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from visa_master_entries where visa_id='$row_visa[visa_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from visa_master_entries where visa_id='$row_visa[visa_id]' and status='Cancel'"));

				//Paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from visa_payment_master where visa_id='$row_visa[visa_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];

				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				if($pass_count == $cancel_count){
						if($paid_amount > 0){
							if($cancel_amount >0){
								if($paid_amount > $cancel_amount){
									$balance_amount = 0;
								}else{
									$balance_amount = $cancel_amount - $paid_amount;
								}
							}else{
								$balance_amount = 0;
							}
						}
						else{
							$balance_amount = $cancel_amount;
						}
					}
					else{
						$balance_amount = $sale_total_amount - $paid_amount;
					}
					if(floatval($balance_amount) > 0){
						$sq_entry = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from visa_master_entries where visa_id='$row_visa[visa_id]'"));
						$pass_name = ($sq_entry['first_name'] != '' ) ? ' ('.$sq_entry['first_name']." ".$sq_entry['last_name'].')' : '';
						?>	
						<tr>
							<td><?= ++$count ?></td>
							<td><?= "Visa Booking".' ('.get_date_user($row_visa['created_at']).')'?></td>
							<td><?= get_visa_booking_id($row_visa['visa_id'],$year).$pass_name ?></td>
							<td class="info text-right"><?= number_format($sale_total_amount,2) ?></td>
							<td class="success text-right"><?= number_format($paid_amount,2) ?></td>
							<td class="danger text-right"><?= number_format($cancel_amount,2) ?></td>
							<td class="warning text-right"><?= number_format($balance_amount,2) ?></td>
						</tr>
					<?php
					}
					$total_amount +=$sale_total_amount;
					$total_paid   +=$paid_amount;
					$total_balance+=$balance_amount;
					$total_cancel +=$cancel_amount;
			}
			//Air Ticket
			$query = "select * from ticket_master where 1 and delete_status='0' ";
			if($customer_id!=""){
				$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
				$query .=" and created_at between '$from_date' and '$to_date'";
			}
			$sq_ticket = mysqlQuery($query);
			while($row_ticket = mysqli_fetch_assoc($sq_ticket)){

				$date = $row_ticket['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
				//Sale
				$sale_total_amount=$row_ticket['ticket_total_cost'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//Cancel
				$cancel_amount=$row_ticket['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from ticket_master_entries where ticket_id='$row_ticket[ticket_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from ticket_master_entries where ticket_id='$row_ticket[ticket_id]' and status='Cancel'"));

				//Paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from ticket_payment_master where ticket_id='$row_ticket[ticket_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				if($row_ticket['cancel_type'] == '1'){
					if($paid_amount > 0){
						if($cancel_amount >0){
							if($paid_amount > $cancel_amount){
								$balance_amount = 0;
							}else{
								$balance_amount = $cancel_amount - $paid_amount;
							}
						}else{
							$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $cancel_amount;
					}
				}else if($row_ticket['cancel_type'] == '2'||$row_ticket['cancel_type'] == '3'){
					$cancel_estimate = json_decode($row_ticket['cancel_estimate']);
					$balance_amount = (($sale_total_amount - floatval($cancel_estimate[0]->ticket_total_cost)) + $cancel_amount) - $paid_amount;
				}
				else{
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
					$sq_entry = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from ticket_master_entries where ticket_id='$row_ticket[ticket_id]'"));
					$pass_name = ($sq_entry['first_name'] != '' ) ? ' ('.$sq_entry['first_name']." ".$sq_entry['last_name'].')' : '';
				?>	
					<tr>
						<td><?= ++$count ?></td>
						<td><?= "Flight Ticket".' ('.get_date_user($row_ticket['created_at']).')' ?></td>
						<td><?= get_ticket_booking_id($row_ticket['ticket_id'],$year).$pass_name ?></td>
						<td class="info text-right"><?= number_format($sale_total_amount,2) ?></td>
						<td class="text-right success"><?= ($paid_amount=="") ? number_format(0,2) : number_format($paid_amount,2) ?></td>
						<td class="danger text-right"><?= number_format($cancel_amount,2) ?></td>
						<td class="warning text-right"><?= number_format($balance_amount,2) ?></td>
					</tr>
				<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
			}
			//Train ticket
			$query = "select * from train_ticket_master where 1 and delete_status='0'";
			if($customer_id!=""){
			$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
			$query .=" and created_at between '$from_date' and '$to_date'";
			}
			$sq_ticket = mysqlQuery($query);
			while($row_ticket = mysqli_fetch_assoc($sq_ticket)){

				$date = $row_ticket['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
				//sale
				$sale_total_amount=$row_ticket['net_total'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }
				//Cancel
				$cancel_amount=$row_ticket['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from  train_ticket_master_entries where train_ticket_id='$row_ticket[train_ticket_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from  train_ticket_master_entries where train_ticket_id='$row_ticket[train_ticket_id]' and status='Cancel'"));


				//Paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from train_ticket_payment_master where train_ticket_id='$row_ticket[train_ticket_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				if($pass_count == $cancel_count){
					if($paid_amount > 0){
						if($cancel_amount >0){
							if($paid_amount > $cancel_amount){
								$balance_amount = 0;
							}else{
								$balance_amount = $cancel_amount - $paid_amount;
							}
						}else{
						$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $cancel_amount;
					}
				}
				else{
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
					$sq_entry = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from train_ticket_master_entries where train_ticket_id='$row_ticket[train_ticket_id]'"));
					$pass_name = ($sq_entry['first_name'] != '' ) ? ' ('.$sq_entry['first_name']." ".$sq_entry['last_name'].')' : '';
					?>
					<tr>
						<td><?= ++$count ?></td>
							<td><?= "Train Ticket Booking".' ('.get_date_user($row_ticket['created_at']).')' ?></td>
						<td><?= get_train_ticket_booking_id($row_ticket['train_ticket_id'],$year).$pass_name ?></td>
						<td class="text-right info"><?= number_format($sale_total_amount,2) ?></td>
						<td  class="text-right success"><?= ($paid_amount=="") ? number_format(0,2) : number_format($paid_amount,2) ?></td>
						<td class="text-right danger"><?= number_format($cancel_amount,2) ?></td>
						<td class="text-right warning"><?= number_format($balance_amount,2)?></td>
					</tr>
					<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
				
			}
			//Hotel 
			$query = "select * from hotel_booking_master where 1 and delete_status='0' ";
			$query .=" and customer_id='$customer_id'";
			if($from_date!='' || $to_date!=''){
				$query .=" and created_at between '$from_date' and '$to_date'";
			}	
			$sq_booking = mysqlQuery($query);
			while($row_booking = mysqli_fetch_assoc($sq_booking)){

				$date = $row_booking['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
				//sale 
				$sale_total_amount=$row_booking['total_fee'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//Cancel
				$cancel_amount=$row_booking['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from hotel_booking_entries where booking_id='$row_booking[booking_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from hotel_booking_entries where booking_id='$row_booking[booking_id]' and status='Cancel'"));

				//Paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from hotel_booking_payment where booking_id='$row_booking[booking_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;
				if($pass_count == $cancel_count){
					if($paid_amount > 0){
						if($cancel_amount >0){
							if($paid_amount > $cancel_amount){
								$balance_amount1 = 0;
							}else{
								$balance_amount1 = $cancel_amount - $paid_amount;
							}
						}else{
						$balance_amount1 = 0;
						}
					}
					else{
						$balance_amount1 = $cancel_amount;
					}
				}
				else{
					$balance_amount1 = $sale_total_amount - $paid_amount;
				}
				if($balance_amount1 > 0){
					$pass_name = ($row_booking['pass_name'] != '' ) ? ' ('.$row_booking['pass_name'].')' : '';
				?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= "Hotel Booking".' ('.get_date_user($row_booking['created_at']).')' ?></td>
					<td><?= get_hotel_booking_id($row_booking['booking_id'],$year).$pass_name ?></td>
					<td class="text-right  info"><?= number_format($sale_total_amount,2) ?></td>
					<td class="text-right  success"><?= number_format($paid_amount,2)?></td>
					<td class="text-right danger"><?= number_format($cancel_amount,2) ?></td>
					<td class="text-right warning"><?= number_format($balance_amount1,2) ?></td>	
				</tr>
				<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount1;
				$total_cancel +=$cancel_amount;
			}
			//Bus
			$query = "select * from bus_booking_master where 1 and delete_status='0' ";
			if($customer_id!=""){
			$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
			$query .=" and created_at between '$from_date' and '$to_date'";
			}
			$sq_booking = mysqlQuery($query);
			while($row_booking = mysqli_fetch_assoc($sq_booking)){
				
				$date = $row_booking['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
				//sale 
				$sale_total_amount=$row_booking['net_total'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//paid
				$cancel_amount=$row_booking['cancel_amount'];
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from bus_booking_payment_master where booking_id='$row_booking[booking_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				//Cancel
				$cancel_amount=$row_booking['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from bus_booking_entries where booking_id='$row_booking[booking_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from bus_booking_entries where booking_id='$row_booking[booking_id]' and status='Cancel'"));

				if($pass_count == $cancel_count){
					if($paid_amount > 0){
						if($cancel_amount >0){
							if($paid_amount > $cancel_amount){
								$balance_amount = 0;
							}else{
								$balance_amount = $cancel_amount - $paid_amount;
							}
						}else{
						$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $cancel_amount;
					}
				}
				else{
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
				?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= "Bus Booking".' ('.get_date_user($row_booking['created_at']).')' ?></td>
					<td><?= get_bus_booking_id($row_booking['booking_id'],$year) ?></td>
					<td class="text-right info"><?= number_format($sale_total_amount,2) ?></td>
					<td class="text-right success"><?= number_format($paid_amount,2) ?></td>
					<td class="text-right danger"><?= number_format($cancel_amount,2) ?></td>
					<td class="text-right warning"><?= number_format($balance_amount,2) ?></td>
				</tr>
				<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
			}
			//Car Rental
			$query = "select * from car_rental_booking where 1 and delete_status='0' ";
			if($customer_id!=""){
			$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
			$query .=" and created_at between '$from_date' and '$to_date'";
			}
			$sq_booking = mysqlQuery($query);
			while($row_booking = mysqli_fetch_assoc($sq_booking))
			{
				$count++;
				$date = $row_booking['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
				//Sale
				$sale_total_amount=$row_booking['total_fees'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//Cacnel
				$cancel_amount=$row_booking['cancel_amount'];

				//Paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from car_rental_payment where booking_id='$row_booking[booking_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				if($row_booking['status'] == 'Cancel'){
					if($paid_amount > 0){
						if($cancel_amount >0){
							if($paid_amount > $cancel_amount){
								$balance_amount = 0;
							}else{
								$balance_amount = $cancel_amount - $paid_amount;
							}
						}else{
						$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $cancel_amount;
					}
				}
				else{
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
					$pass_name = ($row_booking['pass_name'] != '' ) ? ' ('.$row_booking['pass_name'].')' : '';			
				?>
				<tr>
					<td><?= $count ?></td>
					<td><?= "Car Rental".' ('.get_date_user($row_booking['created_at']).')' ?></td>
					<td><?= get_car_rental_booking_id($row_booking['booking_id'],$year).$pass_name ?></td>
					<td class="text-right info"><?= number_format($sale_total_amount, 2) ?></td>
					<td class="text-right success"><?= number_format($paid_amount,2)?></td>
					<td class="text-right danger"><?= number_format($cancel_amount,2)?></td>
					<td class="text-right warning"><?= number_format($balance_amount,2);?></td>
				</tr>
				<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
			}
			//Group
			$query = "select * from tourwise_traveler_details where 1 and delete_status='0' ";
			if($customer_id!=""){
				$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
				$query .=" and DATE(form_date) between '$from_date' and '$to_date'";
			}
			$sq1 =mysqlQuery($query);
			while($row1 = mysqli_fetch_assoc($sq1))
			{
				$count++;
				$date = $row1['form_date'];
				$yr = explode("-", $date);
				$year =$yr[0];
				$sale_total_amount=$row1['net_total'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(amount) as sum from payment_master where tourwise_traveler_id='$row1[id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '') ? '0' : $paid_amount;

				$pass_count = mysqli_num_rows(mysqlQuery("select * from  travelers_details where traveler_group_id='$row1[traveler_group_id]'"));
				$cancelpass_count = mysqli_num_rows(mysqlQuery("select * from  travelers_details where traveler_group_id='$row1[traveler_group_id]' and status='Cancel'"));
				if($row1['tour_group_status'] == 'Cancel'){
					//Group Tour cancel
					$cancel_tour_count2=mysqli_num_rows(mysqlQuery("SELECT * from refund_tour_estimate where tourwise_traveler_id='$row1[id]'"));
					if($cancel_tour_count2 >= '1'){
						$cancel_tour=mysqli_fetch_assoc(mysqlQuery("SELECT * from refund_tour_estimate where tourwise_traveler_id='$row1[id]'"));
						$cancel_amount = $cancel_tour['cancel_amount'];
					}
					else{ $cancel_amount = 0; }
				}
				else{
					// Group booking cancel
					$cancel_esti_count1=mysqli_num_rows(mysqlQuery("SELECT * from refund_traveler_estimate where tourwise_traveler_id='$row1[id]'"));
					if($pass_count==$cancelpass_count){
						$cancel_esti1=mysqli_fetch_assoc(mysqlQuery("SELECT * from refund_traveler_estimate where tourwise_traveler_id='$row1[id]'"));
						$cancel_amount = $cancel_esti1['cancel_amount'];
					}
					else{ $cancel_amount = 0; }
				}
				
				$cancel_amount = ($cancel_amount == '')?'0':$cancel_amount;
				if($row1['tour_group_status'] == 'Cancel'){
					if($cancel_amount > $paid_amount){
						$balance_amount = $cancel_amount - $paid_amount;
					}
					else{
						$balance_amount = 0;
					}
				}else{
					if($pass_count==$cancelpass_count){
						if($cancel_amount > $paid_amount){
							$balance_amount = $cancel_amount - $paid_amount;
						}
						else{
							$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $sale_total_amount - $paid_amount;
					}
				}
				if(floatval($balance_amount) > 0){
					$sq_entry = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from travelers_details where traveler_group_id='$row1[traveler_group_id]'"));
					$pass_name = ($sq_entry['first_name'] != '' ) ? ' ('.$sq_entry['first_name']." ".$sq_entry['last_name'].')' : '';
					?>
					<tr>
						<td><?php echo $count ?></td>
						<td><?= "Group Booking".' ('.get_date_user($row1['form_date']).')' ?></td>
						<td><?= get_group_booking_id($row1['id'],$year).$pass_name ?></td>
						<td class="text-right info"><?= number_format($sale_total_amount,2) ?></td>
						<td class="text-right success"><?= number_format($paid_amount,2) ?></td>
						<td class="text-right danger"><?=  number_format($cancel_amount,2)?></td>
						<td class="text-right warning"><?= number_format($balance_amount,2) ?></td>
					</tr>	
					<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
			}
			//Excursion
			$query = "select * from excursion_master where 1 and delete_status='0' ";
			if($customer_id!=""){
				$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
				$query .=" and created_at between '$from_date' and '$to_date'";
			}	
			$sq_ex = mysqlQuery($query);
			while($row_ex= mysqli_fetch_assoc($sq_ex)){

				$date = $row_ex['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
				// sale
				$sale_total_amount=$row_ex['exc_total_cost'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//Cancel
				$cancel_amount=$row_ex['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from excursion_master_entries where exc_id='$row_ex[exc_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from excursion_master_entries where exc_id='$row_ex[exc_id]' and status='Cancel'"));

				// Paid
				$query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from exc_payment_master where exc_id='$row_ex[exc_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query['sum'];
				$paid_amount = ($paid_amount == '')?'0':$paid_amount;

				if($pass_count == $cancel_count){
					if($paid_amount > 0){
						if($cancel_amount >0){
							if($paid_amount > $cancel_amount){
								$balance_amount = 0;
							}else{
								$balance_amount = $cancel_amount - $paid_amount;
							}
						}else{
						$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $cancel_amount;
					}
				}
				else{
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
				?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= "Excursion Booking".' ('.get_date_user($row_ex['created_at']).')'?></td>
					<td><?= get_exc_booking_id($row_ex['exc_id'],$year) ?></td>
					<td class="info text-right"><?= number_format($sale_total_amount,2) ?></td>
					<td class="success text-right"><?= number_format($paid_amount,2) ?></td>
					<td class="danger text-right"><?= number_format($cancel_amount,2) ?></td>
					<td class="warning text-right"><?= number_format($balance_amount,2) ?></td>
				</tr>
				<?php
				}
				$total_amount +=$sale_total_amount;
				$total_paid   +=$paid_amount;
				$total_balance+=$balance_amount;
				$total_cancel +=$cancel_amount;
			}
			//Miscellaneous
			$query = "select * from miscellaneous_master where 1 and delete_status='0'";
			if($customer_id!=""){
				$query .=" and customer_id='$customer_id'";
			}
			if($from_date!='' || $to_date!=''){
				$query .=" and created_at between '$from_date' and '$to_date'";
			}
			$sq_visa = mysqlQuery($query);
			while($row_visa = mysqli_fetch_assoc($sq_visa)){

				$date = $row_visa['created_at'];
				$yr = explode("-", $date);
				$year =$yr[0];
			
				//Sale
				$sale_total_amount=$row_visa['misc_total_cost'];
				if($sale_total_amount==""){  $sale_total_amount = 0 ;  }

				//Cancel
				$cancel_amount=$row_visa['cancel_amount'];
				$pass_count = mysqli_num_rows(mysqlQuery("select * from miscellaneous_master_entries where misc_id='$row_visa[misc_id]'"));
				$cancel_count = mysqli_num_rows(mysqlQuery("select * from miscellaneous_master_entries where misc_id='$row_visa[misc_id]' and status='Cancel'"));

				//Paid
				$query1 = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum from miscellaneous_payment_master where misc_id='$row_visa[misc_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
				$paid_amount = $query1['sum'];

				$paid_amount = ($paid_amount == '') ? '0' : $paid_amount;

				if($pass_count == $cancel_count){
					if($paid_amount > 0){
						if($cancel_amount > 0){
							if($paid_amount > $cancel_amount){
								$balance_amount = 0;
							}else{
								$balance_amount = $cancel_amount - $paid_amount;
							}
						}else{
							$balance_amount = 0;
						}
					}
					else{
						$balance_amount = $cancel_amount;
					}
				}
				else{
					$balance_amount = $sale_total_amount - $paid_amount;
				}
				if(floatval($balance_amount) > 0){
					$sq_entry = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from miscellaneous_master_entries where misc_id='$row_visa[misc_id]'"));
					$pass_name = ($sq_entry['first_name'] != '' ) ? ' ('.$sq_entry['first_name']." ".$sq_entry['last_name'].')' : '';
					?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= "Miscellaneous Booking".' ('.get_date_user($row_visa['created_at']).')' ?></td>
						<td><?= get_misc_booking_id($row_visa['misc_id'],$year).$pass_name ?></td>
						<td class="info text-right"><?= number_format($sale_total_amount,2) ?></td>
						<td class="success text-right"><?= number_format($paid_amount,2) ?></td>
						<td class="danger text-right"><?= number_format($cancel_amount,2) ?></td>
						<td class="warning text-right"><?= number_format($balance_amount,2) ?></td>
					</tr>
					<?php
				}
				$total_amount  += $sale_total_amount;
				$total_paid    += $paid_amount;
				$total_balance += $balance_amount;
				$total_cancel  += $cancel_amount;
			}
		?>
		<tr class="active">
			<th colspan="3" class="text-right info">Total</th>
			<th colspan="1" class="text-right info"><?= number_format($total_amount,2) ?></th>

			<th colspan="1" class="text-right success"><?= number_format($total_paid,2) ?></th>

			<th class="text-right danger"><?= ($total_cancel=='')?number_format(0,2): number_format($total_cancel,2); ?></th>

			<th colspan="1" class="text-right warning"><?= number_format($total_balance,2);?></th>

		</tr>

	</tbody>
	</table>

</div> </div> </div>
    <!-- invoice_receipt_back_detail -->

    <div class="border_block inv_rece_back_detail">

        <div class="row">

            <div class="col-md-4">

                <p class="border_lt"><span class="font_5">BANK NAME :

                    </span><?= ($branch_details['bank_name'] != '') ? $branch_details['bank_name'] : $bank_name_setting ?>

                </p>

            </div>

            <div class="col-md-4">

                <p class="border_lt"><span class="font_5">A/C TYPE :

                    </span><?= ($branch_details['acc_name'] != '') ? $branch_details['acc_name'] : $acc_name ?></p>

            </div>

            <div class="col-md-4">

                <p class="border_lt"><span class="font_5">BRANCH :

                    </span><?= ($branch_details['bank_branch_name'] != '') ? $branch_details['bank_branch_name'] : $bank_branch_name ?>

                </p>

            </div>

            <div class="col-md-4">

                <p class="border_lt no-marg"><span class="font_5">A/C NO :

                    </span><?= ($branch_details['bank_acc_no'] != '') ? $branch_details['bank_acc_no'] : $bank_acc_no ?>

                </p>

            </div>

            <div class="col-md-4">

                <p class="border_lt no-marg"><span class="font_5">IFSC/SWIFT Code :

                    </span><?= ($branch_details['ifsc_code'] != '') ? strtoupper($branch_details['ifsc_code']) : strtoupper($bank_ifsc_code) ?><?= ($branch_details['swift_code'] != '') ? '/' . strtoupper($branch_details['swift_code']) :  '' ?> <?=($bank_swift_code != '') ? '/' . strtoupper($bank_swift_code) : ''?>

                </p>

            </div>

            <div class="col-md-4">

                <p class="border_lt no-marg"><span class="font_5">BANK ACCOUNT NAME :

                    </span><?= ($branch_details['bank_account_name'] != '') ? $branch_details['bank_account_name'] : $bank_account_name ?>

                </p>

            </div>

        </div>

    </div>
	<?php
	if (check_qr()) { ?>
		<div class="col-md-12 text-center" style="margin-top:20px; margin-bottom:20px;">
			<?= get_qr('Landscape Standard') ?>
			<br>
			<h4 class="no-marg">Scan & Pay </h4>
		</div>
	<?php } ?>
</section>