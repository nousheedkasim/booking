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
	
		
		public function get_fcm_tocken($id,$type=''){
		    
		    //if($type==4){
    			$string 	= "SELECT login_fcm_token FROM tbl_login_log
    			                INNER JOIN tbl_doctor ON doctor_user=login_user WHERE doctor_id=$id order by login_id desc limit 1";
                $query  	= $this->db->query($string);
               return  $query->row();
    		
		    //}
		}
		public function get_patient(){
			
			$term=$this->input->get('search');
			if($term!=''){
				$string 	= "select patient_id as id, patient_name as text from tbl_patient where patient_name like '%$term%' and  patient_status=1";
				$query  	= $this->db->query($string);
				$result 	= $query->result();
				return		  $result;
			}
		}

    }