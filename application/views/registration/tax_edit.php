<section role="main" class="content-body" id="tax_edit">
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
											<a href="Registration/tax_list" >Tax List</a>
										</li>
										<li >
											<a href="Registration/tax_add" >Tax Add</a>
										</li>
										<li class="active">
											<a href="Registration/tax_edit/<?php echo $tax_id; ?>/" >Tax Edit</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="tax_edit_form" action="Registration/tax_update/" class="form-horizontal form-bordered" autocomplete="off">
											<input type="hidden" name="tax_id" id="tax_id" value="<?php echo $tax_details->tax_id; ?>">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Tax Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" value="<?php echo $tax_details->tax_name; ?>" autocomplete="off" required>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="percentage">Tax Percentage :</label>
												<div class="col-md-6">
													<input type="text" name="percentage" id="percentage" class="form-control" value="<?php echo $tax_details->tax_percentage; ?>" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="status"> Status:</label>
												<div class="col-md-6">
													<select id="usertype" name="status" id="status" class="form-control" required="">
														
														<?php foreach($status as $row)
														{
															 ?>
															<option <?php echo ($tax_details->tax_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
															<?php
														}
														 ?>
													</select>												
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
			