<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_unit extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_unit_model");
	    	$this->load->helper("product_unit");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->product_unit_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_unit_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_unit_wo_id(){
        $product_unit = $this->input->post("unit_code", TRUE);
        $data['result'] = $this->product_unit_model->product_unit_wo_id($product_unit);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_unit_w_id(){
        $product_unit = $this->input->post("unit_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->product_unit_model->product_unit_w_id($product_unit, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_product_unit(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"unit_code" => $this->input->post("unit_code", TRUE),
				"unit_name" => $this->input->post("unit_name", TRUE),
				"unit_desc" => $this->input->post("unit_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "15", "1");
		$data['result'] = $this->product_unit_model->insert_product_unit($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$unit_desc = $this->input->post("unit_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_unit_model->query_product_unit($unit_desc, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_product_unit(){
		$app_func = $this->input->post("app_func", TRUE);
		$unit_desc = $this->input->post("unit_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
        $this->activity_model->insert_activity("4", "15", "3");
		$result = $this->product_unit_model->query_product_unit($unit_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_prod_unit(){
		$id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "15", "5");
		$data['result'] = $this->product_unit_model->delete_prod_unit($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->product_unit_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['unit_code'] = $result->unit_code;
		$data['unit_name'] = $result->unit_name;
		$data['unit_desc'] = $result->unit_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_product_unit(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"unit_code" => $this->input->post("unit_code", TRUE),
				"unit_name" => $this->input->post("unit_name", TRUE),
				"unit_desc" => $this->input->post("unit_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "15", "2");
		$data['result'] = $this->product_unit_model->update_product_unit($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field() {
        $result = $this->product_unit_model->search_field();
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
