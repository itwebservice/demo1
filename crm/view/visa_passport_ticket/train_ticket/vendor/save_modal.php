<?php
include '../../../../model/model.php';
?>
<div class="modal fade" id="train_save_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Train-Ticket Supplier Details</h4>
      </div>
      <div class="modal-body">
      <form id="frm_save" class="no-marg">
        <div class="panel panel-default panel-body app_panel_style feildset-panel">
        <legend>Train-Ticket Supplier Information</legend>
        <div class="row">
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" id="vendor_name" name="vendor_name" onchange="validate_spaces(this.id);" placeholder="*Company Name" title="Company Name" class="form-control">
          </div>
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" id="mobile_no" name="mobile_no" placeholder="*Mobile No" title="Mobile No" class="form-control" onchange="mobile_validate(this.id);" required>
          </div> 
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control" id="landline_no" onchange="mobile_validate(this.id);" name="landline_no" placeholder="Landline Number" title="Landline Number">
          </div>  
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" id="email_id" name="email_id" placeholder="Email ID" title="Email ID" class="form-control">
          </div>           
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name" title="Contact Person Name">
          </div>  
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" id="immergency_contact_no" onchange="mobile_validate(this.id);" name="immergency_contact_no" placeholder="Emergency Contact No" title="Emergency Contact No" class="form-control">
          </div> 
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <textarea id="address" name="address" placeholder="Address" title="Address" onchange="validate_address(this.id);" rows="1" class="form-control"></textarea>
          </div>
           <div class="col-sm-3 col-xs-6 mg_bt_10">
            <select name="state" class="form-control" id="state" title="Select State/Country Name" style="width: 100%" required>
              <?php get_states_dropdown() ?>
            </select>
          </div> 
        </div>
        <div class="row">
           <!-- <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control" id="country" name="country" placeholder="Country" title="Country">
          </div> -->
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control" id="website" name="website" placeholder="Website" title="Website">
          </div>
          </div>
        </div>
         <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_30">
        <legend>Bank Information</legend>
        <div class="row">
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control bank_suggest" name="bank_name" id="bank_name" placeholder="Bank Name" title="Bank Name">
          </div> 
          <div class="col-md-3 col-sm-6 mg_bt_10">
              <input type="text" name="account_name" id="account_name" placeholder="A/c Type" title="A/c Type" class="form-control">
          </div> 
          <div class="col-md-3 col-sm-6 mg_bt_10">
              <input type="text" name="account_no" onchange="validate_accountNo(this.id);" id="account_no" placeholder="A/c No" title="A/c No" class="form-control">
          </div> 
            <div class="col-md-3 col-sm-6 mg_bt_10">
              <input type="text" name="branch" id="branch" placeholder="Branch" onchange="validate_branch(this.id);" title="Branch" class="form-control">
          </div> 
        </div>
        <div class="row"> 
           <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" onchange="validate_IFSC(this.id);" placeholder="IFSC/SWIFT CODE" title="IFSC/SWIFT CODE" style="text-transform: uppercase;">
          </div>
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text"  class="form-control" id="service_tax_no" name="service_tax_no" placeholder="Tax No" onchange="validate_alphanumeric(this.id);" title="Tax No" style="text-transform: uppercase;">
          </div>
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="text" class="form-control" id="supp_pan" name="supp_pan" onchange="validate_alphanumeric(this.id);" placeholder="Personal Identification No(PIN)" title="Personal Identification No(PIN)" style="text-transform: uppercase;">
          </div> 
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <input type="number" id="opening_balance" value="0" name="opening_balance" placeholder="*Opening Balance" title="Opening Balance" >
            </div>
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <select class="form-control" name="side" id="side" title="Balance Side" data-toogle="tooltip">
              <option value="Credit">Credit</option>
              <option value="Debit">Debit</option>
            </select>
          </div>
            <div class="col-sm-3 mg_bt_10">
							<input type="hidden" id="as_of_date" name="as_of_date" placeholder="*As of Date" title="As of Date">
						</div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 mg_bt_10">
            <select name="active_flag" id="active_flag" title="Status" class="hidden">
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>        
        </div>
      </div>
        <div class="row text-center mg_tp_20">
          <div class="col-md-12">
            <button class="btn btn-sm btn-success" id="btn_save"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
          </div>
        </div>
      </div> 
    </form>     
    </div>
  </div>
</div>

<script>
$('#train_save_modal').modal('show'); 
$('#state').select2();
$('#as_of_date').datetimepicker({ timepicker:false, format:'d-m-Y' });
$(function(){
$('#frm_save').validate({
  rules:{
    vendor_name : { required : true },
    active_flag : { required : true },
    side : { required : true },
    as_of_date : { required : true },
    opening_balance : { required : true },
  },
  submitHandler:function(form){
      var vendor_name = $('#vendor_name').val();
      var mobile_no = $('#mobile_no').val();
      var email_id = $('#email_id').val();
      var address = $('#address').val();
      var contact_person_name = $('#contact_person_name').val();
      var landline_no = $('#landline_no').val();
      var immergency_contact_no = $("#immergency_contact_no").val();
      // var country = $("#country").val();
      var website = $("#website").val();
      var bank_name = $("#bank_name").val();
      var branch = $("#branch").val();
       var account_name = $("#account_name").val();
      var account_no = $("#account_no").val();
      var ifsc_code = $("#ifsc_code").val();   
      var opening_balance = $('#opening_balance').val();  
      var gl_id = $('#gl_id').val();
      var active_flag = $('#active_flag').val();
      var service_tax_no = $('#service_tax_no').val();
      var state = $('#state').val();
      var side = $('#side').val();
      var supp_pan = $('#supp_pan').val();
      var as_of_date = $('#as_of_date').val();
      var add = validate_address('address');
        if(!add){
          error_msg_alert('More than 155 characters are not allowed.');
          return false;
        }
      $('#btn_save').button('loading');
      var base_url = $('#base_url').val();

      $.ajax({
        type: 'post',
        url: base_url+'controller/visa_passport_ticket/train_ticket/vendor/vendor_save.php',
        data:{ vendor_name : vendor_name, mobile_no : mobile_no, landline_no : landline_no, email_id : email_id, contact_person_name : contact_person_name, immergency_contact_no : immergency_contact_no, address : address, website : website, bank_name : bank_name, account_no : account_no, branch : branch, ifsc_code : ifsc_code, opening_balance : opening_balance, active_flag : active_flag,service_tax_no : service_tax_no, state : state, side: side,account_name:account_name, supp_pan : supp_pan ,as_of_date : as_of_date},
        success: function(result){
          $('#btn_save').button('reset');
          var msg = result.split('-');
          if(msg[0]=='error'){
            msg_alert(result);
          }
          else{
            msg_alert(result);
            reset_form('frm_save');
            $('#train_save_modal').modal('hide');  
            list_reflect();
          }
        }
      });
  }
});
});

</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>