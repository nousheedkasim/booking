<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		
        parent::__construct();
				

		
    }
	
	public function test(){
		$this->load->model('Booking_model');
		$data						= array();
		$data['user_id']			= $this->user_data['user_id'];
		$data['user_type']			= $this->user_data['user_type'];
		$data['bookings']			= $this->Booking_model->test1($data['user_id'],$data['user_type']);
	}
	
	public function index()
	{
		//$this->load->view('test');
		$this->load->model('Booking_model');
		
		$data						= array();
		$data['user_id']			= $this->user_data['user_id'];
		$data['user_type']			= $this->user_data['user_type'];
		$data['clinics']			= $this->Common_model->get_dropdown_value('tbl_clinic',array('clinic_id'=>'id','clinic_name'=>'value'),array('clinic_status'=>1));
		$data['diagnoses']			= $this->Common_model->get_dropdown_value('tbl_diagnose',array('diagnose_id'=>'id','diagnose_name'=>'value'),array('diagnose_status'=>1));
		//$data['bookings']			= $this->Booking_model->bookings($data['user_id'],$data['user_type']);
		$data['bookings']			= $this->Booking_model->test1($data['user_id'],$data['user_type']);
		$this->page('reception',$data);
	}
	
	
	
	
	public function blank(){
		$this->load->view('blank');
	}
	
	public function insert()
	{
		$this->form_validation->set_rules('name', 'User Name', "required");
		$this->form_validation->set_rules('code', 'User Code', "required");
		$this->form_validation->set_rules('usertype', 'User Type', "required");
		$this->form_validation->set_rules('branch', 'Branch', "required");
		$this->form_validation->set_rules('password', 'Password', "required|callback_valid_password");
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', "required|matches[password]");
		$this->form_validation->set_rules('email', 'Email', "required");

		if ($this->form_validation->run() == true) {
//Setting values for tabel columns
			$User_deatails	= array('user_name'		=> $this->input->post('name'),
									'user_code'		=> $this->input->post('code'),
									'user_type'		=> $this->input->post('usertype'),
									'user_branch'	=> $this->input->post('branch'),
									'user_password'	=> $this->input->post('confirm_password'),
									'user_email'	=> $this->input->post('email')
									);
		
//Transfering data to User_model
			$this->User_model->user_insert($User_deatails);
		    $User_deatails['message'] = 'User Creation Successfully';
		
		}




	}
	
	

}
