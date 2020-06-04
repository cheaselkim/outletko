<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko_profile extends CI_Controller {

	public function __construct(){
	    parent::__construct();
            $this->load->model("activity_model");
	      	$this->load->model("outletko_profile_model");
	      	$this->load->helper("outlet");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}

		/* 
			Note for function 
			1 = Insert
			2 = Edit / Update
			3 = Delete / Cancel
			4 = Query
	
			model function for history is already autoload;
			$this->activity_model->insert_activity($module, $submodule, $function);
			(if module has no submodule, submodule automatically 0);
		 */
	}

    public function check_subscription(){
        if ($this->session->userdata("check_subscription") == "1"){
            $check_subs = "0";
        }else{
            $this->session->set_userdata("check_subscription", "1");
            $check_subs = "1";
        }
        
        $result = $this->outletko_profile_model->check_subscription();
        $renewal_date = "";
        $status = "";
        $now_date = "";
        $end_date = "";

        if (!empty($result)){
            foreach ($result as $key => $value) {
                $renew_date = $value->renewal_date;
                $renewal_date = date("m/d/Y", strtotime($value->renewal_date));
                $now_date = strtotime(date("Y-m-d"));
                $end_date = strtotime($value->renewal_date);
            }
        }

        $datediff = $end_date - $now_date;
        $datediff = round($datediff / (60 * 60 * 24));


        if ($renew_date == "0000-00-00"){
            $status = "2";
        }else{
            if ($datediff <= 30){
                $status = "1";
            }else{
                $status = "0";
            }    
        }

        if ($check_subs == "1"){
            $data['now_date'] = $now_date;
            $data['end_date'] = $end_date;
            $data['datediff'] = $datediff;
            $data['date'] = $renewal_date;            
            $data['result'] = $status;
        }else{
            $data['result'] = "0";
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function business_type(){
        $data['data'] = $this->outletko_profile_model->business_type();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function payment_type(){
        $data['data'] = $this->outletko_profile_model->payment_type();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);            
    }

    public function delivery_type(){
        $data['data'] = $this->outletko_profile_model->delivery_type();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }
    
    public function variations(){
        // $data['var_type'] = $this->outletko_profile_model->variation_type();
        $prod_id = $this->input->post("prod_id");
        $result = $this->outletko_profile_model->variation_type($prod_id);
        $prod = array();
        if (!empty($result)){
            foreach ($result as $key => $value) {
                $prod[$key] = array(
                    "id" => $value->id,
                    "comp_id" => $value->comp_id,
                    "variation_id" => $value->variation_id,
                    "type" => $value->type,
                    "qty" => $value->qty,
                    "unit_price" => $value->unit_price,
                    "img_location" => unserialize($value->img_location)
                );
            }
        }

        $data['data'] = $this->outletko_profile_model->variations($prod_id);
        $data['var_type'] = $prod;        
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_del_type(){
        $data['data'] = $this->outletko_profile_model->get_del_type();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function bank_list(){
        $data['data'] = $this->outletko_profile_model->bank_list();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function remittance_list(){
        $data['data'] = $this->outletko_profile_model->remittance_list();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function search_city(){

        $city = $this->input->post("city", TRUE);
		$data = array();
		$data['response'] = "false";

		$result = $this->outletko_profile_model->search_city($city);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => ($value->city_desc.", ".$value->province_desc), "province" => $value->province_desc, "prov_id" => $value->prov_id, "city_id" => $value->city_id, "island_group" => $value->island_group);
			}
		}

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function check_product_online(){
    	$id = $this->session->userdata("account_id");
        $result = $this->outletko_profile_model->get_profile_dtl($id);
        $ol_products = $this->outletko_profile_model->get_ol_products();

        foreach ($result as $key => $value) {
            $data['account_pro'] = $value->account_pro;
        }

        $data['ol_products_rows'] = $ol_products->num_rows();
        $data['ol_products'] = $ol_products->result();
    	$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function check_curr_password(){
        $password = $this->input->post("password");
        $data['result'] = $this->outletko_profile_model->check_curr_password($password);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function get_profile_dtl(){
    	$id = $this->session->userdata("account_id");
    	$result = $this->outletko_profile_model->get_products($id);
        $ol_products = $this->outletko_profile_model->get_ol_products();
    	$data['result'] = $this->outletko_profile_model->get_profile_dtl($id);
    	$data['prod_cat'] = $this->outletko_profile_model->get_product_category($id);
    	$data['token'] = $this->security->get_csrf_hash();
        $data['payment_type'] = $this->outletko_profile_model->get_payment_type();
        $data['delivery_type'] = $this->outletko_profile_model->get_delivery_type();
        $data['shipping_fee'] = $this->outletko_profile_model->get_shipping_fee();
        $data['appointment'] = $this->outletko_profile_model->get_appointment();
        $data['prod_category'] = $this->outletko_profile_model->get_prod_category();
        $data['warranty'] = $this->outletko_profile_model->get_warranty();
        $data['courier'] = $this->outletko_profile_model->get_courier();
        $data['bank_list'] = $this->outletko_profile_model->get_bank_list();
        $data['remittance_list'] = $this->outletko_profile_model->get_remittance_list();
        $data['area_coverage'] = $this->outletko_profile_model->get_coverage_area();
        $data['ol_products_rows'] = $ol_products->num_rows();
        $data['ol_products'] = $ol_products->result();
        $data['product_rows'] = $this->outletko_profile_model->get_product_count();
        $store_img = $this->outletko_profile_model->get_store_img();
        $data['products']="";

        
        foreach ($data['result'] as $key => $value) {
            $data['profile'] = unserialize($value->loc_image);
            $data['store_assoc'] = $this->outletko_profile_model->get_store_assoc($value->store_assoc);
        }

        foreach ($store_img as $key => $value) {
            $data['store_img'][$key] = array(
                "img_order" => $value->img_order,
                "image" => unserialize($value->loc_image)
            );
        }

        if (empty($data['store_img'])){
            $data['store_img'] = "";
        }

        // foreach($result as $row){
        //     $unserialized_files = unserialize($row->img_location); 
        //     $data['products'][] = array(
        //         'product_name' => $row->product_name,
        //         "product_description" => $row->product_description,
        //         "img_location" => $unserialized_files,
        //         "id" => $row->id);
        // }
        $products = array();
        $min_price = "";
        $max_price = "";
        foreach ($result as $key => $value) {
            $unserialized_files = unserialize($value->img_location); 
            $variation_price = $this->outletko_profile_model->get_variation_price($value->id);

            if (!empty($variation_price)){
                foreach ($variation_price as $key2 => $value2) {
                    $min_price = $value2->min_unit_price;
                    $max_price = $value2->max_unit_price;
                }
            }

            $products[$key] = array(
                'product_name' => $value->product_name,
                "product_description" => $value->product_description,
                "product_unit_price" => $value->product_unit_price,
                "min_price" => $min_price,
                "max_price" => $max_price,
                "img_location" => $unserialized_files,
                "id" => $value->id);
        }

        $data['products'] = $products;

		echo json_encode($data);
    }

	
	public function get_product_info(){
	    $id = $this->input->post('id', TRUE);
        $result = $this->outletko_profile_model->get_product_info($id);
        $prod_img = "";
        $min_price = "";
        $max_price = "";
		foreach($result as $row){
            $unserialized_files = unserialize($row->img_location); 

            if ($unserialized_files != ""){
                for ($i=0; $i < COUNT($unserialized_files); $i++) { 
                    if ($unserialized_files[$i] != false){
                        $data['prod_img'][$i] = array("img" => $unserialized_files[$i]);
                    }
                }    
            }else{
                $data['prod_img'] = "";
            }

            $variation_price = $this->outletko_profile_model->get_variation_price($id);

            if (!empty($variation_price)){
                foreach ($variation_price as $key => $value) {
                    $min_price = $value->min_unit_price;
                    $max_price = $value->max_unit_price;
                }
            }

            $data['products'][] = array(
                'product_name' => $row->product_name,
                "product_description" => $row->product_description,
                "product_online" => $row->product_online,
                "product_unit_price" => $row->product_unit_price,
                "min_price" => $min_price,
                "max_price" => $max_price,
                "product_category" => $row->product_category,
                "product_condition" => $row->product_condition,
                "product_stock" => $row->product_stock,
                "product_weight" => $row->product_weight,
                "product_delivery" => $row->product_delivery,
                "product_del_opt" => $row->product_del_opt,
                "product_return" => $row->product_return,
                "product_warranty" => $row->product_warranty,
                "product_std_delivery" => $row->product_std_delivery,
                "ship_fee_w_mm" => $row->ship_fee_w_mm,
                "ship_fee_o_mm" => $row->ship_fee_o_mm,
                "img_location" => $unserialized_files,
                "id" => $row->id);
        }
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function search_field() {
        $result = $this->outletko_profile_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'city_desc' => $row->city_desc,
                'province_desc' => $row->province_desc,
                'province_id' => $row->province_id,
                'city_id' => $row->id,
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }

    public function check_linkname(){
        $link_name = $this->input->post("link_name");
        $data['result'] = $this->outletko_profile_model->check_linkname($link_name);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    //SAVING
    public function save_setting(){
        $result_username = "";
        $result_password = "";

        $username = $this->input->post("username");
        $password = $this->input->post("curr_pass");
        $new_password = $this->input->post("new_pass");

        if (!empty($password)){
            $result_curr_password = $this->outletko_profile_model->check_curr_password($password);
        }else{
            $result_curr_password = 0;
        }

        if ($username != $this->session->userdata('user_uname')){
            $result_username = $this->outletko_profile_model->save_username($username); 
        }

        if ($result_curr_password == 0){
            $result_password = $this->outletko_profile_model->save_password($new_password);
        }

        $data['token'] = $this->security->get_csrf_hash();
        $data['password'] = $result_curr_password;
        $data['result_username'] = $result_username;
        $data['result_password'] = $result_password;
        echo json_encode($data);
    }

    public function update_aboutus(){

        $data = array(
            "account_name" => $this->input->post("business_name"),
            "link_name" => $this->input->post("link_name"),
            "about_us" => $this->input->post("aboutus"),
            "business_category" => $this->input->post("business_category"),
            "street" => $this->input->post("bldg"),
            "village" => $this->input->post("subdivison"),
            "barangay" => $this->input->post("barangay"),
            "city" => $this->input->post("city"),
            "province" => $this->input->post("province"),
            "email" => $this->input->post("email"),
            "mobile_no" => $this->input->post("mobile"),
            "telephone_no" => $this->input->post("telephone"),
            "website" => $this->input->post("website"),
            "facebook" => $this->input->post("facebook"),
            "twitter" => $this->input->post("twitter"),
            "instagram" => $this->input->post("instagram"),
            "shoppee" => $this->input->post("shoppee"),
            "bg_color" => $this->input->post("bgcolor")
        );

        $eoutletsuite_data = array(
            "account_name" => $this->input->post("business_name"),
            "business_type" => $this->input->post("business_category")
        );

        if (!empty($this->input->post("store_assoc"))){
            $store_data = $this->outletko_profile_model->update_store_assoc($this->input->post("store_assoc"));
        }

        $query = $this->outletko_profile_model->update_aboutus($data);
        $eoutletsuite_query = $this->outletko_profile_model->update_eoutletsuite($eoutletsuite_data);
        echo json_encode(array("status" => $query, "token" => $this->security->get_csrf_hash()));
    }

    public function save_payment(){
        $payment_type = $this->input->post("payment_type");
        $delivery_type = $this->input->post("delivery_type");
        $std_del = $this->input->post("std_del");
        $ship_w_mm = $this->input->post("ship_w_mm");
        $ship_o_mm = $this->input->post("ship_o_mm");
        $appointment = $this->input->post("appointment");
        $return = $this->input->post("inp_return");
        $warranty = $this->input->post("inp_warranty");
        $cust_del_date = $this->input->post("cust_del_date");
        $shipping_fee = $this->input->post("shipping_fee");
        $remitt_contact_no = $this->input->post("remitt_contact_no");
        $remitt_acct_name = $this->input->post("remitt_acct_name");
        $cov_area = $this->input->post("cov_area");

        $data = array(
                "std_delivery" => $std_del,
                "sf_w_mm" => $ship_w_mm,
                "sf_o_mm" => $ship_o_mm
            );

        $account_data = array(
            "remitt_name" => $remitt_acct_name,
            "remitt_contact" => $remitt_contact_no
        );

        $result_account = $this->outletko_profile_model->update_aboutus($account_data);            
        $result_payment = $this->outletko_profile_model->save_payment_type($payment_type);
        $result_delivery = $this->outletko_profile_model->save_delivery_type($delivery_type);
        $result_ship = $this->outletko_profile_model->save_ship($data);
        $result_appointment = $this->outletko_profile_model->save_appointment($appointment);
        $result_warranty = $this->outletko_profile_model->save_warranty($warranty, $return);
        $result_cust_del_date = $this->outletko_profile_model->save_cust_del_date($cust_del_date, $shipping_fee);
        $result_cov_area = $this->outletko_profile_model->save_cov_area($cov_area);

        echo json_encode(1);
    }

    public function update_profile() {
		$account_id = $this->input->post('account_id', TRUE);
        $account_hdr = $this->input->post('account_hdr', TRUE);
        $query = $this->outletko_profile_model->update_profile($account_hdr,$account_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }
    
    public function update_category() {
		$account_id = $this->input->post('account_id', TRUE);
        $hdr = $this->input->post('bus_category', TRUE);
        $query = $this->outletko_profile_model->update_category($hdr,$account_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }
    
    public function update_contact() {
		$account_id = $this->input->post('account_id', TRUE);
        $contact = $this->input->post('contact', TRUE);
        $query = $this->outletko_profile_model->update_contact($contact,$account_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }
    
    public function update_prod_cat() {
		$account_id = $this->input->post('account_id', TRUE);
        $sub_dtl = $this->input->post('sub_dtl', TRUE);
        $query = $this->outletko_profile_model->update_prod_cat($sub_dtl,$account_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }
    
    public function save_product() {
		$account_id = $this->input->post('account_id', TRUE);
		$action = $this->input->post('action', TRUE);
        $product = $this->input->post('product', TRUE);
        $prod_id = $this->input->post('prod_id', TRUE);
        $product['account_id'] = $account_id;
        
        if($prod_id == ""){
            $product['date_insert'] = date("Y-m-d h:i:sa");
            $product['account_id'] = $this->session->userdata("comp_id");
            $product['comp_id'] = $this->session->userdata("comp_id");
            $id = $this->outletko_profile_model->save_product($product);
        }else{
            $product['date_update'] = date("Y-m-d h:i:sa");
            $product['account_id'] = $this->session->userdata("comp_id");
            $product['comp_id'] = $this->session->userdata("comp_id");
            $id = $this->outletko_profile_model->update_product($product);
        }
        
        // if($query == true){
        //     $status = "success";
        // }else{
        //     $status = "failed";
        // }
        $this->output->set_content_type('application/json');
        echo json_encode(array('id' => $id, 'token' => $this->security->get_csrf_hash()));       
    }

    public function delete_product(){
        $id = $this->input->post("id");
        $data['result'] = $this->outletko_profile_model->delete_product($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }
    
    public function save_variation(){
        $prod_id = $this->input->post("prod_id");
        $id = $this->input->post("id");
        $variation = $this->input->post("variation");
        $var_class = $this->input->post("var_class");

        $data['id'] = $this->outletko_profile_model->save_prod_var($prod_id, $var_class, $variation, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function del_variation(){
        $id = $this->input->post("id");
        $data['result'] = $this->outletko_profile_model->del_variation($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_variation_type(){
        $id = $this->input->post("id");
        $variation = $this->input->post("variation");
        $variation_type = $this->input->post("variation_type");
        $variation_qty = $this->input->post("variation_qty");
        $variation_price = $this->input->post("variation_price");

        $data['result'] = $this->outletko_profile_model->save_variation_type($variation, $variation_type, $variation_qty, $variation_price, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function del_variation_type(){
        $id = $this->input->post("id");
        $data['result'] = $this->outletko_profile_model->del_variation_type($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_prod_variation(){

        $prod_id = $this->input->post("prod_id");
        
        $var_name_1 = $this->input->post("var_name_1");
        $var_name_2 = $this->input->post("var_name_2");

        $var_type_1 = $this->input->post("var_type_1");
        $var_type_2 = $this->input->post("var_type_2");

        $insert_prod_var = $this->outletko_profile_model->insert_prod_var($prod_id, $var_name_1);
        $insert_prod_var_type = $this->outletko_profile_model->insert_prod_var_type($insert_prod_var, $var_type_1);

        if (!empty($var_type_2)){
            $insert_prod_var = $this->outletko_profile_model->insert_prod_var($prod_id, $var_name_2);
            $insert_prod_var_type = $this->outletko_profile_model->insert_prod_var_type($insert_prod_var, $var_type_2);            
        }

        $data['token'] = $this->security->get_csrf_hash();
        $data['result'] = $insert_prod_var_type;

        echo json_encode($data);
    }

    

    public function account_post(){
        $post = $this->input->post("data", TRUE);
        $data['result'] = $this->outletko_profile_model->account_post($post);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function prod_category(){
        $category = $this->input->post("category");
        $id = $this->input->post("id");
        $data['result'] = $this->outletko_profile_model->prod_category($category, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function delete_prod_category(){
        $id = $this->input->post("id");
        $data['result'] = $this->outletko_profile_model->delete_prod_category($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function search_courier(){

        $courier = $this->input->post("courier", TRUE);
		$data = array();
		$data['response'] = "false";

        $result = $this->outletko_profile_model->search_courier($courier);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => $value->courier, "id" => $value->id);
			}
		}

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }


    public function save_ship_fee(){

        $data = array(
            "comp_id" => $this->session->userdata('comp_id'),
            "courier_id" => $this->input->post("ship_courier"),
            "ship_kg" => $this->input->post("ship_kg"),
            "sf_mm" => $this->input->post("ship_mm"),
            "sf_luz" => $this->input->post("ship_luz"),
            "sf_vis" => $this->input->post("ship_vis"),
            "sf_min" => $this->input->post("ship_min")
        );

        $id = $this->input->post("ship_id");

        $data['result'] = $this->outletko_profile_model->save_ship_fee($data, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function delete_ship(){
        $data['result'] = $this->outletko_profile_model->delete_ship($this->input->post("id"));
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_bank(){
        $id = $this->input->post("bank_id");

        $array = array(
            "comp_id" => $this->session->userdata("comp_id"),
            "bank_id" => $this->input->post("bank_name"),
            "account_name" => $this->input->post("account_name"),
            "account_no" => $this->input->post("account_no"),
            "status" => $this->input->post("status")
            );

        $data['result'] = $this->outletko_profile_model->save_bank($array, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function delete_bank(){
        $id = $this->input->post("id");
        $data['result'] = $this->outletko_profile_model->delete_bank($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_remittance(){
        $array = $this->input->post("array");
        $data['result'] = $this->outletko_profile_model->save_remittance($array);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    //Upload Image

    public function upload_image_file() {

		$files_upload = array();

		$db = $this->load->database('default', TRUE);

		$upload_path = './images/products/'; 
        $counts = count($_FILES["files"]["name"]);
        
        // var_dump($counts);

        if (!empty($_FILES['files']['name'])){

            for($x = 0; $x < $counts; $x++) { 
                $files_tmp = $_FILES['files']['tmp_name'][$x];
                $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
                $randname = "file_".rand(1000,1000000) . "." . $files_ext;

                move_uploaded_file($files_tmp,$upload_path.$randname);
                $files_upload[] = $randname;
                $file_name = $randname;

                $config['upload_path'] = './images/products/'; 
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './images/products/'.$file_name;  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = TRUE;  
                $config['quality'] = '60%';  
                $config['width'] = 200;  
                $config['height'] = 200;  
                $config['new_image'] = './images/products/'.$file_name;  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();                         
    
            }


            $serialized = serialize($files_upload);         
            $data = array('img_location' => $serialized); 
            $result = $this->outletko_profile_model->upload_image_file($data, $this->input->post("id", TRUE));


        }

        $this->output->set_content_type('application/json');
		echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));					
	}
	
	public function update_img_file() {
        $files_upload = array();
        $array_curr = array();
        $set = '';

        $db = $this->load->database('default', TRUE);
        $upload_path = './images/products/'; 

        $counts = count($_FILES["files"]["name"]);
        $counts_curr = count($this->input->post('curr_img'));

        $array_curr = $this->input->post('curr_img'); 
        // var_dump($array_curr);

        for($x = 0; $x <$counts; $x++) { 
 
            $files_tmp = $_FILES['files']['tmp_name'][$x];
            $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));

            $randname = "file_".$this->session->userdata("comp_id")."_".rand(1000,1000000) . "." . $files_ext;

            move_uploaded_file($files_tmp,$upload_path.$randname);
            $files_upload[] = $randname;
            $file_name = $randname;
            $set = 'true';

            $config['upload_path'] = './images/products/'; 
            $config['image_library'] = 'gd2';  
            $config['source_image'] = './images/products/'.$file_name;  
            $config['create_thumb'] = FALSE;  
            $config['maintain_ratio'] = TRUE;  
            $config['quality'] = '60%';  
            $config['width'] = 200;  
            $config['height'] = 200;  
            $config['new_image'] = './images/products/'.$file_name;  
            $this->load->library('image_lib', $config);  
            $this->image_lib->resize();                         

        }

        // if($set == 'true') {
        //     for($y = 0; $y < $counts_curr; $y++) {
        //         unlink($upload_path.$array_curr[$y]);
        //     }
        // }else{}

        $serialized = serialize($files_upload); 
        
        $data = array('img_location' => $serialized); 
        $result = $this->outletko_profile_model->upload_image_file($data, $this->input->post("id", TRUE));
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash())); 
    }

    public function upload_profile_image() {

        $files_upload = array();

        $db = $this->load->database('outletko', TRUE);

        $upload_path = './images/profile/'; 
        $counts = count($_FILES["files"]["name"]);

        for($x = 0; $x < $counts; $x++) { 
            $files_tmp = $_FILES['files']['tmp_name'][$x];
            $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
            $randname = "file_".$this->session->userdata("comp_id")."_".rand(1000,1000000) . "." . $files_ext;

            move_uploaded_file($files_tmp,$upload_path.$randname);
            $files_upload[] = $randname;
            $file_name = $randname;

            $config['upload_path'] = './images/profile/'; 
            $config['image_library'] = 'gd2';  
            $config['source_image'] = './images/profile/'.$file_name;  
            $config['create_thumb'] = FALSE;  
            $config['maintain_ratio'] = FALSE;  
            $config['quality'] = '60%';  
            $config['width'] = 200;  
            $config['height'] = 200;  
            $config['new_image'] = './images/profile/'.$file_name;  
            $this->load->library('image_lib', $config);  
            $this->image_lib->resize();                         

            
        }
        $serialized = serialize($files_upload);         
        $data = array('loc_image' => $serialized); 
        $result = $this->outletko_profile_model->upload_profile_image($data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));                  
    }

    public function upload_store_image() {

        $files_upload = array();

        $db = $this->load->database('outletko', TRUE);

        $upload_path = './images/store/'; 
        $counts = count($_FILES["files"]["name"]);

        for($x = 0; $x < $counts; $x++) { 
            $files_tmp = $_FILES['files']['tmp_name'][$x];
            $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
            $randname = "file_".$this->session->userdata("comp_id")."_".rand(1000,1000000) . "." . $files_ext;

            move_uploaded_file($files_tmp,$upload_path.$randname);
            $files_upload[] = $randname;
            $file_name = $randname;

            $config['upload_path'] = './images/store/'; 
            $config['image_library'] = 'gd2';  
            $config['source_image'] = './images/store/'.$file_name;  
            $config['create_thumb'] = FALSE;  
            $config['maintain_ratio'] = FALSE;  
            $config['quality'] = '60%';  
            $config['width'] = 200;  
            $config['height'] = 200;  
            $config['new_image'] = './images/store/'.$file_name;  
            $this->load->library('image_lib', $config);  
            $this->image_lib->resize();                         

        }
        $serialized = serialize($files_upload);         
        $data = array("comp_id" => $this->session->userdata('comp_id'), 'loc_image' => $serialized, "img_order" => $this->input->post("store_order")); 
        $result = $this->outletko_profile_model->upload_store_image($data, $this->input->post("store_order"));
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));                  
    }

    public function upload_variation_image() {

		$files_upload = array();

		$db = $this->load->database('default', TRUE);

		$upload_path = './images/products/'; 
		$counts = count($_FILES["files"]["name"]);

        if (!empty($_FILES['files']['name'])){

            for($x = 0; $x < $counts; $x++) { 
                $files_tmp = $_FILES['files']['tmp_name'][$x];
                $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
                $randname = "file_".rand(1000,1000000) . "." . $files_ext;

                move_uploaded_file($files_tmp,$upload_path.$randname);
                $files_upload[] = $randname;
                $file_name = $randname;

                $config['upload_path'] = './images/products/'; 
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './images/products/'.$file_name;  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = FALSE;  
                $config['quality'] = '70%';  
                $config['width'] = 300;  
                $config['height'] = 300;  
                $config['new_image'] = './images/products/'.$file_name;  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();                         
    
            }


            $serialized = serialize($files_upload);         
            $data = array('img_location' => $serialized); 
            $result = $this->outletko_profile_model->upload_variation_image($data, $this->input->post("id", TRUE));


        }

        $this->output->set_content_type('application/json');
		echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));					
	}


}
