<?php
include_once "../../../../../../model/model.php";
$tour_id = $_POST['tour_id'];
$tour_group_id = $_POST['tour_group_id'];

$sq_pount = mysqli_num_rows(mysqlQuery("select * from vendor_estimate where estimate_type='Group Tour' and estimate_type_id ='$tour_group_id' and status!='Cancel'"));
$sq_count = mysqli_num_rows(mysqlQuery("select * from group_tour_estimate_expense where tour_id='$tour_id' and tour_group_id ='$tour_group_id'"));
?>
 
<div class="modal fade" id="group_tour_expense_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title text-left" id="myModalLabel">Purchase/Expenses Details</h4>
	        </div>
      		<div class="modal-body profile_box_padding">
            <?php if($sq_pount!=0){ ?>
                <div class="row"> <div class="col-md-12"> <div class="table-responsive">
                <h3 class="editor_title">Purchase History</h3>
                    <table class="table table-bordered no-marg">
                        <thead>
                            <tr class="active table-heading-row">
                                <th>S_No.</th>
                                <th>Purchase_date</th>
                                <th>Supplier_type</th>
                                <th>Supplier_name</th>
                                <th>Purchase_amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $count = 1;
                        $sq_query = mysqlQuery("select * from vendor_estimate where estimate_type='Group Tour' and estimate_type_id ='$tour_group_id' and status!='Cancel'");
                        while($row_query = mysqli_fetch_assoc($sq_query)){	
                            if($row_query['net_total'] != '0'){
                                $vendor_name = get_vendor_name_report($row_query['vendor_type'],$row_query['vendor_type_id']);
                                //Service Tax 
                                $service_tax_amount = 0;
                                if($row_query['service_tax_subtotal'] !== 0.00 && ($row_query['service_tax_subtotal']) !== ''){
                                  $service_tax_subtotal1 = explode(',',$row_query['service_tax_subtotal']);
                                  for($i=0;$i<sizeof($service_tax_subtotal1);$i++){
                                  $service_tax = explode(':',$service_tax_subtotal1[$i]);
                                  $service_tax_amount +=  $service_tax[2];
                                  }
                                }
                            ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= get_date_user($row_query['purchase_date']) ?></td>
                                    <td><?= $row_query['vendor_type'] ?></td>
                                    <td><?= $vendor_name ?></td>
                                    <td><?= number_format($row_query['net_total']-$service_tax_amount,2) ?></td>
                                </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>

                </div></div></div>
            <?php } if($sq_count!=0){ ?>
            <div class="row mg_tp_20">
            <div class="col-md-12">
            <h3 class="editor_title">Other Expense</h3>
              <table class="table table-bordered no-marg">
                    <thead>
                        <tr class="active table-heading-row">
                            <th>S_No.</th>
                            <th>Expense_Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $count = 1;
                    $sq_query = mysqlQuery("select * from group_tour_estimate_expense where tour_id='$tour_id' and tour_group_id ='$tour_group_id'");
                    while($sq_other_purchase = mysqli_fetch_assoc($sq_query)){	
                        if($sq_other_purchase['amount'] != '0'){
                        ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $sq_other_purchase['expense_name']  ?></td>
                                <td><?= $sq_other_purchase['amount'] ?></td>
                            </tr>
                        <?php } 
                    } ?>
                    </tbody>
                </table>
                </div> </div>
                <?php }?>
	    	</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $('#group_tour_expense_modal').modal('show');
</script>