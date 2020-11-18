<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function __construct(){
	    parent::__construct();
            $this->load->model("guest_model");
            $this->load->model("profile_model");
    }

    public function checkout(){

        $data['user_type'] = 6;
        $data['function'] = 0;
        $data['sub_module'] = 0;
        $data['edit'] = 0;
        $data['owner'] = 0;
        $data['width'] = 0;
        $menu = 3;

        // var_dump($this->session->userdata("seller_id"));

        if (empty($this->session->userdata("seller_id"))){
            redirect("/my-order");
        }else{
            $this->template->load($menu, $data);
        }

    }

    public function track_order(){
        $data['user_type'] = 6;
        $data['function'] = 0;
        $data['sub_module'] = 0;
        $data['edit'] = 0;
        $data['owner'] = 0;
        $data['width'] = 0;
        $menu = 5;

        $this->template->load($menu, $data);

    }

    public function checkout_id($id){
        //var_dump($id);
        $this->session->set_userdata("seller_id", $id);
        redirect('/checkout-guest');
    }

    public function validate_email(){
        $data['result'] = $this->guest_model->validate_email($this->input->post("email"));
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function search_city(){

        $city = $this->input->post("city", TRUE);
		$data = array();
		$data['response'] = "false";

		$result = $this->guest_model->search_city($city);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => ($value->city_desc.", ".$value->province_desc), "province" => $value->province_desc, "prov_id" => $value->prov_id, "city_id" => $value->city_id, "island_group" => $value->island_group);
			}
		}

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function bank_list(){
        $id = $this->input->post("id");
       $data['result'] = $this->guest_model->bank_list($id);
       $data['token'] = $this->security->get_csrf_hash();
       echo json_encode($data);
    }

    public function remittance_list(){
        $id = $this->input->post("id");
        $data['result'] = $this->guest_model->remittance_list($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_order_checkout(){

        $session_prod = $this->session->userdata("prod_session");
        $comp_id = $this->session->userdata("seller_id");
        $total = 0;
        $product_price = 0;
        $products = array();

        $this->session->unset_userdata("seller_id");

        if (!empty($session_prod)){
            foreach ($session_prod as $key => $value) {
                $prod_id = $value['prod_id'];
                $prod_qty = $value['prod_qty'];
                $prod_var1 = $value['prod_var1'];
                $prod_var2 = $value['prod_var2'];
                $product_price = 0;
                $prod_var1_name = "";
                $prod_var2_name = "";

                $query = $this->profile_model->get_product_info2($prod_id);
                
                foreach ($query as $key2 => $value2) {
                    $product_price = $value2->product_unit_price;
                    $img_prod = unserialize($value2->img_location);

                        if ($prod_var1 != ""){
                            $prod_var1_name = $this->profile_model->get_prod_variation($prod_var1);
                            $product_price = $this->profile_model->get_prod_variation_price($prod_var1);
                        }else{
                            $prod_var1_name = "";
                            $product_price = $product_price;
                        }

                        if ($prod_var2 != ""){
                            $prod_var2_name = $this->profile_model->get_prod_variation($prod_var2);
                        }else{
                            $prod_var2_name = "";
                        }

                        if ($value2->comp_id == $comp_id){
                            $products[$key] = array(
                                "item_id" => $key,
                                "prod_id" => $prod_id,
                                "account_id" => $value2->account_id,
                                "account_name" => $value2->account_name,
                                "img_location" => $value2->img_location,
                                "product_name" => $value2->product_name,
                                "product_unit_price" => $product_price,
                                "prod_avail" => $value2->product_available,
                                "prod_qty" => $prod_qty,
                                "prod_var1" => $prod_var1_name,
                                "prod_var2" => $prod_var2_name,
                                "prod_var1_id" => $prod_var1,
                                "prod_var2_id" => $prod_var2,
                                "img_prod" => $img_prod[0]
                            );

                        }

                    $total += ($product_price * $prod_qty);

                }

            }
        }

        if (!empty($this->session->userdata("prod_session"))){
            $order_no = COUNT($this->session->userdata("prod_session"));
        }else{
            $order_no = 0;
        }

        $data['payment_type'] = $this->guest_model->payment_type($comp_id);
        $data['delivery_type'] = $this->guest_model->delivery_type($comp_id);
        $data['cust_del_date'] = $this->guest_model->cust_del_date($comp_id);
        $data['orders']  = $products;
        $data['result'] = $products;
        $data['order_no'] = $order_no;
        $data['cart_total'] = $total;
        $data['seller_id'] = $comp_id;
        $data['token'] = $this->security->get_csrf_hash();
        $this->session->set_userdata('order_no', $data['order_no']);
        $this->session->set_userdata('cart_total', $total);

        $data['csrf_name'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function courier(){
        $id = $this->input->post("id"); 
        $weight = $this->input->post("total_weight");
        $city = $this->input->post("city");
        $prov = $this->input->post("prov");
        $data['result'] = $this->guest_model->courier($id, $weight, $city, $prov);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_courier(){
		$data['result'] = $this->guest_model->get_courier($this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    // Place Order

    public function place_order(){

        $buyer = array(
            "first_name" => $this->input->post("bill_fname"),
            "middle_name" => $this->input->post("bill_mname"),
            "last_name" => $this->input->post("bill_lname"),
            "phone_no" => $this->input->post("bill_phone"),
            "mobile_no" => $this->input->post("bill_mobile"),
            "email" => $this->input->post("bill_email"),
            "address" => $this->input->post("bill_address"),
            "barangay" => $this->input->post("bill_barangay"),
            "city" => $this->input->post("bill_city"),
            "province" => $this->input->post("bill_province"),
            "zip_code" => $this->input->post("bill_zip"),
            "country" => 173,
            "contact_person" => $this->input->post("bill_contact"),
            "temporary" => 1,
            "date_insert" => date("Y-m-d H:i:s")
        );

        $buyer_account = $this->guest_model->buyer_account($buyer);
        $order_no = $this->guest_model->get_order_no();

        $order_hdr = array(
            "comp_id" => $buyer_account,
            "seller_id" => $this->input->post("seller_id"),
            "order_no" => $order_no['order_no'],
            "status" => 1,
            "delivery_address" => $this->input->post("bill_address"),
            "barangay" => $this->input->post("bill_barangay"),
            "city" => $this->input->post("bill_city"),
            "province" => $this->input->post("bill_province"),
            "zip_code" => $this->input->post("bill_zip"),
            "phone_no" => $this->input->post("bill_phone"),
            "contact_no" => $this->input->post("bill_mobile"),
            "contact_name" => $this->input->post("bill_contact"),
            "notes" => $this->input->post("bill_notes"),
            "payment_type" => $this->input->post("payment_type"),
            "payment_method" => $this->input->post("payment_method"),
            "delivery_type" => $this->input->post("del_type"),
            "courier" => $this->input->post("del_courier"),
            "shipping_fee" => $this->input->post("del_fee"),
            "sub_total" => $this->input->post("sub_total"),
            "total_items" => $this->input->post("total_items"),
            "total_amount" => $this->input->post("total_amount"),
            "date_insert" => date("Y-m-d H:i:s")
        );

        $result_order = $this->guest_model->insert_order_hdr($order_hdr, $order_no['id']);       
        $data['result_order_dtls'] = $this->guest_model->insert_order($this->input->post("prod_id"), $order_no['id'], $buyer_account);
        $this->send_email($buyer['email'], $order_no['id']);

        //Unset

        $session_prod = $this->session->userdata("prod_session");
        $product = $this->input->post("prod_id");

        foreach ($session_prod as $key => $value) {
            $session_prod_id = $value['prod_id'];

            foreach ($product as $row) {
                if ($row['prod_id'] == $session_prod_id){
                    unset($session_prod[$key]);
                }
            }

        }

        $this->session->set_userdata("prod_session", $session_prod);

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function session_prod(){

        $session_prod = $this->session->userdata("prod_session");
        $product = $this->session->userdata("prod_session");

        // var_dump($session_prod);

        foreach ($session_prod as $key => $value) {
            $session_prod_id = $value['prod_id'];

            foreach ($product as $key2 => $value2) {
                if ($value2['prod_id'] == $session_prod_id){
                    unset($session_prod[$key]);
                }
            }

        }

        $this->session->set_userdata("prod_session", $session_prod);
        // var_dump($session_prod);

    }

    public function send_email($email, $order_id){
        $this->load->library("email");
        $data = array();

        // $email = "dooleycheasel@gmail.com";
        // $order_id = 56;

        $order_dtl = $this->guest_model->get_order_dtl($order_id); 
        $order_hdr = $this->guest_model->get_order_hdr($order_id);
        $order_dtl_array = array();
        $order_hdr_array = array();
        $sub_total = 0;

        if (!empty($order_dtl)){
            foreach ($order_dtl as $key => $value) {

                $img_prod = unserialize($value->img_location);
                $prod_var1 = $value->prod_var1;
                $prod_var2 = $value->prod_var2;
                $img = base_url()."images/products/".$img_prod[0];

                if ($prod_var1 != ""){
                    $prod_var1_name = $this->profile_model->get_prod_variation($prod_var1);
                }else{
                    $prod_var1_name = "";
                }

                if ($prod_var2 != ""){
                    $prod_var2_name = $this->profile_model->get_prod_variation($prod_var2);
                }else{
                    $prod_var2_name = "";
                }

                $order_dtl_array[$key] = array(
                    "prod_name" => $value->product_name,
                    "prod_price" => $value->prod_price,
                    "prod_qty" => $value->prod_qty,
                    "prod_var1" => $prod_var1_name,
                    "prod_var2" => $prod_var2_name,
                    "img_prod" => $img
                );

                $sub_total += ($value->prod_qty * $value->prod_price);
            }
        }
        
        // $sub_total = 10000;

        if (!empty($order_hdr)){
            foreach ($order_hdr as $key => $value) {

                if ($value->payment_type == "5"){
                    $payment_method = $this->guest_model->get_bank($value->payment_method);
                }elseif ($value->payment_type == "6"){
                    $payment_method = $this->guest_model->get_remittance($value->payment_method);
                }else{
                    $payment_method = "";
                }

                if (empty($value->notes)){
                    $notes = "NONE";
                }else{
                    $notes = $value->notes;
                }

                if (empty($value->contact_name)){
                    $contact_name = $value->first_name." ".$value->last_name;
                }else{
                    $contact_name = $value->contact_name;
                }

                if (empty($value->courier_name)){
                    $courier = "NONE";
                }else{
                    $courier = $value->courier_name;
                }

                $order_hdr_array = array(
                    "name" => $value->first_name." ".$value->last_name,
                    "address" => $value->delivery_address.", ".$value->barangay.", ".$value->city_desc.", ".$value->prov_desc,
                    "mobile_no" => "+63".$value->contact_no,
                    "phone_no" => $value->phone_no,
                    "contact_name" => $contact_name,
                    "notes" => $notes,
                    "order_no" => $value->order_no,
                    "order_date" => date("F d, Y H:i:s", strtotime($value->date_insert)),
                    "delivery_type" => $value->deltype_name,
                    "courier" => $courier,
                    "payment_type" => $value->paytype_name,
                    "payment_method" => $payment_method,
                    "shipping_fee" => $value->shipping_fee,
                    "email" => $email,
                    "sub_total" => $sub_total,
                    "total_amount" => $sub_total + $value->shipping_fee,
                    "comp_name" => $value->comp_name
                );
            }
        }

        
        $data['order_dtl'] = $order_dtl_array;
        $data['order_hdr'] = $order_hdr_array;
        // $this->load->view("email/email_checkout", $data);

        $message = $this->load->view("email/email_checkout", $data, TRUE);
        // var_dump(COUNT($data['order_hdr']));

		if (COUNT($data['order_hdr']) > 0){
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
	                    ->from('noreply@outletko.com', 'Order Processing')
                        ->bcc("checkoutguest@outletko.com")
                        ->to($email)
	                    ->subject('Order Processing')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
        
        // var_dump($status);

	    return $status;

    }

    // Sending Proof of Payment
    public function paylink($id){
     
        $this->session->set_userdata("payment_id", $id);
        redirect('/order-payment');
    }

    public function order_payment(){

        $data['user_type'] = 6;
        $data['function'] = 0;
        $data['sub_module'] = 0;
        $data['edit'] = 0;
        $data['owner'] = 0;
        $data['width'] = 0;
        $menu = 4;
        $seller_id = $this->session->userdata("payment_id");
        $check_id = $this->guest_model->check_id($seller_id);
        $data['order_id'] = $seller_id;

        // var_dump($seller_id);

        // $this->session->unset_userdata("payment_id");
        if (!empty($this->session->userdata("comp_id"))){
            redirect("/my-order");
        }else{
            if (empty($seller_id)){
                redirect("/");
            }else{
                if ($check_id == 0){
                    redirect("/");
                }else{
                    $this->template->load($menu, $data);
                }
            }
        }

    }

    public function get_payment_details(){  
        $data['result'] = $this->guest_model->get_payment_details($this->input->post("id"));
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_proof(){

		$files_upload = array();

		$db = $this->load->database('default', TRUE);

		$upload_path = './images/proof/'; 
        $counts = count($_FILES["files"]["name"]);
        
        // var_dump($counts);

        if (!empty($_FILES['files']['name'])){

            for($x = 0; $x < $counts; $x++) { 
                $files_tmp = $_FILES['files']['tmp_name'][$x];
                $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
                $randname = "file_".$this->input->post('id')."_".rand(1000,1000000) . "." . $files_ext;

                move_uploaded_file($files_tmp,$upload_path.$randname);
                $files_upload[] = $randname;
                $file_name = $randname;
                
                $config['upload_path'] = './images/proof/'; 
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './images/proof/'.$file_name;  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = TRUE;  
                $config['quality'] = '100%';  
                $config['width'] = 600;  
                $config['height'] = 600;  
                $config['new_image'] = './images/proof/'.$file_name;  
                $config['rotation_angle'] = 90;
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();                         
                $this->image_lib->clear();

            }

            $id = $this->input->post("id", TRUE);
            $id = substr($id, 6);
            $id = substr($id, 0, -5);    

            $serialized = serialize($files_upload);         
            $data = array('img_location' => $serialized, "order_id" => $id, "message" => $this->input->post('message', TRUE), "date_insert" => date("Y-m-d H:i:s")); 
            $result = $this->guest_model->save_proof($data, $this->input->post("id", TRUE));


        }

        $this->output->set_content_type('application/json');
		echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));

    }

    // Get Tracking Order
    public function get_track_order(){
        $data['result'] = $this->guest_model->get_track_order($this->input->post("email"), $this->input->post("order_no"));
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

}