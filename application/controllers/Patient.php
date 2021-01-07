<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Patient_model');
	}
	
	//reception//select2
	public function get_patient(){
		$this->load->model('Common_model');
		$data['results']=$this->Common_model->get_patient();
		echo json_encode($data);
	}
	
	public function patient_booking_details(){
		
		$data = $this->Patient_model->patient_booking_details();
		
		if($data){
		    $json=array('status'=>'1','patient_data'=>$data);
		}
		else{
		    $json=array('api_status'=>'0');
		}
		echo json_encode($json);
		
	}
	
	
	
}
