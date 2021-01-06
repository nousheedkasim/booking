<style>
	table > tbody > tr > td:nth-child(3){
		text-align: right !important;
	}
	table > tbody > tr > td:nth-child(5){
		text-align: right !important;
	}
	table > tbody > tr > td:nth-child(7){
		text-align: right !important;
	}
	table > tbody > tr > td:nth-child(8){
		text-align: right !important;
	}
	table > tbody > tr > td:nth-child(9){
		text-align: right !important;
	}
	.no-click  
	{
		background-color: #eeeeee;
	}
</style>
<section role="main" class="content-body" id="service_list_page">
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
								<a href="Service/service_add/" >Service Add</a>
							</li>
							<li>
								<a href="Service/service_list/" >Service List</a>
							</li>
							<li class="active">
								<a href="Service/service_details/<?= $service_id ?>/" >Service Detail List</a>
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
						<div class="form-group mb-none mt-sm" >
							
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Amount :</label>
										<input type="text" class="form-control no-click" value="<?php echo $details->amount; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Tax :</label>
										<input type="text" class="form-control no-click" value="<?php echo $details->tax; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Discount :</label>
										<input type="text" class="form-control no-click" value="<?php echo $details->discount; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Total :</label>
										<input type="text" class="form-control no-click" value="<?php echo $details->total; ?>">
								</div>
								
								
								
								

								
								
							</div>
						
							<hr>
						
						<!--<table class="table table-bordered table-striped" id="datatable-tabletools" data-url="user/user_list_json/">-->
						<table class="table table-bordered table-striped" id="datatable" data-url="Service/service_detail_list_json/">
							<thead>
								<tr>
									<th width="2%" class="no-sort">Sl</th>
									<th width="15%">Item</th> 
									<th width="10%">Unit Rate</th>
									<th width="8%">Qty</th> 
									<th width="8%">Amount</th> 									
									<th width="8%">Tax</th> 
									<th width="20%">Tax Amount</th> 
									<th width="8%">Discount</th>										
									<th width="10%">Total</th>
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
	
	