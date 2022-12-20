<?php
include "../../../../model/model.php";

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once '../../../../classes/PHPExcel-1.8/Classes/PHPExcel.php';

//This function generates the background color
function cellColor($cells, $color)
{
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => $color
        )
    ));
}

//This array sets the font atrributes
$header_style_Array = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 12,
        'name'  => 'Verdana'
    )
);
$table_header_style_Array = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000000'),
        'size'  => 11,
        'name'  => 'Verdana'
    )
);
$content_style_Array = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000000'),
        'size'  => 9,
        'name'  => 'Verdana'
    )
);

//This is border array
$borderArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    )
);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");


//////////////////////////****************Content start**************////////////////////////////////
$emp_id = $_SESSION['emp_id'];
$role = $_SESSION['role'];
$role_id = $_SESSION['role_id'];
$branch_admin_id = $_SESSION['branch_admin_id'];
$financial_year_id = $_SESSION['financial_year_id'];
$branch_status = $_GET['branch_status'];
$customer_id = $_GET['customer_id'];
$visa_id = $_GET['visa_id'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$cust_type = $_GET['cust_type'];
$company_name = $_GET['company_name'];
$sql_booking_date = mysqli_fetch_assoc(mysqlQuery("select * from visa_master where visa_id = '$visa_id' and delete_status='0'"));
$booking_date = $sql_booking_date['created_at'];
$yr = explode("-", $booking_date);
$year = $yr[0];
if ($customer_id != "") {
    $sq_customer_info = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$customer_id'"));
    if ($sq_customer_info['type'] == 'Corporate' || $sq_customer_info['type'] == 'B2B') {
        $cust_name = $sq_customer_info['company_name'];
    } else {
        $cust_name = $sq_customer_info['first_name'] . ' ' . $sq_customer_info['last_name'];
    }
} else {
    $cust_name = "";
}

$invoice_id = ($visa_id != "") ? get_visa_booking_id($visa_id, $year) : "";

if ($from_date != "" && $to_date != "") {
    $date_str = $from_date . ' to ' . $to_date;
} else {
    $date_str = "";
}

if ($company_name == 'undefined') {
    $company_name = '';
}

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B2', 'Report Name')
    ->setCellValue('C2', 'Visa Booking')
    ->setCellValue('B3', 'Booking ID')
    ->setCellValue('C3', $invoice_id)
    ->setCellValue('B4', 'Customer')
    ->setCellValue('C4', $cust_name)
    ->setCellValue('B5', 'From-To Date')
    ->setCellValue('C5', $date_str)
    ->setCellValue('B5', 'From-To Date')
    ->setCellValue('C5', $date_str)
    ->setCellValue('B6', 'Customer Type')
    ->setCellValue('C6', $cust_type)
    ->setCellValue('B7', 'Company Name')
    ->setCellValue('C7', $company_name);

$objPHPExcel->getActiveSheet()->getStyle('B2:C2')->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B2:C2')->applyFromArray($borderArray);

$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->applyFromArray($borderArray);

$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->applyFromArray($borderArray);

$objPHPExcel->getActiveSheet()->getStyle('B5:C5')->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B5:C5')->applyFromArray($borderArray);

$objPHPExcel->getActiveSheet()->getStyle('B6:C6')->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B6:C6')->applyFromArray($borderArray);

$objPHPExcel->getActiveSheet()->getStyle('B7:C7')->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B7:C7')->applyFromArray($borderArray);

$count = 0;
$booking_amount = 0;
$cancelled_amount = 0;
$total_amount = 0;
$row_count = 9;

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B' . $row_count, "Invoice No")
    ->setCellValue('C' . $row_count, "Booking ID")
    ->setCellValue('D' . $row_count, "Customer Name")
    ->setCellValue('E' . $row_count, "Mobile")
    ->setCellValue('F' . $row_count, "Total_PAX")
    ->setCellValue('G' . $row_count, "Amount")
    ->setCellValue('H' . $row_count, "Cncl_Amount")
    ->setCellValue('I' . $row_count, "Total")
    ->setCellValue('J' . $row_count, "Paid Total")
    ->setCellValue('K' . $row_count, "Created By");
$objPHPExcel->getActiveSheet()->getStyle('B' . $row_count . ':K' . $row_count)->applyFromArray($header_style_Array);
$objPHPExcel->getActiveSheet()->getStyle('B' . $row_count . ':K' . $row_count)->applyFromArray($borderArray);

$row_count++;
$query = "select * from visa_master where financial_year_id='$financial_year_id' and delete_status='0' ";
if ($customer_id != "") {
    $query .= " and customer_id='$customer_id'";
}
if ($visa_id != "") {
    $query .= " and visa_id='$visa_id'";
}
if ($from_date != "" && $to_date != "") {
    $from_date = date('Y-m-d', strtotime($from_date));
    $to_date = date('Y-m-d', strtotime($to_date));
    $query .= " and created_at between '$from_date' and '$to_date'";
}
if ($company_name != "") {
    $query .= " and customer_id in (select customer_id from customer_master where company_name = '$company_name')";
}
if ($cust_type != "") {
    $query .= " and customer_id in (select customer_id from customer_master where type = '$cust_type')";
}
if ($branch_status == 'yes') {
    if ($role == 'Branch Admin' || $role == 'Accountant' || $role_id > '7') {
        $query .= " and branch_admin_id = '$branch_admin_id'";
    } elseif ($role != 'Admin' && $role != 'Branch Admin' && $role_id != '7' && $role_id < '7') {
        $query .= " and emp_id='$emp_id' and branch_admin_id = '$branch_admin_id'";
    }
} elseif ($role != 'Admin' && $role != 'Branch Admin' && $role_id != '7' && $role_id < '7') {
    $query .= " and emp_id='$emp_id'";
}
$sq_visa = mysqlQuery($query);
while ($row_visa = mysqli_fetch_assoc($sq_visa)) {
    $sq_emp =  mysqli_fetch_assoc(mysqlQuery("select * from emp_master where emp_id = '$row_visa[emp_id]'"));
    $emp_name = ($row_visa['emp_id'] != 0) ? $sq_emp['first_name'] . ' ' . $sq_emp['last_name'] : 'Admin';

    $customer_info = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id = '$row_visa[customer_id]'"));
    $contact_no = $encrypt_decrypt->fnDecrypt($customer_info['contact_no'], $secret_key);
    if ($customer_info['type'] == 'Corporate' || $customer_info['type'] == 'B2B') {
        $customer_name = $customer_info['company_name'];
    } else {
        $customer_name = $customer_info['first_name'] . ' ' . $customer_info['last_name'];
    }

    $date = $row_visa['created_at'];
    $yr = explode("-", $date);
    $year = $yr[0];
    //Get Total no of visa members
    $sq_total_member = mysqli_num_rows(mysqlQuery("select visa_id from visa_master_entries where visa_id='$row_visa[visa_id]' AND status!='Cancel'"));

    //Get Total visa cost
    $sq_visa_total_cost = mysqli_fetch_array(mysqlQuery("select * from visa_master where visa_id='$row_visa[visa_id]' and delete_status='0'"));
    $visa_total_amount = $sq_visa_total_cost['visa_total_cost'];
    $sq_paid_amount = mysqli_fetch_assoc(mysqlQuery("SELECT sum(`credit_charges`) as sumc from visa_payment_master where visa_id='$row_visa[visa_id]' and clearance_status!='Pending' and clearance_status!='Cancelled'"));
    $credit_card_charges = $sq_paid_amount['sumc'];

    $visa_total_amount = $visa_total_amount + $credit_card_charges;
    //Get total refund amount
    $cancel_amount = $row_visa['cancel_amount'];
    if ($cancel_amount == "") {
        $cancel_amount = 0;
    }

    $total_visa_amount = $visa_total_amount - $cancel_amount;

    //calculate total amounts
    $booking_amount = $booking_amount + $visa_total_amount;
    $cancelled_amount = $cancelled_amount + $cancel_amount;
    $total_amount = $total_amount + $total_visa_amount;

    //Currency conversion
    $currency_amount1 = currency_conversion($currency, $row_visa['currency_code'], $total_visa_amount);
    if ($row_visa['currency_code'] != '0' && $currency != $row_visa['currency_code']) {
        $currency_amount = ' (' . $currency_amount1 . ')';
    } else {
        $currency_amount = '';
    }

    //Paid
    $query = mysqli_fetch_assoc(mysqlQuery("SELECT sum(payment_amount) as sum,sum(credit_charges) as sumc from visa_payment_master where visa_id='$row_visa[visa_id]' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
    $paid_amount = $query['sum'] + $query['sumc'];
    $paid_amount = ($paid_amount == '') ? '0' : $paid_amount;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B' . $row_count, $row_visa['invoice_pr_id'])
        ->setCellValue('C' . $row_count, get_visa_booking_id($row_visa['visa_id'], $year))
        ->setCellValue('D' . $row_count, $customer_name)
        ->setCellValue('E' . $row_count, $contact_no)
        ->setCellValue('F' . $row_count, $sq_total_member)
        ->setCellValue('G' . $row_count, number_format($visa_total_amount, 2))
        ->setCellValue('H' . $row_count, number_format($cancel_amount, 2))
        ->setCellValue('I' . $row_count, number_format($total_visa_amount, 2) . $currency_amount)
        ->setCellValue('J' . $row_count, $paid_amount)
        ->setCellValue('K' . $row_count, $emp_name);
    $objPHPExcel->getActiveSheet()->getStyle('B' . $row_count . ':K' . $row_count)->applyFromArray($content_style_Array);
    $objPHPExcel->getActiveSheet()->getStyle('B' . $row_count . ':K' . $row_count)->applyFromArray($borderArray);

    $row_count++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B' . $row_count, "")
        ->setCellValue('C' . $row_count, "")
        ->setCellValue('D' . $row_count, "")
        ->setCellValue('E' . $row_count, "")
        ->setCellValue('F' . $row_count, "Total")
        ->setCellValue('G' . $row_count, number_format($booking_amount, 2))
        ->setCellValue('H' . $row_count, number_format($cancelled_amount, 2))
        ->setCellValue('I' . $row_count, number_format($total_amount, 2))
        ->setCellValue('J' . $row_count, '')
        ->setCellValue('K' . $row_count, '');

    $objPHPExcel->getActiveSheet()->getStyle('B' . $row_count . ':K' . $row_count)->applyFromArray($header_style_Array);
    $objPHPExcel->getActiveSheet()->getStyle('B' . $row_count . ':K' . $row_count)->applyFromArray($borderArray);
}
//////////////////////////****************Content End**************////////////////////////////////

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


for ($col = 'A'; $col !== 'N'; $col++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="VisaBooking(' . date('d-m-Y H:i') . ').xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
