<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
	}


	public function booking(){
		
		$data						= array();
		$data['clinics']			= $this->Common_model->get_dropdown_value('tbl_clinic',array('clinic_id'=>'id','clinic_name'=>'value'),array('clinic_working_status'=>1));
		$this->page('reception',$data);

	}
	public function booking_slot(){
		$this->load->model('Booking_model');
		$data=$this->Booking_model->booking_slot();
		
		
		echo json_encode($data);
	}
	
	public function patient_booking(){
		$this->load->model('Booking_model');
		$data=$this->Booking_model->patient_booking();
		
		
		echo json_encode($data);
		
	}
	
	public function test(){
		$this->load->model('Booking_model');
		$data=$this->Booking_model->test();
		
		
		echo json_encode($data);
	}
	
	public function test1(){
		echo 1111; die();
		//$this->load->model('Booking_model');
		//$data=$this->Booking_model->test1();
		
		
		//echo json_encode($data);
	}
	// ** nsk-21/01/21 //
	public function bookingList(){
		
		$this->load->model('Booking_model');
		$clinic		= $this->uri->segment(3);
		$date		= $this->uri->segment(4);
		$doctor		= $this->uri->segment(5);
		$patient	= $this->uri->segment(6);
		
		$data	= $this->Booking_model->bookingList($clinic,$date,$doctor,$patient);
		
		if(count($data)>0){
			$json=['status'=>1,'data'=>$data];
		}
		else{
			$json=['status'=>0];
		}
		echo json_encode($json);
	}
	
	// nsk-21/01/21 **//
	
}
