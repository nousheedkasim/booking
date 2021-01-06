<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Purchase_model');
	}
	
	public function purchase_list(){
		
		$this->page('purchase/purchase_list');
		
	}
	
	public function purchase_list_json(){
		
		$this->Purchase_model->purchase_list_json();
	}
	
	public function purchase_details(){
		
		$data						= array();
		$data['purchase_id']		= $this->uri->segment(3);
		$data['invoice_details']	= $this->Purchase_model->invoice_details($this->uri->segment(3));
		$data['purchase_items']		= $this->Purchase_model->purchase_items($this->uri->segment(3));
		$data['purchase_details']	= $this->Purchase_model->purchase_details($this->uri->segment(3));
		$this->page('purchase/purchase_details',$data);
	}
	
	public function purchase_item_list_json(){
		
		$this->Purchase_model->purchase_item_list_json($this->uri->segment(3));
	}
	
	public function purchase_add(){
		
		$data					= array();
		$data['logged_branch']	= $this->user_data['user_branch'];
		$data['logged_user']	= $this->user_data['user_id'];
		
		$data['branches']		= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1));
		$data['users']			= $this->Common_model->get_dropdown_value('tbl_user',array('user_id'=>'id','user_name'=>'value'),array('user_status'=>1));
		$data['payment_type']	= $this->Common_model->get_dropdown_value('tbl_payment_method',array('payment_method_id'=>'id','payment_method_title'=>'value'),array('payment_method_status'=>1));
		$data['supplier']		= $this->Common_model->get_dropdown_value('tbl_supplier',array('supplier_id'=>'id','supplier_name'=>'value'),array('supplier_status'=>1));
		$data['tax']			= $this->Common_model->get_dropdown_value('tbl_tax',array('tax_percentage'=>'id','tax_name'=>'value','tax_id'=>'data_id'),array('tax_status'=>1));

		$this->page('purchase/purchase_add_1',$data);
	}
	
	//from purchase add page dropdown ajax//
	public function get_product(){
		
		$data['results']=$this->Common_model->get_product();
		echo json_encode($data);
		
	}
	
	public function purchase_save(){
		
		$this->Purchase_model->purchase_save();
	}
		
	public function purchase_edit(){
		
		
		$data						= array();
		$data['branches']			= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1));
		$data['users']				= $this->Common_model->get_dropdown_value('tbl_user',array('user_id'=>'id','user_name'=>'value'),array('user_status'=>1));
		$data['payment_type']		= $this->Common_model->get_dropdown_value('tbl_payment_method',array('payment_method_id'=>'id','payment_method_title'=>'value'),array('payment_method_status'=>1));
		$data['supplier']			= $this->Common_model->get_dropdown_value('tbl_supplier',array('supplier_id'=>'id','supplier_name'=>'value'),array('supplier_status'=>1));
		$data['tax']				= $this->Common_model->get_dropdown_value('tbl_tax',array('tax_percentage'=>'id','tax_name'=>'value'),array('tax_status'=>1));

		$data['purchase_id']		= $this->uri->segment(3);
		$data['invoice_details']	= $this->Purchase_model->invoice_details($this->uri->segment(3));
		$data['purchase_details']	= $this->Purchase_model->purchase_details($this->uri->segment(3));
		$data['purchase_items']		= $this->Purchase_model->purchase_items($this->uri->segment(3));
		$this->page('purchase/purchase_edit',$data);
		
	}
	
	public function purchase_update(){
		
		$this->Purchase_model->purchase_update();
	}
	
	public function purchase_delete(){
		
		$this->Purchase_model->purchase_delete($this->uri->segment(3));
		redirect('Purchase/purchase_list/');
	}
	public function purchase_confirm(){
		
		$this->Purchase_model->purchase_confirm($this->uri->segment(3));
		redirect('Purchase/purchase_list/');
	}
	// From purchase edit trough popover confirm ajax 
	public function purchase_item_delete(){
		
		$this->Purchase_model->purchase_item_delete();
	}
	
	public function rounding_amount_check(){
		$net_amount		= $this->input->post('net_amount');
		$round_amount	= $this->input->post('rounding_amount');
		$difference 	= abs(($net_amount+$round_amount)-(PR_TOTAL_ROUNDING_ALLOWED_AMOUNT+$net_amount));
		if($net_amount==null){
			$this->form_validation->set_message("rounding_amount_check","Net Amount Is Required!");
			return false;
		}
		else{
			
			if(PR_TOTAL_ROUNDING)
			{
				if($difference > PR_TOTAL_ROUNDING_ALLOWED_AMOUNT)
				{
					$this->form_validation->set_message("rounding_amount_check","'$difference' Is Greater Than Allowed Rounding");
					return false;
				}
			}
		}
	}
	
	
}
