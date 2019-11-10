<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_type extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("outlet_type_model");
	    	$this->load->helper("outlet_type");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->outlet_type_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->outlet_type_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function outlet_type_wo_id(){
        $outlet_type = $this->input->post("outlet_type_code", TRUE);
        $data['result'] = $this->outlet_type_model->outlet_type_wo_id($outlet_type);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function outlet_type_w_id(){
        $outlet_type = $this->input->post("outlet_type_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->outlet_type_model->outlet_type_w_id($outlet_type, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$outlet_type_desc = $this->input->post("outlet_type_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->outlet_type_model->query_outlet_type($outlet_type_desc, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'result' => $this->security->get_csrf_hash()));

	}

	public function insert_outlet_type(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id", TRUE),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"outlet_type_code" => $this->input->post("outlet_type_code", TRUE),
				"outlet_type_name" => $this->input->post("outlet_type_name", TRUE),
				);

        $this->activity_model->insert_activity("4", "26", "1");
		$data['result'] = $this->outlet_type_model->insert_outlet_type($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function query_outlet_type(){
		$app_func = $this->input->post("app_func", TRUE);
		$outlet_type_desc = $this->input->post("outlet_type_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->outlet_type_model->query_outlet_type($outlet_type_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "26", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'result' => $this->security->get_csrf_hash()));

	}

	public function delete_outlet_type(){
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->outlet_type_model->delete_outlet_type($id);
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("4", "26", "5");
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->outlet_type_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['outlet_type_code'] = $result->outlet_type_code;
		$data['outlet_type_name'] = $result->outlet_type_name;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_outlet_type(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"outlet_type_code" => $this->input->post("outlet_type_code", TRUE),
				"outlet_type_name" => $this->input->post("outlet_type_name", TRUE),
				);

        $this->activity_model->insert_activity("4", "26", "2");
		$data['result'] = $this->outlet_type_model->update_outlet_type($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}	

	
	public function search_field() {
        $result = $this->outlet_type_model->search_field();
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
