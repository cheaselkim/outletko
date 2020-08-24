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
		$result = $this->Seller_model->get_process_order($this->input->post("order_status"));
		$data['result'] = tbl_process_order($result, "", "");
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_order_id(){
		$id = $this->input->post("id");
        $order_prod = $this->Seller_model->get_order_products($id);
        $products = array();

        if (!empty($order_prod)){
            foreach ($order_prod as $key => $value) {
                // $product_price = $value->product_unit_price;
                $product_price = $value->prod_price;

                if ($value->prod_var1 != "0"){
                    $prod_var1 = $this->Seller_model->get_variation($value->prod_var1);
                    // $product_price = $this->Seller_model->get_variation_price($value->prod_var1);
                }else{
                    $prod_var1 = "";
                    // $product_price = $product_price;
                }

                if ($value->prod_var2 != "0"){
                    $prod_var2 = $this->Seller_model->get_variation($value->prod_var2);
                }else{
                    $prod_var2 = "";
                }

                $products[$key] = array(
                    "product_name" => $value->product_name,
                    "img_location" => $value->img_location,
                    "prod_qty" => $value->prod_qty,
                    "prod_price" => $product_price,
                    "prod_var1" => $prod_var1,
                    "prod_var2" => $prod_var2
                );
            }
        }
        
        $proof = $this->Seller_model->get_proof($id);
        $proof_img = array();

        if (!empty($proof)){
            foreach ($proof as $key => $value) {
                $proof_img[$key] = array("img" => unserialize($value->img_location));
            }
        }

        $product_data = tbl_products($products);

        $data['products'] = $product_data['output'];
        $data['total_item'] = $product_data['total_items'];
        $data['result'] = $this->Seller_model->get_order_id($id);
        $data['proof'] = $proof;
        $data['proof_img'] = $proof_img;
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
		$data['result'] = tbl_process_order($result, "", "1");
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

    public function get_delivered_order(){
        $status = $this->input->post("status");
        $fdate = $this->input->post("fdate");
        $tdate = $this->input->post("tdate");
        $result = $this->Seller_model->get_delivered_order($status, $fdate, $tdate);
        $data['result'] = tbl_process_order($result, $status, "");
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    // Confirm Payment 

    public function confirm_payment(){
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $meessage = $this->input->post("message");
        $data['result'] = $this->Seller_model->confirm_payment($id, $status, $meessage);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }


}