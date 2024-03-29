<?php
include_once('../../../../model/model.php');
include_once('../../inc/vendor_generic_functions.php');
?>

<div class="app_panel_content Filter-panel">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
			<select id="estimate_id_filter" name="estimate_id_filter" style="width:100%" title="Supplier Estimate ID" onchange="list_reflect()">
		        <option value="">Supplier Estimate ID</option>
		        <?php
		        $sq_estimate = mysqlQuery("select * from vendor_estimate where delete_status='0' order by estimate_id desc");
		        while($row_estimate = mysqli_fetch_assoc($sq_estimate)){
						$vendor_type_val = get_vendor_name($row_estimate['vendor_type'], $row_estimate['vendor_type_id']);
						$estimate_type_val = get_estimate_type_name($row_estimate['estimate_type'], $row_estimate['estimate_type_id']);
						$date = $row_estimate['purchase_date'];
						$yr = explode("-", $date);
						$year = $yr[0];
					?>
		        <option value="<?= $row_estimate['estimate_id'] ?>"><?= get_vendor_estimate_id($row_estimate['estimate_id'],$year)." : ".$vendor_type_val."(".$row_estimate['vendor_type'].") : ".$estimate_type_val ?></option>
		        <?php
		        }
		        ?>
		    </select>
		</div>
	</div>
</div>

<div id="div_modal_content"></div>
<div id="div_list_content" class="main_block"></div>

<script>
$('#estimate_id_filter').select2();
function save_modal(estimate_id)
{
    $('#update_estimate-'+estimate_id).button('loading');
    $('#update_estimate-'+estimate_id).prop('disabled',true);
	$.post('estimate/save_modal.php', { estimate_id : estimate_id }, function(data){
		$('#div_modal_content').html(data);
    $('#update_estimate-'+estimate_id).button('reset');
    $('#update_estimate-'+estimate_id).prop('disabled',false);
	});
}

function list_reflect()
{
	var estimate_id = $('#estimate_id_filter').val();

	$.post('estimate/list_reflect.php', { estimate_id : estimate_id }, function(data){
		$('#div_list_content').html(data);
	});
}
list_reflect();
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>