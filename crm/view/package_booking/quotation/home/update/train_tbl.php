<div class="row">
    <div class="col-xs-12 text-right mg_bt_20_sm_xs">
        <button type="button" class="btn btn-excel btn-sm" onClick="addRow('tbl_package_tour_quotation_dynamic_train');city_lzloading('.train_from', '*From', true);city_lzloading('.train_to', '*To', true);"><i class="fa fa-plus"></i></button>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
        <table id="tbl_package_tour_quotation_dynamic_train" name="tbl_package_tour_quotation_dynamic_train" class="table table-bordered pd_bt_51">

        	<?php 
        	$sq_train_count = mysqli_num_rows(mysqlQuery("select * from package_tour_quotation_train_entries where quotation_id='$quotation_id'"));
        	if($sq_train_count==0){
        		?>
				<tr>
	                <td><input class="css-checkbox" id="chk_tour_group1" type="checkbox"><label class="css-label" for="chk_tour_group1"> <label></td>
	                <td><input maxlength="15" value="1" type="text" name="username" placeholder="Sr. No." class="form-control" disabled /></td>
	                <td class="col-md-3"><select id="train_from_location1" onchange="validate_location('train_from_location1', 'train_to_location1')" name="train_from_location1" title="From Location" class="app_select2 form-control train_from" style="width:100%">
			                <option value="">From</option>
			            </select></td>
	                 <td class="col-md-3"><select id="train_to_location1" onchange="validate_location('train_from_location1', 'train_to_location1')"  name="train_to_location1" class="app_select2 form-control train_to" title="To Location" style="width:100%">
		                <option value="">To</option>
		            </select></td>
		            <td class="col-md-2"><select name="train_class" id="train_class1" title="Class">
				            	<option value="">Class</option>
				            	<?php get_train_class_dropdown(); ?>
		            </select></td>
		            <td><input type="text" id="train_departure_date1" name="train_departure_date" placeholder="Departure Date and time" title="Departure Date and time" class="app_datetimepicker" onchange="get_to_datetime(this.id,'train_arrival_date1')" value="<?= date('d-m-Y H:i') ?>" style="width:180px"></td>
		            <td><input type="text" id="train_arrival_date1" name="train_arrival_date" placeholder="Arrival Date and time" title="Arrival Date and time" class="app_datetimepicker" value="<?= date('d-m-Y H:i') ?>" onchange="validate_validDatetime('train_departure_date1',this.id)" style="width:180px"></td>
	            </tr>   	              
		            <script>
		            	$('#train_arrival_date1, #train_departure_date1').datetimepicker({ timepicker:true, format:'d-m-Y H:i' });
		            	$('#train_from_location1, #train_to_location1').select2();
						city_lzloading('.train_from', '*From', true);
						city_lzloading('.train_to', '*To', true);
		            </script>       
        		<?php
        	}
        	else{
        		$count = 0;
        		$sq_q_train = mysqlQuery("select * from package_tour_quotation_train_entries where quotation_id='$quotation_id'");
        		while($row_q_train = mysqli_fetch_assoc($sq_q_train)){
        			$count++;
        			?>
					<tr>
		                <td><input class="css-checkbox" id="chk_tour_group<?= $count ?>_1" type="checkbox" checked><label class="css-label" for="chk_tour_group<?= $count ?>_1"> <label></td>
		                <td><input maxlength="15" value="<?= $count ?>" type="text" name="username" placeholder="Sr. No." class="form-control" disabled /></td>
		                <td><select id="train_from_location<?= $count ?>_1" onchange="validate_location('train_to_location<?= $count ?>_1' , 'train_from_location<?= $count ?>_1')" class="app_select2 form-control train_from" name="train_from_location" title="From Location" style="width:100%">
									<option value="<?= $row_q_train['from_location'] ?>"><?= $row_q_train['from_location'] ?></option>
			                		<option value="">From</option>
				            </select>
		                </td>
		                 <td><select id="train_to_location<?= $count ?>_1" onchange="validate_location('train_from_location<?= $count ?>_1' , 'train_to_location<?= $count ?>_1')" class="app_select2 form-control train_to" name="train_to_location" title="To Location" style="width:100%">
		                 	    <option value="<?= $row_q_train['to_location'] ?>"><?= $row_q_train['to_location'] ?></option>
			                	<option value="">To</option>	
			            </select></td>
			            <td><select name="train_class" id="train_class1" class="form-control" title="Class" style="width:100%">
			            	<?php if($row_q_train['class']!=''){ ?>
			            	<option value="<?= $row_q_train['class'] ?>"><?= $row_q_train['class'] ?></option>
			            	<?php }?>
			            	<option value="">Class</option>
			            	<?php get_train_class_dropdown(); ?>
			            </select></td>
			            <td><input type="text" id="train_departure_date<?= $count ?>_u" name="train_departure_date" placeholder="Departure Date and time" title="Departure Date and time" class="app_datetimepicker" onchange="get_to_datetime(this.id,'train_arrival_date<?= $count ?>_u')" value="<?= get_datetime_user($row_q_train['departure_date']) ?>" style="width:180px"></td>
			            <td><input type="text" id="train_arrival_date<?= $count ?>_u" name="train_arrival_date" placeholder="Arrival Date and time" title="Arrival Date and time" class="app_datetimepicker" value="<?= get_datetime_user($row_q_train['arrival_date']) ?>" onchange="validate_validDatetime('train_departure_date<?= $count ?>_u',this.id)" style="width:180px"></td>
			            <td class="hidden"><input type="text" value="<?= $row_q_train['id'] ?>"></td>
		            </tr>          
		            <script>
		            	$('#train_arrival_date<?= $count ?>_u, #train_departure_date<?= $count ?>_u').datetimepicker({ timepicker:true, format:'d-m-Y H:i' });
		            	$('#train_from_location<?= $count ?>_1, #train_to_location<?= $count ?>_1').select2();
						city_lzloading('.train_from', '*From', true);
						city_lzloading('.train_to', '*To', true);
		            </script>
        			<?php
        		}
        	}
        	?>
        </table>
        </div>
    </div>
</div> 