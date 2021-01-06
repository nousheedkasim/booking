<section role="main" class="content-body" id="branch_add">
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
											<a href="Registration/doctor_list/" >Doctor List</a>
										</li>
										<li class="active">
											<a href="Registration/doctor_add/" >Doctor Add</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="brand_add_form" action="Registration/doctor_insert/" class="form-horizontal form-bordered" autocomplete="off">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name:</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" placeholder="Enter Doctor Name" autocomplete="off">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="designation">Designation:</label>
												<div class="col-md-6">
													<input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation " autocomplete="off">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="password">Password:</label>
												<div class="col-md-6">
													<input type="password" name="password" id="password" class="form-control" autocomplete="new_password">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="confirm_password">Confirm Password:</label>
												<div class="col-md-6">
													<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="" id="inputPassword">
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
			