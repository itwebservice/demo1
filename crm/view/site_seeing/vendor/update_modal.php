<?php
include "../../../model/model.php";
$vendor_id = $_POST['vendor_id'];
$sq_vendor = mysqli_fetch_assoc(mysqlQuery("select * from site_seeing_vendor where vendor_id='$vendor_id'"));
$vendor_name = addslashes($sq_vendor['vendor_name']);
$sq_vendor_login = mysqli_fetch_assoc(mysqlQuery("select * from vendor_login where username='$vendor_name' and password='$sq_vendor[mobile_no]' and vendor_type='Excursion Vendor'"));
$mobile_no = $encrypt_decrypt->fnDecrypt($sq_vendor['mobile_no'], $secret_key);
$email_id = $encrypt_decrypt->fnDecrypt($sq_vendor['email_id'], $secret_key);
$email_id1 = $encrypt_decrypt->fnDecrypt($sq_vendor['alternative_email_1'], $secret_key);
$email_id2 = $encrypt_decrypt->fnDecrypt($sq_vendor['alternative_email_2'], $secret_key);

$role = $_SESSION['role'];
$value = '';
if($role!='Admin' && $role!="Branch Admin"){ $value="readonly"; }
?>
<form id="frm_update">
<input type="hidden" id="vendor_id" name="vendor_id" value="<?= $vendor_id ?>">
<input type="hidden" id="vendor_login_id" name="vendor_login_id" value="<?= $sq_vendor_login['login_id'] ?>">
<div class="modal fade" id="update_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Activity Supplier Details</h4>
      </div>
      <div class="modal-body">
      	<div class="panel panel-default panel-body app_panel_style feildset-panel">
        	<legend>Activity Supplier Information</legend>
			<div class="row">
				<div class="col-md-3 col-sm-6 mg_bt_10">
					<select name="city_id" id="city_id" title="City Name" style="width:100%">
						<?php 
						$sq_city = mysqli_fetch_assoc(mysqlQuery("select * from city_master where city_id='$sq_vendor[city_id]'"));
						?>
						<option value="<?= $sq_city['city_id'] ?>" selected="selected"><?= $sq_city['city_name'] ?></option>
					</select>
				</div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
					<input type="text" id="vendor_name" name="vendor_name" onchange="validate_spaces(this.id);" placeholder="Company Name" title="Company Name" value="<?= $sq_vendor['vendor_name'] ?>">
				</div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
					<input type="number" id="mobile_no" name="mobile_no"  onchange="mobile_validate(this.id);" placeholder="*Mobile No" title="Mobile No" value="<?= $mobile_no ?>" required>
				</div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
	              	<input type="number" class="form-control" value="<?= $sq_vendor['landline_no'] ?>"  onchange="mobile_validate(this.id);" id="landline_no1" name="landline_no1" placeholder="Landline Number" title="Landline Number">
	          </div> 			
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 mg_bt_10">
					<input type="email" id="email_id" class="form-control" name="email_id" placeholder="Email ID" title="Email ID" value="<?= $email_id ?>">
				</div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
               		 <input type="email" value='<?= $email_id1 ?>' class="form-control" id="txt_email_id_1" name="txt_email_id"  placeholder="Alternative Email ID 1" title="Alternative Email ID 1" onchange="validate_email(this.id)">
            	</div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
                  <input type="email" value='<?= $email_id2 ?>' class="form-control" id="txt_email_id_2" name="txt_email_id"  placeholder="Alternative Email ID 2" title="Alternative Email ID 2" onchange="validate_email(this.id)">
           		</div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
					<input type="text" id="concern_person_name" name="concern_person_name" placeholder="Contact Person" title="Contact Person" value="<?= $sq_vendor['concern_person_name'] ?>">
				</div>	
				<div class="col-md-3 col-sm-6 mg_bt_10">
	              	<input type="text" id="immergency_contact_no1"  onchange="mobile_validate(this.id);" name="immergency_contact_no1" value="<?= $sq_vendor['immergency_contact_no'] ?>" placeholder="Emergency Contact No" title="Emergency Contact No" class="form-control"> 
	          	</div>
	          	<div class="col-md-3 col-sm-6 mg_bt_10">
					<textarea name="address" id="address" placeholder="Address"  onchange="validate_address(this.id);" title="Address" rows="1"><?= $sq_vendor['address'] ?></textarea>
				</div>	
				<div class="col-sm-3 col-xs-6 mg_bt_10">
		            <select name="cust_state1" id="cust_state1"  title="Select State/Country Name" placeholder="Select State/Country Name" style="width:100%" required>
		              <?php if($sq_vendor['state_id']!='0'){
		               $sq_state = mysqli_fetch_assoc(mysqlQuery("select * from state_master where id='$sq_vendor[state_id]'"));
		              ?>
		              <option value="<?= $sq_vendor['state_id'] ?>"><?= $sq_state['state_name'] ?></option>
		          <?php } ?>
		              <?php get_states_dropdown() ?>
		            </select>
	          	</div>
				<div class="row">
				<!-- <div class="col-md-3 col-sm-6 mg_bt_10">
	                <input type="text" id="country1" name="country1" class="form-control"  onchange="validate_specialChar(this.id);" placeholder="Country" value="<?= $sq_vendor['country'] ?>" title="Country" >
	            </div> -->
	         </div>
           </div>
		   <div class="row">
				<div class="col-md-3 col-sm-6 mg_bt_10">
	                <input type="text" id="website1" name="website1" placeholder="Website" value="<?= $sq_vendor['website'] ?>" class="form-control" title="Website">
	            </div>
				<div class="col-md-3 col-sm-6 mg_bt_10">
					<select name="active_flag" id="active_flag" title="Status">
			        	<option value="<?= $sq_vendor['active_flag'] ?>"><?= $sq_vendor['active_flag'] ?></option>
			            <option value="Active">Active</option>
			            <option value="Inactive">Inactive</option>
			        </select>
				</div>
			</div>
			</div>
           <div class="panel panel-default panel-body app_panel_style feildset-panel">
        		<legend>Bank Information</legend>
				<div class="row">
					<div class="col-md-3 col-sm-6 mg_bt_10">
			            <input type="text" name="bank_name1" id="bank_name1" placeholder="Bank Name" title="Bank Name" value="<?= $sq_vendor['bank_name']?>" class="bank_suggest">
			        </div>
			        <div class="col-md-3 col-sm-6 mg_bt_10">
		              <input type="text" name="account_name1" id="account_name1" placeholder="A/c Type" title="A/c Type" value="<?= $sq_vendor['account_name']?>">
		            </div>	
		 			<div class="col-md-3 col-sm-6 mg_bt_10">
		              <input type="text" name="account_no1" id="account_no1" placeholder="A/c No"  onchange="validate_accountNo(this.id);" title="A/c No" value="<?= $sq_vendor['account_no']?>">
		            </div>	 			
		            <div class="col-md-3 col-sm-6 mg_bt_10">
		              <input type="text" name="branch1" id="branch1" placeholder="Branch" title="Branch"  onchange="validate_branch(this.id);" value="<?= $sq_vendor['branch']?>">
		            </div>
					
				</div>
				<div class="row"> 
					<div class="col-md-3 col-sm-6 mg_bt_10">
		              	<input type="text" name="ifsc_code1" id="ifsc_code1" onchange="validate_IFSC(this.id);" placeholder="IFSC/SWIFT CODE" title="IFSC/SWIFT CODE" value="<?= $sq_vendor['ifsc_code']?>" style="text-transform: uppercase;">
		          	</div>
					<div class="col-md-3 col-sm-6 mg_bt_10">
						<input type="text" name="service_tax_no1" onchange="validate_balance(this.id)" id="service_tax_no1" placeholder="Tax No" title="Tax No" value="<?= strtoupper($sq_vendor['service_tax_no'])?>" style="text-transform: uppercase;">
					</div>
					<div class="col-md-3 col-sm-6 mg_bt_10">
						<input type="text" id="supp_pan" name="supp_pan" onchange="validate_specialChar(this.id)" value="<?= $sq_vendor['pan_no']?>" placeholder="Personal Identification No(PIN)" title="Personal Identification No(PIN)" style="text-transform: uppercase;">
					</div>
					<div class="col-md-3 col-sm-6 mg_bt_10">
						<input type="number" id="opening_balance1" name="opening_balance1" placeholder="*Opening Balance" title="Opening Balance" value="<?= $sq_vendor['opening_balance'] ?>" >
					</div>  
					<div class="col-md-3 col-sm-6 mg_bt_10">
						<select class="form-control" name="side1" id="side1" title="Balance Side">
							<option value="<?= $sq_vendor['side'] ?>"><?= $sq_vendor['side'] ?></option>
							<?php if($sq_vendor['side'] != 'Debit'){ ?>
								<option value="Debit">Debit</option>
							<?php }
							if($sq_vendor['side'] != 'Credit'){ ?>
							<option value="Credit">Credit</option>
							<?php } ?>
						</select>
					</div>
					<div class="col-sm-3 mg_bt_10">
						<input type="hidden" id="as_of_date1" name="as_of_date1" placeholder="*As of Date" title="As of Date" value="<?= get_date_user($sq_vendor['as_of_date'])?>">
					</div>
				</div>
			</div>
			<div class="row">	
			</div>
			<div class="row mg_tp_20 mg_bt_20 text-center">
				<div class="col-md-12">
					<button class="btn btn-sm btn-success" id="btn_update"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Update</button>	
				</div>    
			</div>
		</div>
		
      </div>      
    </div>
  </div>
</div>
</form>

<script>
$('#update_modal').modal('show');
$("#cust_state1").select2();
$('#as_of_date1').datetimepicker({ timepicker:false, format:'d-m-Y' });
city_lzloading('#city_id');
///////////////////////***Hotel Master Save start*********//////////////
$(function(){
	$('#frm_update').validate({
    rules:{
			vendor_name: { required : true },
			city_id: { required : true },
			active_flag: { required : true },
			side1 : { required : true },
			as_of_date1 : { required : true },
			opening_balance1 : { required : true },
    },

    submitHandler:function(form){

		var base_url = $("#base_url").val();
		var landline_no = $('#landline_no1').val();
		var immergency_contact_no = $('#immergency_contact_no1').val();
		// var country = $("#country1").val();
		var website = $("#website1").val();
		var bank_name = $("#bank_name1").val();
		var account_name = $("#account_name1").val();
		var account_no = $("#account_no1").val();
		var branch = $("#branch1").val();
		var ifsc_code = $("#ifsc_code1").val();
		var vendor_id = $('#vendor_id').val();
		var vendor_login_id = $('#vendor_login_id').val();
		var vendor_name = $('#vendor_name').val();
		var city_id = $('#city_id').val();
		var mobile_no = $('#mobile_no').val();
		var email_id = $('#email_id').val();
		var email_id_1 = $("#txt_email_id_1").val();
		var email_id_2 = $("#txt_email_id_2").val();
		var concern_person_name = $('#concern_person_name').val();
		var opening_balance = $('#opening_balance1').val();
		var address = $('#address').val();
		var gl_id = $('#gl_id').val();
		var active_flag = $('#active_flag').val();
		var service_tax_no1 = $('#service_tax_no1').val();
		var state_id = $('#cust_state1').val();
		var side = $('#side1').val();
		var supp_pan = $('#supp_pan').val();
		var as_of_date = $('#as_of_date1').val();
		var add = validate_address('address');
		if(!add){
			error_msg_alert('More than 155 characters are not allowed.');
			return false;
		}
		$('#btn_update').button('loading');

		$.post( 
				base_url+"controller/site_seeing/vendor/vendor_update.php",
				{ vendor_id : vendor_id, vendor_login_id : vendor_login_id, vendor_name : vendor_name, city_id : city_id, mobile_no : mobile_no, landline_no : landline_no, email_id : email_id, concern_person_name : concern_person_name, immergency_contact_no : immergency_contact_no, opening_balance : opening_balance, address : address, website :website, active_flag : active_flag, service_tax_no1 : service_tax_no1, bank_name : bank_name, account_no:account_no, branch : branch, ifsc_code:ifsc_code, state_id : state_id, side :side,account_name : account_name,supp_pan : supp_pan,as_of_date : as_of_date, email_id_1:email_id_1, email_id_2:email_id_2 },
				function(data) {  
						var msg = data.split('--');
						if(msg[0]=="error"){
						msg_alert(data);  
						}
						else{
						msg_alert(data); 
						$('#btn_update').button('reset'); 
						$('#update_modal').modal('hide');
						$('#update_modal').on('hidden.bs.modal', function(){
							list_reflect();
						});
						}                       
				});
		}
  });
});
///////////////////////***Hotel Master Save ens*********//////////////

</script>

<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>