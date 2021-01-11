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
		$data			= $this->Common_model->get_dropdown_value('tbl_clinic',array('clinic_id'=>'id','clinic_name'=>'value'),array('clinic_working_status'=>1));
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','clinic_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	public function doctor_list()
	{
		$this->load->model('Clinic_model');
		$this->form_validation->set_rules('clinic_id', 'Clinic', 'required');
		if ($this->form_validation->run() == true) {
			
			$clinic_id		= $this->input->post('clinic_id');
			$data			= $this->Clinic_model->clinic_doctor($clinic_id);
			
			if(count($data)>0){
		        $json[]=array('api_status'=>'1','doctor_data'=>$data);
    		}
    		else{
    		    $json[]=array('api_status'=>'0');
    		}
			
			
		
		}
		else{
			$json[]			= array('api_status'=>'0','message'=>$this->form_validation->error_array());
		}
		echo json_encode($json);
		
	}
	
	public function diagnose_list()
	{
		$this->load->model('Common_model');
		$data			= $this->Common_model->get_dropdown_value('tbl_diagnose',array('diagnose_id'=>'id','diagnose_name'=>'value','diagnose_slot_duration'=>'duration'),array('diagnose_status'=>1));
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','diagnose_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	public function booking_slot1(){
		$this->load->model('Booking_model');
	    $data=$this->Booking_model->booking_slot();
		
		/*if(count($data)>0){
		    $json[]=array('api_status'=>'1','slot_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);*/
	}
	public function booking_slot(){
		$this->load->model('Booking_model');
	    $data=$this->Booking_model->booking_slot();
		
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','slot_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
		public function doctor_booking_slot(){
		$this->load->model('Booking_model');
	    $data=$this->Booking_model->doctor_booking_slot();
		

		if(count($data)>0){
		    $json[]=array('api_status'=>'1','slot_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	
		public function block_booking_slot(){
		$this->load->model('Booking_model');
	    $data=$this->Booking_model->booking_slot();
		
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','slot_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	public function patient_booking(){
	    
	    
		$this->load->model('Booking_model');
		$this->load->model('Common_model');
		
	    $response=$this->Booking_model->patient_booking();
		
		if($response['status']==1){
		    
		    $fcm_key=$this->Common_model->get_fcm_tocken($this->input->post('doctor_id'),2);
		    $data= array(
                            'message' => "You have a new appoinment from  ".$this->input->post('patient_name').' on '.date("d-m-Y", strtotime($this->input->post('booking_date'))).' at '.date('h:i a', strtotime($this->input->post('actual_time'))),
                            'title' => "booking",
                            'sender' => "reg",
                        );
		    $this->appPushNotification($fcm_key, $data);
		    
		    $json[]=array('api_status'=>$response['status'],'tocken'=>$response['tocken'],'message'=>'Succes');
		}
		else{
		   $json[]=array('api_status'=>'0','tocken'=>$response['tocken'],'message'=>'Slot Is Not Available Plz try anouther one');
		}
		echo json_encode($json);
	}
	
	public function last_bookings(){
	    
		$this->load->model('Booking_model');
	    $data=$this->Booking_model->last_bookings();
		
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','booking_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	
	}
	public function current_booking(){
	    
	    
	    $this->load->model('Booking_model');
	    $data=$this->Booking_model->current_booking();
		
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','booking_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	public function booking_details(){
	    
	    
	    $this->load->model('Booking_model');
	    $data[]=$this->Booking_model->booking_details();
		
		
		    $json[]=array('api_status'=>'1','patient_data'=>$data);
	
		echo json_encode($json);
	}
	
		public function previous_booking(){
	    
	    
	    $this->load->model('Booking_model');
	    $data=$this->Booking_model->previous_booking();
		
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','booking_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	public function patient_booking_update(){
	    
	    
		$this->load->model('Booking_model');
		
	    $response=$this->Booking_model->patient_booking_update();
		
		if($response['status']==1){
		    $json[]=array('api_status'=>$response['status'],'message'=>'Succes');
		}
		else{
		   $json[]=array('api_status'=>'0','message'=>'Slot Is Not Available Plz try anouther one');
		}
		echo json_encode($json);
	}
	
	public function booking_closing(){
	    
	    
		$this->load->model('Booking_model');
		
	    $response=$this->Booking_model->booking_closing();
		
		if($response['status']==1){
		    $json[]=array('api_status'=>$response['status'],'message'=>'Succes');
		}
		else{
		   $json[]=array('api_status'=>'0','message'=>'Slot Is Not Available Plz try anouther one');
		}
		echo json_encode($json);
	}
	
	public function doctor_current_booking(){
	    
	     $this->load->model('Booking_model');
	    $data=$this->Booking_model->doctor_current_booking();
	   
	   
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','booking_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	    
	}
	
		public function doctor_previous_booking(){
	    
	     $this->load->model('Booking_model');
	    $data=$this->Booking_model->doctor_previous_booking();
	   
	   
		if(count($data)>0){
		    $json[]=array('api_status'=>'1','booking_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	    
	}
	
		public function clinic_based_doctor(){
		    
	    $this->load->model('Clinic_model');
	    $data=$this->Clinic_model->clinic_based_doctor();
	    if(count($data)>0){
		    $json[]=array('api_status'=>'1','clinic_data'=>$data);
		}
		else{
		    $json[]=array('api_status'=>'0');
		}
		echo json_encode($json);
	}
	
	public function block_slot(){
	      $this->load->model('Booking_model');
	    $response=$this->Booking_model->block_slot();
	    	if($response['status']==1){
		    $json[]=array('api_status'=>$response['status'],'message'=>'Success');
		}
		else{
		   $json[]=array('api_status'=>'0','message'=>'Failed');
		}
		echo json_encode($json);
	    
	}

	
	public function appPushNotification($device_id, $data = array()) {
	   
        if (empty($device_id)) {
            return;
        }



        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        /* api_key available in:
          Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key */
        $api_key = 'AAAA_7N_MbU:APA91bGk4HTq4TOjayZ375dvL3ak602lOS6eSGRYAdD8rkF0HyeswjlUV5Rn66q821x1xohSP66M554QVFKWWwcOERvnOu_SIJQibNiHDuiY9_i4-APo1-JeS_EAUYwOKVgk_CrDpLyh';

        $fields = array(
            'registration_ids' => array($device_id),
            'data' => $data,
            'webpush' =>  array("headers" =>  array("Urgency" => "high")),
            'android' =>  array("priority" => "high"),
            'priority' => 10,
        );

        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
       
        return $result;
    }
	
	
	public function clinic_details(){
	    
	    
	    $this->load->model('Clinic_model');
	    $data=$this->Clinic_model->get_clinic_details();
		
		
		    $json[]=array('api_status'=>'1','clinic_data'=>$data);
	
		echo json_encode($json);
	}
	
	public function patient_booking1(){
		$this->load->model('Booking_model');
		$data=$this->Booking_model->patient_booking();
		print_r($data);
	}

	
}
