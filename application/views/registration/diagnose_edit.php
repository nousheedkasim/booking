<section role="main" class="content-body" id="diagnose_edit">
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
									
									<ul class="nav nav-tabs">
										<li >
											<a href="Registration/diagnose_list/" >Diagnose List</a>
										</li>
										<li>
											<a href="Registration/diagnose_add/" >Diagnose Add</a>
										</li>
										<li class="active">
											<a href="Registration/diagnose_edit/<?php echo $diagnose_id ?>/" >Diagnose Edit</a>
										</li>
									</ul>
								</header>
								<?php // print_r($diagnose_details); ?>
								<div class="panel-body">
										<form id="brand_add_form" action="Registration/diagnose_update/" class="form-horizontal form-bordered" autocomplete="off">
											<input type="hidden" name="diagnose_id" id="diagnose_id" value="<?php echo $diagnose_details->diagnose_id; ?>"  required>
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name :</label>
												<div class="col-md-6">
													<input type="text" name="name" id="name" class="form-control" value="<?php echo $diagnose_details->diagnose_name; ?>"  required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="address">Slot Duration:</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="2" id="slot_duration" name="slot_duration"><?php echo $diagnose_details->diagnose_slot_duration; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="status"> Status:</label>
												<div class="col-md-6">
													<select id="usertype" name="status" id="status" class="form-control" required="">
														
														<?php foreach($status as $row)
														{
															 ?>
															<option <?php echo ($diagnose_details->diagnose_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
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
			