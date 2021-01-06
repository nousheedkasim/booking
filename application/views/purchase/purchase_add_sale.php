
<section role="main" class="content-body" id="purchase_add_page_sale">
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
								<a href="Purchase/purchase_list" >Purchase List</a>
							</li>
							<li class="active">
								<a href="Purchase/purchase_add" >Purchase Add</a>
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
						
							<div class="form-group">
							
								
									<div class="form-group col-md-2">
										<label class="control-label" for="name">Branch :</label>
										<select id="branch" name="branch"  class="form-control" required="" >
											<option>Select Branch</option>
											<?php foreach($branches as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
								
								
									<div class="form-group col-md-2">
										<label class="control-label" for="name">User :</label> 
										<select id="user" name="user" class="form-control" required="" >
											<option>Select User</option>
											<?php foreach($users as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
								
								
								
									<div class="form-group col-md-2">
										<label class="control-label">Date</label>
										
											<input id="purchasee_date" name="purchasee_date" type="text" data-plugin-datepicker="" class="form-control">
										
									</div>
								
								
									<div class="form-group col-md-2">
										<label class="control-label" for="name">Payment Type:</label> 
										<select id="payment_type" name="payment_type" class="form-control" required="" >
											<option>Select Type</option>
											<?php foreach($payment_type as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label" for="name">Supplier:</label> 
										<select id="supplier" name="supplier" data-plugin-selectTwo class="form-control populate" required="">
												<?php foreach($supplier as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
											</select>
										
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label">Invoice No</label>
											<input id="invoice_no" name="invoice_no" type="text"  class="form-control">
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label">Ref No</label>
											<input id="invoice_ref_no" name="invoice_ref_no" type="text"  class="form-control">
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label">Invoice Amount</label>
											<input id="invoice_amount" name="invoice_amount" type="text"  class="form-control">
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label">Invoice Tax (Amt)</label>
											<input id="invoice_tax_amt" name="invoice_tax_amt" type="text"  class="form-control">
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label">Invoice Discount (Amt)</label>
											<input id="invoice_disc_amt" name="invoice_disc_amt" type="text"  class="form-control">
									</div>
									
									<div class="form-group col-md-2">
										<label class="control-label">Other Expense</label>
											<input id="other_expense" name="other_expense" type="text"  class="form-control">
									</div>
									
									
														
															
														
														
													
									
									
								
								
								
								
							</div>
							
							
							
							
						</form>
						<hr>	

						<!--<table class="table table-bordered table-striped" id="datatable-tabletools" data-url="user/user_list_json/">-->
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-condensed mb-none" id="table_input">
								<thead>
									<tr>
										<th width="30%">Product</th>
										<th width="10%">Batch</th>
										<th width="10%">Exp:Date</th>
										<th width="10%">Qty</th>
										<th width="10%">P Amount</th>
										<!--<th width="7%">P Rate</th>
										<th width="6%">P Tax</th>
										<th width="6%">P&nbsp;Disc%</th>-->
										<th width="10%">S Amount</th>
										<!--<th width="7%">S Rate</th>
										<th width="6%">S Tax</th>
										<th width="6%">S&nbsp;Disc%</th>-->
										<th width="10%">MRP</th>
										<!--<th width="7%">P Total</th>-->
										<th width="10%">#</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td>
											<select  class="form-control" id="product" required=""></select>
											
										</td>
										<td>
											<input type="text" id="batch" class="form-control" autocomplete="off">
										</td>
										<td>
											<div class="input-group">
												<input id="exp_date" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control">
											</div>
										</td>
										<td>
											<input type="text" id="qty" class="form-control"  autocomplete="off">
										</td>
										<td>
											<input type="text" id="pr_amount" class="form-control"  autocomplete="off">
											
										</td>
										<!--<td>
											<input type="text" id="pr_rate" class="form-control"  autocomplete="on">
											
										</td>
										<td>
											<select id="pr_tax_perc" data-plugin-selectTwo class="form-control">
												
												<?php /*foreach($tax as $row){ 
												?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
												<?php												
												} */ ?>
											</select>
										</td>
										<td>
											<input type="text" id="pr_discount" class="form-control"  autocomplete="off">
										</td>-->
										<td>
											<input type="text" id="sl_amount" class="form-control"  autocomplete="off">
										</td>
										<!--<td>
											<input type="text" id="sl_rate" class="form-control"  autocomplete="off">
										</td>
										<td>
											<select id="sl_tax_perc" data-plugin-selectTwo class="form-control populate">
												
												<?php foreach($tax as $row){ 
												?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
												<?php												
												} ?>
												
											</select>
										</td>
										<td>
											<input type="text" id="sl_discount" class="form-control"  autocomplete="off">
										</td>-->
										<td>
											<input type="text" id="mrp_total" class="form-control"  autocomplete="off">
										</td>
										<!--<td>
											<input type="text" id="pr_total" class="form-control"  readonly>
										</td>-->
										<td>
											<div style="margin-left: -6px; margin-right: -8px;">
												<button type="button" class="mr-xs btn btn-info" id="plus-btn"><i class="fa fa-plus"></i> </button>
												<button type="button" class="btn btn-warning"><i class="fa fa-undo"></i> </button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
										
						<hr>
					</div>
					<!--Page End-->
				</section>
			</div>
		</div>
	</section>
	
	

	<!-- Purchase Amount Modal-->
	<!--<a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-default hide" href="#pr_amount_modal" id="pr_amount_modal_link">Open with fade-zoom animation</a>
	<div id="pr_amount_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" role="di">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Purchase Amount</h2>
			</header>
			<div class="panel-body">
				<div class="form-group col-md-4">
					<label class="control-label">Purchase Rate</label>
					<input type="text" id="pr_rate" class="form-control"  autocomplete="off">
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Purchase Tax</label>
					<select id="pr_tax_perc" class="form-control">
						
						<?php foreach($tax as $row){ 
						?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
						<?php												
						} ?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Purchase Discount</label>
					<input type="text" id="pr_discount" class="form-control"  autocomplete="off">
				</div>
				
			</div>
			<footer class="panel-footer">
				<div class="form-group">
					<div class="col-md-12 text-right">
						<button class="btn btn-primary" id="pr_amount_modal_confirm">Confirm</button>
						<button class="btn btn-default modal-dismiss">Cancel</button>
					</div>
				</div>
			</footer>
		</section>
	</div>
	 Purchase Amount Modal-->
	
	<!-- Purchase Amount Modal -->
	<div id="pr_amount_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header panel-heading">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Purchase Amount</h4>
		  </div>
		  <div class="panel-body">
				<div class="form-group col-md-4">
					<label class="control-label">Purchase Rate</label>
					<input type="text" id="pr_rate" class="form-control"  autocomplete="off">
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Purchase Tax</label>
					<select id="pr_tax_perc" class="form-control">
						
						<?php foreach($tax as $row){ 
						?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
						<?php												
						} ?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Purchase Discount</label>
					<input type="text" id="pr_discount" class="form-control"  autocomplete="off">
				</div>
					
			</div>
			<footer class="panel-footer">
					<div class="form-group">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary" id="pr_amount_modal_confirm">Confirm</button>
							<button class="btn btn-default modal-dismiss" data-dismiss="modal">Cancel</button>
						</div>
					</div>
			</footer>
		</div>

	  </div>
	</div>
	
	<!-- Sale Amount Modal -->
	<div id="sl_amount_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header panel-heading">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Sale Amount</h4>
		  </div>
		  <div class="panel-body">
		  
					<div class="form-group col-md-3">
						<label class="control-label">Sale Rate</label>
						<input type="text" id="sl_rate" class="form-control" >
					</div>
					<div class="form-group col-md-3">
						<label class="control-label">Sale Tax</label>
						<select id="sl_tax_perc" class="form-control">
							
							<?php foreach($tax as $row){ 
							?>
								<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
							<?php												
							} ?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label class="control-label">Sale Discount</label>
						<input type="text" id="sl_discount" class="form-control"  autocomplete="off">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label">MRP</label>
						<input type="text" id="mrp" class="form-control"  autocomplete="off">
					</div>
					
				</div>
				<footer class="panel-footer">
					<div class="form-group">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary" id="sl_amount_modal_confirm">Confirm</button>
							<button class="btn btn-default modal-dismiss" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</footer>
		</div>

	  </div>
	</div>
	