<?php
include "../../../../model/model.php";
$role = $_SESSION['role'];
$role_id = $_SESSION['role_id'];
$branch_admin_id = $_SESSION['branch_admin_id'];
$emp_id = $_SESSION['emp_id'];
$branch_status = $_POST['branch_status'];
?>
<input type="hidden" id="whatsapp_switch"  value="<?= $whatsapp_switch ?>" >
<div class="row text-right mg_bt_20">
	<div class="col-md-12">
		<button class="btn btn-excel btn-sm" onclick="excel_report()" data-toggle="tooltip" title="Generate Excel"><i class="fa fa-file-excel-o"></i></button>
		<button class="btn btn-info btn-sm ico_left" data-toggle="modal" data-target="#train_ticket_payment_save_modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Receipt</button>
	</div>
</div>
<?php include_once('save_payment_modal.php'); ?>

<div class="app_panel_content Filter-panel">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
		        <select name="cust_type_filter" id="cust_type_filter" style="width:100%" onchange="dynamic_customer_load(this.value,'company_filter');company_name_reflect();" title="Customer Type">
		            <?php get_customer_type_dropdown(); ?>
		            
		            
					
		        </select>
	    </div>
	    <div id="company_div" class="hidden">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10" id="customer_div">    
	    </div> 
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<select name="train_ticket_id_filter" id="train_ticket_id_filter" style="width:100%" title="Booking ID">
		        <option value="">Booking ID</option>
		        <?php 
		        $query = "select * from train_ticket_master where 1 and delete_status='0' ";
		        include "../../../../model/app_settings/branchwise_filteration.php";
		        $query .= " order by train_ticket_id desc ";
		        $sq_ticket = mysqlQuery($query);
		        while($row_ticket = mysqli_fetch_assoc($sq_ticket)){

		        	 $date = $row_ticket['created_at'];
                      $yr = explode("-", $date);
                      $year =$yr[0];
		          $sq_customer = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$row_ticket[customer_id]'"));
		          ?>
		          <option value="<?= $row_ticket['train_ticket_id'] ?>"><?= get_train_ticket_booking_id($row_ticket['train_ticket_id'],$year).' : '.$sq_customer['first_name'].' '.$sq_customer['last_name'] ?></option>
		          <?php
		        }
		        ?>
		    </select>
		</div>	
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<select name="payment_mode_filter" id="payment_mode_filter" class="form-control" title="Mode">
				<?php get_payment_mode_dropdown(); ?>
			</select>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10 hidden">
			<select name="financial_year_id_filter" id="financial_year_id_filter" title="Financial Year">
				<?php get_financial_year_dropdown(); ?>
			</select>
		</div>	
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<input type="text" id="payment_from_date_filter" name="payment_from_date_filter" placeholder="From Date" title="From Date" onchange="get_to_date(this.id,'payment_to_date_filter');">
		</div>
			<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<input type="text" id="payment_to_date_filter" name="payment_to_date_filter" placeholder="To Date" title="To Date"onchange="validate_validDate('payment_from_date_filter','payment_to_date_filter')">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10">
			<button class="btn btn-sm btn-info ico_right" onclick="train_ticket_payment_list_reflect();bank_receipt()">Proceed&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
		</div>	
	</div>
</div>

<div id="div_train_ticket_payment_list" class="main_block mg_tp_10">
<div class="table-responsive">
        <table id="hotel_r_book" class="table table-hover" style="margin: 20px 0 !important;">         
        </table>
    </div>
</div>
<div id="div_train_ticket_payment_update"></div>
<div id="receipt_data"></div>

<script>
$('#payment_from_date_filter, #payment_to_date_filter').datetimepicker({ timepicker:false, format:'d-m-Y' });
$('#customer_id_filter, #train_ticket_id_filter,#cust_type_filter').select2();
dynamic_customer_load('','');
var columns = [
	{ title : "S_No"},
	{ title : " "},
	{ title : "Receipt_ID"},
	{ title : "Booking_ID"},
	{ title : "Customer_Name"},
	{ title : "Receipt_Date"},
	{ title : "Mode"},
	{ title : "Branch_Name"},
	{ title : "Amount", className : "success"},
	{ title : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", className : "text-center"},
];
function train_ticket_payment_list_reflect()
{
	var customer_id = $('#customer_id_filter').val();
	var train_ticket_id = $('#train_ticket_id_filter').val();
	var payment_mode = $('#payment_mode_filter').val();
	var financial_year_id = $('#financial_year_id_filter').val();
	var payment_from_date = $('#payment_from_date_filter').val();
	var payment_to_date = $('#payment_to_date_filter').val();
	var cust_type = $('#cust_type_filter').val();
	var company_name = $('#company_filter').val();
	var branch_status = $('#branch_status').val();
	$.post('payment/ticket_payment_list_reflect.php', { customer_id : customer_id, train_ticket_id : train_ticket_id, payment_mode : payment_mode, financial_year_id : financial_year_id, payment_from_date : payment_from_date, payment_to_date : payment_to_date, cust_type : cust_type, company_name : company_name, branch_status : branch_status  }, function(data){
		//$('#div_train_ticket_payment_list').html(data);
		pagination_load(data,columns,true,true,10,'hotel_r_book',true);
	});
}
train_ticket_payment_list_reflect();
$(document).ready(function () {
	$("[data-toggle='tooltip']").tooltip({placement: 'bottom'});
	$("[data-toggle='tooltip']").click(function(){$('.tooltip').remove()})
});
function train_ticket_payment_update_modal(payment_id)
{
    $('#updater_btn-'+payment_id).prop('disabled',true);
    var branch_status = $('#branch_status').val();
    $('#updater_btn-' + payment_id).button('loading');
	$.post('payment/ticket_payment_update_modal.php', { payment_id : payment_id, branch_status : branch_status  }, function(data){
		$('#div_train_ticket_payment_update').html(data);
    	$('#updater_btn-'+payment_id).prop('disabled',false);
    	$('#updater_btn-'+payment_id).button('reset');
	});
}

function excel_report()
{
	var customer_id = $('#customer_id_filter').val();
	var train_ticket_id = $('#train_ticket_id_filter').val();
	var payment_from_date = $('#payment_from_date_filter').val();
	var payment_to_date = $('#payment_to_date_filter').val();
	var payment_mode = $('#payment_mode_filter').val();
	var financial_year_id = $('#financial_year_id_filter').val();
	var cust_type = $('#cust_type_filter').val();
	var company_name = $('#company_filter').val();
	var branch_status = $('#branch_status').val();
	window.location = 'payment/excel_report.php?customer_id='+customer_id+'&train_ticket_id='+train_ticket_id+'&payment_from_date='+payment_from_date+'&payment_to_date='+payment_to_date+'&payment_mode='+payment_mode+'&financial_year_id='+financial_year_id+'&cust_type='+cust_type+'&company_name='+company_name+'&branch_status='+branch_status;
}
function bank_receipt(){
	var payment_mode = $('#payment_mode_filter').val();
	var base_url = $('#base_url').val();
	$.post(base_url+'view/hotels/booking/payment/bank_receipt_generate.php',{payment_mode : payment_mode}, function(data){
		$('#receipt_data').html(data);
	});
}
function whatsapp_send_r(booking_id, payment_amount, base_url){
	$.post(base_url+'controller/visa_passport_ticket/train_ticket/receipt_whatsapp_send.php',{booking_id:booking_id, payment_amount:payment_amount}, function(data){
		console.log(data)
		window.open(data);
	});
}
function delete_entry(payment_id)
{
	$('#vi_confirm_box').vi_confirm_box({
		callback: function(data1){
			if(data1=="yes"){
				var branch_status = $('#branch_status').val();
				var base_url = $('#base_url').val();
				$.post(base_url+'controller/visa_passport_ticket/train_ticket/ticket_master_payment_delete.php',{ payment_id : payment_id }, function(data){
					success_msg_alert(data);
					train_ticket_payment_list_reflect();
				});
			}
		}
	});
}
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>