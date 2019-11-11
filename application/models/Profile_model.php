<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function __construct(){
		parent::__construct();
            $CI = &get_instance(); 
            $this->load->database();
            $this->db2 = $CI->load->database('outletko', TRUE);
	}

	public function get_account_id($account_name){


	}

    public function get_profile_dtl($id){
        $query = $this->db2->query("
        SELECT acc.*,
        
        province_desc,
        
        city_desc,
        
        bus_type.desc as desc_cat
        
        FROM `account` as acc
        
        LEFT JOIN `eoutletsuite_dbase`.`province` as prov
        
        on acc.province = prov.id
        
        LEFT JOIN `eoutletsuite_dbase`.`city` as city
        
        on acc.city = city.id
        
        LEFT JOIN `eoutletsuite_dbase`.`business_type` as bus_type
        
        on acc.business_category = bus_type.id
        
        WHERE acc.id ='".$id."'  ")->result();
        return $query;
    }
    
    public function get_product_category($id){
        $this->db2->select('*');
        $this->db2->from('product_category');
        $this->db2->where('id', $id);
        $query = $this->db2->get();
        return $query->result();
    }
    
    public function get_products($id){
        $this->db2->select('*');
        $this->db2->from('products');
        $this->db2->where('account_id', $id);
        // $this->db2->limit(6);
        $query = $this->db2->get();
        return $query->result();
    }
    
    public function get_product_info($id){
        $this->db2->select('products.*, delivery_type.delivery_type');
        $this->db2->from('products');
        $this->db2->join("delivery_type", "products.product_delivery = delivery_type.id", "LEFT");
        $this->db2->where('products.id', $id);
        $this->db2->limit(6);
        $query = $this->db2->get();
        return $query->result();
    }	

    public function insert_prod($data){
        $query = $this->db2->query("SELECT * FROM buyer_order_products WHERE comp_id = ? AND prod_id = ? AND (order_id = '' OR order_id IS NULL ) ", array($this->session->userdata("comp_id"), $data['prod_id']))->result();

        if (!empty($query)){
            $id = "";
            foreach ($query as $key => $value) {
                $id = $value->id;
                $data['prod_qty'] = $value->prod_qty + $data['prod_qty'];
            }
            $this->db2->where("id", $id);
            $this->db2->update("buyer_order_products", $data);
        }else{
            $this->db2->insert("buyer_order_products", $data);
        }
    }

}
