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
											<a href="Registration/product_list/" >Product List</a>
										</li>
										<li class="active">
											<a href="Registration/product_add/" >Product Add</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
									<form id="product_add_form" action="Registration/product_insert/" class="form-horizontal form-bordered" autocomplete="off">

										<div class="form-group">
											<label class="col-md-3 control-label" for="name">Name :</label>
											<div class="col-md-6">
												 
												<input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" autocomplete="off">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="group">Group :</label>
											<div class="col-md-6">
												<select id="group" name="group" class="form-control" required="">
												<option value="-1">Choose Group</option>
														
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="brand">Brand :</label>
											<div class="col-md-6">
												<select id="brand" name="brand" class="form-control" required="">
													<option value="-1">Choose Brand</option>
															
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="supplier">Supplier :</label>
											<div class="col-md-6">
												<select id="supplier" name="supplier" class="form-control" required="">
													<option value="-1">Choose Supplier</option>
															
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="description"> Description :</label>
											<div class="col-md-6">
												<textarea class="form-control" rows="3" id="description" name="description"></textarea>
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
	