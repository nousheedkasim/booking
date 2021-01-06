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
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									<!--<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>-->
									<ul class="nav nav-tabs">
										<li >
											<a href="Registration/service_head_list/" >Service Head List</a>
										</li>
										<li class="active">
											<a href="Registration/service_head_add" >Service Head Add</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="service_head_add_form" action="Registration/service_head_insert/" class="form-horizontal form-bordered" autocomplete="off">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"> Title :</label>
												<div class="col-md-6">
													<input type="text" name="title" id="title" class="form-control" placeholder="Enter Service Head Title" autocomplete="off">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="code"> Code :</label>
												<div class="col-md-6">
													<input type="text" name="code" id="code" class="form-control" placeholder="Enter Service Head code">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="amount"> Amount :</label>
												<div class="col-md-6">
													<input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Service Head Amount">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" for="group"> Group :</label>
												<div class="col-md-6">
													<select id="group" name="group" class="form-control" required="">
													<option value="-1">Choose a Group</option>
													<?php foreach($service_group as $row){ ?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
													<?php } ?>
															
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
									</div>
							</section>
						</div>
					</div>
					
					<!--Page End-->
				
				</section>
			