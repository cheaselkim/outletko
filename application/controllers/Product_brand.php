<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_brand extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_brand_model");
	    	$this->load->helper("product_brand");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->product_brand_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_brand_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_brand_wo_id(){
        $product_brand = $this->input->post("brand_code", TRUE);
        $data['data'] = $this->product_brand_model->product_brand_wo_id($product_brand);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_brand_w_id(){
        $product_brand = $this->input->post("brand_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['data'] = $this->product_brand_model->product_brand_w_id($product_brand, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_product_brand(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"brand_code" => $this->input->post("brand_code", TRUE),
				"brand_name" => $this->input->post("brand_name", TRUE),
				"brand_desc" => $this->input->post("brand_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "9", "1");
		$data['data'] = $this->product_brand_model->insert_product_brand($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$brand_desc = $this->input->post("brand_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_brand_model->query_product_brand($brand_desc, $outlet);
		$tbl_result = entry_query($result);
		$count = count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function query_product_brand(){
		$app_func = $this->input->post("app_func", TRUE);
		$brand_desc = $this->input->post("brand_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_brand_model->query_product_brand($brand_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count = count($result);
        $this->activity_model->insert_activity("4", "9", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_prod_brand(){
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->product_brand_model->delete_prod_brand($id);
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("4", "9", "5");
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id");
		$result = $this->product_brand_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['brand_code'] = $result->brand_code;
		$data['brand_name'] = $result->brand_name;
		$data['brand_desc'] = $result->brand_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_product_brand(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet"),
				"brand_code" => $this->input->post("brand_code", TRUE),
				"brand_name" => $this->input->post("brand_name", TRUE),
				"brand_desc" => $this->input->post("brand_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "9", "2");
		$data['result'] = $this->product_brand_model->update_product_brand($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field() {
        $result = $this->product_brand_model->search_field();
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
