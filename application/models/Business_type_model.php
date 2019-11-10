<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Business_type_model extends CI_Model {

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

    public function business_type_wo_id($business_type){
        $query = $this->db->query("SELECT * FROM business_type WHERE `business_type`.`desc` = ? ", array($business_type))->num_rows();
        return $query;
    }

    public function business_type_w_id($business_type, $id){
        $query = $this->db->query("SELECT * FROM business_type WHERE `business_type`.`desc` = ? AND id != ?", array($business_type, $id))->num_rows();
        return $query;
    }

    public function insert_business_type($insert_array){
        $this->db->insert("business_type", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_business_type($business_type,  $outlet){
        $business_type_query = "";
        $outlet_query = "";

        if ($business_type != ""){
            $business_type_query = "WHERE `business_type`.`desc` LIKE '%".$business_type."%'";
        }

        $query = $this->db->query("SELECT * FROM business_type ".$business_type_query." ORDER BY FIELD (`business_type`.`desc`, 'Wholesaler', 'Sales Service', 'Other Services'),`business_type`.`desc` ASC ")->result(); 
        return $query;
    }

    public function delete_business_type($id){
        $query = $this->db->query("DELETE FROM business_type WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM business_type WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_business_type($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("business_type", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }



}