<form id="frm_tab1">

	<div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_30">

	     <legend>Basic Details</legend>                

          <div class="row mg_tp_10">

              <div class="col-md-3 col-sm-6 mg_bt_10">
                  <input class="form-control" type="text" id="company_name" name="company_name" placeholder="*Company Name" title="Company Name" required /> 
              </div>
              <div class="col-md-3 col-sm-6 mg_bt_10">
                  <input class="form-control" type="text" id="acc_name" name="acc_name" placeholder="Accounting Name" title="Accounting Name"/>
              </div>
              <div class="col-md-3 col-sm-6 mg_bt_10">
                  <select class="form-control" id='iata_status' title='iata_status' name='iata_status'>
                    <option value=''>IATA Status</option>
                    <option value='Approved'>Approved</option>
                    <option value='Not Approved'>Not Approved</option>
                  </select>
              </div>
              <div class="col-md-3 col-sm-6 mg_bt_10">
                  <input class="form-control" type="text" id="iata_reg" name="txt_mobile_no1" placeholder="IATA Reg.No" title="IATA Reg.No"/>
              </div>
          </div>

          <div class="row">
          		<div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <input class="form-control" type="text" id="nature" name="nature" placeholder="Nature Of Business" title="Nature Of Business"/>
              </div>
	            <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                <select class="form-control" id='currency' title='currency' name='currency' style='width:100%;'>
                  <option value=''>Preferred Currency</option>
                  <?php
                  $sq_currency = mysqlQuery("select id,currency_code from currency_name_master where 1");
                  while($row_currency = mysqli_fetch_assoc($sq_currency)){ ?>
                    <option value="<?= $row_currency['id'] ?>"><?= $row_currency['currency_code'] ?></option>
                  <?php } ?>
                </select>
	            </div>
              <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <input type="number" id="telephone" name="telephone" placeholder="Telephone" title="Telephone"/>
              </div>
              <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <input type="text" id="latitude" name="latitude" placeholder="Latitude" title="Latitude"/>
              </div>
            </div>

            <div class="row mg_tp_10">
                <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <input type="text" id="turnover_slab" name="turnover_slab" placeholder="Turnover Slab" title="Turnover Slab"/>
                </div>
                <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <input type="text" id="skype_id" name="skype_id" placeholder="Skype ID" title="Skype ID"/>
                </div>
                <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <input type="text" id="website" name="website" placeholder="Website" title="Website"/>
                </div>
                <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                  <div class="div-upload">
                    <div id="logo_upload_btn1" class="upload-button1"><span>Company Logo</span></div>
                    <span id="logo_proof_status" ></span>
                    <ul id="files" ></ul>
                    <input type="hidden" id="logo_upload_url" name="logo_upload_url" required>
                  </div>
                  <button type="button" data-toggle="tooltip" class="btn btn-excel" title="Upload Image size below 100KB, resolution : 220X85."><i class="fa fa-question-circle"></i></button>
                </div>
            </div>
        </div>

        <div class="panel panel-default panel-body app_panel_style mg_tp_30 feildset-panel">
  	    <legend>Address Details</legend>

        	<div class="row mg_tp_10">
            <div class="col-md-3 col-sm-6 mg_bt_10_xs">
              <select id='city' name='city' class='form-control' style='width:100%;' required>
              </select>
            </div>
            <div class="col-md-3 col-sm-6 mg_bt_10_xs">
              <input type="text" id="address1" name="address1" placeholder="Address1" title="Address1"/>
            </div>
            <div class="col-md-3 col-sm-6 mg_bt_10_xs">
              <input type="text" id="address2" name="address2" placeholder="Address2" title="Address2"/>
            </div>
            <div class="col-md-3 col-sm-6 mg_bt_10_xs">
              <input type="text" id="pincode" name="pincode" placeholder="Pincode" title="Pincode" onkeypress="return blockSpecialChar(event)"/>
            </div>
          </div>
          <div class="row mg_tp_10">
              
              <div class="col-md-3 col-xs-12">
                <select name="cust_state" id="cust_state" title="State/Country Name" style="width : 100%" required>
                  <?php get_states_dropdown() ?>
                </select>
              </div>
              <div class="col-md-3 col-sm-6 mg_bt_10_xs">
                <input type="text" id="timezone" name="timezone" placeholder="Timezone" title="Timezone"/>
              </div>
	            <div class="col-md-3 col-sm-6 mg_bt_10_xs">
	              <div class="div-upload">
	                <div id="address_upload_btn1" class="upload-button1"><span>Upload</span></div>
	                <span id="id_proof_status" ></span>
	                <ul id="files" ></ul>
	                <input type="hidden" id="address_upload_url" name="address_upload_url">
	              </div>
                  <button type="button" data-toggle="tooltip" class="btn btn-excel" title="Upload only PDF,JPG, PNG files are allowed."><i class="fa fa-question-circle"></i></button>
	            </div> 
	        </div>
	    </div>
      <div class="panel panel-default panel-body app_panel_style mg_tp_30 feildset-panel">
  	    <legend>Account Details</legend>

        	<div class="row mg_tp_10">
            <div class="col-sm-3 mg_bt_10">
              <input type="text" id="bank_name" name="bank_name" placeholder="Bank Name" title="Bank Name" class="bank_suggest">
            </div>
            <div class="col-sm-3 mg_bt_10">
              <input type="text" id="acc_name1" name="acc_name1" placeholder="A/c Type" title="A/c Type">
            </div>
            <div class="col-sm-3 mg_bt_10">
              <input type="text" id="bank_acc_name1" name="bank_acc_name1" placeholder="A/c Name" title="A/c Name">
            </div>
            <div class="col-sm-3 mg_bt_10">
              <input type="text" id="bank_acc_no" name="bank_acc_no" placeholder="A/c No" onchange="validate_accountNo(this.id)" title="A/c No">
            </div>
            <div class="col-sm-3 mg_bt_10">
              <input type="text" id="bank_branch_name" onchange="validate_branch(this.id);" name="bank_branch_name" placeholder="Branch Name" title="Branch Name">
            </div>
            <div class="col-sm-3 mg_bt_10">
              <input type="text" id="bank_ifsc_code" onchange="validate_IFSC(this.id);" name="bank_ifsc_code" placeholder="IFSC/SWIFT CODE" title="IFSC/SWIFT CODE" style="text-transform: uppercase;">
            </div>
          </div>
      </div>
      <div class="row text-center">
        <div class="col-xs-12">
          <button class="btn btn-info btn-sm ico_right">Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
        </div>
      </div>
</form>
<script src="<?= BASE_URL ?>js/ajaxupload.3.5.js"></script>
<script src="<?= BASE_URL ?>js/app/field_validation.js"></script>

<script>
$('#currency').select2();
$('#cust_state').select2({minimumInputLength:1});
city_lzloading('#city');
upload_address_proof();
function upload_address_proof(){

    var btnUpload=$('#address_upload_btn1');
    $(btnUpload).find('span').text('Address Proof');
    new AjaxUpload(btnUpload, {
      action: '../b2b_customer/inc/upload_address_proof.php',
      name: 'uploadfile',
      onSubmit: function(file, ext){  

        if (! (ext && /^(jpg|png|jpeg|pdf)$/.test(ext))){ 
         error_msg_alert('Only PDF,JPG or PNG files are allowed');
         return false;
        }
        $(btnUpload).find('span').text('Uploading...');
      },
      onComplete: function(file, response){

        if(response==="error"){
          error_msg_alert("File is not uploaded.");
          $(btnUpload).find('span').text('Upload');
        }
        else{
          $(btnUpload).find('span').text('Uploaded');
          $("#address_upload_url").val(response);
        }
      }
    });
}

upload_logo_proof();
function upload_logo_proof(){
    var btnUpload=$('#logo_upload_btn1');
    $(btnUpload).find('span').text('Company Logo');
    new AjaxUpload(btnUpload, {
      action: '../b2b_customer/inc/upload_logo.php',
      name: 'uploadfile',
      onSubmit: function(file, ext){  

        if (! (ext && /^(png|jpg|jpeg)$/.test(ext))){ 
         error_msg_alert('Only PNG,JPG or JPEG files are allowed');
         return false;
        }
        $(btnUpload).find('span').text('Uploading...');
      },
      onComplete: function(file, response){
       // alert(response);
        if(response=="error1"){
            $(btnUpload).find('span').text('Company Logo');
            error_msg_alert('Maximum size exceeds');
            return false;
        }
        else if(response==="error"){
          error_msg_alert("File is not uploaded.");
          $(btnUpload).find('span').text('Upload');
        }
        else{
          $(btnUpload).find('span').text('Uploaded');
          $("#logo_upload_url").val(response);
        }
      }
    });
}

$(function(){
$('#frm_tab1').validate({
	rules:{
	},

	submitHandler:function(form){
    var logo_upload_url = $('#logo_upload_url').val();
    if(logo_upload_url==''){
      error_msg_alert('Company logo required!'); return false;
    }
		$('a[href="#tab2"]').tab('show');
     return false;
	}
});
});
</script>

