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
        
        LEFT JOIN `province` as prov
        
        on acc.province = prov.id
        
        LEFT JOIN `city` as city
        
        on acc.city = city.id
        
        LEFT JOIN `business_type` as bus_type
        
        on acc.business_category = bus_type.id
        
        WHERE acc.id ='".$id."'  ")->result();
        return $query;
    }
    
    public function get_product_category($id){
        $this->db2->select('*');
        $this->db2->from('product_category');
        $this->db2->where('comp_id', $id);
        $query = $this->db2->get();
        return $query->result();
    }
    
    public function get_products($id){
        $this->db2->select('*');
        $this->db2->from('products');
        $this->db2->where('account_id', $id);
        $this->db2->where("product_status", 1);
        // $this->db2->limit(6);
        $query = $this->db2->get();
        return $query->result();
    }
    
    public function get_product_info($id){
        $this->db2->select('products.*, delivery_type.delivery_type, `area_coverage`.`coverage`');
        $this->db2->from('products');
        $this->db2->join("delivery_type", "products.product_delivery = delivery_type.id", "LEFT");
        $this->db2->join("area_coverage", "products.product_del_opt = area_coverage.id", "LEFT");
        $this->db2->where('products.id', $id);
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

    public function get_payment_type($comp_id){
        $query = $this->db2->query("
        SELECT GROUP_CONCAT(' ', payment_type.payment_type) AS payment_type
        FROM account_payment_type 
        LEFT JOIN payment_type ON 
        account_payment_type.payment_type_id = payment_type.id
        WHERE account_payment_type.account_id = ? AND account_payment_type.payment_type_check = ?        
        ", array($comp_id, "1"))->result();
        return $query;
    }

    public function get_product_return($comp_id){
        $query = $this->db2->query("SELECT account_return FROM account_warranty WHERE comp_id = ? ", array($comp_id))->row();

        if (!empty($query->account_return)){
            return $query->account_return;
        }else{
            return null;
        }
    }

    public function get_product_warranty($comp_id){
        $query = $this->db2->query("SELECT account_warranty FROM account_warranty WHERE comp_id = ? ", array($comp_id))->row();

        if (!empty($query->account_warranty)){
            return $query->account_warranty;
        }else{
            return null;
        }

    }

    public function get_prod_var($prod_id){
        $query = $this->db2->query("SELECT * FROM account_variation WHERE prod_id = ?", array($prod_id))->result();
        return $query;
    }

    public function get_prod_var_type($prod_id){
        $query = $this->db2->query("SELECT account_variation_type.* FROM account_variation_type LEFT JOIN account_variation ON `account_variation`.`id` = `account_variation_type`.`variation_id` WHERE prod_id = ? ", array($prod_id))->result();
        return $query;
    }

    public function get_store_img($id){
        $query = $this->db2->query("SELECT * FROM account_store WHERE comp_id = ? ", array($id))->result();
        return $query;
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

    public function get_product_by_cat($id, $comp_id){
        
        $this->db2->select('*');
        $this->db2->from('products');
        $this->db2->where('account_id', $comp_id);
        $this->db2->where("product_status", 1);

        if ($id != "0"){
            $this->db2->where("product_category", $id);
        }

        $query = $this->db2->get();
        return $query->result();        

    }

}
