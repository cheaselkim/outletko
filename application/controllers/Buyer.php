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
		$data['result'] = $this->buyer_model->courier($this->input->post("id"), $this->input->post("total_weight"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_courier(){
		$data['result'] = $this->buyer_model->get_courier($this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_orders(){

		$query = $this->buyer_model->get_orders();
		$data['result'] = tbl_products_no_order($query);
		$data['token'] = $this->security->get_csrf_hash();

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
 		}

 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}

	public function get_order_checkout(){
		$prod_id = $this->input->post("prod_id");

		$data['result'] = $this->buyer_model->get_order_checkout($prod_id);
		$product = array();

		foreach ($data['result'] as $key => $value) {
			$product[$key] = array(
				"prod_id" => $value->prod_id,
				"prod_img" => unserialize($value->img_location)
			);
		}

		$data['prod_img'] = $product;
		$data['cust_del_date'] = $this->buyer_model->cust_del_date($data['result'][0]->account_id);
		$data['delivery_type'] = $this->buyer_model->delivery_type($data['result'][0]->account_id);
		$data['payment_type'] = $this->buyer_model->payment_type($data['result'][0]->account_id);
		$data['sched_time'] = $this->buyer_model->get_sched_time($data['result'][0]->account_id);
		$data['token'] = $this->security->get_csrf_hash();
		$data['seller_id'] = $data['result'][0]->account_id;

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
		$data['result'] = tbl_ongoing_orders($result);
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
 				"username" => $this->input->post("user_uname"),
 				"email" => $this->input->post("user_email"),
 				"password" => password_hash($this->input->post("user_new_pass"), PASSWORD_DEFAULT)
 				);
 		}else{	
 			$data_user = array(
 				"first_name" => $this->input->post("user_fname"),
 				"middle_name" => $this->input->post("user_mname"),
 				"last_name" => $this->input->post("user_lname"),
 				"username" => $this->input->post("user_uname"),
 				"email" => $this->input->post("user_email")
 				);
 		}

 		$this->session->set_userdata("user_uname", $this->session->userdata("user_uname"));
 		$data['result'] = $this->buyer_model->update_account($data);
 		$data['result_user'] = $this->buyer_model->update_user($data_user);
 		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
 	}


}
