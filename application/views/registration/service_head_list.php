
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
								<a href="Registration/service_head_list/" >Service Head List</a>
							</li>
							<li>
								<a href="Registration/service_head_add/" >Service Head Add</a>
							</li>
						</ul>
					</header>
					
					<!-- Page Start--->
					<div class="panel-body">

						<table class="table table-bordered table-striped" id="datatable" data-url="registration/service_head_list_json/">
							<thead>
								<tr>
									<th width="5%">Sl</th>
									<th width="10%">Service Head Title</th>
									<th width="10%">Service Head Code</th>
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
	
	