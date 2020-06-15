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

            $variation_price = $this->profile_model->get_variation_price($value->id);

            if (!empty($variation_price)){
                foreach ($variation_price as $key2 => $value2) {
                    $min_price = $value2->min_unit_price;
                    $max_price = $value2->max_unit_price;
                }
            }


            $products[$key] = array(
                "product_name" => $value->product_name,
                "product_description" => $value->product_description,
                "product_unit_price" => $value->product_unit_price,
                "min_price" => $min_price,
                "max_price" => $max_price,
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
        $vis = "";
        $min = "";

        foreach($result as $row){
            $unserialized_files = unserialize($row->img_location); 
            $data['img'] = img_display($unserialized_files);

            // if ($unserialized_files != false){
            //     $file = $unserialized_files[0];
            // }else{
            //     $file = "";
            // }

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
            $delivery_area = $this->profile_model->get_delivery_area($row->account_id);

            $data['products'][] = array(
                'product_name' => $row->product_name,
                "product_description" => $row->product_description,
                "product_other_details" => $row->product_other_details,
                "product_online" => $row->product_online,
                "product_available" => $row->product_available,
                "product_unit_price" => $row->product_unit_price,
                "min_price" => $min_price,
                "max_price" => $max_price,
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
                        $prod_unserialize_img = unserialize($value2->img_location);
                        $prod_var_arr[$key2] = array(
                            "id" => $value2->id,
                            "variation_id" => $value2->variation_id,
                            "type" => $value2->type,
                            "unit_price" => $value2->unit_price,
                            "img_location" => $prod_unserialize_img
                        );
                        // $prod_img[$key2] = array("img" => $prod_unserialize_img);
                        // $data['prod_img'][$key2] = $prod_unserialize_img;
                    }
                }
        
                // array_push($prod_img, $prod_img1);

                $data['prod_var_type'] = $prod_var_arr;
                $data['prod_img'] = $prod_img1;

                if (!empty($delivery_area)){
                    foreach ($delivery_area as $key => $value) {
                        if ($value->area == "1"){
                            $mm = "Metro Manila : ".$value->city_desc;
                        }

                        if (empty($value->city_desc)){
                            $city_desc = "All";
                        }else{
                            $city_desc = $value->city_desc;
                        }

                        if ($value->area == "2"){
                            $var_luz = $value->prov_desc." - ".$city_desc;
                            $luz[] = array("city_desc" => $var_luz);
                        }

                        if ($value->area == "3"){
                            $var_vis = $value->prov_desc." - ".$city_desc;
                            $vis[] = array("city_desc" => $var_vis);
                        }

                        if ($value->area == "4"){
                            $var_min .= $value->prov_desc." - ".$city_desc;
                            $min[] = array("city_desc" => $var_min);
                        }


                    }    
                }

        }

        $data['mm'] = nl2br($mm);
        $data['luz'] = $luz;
        $data['vis'] = $vis;
        $data['min'] = $min;
        // var_dump($data['prod_img']);
        $data['token'] = $this->security->get_csrf_hash();

            // var_dump($data);

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

        $data['result'] = $this->profile_model->insert_prod($data);
        $data['token'] = $this->security->get_csrf_hash();

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

}
