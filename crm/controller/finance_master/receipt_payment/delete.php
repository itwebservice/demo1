<?php 
include_once('../../../model/model.php');
include_once('../../../model/finance_master/receipt_payment/receipt_payment.php');
include_once('../../../model/app_settings/transaction_master.php');
include_once('../../../model/app_settings/bank_cash_book_master.php');
include_once('../../../model/app_settings/deleted_entries_save.php');

$receipt_payment = new receipt_payment;
$receipt_payment->delete();
?>