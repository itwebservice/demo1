<form id="frm_updatetab2">
  <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_30">

      <legend>Contact Person Details</legend>
      <div class="row text-center mg_tp_10">
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="text" id="contact_personf" name="contact_personf" placeholder="*First Name" title="First Name" value="<?= $sq_query['cp_first_name'] ?>" required> 
          </div>
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="text" id="contact_personl" name="contact_personl" placeholder="Last Name" title="Last Name" value="<?= $sq_query['cp_last_name'] ?>"> 
          </div>
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="text" id="mobile_no" name="mobile_no" placeholder="*Mobile No" title="Mobile No" onchange="mobile_validate(this.id);" value="<?= $sq_query['mobile_no'] ?>" required>
          </div>
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="text" id="email_id" name="email_id" placeholder="*Email ID"  title="Email ID" onchange="validate_email(this.id)" value="<?= $sq_query['email_id'] ?>" required >
          </div>
      </div>
      <div class="row text-center mg_tp_10">
        <div class="col-md-3 col-sm-6">
            <input class="form-control" type="text"  id="whatsapp_no" name="whatsapp_no" placeholder="Whatsap No" title="Whatsap No" value="<?= $sq_query['whatsapp_no'] ?>">
        </div>
        <div class="col-md-3 col-sm-6">
            <input class="form-control" type="text" id="designation" name="designation" placeholder="Designation" title="Designation" value="<?= $sq_query['designation'] ?>">
        </div>
        <div class="col-md-3 col-sm-6">
            <input class="form-control" type="text"  id="pan_card" name="pan_card" placeholder="PAN Card No" title="PAN Card No" value="<?= $sq_query['pan_card'] ?>">
        </div>
        <div class="col-md-3 col-sm-6 text-left">
          <div class="div-upload">
            <?php $id_proof = ($sq_query['id_proof_url'] == "")?'ID Proof':'Uploaded'; ?>
            <div id="photo_upload_btn_p" class="upload-button1"><span><?= $id_proof ?></span></div>
            <span id="photo_status" ></span>
            <ul id="files" ></ul>
            <input type="hidden" id="photo_upload_url" name="photo_upload_url" value="<?= $sq_query['id_proof_url'] ?>">
          </div>
          <button type="button" data-toggle="tooltip" class="btn btn-excel" title="Upload only PDF,JPG, PNG files are allowed."><i class="fa fa-question-circle"></i></button>
        </div>
      </div>
  </div>
  <div class="panel panel-default panel-body app_panel_style feildset-panel mg_tp_30">

      <legend>Access Details</legend>
      <div class="row text-center mg_tp_10">
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="text" id="username" name="username" placeholder="*Username" title="Username" value="<?= $username ?>" required> 
          </div>
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="password" id="password" name="password" placeholder="*Password" title="Password" value="<?= $password ?>" required> 
          </div>
          <div class="col-md-3 col-sm-6">
              <input class="form-control" type="password" id="repassword" name="repassword" placeholder="*Re-enter Password"  title="Re-enter Password" value="<?= $password ?>" required>
          </div>
      </div>
  </div>
        
  <div class="row text-center">
    <div class="col-md-12">
      <button class="btn btn-info btn-sm ico_left" type="button" onclick="switch_to_tab1()"><i class="fa fa-arrow-left" ></i>&nbsp;&nbsp;Previous</button>
      &nbsp;&nbsp;
      <button class="btn btn-sm btn-success" id="btn_update"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Update</button>
    </div>
  </div>

</form>

<script>
function switch_to_tab1(){ $('a[href="#tab1"]').tab('show'); }

upload_id_proof();
function upload_id_proof(){

    var btnUpload=$('#photo_upload_btn_p');
   // $(btnUpload).find('span').text('ID Proof');
    new AjaxUpload(btnUpload, {
      action: '../b2b_customer/inc/upload_photo_proof.php',
      name: 'uploadfile',
      onSubmit: function(file, ext){  
        if (! (ext && /^(pdf|jpg|png|jpeg)$/.test(ext))){ 
          error_msg_alert('Only PDF,JPG or PNG files are allowed');
          return false;
        }
        $(btnUpload).find('span').text('Uploading...');
      },

      onComplete: function(file, response){

        if(response==="error"){          
          error_msg_alert("File is not uploaded.");
          $(btnUpload).find('span').text('Upload');
        }else{ 

          $(btnUpload).find('span').text('Uploaded');
          $("#photo_upload_url").val(response);
        }
      }
    });
}

$('#frm_updatetab2').validate({
  rules:{
  },
  submitHandler:function(form){
    
        var base_url = $('#base_url').val();
        var register_id = $('#register_id').val();

        //Basic Details
        var company_old = $('#company_old').val();
        var company_name = $("#company_name").val();
        var acc_name = $("#acc_name").val();
        var iata_status = $("#iata_status").val();
        var iata_reg = $("#iata_reg").val();
        var nature = $("#nature").val();
        var currency = $("#currency").val();
        var telephone = $('#telephone').val(); 
        var latitude = $("#latitude").val();
        var turnover_slab = $("#turnover_slab").val();
        var skype_id = $("#skype_id").val();
        var website = $("#website").val();
        var company_logo = $("#logo_upload_url").val();

        //Address Details
        var city = $("#city").val();
        var address1 = $("#address1").val(); 
        var address2 = $("#address2").val(); 
        var pincode = $("#pincode").val();
        // var country = $('#country').val();
        var state = $('#cust_state').val();
        var timezone = $('#timezone').val(); 
        var address_upload_url = $('#address_upload_url').val();

        //Account details
        var bank_name = $("#bank_name1").val();
        var bank_acc_name = $("#bank_acc_name1").val();
        var acc_name1 = $("#acc_name11").val();
        var bank_acc_no = $("#bank_acc_no1").val();
        var bank_branch_name = $("#bank_branch_name1").val();
        var bank_ifsc_code = $("#bank_ifsc_code1").val();
        


        //Contact Person Details
        var contact_personf = $('#contact_personf').val();
        var contact_personl = $('#contact_personl').val();
        var email_id = $('#email_id').val();
        var mobile_no = $('#mobile_no').val();
        var whatsapp_no = $('#whatsapp_no').val();
        var designation = $('#designation').val();
        var pan_card = $('#pan_card').val();
        var photo_upload_url = $('#photo_upload_url').val();

        //Access Details
        var username = $('#username').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        var active_flag = $('#active_flag').val();
        if(password !== repassword){
          error_msg_alert('Password do not match!'); return false;
        }

      $('#btn_update').button('loading');
      $.ajax({
      type:'post',
      url: base_url+'controller/b2b_customer/b2bcustomer_update.php',

      data:{ register_id:register_id,company_old:company_old,company_name : company_name, acc_name : acc_name, iata_status : iata_status, iata_reg : iata_reg, nature : nature, currency : currency, telephone : telephone, latitude : latitude, turnover_slab : turnover_slab, skype_id : skype_id, website : website, company_logo:company_logo,
        address1 : address1,address2 : address2, city : city , pincode : pincode , timezone : timezone, address_upload_url : address_upload_url,
        contact_personf : contact_personf , contact_personl : contact_personl,email_id:email_id, mobile_no : mobile_no, whatsapp_no : whatsapp_no, designation : designation, pan_card : pan_card, photo_upload_url : photo_upload_url,
        username : username, password : password,active_flag:active_flag,state:state,bank_name:bank_name,bank_acc_name:bank_acc_name,acc_name1:acc_name1,bank_acc_no:bank_acc_no,bank_branch_name:bank_branch_name,bank_ifsc_code:bank_ifsc_code},

      success: function(message){
            var data = message.split('--');
            if(data[0] == 'error'){
              error_msg_alert(data[1]); 
              $('#btn_update').button('reset');
              return false;
            } 
            else{
              success_msg_alert(message);
              $('#agent_update_modal').modal('hide');
              $('#btn_update').button('reset');
              $('#agent_update_modal').on('hidden.bs.modal', function(){
                customer_list_reflect();
              });
              // $('#agent_update_modal').modal('hide');
                
            }
      }  
    });
  } 
});
</script>