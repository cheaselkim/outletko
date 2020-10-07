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

    public function check_subscription(){
        $query = $this->db->query("SELECT * FROM account_application WHERE account_id = ?", array($this->session->userdata("account_id")))->result();
        return $query;
    }

    public function business_type(){
        $query = $this->db->query("SELECT * FROM business_type ORDER BY `business_type`.`desc`")->result();
        return $query;
    }

    public function payment_type(){
        $query = $this->db2->query("SELECT * FROM  payment_type WHERE status = ?", array(1))->result();
        return $query;
    }

    public function delivery_type(){
        $query = $this->db2->query("SELECT * FROM delivery_type WHERE status = ?", array(1))->result();
        return $query;        
    }

    public function bank_list(){
        $query = $this->db2->query("SELECT * FROM bank_list WHERE status = ? ORDER BY bank_name", array(1))->result();
        return $query;
    }

    public function remittance_list(){
        $query = $this->db2->query("SELECT * FROM remittance_list WHERE status = ? ORDER BY name", array(1))->result();
        return $query;
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
            WHERE CONCAT(city_desc, ', ' , province_desc) LIKE ?
            ORDER BY city_desc, province_desc
            LIMIT 10", array($city.'%'))->result();
        return $query;
    }

    public function check_linkname($linkname){
        $query = $this->db2->query("SELECT * FROM account WHERE link_name = ? AND id != ?", array($linkname, $this->session->userdata("comp_id")))->num_rows();
        return $query;
    }

    public function coverage_area($area){
        $query = $this->db2->query("SELECT * FROM province WHERE island_group = ?" , array($area))->result();
        return $query;
    }

    public function coverage_city($province){
        $query = $this->db2->query("SELECT * FROM city WHERE province_id = ? ORDER BY city_desc ASC", array($province))->result();
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

    public function get_variation_price($id){
        $query = $this->db2->query("SELECT 
        MAX(unit_price) AS max_unit_price,
        MIN(unit_price) AS min_unit_price
        FROM account_variation_type
        LEFT JOIN account_variation ON 
        `account_variation`.`id` = `account_variation_type`.`variation_id`
        WHERE `account_variation`.`prod_id` = ? AND variation_class = ?        
        ", array($id, "1"))->result();
        return $query;
    }

    public function get_product_count(){
        $query = $this->db2->query("SELECT * FROM products WHERE comp_id = ?", array($this->session->userdata('comp_id')))->num_rows();
        return $query;
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
    
    public function variations($prod_id){
        $query = $this->db2->query("SELECT * FROM account_variation WHERE prod_id = ?", array($prod_id))->result();
        return $query;
    }

    public function variation_type($prod_id){
        $query = $this->db2->query("SELECT *, `account_variation_type`.`id` AS var_type_id FROM account_variation_type INNER JOIN account_variation ON `account_variation`.`id` = `account_variation_type`.`variation_id`  WHERE prod_id = ?", array($prod_id))->result();
        return $query;
    }

    public function get_bank_list(){
        $query = $this->db2->query("SELECT
            `account_bank`.`id`, 
            `bank_list`.`id` AS bank_id,
            `bank_list`.`bank_name`,
            `account_bank`.`account_name`,
            `account_bank`.`account_no`,
            `account_bank`.`status`
            FROM bank_list
            INNER JOIN account_bank ON
            `bank_list`.`id` = `account_bank`.`bank_id`
            WHERE `account_bank`.`comp_id` = ? AND `bank_list`.`status` = ?
            ORDER BY `bank_list`.`bank_name`", 
        array($this->session->userdata('comp_id'), 1))->result();
        return $query;
    }

    public function get_remittance_list(){
        $query = $this->db2->query("SELECT 
            `remittance_list`.`id`,
            `remittance_list`.`name`
            FROM remittance_list
            INNER JOIN account_remittance ON
            `remittance_list`.`id` = `account_remittance`.`remittance_id`
            WHERE `account_remittance`.`comp_id` = ? AND `remittance_list`.`status` = ? AND `account_remittance`.`status` = ?
            ORDER BY `remittance_list`.`name`", 
        array($this->session->userdata('comp_id'), 1, 1))->result();
        return $query;        
    }

    public function get_store_assoc($id){
        $query = $this->db2->query("SELECT 
            `store_association`.`id`,
            `store_association`.`name` AS store_assoc_name
            FROM store_association
            WHERE id = ? ", 
        array($id))->row();

        if (empty($query)){
            return NULL;
        }else{
            return $query->store_assoc_name;        
        }

    }

    public function get_coverage_area(){
        $query = $this->db2->query("SELECT * FROM account_coverage WHERE comp_id =? ", array($this->session->userdata('comp_id')))->result();
        return $query;
    }

    public function get_ol_products(){
        $query = $this->db2->query("SELECT * FROM products WHERE comp_id = ? AND product_online = ? ", array($this->session->userdata('comp_id'), "1"));
        return $query;
    }

    public function check_curr_password($password){
        $query = $this->db->query("SELECT * FROM users WHERE id = ? ", array($this->session->userdata("user_id")))->result();
        if (!empty($query)){
            foreach ($query as $key => $value) {
                if (password_verify($password, $value->password)){
                    return 0;
                }else{
                    return 1;
                }
            }
        }else{
            return 1;
        }

    }

    public function get_coverage_province($area){
        $query = $this->db2->query("SELECT 
        `province`.`id` AS prov_id,
        `province`.`province_desc` AS prov_desc
        FROM account_coverage_city 
        LEFT JOIN province ON 
        `account_coverage_city`.`prov` = `province`.`id` 
        WHERE comp_id = ? AND area = ?
        GROUP BY prov_id", array($this->session->userdata("comp_id"), $area))->result();
        return $query;
    }

    public function get_coverage_city($area){
        $query = $this->db2->query("SELECT 
        `province`.`id` AS prov_id,
        `account_coverage_city`.`city` AS city_id,
        `province`.`province_desc` AS prov_desc, 
        `city`.`city_desc` AS city_desc
        FROM account_coverage_city 
        LEFT JOIN province ON 
        `account_coverage_city`.`prov` = `province`.`id` 
        LEFT JOIN city ON 
        `account_coverage_city`.`city` = `city`.`id` 
        WHERE  comp_id = ? AND area = ?", array($this->session->userdata("comp_id"), $area))->result();
        return $query;
    }

    public function get_coverage_city_prov($prov){
        $query = $this->db2->query("SELECT 
        `province`.`id` AS prov_id,
        `account_coverage_city`.`city` AS city_id,
        `province`.`province_desc` AS prov_desc, 
        `city`.`city_desc` AS city_desc
        FROM account_coverage_city 
        LEFT JOIN province ON 
        `account_coverage_city`.`prov` = `province`.`id` 
        LEFT JOIN city ON 
        `account_coverage_city`.`city` = `city`.`id` 
        WHERE  comp_id = ? AND `account_coverage_city`.`prov` = ?", array($this->session->userdata("comp_id"), $prov))->result();
        return $query;
    }

    public function get_coverage_ship(){
        $query = $this->db2->query("SELECT 
        `courier`.`id` AS courier_id,
        `courier`.`courier` AS courier_name,
        `account_coverage_shipping`.`id`,
        `account_coverage_shipping`.`area`,
        `account_coverage_shipping`.`weight`,
        `account_coverage_shipping`.`amount`,
        `province`.`id` AS prov_id, 
        `city`.`id` AS city_id,
        `province`.`province_desc` AS prov_desc,
        `city`.`city_desc` AS city_desc
        FROM 
        account_coverage_shipping
        LEFT JOIN courier ON 
        courier.id = account_coverage_shipping.courier
        LEFT JOIN province ON
        province.id = account_coverage_shipping.province
        LEFT JOIN city ON 
        city.id = account_coverage_shipping.city
        WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function get_coverage_ship_by_dtls($courier, $area, $prov, $city, $kg){
        $query = $this->db2->query("SELECT * FROM account_coverage_shipping WHERE comp_id = ? AND courier = ? AND area = ? AND province = ? AND city = ? AND `account_coverage_shipping`.`weight` = ? ", array($this->session->userdata("comp_id"), $courier, $area, $prov, $city, $kg))->result();

        return $query;
    }

    public function check_cov_area_duplicate($courier, $area, $prov, $city, $kg){
        $query = $this->db2->query("SELECT * FROM account_coverage_shipping WHERE comp_id = ? AND courier = ? AND area = ? AND province = ? AND city = ? AND `account_coverage_shipping`.`weight` = ? ", array($this->session->userdata("comp_id"), $courier, $area, $prov, $city, $kg))->result();
    
        if (!empty($query)){
            return 1;
        }else{
            return 0;
        }
    }

    //SAVING

    public function save_username($username){
        $this->db->where("id", $this->session->userdata("user_id"));
        $this->db->set("username", $username);
        $this->db->update("users");
        $this->session->set_userdata("user_uname", $username);
    }

    public function save_password($password){
        $this->db->where("id", $this->session->userdata("user_id"));
        $this->db->set("password", password_hash($password, PASSWORD_DEFAULT));
        $this->db->update("users");
    }

    public function save_name($fname, $mname, $lname){

        if (!empty($fname)){
            $this->db->where("id", $this->session->userdata("user_id"));
            $this->db->set("first_name", $fname);
            $this->db->update("users");

            $this->db->where("account_id", $this->session->userdata("account_id"));
            $this->db->set("first_name", $fname);
            $this->db->update("account_application");

            $this->db2->where("account_id", $this->session->userdata("account_id"));
            $this->db2->set("first_name", $fname);
            $this->db2->update("account");
        }

        if (!empty($mname)){
            $this->db->where("id", $this->session->userdata("user_id"));
            $this->db->set("middle_name", $mname);
            $this->db->update("users");

            $this->db->where("account_id", $this->session->userdata("account_id"));
            $this->db->set("middle_name", $mname);
            $this->db->update("account_application");

            $this->db2->where("account_id", $this->session->userdata("account_id"));
            $this->db2->set("middle_name", $mname);
            $this->db2->update("account");

        }

        if (!empty($lname)){
            $this->db->where("id", $this->session->userdata("user_id"));
            $this->db->set("last_name", $lname);
            $this->db->update("users");

            $this->db->where("account_id", $this->session->userdata("account_id"));
            $this->db->set("last_name", $lname);
            $this->db->update("account_application");

            $this->db2->where("account_id", $this->session->userdata("account_id"));
            $this->db2->set("last_name", $lname);
            $this->db2->update("account");

        }

        $query = $this->db->query("SELECT * FROM users WHERE id = ?", array($this->session->userdata("user_id")))->result();
        if (!empty($query)){
            foreach ($query as $key => $value) {
                $this->session->set_userdata("user_fullname", $value->first_name." ".$value->last_name);
                $this->session->set_userdata("user_fname", $value->first_name);
                $this->session->set_userdata("user_mname", $value->middle_name);
                $this->session->set_userdata("user_lname", $value->last_name);
            }
        }
    }

    public function update_aboutus($data){
        $this->db2->where('account_id',$this->session->userdata("account_id"));
        $this->db2->update('account',$data);
        return ($this->db2->affected_rows() > 0) ? true : false;
    }

    public function update_eoutletsuite($data){
        $this->db->where("account_id", $this->session->userdata("account_id"));
        $this->db->update("account_application", $data);
        return ($this->db2->affected_rows() > 0) ? true : false;        
    }

    public function update_store_assoc($store_assoc){

        $query = $this->db2->query("SELECT `store_association`.`id` FROM `store_association` WHERE `store_association`.`name` = ? ", array($store_assoc))->row();

        if (empty($query->id)){
            $this->db2->insert("store_association", array("name" => ucwords($store_assoc)));
            $store_id = $this->db2->insert_id();
        }else{
            $store_id = $query->id;
        }

        $this->db2->where("id", $this->session->userdata("comp_id"));
        $this->db2->set("store_assoc", $store_id);
        $this->db2->update("account");

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

    public function save_cust_del_date($save_cust_del_date, $shipping_fee){
        $this->db2->set("free_shipping", $shipping_fee);
        $this->db2->set("del_date", $save_cust_del_date);
        $this->db2->where("id", $this->session->userdata("comp_id"));
        $this->db2->update("account");
    }

    public function save_cov_area($data){
        $data['comp_id'] = $this->session->userdata("comp_id");

        $query = $this->db2->query("SELECT * FROM account_coverage WHERE comp_id = ? ", array($this->session->userdata('comp_id')))->result();

        if (!empty($query)){
            $this->db2->where("comp_id", $this->session->userdata('comp_id'));
            $this->db2->update("account_coverage", $data);
        }else{
            $this->db2->insert("account_coverage", $data);
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

        $query = $this->db2->query("SELECT * FROM products WHERE id = ?", array($id))->result();

        if (!empty($query)){
            foreach ($query as $key => $value) {
                $img = unserialize($value->img_location);
                if (!empty($img)){
                    for ($i=0; $i < COUNT($img); $i++) { 
                        $file = './images/products/'.$img[$i];   
                        if (file_exists($file)){
                            unlink($file);
                        }    
                    }
                }
            }    
        }
        
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

        $status = true;

        $query = $this->db2->query("SELECT * FROM products WHERE id = ?", array($id))->result();

        if (!empty($query)){
            foreach ($query as $key => $value) {
                $product = unserialize($value->img_location);
                if (!empty($product)){
                    for ($i=0; $i < COUNT($product); $i++) { 
                        $file = './images/products/'.$product[$i];
                        if (file_exists($file)){
                            unlink($file);
                        }
                    }
                }        
            }
        }else{
            $product = "";
        }



        if ($status == true){
            $this->db2->where("id", $id);
            // $this->db2->set("product_status", 0);
            // $this->db2->update("products");
            $this->db2->delete("products");    
        }

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
    
    public function insert_prov_city($data, $area){
        $query = $this->db2->query("SELECT * FROM account_coverage_city WHERE comp_id = ? AND area = ?", array($this->session->userdata("comp_id"), $area))->result();

        if (!empty($query)){
            $this->db2->where("comp_id", $this->session->userdata("comp_id"));
            $this->db2->where("area", $area);
            $this->db2->delete("account_coverage_city");
        }

        if (!empty($data)){
            foreach ($data as $key => $value) {
                $data[$key]['comp_id'] = $this->session->userdata("comp_id");
                $this->db2->insert("account_coverage_city", $data[$key]);
            }    
        }

    }

    public function save_coverage_ship($data, $id){

        if ($id != "0"){
            $data['date_update'] = date("Y-m-d H:i:s");
            $this->db2->where("id", $id);
            $this->db2->update("account_coverage_shipping", $data);
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_coverage_shipping", $data);
        }

    }

    public function del_coverage_ship($id){
        $this->db2->where("id", $id);
        $this->db2->delete("account_coverage_shipping");
    }

    // profile picture
    
    public function upload_profile_image($data){
        $status = "";
        $this->db2->trans_begin();

        $query = $this->db2->query("SELECT * FROM account WHERE id = ?", array($this->session->userdata('comp_id')))->result();

        if (!empty($query)){
            foreach ($query as $key => $value) {
                $img = unserialize($value->loc_image);
                if (!empty($img)){
                    $file = './images/profile/'.$img[0];
                    if (file_exists($file)){
                        unlink($file);
                    }    
                }
            }    
        }


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

    public function upload_store_image($data, $img_order){
        $status = "";
        $this->db2->trans_begin();

        $query = $this->db2->query("SELECT * FROM account_store WHERE comp_id = ? AND img_order = ?", array($this->session->userdata('comp_id'), $img_order))->result();

        if (!empty($query)){

            foreach ($query as $key => $value) {
                $img = unserialize($value->loc_image);
                if (!empty($img)){
                    $file = './images/store/'.$img[0];
                    if (file_exists($file)){
                        unlink($file);
                    }    
                }
    
            }

            $data['date_update'] = date("Y-m-d H:i:s");
            $this->db2->where('comp_id',$this->session->userdata('comp_id'));
            $this->db2->where('img_order',$img_order);
            $this->db2->update('account_store',$data);                 
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_store", $data);
        }

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

    public function save_prod_var($prod_id, $var_class, $var_name, $id){

        // $this->db2->where("comp_id", $this->session->userdata("comp_id"));
        // $this->db2->where("prod_id", $prod_id);
        // $this->db2->delete("account_variation");

        // $this->db2->where("comp_id", $this->session->userdata("comp_id"));
        // $this->db2->where("variation_id", $var_id);
        // $this->db2->delete("account_variation_type");


        $data = array(
            "comp_id"  => $this->session->userdata("comp_id"),
            "prod_id" => $prod_id,
            "variation_class" => $var_class,
            "variation" => $var_name
        );

        if (!empty($id)){
            $data['date_update'] = date("Y-m-d H:i:s");
            $this->db2->where("id", $id);
            $this->db2->set("variation", $var_name);
            $this->db2->set("date_update", date("Y-m-d H:i:s"));
            $this->db2->update("account_variation");        
            $result = 1;    
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_variation", $data);
            $result = $this->db2->insert_id();
        }
    

        return $result;
    }

    public function del_variation($id){
        $query = $this->db2->query("SELECT * FROM account_variation_type WHERE variation_id =? ", array($id))->result();
    
        if (!empty($query)){
            foreach ($query as $key => $value) {
                $img = unserialize($value->img_location);
                $file = './images/products/'.$img[0];
                if (file_exists($file)){
                    unlink($file);
                }
    
            }
        }

        $this->db2->where("id", $id);
        $this->db2->delete("account_variation");
        
        $this->db2->where("variation_id", $id);
        $this->db2->delete("account_variation_type");
    
        
    }

    public function save_variation_type($variation, $variation_type, $variation_qty, $variation_price, $id){

        $data = array(
            "comp_id" => $this->session->userdata("comp_id"),
            "variation_id" => $variation,
            "type" => $variation_type,
            "qty" => $variation_qty,
            "unit_price" => $variation_price
        );

        if (!empty($id)){
            $this->db2->where("id", $id);
            $this->db2->set("type", $variation_type);
            $this->db2->set("qty", $variation_qty);
            $this->db2->set("unit_price", $variation_price);
            $this->db2->set("date_update", date("Y-m-d H:i:s"));
            $this->db2->update("account_variation_type");
            $result = $id;
        }else{
            $data['date_insert'] = date("Y-m-d H:i:s");
            $this->db2->insert("account_variation_type", $data);
            $result = $this->db2->insert_id();
        }

        return $result;

    }

    public function del_variation_type($id){
        $query = $this->db2->query("SELECT * FROM account_variation_type WHERE id = ? ", array($id))->result();
    
        if (!empty($query)){
            foreach ($query as $key => $value) {
                $img = unserialize($value->img_location);
                if (!empty($img)){
                    $file = './images/products/'.$img[0];
                    if (file_exists($file)){
                        unlink($file);
                    }    
                }
    
            }
        }
        
        $this->db2->where("id", $id);
        $this->db2->delete("account_variation_type");
    
        
    }

    public function upload_variation_image($data, $id){
        $status = "";
        $this->db2->trans_begin();

        $query = $this->db2->query("SELECT * FROM account_variation_type WHERE id = ?", array($id))->result();

        if (!empty($query)){
            foreach ($query as $key => $value) {
                $img = unserialize($value->img_location);
                if (!empty($img)){
                    $file = './images/products/'.$img[0];
                    if (file_exists($file)){
                        unlink($file);
                    }    
                }
            }    
        }


        $this->db2->where('id',$id);
        $this->db2->update('account_variation_type',$data);     

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

    public function get_store_img(){
        $query = $this->db2->query("SELECT * FROM account_store WHERE comp_id = ? ", array($this->session->userdata('comp_id')))->result();
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

    public function save_bank($data, $id){
        $query = $this->db2->query("SELECT * FROM account_bank WHERE id = ?", $id)->result();

        if (!empty($query)){
            $data['date_update'] = date('Y-m-d H:i:s');
            $this->db2->where("id", $id);
            $this->db2->update("account_bank", $data);
        }else{
            $data['date_insert'] = date('Y-m-d H:i:s');
            $this->db2->insert("account_bank", $data);
        }

    }

    public function delete_bank($data, $id){
        $this->db2->where("id", $id);
        $this->db2->delete("account_bank");
    }

    public function save_remittance($data){

        $array = "";

        $this->db2->set("status", "0");
        $this->db2->where("comp_id", $this->session->userdata('comp_id'));
        $this->db2->update("account_remittance");

        if (!empty($data)){
            for ($i=0; $i < COUNT($data); $i++) { 

                $array = array(
                    "comp_id" => $this->session->userdata("comp_id"),
                    "remittance_id" => $data[$i],
                    "status" => "1"
                );


                $query = $this->db2->query("SELECT * FROM account_remittance WHERE comp_id = ? AND  remittance_id = ?", array($this->session->userdata('comp_id'), $data[$i]))->result();

                if (!empty($query)){
                    foreach ($query as $key => $value) {
                        $this->db2->set("status", "1");
                        $this->db2->where("id", $value->id);
                        $this->db2->update("account_remittance");
                    }
                }else{
                    $this->db2->insert("account_remittance", $array);
                }

            }
        }

    }

}




























