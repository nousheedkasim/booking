<?php

    class Clinic_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

		
        public function clinic_list(){
			$string = "SELECT user_type_id as id,user_type_role as value 
					FROM tbl_user_type 
					WHERE user_type_status=1";
            $query  = $this->db->query($string);
            $result = $query->result();
            return   $result;
		}
		public function clinic_doctor($clinic_id){
			
			$string = "SELECT doctor_id as id,doctor_name as value 
					FROM tbl_doctor
					INNER JOIN tbl_doctor_clinic ON doctor_clinic_doctor=doctor_id				
					WHERE doctor_clinic_clinic=$clinic_id AND doctor_clinic_status=1 GROUP BY doctor_id";
            $query  = $this->db->query($string);
            $result = $query->result();
            return   $result;
		}
		
		public function clinic_based_doctor(){
		    
		    $user_id		= $this->input->post('user_id');
		    $string = "SELECT clinic_id as id,clinic_name as value 
					FROM tbl_clinic
					INNER JOIN tbl_doctor_clinic ON doctor_clinic_clinic=clinic_id
					INNER JOIN tbl_doctor ON doctor_id=tbl_doctor_clinic.doctor_clinic_doctor				
					WHERE doctor_user = $user_id AND doctor_clinic_status=1 GROUP BY doctor_id";
            $query  = $this->db->query($string);
            $result = $query->result();
            return   $result;

		}
		
		public function get_clinic_details(){
		    
		    $string = "SELECT clinic_id as id,clinic_name as value,clinic_location, clinic_phone, clinic_email,clinic_working_status,clinic_latitude,clinic_longitude
					FROM tbl_clinic 
					WHERE clinic_working_status=1";
			$query  = $this->db->query($string);
            $result = $query->result();
            return   $result;
		}
		
		

    }