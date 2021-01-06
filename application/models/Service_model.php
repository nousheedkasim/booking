<?php

    class Service_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

		//From tax->insert
        public function tax_insert()
        {
			//Validation rules
			$this->form_validation->set_rules('name', 'Tax Name', "required");
			$this->form_validation->set_rules('percentage', 'Tax Percentage', "required");

			//Chech Validation
			if ($this->form_validation->run() == true) {
				//Setting values for tabel columns
				$tax_deatails	= array('tax_name'	    	=> $this->input->post('name'),
										'tax_percentage'	=> $this->input->post('percentage'),
										);
		
				// Inserting in Table(tbl_user) 
				$this->db->insert('tbl_tax', $tax_deatails);
				if($this->db->affected_rows()){
					
					$this->session->set_flashdata('success', 'Successfully Created Tax');
					$this->output->set_status_header('200');
					echo json_encode(array('status'=>'200','message'=>'Successfully Created Tax'));
				}
				else{
					$this->output->set_status_header('500');
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!'));	
				}
			
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','message'=>$this->form_validation->error_array()));
				
			}
        }
		
		//Service->get_service_head_details
		public function get_service_head_details($service_head_id){
			
			$service_head_id	= $service_head_id;
			if($service_head_id!=''){
				$string 	= "SELECT service_head_id as id, service_head_title as title,service_head_code as code,
							service_head_amount as rate,service_head_avg_duration as duration
							FROM tbl_service_head where service_head_id = $service_head_id and  service_head_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->row();
				return		  $result;
				
			}
			
		}
		
		//Service->service_save
		public function service_save(){
			
			
			
			//Validation rules invoice_tax_amt 
			//$this->form_validation->set_rules('customer_hidden', 'Customer', "required");
			$this->form_validation->set_rules('sr_amount', 'Amount', "required");
			$this->form_validation->set_rules('total_sr_tax', 'Tax', "required");
			$this->form_validation->set_rules('total_sr_discount', 'Discount', "required");
			$this->form_validation->set_rules('sr_total', 'Total', "required");
			$this->form_validation->set_rules('rounding_amount', 'Rounding', "required");
			$this->form_validation->set_rules('net_amount', 'Net Amount', "required");
			

			//Chech Validation
			if ($this->form_validation->run() == true) {
				
				$service_date_origin					= $this->input->post('sr_date');
				
				//Service Details
				$service_invoice						= $this->get_service_invoice_number();
				$service_branch 						= is_set($this->input->post('branch'),$this->user_data['user_branch']);
				$service_user							= is_set($this->input->post('user'),$this->user_data['user_id']);
				$service_date							= dateFormat($service_date_origin,'Y-m-d');
				$service_type 							= is_set($this->input->post('payment_type'),1);
				$service_customer						= $this->input->post('customer_hidden');
				$service_amount 						= $this->input->post('sr_amount');
				$service_tax							= $this->input->post('total_sr_tax');
				$service_discount						= is_set($this->input->post('total_sr_discount'),0.00);
				//$service_invoice_discount_percentage	= amount2perc(is_set($this->input->post('total_sr_discount'),0.00),$service_amount+$service_tax);
				//$service_net_item					= count($this->input->post('service_head'));
				$service_total 							= $this->input->post('sr_total');
				$service_rounding_amount				= $this->input->post('rounding_amount');
				$service_net_amount 					= $this->input->post('net_amount');
				$service_inserted_by  					= $this->user_data['user_id'];
				$service_inserted_date 					= date('Y-m-d h:i:s');
				$service_modified_by 					= $this->user_data['user_id'];
				$service_modified_date					= date('Y-m-d h:i:s');
				
				//Service Items Details
				$service_item_head						= $this->input->post('service_head');
				$service_item_unit_rate					= $this->input->post('unit_rate');
				$service_item_qty						= $this->input->post('qty');
				$service_item_amount					= $this->input->post('amount');
				$service_item_tax_id					= $this->input->post('tax');
				$service_item_tax_perc					= $this->input->post('tax_perc');
				$service_item_tax_amount				= $this->input->post('tax_amount');
				$service_item_discount_perc				= $this->input->post('discount_perc');
				$service_item_discount_amt				= $this->input->post('discount_amt');
				$service_item_total						= $this->input->post('total');
				
				$service_array=array(
					'service_invoice' 						=> $service_invoice,				
					'service_branch' 						=> $service_branch, 				
					'service_user' 							=> $service_user,					
					'service_date' 							=> $service_date,					
					'service_type' 							=> $service_type,					
					'service_customer' 						=> $service_customer,				
					'service_amount' 						=> $service_amount, 				
					'service_tax' 							=> $service_tax,				
					'service_discount' 						=> $service_discount,
					'service_total' 						=> $service_total, 					
					'service_rounding_amount' 				=> $service_rounding_amount,		
					'service_net_amount' 					=> $service_net_amount, 			
					'service_inserted_by' 					=> $service_inserted_by, 			
					'service_inserted_date' 				=> $service_inserted_date, 			
					'service_modified_by'					=> $service_modified_by, 			
					'service_modified_date'					=> $service_modified_date,
				);
				
				
				
		
				// Inserting to Table
				$this->db->trans_start();
				$this->db->insert('tbl_service', $service_array);
				
				if($this->db->affected_rows()){
					
					$service_id=$this->db->insert_id();
					for($i=0; $i<count($this->input->post('service_head')); $i++){
						
						$service_item[]=array(
							'service_item_service'				=> $service_id,
							'service_item_head '				=> $service_item_head[$i],						
							'service_item_unit_rate'			=> $service_item_unit_rate[$i],					
							'service_item_qty'                  => $service_item_qty[$i],						
							'service_item_amount'               => $service_item_amount[$i],					
							'service_item_tax_id'               => $service_item_tax_id[$i],						
							'service_item_tax_perc'             => $service_item_tax_perc[$i],					
							'service_item_tax_amount'			=> $service_item_tax_amount[$i],								
							'service_item_discount_perc'        => $service_item_discount_perc[$i],				
							'service_item_discount_amt'        	=> $service_item_discount_amt[$i],				
							'service_item_total'            	=> $service_item_total[$i],
						);
						
						
					}
					
					$this->db->insert_batch('tbl_service_item',$service_item);
					
				}
				
					$this->Common_model->add_cashbook($service_branch,103,$service_date,2,"Service a/c","Sid_".$service_id."-Siv_".$service_invoice,$service_net_amount);
					
					$this->Common_model->add_cashbook($service_branch,100,$service_date,1,"Cash a/c","Sid_".$service_id."-Siv_".$service_invoice,$service_net_amount);

				$this->db->trans_complete();
				if($this->db->trans_status() == true){
					
					$this->db->trans_commit();
					$this->session->set_flashdata('success', 'Success');
					$this->output->set_status_header('200');
					echo json_encode(array('status'=>'200','message'=>'Success','redirect'=>'Service/service_list/'));
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
		
		function get_service_invoice_number(){
				$string 	= "SELECT service_invoice FROM tbl_service ORDER BY service_id  DESC";
				$query  	= $this->db->query($string);
				if($query->num_rows()==0){
					
					return SR_INVOICE_START;
				}
				else{
					$result 	= $query->row()->service_invoice;
					return		  $result+1;
				}
				
		}
		
		function service_list_json(){
			
			//Array of database columns which should be read and sent back to DataTables//
			$aColumns = array( 'sl','branch','invoice','date','type','customer','net_amount','action' );
			
			//Array of database search columns//
			$sColumns = array('customer','invoice','net_amount');
			
			//Indexed column (used for fast and accurate table attributes) //
			$sIndexColumn = "service_id";
			
			//DB tables to use//
			$sTable = "tbl_service 
					   INNER JOIN tbl_branch ON service_branch=branch_id
					   INNER JOIN tbl_payment_method ON service_type=payment_method_id
					   INNER JOIN tbl_customer ON service_customer=customer_id";
			
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
			$sQuery			= "SELECT SQL_CALC_FOUND_ROWS service_id as sl,branch_name as branch,service_invoice as invoice,
							DATE_FORMAT(service_date,'%d/%m/%Y') as date,payment_method_title as type,
							customer_name as customer,service_amount as amount,service_tax as tax,service_discount as discount,
							service_total as total,service_net_amount as net_amount,service_id as id,
							service_status as status
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
							
							$row[]	= "<a href='Service/service_details/$id/' class='on-default edit-row edit-icon'><button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Details</button></a>";

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
		
		public function service_details($service){
			
			$service_id		= $service;
			
			$string 		= "SELECT sum(service_item_amount) as amount, sum(service_item_tax_amount) as tax,
							sum(service_item_discount_amt) as discount,sum(service_item_total) as total,count(*) as item_count
							FROM  tbl_service_item 
							WHERE service_item_service=$service_id";
            $query  		= $this->db->query($string);
            $row 			= $query->row();
			return		  	$row; 
			
		
			
		}
		
		public function service_detail_list_json(){
			
			//Array of database columns which should be read and sent back to DataTables//
			$aColumns = array( 'sl','service_title','unit_rate','qty','amount','tax','tax_amount','discount','total' );
			
			//Array of database search columns//
			$sColumns = array('service_title','qty','total');
			
			//Indexed column (used for fast and accurate table attributes) //
			$sIndexColumn = "service_item_id";
			
			//DB tables to use//
			$sTable = "tbl_service_item 
					   INNER JOIN tbl_service ON service_item_service=service_id
					   INNER JOIN tbl_service_head ON service_item_head=service_head_id
					   INNER JOIN tbl_tax ON service_item_tax_id=tax_id";
			
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
			$sQuery			= "SELECT SQL_CALC_FOUND_ROWS service_item_id as sl,service_head_title as service_title,service_item_unit_rate as unit_rate,
							service_item_qty as qty,service_item_amount as amount,tax_name as tax,tax_percentage as tax_perc,
							service_item_tax_amount as tax_amount,service_item_discount_amt as discount,service_item_total as total,service_item_id as id
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
					//else if( $aColumns[$i] == "status" ){
						
						//$row[] = "<button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Extra Small Button</button>";
						//$row[] = $this->Common_model->status_template($aRow['status']);
						
					//}
					//else if( $aColumns[$i] == "action" ){
						//$id		=$aRow['id'];
						//if($aRow['status']==2){
							
							//$row[]	= "<a href='Purchase/purchase_confirm/$id/' class='on-default edit-row edit-icon'><button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Confirm</button></a>";
						//}
						//if($aRow['status']==5){
							
							//$row[]	= "<a href='Service/service_details/$id/' class='on-default edit-row edit-icon'><button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Details</button></a>";

						//}
						
						
					//}
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
		
    }