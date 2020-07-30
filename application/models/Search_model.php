<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$CI = &get_instance(); 
		$this->load->database();
		$this->db2 = $CI->load->database('outletko', TRUE);
	}

	public function search_product_outlet($prov_id, $city_id, $product){

		$prov_qry = "";
		$city_qry = "";

		// if (!empty($prov_id)){
		// 	$prov_qry = "AND `province`.`id` = '".$prov_id."'";
		// }

		// if (!empty($city_id)){
		// 	$city_qry = "AND `city`.`id` = '".$city_id."'";
		// }

		$query = $this->db2->query("
			SELECT 
			account.*,
			`city`.`city_desc`,
			`province`.`province_desc`,
			`products`.`product_description` 
			FROM account 
			LEFT JOIN province ON 
			`province`.`id` = `account`.`province`
			LEFT JOIN city ON 
			`city`.`id` = `account`.`city`
			INNER JOIN products ON 
			`account`.`id` = `products`.`account_id`
            WHERE 
            `account`.`store_status` = ? AND 
            (`products`.`product_name` LIKE ? OR `account`.`account_name` LIKE ?)
            AND `account`.`country` = ?
			 ".$prov_qry." ".$city_qry." 
			GROUP BY `account`.`account_name`
			ORDER BY `account`.`account_name`
		", array(1, '%'.$product.'%', '%'.$product.'%', $this->session->userdata("IPCountryID")))->result();

		return $query;
	}

	public function search_comp($id){
		$query = $this->db2->query("SELECT * FROM account WHERE id = ? ", array($id))->result();
		return $query;
	}


}
