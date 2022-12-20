<?php

include "../../../model/model.php";
$city_id = $_POST['city_id'];
$active_flag = $_POST['active_flag'];
$query = "select * from site_seeing_vendor where 1 ";
if($city_id!=""){
	$query .=" and city_id='$city_id'";
}
if($active_flag!=""){
	$query .=" and active_flag='$active_flag' ";
}
?>
<div class="row mg_tp_20"> <div class="col-md-12 no-pad"> <div class="table-responsive">
<table class="table table-bordered" id="tbl_vendor_list" style="margin: 20px 0 !important;">
	<thead>
		<tr class="table-heading-row">
			<th>S_No.</th>
			<th>Company_Name</th>
			<th>City</th>
			<th>Mobile</th>
			<th>Contact_Person</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$count = 0;
		$sq_vendor = mysqlQuery($query);
		while($row_vendor = mysqli_fetch_assoc($sq_vendor)){
			$sq_city = mysqli_fetch_assoc(mysqlQuery("select * from city_master where city_id='$row_vendor[city_id]'"));
			$bg = ($row_vendor['active_flag']=="Inactive") ? "danger" : "";
			$mobile_no = $encrypt_decrypt->fnDecrypt($row_vendor['mobile_no'], $secret_key);
			?>
			<tr class="<?= $bg ?>">
				<td><?= ++$count ?></td>
				<td><?= $row_vendor['vendor_name'] ?></td>
				<td><?= $sq_city['city_name'] ?></td>
				<td><?= $mobile_no ?></td>
				<td><?= $row_vendor['concern_person_name'] ?></td>
				<td>
					<button class="btn btn-info btn-sm" onclick="view_modal(<?= $row_vendor['vendor_id'] ?>)" title="View Details"><i class="fa fa-eye"></i></button>
					<button class="btn btn-info btn-sm" onclick="update_modal(<?= $row_vendor['vendor_id'] ?>)" title="Edit Details"><i class="fa fa-pencil-square-o"></i></button>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</div> </div> </div>
<script>
$('#tbl_vendor_list').dataTable({
		"pagingType": "full_numbers"
	});
</script>

<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>