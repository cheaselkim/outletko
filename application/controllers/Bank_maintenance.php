<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_maintenance extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("bank_maintenance_model");
	    	$this->load->helper("Bank_maintenance");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->bank_maintenance_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->bank_maintenance_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function bank_maintenance_wo_id(){
        $bank_maintenance = $this->input->post("bank_code", TRUE);
        $account = $this->input->post('account_no', TRUE);
        $data['result'] = $this->bank_maintenance_model->bank_maintenance_wo_id($bank_maintenance, $account);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function bank_maintenance_w_id(){
        $bank_maintenance = $this->input->post("bank_code", TRUE);
        $account = $this->input->post("account_no", TRUE);
        $id = $this->input->post("id");
        $data['result'] = $this->bank_maintenance_model->bank_maintenance_w_id($bank_maintenance, $account, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$color_desc = $this->input->post("bank_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->bank_maintenance_model->query_bank_maintenance($color_desc, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function insert_bank_maintenance(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"bank_code" => $this->input->post("bank_code", TRUE),
				"bank_name" => $this->input->post("bank_name", TRUE),
				"account_no" => $this->input->post("account_no", TRUE)
				);

        $this->activity_model->insert_activity("4", "24", "1");
		$data['result'] = $this->bank_maintenance_model->insert_bank_maintenance($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function query_bank_maintenance(){
		$app_func = $this->input->post("app_func", TRUE);
		$color_desc = $this->input->post("bank_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->bank_maintenance_model->query_bank_maintenance($color_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "24", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_bank_maintenance(){
		$id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "24", "5");
		$data['result'] = $this->bank_maintenance_model->delete_bank_maintenance($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->bank_maintenance_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['bank_code'] = $result->bank_code;
		$data['bank_name'] = $result->bank_name;
		$data['account_no'] = $result->account_no;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_bank_maintenance(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"bank_code" => $this->input->post("bank_code", TRUE),
				"bank_name" => $this->input->post("bank_name", TRUE),
 				"account_no" => $this->input->post("account_no", TRUE)
				);

        $this->activity_model->insert_activity("4", "24", "2");
		$data['result'] = $this->bank_maintenance_model->update_bank_maintenance($update_array, $this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}	
	
	public function search_field() {
        $result = $this->bank_maintenance_model->search_field();
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
