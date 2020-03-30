<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function user_outlet(){
    $query = $this->db->query("SELECT outlet_id FROM user_outlet WHERE user_id = ? AND outlet_id = ?", array($this->session->userdata("user_id"), "0"))->num_rows();
    return $query;
  }

  public function count_outlet(){
    if ($this->session->userdata("all_access") == "1"){
      $result = $this->db->query("
        SELECT         
        `outlet`.`id` AS outlet_id,
        `outlet`.`outlet_code` AS outlet_code,
        `outlet`.`outlet_name` AS outlet_name
         FROM outlet
         WHERE comp_id = ? ", array($this->session->userdata("comp_id")));
    }else{
      $result = $this->db->query("SELECT 
        `outlet`.`id` AS outlet_id,
        `outlet`.`outlet_code` AS outlet_code,
        `outlet`.`outlet_name` AS outlet_name
        FROM user_outlet
        INNER JOIN outlet ON 
        `user_outlet`.`outlet_id` = `outlet`.`id`
        WHERE `user_outlet`.`user_id` = ?", array($this->session->userdata("user_id")));      
    }
    return $result;
  }

  public function find_user_outlet(){
    $result = $this->db->query("
      SELECT 
      `outlet`.`id` AS outlet_id,
      `outlet`.`outlet_code` AS outlet_code,
      `outlet`.`outlet_name` AS outlet_name
      FROM user_outlet
      INNER JOIN outlet ON 
      `user_outlet`.`outlet_id` = `outlet`.`id`
      WHERE `user_outlet`.`user_id` = ?", array($this->session->userdata("user_id")))->result();

    return $result;
  }

  public function all_outlet(){
    $result = $this->db->query("
      SELECT       
      `outlet`.`id` AS outlet_id,
      `outlet`.`outlet_code` AS outlet_code,
      `outlet`.`outlet_name` AS outlet_name
      FROM outlet WHERE comp_id = ?" , 
      array($this->session->userdata('comp_id')))->result();
    return $result;
  }

  public function select_outlet($id){
    $result = $this->db->query("SELECT outlet_code FROM outlet WHERE id = ?", array($id))->result();
    return $result;
  }

  public function all_access(){
    $result = $this->db->query("SELECT all_access FROM users WHERE id = ?", array($this->session->userdata("user_id")))->row();
    return $result->all_access;
  }

  public function module_access(){
    $result = $this->db->query("SELECT DISTINCT(module_id) FROM user_roles_trans WHERE user_id = ? AND outlet_id = ?", array($this->session->userdata("user_id"), $this->session->userdata("outlet_id")))->result();
    return $result;
  }

  public function function_roles($module){
    $result = $this->db->query("SELECT * FROM function_modules WHERE module = ?", array($module))->result();
    return $result;
  }

  public function user_roles($module){
    $result = $this->db->query("SELECT * FROM user_roles_trans WHERE user_id = ? AND module_id = ? AND outlet_id = ?", array($this->session->userdata("user_id"), $module, $this->session->userdata("outlet_id")));
    return $result;
  }

  public function get_module_name($module){
    $result = $this->db->query("SELECT module_desc FROM module WHERE id = ?", array($module));
    return $result;
  }

  public function get_submodule($module){
    $result = $this->db->query("SELECT * FROM sub_module WHERE module_id = ?", array($module))->result();
    return $result;
  }

  public function get_last_trans(){
    $result = $this->db->query("SELECT LPAD((MAX(trans_no)), 5, '0') AS last_trans FROM sales_transaction_hdr WHERE outlet_id = ? AND user = ?", array($this->session->userdata('outlet_id'), $this->session->userdata("user_id")))->row();
    return $result->last_trans;
  }

  public function get_no_of_trans_for_today(){

    if (strlen($this->session->userdata("account_id")) == 7){
      $result = $this->db->query("SELECT COUNT(id) AS total_trans FROM sales_transaction_hdr WHERE DATE(trans_date) = ? AND comp_id = ?", array(date("Y-m-d"), $this->session->userdata('comp_id')))->row();
    }else{
      $result = $this->db->query("SELECT COUNT(id) AS total_trans FROM sales_transaction_hdr WHERE DATE(trans_date) = ? AND outlet_id = ? AND user = ? ", array(date("Y-m-d"), $this->session->userdata('outlet_id'), $this->session->userdata('user_id')))->row();
    }

    return $result->total_trans;
  }

  public function get_total_sales_for_today(){
    if (strlen($this->session->userdata("account_id")) == 7){
      $result = $this->db->query("SELECT SUM(total_amount) AS total_sales FROM sales_transaction_hdr WHERE DATE(trans_date) = ? AND comp_id = ? AND status != '0' ", array(date("Y-m-d"),$this->session->userdata('comp_id')))->row();      
    }else{
      $result = $this->db->query("SELECT SUM(total_amount) AS total_sales FROM sales_transaction_hdr WHERE DATE(trans_date) = ? AND outlet_id = ? AND user = ? AND status != '0' ", array(date("Y-m-d"),$this->session->userdata('outlet_id'), $this->session->userdata("user_id")))->row();            
    }

    return $result->total_sales;
  }

}
