<style>
table > tbody > tr > td{
	padding:3px !important;
}

</style>
<section role="main" class="content-body" id="service_add_page">
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
							<li class="active" >
								<a href="Service/service_add/" >Service Add</a>
							</li>
							<li >
								<a href="Service/service_list/" >Service List</a>
							</li>
							
						</ul>
					</header>
					
					<div class="panel-body">
						<form class="" action="Service/service_save/" method="POST">
						
							<div class="form-group">
							
								<div class="form-group col-md-2 mb-xs pl-none">
									<label class="control-label" for="branch">Branch :</label>
									<select id="branch" name="branch"  class="form-control"  index="1">
										<?php foreach($branches as $row){
												?>
												<option <?php echo ($logged_branch==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
									</select>
								</div>
								
								<div class="form-group col-md-2 mb-xs pl-none">
									<label class="control-label" for="user">User :</label> 
									<select id="user" name="user" class="form-control"  index="2">
										<?php foreach($users as $row){
												?>
												<option <?php echo ($logged_user==$row->id)?'selected':''; ?> value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
									</select>
								</div>
								<div class="form-group col-md-2 mb-xs pl-none">
									<label class="control-label">Date</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</span>
										<input type="text" data-plugin-datepicker="" name="sr_date" class="form-control" index="3">
									</div>
								</div>
								<div class="form-group col-md-2 mb-xs pl-none">
										<label class="control-label" for="payment_type">Payment Type:</label> 
										<select id="payment_type" name="payment_type" class="form-control "  index="4">
											
											<?php foreach($payment_type as $row){
												?>
												<option value="<?php echo $row->id ?>"><?php echo $row->value ?></option>
												<?php
											}?>
										</select>
									</div>
								<div class="form-group col-md-2 mb-xs pl-none">
									<label class="control-label" for="customer">Customer :</label> 
									<select id="customer" name="customer" class="form-control"  index="5">
										<option>Select Customer</option>
									</select>
									<input type="hidden" name="customer_hidden" id="customer_hidden">
								</div>
								<div class="form-group col-md-2 mb-xs pl-none">
									<label class="control-label" for="customer_mob">Customer Mobile:</label> 
									<input type="text" id="customer_mob" name="customer_mob" class="form-control" index="6">
								</div>
								
								
							</div>
							
							
							
							
						
						<hr>	
						
						<div style="margin-top: -15px; color:#ea6d14;margin-bottom: -5px;font-size: 11px;">* Tax <?php echo (SR_TAX_INCLUDE)?'Include':'Exclude'; ?></div>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-condensed mb-none" id="service_add_table">
								<thead>
									<tr>
										<th width="4%">Sl</th>
										<th width="20%">Service</th>
										<th width="8%">Rate</th>
										<th width="6%">Qty</th>
										<th width="8%">Amount</th>
										<th width="9%">Tax </th>
										<th class="hide">Tax %</th>
										<th width="8%">Tax Amt</th>
										<th width="9%">Discount %</th>
										<th width="8%">Discount Amt</th>
										<th width="10%">Total</th>
										<th width="10%">#</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											0											
										</td>
										<td>
											<select id="service_head"  class="form-control" index="7"></select>
										</td>
										<td>
											<input type="text" id="unit_rate" class="form-control" autocomplete="off" index="8">
										</td>
										<td>
											<input type="text" id="qty" class="form-control input-sm"  autocomplete="off" index="9">
										</td>
										<td>
											<input type="text" id="amount" class="form-control" autocomplete="off" index="10">
										</td>
										<td>
											<select id="tax"  class="form-control" index="11">
												
												<?php foreach($tax as $row){ 
												?>
													<option  value="<?php echo $row->id; ?>"><?php echo $row->value; ?></option>
												<?php												
												}  ?>
											</select>
										</td>
										<td class="hide">
											<input type="text" id="tax_perc" class="form-control hide" autocomplete="off" value="0.00">
										</td>
										<td>
											<input type="text" id="tax_amount" class="form-control"  autocomplete="off" index="12">
										</td>
										<td>
											<input type="text" id="discount_perc" class="form-control"  autocomplete="off" value="0.00" index="13">
										</td>
										<td>
											<input type="text" id="discount_amt" class="form-control"  autocomplete="off" index="14">
										</td>
										<td>
											<input type="text" id="total" class="form-control"  autocomplete="off" readonly index="15">
										</td>
										
										<td>
											<div style="margin-left: -2px; margin-right: -2px;">
												<button type="button" class="mr-xs btn btn-info btn-sm" id="plus-btn"><i class="fa fa-plus"></i> </button>
												<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> </button>
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
										<input type="text" id="total_qty" name="total_qty" class="form-control total_input no-click" >
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="sr_amount">Amount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="sr_amount" name="sr_amount" class="form-control total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_sr_tax">Tax :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_sr_tax" name="total_sr_tax" class="form-control total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="total_sr_discount">Discount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="total_sr_discount" name="total_sr_discount" class="form-control total_input no-click">
									</span>
								</div>
								<div class="input-group ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="sr_total">Total  :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="sr_total" name="sr_total" class="form-control total_input no-click">
									</span>
								</div>
								<div class="input-group  <?= (SR_TOTAL_ROUNDING)?'':'hide'; ?>">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="rounding_amount">Rounding :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="number" id="rounding_amount" name="rounding_amount" class="form-control total_input" value="0">
									</span>
								</div>
								<div class="input-group  <?= (SR_TOTAL_ROUNDING)?'':'hide'; ?> ">
									<span class="input-group-addon" style="width:55%; text-align: right;">
										<label class="control-label" for="net_amount">Net Amount :</label>
									</span>
									<span class="input-group-addon" style="padding:1px; width:45%;">
										<input type="text" id="net_amount" name="net_amount" class="form-control total_input no-click skip">
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
	
	