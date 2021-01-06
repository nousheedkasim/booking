<?php

    class User_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }
        

		//From User Controller->index
        public function get_usertype()
        {
			$string = "SELECT user_type_id as id,user_type_title as value 
					FROM tbl_user_type 
					WHERE user_type_status=1";
            $query  = $this->db->query($string);
            $result = $query->result();
            return   $result;

         }

		

		//From User->insert
        public function user_insert()
        {
			
			//Validation rules
			$this->form_validation->set_rules('name', 'User Name', "required");
			$this->form_validation->set_rules('mobile', 'User Mobile', "required");
			$this->form_validation->set_rules('usertype', 'User Type', "required");
			$this->form_validation->set_rules('branch', 'Branch', "required");
			$this->form_validation->set_rules('password', 'Password', "required");
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', "required|matches[password]");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");

			//Chech Validation
			if ($this->form_validation->run() == true) {
				//Setting values for tabel columns
				$user_deatails	= array('user_name'		=> $this->input->post('name'),
										'user_mobile'	=> $this->input->post('mobile'),
										'user_type'		=> $this->input->post('usertype'),
										'user_branch'	=> $this->input->post('branch'),
										'user_password'	=> md5($this->input->post('confirm_password')),
										'user_email'	=> $this->input->post('email')
										);
		
				// Inserting in Table(tbl_user)
				$this->db->insert('tbl_user', $user_deatails);
				if($this->db->affected_rows()){
					
					$msg=array(
							'status'=>'success',
							'message'=>'Successfully Added User'
							);
							
					$this->session->set_flashdata('response',$msg);
					$this->output->set_status_header('200');
					echo json_encode(array('status'=>'200','message'=>'Successfully Added User','redirect'=>'User/user_list/','api_status'=>'1'));
				}
				else{
					
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Add User!'
							);
					$this->session->set_flashdata('response',$msg);
					$this->output->set_status_header('500');
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!','api_status'=>'0'));	
				}
				
			
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','message'=>$this->form_validation->error_array(),'api_status'=>'0'));
				
			}
			
			
        }
		
		//From User->user_list_json
		public function user_list_json(){
	
			//Array of database columns which should be read and sent back to DataTables//
			$aColumns = array( 'sl', 'name', 'type', 'branch', 'email','mobile','status','action' );
			
			//Array of database search columns//
			$sColumns = array('user_name','user_email','user_mobile');
			
			//Indexed column (used for fast and accurate table attributes) //
			$sIndexColumn = "user_id";
			
			//DB tables to use//
			$sTable = "tbl_user 
					   INNER JOIN tbl_user_type ON user_type=user_type_id
					   INNER JOIN tbl_branch ON user_branch=branch_id";
			
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
			$sQuery			= "SELECT SQL_CALC_FOUND_ROWS user_id as sl,user_name as name,user_type_title as type,branch_name as branch,user_email as email,user_mobile as mobile,user_status as status,user_id as id
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
					else if( $aColumns[$i] == "status" ){
						
						//$row[] = "<button type='button' style='margin-top:-5px; margin-bottom:-5px;' class='btn btn-xs btn-primary'>Extra Small Button</button>";
						$row[] = $this->Common_model->status_template($aRow['status']);
						
					}
					else if( $aColumns[$i] == "action" ){
						
						$id   =$aRow['id'];
						$edit = "<a href='User/user_edit/$id/' class='on-default edit-row edit-icon'><i class='fa fa-pencil'></i></a>";
						$edit.= "<a href='User/user_delete/$id/' class='on-default remove-row edit-icon' data-toggle='confirmation'><i class='fa fa-trash-o'></i></a>";
						$row[]= $edit;
						
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
		
		//From User->user_edit
		public function get_user($user_id=null){
			
			if($user_id!=null){
				
				$string = "SELECT user_name, user_code, user_type, user_branch, user_email, user_mobile, user_status 
						  FROM tbl_user 
						  WHERE user_id=$user_id";
				$query  = $this->db->query($string);
				$result = $query->row();
				return    $result;
			
			}
		}
		
		//From User->user_update
		public function user_update(){
			
			$this->form_validation->set_rules('edit_id', 'User Id', "required");
			$this->form_validation->set_rules('name', 'User Name', "required");
			$this->form_validation->set_rules('mobile', 'User Mobile', "required");
			$this->form_validation->set_rules('usertype', 'User Type', "required");
			$this->form_validation->set_rules('branch', 'Branch', "required");
			$this->form_validation->set_rules('email', 'Email', "required");
			$this->form_validation->set_rules('status', 'Status', "required");

			if ($this->form_validation->run() == true) {
				
				$user_id		= $this->input->post('edit_id');
				$user_deatails	= array('user_name'		=> $this->input->post('name'),
										'user_mobile'	=> $this->input->post('mobile'),
										'user_type'		=> $this->input->post('usertype'),
										'user_branch'	=> $this->input->post('branch'),
										'user_email'	=> $this->input->post('email'),
										'user_status'	=> $this->input->post('status')
										);
										
				$this->db->where('user_id', $user_id);						
				$this->db->update('tbl_user', $user_deatails);
				if($this->db->affected_rows()){
					
					$msg=array(
							'status'=>'success',
							'message'=>'Successfully Updated User'
							);
							
					$this->session->set_flashdata('response',$msg);
					$this->output->set_status_header('200');
					echo json_encode(array('status'=>'200','message'=>'Successfully Updated User','redirect'=>'User/user_list/'));
				}
				else{
					
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Update User!'
							);
					$this->session->set_flashdata('response',$msg);
					$this->output->set_status_header('500');
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!'));
					
				}
				
			
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','message'=>$this->form_validation->error_array()));
				
			}					
		}
		
		function user_delete($user_id=null){
			
			if($user_id!=null){
				
				$user_deatails	= array(
									'user_status'	=> 3
									);
			
				$this->db->where('user_id', $user_id);			
				$this->db->update('tbl_user', $user_deatails);
				if($this->db->affected_rows()){
					
					$msg=array(
							'status'=>'success',
							'message'=>'Successfully Delete User'
							);
					
				}
				else{
					
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Delete User!'
							);
							
					
				}
				$this->session->set_flashdata('response',$msg);
				
			}
			
		}

    }