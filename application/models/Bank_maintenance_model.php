<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_maintenance_model extends CI_Model {

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

    public function bank_maintenance_wo_id($bank, $account){
        $query = $this->db->query("SELECT * FROM comp_bank WHERE comp_id = ? AND (bank_code = ?  OR account_no = ?)", array($this->session->userdata('comp_id'), $bank, $account))->num_rows();
        return $query;
    }

    public function bank_maintenance_w_id($bank, $account, $id){
        $query = $this->db->query("SELECT * FROM comp_bank WHERE comp_id = ? AND id != ? AND (bank_code = ? OR account_no = ?)", array($this->session->userdata('comp_id'), $id, $bank, $account))->num_rows();
        return $query;
    }

    public function insert_bank_maintenance($insert_array){
        $this->db->insert("comp_bank", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_bank_maintenance($bank_name,  $outlet){
        $bank_name_query = "";
        $outlet_query = "";

        if ($bank_name != ""){
            $bank_name_query = "AND CONCAT(`comp_bank`.`bank_name`,'(#', `comp_bank`.`account_no`, ')') LIKE '%".$bank_name."%'";
        }

        if ($outlet != 0){
            $outlet_query = "AND `comp_bank`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT comp_bank.*, 
            (CASE WHEN (`comp_bank`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM comp_bank
            LEFT JOIN outlet ON 
            `comp_bank`.`outlet_id` = `outlet`.`id`
            WHERE `comp_bank`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$bank_name_query." ".$outlet_query." 
            ORDER BY bank_code")->result(); 
        return $query;
    }

    public function find_bank_maintenance($id){
        $query = $this->db->query("SELECT * FROM comp_bank WHERE id = ?", array($id))->num_rows();
        return $query;
    }

    public function delete_bank_maintenance($id){
        $query = $this->db->query("DELETE FROM comp_bank WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM comp_bank WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_bank_maintenance($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("comp_bank", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT CONCAT(`comp_bank`.`bank_name`,'(#', `comp_bank`.`account_no`, ')') AS term FROM comp_bank WHERE comp_id = '".$comp_id."' and (bank_name like '%".$hint."%' or account_no like '%".$hint."%') 
            ORDER BY bank_name");
        return $query;
    }

}