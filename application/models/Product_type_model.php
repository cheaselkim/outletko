<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type_model extends CI_Model {

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

    public function insert_product_type($insert_array){
        $this->db->insert("product_type", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_product_type($type_desc,  $outlet){
        $type_desc_query = "";
        $outlet_query = "";

        if ($type_desc != ""){
            $type_desc_query = "AND brand_desc LIKE %'".$type_desc."'%";
        }

        if ($outlet != 0){
            $outlet_query = "AND `product_type`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT product_type.*, 
            (CASE WHEN (`product_type`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM product_type
            LEFT JOIN outlet ON 
            `product_type`.`outlet_id` = `outlet`.`id`
            WHERE `product_type`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$type_desc_query." ".$outlet_query." ")->result(); 
        return $query;
    }

    public function delete_prod_type($id){
        $query = $this->db->query("DELETE FROM product_type WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM product_type WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_product_type($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("product_type", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}