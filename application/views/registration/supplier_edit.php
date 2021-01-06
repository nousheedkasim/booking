				<section role="main" class="content-body" id="supplier_edit">
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
						<div class="col-md-12 col-lg-12 col-xl-12">
							<section class="panel">
								<header class="panel-heading">
									<!--<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>-->
									<ul class="nav nav-tabs">
										<li >
											<a href="Registration/supplier_list" >Supplier List</a>
										</li>
										<li>
											<a href="Registration/supplier_add" >Supplier Add</a>
										</li>
										<li class="active">
											<a href="Registration/supplier_edit/<?php echo $supplier_id; ?>/" >Supplier Edit</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
									<form id="supplier_add_form" action="Registration/supplier_update/" class="form-horizontal form-bordered" autocomplete="off">
										
										<input type="hidden" name="supplier_id" id="supplier_id" value="<?php echo $supplier_details->supplier_id; ?>">
										<div class="form-group">
											<label class="control-label col-md-3" for="name">Supplier Name :</label> 
											<div class="col-md-6">
												<input type="text" name="name" id="name" class="form-control" value="<?php echo $supplier_details->supplier_name; ?>" required >
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="address"> Address :</label>
											<div class="col-md-6">
												<textarea class="form-control" rows="4" id="address" name="address"><?php echo $supplier_details->supplier_address; ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3" for="tin"> Tax No:</label> 
											<div class="col-md-6">
												<input type="text" name="tin" id="tin" class="form-control" value="<?php echo $supplier_details->supplier_tax; ?>" required  autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="phone"> Phone :</label>
											<div class="col-md-6">
												<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $supplier_details->supplier_phone; ?>" required autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="mobile"> Mobile :</label>
											<div class="col-md-6">
												<input type="text" name="mobile" id="mobile" class="form-control" value="<?php  echo $supplier_details->supplier_mobile;?>" required autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="email"> Email :</label>
											<div class="col-md-6">
												<input type="email" name="email" id="email" class="form-control" value="<?php  echo $supplier_details->supplier_email;?>" required autocomplete="off">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="payment_method"> Payment Metohod :</label>
											<div class="col-md-6">
												<select id="payment_method" name="payment_method" class="form-control" required="">
												<option value="-1">Select Payment Metohod</option>
												<?php
													foreach($payment_method as $row){ ?>
													<option <?php echo ($supplier_details->supplier_payment_method==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
												<?php
													}
												?>
														
											</select>
											</div>
										</div>
										
										 <div class="form-group">
												<label class="col-md-3 control-label" for="status"> Status:</label>
												<div class="col-md-6">
													<select id="usertype" name="status" id="status" class="form-control" required="">
														
														<?php foreach($status as $row)
														{
															 ?>
															<option <?php echo ($supplier_details->supplier_status==$row->id)?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->value;?></option>
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
	