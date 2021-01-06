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
												<label class="col-md-3 control-label">Patient Name :</label>
												<div class="col-md-6">
													<select data-plugin-selectTwo class="form-control populate">
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
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
												<label class="col-md-3 control-label"> Diagnose :</label>
												<div class="col-md-6">
													<select data-plugin-selectTwo class="form-control populate">
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="OR">Oregon</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="ID">Idaho</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NM">New Mexico</option>
															<option value="ND">North Dakota</option>
															<option value="UT">Utah</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="IL">Illinois</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="OK">Oklahoma</option>
															<option value="SD">South Dakota</option>
															<option value="TX">Texas</option>
															<option value="TN">Tennessee</option>
															<option value="WI">Wisconsin</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="IN">Indiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="OH">Ohio</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
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
								