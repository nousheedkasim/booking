<section role="main" class="content-body" id="allocation">
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
											<a href="registration/allocation_list" >Allocation List</a>
										</li>
										<li class="active">
											<a href="registration/allocation" >Allocation</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="user_add_form" action="Registration/allocation_insert/" class="form-horizontal form-bordered" autocomplete="off">
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Clinic:</label>
												<div class="col-md-6">
													<select id="clinic" name="clinic" class="form-control" >
														<option value="">Choose a Clinic</option>
														<?php foreach($clinic as $row)
														{
															 ?>
															<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
															<?php
														}
														 ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Doctor:</label>
												<div class="col-md-6">
													<select id="doctor" name="doctor" class="form-control">
														<option value="1">Choose a Doctor</option>
														<?php foreach($doctor as $row)
														{
															 ?>
															<option value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
															<?php
														}
														 ?>
													</select>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="block_from">Block From:</label>
												<div class="col-md-3">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
															<input type="text" data-plugin-timepicker class="form-control" name="block_from" id="block_from" data-plugin-options='{ "minuteStep": 15 }'>
														</div>
												</div>
											</div>
											
											<div class="form-group">
												
												<label class="col-md-3 control-label" for="block_to">Block To:</label>
												<div class="col-md-3">
													
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control" name="block_to" id="block_to" data-plugin-options='{ "minuteStep": 15 }'>
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
											
                                            
												
												<div class="form-group">
													<footer class="panel-footer text-right">
														<button type="reset" class="btn btn-default" id="reset">Reset</button>
														<button class="btn btn-primary" id="submit">Submit</button>
													</footer>
												</div>
											</div>
						
											
											
										</form>
									</div>
							</section>
						</div>
					</div>
					
					<!--Page End-->
				
				</section>
	