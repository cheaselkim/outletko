<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Supplier_type_model extends CI_Model {



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



    public function business_type_wo_id($supplier_type){

        $query = $this->db->query("SELECT * FROM supplier_type WHERE comp_id = ?  AND supplier_code_type = ? ", array($this->session->userdata('comp_id'), $supplier_type))->num_rows();

        return $query;

    }



    public function business_type_w_id($supplier_type, $id){

        $query = $this->db->query("SELECT * FROM supplier_type WHERE comp_id = ?  AND supplier_code_type = ? AND id != ?", array($this->session->userdata('comp_id'), $supplier_type, $id))->num_rows();

        return $query;

    }



    public function insert_business_type($insert_array){

        $this->db->insert("supplier_type", $insert_array);

        return ($this->db->affected_rows() > 0) ? true : false;

    }



    public function query_business_type($business_type,  $outlet){

        $business_type_query = "";

        $outlet_query = "";



        if ($business_type != ""){

            $business_type_query = "AND `supplier_type`.`supplier_code_type` LIKE %'".$business_type."'%";

        }



        if ($outlet != 0){

            $outlet_query = "AND `supplier_type`.`outlet_id` = '".$outlet."'";

        }



        $query = $this->db->query("SELECT supplier_type.*, 

            (CASE WHEN (`supplier_type`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc

            FROM supplier_type

            LEFT JOIN outlet ON 

            `supplier_type`.`outlet_id` = `outlet`.`id`

            WHERE `supplier_type`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$business_type_query." ".$outlet_query." 

            ORDER BY outlet_id, supplier_code_type

            ")->result(); 

        return $query;

    }



    public function delete_business_type($id){

        $query = $this->db->query("DELETE FROM supplier_type WHERE id = ?", array($id));

        return ($this->db->affected_rows() > 0) ? true : false;

    }



    public function get_transaction($id){

        $result = $this->db->query("SELECT * FROM supplier_type WHERE id = ?", array($id))->row();

        return $result;

    }



    public function update_business_type($update_array, $id){

        $this->db->where("id", $id);

        $this->db->update("supplier_type", $update_array);

        return ($this->db->affected_rows() > 0) ? true : false;

    }



}