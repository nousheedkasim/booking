<style>
	@media (max-width: 768px) {
	  .float-right-sm {
		float: right;
	  }
	}

	/* Float to the right on screens that are equal to or greater than 769px wide */
	@media (min-width: 769px) {
	  .float-right-lg {
		float: right;
	  }
	}
	.booked{
		
		background-color: #47a447;
	}
	.hover{
		background-color: #cccccc;
		
	}
	.bg-hash{
		background-color: #d5dadc;
		border-color: #cbd8de;
		color: #252323;
	}
	
</style>
<?php 
	$offset=4;
	$hide='';
	if($this->user_data['user_type']!=1){ 
		$offset=6;
		$hide="hide";
	}
?>
	
	<link rel="stylesheet" type="text/css" href="assets/vendor/time-schedule/css/mark-your-calendar.css">
	
		<div class="container">
		  <!-- Trigger the modal with a button -->
		  <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Booking Edit</h4>
				</div>
				<form id="booking_edit_form" class="form-horizontal mb-lg" novalidate="novalidate">
					<div class="panel-body">
						<input type="hidden" id="booking_edit_id" name="booking_id" value="">
						<div class="form-group mb-none">
							<label class="col-sm-3 control-label">Diagnose</label>
							<div class="col-sm-9">
								<select id="booking_diagnose_edit" name="diagnosis_id" data-plugin-select class="form-control mt-xs" required="">
												
												<?php foreach($diagnoses as $row){?>
												<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
												<?php } ?>
								</select>
							</div>	
						</div>
						<div class="form-group mb-none">
							<label class="col-sm-3 control-label">Clinic</label>
							<div class="col-sm-9">
								<select id="booking_clinic_edit" name="clinic_id" data-plugin-select class="form-control mt-xs" required="">
											
											<?php foreach($clinics as $row){ ?>
											<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
											<?php
											} ?>
										</select>
							</div>	
						</div>
						
						<div class="form-group mb-none mt-xs">
							<label class="col-sm-3 control-label">Doctor</label>
							<div class="col-sm-9">
								<select id="booking_doctor_edit" name="doctor_id" class="form-control mt-xs" required="">
											
										</select>
							</div>	
						</div>
						
						<div class="form-group mb-none">
							<label class="col-sm-3 control-label">Status</label>
							<div class="col-sm-9">
								<select id="booking_status_edit" name="booking_status_edit"  class="form-control mt-xs" required="">
												
												<?php foreach($status as $row){?>
												<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
												<?php } ?>
								</select>
							</div>	
						</div>
						
						<div class="form-group mb-none">
							<label class="col-sm-3 control-label">Date</label>
							<div class="col-sm-9">
								<input type="text" data-plugin-datepicker=""  class="form-control mt-xs" id="booking_date_edit">
							</div>	
						</div>
						
						<div class="form-group mb-none">
							<label class="col-sm-3 control-label">Time</label>
							<div class="col-sm-9">
								<input type="text"  name="actual_time" class="form-control mt-xs" id="booking_time_edit">
							</div>	
						</div>
						
						<div class="container1 mt-xs">
										<div id="picker_edit"></div>
										
									 </div>
						
						
						
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-12 text-right">
								<button class="btn btn-primary modal-confirm" id="booking_update">Update</button>
								 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</footer>
				</form>
			  </div>
			  
			</div>
		  </div>
		  
		</div>
    
		<section role="main" class="content-body" id="reception">
			
			
			<!-- start: page -->

			<div class="row">
			
				
				
				
				
				<div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 bt_mg">
				
				
						<section class="panel mb-xs panel-featured-left panel-featured-info mb-xs">
							<div class="panel-body p-xs">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-none">
						
									<div class="widget-summary">
										<div class="widget-summary-col" style="vertical-align:middle !important;">
											<div class="summary" style="min-height: 10px;">
												<h4 class="title">Appoinment</h4>
												
											</div>
										</div>
										<div class="widget-summary-col widget-summary-col-icon">
											<div id="appoinment_count" class="summary-icon-md bg-info rounded mb-0" style="padding: 0px 5px 2px 5px; font-size:25px;">
												0
											</div>
										</div>
									</div>
								
								</div>
							</div>
						</section>
						<section class="panel mb-xs panel-featured-left panel-featured-success mb-xs">
							<div class="panel-body p-xs">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-none">
						
									<div class="widget-summary">
										<div class="widget-summary-col" style="vertical-align:middle !important;">
											<div class="summary" style="min-height: 10px;">
												<h4 class="title">Confirm</h4>
												
											</div>
										</div>
										<div class="widget-summary-col widget-summary-col-icon">
											<div id="confirm_count" class="summary-icon-md bg-success rounded mb-0" style="padding: 0px 5px 2px 5px; font-size:25px;">
												0
											</div>
										</div>
									</div>
								
								</div>
							</div>
						</section>
						<!--<section class="panel mb-xs panel-featured-left panel-featured-warning mb-xs">
							<div class="panel-body p-xs">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-none">
						
									<div class="widget-summary">
										<div class="widget-summary-col" style="vertical-align:middle !important;">
											<div class="summary" style="min-height: 10px;">
												<h4 class="title">Cancel</h4>
												
											</div>
										</div>
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon-md bg-warning rounded mb-0" style="padding: 0px 5px 2px 5px; font-size:25px;">
												999
											</div>
										</div>
									</div>
								
								</div>
							</div>
						</section>-->
				
					<section class="panel mb-xs">
							<div class="panel-body">
								<form id="booking_form" method="post">
									<select id="patient" name="patient_name" class="form-control">
										<option>Search Patient</option>
									</select>
									<input class="form-control mt-xs hide" type="text" name="user_id" id="user_id" value="9">
									<input class="form-control mt-xs hide" type="text" name="patient_id" id="patient_id">
									<input class="form-control mt-xs hide" type="hidden" name="status" id="status">
									<input class="form-control mt-xs" type="text" name="patient_mobile" id="mobile" placeholder="Mobile" maxlength="10">
									<input class="form-control mt-xs" type="text" data-plugin-datepicker="" data-plugin-masked-input="" data-input-mask="99/99/9999" name="patient_dob"  id="dob" placeholder="DOB">
									<textarea class="form-control mt-xs" Placeholder="Address" id="patient_address" name="patient_address"></textarea>
									<input class="form-control mt-xs" type="text" name="place" id="place" placeholder="Place" >

									<div class="mt-xs">
										<select id="gender" name="patient_gender" class="form-control mt-xs" style="margin-top:5px;" required="">
											<option value="">Gender</option>
											<option value="1">Male</option>
											<option value="2">Female</option>
										</select>
									</div>
									<textarea class="form-control hide " placeholder="Address" id="address">aaaa</textarea>
									<div class="mt-xs">
										<select id="diagnose" name="diagnosis_id" data-plugin-select class="form-control mt-xs" required="">
											<option value="">Diagnose</option>
											<?php foreach($diagnoses as $row){?>
											<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
											<?php } ?>
										</select>
										<input type="hidden" id="duration" name="diagnosis_duration">
									</div>
									<div class="mt-xs">
										<select id="clinic" name="clinic_id" data-plugin-select class="form-control mt-xs" required="">
											<option value="">Choose a Clinic</option>
											<?php foreach($clinics as $row){ ?>
											<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
											<?php
											} ?>
										</select>
									</div>
									<div class="mt-xs">
										<select id="doctor" name="doctor_id" class="form-control mt-xs" required="">
											<option value="">Choose a Doctor</option>
										</select>
									</div>
									
									<input type="text" data-plugin-datepicker="" name="booking_date" class="form-control mt-xs hide" id="booking_date" disabled>

									<div class="container1 mt-xs">
										<div id="picker"></div>
										
									 </div>
									 <input type="hidden" name="actual_time" id="selected-dates">
									<button  id="booking_btn" class="mb-xs mt-xs mr-xs btn btn-sm  btn-block btn-primary" disabled>Book</button>

									
								</form>
							</div>
						</section>
				</div>
				
				
				
				
					
					
					
				<div class="col-sm-9 col-md-9 col-lg-10 col-xl-10 bt_mg bt_pl_none">
				
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-none bt_m_y col-lg-offset-<?php echo $offset; ?> col-xl-offset-<?php echo $offset; ?>">
						
						
						<div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 mb-xs">
							
								<div class="panel-body p-none">
									<input type="text" data-plugin-datepicker="" autocomplete="off" name="booking_list_date" id="booking_list_date" value="<?php echo date("d/m/Y"); ?>" class="form-control">
								</div>
							
						</div>
						
						<div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 mb-xs <?php echo $hide; ?>">
							<div class="panel-body p-none">
								<select id="booking_list_clinic" name="booking_list_clinic" data-plugin-select class="form-control mt-xs" required="">
									<option value="0">Choose a Clinic</option>
									<?php foreach($clinics as $row){ ?>
									<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
									<?php
									} ?>
								</select>
							</div>			
						</div>
						
						<div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 mb-xs">
							
								<div class="panel-body p-none">
									
										<select id="booking_list_doctor" name="booking_list_doctor" class="form-control" >
											<option value="0">Choose a Doctor</option>
										</select>
									
								</div>
							
						</div>
						<div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 mb-xs">
							
							
								<div class="panel-body p-none">
									<select id="booking_list_patient" name="booking_list_patient" class="form-control" >
											<option value="0">Patient</option>
										</select>
								</div>
							
						</div>
				
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bt_m_y mt-xs bt_pl_none bt_pr_none" style="font-size:15px;" id="booking_list_div">
						<!--  data append from jquery--->
					</div>
						
						</div>
						</section>
					
					</div>
				

			</div>
			<!-- end: page -->
			
		</section>
				
			
		</section>
		
