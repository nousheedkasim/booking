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
											<a href="User/user_list" >User List</a>
										</li>
										<li class="active">
											<a href="User/user_add" >User Add</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="user_add_form" action="User/user_insert/" class="form-horizontal form-bordered" autocomplete="off">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">User Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" autocomplete="off">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">User Mobile :</label>
												<div class="col-md-6">
													<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter User Mobile">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputReadOnly">User Type:</label>
												<div class="col-md-6">
													<select id="usertype" name="usertype" class="form-control" required="">
														<option value="">Choose a Usertype</option>
														<?php foreach($usertype as $row)
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
												<label class="col-md-3 control-label" for="inputHelpText">User Branch:</label>
												<div class="col-md-6">
													<select id="branch" name="branch" class="form-control" required="">
														<option value="">Choose a User Branch</option>
														<?php foreach($branches as $row)
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
												<label class="col-md-3 control-label" for="inputRounded">Password:</label>
												<div class="col-md-6">
													<input type="password" name="password" id="password" class="form-control" autocomplete="new_password">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputFocus">Confirm Password:</label>
												<div class="col-md-6">
													<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="" id="inputPassword">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputPlaceholder">Email:</label>
												<div class="col-md-6">
													<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Mail">
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
	