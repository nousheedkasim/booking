<section role="main" class="content-body">
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
						<div class="col-md-12 col-lg-12 col-xl-12">
							<section class="panel">
								<header class="panel-heading">
									<!--<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>-->
									<ul class="nav nav-tabs">

										<li class="active">
											<a href="Registration/patient_exist/" >Exist Patient</a>
										</li>
                                        <li >
											<a href="Registration/patient_new/" >New Patient</a>
										</li>
									</ul>
								</header>
                                    <div class="panel-body">
                                        <form id="patient_add_form" action="Registration/patient_insert/" class="form-horizontal form-bordered" autocomplete="off">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">Patient Name :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Patient Name" autocomplete="off">
                                                </div>
										</div>
                                        <div class="form-group">
											<label class="col-md-3 control-label" for="textareaDefault">Address :</label>
											<div class="col-md-6">
												<textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140"></textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-3 control-label" for="name">Mobile :</label>
											<div class="col-md-6">
												<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" autocomplete="off">
											</div>
										</div>
                                        <div class="form-group">
												<label class="col-md-3 control-label">Date of Birth</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker class="form-control">
													</div>
												</div>
											</div>
                                            <div class="form-group">
											<label class="col-sm-3 control-label">Gender :</label>
											<div class="col-sm-6">
												<select id="clinic" class="form-control" required>
													<option value="">Choose a Gender</option>
													<option value="apple">Male</option>
													<option value="google">Female</option>
												</select>
												<label class="error" for="patient"></label>
											</div>
										</div>    
                                        <div class="form-group">
											<label class="col-sm-3 control-label">Clinic :</label>
											<div class="col-sm-6">
												<select id="clinic" class="form-control" required>
													<option value="">Choose a Clinic</option>
													<option value="apple">Afsal</option>
													<option value="google">Noushid</option>
												</select>
												<label class="error" for="patient"></label>
											</div>
										</div> 
                                        <div class="form-group">
											<label class="col-sm-3 control-label">Doctor :</label>
											<div class="col-sm-6">
												<select id="patient" class="form-control" required>
													<option value="">Choose a Doctor</option>
													<option value="apple">Afsal</option>
													<option value="google">Noushid</option>
												</select>
												<label class="error" for="patient"></label>
											</div>
										</div>
                                        <div class="form-group">
												<label class="col-md-3 control-label">Appointment Date :</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker class="form-control">
													</div>
												</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-3 control-label">Diagnose :</label>
											<div class="col-sm-6">
												<select id="patient" class="form-control" required>
													<option value="">Choose a Diagnose</option>
													<option value="apple">Afsal</option>
													<option value="google">Noushid</option>
												</select>
												<label class="error" for="patient"></label>
											</div>
										</div>
										<div class="form-group">
											<footer class="panel-footer text-right">
												<button type="reset" class="btn btn-default" id="reset">Reset</button>
												<button class="btn btn-primary" id="submit">Submit</button>
											</footer>
										</div>                                        										
								</form>			
							</section>
						</div>
					</div>					
					<!--Page End-->				
				</section>
	