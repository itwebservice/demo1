<?php
include_once('../../../../model/model.php');
include_once('../../inc/vendor_generic_functions.php');

$estimate_id = $_POST['estimate_id'];

$sq_est_info = mysqli_fetch_assoc(mysqlQuery("select * from vendor_estimate where estimate_id='$estimate_id' and delete_status='0'"));
$vendor = $sq_est_info['vendor_type'];
$vendor_id = $sq_est_info['vendor_type_id'];
$estimate_type = $sq_est_info['estimate_type'];
$estimate_type_id = $sq_est_info['estimate_type_id'];

$sq_payment_info = mysqli_fetch_assoc(mysqlQuery("select sum(payment_amount) as sum from vendor_payment_master where vendor_type='$vendor' and vendor_type_id='$vendor_id' and estimate_type='$estimate_type' and estimate_type_id='$estimate_type_id' and clearance_status!='Pending' and clearance_status!='Cancelled'"));
?>
<form id="frm_estimate">
  <input type="hidden" name="estimate_id" id="estimate_id" value="<?= $estimate_id ?>">

  <div class="modal fade" id="save_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Refund Estimate</h4>
        </div>
        <div class="modal-body">

          <div class="row mg_bt_10">
            <div class="col-md-12">
              <div class="simple_multiple_stat">

                <div class="row">
                  <div class="col-md-12">
                    <div class="col5">
                      Basic Cost<br>
                      <span><?= number_format(floatval($sq_est_info['basic_cost']), 2) ?></span>
                    </div>
                    <!-- <div class="col5">
                      Non-Recoverable Taxes<br>
                      <span><?= number_format(floatval($sq_est_info['non_recoverable_taxes']), 2) ?></span>
                    </div> -->
                    <div class="col5">
                      Service Charge<br>
                      <span><?= number_format(floatval($sq_est_info['service_charge']), 2) ?></span>
                    </div>
                    <!-- <div class="col5">
                      Other Charges<br>
                      <span><?= number_format(floatval($sq_est_info['other_charges']), 2) ?></span>
                    </div> -->
                    <div class="col5">
                      Tax<br>
                      <span><?= $sq_est_info['service_tax_subtotal'] ?></span>
                    </div>
                    <div class="col5">
                      Total<br>
                      <span><strong style="color:#fff;"><?= number_format($sq_est_info['net_total'], 2) ?></strong></span>
                    </div>
                    <div class="col5">
                      Paid Amount<br>
                      <span><strong style="color:#fff;"><?= ($sq_payment_info['sum'] == "") ? number_format(0, 2)  : number_format($sq_payment_info['sum'], 2) ?></strong></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" id="total_sale" name="total_sale" value="<?= $sq_est_info['net_total'] ?>">
          <input type="hidden" id="total_paid" name="total_paid" value="<?= $sq_payment_info['sum'] ?>">
          <hr>
          <?php
          $sq_cancel_count = mysqli_num_rows(mysqlQuery("select * from vendor_estimate where estimate_id='$estimate_id' and status='Cancel' and delete_status='0'"));
          if ($sq_cancel_count > 0) {
            $sq_est_info = mysqli_fetch_assoc(mysqlQuery("select * from vendor_estimate where estimate_id='$estimate_id' and delete_status='0'"));
          ?>
            <div class="row text-center">
              <div class="col-md-3 col-md-offset-3 col-sm-6 col-xs-12 mg_bt_10_xs">
                <input type="text" name="cancel_amount" id="cancel_amount" class="text-right" placeholder="*Cancellation Charges" title="Cancellation Charges" onchange="validate_balance(this.id);calculate_total_refund()" value="<?= $sq_est_info['cancel_amount'] ?>">
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10_xs">
                <?php
                if ($sq_est_info['cancel_est_flag'] == '0') { ?>
                  <input type="text" name="total_refund_amount" id="total_refund_amount" class="amount_feild_highlight text-right" placeholder="Total Refund" title="Total Refund" readonly value="<?= $sq_payment_info['sum'] ?>">
              </div>
            <?php } else {
            ?>
              <input type="text" name="total_refund_amount" id="total_refund_amount" class="amount_feild_highlight text-right" placeholder="Total Refund" title="Total Refund" readonly value="<?= $sq_est_info['total_refund_amount'] ?>">
            <?php
                } ?>
            </div>
            <?php
            if ($sq_est_info['cancel_est_flag'] == '0') { ?>
              <div class="row text-center mg_tp_20">
                <div class="col-md-12">
                  <button id="btn_refund_save" class="btn btn-success" id="btn_est_save"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
</form>

<script>
  $('#save_modal').modal('show');

  function calculate_total_refund() {
    var total_refund_amount = 0;
    var cancel_amount = $('#cancel_amount').val();
    var total_sale = $('#total_sale').val();
    var total_paid = $('#total_paid').val();

    if (cancel_amount == "") {
      cancel_amount = 0;
    }
    if (total_paid == "") {
      total_paid = 0;
    }

    if (parseFloat(cancel_amount) > parseFloat(total_sale)) {
      error_msg_alert("Cancel amount can not be greater than Sale amount");
    }
    var total_refund_amount = parseFloat(total_paid) - parseFloat(cancel_amount);

    if (parseFloat(total_refund_amount) < 0) {
      total_refund_amount = 0;
    }
    $('#total_refund_amount').val(total_refund_amount.toFixed(2));
  }

  $(function() {
    $('#frm_estimate').validate({
      rules: {
        cancel_amount: {
          required: true,
          number: true
        },
        total_refund_amount: {
          required: true,
          number: true
        },
      },
      submitHandler: function(form) {

        $('#btn_est_save').prop('disabled', true);
        var estimate_id = $('#estimate_id').val();
        var cancel_amount = $('#cancel_amount').val();
        var total_refund_amount = $('#total_refund_amount').val();
        var total_sale = $('#total_sale').val();
        var total_paid = $('#total_paid').val();

        if (parseFloat(cancel_amount) > parseFloat(total_sale)) {
          $('#btn_est_save').prop('disabled', false);
          error_msg_alert("Cancel amount can not be greater than Sale Amount");
          return false;
        }

        $('#btn_est_save').button('loading');
        $('#vi_confirm_box').vi_confirm_box({

          callback: function(data1) {

            if (data1 == "yes") {
              $.ajax({
                type: 'post',
                url: base_url() + 'controller/vendor/refund/estimate_update.php',
                data: {
                  estimate_id: estimate_id,
                  cancel_amount: cancel_amount,
                  total_refund_amount: total_refund_amount
                },
                success: function(result) {
                  $('#btn_est_save').button('reset');
                  var msg = result.split('-');
                  if (msg[0] == 'error') {
                    error_msg_alert(result);
                    $('#btn_est_save').prop('disabled', false);
                    return false;
                  } else {
                    success_msg_alert(result);
                    $('#btn_est_save').prop('disabled', false);
                    $('#save_modal').modal('hide');
                    list_reflect();
                  }
                }
              });
            } else {
              $('#btn_est_save').button('reset');
            }
          }
        });
      }
    });
  });
</script>
<script src="<?= BASE_URL ?>js/app/footer_scripts.js"></script>