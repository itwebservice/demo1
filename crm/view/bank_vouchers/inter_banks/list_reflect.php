<?php
include "../../../model/model.php";
$emp_id = $_SESSION['emp_id'];
$branch_admin_id = $_SESSION['branch_admin_id'];
$role = $_SESSION['role'];
$role_id = $_SESSION['role_id'];

$branch_status = $_POST['branch_status'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$bank_id = $_POST['bank_id'];
$dbank_id = $_POST['dbank_id'];
$financial_year_id = $_POST['financial_year_id'];

$query = "select * from inter_bank_transfer_master where 1 and delete_status=0 and amount!=0 ";
if ($from_date != "" && $to_date != "") {
	$from_date = get_date_db($from_date);
	$to_date = get_date_db($to_date);

	$query .= " and transaction_date between '$from_date' and '$to_date'";
}
if ($bank_id != "") {
	$query .= " and from_bank_id='$bank_id' ";
}
if ($dbank_id != "") {
	$query .= " and to_bank_id='$dbank_id' ";
}
if ($financial_year_id != "") {
	$query .= " and financial_year_id='$financial_year_id'";
}

include "../../../model/app_settings/branchwise_filteration.php";
$query .= " order by entry_id desc";
?>
<div class="row mg_tp_20">
    <div class="col-md-12 no-pad">
        <div class="table-responsive">

            <table class="table table-hover" id="deposit_table" style="margin: 20px 0 !important;">
                <thead>
                    <tr class="table-heading-row">
                        <th>S_No.</th>
                        <th>Tr_Date</th>
                        <th>Creditor_Bank</th>
                        <th>Debitor_bank</th>
                        <th>Transaction_Type</th>
                        <th>Instrument_NO</th>
                        <th>Instrument_date</th>
                        <th>Lapse_date</th>
                        <th class="text-right">Amount</th>
                        <th>Created_by</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$count = 0;
					$total_amount = 0;
					$sq_withdraw = mysqlQuery($query);
					while ($row_withdraw = mysqli_fetch_assoc($sq_withdraw)) {

						$sq_bank1 = mysqli_fetch_assoc(mysqlQuery("select * from bank_master where bank_id='$row_withdraw[from_bank_id]'"));
						$sq_bank2 = mysqli_fetch_assoc(mysqlQuery("select * from bank_master where bank_id='$row_withdraw[to_bank_id]'"));
						$sq_emp = mysqli_fetch_assoc(mysqlQuery("select first_name,last_name from emp_master where emp_id='$row_withdraw[emp_id]'"));

						$total_amount = $total_amount + $row_withdraw['amount'];

					?>
                    <tr class="<?= $bg ?>">
                        <td><?= $row_withdraw['entry_id'] ?></td>
                        <td><?= get_date_user($row_withdraw['transaction_date']) ?></td>
                        <td><?= $sq_bank1['bank_name'] . '(' . $sq_bank1['branch_name'] . ')' ?></td>
                        <td><?= $sq_bank2['bank_name'] . '(' . $sq_bank2['branch_name'] . ')' ?></td>
                        <td><?= $row_withdraw['transaction_type'] ?></td>
                        <td><?= $row_withdraw['instrument_no'] ?></td>
                        <td><?= get_date_user($row_withdraw['instrument_date']) ?></td>
                        <td><?= get_date_user($row_withdraw['lapse_date']) ?></td>
                        <td class="text-right success"><?= number_format($row_withdraw['amount'], 2) ?></td>
                        <td><?= ($sq_emp['first_name'] != '') ? $sq_emp['first_name'] . ' ' . $sq_emp['last_name'] : 'Admin' ?>
                        </td>
                        <td class="text-center" style="display:flex;">
                            <button class="btn btn-info btn-sm"
                                onclick="update_bank_modal(<?= $row_withdraw['entry_id'] ?>)" title="Update Details" id="iedit-<?= $row_withdraw['entry_id'] ?>"><i
                                    class="fa fa-pencil-square-o"></i></button>
                            <button class="<?= $delete_flag ?> btn btn-danger btn-sm"
                                onclick="inter_delete_entry(<?= $row_withdraw['entry_id'] ?>)" title="Delete Entry"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php
					}
					?>
                </tbody>
                <tfoot>
                    <tr class="active">
                        <th colspan="8"></th>
                        <th class="text-right success">Total : <?= number_format($total_amount, 2) ?></th>
                        <th colspan="2"></th>
                    </tr>
                </tfoot>
            </table>
            <script type="text/javascript">
            $('#deposit_table').dataTable({
                "pagingType": "full_numbers"
            });
            </script>

        </div>
    </div>
</div>