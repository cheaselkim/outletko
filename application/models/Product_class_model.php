<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_class_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function product_category(){
        $result = $this->db->query("SELECT * FROM product_category WHERE comp_id = ? AND outlet_id IN ?", array($this->session->userdata("comp_id"), array("0", $this->session->userdata("outlet_id"))))->result();
        return $result;
    }

    public function company(){
        $result = $this->db->query("SELECT * FROM account_application WHERE id = ?", array($this->session->userdata("comp_id")))->row();
        return $result->account_name;
    }

    public function outlet(){
    	$result = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
    	return $result;
    }

    public function product_class_wo_id($product_class){
        $query = $this->db->query("SELECT * FROM product_class WHERE comp_id = ? AND class_code = ? ", array($this->session->userdata('comp_id'), $product_class))->num_rows();
        return $query;
    }

    public function product_class_w_id($product_class, $id){
        $query = $this->db->query("SELECT * FROM product_class WHERE comp_id = ? AND class_code = ? AND id != ?", array($this->session->userdata('comp_id'), $product_class, $id))->num_rows();
        return $query;
    }

    public function insert_product_class($insert_array){
        $this->db->insert("product_class", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_class($class_code, $class_name, $category, $outlet){
        $class_code_query = "";
        $class_name_query = "";
        $category_query = "";
        $outlet_query = "";

        if ($class_code != ""){
            $class_code_query = "AND class_code LIKE '%".$class_code."%'";
        }

        if ($class_name != ""){
            $class_name_query = "AND class_name LIKE '%".$class_name."%'";
        }

        if ($category != 0){
            $category_query = "AND class_category = '".$category."'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_class`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("
            SELECT product_class.*, `product_category`.`category_name`,
            (CASE WHEN (`product_class`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_class
            LEFT JOIN outlet ON 
            `product_class`.`outlet_id` = `outlet`.`id`
            LEFT JOIN product_category ON
            `product_category`.`id` = `product_class`.`class_category`
            WHERE `product_class`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$class_code_query." ".$class_name_query." ".$category_query." ".$outlet_query." 
            ORDER BY category_code, class_code")->result(); 
        return $query;
    }

    public function find_product_class($id){
        $query = $this->db->query("SELECT * FROM products WHERE class_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_prod_class($id){
        $query = $this->db->query("DELETE FROM product_class WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_class WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_class($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_class", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT class_desc as term FROM product_class where comp_id = '".$comp_id."' and (class_name like '%".$hint."%' or class_desc like '%".$hint."%') 
            ORDER BY class_desc");
        return $query;
    }

}