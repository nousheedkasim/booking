<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
	}


	public function booking(){
		
		$data						= array();
		$data['clinics']			= $this->Common_model->get_dropdown_value('tbl_clinic',array('clinic_id'=>'id','clinic_name'=>'value'),array('clinic_status'=>1));
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
		$clinic					= $this->uri->segment(3);
		$date					= $this->uri->segment(4);
		$doctor					= $this->uri->segment(5);
		$patient				= $this->uri->segment(6);
		
		$data['bookings']		= $this->Booking_model->bookingList($clinic,$date,$doctor,$patient);
		$data['no_appoinment']	= $this->Booking_model->appoinmentCount(null,$clinic,$date,$doctor,$patient); //all appoinments
		$data['no_confirm']		= $this->Booking_model->appoinmentCount(5,$clinic,$date,$doctor,$patient);
		
		if(count($data['bookings'])>0){
			$json=['status'=>1,'data'=>$data];
		}
		else{
			$json=['status'=>0,'data'=>$data];
		}
		echo json_encode($json);
	}
	// nsk-21/01/21 **//
	
	// **nsk-22/01/21 //
	public function deleteBooking(){
		$this->load->model('Booking_model');
		$this->form_validation->set_rules('booking_id', 'Booking Id', 'required');
		if ($this->form_validation->run() == true) {
			
			$booking_id		= $this->input->post('booking_id');
			$response		= $this->Booking_model->deleteBooking($booking_id);
			
			if($response['status']==1){
		        $json=array('status'=>'1','message'=>'Delete Success');
    		}
    		else{
    		    $json=array('status'=>'0','message'=>'Delete Failed');
    		}
		}
		else{
			$json			= array('status'=>'0','message'=>$this->form_validation->error_array());
		}
		echo json_encode($json);
		
	}
	
	public function getBookingDetail(){
		$this->load->model('Booking_model');
		$this->form_validation->set_rules('booking_id', 'Booking Id', 'required');
		
		if ($this->form_validation->run() == true) {
			
			$booking_id	= $this->input->post('booking_id');
			$data		= $this->Booking_model->getBookingDetail($booking_id);
			
			if(!empty($data)){
		        $json=array('status'=>'1','data'=>$data);
    		}
    		else{
    		    $json=array('status'=>'0');
    		}
		}
		else{
			$json			= array('status'=>'0','message'=>$this->form_validation->error_array());
		}
		echo json_encode($json);
	}
	
	public function patientBookingUpdate(){
		$this->load->model('Booking_model');
		$data=$this->Booking_model->patient_booking_update();
		if($data['status']==1){
			$json=array('status'=>'1');
		}
		else{
			$json=array('status'=>'0');
		}
		echo json_encode($json);
	}
	// nsk-22/01/22 **//
	
	
}
