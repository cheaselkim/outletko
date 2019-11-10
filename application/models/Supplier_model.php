<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function supplier_no(){
        $query = $this->db->query("SELECT MAX(supp_code) AS supp_code FROM supplier WHERE comp_id = ?", array($this->session->userdata("comp_id")))->row();
        return str_pad(($query->supp_code + 1), 5, "0", STR_PAD_LEFT);
    }

    public function supplier_type(){
        $query = $this->db->query("SELECT * FROM supplier_type WHERE comp_id = ? ", array($this->session->userdata('comp_id')))->result();
        return $query;
    }

    public function business_nature(){
        $query = $this->db->query("SELECT * FROM supplier_business_nature")->result();
        return $query;
    }

    public function get_classification(){
        $query = $this->db->query("SELECT * FROM supplier_classification")->result();
        return $query;
    }

    public function get_organization(){
        $query = $this->db->query("SELECT * FROM supplier_organization")->result();
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

    public function search_supp_city($supp_city){
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
            LIMIT 10", array($supp_city.'%'))->result();
        return $query;
    }

    public function supplier_wo_id($supp_name){
        $query = $this->db->query("SELECT * FROM supplier WHERE comp_id = ? AND supp_name = ? ", array($this->session->userdata("comp_id"), $supp_name))->num_rows();
        return $query;
    }

    public function supplier_w_id($supp_name, $id){
        $query = $this->db->query("SELECT * FROM supplier WHERE comp_id = ? AND supp_name = ? AND id != ?", array($this->session->userdata("comp_id"), $supp_name, $id))->num_rows();
        return $query;
    }

    public function supp_name($supp_name){
        $query = $this->db->query("SELECT 
                                    `supplier`.`supp_code`,
                                    `supplier`.`supp_name`,
                                    `city`.`city_desc`
                                    FROM supplier
                                    LEFT JOIN city ON 
                                    `city`.`id` = `supplier`.`supp_city_id`
                                    WHERE comp_id = ? 
                                    AND supp_name LIKE ? 
                                    ORDER BY supp_code", 
                                    array($this->session->userdata("comp_id"), $supp_name."%"))->result();
        return $query;
    }

    public function save_supplier($supplier_hdr) {
        $this->db->insert('supplier', $supplier_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function supplier_list($term,$type,$outlet,$status){

        if($term!=""){
            $str1 = "and (supp_code = '".$term."' or supp_name = '".$term."')";
        }else{
            $str1="";
        }
        
        if($type!=""){
            $str2 = "and supp_type like '%".$type."%' ";
        }else{
            $str2="";
        }
        
        if($outlet!=""){
            $str3 = "and outlet_id like '%".$outlet."%' ";
        }else{
            $str3="";
        }
        
        if($status!=""){
            $str4 = "and supp_status like '%".$status."%' ";
        }else{
            $str4="";
        }
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT *,`supplier`.id as table_id FROM supplier 
            LEFT JOIN supplier_business_nature ON 
            `supplier_business_nature`.`id` = `supplier`.`business_nature` 
            LEFT JOIN supplier_classification ON 
            `supplier_classification`.`id` = `supplier`.`classification`
            LEFT JOIN supplier_organization ON 
            `supplier_organization`.`id` = `supplier`.`organization_form`
            LEFT JOIN status ON 
            `status`.`id` = `supplier`.`supp_status`  
            LEFT JOIN supplier_type ON 
            `supplier_type`.`id` = `supplier`.`supp_type`
            LEFT JOIN outlet ON
            `supplier`.`outlet_id` = `outlet`.`id`
            Left join city ON 
            `city`.id = `supplier`.supp_city_id  
            WHERE `supplier`.`comp_id` = '".$comp_id."'   ".$str2." ".$str3." ".$str4." ".$str1." ")->result();
        return $query;
    }

    public function get_supplier_dtl($id){
        $query = $this->db->query("SELECT * from supplier 
            left join city on `city`.id = `supplier`.supp_city_id  
            left join province on `province`.id = `supplier`.supp_province_id 
            where `supplier`.id = '".$id."' ")->result();
        return $query;
    }

    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT supp_code as term, supp_name as term FROM supplier where comp_id = '".$comp_id."' and (supp_code like '%".$hint."%' or supp_name like '%".$hint."%') ");
        return $query;
    }

    public function update_supplier($supplier_hdr,$supplier_id) {
        $this->db->where('id',$supplier_id);
        $this->db->update('supplier',$supplier_hdr);
    }

    public function delete_supplier($id){
        $query = $this->db->query("DELETE FROM supplier WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
