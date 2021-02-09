<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $CI = &get_instance(); 
        $this->load->database();
        $this->db2 = $CI->load->database('outletko', TRUE);
        $this->db3 = $CI->load->database('admin', TRUE);
    }

    public function featured_outlet(){
        $query = $this->db2->query("SELECT * FROM account  WHERE id IN (9, 4, 2, 10, 8, 7)  ORDER BY FIELD(ID, 9, 4, 2, 10, 8, 7) LIMIT 0,6 ")->result();
        return $query;
    }

    public function featured_store(){
        $query = $this->db2->query("SELECT 
        `account`.*, 
        `account`.`id` AS comp_id,
        `account_store`.`loc_image` AS img_location,
        `city`.`city_desc`,
        `province`.`province_desc` AS prov_desc
        FROM account
        -- INNER JOIN products ON 
        -- `products`.`id` = `account`.`featured_product`
        INNER JOIN city ON 
        `city`.`id` = `account`.`city`
        INNER JOIN province ON 
        `city`.`province_id` = `province`.`id`
        INNER JOIN account_store ON 
        `account_store`.`id` = `account`.`featured_img`
        WHERE `account`.`featured_store` = ? AND `account`.`country` = ?
        GROUP BY `account`.`id`
        ORDER BY `account`.`featured_order`
        ", array(1,  173))->result();
        // 173
        //, $this->session->userdata("IPCountryCode")
        return $query;
    }

    public function featured_product(){
        $query = $this->db2->query("SELECT products.* FROM products 
        INNER JOIN account ON 
        `products`.`comp_id` = `account`.`id`
        WHERE `products`.`featured_product` = ? AND `account`.`country` = ?
        ORDER BY `products`.`featured_order`", array(1,  173))->result();
        return $query;
    }

    public function blog(){
        $query = $this->db3->query("SELECT * FROM blog ORDER BY id DESC")->result();
        return $query;
    }

    public function get_blog($id){
        $query = $this->db3->query("SELECT * FROM blog WHERE id = ? ", array($id))->result();
        return $query;
    }

}