<section role="main" class="content-body" id="clinic_registration">
	<!-- Page Start--->
	<div class="row">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<section class="panel">
				<header class="panel-heading">
					
					<ul class="nav nav-tabs">
						<li >
							<a href="registration/clinic_list/" >Clinic List</a>
						</li>
						<li class="active">
							<a href="registration/clinic_registration/" >Clinic Registration</a>
						</li>
					</ul>
				</header>
				<div class="panel-body">
						<form id="brand_add_form" action="Registration/clinic_insert/" class="form-horizontal form-bordered" autocomplete="off">
							<div class="form-group">
								<label class="col-md-3 control-label" for="clinic_name"> Clinic Name :</label>
								<div class="col-md-6">
									<input type="text" name="clinic_name" id="clinic_name" class="form-control" placeholder="Clinic Name" autocomplete="off">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label" for="login_id"> Login Id :</label>
								<div class="col-md-6">
									<input type="text" name="login_id" id="login_id" class="form-control" placeholder="Login Id" autocomplete="off">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label" for="password"> Password:</label>
								<div class="col-md-6">
									<input type="password" name="password" id="password" class="form-control"  autocomplete="new_password">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label" for="confirm_password"> Confirm Paaword :</label>
								<div class="col-md-6">
									<input type="password" name="confirm_password" id="confirm_password" class="form-control" autocomplete="new_password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="location">Location :</label>
								<div class="col-md-6">
									<input type="text" name="location" id="location" class="form-control">
								</div>
							</div>
		
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone :</label>
								<div class="col-md-6">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="Mobile">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email:</label>
								<div class="col-md-6">
									<input type="email" name="email" id="email" class="form-control" placeholder="Mail">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Break From:</label>
								<div class="col-md-3">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</span>
											<input type="text" data-plugin-timepicker class="form-control" name="break_from" id="break_from" data-plugin-options='{ "minuteStep": 15 }'>
										</div>
								</div>
							</div>
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" for="email">Break To:</label>
								<div class="col-md-3">
									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</span>
										<input type="text" data-plugin-timepicker class="form-control" name="break_to" id="break_to" data-plugin-options='{ "minuteStep": 15 }'>
									</div>
									
									
								</div>
							</div>
							
							
							
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" for="inputSuccess"> Working Days:</label>
								<div class="col-md-6">
									
									
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="monday" name="monday" value="1">
													 Monday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="monday_from" id="monday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="monday_to" id="monday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="tuesday" name="tuesday" value="1">
													 Tuesday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="tuesday_from" id="tuesday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="tuesday_to" id="tuesday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="wednesday" name="wednesday" value="1">
													 Wednesday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="wednesday_from" id="wednesday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="wednesday_to" id="wednesday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="thursday" name="thursday" value="1">
													 Thursday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="thursday_from" id="thursday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="thursday_to" id="thursday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="friday" name="friday" value="1">
													 Friday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="friday_from" id="friday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="friday_to" id="friday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="saturday" name="saturday" value="1">
													 Saturday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="saturday_from" id="saturday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="saturday_to" id="saturday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p-none">
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="sunday" name="sunday" value="1">
													 Sunday
												</label>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">From:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="sunday_from" id="sunday_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 p-none">
											<div class="form-group">
												<label class="col-md-3 control-label">To:</label>
													<div class="col-md-7">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="sunday_to" id="sunday_to" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
													</div>
											</div>
										</div>
									</div>
								</div>
							</div>
		
							<div class="form-group mt-xl">
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
			