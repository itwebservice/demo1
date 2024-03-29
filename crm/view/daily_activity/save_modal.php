<?php
$branch_admin_id = $_SESSION['branch_admin_id'];
?>
<div class="modal fade" id="activity_save_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Daily Activities</h4>
      </div>
      <div class="modal-body">

          <input type="hidden" title="Employee Id" name= "emp_id" id="emp_id" value="<?php echo $emp_id; ?>"/>
          <div class="row mg_bt_10 text-right">
            <div class="col-md-12">
              <button type="button" class="btn btn-excel" title="Add Row" onclick="addRow('tbl_dynamic_daily_activity')"><i class="fa fa-plus"></i></button>
              <button type="button" class="btn btn-pdf btn-sm" title="Delete Row" onclick="deleteRow('tbl_dynamic_daily_activity');"><i class="fa fa-trash"></i></button>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="tbl_dynamic_daily_activity" name="tbl_dynamic_daily_activity" class="table table-bordered table-hover no-marg"  cellspacing="0">
                    <tr>
                        <td><input id="chk_tour_group1" type="checkbox" checked></td>
                        <td><input maxlength="15" value="1" type="text" name="username" placeholder="Sr. No." disabled  class="form-control" /></td>
                        <td class="col-md-2 no-pad"><input placeholder="*Select Date" title="Activity Date" id="activity_date" class="form-control app_datepicker" value="<?= date('d-m-Y') ?>"/></td>
                        <td class="col-md-3 no-pad"><input placeholder="*Activity Type" onchange="validate_spaces(this.id);validate_specialChar(this.id)" title="Activity Type" id="activity_type" class="form-control" /></td>
                        <td class="col-md-2 no-pad"><input placeholder="Time Taken" onchange="validate_spaces(this.id);validate_specialChar(this.id)"  title="Time Taken" id="time_taken" class="form-control" />
                        </td>
                        <td class="col-md-5 no-pad"><textarea placeholder="Description" onchange="validate_spaces(this.id);"  title="Description" id="description" class="form-control"></textarea> </td>                        
                    </tr>                                
                </table>
              </div>
            </div>
          </div>
          <input type="hidden" id="branch_admin_id" name="branch_admin_id" value="<?= $branch_admin_id ?>" >           

          <div class="row text-center mg_tp_20">
            <div class="col-md-12">
              <button id="activity_save" onclick="activity_master_save()" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
            </div>
          </div>
        
      </div>      
    </div>
  </div>
</div>
<script type="text/javascript">
$('#activity_date').datetimepicker({ timepicker:false, format:'d-m-Y', maxDate:'d-m-Y' });
function activity_master_save()
{
	$('#activity_save').prop('disabled',true);
  var base_url = $('#base_url').val();
  var emp_id = $('#emp_id').val();
  var branch_admin_id = $('#branch_admin_id').val();

  var activity_date_arr = new Array();
  var activity_type_arr = new Array();
  var time_taken_arr = new Array();
  var description_arr = new Array();

  var table = document.getElementById("tbl_dynamic_daily_activity");
  var rowCount = table.rows.length;
  for(var i=0; i<rowCount; i++)
  {
    var row = table.rows[i];
    if(rowCount == 1){
      if(!row.cells[0].childNodes[0].checked){
        error_msg_alert("Atleast one activity is required!");
        $('#activity_save').prop('disabled',false);
        return false;
      }
    }
    if(row.cells[0].childNodes[0].checked){

      var activity_date = row.cells[2].childNodes[0].value;
      var activity_type = row.cells[3].childNodes[0].value;
      var time_taken = row.cells[4].childNodes[0].value;
      var description = row.cells[5].childNodes[0].value;

      if(activity_date=="")
      {
        error_msg_alert("Enter Activity date in row"+(i+1));
	      $('#activity_save').prop('disabled',false);
        return false;
      }
      var today = new Date();
      today = today.getTime();

      var from_parts = activity_date.split(' ');
      var parts = from_parts[0].split('-');
      var date = new Date();
      var new_month = parseInt(parts[1]) - 1;
      date.setFullYear(parts[2]);
      date.setDate(parts[0]);
      date.setMonth(new_month);
      var from_date_ms = date.getTime();

      if (today != from_date_ms && today < from_date_ms) {
        error_msg_alert('Future date is not allowed.');
	      $('#activity_save').prop('disabled',false);
        return false;
      }
      if(activity_type=="")
      {
        error_msg_alert("Enter Activity type in row"+(i+1));
	      $('#activity_save').prop('disabled',false);
        return false;
      }
      var flag = vcheckDate(row.cells[2].childNodes[0].id);
      if(!flag){
        error_msg_alert('Future date is not allowed.');
        $('#activity_save').prop('disabled',false);
        return false;
      }
      activity_date_arr.push(activity_date);
      activity_type_arr.push(activity_type);
      time_taken_arr.push(time_taken);
      description_arr.push(description);
    }
  }
  $.post( 
    base_url+"controller/daily_activity/activity_save.php",
    { emp_id : emp_id, activity_date_arr : activity_date_arr, activity_type_arr : activity_type_arr,time_taken_arr : time_taken_arr, description_arr : description_arr,branch_admin_id:branch_admin_id },
    function(data) {
      $('#activity_save').prop('disabled',false);
      msg_popup_reload(data);
    });
}  
</script>
