<div class="col-md-12 text-right">
		<button class="btn btn-excel btn-sm" onclick="exportToExcel('branchwise_report')" data-toggle="tooltip" title="Generate Excel"><i class="fa fa-file-excel-o"></i></button>
	</div>
<div class="app_panel_content Filter-panel">
	<div class="row">
		<div class="col-md-3 col-sm-4 mg_bt_10_sm_xs">
			<input type="text" id="from_date" onchange="get_to_date(this.id,'to_date');" name="from_date" class="form-control" placeholder="*From Date" title="From Date">
		</div>
		<div class="col-md-3 col-sm-4 mg_bt_10_sm_xs">
			<input type="text" id="to_date" name="to_date" onchange="validate_validDate('from_date','to_date');" class="form-control" placeholder="*To Date" title="To Date">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<button class="btn btn-sm btn-info ico_right" onclick="report_reflect(true)">Proceed&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>

		</div>
	
	
	</div>
</div>


<div id="div_list" class="main_block mg_tp_20">
	<div class="row mg_tp_20">
		<div class="col-md-12 no-pad">
			<div class="table-responsive">
				<table id="branchwise_report" data-excel-name="branchwise report" class="table table-hover" style="margin: 20px 0 !important;">
				</table>
			</div>
		</div>
	</div>
</div>
<div id="other_branch_display">

</div>
<script>
	$("#from_date, #to_date").datetimepicker({
		timepicker: false,
		format: 'd-m-Y'
	});


	function report_reflect(data) {

		var id = 1;
		if (data != true) {
			var fromdate = null;
			var todate = null;

		} else {
			var fromdate = $('#from_date').val();
			var todate = $('#to_date').val();

		}
		var column = [{
				title: "SR_NO."
			},
			{
				title: "Branch_Name"
			},
			{
				title: "Total Enquiries"
			},
			{
				title: "Active"
			},
			{
				title: "In-Followup"
			},
			{
				title: "Dropped"
			},
			{
				title: "Converted"
			},
			{
				title: "Total Budget"
			},
			{
				title: "Strong"
			},
			{
				title: "Hot Enquiries"
			},
			{
				title: "Cold Enquiries"
			},
			{
				title: "Actions",
				class : "no-export"
			},
		];
		$.post('report_reflect/branchwise_report/get_report.php', {
			id: id,
			fromdate: fromdate,
			todate: todate
		}, function(data) {
			// $('#div_list').html(data);
			pagination_load(data, column, true, true, 20, 'branchwise_report');
		});
	}

	report_reflect(false);


	function view_branch_modal(branch_id) {
		$('#view_btn-'+branch_id).prop('disabled',true);
		var base_url = $('#base_url').val();
		$('#view_btn-'+branch_id).button('loading');
		$.post(base_url + 'view/reports/analysis_reports/report_reflect/branchwise_report/view_branch_modal.php', {
			branch_id: branch_id
		}, function(data) {
			$('#other_branch_display').html(data);
			$('#view_btn-'+branch_id).prop('disabled',false);
			$('#view_btn-'+branch_id).button('reset');
		});
	}
</script>

<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
