<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_type_model extends CI_Model {

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

    public function outlet_type_wo_id($outlet_type){
        $query = $this->db->query("SELECT * FROM outlet_type WHERE comp_id = ? AND outlet_type_code = ? ", array($this->session->userdata('comp_id'), $outlet_type))->num_rows();
        return $query;
    }

    public function outlet_type_w_id($outlet_type, $id){
        $query = $this->db->query("SELECT * FROM outlet_type WHERE comp_id = ? AND outlet_type_code = ? AND id != ?", array($this->session->userdata('comp_id'), $outlet_type, $id))->num_rows();
        return $query;
    }

    public function insert_outlet_type($insert_array){
        $this->db->insert("outlet_type", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_outlet_type($outlet_type,  $outlet){
        $outlet_type_query = "";
        $outlet_query = "";

        if ($outlet_type != ""){
            $outlet_type_query = "AND outlet_type_name LIKE '%".$outlet_type."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `outlet_type`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT outlet_type.*, 
            (CASE WHEN (`outlet_type`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM outlet_type
            LEFT JOIN outlet ON 
            `outlet_type`.`outlet_id` = `outlet`.`id`
            WHERE `outlet_type`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$outlet_type_query." ".$outlet_query." 
            ORDER BY outlet_type_code")->result(); 
        return $query;
    }

    public function delete_outlet_type($id){
        $query = $this->db->query("DELETE FROM outlet_type WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM outlet_type WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_outlet_type($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("outlet_type", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT outlet_type_name as term FROM outlet_type where comp_id = '".$comp_id."' and (outlet_type_name like '%".$hint."%' or outlet_type_code like '%".$hint."%') 
            ORDER BY color_desc");
        return $query;
    }

}