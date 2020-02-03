<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("profile_model");
	}

    public function check_session(){
        $data['result'] = $this->login_model->check_session();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function profile(){

    	$id = $this->input->post("id");
    	$acc_id = $id;
    	// $acc_id = $this->profile_model->get_account_id($id);
    	$data['result'] = $this->profile_model->get_profile_dtl($acc_id);
    	$data['prod_cat'] = $this->profile_model->get_product_category($acc_id);
    	$result = $this->profile_model->get_products($acc_id);
        $store_img = $this->profile_model->get_store_img($acc_id);
        // $data['payment_type'] = $this->profile_model->get_payment_type();
        // $data['delivery_type'] = $this->profile_model->get_delivery_type();
        // $data['shipping_fee'] = $this->profile_model->get_shipping_fee();
    	$data['products']="";
        
        foreach ($data['result'] as $key => $value) {
            $data['profile'] = unserialize($value->loc_image);
        }

        $products = array();
        foreach ($result as $key => $value) {
            $unserialized_files = unserialize($value->img_location); 
            $products[$key] = array(
                'product_name' => $value->product_name,
                "product_description" => $value->product_description,
                "product_unit_price" => $value->product_unit_price,
                "img_location" => $unserialized_files,
                "id" => $value->id);
        }

        $store = array();
        foreach ($store_img as $key => $value) {
            $store[$key] = array(
                "img_order" => $value->img_order,
                "image" => unserialize($value->loc_image)
            );
        }

        $data['store_img'] = $store;
        $data['products'] = $products;
    	$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

	public function get_product_info(){

	    $id = $this->input->post('id', TRUE);
		$result = $this->profile_model->get_product_info($id);
		foreach($result as $row){
            $unserialized_files = unserialize($row->img_location); 
            $data['payment_type'] = $this->profile_model->get_payment_type($row->account_id);
            $data['products'][] = array(
                'product_name' => $row->product_name,
                "product_description" => $row->product_description,
                "product_other_details" => $row->product_other_details,
                "product_online" => $row->product_online,
                "product_unit_price" => $row->product_unit_price,
                "product_category" => $row->product_category,
                "product_condition" => $row->product_condition,
                "product_stock" => $row->product_stock,
                "product_weight" => $row->product_weight,
                "product_delivery" => $row->product_delivery,
                "delivery_type" => $row->delivery_type,
                "product_del_opt" => $row->product_del_opt,
                "product_return" => ($row->product_return != "" ? $row->product_return : $this->profile_model->get_product_return($row->account_id)),
                "product_warranty" => ($row->product_warranty != "" ? $row->product_warranty : $this->profile_model->get_product_warranty($row->account_id)),
                "ship_w_mm" => $row->ship_fee_w_mm,
                "ship_o_mm" => $row->ship_fee_o_mm,
                "img_location" => $unserialized_files,
                "id" => $row->id);
            }
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function insert_prod(){
        $this->session->set_userdata("order_id", $this->input->post("order"));
        $data = array(
            "comp_id" => $this->session->userdata("comp_id"),
            "prod_id" => $this->input->post("prod_id"),
            "prod_qty" => $this->input->post("prod_qty")
        );

        $data['result'] = $this->profile_model->insert_prod($data);
        $data['token'] = $this->security->get_csrf_hash();

        echo json_encode($data);
    }	

}
