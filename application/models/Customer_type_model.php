<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_type_model extends CI_Model {

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

    public function customer_type_wo_id($customer_type){
        $query = $this->db->query("SELECT * FROM customer_type WHERE comp_id = ? AND customer_code_type = ? ", array($this->session->userdata('comp_id'), $customer_type))->num_rows();
        return $query;
    }

    public function customer_type_w_id($customer_type, $id){
        $query = $this->db->query("SELECT * FROM customer_type WHERE comp_id = ? AND customer_code_type = ? AND id != ?", array($this->session->userdata('comp_id'), $customer_type, $id))->num_rows();
        return $query;
    }

    public function insert_customer_type($insert_array){
        $this->db->insert("customer_type", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_customer_type($customer_type,  $outlet){
        $customer_type_query = "";
        $outlet_query = "";

        if ($customer_type != ""){
            $customer_type_query = "AND (customer_code_type LIKE '%".$customer_type."%' OR customer_name_type LIKE '%".$customer_type."%')";
        }

        if ($outlet != 0){
            $outlet_query = "AND `customer_type`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT customer_type.*, 
            (CASE WHEN (`customer_type`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM customer_type
            LEFT JOIN outlet ON 
            `customer_type`.`outlet_id` = `outlet`.`id`
            WHERE `customer_type`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$customer_type_query." ".$outlet_query." 
            ORDER BY customer_type.customer_code_type")->result(); 
        return $query;
    }

    public function delete_customer_type($id){
        $query = $this->db->query("DELETE FROM customer_type WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM customer_type WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_customer_type($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("customer_type", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("
            SELECT 
            customer_code_type AS term 
            FROM customer_type 
            WHERE comp_id = '".$comp_id."' AND customer_code_type LIKE '%".$hint."%'  
            UNION 
            SELECT 
            customer_name_type AS term 
            FROM customer_type
            WEHRE comp_id = '".$comp_id."' AND customer_name_type LIKE '%".$hint."%'");
        return $query;
    }

}