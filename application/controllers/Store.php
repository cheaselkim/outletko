<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	  public function __construct(){
        parent::__construct();
        $this->load->model("store_model");
	  }

	public function store($store){
		
            $data['id'] = $this->store_model->search_store($store);
            $data['sub_module'] = 0;
			$data['menu_module'] = 0;
			$data['edit'] = 0;
			$data['function'] = 0;
			$data['width'] = 1366;
			$data['account_id'] = $this->session->userdata("account_id");
			$data['owner'] = 0;

			if (!empty($data['id'])){
				if ($this->session->userdata("validated") == true){
					$result = $this->login_model->check_session();	
					if ($result != true){
						redirect("/");
					}else{
						$data['user_type'] = $this->session->userdata('user_type');
					}
				}else{
					$data['user_type'] = 6;
				}
		
				$this->template->load("0", $data);			
			}else{
			}




	}


}
