				<section role="main" class="content-body" id="supplier_add">
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
											<a href="Registration/supplier_list" >Supplier List</a>
										</li>
										<li class="active">
											<a href="Registration/supplier_add" >Supplier Add</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
									<form id="supplier_add_form" action="Registration/supplier_insert/" class="form-horizontal form-bordered" autocomplete="off">
										<div class="form-group">
											<label class="control-label col-md-3" for="name">Supplier Name :</label> 
											<div class="col-md-6">
												<input type="text" name="name" id="name" class="form-control" placeholder="Enter Supplier Name" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="address"> Address :</label>
											<div class="col-md-6">
												<textarea class="form-control" rows="4" id="address" name="address"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3" for="tin"> Tax No:</label> 
											<div class="col-md-6">
												<input type="text" name="tin" id="tin" class="form-control" placeholder="Enter Tax No" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="phone"> Phone :</label>
											<div class="col-md-6">
												<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="mobile"> Mobile :</label>
											<div class="col-md-6">
												<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="email"> Email :</label>
											<div class="col-md-6">
												<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="payment_method"> Payment Metohod :</label>
											<div class="col-md-6">
												<select id="payment_method" name="payment_method" class="form-control" required="">
												<option value="-1">Choose a Payment Metohod</option>
														
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
	