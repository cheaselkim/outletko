<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category_model extends CI_Model {

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

    public function product_category_wo_id($product_brand){
        $query = $this->db->query("SELECT * FROM product_category WHERE comp_id = ? AND category_code = ? ", array($this->session->userdata('comp_id'), $product_brand))->num_rows();
        return $query;
    }

    public function product_category_w_id($product_brand, $id){
        $query = $this->db->query("SELECT * FROM product_category WHERE comp_id = ? AND category_code = ? AND id != ?", array($this->session->userdata('comp_id'), $product_brand, $id))->num_rows();
        return $query;
    }

    public function insert_product_category($insert_array){
        $this->db->insert("product_category", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_category($category_code, $category_name, $outlet){
        $category_code_query = "";
        $category_name_query = "";
        $outlet_query = "";

        if ($category_code != ""){
            $category_code_query = "AND category_code LIKE '%".$category_code."%'";
        }

        if ($category_name != ""){
            $category_name_query = "AND category_name LIKE '%".$category_name."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_category`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_category.*, 
            (CASE WHEN (`product_category`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_category
            LEFT JOIN outlet ON 
            `product_category`.`outlet_id` = `outlet`.`id`
            WHERE `product_category`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$category_code_query." ".$category_name_query." ".$outlet_query." 
            ORDER BY category_code")->result(); 
        return $query;
    }

    public function product_category($id){
        $query = $this->db->query("SELECT * FROM category_id WHERE comp_id", array($this->session->userdata("category_id")))->num_rows();
        return $query;
    }

    public function delete_prod_category($id){
        $query = $this->db->query("DELETE FROM product_category WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_category WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_category($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_category", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT category_desc as term FROM product_category where comp_id = '".$comp_id."' and (category_desc like '%".$hint."%' or category_name like '%".$hint."%') 
            ORDER BY category_desc");
        return $query;
    }

}