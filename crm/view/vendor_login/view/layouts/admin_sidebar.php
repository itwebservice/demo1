<?php
global $app_version; 
$vendor_type = $_SESSION['vendor_type'];
?>
<script src="<?php echo BASE_URL ?>js/script.js"></script>  

<div class="sidebar_inner main_block"> 
        <div id="cssmenu" style="width:100%"> 
            <ul>
                <?php
                if($vendor_type == 'Hotel Vendor' || $vendor_type == 'DMC Vendor' || $vendor_type == 'Transport Vendor'){
                    ?>
                    <li><a href='<?php echo BASE_URL ?>view/vendor_login/view/index.php'><span><i class="fa fa-tachometer"></i>&nbsp;&nbsp;Dashboard</span></a></li>
                <?php } ?>
                <li><a href='<?php echo BASE_URL ?>view/vendor_login/view/bookings/index.php'><span><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;&nbsp;Bookings</span></a></li><?php
                if($vendor_type == 'Hotel Vendor'){ ?>
                <li><a href='<?php echo BASE_URL ?>view/vendor_login/view/b2b_bookings/index.php'><span><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;&nbsp;B2B Bookings</span></a></li>
                <?php } ?>
            </ul>
        </div>
</div><!--/sidebar-wrap-close-->
