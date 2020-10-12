<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$CI = &get_instance(); 
		$this->load->database();
		$this->db2 = $CI->load->database('outletko', TRUE);
	}	

    public function search_store($store){
		$query = $this->db2->query("SELECT 
		id
		FROM 
		account 
		WHERE link_name = ? AND account_status = ? ", array($store, 1))->row();

        if (empty($query->id)){
            return NULL;
        }else{
            return $query->id;
        }


		// $query = $this->db2->query("SELECT id FROM account WHERE 
		// LOWER(    REPLACE(
  //       REPLACE(
  //           REPLACE(
  //               REPLACE(
  //                   REPLACE(
  //                       REPLACE(
  //                           REPLACE(
  //                               REPLACE(
  //                                   REPLACE(
  //                                       REPLACE(
  //                                           REPLACE(
  //                                               REPLACE(
  //                                                   REPLACE(
  //                                                       REPLACE(
  //                                                           REPLACE(
  //                                                               REPLACE(
  //                                                                   REPLACE(
  //                                                                       REPLACE(
  //                                                                           REPLACE(
  //                                                                               REPLACE(
  //                                                                                   REPLACE(
  //                                                                                       REPLACE(
  //                                                                                           REPLACE(
  //                                                                                               REPLACE(
  //                                                                                                   REPLACE(
  //                                                                                                       REPLACE(
  //                                                                                                           REPLACE(
  //                                                                                                               REPLACE(
  //                                                                                                                   REPLACE(
  //                                                                                                                       REPLACE(
  //                                                                                                                           REPLACE(
  //                                                                                                                               REPLACE(
  //                                                                                                                                   REPLACE(account_name, '', ''),
  //                                                                                                                               '.', ''),
  //                                                                                                                           '?', ''),
  //                                                                                                                       '`', ''),
  //                                                                                                                   '<', ''),
  //                                                                                                               '=', ''),
  //                                                                                                           '{', ''),
  //                                                                                                       '}', ''),
  //                                                                                                   '[', ''),
  //                                                                                               ']', ''),
  //                                                                                           '|', ''),
  //                                                                                       '\'', ''),
  //                                                                                   ':', ''),
  //                                                                               ';', ''),
  //                                                                           '~', ''),
  //                                                                       '!', ''),
  //                                                                   '@', ''),
  //                                                               '#', ''),
  //                                                           '$', ''),
  //                                                       '%', ''),
  //                                                   '^', ''),
  //                                               '&', ''),
  //                                           '*', ''),
  //                                       '_', ''),
  //                                   '+', ''),
  //                               ',', ''),
  //                           '/', ''),
  //                       '(', ''),
  //                   ')', ''),
  //               '-', ''),
  //           '>', ''),
  //       ' ', ''),
  //   '--', '-')) = ?
		// ", array($store))->row();

    }
    
    public function get_linkname(){
        $query = $this->db2->query("SELECT * FROM account WHERE id = ?", array($this->session->userdata("comp_id")))->row();
        return $query->link_name;
    }

    public function get_linkname_id($id){
        $query = $this->db2->query("SELECT * FROM account WHERE id = ?", array($id))->row();
        return $query->link_name;
    }

    public function all_store(){

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
			LEFT JOIN products ON 
			`account`.`id` = `products`.`account_id`
            WHERE 
            `account`.`store_status` = ?
            AND `account`.`country` = ?
			GROUP BY `account`.`account_name`
			ORDER BY `account`.`account_name`
		", array(1, $this->session->userdata("IPCountryID")))->result();

        return $query;

    }

}