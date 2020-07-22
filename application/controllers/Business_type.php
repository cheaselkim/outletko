<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class business_type extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("business_type_model");
	    	$this->load->helper("business_type");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->business_type_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->business_type_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function business_type_wo_id(){
        $business_type = $this->input->post("business_type", TRUE);
        $data['result'] = $this->business_type_model->business_type_wo_id($business_type);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function business_type_w_id(){
        $business_type = $this->input->post("business_type", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->business_type_model->business_type_w_id($business_type, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_business_type(){
		$insert_array = array(
				"desc" => $this->input->post("business_type", TRUE)
				);
		$data['result'] = $this->business_type_model->insert_business_type($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$result = $this->business_type_model->query_business_type("", "");
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_business_type(){
		$app_func = $this->input->post("app_func", TRUE);
		$business_type = $this->input->post("business_type", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->business_type_model->query_business_type($business_type, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function delete_business_type(){
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->business_type_model->delete_business_type($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->business_type_model->get_transaction($id);
		$data = array();
		$data['business_type'] = $result->desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_business_type(){
		$update_array = array(
				"desc" => $this->input->post("business_type", TRUE)
				);
		$data['result'] = $this->business_type_model->update_business_type($update_array, $this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

}
