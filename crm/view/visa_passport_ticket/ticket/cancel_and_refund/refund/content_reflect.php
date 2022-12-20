<?php
include "../../../../../model/model.php";

$ticket_id = $_POST['ticket_id'];

$sq_ticket_info = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master where ticket_id='$ticket_id' and delete_status='0'"));
$sq_paid_amount = mysqli_fetch_assoc(mysqlQuery("select sum(payment_amount) as sum from ticket_payment_master where ticket_id='$sq_ticket_info[ticket_id]' and clearance_status!='Pending' and clearance_status!='Cancelled'"));
$sq_refund_amount = mysqli_fetch_assoc(mysqlQuery("select sum(refund_amount)as sum from ticket_refund_master where ticket_id='$sq_ticket_info[ticket_id]' and clearance_status!='Pending' and clearance_status!='Cancelled'"));

$total_sum=$sq_refund_amount['sum'];

$sale_amount = $sq_ticket_info['ticket_total_cost'];
$paid_amt = $sq_paid_amount['sum'];
$cancel_amount = $sq_ticket_info['cancel_amount'];
$refund_amount = $sq_ticket_info['total_refund_amount'];

$remaining = $refund_amount - $total_sum;
$remaining_show = ($remaining < 0) ? 0 : $remaining;
?>
<input type="hidden" id="refund_amount_tobe" name="refund_amount_tobe" value="<?php echo $refund_amount ?>">

<div class="row mg_tp_20 mg_bt_10">
	<div class="col-md-6 col-sm-6 col-xs-12 mg_bt_10_xs">
		<div class="widget_parent-bg-img bg-green">
			<div class="widget_parent">
				<div class="stat_content main_block">
			        <span class="main_block content_span" data-original-title="" title="">
			            <span class="stat_content-tilte pull-left" data-original-title="" title="">Total Sale</span>
						<span class="stat_content-amount pull-right" data-original-title="" title=""><?= ($sale_amount=='')?'0.00': number_format($sale_amount,2) ?></span>
			        </span>
			        <span class="main_block content_span" data-original-title="" title="">
			         	<span class="stat_content-tilte pull-left" data-original-title="" title="">Paid Amount</span>
			        	<span class="stat_content-amount pull-right" data-original-title="" title=""> <?= ($paid_amt=='')?'0.00': $paid_amt?></span>
			        </span>	
					<span class="main_block content_span" data-original-title="" title="">
			            <span class="stat_content-tilte pull-left" data-original-title="" title="">Cancellation Amount</span>
			            <span class="stat_content-amount pull-right" data-original-title="" title=""><?= number_format($cancel_amount, 2); ?></span>
			        </span>	
			    </div>	 
			</div>
		</div>		
	</div>        
	<div class="col-md-6 col-sm-6 col-xs-12 mg_bt_10_xs">
		<div class="widget_parent-bg-img bg-green">
			<div class="widget_parent">
				<div class="stat_content main_block">
					<span class="main_block content_span" data-original-title="" title="">
			            <span class="stat_content-tilte pull-left" data-original-title="" title="">Refund Amount</span>
			            <span class="stat_content-amount pull-right" data-original-title="" title=""><?php echo number_format($refund_amount, 2); ?></span>
			        </span>
					<span class="main_block content_span" data-original-title="" title="">
			            <span class="stat_content-tilte pull-left" data-original-title="" title="">Pending Refund Amount</span>
			            <span class="stat_content-amount pull-right" data-original-title="" title=""><?php echo number_format($remaining_show, 2); ?></span>
			        </span>
			    </div>	 
			</div>
		</div>		
	</div>        
</div>

<hr>
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12 mg_bt_20_xs">
		<form id="frm_refund_save">	
        <h3 class="editor_title">Refund Details</h3>
    	<div class="panel panel-default panel-body mg_bt_10"> 	
		<div class="row mg_bt_20 text-center">    
			    <div class="col-sm-6 col-xs-12 mg_bt_10">
 				<input type="hidden" name="remaining_val" id="remaining_val" value="<?php echo $refund_amount-$total_sum;?>">			   
 				<input type="text" id="refund_amount" name="refund_amount" placeholder="*Refund Amount" onchange="validate_balance(this.id);payment_amount_validate(this.id,'refund_mode','transaction_id','bank_name')" title="Refund Amount">
			    </div>
			    <div class="col-sm-6 col-xs-12 mg_bt_10">
			      <input type="text" id="refund_date" name="refund_date" placeholder="*Refund Date" title="Refund Date" value="<?= date('d-m-Y')?>">
			    </div>   			    
				<div class="col-sm-6 col-xs-12 mg_bt_10">
				    <select id="refund_mode" name="refund_mode" class="form-control" required title="Payment Mode" onchange="payment_master_toggles(this.id, 'bank_name', 'transaction_id', 'bank_id')">
						<?php get_payment_mode_dropdown(); ?>
				    </select>  
				</div> 
				<div class="col-sm-6 col-xs-12 mg_bt_10">
				    <input type="text" id="bank_name" name="bank_name" class="form-control bank_suggest" placeholder="Bank Name" title="Bank Name" disabled/>
				</div>      			    
				<div class="col-sm-6 col-xs-12 mg_bt_10">
			    	<input type="text" id="transaction_id" onchange="validate_balance(this.id);" name="transaction_id" class="form-control" placeholder="Cheque No / ID" title="Cheque No / ID" disabled/>
			  	</div>
			  	<div class="col-sm-6 col-xs-12 mg_bt_10">
			  		<select name="bank_id" id="bank_id" title="Bank" disabled>
	                    <?php get_bank_dropdown('Debitor Bank')  ?>
	                </select>
			  	</div>
			</div>

			<div class="row mg_bt_10">
				<div class="col-xs-12">
				  	<select name="entry_id" id="entry_id" multiple>
				  		<?php
							$sq_ticket_info1 = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$sq_ticket_info[customer_id]'"));
							if($sq_ticket_info1['type']=='Corporate'||$sq_ticket_info1['type'] == 'B2B'){
								$customer_name = $sq_ticket_info1['company_name'];
							}else{
								$customer_name = $sq_ticket_info1['first_name'].' '.$sq_ticket_info1['last_name'];
							}
				  			?>
							<option value="<?= $sq_ticket_info['customer_id'] ?>"><?= $customer_name ?></option>
				  	</select>
				 </div>
			</div>

			<div class="row text-center mg_tp_20">
			  <div class="col-xs-12">
			      <button id="btn_refund_save" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save Refund</button>
			  </div>
			</div>
		</div>

		</form>

	</div>

	<div class="col-md-6 col-sm-12 col-xs-12">
        <h3 class="editor_title">Refund History</h3>
    	<div class="panel panel-default panel-body no-pad"> 

		<div class="table-responsive">
		<table class="table table-bordered" id="tbl_refund_list" style="margin: 0 !important;">
			<thead>
				<tr class="table-heading-row">
					<th>S_No.</th>
					<th>Passenger_name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>Refund_Date</th>
					<th>Amount</th>
					<th>Mode</th>
					<th>Bank_Name</th>
					<th>Cheque_No/ID</th>
					<th>Voucher</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$total_refund = 0;
				$query = "select * from ticket_refund_master where ticket_id='$ticket_id' and refund_amount!=0 ";
				$count = 0;

				$sq_ticket_refund = mysqlQuery($query);
				while($row_ticket_refund = mysqli_fetch_assoc($sq_ticket_refund)){

					$count++;

					$total_refund = $total_refund+$row_ticket_refund['refund_amount'];

					$sq_ticket_info = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master where ticket_id='$row_ticket_refund[ticket_id]' and delete_status='0'"));

					$traveler_name = "";

					$sq_refund_entries = mysqlQuery("select * from ticket_refund_entries where refund_id='$row_ticket_refund[refund_id]'");
					while($row_refund_entry = mysqli_fetch_assoc($sq_refund_entries)){
						$sq_entry_info = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master_entries where entry_id='$row_refund_entry[entry_id]'"));
						$traveler_name .= $sq_entry_info['first_name'].' '.$sq_entry_info['last_name'].', ';
						$sq_entry_date = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master where ticket_id='$sq_entry_info[ticket_id]'"));
						$date = $sq_entry_date['created_at'];
						$yr = explode("-", $date);
						$year =$yr[0];
					}
					$ticket_id = get_ticket_booking_id($sq_ticket_info['ticket_id'],$year);
					$traveler_name = trim($traveler_name, ", ");

					if($row_ticket_refund['clearance_status']=='Pending'){ $bg = "warning"; }
					else if($row_ticket_refund['clearance_status']=='Cancelled'){ $bg = "danger"; }
					else if($row_ticket_refund['clearance_status']=='Cleared'){ $bg = "success"; }
					else{ $bg = ""; }
					$date = $row_ticket_refund['refund_date'];
					$yr = explode("-", $date);
					$year1 =$yr[0];
					if($sq_ticket_info['cancel_type'] == 1){
						
						$sq_entry_info = mysqlQuery("select * from ticket_master_entries where ticket_id='$row_ticket_refund[ticket_id]' and status='Cancel'");
						$canc_pass = '';
						while($row_pass = mysqli_fetch_assoc($sq_entry_info)){
							$canc_pass .= $row_pass['first_name'].' '.$row_pass['last_name'].', ';
						}
						$canc_pass = trim($canc_pass, ", ");
						$cancel_type = 'Full ('.$canc_pass.')';
					}
					else if($sq_ticket_info['cancel_type'] == 2){
						$sq_entry_info = mysqlQuery("select * from ticket_master_entries where ticket_id='$row_ticket_refund[ticket_id]' and status='Cancel'");
						$canc_pass = '';
						while($row_pass = mysqli_fetch_assoc($sq_entry_info)){
							$canc_pass .= $row_pass['first_name'].' '.$row_pass['last_name'].', ';
						}
						$canc_pass = trim($canc_pass, ", ");
						$cancel_type = 'Passenger wise ('.$canc_pass.')';
					}
					else if($sq_ticket_info['cancel_type'] == 3){
						$sq_entry_info = mysqlQuery("select * from ticket_trip_entries where ticket_id='$row_ticket_refund[ticket_id]' and status='Cancel'");
						$canc_pass = '';
						while($row_pass = mysqli_fetch_assoc($sq_entry_info)){
							$canc_pass .= $row_pass['departure_city'].' -- '.$row_pass['arrival_city'].', ';
						}
						$canc_pass = trim($canc_pass, ", ");
						$cancel_type = 'Sector wise ('.$canc_pass.')';
					}

					$v_voucher_no = get_ticket_booking_refund_id($row_ticket_refund['refund_id'],$year1);
					$v_refund_date = $row_ticket_refund['refund_date'];
					$v_refund_to = $traveler_name;
					$v_service_name = "Flight Booking";
					$v_refund_amount = $row_ticket_refund['refund_amount'];
					$v_payment_mode = $row_ticket_refund['refund_mode'];
					$customer_id = $sq_ticket_info['customer_id'];
					$refund_id = $row_ticket_refund['refund_id'];
					
					$url = BASE_URL."model/app_settings/generic_refund_voucher_pdf.php?v_voucher_no=$v_voucher_no&v_refund_date=$v_refund_date&v_refund_to=$v_refund_to&v_service_name=$v_service_name&v_refund_amount=$v_refund_amount&v_payment_mode=$v_payment_mode&customer_id=$customer_id&refund_id=$refund_id&cancel_type=$cancel_type&booking_id=$ticket_id";
					$sq_ticket_info1 = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$customer_id'"));
					if($sq_ticket_info1['type']=='Corporate'||$sq_ticket_info1['type'] == 'B2B'){
						$customer_name = $sq_ticket_info1['company_name'];
					}else{
						$customer_name = $sq_ticket_info1['first_name'].' '.$sq_ticket_info1['last_name'];
					}
					?>
					<tr class="<?= $bg;?>">			
						<td><?= $count ?></td>
						<td><?= $customer_name ?></td>
						<td><?= date('d-m-Y', strtotime($row_ticket_refund['refund_date'])) ?></td>
						<td class="text-right"><?= number_format($row_ticket_refund['refund_amount'],2) ?></td>
						<td><?= $row_ticket_refund['refund_mode'] ?></td>
						<td><?= $row_ticket_refund['bank_name'] ?></td>
						<td><?= $row_ticket_refund['transaction_id'] ?></td>
						<td><a href="<?= $url ?>" class="btn btn-danger btn-sm" target="_blank" title="Voucher"><i class="fa fa-file-pdf-o"></i></a></td>
					</tr>
					<?php
				}
				?>
			</tbody>				
			<tfoot>
				<?php 
				$sq_refund_pen_amount = mysqli_fetch_assoc(mysqlQuery("select sum(refund_amount)as sum from ticket_refund_master where ticket_id='$sq_ticket_info[ticket_id]' and clearance_status='Pending'"));
				$sq_refund_can_amount = mysqli_fetch_assoc(mysqlQuery("select sum(refund_amount)as sum from ticket_refund_master where ticket_id='$sq_ticket_info[ticket_id]' and clearance_status='Cancelled'"));
				?>
				<tr class="active">
					<th class="text-right info" colspan="2">Refund : <?= number_format($total_refund,2) ?></th>
					<th class="text-right warning" colspan="2">Pending : <?= ($sq_refund_pen_amount['sum']=="") ? number_format(0,2) : number_format($sq_refund_pen_amount['sum'],2) ?></th>
					<th class="text-right danger" colspan="2">Cancelled : <?= ($sq_refund_can_amount['sum']=="") ? number_format(0,2) : number_format($sq_refund_can_amount['sum'],2); ?></th>
					<th class="text-right success" colspan="2">Total_Refund : <?= number_format(($total_refund - $sq_refund_pen_amount['sum'] - $sq_refund_can_amount['sum']),2) ?></th>
				</tr>
			</tfoot>
		</table>
		</div>
		</div>	
	</div>
	<input type="hidden" id="ref_amt" value="<?= ($total_refund=="") ? 0 : $total_refund ?>">
</div>
<script>
$('#refund_date').datetimepicker({ timepicker:false, format:'d-m-Y' });
$(function(){
	$('#frm_refund_save').validate({
		rules:{
			ticket_id : { required: true },
			refund_amount : { required: true, number:true },
			refund_date : { required: true },
			refund_mode : { required : true },
			bank_name : { required : function(){  if($('#refund_mode').val()!="Cash"){ return true; }else{ return false; }  }  },
			transaction_id : { required : function(){  if($('#refund_mode').val()!="Cash"){ return true; }else{ return false; }  }  }, 
			bank_id : { required : function(){  if($('#refund_mode').val()!="Cash"){ return true; }else{ return false; }  }  }, 
			entry_id: { required : true },    
	},
	submitHandler:function(form){
			
			var ticket_id = $('#ticket_id').val(); 
			var refund_amount = $('#refund_amount').val();
			var refund_date = $('#refund_date').val();
			var refund_mode = $('#refund_mode').val();
			var bank_name = $('#bank_name').val();
			var transaction_id = $('#transaction_id').val();
			var bank_id = $('#bank_id').val();
			var remaining_val = $('#remaining_val').val();

			var entry_id_arr = new Array();
			$('#entry_id option:selected').each(function(){
				entry_id_arr.push($(this).val());
			});

			var base_url = $('#base_url').val();
			if(refund_mode == 'Credit Card'||refund_mode == 'Advance'){
				error_msg_alert("Select valid payment mode");
				return false;
			}
			if(parseFloat(remaining_val) == 0 && parseFloat(refund_amount) > 0){
				error_msg_alert("Refund Already Fully Paid"); return false;
			}
			else if(Number($("#ref_amt").val()) == 0 && Number($('#refund_amount_tobe').val()) == 0){
				error_msg_alert("No Payments Received Yet"); return false;
			}
			else if(Number(refund_amount) > Number(remaining_val))
			{ error_msg_alert("Amount can not be greater than total refund amount"); return false; }
			
			$('#vi_confirm_box').vi_confirm_box({
				message: 'Are you sure?',
				callback: function(data1){
					if(data1=="yes"){

						$('#btn_refund_save').button('loading');

						$.ajax({
						type:'post',
						url: base_url+'controller/visa_passport_ticket/ticket/refund/refund_save.php',
						data:{ ticket_id : ticket_id, refund_amount : refund_amount, refund_date : refund_date, refund_mode : refund_mode, bank_name : bank_name, transaction_id : transaction_id, bank_id : bank_id, entry_id_arr : entry_id_arr },
						success:function(result){
							msg_alert(result);
							content_reflect();
							$('#btn_refund_save').button('reset');
						},
						error:function(result){
							console.log(result.responseText);
						}
						});
					}
				}
			});
	}
});
});
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>