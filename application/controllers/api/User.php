<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('User_model');
	}


	public function user_insert()
	{
		
		$this->User_model->user_insert();
	}
	
	public function user_details(){
		
		$user_id		= $this->input->post('user_id');
		$user_details	=$this->User_model->get_user($user_id);
		echo json_encode($user_details);
	}
	public function user_profile(){
	    
	    $user_id		= $this->input->post('user_id');
	    $user_profile   =$this->User_model->get_user_details($user_id);
	    echo json_encode(array($user_profile));
	}
	
	public function user_update(){
	    
	    $this->User_model->user_update();
	}
	
}
