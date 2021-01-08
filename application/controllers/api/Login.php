<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Login_model');
	}


	public function index(){
		
		
			
		if($this->input->post('log_type')==1){ //login
				
			$this->form_validation->set_rules('login_id', 'User Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('device_name', 'Device Name', 'required');
			$this->form_validation->set_rules('device_id', 'Device Id', 'required');
			$this->form_validation->set_rules('fcm_token', 'Token', 'required');
			

			if ($this->form_validation->run() == true) {
				
				
				$response	= $this->Login_model->login_action();
				if($response['status']==1){
					
					$result		= $this->Login_model->login_log($response,1);
					if($result['status']==1){
				$json[]=array('user_id'=>intval($response['user_id']),'user_type'=>$response['user_type'],'name'=>$response['user_name'],'login_id'=>$response['user_login_id'],'location'=>$response['user_location'],'email'=>$response['user_email'],'mobile'=>$response['user_mobile'],'status'=>'1','message'=>'Login Successfully','api_status'=>'1');
					}
					else{
						echo json_encode(array('status'=>'0','message'=>'Login Failed'));
						
					}
				}
				else{
				    $json[]=array('status'=>'0','message'=>$response['message'],'api_status'=>'0');
				
				}
			}
			
			else{
			     $json[]=array('status'=>'0','message'=>$this->form_validation->error_array(),'api_status'=>'1');
			
				
			}
			echo json_encode($json);		
				
		}
		else{ //logout
			
			$this->form_validation->set_rules('device_name', 'Device Name', 'required');
			$this->form_validation->set_rules('device_id', 'Device Id', 'required');
			$this->form_validation->set_rules('svn_token', 'Token', 'required');
			if ($this->form_validation->run() == true) {
				
				$response	= $this->Login_model->get_device_details();
				if($response){
					
					$result		= $this->Login_model->login_log($response,0);
					if($result['status']==1){
						
						echo json_encode(array('user_id'=>$response['user_id'],'user_type'=>$response['user_type'],'status'=>'1','message'=>'logout Successfully'));
					}
					else{
						echo json_encode(array('status'=>'0','message'=>'Logout Failed'));
					}
				}
				else{
					echo json_encode(array('status'=>'0','message'=>'Logout Failed'));
				}
			}
			else{
				echo json_encode(array('status'=>'0','message'=>$this->form_validation->error_array()));
			}
			
		}
		

	}
	public function logout(){
		
		$this->session->unset_userdata('user_id');
		redirect('Login');
	}


	public function register(){
		
		//$this->form_validation->set_rules('login_id', 'User Name', 'required| is_unique[tbl_user.user_login_id]');
	
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[tbl_user.user_mobile]',
                                            array(
                                                    'is_unique'     => 'This %s'
                                            ));
                                            
		$this->form_validation->set_rules('login_id', 'User Name', 'required|min_length[5]|is_unique[tbl_user.user_login_id]',
                                            array(
                                                    'is_unique'     => 'This %s'
                                            ));

		if ($this->form_validation->run() == true) {
			
			$response	= $this->Login_model->register();
			
			if($response['status']==1){
				$json[]=array_merge($response, array('api_status' => '1'));
			}
			else{
				$json[]=array_merge($response, array('api_status' => '0'));
			}
		}
		else{
		    $errors=$this->form_validation->error_array();
		    
		     if(isset($errors['mobile']) && isset($errors['login_id']) ){
		         $message=$errors['mobile']." and User Name";
		         
		     } 
		     else if(isset($errors['mobile'])){
		          $message=$errors['mobile'];
		     }
		     else if(isset($errors['login_id'])){
		         $message=$errors['login_id'];
		     }
		     
		    
			$json[]=array('api_status'=>'0','message'=>$message.' already exist!');
		}
		echo json_encode($json);
	}
}
