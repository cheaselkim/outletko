<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function company(){
        $result = $this->db->query("SELECT * FROM company WHERE id = ?", array($this->session->userdata("comp_id")))->row();
        return $result->comp_name;
    }

    public function outlet(){
    	$result = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
    	return $result;
    }

    public function product_model_wo_id($product_model){
        $query = $this->db->query("SELECT * FROM product_model WHERE comp_id = ? AND model_code = ? ", array($this->session->userdata('comp_id'), $product_model))->num_rows();
        return $query;
    }

    public function product_model_w_id($product_class, $id){
        $query = $this->db->query("SELECT * FROM product_model WHERE comp_id = ? AND model_code = ? AND id = ?", array($this->session->userdata('comp_id'), $product_model, $id))->num_rows();
        return $query;
    }

    public function insert_product_model($insert_array){
        $this->db->insert("product_model", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_model($model_desc,  $outlet){
        $model_desc_query = "";
        $outlet_query = "";

        if ($model_desc != ""){
            $model_desc_query = "AND model_desc LIKE '%".$model_desc."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_model`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_model.*, 
            (CASE WHEN (`product_model`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_model
            LEFT JOIN outlet ON 
            `product_model`.`outlet_id` = `outlet`.`id`
            WHERE `product_model`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$model_desc_query." ".$outlet_query." ")->result(); 
        return $query;
    }

    public function find_product_model($id){
        $query = $this->db->query("SELECT * FROM products WHERE model_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_prod_model($id){
        $query = $this->db->query("DELETE FROM product_model WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_model WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_model($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_model", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT model_desc as term FROM product_model where comp_id = '".$comp_id."' and (model_name like '%".$hint."%' or model_desc like '%".$hint."%') ");
        return $query;
    }
}