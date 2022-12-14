<form id="frm_tab_1">
    <?php include_once('tour_info_sec.php') ?>
    <div class="container-fluid mg_tp_10">
        <div class="">
            <div class="app_panel_content no-pad">
                <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_20">
                    <legend>Tour Details</legend>

                    <div class="row">
                        <input type="hidden" id="whatsapp_switch" value="<?= $whatsapp_switch ?>">
                        <div class="col-sm-4 mg_bt_10_sm_xs">
                            <select class="form-control" style="width:100%" id="cmb_tour_name" name="cmb_tour_name"
                                title="Tour Name"
                                onchange="tour_group_reflect(this.id, false); payment_details_reflected_data('tbl_member_dynamic_row');  seats_availability_reflect(); tour_type_reflect(this.id); "
                                title="Tour Name">
                                <option value="">*Tour Name</option>
                                <?php
                                $sq = mysqlQuery("select tour_id,tour_name from tour_master where active_flag = 'Active' order by tour_name asc");
                                while ($row = mysqli_fetch_assoc($sq)) {
                                    echo "<option value='$row[tour_id]'>" . $row['tour_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-4 mg_bt_10_sm_xs">
                            <select class="form-control" id="cmb_tour_group" Title="Tour Date" name="cmb_tour_group"
                                onchange="seats_availability_reflect(); seats_availability_check();due_date_reflect(); tour_details_reflect(this.id);">
                                <option value="">*Tour Date</option>
                            </select>
                        </div>
                        <div id="div_seats_availability" class="reflect-seats"></div>
                        <div class="col-sm-4 mg_bt_10_sm_xs hidden">
                            <select name="tour_type" id="tour_type" title="Tour Type">

                            </select>
                        </div>
                    </div>

                    <input type="hidden" id="txt_available_seats" name="txt_available_seats">
                    <input type="hidden" id="txt_total_seats1" name="txt_total_seats">
                    <input type="hidden" id="seats_booked" name="seats_booked">
                    <input type="hidden" id="tour_type_r" name="tour_type_r">
                    <input type="hidden" id="operation" name="operation" value='save'>
                </div>
                <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_20">
                    <legend>Customer Details</legend>
                    <?php include_once('personal_info_sec.php') ?>
                </div>

                <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_20">
                    <legend>Passenger Details</legend>
                    <?php include_once('member_info_sec.php') ?>
                </div>

                <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_20">
                    <?php include_once('emergency_contact_info.php') ?>
                </div>

                <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_20">
                    <?php include_once('hoteling_facility_info.php') ?>
                </div>


            </div>
        </div>
        <div class="panel panel-default main_block bg_light pad_8 text-center mg_bt_0"
            style="background-color: #fff; border: none;">
            <button id="proceed_btn" class="btn btn-sm btn-info ico_right">Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
        </div>
    </div>
    </div>
</form>
<script src="../js/tab_1.js"></script>
<script src="../js/tab_1_tour_info_sec.js"></script>

<script>
$(document).ready(function() {
    $("#cmb_tour_name").select2();
});
tour_type_reflect('cmb_tour_name');
</script>