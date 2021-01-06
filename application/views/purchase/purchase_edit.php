<style>
table > tbody > tr > td{
	padding:4px !important;
}
table > tbody > tr > td:nth-child(6){
	text-align: right !important;
}
table > tbody > tr > td:nth-child(7){
	text-align: right !important;
}
table > tbody > tr > td:nth-child(8){
	text-align: right !important;
}
table > tbody > tr > td:nth-child(9){
	text-align: right !important;
}
table > tbody > tr > td:nth-child(10){
	text-align: right !important;
}
table > tbody > tr > td:nth-child(11){
	text-align: right !important;
}
table > tbody > tr > td:nth-child(12){
	text-align: right !important;
}
.item_edit{
	display:none;
	display:none !important;
}
</style>
<section role="main" class="content-body" id="purchase_edit_page">
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
								<a href="Purchase/purchase_add" >Purchase Add</a>
							</li>
							<li >
								<a href="Purchase/purchase_list" >Purchase List</a>
							</li>
							<li class="active">
								<a href="Purchase/purchase_edit" >Purchase Edit</a>
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
					
	


						<form class="form-inline1" action="Purchase/purchase_update/" method="POST">
						
							<div class="form-group">
							
								<input type="hidden" name="purchase_id" id="purchase_id" value="<?= $invoice_details->purchase_id; ?>">
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">Branch :</label>
										<select id="branch" name="branch"  class="form-control input-sm"  index="1">
											<?php foreach($branches as $row){
												?>
												<option <?php echo ($invoice_details->purchase_branch==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
								
								
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">User :</label> 
										<select id="user" name="user" class="form-control input-sm"  index="2">
											<?php foreach($users as $row){
												?>
												<option <?php echo ($invoice_details->purchase_user==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
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
												<option <?php echo ($invoice_details->purchase_supplier==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
											</select>
										
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="name">Payment Type:</label> 
										<select id="payment_type" name="payment_type" class="form-control input-sm"  index="4">
											
											<?php foreach($payment_type as $row){
												?>
												<option <?php echo ($invoice_details->purchase_type==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Date</label>
										
											<input id="purchasee_date" name="purchase_date" type="text" data-plugin-datepicker="" class="form-control input-sm" value="<?php echo $invoice_details->date; ?>" index="5">
										
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice No</label>
											<input id="invoice_no" name="invoice_no" type="text"  class="form-control input-sm" value="<?php echo $invoice_details->invoice_no; ?>" index="6">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Ref No</label>
											<input id="invoice_ref_no" name="invoice_ref_no" type="text"  class="form-control input-sm" value="<?php echo $invoice_details->ref_no; ?>" index="7">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice Tax (Amt)</label>
											<input id="invoice_tax_amt" name="invoice_tax_amt" type="text"  class="form-control input-sm" value="<?php echo $invoice_details->invoice_tax; ?>" index="8">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice Discount (Amt)</label>
											<input id="invoice_disc_amt" name="invoice_disc_amt" type="text"  class="form-control input-sm" value="<?php echo $invoice_details->discount_amt; ?>" index="9">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Invoice Amount</label>
											<input id="invoice_amount" name="invoice_amount" type="text"  class="form-control input-sm" value="<?php echo $invoice_details->invoice_amount; ?>" index="10">
									</div>
									
									<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label">Other Expense</label>
											<input id="other_expense" name="other_expense" type="text"  class="form-control input-sm" value="<?php echo $invoice_details->other_expense; ?>" index="11">
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
											<th width="10%" class="hide">P Rate</th>
											<th width="6%">P Tax %</th>
											<th width="6%" class="hide">P Tax Amt</th>
											<th width="6%">P&nbsp;Disc%</th>
											<th width="6%" class="hide">P&nbsp;Disc Amt</th>
											<th width="7%">P Amount</th>
											<th width="10%">#</th>
										</tr>
									</thead>
									<tbody>
										<tr >
											<td> <span id="sl_index">0 </td>
											<td> <select  class="form-control input-sm select2_text" id="product"  index="12"></select></td>
											<td> <input type="text" id="batch" class="form-control input-sm" autocomplete="off" index="13"></td>
											<td> <input id="exp_date" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control" index="14"></td>
											<td> <input type="text" id="qty" class="form-control input-sm value"  autocomplete="off" index="15"></td>
											<td> <input type="text" id="pr_unit_rate" class="form-control input-sm value amount"  autocomplete="off" index="16"></td>
											<td class="hide"> <input type="text" id="pr_rate"  class="form-control input-sm value hide" index="17" autocomplete="off"></td>
											<td>
												<select id="pr_tax_perc"  class="form-control input-sm select2_text value amount" index="18">
													
													<?php foreach($tax as $row){ 
													?>
														<option value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
													<?php												
													}  ?>
												</select>
											</td>
											<td class="hide"><input type="text" id="pr_tax_amount" class="form-control input-sm hide" ></td>
											<td> <input type="text" id="pr_discount_perc" class="form-control input-sm amount"  autocomplete="off" value="0.00" index="19"></td>
											<td class="hide"><input type="text" id="pr_discount_amt" class="form-control input-sm hide"/></td>
											<td> <input type="text" id="pr_amount" class="form-control input-sm value amount"  autocomplete="off" readonly index="20"></td>
											<td>
												<div style="margin-left: -2px; margin-right: -2px;">
													<button type="button" class="mr-xs btn btn-success btn-xs" id="plus-btn" index="21"><i class="fa fa-plus"></i> </button>
													<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> </button>
												</div>
											</td>
										</tr>
										
										
										
									<?php foreach($purchase_items as $key=> $item){
									?>
										<tr>
											<td data-target="sl_index"> 
												<?= $key+1; ?>
											</td>
											<td data-target="product">
												<span><?= $item->product; ?></span>
												<span class="hide"><?= $item->product_id; ?></span>
												<input type="hidden" name="product[]" value="<?= $item->product_id; ?>">
											</td>
											<td data-target="batch">  
												<span><?= $item->batch; ?></span>
												<input type="hidden" name="batch[]" value="<?= $item->batch; ?>">
											</td>
											<td data-target="exp_date"> 
												<span><?= $item->exp_date; ?></span>
												<input type="hidden" name="exp_date[]" value="<?= $item->exp_date; ?>">
											</td>
											<td data-target="qty">  
												<span><?= $item->qty; ?></span>
												<input type="hidden" name="qty[]" value="<?= $item->qty; ?>">
											</td>
											<td data-target="pr_unit_rate" class="right"> 
												<span><?= $item->p_item_unit_rate; ?></span>
												<input type="hidden" name="pr_unit_rate[]" value="<?= $item->p_item_unit_rate; ?>">
											</td>
											<td data-target="pr_rate" class="right hide"> 
												<span><?= $item->p_item_rate; ?></span>
												<input type="hidden" name="pr_rate[]" value="<?= $item->p_item_rate; ?>">
											</td>
											<td data-target="pr_tax_perc" class="right"> 
												<span><?= $item->p_item_tax_perc; ?></span>
												<input type="hidden" name="pr_tax_perc[]" value="<?= $item->p_item_tax_perc; ?>">
											</td>
											<td data-target="pr_tax_amount" class="right hide">
												<span><?= $item->p_item_tax_amount; ?></span>
												<input type="hidden" name="pr_tax_amount[]" value="<?= $item->p_item_tax_amount; ?>">
											</td>
											<td data-target="pr_discount_perc" class="right"> 
												<span><?= $item->p_item_discount_perc; ?></span>
												<input type="hidden" name="pr_discount_perc[]" value="<?= $item->p_item_discount_perc; ?>">
											</td>
											<td data-target="pr_discount_amt" class="right hide"> 
												<span><?= $item->p_item_discount_amt; ?></span>
												<input type="hidden" name="pr_discount_amt[]" value="<?= $item->p_item_discount_amt; ?>">
											</td>
											<td data-target="pr_amount" class="right"> 
												<span><?= $item->p_item_total; ?></span>
												<input type="hidden" name="pr_amount[]" value="<?= $item->p_item_total; ?>">
											</td>
											<td>
												<div style="margin-left: -2px; margin-right: -2px;">
													<button type="button" class="btn btn-info btn-xs purchase-item-edit" data-id="<?= $item->id; ?>"><i class="fa fa-edit"></i> </button>
													<button type="button" class="on-default remove-row btn btn-danger btn-xs purchase-item-delete" data-id="<?= $item->id; ?>" data-toggle="popover" title="Are you sure?" data-trigger="toggle" data-content='<a class="btn btn-sm btn-danger" url="Purchase/purchase_item_delete/" onClick="delete_row(this,<?= $key; ?>,<?= $item->id; ?>);"><i class="glyphicon glyphicon-ok"></i> Yes</a><a class="btn btn-sm btn-default"><i class="glyphicon glyphicon-remove"></i> No</a>' data-html="true" data-placement="left"><i class="fa fa-trash-o"></i> </button>
												</div>
											</td>
										</tr>
									<?php
									} ?>
										
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
										<input type="text" id="total_p_rate" name="total_p_rate" value="<?php echo $purchase_details->total_purchase_rate; ?>" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_p_tax">Total P Tax :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_p_tax" name="total_p_tax" value="<?php echo $purchase_details->total_purchase_tax; ?>" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_p_discount">Total P Discount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_p_discount" name="total_p_discount" value="<?php echo $purchase_details->total_purchase_discount; ?>" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_amount">Total P Amount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_amount" name="total_amount" value="<?php echo $purchase_details->total_purchase_amount; ?>" class="form-control input-sm total_input no-click">
									</span>
								</div>
								<div class="input-group  <?= (PR_TOTAL_ROUNDING)?'':'hide'; ?>">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="rounding_amount">Rounding :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="number" id="rounding_amount" name="rounding_amount" value="<?php echo $invoice_details->rounding_amount; ?>" class="form-control input-sm total_input">
									</span>
								</div>
								<div class="input-group  <?= (PR_TOTAL_ROUNDING)?'':'hide'; ?> ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="net_amount">Net Amount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="net_amount" name="net_amount" value="<?php echo number_format($purchase_details->total_purchase_amount+$invoice_details->rounding_amount,DECIMAL_DIGITS); ?>" class="form-control input-sm total_input no-click skip">
									</span>
								</div>
								<div class="input-group mt-xs" >
									<button type="submit" class="mr-xs btn btn-success" id="pr_update_btn">Save </button>
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
	
	