<?php

    class Common_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

		//From form edit controller for status list 
		public function status(){
			
			$string 	= "select status_id as id, status_title as value from tbl_status";
            $query  	= $this->db->query($string);
            $result 	= $query->result();
			return		  $result; 
			
		}
		
		//From datatable response json model: status column 
		public function status_template($status=null){
			
			$string 	= "select status_template from tbl_status where status_id=$status";
            $query  	= $this->db->query($string);
            $row 		= $query->row();
			return		  $row->status_template; 
			
		}
		
		
		//From all dropdown
		public function get_dropdown_value($table=null,$column=array(),$status=array()){
			if($table!=null){
				$columns='';
				foreach($column as $key=>$val){
					
					if(next($column)){
						$columns.=$key.' as '.$val.', ';
					}
					else{
						$columns.=$key.' as '.$val;
					}
				}
				foreach($status as $key=>$val){
					$where=$key.'='.$val;
				}
				$string = "SELECT $columns 
						FROM $table 
						WHERE $where";
				$query  = $this->db->query($string);
				$result = $query->result();
				return    $result;
				//echo $columns;
			}
			
		}
		
		//Purchase->get_product
		public function get_product(){
			
			$term=$this->input->get('search');
			if($term!=''){
				$string 	= "select product_id as id, product_name as text from tbl_product where product_name like '%$term%' and  product_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			}
			
		}
		
		//Service->get_customer
		public function get_patient(){
			
			$term=$this->input->get('search');
			if($term!=''){
				$string 	= "select patient_id as id, patient_name as text from tbl_patient where patient_name like '%$term%' and  patient_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			}
		}
		
		//Service->get_customer_details
		public function get_customer_details($customer_id){
		
			$customer_id	= $customer_id;
			if($customer_id!=''){
				$string 	= "SELECT customer_id, customer_name,customer_phone,customer_age,customer_type
							FROM tbl_customer WHERE customer_id = $customer_id and  customer_status =1";
				$query  	= $this->db->query($string);
				$result 	= $query->row();
				return		  $result;
				
			}
		}
		
		//Service->dynamic_customer_creation
		public function dynamic_customer_creation(){
			
			$customer=$this->input->post('customer');
			if($customer!=''){
				if(is_int($customer)==false){
					
					$customer_deatails	= array(
											'customer_name'	    		=> $this->input->post('customer'),
											'customer_branch '			=> $this->user_data['user_branch'],
											'customer_ref_employee '	=> $this->user_data['user_id'],
											'customer_inserted_by' 		=> $this->user_data['user_id'],
											'customer_inserted_date'	=> date('Y-m-d h:i:s'),
											'customer_modified_by'		=> $this->user_data['user_id'],
											'customer_modified_date'	=> date('Y-m-d h:i:s')									
											);
			
						// Inserting in Table(tbl_user) 
					$this->db->insert('tbl_customer', $customer_deatails);
					$result		= array(
						'customer_id'	=> $this->db->insert_id(),
						'customer_name'	=> $this->input->post('customer')
					);
					
					return $result;
					
				}
				else{
					$string 	= "SELECT customer_id  
								FROM tbl_customer 
								WHERE customer_id = $customer AND  customer_status =1";
					$query  	= $this->db->query($string);
					if($query->num_rows()==0){
					
						
					}
					else{
						
					
					}
				}
			}
			
		}
		
		
		//Service->get_service_head
		public function get_service_head(){
			
			$term=$this->input->get('search');
			if($term!=''){
				$string 	= "select service_head_id as id, service_head_title as text from tbl_service_head where service_head_title like '%$term%' and  service_head_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			}
			
		}
		
		//Service get_tax_details
		public function get_tax_details($tax_id){
			
			$tax_id	= $tax_id;
			if($tax_id!=''){
				$string 	= "SELECT tax_id, tax_name, tax_percentage
							FROM tbl_tax WHERE tax_id = $tax_id and  tax_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->row();
				return		  $result;
			}
		}
		
		public function add_cashbook($branch,$account_head_code,$date,$type,$description,$reference,$amount){
			
			$branch				= $branch;
			$account_head_code	= $account_head_code;
			$account_head		= $this->account_head($account_head_code);
			$date				= $date;
			$type				= $type;
			$description		= $description;
			$reference			= $reference;
			$amount				= $amount;
			$user				= $this->user_data['user_id'];
			$insert_date		= date('Y-m-d h:i:s');
			
			$cashbook_details=array(
				'cashbook_branch'				=> $branch,
				'cashbook_account_head_code'	=> $account_head_code,
				'cashbook_account_head'			=> $account_head,
				'cashbook_date'					=> $date,
				'cashbook_type'					=> $type,
				'cashbook_description'			=> $description,
				'cashbook_reference'			=> $reference,
				'cashbook_amount'				=> $amount,
				'cashbook_inserted_by'			=> $user,
				'cashbook_inserted_date'		=> $insert_date,
			);
			
			return $this->db->insert('tbl_cashbook', $cashbook_details);
			
			
		}
		
		public function account_head($code){
			
			$code		= $code;
			$string 	= "SELECT account_head_id FROM tbl_account_head WHERE account_head_code='$code'";
            $query  	= $this->db->query($string);
            $row 		= $query->row();
			return		  $row->account_head_id;
		}

    }