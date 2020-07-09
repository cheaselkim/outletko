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
        $query = $this->db2->query("SELECT * FROM account
        INNER JOIN products ON 
        `products`.`id` = `account`.`featured_product`
        WHERE `account`.`featured_store` = ?
        GROUP BY `account`.`id`
        ORDER BY `account`.`featured_order`
        ", array(1))->result();
        return $query;
    }

    public function featured_product(){
        $query = $this->db2->query("SELECT * FROM products WHERE featured_product = ? ORDER BY featured_order", array(1))->result();
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