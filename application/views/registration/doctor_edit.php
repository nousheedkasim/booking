				<section role="main" class="content-body" id="doctor_edit">
					<header class="page-header">
						<!--<h2>Dashboard</h2>-->
					
						<div class="right-wrapper pull-left">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<!--<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>-->
						</div>
					</header>

				
					<!-- Page Start--->
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12">
							<section class="panel">
								<header class="panel-heading">
									<!--<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>-->
									<ul class="nav nav-tabs">
										<li >
											<a href="Registration/doctor_list" >Doctor List</a>
										</li>
										<li >
											<a href="Registration/doctor_add" >Doctor Add</a>
										</li>
										<li class="active">
											<a href="Registration/doctor_edit/<?php echo $doctor_id; ?>/" >Doctor Edit</a>
										</li>
										
									</ul>
								</header>
								<div class="panel-body">
										<form id="employee_edit_form" action="Registration/doctor_update/" class="form-horizontal form-bordered" autocomplete="off">
											
											<input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor_details->doctor_id; ?>" >
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"> Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" value="<?php echo $doctor_details->doctor_name; ?>" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="address">Designation :</label>
												<div class="col-md-6">
													<input type="text" id="designation" name="designation" class="form-control" value="<?php echo $doctor_details->doctor_desig; ?>">
												</div>
											</div>
						
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="status"> Status:</label>
												<div class="col-md-6">
													<select id="usertype" name="status" id="status" class="form-control" required="">
														
														<?php foreach($status as $row)
														{
															 ?>
															<option <?php echo ($doctor_details->doctor_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
															<?php
														}
														 ?>
													</select>												
												</div>
											</div>
											
						
											
											<div class="form-group">
												<footer class="panel-footer text-right">
													<button type="reset" class="btn btn-default" id="reset">Reset</button>
													<button class="btn btn-primary" id="submit">Update</button>
												</footer>
											</div>
										</form>
									</div>
							</section>
						</div>
					</div>
					
					<!--Page End-->
				
				</section>
	