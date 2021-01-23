<?php

    class Login_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }
        

		// Called From Login ->action
        public function login_action()
        {
			$login_id	= $this->input->post('login_id');
			$password	= md5($this->input->post('password'));
			$string 	= "select user_id,user_type from tbl_user where user_name='$login_id' and user_password='$password'";
            $query  	= $this->db->query($string);
            $row 		= $query->row();
			
			if (isset($row))
			{
				//$this->session->set_userdata('user_id',$row->user_id);
				$return['status']		= 1;
				$return['user_id']		=  $row->user_id;
				$return['user_type']	=  $row->user_type;
				$return['message']		= 'Login Succesfully';
			}
			else{
				$return['status']		= 0;
				$return['message']		= 'User Name or Password Incorrect!';
			}
			
            return   $return;

        }
		
		public function login_details($user_id=null){
			
			$string 	= "select user_id,user_name,user_code,user_type,user_branch from tbl_user where user_id=$user_id";
            $query  	= $this->db->query($string);
            $row 		= $query->row();
			return		  $row; 
			
		}
		
		public function login_log($platform=0,$response,$log_status){
			
			$login_deatails	= array(
								'login_user'		=> $response['user_id'],
								'login_device_id'	=> $this->input->post('device_id'),
								'login_device_name'	=> $this->input->post('device_name'),
								'login_fcm_token'	=> $this->input->post('fcm_token'),
								'login_platform'	=> $platform,
								'login_datetime'	=> date("Y-m-d h:i:s"),
								'login_status'		=> $log_status
								);
		
			// Inserting in Table(tbl_user)
			$this->db->insert('tbl_login_log', $login_deatails);
			if($this->db->affected_rows()){
				return 1;
			}
			else{
				return 0;
			}
			
			
		}
		
		public function get_device_details(){
			
			$device_id	= $this->input->post('device_id');
			$string 	= "SELECT user_id,user_type
							FROM tbl_user 
							INNER JOIN tbl_login_log ON login_user=user_id  
							WHERE login_device_id='$device_id' ORDER BY login_id  DESC limit 1";
            $query  	= $this->db->query($string);
            $row 		= $query->row();
			$return['user_id']		=  $row->user_id;
			$return['user_type']	=  $row->user_type;
			return		  $return; 
		}



		public function register(){

			
			//Setting values for tabel columns
			$user_deatails	= array('user_name'		=> $this->input->post('name'),
									'user_login_id'	=> $this->input->post('login_id'),
									'user_mobile'	=> $this->input->post('mobile'),
									'user_type'		=> $this->input->post('type'),
									'user_location'	=> $this->input->post('location'),
									'user_password'	=> md5($this->input->post('password')),
									'user_email'	=> $this->input->post('email')
									);
		
			// Inserting in Table(tbl_user)
			$this->db->insert('tbl_user', $user_deatails);
			if($this->db->affected_rows()){
				
				$result=array(
						'status'=>1,
						'user_type'=>$this->input->post('type'),
						'user_id'=>$this->db->insert_id(),
						'message'=>'Restration Successfully'
						);
				return $result;
			}
			else{
				
				$result=array(
						'status'=>0,
						'message'=>'Restration Failed!'
						);
				return $result;
				
			}
        
		}
		
		//** nsk 23/01/2021//
		//MY_Controller Construct
				
		public function getClincId($user_id){
			
			$string 	= "SELECT clinic_id
							FROM tbl_clinic  
							WHERE clinic_user=$user_id";
            $query  	= $this->db->query($string);
            return       $query->row()->clinic_id;
		}
				
		
		public function checkUser($platform=0){
			
			$login_id	= $this->input->post('login_id');
			
			$string 	= "select user_id,user_type,user_name,user_login_id,user_location,user_email,user_mobile from tbl_user where user_login_id='$login_id'";
            $query  	= $this->db->query($string);
            return 		$query->row();
			 
			
		}
		//nsk 23/01/2021 **//
		

    }