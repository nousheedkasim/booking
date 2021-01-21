<?php

    class Patient_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

		
        public function patient_insert()
        {
			
			//Validation rules
			$this->form_validation->set_rules('name', 'User Name', "required");
			$this->form_validation->set_rules('mobile', 'User Mobile', "required");
			$this->form_validation->set_rules('age', 'User Type', "required");
			$this->form_validation->set_rules('gender', 'Branch', "required");
			

			//Chech Validation
			if ($this->form_validation->run() == true) {
				//Setting values for tabel columns
				$patient_deatails	= array('patient_name'		=> $this->input->post('name'),
										'patient_mobile'	=> $this->input->post('mobile'),
										'patient_age'		=> $this->input->post('age'),
										'patient_gender'	=> $this->input->post('gender')
										);
		
				
				$this->db->insert('tbl_patient', $patient_deatails);
				if($this->db->affected_rows()){
					
					$msg=array(
							'status'=>'success',
							'message'=>'Successfully Added Patient'
							);
					
					echo json_encode(array('status'=>'200','message'=>'Successfully Added Patient','redirect'=>'User/user_list/','api_status'=>'1'));
				}
				else{
					
					$msg=array(
							'status'=>'error',
							'message'=>'Failed to Add Patient!'
							);
					
					echo json_encode(array('status'=>'200','message'=>'Database Problem Occurred!','api_status'=>'0'));	
				}
				
			
			}
			else{
				
				$this->output->set_status_header('400');
				echo json_encode(array('status'=>'400','message'=>$this->form_validation->error_array(),'api_status'=>'0'));
				
			}
			
			
        }
        
        public function patient_details(){
			
			$patient_id=$this->input->get_post('patient_id');
			
			 $string 		= "SELECT tbl_patient.*,booking_doctor as doctor_id,booking_clinic as clinic_id,booking_diagnosis as diagnosis_id
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        WHERE patient_id=$patient_id ORDER BY booking_id DESC limit 1";
			
            $query  = $this->db->query($string);
            $result = $query->row();
            return   $result;
		}
		public function patient_booking_details(){
			
			$patient_id=$this->input->get_post('patient_id');
			
			 $string 		= "SELECT tbl_patient.*,doctor_id,doctor_name,booking_clinic as clinic_id,booking_diagnosis as diagnosis_id,diagnose_slot_duration as duration
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
								INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
								INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        WHERE patient_id=$patient_id ORDER BY booking_id DESC limit 1";
			
            $query  = $this->db->query($string);
            $result = $query->row();
            return   $result;
		}
		
		
		

    }