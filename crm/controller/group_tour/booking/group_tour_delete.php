<?php
include "../../../model/model.php";
include "../../../model/group_tour/booking/booking_save.php";
include "../../../model/group_tour/booking_payment.php";
include "../../../model/group_tour/booking/booking_save_transaction.php";
include_once('../../../model/app_settings/transaction_master.php');
include_once('../../../model/app_settings/bank_cash_book_master.php');
include_once('../../../model/app_settings/deleted_entries_save.php');


$booking_save = new booking_save_transaction();
$booking_save->complete_booking_information_delete();
?>