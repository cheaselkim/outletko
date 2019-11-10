<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_type_model");
	    	$this->load->helper("product_type");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$result = $this->product_type_model->company();
		echo json_encode($result);
	}

	public function outlet(){
		$result = $this->product_type_model->outlet();
		echo json_encode($result);
	}

	public function insert_product_type(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet"),
				"prod_type_desc" => $this->input->post("type_desc")
				);

		$result = $this->product_type_model->insert_product_type($insert_array);
		echo json_encode($result);
	}

	public function query_product_type(){
		$app_func = $this->input->post("app_func");
		$type_desc = $this->input->post("type_desc");
		$outlet = $this->input->post("outlet");
		$result = $this->product_type_model->query_product_type($type_desc, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count));

	}

	public function delete_prod_type(){
		$id = $this->input->post("id");
		$result = $this->product_type_model->delete_prod_type($id);
		echo json_encode($result);
	}

	public function get_transaction(){
		$id = $this->input->post("id");
		$result = $this->product_type_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['type_desc'] = $result->prod_type_desc;
		echo json_encode($data);
	}

	public function update_product_type(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet"),
				"prod_type_desc" => $this->input->post("type_desc")
				);

		$result = $this->product_type_model->update_product_type($update_array, $this->input->post("id"));
		echo json_encode($result);

	}

}
