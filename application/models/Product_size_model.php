<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_size_model extends CI_Model {

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

    public function product_size_w_id($product_size){
        $query = $this->db->query("SELECT * FROM product_size WHERE comp_id = ? AND size_code = ? ", array($this->session->userdata('comp_id'), $product_size))->num_rows();
        return $query;
    }

    public function product_size_wo_id($product_size, $id){
        $query = $this->db->query("SELECT * FROM product_size WHERE comp_id = ? AND size_code = ? AND id = ?", array($this->session->userdata('comp_id'), $product_size, $id))->num_rows();
        return $query;
    }

    public function insert_product_size($insert_array){
        $this->db->insert("product_size", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_size($size_desc,  $outlet){
        $size_desc_query = "";
        $outlet_query = "";

        if ($size_desc != ""){
            $size_desc_query = "AND size_desc LIKE '%".$size_desc."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_size`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_size.*, 
            (CASE WHEN (`product_size`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_size
            LEFT JOIN outlet ON 
            `product_size`.`outlet_id` = `outlet`.`id`
            WHERE `product_size`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$size_desc_query." ".$outlet_query." 
            ORDER BY size_code")->result(); 
        return $query;
    }

    public function find_product_size($id){
        $query = $this->db->query("SELECT * FROM products WHERE size_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_prod_size($id){
        $query = $this->db->query("DELETE FROM product_size WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_size WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_size($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_size", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT size_desc as term FROM product_size where comp_id = '".$comp_id."' and (size_name like '%".$hint."%' or size_desc like '%".$hint."%') 
            ORDER BY size_desc");
        return $query;
    }

}