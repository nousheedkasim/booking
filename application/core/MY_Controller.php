<?php
class MY_Controller extends CI_Controller
{
    public $data = array();
	public $user_data = array();

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Common_model');
      
        if (empty($this->session->userdata('user_id'))) {
           
            $this->session->unset_userdata('user_id');
            redirect('login');

        } else {
          
			$user_id=$this->session->userdata('user_id');
			$login_details=$this->Login_model->login_details($user_id);
				
			if($login_details){
					
				$this->user_data['user_id']		= $login_details->user_id;
				$this->user_data['user_name']	= $login_details->user_name;
				$this->user_data['user_code']	= $login_details->user_code;
				$this->user_data['user_type']	= $login_details->user_type;
				$this->user_data['user_branch']	= $login_details->user_branch;
				
			}
			else{
				
				redirect('login');
				
			}
        }
		
		//$this->load->view('include/header');
		//$this->load->view('include/sidemenubar');
		//$this->load->view('include/footer');
		
    }
	
	protected function page($view=null,$data=array()){
		
		$data['cr_class']	= $this->router->fetch_class();
		$data['cr_method']	= $this->router->fetch_method();
		$this->load->view('include/header');
		$this->load->view('include/global_values');
		$this->load->view('include/sidemenubar',$data);
		if($view!=null ||$view!=''){
			$this->load->view($view,$data);
		}
		$this->load->view('include/footer');
		
	}
	
	
}
