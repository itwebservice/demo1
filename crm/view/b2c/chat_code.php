<?php
include '../../model/model.php';
$query = mysqli_fetch_assoc(mysqlQuery("SELECT tidio_chat FROM `b2c_settings` where setting_id='1'"));
?>
<form id="section_ganalytics">
    <legend>Define Tidio Chat Link Code</legend>
    <div class="row mg_bt_20">
        <div class="col-md-12 mg_bt_10">
            <textarea id="tidio_chats" name="tidio_chats" class="form-control" placeholder="Tidio Chat Link Code"
                title="Tidio Chat Link Code"><?= $query['tidio_chat'] ?></textarea>
        </div>
    </div>
    <div class="row mg_tp_20">
        <div class="col-xs-12 text-center">
            <button class="btn btn-sm btn-success" id="btn_save"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
        </div>
    </div>
    <div class="row mg_tp_20">
        <div class="col-xs-12" style="display: inline-flex">
            <h5>Please make the registration in Tidio website and add the API key :</h5>
            <ul style="padding-left: 5px;align-content: center;margin-bottom: 0px;padding-top: 8px;">
                <a target="_blank" href="https://www.tidio.com/"> Tidio </a>
            </ul>
        </div>
    </div>
</form>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>
<script>
$(function() {
    $('#section_ganalytics').validate({
        rules: {},
        submitHandler: function(form) {

            var base_url = $('#base_url').val();
            var images_array = new Array();
            var tidio_chats = $("#tidio_chats").val();
            images_array.push({
                'tidio_chats': tidio_chats
            });
            $('#btn_save').button('loading');

            $.ajax({
                type: 'post',
                url: base_url + 'controller/b2c_settings/cms_save.php',
                data: {
                    section: '22',
                    data: images_array
                },
                success: function(message) {
                    $('#btn_save').button('reset');
                    var data = message.split('--');
                    if (data[0] == 'erorr') {
                        error_msg_alert(data[1]);
                    } else {
                        success_msg_alert(data[1]);
                        reflect_data('22');
                        update_b2c_cache();
                    }
                }
            });
        }
    });
});
</script>