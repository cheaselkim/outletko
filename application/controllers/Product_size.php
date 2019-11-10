<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_size extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_size_model");
	    	$this->load->helper("product_size");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->product_size_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_size_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_size_wo_id(){
        $product_size = $this->input->post("size_code", TRUE);
        $data['result'] = $this->product_size_model->product_size_wo_id($product_size);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_size_w_id(){
        $product_size = $this->input->post("size_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->product_size_model->product_size_w_id($product_size, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_product_size(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"size_code" => $this->input->post("size_code", TRUE),
				"size_name" => $this->input->post("size_name", TRUE),
				"size_desc" => $this->input->post("size_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "14", "1");
		$data['result'] = $this->product_size_model->insert_product_size($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$size_desc = $this->input->post("size_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_size_model->query_product_size($size_desc, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_product_size(){
		$app_func = $this->input->post("app_func", TRUE);
		$size_desc = $this->input->post("size_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_size_model->query_product_size($size_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "14", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_prod_size(){
		$id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "14", "5");
		$data['result'] = $this->product_size_model->delete_prod_size($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->product_size_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['size_code'] = $result->size_code;
		$data['size_name'] = $result->size_name;
		$data['size_desc'] = $result->size_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_product_size(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"size_code" => $this->input->post("size_code", TRUE),
				"size_name" => $this->input->post("size_name", TRUE),
 				"size_desc" => $this->input->post("size_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "14", "2");
		$data['result'] = $this->product_size_model->update_product_size($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	
	public function search_field() {
        $result = $this->product_size_model->search_field();
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
