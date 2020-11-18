<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $CI = &get_instance(); 
        $this->load->database();
        $this->db2 = $CI->load->database('outletko', TRUE);
    }

    public function validate_email($email){

        $result = 0;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = 0;
        }else{
            $result = $this->db2->query("SELECT * FROM account_buyer WHERE email = ? AND temporary = ? ", array($email,0))->num_rows();
            if ($result > 0){
                $result = 1;
            }else{
                $result = 2;
            }
        }

        return $result;
    }

    public function search_city($city){
        $query = $this->db2->query("SELECT 
            province_desc,
            city_desc,
            island_group,
             `city`.`province_id` AS prov_id,
             `city`.`id` AS city_id
            FROM province 
            INNER JOIN city ON
            `city`.`province_id` = `province`.`id`
            WHERE CONCAT(city_desc, ', ' , province_desc) LIKE ? AND `province`.`country` = ? 
            ORDER BY city_desc, province_desc
            LIMIT 10", array($city.'%', $this->session->userdata("IPCountryID")))->result();
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

    public function cust_del_date($id){
        $query = $this->db2->query("SELECT * FROM account WHERE id = ? ", array($id))->result();
        return $query;
    }

    public function courier($id, $weight, $city, $prov){
        $city_query = $this->db2->query("SELECT * FROM account_coverage_city WHERE comp_id = ? AND city = ?", array($id, $city))->result();
        $query = "";
        
        if ($weight != 0){
            $weight = $weight/1000;
        }

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
        $query = $this->db2->query("SELECT * FROM account_coverage_shipping WHERE id = ?", $id)->result();

        return $query;
    }

    public function buyer_account($data){
        $this->db2->insert("account_buyer", $data);
        return $this->db2->insert_id();
    }

    public function get_order_no(){
        $id = "";
        $order_no = "";
        $data = array();
        $order_no = date("Y")."00001";
        $this->db2->insert("buyer_order", array("order_no" =>  $order_no));
        $data['id'] = $this->db2->insert_id();
        $data['order_no'] = $order_no;

        return $data;    
    }

    
    public function insert_order_hdr($order, $id){
        $this->db2->where("id", $id);
        $this->db2->update("buyer_order", $order);
        return 1;
    }

    public function insert_order($prod_id, $id, $comp_id){
        foreach ($prod_id as $row) {
            $data = array(
                "comp_id" => $comp_id,
                "order_id" => $id,
                "prod_id" => $row['prod_id'],
                "prod_var1" => $row['prod_var1'],
                "prod_var2" => $row['prod_var2'],
                "prod_qty" => $row['prod_qty'],
                "prod_price" => $row['prod_price'],
                "prod_total_price" => $row['prod_total_price'],
                "date_insert" => date("Y-m-d H:i:s")
            );

            $this->db2->insert("buyer_order_products", $data);
        }

        return 1;

    }

    public function check_id($id){
        $id = substr($id, 6);
        $id = substr($id, 0, -5);

        $query = $this->db2->query("SELECT * FROM buyer_order WHERE id = ? ", array($id))->num_rows();
        return $query;
    }

    public function get_payment_details($id){
        $id = substr($id, 6);
        $id = substr($id, 0, -5);

        $paytype = $this->db2->query("SELECT  
        *
        FROM buyer_order WHERE `buyer_order`.`id` = ?", array($id))->result();

        $payment_type = "";
        $order_no = "";
        $payment_method = "";
        $seller_id = "";
        $query = "";

        if (!empty($paytype)){
            foreach ($paytype as $key => $value) {
                $payment_type = $value->payment_type;
                $payment_method = $value->payment_method;
                $seller_id = $value->seller_id;
                $order_no = $value->order_no;
            }
        }

        
        if ($payment_type == "5"){
            //Bank Deposit
            $query = $this->db2->query("SELECT 
            bank_list.bank_name as payvia,
            account_bank.*
            FROM account_bank
            LEFT JOIN bank_list ON
            account_bank.id = bank_list.id
            WHERE `account_bank`.`bank_id` = ? AND comp_id = ?", array($payment_method, $seller_id))->result();
        }else if ($payment_type == "6"){
            $query = $this->db2->query("SELECT 
            remittance_list.name as payvia,
            `account`.`remitt_contact` AS account_name,
            `account`.`remitt_name` AS account_no,
            account_remittance.*
            FROM 
            account_remittance 
            LEFT JOIN remittance_list ON
            remittance_list.id = account_remittance.remittance_id
            LEFT JOIN account ON 
            `account_remittance`.`comp_id` = `account`.`id`
            WHERE `account_remittance`.`remittance_id` = ? AND comp_id = ?", array($payment_method, $seller_id))->result();
        }else{

        }

        $data['payment_type'] = $payment_type;
        $data['payment_method'] = $payment_method;
        $data['order_no'] = $order_no;
        $data['query'] = $query;

        return $data;


    }

    public function save_proof($data, $id){
        $this->db2->insert("buyer_proof", $data);
        
        $id = substr($id, 6);
        $id = substr($id, 0, -5);

        $this->db2->where("id", $id);
        $this->db2->set("status", 3);
        $this->db2->update("buyer_order");
    
    }

    // get track order
    public function get_track_order($email, $order_no){
        $query = $this->db2->query("SELECT 
        buyer_order.*,
        `account`.`account_name`
        FROM buyer_order 
        INNER JOIN account_buyer ON 
        `account_buyer`.`id` = `buyer_order`.`comp_id` 
        INNER JOIN account ON 
        `account`.`id` = `buyer_order`.`seller_id`
        WHERE `account_buyer`.`email` = ? 
        AND `buyer_order`.`order_no` = ? ", 
        array($email, $order_no))->result();
        return $query;
    }

    // Get Order

    public function get_order_hdr($order_id){
        $query = $this->db2->query("SELECT 
        city.city_desc,
        province.province_desc AS prov_desc,
        delivery_type.delivery_type AS deltype_name,
        courier.courier AS courier_name,
        payment_type.payment_type AS paytype_name,
        `account`.`account_name` AS comp_name,
        buyer_order.*,
        account_buyer.first_name,
        account_buyer.last_name
        FROM 
        buyer_order
        INNER JOIN account_buyer ON 
        account_buyer.id = buyer_order.comp_id 
        LEFT JOIN account ON 
        account.id = buyer_order.seller_id
        LEFT JOIN city ON 
        buyer_order.city = city.id
        LEFT JOIN province ON 
        buyer_order.province = province.id
        LEFT JOIN delivery_type ON
        buyer_order.delivery_type = delivery_type.id
        LEFT JOIN courier ON
        buyer_order.courier = courier.id
        LEFT JOIN payment_type ON 
        buyer_order.payment_type = payment_type.id
        WHERE buyer_order.id = ?", array($order_id))->result();
        return $query;
    }

    public function get_order_dtl($order_id){
        $query = $this->db2->query("SELECT 
        buyer_order_products.*,
        products.product_name,
        products.img_location
        FROM buyer_order_products
        LEFT JOIN products ON 
        buyer_order_products.prod_id = products.id  
        WHERE order_id = ?", array($order_id))->result();
        return $query;
    }

    public function get_bank($id){
        $query = $this->db2->query("SELECT * FROM bank_list WHERE id = ? ", array($id))->row();
        return $query->bank_name;
    }

    public function get_remittance($id){
        $query = $this->db2->query("SELECT * FROM remittance_list WHERE id = ? ", array($id))->row();
        return $query->name;
    }

    public function get_buyer_data($id){
        $query = $this->db2->query("SELECT 
        buyer_order.*, 
        account_buyer.email,
        account_buyer.first_name,
        account_buyer.last_name,
        account.account_name AS seller_name
        FROM buyer_order 
        LEFT JOIN account_buyer ON
        buyer_order.comp_id = account_buyer.id 
        LEFT JOIN account ON 
        account.id = buyer_order.seller_id
        WHERE `buyer_order`.`id` = ? ", array($id))->row();
        
        $data['name'] = $query->first_name." ".$query->last_name;
        $data['email'] = $query->email;
        $data['order_id'] = $query->id;
        $data['seller_name'] = $query->seller_name;
        $data['order_no'] = $query->order_no;
        $data['order_date'] = date("F d, Y H:i:s", strtotime($query->date_insert));
        return $data;
    }

}