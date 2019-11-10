<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_color extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_color_model");
	    	$this->load->helper("product_color");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->product_color_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->product_color_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function product_color_wo_id(){
        $product_color = $this->input->post("color_code", TRUE);
        $data['data'] = $this->product_color_model->product_color_wo_id($product_color);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_color_w_id(){
        $product_color = $this->input->post("color_code", TRUE);
        $id = $this->input->post("id");
        $data['data'] = $this->product_color_model->product_color_w_id($product_color, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$color_desc = $this->input->post("color_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_color_model->query_product_color($color_desc, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function insert_product_color(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"color_code" => $this->input->post("color_code", TRUE),
				"color_name" => $this->input->post("color_name", TRUE),
				"color_desc" => $this->input->post("color_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "12", "1");
		$data['result'] = $this->product_color_model->insert_product_color($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function query_product_color(){
		$app_func = $this->input->post("app_func", TRUE);
		$color_desc = $this->input->post("color_desc", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->product_color_model->query_product_color($color_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "12", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function delete_prod_color(){
		$id = $this->input->post("id");
        $this->activity_model->insert_activity("4", "12", "5");
		$data['result'] = $this->product_color_model->delete_prod_color($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->product_color_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['color_desc'] = $result->color_desc;
		$data['color_code'] = $result->color_code;
		$data['color_name'] = $result->color_name;
		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
	}

	public function update_product_color(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet"),
				"color_code" => $this->input->post("color_code", TRUE),
				"color_name" => $this->input->post("color_name", TRUE),
 				"color_desc" => $this->input->post("color_desc", TRUE)
				);

        $this->activity_model->insert_activity("4", "12", "2");
		$data['result'] = $this->product_color_model->update_product_color($update_array, $this->input->post("id", TRUE));
		$data['security'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}	

	
	public function search_field() {
        $result = $this->product_color_model->search_field();
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
