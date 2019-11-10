<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_type extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("Supplier_type_model");
	    	$this->load->helper("supplier_type");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->Supplier_type_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->Supplier_type_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function business_type_wo_id(){
        $business_type = $this->input->post("supp_code", TRUE);
        $data['result'] = $this->Supplier_type_model->business_type_wo_id($business_type);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function business_type_w_id(){
        $business_type = $this->input->post("supp_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->Supplier_type_model->business_type_w_id($business_type, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_business_type(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"supplier_code_type" => $this->input->post("supp_code", TRUE),
				"supplier_name_type" => $this->input->post("supp_name", TRUE)
				);

        $this->activity_model->insert_activity("4", "22", "1");
		$data['result'] = $this->Supplier_type_model->insert_business_type($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$result = $this->Supplier_type_model->query_business_type("", "");
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_business_type(){
		$app_func = $this->input->post("app_func", TRUE);
		$business_type = $this->input->post("business_type", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->Supplier_type_model->query_business_type($business_type, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "22", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_business_type(){
		$id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "22", "5");
		$data['result'] = $this->Supplier_type_model->delete_business_type($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id");
		$result = $this->Supplier_type_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['supplier_code_type'] = $result->supplier_code_type;
		$data['supplier_name_type'] = $result->supplier_name_type;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_business_type(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet"),
				"supplier_code_type" => $this->input->post("supp_code"),
				"supplier_name_type" => $this->input->post("supp_name")
				);

        $this->activity_model->insert_activity("4", "22", "2");
		$data['result'] = $this->Supplier_type_model->update_business_type($update_array, $this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

}
