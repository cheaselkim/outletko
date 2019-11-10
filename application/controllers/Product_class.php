<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_class extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_class_model");
	    	$this->load->helper("product_class");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function product_category(){
		$data['data'] = $this->product_class_model->product_category();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function company(){
		$data['data'] = $this->product_class_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_class_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_class_wo_id(){
        $product_class = $this->input->post("class_code", TRUE);
        $data['result'] = $this->product_class_model->product_class_wo_id($product_class);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_class_w_id(){
        $product_class = $this->input->post("class_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->product_class_model->product_class_w_id($product_class, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function insert_product_class(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"class_category" => $this->input->post("class_cat", TRUE),
				"class_code" => $this->input->post("class_code", TRUE),
				"class_name" => $this->input->post("class_name", TRUE),
				"class_desc" => $this->input->post("class_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "11", "1");
		$data['result'] = $this->product_class_model->insert_product_class($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$class_desc = $this->input->post("class_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_class_model->query_product_class($class_desc, "", "0", $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function query_product_class(){
		$app_func = $this->input->post("app_func", TRUE);
		$class_code = $this->input->post("class_code", TRUE);
		$class_name = $this->input->post("class_name", TRUE);
		$category = $this->input->post("category", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_class_model->query_product_class($class_code, $class_name, $category, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "11", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function delete_prod_class(){
		$id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "11", "5");
		$data['result'] = $this->product_class_model->delete_prod_class($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->product_class_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['class_cat'] = $result->class_category;
		$data['class_code'] = $result->class_code;
		$data['class_name'] = $result->class_name;
		$data['class_desc'] = $result->class_desc;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_product_class(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet", TRUE),
				"class_category" => $this->input->post("class_cat", TRUE),
				"class_code" => $this->input->post("class_code", TRUE),
				"class_name" => $this->input->post("class_name", TRUE),
				"class_desc" => $this->input->post("class_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "11", "2");
		$data['result'] = $this->product_class_model->update_product_class($update_array, $this->input->post("id", TRUE));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field() {
        $result = $this->product_class_model->search_field();
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
