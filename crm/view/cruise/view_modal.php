<?php 

include "../../model/model.php";

 

$cruise_id = $_POST['cruise_id'];

$sq_cruise= mysqli_fetch_assoc(mysqlQuery("select * from cruise_master where cruise_id='$cruise_id'"));
$mobile_no = $encrypt_decrypt->fnDecrypt($sq_cruise['mobile_no'], $secret_key);
$email_id = $encrypt_decrypt->fnDecrypt($sq_cruise['email_id'], $secret_key);

 

?>

<div class="modal fade profile_box_modal" id="cruise_view_modal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">

  	<div class="modal-dialog modal-lg" role="document">

    	<div class="modal-content">

      		<div class="modal-body profile_box_padding">

      	

	      		<div>

				  <!-- Nav tabs -->

				  	<ul class="nav nav-tabs" role="tablist">

				    	<li role="presentation" class="active"><a href="#basic_information" aria-controls="home" role="tab" data-toggle="tab" class="tab_name">Cruise Supplier Information</a></li>

				    	<li class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

				  	</ul>



		            <div class="panel panel-default panel-body fieldset profile_background">

						<!-- Tab panes1 -->

						<div class="tab-content">

						    <!-- *****TAb1 start -->

						    <div role="tabpanel" class="tab-pane active" id="basic_information">

						     	<div class="row">

									<div class="col-md-12">

										<div class="profile_box main_block">

							        	<?php 

							        		$sq_city = mysqli_fetch_assoc(mysqlQuery("select * from city_master where city_id='$sq_cruise[city_id]'")); 

							        	?>

							        		<div class="row">

           										<div class="col-md-6 right_border_none_sm" style="border-right: 1px solid #ddd">

							        				<span class="main_block"> 

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>City Name <em>:</em></label> " .$sq_city['city_name']; ?>

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Company Name <em>:</em></label> " .$sq_cruise['company_name']; ?> 

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Mobile No <em>:</em></label> " .$mobile_no ; ?>

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Landline No <em>:</em></label> " .$sq_cruise['landline_no']; ?>

							        				</span>

							        				<span class="main_block"> 

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Email ID <em>:</em></label> " .$email_id; ?>

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Contact Person <em>:</em></label> " .$sq_cruise['contact_person_name']; ?> 

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Emergency Contact  <em>:</em></label> " .$sq_cruise['immergency_contact_no']; ?>

							        				</span>
							        				<span class="main_block">

							        				<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i> 

													<?php 

														$getState = mysqli_fetch_assoc(mysqlQuery('select * from state_master where id="'.$sq_cruise['state'].'"'));
															$stateName = !empty($getState) ? $getState['state_name'] : null;
														?>
							        				    <?php echo "<label>State/Country <em>:</em></label> ".$stateName; ?>

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Website <em>:</em></label> " .$sq_cruise['website']; ?>

							        				</span>
													<span class="main_block">

														<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

														<?php echo "<label>Address <em>:</em></label> " .$sq_cruise['cruise_address']; ?>

													</span>

							        			</div>

							        			<div class="col-md-6">
							        				
									        		<span class="main_block"> 

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Bank Name <em>:</em></label> " .$sq_cruise['bank_name']; ?>

							        				</span>
							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Account Type <em>:</em></label> " .$sq_cruise['account_name']; ?> 

							        				</span>
							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Account No <em>:</em></label> " .$sq_cruise['account_no']; ?> 

							        				</span>

							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Branch <em>:</em></label> " .$sq_cruise['branch']; ?>

							        				</span>
							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>IFSC/SWIFT CODE <em>:</em></label> " .$sq_cruise['ifsc_code']; ?>

							        				</span>
							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Personal Identification No(PIN) <em>:</em></label> " .strtoupper($sq_cruise['pan_no']); ?>

							        				</span>
							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Tax No <em>:</em></label> " .strtoupper($sq_cruise['service_tax_no']) ?>

							        				</span>
													<span class="main_block">

														<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

														<?php echo "<label> Opening Balance <em>:</em></label> " .$sq_cruise['opening_balance']; ?>

													</span>
													<span class="main_block">

														<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

														<?php echo "<label> Balance Side <em>:</em></label> " .$sq_cruise['side']; ?>

													</span>

							        				

							        				
							        				<span class="main_block">

							        					<i class="fa fa-angle-double-right cost_arrow" aria-hidden="true"></i>

							        				    <?php echo "<label>Status <em>:</em></label> " .$sq_cruise['active_flag']; ?> 

							        				</span>

								    			</div> 

								    		</div>
											<div class="row">
												<div class="col-md-12">

													
												</div> 
											</div>

								    	</div>

								    </div>



								</div>  

						    </div>

						    <!-- ********Tab1 End******** --> 

						</div>

					</div>

		        </div>

    		</div>

    	</div>

	</div>

</div>



<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>

<script>

$('#cruise_view_modal').modal('show');

</script>  

 

