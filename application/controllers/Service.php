<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Service_model');
	}
	
	public function service_add(){
		
		$data						= array();
		$data['logged_branch']	= $this->user_data['user_branch'];
		$data['logged_user']	= $this->user_data['user_id'];
		
		$data['branches']		= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1));
		$data['users']			= $this->Common_model->get_dropdown_value('tbl_user',array('user_id'=>'id','user_name'=>'value'),array('user_status'=>1));
		$data['tax']			= $this->Common_model->get_dropdown_value('tbl_tax',array('tax_id'=>'id','tax_name'=>'value'),array('tax_status'=>1));
		$data['payment_type']	= $this->Common_model->get_dropdown_value('tbl_payment_method',array('payment_method_id'=>'id','payment_method_title'=>'value'),array('payment_method_status'=>1));
		$this->page('service/service_add',$data);
	}
	
	// Service add select2
	public function get_customer(){
		
		$data['results']=$this->Common_model->get_customer();
		echo json_encode($data);
	}
	// Service add select2:select
	public function get_customer_details(){
		
		$data							= array();
		$data['customer_id']		= $this->uri->segment(3);
		$data['customer_details']	= $this->Common_model->get_customer_details($data['customer_id']);
		echo json_encode($data['customer_details']);
	}
	
	//Service add Dynamic Customer Creation select2
	public function dynamic_customer_creation(){
		
		$data['results']=$this->Common_model->dynamic_customer_creation();
		echo json_encode($data['results']);
	}
	
	//Service add select2 remort data
	public function get_service_head(){
		
		$data['results']=$this->Common_model->get_service_head();
		echo json_encode($data);
	}
	
	//Service add select2:selected event
	public function get_service_head_details(){
		
		$data							= array();
		$data['service_head_id']		= $this->uri->segment(3);
		$data['service_head_details']	= $this->Service_model->get_service_head_details($data['service_head_id']);
		echo json_encode($data['service_head_details']);
	}
	
	//Service Add Tax Select Select2 Ajax
	public function get_tax_details(){
		
		$data							= array();
		$data['tax_id']					= $this->uri->segment(3);
		$data['tax_details']	= $this->Common_model->get_tax_details($data['tax_id']);
		echo json_encode($data['tax_details']);
	}
	//Service Add 
	public function service_save()
	{
		$this->Service_model->service_save();
	}
	
	public function service_list(){
		
		$data		= array();
		$this->page('service/service_list',$data);
	}
	
	//Service List
	public function service_list_json(){
		
		$this->Service_model->service_list_json();
	}
	
	public function service_details(){
		
		$data		= array();
		$data['service_id']					= $this->uri->segment(3);
		$data['details']					= $this->Service_model->service_details($this->uri->segment(3));
		$this->page('service/service_detail_list',$data);
	}
	
	public function service_detail_list_json(){
		
		$this->Service_model->service_detail_list_json();
		
	}
	
	
}
