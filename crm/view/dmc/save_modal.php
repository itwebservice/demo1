<?php
include "../../model/model.php";
?>

<div class="modal fade" id="dmc_save_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">DMC Supplier Details</h4>
      </div>
      <div class="modal-body">
          <form id="frm_dmc_save">
            <div class="panel panel-default panel-body app_panel_style feildset-panel">
              <legend>DMC supplier Information</legend> 
              <div class="row">
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                    <select id="cmb_city_id" name="cmb_city_id" class="city_master_dropdown" style="width:100%" title="Select City Name">
                    </select>
                  </div>  
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" class="form-control" onchange="validate_spaces(this.id);" id="company_name" name="company_name" placeholder="*DMC Name" title="DMC Name">        
                  </div>
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" class="form-control" id="mobile_no" name="mobile_no"  onchange="mobile_validate(this.id);" placeholder="*Mobile No" title="Mobile No." required>
                  </div>
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" class="form-control"  onchange="mobile_validate(this.id);" id="landline_no" name="landline_no" placeholder="Landline Number" title="Landline Number">
                  </div>  
              </div>
              <div class="row">  
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" class="form-control" id="email_id" name="email_id"  placeholder="Email ID" title="Email Address">
                  </div>                
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name" title="Contact Person Name">
                  </div>  
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" id="immergency_contact_no" name="immergency_contact_no"  onchange="mobile_validate(this.id);" placeholder="Emergency Contact No" title="Emergency Contact No">
                  </div>  
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <textarea id="dmc_address" name="dmc_address" placeholder="Company Address" onchange="validate_address(this.id)" class="form-control" title="Company Address" rows="1"></textarea>
                  </div>                      
              </div>

              <div class="row">
                <div class="col-sm-3 col-xs-6 mg_bt_10">
                    <select name="state" id="state" title="Select State/Country Name" style="width:100%" required>
                      <?php get_states_dropdown() ?>
                    </select>
                </div> 
                <!-- <div class="col-md-3 col-sm-6 mg_bt_10">
                    <input type="text" id="country" name="country" placeholder="Country" title="Country">
                </div>              -->
                  
                <div class="col-md-3 col-sm-6 mg_bt_10">
                    <input type="text" id="website" name="website" placeholder="Website" title="Website">
                </div>
              </div>
            </div>
            <div class="panel panel-default panel-body app_panel_style feildset-panel">
              <legend>Bank Information</legend> 
              <div class="row">
                 <div class="col-md-3 col-sm-6 mg_bt_10">
                    <input type="text" name="bank_name" id="bank_name" placeholder="Bank Name" title="Bank Name" class="bank_suggest">
                </div>
                 <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" name="account_name" id="account_name" placeholder="A/c Type" title="A/c Type">
                  </div> 
                 <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" name="account_no" id="account_no" onchange="validate_accountNo(this.id);" placeholder="A/c No" title="A/c No">
                  </div>   
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" name="branch" id="branch" placeholder="Branch" title="Branch" onchange="validate_branch(this.id);">
                  </div>
              </div> 
              <div class="row">
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" onchange="validate_IFSC(this.id);" name="ifsc_code" id="ifsc_code" placeholder="IFSC/SWIFT CODE" title="IFSC/SWIFT CODE" style="text-transform: uppercase;">
                  </div>
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" name="service_tax_no" id="service_tax_no" onchange="validate_alphanumeric(this.id)" placeholder="Tax No" title="Tax No" style="text-transform: uppercase;">
                  </div> 
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="text" id="supp_pan" name="supp_pan" onchange="validate_alphanumeric(this.id)";  placeholder="Personal Identification No(PIN)" title="Personal Identification No(PIN)" style="text-transform: uppercase;">
                  </div>
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                      <input type="number" id="opening_balance" value="0" name="opening_balance" placeholder="*Opening Balance" title="Opening Balance">
                  </div>
                  <div class="col-md-3 col-sm-6 mg_bt_10">
                    <select class="form-control" name="side" id="side" title="Balance side" data-toggle="tooltip">
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
                    <button class="btn btn-sm btn-success" id="btn_dmc_save"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
                  </div>
              </div>
          </form>
      </div>      
    </div>
  </div>
</div>
<script>
$('#dmc_save_modal').modal('show');
$('#state').select2();
city_lzloading('#cmb_city_id');
$('#as_of_date').datetimepicker({ timepicker:false, format:'d-m-Y' });
$(function(){
  $('#frm_dmc_save').validate({
    rules:{
      company_name:{ required:true },
      cmb_city_id:{ required:true },
      side : { required : true },
      as_of_date : { required : true },
      opening_balance : { required : true }
    },
    submitHandler:function(form){
        var company_name = $('#company_name').val();
        var mobile_no = $('#mobile_no').val();
        var landline_no = $('#landline_no').val();
        var email_id = $('#email_id').val();
        var contact_person_name = $('#contact_person_name').val();    
        var cmb_city_id = $('#cmb_city_id').val();
        var dmc_address = $('#dmc_address').val();
        var opening_balance = $('#opening_balance').val();
        var active_flag = $('#active_flag').val();
        var service_tax_no = $('#service_tax_no').val();
        var immergency_contact_no = $("#immergency_contact_no").val();
        // var country = $("#country").val();
        var website = $("#website").val();
        var bank_name = $("#bank_name").val();
        var branch = $("#branch").val();
        var account_name = $("#account_name").val();
        var account_no = $("#account_no").val();
        var ifsc_code = $("#ifsc_code").val();
        var base_url = $('#base_url').val();
        var state = $('#state').val();
        var side = $('#side').val();
        var supp_pan1 = $('#supp_pan').val();
        var supp_pan = supp_pan1.toUpperCase();
        var as_of_date = $('#as_of_date').val();

        var add = validate_address('dmc_address');
        if(!add){
          error_msg_alert('More than 155 characters are not allowed.');
          return false;
        }
        $('#btn_dmc_save').button('loading');
        
        $.post( 
               base_url+"controller/dmc/dmc_save.php",

               { company_name : company_name, mobile_no : mobile_no, landline_no : landline_no, email_id : email_id, contact_person_name : contact_person_name,immergency_contact_no : immergency_contact_no, cmb_city_id : cmb_city_id, dmc_address : dmc_address, website : website, opening_balance : opening_balance, active_flag : active_flag, service_tax_no : service_tax_no, bank_name : bank_name, account_no : account_no, branch : branch, ifsc_code : ifsc_code, state : state,side :side,account_name : account_name,supp_pan : supp_pan,as_of_date : as_of_date},
               function(data) {                 
                  msg_alert(data);
                  $('#dmc_save_modal').modal('hide');
                  dmc_list_reflect();
                  reset_form('frm_dmc_save');
                  $('#btn_dmc_save').button('reset');
               });  
    }
  });
});
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>