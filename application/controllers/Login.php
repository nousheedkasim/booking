<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function action()
	{
		$this->form_validation->set_rules('login_id', 'Login Id', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true) {
		
			$response	= $this->Login_model->login_action();
			if($response['status']=200){
				
				$this->session->set_userdata('user_id',$response['user_id']);
				redirect('dashboard');
			}
			else{
				
				echo json_encode(array('status'=>400,'message'=>'Failed'));
			}
		}
		else{
			echo json_encode(array('status'=>400,'message'=>'Failed'));
		}

	}
	public function logout(){
		
		$this->session->unset_userdata('user_id');
		redirect('Login');
	}
}
