<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
		$this->user_add();
		
	}
	
	public function user_add(){
		
		$data['usertype']	= $this->User_model->get_usertype();
		$data['branches']		= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1));
		
		$this->page('user/user_add',$data);
	}
	
	public function user_insert()
	{
		
		$this->User_model->user_insert();
	}
	
	public function user_list(){
		
		$data	= array();
		
		$this->page('user/user_list',$data);
	}
	
	public function user_list_json(){
		
		$this->User_model->user_list_json();
	}
	
	public function user_edit(){
		
		$data				= array();
		$data['user_id']	= $this->uri->segment(3);
		$data['usertype']	= $this->User_model->get_usertype();
		$data['branches']	= $this->Common_model->get_dropdown_value('tbl_branch',array('branch_id'=>'id','branch_name'=>'value'),array('branch_status'=>1));
		$data['status']		= $this->Common_model->status();
		$data['user']		= $this->User_model->get_user($data['user_id']);
		
		$this->page('user/user_edit',$data);
		
	}
	
	public function user_update(){

		$this->User_model->user_update();
		
	}
	
	public function user_delete(){
		
		$data['user_id']	= $this->uri->segment(3);
		
		$this->User_model->user_delete($data['user_id']);
		
		redirect('User/user_list/');
		
	}
}
