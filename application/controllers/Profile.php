<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
	    parent::__construct();
        $this->load->model("profile_model");
        $this->load->helper("profile");
    }

    public function check_session(){
        $data['result'] = $this->login_model->check_session();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function my_order(){
        $result = $this->login_model->check_session();

        if ($result == true){
            $menu = 2;
            $data['user_type'] = $this->session->userdata("user_type");
        }else{    
            $menu = 2;
            $data['user_type'] = "6";
        }


        $data['function'] = 0;
        $data['sub_module'] = 0;
        $data['menu_module'] = 0;
        $data['account_id'] = 0;
        $data['owner'] = 0;
        $data['edit'] = 0;
        $data['width'] = 1366;

        $this->template->load($menu, $data);	


    }

	public function profile(){

    	$id = $this->input->post("id");
    	$acc_id = $id;
    	// $acc_id = $this->profile_model->get_account_id($id);
    	$data['result'] = $this->profile_model->get_profile_dtl($acc_id);
        $data['prod_cat'] = $this->profile_model->get_product_category($acc_id);
    	$result = $this->profile_model->get_products($acc_id);
        $store_img = $this->profile_model->get_store_img($acc_id);
        $review = $this->profile_model->get_reviews($id);
        $data['ave_review'] = $this->profile_model->get_ave_review($id);
        // $data['payment_type'] = $this->profile_model->get_payment_type();
        // $data['delivery_type'] = $this->profile_model->get_delivery_type();
        // $data['shipping_fee'] = $this->profile_model->get_shipping_fee();
        $data['review'] = reviews($review);
        $data['products']="";
        $min_price = "";
        $max_price = "";    
        foreach ($data['result'] as $key => $value) {
            $data['profile'] = unserialize($value->loc_image);
        }

        $products = array();
        foreach ($result as $key => $value) {
            $unserialized_files = unserialize($value->img_location); 
            // var_dump($unserialized_files);
            if ($unserialized_files != false){
                $file = $unserialized_files[0];
            }else{
                $file = "";
            }

            $max_discount = 0;
            $min_discount = 0;
            $max_percent = 0;
            $min_percent = 0;

            $variation_price = $this->profile_model->get_variation_price($value->id);
            $discount_price = $this->profile_model->get_discount_price($value->id);

            if (!empty($variation_price)){
                foreach ($variation_price as $key2 => $value2) {
                    $min_price = $value2->min_unit_price;
                    $max_price = $value2->max_unit_price;
                }
            }

            if (!empty($discount_price)){
                foreach ($discount_price as $key3 => $value3) {
                    $max_discount = $value3->max_discount;
                    $min_discount = $value3->min_discount;
                    $max_percent = $value3->max_percent;
                    $min_percent = $value3->min_percent;
                }
            }


            $products[$key] = array(
                "product_name" => $value->product_name,
                "product_description" => $value->product_description,
                "product_unit_price" => $value->product_unit_price,
                "min_price" => $min_price,
                "max_price" => $max_price,
                "max_discount" => (int)$max_discount,
                "min_discount" => (int)$min_discount,
                "max_percent" => (int)$max_percent,
                "min_percent" => (int)$min_percent,
                "img_location" => $file,
                "avail" => $value->product_available,
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
        // $id = 63;
	    $id = $this->input->post('id', TRUE);
        $result = $this->profile_model->get_product_info($id);
        $variation_price = $this->profile_model->get_variation_price($id);
        // var_dump($result);
        $data['prod_var_type'] = "";
        $data['prod_img'] = "";

        $prod_var_arr = array();
        $prod_img = array();
        $prod_img1 = array();
        $mm = "";
        $luz = array();
        $vis = array();
        $min = array();

        $cov_mm = "";
        $cov_luz = "";
        $cov_vis = "";
        $cov_min = "";

        $account_id = "";

        $var_luz = "";
        $var_vis = "";
        $var_min = "";


        foreach($result as $row){
            $unserialized_files = unserialize($row->img_location); 
            $data['img'] = img_display($unserialized_files);

            // if ($unserialized_files != false){
            //     $file = $unserialized_files[0];
            // }else{
            //     $file = "";
            // }

            $max_discount = "";
            $min_discount = "";
            $max_percent = "";
            $min_percent = "";

            if (!empty($variation_price)){
                foreach ($variation_price as $key2 => $value2) {
                    $min_price = $value2->min_unit_price;
                    $max_price = $value2->max_unit_price;
                }
            }


            for ($i=0; $i < COUNT($unserialized_files); $i++) { 
                if ($unserialized_files[$i] != false){
                    $prod_img1[$i] = array("img" => $unserialized_files[$i]);
                }
            }
            $data['payment_type'] = $this->profile_model->get_payment_type($row->account_id);
            $data['prod_var'] = $this->profile_model->get_prod_var($row->id);
            $prod_var_type = $this->profile_model->get_prod_var_type($row->id);
            $coverage_area = $this->profile_model->get_coverage_area($row->account_id);
            $delivery_area = $this->profile_model->get_delivery_area($row->account_id);
            $discount_price = $this->profile_model->get_discount_price($row->id);

            if (!empty($discount_price)){
                foreach ($discount_price as $key => $value3) {
                    $max_discount = $value3->max_discount;
                    $min_discount = $value3->min_discount;
                    $max_percent = $value3->max_percent;
                    $min_percent = $value3->min_percent;
                }
            }

            $account_id = $row->account_id;

            $data['products'][] = array(
                'product_name' => $row->product_name,
                "product_description" => $row->product_description,
                "product_other_details" => $row->product_other_details,
                "product_online" => $row->product_online,
                "product_available" => $row->product_available,
                "product_unit_price" => $row->product_unit_price,
                "min_price" => $min_price,
                "max_price" => $max_price,
                "max_discount" => (int)$max_discount,
                "min_discount" => (int)$min_discount,
                "max_percent" => (int)$max_percent,
                "min_percent" => (int)$min_percent,
                "product_category" => $row->product_category,
                "product_condition" => $row->product_condition,
                "product_stock" => $row->product_stock,
                "product_weight" => $row->product_weight,
                "product_delivery" => $row->product_delivery,
                "delivery_type" => $row->delivery_type,
                "product_del_opt" => $row->coverage,
                "product_std_delivery" => $row->product_std_delivery,
                "product_return" => ($row->product_return != "" ? $row->product_return : $this->profile_model->get_product_return($row->account_id)),
                "product_warranty" => ($row->product_warranty != "" ? $row->product_warranty : $this->profile_model->get_product_warranty($row->account_id)),
                "ship_w_mm" => $row->ship_fee_w_mm,
                "ship_o_mm" => $row->ship_fee_o_mm,
                "img_location" => $unserialized_files,
                "id" => $row->id);

                if (!empty($prod_var_type)){
                    foreach ($prod_var_type as $key2 => $value2) {
                        $var_price = $value2->unit_price;
                        $var_discount = 0;

                        $result_discount = $this->profile_model->get_prod_var_discount($value2->id);

                        if (!empty($result_discount)){
                            foreach ($result_discount as $key4 => $value4) {
                                $var_price = $value4->new_price;
                                $var_discount = $value4->discount_percent;
                            }
                        }

                        $prod_unserialize_img = unserialize($value2->img_location);
                        $prod_var_arr[$key2] = array(
                            "id" => $value2->id,
                            "variation_id" => $value2->variation_id,
                            "type" => $value2->type,
                            "discount" => $var_discount,
                            "unit_price" => $var_price,
                            "img_location" => $prod_unserialize_img
                        );
                        // $prod_img[$key2] = array("img" => $prod_unserialize_img);
                        // $data['prod_img'][$key2] = $prod_unserialize_img;
                    }
                }
        
                // array_push($prod_img, $prod_img1);

                $data['prod_var_type'] = $prod_var_arr;
                $data['prod_img'] = $prod_img1;

                if (!empty($coverage_area)){
                    foreach ($coverage_area as $key => $value) {
                        $cov_mm = $value->cov_mm;
                        $cov_luz = $value->cov_luz;
                        $cov_vis = $value->cov_vis;
                        $cov_min = $value->cov_min;
                    }
                }

                if (!empty($delivery_area)){
                    foreach ($delivery_area as $key => $value) {

                        if ($value->area == "1"){
                            if ($cov_mm == "1"){
                                $result_cov_area = $this->profile_model->get_coverage_city($value->area, $value->prov_id, $account_id);
                                if ($result_cov_area == "1"){
                                    $mm = "Metro Manila : All";
                                }else{
                                    $mm = "Metro Manila : ".$value->city_desc;
                                }
                            }
                        }

                        if (empty($value->city_desc)){
                            $city_desc = "All";
                        }else{
                            $city_desc = $value->city_desc;
                        }

                        if ($value->area == "2"){
                            if ($cov_luz == "1"){
                                $result_cov_area = $this->profile_model->get_coverage_city($value->area, $value->prov_id, $account_id);
                                if ($result_cov_area == "1"){
                                    $var_luz = $value->prov_desc." - All";
                                }else{
                                    $var_luz = $value->prov_desc." - ".$city_desc;
                                }
                                $luz[] = array("city_desc" => $var_luz);    
                            }
                        }

                        if ($value->area == "3"){
                            if ($cov_vis == "1"){
                                $result_cov_area = $this->profile_model->get_coverage_city($value->area, $value->prov_id, $account_id);
                                if ($result_cov_area == "1"){
                                    $var_vis = $value->prov_desc." - All";
                                }else{
                                    $var_vis = $value->prov_desc." - ".$city_desc;
                                }
                                $vis[] = array("city_desc" => $var_vis);    
                            }
                        }

                        if ($value->area == "4"){
                            if ($cov_min == "1"){
                                $result_cov_area = $this->profile_model->get_coverage_city($value->area, $value->prov_id, $account_id);
                                if ($result_cov_area == "1"){
                                    $var_min .= $value->prov_desc." - All";
                                }else{
                                    $var_min .= $value->prov_desc." - ".$city_desc;
                                }
                                $min[] = array("city_desc" => $var_min);    
                            }
                        }


                    }    
                }

        }

        $prod_del_opt = "";
        
        if ($cov_mm == "1" && $cov_luz == "1" && $cov_vis == "1" && $cov_min == "1"){
            $prod_del_opt = "Nationwide";
        }

        if ($cov_mm == "1" || $cov_luz == "1" && $cov_vis == "0" && $cov_min == "0"){
            $prod_del_opt = "Metro Manila Only";
        }

        if ($cov_luz == "1" && $cov_vis == "0" && $cov_min == "0"){
            $prod_del_opt = "Luzon Only";
        }

        if ($cov_vis == "1" && $cov_luz == "0" && $cov_min == "0" && $cov_mm == "0"){
            $prod_del_opt = "Visayas Only";
        }

        if ($cov_min == "1" && $cov_luz == "0" && $cov_vis == "0" && $cov_mm == "0"){
            $prod_del_opt = "Mindanao Only";
        }

        if ($cov_mm == "1" && $cov_luz == "0" && $cov_vis == "1" && $cov_min == "0"){
            $prod_del_opt = "Metro Manila & Visayas";
        }

        if ($cov_mm == "1" && $cov_luz == "0" && $cov_min == "1" && $cov_vis == "0"){
            $prod_del_opt = "Metro Manila & Mindanao";
        }

        if ($cov_luz == "1" && $cov_vis == "1" && $cov_min == "0"){
            $prod_del_opt = "Luzon & Visayas";
        }

        if ($cov_luz == "1" && $cov_min == "1" && $cov_vis == "0"){
            $prod_del_opt = "Luzon & Mindanao";
        }

        if ($cov_vis == "1" && $cov_min == "1" && $cov_luz == "0"){
            $prod_del_opt = "Visayas & Mindanao";
        }

        if ($cov_mm == "1" && $cov_luz == "1" && $cov_vis == "1" && $cov_min == "1"){
            $prod_del_opt = "Nationwide";
        }


        $result_cov_luz = $this->profile_model->get_coverage_province(2, $account_id);
        $result_cov_vis = $this->profile_model->get_coverage_province(3, $account_id);
        $result_cov_min = $this->profile_model->get_coverage_province(4, $account_id);

        if ($result_cov_luz == "1"){
            unset($luz);
            $luz = array();
            $luz[] = array("city_desc" => "All Areas");
        }

        if ($result_cov_vis == "1"){
            unset($vis);
            $vis = array();
            $vis[] = array("city_desc" => "All Areas");
        }

        if ($result_cov_min == "1"){
            unset($min);
            $min = array();
            $min[] = array("city_desc" => "All Areas");
        }


        $data['mm'] = nl2br($mm);
        $data['luz'] = $luz;
        $data['vis'] = $vis;
        $data['min'] = $min;
        $data['prod_del_opt'] = $prod_del_opt;
        // var_dump($data['prod_img']);
        $data['token'] = $this->security->get_csrf_hash();

            // var_dump($data);

		echo json_encode($data);
	}

    public function product_by_cat(){
        $id = $this->input->post("id");
        $comp_id = $this->input->post("comp_id");
        $result = $this->profile_model->get_product_by_cat($id, $comp_id);
        $products = array();
      
        if (!empty($result)){
            foreach ($result as $key => $value) {
                $unserialized_files = unserialize($value->img_location); 
                $products[$key] = array(
                    'product_name' => $value->product_name,
                    "product_description" => $value->product_description,
                    "product_unit_price" => $value->product_unit_price,
                    "img_location" => $unserialized_files,
                    "id" => $value->id);
            }
        }

        $data['products'] = $products;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function insert_prod(){
        $this->session->set_userdata("order_id", $this->input->post("order"));
        $data = array(
            "comp_id" => $this->session->userdata("comp_id"),
            "prod_id" => $this->input->post("prod_id"),
            "prod_qty" => $this->input->post("prod_qty"),
            "prod_var1" => $this->input->post("prod_var1"),
            "prod_var2" => $this->input->post("prod_var2"),
            "date_insert" => date("Y-m-d H:i:s")
        );

        if ($this->input->post("order_now") == "1"){
            $this->session->set_userdata("prod_id", $this->input->post("prod_id"));
        }
        
        $data['result'] = $this->profile_model->insert_prod($data);
        $data['token'] = $this->security->get_csrf_hash();

        echo json_encode($data);
    }	

    public function insert_prod_session(){
        $this->session->set_userdata("order_id", $this->input->post("order"));
            // $this->session->unset_userdata("prod_session");
        $order = $this->input->post("order");
        $prod_data = array(
            "prod_id" => $this->input->post("prod_id"),
            "prod_qty" => $this->input->post("prod_qty"),
            "prod_var1" => $this->input->post("prod_var1"),
            "prod_var2" => $this->input->post("prod_var2")
        );

        if ($this->session->userdata("prod_session") == NULL){
            $prod_session0 = array(0 => $prod_data);
            $prod_session = $prod_session0;
            $this->session->set_userdata("prod_session", $prod_session);
            // $session = 0;
            $status = 0;
        }else{
            $prod_session0 = $this->session->userdata("prod_session");
            $key_val = "";
            $prod_qty = 0;
            $status = 0;
            foreach ($prod_session0 as $key => $value) {
                if ($value['prod_id'] === $this->input->post("prod_id") && $value['prod_var1'] === $this->input->post("prod_var1") && $value['prod_var2'] === $this->input->post("prod_var2")){
                    $prod_qty = $value['prod_qty'];
                    $key_val = $key;
                    // unset($prod_session0[$key]);
                    $status = 1;
                    $order -= 1;
                    break;
                }
            }

            unset($prod_session0[$key_val]);

            $prod_data['prod_qty'] += $prod_qty;

            ksort($prod_session0);

            // $data['length_session'] = COUNT($prod_session0);
            // $data['status'] = $status;

            if (COUNT($prod_session0) == 0){
                $prod_session = array(0 => $prod_data);
            }else{
                $prod_session = $prod_session0 + array(COUNT($prod_session0) => $prod_data);
                $data['no-sort'] = $prod_session;
            }

            ksort($prod_session);
            // $data['sort'] = ksort($prod_session);
            $this->session->unset_userdata("prod_session");
            $this->session->set_userdata("prod_session", $prod_session);
            // $session = 1;
        }

        // $data['result'] = $this->profile_model->insert_prod($data);

        if ($this->input->post("order_now") == "2"){
            $this->session->set_userdata("prod_id", $this->input->post("prod_id"));
        }

        $this->session->set_userdata('order_no', $order);
        $this->session->set_userdata('cart_total', $this->input->post("total_cart"));

        $data['order'] = $order;
        $data['prod_data'] = $prod_data;
        $data['prod_session'] = $prod_session0;
        $data['session'] = COUNT($prod_session0);
        $data['result'] = $prod_session;
        $data['token'] = $this->security->get_csrf_hash();

        echo json_encode($data);
    }	

    public function get_orders(){

        $session_prod = $this->session->userdata("prod_session");
        $total = 0;
        $product_price = 0;
        $products = array();

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
                        "prod_var2_id" => $prod_var2
                    );

                    $total += ($product_price * $prod_qty);

                }

            }
        }

        if (!empty($this->session->userdata("prod_session"))){
            $order_no = COUNT($this->session->userdata("prod_session"));
        }else{
            $order_no = 0;
        }

        $data['orders']  = $products;
        $data['result'] = tbl_products_no_order($products);
        $data['order_no'] = $order_no;
        $data['cart_total'] = $total;
        $data['token'] = $this->security->get_csrf_hash();
        $this->session->set_userdata('order_no', $data['order_no']);
        $this->session->set_userdata('cart_total', $total);

        echo json_encode($data);



    }

}
