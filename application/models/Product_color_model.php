<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_color_model extends CI_Model {

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

    public function product_color_wo_id($product_color){
        $query = $this->db->query("SELECT * FROM product_color WHERE comp_id = ? AND color_code = ? ", array($this->session->userdata('comp_id'), $product_color))->num_rows();
        return $query;
    }

    public function product_color_w_id($product_color, $id){
        $query = $this->db->query("SELECT * FROM product_color WHERE comp_id = ? AND color_code = ? AND id != ?", array($this->session->userdata('comp_id'), $product_color, $id))->num_rows();
        return $query;
    }

    public function insert_product_color($insert_array){
        $this->db->insert("product_color", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_color($color_desc,  $outlet){
        $color_desc_query = "";
        $outlet_query = "";

        if ($color_desc != ""){
            $color_desc_query = "AND color_desc LIKE '%".$color_desc."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_color`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_color.*, 
            (CASE WHEN (`product_color`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_color
            LEFT JOIN outlet ON 
            `product_color`.`outlet_id` = `outlet`.`id`
            WHERE `product_color`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$color_desc_query." ".$outlet_query." 
            ORDER BY color_code")->result(); 
        return $query;
    }

    public function find_product_color($id){
        $query = $this->db->query("SELECT * FROM products WHERE color_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_prod_color($id){
        $query = $this->db->query("DELETE FROM product_color WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_color WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_color($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_color", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT color_desc as term FROM product_color where comp_id = '".$comp_id."' and (color_name like '%".$hint."%' or color_desc like '%".$hint."%') 
            ORDER BY color_desc");
        return $query;
    }

}