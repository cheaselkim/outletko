<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	  public function __construct(){
	    parent::__construct();
	    $this->load->model("header_model");
	    $this->load->model("menu_model");
		$result = $this->login_model->check_session();
		if ($result != true){
			redirect("/");
		}
	  }

	public function menu($menu = null, $sub_module = null, $function = null){	

		$all_access = $this->header_model->all_access();

		if ($all_access == "1"){
			$result = 1;
		}else{
			if ($menu == "1" && $function == "6"){
				$result = 1;
			}else if ($menu == "6" || $menu == "7" || $menu == "8"){
				$result = 1;
			}else{
				$result = $this->menu_model->check_menu($menu, $sub_module, $function);
			}
		}
		
		if ($result > 0){
			$data['function'] = $function;
			$data['sub_module'] = $sub_module;
			$data['user_type'] = $this->session->userdata('user_type');
			$data['menu_module'] = $menu;
			$data['account_id'] = $this->session->userdata("account_id");
			$data['owner'] = $this->menu_model->check_owner();
			$data['edit'] = 0;
			$data['width'] = 1366;
			$this->template->load($menu, $data);	
		}else{
			redirect("/logout");
		}

	}

	public function edit_menu($menu = null, $sub_module = null, $function = null, $id = null){
		$all_access = $this->header_model->all_access();

		if ($all_access == "1"){
			$result = 1;
		}else{
			$result = $this->menu_model->check_menu($menu, $sub_module, $function);
		}
				
		if ($result > 0){
			$data['function'] = $function;
			$data['sub_module'] = $sub_module;
			$data['user_type'] = $this->session->userdata('user_type');
			$data['menu_module'] = $menu;
			$data['edit'] = 1;
			$data['trans_id'] = $id;
			$data['account_id'] = $this->session->userdata("account_id");
			$data['owner'] = $this->menu_model->check_owner();
			$data['width'] = 1366;
			$this->template->load($menu, $data);						
		}else{
			redirect("/logout");
		}

	}

	public function tab_menu($menu = null, $sub_module = null, $function = null, $width = null){
		$all_access = $this->header_model->all_access();

		if ($all_access == "1"){
			$result = 1;
		}else{
			$result = $this->menu_model->check_menu($menu, $sub_module, $function);
		}
				
		if ($result > 0){
			$data['function'] = $function;
			$data['sub_module'] = $sub_module;
			$data['user_type'] = $this->session->userdata('user_type');
			$data['menu_module'] = $menu;
			$data['edit'] = 0;
			$data['trans_id'] = 0;
			$data['account_id'] = $this->session->userdata("account_id");
			$data['width'] = $width;
			$this->template->load($menu, $data);						
		}else{
			redirect("/logout");
		}		
	}

	public function store($store){
		var_dump($store);
		$menu = null; 
		$sub_module = null; 
		$function = null;	

		$all_access = $this->header_model->all_access();
		$result = 1;

		// if ($all_access == "1"){
		// 	$result = 1;
		// }else{
		// 	if ($menu == "1" && $function == "6"){
		// 		$result = 1;
		// 	}else if ($menu == "6" || $menu == "7" || $menu == "8"){
		// 		$result = 1;
		// 	}else{
		// 		$result = $this->menu_model->check_menu($menu, $sub_module, $function);
		// 	}
		// }
		
		// if ($result > 0){
		// 	$data['sub_module'] = 0;
		// 	$data['menu_module'] = 0;
		// 	$data['edit'] = 0;
		// 	$data['function'] = 0;
		// 	$data['width'] = 1366;
		// 	$data['account_id'] = $this->session->userdata("account_id");
		// 	$data['owner'] = 0;
		// 	if ($this->session->userdata("validated") == true){
		// 		$result = $this->login_model->check_session();	
		// 		if ($result != true){
		// 			redirect("/");
		// 		}else{
		// 			$data['user_type'] = 5;
		// 		}
		// 	}else{
		// 		$data['user_type'] = 6;
		// 	}
	
		// 	$this->template->load("0", $data);		
		// }else{
		// 	redirect("/logout");
		// }

		// $this->template->load("0", $data);		

	}


}
