<?php
include "../../../model/model.php";
$financial_year_id = $_SESSION['financial_year_id'];
$booking_id = $_POST['booking_id'];

$query = mysqli_fetch_assoc(mysqlQuery("select max(booking_id) as booking_id,net_total as net_total from package_tour_booking_master where financial_year_id='$financial_year_id' and delete_status='0'"));
$query_package = "select * from package_tour_booking_master where 1 and delete_status='0' ";
$query_payment = "select * from package_payment_master where 1 and delete_status='0' ";

if($booking_id != ''){
  $sq_entry = mysqlQuery("select * from package_travelers_details where booking_id='$booking_id'");
  $query_package .= " and booking_id = '$booking_id'";
  $query_payment .= " and booking_id = '$booking_id'";
}
else{
  $sq_entry = mysqlQuery("select * from package_travelers_details where booking_id='$query[booking_id]'");
  $query_package .= " and booking_id = '$query[booking_id]'";
  $query_payment .= " and booking_id = '$query[booking_id]'";
}
$sq_package = mysqli_fetch_assoc(mysqlQuery($query_package));
$sq_payment = mysqlQuery($query_payment);
?>
<div id="id_proof1"></div>
<div class="col-md-7 col-sm-8 col-md-pull-3">
  <span class="tour_concern" style="margin-right: 30px;"><label>TOUR NAME  </label><em>:</em><?php echo $sq_package['tour_name']; ?></span>
  <span class="tour_concern"><label>mobile no </label><em>:</em><?php echo $sq_package['mobile_no']; ?></span>
</div>
<div class="col-md-12 mg_tp_10">
      <div class="dashboard_table_body main_block">
        <div class="col-sm-9 no-pad table_verflow table_verflow_two"> 
          <div class="table-responsive no-marg-sm">
            <table class="table table-hover" style="margin: 0 !important;border: 0;padding: 0 !important;">
              <thead>
                <tr class="table-heading-row">
                  <th>S_No.</th>
                  <th>Passenger_Name</th>
                  <th>BIRTH_DATE</th>
                  <th>AGE</th>
                  <th>ID_Proof</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              while($row_entry = mysqli_fetch_assoc($sq_entry)){
                if($row_entry['status']=="Cancel"){
                  $bg="danger";	}
                else {
                  $bg="#fff";	}
                $count++;
              ?>
                <tr class="<?= $bg ?>">
                    <td><?php echo $count ?></td>
                    <td><?php echo $row_entry['m_honorific'].' '.$row_entry['first_name']." ".$row_entry['last_name']; ?></td>
                    <td><?php echo get_date_user($row_entry['birth_date']); ?></td>
                    <td><?php echo $row_entry['age']; ?></td>
                    <td>
                      <button class="btn btn-info btn-sm" title="ID Proof" id="id-proof-<?= $count ?>" onclick="display_package_id_proof('<?php echo $row_entry['id_proof_url']; ?>','<?php echo $row_entry['pan_card_url']; ?>','<?php echo $row_entry['pan_card_url3']; ?>','<?php echo $row_entry['pan_card_url4']; ?>')"><i class="fa fa-id-card-o"></i></button>
                    </td>
                </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div> 
        </div>
        <?php        
        $queryp = mysqli_fetch_assoc(mysqlQuery("SELECT sum(amount) as sum,sum(credit_charges) as sumc from package_payment_master where booking_id='$booking_id' and clearance_status != 'Pending' and clearance_status != 'Cancelled'"));
        $paid_amount = $queryp['sum'] + $queryp['sumc'];
        $paid_amount = ($paid_amount == '')?'0':$paid_amount;
        $sale_total_amount = $sq_package['net_total'] + $queryp['sumc'];
        if($sale_total_amount==""){ $sale_total_amount = 0 ;  }
        $cancel_est=mysqli_fetch_assoc(mysqlQuery("select * from package_refund_traveler_estimate where booking_id='$booking_id'"));
        $cancel_amount = $cancel_est['cancel_amount'];
        
        if ($cancel_amount != '') {
          if ($cancel_amount <= $paid_amount) {
            $balance_amount = 0;
          } else {
            $balance_amount =  $cancel_amount - $paid_amount + $queryp['sumc'];
          }
        } else {
          $cancel_amount = ($cancel_amount == '') ? '0' : $cancel_amount;
          $balance_amount = $sale_total_amount - $paid_amount;
        }
        ?>
        <div class="col-sm-3 no-pad">
          <div class="table_side_widget_panel main_block">
            <div class="table_side_widget_content main_block">
              <div class="col-xs-12" style="border-bottom: 1px solid hsla(180, 100%, 30%, 0.25)">
                <div class="table_side_widget">
                  <div class="table_side_widget_amount"><?php echo number_format($sale_total_amount,2); ?></div>
                  <div class="table_side_widget_text widget_blue_text">Total Amount</div>
                </div>
              </div>
              <div class="col-xs-12" style="border-bottom: 1px solid hsla(180, 100%, 30%, 0.25)">
                <div class="table_side_widget">
                  <div class="table_side_widget_amount"><?php echo number_format(($paid_amount),2); ?></div>
                  <div class="table_side_widget_text widget_green_text">Total Paid</div>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="table_side_widget">
                  <div class="table_side_widget_amount"><?php echo number_format($balance_amount,2); ?></div>
                  <div class="table_side_widget_text widget_red_text">Total Balance</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
<script type="text/javascript">
function display_package_id_proof(id_proof_url,pan_card_url,pan_card_url3,pan_card_url4){
  
    $('id-proof'+count).button('loading');
    $('id-proof'+count).button('disabled','true');
    $.post('admin/id_proof/package_booking_id.php', { id_proof_url : id_proof_url,pan_card_url : pan_card_url, pan_card_url3 : pan_card_url3 ,pan_card_url4 : pan_card_url4 }, function(data){
      $('#id_proof1').html(data);
      $('id-proof'+count).button('reset');
      $('id-proof'+count).button('disabled','false');
  });
}
</script>