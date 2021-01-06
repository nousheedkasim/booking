<section role="main" class="content-body" id="group_edit">
					<header class="page-header" >
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
											<a href="Registration/group_list" >Group List</a>
										</li>
										<li >
											<a href="Registration/group_add" >Group Add</a>
										</li>
										<li class="active">
											<a href="Registration/group_edit/<?php echo $group_id; ?>/" >Group Edit</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
										<form id="group_add_form" action="Registration/group_update/" class="form-horizontal form-bordered" autocomplete="off">
											<input type="hidden" id="group_id" name="group_id" value="<?php echo $group->group_id; ?>">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Group Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" value="<?php echo $group->group_name; ?>" required>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="code">Group Code :</label>
												<div class="col-md-6">
													<input type="text" name="code" id="code" class="form-control"  value="<?php echo $group->group_code; ?>" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="status"> Status:</label>
												<div class="col-md-6">
													<select id="usertype" name="status" id="status" class="form-control" required>
														
														<?php foreach($status as $row)
														{
															 ?>
															<option <?php echo ($group->group_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
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
			