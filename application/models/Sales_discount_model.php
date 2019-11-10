<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_discount_model extends CI_Model {

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

    public function sales_discount_wo_id($sales_discount){
        $query = $this->db->query("SELECT * FROM sales_discount WHERE comp_id = ? AND sales_discount_code = ? ", array($this->session->userdata('comp_id'), $sales_discount))->num_rows();
        return $query;
    }

    public function sales_discount_w_id($sales_discount, $id){
        $query = $this->db->query("SELECT * FROM sales_discount WHERE comp_id = ? AND sales_discount_code = ? AND id != ?", array($this->session->userdata('comp_id'), $sales_discount, $id))->num_rows();
        return $query;
    }

    public function insert_sales_discount($insert_array){
        $this->db->insert("sales_discount", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_sales_discount($color_desc,  $outlet){
        $color_desc_query = "";
        $outlet_query = "";

        if ($color_desc != ""){
            $color_desc_query = "AND sales_discount_name LIKE '%".$color_desc."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `sales_discount`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT sales_discount.*, 
            (CASE WHEN (`sales_discount`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM sales_discount
            LEFT JOIN outlet ON 
            `sales_discount`.`outlet_id` = `outlet`.`id`
            WHERE `sales_discount`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$color_desc_query." ".$outlet_query." 
            ORDER BY sales_discount_code")->result(); 
        return $query;
    }

    public function find_sales_discount($id){
        $query = $this->db->query("SELECT * FROM sales_discount WHERE color_id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_sales_discount($id){
        $query = $this->db->query("DELETE FROM sales_discount WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM sales_discount WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_sales_discount($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("sales_discount", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT sales_discount_name as term FROM sales_discount where comp_id = '".$comp_id."' and (sales_discount_code like '%".$hint."%' or sales_discount_name like '%".$hint."%') 
            ORDER BY sales_discount_name");
        return $query;
    }

}


