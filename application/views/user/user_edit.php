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
											<a href="User/user_list" >User List</a>
										</li>
										<li >
											<a href="User/user_add" >User Add</a>
										</li>
										<li class="active">
											<a href="User/user_edit" >User Edit</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
									<form id="user_edit_form" action="User/user_update/" class="form-horizontal form-bordered" autocomplete="off">
										<div class="form-group">
											<label class="col-md-3 control-label" for="name">User Name :</label>
											<div class="col-md-6">
												<input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" autocomplete="off" value="<?php echo $user->user_name; ?>">
											</div>
										</div>
						
										<div class="form-group">
											<label class="col-md-3 control-label" for="mobile">User Mobile :</label>
											<div class="col-md-6">
												<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter User Mobile" value="<?php echo $user->user_mobile; ?>">
											</div>
										</div>
						
										<div class="form-group">
											<label class="col-md-3 control-label" for="usertype">User Type:</label>
											<div class="col-md-6">
												<select id="usertype" name="usertype" id="usertype" class="form-control" required="">
													
													<?php foreach($usertype as $row)
													{
														 ?>
														<option <?php echo ($user->user_type==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
														<?php
													}
													 ?>
												</select>												
											</div>
										</div>
						
										<div class="form-group">
											<label class="col-md-3 control-label" for="branch">User Branch:</label>
											<div class="col-md-6">
												<select id="branch" name="branch" id="branch" class="form-control" required="">
													
													<?php foreach($branches as $row)
													{
														 ?>
														<option <?php echo ($user->user_branch==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
														<?php
													}
													 ?>
												</select>
											</div>
										</div>
						
										<div class="form-group">
											<label class="col-md-3 control-label" for="email">Email:</label>
											<div class="col-md-6">
												<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Mail" value="<?php echo $user->user_email; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="status">User Status:</label>
											<div class="col-md-6">
												<select id="usertype" name="status" id="status" class="form-control" required="">
													
													<?php foreach($status as $row)
													{
														 ?>
														<option <?php echo ($user->user_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
														<?php
													}
													 ?>
												</select>												
											</div>
										</div>
										<div id="hidden">
											<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $user_id; ?>">
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
			