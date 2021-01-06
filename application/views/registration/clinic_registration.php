<section role="main" class="content-body" id="clinic_registration">
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
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									
									<ul class="nav nav-tabs">
										<li >
											<a href="Registration/clinic_list/" >Clinic List</a>
										</li>
										<li class="active">
											<a href="Registration/clinic_registration/" >Clinic Registration</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="brand_add_form" action="Registration/clinic_insert/" class="form-horizontal form-bordered" autocomplete="off">
										<div class="form-group">
												<label class="col-md-3 control-label" for="name"> Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" autocomplete="off">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="location">Location :</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="2" id="location" name="location"></textarea>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="phone">Phone :</label>
												<div class="col-md-6">
													<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter User Mobile">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="email">Email:</label>
												<div class="col-md-6">
													<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Mail">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess"> Working Days:</label>
												<div class="col-md-6">
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															 Monday
														</label>
													</div>
						
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															Tuesday
														</label>
													</div>
						
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															 Wednesday
														</label>
													</div>
						
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															THursday
														</label>
													</div>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															 Friday
														</label>
													</div>
						
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															Saturday
														</label>
													</div>

												<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															Sunday
														</label>
													</div>										
													</div>
													</div>

											
											<div class="form-group">
												<label class="col-md-3 control-label">Working From:</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control" name="working_from" id="working_from" data-plugin-options='{ "minuteStep": 15 }'>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Working To:</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control" name="working_to" id="working_to" data-plugin-options='{ "minuteStep": 15 }'>
													</div>
												</div>
											</div>
						
											<div class="form-group">
												<footer class="panel-footer text-right">
													<button type="reset" class="btn btn-default" id="reset">Reset</button>
													<button class="btn btn-primary" id="submit">Submit</button>
												</footer>
											</div>
										</form>
									</div>
							</section>
						</div>
					</div>
					
					<!--Page End-->
				
				</section>
			