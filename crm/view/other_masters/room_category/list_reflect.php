<?php
include_once("../../../model/model.php");
?>
<div class="row mg_tp_20"> <div class="col-md-12 no-pad"> <div class="table-responsive">
	
<table class="table table-hover" id="tbl_list" style="margin: 20px 0 !important;">
	<thead>
		<tr class="table-heading-row">
			<th>ID</th>
			<th>Room Category</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$count = 0;
		$sq_ref = mysqlQuery("select * from room_category_master");
		while($row_ref = mysqli_fetch_assoc($sq_ref)){
			$bg = ($row_ref['active_status']=="Inactive") ? "danger" : "";
			?>
			<tr class="<?= $bg ?>">
				<td><?= $row_ref['entry_id'] ?></td>
				<td><?= $row_ref['room_category'] ?></td>
				<td>
					<button class="btn btn-info btn-sm" id="roomc_update-<?= $row_ref['entry_id'] ?>" onclick="update_modal(<?= $row_ref['entry_id'] ?>)" title="Update Details"><i class="fa fa-pencil-square-o"></i></button>
				</td>
			</tr>
			<?php

		}
		?>
	</tbody>
</table>

</div> </div> </div>

<script>
$('#tbl_list').dataTable({
		"pagingType": "full_numbers"
	});
</script>