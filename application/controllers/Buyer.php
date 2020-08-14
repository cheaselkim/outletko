<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("buyer_model");
	    	$this->load->helper("buyer");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	/*
		MENU 

		my-orders = 2;
		my-account = 3;

	*/

	public function my_order(){

        $data['id'] = $this->input->get("strid");		
        
		$menu = 2;
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = $this->session->userdata("user_type");
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		$this->template->load($menu, $data);	

	}

	public function my_account(){

		$data['id'] = $this->input->get("strid");		

		$menu = 3;
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = $this->session->userdata("user_type");
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		$this->template->load($menu, $data);	

	}


	public function delivery_type(){
		$data['result'] = $this->buyer_model->delivery_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function payment_type(){
		$data['result'] = $this->buyer_model->payment_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function courier(){
        $id = $this->input->post("id"); 
        $weight = $this->input->post("total_weight");
        $city = $this->input->post("city");
        $prov = $this->input->post("prov");
        $data['result'] = $this->buyer_model->courier($id, $weight, $city, $prov);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_courier(){
		$data['result'] = $this->buyer_model->get_courier($this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_orders(){
        $total = 0;
		$query = $this->buyer_model->get_orders();
        $products = array();

        if (!empty($query)){
            foreach ($query as $key => $value) {
                $total += ($value->product_unit_price * $value->prod_qty);
                $product_price = $value->product_unit_price;

                if ($value->prod_var1 != "0"){
                    $prod_var1 = $this->buyer_model->get_variation($value->prod_var1);
                    $product_price = $this->buyer_model->get_variation_price($value->prod_var1);
                }else{
                    $prod_var1 = "";
                    $product_price = $product_price;
                }

                if ($value->prod_var2 != "0"){
                    $prod_var2 = $this->buyer_model->get_variation($value->prod_var2);
                }else{
                    $prod_var2 = "";
                }

                // var_dump($prod_var1);
                $products[$key] = array(
                    "item_id" => $value->item_id,
                    "prod_id" => $value->prod_id,
                    "account_id" => $value->account_id,
                    "account_name" => $value->account_name,
                    "link_name" => $value->link_name,
                    "item_id" => $value->item_id,
                    "img_location" => $value->img_location,
                    "product_name" => $value->product_name,
                    "product_unit_price" => $product_price,
                    "prod_avail" => $value->product_available,
                    "prod_qty" => $value->prod_qty,
                    "prod_var1" => $prod_var1,
                    "prod_var2" => $prod_var2,
                    "prod_var1_id" => $value->prod_var1,
                    "prod_var2_id" => $value->prod_var2
                );
            }
        }

        // $prod_obj = (object) $products;
        // var_dump($products);
        $tbl_products = tbl_products_no_order($products, $this->session->userdata("prod_id"));
        $data['session_div'] = $tbl_products['seller_id'];
        $data['session_prod_id'] = $this->session->userdata("prod_id");
        $data['result'] = $tbl_products['output'];
        $data['order_no'] = COUNT($this->buyer_model->get_orders());
        $data['cart_total'] = $total;
        $data['token'] = $this->security->get_csrf_hash();
        $this->session->set_userdata('order_no', $data['order_no']);
        $this->session->set_userdata('cart_total', $total);
        $this->session->unset_userdata("prod_id");

        echo json_encode($data);
	}

	public function get_billing(){
        $data['result'] = $this->buyer_model->get_billing();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function bank_list(){
 		$id = $this->input->post("id");
		$data['result'] = $this->buyer_model->bank_list($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
 	}

 	public function remittance_list(){
 		$id = $this->input->post("id");
 		$data['result'] = $this->buyer_model->remittance_list($id);
 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}

 	public function get_bank(){
		$id = $this->input->post("bank_type");
		$seller_id = $this->input->post("id");
 		$result = $this->buyer_model->get_bank($id, $seller_id);

 		foreach ($result as $key => $value) {
			$data['bank_name'] = $value->bank_name;
			$data['account_name'] = $value->account_name;			
 			$data['account_no'] = $value->account_no;
 		}

 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}

 	public function get_remittance(){
 		$id = $this->input->post("id");
 		$result = $this->buyer_model->get_remittance($id);

 		foreach ($result as $key => $value) {
 			$data['name'] = $value->fullname;
 			$data['mobile'] = $value->mobile_no;
            $data['email'] = $value->email;
            $data['remitt_name'] = $value->remitt_name;
            $data['remitt_contact'] = $value->remitt_contact;
 		}

 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}

	public function get_order_checkout(){
        $prod_id = $this->input->post("prod_id");
        $item_id = $this->input->post("item_id");

		$result = $this->buyer_model->get_order_checkout($prod_id, $item_id);
        $product = array();
        $prod_array = array();
        $account_id = "";

        if (!empty($result)){
            foreach ($result as $key => $value) {
                $account_id = $value->account_id;
                $img = unserialize($value->img_location);
                $prod_price = $value->product_unit_price;

                $product[$key] = array(
                    "prod_id" => $value->prod_id,
                    "prod_img" => $img[0]
                );

                if ($value->prod_var1 != "0"){
                    $prod_var1 = $this->buyer_model->get_variation($value->prod_var1);
                    $prod_price = $this->buyer_model->get_variation_price($value->prod_var1);
                }else{
                    $prod_var1 = "";
                    $prod_price = $prod_price;
                }

                if ($value->prod_var2 != "0"){
                    $prod_var2 = $this->buyer_model->get_variation($value->prod_var2);
                }else{
                    $prod_var2 = "";
                }
                
                $prod_array[$key] = array(
                    "item_id" => $value->item_id,
                    "account_id" => $value->account_id,
                    "prod_id" => $value->prod_id,
                    "product_name" => $value->product_name,
                    "prod_var1" => $prod_var1,
                    "prod_var2" => $prod_var2,
                    "product_unit_price" => $prod_price,
                    "product_weight" => $value->product_weight
                );

            }
        }
        
        $data['result'] = $prod_array;
        $data['prod_img'] = $product;
		$data['cust_del_date'] = $this->buyer_model->cust_del_date($account_id);
		$data['delivery_type'] = $this->buyer_model->delivery_type($account_id);
		$data['payment_type'] = $this->buyer_model->payment_type($account_id);
        $data['sched_time'] = $this->buyer_model->get_sched_time($account_id);
        $data['std_delivery'] = $this->buyer_model->get_std_delivery($account_id);
		$data['token'] = $this->security->get_csrf_hash();
		$data['seller_id'] = $account_id;

        echo json_encode($data);

	}

	public function confirm_order(){
		$order_no = $this->buyer_model->insert_order();

		$prod_id = $this->input->post("prod_id");
		$order  = $this->input->post("data");
		$order['order_no'] = $order_no['order_no'];
		$order['date_insert'] = date("Y-m-d H:i:s");

		// foreach ($prod_id as $row) {
		// 	var_dump($row['prod_id']);
		// }

		if ($this->input->post("save_info") == "1"){
			$data['result_profile']  = $this->buyer_model->update_account($this->input->post("data_profile"));
		}

		$data['result'] = $this->buyer_model->confirm_order($order, $order_no['id']);
		$data['result2'] = $this->buyer_model->insert_order_no_product($prod_id, $order_no['id']);
		$data['result3'] = $this->buyer_model->get_count_order();

		// $data['order_no'] = "1";
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function delete_item(){
		$id = $this->input->post("id");

		$data['result'] = $this->buyer_model->delete_item($id);
		$data['token'] = $this->security->get_csrf_hash();

		echo json_encode($data);
	}

	public function get_ongoing_orders(){
        $result = $this->buyer_model->get_ongoing_orders();
        $output = tbl_ongoing_orders($result);
        $data['result'] = $output['output'];
        $data['pending'] = $output['pending'];
        $data['acknowledge'] = $output['acknowledge'];
        $data['proof'] = $output['proof'];
        $data['confirm'] = $output['confirm'];
        $data['denied'] = $output['denied'];
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_complete_orders(){
		$result = $this->buyer_model->get_complete_orders();
		$data['result'] = tbl_complete_orders($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_transactions_orders(){
		$result = $this->buyer_model->get_transactions_orders();
		$data['result'] = tbl_transctions_orders($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function complete_order(){
		$id = $this->input->post("id");
		$data['result'] = $this->buyer_model->complete_order($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function view_order(){
		$id = $this->input->post("id");
		$data['result'] = $this->buyer_model->get_order_hdr($id);
		$data['products'] = $this->buyer_model->get_order_products($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
 	}


 	/* My Account */

 	public function get_account(){
 		$data['data'] = $this->buyer_model->get_account();
 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}

    public function check_pass(){
        $user_pass = $this->input->post("user_pass");
        $data['result'] = $this->buyer_model->check_pass($user_pass);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

 	public function update_account(){
 		$data = array(
 				"first_name" => $this->input->post("user_fname"),
 				"middle_name" => $this->input->post("user_mname"),
 				"last_name" => $this->input->post("user_lname"),
 				"mobile_no" => $this->input->post("user_mobile"),
 				"email" => $this->input->post("user_email"),
 				"address" => $this->input->post("user_address"),
 				"barangay" => $this->input->post("user_barangay"),
 				"city" => $this->input->post("user_city"),
 				"province" => $this->input->post("user_province"),
 				"date_update" => date("Y-m-d H:i:s")
		);

 		$data_user = array();

 		if (!empty($this->input->post("user_new_pass"))){
 			$data_user = array(
 				"first_name" => $this->input->post("user_fname"),
 				"middle_name" => $this->input->post("user_mname"),
 				"last_name" => $this->input->post("user_lname"),
 				"username" => $this->input->post("username"),
 				"email" => $this->input->post("user_email"),
 				"password" => password_hash($this->input->post("user_new_pass"), PASSWORD_DEFAULT)
 				);
 		}else{	
 			$data_user = array(
 				"first_name" => $this->input->post("user_fname"),
 				"middle_name" => $this->input->post("user_mname"),
 				"last_name" => $this->input->post("user_lname"),
 				"username" => $this->input->post("username"),
 				"email" => $this->input->post("user_email")
 				);
 		}

 		$this->session->set_userdata("user_uname", $this->session->userdata("user_uname"));
 		$data['result'] = $this->buyer_model->update_account($data);
 		$data['result_user'] = $this->buyer_model->update_user($data_user);
 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}

     // reviews

    public function save_review(){
        $review = array(
            "comp_id" => $this->input->post("seller_id"),
            "user_id" => $this->session->userdata("user_id"),
            "rating" => $this->input->post("rating"),
            "review" => $this->input->post("review"),
            "date_insert" => date("Y-m-d H:i:s")
        );

        $data['result'] = $this->buyer_model->insert_review($review);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    //proof of payment

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


            $serialized = serialize($files_upload);         
            $data = array('img_location' => $serialized, "order_id" => $this->input->post("id", TRUE), "message" => $this->input->post('message', TRUE), "date_insert" => date("Y-m-d H:i:s")); 
            $result = $this->buyer_model->save_proof($data, $this->input->post("id", TRUE));


        }

        $this->output->set_content_type('application/json');
		echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));

    }

}
