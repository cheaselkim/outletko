<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko_profile_model extends CI_Model {

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

    public function business_type(){
        $query = $this->db->query("SELECT * FROM business_type")->result();
        return $query;
    }

    public function payment_type(){
        $query = $this->db2->query("SELECT * FROM  payment_type")->result();
        return $query;
    }

    public function delivery_type(){
        $query = $this->db2->query("SELECT * FROM delivery_type")->result();
        return $query;        
    }

    public function search_city($city){
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
            LIMIT 10", array($city.'%'))->result();
        return $query;
    }


    public function get_profile_dtl($id){
        $query = $this->db2->query("
        SELECT acc.*,
        
        province_desc,
        
        city_desc,
        
        bus_type.desc as desc_cat
        
        FROM `account` as acc
        
        LEFT JOIN `province` as prov
        
        on acc.province = prov.id
        
        LEFT JOIN `city` as city
        
        on acc.city = city.id
        
        LEFT JOIN `business_type` as bus_type
        
        on acc.business_category = bus_type.id
        
        WHERE account_id ='".$id."'  ")->result();
        return $query;
    }
    
    public function get_product_category($id){
        $this->db2->select('*');
        $this->db2->from('product_category');
        $this->db2->where('account_id', $id);
        $query = $this->db2->get();
        return $query->result();
    }
    
    public function get_products($id){
        $this->db2->select('*');
        $this->db2->from('products');
        $this->db2->where('account_id', $this->session->userdata("comp_id"));
        $this->db2->where("product_status", 1);
        // $this->db2->limit(6);
        $query = $this->db2->get();
        return $query->result();
    }
    
    public function get_product_info($id){
        $this->db2->select('*');
        $this->db2->from('products');
        $this->db2->where('id', $id);
        $this->db2->limit(6);
        $query = $this->db2->get();
        return $query->result();
    }

    public function get_del_type(){
        $query = $this->db2->query("
            SELECT
                `delivery_type`.`id`,
                `delivery_type`.`delivery_type`
            FROM
            delivery_type 
            LEFT JOIN account_delivery_type ON 
            `delivery_type`.`id` = `account_delivery_type`.`delivery_type_id`
            WHERE `account_delivery_type`.`account_id` = ?
            ", array($this->session->userdata("comp_id")))->result();
        return $query;
    }
    
    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("
        SELECT city.*,
        
        province.id as province_id,
        
        province_desc
        
        FROM province
        
        LEFT JOIN city
        
        ON province.id = city.province_id
        
        WHERE (city_desc like '%".$hint."%' OR province_desc like '%".$hint."%')
        
        LIMIT 10
        ");
        return $query;
    }
    
    public function get_payment_type(){
        $query = $this->db2->query("SELECT * FROM account_payment_type WHERE account_id = ?", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_delivery_type(){
        $query = $this->db2->query("SELECT * FROM account_delivery_type WHERE account_id = ? ", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_shipping_fee(){
        $query = $this->db2->query("SELECT * FROM account_shipping_fee WHERE account_id = ? ", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_appointment(){
        $query = $this->db2->query("SELECT * FROM account_appointment WHERE comp_id = ?", array($this->session->userdata('comp_id')))->result();
        return $query;
    }
    
    public function variations(){
        $query = $this->db2->query("SELECT * FROM account_variation WHERE comp_id = ?", array($this->session->userdata('comp_id')))->result();
        return $query;
    }

    public function variation_type(){
        $query = $this->db2->query("SELECT * FROM account_variation_type WHERE comp_id = ?", array($this->session->userdata('comp_id')))->result();
        return $query;
    }

    //SAVING
    public function update_aboutus($data){
        $this->db2->where('account_id',$this->session->userdata("account_id"));
        $this->db2->update('account',$data);
        return ($this->db2->affected_rows() > 0) ? true : false;
    }

    public function save_payment_type($payment_type){

        foreach ($payment_type as $key) {

            $type_id = $key['payment_type_id'];

            $data = array(
                "payment_type_id" => $key['payment_type_id'],
                "payment_type_check" => $key['payment_type_check']
                );

            $query = $this->db2->query("SELECT id FROM account_payment_type WHERE account_id = ? AND payment_type_id = ?", array($this->session->userdata("comp_id"), $type_id))->row();

            if (!empty($query->id)){
                $this->db2->where("account_id", $this->session->userdata("comp_id"));
                $this->db2->where("payment_type_id", $type_id);
                $this->db2->update("account_payment_type", $data);
            }else{
                $data['account_id'] = $this->session->userdata("comp_id");
                $this->db2->insert("account_payment_type", $data);
            }

        }
    }

    public function save_delivery_type($delivery_type){
        foreach ($delivery_type as $key) {

            $type_id = $key['delivery_type_id'];

            $data = array(
                "delivery_type_id" => $key['delivery_type_id'],
                "delivery_type_check" => $key['delivery_type_check']
                );

            $query = $this->db2->query("SELECT id FROM account_delivery_type WHERE account_id = ? AND delivery_type_id = ?", array($this->session->userdata("comp_id"), $type_id))->row();

            if (!empty($query->id)){
                $this->db2->where("account_id", $this->session->userdata("comp_id"));
                $this->db2->where("delivery_type_id", $type_id);
                $this->db2->update("account_delivery_type", $data);
            }else{
                $data['account_id'] = $this->session->userdata("comp_id");
                $this->db2->insert("account_delivery_type", $data);
            }

        }

    }

    public function save_ship($data){
        $query = $this->db2->query("SELECT id FROM account_shipping_fee WHERE account_id =? ", array($this->session->userdata("comp_id")))->row();

        if (!empty($query)){
            $this->db2->where("id", $query->id);
            $this->db2->update("account_shipping_fee", $data);
        }else{
            $data['account_id'] = $this->session->userdata("comp_id");
            $this->db2->insert("account_shipping_fee", $data);
        }
    }

    public function save_appointment($data){

        $data['comp_id'] = $this->session->userdata('comp_id');
        $data['start_time'] = date("H:i", strtotime($data['start_time']));
        $data['end_time'] = date("H:i", strtotime($data['end_time']));

        $query = $this->db2->query("SELECT * FROM account_appointment WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();

        if (!empty($query)){
            $data['date_update'] = date("Y-m-d H:i:s");
            $this->db2->where("comp_id", $this->session->userdata("comp_id"));
            $this->db2->update("account_appointment", $data);
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_appointment", $data);
        }
    }

    public function save_warranty($warranty, $return){
        $data['account_warranty'] = $warranty;
        $data['account_return'] = $return;
        $data['comp_id'] = $this->session->userdata("comp_id");

        $query = $this->db2->query("SELECT * FROM account_warranty WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();

        if (!empty($query)){
            $data['date_update'] = date("Y-m-d H:i:s");
            $this->db2->where("comp_id", $this->session->userdata("comp_id"));
            $this->db2->update("account_warranty", $data);
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_warranty", $data);
        }

    }



    public function update_profile($account_hdr,$account_id) {
        $this->db2->where('account_id',$account_id);
        $this->db2->update('account',$account_hdr);
        return ($this->db2->affected_rows() > 0) ? true : false;
    }
    
    public function update_category($hdr,$account_id) {
        $query = $this->db2->query("UPDATE account SET business_category = ".$hdr."");
        return ($this->db2->affected_rows() > 0) ? true : false;
    }
    
    public function update_contact($contact,$account_id) {
        $this->db2->where('account_id',$account_id);
        $this->db2->update('account',$contact);
        return ($this->db2->affected_rows() > 0) ? true : false;
    }
    
    public function update_prod_cat($sub_dtl,$account_id) {
        $this->db2->where('account_id',$account_id);
        $this->db2->delete('product_category');
        for($x = 0; $x<count($sub_dtl); $x++) {
            $sub_dtl[$x]['date_insert'] = date("Y-m-d h:i:sa");
            $this->db2->insert('product_category',$sub_dtl[$x]);
        }
        return ($this->db2->affected_rows() > 0) ? true : false;
    }
    
    public function save_product($product) {
        $this->db2->insert('products', $product);
        return ($this->db2->affected_rows() == 1) ? $this->db2->insert_id() : false;
    }
    
    public function update_product($product) {
        $prod_id = $this->input->post('prod_id', TRUE);
        $this->db2->where('id',$prod_id);
        $this->db2->update('products', $product);
        return ($this->db2->affected_rows() == 1) ? $prod_id : false;
    }
    
    public function upload_image_file($data, $id){
        $status = "";
        $this->db2->trans_begin();

        $this->db2->where('id',$this->input->post('id'));
        $this->db2->update('products',$data);     

        if($this->db2->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db2->trans_rollback();
           $status = $db_error;
        }else{  
            $this->db2->trans_commit();
            $status = "success";
        }   

        return $status;
    }
    
    public function delete_product($id){
        $this->db2->where("id", $id);
        $this->db2->set("product_status", 0);
        $this->db2->update("products");
        // $this->db2->delete("products");

        if($this->db2->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db2->trans_rollback();
           $status = $db_error;
        }else{  
            $this->db2->trans_commit();
            $status = "success";
        }   

        return $status;


    }
    
    // profile picture
    
    public function upload_profile_image($data){
        $status = "";
        $this->db2->trans_begin();

        $this->db2->where('id',$this->session->userdata('comp_id'));
        $this->db2->update('account',$data);     

        if($this->db2->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db2->trans_rollback();
           $status = $db_error;
        }else{  
            $this->db2->trans_commit();
            $status = "success";
        }   

        return $status;
    }

    public function insert_prod_var($prod_id, $var_name){

        // $this->db2->where("comp_id", $this->session->userdata("comp_id"));
        // $this->db2->where("prod_id", $prod_id);
        // $this->db2->delete("account_variation");

        // $this->db2->where("comp_id", $this->session->userdata("comp_id"));
        // $this->db2->where("variation_id", $var_id);
        // $this->db2->delete("account_variation_type");


        $data = array(
            "comp_id"  => $this->session->userdata("comp_id"),
            "prod_id" => $prod_id,
            "variation" => $var_name,
            "date_insert" => date("Y-m-d H:i:s")
        );

        $this->db2->insert("account_variation", $data);
        return $this->db2->insert_id();
    }

    public function insert_prod_var_type($var_id, $var_type){

        for($x = 0; $x<count($var_type); $x++) {
            $var_type[$x]['comp_id'] = $this->session->userdata("comp_id"); 
            $var_type[$x]['variation_id'] = $var_id;
            $var_type[$x]['date_insert'] = date("Y-m-d h:i:sa");
            $this->db2->insert('account_variation_type',$var_type[$x]);
        }        
        return 1;
    }

    public function account_post($data){
        $this->db2->set("account_post", $data);
        $this->db2->where("id", $this->session->userdata("comp_id"));
        $this->db2->update("account");
    }

    public function prod_category($category, $id){
        $data = array(
            "comp_id" => $this->session->userdata("comp_id"),
            "product_category" => $category,
            "date_insert" => date("Y-m-d H:i:s")
        );

        if (!empty($id)){
            $this->db2->where("id", $id);
            $this->db2->set("product_category", $category);
            $this->db2->set("date_update", date("Y-m-d H:i:s"));
            $this->db2->update("product_category");
        }else{
            $this->db2->insert("product_category", $data);
        }

    }

    public function delete_prod_category($id){
        $this->db2->where("id", $id);
        $this->db2->delete("product_category");
    }

    public function get_prod_category(){
        $query = $this->db2->query("SELECT * FROM product_category WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_warranty(){
        $query = $this->db2->query("SELECT * FROM account_warranty WHERE comp_id = ? ", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_courier(){
        $query = $this->db2->query("
        SELECT 
            account_courier.*, courier.courier AS courier_name
        FROM account_courier
        INNER JOIN courier ON 
            account_courier.courier_id = courier.id 
        WHERE account_courier.comp_id = ? AND courier.status = ? ORDER BY courier", array($this->session->userdata('comp_id'), "1"))->result();
        return $query;
    }

    public function search_courier($courier){
        $query = $this->db2->query("SELECT * FROM courier WHERE courier LIKE ? AND `courier`.`status` = ? ORDER BY courier ASC LIMIT 20", 
        array("%".$courier."%", "1"))->result();
        return $query;
    }

    public function save_ship_fee($data, $id){

        $query = $this->db2->query("SELECT * FROM account_courier WHERE id = ?", array($id))->result();

        if (!empty($query)){
            $data['date_update'] = date("Y-m-d H:i:s");
            $this->db2->where("id", $id);
            $this->db2->update("account_courier", $data);
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_courier", $data);
        }
        
    }

    public function delete_ship($id){
        $this->db2->where("id", $id);
        $this->db2->delete("account_courier");
    }

}