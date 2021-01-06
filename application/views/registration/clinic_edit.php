<section role="main" class="content-body" id="company_edit">
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
											<a href="Registration/company_list/" >Comapny List</a>
										</li>
										<li>
											<a href="Registration/company_registration/" >Comapny Registration</a>
										</li>
										<li class="active">
											<a href="Registration/company_edit/<?php echo $company_id; ?>/" >Comapny Edit</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="brand_add_form" action="Registration/company_update/" class="form-horizontal form-bordered" autocomplete="off">
											
											<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $company_id; ?>">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" value="<?php echo $company_details->company_name; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="address">Address :</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="2" id="address" name="address"> <?php echo $company_details->company_address; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="phone">Phone :</label>
												<div class="col-md-6">
													<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $company_details->company_phone; ?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="email">Email :</label>
												<div class="col-md-6">
													<input type="email" name="email" id="email" class="form-control" value="<?php echo $company_details->company_email; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="web">Web :</label>
												<div class="col-md-6">
													<input type="url" name="web"  id="web" class="form-control" value="<?php echo $company_details->company_web; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="tax_type">Tax Type :</label>
												<div class="col-md-6">
													<select id="tax_type" name="tax_type" class="form-control" >
														<option value="1" <?php echo ($company_details->company_tax_type==1)?'selected':''; ?>>GST</option>
														<option value="2" <?php echo ($company_details->company_tax_type==2)?'selected':''; ?>>VAT</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="tax_number">Tax Number :</label>
												<div class="col-md-6">
													<input type="text" name="tax_number" id="tax_number" class="form-control" value="<?php echo $company_details->company_tax_number; ?>">
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
			