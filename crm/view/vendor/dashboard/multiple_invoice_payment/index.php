<?php
include "../../../../model/model.php";
$branch_status = $_POST['branch_status'];
?>
<div class="row text-right">
	<div class="col-md-12">
		<button class="btn btn-excel btn-sm" onclick="excel_report()" data-toggle="tooltip" title="Generate Excel"><i class="fa fa-file-excel-o"></i></button>&nbsp;&nbsp;
		<button class="btn btn-info btn-sm ico_left" id="mpay_save" onclick="save_modal()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Payment</button>
	</div>
</div>
<div class="col-md-12 col-sm-9 no-pad mg_bt_20 text-right">
	<span style="color: red;line-height: 35px;" data-original-title="" title="" class="note">Please make Payment entry only for Multiple Purchases against single booking.</span>
</div>

<div class="app_panel_content Filter-panel">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<select name="vendor_type2" id="vendor_type2" title="Supplier Type" onchange="vendor_type_data_load(this.value, 'div_vendor_type_content2')">
				<option value="">Supplier Type</option>
				<?php 
				$sq_vendor = mysqlQuery("select * from vendor_type_master order by vendor_type");
				while($row_vendor = mysqli_fetch_assoc($sq_vendor)){
					?>
					<option value="<?= $row_vendor['vendor_type'] ?>"><?= $row_vendor['vendor_type'] ?></option>
					<?php
				}
				?>
			</select>
		</div>
		<div id="div_vendor_type_content2"></div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
          <select name="estimate_type2" id="estimate_type2" title="Purchase Type" onchange="payment_for_data_load(this.value, 'div_payment_for_content_i', '2')">
            <option value="">Purchase Type</option>
            <?php 
            $sq_estimate_type = mysqlQuery("select * from estimate_type_master order by id");
            while($row_estimate = mysqli_fetch_assoc($sq_estimate_type)){
              ?>
              <option value="<?= $row_estimate['estimate_type'] ?>"><?= $row_estimate['estimate_type'] ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div id="div_payment_for_content_i"></div>
		<div class="col-md-3">
			<button class="btn btn-info ico_right" onclick="payment_list_reflect()">Proceed&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10 hidden">
			<select name="financial_year_id_filter" id="financial_year_id_filter" title="Financial Year">
				<?php get_financial_year_dropdown(); ?>
			</select>
		</div>
	</div>
</div>
<div id="div_payment_list_reflect" class="main_block loader_parent">
<div class="row mg_tp_20"> <div class="col-md-12 no-pad"> <div class="table-responsive">
	<table id="advance_payment" class="table table-hover" style="margin: 20px 0 !important;">         
	</table>
</div></div></div>
</div>
<div id="div_payment_update_content"> </div>
<div id="div_payment_save_content"> </div>
<div id="div_vendor_report_content" class="main_block"></div>
<style>
.action_width{
	width : 250px;
}
</style>
<script>
var column = [
	{ title : "S_No."},
	{ title : "Purchase_Type"},
	{ title : "Purchase_ID"},
	{ title:"Supplier_Type"},
	{ title : "Supplier_Name"},
	{ title : "Payment_Date"},
	{ title : "Amount"},
	{ title : "Mode"},
	{ title : "Bank_Name"},
	{ title : "Cheque_No/Id"},
	{ title : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions", className:"text-center action_width"}
	
];

function payment_list_reflect()
{
	var vendor_type = $('#vendor_type2').val();
	var vendor_type_id = get_vendor_type_id('vendor_type2');
	var estimate_type = $('#estimate_type2').val();
	var estimate_type_id = get_estimate_type_id('estimate_type2', '2');
	var financial_year_id = $('#financial_year_id_filter').val();
	var branch_status = $('#branch_status').val();
	$.post('payment/payment_list_reflect.php', { vendor_type : vendor_type, vendor_type_id : vendor_type_id,estimate_type : estimate_type, estimate_type_id : estimate_type_id, financial_year_id : financial_year_id, branch_status : branch_status }, function(data){
		pagination_load(data, column, true, true, 20, 'advance_payment',true);
		$('.loader').remove();
	});
}
payment_list_reflect();
function payment_update_modal(payment_id){
    $('#updatep1_btn-'+payment_id).button('loading');
    $('#updatep1_btn-'+payment_id).prop('disabled',true);
	$.post('payment/payment_update_modal.php', { payment_id : payment_id }, function(data){
		$('#div_payment_update_content').html(data);
		$('#updatep1_btn-'+payment_id).button('reset');
		$('#updatep1_btn-'+payment_id).prop('disabled',false);
		payment_list_reflect();
	});
}
function save_modal(){
	$('#mpay_save').prop('disabled',true);
	var branch_status = $('#branch_status').val();
	$('#mpay_save').button('loading');
	$.post('multiple_invoice_payment/payment_save_modal.php', { branch_status : branch_status }, function(data){
		$('#div_payment_save_content').html(data);
		$('#mpay_save').prop('disabled',false);
		$('#mpay_save').button('reset');
	});
}
function payment_delete_entry(payment_id)
{
	$('#vi_confirm_box').vi_confirm_box({
		callback: function(data1){
			if(data1=="yes"){
				var branch_status = $('#branch_status').val();
				var base_url = $('#base_url').val();
				$.post(base_url+'controller/vendor/dashboard/payment/payment_delete.php',{ payment_id : payment_id }, function(data){
					success_msg_alert(data);
					payment_list_reflect();
				});
			}
		}
	});
}

function excel_report()
{
	var vendor_type = $('#vendor_type2').val();
	var vendor_type_id = get_vendor_type_id('vendor_type2');
	var estimate_type = $('#estimate_type2').val();
	var estimate_type_id = get_estimate_type_id('estimate_type2', '2');
	var financial_year_id = $('#financial_year_id_filter').val();
	var branch_status = $('#branch_status').val();

	window.location = 'payment/excel_report.php?financial_year_id='+financial_year_id+'&vendor_type='+vendor_type+''+'&vendor_type_id='+vendor_type_id+'&estimate_type='+estimate_type+''+'&estimate_type_id='+estimate_type_id+'&branch_status='+branch_status;
}
$(function () {
    $("[data-toggle='tooltip']").tooltip({placement: 'bottom'});
});
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>