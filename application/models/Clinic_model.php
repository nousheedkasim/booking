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
					WHERE doctor_clinic_clinic=$clinic_id AND doctor_clinic_status=1";
            $query  = $this->db->query($string);
            $result = $query->result();
            return   $result;
		}
		
		

    }