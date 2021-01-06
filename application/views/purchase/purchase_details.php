<style>
table > tbody > tr > td{
	padding:4px !important;
}
table > thead > tr > td:nth-child(2){
	text-align: center !important;
}
table > thead > tr > th{
	padding:5px !important;
}

.no-click  
{
	background-color: #eeeeee;
}

</style>
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

		<div class="row">	
			<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
				<section class="panel">
					<header class="panel-heading ">
						<ul class="nav nav-tabs "><!--web-nav-->
							<li >
								<a href="Purchase/purchase_add" >Purchase Add</a>
							</li>
							<li >
								<a href="Purchase/purchase_list" >Purchase List</a>
							</li>
							<li class="active">
								<a href="Purchase/purchase_add" >Purchase Details</a>
							</li>
						</ul>
						<!--<ul class="nav nav-tabs mob-nav">
								<div id="" class="">
									<a href="#" data-toggle="dropdown" aria-expanded="false">
										<span class="name">John Doe Junior <i class="fa custom-caret"></i></span>
									</a>
									<div class="dropdown-menu">
										<a  href="pages-user-profile.html"> My Profile</a>
										<a  href="pages-user-profile.html"> My Profile</a>
										
									</div>
								</div>
						</ul>-->
					</header>
					
					
					
					<div class="panel-body">
						
							<div class="form-group mb-none mt-sm" >
							
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Branch :</label>
										<input type="text" class="form-control no-click" value="<?php echo $invoice_details->branch; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Supplier :</label>
										<input type="text" class="form-control no-click" value="<?php echo $invoice_details->supplier; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Type :</label>
										<input type="text" class="form-control no-click" value="<?php echo $invoice_details->type; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Date :</label>
										<input type="text" class="form-control no-click" value="<?php echo $invoice_details->date; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Invoice No :</label>
										<input type="text" class="form-control no-click" value="<?php echo $invoice_details->invoice_no; ?>">
								</div>
								
								<div class="form-group mb-xs pl-none col-sm-6 col-md-3 col-lg-2">
										<label class="control-label" >Amount :</label>
										<input type="text" class="form-control no-click" value="<?php echo $invoice_details->invoice_amount; ?>">
								</div>
								
								

								
								
							</div>
						
							<hr>
							<div style="margin-top: -15px; color:#ea6d14;margin-bottom: -5px;font-size: 11px;">* Tax <?php echo (PR_TAX_INCLUDE)?'Include':'Exclude'; ?></div>
							<!--<table class="table table-bordered table-striped" id="datatable-tabletools" data-url="user/user_list_json/">-->
							<div class="table-responsive">
								<table class="table-bordered table-striped mb-none" id="local_table" data-url="Purchase/purchase_item_list_json/<?php echo $purchase_id; ?>">
									<thead>
										<tr>
											<th width="2%">Sl</th>
											<th width="30%">Product</th>
											<th width="6%">Batch</th>
											<th width="6%">Exp:Date</th>
											<th width="4%">Qty</th>
											<th width="6%">Unit Rate</th>
											<th width="6%">P Tax %</th>
											<th width="6%">P Tax Amt</th>
											<th width="6%">P&nbsp;Disc%</th>
											<th width="6%">P&nbsp;Disc&nbsp;Amt</th>
											<th width="7%">P Amount</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($purchase_items as $key=> $item){
											?>
											<tr>
												<td><?= $key+1; ?></td>
												<td><?= $item->product; ?></td>
												<td><?= $item->batch; ?></td>
												<td><?= $item->exp_date; ?></td>
												<td><?= $item->qty; ?></td>
												<td class="right"><?= $item->p_item_unit_rate; ?></td>
												<td class="right"><?= $item->p_item_tax_perc; ?></td>
												<td class="right"><?= $item->p_item_tax_amount; ?></td>
												<td class="right"><?= $item->p_item_discount_perc; ?></td>
												<td class="right"><?= $item->p_item_discount_amt; ?></td>
												<td class="right"><?= $item->p_item_total; ?></td>
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
										<input type="text" id="rounding_amount" name="rounding_amount" value="<?php echo $invoice_details->rounding_amount; ?>" class="form-control input-sm total_input no-click">
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
								<?php if($invoice_details->status==2) { ?>
								<div class="input-group mt-xs" >
									<a href="Purchase/purchase_edit/<?= $purchase_id; ?>/"><button type="button" class="btn btn-warning mr-xs" id="pr_edit_btn" >Edit </button></a>
									<button type="button" class="btn btn-danger mr-xs" id="pr_delete_btn" data-toggle='confirmation' href="Purchase/purchase_delete/<?= $purchase_id; ?>/">Delete </button>
									<button type="button" class="mr-xs btn btn-success" id="pr_confirm_btn" data-toggle='confirmation' href="Purchase/purchase_confirm/<?= $purchase_id; ?>/">Confirm </button>
								</div>
								<?php } ?>
							</div>
						
					</div>
					<!--Page End-->
				</section>
			</div>
		</div>
	</section>
	
	