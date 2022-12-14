<?php
include "../../model/model.php";
$tourwise_id = $_POST['cmb_tourwise_traveler_id'];

$sq_est_info = mysqli_fetch_assoc(mysqlQuery("select * from refund_traveler_estimate where tourwise_traveler_id='$tourwise_id'"));

$sq_total_tour_paid_amount = mysqli_fetch_assoc(mysqlQuery("select sum(amount) as sum from payment_master where tourwise_traveler_id='$tourwise_id' and clearance_status!='Pending' AND clearance_status!='Cancelled'"));

$sq_total_travel_paid_amount = mysqli_fetch_assoc(mysqlQuery("select sum(amount) as sum from payment_master where tourwise_traveler_id='$tourwise_id'  and clearance_status!='Pending' AND clearance_status!='Cancelled'"));

$sq_group_info = mysqli_fetch_assoc(mysqlQuery("select * from tourwise_traveler_details where id='$tourwise_id' and delete_status='0'"));
$paid_amount = $sq_total_travel_paid_amount['sum'];

$sq_tour_info = mysqli_fetch_assoc(mysqlQuery("select * from refund_traveler_estimate where tourwise_traveler_id='$tourwise_id'"));
$sq_tour_count = mysqli_num_rows(mysqlQuery("select * from refund_traveler_estimate where tourwise_traveler_id='$tourwise_id'"));
?>

<input type="hidden" id="total_sale" name="total_sale" value="<?= $sq_group_info['net_total']?>">	        
<input type="hidden" id="total_paid" name="total_paid" value="<?= $paid_amount ?>">	
<input type="hidden" id="txt_tourwise_id" name="txt_tourwise_id" value="<?= $tourwise_id ?>">	

<hr>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 col-xs-12">
	<div class="widget_parent-bg-img bg-green">
		<div class="widget_parent">
			<div class="stat_content main_block">
				<span class="main_block content_span">
					<span class="stat_content-tilte pull-left">Total Paid</span>
					<span class="stat_content-amount pull-right"><?php echo ($sq_total_tour_paid_amount['sum']=="") ? number_format(0,2) : number_format($sq_total_tour_paid_amount['sum'],2);?></span>
				</span>
			</div>
		</div>
	</div>
	</div>
</div>

<hr>
<form id="frm_refund" class="mg_bt_150">
<div class="row">
		<div class="col-md-12 text-center mt-5 mb-5" style="margin-bottom: 20px;">
			<h4>Refund Estimate</h4>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-3 col-md-offset-3 col-sm-6 col-xs-12 mg_bt_10_xs">
			<input type="text" name="cancel_amount" id="cancel_amount" class="form-control text-right" placeholder="*Cancellation Charges" title="Cancellation Charges"  onchange="validate_balance(this.id);calculate_total_refund()" value="<?= $sq_tour_info['cancel_amount'] ?>">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10_xs">
			<input type="text" name="total_refund_amount" id="total_refund_amount" class="form-control  amount_feild_highlight text-right" placeholder="Total Refund" title="Total Refund" readonly value="<?= $sq_tour_info['total_refund_amount'] ?>">
		</div>
	</div>
	<?php if($sq_tour_count ==0){ ?>
	<div class="row mg_tp_20">
		<div class="col-md-12 text-center mg_bt_150">
			<button id="btn_refund_save" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
		</div>
	</div>
	<?php } ?>
</form>

<script src="<?php echo BASE_URL ?>js/app/field_validation.js"></script>
<script>
function calculate_total_refund(){
	var total_refund_amount = 0;
	var cancel_amount = $('#cancel_amount').val();
	var total_sale = $('#total_sale').val();
	var total_paid = $('#total_paid').val();

	if(cancel_amount==""){ cancel_amount = 0; }
	if(total_paid==""){ total_paid = 0; }

	if(parseFloat(cancel_amount) > parseFloat(total_sale)) { error_msg_alert("Cancel amount can not be greater than Sale amount"); }
	var total_refund_amount = parseFloat(total_paid) - parseFloat(cancel_amount);
	
	if(parseFloat(total_refund_amount) < 0){ 
		total_refund_amount = 0;
	}
	$('#total_refund_amount').val(total_refund_amount.toFixed(2));
}

$('#frm_refund').validate({
	rules:{
			cancel_amount :{ required : true, number : true },
			total_refund_amount :{ required : true, number : true },	

	},
	submitHandler:function(form){

		$('#btn_refund_save').prop('disabled',true);
		var tourwise_id = $('#txt_tourwise_id').val();
		var cancel_amount = $('#cancel_amount').val();
		var total_refund_amount = $('#total_refund_amount').val();
		
		var total_sale = $('#total_sale').val();
		var total_paid = $('#total_paid').val();
		
		if(parseFloat(cancel_amount) > parseFloat(total_sale)) {
			error_msg_alert("Cancel amount can not be greater than Sale amount");
			$('#btn_refund_save').prop('disabled',false);
			return false;
		}
		$('#vi_confirm_box').vi_confirm_box({
			message: 'Are you sure?',
			callback: function(data1) {
				if (data1 == "yes") {
					$('#btn_refund_save').button('loading');
					$.ajax({
						type:'post',
						url: base_url()+'controller/group_tour/traveler_cancelation_and_refund/booking_traveler_refund_estimate.php',
						data: { tourwise_id : tourwise_id,cancel_amount : cancel_amount, total_refund_amount : total_refund_amount },
						success:function(result){
							msg_popup_reload(result);
							$('#btn_refund_save').prop('disabled',false);
						}
						
					});
				}else{
					$('#btn_refund_save').prop('disabled',false);
					$('#btn_refund_save').button('reset');

				}
			}
		});
	}
});
</script>