<?php
include "../../../../model/model.php";
$emp_id = $_SESSION['emp_id'];
$role = $_SESSION['role'];
$role_id = $_SESSION['role_id'];
$branch_admin_id = $_SESSION['branch_admin_id'];
$branch_status = $_POST['branch_status'];
$customer_id = $_POST['customer_id'];
$visa_id = $_POST['visa_id'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$cust_type = $_POST['cust_type'];
$company_name = $_POST['company_name'];
$booker_id = $_POST['booker_id'];
$branch_id = $_POST['branch_id'];
$array_s = array();
$temp_arr = array();
$query = "select * from visa_master where 1 and delete_status='0'";
if($customer_id!=""){
$query .= " and customer_id='$customer_id'";
}
if($visa_id!=""){
$query .= " and visa_id='$visa_id'";
}
if($from_date!="" && $to_date!=""){
$from_date = date('Y-m-d', strtotime($from_date));
$to_date = date('Y-m-d', strtotime($to_date));
$query .= " and created_at between '$from_date' and '$to_date'";
}
if($cust_type != ""){
$query .= " and customer_id in (select customer_id from customer_master where type = '$cust_type')";
}
if($company_name != ""){
$query .= " and customer_id in (select customer_id from customer_master where company_name = '$company_name')";
}
if($booker_id!=""){
$query .= " and emp_id='$booker_id'";
}
if($branch_id!=""){
$query .= " and emp_id in(select emp_id from emp_master where branch_id = '$branch_id')";
}
include "../../../../model/app_settings/branchwise_filteration.php";
// $query .= " order by visa_id desc";
$count = 0;
$total_balance=0;
$total_refund=0;		
$cancel_total =0;
$sale_total = 0;
$paid_total = 0;
$balance_total = 0;

$sq_visa = mysqlQuery($query);
while($row_visa = mysqli_fetch_assoc($sq_visa)){

	$pass_count = mysqli_num_rows(mysqlQuery("select * from  visa_master_entries where visa_id='$row_visa[visa_id]'"));
	$cancel_count = mysqli_num_rows(mysqlQuery("select * from  visa_master_entries where visa_id='$row_visa[visa_id]' and status='Cancel'"));
	$bg="";
	if($pass_count==$cancel_count) 	{
		$bg="danger";
	}
	else  {
		$bg="#fff";
	}
	$date = $row_visa['created_at'];
	$yr = explode("-", $date);
	$year = $yr[0];
	$sq_customer_info = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$row_visa[customer_id]'"));
	$contact_no = $encrypt_decrypt->fnDecrypt($sq_customer_info['contact_no'], $secret_key);
	$email_id = $encrypt_decrypt->fnDecrypt($sq_customer_info['email_id'], $secret_key);
	if($sq_customer_info['type']=='Corporate'||$sq_customer_info['type'] == 'B2B'){
		$customer_name = $sq_customer_info['company_name'];
	}else{
		$customer_name = $sq_customer_info['first_name'].' '.$sq_customer_info['last_name'];
	}
	$sq_emp = mysqli_fetch_assoc(mysqlQuery("select * from emp_master where emp_id='$row_visa[emp_id]'"));
	if($sq_emp['first_name'] == '') { $emp_name='Admin';}
	else{ $emp_name = $sq_emp['first_name'].' '.$sq_emp['last_name']; }

	$sq_branch = mysqli_fetch_assoc(mysqlQuery("select * from branches where branch_id='$sq_emp[branch_id]'"));
	$branch_name = $sq_branch['branch_name']==''?'NA':$sq_branch['branch_name'];
	$sq_total_member = mysqli_num_rows(mysqlQuery("select visa_id from visa_master_entries where visa_id = '$row_visa[visa_id]'"));

	$sq_paid_amount = mysqli_fetch_assoc(mysqlQuery("select sum(payment_amount) as sum,sum(credit_charges) as sumc from visa_payment_master where visa_id='$row_visa[visa_id]' and clearance_status!='Pending' and clearance_status!='Cancelled'"));

	$total_sale = $row_visa['visa_total_cost'];
	$cancel_amount = $row_visa['cancel_amount'];
	if($cancel_amount==""){	$cancel_amount=0.00; } 
	$paid_amount = $sq_paid_amount['sum'];
	$total_bal = $total_sale - $cancel_amount;

	if($pass_count == $cancel_count){
		if($paid_amount > 0){
			if($cancel_amount >0){
				if($paid_amount > $cancel_amount){
					$bal = 0;
				}else{
					$bal = $cancel_amount - $paid_amount;
				}
			}else{
			$bal = 0;
			}
		}
		else{
			$bal = $cancel_amount;
		}
	}
	else{
		$bal = $total_sale - $paid_amount;
	}	
	$due_date=get_date_user($row_visa['due_date']);
	$due_date = ($due_date == '') ? 'NA' : $due_date;

	if($paid_amount==""){	$paid_amount=0; }

	//Footer
	$cancel_total = $cancel_total + $cancel_amount;
	$sale_total = $sale_total + $total_bal;
	$paid_total = $paid_total + $paid_amount;
	$balance_total = $balance_total + $bal;

	/////// Purchase ////////
	$total_purchase = 0;
	$purchase_amt = 0;
	$i=0;
	$p_due_date = '';
	$sq_purchase_count = mysqli_num_rows(mysqlQuery("select * from vendor_estimate where status!='Cancel' and estimate_type='Visa Booking' and estimate_type_id='$row_visa[visa_id]' and delete_status='0'"));
	if($sq_purchase_count == 0){  $p_due_date = 'NA'; }
	$sq_purchase = mysqlQuery("select * from vendor_estimate where status!='Cancel' and estimate_type='Visa Booking' and estimate_type_id='$row_visa[visa_id]' and delete_status='0'");
	while($row_purchase = mysqli_fetch_assoc($sq_purchase)){		
		$purchase_amt = $row_purchase['net_total'] - $row_purchase['refund_net_total'];
		$total_purchase = $total_purchase + $purchase_amt;
	}
	$sq_purchase1 = mysqli_fetch_assoc(mysqlQuery("select * from vendor_estimate where status!='Cancel' and estimate_type='Visa Booking' and estimate_type_id='$row_visa[visa_id]' and delete_status='0'"));		
	$vendor_name = get_vendor_name_report($sq_purchase1['vendor_type'], $sq_purchase1['vendor_type_id']);
	if($vendor_name == ''){ $vendor_name1 = 'NA';  }
	else{ $vendor_name1 = $vendor_name; }

	$total_paid = 0;
	$total_paid =  $sq_paid_amount['sum'];  
	$total_paid = ($total_paid == '') ? '0' : $total_paid;

	//Invoice
	$created_at = $row_visa['created_at'];
	$yr = explode("-", $created_at);
	$year =$yr[0];
	$invoice_no = get_visa_booking_id($row_visa['visa_id'],$year);
	$visa_id = $row_visa['visa_id'];
	$invoice_date = date('d-m-Y',strtotime($row_visa['created_at']));
	$customer_id = $row_visa['customer_id'];
	$service_name = "Visa Invoice";
	//**Service Tax
	$taxation_type = $row_visa['taxation_type'];
	$service_tax_per = $row_visa['service_tax'];
	$service_charge = $row_visa['service_charge'];
	$service_tax = $row_visa['service_tax_subtotal'];
	//**Basic Cost
	$basic_cost = $row_visa['visa_issue_amount'] - $row_visa['cancel_amount'];
	$net_amount = $row_visa['visa_total_cost'] - $row_visa['cancel_amount'];
	$balance_amount = $net_amount - $total_paid;
	$credit_card_charges = $sq_paid_amount['sumc'];

	$sq_sac = mysqli_fetch_assoc(mysqlQuery("select * from sac_master where service_name='Visa'"));
	$sac_code = $sq_sac['hsn_sac_code'];
	if($app_invoice_format == 4)
	$url1 = BASE_URL."model/app_settings/print_html/invoice_html/body/tax_invoice_html.php?invoice_no=$invoice_no&invoice_date=$invoice_date&customer_id=$customer_id&service_name=$service_name&basic_cost=$basic_cost&taxation_type=$taxation_type&service_tax_per=$service_tax_per&service_tax=$service_tax&net_amount=$net_amount&service_charge=$service_charge&total_paid=$total_paid&balance_amount=$balance_amount&sac_code=$sac_code&branch_status=$branch_status&visa_id=$visa_id&pass_count=$pass_count&credit_card_charges=$credit_card_charges";
	else
	$url1 = BASE_URL."model/app_settings/print_html/invoice_html/body/visa_body_html.php?invoice_no=$invoice_no&invoice_date=$invoice_date&customer_id=$customer_id&service_name=$service_name&basic_cost=$basic_cost&taxation_type=$taxation_type&service_tax_per=$service_tax_per&service_tax=$service_tax&net_amount=$net_amount&service_charge=$service_charge&total_paid=$total_paid&balance_amount=$balance_amount&sac_code=$sac_code&branch_status=$branch_status&visa_id=$visa_id&credit_card_charges=$credit_card_charges";

	//Service Tax and Markup Tax
	$service_tax_amount = 0;
	if($row_visa['service_tax_subtotal'] !== 0.00 && ($row_visa['service_tax_subtotal']) !== ''){
		$service_tax_subtotal1 = explode(',',$row_visa['service_tax_subtotal']);
		for($i=0;$i<sizeof($service_tax_subtotal1);$i++){
		$service_tax = explode(':',$service_tax_subtotal1[$i]);
		$service_tax_amount +=  $service_tax[2];
		}
	}
	$markupservice_tax_amount = 0;
	if($row_visa['markup_tax'] !== 0.00 && $row_visa['markup_tax'] !== ""){
		$service_tax_markup1 = explode(',',$row_visa['markup_tax']);
		for($i=0;$i<sizeof($service_tax_markup1);$i++){
			$service_tax = explode(':',$service_tax_markup1[$i]);
			$markupservice_tax_amount += $service_tax[2];
		}
	}
	$sq_incentive = mysqli_fetch_assoc(mysqlQuery("select * from booker_sales_incentive where booking_id='$row_visa[visa_id]' and service_type='Visa Booking'"));
	$temp_arr = array( "data" => array(

		(int)(++$count),
		get_visa_booking_id($row_visa['visa_id'],$year),
		$customer_name,
		$contact_no,
		$email_id,
		$sq_total_member,
		get_date_user($row_visa['created_at']),
		'<button class="btn btn-info btn-sm" onclick="visa_view_modal('. $row_visa['visa_id'] .')" data-toggle="tooltip" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></button>',
		number_format($row_visa['visa_issue_amount'],2),
		number_format($row_visa['service_charge']+$row_visa['markup'],2),
		number_format($service_tax_amount+$markupservice_tax_amount,2),
		number_format($sq_paid_amount['sumc'],2),
		number_format($total_sale,2),
		number_format($cancel_amount, 2),
		number_format($total_bal, 2),
		number_format($paid_amount, 2),
		'<button class="btn btn-info btn-sm" onclick="payment_view_modal('.$row_visa['visa_id'] .')"  data-toggle="tooltip" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></button>',
		number_format($bal, 2),
		$due_date,
		number_format($total_purchase,2),
		'<button class="btn btn-info btn-sm" onclick="supplier_view_modal('. $row_visa['visa_id'] .')" data-toggle="tooltip" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></button>',
		$branch_name,
		$emp_name,
		number_format($sq_incentive['incentive_amount'],2),
		), "bg" =>$bg);
		array_push($array_s,$temp_arr);
}

$footer_data = array("footer_data" => array(
	'total_footers' => 5,
	'foot0' => "",
	'col0' =>10,
	'class0' =>"",
	
	'foot1' => "TOTAL CANCEL : ".number_format($cancel_total,2),
	'col1' => 2,
	'class1' =>"danger text-right",

	'foot2' => "TOTAL SALE : ".number_format($sale_total,2),
	'col2' => 2,
	'class2' =>"info text-right",

	'foot3' => "TOTAL PAID : ".number_format($paid_total,2),
	'col3' => 2,
	'class3' =>"success text-right",

	'foot4' => "TOTAL BALANCE : ".number_format($balance_total,2),
	'col4' => 2,
	'class4' =>"warning text-right",

	'foot5' => "",
	'col5' => 4,
	'class5' =>""

	)
);
array_push($array_s, $footer_data);
echo json_encode($array_s);
?>