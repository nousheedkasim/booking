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
				
			$this->form_validation->set_rules('login_id', 'User Id', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('device_name', 'Device Name', 'required');
			$this->form_validation->set_rules('device_id', 'Device Id', 'required');
			$this->form_validation->set_rules('svn_token', 'Token', 'required');
			

			if ($this->form_validation->run() == true) {
				
				
				$response	= $this->Login_model->login_action();
				if($response['status']==1){
					
					$result		= $this->Login_model->login_log($response,1);
					if($result['status']==1){
						
						echo json_encode(array('user_id'=>$response['user_id'],'user_type'=>$response['user_type'],'status'=>'1','message'=>'Login Successfully'));
					}
					else{
						echo json_encode(array('status'=>'0','message'=>'Login Failed'));
						
					}
				}
				else{
					echo json_encode(array('status'=>'0','message'=>$response['message']));
				}
			}
			else{
				echo json_encode(array('status'=>'0','message'=>$this->form_validation->error_array()));
			}
					
				
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
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('login_id', 'User Name', 'required');
		$this->form_validation->set_rules('location', 'Place', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password', 'Password', 'required');

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
			$json[]=array('api_status'=>'0','message'=>$this->form_validation->error_array());
		}
		echo json_encode($json);
	}
}
