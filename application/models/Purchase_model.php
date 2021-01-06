<?php

    class Purchase_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
			
        }
		
		
		//Purchase->purchase_list_json
		public function purchase_list_json(){
			
			//Array of database columns which should be read and sent back to DataTables//
			$aColumns = array( 'sl', 'branch', 'date', 'type', 'supplier','invoice_no','amount','status','action' );
			
			//Array of database search columns//
			$sColumns = array('user_name','user_email','user_mobile');
			
			//Indexed column (used for fast and accurate table attributes) //
			$sIndexColumn = "purchase_id";
			
			//DB tables to use//
			$sTable = "tbl_purchase 
					   INNER JOIN tbl_branch ON purchase_branch=branch_id
					   INNER JOIN tbl_payment_method ON purchase_type=payment_method_id
					   INNER JOIN tbl_supplier ON purchase_supplier=supplier_id";
			
			//Paging//
			$sLimit = "";
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$sLimit = "LIMIT ".( $_GET['iDisplayStart'] ).", ".
					( $_GET['iDisplayLength'] );
			}
	
			//Ordering//
			if ( isset( $_GET['iSortCol_0'] ) )
			{
				$sOrder = "ORDER BY  ";
				for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
				{
					if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
					{
						$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
							".( $_GET['sSortDir_'.$i] ) .", ";
					}
				}
				
				$sOrder = substr_replace( $sOrder, "", -2 );
				if ( $sOrder == "ORDER BY" )
				{
					$sOrder = "";
				}
			}
	
			//Filtering//
			$sWhere = "";
			if ( $_GET['sSearch'] != "" )
			{
				$sWhere = "WHERE (";
				for ( $i=0 ; $i<count($sColumns) ; $i++ )
				{
					
						$sWhere .= $sColumns[$i]." LIKE '%".( $_GET['sSearch'] )."%' OR ";
					
				}
				$sWhere = substr_replace( $sWhere, "", -3 );
				$sWhere .= ')';
			}
	
			//Individual column filtering//
			for ( $i=0 ; $i<count($sColumns) ; $i++ )
			{
				if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
				{
					if ( $sWhere == "" )
					{
						$sWhere = "WHERE ";
					}
					else
					{
						$sWhere .= " AND ";
					}
					$sWhere .= $sColumns[$i]." LIKE '%".($_GET['sSearch_'.$i])."%' ";
				}
			}
	
			//SQL queries//
			$sQuery			= "SELECT SQL_CALC_FOUND_ROWS purchase_id as sl,branch_name as branch,DATE_FORMAT(purchase_date,'%d/%m/%Y') as date,payment_method_title as type,supplier_name as supplier,purchase_invoice_no as invoice_no,purchase_invoice_amount as amount,purchase_id as id,purchase_invoice_tax_amount as pr_tax_amount,purchase_status as status
							FROM   $sTable
							$sWhere
							$sOrder
							$sLimit";
			$rResult 		= $this->db->query($sQuery);
	
			//Data set length after filtering//
			$fQuery			= "SELECT $sIndexColumn FROM   $sTable $sWhere";
			$fResult		= $this->db->query($fQuery);
			$FilteredTotal	= $fResult->num_rows();
	
			//Total data set length //
			$tQuery			= "SELECT $sIndexColumn FROM   $sTable";
			$tResult		= $this->db->query($tQuery);
			$Total			= $tResult->num_rows();
	
			//Output
			
			if($_GET['sEcho']==1){
				
				$cStart=0;
				$cEnd=$_GET['iDisplayLength'];
				$cLength=$_GET['iDisplayLength'];
				$cPage=0;
				$cTotalPage=ceil($FilteredTotal/$_GET['iDisplayLength']);
			}
			else{
				$cStart=$_GET['iDisplayStart'];
				$cEnd=$_GET['iDisplayStart']=$_GET['iDisplayLength'];
				$cLength=$_GET['iDisplayLength'];
				$cPage=intval($cStart/$cLength);
				$cTotalPage=ceil($FilteredTotal/$_GET['iDisplayLength']);
			}
			$output = array(
				"cStart"				=> $cStart,
				"cEnd"					=> $cEnd,
				"cLength"				=> $cLength,
				"cPage"					=> $cPage,
				"cTotalPage"			=> $cTotalPage,
				"sEcho" 				=> intval($_GET['sEcho']),
				"iTotalRecords" 		=> $Total,
				"iTotalDisplayRecords" 	=> $FilteredTotal,
				"aaData" 				=> array()
			);
			$result	= $rResult->result_array();
			$j=$cStart+1;
			foreach($result as $aRow){
				
				$row = array();
				for ( $i=0 ; $i<count($aColumns) ; $i++ )
				{
					
					if ( $aColumns[$i] == "sl" )
					{
						$row[] = $j;
					}
					//else if($aColumns[$i] == "amount"){
						
						//if(PR_TAX_INCLUDE){
							//$row[]=$aRow[ $aColumns[$i] ];
						//}
						//else{
							//$row[]=number_format($aRow[ $aColumns[$i] ]+ $aRow['pr_tax_amount'],DECIMAL_DIGITS);
						//}
						
					//}
					else if( $aColumns[$i] == "status" ){
						
						//$row[] = "<button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Extra Small Button</button>";
						$row[] = $this->Common_model->status_template($aRow['status']);
						
					}
					else if( $aColumns[$i] == "action" ){
						$id		=$aRow['id'];
						//if($aRow['status']==2){
							
							//$row[]	= "<a href='Purchase/purchase_confirm/$id/' class='on-default edit-row edit-icon'><button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Confirm</button></a>";
						//}
						//if($aRow['status']==5){
							
							$row[]	= "<a href='Purchase/purchase_details/$id/' class='on-default edit-row edit-icon'><button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Details</button></a>";

						//}
						
						
					}
					else if ( $aColumns[$i] != ' ' )
					{
						// General output 
						$row[] = $aRow[ $aColumns[$i] ];
					}
					
				}
				$output['aaData'][] = $row;
				$j++;
			}
			
			echo json_encode( $output );
		}
		
		//From Purchase->purchase_save
        public function purchase_save()
        {
			//Validation rules invoice_tax_amt 
			$this->form_validation->set_rules('invoice_tax_amt', 'Invoice Tax', "required|matches[total_p_tax]");
			$this->form_validation->set_rules('total_p_tax', 'Total P Tax', "required|matches[invoice_tax_amt]");
			$this->form_validation->set_rules('invoice_no', 'Invoice No', "required|is_unique[tbl_purchase.purchase_invoice_no]");
			$this->form_validation->set_rules('invoice_disc_amt', 'Invoice Discount', "matches[total_p_discount]");
			$this->form_validation->set_rules('total_p_discount', 'Total P Discount', "matches[invoice_disc_amt]");
			$this->form_validation->set_rules('rounding_amount', 'Rounding', "callback_rounding_amount_check");
			$this->form_validation->set_rules('invoice_amount', 'Invoice Amount', "required|matches[net_amount]");
			$this->form_validation->set_rules('net_amount', 'Net Amount', "required|matches[invoice_amount]");
			$this->form_validation->set_rules('total_amount', 'Total P Amount', "required");

			//Chech Validation
			if ($this->form_validation->run() == true) {
				
				$purchase_date_origin					= $this->input->post('purchase_date');
				
				//Purchase Details
				$purchase_branch 						= is_set($this->input->post('branch'),$this->user_data['user_branch']);
				$purchase_user							= is_set($this->input->post('user'),$this->user_data['user_id']);
				$purchase_date							= dateFormat($purchase_date_origin,'Y-m-d');
				$purchase_type 							= is_set($this->input->post('payment_type'),1);
				$purchase_supplier 						= $this->input->post('supplier');
				$purchase_invoice_no 					= $this->input->post('invoice_no');
				$purchase_ref_no						= is_set($this->input->post('invoice_ref_no'),'');
				$purchase_invoice_amount 				= $this->input->post('invoice_amount');
				$purchase_invoice_tax_amount			= $this->input->post('invoice_tax_amt');
				$purchase_invoice_discount_amount		= is_set($this->input->post('invoice_disc_amt'),0.00);
				$purchase_invoice_discount_percentage	= amount2perc(is_set($this->input->post('invoice_disc_amt'),0.00),$this->input->post('invoice_amount'));
				$purchase_other_expense					= is_set($this->input->post('other_expense'),0.00);
				$purchase_net_item						= count($this->input->post('product'));
				$purchase_net_pr_rate 					= $this->input->post('total_p_rate');
				$purchase_net_pr_tax					= $this->input->post('total_p_tax');
				$purchase_net_pr_discount 				= is_set($this->input->post('total_p_discount'),0.00);
				$total_amount							= $this->input->post('total_amount');
				$rounding_amount						= is_set($this->input->post('rounding_amount'),0.00);
				$purchase_net_amount					= $this->input->post('net_amount');
				$purchase_inserted_by 					= $this->user_data['user_id'];
				$purchase_inserted_date 				= date('Y-m-d h:i:s');
				$purchase_modified_by					= $this->user_data['user_id'];
				
				//Purchase Items Details
				$purchase_item_product					= $this->input->post('product');
				$purchase_item_batch					= $this->input->post('batch');
				$purchase_item_exp_date					= $this->input->post('exp_date');
				$purchase_item_qty						= $this->input->post('qty');
				$purchase_item_unit_rate				= $this->input->post('pr_unit_rate');
				$purchase_item_p_tax_percentage			= $this->input->post('pr_tax_perc');
				$purchase_item_p_tax_amount				= $this->input->post('pr_tax_amount');
				$purchase_item_p_discount_percentage	= $this->input->post('pr_discount_perc');
				$purchase_item_p_discount_amount		= $this->input->post('pr_discount_amt');
				$purchase_item_s_rate					= 0;
				$purchase_item_s_tax_percentage			= 0;
				$purchase_item_s_tax_amount				= 0;
				$purchase_item_s_discount_percentage	= 0;
				$purchase_item_s_discount_amount		= 0;
				$purchase_item_mrp						= 0;
				$purchase_item_total					= $this->input->post('pr_amount');
				
				
				$purchase_array=array(
					'purchase_branch' 						=> $purchase_branch, 						
					'purchase_user' 						=> $purchase_user,							
					'purchase_date' 						=> $purchase_date,							
					'purchase_type' 						=> $purchase_type, 							
					'purchase_supplier' 					=> $purchase_supplier,						
					'purchase_invoice_no' 					=> $purchase_invoice_no,					
					'purchase_ref_no' 						=> $purchase_ref_no,						
					'purchase_invoice_amount' 				=> $purchase_invoice_amount, 				
					'purchase_invoice_tax_amount' 			=> $purchase_invoice_tax_amount,			
					'purchase_invoice_discount_amount'		=> $purchase_invoice_discount_amount,		
					'purchase_invoice_discount_percentage' 	=> $purchase_invoice_discount_percentage,	
					'purchase_other_expense' 				=> $purchase_other_expense,					
					'purchase_net_item' 					=> $purchase_net_item,						
					'purchase_net_pr_rate' 					=> $purchase_net_pr_rate,					
					'purchase_net_pr_tax' 					=> $purchase_net_pr_tax,				
					'purchase_net_pr_discount' 				=> $purchase_net_pr_discount,
					'purchase_total_amount'					=> $total_amount,
					'purchase_rounding'						=> $rounding_amount,
					'purchase_net_amount' 					=> $purchase_net_amount,					
					'purchase_inserted_by' 					=> $purchase_inserted_by, 					
					'purchase_inserted_date' 				=> $purchase_inserted_date, 				
					'purchase_modified_by' 					=> $purchase_modified_by,					
				);
				
				
				
		
				// Inserting to Table
				$this->db->trans_start();
				$this->db->insert('tbl_purchase', $purchase_array);
				
				if($this->db->affected_rows()){
					
					$purchase_id=$this->db->insert_id();
					for($i=0; $i<count($this->input->post('product')); $i++){
						
						$purchase_item[]=array(
							'purchase_item_purchase'				=> $purchase_id,				
							'purchase_item_product'					=> $purchase_item_product[$i],					
							'purchase_item_batch'                   => $purchase_item_batch[$i],					
							'purchase_item_exp_date'                => dateFormat($purchase_item_exp_date[$i],'Y-m-d'),	
							'purchase_item_unit_rate'               => $purchase_item_unit_rate[$i],							
							'purchase_item_qty'                     => $purchase_item_qty[$i],
							'purchase_item_p_rate'					=> $purchase_item_unit_rate[$i]*$purchase_item_qty[$i],					
							'purchase_item_unit_rate'               => $purchase_item_unit_rate[$i],				
							'purchase_item_p_tax_percentage'        => $purchase_item_p_tax_percentage[$i],			
							'purchase_item_p_tax_amount'            => $purchase_item_p_tax_amount[$i],				
							'purchase_item_p_discount_percentage'   => $purchase_item_p_discount_percentage[$i],	
							'purchase_item_p_discount_amount'       => $purchase_item_p_discount_amount[$i],		
							'purchase_item_s_rate'                  => $purchase_item_s_rate,					
							'purchase_item_s_tax_percentage'        => $purchase_item_s_tax_percentage,			
							'purchase_item_s_tax_amount'            => $purchase_item_s_tax_amount,				
							'purchase_item_s_discount_percentage'   => $purchase_item_s_discount_percentage,	
							'purchase_item_s_discount_amount'       => $purchase_item_s_discount_amount,		
							'purchase_item_mrp'                     => $purchase_item_mrp,						
							'purchase_item_total'                   => $purchase_item_total[$i],					
						);
						
						
					}
					
					$this->db->insert_batch('tbl_purchase_item',$purchase_item);
					
				}
				
					//$this->Common_model->add_cashbook($purchase_branch,101,$purchase_date,2,"Purchase","Pid_".$purchase_id."-Piv_".$purchase_invoice_no,$purchase_invoice_amount);
					
					//$this->Common_model->add_cashbook($purchase_branch,100,$purchase_date,1,"Cashbook","Pid_".$purchase_id."-Piv_".$purchase_invoice_no,$purchase_invoice_amount);

				$this->db->trans_complete();
				if($this->db->trans_status() == true){
					
					$this->db->trans_commit();
					$this->session->set_flashdata('success', 'Success');
					$this->output->set_status_header('200');
					echo json_encode(array('status'=>'200','message'=>'Success','redirect'=>'Purchase/purchase_list/'));
				}
				else{
					
					$this->db->trans_rollback();
					$this->output->set_status_header('500');
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!'));
						
				}
			
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','error_type'=>'badge','message'=>$this->form_validation->error_array()));
				
			}
        }
		
		//Purchase->purchase_details
		public function invoice_details($purchase_id){
			
			$purchase_id	=$purchase_id;
			$string 		= "SELECT purchase_id,purchase_branch,branch_name as branch,purchase_user,user_name as user,purchase_supplier,
							supplier_name as supplier,purchase_type,payment_method_title as type,
							DATE_FORMAT(purchase_date,'%d/%m/%Y') as date ,purchase_invoice_no as invoice_no,purchase_ref_no as ref_no,
							purchase_invoice_tax_amount as invoice_tax,purchase_invoice_discount_amount as discount_amt,purchase_invoice_amount as invoice_amount,
							purchase_other_expense as other_expense,purchase_net_pr_rate as net_pr_rate, purchase_net_pr_tax as net_pr_tax,
							purchase_net_pr_discount as net_pr_discount,purchase_total_amount as total_amount,
							purchase_rounding as rounding_amount,purchase_net_amount as pr_net_amount,purchase_status as status 
							FROM tbl_purchase
							INNER JOIN tbl_branch ON purchase_branch=branch_id
							INNER JOIN tbl_user ON purchase_user=user_id
							INNER JOIN tbl_supplier ON purchase_supplier=supplier_id
							INNER JOIN tbl_payment_method ON purchase_type=payment_method_id
							WHERE purchase_id=$purchase_id";
            $query  		= $this->db->query($string);
            $row 			= $query->row();
			return		  	$row; 
			
		}
		
		//Purchase->purchase_items
		public function purchase_items($purchase_id){
			
			$purchase_id	=$purchase_id;
			
			$string 		= "SELECT  purchase_item_id as id ,product_id,product_name as product,purchase_item_batch as batch ,
							DATE_FORMAT(purchase_item_exp_date,'%d/%m/%Y') as exp_date,purchase_item_unit_rate as p_item_unit_rate,
							purchase_item_qty as qty,purchase_item_p_rate as p_item_rate,purchase_item_p_tax_percentage as p_item_tax_perc,
							purchase_item_p_tax_amount as p_item_tax_amount,purchase_item_p_discount_percentage as p_item_discount_perc,
							purchase_item_p_discount_amount as p_item_discount_amt,purchase_item_total as p_item_total,purchase_item_status as p_item_status
							FROM tbl_purchase_item
							INNER JOIN tbl_product ON purchase_item_product=product_id
							WHERE purchase_item_purchase=$purchase_id AND purchase_item_status=1";
            $query  		= $this->db->query($string);
            $result 		= $query->result();
			return		  	$result; 
			
		}
		
		//Purchase->purchase_details
		public function purchase_details($purchase_id){
			
			$purchase_id	= $purchase_id;
			$string 		= "SELECT sum(purchase_item_p_rate) as total_purchase_rate, sum(purchase_item_p_tax_amount) as total_purchase_tax,
							sum(purchase_item_p_discount_amount) as total_purchase_discount,sum(purchase_item_total) as total_purchase_amount,
							sum(purchase_item_s_rate) as total_sale_rate,sum(purchase_item_s_tax_amount) as total_sale_tax,
							sum(purchase_item_s_discount_amount) as total_sale_discount,sum(purchase_item_mrp) as total_mrp,count(*) as item_count
							FROM tbl_purchase_item 
							WHERE purchase_item_purchase=$purchase_id";
            $query  		= $this->db->query($string);
            $row 			= $query->row();
			return		  	$row; 
			
		}
		
		//Purchase->purchase_delete
		public function purchase_delete($purchase_id){
			
			$purchase_id	= $purchase_id;
			$string 		= "SELECT purchase_invoice_no
							FROM tbl_purchase 
							WHERE purchase_id=$purchase_id";
			$query  		= $this->db->query($string);
			$invoice_no		= $query->row()->purchase_invoice_no;
			
			$this->db->where('purchase_id', $purchase_id);
			$this->db->delete('tbl_purchase');
			
			if($this->db->affected_rows()){
				$msg	= array(
						"status"=>"success",
						"message"=>"Successfully Deleted Purchase '".$invoice_no."'"
						);
			}
			else{
				$msg	= array(
						"status"=>"erroe",
						"message"=>"Failed To Delete Purchase '".$invoice_no."'"
						);
			}
			$this->session->set_flashdata('response',$msg);
		}
		
		//Purchase->purchase_confirm
		public function purchase_confirm($purchase_id){
			
			$purchase_id		= $purchase_id;
			$string 			= "SELECT purchase_branch,purchase_date,purchase_invoice_no,purchase_invoice_amount
								FROM tbl_purchase 
								WHERE purchase_id=$purchase_id";
			$query  			= $this->db->query($string);
			$row				= $query->row();
			$purchase_branch	= $row->purchase_branch;
			$purchase_date		= $row->purchase_date;
			$invoice_no			= $row->purchase_invoice_no;
			$invoice_amount		= $row->purchase_invoice_amount;
			
			$this->db->trans_start();
			
			$update_string 	= "UPDATE tbl_purchase SET purchase_status=5
							WHERE purchase_id=$purchase_id";
			$this->db->query($update_string);
			
			
			if($this->db->affected_rows()){
				
				$this->Common_model->add_cashbook($purchase_branch,101,$purchase_date,2,"Purchase a/c","Pid_".$purchase_id."-Piv_".$invoice_no,$invoice_amount);
					
				$this->Common_model->add_cashbook($purchase_branch,100,$purchase_date,1,"Cash a/c","Pid_".$purchase_id."-Piv_".$invoice_no,$invoice_amount);

				$this->db->trans_complete();
					
				if($this->db->trans_status() == true){
					
					$this->db->trans_commit();
					$msg	= array(
						"status"=>"success",
						"message"=>"Successfully Confirmed Purchase '".$invoice_no."'"
						);
				}
				else{
					
					$this->db->trans_rollback();
					$msg	= array(
						"status"=>"error",
						"message"=>"Failed to  Confirm Purchase '".$invoice_no."'"
					);
						
				}
				
				
					$msg	= array(
						"status"=>"success",
						"message"=>"Successfully Confirmed Purchase '".$invoice_no."'"
						);
			}
			else{
				$msg	= array(
					"status"=>"error",
					"message"=>"Failed to  Confirm Purchase '".$invoice_no."'"
					);
				
			}
			$this->session->set_flashdata('response',$msg);
		}
		//Purchase->purchase_item_delete
		public function purchase_item_delete(){
			
			$purchase_item	= $this->input->post('purchase_item');
			
			if($purchase_item>0 && $purchase_item!='' && $purchase_item!=null){
				
				$string 		= "SELECT purchase_item_purchase,count(*) as item_count 
								FROM tbl_purchase_item 
								WHERE purchase_item_id=$purchase_item";
				$query  		= $this->db->query($string);
				$purchase_id	= $query->row()->purchase_item_purchase;
				
				// Inserting to Table
				$this->db->trans_start();
				$this->db->where('purchase_item_id', $purchase_item);
				$this->db->delete('tbl_purchase_item1');
				
				if($this->db->affected_rows()){
					
					$total_purchase_rate	= 0;
					$total_purchase_tax		= 0;
					$total_purchase_discount= 0;
					$total_purchase_amount	= 0;
					$total_sale_rate		= 0;
					$total_sale_tax			= 0;
					$total_sale_discount	= 0;
					$total_mrp				= 0;
					$item_count				= 0;
					$modified_user			= $this->user_data['user_id'];
					
					$purchase_items_details	= $this->purchase_details($purchase_id);
					if($purchase_items_details->item_count>0){
					
						$total_purchase_rate	= $purchase_items_details->total_purchase_rate;
						$total_purchase_tax		= $purchase_items_details->total_purchase_tax;
						$total_purchase_discount= $purchase_items_details->total_purchase_discount;
						$total_purchase_amount	= $purchase_items_details->total_purchase_amount;
						$total_sale_rate		= $purchase_items_details->total_sale_rate;
						$total_sale_tax			= $purchase_items_details->total_sale_tax;
						$total_sale_discount	= $purchase_items_details->total_sale_discount;
						$total_mrp				= $purchase_items_details->total_mrp;
						$item_count				= $purchase_items_details->item_count;
					}
					
					$update_string			= "UPDATE tbl_purchase SET purchase_total_amount=$total_purchase_amount,
											purchase_invoice_amount=$total_purchase_amount+purchase_rounding,
											purchase_invoice_tax_amount=$total_purchase_tax,
											purchase_invoice_discount_amount=$total_purchase_discount,purchase_net_item=$item_count,
											purchase_net_pr_rate=$total_purchase_rate,purchase_net_pr_tax=$total_purchase_tax,
											purchase_net_pr_discount=$total_purchase_discount,purchase_net_sl_rate=$total_sale_rate,
											purchase_net_sl_tax=$total_sale_tax,purchase_net_sl_discount=$total_sale_discount,
											purchase_net_mrp=$total_mrp,purchase_net_amount=$total_purchase_amount+purchase_rounding,
											purchase_modified_by=$modified_user WHERE purchase_id=$purchase_id";
					$query					= $this->db->query($update_string);
					if($this->db->affected_rows()){
						
						$this->db->trans_complete();
						if($this->db->trans_status() == true){
							
							$this->db->trans_commit();
							//$this->output->set_status_header('200');
							//echo json_encode(array('status'=>'success','message'=>'Item Deleted Successfully'));
							$msg	= array(
									"status"=>"success",
									"message"=>"Item Deleted Successfully"
									);
									//$this->session->set_flashdata('response',$msg);
						}
						else{
							
							$this->db->trans_rollback();
							//$this->output->set_status_header('200');
							//echo json_encode(array('status'=>'error','message'=>'An Error Occured!'));
							$msg	= array(
									"status"=>"error",
									"message"=>"An Error Occured!"
									);
								//$this->session->set_flashdata('response',$msg);
						}
					}
				}
				else{
					$msg	= array(
									"status"=>"error",
									"message"=>"An Error Occured!"
									);
								//$this->session->set_flashdata('response',$msg);
					
				}
			}
			else{
				
				//$this->output->set_status_header('200');
				//echo json_encode(array('status'=>'error','message'=>'An Error Occured!'));
				$msg	= array(
						"status"=>"error",
						"message"=>"An Error Occured!"
						);
						//$this->session->set_flashdata('response',$msg);
			}
			$this->output->set_status_header('200');
			$this->session->set_flashdata('response',$msg);
			echo json_encode(array('status'=>'200','redirect'=>'Purchase/purchase_edit/'.$purchase_id.'/'));
		}
		//Purchase->purchase_update
		public function purchase_update(){
			
			
			//Validation rules invoice_tax_amt 
			$this->form_validation->set_rules('purchase_id', 'Purchase Id', "required");
			$this->form_validation->set_rules('invoice_tax_amt', 'Invoice Tax', "required|matches[total_p_tax]");
			$this->form_validation->set_rules('total_p_tax', 'Total P Tax', "required|matches[invoice_tax_amt]");
			$this->form_validation->set_rules('invoice_disc_amt', 'Invoice Discount', "matches[total_p_discount]");
			$this->form_validation->set_rules('total_p_discount', 'Total P Discount', "matches[invoice_disc_amt]");
			$this->form_validation->set_rules('rounding_amount', 'Rounding', "callback_rounding_amount_check");
			$this->form_validation->set_rules('invoice_amount', 'Invoice Amount', "required|matches[net_amount]");
			$this->form_validation->set_rules('net_amount', 'Net Amount', "required|matches[invoice_amount]");
			$this->form_validation->set_rules('total_amount', 'Total P Amount', "required");

			//Chech Validation
			if ($this->form_validation->run() == true) {
				
				
				$purchase_id							= $this->input->post('purchase_id');
				$purchase_date_origin					= $this->input->post('purchase_date');
				
				//Purchase Details
				$purchase_branch 						= is_set($this->input->post('branch'),$this->user_data['user_branch']);
				$purchase_user							= is_set($this->input->post('user'),$this->user_data['user_id']);
				$purchase_date							= dateFormat($purchase_date_origin,'Y-m-d');
				$purchase_type 							= is_set($this->input->post('payment_type'),1);
				$purchase_supplier 						= $this->input->post('supplier');
				$purchase_invoice_no 					= $this->input->post('invoice_no');
				$purchase_ref_no						= is_set($this->input->post('invoice_ref_no'),'');
				$purchase_invoice_amount 				= $this->input->post('invoice_amount');
				$purchase_invoice_tax_amount			= $this->input->post('invoice_tax_amt');
				$purchase_invoice_discount_amount		= is_set($this->input->post('invoice_disc_amt'),0.00);
				$purchase_invoice_discount_percentage	= amount2perc(is_set($this->input->post('invoice_disc_amt'),0.00),$this->input->post('invoice_amount'));
				$purchase_other_expense					= is_set($this->input->post('other_expense'),0.00);
				$purchase_net_item						= count($this->input->post('product'));
				$purchase_net_pr_rate 					= $this->input->post('total_p_rate');
				$purchase_net_pr_tax					= $this->input->post('total_p_tax');
				$purchase_net_pr_discount 				= is_set($this->input->post('total_p_discount'),0.00);
				$total_amount							= $this->input->post('total_amount');
				$rounding_amount						= is_set($this->input->post('rounding_amount'),0.00);
				$purchase_net_amount					= $this->input->post('net_amount');
				$purchase_modified_by					= $this->user_data['user_id'];
				$purchase_modified_date 				= date('Y-m-d h:i:s');
				
				//Purchase Items Details
				$purchase_item_product					= $this->input->post('product');
				$purchase_item_batch					= $this->input->post('batch');
				$purchase_item_exp_date					= $this->input->post('exp_date');
				$purchase_item_qty						= $this->input->post('qty');
				$purchase_item_unit_rate				= $this->input->post('pr_unit_rate');
				$purchase_item_p_tax_percentage			= $this->input->post('pr_tax_perc');
				$purchase_item_p_tax_amount				= $this->input->post('pr_tax_amount');
				$purchase_item_p_discount_percentage	= $this->input->post('pr_discount_perc');
				$purchase_item_p_discount_amount		= $this->input->post('pr_discount_amt');
				$purchase_item_s_rate					= 0;
				$purchase_item_s_tax_percentage			= 0;
				$purchase_item_s_tax_amount				= 0;
				$purchase_item_s_discount_percentage	= 0;
				$purchase_item_s_discount_amount		= 0;
				$purchase_item_mrp						= 0;
				$purchase_item_total					= $this->input->post('pr_amount');
				
				
				$purchase_array=array(
					'purchase_branch' 						=> $purchase_branch, 						
					'purchase_user' 						=> $purchase_user,							
					'purchase_date' 						=> $purchase_date,							
					'purchase_type' 						=> $purchase_type, 							
					'purchase_supplier' 					=> $purchase_supplier,						
					'purchase_invoice_no' 					=> $purchase_invoice_no,					
					'purchase_ref_no' 						=> $purchase_ref_no,						
					'purchase_invoice_amount' 				=> $purchase_invoice_amount, 				
					'purchase_invoice_tax_amount' 			=> $purchase_invoice_tax_amount,			
					'purchase_invoice_discount_amount'		=> $purchase_invoice_discount_amount,		
					'purchase_invoice_discount_percentage' 	=> $purchase_invoice_discount_percentage,	
					'purchase_other_expense' 				=> $purchase_other_expense,					
					'purchase_net_item' 					=> $purchase_net_item,						
					'purchase_net_pr_rate' 					=> $purchase_net_pr_rate,					
					'purchase_net_pr_tax' 					=> $purchase_net_pr_tax,				
					'purchase_net_pr_discount' 				=> $purchase_net_pr_discount,
					'purchase_total_amount'					=> $total_amount,
					'purchase_rounding'						=> $rounding_amount,
					'purchase_net_amount' 					=> $purchase_net_amount,
					'purchase_modified_by' 					=> $purchase_modified_by,
					'purchase_modified_date'				=> $purchase_modified_date				
				);
				$this->db->trans_start();
				for($i=0; $i<count($this->input->post('product')); $i++){
						
					$product=$purchase_item_product[$i];
					
					$purchase_item=array(
						'purchase_item_purchase'				=> $purchase_id,				
						'purchase_item_product'					=> $purchase_item_product[$i],					
						'purchase_item_batch'                   => $purchase_item_batch[$i],					
						'purchase_item_exp_date'                => dateFormat($purchase_item_exp_date[$i],'Y-m-d'),	
						'purchase_item_unit_rate'               => $purchase_item_unit_rate[$i],							
						'purchase_item_qty'                     => $purchase_item_qty[$i],
						'purchase_item_p_rate'					=> $purchase_item_unit_rate[$i]*$purchase_item_qty[$i],					
						'purchase_item_unit_rate'               => $purchase_item_unit_rate[$i],				
						'purchase_item_p_tax_percentage'        => $purchase_item_p_tax_percentage[$i],			
						'purchase_item_p_tax_amount'            => $purchase_item_p_tax_amount[$i],				
						'purchase_item_p_discount_percentage'   => $purchase_item_p_discount_percentage[$i],	
						'purchase_item_p_discount_amount'       => $purchase_item_p_discount_amount[$i],		
						'purchase_item_s_rate'                  => $purchase_item_s_rate,					
						'purchase_item_s_tax_percentage'        => $purchase_item_s_tax_percentage,			
						'purchase_item_s_tax_amount'            => $purchase_item_s_tax_amount,				
						'purchase_item_s_discount_percentage'   => $purchase_item_s_discount_percentage,	
						'purchase_item_s_discount_amount'       => $purchase_item_s_discount_amount,		
						'purchase_item_mrp'                     => $purchase_item_mrp,						
						'purchase_item_total'                   => $purchase_item_total[$i],					
					);
					
					$string 		= "SELECT purchase_item_id,purchase_item_product 
									FROM tbl_purchase_item 
									WHERE purchase_item_product=$product AND purchase_item_purchase=$purchase_id";
					$query		  	= $this->db->query($string);
					//$query_row  	= $this->db->query($string);
					$rows			= $query->num_rows();
					
					if($rows>0){
						
						$result 	= $query->row();
						$item_id	= $result->purchase_item_id;
						$product_id	= $result->purchase_item_product;
						
									  $this->db->where('purchase_item_id', $item_id);
									  $this->db->where('purchase_item_purchase', $purchase_id);							
						$query		= $this->db->update('tbl_purchase_item', $purchase_item);
						if($query==true){
							
							$flag=true;
						}
						else{
							
							$flag=false;
							break;
						}
						
						
					}
					else{
						
						
						$query		= $this->db->insert('tbl_purchase_item',$purchase_item);
						if($query==true){
							
							$flag=true;
						}
						else{
							
							$flag=false;
							break;
						}
					}					
						
					
				}
				
				
				if($flag==true){
					
					
					$this->db->where('purchase_id', $purchase_id);	
					$this->db->update('tbl_purchase', $purchase_array);
					$this->db->trans_complete();
					if($this->db->trans_status()==true){
						
						$this->db->trans_commit();
						$this->session->set_flashdata('success', 'Success');
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Success','redirect'=>'Purchase/purchase_list/'));
					}
					else{
						
						$this->db->trans_rollback();
						$this->output->set_status_header('500');
						echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!'));
					}
				}
				else{
					
					$this->db->trans_complete();
					$this->db->trans_rollback();
					$this->output->set_status_header('500');
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!'));
				}
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','error_type'=>'badge','message'=>$this->form_validation->error_array()));
				
			}
			
		}
		
    }