<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_brand_model extends CI_Model {

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

    public function product_brand_wo_id($product_brand){
        $query = $this->db->query("SELECT * FROM product_brand WHERE comp_id = ? AND brand_code = ? ", array($this->session->userdata('comp_id'), $product_brand))->num_rows();
        return $query;
    }

    public function product_brand_w_id($product_brand, $id){
        $query = $this->db->query("SELECT * FROM product_brand WHERE comp_id = ? AND brand_code = ? AND id != ?", array($this->session->userdata('comp_id'), $product_brand, $id))->num_rows();
        return $query;
    }

    public function insert_product_brand($insert_array){
        $this->db->insert("product_brand", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_brand($brand_desc,  $outlet){
        $brand_desc_query = "";
        $outlet_query = "";

        if ($brand_desc != ""){
            $brand_desc_query = "AND brand_desc LIKE '%".$brand_desc."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_brand`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_brand.*, 
            (CASE WHEN (`product_brand`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_brand
            LEFT JOIN outlet ON 
            `product_brand`.`outlet_id` = `outlet`.`id`
            WHERE `product_brand`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$brand_desc_query." ".$outlet_query." 
            ORDER BY brand_code")->result(); 
        return $query;
    }

    public function find_product_brand($id){
        $query = $this->db->query("SELECT * FROM products WHERE brand_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_prod_brand($id){
        $query = $this->db->query("DELETE FROM product_brand WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_brand WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_brand($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_brand", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT brand_desc as term FROM product_brand where comp_id = '".$comp_id."' and (brand_code like '%".$hint."%' or brand_desc like '%".$hint."%') 
            ORDER BY brand_desc");
        return $query;
    }

}