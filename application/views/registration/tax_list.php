
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

		<div class="row">	
			<div class="col-md-6 col-lg-12 col-xl-6">
				<section class="panel">
					<header class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="Registration/tax_list" >Tax List</a>
							</li>
							<li>
								<a href="Registration/tax_add" >Tax Add</a>
							</li>
						</ul>
					</header>
					
					<!-- Page Start--->
					<div class="panel-body">
						<!--<form class="form-inline">
							<div class="form-group">
								<label class="sr-only" for="exampleInputUsername2">Username</label>
								<input type="email" class="form-control" id="exampleInputUsername2" placeholder="Username">
							</div>
							<div class="form-group">
								<label class="sr-only" for="exampleInputPassword2">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
							</div>

							<div class="visible-sm clearfix mt-sm mb-sm"></div>

							<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
								<input type="checkbox" checked="" id="exampleCheckbox1">
								<label for="exampleCheckbox1">Remember my account</label>
							</div>
							<div class="clearfix visible-xs mb-sm"></div>

							<button type="submit" class="btn btn-primary">Login</button>
							<button type="reset" class="btn btn-default">Cancel</button>
						</form>-->
									

						<!--<table class="table table-bordered table-striped" id="datatable-tabletools" data-url="user/user_list_json/">-->
						<table class="table table-bordered table-striped" id="datatable" data-url="registration/tax_list_json/">
							<thead>
								<tr>
									<th width="5%">Sl</th>
									<th width="10%">Tax Name</th>
									<th width="10%">Tax Percentage</th>
									<th width="15%">Status</th>
									<th width="15%" class="no-sort">Actions</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						
					</div>
					<!--Page End-->
				</section>
			</div>
		</div>
	</section>
	
	