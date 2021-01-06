
	<section role="main" class="content-body" id="doctor_list">
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
								<a href="Registration/doctor_list/" >Doctor List</a>
							</li>
							<li>
								<a href="Registration/doctor_add/" >Doctor Add</a>
							</li>
						</ul>
					</header>
					
					<!-- Page Start--->
					<div class="panel-body">
						
						<table class="table table-bordered table-striped" id="datatable" data-url="registration/doctor_list_json/">
							<thead>
								<tr>
									<th width="3%">Sl</th>
									<th width="15%">Name</th>
									<th width="20%">Designation</th>
									<th width="7%">status</th>
									<th width="6%" class="no-sort">Actions</th>
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
	
	