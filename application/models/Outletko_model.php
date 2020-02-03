<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $CI = &get_instance(); 
    $this->load->database();
	$this->db2 = $CI->load->database('outletko', TRUE);
  }

  public function featured_outlet(){
    $query = $this->db2->query("SELECT * FROM account  WHERE id IN (59, 33, 60, 53, 52)  ORDER BY FIELD(ID, 59, 33, 60, 53, 52) LIMIT 0,5 ")->result();
    return $query;
  }


}