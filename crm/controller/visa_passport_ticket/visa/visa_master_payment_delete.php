<?php
include_once('../../../model/model.php');
include_once('../../../model/visa_password_ticket/visa/visa_payment_master.php');
include_once('../../../model/app_settings/transaction_master.php');
include_once('../../../model/app_settings/bank_cash_book_master.php');
include_once('../../../model/app_settings/deleted_entries_save.php');

$visa_payment_master = new visa_payment_master;
$visa_payment_master->visa_payment_master_delete();
?>