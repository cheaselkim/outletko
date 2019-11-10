<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_category_model");
	    	$this->load->helper("product_category");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->product_category_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_category_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_category_wo_id(){
        $product_cat = $this->input->post("category_code", TRUE);
        $data['result'] = $this->product_category_model->product_category_wo_id($product_cat);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_category_w_id(){
        $product_cat = $this->input->post("category_code");
        $id = $this->input->post("id");
        $data['result'] = $this->product_category_model->product_category_w_id($product_cat, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_product_category(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"category_code" => $this->input->post("category_code", TRUE),
				"category_name" => $this->input->post("category_name", TRUE),
				"category_desc" => $this->input->post("category_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "10", "1");
		$data['result'] = $this->product_category_model->insert_product_category($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$category_desc = $this->input->post("category_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_category_model->query_product_category($category_desc, "", $outlet);
		$tbl_result = entry_query($result);
		$count = count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function query_product_category(){
		$app_func = $this->input->post("app_func", TRUE);
		$category_code = $this->input->post("category_code", TRUE);
		$category_name = $this->input->post("category_name", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_category_model->query_product_category($category_code, $category_name, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count = count($result);
        $this->activity_model->insert_activity("4", "10", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_prod_category(){
		$id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "10", "5");
		$data['result'] = $this->product_category_model->delete_prod_category($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->product_category_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['category_code'] = $result->category_code;
		$data['category_name'] = $result->category_name;
		$data['category_desc'] = $result->category_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_product_category(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet"),
				"category_code" => $this->input->post("category_code", TRUE),
				"category_name" => $this->input->post("category_name", TRUE),
				"category_desc" => $this->input->post("category_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "10", "2");
		$data['result'] = $this->product_category_model->update_product_category($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field() {
        $result = $this->product_category_model->search_field();
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
