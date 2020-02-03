<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$CI = &get_instance(); 
		$this->load->database();
		$this->db2 = $CI->load->database('outletko', TRUE);
	}	

	public function business_category(){
		$query = $this->db->query("SELECT * FROM business_type ORDER BY `business_type`.`desc` ASC")->result();
		return $query;
	}
	
  public function search_city_prov($city){
    $query = $this->db->query("SELECT city.*, `province`.`province_desc` FROM city INNER JOIN province ON `city`.`province_id` = `province`.`id` WHERE city_desc LIKE ? LIMIT 20", array("%".$city."%"))->result();
    return $query;
  }

	public function account_id(){
        $result = $this->db2->query("SELECT account_id FROM account ORDER BY id DESC LIMIT 1")->row();
		return str_pad((substr($result->account_id, -4) + 1), 4, '0', STR_PAD_LEFT); 		
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
      	$this->db2->select('*');
      	$this->db2->from('account');
      	$this->db2->where('id',$id);
      	$query = $this->db2->get();
      	if($query->num_rows()>0){
      		return $query->result_array();
      	}else{
      		return false;
      	}

    } 
    
    function verify_user($id) {
        $data = array('confirm_email' => 1);
        $this->db2->where('id', $id);
        $this->db2->update('account', $data);
        
        $data = array('status' => 1);
        $this->db->where('comp_id', $id);
        $this->db->update('users', $data);
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

      if (!empty($query)){
        foreach ($query as $key => $value) {
          if (password_verify($pword, $value->password)){
                  if($value->user_type == "2" || $value->user_type == "1"){
                      $result = $this->db->query("SELECT * FROM account_application WHERE account_id = ?", array($value->account_id))->num_rows();
                      
                       $user_array = array(
                          "user_id" => $value->id,
                          "account_id" => $value->account_id,
                          "comp_id" => $value->comp_id,
                          "user_uname" => $value->username,
                          "user_fullname" => ($value->first_name." ".$value->last_name),
                          "user_status" => $value->status,
                          "user_type" => $value->user_type,
                          "all_access" => $value->all_access,
                          "owner" => $result,
                          "login" => 1,
                          "validated" => true
                    );
                  }else if($value->user_type == "4"){
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
                          "login" => 1,
                          "validated" => true
                    );
                  }else if ($value->user_type == "5"){
                      $result = $this->db2->query("SELECT * FROM account_buyer WHERE account_id = ?", array($value->account_id))->num_rows();
                      $result2 = $this->db2->query("SELECT id FROM account_buyer WHERE account_id = ?", array($value->account_id))->row();
                  
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
                          "login" => 1,
                          "validated" => true
                    );

                  }
              
          }else{
            $user_array = "";
          }
        }


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

    public function insert_account($user_app){
      $this->db->insert("account_application", $user_app);
      return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0;		
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

}