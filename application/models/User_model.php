<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function outlet(){
		$query = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata('comp_id')))->result();
		return $query;
	}

	public function currency(){
		$query = $this->db->query("SELECT * FROM currency")->result();
		return $query;
	}

	public function business_type(){
		$query = $this->db->query("SELECT * FROM business_type")->result();
		return $query;		
	}

	public function check_username($username){
		$query = $this->db->query("SELECT * FROM users WHERE username = ? AND id != ?", array($username, $this->session->userdata("user_id")));
		return $query->num_rows();
	}

	public function check_password(){
		$query = $this->db->query("SELECT password FROM users WHERE id = ?", array($this->session->userdata("user_id")))->row();
        return $query->password;
	}

	public function update_user($password, $username){
		$this->db->set("username", $username);
		$this->db->set("password", password_hash($password, PASSWORD_DEFAULT));
		$this->db->where("id", $this->session->userdata("user_id"));
		$this->db->update("users");
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	public function get_user_owner(){
		$query = $this->db->query("SELECT
		    `account_application`.*
		    , `currency`.`curr_code`
		    , `business_type`.`desc` AS `business_desc`
		    , `subscription_type`.`desc` AS `subscription_desc`
		    , `status`.`status`
		    , `city`.`city_desc`
		    , `province`.`province_desc`
		    , `account_type`.`desc` AS `account_type_desc`
		    , `account_class`.`desc` AS `account_class_desc`
		FROM
		    `account_application`
		    LEFT JOIN `currency` 
		        ON (`account_application`.`currency` = `currency`.`id`)
		    LEFT JOIN `business_type` 
		        ON (`account_application`.`business_type` = `business_type`.`id`)
		    LEFT JOIN `subscription_type` 
		        ON (`account_application`.`subscription_type` = `subscription_type`.`id`)
		    LEFT JOIN `status` 
		        ON (`account_application`.`account_status` = `status`.`id`)
		    LEFT JOIN `city` 
			ON (`account_application`.`city` = `city`.`id`)
		    LEFT JOIN `province`
			ON (`city`.`province_id` = `province`.`id`)
		    LEFT JOIN `account_class` 
			ON (`account_application`.`account_class` = `account_class`.`id`)
		    LEFT JOIN `account_type`
			ON (`account_application`.`account_type` = `account_type`.`id`)
		        WHERE `account_application`.`id` = ?", array($this->session->userdata("comp_id")))->result();
		return $query;
	}

	public function update_owner($data_owner, $data_user){
		$data_owner['date_update_user'] = date("Y-m-d H:i:s");
		$this->db->where("id", $this->session->userdata("comp_id"));
		$this->db->update("account_application", $data_owner);

		$this->db->where("id", $this->session->userdata("user_id"));
		$this->db->update("users", $data_user);

		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	public function update_product_vat(){
		$this->db->where("comp_id", $this->session->userdata("comp_id"));
		$this->db->set("vat", "0");
		$this->db->update("products");
	}

	public function get_user_account(){
		$query = $this->db->query("SELECT
		    *
		FROM
		    `sales_force`
		WHERE (`sales_force`.`user_id` = ?)", array($this->session->userdata("user_id")))->result();
		return $query;
	}

	public function get_user_access(){
		$query = $this->db->query("SELECT all_access FROM users WHERE id = ? ", $this->session->userdata("user_id"))->row();
		return $query->all_access;
	}

	public function update_user_account($data_sales, $data_user){
		$data_owner['date_update_user'] = date("Y-m-d H:i:s");
		$this->db->where("user_id", $this->session->userdata("user_id"));
		$this->db->update("sales_force", $data_sales);

		$this->db->where("id", $this->session->userdata("user_id"));
		$this->db->update("users", $data_user);

		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}



}
