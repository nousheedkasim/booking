<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		
	}
	
	public function clinic_list()
	{
		$this->load->model('Common_model');
		$data[]			= $this->Common_model->get_dropdown_value('tbl_clinic',array('clinic_id'=>'id','clinic_name'=>'value'),array('clinic_working_status'=>1));
		echo json_encode($data);
	}
	
	public function doctor_list()
	{
		$this->load->model('Clinic_model');
		$this->form_validation->set_rules('clinic_id', 'Clinic', 'required');
		if ($this->form_validation->run() == true) {
			
			$clinic_id		= $this->input->post('clinic_id');
			$result			= $this->Clinic_model->clinic_doctor($clinic_id);
			$json[]			= array('api_status'=>'1','data'=>$result);
		}
		else{
			$json[]			= array('api_status'=>'0','message'=>$this->form_validation->error_array());
		}
		echo json_encode($json);
		
	}
	
	public function booking_slot(){
		$this->load->model('Booking_model');
		$this->Booking_model->booking_slot();
	}
	
	
}
