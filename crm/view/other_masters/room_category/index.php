<?php
include "../../../model/model.php";
?>
<div class="row text-right mg_tp_20">
	<div class="col-md-12">
		<button class="btn btn-info btn-sm ico_left" onclick="save_modal()" id="btn_save_modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Room Category</button>
	</div>
</div>

<div id="div_modal"></div>
<div id="div_list"></div>
<script>
function save_modal()
{
	$('#btn_save_modal').button('loading');
	$.post('room_category/save_modal.php', {}, function(data){
		$('#btn_save_modal').button('reset');
		$('#div_modal').html(data);
	});
}
function list_reflect()
{
	$.post('room_category/list_reflect.php', {}, function(data){
		$('#div_list').html(data);
	});
}
list_reflect();
function update_modal(entry_id)
{
	$('#roomc_update-'+entry_id).button('loading');
	$('#roomc_update-'+entry_id).prop('disabled',true);
	$.post('room_category/update_modal.php', { entry_id : entry_id }, function(data){
		$('#div_modal').html(data);
		$('#roomc_update-'+entry_id).button('reset');
		$('#roomc_update-'+entry_id).prop('disabled',false);
	});
}
</script>