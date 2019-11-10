<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_adjustment extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("inventory_adjustment_model");
	      	$this->load->helper("inventory_adjustment");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function adjustment_no(){
		$tran_type = $this->input->post("tran_type", TRUE);
		$data['data'] = $this->inventory_adjustment_model->adjustment_no($tran_type);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function adjustment_type(){
		$data['data'] = $this->inventory_adjustment_model->adjustment_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);				
	}

	public function product_type(){
		$data['data'] = $this->inventory_adjustment_model->product_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function product_class(){
		$data['data'] = $this->inventory_adjustment_model->product_class();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function entry_query(){
		$product_type = $this->input->post("product_type");
		$product_class = $this->input->post("product_class");
		$product_id = $this->input->post("product_id");
		$status = $this->input->post("status");

		$result = $this->inventory_adjustment_model->entry_query($product_type, $product_class, $product_id, $status);
		$sales_result = $this->inventory_adjustment_model->sales_qty();
		$data['data'] = entry_query($result, $sales_result);
		$data['token'] = $this->security->get_csrf_hash();
		$data['count'] = COUNT($result);
		echo json_encode($data);
	}

	public function search_item(){
		$prod = $this->input->post("prod", TRUE);
		$currency = "";
		$data = array();
		$data['response'] = "false";

		$result = $this->inventory_adjustment_model->search_item($prod);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => $value->term, 
										  "prod_id" => $value->id,
										  "prod_type" => $value->type_id,
										  "prod_class" => $value->class_id,
										  "prod_status" => $value->product_status);
			}
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function insert_adjustment(){
		$adjustment_hdr = $this->input->post("adjustment_hdr", TRUE);
		$adjustment_dtl = $this->input->post("adjustment_dtl", TRUE);

		$adjustment_hdr['inv_date'] = date("Y-m-d");
		$adjustment_hdr['comp_id'] = $this->session->userdata("comp_id");
		$adjustment_hdr['outlet_id'] = $this->session->userdata("outlet_id");
		$adjustment_hdr['created_by'] = $this->session->userdata("user_id");
		$adjustment_hdr['date_insert'] = date("Y-m-d H:i:s");

		$hdr_id = $this->inventory_adjustment_model->insert_adjustment_hdr($adjustment_hdr);

		$adjustment_dtl['hdr_id'] = $hdr_id;

        $this->activity_model->insert_activity("3", "27", "1");
		$data['result'] = $this->inventory_adjustment_model->insert_adjustment_dtl($adjustment_dtl);
		$data['token'] = $this->security->get_csrf_hash();

		echo json_encode($data);

	}

	public function query(){

		$adjustment_date = $this->input->post("adjustment_date", TRUE);
		$adjustment_type = $this->input->post("adjustment_type", TRUE);
		$keyword = $this->input->post("keyword", TRUE);
		$status = $this->input->post("status", TRUE);

		$result = $this->inventory_adjustment_model->query($adjustment_date, $adjustment_type, $keyword, $status);
        $this->activity_model->insert_activity("3", "27", "1");
		$data['data'] = query($result);
		$data['token'] = $this->security->get_csrf_hash();
		$data['count'] = COUNT($result);
		echo json_encode($data);
	}

}
