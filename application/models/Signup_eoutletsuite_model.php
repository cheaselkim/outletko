<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_eoutletsuite_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function account_id(){
        $result = $this->db->query("SELECT account_id FROM account_application ORDER BY id DESC LIMIT 1")->row();
		return str_pad((substr($result->account_id, -4) + 1), 4, '0', STR_PAD_LEFT); 		
	}

	public function business_type(){
		$result = $this->db->query("SELECT * FROM business_type")->result();
		return $result;
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

	public function insert_sales_force($comp_id, $account_id){
		$data = array(
			"comp_id" => $comp_id,
			"outlet" => "0",
			"account_id" => ($account_id."1"),
			"user_id" => "0",
			"first_name" => "ACCOUNT",
			"last_name" => "HOUSE",
			"position" => "Agent",
			"type" => "1",
			"monthly_quota" => "0",
			"share" => "0",
			"active" => "1",
			"date_hired" => date("Y-m-d"),
			"date_start" => date("Y-m-d"),
			"user" => $comp_id,
			"date_insert" => date("Y-m-d H:i:s")
		);

		$this->db->insert("sales_force", $data);
	}

}
