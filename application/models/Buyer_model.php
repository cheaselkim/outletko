<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $CI = &get_instance(); 
            $this->load->database();
            $this->db2 = $CI->load->database('outletko', TRUE);
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function get_count_order(){
        $result = $this->db2->query("SELECT COUNT(*) AS order_no FROM buyer_order_products WHERE order_id IS NULL AND comp_id = ? ", array($this->session->userdata('comp_id')))->row();
        $this->session->set_userdata("order_no", $result->order_no);
    }

    public function check_pass($user_pass){
        $query = $this->db->query("SELECT * FROM users WHERE id = ? ", array($this->session->userdata("user_id")))->result();
        
        if (!empty($query)){
            foreach ($query as $key => $value) {
                if (password_verify($user_pass, $value->password)){ 
                    return 1;
                }else{
                    return 0;
                }           
            }
        }else{
            return 0;
        }
    }

    public function cust_del_date($id){
        $query = $this->db2->query("SELECT * FROM account WHERE id = ? ", array($id))->result();
        return $query;
    }

    public function delivery_type($id){
        $query = $this->db2->query("
            SELECT 
            delivery_type.*
            FROM delivery_type
            INNER JOIN account_delivery_type ON 
            `account_delivery_type`.`delivery_type_id` = `delivery_type`.`id`
            WHERE account_id = ? AND `account_delivery_type`.`delivery_type_check` = ?
        ", array($id, 1))->result();
        return $query;
    }

    public function payment_type($id){
        $query = $this->db2->query("
            SELECT 
            payment_type.*
            FROM payment_type
            INNER JOIN account_payment_type ON 
            `account_payment_type`.`payment_type_id` = `payment_type`.`id` 
            WHERE account_id = ? AND `payment_type`.`status` = ? AND payment_type_check = ?
        ", array($id, "1", "1"))->result();
        return $query;
    }

    public function courier($id, $weight, $city, $prov){
        // $query = $this->db2->query("SELECT 
        //     account_courier.*,
        //     `courier`.`courier`
        //     FROM account_courier
        //     INNER JOIN courier ON 
        //     `account_courier`.`courier_id` = `courier`.`id`
        //     WHERE comp_id = ? AND `account_courier`.`ship_kg` >= ?
        //     GROUP BY courier_id", array($id, $total_weight))->result();
       
        $city_query = $this->db2->query("SELECT * FROM account_coverage_city WHERE comp_id = ? AND city = ?", array($id, $city))->result();
        $query = "";
        if (!empty($city_query)){
            $query = $this->db2->query("SELECT 
            `account_coverage_shipping`.`id`,
            `courier`.`id` AS courier_id,
            `courier`.`courier`
            FROM account_coverage_shipping
            LEFT JOIN courier ON 
            courier.`id` = `account_coverage_shipping`.`courier`
            WHERE comp_id = ? AND 
            province = ? AND city IN ?
            AND `account_coverage_shipping`.`weight` >= ?
            GROUP BY `courier`.`id`", array($id, $prov, array("0", $city), $weight))->result();    
        }


        return $query;    
    }

    public function get_courier($id){
        // $query = $this->db2->query("SELECT * FROM account_courier WHERE id = ?", array($id))->result();
        $query = $this->db2->query("SELECT * FROM account_coverage_shipping WHERE id = ?", $id)->result();

        return $query;
    }

    public function get_sched_time($comp_id){
        $query = $this->db2->query("SELECT * FROM account_appointment WHERE comp_id = ?", array($comp_id))->result();
        return $query;
    }

    public function bank_list($id){
        $query = $this->db2->query("
            SELECT 
            bank_list.*
            FROM bank_list
            INNER JOIN account_bank ON 
            `account_bank`.`bank_id` = `bank_list`.`id` 
            WHERE comp_id = ? AND `account_bank`.`status` = ? AND `bank_list`.`status` = ?
        ", array($id, "1", "1"))->result();
        return $query;        
    }

    public function remittance_list($id){
        $query = $this->db2->query("
            SELECT 
            remittance_list.*
            FROM remittance_list
            INNER JOIN account_remittance ON 
            `account_remittance`.`remittance_id` = `remittance_list`.`id` 
            WHERE comp_id = ? AND `remittance_list`.`status` = ? AND `account_remittance`.`status` = ?
        ", array($id, "1", "1"))->result();
        return $query;                
    }

    public function get_bank($id, $seller_id){
        $query = $this->db2->query("
            SELECT 
            bank_list.*, account_bank.*
            FROM bank_list
            INNER JOIN account_bank ON 
            `account_bank`.`bank_id` = `bank_list`.`id` 
            WHERE `bank_list`.`id` = ? AND `account_bank`.`comp_id` = ?
        ", array($id, $seller_id))->result();
        return $query;                
    }

    public function get_remittance($id){
        $query = $this->db2->query("
            SELECT 
            CONCAT(`account`.`first_name`, ' ' , `account`.`last_name`) AS fullname,
            `account`.`remitt_name`,
            `account`.`remitt_contact`,
            `account`.`mobile_no`,
            `account`.`email`
            FROM account
            WHERE id = ? ", array($id))->result();
        return $query;
    }

    public function get_variation($variation){
        $query = $this->db2->query("SELECT `account_variation_type`.`type` AS var_type FROM account_variation_type WHERE id = ?", array($variation))->result();
        
        if (!empty($query)){
            foreach ($query as $key => $value) {
                return $value->var_type;
            }
        }else{
            return "";
        }

    }

    public function get_variation_price($variation){
        $query = $this->db2->query("SELECT `account_variation_type`.`unit_price` FROM account_variation_type WHERE id = ?", array($variation))->result();

        if (!empty($query)){
            foreach ($query as $key => $value) {
                return $value->unit_price;
            }
        }else{
            return 0;
        }

    }

    public function get_orders(){

        $query = $this->db2->query("
            SELECT 
            products.*, buyer_order_products.*, `products`.`id` as prod_id, `buyer_order_products`.`id` AS item_id,
            `account`.`account_name`
            FROM 
            buyer_order_products 
            LEFT JOIN products ON 
            `buyer_order_products`.`prod_id` = `products`.`id`            
            LEFT JOIN account ON 
            `account`.`id` = `products`.`account_id`
            WHERE 
            `buyer_order_products`.`comp_id` = ? AND 
            (order_id = '' OR order_id IS NULL ) AND `products`.`product_status` = ? 
            ORDER BY `account`.`account_name`, `products`.`product_name`
            ", array($this->session->userdata("comp_id"), "1"))->result();

        return $query;

    }

    public function get_billing(){
        // $this->db2->select("account_buyer.*, province.province_desc, city.city_desc");
        // $this->db2->join("province", "province.id = account_buyer.province", "LEFT");
        // $this->db2->join("city", "city.id = account_buyer.city", "LEFT");
        // $this->db2->from("account_buyer");
        // $this->db2->where("account_buyer.id", $this->session->userdata("comp_id"));
        // $query = $this->db2->get();
        // return $query->result();

        $query = $this->db2->query("
            SELECT 
            account_buyer.*, 
            `province`.`island_group`, 
            `province`.`province_desc`, 
            `city`.`city_desc` 
            FROM account_buyer 
            LEFT JOIN province ON 
            `province`.`id` = `account_buyer`.`province`
            LEFT JOIN city ON
            `city`.`id` = `account_buyer`.`city`    
            WHERE `account_buyer`.`id` = ?", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_order_checkout($prod_id, $item_id){
        $query = $this->db2->query("
            SELECT 
            products.*, 
            `account`.`account_name`, 
            `buyer_order_products`.`prod_qty`, 
            `products`.`id` AS prod_id,
            `buyer_order_products`.`prod_var1`,
            `buyer_order_products`.`prod_var2`,
            `buyer_order_products`.`id` AS item_id
            FROM
            products 
            LEFT JOIN buyer_order_products ON 
            `buyer_order_products`.`prod_id` = `products`.`id`            
            LEFT JOIN account ON 
            `products`.`account_id` = `account`.`id` 
            WHERE `buyer_order_products`.`id` IN ? AND `buyer_order_products`.`comp_id` = ? AND (order_id IS NULL OR order_id = '')
        ", array($item_id, $this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_std_delivery($id){
        $query = $this->db2->query("SELECT * FROM account_shipping_fee WHERE account_id = ? ", array($id));

        if (!empty($query->result())){
            $query = $query->row();            
            return $query->std_delivery;
        }else{
            return "";
        }
        // var_dump($query);
        // return $query->std_delivery;
    }

    public function insert_order(){
        $id = "";
        $order_no = "";
        $data = array();

        $query = $this->db2->query("SELECT MAX(order_no) AS order_no FROM buyer_order WHERE comp_id = ? ", $this->session->userdata('comp_id'))->result();
            
        if (!empty($query)){
            foreach ($query as $key => $value) {
                if (!empty($value->order_no)){
                    $order_no = date("Y").str_pad((substr($value->order_no, -2) + 1), 5,  '0', STR_PAD_LEFT);
                }else{
                    $order_no = date("Y")."00001";
                }
            }
        }else{
            $order_no = date("Y")."00001";
        }

        $this->db2->insert("buyer_order", array("order_no" =>  $order_no, "comp_id" => $this->session->userdata("comp_id")));
        $data['id'] = $this->db2->insert_id();
        $data['order_no'] = $order_no;

        return $data;
    }

    public function confirm_order($order, $id){
        $this->db2->where("id", $id);
        $this->db2->update("buyer_order", $order);
        return 1;
    }

    public function insert_order_no_product($prod_id, $id){
        foreach ($prod_id as $row) {
            $this->db2->where("id", $row['item_id']);
            $this->db2->where("prod_id", $row['prod_id']);
            $this->db2->where("comp_id", $this->session->userdata("comp_id"));
            $this->db2->where("order_id", NULL);
            $this->db2->set("order_id", $id);
            $this->db2->set("prod_price", $row['prod_price']);
            $this->db2->set("prod_total_price", $row['prod_total_price']);
            $this->db2->update("buyer_order_products");

        }

        return 1;

    }

    public function delete_item($id){
        $this->db2->where("id", $id);
        $this->db2->delete("buyer_order_products");

        $query_product = $this->db2->query("SELECT COUNT(*) AS prod_no FROM buyer_order_products WHERE comp_id = ? AND (order_id IS NULL OR order_id = '')", array($this->session->userdata("comp_id")))->row();

        if (!empty($query_product)){
          $this->session->set_userdata("order_no", $query_product->prod_no);
        }else{
          $this->session->set_userdata("order_no", "0");
        }

        return $query_product->prod_no;

    }

    public function get_ongoing_orders(){
        $query = $this->db2->query("
        SELECT 
            buyer_order.*, 
            `account`.`account_name`
        FROM buyer_order
        LEFT JOIN account ON 
            `account`.`id` = `buyer_order`.`seller_id`
        WHERE comp_id = ? AND status IN ? ", array($this->session->userdata("comp_id"), array("1", "2")))->result();
        return $query;
    }

    public function get_complete_orders(){
        $query = $this->db2->query("
        SELECT 
            buyer_order.*, 
            `account`.`account_name`
        FROM buyer_order
        LEFT JOIN account ON 
            `account`.`id` = `buyer_order`.`seller_id`
        WHERE comp_id = ? AND status = ? ", array($this->session->userdata("comp_id"), "3"))->result();
        return $query;
    }

    public function get_transactions_orders(){
        $query = $this->db2->query("
        SELECT 
            buyer_order.*, 
            `account`.`account_name`
        FROM buyer_order
        LEFT JOIN account ON 
            `account`.`id` = `buyer_order`.`seller_id`
        WHERE comp_id = ? AND status IN ? ", array($this->session->userdata("comp_id"), array("4", "0")))->result();
        return $query;
    }

    public function complete_order($id){
        $this->db2->where("id", $id);
        $this->db2->set("status", "4");
        $this->db2->update("buyer_order");
    }

    public function get_order_hdr($id){
        $query = $this->db2->query("
        SELECT 
            buyer_order.*, 
            DATE(`buyer_order`.`date_insert`) AS order_date,
            `account`.`account_name`,
            `delivery_type`.`delivery_type` AS `delivery_type_desc`,
            `payment_type`.`payment_type` AS `payment_type_desc`,
            `city`.`city_desc`,
            `province`.`province_desc`,
            CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
            `account_buyer`.`email`
        FROM buyer_order
        LEFT JOIN account_buyer ON 
            `account_buyer`.`id` = `buyer_order`.`comp_id`
        LEFT JOIN account ON 
            `account`.`id` = `buyer_order`.`seller_id`
        LEFT JOIN delivery_type ON
            `buyer_order`.`delivery_type` = `delivery_type`.`id`
        LEFT JOIN payment_type ON
            `buyer_order`.`payment_type` = `payment_type`.`id`
        LEFT JOIN city ON 
            `buyer_order`.`city` = `city`.`id`
        LEFT JOIN province ON 
            `buyer_order`.`province` = `province`.`id`
        WHERE `buyer_order`.`id` = ?", array($id))->result();
        return $query;
    }

    public function get_order_products($id){
        $query = $this->db2->query("
            SELECT 
                buyer_order_products.*,
                `products`.`product_name`
            FROM buyer_order_products 
            LEFT JOIN products ON 
            `buyer_order_products`.`prod_id` = `products`.`id`
            WHERE `buyer_order_products`.`order_id` = ?
        ", array($id))->result();
        return $query;
    }


    /* My Account */

    public function get_account(){
        $query = $this->db2->query("
            SELECT 
            account_buyer.*,
            `city`.`city_desc`,
            `province`.`province_desc`
            FROM account_buyer 
            LEFT JOIN city ON 
            `account_buyer`.`city` = `city`.`id`
            LEFT JOIN province ON 
            `account_buyer`.`province` = `province`.`id`
            WHERE `account_buyer`.`id` = ? ", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function update_account($data){
        $this->db2->where("id", $this->session->userdata("comp_id"));
        $this->db2->update("account_buyer", $data);
    }

    public function update_user($data){
        $this->db->where("id", $this->session->userdata("user_id"));
        $this->db->update("users", $data);
    }

    public function insert_review($data){
        $this->db2->insert("reviews", $data);
    }

}