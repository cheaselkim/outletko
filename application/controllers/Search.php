<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper("search");
	    $this->load->model("search_model");
	}

	public function search(){
		$data['city_id']  = $this->input->post("city_id");
		$data['prov_id'] = $this->input->post("prov_id");
		$data['product'] = $this->input->post("product_outlet");	

        if (!empty($data['city_id']) && !empty($data['prov_id']) && !empty($data['product'])){
            $query = $this->search_model->search_product_outlet($data['prov_id'], $data['city_id'], $data['product']);
            $data['tbl'] = tbl_query($query);		    
        }else{
            $data['tbl'] = "";
        }

		// $this->load->view("login_search", $data);
		
		$data['id'] = "";
		$menu = 1;
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = 6;
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		if ($this->session->userdata("validated") == true){
			$result = $this->login_model->check_session();

			if ($result != true){
				redirect("/");
			}else{
				$data['user_type'] = 5;
			}
		}

		$this->template->load($menu, $data);	


	}

	public function index(){


		$data['city_id']  = $this->input->get("city_id");
		$data['prov_id'] = $this->input->get("prov_id");
		$data['product'] = $this->input->get("product_outlet");	


		$query = $this->search_model->search_product_outlet($data['prov_id'], $data['city_id'], $data['product']);
		$data['tbl'] = tbl_query($query);		

		// $this->load->view("login_search", $data);
		
		$data['id'] = "";
		$menu = 1;
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = 6;
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		if ($this->session->userdata("validated") == true){
			$result = $this->login_model->check_session();

			if ($result != true){
				redirect("/");
			}else{
				$data['user_type'] = 5;
			}
		}

		$this->template->load($menu, $data);	
    }
    
    public function query(){

		$data['city_id']  = $this->input->get("city_id");
		$data['prov_id'] = $this->input->get("prov_id");
		$data['product'] = $this->input->get("product_outlet");	


		// $query = $this->search_model->search_product_outlet($data['prov_id'], $data['city_id'], $data['product']);
		// $data['tbl'] = tbl_query($query);		

        if (empty($data['city_id']) && empty($data['prov_id']) && empty($data['product'])){
            $data['tbl'] = "<div class='row'>
                                <img src='https://i.pinimg.com/originals/88/36/65/8836650a57e0c941b4ccdc8a19dee887.png' alt='No Data Found' class='img-fluid'>
                            </div>";
        }else{
            $query = $this->search_model->search_product_outlet($data['prov_id'], $data['city_id'], $data['product']);
            $data['tbl'] = tbl_query($query);		    
        }

		// $this->load->view("login_search", $data);
		
		$data['id'] = "";
		$menu = 1;
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = 6;
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		if ($this->session->userdata("validated") == true){
			$result = $this->login_model->check_session();

			if ($result != true){
				redirect("/");
			}else{
				$data['user_type'] = 5;
			}
		}

		$this->template->load($menu, $data);        

    }

	// public function outlet(){

	// 	$data['id'] = $this->input->get("strid");		

	// 	$menu = 10;
	// 	$data['function'] = 0;
	// 	$data['sub_module'] = 0;
	// 	$data['user_type'] = 6;
	// 	$data['menu_module'] = 0;
	// 	$data['account_id'] = 0;
	// 	$data['owner'] = 0;
	// 	$data['edit'] = 0;
	// 	$data['width'] = 1366;

	// 	if ($this->session->userdata("validated") == true){
	// 		$result = $this->login_model->check_session();

	// 		if ($result != true){
	// 			redirect("/");
	// 		}else{
	// 			$data['user_type'] = 5;
	// 		}
	// 	}

	// 	$this->template->load($menu, $data);	

	// 	// $query = $this->search_model->search_comp($data['id']);


	// 	// $this->load->view("outletko/profile/profile", $data);
	// }

}
