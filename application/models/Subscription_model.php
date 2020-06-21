<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $CI = &get_instance(); 
            $this->load->database();
            $this->db2 = $CI->load->database('outletko', TRUE);
            $this->db3 = $CI->load->database('admin', TRUE);
            $result = $this->login_model->check_session();
            if ($result != true){
                redirect("/");
            }
    }

    public function plan(){
        $query = $this->db3->query("SELECT  
        `plan_category`.`category_desc` AS plan_title,
        `plan_days`.`days_name` AS plan_days_name,
        `plan_days`.`days_desc` AS plan_days,
        `plan_type`.`plan_name`,
        `plan_type`.`price`,
        `plan_type`.`outlet_price`,
        `plan_type`.`id`
        FROM plan_type
        INNER JOIN plan_days ON 
        `plan_days`.`id` = `plan_type`.`plan_days`
        INNER JOIN plan_category ON 
        `plan_category`.`id` = `plan_type`.`plan_category` 
        WHERE `plan_type`.`status` = ? AND `plan_type`.`id` != ?
        ORDER BY `plan_type`.`id` ASC", array(1, 0))->result();
        return $query;
    }

    public function get_plan_type($id){
        $query = $this->db3->query("SELECT  
        `plan_category`.`category_desc` AS plan_title,
        `plan_days`.`days_name` AS plan_days_name,
        `plan_days`.`days_desc` AS plan_days,
        `plan_type`.`plan_name`,
        `plan_type`.`price` AS plan_price,
        `plan_type`.`outlet_price`,
        `plan_type`.`id`
        FROM plan_type
        INNER JOIN plan_days ON 
        `plan_days`.`id` = `plan_type`.`plan_days`
        INNER JOIN plan_category ON 
        `plan_category`.`id` = `plan_type`.`plan_category` 
        WHERE `plan_type`.`status` = ?  AND `plan_type`.`id` = ?
        ORDER BY `plan_type`.`id` ASC", array(1, $id))->result();
        return $query;    
    }


    public function get_data(){
        // $result = $this->db->query("SELECT 
        // account_application.*,
        // `city`.`city_desc`,
        // `province`.`province_desc`,
        // `province`.`id` AS prov_id
        // FROM account_application
        // LEFT JOIN city ON 
        // `city`.`id` = `account_application`.`city`
        // LEFT JOIN province ON 
        // `province`.`id` = `city`.`province_id`
        // WHERE `account_application`.`account_id` = ? ", array($this->session->userdata('account_id')))->result();

        $result = $this->db->query("SELECT 
        plan_type.*, 
        account_application.*, 
        `plan_type`.`id` AS plan_type_id, 
        `city`.`city_desc`, 
        `province`.`province_desc`,
        `province`.`id` AS prov_id,
        `invoice`.`invoice_no`
        FROM account_application 
        LEFT JOIN plan_type ON 
        account_application.subscription_type = plan_type.id
        LEFT JOIN invoice ON 
        account_application.id = invoice.comp_id
        LEFT JOIN city ON 
        account_application.city = city.id
        LEFT JOIN province ON
        city.province_id = province.id
        WHERE `account_application`.`account_id` = ? ", array($this->session->userdata('account_id')))->result();

        return $result;
    }

    public function get_partner($id){
        $result = $this->db->query("SELECT CONCAT(last_name, ', ', first_name, ' (', account_id, ')') AS full_name FROM account_application WHERE id = ?", array($id))->row();
        return $result->full_name;
    }

    public function get_plan($id){
        $result = $this->db3->query("SELECT * FROM plan_type WHERE id = ? ", array($id))->row();
        return $result->plan_name;
    }

    public function get_active_outlet(){
        $query = $this->db->query("SELECT * FROM outlet WHERE comp_id = ? AND outlet_status = ? ", array($this->session->userdata('comp_id'), "1"))->num_rows();
        return $query;    
    }

    public function update_account_pro(){
        $this->db2->where("id", $this->session->userdata('comp_id'));
        $this->db2->set("account_pro", "1");
        $this->db2->update("account");
    }

    public function update_account($outlet_qty, $renewal_date, $subscription_type, $account_status){

        $this->db->where("account_id", $this->session->userdata('account_id'));
        $this->db->set("renewal_date", date("Y-m-d", strtotime($renewal_date)));
        $this->db->set("subscription_type", $subscription_type);
        $this->db->set("outlet_no", $outlet_qty);
        $this->db->set("account_status", $account_status);
        $this->db->update("account_application");

        $this->db->set("status", $account_status);
        $this->db->where("user_type", "2");
        $this->db->where("account_id", $this->session->userdata("account_id"));
        $this->db->update("users");

    }

    public function insert_bill($data){

        $result = $this->db3->query("SELECT invoice_no FROM account_invoice ORDER BY id DESC LIMIT 1")->row();

        if (!empty($result)){
          $invoice_no = date("y").str_pad((substr($result->invoice_no, -4) + 1), 5, '0', STR_PAD_LEFT);
        }else{
          $invoice_no = date("y")."00001";
        }
  
        $data['invoice_no'] = $invoice_no;
  
        $this->db3->insert("account_invoice", $data);
  
        $insert_id = $this->db3->insert_id();
        
        $this->db3->where("id", $insert_id);
        $this->db3->update("account_invoice", $data);        
    }

    public function update_user_password($eoutletsuite_pass, $outletko_pass, $account_id){

        $this->db->set("password", password_hash($eoutletsuite_pass, PASSWORD_DEFAULT));
        $this->db->set("status", "1");
        $this->db->where("account_id", $account_id);
        $this->db->where("user_type", "2");
        $this->db->update("users");

        // $this->db->set("password", password_hash($outletko_pass, PASSWORD_DEFAULT));
        // $this->db->set("status", "1");
        // $this->db->where("account_id", $account_id);
        // $this->db->where("user_type", "4");
        // $this->db->update("users");

    }

}