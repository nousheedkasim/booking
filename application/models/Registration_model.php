<?php

    class Registration_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

				//Registration->clinic_insert || api/Registration->clinic_insert
				public function clinic_insert(){
			
					$this->form_validation->set_rules('name', 'Name', "required");
					$this->form_validation->set_rules('location', 'Location', "required");
					$this->form_validation->set_rules('phone', 'Phone', "required");
					$this->form_validation->set_rules('email', 'Email', "required");
					$this->form_validation->set_rules('working_from', 'Working From', "required");
					$this->form_validation->set_rules('working_to', 'Working To', "required");
			
								//Chech Validation
							if ($this->form_validation->run() == true) {
								//Setting values for tabel columns
								$clinic_deatails	= array('clinic_name'	    		=> $this->input->post('name'),
															'clinic_location'			=> $this->input->post('location'),
															'clinic_phone'				=> $this->input->post('phone'),
															'clinic_email'				=> $this->input->post('email'),
															'clinic_working_from'		=> $this->input->post('working_from'),
															'clinic_working_to'			=> $this->input->post('working_to'),
															);
						
								// Inserting in Table(tbl_user) 
								$this->db->insert('tbl_clinic', $clinic_deatails);
								if($this->db->affected_rows()){
									
									$this->session->set_flashdata('success', 'Successfully Created Clinic');
									$this->output->set_status_header('200');
									echo json_encode(array('status'=>'200','message'=>'Successfully Created Clinic','api_status'=>'1'));
								}
								else{
									$this->output->set_status_header('500');
									echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!','api_status'=>'0'));	
								}
							
							}
							else{
								
								$this->output->set_status_header('400');
								echo json_encode(array('status'=>'400','message'=>$this->form_validation->error_array(),'api_status'=>'0'));
								
							}
									
				}
				
				public function clinic_list_json(){
					//Array of database columns which should be read and sent back to DataTables//
					$aColumns = array( 'sl', 'name', 'location', 'email', 'phone', 'from','to','status','action');
					
					//Array of database search columns//
					$sColumns = array('clinic_name','clinic_phone','clinic_email');
					
					//Indexed column (used for fast and accurate table attributes) //
					$sIndexColumn = "clinic_id";
					                                
					//DB tables to use//
					$sTable = "tbl_clinic"; 
							   
					
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
					$sQuery			= "SELECT SQL_CALC_FOUND_ROWS clinic_id as sl,clinic_name as name,clinic_location as location,
									clinic_email as email,clinic_phone as phone,clinic_working_from as from,clinic_working_to as to,clinic_working_status as status,clinic_id as id
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
								$edit = "<a title='edit' href='Registration/clinic_edit/$id/' class='on-default edit-row edit-icon'><i class='fa fa-pencil'></i></a>";
								$edit.= "<a title='delete' href='Registration/clinic_delete/$id/' class='on-default remove-row edit-icon' data-toggle='confirmation'><i class='fa fa-trash-o'></i></a>";
								$edit.= "<a title='Toggle' href='Registration/clinic_toggle/$id/' class='on-default edit-icon'><i class='fa fa-refresh'></i></a>";
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
				
				// Registration->company_details
				public function clinic_details($clinic_id){
					
					$clinic_id = $clinic_id;
					if($clinic_id!=null){
						
						$string = "SELECT clinic_id,clinic_name, clinic_location, clinic_phone, clinic_email
								  FROM tbl_clinic 
								  WHERE clinic_id=$clinic_id";
						$query  = $this->db->query($string);
						$result = $query->row();
						return    $result;
					}
				}
				
				//Registration->company_update
				public function clinic_update(){
					
					$this->form_validation->set_rules('edit_id', 'Edit Id', "required");
					$this->form_validation->set_rules('name', 'Name', "required");
					$this->form_validation->set_rules('address', 'Address', "required");
					$this->form_validation->set_rules('phone', 'Phone', "required");
					$this->form_validation->set_rules('email', 'Email', "required");
					$this->form_validation->set_rules('tax_type', 'Tax Type', "required");
					$this->form_validation->set_rules('tax_number', 'Tax Number', "required");
			
					if ($this->form_validation->run() == true) {
						$company_id			= $this->input->post('edit_id');
						$company_deatails	= array(
												'company_name'   	=> $this->input->post('name'),
												'company_address'   => $this->input->post('address'),
												'company_phone'   	=> $this->input->post('phone'),
												'company_email'   	=> $this->input->post('email'),
												'company_web'   	=> $this->input->post('web'),
												'company_tax_type' 	=> $this->input->post('tax_type'),
												'company_tax_number'=> $this->input->post('tax_number'),
											   );
						$this->db->where('company_id', $company_id);	
						$this->db->update('tbl_company', $company_deatails);
						if($this->db->affected_rows()){	
								
							$msg	= array(
										'status'=>'success',
										'message'=>'Successfully Updated Comapny'
									  );
									
							$this->session->set_flashdata('response',$msg);
							$this->output->set_status_header('200');
							echo json_encode(array('status'=>'200','message'=>'Successfully Updated Company','redirect'=>'Registration/company_list/','api_status'=>'1'));
						}
						else{
								
							$msg	= array(
										'status'=>'error',
										'message'=>'Failed to Updated Comapny!'
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
				
				//Registration->company_delete
				public function clinic_delete($company_id){
					
					if($company_id!=null){
						
						$company_deatails	= array(
											'company_status'	=> 3
											);
					
						$this->db->where('company_id', $company_id);			
						$this->db->update('tbl_company', $company_deatails);
						if($this->db->affected_rows()){
							
							$msg=array(
									'status'=>'success',
									'message'=>'Successfully Delete Company'
									);
							$this->session->set_flashdata('response',$msg);
							echo json_encode(array('status'=>'200','message'=>'Successfully Delete Company','redirect'=>'Registration/company_list/','api_status'=>'1'));
							
						}
						else{
							
							$msg=array(
									'status'=>'error',
									'message'=>'Failed to Delete Company!'
									);
							$this->session->set_flashdata('response',$msg);	
							echo json_encode(array('status'=>'200','message'=>'Failed to Delete Company','redirect'=>'Registration/company_list/','api_status'=>'0'));
						}
						
						
					}
				}
				
				//Registration->company_toggle
				public function clinic_toggle($copmany_id){
					
					$string	= "UPDATE tbl_company SET company_status=IF(company_status=1,2,1)";
					$result = $this->db->query($string);
					if($this->db->affected_rows()){
							
							$msg=array(
									'status'=>'success',
									'message'=>'Successfully Change Status'
									);
									
							$this->session->set_flashdata('response',$msg);
							$this->output->set_status_header('200');
							echo json_encode(array('status'=>'200','message'=>'Successfully Change Status','redirect'=>'Registration/company_list/','api_status'=>'1'));
						}
						else{
							
							$msg=array(
									'status'=>'error',
									'message'=>'Failed to Change Status!'
									);
							$this->session->set_flashdata('response',$msg);
							$this->output->set_status_header('500');
							echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!','api_status'=>'0'));
							
						}
				}

		//Registration->doctor_list_json
		public function doctor_insert(){
			
			
			$this->form_validation->set_rules('name', 'Name', "required");
			$this->form_validation->set_rules('designation', 'Code', "required");
			$this->form_validation->set_rules('password', 'Password', "required");
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', "required|matches[password]");
			
	
			if ($this->form_validation->run() == true) {


				$user_deatails	= array(
					'user_name'		=> $this->input->post('name'),
					'user_type'		=> 2,
					'user_password'	=> md5($this->input->post('confirm_password')),
					);
					$this->db->trans_start();
					// Inserting in Table(tbl_group) 
					$this->db->insert(' tbl_user', $user_deatails);
					if($this->db->affected_rows()){
						
						$user_id=$this->db->insert_id();
				
				//Setting values for tabel columns
				$doctor_deatails	= array(
										'doctor_name'   	=> $this->input->post('name'),
										'doctor_desig'   	=> $this->input->post('designation'),
										'doctor_user'  => $user_id,
									   );
				$this->db->trans_start();
				// Inserting in Table(tbl_group) 
				$this->db->insert('tbl_doctor', $doctor_deatails);
				
					$this->db->trans_complete();
					
					if($this->db->trans_status() == true){
					
						$this->db->trans_commit();
						
						$msg=array(
							'status'=>'success',
							'message'=>'Successfully Added Doctor'
							);
							
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Successfully Added Doctor','redirect'=>'Registration/doctor_list/','api_status'=>'1'));
				
					}
					else{
						$this->db->trans_rollback();
						$msg=array(
							'status'=>'error',
							'message'=>'Failed to Add Doctor!'
							);
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('500');
						echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!','api_status'=>'0'));	
				
					}
					
				}
				else{
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Add Branch!'
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
		
		//Registration->branch_list_json
		public function doctor_list_json(){
			
			//Array of database columns which should be read and sent back to DataTables//
			$aColumns = array( 'sl', 'name','designation', 'status','action' );
			
			//Array of database search columns//
			$sColumns = array('doctor_name', 'doctor_desig');
			
			//Indexed column (used for fast and accurate table attributes) //
			$sIndexColumn = "doctor_id";
			
			//DB tables to use//
			$sTable = "tbl_doctor";
			
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
			$sQuery			= "SELECT SQL_CALC_FOUND_ROWS doctor_id as sl,doctor_name as name,doctor_desig as designation,
							doctor_status as status,doctor_id as id
							FROM   $sTable
							$sWhere
							$sOrder
							$sLimit";
			$rResult 		= $this->db->query($sQuery);
	
			//Data set length after filtering//
			//$fQuery			= "SELECT FOUND_ROWS()";
			//$fResult		= $this->db->query($fQuery);
			$FilteredTotal	= $rResult->num_rows();
	
			//Total data set length //
			$tQuery			= "SELECT $sIndexColumn FROM   $sTable";
			$tResult		= $this->db->query($tQuery);
			$Total			= $tResult->num_rows();
	
			//Output
			$output = array(
				"sEcho" 				=> intval($_GET['sEcho']),
				"iTotalRecords" 		=> $Total,
				"iTotalDisplayRecords" 	=> $FilteredTotal,
				"aaData" 				=> array()
			);
			$result	= $rResult->result_array();
			$j=1;
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
						$row[] = $this->Common_model->status_template($aRow[ $aColumns[$i] ]);
						
					}
					else if( $aColumns[$i] == "action" ){
						
						$id   = $aRow['id'];
						$edit = "<a title='Edit' href='Registration/doctor_edit/$id/' class='on-default edit-row edit-icon'><i class='fa fa-pencil'></i></a>";
						$edit.= "<a title='Delete' href='Registration/doctor_delete/$id/' class='on-default remove-row edit-icon' data-toggle='confirmation'><i class='fa fa-trash-o'></i></a>";
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
		
		//Registration->branch_details
		public function doctor_details($doctor_id){
			
			$doctor_id = $doctor_id;
			if($doctor_id!=null){
				
				$string = "SELECT doctor_id,doctor_name, doctor_desig ,doctor_status
						  FROM tbl_doctor 
						  WHERE doctor_id=$doctor_id";
				$query  = $this->db->query($string);
				$result = $query->row();
				return    $result;
			}
		}
		
		//Registration->branch_update
		public function doctor_update(){
			
			$this->form_validation->set_rules('name', 'Name', "required");
			$this->form_validation->set_rules('designation', 'Code', "required");
		
	
			if ($this->form_validation->run() == true) {
				
				//Setting values for tabel columns
				$doctor_id			= $this->input->post('doctor_id');
				$doctor_deatails	= array(
										'doctor_name'   	=> $this->input->post('name'),
										'doctor_desig'   	=> $this->input->post('designation'),
										'doctor_status'		=> $this->input->post('status'),
									   );
				
				// Inserting in Table(tbl_group) 
				$this->db->where('doctor_id',$doctor_id);
				$this->db->update('tbl_doctor', $doctor_deatails);
				if($this->db->affected_rows()){
						
						$msg=array(
							'status'=>'success',
							'message'=>'Successfully Update Doctor'
							);
							
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Successfully Update Doctor','redirect'=>'Registration/doctor_list/','api_status'=>'1'));
				
					}
					else{
						
						$msg=array(
							'status'=>'error',
							'message'=>'Failed to Update Doctor!'
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
		
		//Registration->doctor_delete
		public function doctor_delete($doctor_id=null){
			
			if($doctor_id!=null){
				
				$doctor_deatails	= array(
									'doctor_status'	=> 3
									);
			
				$this->db->where('doctor_id', $doctor_id);			
				$this->db->update('tbl_doctor', $doctor_deatails);
				if($this->db->affected_rows()){
					
					$msg=array(
							'status'=>'success',
							'message'=>'Successfully Delete doctor'
							);
					$this->session->set_flashdata('response',$msg);
					echo json_encode(array('status'=>'200','message'=>'Successfully Delete doctor','redirect'=>'Registration/doctor_list/','api_status'=>'1'));
					
				}
				else{
					
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Delete doctor!'
							);
					$this->session->set_flashdata('response',$msg);	
					echo json_encode(array('status'=>'200','message'=>'Failed to Delete doctor','redirect'=>'Registration/doctor_list/','api_status'=>'0'));
				}
				
				
			}
		}
		
		
		//Registration->get_diagnosis()//
		public function get_doctor(){
			
			$clinic	= $this->uri->segment(3);
			$term	= $this->input->get('search');
			if($term!=''){
				$string 	= "SELECT doctor_id as id, doctor_name as text 
							FROM tbl_doctor
							INNER JOIN tbl_doctor_clinic ON doctor_id=doctor_clinic_doctor
							WHERE doctor_name LIKE '%$term%' AND doctor_clinic_clinic=$clinic AND doctor_clinic_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			}
		}
	

		public function diagnose_insert(){
			
			$this->form_validation->set_rules('name', 'Name', "required");
			$this->form_validation->set_rules('slot_duration', 'Address', "required");
	
			if ($this->form_validation->run() == true) {
				
				//Setting values for tabel columns
				
					$diagnose_deatails	= array(
										'diagnose_name'					=> $this->input->post('name'),
										'diagnose_slot_duration'		=> $this->input->post('slot_duration'),
										'diagnose_status'				=> 1,
										);
				
				// Inserting in Table(tbl_group) 
				$this->db->insert('tbl_diagnose', $diagnose_deatails);
				$chair_id=$this->db->insert_id();
				if($this->db->affected_rows()){
						
						$msg=array(
							'status'=>'success',
							'message'=>'Successfully Added diagnose'
							);
							
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Successfully Added diagnose','redirect'=>'Registration/diagnose_list/','api_status'=>'1','id'=>$chair_id,'code'=>$this->input->post('code')));
				
				}
				else{
						
						$msg=array(
							'status'=>'error',
							'message'=>'Failed to Add Chair!'
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
		
			//Registration->diagnose_list_json
			public function diagnose_list_json(){
			
				//Array of database columns which should be read and sent back to DataTables//
				$aColumns = array( 'sl', 'name', 'diagnose_slot_duration','status','action');
				
				//Array of database search columns//
				$sColumns = array('diagnose_name','diagnose_slot_duration');
			
				//Indexed column (used for fast and accurate table attributes) //
				$sIndexColumn = "diagnose_id";
				
				//DB tables to use//
				$sTable = "tbl_diagnose";
				
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
				$sQuery			= "SELECT SQL_CALC_FOUND_ROWS diagnose_id as sl,diagnose_name as name,diagnose_slot_duration as diagnose_slot_duration,
								diagnose_status as status,diagnose_id as id
								FROM   $sTable
								$sWhere
								$sOrder
								$sLimit";
				$rResult 		= $this->db->query($sQuery);
		
				//Data set length after filtering//
				//$fQuery			= "SELECT FOUND_ROWS()";
				//$fResult		= $this->db->query($fQuery);
				$FilteredTotal	= $rResult->num_rows();
		
				//Total data set length //
				$tQuery			= "SELECT $sIndexColumn FROM   $sTable";
				$tResult		= $this->db->query($tQuery);
				$Total			= $tResult->num_rows();
		
				//Output
				$output = array(
					"sEcho" 				=> intval($_GET['sEcho']),
					"iTotalRecords" 		=> $Total,
					"iTotalDisplayRecords" 	=> $FilteredTotal,
					"aaData" 				=> array()
				);
				$result	= $rResult->result_array();
				$j=1;
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
							$row[] = $this->Common_model->status_template($aRow[ $aColumns[$i] ]);
							
						}
						else if( $aColumns[$i] == "action" ){
							
							$id   = $aRow['id'];
							$edit = "<a title='Edit' href='Registration/diagnose_edit/$id/' class='on-default edit-row edit-icon'><i class='fa fa-pencil'></i></a>";
							$edit.= "<a title='Delete' href='Registration/diagnose_delete/$id/' class='on-default remove-row edit-icon' data-toggle='confirmation'><i class='fa fa-trash-o'></i></a>";
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

		//Registration->diagnose_list_json
		
		//Registration->diagnose_edit
		public function diagnose_details($diagnose_id){ 
			
			$diagnose_id = $diagnose_id;
			if($diagnose_id!=null){
				
				$string = "SELECT diagnose_id,diagnose_name,diagnose_slot_duration,diagnose_status
						  FROM tbl_diagnose
						  WHERE diagnose_id = $diagnose_id";
				$query  = $this->db->query($string);
				$result = $query->row();
				return    $result;
			}
		}
		
		//Registration->diagnose_update
		public function diagnose_update(){
			
			$this->form_validation->set_rules('diagnose_id', 'diagnose_id', "required");
			$this->form_validation->set_rules('name', 'Name', "required");
			$this->form_validation->set_rules('slot_duration', 'Address', "required");
			
	
			if ($this->form_validation->run() == true) {
					
					$diagnose_id		= $this->input->post('diagnose_id');
					$diagnose_deatails	= array(
										'diagnose_name'					=> $this->input->post('name'),
										'diagnose_slot_duration'		=> $this->input->post('slot_duration'),
										'diagnose_status'		=> $this->input->post('status'),
										);
		
					$this->db->where('diagnose_id',$diagnose_id);
					$this->db->update('tbl_diagnose', $diagnose_deatails);
					
					if($this->db->affected_rows()){
						
						$msg=array(
							'status'=>'success',
							'message'=>'Successfully Updated diagnose'
							);
							
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Successfully Updated diagnose','redirect'=>'Registration/diagnose_list/','api_status'=>'1'));
				
					}
					else{
						
						$msg=array(
							'status'=>'error',
							'message'=>'Failed to Update diagnose!'
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
		
		//Registration->diagnose_delete
		public function diagnose_delete($diagnose_id=null){
			
			if($diagnose_id!=null){
				
				$diagnose_deatails	= array(
									'diagnose_status'	=> 3
									);
			
				$this->db->where('diagnose_id', $diagnose_id);			
				$this->db->update('tbl_diagnose', $diagnose_deatails);
				if($this->db->affected_rows()){
					
					$msg=array(
							'status'=>'success',
							'message'=>'Successfully Delete diagnose'
							);
					$this->session->set_flashdata('response',$msg);
					echo json_encode(array('status'=>'200','message'=>'Successfully Delete diagnose','redirect'=>'Registration/diagnose_list/','api_status'=>'1'));
					
				}
				else{
					
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Delete diagnose!'
							);
					$this->session->set_flashdata('response',$msg);	
					echo json_encode(array('status'=>'200','message'=>'Failed to Delete diagnose','redirect'=>'Registration/diagnose_list/','api_status'=>'0'));
				}
				
				
			}
		}
		
		//Registration->get_diagnosis()//
		public function get_diagnosis(){
			
			$term=$this->input->get('search');
			if($term!=''){
				$string 	= "select diagnose_id as id, diagnose_name as text,diagnose_slot_duration as duration from tbl_diagnose where diagnose_name like '%$term%' and  diagnose_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			}
		}
		
		public function chair_insert(){
			
			$this->form_validation->set_rules('branch', 'Branch', "required");
			$this->form_validation->set_rules('name', 'Name', "required");
			
			
	
			if ($this->form_validation->run() == true) {
				
				//Setting values for tabel columns
				$chair_deatails	= array(
									'chair_branch '			=> $this->input->post('branch'),
									'chair_name'			=> $this->input->post('name'),
									'chair_code'			=> $this->input->post('code'),
									);
				
				// Inserting in Table(tbl_group) 
				$this->db->insert(' tbl_chair', $chair_deatails);
				$chair_id=$this->db->insert_id();
				if($this->db->affected_rows()){
						
						$msg=array(
							'status'=>'success',
							'message'=>'Successfully Added Chair'
							);
							
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Successfully Added Chair','redirect'=>'Registration/chair_list/','api_status'=>'1','id'=>$chair_id,'code'=>$this->input->post('code')));
				
				}
				else{
						
						$msg=array(
							'status'=>'error',
							'message'=>'Failed to Add Chair!'
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
		
		public function chair_allocation(){
			
			$this->form_validation->set_rules('branch', 'Branch', "required");
			$this->form_validation->set_rules('chair', 'Chair', "required");
			$this->form_validation->set_rules('employee', 'Employee', "required");
			
			
	
			if ($this->form_validation->run() == true) {
				
				//Setting values for tabel columns
				$chair_deatails	= array(
									'chair_allocation_branch '			=> $this->input->post('branch'),
									'chair_allocation_employee'			=> $this->input->post('employee'),
									'chair_allocation_chair'			=> $this->input->post('chair'),
									);
				
				// Inserting in Table(tbl_group) 
				$this->db->insert(' tbl_chair_allocation', $chair_deatails);
				if($this->db->affected_rows()){
						
						$msg=array(
							'status'=>'success',
							'message'=>'Successfully Allocated Chair to Employee'
							);
							
						$this->session->set_flashdata('response',$msg);
						$this->output->set_status_header('200');
						echo json_encode(array('status'=>'200','message'=>'Successfully Allocated Chair to Employee','redirect'=>'Registration/chair_allocation_list/','api_status'=>'1'));
				
				}
				else{
						
						$msg=array(
							'status'=>'error',
							'message'=>'Failed to Allocated Chair!'
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
		
		//Registration->service_group_insert
		public function service_group_insert(){
			
			$this->form_validation->set_rules('name', 'Group Name', "required");
			$this->form_validation->set_rules('code', 'Group Code', "required");

			if ($this->form_validation->run() == true) {
			
				//Setting values for tabel columns
				$service_group_deatails	=	array('service_group_name'   => $this->input->post('name'),
										  'service_group_code'	 => $this->input->post('code')
									      );
				$this->db->insert('tbl_service_group', $service_group_deatails);
				if($this->db->affected_rows()){
					
					$msg	= array(
								'status'=>'success',
								'message'=>'Successfully Created Group'
							 );
							
					$this->session->set_flashdata('response',$msg);
					$this->output->set_status_header('200');
					echo json_encode(array('status'=>'200','message'=>'Successfully Created Group','redirect'=>'Registration/service_group_list/','api_status'=>'1'));
				}
				else{
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Create Group'
							);
							
						$this->session->set_flashdata('response',$msg);
					$this->output->set_status_header('500');
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!','redirect'=>'Registration/service_group_list/','api_status'=>'0'));	
				}
			
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','message'=>$this->form_validation->error_array(),'api_status'=>'0'));
				
			}
		}
		
		public function service_group_list_json(){
	
			//Array of database columns which should be read and sent back to DataTables//
			$aColumns = array( 'sl', 'name', 'code','status','action' );
			
			//Array of database search columns//
			$sColumns = array('service_group_name','service_group_code');
			
			//Indexed column (used for fast and accurate table attributes) //
			$sIndexColumn = "service_group_id";
			
			//DB tables to use//
			$sTable = "tbl_service_group";
			
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
			$sQuery			= "SELECT SQL_CALC_FOUND_ROWS service_group_id as sl,service_group_name as name,service_group_code as code,service_group_status as status,service_group_id as id
							FROM   $sTable
							$sWhere
							$sOrder
							$sLimit";
			$rResult 		= $this->db->query($sQuery);
	
			//Data set length after filtering//
			//$fQuery			= "SELECT FOUND_ROWS()";
			//$fResult		= $this->db->query($fQuery);
			$FilteredTotal	= $rResult->num_rows();
	
			//Total data set length //
			$tQuery			= "SELECT $sIndexColumn FROM   $sTable";
			$tResult		= $this->db->query($tQuery);
			$Total			= $tResult->num_rows();
	
			//Output
			$output = array(
				"sEcho" 				=> intval($_GET['sEcho']),
				"iTotalRecords" 		=> $Total,
				"iTotalDisplayRecords" 	=> $FilteredTotal,
				"aaData" 				=> array()
			);
			$result	= $rResult->result_array();
			$j=1;
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
						$row[] = $this->Common_model->status_template($aRow[ $aColumns[$i] ]);
						
					}
					else if( $aColumns[$i] == "action" ){
						
						$id   = $aRow['id'];
						$edit = "<a href='Registration/service_group_edit/$id/' class='on-default edit-row edit-icon'><i class='fa fa-pencil'></i></a>";
						$edit.= "<a href='Registration/service_group_delete/$id/' class='on-default remove-row edit-icon' data-toggle='confirmation'><i class='fa fa-trash-o'></i></a>";
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
		
		public function service_group_details($group=null){
			
			$group_id = $group;
			if($group_id!=null){
				
				$string = "SELECT service_group_id,service_group_name,service_group_code,service_group_status
						  FROM tbl_service_group
						  WHERE service_group_id=$group_id";
				$query  = $this->db->query($string);
				$result = $query->row();
				return    $result;
			}
		}
		
    }