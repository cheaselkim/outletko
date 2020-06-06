<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registry_model extends CI_Model {

	public function __construct(){
		parent::__construct();
			$CI = &get_instance(); 
			$this->load->database();
			$this->db2 = $CI->load->database('outletko', TRUE);
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			} 
	}

	public function account_id(){
    // 		$result = $this->db->query("SELECT (MAX(account_id)) as account_id FROM account_application WHERE YEAR(date_insert) = '".date('Y')."'")->row();
        $result = $this->db->query("SELECT account_id FROM account_application ORDER BY id DESC LIMIT 1")->row();
		return str_pad((substr($result->account_id, -4) + 1), 4, '0', STR_PAD_LEFT); 		
	}

	public function account_class(){
		$result = $this->db->query("SELECT * FROM account_class")->result();
		return $result;
	}

	public function account_type(){
		$result = $this->db->query("SELECT * FROM account_type")->result();
		return $result;
	}

	public function business_type(){
		$result = $this->db->query("SELECT * FROM business_type")->result();
		return $result;
	}

	public function subscription_type(){
		$result = $this->db->query("SELECT * FROM subscription_type")->result();
		return $result;
	}

	public function currency(){
		$result = $this->db->query("SELECT * FROM currency ORDER BY FIELD(curr_code, 'CNY', 'USD', 'PHP') DESC LIMIT 3")->result();
		return $result;
	}

    public function partner($partner){
        $result = $this->db->query("SELECT * FROM account_application WHERE account_id = ? ", array($partner))->num_rows();
        return $result;
    }

    public function cash_card($last_name, $first_name, $middle_name, $cash_card){
        $result = $this->db->query("SELECT * FROM account_application WHERE first_name = ? AND last_name = ? AND middle_name = ? AND cash_card = ?", array($last_name, $first_name, $middle_name, $cash_card))->num_rows();
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

	public function data_query($trans_date, $keyword, $account_status, $account_class){

		$trans_date_query = "";
		$keyword_query = "";
		$account_status_query = "";
		$account_class_query = "";

		if (!empty($trans_date)){
			$trans_date_query = "AND DATE(`account_application`.`date_insert`) = '".$trans_date."'";
		}

		if (!empty($keyword)){
			$keyword_query = "AND (account_id = '".$keyword."' OR account_name = '".$keyword."')";
		}

		if ($account_status != "2"){
			$account_status_query = "account_status = '".$account_status."'";
		}

		if ($account_class != "0"){
			$account_class_query = "AND account_class = '".$account_class."'";
		}

		$sql = "SELECT 
					`account_application`.*,
					`account_class`.`desc` AS `account_class_desc`,
					`account_type`.`desc` AS `account_type_desc`,
					`business_type`.`desc` AS `business_type_desc`,
                    `plan_type`.`plan_name`
					FROM account_application
					LEFT JOIN `account_class` ON
					`account_application`.`account_class` = `account_class`.`id`
					LEFT JOIN account_type ON
					`account_application`.`account_type` = `account_type`.`id`
					LEFT JOIN business_type ON
					`account_application`.`business_type` = `business_type`.`id`
                    lEFT JOIN plan_type ON 
                    `account_application`.`subscription_type` = `plan_type`.`id`
					WHERE ".$account_status_query."
					".$trans_date_query." ".$keyword_query."  ".$account_class_query."
				";
		// var_dump($sql);
		$result = $this->db->query($sql)->result();
		return $result;
	}

	public function get_data($id){
		$result = $this->db->query("SELECT 
									`province`.`province_desc`, 
									`city`.`city_desc`,
									`account_application`.*
									FROM account_application
									LEFT JOIN city ON 
									`account_application`.`city` = `city`.`id`
									LEFT JOIN province ON
									`province`.`id` = `city`.`province_id`
									WHERE `account_application`.`id` = ?", 
					array($id))->result();
		return $result;
    }
    
    public function get_outletko_data($id){
        $query = $this->db2->query("SELECT
        `account`.`id`
        , `account`.`account_id`
        , `account`.`account_name`
        , `account`.`link_name`
        , `account`.`account_pro`
        , `account`.`account_status`
        , `business_type`.`desc` AS buss_cat
        , `account`.`address`
        , `account`.`street`
        , `city`.`city_desc`
        , `province`.`province_desc`
        , `plan_type`.`plan_name`
        , `account`.`email`
        , `account`.`mobile_no`
        , CONCAT(`account`.`first_name`, ' ', `account`.`last_name`) AS `user_name`
        , DATE_FORMAT(subscription_date, '%m/%d/%Y') AS subscribe_date
        , DATE_FORMAT(renewal_date, '%m/%d/%Y') AS renewal_date
    FROM
        `account`
        INNER JOIN `city` 
            ON (`account`.`city` = `city`.`id`)
        INNER JOIN `eoutletsuite_account` 
            ON (`account`.`account_id` = `eoutletsuite_account`.`account_id`)
        INNER JOIN `business_type` 
            ON (`account`.`business_category` = `business_type`.`id`)
        INNER JOIN `province` 
            ON (`city`.`province_id` = `province`.`id`)
        INNER JOIN `plan_type` 
            ON (`eoutletsuite_account`.`subscription_type` = `plan_type`.`id`)
        WHERE `account`.`account_id` = ?", array($id))->result();
        return $query;
    }

	public function update_account($data, $id){
		$this->db->where("id", $id);
		$this->db->update("account_application", $data);
	}

	// Outletko
	public function insert_outletko(){
		$data = array();
		$data['date_insert'] = date("Y-m-d H:i:s");
		$this->db2->insert("account", $data);
        return ($this->db2->affected_rows() > 0) ? $this->db2->insert_id() : 0;		
	}

	public function insert_account_outletko($data, $id){
		$this->db2->where("id", $id);
		$this->db2->update("account", $data);
	}

	public function insert_user_outletko($data, $comp_id){
		$this->db->insert("users", $data);

		$id = $this->db2->insert_id();
		$this->db2->where("id", $comp_id);
		$this->db2->set("user_id", $id);
		$this->db2->update("account");
	}

}
