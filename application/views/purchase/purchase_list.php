<style>
	table > tbody > tr > td:nth-child(7){
		text-align: right !important;
	}
</style>
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
			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel">
					<header class="panel-heading">
						<ul class="nav nav-tabs">
							<li >
								<a href="Purchase/purchase_add" >Purchase Add</a>
							</li>
							<li class="active">
								<a href="Purchase/purchase_list" >Purchase List</a>
							</li>
							
						</ul>
					</header>
					<!--<div class="panel-body">
								<table class="table table-bordered table-striped" id="datatable-ajax" data-url="assets/ajax/ajax-datatables-sample.json">
									<thead>
										<tr>
											<th width="20%">Rendering engine</th>
											<th width="25%">Browser</th>
											<th width="25%">Platform(s)</th>
											<th width="15%">Engine version</th>
											<th width="15%">CSS grade</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
					 Page Start--->
					 
					 
					<div class="panel-body">
						
						<form class="form-inline1">
							<div class="form-group" style="margin-left:-15px;">
								<div class="form-group col-md-2 ">
									<label class="control-label" for="exampleInputUsername2">Branch</label>
									
									<select id="branch" name="branch" class="form-control">
									<option>test</option>
									</select>
								</div>
								<div class="form-group col-md-2">
									<label class="control-label" for="exampleInputUsername2">Type</label>
									<select id="branch" name="branch" class="form-control">
									<option>test</option>
									</select>
								</div>
								<div class="form-group col-md-2">
									<label class="control-label" for="exampleInputUsername2">Type</label>
									<select id="branch" name="branch" class="form-control">
									<option>test</option>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label">Date range</label>
										<div class="input-daterange input-group" data-plugin-datepicker>
											<span class="input-group-addon pf-np">From</span>
											<input type="text" class="form-control" name="start">
											<span class="input-group-addon pf-np">To</span>
											<input type="text" class="form-control" name="end">
										</div>
								</div>
								
								<div class="form-group col-md-2">
									<label class="control-label" for="exampleInputUsername2">Type</label>
									<select id="branch" name="branch" class="form-control">
									<option>test</option>
									</select>
								</div>
							</div>
							<hr>
						</form>		
						
						
						<!--<table class="table table-bordered table-striped" id="datatable-tabletools" data-url="user/user_list_json/">-->
						<table class="table table-bordered table-striped" id="datatable" data-url="Purchase/purchase_list_json/">
							<thead>
								<tr>
									<th width="5%">Sl</th>
									<th width="10%">Branch</th> 
									<th width="10%">Date</th> 
									<th width="10%">Type</th> 
									<th width="15%">Supplier</th> 
									<th width="10%">Invoice No</th> 
									<th width="10%">Amount</th>
									<th width="10%">Status</th>									
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
	
	