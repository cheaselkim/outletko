<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resend_email_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $CI = &get_instance(); 
        $this->load->database();
        $this->db2 = $CI->load->database('outletko', TRUE);
    }

    public function search_email($email){
        $query = $this->db2->query("SELECT * FROM account WHERE email LIKE ? ", array("%".$email."%"))->result();
        return $query;
    }

    public function search_account_id($account_id){
        $query = $this->db2->query("SELECT * FROM account WHERE account_id LIKE ? ", array("%".$account_id."%"))->result();
        return $query;
    }

    public function search_account_name($account_name){
        $query = $this->db2->query("SELECT * FROM account WHERE account_name LIKE ? ", array("%".$account_name."%"))->result();
        return $query;
    }

    public function get_account_data($account_no){
        $query = $this->db->query("SELECT * FROM account_application WHERE account_no = ?", array($account_no))->result();
        return $query;
    }

}
