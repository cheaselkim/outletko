<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$CI = &get_instance(); 
		$this->load->database();
        $this->db2 = $CI->load->database('outletko', TRUE);
        $this->db3 = $CI->load->database('admin', TRUE);
    }	
    
    public function plan(){
        $query = $this->db3->query("SELECT  
        `plan_category`.`category_desc` AS plan_title,
        `plan_days`.`days_name` AS plan_days_name,
        `plan_days`.`days_desc` AS plan_days,
        `plan_type`.`plan_name`,
        `plan_type`.`price`,
        `plan_type`.`outlet_price`,
        `plan_type`.`id`
        FROM plan_type
        INNER JOIN plan_days ON 
        `plan_days`.`id` = `plan_type`.`plan_days`
        INNER JOIN plan_category ON 
        `plan_category`.`id` = `plan_type`.`plan_category` 
        WHERE `plan_type`.`status` = ? 
        ORDER BY `plan_type`.`id` ASC", array(1))->result();
        return $query;
    }

    public function get_plan($id){
        $query = $this->db3->query("SELECT  
        `plan_category`.`category_desc` AS plan_title,
        `plan_days`.`days_name` AS plan_days_name,
        `plan_days`.`days_desc` AS plan_days,
        `plan_type`.`plan_name`,
        `plan_type`.`price` AS plan_price,
        `plan_type`.`outlet_price`,
        `plan_type`.`id`
        FROM plan_type
        INNER JOIN plan_days ON 
        `plan_days`.`id` = `plan_type`.`plan_days`
        INNER JOIN plan_category ON 
        `plan_category`.`id` = `plan_type`.`plan_category` 
        WHERE `plan_type`.`status` = ?  AND `plan_type`.`id` = ?
        ORDER BY `plan_type`.`id` ASC", array(1, $id))->result();
        return $query;    
    }

	public function business_category(){
		$query = $this->db->query("SELECT * FROM business_type ORDER BY `business_type`.`desc` ASC")->result();
		return $query;
	}
	
    public function search_city_prov($city, $country){
        if (empty($country)){
            $country = "173";
        }

        $query = $this->db2->query("SELECT 
        city.*, 
        `province`.`province_desc` 
        FROM city 
        INNER JOIN province ON 
        `city`.`province_id` = `province`.`id` 
        WHERE city_desc LIKE ? AND 
        `province`.`country` = ? 
        LIMIT 20", array($city."%", $country))->result();
        return $query;
    }

    public function search_partner($partner){
        $query = $this->db->query("
        SELECT
        id AS partner_id,
        CONCAT(last_name, ', ', first_name, ' ', middle_name) AS partner_name,
        recruited_by as lvl_2,
        level_2 as lvl_3,
        account_id 
        FROM account_application
        WHERE last_name LIKE ? OR account_id LIKE ? OR first_name LIKE ?   
        LIMIT 20
        ", array("%".$partner."%", "%".$partner."%", "%".$partner."%"))->result();
        return $query;
    }

    public function country(){
        $query = $this->db->query("SELECT * FROM country WHERE id IN ? ", array(array(12, 131, 173, 191, 240)))->result();
        return $query;
    }

    public function check_email($email){
        $query = $this->db->query("SELECT * FROM account_application WHERE email = ? ", array($email))->num_rows();
        return $query;
    }

    public function check_uname($uname){
        $query = $this->db->query("SELECT * FROM users WHERE username = ? ", array($uname))->num_rows();
        return $query;
    }

    public function check_linkname($linkname){
        $query = $this->db2->query("SELECT * FROM account WHERE link_name = ?", array($linkname))->num_rows();
        return $query;
    }

	public function account_id(){
        $result = $this->db->query("SELECT account_id FROM account_application ORDER BY id DESC LIMIT 1")->row();
        $data['account_id'] = date("y").'1'.str_pad((substr($result->account_id, -4) + 1), 4, '0', STR_PAD_LEFT);
    
        $this->db->insert("account_application", $data);
        $data['comp_id'] = $this->db->insert_id();

        return $data; 		
	}
    
    public function email_check($email){
        $this->db2->select('*');
        $this->db2->from('account');
        $this->db2->where('email',$email);
        $query=$this->db2->get();
        
        if($query->num_rows()>0){
                return false;
        }
        else{
                return true;
        }
 
    }
    
    public function register($account){
      // var_dump($account);
        $this->db2->insert('account', $account);
        return ($this->db2->affected_rows() == 1) ? $this->db2->insert_id() : false;
    }
    
    public function register_users($account){
      // var_dump($account);
        $this->db->insert('users', $account);
        return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
    }
    
    function get_hash_value($id){
      	// $this->db2->select('*');
      	// $this->db2->from('account');
      	// $this->db2->where('account_id',$id);
      	// $query = $this->db2->get();
      	// if($query->num_rows()>0){
      	// 	return $query->result_array();
      	// }else{
      	// 	return false;
        // }
        
        $query = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 200");
        $status = false;
        $account_id = "";
        if ($query->num_rows() > 0 ){
            foreach ($query->result() as $key => $value) {
                if (password_verify($value->account_id, $id)){
                    $status = true;
                    $account_id = $value->account_id;
                }
            }  
            
          
            if ($status == true){
                $this->db2->where("account_id", $account_id);
                $this->db2->set("account_status", 1);
                $this->db2->update("account");
                // return $this->db->query("SELECT * FROM users WHERE account_id = ? AND user_type = ?", array($account_id, 2))->result_array();
                return $this->db->query("SELECT * FROM account_application WHERE account_id = ?", array($account_id))->result_array();
            }else{
                return false;
            }
        
        } 

    } 
    
    function verify_user($id) {
        // $data = array('confirm_email' => 1);
        // $this->db2->where('id', $id);
        // $this->db2->update('account', $data);
        
        // $data = array('status' => 1);
        // $this->db->where('comp_id', $id);
        // $this->db->update('users', $data);
      $this->db->where("account_id", $id);
      $this->db->set("status", "1");
      $this->db->update("users");

        return true;
    }
    

    public function insert_account_buyer($data){
      $return_data = array();
      
      $result = $this->db2->query("SELECT account_id FROM account_buyer WHERE YEAR(date_insert) = ? ORDER BY id DESC LIMIT 1", array(date("Y")))->row();

      if (empty($result)){
        $data['account_id'] = date("y").str_pad((substr(0, -4) + 1), 4, '0', STR_PAD_LEFT);    
        $return_data['account_id'] = date("y").str_pad((substr(0, -4) + 1), 4, '0', STR_PAD_LEFT);   
      }else{
        $data['account_id'] = date("y").str_pad((substr($result->account_id, -4) + 1), 4, '0', STR_PAD_LEFT);    
        $return_data['account_id'] = date("y").str_pad((substr($result->account_id, -4) + 1), 4, '0', STR_PAD_LEFT);           
      }


      $this->db2->insert("account_buyer", $data);
      $return_data['comp_id'] = $this->db2->insert_id();

      $comp_id = $this->db2->insert_id();

      if ($this->session->userdata("prod_session") != ""){
        $prod_session = $this->session->userdata("prod_session");
        foreach ($prod_session as $key2 => $value4) {

            $prod_data = array(
                "comp_id" => $comp_id,
                "prod_id" => $value4['prod_id'],
                "prod_qty" => $value4['prod_qty'],
                "prod_var1" => $value4['prod_var1'],
                "prod_var2" => $value4['prod_var2'],
                "date_insert" => date("Y-m-d H:i:s")
            );
    
            $prod_query = $this->db2->query("SELECT * FROM buyer_order_products WHERE comp_id = ? AND prod_id = ? AND prod_var1 = ? AND prod_var2 = ? AND (order_id = '' OR order_id IS NULL ) ", array($this->session->userdata("comp_id"), $prod_data['prod_id'], $prod_data['prod_var1'], $prod_data['prod_var2']))->result();

            if (!empty($prod_query)){
                $item_id = "";
                foreach ($prod_query as $key => $value4) {
                    $item_id = $value->id;
                    $prod_data['prod_qty'] = $value4->prod_qty + $prod_data['prod_qty'];
                }
                $this->db2->where("id", $id);
                $this->db2->update("buyer_order_products", $prod_data);
            }else{
                $this->db2->insert("buyer_order_products", $prod_data);
            }


        }
    }

      return $return_data;
    }

    public function confirm_account($verify_code, $id){

      $result = $this->db2->query("SELECT * FROM account_buyer WHERE id = ? AND verify_code = ? ", array($id, $verify_code))->num_rows();
      if($result > 0){
        $this->db2->where("id", $id);
        $this->db2->set("verify", "0");
        $this->db2->update("account_buyer");
      }
      return $result;
    }

    public function get_account($id){
      $query = $this->db->query("SELECT * FROM users WHERE comp_id = ? AND user_type = ?", array($id, "5"))->result();
      return $query;
    }

    public function check_login($username, $password){
      $uname = $this->security->xss_clean($username);
      $pword = $this->security->xss_clean($password);

      $query = $this->db->query("SELECT * FROM users WHERE status = ? AND username = ?", array("1", $uname))->result();
      $value_account_id = "";

      if (!empty($query)){
        foreach ($query as $key => $value) {
          if (password_verify($pword, $value->password)){

                $users_log = array("user_id" => $value->id, "date_login" => date("Y-m-d H:i:s"));
                $this->db->insert("users_log", $users_log);

            if($value->user_type == "2" || $value->user_type == "1" || $value->user_type == "3"){
                $account_id = $value->account_id;

                $result = $this->db->query("SELECT * FROM account_application WHERE account_id = ?", array($value->account_id))->num_rows();
                      
                       $user_array = array(
                          "user_id" => $value->id,
                          "account_id" => $value->account_id,
                          "comp_id" => $value->comp_id,
                          "user_uname" => $value->username,
                          "user_fullname" => ($value->first_name." ".$value->last_name),
                          "user_status" => $value->status,
                          "otp" => $value->otp,
                          "user_type" => $value->user_type,
                          "all_access" => $value->all_access,
                          "owner" => $result,
                          "login" => 1,
                          "validated" => true
                    );
                  }else if($value->user_type == "4"){
                        $account_id = $value->account_id;
                      $result = $this->db2->query("SELECT * FROM account WHERE account_id = ?", array($value->account_id))->num_rows();
                      $result2 = $this->db2->query("SELECT account_name, id, link_name FROM account WHERE account_id = ?", array($value->account_id))->row();
                      $result3 = $this->db2->query("SELECT COUNT(*) AS order_no FROM buyer_order WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array("1", $result2->id))->row();

                        $user_array = array(
                          "user_id" => $value->id,
                          "link_name" => $result2->link_name,
                          "account_name" => $result2->account_name,
                          "account_id" => $value->account_id,
                          "comp_id" => $result2->id,
                          "user_uname" => $value->username,
                          "user_fullname" => ($value->first_name." ".$value->last_name),
                          "user_status" => $value->status,
                          "user_type" => $value->user_type,
                          "all_access" => $value->all_access,
                          "owner" => $result,
                          "order_no" => $result3->order_no,
                          "otp" => $value->otp,
                          "login" => 1,
                          "validated" => true
                    );
                  }else if ($value->user_type == "5"){
                        $account_id = $value->account_id;
                        $result = $this->db2->query("SELECT * FROM account_buyer WHERE account_id = ?", array($value->account_id))->num_rows();
                        $result2 = $this->db2->query("SELECT id FROM account_buyer WHERE account_id = ?", array($value->account_id))->row();

                        if ($this->session->userdata("prod_session") != ""){
                            $prod_session = $this->session->userdata("prod_session");
                            foreach ($prod_session as $key2 => $value4) {

                                $prod_data = array(
                                    "comp_id" => $result2->id,
                                    "prod_id" => $value4['prod_id'],
                                    "prod_qty" => $value4['prod_qty'],
                                    "prod_var1" => $value4['prod_var1'],
                                    "prod_var2" => $value4['prod_var2'],
                                    "date_insert" => date("Y-m-d H:i:s")
                                );
                        
                                $prod_query = $this->db2->query("SELECT * FROM buyer_order_products WHERE comp_id = ? AND prod_id = ? AND prod_var1 = ? AND prod_var2 = ? AND (order_id = '' OR order_id IS NULL ) ", array($this->session->userdata("comp_id"), $prod_data['prod_id'], $prod_data['prod_var1'], $prod_data['prod_var2']))->result();

                                if (!empty($prod_query)){
                                    $item_id = "";
                                    foreach ($prod_query as $key => $value4) {
                                        $item_id = $value->id;
                                        $prod_data['prod_qty'] = $value4->prod_qty + $prod_data['prod_qty'];
                                    }
                                    $this->db2->where("id", $id);
                                    $this->db2->update("buyer_order_products", $prod_data);
                                }else{
                                    $this->db2->insert("buyer_order_products", $prod_data);
                                }


                            }
                        }


                        $buyer_query = $this->db2->query("SELECT products.*, buyer_order_products.*, `products`.`id` as prod_id, `buyer_order_products`.`id` AS item_id,`account`.`account_name`
                            FROM buyer_order_products 
                            LEFT JOIN products ON 
                            `buyer_order_products`.`prod_id` = `products`.`id`            
                            LEFT JOIN account ON 
                            `account`.`id` = `products`.`account_id`
                            WHERE 
                            `buyer_order_products`.`comp_id` = ? AND 
                            (order_id = '' OR order_id IS NULL )
                            ORDER BY `account`.`account_name`, `products`.`product_name`
                            ", array($result2->id))->result();                  
                        
                        $total = 0;
                        
                        if (!empty($buyer_query)){
                            foreach ($buyer_query as $key => $value3) {
                                $total += ($value3->product_unit_price * $value3->prod_qty);
                            }
                        }


                    $user_array = array(
                        "user_id" => $value->id,
                        "account_id" => $value->account_id,
                        "comp_id" => $result2->id,
                        "user_uname" => $value->username,
                        "user_fullname" => ($value->first_name." ".$value->last_name),
                        "user_status" => $value->status,
                        "user_type" => $value->user_type,
                        "all_access" => $value->all_access,
                        "owner" => $result,
                        "cart_total" => $total,
                        "order_no" => COUNT($buyer_query),
                        "otp" => $value->otp,
                        "login" => 1,
                        "validated" => true
                    );

                  }

                  $value_account_id = $account_id;

          }else{
            $user_array = "";
          }
        }

        $expire = time()+3600; // 1 hour expiry
        setcookie("account_id", $value_account_id, $expire,"/", "outletko.com", 0);

        if (!empty($user_array)){
          $this->session->set_userdata($user_array);
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
      return $query;
    }

    public function insert_account($user_app, $comp_id){
      $this->db->where("id", $comp_id);
      $this->db->update("account_application", $user_app);
    //   return $this->db->insert_id();
      return ($this->db->affected_rows() > 0) ? 1 : 0;		
    }

    public function insert_users($users){
      $this->db->insert("users", $users);
      return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0;		
    }

    public function insert_outlet($data){
      $this->db->insert("user_outlet", $data);
      return ($this->db->affected_rows() > 0) ? 1 : 0;
    }

    public function insert_product_color($comp_id){

      $query = $this->db->query("SELECT * FROM auto_product_color")->result();

      foreach ($query as $key => $value) {
        $data[$key] = array(
            "comp_id" => $comp_id,
            "outlet_id" => "0",
            "color_code" => $value->code,
            "color_name" => $value->name
            );
      }
      $this->db->insert_batch("product_color", $data);
    }

    public function insert_product_unit($comp_id){
      $query = $this->db->query("SELECT * FROM auto_product_unit")->result();

      foreach ($query as $key => $value) {
        $data[$key] = array(
            "comp_id" => $comp_id,
            "outlet_id" => "0",
            "unit_code" => $value->code,
            "unit_name" => $value->name
            );
      }
      $this->db->insert_batch("product_unit", $data);

    }

    public function insert_sales_discount($comp_id){
      $query = $this->db->query("SELECT * FROM auto_sales_discount")->result();

      foreach ($query as $key => $value) {
        $data[$key] = array(
            "comp_id" => $comp_id,
            "outlet_id" => "0",
            "sales_discount_code" => $value->code,
            "sales_discount_name" => $value->name
            );
      }
      $this->db->insert_batch("sales_discount", $data);

    }

    public function insert_customer($comp_id){
      $data = array(
          "comp_id" => $comp_id,
          "outlet_id" => "0",
          "cust_code" => "00001",
          "cust_name" => "CASH"
      );

      $this->db->insert("customer", $data);
    }    

    public function insert_invoice(){
      $result = $this->db3->query("SELECT invoice_no FROM account_invoice ORDER BY id DESC LIMIT 1")->row();

      if (!empty($result)){
        $invoice_no = date("y").str_pad((substr($result->invoice_no, -4) + 1), 5, '0', STR_PAD_LEFT);
      }else{
        $invoice_no = date("y")."00001";
      }

      $data['invoice_no'] = $invoice_no;

      $this->db3->insert("account_invoice", $data);

      return $this->db3->insert_id();

    }

    public function update_invoice($data, $id){
      $this->db3->where("id", $id);
      $this->db3->update("account_invoice", $data);
    }

    public function update_password($account_id, $eoutletsuite_pass, $outletko_pass){

      $this->db->set("password", $eoutletsuite_pass);
      $this->db->where("account_id", $account_id);
      $this->db->where("user_type", "2");
      $this->db->update("users");

      $this->db->set("password", $outletko_pass);
      $this->db->where("account_id", $account_id);
      $this->db->where("user_type", "4");
      $this->db->update("users");

    }

    public function check_send_email($account_id){
        $query = $this->db->query("SELECT * FROM users WHERE account_id = ? AND `users`.`status` = ? ", array($account_id, "1"))->num_rows();
        return $query;
    }

    public function update_user_password($eoutletsuite_pass, $outletko_pass, $account_id){

        $this->db->set("password", password_hash($eoutletsuite_pass, PASSWORD_DEFAULT));
        $this->db->set("status", "1");
        $this->db->where("account_id", $account_id);
        $this->db->where("user_type", "2");
        $this->db->update("users");

        $this->db->set("password", password_hash($outletko_pass, PASSWORD_DEFAULT));
        $this->db->set("status", "1");
        $this->db->where("account_id", $account_id);
        $this->db->where("user_type", "4");
        $this->db->update("users");

    }

    public function get_data($id){
        $query = $this->db->query("SELECT plan_type.*, account_application.*, `plan_type`.`id` AS plan_type_id, city.city_desc, province.province_desc, `invoice`.`invoice_no`
        FROM account_application 
        LEFT JOIN plan_type ON 
        account_application.subscription_type = plan_type.id
        LEFT JOIN invoice ON 
        account_application.id = invoice.comp_id
        LEFT JOIN city ON 
        account_application.city = city.id
        LEFT JOIN province ON
        city.province_id = province.id
        WHERE `account_application`.`id` = ? ", array($id))->result();
        
        return $query;
    }

}