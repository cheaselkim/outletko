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
		WHERE LOWER(REPLACE(account.account_name, ' ', '')) = ? ", array($store))->row();
		return $query->id;
	}

}