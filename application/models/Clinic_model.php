<?php

    class Clinic_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
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