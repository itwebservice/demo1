<?php
include_once('../../model/model.php');
include_once('../../model/excursion/exc_payment_master.php');
include_once('../../model/app_settings/transaction_master.php');
include_once('../../model/app_settings/bank_cash_book_master.php');
include_once('../../model/app_settings/deleted_entries_save.php');

$exc_payment_master = new exc_payment_master;
$exc_payment_master->exc_payment_master_delete();
?>