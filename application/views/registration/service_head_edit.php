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
										<li >
											<a href="Registration/service_head_add" >Service Head Add</a>
										</li>
                                        <li class="active">
											<a href="Registration/service_head_edit/<?php echo $service_head_id; ?>/" >Service Head Edit</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="service_head_edit_form" action="Registration/service_head_update/" class="form-horizontal form-bordered" autocomplete="off">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title">Service Head Title :</label>
												<div class="col-md-6">
													<input type="text" name="title" id="title" class="form-control" placeholder="Enter Service Head Title" autocomplete="off" value="<?php echo $service_head->service_head_title; ?>">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="code">Service Head Code :</label>
												<div class="col-md-6">
													<input type="text" name="code" id="code" class="form-control" placeholder="Enter Service Head code" value="<?php echo $service_head->service_head_code; ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="amount">Service Head Amount :</label>
												<div class="col-md-6">
													<input type="text" name="amount" id="amount" class="form-control" value="<?php echo $service_head->service_head_amount;?>">
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="status">Service Head Status:</label>
												<div class="col-md-6">
													<select id="usertype" name="status" id="status" class="form-control" required="">
													
													<?php foreach($status as $row)
													{
														 ?>
														<option <?php echo ($service_head->service_head_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
														<?php
													}
													 ?>
													</select>												
												</div>
											</div>
											<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $service_head_id; ?>">
										
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
			