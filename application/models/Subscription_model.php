<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $CI = &get_instance(); 
            $this->load->database();
            $this->db2 = $CI->load->database('admin', TRUE);
            $result = $this->login_model->check_session();
            if ($result != true){
                redirect("/");
            }
    }

    public function get_data(){
        $result = $this->db->query("SELECT 
        account_application.*,
        `city`.`city_desc`,
        `province`.`province_desc`,
        `province`.`id` AS prov_id
        FROM account_application
        LEFT JOIN city ON 
        `city`.`id` = `account_application`.`city`
        LEFT JOIN province ON 
        `province`.`id` = `city`.`province_id`
        WHERE `account_application`.`id` = ? ", array($this->session->userdata('comp_id')))->result();
        return $result;
    }

    public function get_partner($id){
        $result = $this->db->query("SELECT CONCAT(last_name, ', ', first_name, ' (', account_id, ')') AS full_name FROM account_application WHERE id = ?", array($id))->row();
        return $result->full_name;
    }

    public function get_plan($id){
        $result = $this->db2->query("SELECT * FROM plan_type WHERE id = ? ", array($id))->row();
        return $result->plan_name;
    }

    public function get_active_outlet(){
        $query = $this->db->query("SELECT * FROM outlet WHERE comp_id = ? AND outlet_status = ? ", array($this->session->userdata('comp_id'), "1"))->num_rows();
        return $query;    
    }

    public function update_account($outlet_qty, $renewal_date, $subscription_type){

        $this->db->where("id", $this->session->userdata('comp_id'));
        $this->db->set("renewal_date", date("Y-m-d", strtotime($renewal_date)));
        $this->db->set("subscription_type", $subscription_type);
        $this->db->set("outlet_no", $outlet_qty);
        $this->db->update("account_application");

    }

    public function insert_bill($data){

        $result = $this->db2->query("SELECT invoice_no FROM account_invoice ORDER BY id DESC LIMIT 1")->row();

        if (!empty($result)){
          $invoice_no = date("y").str_pad((substr($result->invoice_no, -4) + 1), 5, '0', STR_PAD_LEFT);
        }else{
          $invoice_no = date("y")."00001";
        }
  
        $data['invoice_no'] = $invoice_no;
  
        $this->db2->insert("account_invoice", $data);
  
        $insert_id = $this->db2->insert_id();
        
        $this->db2->where("id", $insert_id);
        $this->db2->update("account_invoice", $data);        
    }

}