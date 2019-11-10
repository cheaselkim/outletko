<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_unit_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function company(){
        $result = $this->db->query("SELECT * FROM account_application WHERE id = ?", array($this->session->userdata("comp_id")))->row();
        return $result->account_name;
    }

    public function outlet(){
    	$result = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
    	return $result;
    }

    public function product_unit_wo_id($product_unit){
        $query = $this->db->query("SELECT * FROM product_unit WHERE comp_id = ? AND unit_code = ? ", array($this->session->userdata('comp_id'), $product_unit))->num_rows();
        return $query;
    }

    public function product_unit_w_id($product_unit, $id){
        $query = $this->db->query("SELECT * FROM product_unit WHERE comp_id = ? AND unit_code = ? AND id != ?", array($this->session->userdata('comp_id'), $product_unit, $id))->num_rows();
        return $query;
    }

    public function insert_product_unit($insert_array){
        $this->db->insert("product_unit", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_unit($unit_desc,  $outlet){
        $unit_desc_query = "";
        $outlet_query = "";

        if ($unit_desc != ""){
            $unit_desc_query = "AND (unit_name LIKE '%".$unit_desc."%' OR unit_desc LIKE '%".$unit_desc."%')";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_unit`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_unit.*, 
            (CASE WHEN (`product_unit`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_unit
            LEFT JOIN outlet ON 
            `product_unit`.`outlet_id` = `outlet`.`id`
            WHERE `product_unit`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$unit_desc_query." ".$outlet_query." 
            ORDER BY unit_code")->result(); 
        return $query;
    }

    public function find_product_unit($id){
        $query = $this->db->query("SELECT * FROM products WHERE stock_unit_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_prod_unit($id){
        $query = $this->db->query("DELETE FROM product_unit WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_unit WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_unit($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_unit", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT unit_desc as term FROM product_unit where comp_id = '".$comp_id."' and (unit_name like '%".$hint."%' or unit_desc like '%".$hint."%') 
            ORDER BY unit_desc");
        return $query;
    }

}