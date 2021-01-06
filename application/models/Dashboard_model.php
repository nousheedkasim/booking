<?php

    class Dashboard_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

		//From form edit controller for status list 
	
		
	
		
		//Purchase->get_product
		public function get_clinic(){
			

				$string 	= "select clinic_id as id, clinic_name as name from tbl_clinic where  clinic_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			
			
		}
		
		public function get_doctor($postData){
			
				$postData = $postData['clinic'];
				$string 	= "select doctor_id as id, doctor_name as name from tbl_doctor  JOIN tbl_doctor_clinic ON doctor_clinic_doctor=doctor_id where  doctor_status=1 AND doctor_clinic_clinic=$postData";
				$query  	= $this->db->query($string);
				$result 	= $query->result_array();
				return		  $result;
				
			
		}
	
		

		


    }