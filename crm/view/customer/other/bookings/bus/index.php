<?php
include "../../../../../model/model.php";
?>
<div class="app_panel">
    <!-- <div class="app_panel_head">
        <h2 class="pull-left">Bus Booking</h2>
    </div> -->
    <div class="app_panel_content">
        <div class="header_bottom">
            <div class="row">
                <div class="panel-body text-center main_block">
                    <label for="rd_booking" class="app_dual_button active">
                        <input type="radio" id="rd_booking" name="app_bus_booking" checked onchange="bus_booking_home_content_reflect()">
                        &nbsp;&nbsp;Home
                    </label>
                    <label for="rd_payment" class="app_dual_button">
                        <input type="radio" id="rd_payment" name="app_bus_booking" onchange="bus_booking_home_content_reflect()">
                        &nbsp;&nbsp;Receipt
                    </label>
                    <label for="rd_refund" class="app_dual_button">
                        <input type="radio" id="rd_refund" name="app_bus_booking" onchange="bus_booking_home_content_reflect()">
                        &nbsp;&nbsp;Refund
                    </label>
                </div>
            </div>
        </div>


        <div id="div_hotel_booking_content" class="main_block"></div>
    </div>
</div>

<script>
    function bus_booking_home_content_reflect() {
        var id = $('input[name="app_bus_booking"]:checked').attr('id');
        if (id == "rd_booking") {
            $.post('bookings/bus/booking/index.php', {}, function(data) {
                $('#div_hotel_booking_content').html(data);
            });
        }
        if (id == "rd_payment") {
            $.post('bookings/bus/payment/index.php', {}, function(data) {
                $('#div_hotel_booking_content').html(data);
            });
        }
        if (id == "rd_refund") {
            $.post('bookings/bus/refund/index.php', {}, function(data) {
                $('#div_hotel_booking_content').html(data);
            });
        }
    }
    bus_booking_home_content_reflect();
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>