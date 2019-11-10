<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_return_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function search_recipient_code($recipient){
		$sql = "SELECT 
		outlet_code AS recipient_code,
		outlet_name AS recipient_name,
		`outlet`.`id` AS recipient_id,
		'1' AS recipient_type
		FROM outlet 
		WHERE comp_id = ".$this->session->userdata('comp_id')." AND id != '".$this->session->userdata('outlet_id')."'  AND outlet_code LIKE '%".$recipient."%'
		UNION 
		SELECT 
		customer.id AS recipient_id,
		customer.cust_code AS recipient_code, 
		customer.cust_name AS recipient_name,
		'2' AS recipient_type
		FROM customer
		WHERE comp_id = ".$this->session->userdata('comp_id')." AND outlet_id IN ('".$this->session->userdata('outlet_id')."', '0') AND customer.cust_code LIKE '".$recipient."%'
		UNION 
		SELECT 
		supplier.id AS recipient_id,
		supplier.supp_code AS recipient_code,
		supplier.supp_name AS recipient_name,
		'3' AS reipient_type
		FROM supplier
		WHERE comp_id = ".$this->session->userdata('comp_id')." AND outlet_id IN ('".$this->session->userdata('outlet_id')."', '0') AND supplier.supp_code LIKE '".$recipient."%'";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	public function search_recipient_name($recipient){
		$sql = "SELECT 
		outlet_code AS recipient_code,
		outlet_name AS recipient_name,
		`outlet`.`id` AS recipient_id,
		'1' AS recipient_type
		FROM outlet 
		WHERE comp_id = ".$this->session->userdata('comp_id')." AND id != '".$this->session->userdata('outlet_id')."'  AND outlet_name LIKE '%".$recipient."%'
		UNION 
		SELECT 
		customer.id AS recipient_id,
		customer.cust_code AS recipient_code, 
		customer.cust_name AS recipient_name,
		'2' AS recipient_type
		FROM customer
		WHERE comp_id = ".$this->session->userdata('comp_id')." AND outlet_id IN ('".$this->session->userdata('outlet_id')."', '0') AND customer.cust_name LIKE '".$recipient."%'
		UNION 
		SELECT 
		supplier.id AS recipient_id,
		supplier.supp_code AS recipient_code,
		supplier.supp_name AS recipient_name,
		'3' AS reipient_type
		FROM supplier
		WHERE comp_id = ".$this->session->userdata('comp_id')." AND outlet_id IN ('".$this->session->userdata('outlet_id')."', '0') AND supplier.supp_name LIKE '".$recipient."%'";
		$query = $this->db->query($sql)->result();
		return $query;
	}

	public function currency(){
		$query = $this->db->query("SELECT currency.id ,currency.curr_code FROM account_application
	        INNER JOIN currency ON
	        account_application.currency = currency.id
	        WHERE account_application.id = ?", array($this->session->userdata('comp_id')))->row();
		return $query;
	}

	public function search_product_code($product){

		$sql = "SELECT
	    `products`.`product_code` AS prod_code
	    , `products`.`id` AS prod_id
	    , `products`.`product_name` AS prod_name
	    , `products`.`product_specs` AS prod_specs
	    , `products`.`reg_selling_price` AS prod_price
	    , `product_type`.`prod_type_desc` AS prod_type
	    , `product_brand`.`brand_desc` AS prod_brand
	    , `product_category`.`category_desc` AS prod_category
	    , `product_class`.`class_desc` AS prod_class
	    , `product_color`.`color_desc` AS prod_color
	    , `product_model`.`model_desc` AS prod_model
	    , `product_unit`.`unit_desc` AS prod_unit
	    , `product_size`.`size_desc` AS prod_size
	    , `inventory`.`inventory_qty` AS prod_qty
	FROM
	    `products`
	    LEFT JOIN `product_type` 
	        ON (`products`.`type_id` = `product_type`.`id`)
	    LEFT JOIN `product_brand` 
	        ON (`products`.`brand_id` = `product_brand`.`id`)
	    LEFT JOIN `product_category` 
	        ON (`products`.`category_id` = `product_category`.`id`)
	    LEFT JOIN `product_class` 
	        ON (`products`.`class_id` = `product_class`.`id`)
	    LEFT JOIN `product_color` 
	        ON (`products`.`color_id` = `product_color`.`id`)
	    LEFT JOIN `product_model` 
	        ON (`products`.`model_id` = `product_model`.`id`)
	    LEFT JOIN `product_size` 
	        ON (`products`.`size_id` = `product_size`.`id`)
	    LEFT JOIN `product_unit` 
	        ON (`products`.`stock_unit_id` = `product_unit`.`id`)
	    LEFT JOIN `inventory` 
		ON (`products`.`id` = `inventory`.`product_id`)
	WHERE 
		`products`.`comp_id` = ? AND `products`.`outlet_id` IN ? AND product_code LIKE ?";

		$query = $this->db->query($sql, array($this->session->userdata("comp_id"),array($this->session->userdata("outlet_id"), "0"), '%'.$product.'%'))->result();
		return $query;
	}

	public function search_product_name($product){

		$sql = "SELECT
	    `products`.`product_code` AS prod_code
	    , `products`.`id` AS prod_id
	    , `products`.`product_name` AS prod_name
	    , `products`.`product_specs` AS prod_specs
	    , `products`.`reg_selling_price` AS prod_price
	    , `product_type`.`prod_type_desc` AS prod_type
	    , `product_brand`.`brand_desc` AS prod_brand
	    , `product_category`.`category_desc` AS prod_category
	    , `product_class`.`class_desc` AS prod_class
	    , `product_color`.`color_desc` AS prod_color
	    , `product_model`.`model_desc` AS prod_model
	    , `product_unit`.`unit_desc` AS prod_unit
	    , `product_size`.`size_desc` AS prod_size
	    , `inventory`.`inventory_qty` AS prod_qty
	FROM
	    `products`
	    LEFT JOIN `product_type` 
	        ON (`products`.`type_id` = `product_type`.`id`)
	    LEFT JOIN `product_brand` 
	        ON (`products`.`brand_id` = `product_brand`.`id`)
	    LEFT JOIN `product_category` 
	        ON (`products`.`category_id` = `product_category`.`id`)
	    LEFT JOIN `product_class` 
	        ON (`products`.`class_id` = `product_class`.`id`)
	    LEFT JOIN `product_color` 
	        ON (`products`.`color_id` = `product_color`.`id`)
	    LEFT JOIN `product_model` 
	        ON (`products`.`model_id` = `product_model`.`id`)
	    LEFT JOIN `product_size` 
	        ON (`products`.`size_id` = `product_size`.`id`)
	    LEFT JOIN `product_unit` 
	        ON (`products`.`stock_unit_id` = `product_unit`.`id`)
	    LEFT JOIN `inventory` 
		ON (`products`.`id` = `inventory`.`product_id`)
	WHERE 
		`products`.`comp_id` = ? AND `products`.`outlet_id` IN ? AND product_name LIKE ?";

		$query = $this->db->query($sql, array($this->session->userdata("comp_id"),array($this->session->userdata("outlet_id"), "0"), '%'.$product.'%'))->result();
		return $query;
	}

	public function inv_no_wo_id($inv_no){
		$query = $this->db->query("SELECT inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND inv_no = ?", array($this->session->userdata("outlet_id"), "4", $inv_no))->num_rows();
		return $query;
	}

	public function inv_no_w_id($inv_no, $id){
		$query = $this->db->query("SELECT inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND inv_no = ? AND id != ?", array($this->session->userdata("outlet_id"), "4", $inv_no, $id))->num_rows();
		return $query;
	}

	public function select_return_no($return_no){
		$query = $this->db->query("SELECT * FROM inventory_hdr WHERE inv_no = ? AND inv_type = ? AND outlet_id = ?", array($return_no, "4", $this->session->userdata("outlet_id")))->num_rows();
		return $query;
	}

  	public function insert_return_hdr($transfer_hdr){
  		$data = array(
  			"outlet_id" => $this->session->userdata("outlet_id"),
  			"inv_type" => "4",
  			"inv_no" => $transfer_hdr['trans_no'],
  			"inv_date" => $transfer_hdr['trans_date'],
  			"tran_type" => $transfer_hdr['trans_type'],
  			"recipient_type" => $transfer_hdr['recipient_type'],
  			"recipient_id" => $transfer_hdr['recipient_id'],
  			"ref_trans_no" => $transfer_hdr['ref_trans_no'],
  			"ref_trans_date" => ($transfer_hdr['ref_trans_date'] == null ? "" : $transfer_hdr['ref_trans_date']),
  			"remarks" => $transfer_hdr['reason'],
  			"date_insert" => date("Y-m-d"),
  			"created_by" => $this->session->userdata('user_id')
  		);
  		$this->db->insert("inventory_hdr", $data);
        return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
  	}

  	public function insert_return_dtl($transfer_dtl, $id){
  		$data = array();
        foreach($transfer_dtl as $key){
            $data[] = array(
                    'hdr_id' =>  $id,
                    'prod_id'=>  $key['prod_id'],
                    'qty'    =>  $key['qty'],
                    'cost' 	 => $key['cost'],
                    'total_cost' => $key['total_cost']
            );
        }
        $this->db->insert_batch('inventory_dtl',$data);
        return ($this->db->affected_rows() > 0) ? true : false;
  	}

  	public function query_inventory_return($keyword,$type,$outlet,$ret_date){
  		$query_keyword = "";
        $str1 = "";
  		if (!empty($keyword)){
  			$query_keyword = "AND (`inventory_hdr`.`inv_no` LIKE '%".$keyword."%' OR `outlet`.`outlet_name` LIKE '".$keyword."')";
  		}
  		
  		if (!empty($ret_date)){
  			$str1 = "AND `inventory_hdr`.`inv_date` = '".$ret_date."' ";
  		}

  		$sql = "SELECT
		    `inventory_hdr`.`id`
		    , `inventory_hdr`.`outlet_id`
		    , `inventory_hdr`.`inv_no`
		    , `inventory_hdr`.`inv_date`
		    , `inventory_hdr`.`recipient_type`
		    , `inventory_ref_type`.`inventory_ref_type`
		    , `inventory_hdr`.`tran_type`
		    , `outlet`.`outlet_code`
		    , `outlet`.`outlet_name`
		    , SUM(`inventory_dtl`.`qty`) AS `total_qty`
		FROM
		    `inventory_hdr`
		    LEFT JOIN `outlet` 
		        ON (`inventory_hdr`.`recipient_id` = `outlet`.`id`)
		    LEFT JOIN `inventory_dtl` 
		        ON (`inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`)
		    LEFT JOIN inventory_ref_type 
            ON `inventory_ref_type`.id = `inventory_hdr`.tran_type
		WHERE `inventory_hdr`.`status` = '1' AND `inventory_hdr`.`inv_type` = '4' 
		AND outlet_id = '".$outlet."' and `inventory_hdr`.`tran_type` = '".$type."' ".$query_keyword." ".$str1." 
		GROUP BY `inventory_hdr`.`id`";

  		$query = $this->db->query($sql)->result();
  		return $query;
  	}

  	public function get_inventory_return_hdr($trans_id){
  		$query = $this->db->query("
  		SELECT
		    `inventory_hdr`.*
		    , `outlet`.`outlet_code`
		    , `outlet`.`outlet_name`
		FROM
		    `inventory_hdr`
		    LEFT JOIN `outlet` 
		        ON (`inventory_hdr`.`recipient_id` = `outlet`.`id`)
		WHERE `inventory_hdr`.`id` = '".$trans_id."'")->result();
  		return $query;
  	}

  	public function get_inventory_return_dtl($trans_id){
  		$query = $this->db->query("
  		SELECT
		    `products`.`product_code`
		    , `products`.`product_no`
		    , `products`.`product_name`
		    , `product_unit`.`unit_code`
		    , `inventory`.`inventory_qty`
		    , `inventory_dtl`.`qty`
		    , `inventory_dtl`.`id`
		    , `inventory_dtl`.`prod_id`
		    , `products`.`reg_selling_price`
		FROM
		    `inventory_dtl`
		    LEFT JOIN `products` 
		        ON (`inventory_dtl`.`prod_id` = `products`.`id`)
		    LEFT JOIN `inventory` 
		        ON (`products`.`id` = `inventory`.`product_id`)
		    LEFT JOIN `product_unit` 
		        ON (`products`.`stock_unit_id` = `product_unit`.`id`)
		    WHERE `inventory_dtl`.`hdr_id` = ? ", array($trans_id))->result();
  		return $query;
  	}

  	public function update_return_hdr($transfer_hdr, $id){
  		$data = array(
  			"inv_no" => $transfer_hdr['trans_no'],
  			"inv_date" => $transfer_hdr['trans_date'],
  			"tran_type" => $transfer_hdr['trans_type'],
  			"recipient_type" => $transfer_hdr['recipient_type'],
  			"recipient_id" => $transfer_hdr['recipient_id'],
  			"ref_trans_no" => $transfer_hdr['ref_trans_no'],
  			"ref_trans_date" => ($transfer_hdr['ref_trans_date'] == null ? "" : $transfer_hdr['ref_trans_date']),
  			"remarks" => $transfer_hdr['reason']
  		);
  		$this->db->where("id", $id);
  		$this->db->update("inventory_hdr", $data);
        return ($this->db->affected_rows() > 0) ? true : false;
  	}

  	public function update_return_dtl($transfer_dtl){
        foreach ((array)$transfer_dtl as $label => $value) {   
            foreach ((array)$value as $key => $values) {
                $arr[$key] = $values;
                $id = $arr['id'];
            }
            $this->db->where('id', $id);
            $this->db->update('inventory_dtl', $arr);
        }   		
  	}

  	public function delete_return_dtl($id){
  		$this->db->where("id", $id);
  		$this->db->delete("inventory_dtl");
        return ($this->db->affected_rows() > 0) ? true : false;
  	}

  	public function cancel_return($id){
        $query = $this->db->query("UPDATE inventory_hdr SET status = '0' WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
  	}
  	
  	public function get_trans_type(){
        $query = $this->db->query("SELECT * FROM inventory_ref_type where inventory_type = '4'")->result();
        return $query;
    }
  
    public function get_outlet(){
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * 
        FROM `user_outlet` as user
        LEFT JOIN `outlet`
        ON `outlet`.id = `user`.outlet_id
        WHERE user_id = '".$user_id."'")->result();
        return $query;
    }


}
