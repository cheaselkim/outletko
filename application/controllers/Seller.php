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
        $result = $this->Seller_model->get_buyer_temporary_type($this->input->post("id"));

        if ($result == "1"){
            $result_data = $this->Seller_model->get_buyer_data($this->input->post("id"));
            $this->send_acknowledge_email($result_data['comp_id'], $result_data['name'], $this->input->post("id"), $result_data['email']);
        }

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function cancel_acknowledge_order(){
		$data['result'] = $this->Seller_model->cancel_acknowledge_order($this->input->post("id"));

        $result = $this->Seller_model->get_buyer_temporary_type($this->input->post("id"));

        if ($result == "1"){
            $result_data = $this->Seller_model->get_buyer_data($this->input->post("id"));
            $this->send_order_decline($result_data['seller_name'], $result_data['name'], $result_data['order_no'], $result_data['order_date'], $result_data['email']);
        }

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

        $result = $this->Seller_model->get_buyer_temporary_type($this->input->post("id"));

        if ($result == "1"){
            $result_data = $this->Seller_model->get_buyer_data($this->input->post("id"));
            if ($status == "4"){
                $this->send_declined_payment($result_data['seller_name'], $result_data['name'], $this->input->post("id"), $result_data['email']);
            }else{
                $this->send_confirm_payment($result_data['seller_name'], $result_data['name'], $result_data['email']);
            }
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    // Report

    public function report(){
        $type = $this->input->post("type");
        $status = $this->input->post("status");
        $fdate = $this->input->post("fdate");
        $tdate = $this->input->post("tdate");
        $data['report_year'] = "";
        $data['report_week'] = "";
        $data['report_tbl'] = "";

        if ($type == "0"){
            $data['report_year'] = $this->Seller_model->report_year();
            $data['report_week'] = $this->Seller_model->report_week();
        }else if ($type == "1"){
            $result = $this->Seller_model->report_sales_summary($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_sales_summary($result);
        }else if ($type == "2"){
            $result = $this->Seller_model->report_product_category($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_product_category($result, $type);
        }else if ($type == "3"){
            $result = $this->Seller_model->report_products($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_rpt_products($result, $type);
        }else if ($type == "4"){
            // $result = $this->Seller_model->report_product_variation($fdate, $tdate, $status);
            // $data['report_tbl'] = tbl_product_variation($result);
        }else if ($type == "5"){
            $result = $this->Seller_model->report_payment_type($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_payment_type($result, $type);
        }else if ($type == "6"){
            $result = $this->Seller_model->report_delivery_type($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_delivery_type($result, $type);
        }else if ($type == "7"){
            $result = $this->Seller_model->report_product_category_dtl($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_product_category($result, $type);
        }else if ($type == "8"){
            $result = $this->Seller_model->report_products_dtl($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_rpt_products($result, $type);
        }else if ($type == "9"){
            // $result = $this->Seller_model->report_product_variation($fdate, $tdate, $status);
            // $data['report_tbl'] = tbl_product_variation($result);
        }else if ($type == "10"){
            $result = $this->Seller_model->report_payment_type_dtl($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_payment_type($result, $type);
        }else if ($type == "11"){
            $result = $this->Seller_model->report_delivery_type_dtl($fdate, $tdate, $status);
            $data['report_tbl'] = tbl_delivery_type($result, $type);
        }
        

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    // Email

    public function send_acknowledge_email($comp_id, $name, $order_id, $email){
        
		$this->load->library("email");
		$status = 0;
		$randomString = "";
		$result = 1;
        $data = array();

        // $data['account_id'] = $account_id;
		// $data['password'] = $randomString;
		// $data['email'] = $email;
        $payid = $this->randomNumber(6).$order_id.$this->randomNumber(5);
        $data['href'] = base_url()."pay-link/".$payid;
        $data['name'] = $name;


        $message = $this->load->view("email/email_acknowledge", $data, TRUE);

		if ($result > 0){
	        $config = array(
                        'protocol' => 'mail',
                        'mail_type' => 'html',
                        'smtp_host' => 'mail.outletko.com',
                        'smtp_port' => '465',
                        'smtp_user' => 'noreply@outletko.com',
                        'smtp_pass' => 'eoutletsuite_noreply',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE

	                );


	        $this->email->initialize($config)
	                    ->set_newline("\r\n")
	                    ->from('noreply@outletko.com', 'Order Acknowledgement')
                        ->bcc("checkoutguest@outletko.com")
                        ->to($email)
	                    ->subject('Order Acknowledgement')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
	    
	    return $status;

    }

    public function send_order_decline($seller_name, $name, $order_no, $order_date, $email){
        
		$this->load->library("email");
		$status = 0;
		$randomString = "";
		$result = 1;
        $data = array();

        // $data['account_id'] = $account_id;
		// $data['password'] = $randomString;
		// $data['email'] = $email;
        $data['comp_name'] = $seller_name;
        $data['name'] = $name;
        $data['order_no'] = $order_no;
        $data['order_date'] = $order_date;

        $message = $this->load->view("email/email_order_decline", $data, TRUE);

		if ($result > 0){
	        $config = array(
                        'protocol' => 'mail',
                        'mail_type' => 'html',
                        'smtp_host' => 'mail.outletko.com',
                        'smtp_port' => '465',
                        'smtp_user' => 'noreply@outletko.com',
                        'smtp_pass' => 'eoutletsuite_noreply',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE

	                );


	        $this->email->initialize($config)
	                    ->set_newline("\r\n")
	                    ->from('noreply@outletko.com', 'Order Decline')
                        ->bcc("checkoutguest@outletko.com")
                        ->to($email)
	                    ->subject('Order Decline')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
        
        // var_dump($message);

	    return $status;

    }

    public function send_confirm_payment($seller_name, $name, $email){

		$this->load->library("email");
		$status = 0;
		$randomString = "";
		$result = 1;
        $data = array();

        $data['comp_name'] = $seller_name;
        $data['name'] = $name;


        $message = $this->load->view("email/email_payment_approve", $data, TRUE);

		if ($result > 0){
	        $config = array(
                        'protocol' => 'mail',
                        'mail_type' => 'html',
                        'smtp_host' => 'mail.outletko.com',
                        'smtp_port' => '465',
                        'smtp_user' => 'noreply@outletko.com',
                        'smtp_pass' => 'eoutletsuite_noreply',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE

	                );


	        $this->email->initialize($config)
	                    ->set_newline("\r\n")
	                    ->from('noreply@outletko.com', 'Payment Confirmation')
                        ->bcc("checkoutguest@outletko.com")
                        ->to($email)
	                    ->subject('Payment Confirmation')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
	    
	    return $status;

    }

    public function send_declined_payment($seller_name, $name, $order_id, $email){
        
		$this->load->library("email");
		$status = 0;
		$randomString = "";
		$result = 1;
        $data = array();

        $payid = $this->randomNumber(6).$order_id.$this->randomNumber(5);
        $data['href'] = base_url()."pay-link/".$payid;
        $data['comp_name'] = $seller_name;
        $data['name'] = $name;


        $message = $this->load->view("email/email_payment_decline", $data, TRUE);

		if ($result > 0){
	        $config = array(
                        'protocol' => 'mail',
                        'mail_type' => 'html',
                        'smtp_host' => 'mail.outletko.com',
                        'smtp_port' => '465',
                        'smtp_user' => 'noreply@outletko.com',
                        'smtp_pass' => 'eoutletsuite_noreply',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE

	                );


	        $this->email->initialize($config)
	                    ->set_newline("\r\n")
	                    ->from('noreply@outletko.com', 'Payment Decline')
                        ->bcc("checkoutguest@outletko.com")
                        ->to($email)
	                    ->subject('Payment Decline')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
	    
	    return $status;
    }

    public function randomNumber($length) {
        $str = "";
        // $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $characters = range(0, 9);
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
          $rand = mt_rand(0, $max);
          $str .= $characters[$rand];
        }
        return str_shuffle($str);
    }
    

}