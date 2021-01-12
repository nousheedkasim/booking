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
#booking_table > tbody > tr > td{ line-height: 1.7;}
</style>
	
	<link rel="stylesheet" type="text/css" href="assets/vendor/time-schedule/css/mark-your-calendar.css">
    
		<section role="main" class="content-body" id="reception">
			<header class="page-header">
				<div class="right-wrapper pull-left">
					<ol class="breadcrumbs">
						<li>
							<a href="index.html">
								<i class="fa fa-home"></i>
							</a>
						</li>
						<li><span>Dashboard</span></li>
					</ol>
				</div>
			</header>
			
			<!-- start: page -->

			<div class="row">
			
				
				
				<div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 p-none float-right-lg ">
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
						<section class="panel panel-featured-left panel-featured-info mb-xs">
							<div class="panel-body pt-sm pb-xs">
								<div class="widget-summary">
									<div class="widget-summary-col" style="vertical-align:middle !important;">
										<div class="summary" style="min-height: 10px;">
											<h4 class="title">Appoinment</h4>
										</div>
									</div>
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon-md bg-info rounded mb-0" style="padding: 0px 5px 2px 5px; font-size:25px;">
											999
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
						<section class="panel panel-featured-left panel-featured-success mb-xs">
							<div class="panel-body pt-sm pb-xs">
								<div class="widget-summary">
									<div class="widget-summary-col" style="vertical-align:middle !important;">
										<div class="summary" style="min-height: 10px;">
											<h4 class="title">Check-In</h4>
											
										</div>
									</div>
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon-md bg-success rounded mb-0" style="padding: 0px 5px 2px 5px; font-size:25px;">
											999
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
						<section class="panel panel-featured-left panel-featured-warning mb-xs">
							<div class="panel-body pt-sm pb-xs">
								<div class="widget-summary">
									<div class="widget-summary-col" style="vertical-align:middle !important;">
										<div class="summary" style="min-height: 10px;">
											<h4 class="title">Check-Out</h4>
											
										</div>
									</div>
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon-md bg-warning rounded mb-0" style="padding: 0px 5px 2px 5px; font-size:25px;">
											999
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
				
				<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
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
									<input class="form-control mt-xs" type="text" data-plugin-datepicker="" data-plugin-masked-input="" data-input-mask="99/99/9999" placeholder="__/__/____" name="patient_dob"  id="dob" placeholder="DOB">
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
				
				
				
				
					
					
					
				<div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
						
						
						<section class="panel mb-xs">
						
						<div class="panel-body">
						<?php if(count($bookings)>0){ ?>
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none" id="booking_table">
									<thead>
										<tr>
										<?php 
										foreach($bookings['th'] as $key=>$th){ 
											$width= 93/count($bookings['th']);
											if($key==0){
												$width=7;
											}
										?>
											<th class="text-right" width="<?php echo $width.'%';?>"><?php echo $th['name']; ?></th>
											
										<?php
										} ?>
											
										</tr>
									</thead>
									<tbody>
										<?php  
										foreach($bookings['tr'] as $tr){ 
										?>
										<tr>
										
											<?php 
											foreach($tr as $key=> $td){ 
											
												$data='';
												$class='';
												$booking_id=null;
												if(!empty($td)) { 
													if($key==0){
														$data=$td[0]; 
														//echo $td[0].'-'.$td[1]; 
														$class='solot';
													}
													else{
														$class='text-right';
														$data=$td->patient_name;
														$booking_id=$td->booking_id;
														if($td->status_id==1){
															$class=$class.' bg-success';
														}
													}
												} ?><td booking-id="<?php echo $booking_id; ?>" class="<?php echo $class; ?>"><?php echo $data; ?> </td>
												
											<?php	
											 }
											
											
											 /*foreach($tr as $key=> $td){ ?>
											
												<td class="text-right"> <?php  if(!empty($td)) { 
													if($key==0){
														echo $td[0]; 
														//echo $td[0].'-'.$td[1]; 
													}
													else{
													}
												} ?></td>
												
											<?php	
											 }*/
											?>
										</tr>
										<?php
										} ?>
										<!--<tr>
											<td>S1</td>
											
											<td class="text-right booked" rowspan="2" >Tk-1:Rahul</td>
											<td class="text-right">-0.01</td>
											<td class="text-right">-0.36%</td>
											
										</tr>
										<tr>
											<td>S2</td>
											
											
											<td class="text-right">-0.01</td>
											
										<td class="text-right actions-hover">
															ttt
											</td>
											
										</tr>-->
									</tbody>
								</table>
							</div>	
						<?php } ?>
						</div>
						</section>
					
					</div>
				

			</div>
			<!-- end: page -->
			
		</section>
				
			
		</section>
		
