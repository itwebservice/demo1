<?php
include "../../../../../model/model.php";
include_once('../../../../layouts/fullwidth_app_header.php');

$ticket_id = $_POST['ticket_id'];
$branch_status = $_POST['branch_status'];

$sq_ticket = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master where ticket_id='$ticket_id' and delete_status='0'"));
$reflections = json_decode($sq_ticket['reflections']);
?>
<input type="hidden" id="ticket_id" name="ticket_id" value="<?= $sq_ticket['ticket_id'] ?>">
<input type="hidden" id="booking_id" name="booking_id" value="<?= $ticket_id ?>">
<input type="hidden" id="flight_sc" name="flight_sc" value="<?php echo $reflections[0]->flight_sc ?>">
<input type="hidden" id="flight_markup" name="flight_markup" value="<?php echo $reflections[0]->flight_markup ?>">
<input type="hidden" id="flight_taxes" name="flight_taxes" value="<?php echo $reflections[0]->flight_taxes ?>">
<input type="hidden" id="flight_markup_taxes" name="flight_markup_taxes" value="<?php echo $reflections[0]->flight_markup_taxes ?>">
<input type="hidden" id="flight_tds" name="flight_tds" value="<?php echo $reflections[0]->flight_tds ?>">

<div class="bk_tab_head bg_light">
    <ul> 
        <li>
            <a href="javascript:void(0)" id="tab_1_head" class="active">
                <span class="num" title="Customer Details">1<i class="fa fa-check"></i></span><br>
                <span class="text">Customer Details</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" id="tab_3_head">
                <span class="num" title="Costing">2<i class="fa fa-check"></i></span><br>
                <span class="text">Costing</span>
            </a>
        </li>
    </ul>
</div>

<script src="<?php echo BASE_URL ?>view/visa_passport_ticket/js/ticket.js"></script>
<script src="<?php echo BASE_URL ?>view/visa_passport_ticket/js/ticket_calculation.js"></script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>
<script src="<?php echo BASE_URL ?>js/app/field_validation.js"></script>

<div class="bk_tabs">
    <div id="tab1" class="bk_tab active">
        <?php include_once("tab1.php"); ?>  
    </div>
    <div id="tab3" class="bk_tab">
        <?php include_once("tab3.php"); ?>   
    </div>
</div>

<script>
$('#customer_id').select2();
$('#ticket_date1').datetimepicker({ timepicker:false, format:'d-m-Y' });
$('#payment_date, #due_date, #birth_date1,#booking_date1').datetimepicker({ timepicker:false, format:'d-m-Y' });
</script>
<?php
include_once('../../../../layouts/fullwidth_app_footer.php');
?> 