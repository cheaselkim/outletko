<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_type extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("customer_type_model");
	    	$this->load->helper("customer_type");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->customer_type_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->customer_type_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function customer_type_wo_id(){
        $customer_type = $this->input->post("cust_code", TRUE);
        $data['result'] = $this->customer_type_model->customer_type_wo_id($customer_type);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function customer_type_w_id(){
        $customer_type = $this->input->post("cust_code", TRUE);
        $id = $this->input->post("id");
        $data['result'] = $this->customer_type_model->customer_type_w_id($customer_type, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_customer_type(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"customer_code_type" => $this->input->post("cust_code", TRUE),
				"customer_name_type" => $this->input->post("cust_name", TRUE)
				);

        $this->activity_model->insert_activity("4", "21", "1");
		$data['result'] = $this->customer_type_model->insert_customer_type($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$customer_type = "";
		$outlet = "";
		$result = $this->customer_type_model->query_customer_type($customer_type, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_customer_type(){
		$app_func = $this->input->post("app_func", TRUE);
		$customer_type = $this->input->post("customer_type", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->customer_type_model->query_customer_type($customer_type, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "21", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_customer_type(){
		$id = $this->input->post("id");
        $this->activity_model->insert_activity("4", "21", "5");
		$data['result'] = $this->customer_type_model->delete_customer_type($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id");
		$result = $this->customer_type_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['cust_type_code'] = $result->customer_code_type;
		$data['cust_type_name'] = $result->customer_name_type;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_customer_type(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"customer_code_type" => $this->input->post("cust_code", TRUE),
				"customer_name_type" => $this->input->post("cust_name", TRUE)
				);
        $this->activity_model->insert_activity("4", "21", "2");
		$data['result'] = $this->customer_type_model->update_customer_type($update_array, $this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field() {
        $result = $this->customer_type_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }

}
