<div class="row">
<div class="col-md-12 text-right">
  <button class="btn btn-info btn-sm ico_left" data-toggle="modal" id="bt_save_loc" onclick="save_modal()" title="Add new Location"><i class="fa fa-plus"></i>&nbsp;&nbsp;Location</button>
</div>
</div>
<?php //include_once('location_save_modal.php'); ?>

<div id="div_modal_save"></div>
<div id="location_list_div"></div>

<script src="js/location.js"></script>
<script>
function save_modal()
{
	
	$('#bt_save_loc').button('loading');
	$.post('locations/location_save_modal.php', {}, function(data){
		$('#bt_save_loc').button('reset');
		$('#div_modal_save').html(data);
	});
}

</script>
<script src="js/location.js"></script>