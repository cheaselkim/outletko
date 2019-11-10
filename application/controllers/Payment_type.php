<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_type extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("payment_type_model");
	    	$this->load->helper("payment_type");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->payment_type_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->payment_type_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function insert_payment_type(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"type_desc" => $this->input->post("type_desc", TRUE)
				);

		$data['result'] = $this->payment_type_model->insert_payment_type($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function query_payment_type(){
		$app_func = $this->input->post("app_func", TRUE);
		$type_desc = $this->input->post("type_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->payment_type_model->query_payment_type($type_desc, $outlet);
		$data['result'] = tbl_query($result,$app_func);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function delete_payment_type(){
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->payment_type_model->delete_payment_type($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->payment_type_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['type_desc'] = $result->type_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_payment_type(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"type_desc" => $this->input->post("type_desc", TRUE)
				);

		$data['result'] = $this->payment_type_model->update_payment_type($update_array, $this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

}
