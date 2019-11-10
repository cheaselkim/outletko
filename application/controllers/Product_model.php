<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_model_model");
	    	$this->load->helper("product_model");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->product_model_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_model_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_model_wo_id(){
        $product_model = $this->input->post("model_code", TRUE);
        $data['result'] = $this->product_model_model->product_model_wo_id($product_model);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_decode($data);
    }

    public function product_model_w_id(){
        $product_model = $this->input->post("model_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->product_model_model->product_model_w_id($product_model, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_decode($data);
    }

	public function insert_product_model(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"model_code" => $this->input->post("model_code", TRUE),
				"model_name" => $this->input->post("model_name", TRUE),
				"model_desc" => $this->input->post("model_desc", TRUE)
				);

		$data['result'] = $this->product_model_model->insert_product_model($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$model_desc = $this->input->post("model_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_model_model->query_product_model($model_desc, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_product_model(){
		$app_func = $this->input->post("app_func", TRUE);
		$model_desc = $this->input->post("model_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_model_model->query_product_model($model_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function delete_prod_model(){
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->product_model_model->delete_prod_model($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->product_model_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['model_code'] = $result->model_code;
		$data['model_name'] = $result->model_name;
		$data['model_desc'] = $result->model_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_product_model(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"model_code" => $this->input->post("model_code", TRUE),
				"model_name" => $this->input->post("model_name", TRUE),
				"model_desc" => $this->input->post("model_desc", TRUE)
				);

		$data['result'] = $this->product_model_model->update_product_model($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field() {
        $result = $this->product_model_model->search_field();
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
