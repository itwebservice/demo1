var columns1 = [
	{ title: 'S_NO' },
	{ title: 'Bike_Name(Bike_Type)' },
	{ title: 'Currency' },
	{ title: 'Actions', className: 'text-center' }
];
tariff_list_reflect();
function tariff_list_reflect () {
	$('#div_request_list').append('<div class="loader"></div>');
	var from_date = $('#from_date_filter').val();
	var to_date = $('#to_date_filter').val();
	$.post('tariff/list_reflect.php', { from_date: from_date, to_date: to_date }, function (data) {
		setTimeout(() => {
			pagination_load(data, columns1, true, false, 20, 'b2b_tarrif_tab'); // third parameter is for bg color show yes or not
			$('.loader').remove();
		}, 800);
	});
}

function view_modal (tariff_id,bike_id) {
	$('#biket_view-'+tariff_id).button('loading');
	$('#biket_view-'+tariff_id).prop('disabled',true);
	$.post('tariff/view/index.php', { tariff_id: tariff_id,bike_id:bike_id }, function (data) {
		$('#div_tariffsave_modal').html(data);
		$('#biket_view-'+tariff_id).button('reset');
		$('#biket_view-'+tariff_id).prop('disabled',false);
	});
}
function tredit_modal (tariff_id) {
	$('#biket_update-'+tariff_id).button('loading');
	$('#biket_update-'+tariff_id).prop('disabled',true);
	$.post('tariff/edit_modal.php', { tariff_id: tariff_id }, function (data) {
		$('#div_tariffsave_modal').html(data);
		$('#biket_update-'+tariff_id).button('reset');
		$('#biket_update-'+tariff_id).prop('disabled',false);
	});
}
