<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $CI = &get_instance(); 
    $this->load->database();
    $this->db2 = $CI->load->database('outletko', TRUE);
  }

  public function login(){
  	$uname = $this->security->xss_clean($this->input->post('uname'));
  	$pword = $this->security->xss_clean($this->input->post('pword'));
  	$user_array = "";

  	$query = $this->db->query("SELECT * FROM users WHERE status = ? AND username = ?", array(1, $uname))->result();
    $value_account_id = "";

  	if (!empty($query)){
  		foreach ($query as $key => $value) {
  			if (password_verify($pword, $value->password)){

                $users_log = array("user_id" => $value->id,
                                    "date_login" => date("Y-m-d H:i:s"));

                $this->db->insert("users_log", $users_log);

                if($value->user_type == "2"){
                    $result = $this->db->query("SELECT * FROM account_application WHERE account_id = ?", array($value->account_id))->num_rows();
                    $account_id = $value->account_id;
                    
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
                    $account_id = $value->account_id;

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
                        "order_no" => $resullt3->order_no,
                        "login" => 1,
                        "validated" => true
          				);
                }else if ($value->user_type == "5"){
                    $result = $this->db2->query("SELECT * FROM account_buyer WHERE account_id = ?", array($value->account_id))->num_rows();
                    $result2 = $this->db2->query("SELECT id FROM account_buyer WHERE account_id = ?", array($value->account_id))->row();
                    $account_id = $value->account_id;
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
  }

  public function check_session(){
    $query = "";

    if (!empty($this->session->userdata("validated"))){
      $user_id = $this->security->xss_clean($this->session->userdata("user_id"));
      $query = $this->db->query("SELECT * FROM users WHERE id = ? ", array($user_id))->result();
    }else{
      $query = "";
    }

    // if($this->session->userdata("login") != NULL && $_COOKIE["account_id"] != "undefined"){
    //     if($this->session->userdata("account_id") == $_COOKIE["account_id"]){
    //         if (!empty($this->session->userdata("validated"))){
    //           $user_id = $this->security->xss_clean($this->session->userdata("user_id"));
    //           $query = $this->db->query("SELECT * FROM users WHERE id = ? ", array($user_id))->result();
    //         }else{
    //           $query = "";
    //         }
    //     } 
    // }else{
    //     $query = "";
    // }



  	if (!empty($query)){
  		return true;
  	}else{
  		return false;
  	}

  }

  public function check_otp(){
    $query = $this->db->query("SELECT otp FROM users WHERE id = ? AND otp = ? ", array($this->session->userdata("user_id"), "1"))->num_rows();
    return $query;
  }

  public function featured_outlet(){
    $query = $this->db2->query("SELECT * FROM account  WHERE account_status = ? LIMIT 5", array(1))->result();
    return $query;
  }

    public function search_currency($code){
        $query =  $this->db->query("SELECT * FROM country WHERE code = ? ", array($code))->result();
        return $query;
    }

}
