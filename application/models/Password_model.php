<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function find_email($email,$randomPass){
		$query = $this->db->query("SELECT id FROM users WHERE email = ?", array($email));
		$result = $query->row();

		$this->db->set("otp", "1");
		$this->db->set("password", password_hash($randomPass, PASSWORD_DEFAULT));
		$this->db->where("id", $result->id);
		$this->db->update("users");

		return $query->num_rows();
	}

    public function find_accountid($account_no, $randomPass){
//         $account_id = $account_no;
// 		$query = $this->db->query("SELECT * FROM users WHERE username = ?", array(account_id));
// 		$result = $query->row();

		$this->db->set("otp", "1");
		$this->db->set("password", password_hash($randomPass, PASSWORD_DEFAULT));
		$this->db->where("username", $account_no);
		$this->db->update("users");

// 		return $query->num_rows();  
        return 1;
    }
    

	public function change_password($password){
		$this->db->set("otp", "0");
		$this->db->set("password", password_hash($password, PASSWORD_DEFAULT));
		$this->db->where("id", $this->session->userdata("user_id"));
		$this->db->update("users");
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}
	
	public function change_password2($vat,$bus_name,$mobile_no, $buss_address, $buss_city, $buss_prov){
		$this->db->set("account_name", $bus_name);
		$this->db->set("vat", $vat);
		$this->db->set("mobile_no", $mobile_no);
		$this->db->set("address", $buss_address);
		$this->db->set("city", $buss_city);
		$this->db->set("province", $buss_prov);
		$this->db->where("account_id", $this->session->userdata("account_id"));
		$this->db->update("account_application");
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

}