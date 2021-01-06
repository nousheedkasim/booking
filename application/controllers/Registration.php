<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Registration_model');
	}
	
	//Company
	public function clinic_registration(){
		
		$this->page('registration/clinic_registration');
	}
	
	public function clinic_insert()
	{
		
		$this->Registration_model->clinic_insert();
	}
	public function clinic_list(){
		
		$data	= array();
		$this->page('registration/clinic_list',$data);
	}
	
	public function clinic_list_json(){
		
		$this->Registration_model->clinic_list_json(); 
	}
	
	public function clinic_edit(){
		
		$data						= array();
		$data['clinic_id']			= $this->uri->segment(3);
		$data['clinic_details']	= $this->Registration_model->clinic_details($data['clinic_id']);
		$this->page('registration/clinic_edit',$data);
	}
	
	public function clinic_update()
	{
		$this->Registration_model->clinic_update();
	}
	
	public function clinic_delete()
	{
		
		$this->Registration_model->clinic_delete($this->uri->segment(3));
		redirect('Registration/clinic_list/');
	}
	
	public function clinic_toggle(){
		$this->Registration_model->clinic_toggle($this->uri->segment(3)); 
		redirect('Registration/clinic_list/');
	}
	//Company End
	
	//Branch
	public function doctor_add(){
		
		$this->page('registration/doctor_add');
	}
	
	public function doctor_insert()
	{
		
		$this->Registration_model->doctor_insert();
	}
	public function doctor_list(){
		
		$data	= array();
		$this->page('registration/doctor_list',$data);
	}
	
	public function doctor_list_json(){
		
		$this->Registration_model->doctor_list_json(); 
	}
	
	public function doctor_edit(){
		
		$data						= array();
		$data['doctor_id']			= $this->uri->segment(3);
		$data['doctor_details']		= $this->Registration_model->doctor_details($data['doctor_id']);
		$data['status']				= $this->Common_model->status();
		$this->page('registration/doctor_edit',$data);
	}
	
	public function doctor_update(){
		
		$this->Registration_model->doctor_update();
	}
	
	public function doctor_delete(){
		
		$this->Registration_model->doctor_delete($this->uri->segment(3));
		redirect('Registration/doctor_list/');
	}
	
	//reception || select2//
	public function get_doctor()
	{
		   
		$data['results']=$this->Registration_model->get_doctor();
		echo json_encode($data);

	}
	//Branch End
	
	//Employee
	public function diagnose_add(){
		$this->page('registration/diagnose_add');
	}
	
	public function diagnose_insert()
	{
		$this->Registration_model->diagnose_insert();
	}
	
	public function diagnose_list(){
		
		$data				= array();
		$this->page('registration/diagnose_list',$data);
	}
	
	public function diagnose_list_json(){
		$this->Registration_model->diagnose_list_json();
	}
	
	public function diagnose_edit(){
		
		$data						= array();
		$data['diagnose_id']		= $this->uri->segment(3);
		$data['diagnose_details']	= $this->Registration_model->diagnose_details($data['diagnose_id']);
		$data['status']				= $this->Common_model->status();
		$this->page('registration/diagnose_edit',$data);
	}
	
	//reception || select2//
	public function get_diagnosis(){
		$data['results']=$this->Registration_model->get_diagnosis();
		echo json_encode($data);
	}
	
	public function diagnose_update(){
		$this->Registration_model->diagnose_update();
	}
	
	public function diagnose_delete(){
		
		$this->Registration_model->diagnose_delete($this->uri->segment(3));
		redirect('Registration/employee_list/');
	}
	//Employee End
	
	
	//Chair
	public function chair_list(){
		
	}
	
	public function patient_exist(){
		$data				= array();
		// $data['branches']	= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1)); 
		// $this->page('registration/chair_add',$data);

		$this->page('registration/patient_exist', $data);
	}
	public function patient_new(){
		$data				= array();
		// $data['branches']	= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1)); 
		// $this->page('registration/chair_add',$data);

		$this->page('registration/patient_new', $data);
	}
	
	public function chair_insert()
	{
		
		$this->Registration_model->chair_insert();
	}
	//Chair End
	
	//Tax
	public function tax_add(){
		
		$this->page('registration/tax_add');
	}
	
	public function tax_insert()
	{
		$this->Registration_model->tax_insert();
		
	}
	public function tax_list(){
		$data	= array();
		$this->page('registration/tax_list',$data);
	}
	
	public function tax_list_json(){
		
		$this->Registration_model->tax_list_json();
    }
	
	public function tax_edit(){
		
		$data						= array();
		$data['tax_id']				= $this->uri->segment(3);
		$data['tax_details']		= $this->Registration_model->tax_details($data['tax_id']);
		$data['branches']			= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1));
		$data['status']				= $this->Common_model->status();
		$this->page('registration/tax_edit',$data);
	}
	
	public function tax_update(){
		$this->Registration_model->tax_update();
	}
	
	public function tax_delete(){
		
		$this->Registration_model->tax_delete($this->uri->segment(3));
		redirect('Registration/tax_list/');
	}
    //Tax End

    public function service_head_add(){
		
		$data					= array();
		$data['service_group']	= $this->Common_model->get_dropdown_value('tbl_service_group',array('service_group_id'=>'id','service_group_name'=>'value'),array('service_group_status'=>1)); 
		
		$this->page('registration/service_head_add',$data);
	}
	
	public function service_head_insert()
	{
		
		$this->Registration_model->service_head_insert();
    }

	public function service_head_list(){
		
		$data	= array();
		$this->page('registration/service_head_list',$data);
	}
	
	public function service_head_list_json(){
		
		$this->Registration_model->service_head_list_json();
    }
	
	public function service_head_edit(){
		
		$data						= array();
		$data['service_head_id']	= $this->uri->segment(3);
		$data['status']				= $this->Common_model->status();
		$data['service_head']		= $this->Registration_model->service_head_details($data['service_head_id']);
		
		$this->page('registration/service_head_edit',$data);
	}
	
	public function service_head_update(){

		$this->Registration_model->service_head_update();
	}
	
	public function service_head_delete(){
		
		$data['service_head_id']	= $this->uri->segment(3);
		$this->Registration_model->service_head_delete($data['service_head_id']);
		
		redirect('Registration/service_head_list/');
	}
    
	//Group Strat
    public function group_add(){
		
		$this->page('registration/group_add');
	}
	
    public function group_insert()
	{
		
		$this->Registration_model->group_insert();
		
	}
	public function group_list(){
		
		$data	= array();
		$this->page('registration/group_list',$data);
	}
	
	public function group_list_json(){
		
		$this->Registration_model->group_list_json();
		
	}
	public function group_edit(){
		
		$data				= array();
		$data['group_id']	= $this->uri->segment(3);
		$data['status']		= $this->Common_model->status();
		$data['group']		= $this->Registration_model->group_details($data['group_id']);
		
		$this->page('registration/group_edit',$data);
	}
	
	public function group_update(){

		$this->Registration_model->group_update();
	}
	
	public function group_delete(){
		
		$data['group_id']	= $this->uri->segment(3);
		$this->Registration_model->group_delete($data['group_id']);
		
		redirect('Registration/group_list/');
	}
	//Group End

	public function brand_add(){
		
		$this->page('registration/brand_add');
	}
	
    public function brand_insert()
	{
		$this->Registration_model->brand_insert();
	}
	public function brand_list(){
		
		$data	= array();
		$this->page('registration/brand_list',$data);
	}
	
	public function brand_list_json(){
		
		$this->Registration_model->brand_list_json();
		
	}
	
	public function brand_edit(){
		
		$data				= array();
		$data['brand_id']	= $this->uri->segment(3);
		$data['status']		= $this->Common_model->status();
		$data['brand']		= $this->Registration_model->brand_details($data['brand_id']);
		
		$this->page('registration/brand_edit',$data);
	}
	
	public function brand_update(){

		$this->Registration_model->brand_update();
	}
	
	public function brand_delete(){
		
		$data['brand_id']	= $this->uri->segment(3);
		$this->Registration_model->brand_delete($data['brand_id']);
		
		redirect('Registration/brand_list/');
	}
	
	//End Brand
	
	public function supplier_add(){
		
		$this->page('registration/supplier_add');
	}
	
	public function supplier_insert()
	{
		$this->Registration_model->supplier_insert();
	}
	
	public function supplier_list(){
		
		$data	= array();
		$this->page('registration/supplier_list',$data);
	}
	
	public function supplier_list_json(){
		
		$this->Registration_model->supplier_list_json();
		
	}
	
	public function supplier_edit(){
		
		$data						= array();
		$data['supplier_id']		= $this->uri->segment(3);
		$data['status']				= $this->Common_model->status();
		$data['supplier_details']	= $this->Registration_model->supplier_details($data['supplier_id']);
		$data['payment_method']		= $this->Common_model->get_dropdown_value('tbl_payment_method',array('payment_method_id'=>'id','payment_method_title'=>'value'),array('payment_method_status'=>1));
		$this->page('registration/supplier_edit',$data);
	}
	
	public function  supplier_update(){
		
		$this->Registration_model->supplier_update();
	}
	
	public function supplier_delete(){
		
		$data['supplier_id']	= $this->uri->segment(3);
		$this->Registration_model->supplier_delete($data['supplier_id']);
		
		redirect('Registration/supplier_list/');
	}
	
	//Product
	public function product_list(){
		
		$data	= array();
		$this->page('registration/product_list',$data);
		
	}
	public function product_add(){
		 
		$data					= array();
		$data['product_group']	= $this->Common_model->get_dropdown_value('tbl_product_group',array('group_id'=>'id','group_name'=>'value'),array('group_status'=>1)); 
		
		$this->page('registration/product_add',$data);
		 
	}
	public function product_insert()
	{
		
		$this->Registration_model->product_insert();
		
	}
	public function product_list_json(){
		
		$this->Registration_model->product_list_json();
		
	}
	//End Product
	
	public function service_group_add(){
		$this->page('registration/service_group_add');
	}
	
	public function service_group_insert(){
		
		$this->Registration_model->service_group_insert();
	}
	
	public function service_group_list(){
		$data	= array();
		$this->page('registration/service_group_list',$data);
	}
	public function service_group_list_json(){
		
		$this->Registration_model->service_group_list_json();
	}
	public function service_group_edit(){
		
		$data					= array();
		$data['group_id']		= $this->uri->segment(3);
		$data['status']			= $this->Common_model->status();
		$data['group_details']	= $this->Registration_model->service_group_details($data['group_id']);
		
		$this->page('registration/service_group_edit',$data);
	}

}
