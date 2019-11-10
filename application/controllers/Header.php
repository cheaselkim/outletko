<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

	  public function __construct(){
	    parent::__construct();
		    $this->load->model("header_model");
		    $this->load->helper("header");
	  }

	public function count_outlet(){
		$result = $this->header_model->count_outlet();
		$data = array();
		$data['count'] = $result->num_rows();
		$data['outlet_no'] = 1;

		if ($data['count'] == 1){
			foreach ($result->result() as $key => $value) {
				$data['outlet_no'] = $value->outlet_id;
				if ($value->outlet_id == "0"){
					$result2 = $this->header_model->all_outlet();
					$data['outlet'] = list_outlet($result2);	
				}else{
					$data['outlet'] = $value->outlet_id;
				}
			}
		}else{
			$data['outlet'] = list_outlet($result->result());			
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function find_user_outlet(){
		$user_outlet = $this->header_model->user_outlet();

		if ($user_outlet == 1){
			$result = $this->header_model->all_outlet();
		}else{
			$result = $this->header_model->find_user_outlet();
		}

		$data['result'] = list_outlet($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function select_outlet(){
		$id = $this->input->post("id", TRUE);
		$result = $this->header_model->select_outlet($id);
		$outlet_code = "";
		foreach ($result as $key => $value) {
			$data['result'] = $value->outlet_code;
			$outlet_code = $value->outlet_code;
		}
		$this->session->set_userdata("outlet_id", $id);
		$this->session->set_userdata("outlet_code", $outlet_code);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}


	public function session_outlet(){
		$result = $this->header_model->select_outlet($this->session->userdata("outlet_id"));
		$outlet_code = "";
		foreach ($result as $key => $value) {
			$data['result'] = $value->outlet_code;
		}
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($outlet_code);		
	}

	public function all_access(){
		$result = $this->header_model->all_access();
		$data = array();
		$data["result"] = 0;

		if ($result == "1"){
			$data['result'] = 1;
		}else{
			$data['result'] = 0;
			$data['access'] = $this->header_model->module_access();
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function roles(){
		$data = array();
		$module = $this->input->post("module", TRUE);
		$function_module = $this->header_model->function_roles($module);
		$result = $this->header_model->user_roles($module);
		$result_menu = $this->header_model->get_module_name($module);
		$submodule_query = $this->header_model->get_submodule($module);
		$sub_module = 0;
		$data = array();
		$data['count'] = $result->num_rows();


		foreach ($result_menu->result() as $key => $value) {
			$data['menu'] = $value->module_desc." Menu";
		}

		foreach ($submodule_query as $key => $value) {
			if ($value->id != 0){
				$sub_module = 1;
				break;
			}else{
				$sub_module = 0;
			}
		}

		if ($data['count'] == 1){
			foreach ($result->result() as $key => $value) {
				$data['roles'] = $value->function_id;
			}
		}else{
			if ($sub_module == 0){
				$data['roles'] = menu_roles($module, $sub_module, $function_module, $result->result());
			}else{
				$data['roles'] = menu_roles_with_submodule($module,$submodule_query,$function_module,$result->result());
			}
		}
		
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

	public function get_transaction(){
		$data = array();
		$data['last_trans'] = $this->header_model->get_last_trans();
		$data['no_of_trans'] = $this->header_model->get_no_of_trans_for_today();
		$data['total_sales'] = $this->header_model->get_total_sales_for_today();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}


}
