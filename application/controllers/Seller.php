<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper("Seller");
	    $this->load->model("Seller_model");
	}

	public function get_order(){
		$data['result'] = $this->Seller_model->get_order();
		$data['token'] = $this->security->get_csrf_hash();
		$this->session->set_userdata("order_no", $data['result']);
		echo json_encode($data);
	}

	public function get_process_order(){
		$result = $this->Seller_model->get_process_order();
		$data['result'] = tbl_process_order($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_order_id(){
		$id = $this->input->post("id");
		$data['result'] = $this->Seller_model->get_order_id($id);
		$data['products'] = $this->Seller_model->get_order_products($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function acknowledge_order(){
		$data['result'] = $this->Seller_model->acknowledge_order($this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function cancel_acknowledge_order(){
		$data['result'] = $this->Seller_model->cancel_acknowledge_order($this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_close_order(){
		$result = $this->Seller_model->get_close_order();
		$data['result'] = tbl_process_order($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function delivery_order(){
		$id = $this->input->post("id");
		$courier = $this->input->post("courier");
		$track_no = $this->input->post("track_no");
		$data['result'] = $this->Seller_model->delivery_order($id, $courier, $track_no);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}


}