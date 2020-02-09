<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$CI = &get_instance(); 
		$this->load->database();
		$this->db2 = $CI->load->database('outletko', TRUE);
	}

	public function get_order(){
        $result = $this->db2->query("SELECT COUNT(*) AS order_no FROM buyer_order WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array("1", $this->session->userdata("comp_id")))->row();	
        return $result->order_no;
	}

	public function get_process_order(){
        $result = $this->db2->query("SELECT buyer_order.*,
        	`delivery_type`.`delivery_type` AS delivery_type_name,
			CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
			`buyer_order`.`id` as buyer_order_id
			FROM buyer_order
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
			WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array("1", $this->session->userdata("comp_id")))->result();	
        return $result;

	}

	public function get_order_id($id){
		$result = $this->db2->query("
			SELECT 
				`province`.`province_desc`,
				`city`.`city_desc`,
				`courier`.`courier` AS courier_name,
				DATE_FORMAT(`buyer_order`.`date_insert`, '%m/%d/%Y') AS order_date,
				DATE_FORMAT(`buyer_order`.`delivery_date`, '%m/%d/%Y') AS delivery_date_format,
				buyer_order.*,
				CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
				`account_buyer`.`email`,
				`delivery_type`.`delivery_type` AS `delivery_type_desc`,
				`payment_type`.`payment_type` AS `payment_type_desc`,
				`delivery_type`.`id` AS `delivery_type_id`,
				`payment_type`.`id` AS `payment_type_id`,
				(CASE WHEN (`buyer_order`.`payment_type` = '5') THEN `bank_list`.`bank_name` ELSE `remittance_list`.`name` END) AS payment_method_desc
			FROM 
			buyer_order 
			LEFT JOIN province ON 
			`province`.`id` = `buyer_order`.`province`
			LEFT JOIN city ON 
			`city`.`id` = `buyer_order`.`city`
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
			LEFT JOIN payment_type ON 
			`payment_type`.`id` = `buyer_order`.`payment_type`
			LEFT JOIN bank_list ON 
			`bank_list`.`id` = `buyer_order`.`payment_method`
			LEFT JOIN remittance_list ON 
			`remittance_list`.`id` = `buyer_order`.`payment_method`
			LEFT JOIN account_courier ON 
			`account_courier`.`id` = `buyer_order`.`courier`
			LEFT JOIN courier ON 
			`courier`.`id` = `account_courier`.`courier_id`
			WHERE `buyer_order`.`id` = ?", array($id))->result();
		return $result;
	}

	public function get_order_products($id){
		$result = $this->db2->query("
		SELECT 
			`products`.`product_name`,
			`products`.`product_unit_price`,
			buyer_order_products.*
		FROM buyer_order_products
		LEFT JOIN products ON 
		`buyer_order_products`.`prod_id` = `products`.`id`
		WHERE `buyer_order_products`.`order_id` = ?
		", array($id))->result();
		return $result;
	}

	public function acknowledge_order($id){
		$this->db2->where("id", $id);
		$this->db2->set("status", "2");
		$this->db2->update("buyer_order");
	}

	public function cancel_acknowledge_order($id){
		$this->db2->where("id", $id);
		$this->db2->set("status", "0");
		$this->db2->set("date_acknowledge", date("Y-m-d H:i:s"));
		$this->db2->update("buyer_order");
	}

	public function get_close_order(){
        $result = $this->db2->query("SELECT buyer_order.*,
        	`delivery_type`.`delivery_type` AS delivery_type_name,
			CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
			`buyer_order`.`id` as buyer_order_id
			FROM buyer_order
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
			WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array("2", $this->session->userdata("comp_id")))->result();	
        return $result;

	}

	public function delivery_order($id, $courier, $track_no){
		$this->db2->where("id", $id);
		$this->db2->set("status", "3");
		$this->db2->set("courier", $courier);
		$this->db2->set("track_no", $track_no);
		$this->db2->set("date_delivered", date("Y-m-d H:i:s"));
		$this->db2->update("buyer_order");
	}


}