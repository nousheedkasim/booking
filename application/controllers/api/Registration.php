<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Registration_model');
	}


	public function company_insert()
	{
		$this->Registration_model->company_insert();
	}
	
	public function branch_insert()
	{
		$this->Registration_model->branch_insert();
	}
	
	public function employee_insert()
	{
		$this->Registration_model->employee_insert();
	}
	
	public function tax_insert()
	{
		$this->Registration_model->tax_insert();
	}
	
	public function service_group_insert(){
		
		$this->Registration_model->service_group_insert();
	}
	public function service_head_insert()
	{
		$this->Registration_model->service_head_insert();
    }
	
	public function group_insert()
	{
		$this->Registration_model->group_insert();
	}
	
	public function product_insert()
	{
		$this->Registration_model->product_insert();
	}
	public function brand_insert()
	{
		$this->Registration_model->brand_insert();
	}
	
	public function supplier_insert()
	{
		$this->Registration_model->supplier_insert();
	}
	
	public function chair_insert()
	{
		
		$this->Registration_model->chair_insert();
	}
	
	public function chair_allocation()
	{
		$this->Registration_model->chair_allocation();
	}
	
}
