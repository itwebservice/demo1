<?php
include "../../../../../../model/model.php";

$misc_id = $_POST['misc_id'];
$customer_id = $_SESSION['customer_id'];

$query = "select * from miscellaneous_master where 1 and delete_status='0'";
$query .=" and customer_id='$customer_id'";
if($misc_id!=""){
	$query .=" and misc_id='$misc_id'";
}
?>
<div class="row mg_tp_20"> <div class="col-md-12"> <div class="table-responsive">
	
<table class="table table-bordered bg_white cust_table" id="tbl_miscellaneous_report" style="margin:20px 0 !important">
	<thead>
		<tr class="table-heading-row">
			<th>S_No.</th>
			<th>Booking_ID</th>
			<th>Customer Name</th>
			<th>Passenger_Name</th>
			<th>Birth_date</th>
			<th>Adolescence</th>
			<th>Passport_Id</th>
			<th>Issue_Date </th>
			<th>Expiry_Date</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$count = 0;
		$sq_miscellaneous = mysqlQuery($query);
		while($row_miscellaneous =mysqli_fetch_assoc($sq_miscellaneous)){
			$date = $row_miscellaneous['created_at'];
			$yr = explode("-", $date);
			$year =$yr[0];

			$sq_customer_info = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$row_miscellaneous[customer_id]'"));

			$sq_entry = mysqlQuery("select * from miscellaneous_master_entries where misc_id='$row_miscellaneous[misc_id]'");
			while($row_entry = mysqli_fetch_assoc($sq_entry)){

				$bg = ($row_entry['status']=="Cancel") ? "danger" : "";
				$issue_date  = ($row_entry['issue_date'] == '1970-01-01') ? 'NA' : get_date_user($row_entry['issue_date']);
				$expiry_date  = ($row_entry['expiry_date'] == '1970-01-01') ? 'NA' : get_date_user($row_entry['expiry_date']);
				?>
				<tr class="<?= $bg ?>">
					<td><?= ++$count ?></td>
					<td><?= get_misc_booking_id($row_miscellaneous['misc_id'],$year) ?></td>
					<td><?= $sq_customer_info['first_name'].' '.$sq_customer_info['last_name'] ?></td>
					<td><?= $row_entry['first_name'].' '.$row_entry['last_name'] ?></td></td>
					<td><?= date('d-m-Y', strtotime($row_entry['birth_date'])) ?></td>
					<td><?= $row_entry['adolescence'] ?></td>
					<td><?= $row_entry['passport_id'] ?></td>
					<td><?= $issue_date ?></td>
					<td><?= $expiry_date ?></td>
				</tr>
				<?php
			}

		}
		?>
	</tbody>
</table>
</div> </div> </div>
<script>
	
$('#tbl_miscellaneous_report').dataTable({
	"pagingType": "full_numbers"
});
</script>