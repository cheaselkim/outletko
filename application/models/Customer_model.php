<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function customer_no(){
        $query = $this->db->query("SELECT MAX(cust_code) AS cust_code FROM customer WHERE comp_id = ?", array($this->session->userdata("comp_id")))->row();
        return str_pad(($query->cust_code + 1), 5, "0", STR_PAD_LEFT);
    }

    public function customer_type(){
        $query = $this->db->query("SELECT * FROM customer_type WHERE comp_id IN ?", array(array("0", $this->session->userdata("comp_id"))))->result();
        return $query;
    }

    public function outlet(){
        $data = array();
        $query = $this->db->query("SELECT all_access FROM users WHERE id = '".$this->session->userdata('user_id')."'")->row();

        if ($query->all_access == "1"){
            $result = $this->db->query("SELECT * FROM outlet WHERE comp_id = '".$this->session->userdata('comp_id')."'")->result();
        }else{
            $result = $this->db->query("SELECT
                `outlet`.`id`
                , `outlet`.`outlet_code`
                , `outlet`.`outlet_name`
            FROM
                `user_outlet`
                INNER JOIN `outlet` 
                    ON (`user_outlet`.`outlet_id` = `outlet`.`id`)
            WHERE (`user_outlet`.`user_id` = '".$this->session->userdata('user_id')."');")->result();
        }

        $data['all_access'] = $query->all_access;
        $data['result'] = $result;
        return $data;
    }

    public function search_cust_city($cust_city){
        $query = $this->db->query("SELECT 
            province_desc,
            city_desc,
             `city`.`province_id` AS prov_id,
             `city`.`id` AS city_id
            FROM province 
            INNER JOIN city ON
            `city`.`province_id` = `province`.`id`
            WHERE CONCAT(city_desc, ', ' , province_desc) LIKE ?
            ORDER BY city_desc, province_desc
            LIMIT 10", array($cust_city.'%'))->result();
        return $query;
    }

    public function customer_wo_id($cust_name){
        $query = $this->db->query("SELECT * FROM customer WHERE comp_id = ? AND cust_name = ?", array($this->session->userdata("comp_id"), $cust_name))->num_rows();
        return $query;
    }

    public function customer_w_id($cust_name, $id){
        $query = $this->db->query("SELECT * FROM customer WHERE comp_id = ? AND cust_name = ? AND id != ?", array($this->session->userdata("comp_id"), $cust_name, $id))->num_rows();
        return $query;
    }

    public function cust_name($cust_name){
        $query = $this->db->query("SELECT 
                                    `customer`.`cust_code`,
                                    `customer`.`cust_name`,
                                    `city`.`city_desc`
                                    FROM customer 
                                    LEFT JOIN city ON 
                                    `city`.`id` = `customer`.`cust_city_id`
                                    WHERE comp_id = ? 
                                    AND cust_name LIKE ? 
                                    ORDER BY cust_code", 
                                    array($this->session->userdata("comp_id"), $cust_name."%"))->result();
        return $query;
    }

    public function save_customer($customer_hdr) {
        $this->db->insert('customer', $customer_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function customer_list($term,$type,$outlet,$status){
        if($term!=""){
            $str1 = "and (cust_name like '%".$term."%' or cust_code like '%".$term."%')";
        }else{
            $str1="";
        }
        
        if($type!="0"){
            $str2 = "and cust_type like '%".$type."%' ";
        }else{
            $str2="";
        }
        
        if($outlet!=""){
            $str3 = "and `customer`.`outlet_id` = '".$outlet."' ";
        }else{
            $str3="";
        }
        
        if($status!=""){
            $str4 = "and cust_status = '".$status."' ";
        }else{
            $str4="";
        }
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("
            SELECT  
            customer.*,
            `customer_type`.`customer_name_type` AS customer_type,
            `outlet`.`outlet_code`,
            `city`.`city_desc`            
            FROM customer 
            LEFT JOIN city ON 
            `city`.id = `customer`.cust_city_id  
            LEFT JOIN customer_type ON 
            `customer_type`.`id` = `customer`.`cust_type`
            LEFT JOIN outlet ON
            `customer`.`outlet_id` = `outlet`.`id`
            WHERE `customer`.`comp_id` = '".$comp_id."' 
            ".$str1." ".$str2." ".$str3." ".$str4." ")->result();
        return $query;
    }

    public function get_customer_dtl($id){
        $query = $this->db->query("
            SELECT 
                customer.*,
                `city`.`city_desc`,
                `province`.`province_desc` 
            FROM customer 
            LEFT JOIN city ON 
            `city`.id = `customer`.cust_city_id  
            LEFT JOIN province ON 
            `province`.id = `customer`.cust_province_id 
            WHERE `customer`.id = ? ", array($id))->result();
        return $query;
    }

    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT cust_code as term, cust_name as term FROM customer where comp_id = '".$comp_id."' and (cust_code like '%".$hint."%' or cust_name like '%".$hint."%') ");
        return $query;
    }

    public function update_customer($customer_hdr,$customer_id) {
        $this->db->where('id',$customer_id);
        $this->db->update('customer',$customer_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_customer($id){
        $query = $this->db->query("DELETE FROM customer WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }


 
}
