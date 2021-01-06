<style>
table > tbody > tr > td{
	padding:3px !important;
}

</style>
<section role="main" class="content-body" id="purchase_add_page">
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
							<li class="active">
								<a href="Purchase/purchase_add" >Purchase Add</a>
							</li>
							<li >
								<a href="Purchase/purchase_list" >Purchase List</a>
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
					
	


						<form class="form-inline1" action="Purchase/purchase_save/" method="POST">
						
							<div class="form-group">
							
								
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">Branch :</label>
										<select id="branch" name="branch"  class="form-control input-sm"  index="1">
											<?php foreach($branches as $row){
												?>
												<option <?php echo ($logged_branch==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
								
								
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">User :</label> 
										<select id="user" name="user" class="form-control input-sm"  index="2">
											<?php foreach($users as $row){
												?>
												<option <?php echo ($logged_user==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
								
								
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">Supplier:</label> 
										<select id="supplier" name="supplier"  class="form-control input-sm populate"  index="3">
												<option value="0">Select Supplier</option>
												<?php foreach($supplier as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
											</select>
										
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">Payment Type:</label> 
										<select id="payment_type" name="payment_type" class="form-control input-sm"  index="4">
											
											<?php foreach($payment_type as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Date</label>
										
											<input id="purchasee_date" name="purchase_date" type="text" data-plugin-datepicker="" class="form-control input-sm" index="5">
										
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice No</label>
											<input id="invoice_no" name="invoice_no" type="text"  class="form-control input-sm" index="6">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Ref No</label>
											<input id="invoice_ref_no" name="invoice_ref_no" type="text"  class="form-control input-sm" index="7">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice Tax (Amt)</label>
											<input id="invoice_tax_amt" name="invoice_tax_amt" type="text"  class="form-control input-sm" index="8">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice Discount (Amt)</label>
											<input id="invoice_disc_amt" name="invoice_disc_amt" type="text" value="0.00"  class="form-control input-sm" index="9">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice Amount</label>
											<input id="invoice_amount" name="invoice_amount" type="text"  class="form-control input-sm" index="10">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Other Expense</label>
											<input id="other_expense" name="other_expense" type="text"  class="form-control input-sm" index="11">
									</div>
								
							</div>
							
							
							
							
						
							<hr>	
							<div style="margin-top: -15px; color:#ea6d14;margin-bottom: -5px;font-size: 11px;">* Tax <?php echo (PR_TAX_INCLUDE)?'Include':'Exclude'; ?></div>
							<!--<table class="table table-bordered table-striped" id="datatable-tabletools" data-url="user/user_list_json/">-->
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none" id="purchase_table">
									<thead>
										<tr>
											<th width="3%">Sl</th>
											<th width="30%">Product</th>
											<th width="10%">Batch</th>
											<th width="10%">Exp:Date</th>
											<th width="10%">Qty</th>
											<th width="10%">U Rate</th>
											<th width="6%">P Tax</th>
											<th width="6%" class="hide">P Tax Amt</th>
											<th width="6%">P&nbsp;Disc%</th>
											<th width="6%" class="hide">P&nbsp;Disc Amt</th>
											<th width="7%">P Amount</th>
											<th width="10%">#</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												0											
											</td>
											<td>
												<select  class="form-control input-sm select2_text" id="product"  index="12"></select>
												
											</td>
											<td>
												<input type="text" id="batch" class="form-control input-sm" autocomplete="off" index="13">
											</td>
											<td>
												<input id="exp_date" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control input-sm" index="14">
											</td>
											<td>
												<input type="text" id="qty" class="form-control input-sm value"  autocomplete="off" index="15">
											</td>
											<td>
												<input type="text" id="pr_unit_rate" class="form-control input-sm value"  autocomplete="off" index="16">
												
											</td>
											<td>
												<select id="pr_tax_perc"  class="form-control input-sm select2_text value" index="17">
													
													<?php foreach($tax as $row){ 
													?>
														<option data-id="<?php echo $row->data_id; ?>" value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
													<?php												
													}  ?>
												</select>
											</td>
											<td class="hide">
												<input type="text" id="pr_tax_amount" class="form-control input-sm hide value" >
											</td>
											<td>
												<input type="text" id="pr_discount_perc" class="form-control input-sm"  autocomplete="off" value="0.00" index="18">
											</td>
											<td class="hide">
												<input type="text" id="pr_discount_amt" class="form-control input-sm hide value"  autocomplete="off" >
											</td>
											<td>
												<input type="text" id="pr_amount" class="form-control input-sm value"  autocomplete="off" readonly index="21">
											</td>
											
											<td>
												<div style="margin-left: -2px; margin-right: -2px;">
													<button type="button" class="mr-xs btn btn-info" id="plus-btn"><i class="fa fa-plus"></i> </button>
													<button type="button" class="btn btn-warning"><i class="fa fa-undo"></i> </button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>		
							<hr>
							
							<div class="col-md-3 pull-right" style="padding:0px; margin-top: -12px;">
								<div class="input-group hide">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_qty">Qty :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_qty" name="total_qty" class="form-control input-sm total_input no-click" >
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_p_rate">Total P Rate :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_p_rate" name="total_p_rate" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_p_tax">Total P Tax :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_p_tax" name="total_p_tax" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_p_discount">Total P Discount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_p_discount" name="total_p_discount" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_amount">Total P Amount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_amount" name="total_amount" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group  <?= (PR_TOTAL_ROUNDING)?'':'hide'; ?>">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="rounding_amount">Rounding :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="number" id="rounding_amount" name="rounding_amount" class="form-control input-sm total_input">
									</span>
								</div>
								<div class="input-group  <?= (PR_TOTAL_ROUNDING)?'':'hide'; ?> ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="net_amount">Net Amount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="net_amount" name="net_amount" class="form-control input-sm total_input no-click skip">
									</span>
								</div>
								<div class="input-group mt-xs" >
									<button type="submit" class="mr-xs btn btn-success" id="pr_save_btn">Save </button>
									<button type="button" class="btn btn-warning">Cancel </button>
								</div>
							</div>
						</form>
					</div>
					<!--Page End-->
				</section>
			</div>
		</div>
	</section>
	
	