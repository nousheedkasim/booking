<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Common_model');
	}
	
	public function comapny_list_dropdown(){
		
		$employees	= $this->Common_model->get_dropdown_value('tbl_comapny',array('company_id'=>'id','company_name'=>'value'),array('company_status'=>1)); 
		echo json_encode($employees);
	}
	public function branch_list_dropdown(){
		
		$branches	= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1)); 
		echo json_encode($branches);
	}
	
	public function chair_list_dropdown(){
		
		$chair	= $this->Common_model->get_dropdown_value('tbl_chair',array('chair_id'=>'id','chair_name'=>'value','chair_branch'=>'branch_id'),array('chair_status'=>1)); 
		echo json_encode($chair);
	}
	public function employee_list_dropdown(){
		
		$employees	= $this->Common_model->get_dropdown_value('tbl_employee',array('employee_id'=>'id','employee_name'=>'value','employee_branch'=>'branch_id'),array('employee_status'=>1)); 
		echo json_encode($employees);
	}
	public function service_group_list_dropdown(){
		
		$service_group	= $this->Common_model->get_dropdown_value('tbl_service_group',array('service_group_id'=>'id','service_group_name'=>'value'),array('service_group_status'=>1)); 
		echo json_encode($service_group);
	}
	public function product_group_list_dropdown(){
		$product_group	= $this->Common_model->get_dropdown_value('tbl_product_group',array('group_id'=>'id','group_name'=>'value'),array('group_status'=>1)); 
		echo json_encode($product_group);
	}
	
}
