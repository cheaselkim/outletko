<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_receive_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $result = $this->login_model->check_session();
    if ($result != true){
        redirect("/");
    }
  }

  public function trans_type(){
    $query = $this->db->query("SELECT * FROM inventory_ref_type WHERE inventory_type = ?", array("1"))->result();
    return $query;
  }

  public function currency(){
    $query = $this->db->query("SELECT id, curr_code FROM currency ORDER BY FIELD(curr_code, 'CNY', 'USD', 'PHP') DESC LIMIT 3")->result();         
    return $query;
  }

  public function account_currency(){
    $query = $this->db->query("SELECT currency.id ,currency.curr_code FROM account_application
              INNER JOIN currency ON
              account_application.currency = currency.id
              WHERE account_application.id = ?", array($this->session->userdata('comp_id')))->row();
    return $query->id;
  }  

  public function max_transno($trans_type){
    $query = $this->db->query("SELECT MAX(inv_no) AS inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND tran_type = ?", array($this->session->userdata('outlet_id'), "1", $trans_type))->row();

    if (empty($query->inv_no)){
      $max_no = "1".$trans_type."-000001";
    }else{
      $max_no = "1".$trans_type."-".str_pad((substr($query->inv_no, -6) + 1), 6, '0', STR_PAD_LEFT);
    }

    return $max_no;
  }
  
  public function search_outlet($type, $keyword){
    if ($type == "1"){
      $query = $this->db->query("
        SELECT         
          '1' AS TYPE
          ,outlet_code AS CODE
          ,id as ID
          ,outlet_name AS NAME 
          FROM outlet
          WHERE comp_id = ? AND outlet_code LIKE ? AND id != ?", array($this->session->userdata("comp_id"), $keyword."%", $this->session->userdata('outlet_id')))->result();
    }else{
      $query = $this->db->query("
        SELECT 
          '1' AS TYPE
          ,outlet_code AS CODE
          ,id as ID
          ,outlet_name AS NAME 
          FROM outlet
          WHERE comp_id = ? AND outlet_name LIKE ? AND id != ?", array($this->session->userdata("comp_id"), $keyword."%", $this->session->userdata('outlet_id')))->result();
    }
    return $query;
  }

  public function search_customer($type, $keyword){
    if ($type == "1"){
      $query = $this->db->query("
        SELECT         
          '2' AS TYPE
          ,cust_code AS CODE 
          ,id AS ID 
          ,cust_name AS NAME 
          FROM customer
          WHERE comp_id = ? AND cust_code LIKE ?", array($this->session->userdata("comp_id"), $keyword."%"))->result();
    }else{
      $query = $this->db->query("
        SELECT 
          '2' AS TYPE
          ,cust_code AS CODE 
          ,id AS ID 
          ,cust_name AS NAME 
          FROM customer
          WHERE comp_id = ? AND cust_name LIKE ?", array($this->session->userdata("comp_id"), $keyword."%"))->result();
    }
    return $query;
  }

  public function search_supplier($type, $keyword){
    if ($type == "1"){
      $query = $this->db->query("
        SELECT
          '3' AS TYPE
          , supp_code AS CODE
          , id AS ID
          , supp_name AS NAME
          FROM supplier
          WHERE comp_id = ? AND supp_code LIKE ?", array($this->session->userdata("comp_id"), $keyword."%"))->result();
    }else{
      $query = $this->db->query("
        SELECT 
          '3' AS TYPE
          , supp_code AS CODE
          , id AS ID
          , supp_name AS NAME
          FROM supplier
          WHERE comp_id = ? AND supp_name LIKE ?", array($this->session->userdata("comp_id"), $keyword."%"))->result();
    }
    return $query;
  }    


  public function search_item_code($prod){
    $outlet = "";

    if (is_numeric($this->session->userdata("outlet_id")) == true){
      $outlet = $this->session->userdata("outlet_id");
    }else{
      $outlet = "0";
    }

    $query = $this->db->query("SELECT *, products.id as prod_id FROM products 
    LEFT JOIN product_type ON product_type.id = products.type_id
    LEFT JOIN product_brand ON product_brand.id = products.brand_id
    LEFT JOIN product_color ON product_color.id = products.color_id
    LEFT JOIN product_model ON product_model.id = products.model_id
    LEFT JOIN product_size ON product_size.id = products.size_id
    LEFT JOIN product_category ON product_category.id = products.category_id
    LEFT JOIN product_class ON product_class.id = products.class_id 
    LEFT JOIN product_unit ON product_unit.id = products.stock_unit_id 
    WHERE product_no LIKE '".$prod."%'
    AND products.comp_id = '".$this->session->userdata('comp_id')."' 
    AND products.outlet_id IN ('0', '".$outlet."' ) ")->result();
    return $query;
  }  

  public function search_item_name($prod){
    $outlet = "";

    if (is_numeric($this->session->userdata("outlet_id")) == true){
      $outlet = $this->session->userdata("outlet_id");
    }else{
      $outlet = "0";
    }


    $query = $this->db->query("SELECT *, products.id as prod_id from products
    LEFT JOIN product_type ON product_type.id = products.type_id
    LEFT JOIN product_brand ON product_brand.id = products.brand_id
    LEFT JOIN product_color ON product_color.id = products.color_id
    LEFT JOIN product_model ON product_model.id = products.model_id
    LEFT JOIN product_size ON product_size.id = products.size_id
    LEFT JOIN product_category ON product_category.id = products.category_id
    LEFT JOIN product_class ON product_class.id = products.class_id 
    LEFT JOIN product_unit ON product_unit.id = products.stock_unit_id 
    WHERE product_name LIKE '".$prod."%'
    AND products.comp_id = '".$this->session->userdata('comp_id')."' 
    AND products.outlet_id IN ('0', '".$outlet."')")->result();
    return $query;
  } 

  public function product_transfer(){
    $query = $this->db->query("
      SELECT 
      CONCAT(`users`.`last_name`, ', ', `users`.`first_name`) AS created_name,
      `comp_outlet`.`outlet_code` AS comp_outlet_code,
      `comp_outlet`.`outlet_name` AS comp_outlet_name,
      `recipient_outlet`.`outlet_code` AS recipient_outlet_code,
      `recipient_outlet`.`outlet_name` AS recipient_outlet_name,
      inventory_hdr.*
      FROM inventory_hdr 
      INNER JOIN outlet AS comp_outlet ON
      `comp_outlet`.`id` = `inventory_hdr`.`outlet_id`
      INNER JOIN outlet AS recipient_outlet ON
      `recipient_outlet`.`id` = `inventory_hdr`.`recipient_id`
      INNER JOIN users ON
      `users`.`id` = `inventory_hdr`.`created_by`
      WHERE 
      `inventory_hdr`.`inv_type` = ? AND `inventory_hdr`.`tran_type` = ? AND `inventory_hdr`.`status` = ? AND `inventory_hdr`.`recipient_id` = ?", 
      array("2", "6", "1", $this->session->userdata("outlet_id")))->result();
    return $query;
  }

  public function sales_register($trans_date, $trans_no, $cust_id, $agent_id, $arr_id){
    $trans_date_qry = "";
    $trans_no_qry = "";
    $cust_id_qry = "";
    $agent_id_qry = "";

    if (!empty($trans_date)){
      $trans_date_qry = "AND DATE(`sales_transaction_hdr`.`date_insert`) = '".$trans_date."'";
    }

    if (!empty($trans_no)){
      $trans_no_qry = "AND trans_no = '".$trans_no."'";
    }

    if (!empty($cust_id)){
      $cust_id_qry = "AND customer_id = '".$cust_id."'";
    }

    if (!empty($agent_id)){
      $agent_id_qry = "AND `sales_transaction_dtl`.`agent_id` = '".$agent_id."'";
    }

    $query = $this->db->query("
      SELECT 
      `sales_transaction_hdr`.`id`,
      `sales_transaction_hdr`.`trans_no`,
      DATE(`sales_transaction_hdr`.`date_insert`) AS trans_date,
      `sales_transaction_hdr`.`total_amount` AS total_amount,
      `customer`.`cust_code`, 
      `customer`.`cust_name`
      FROM sales_transaction_hdr
      INNER JOIN sales_transaction_dtl ON
      `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
      INNER JOIN customer ON
      `customer`.`id` = `sales_transaction_hdr`.`customer_id`
      WHERE  `sales_transaction_hdr`.`outlet_id` = ? AND `sales_transaction_dtl`.`id` NOT IN ?
      ".$trans_date_qry." ".$trans_no_qry." ".$cust_id_qry." ".$agent_id_qry." 
      GROUP BY `sales_transaction_hdr`.`id` ", array($this->session->userdata("outlet_id"), $arr_id))->result();
    

    return $query;
  }

  public function sales_register_products($id, $arr_id){
    $query = $this->db->query("
      SELECT 
      `sales_transaction_hdr`.`trans_no`,
      `sales_transaction_dtl`.`id`,
      `sales_transaction_dtl`.`selling_price`,
      `products`.`id` AS prod_id,
      `products`.`product_no`,
      `products`.`product_name`,
      `sales_transaction_dtl`.`qty`,
      `sales_transaction_dtl`.`vat`,
      `product_unit`.`unit_code`
      FROM sales_transaction_dtl
      INNER JOIN sales_transaction_hdr ON 
      `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
      INNER JOIN products ON
      `products`.`id` = `sales_transaction_dtl`.`product_id`
      INNER JOIN product_unit ON
      `products`.`stock_unit_id` = `product_unit`.`id`
      WHERE `sales_transaction_dtl`.`sales_hdr_id` = ? AND `products`.`for_stock` = ? AND `sales_transaction_dtl`.`id` NOT IN ?", array($id, "1", $arr_id))->result();
    return $query;
  }

  public function get_sales_return_dtl($id){
    $query = $this->db->query("SELECT SUM(`inventory_dtl`.`qty`) AS return_qty, prod_id FROM inventory_dtl WHERE `inventory_dtl`.`sales_reference` = ?", array($id))->result();
    return $query;
  }

  public function select_inventory_receive($receive_no){
    $query = $this->db->query("SELECT inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND inv_no = ?", array($this->session->userdata("outlet_id"), "1", $receive_no))->result();
    return $query;
  }

  public function inv_no_wo_id($receive_no){
    $query = $this->db->query("SELECT inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND inv_no = ?", array($this->session->userdata("outlet_id"), "1", $receive_no))->num_rows();
    return $query;
  }

  public function inv_no_w_id($receive_no, $id){
    $query = $this->db->query("SELECT inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND inv_no = ? AND id = ?", array($this->session->userdata("outlet_id"), "1", $receive_no, $id))->num_rows();
    return $query;
  }

  public function inv_qty ($prod_id){
            // COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0' ) THEN `inventory_dtl`.`qty` END)), 0) - COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0), 0) AS inv_qty,

    $query = $this->db->query("
        SELECT
            COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0' ) THEN `inventory_dtl`.`qty` END)), 0) AS good_stock, 
            COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0' ) THEN `inventory_dtl`.`qty` END)), 0) AS damage,

              COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
              COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
              COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '13') THEN `inventory_dtl`.`qty` END)), 0) + 
              COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '12') THEN  `inventory_dtl`.`qty` END)), 0)
              , 0) AS inv_qty,


            COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0), 0) AS inv_qty_damage
        FROM inventory_hdr
            LEFT JOIN inventory_dtl ON
              `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`
          WHERE `inventory_dtl`.`prod_id` = ? AND `inventory_hdr`.`outlet_id` = ? 

      ", array($prod_id, $this->session->userdata("outlet_id")))->row();
    return $query->inv_qty;
  }

  public function sales_qty($prod_id){
    $query = $this->db->query("
      SELECT COALESCE(SUM(`sales_transaction_dtl`.`qty`), 0) AS sales_qty 
      FROM sales_transaction_hdr  
      INNER JOIN sales_transaction_dtl ON
      `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
      WHERE product_id = ? AND outlet_id = ? AND status = ?", array($prod_id, $this->session->userdata("outlet_id"), "1"))->row();
    return $query->sales_qty;
  }

  public function ave_cost($prod_id){
    // $query = $this->db->query("SELECT * FROM product_ave_cost WHERE prod_id = ?", array($prod_id))->row();
    $query = $this->db->query("SELECT ave_cost FROM products WHERE id = ?", array($prod_id))->row();
    return $query->ave_cost;
  }

  public function update_ave_cost($prod_id, $ave_cost){
    $this->db->where("id", $prod_id);
    $this->db->set("ave_cost", $ave_cost);
    $this->db->update("products");

    return ($this->db->affected_rows() == 1) ? true : false;

  }

  public function get_product_transfer_hdr($trans_no){
  	$query = $this->db->query("SELECT
		    `inventory_hdr`.*
		    , `outlet`.`outlet_code`
		    , `outlet`.`outlet_name`
		FROM
		    `inventory_hdr`
		    LEFT JOIN `outlet` 
		        ON (`inventory_hdr`.`recipient_id` = `outlet`.`id`)
    		WHERE `inventory_hdr`.`inv_type` = ?
		    AND `inventory_hdr`.`inv_no` = ? AND recipient_id = ?", array("2", $trans_no, $this->session->userdata('outlet_id')))->result();
  	return $query;
  }

  public function get_product_transfer_dtl($id){
  	$query = $this->db->query("SELECT
	    	`products`.`product_no`
		    , `products`.`product_name`
		    , `product_unit`.`unit_code`
        , `currency`.`curr_code`
		    , `inventory_dtl`.*
		FROM
		    `inventory_dtl`
		    INNER JOIN `products` 
		        ON (`inventory_dtl`.`prod_id` = `products`.`id`)
		    INNER JOIN `product_unit` 
		        ON (`products`.`stock_unit_id` = `product_unit`.`id`)
		    INNER JOIN `inventory_hdr` 
		        ON (`inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`)
        INNER JOIN `currency`
            ON (`currency`.`id` = `inventory_dtl`.`currency`)
		WHERE (`inventory_hdr`.`id` ='".$id."')")->result();
  	return $query;
  }

  public function receive_list($term,$type,$outlet,$rec_date, $status){
        
        if($term!=""){
            $str1 = "AND (inv_no like '%".$term."%' or supp_name like '".$term."%' or cust_name like '".$term."%') or outlet_name like '".$term."%'";
        }else{
            $str1="";
        }
        if($rec_date!=""){
            $str2 = "AND inv_date = '".$rec_date."' ";
        }else{
            $str2="";
        }

        if ($outlet == "0" || $outlet == ""){
          $str3 = "";
        }else{
          $str3 = "AND `inventory_hdr`.`outlet_id` = '".$outlet."'";
        }

        $user_id = $this->session->userdata('user_id');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT *,
          (CASE WHEN (recipient_type = '1') THEN outlet.outlet_name 
          WHEN (recipient_type = '2') THEN customer.cust_name ELSE supplier.supp_name END) AS supplier_name2,
          (CASE WHEN (recipient_type = '1') THEN outlet.outlet_code 
          WHEN (recipient_type = '2') THEN customer.cust_code ELSE supplier.supp_code END) AS supplier_code2,
          '0' AS total_qty,
          `inventory_hdr`.`id` AS hdr_id,
          `inventory_hdr`.`status` AS inv_status
          FROM inventory_hdr 
          LEFT JOIN outlet ON
          inventory_hdr.recipient_id = outlet.id
          LEFT JOIN supplier ON
          inventory_hdr.recipient_id = supplier.id
          LEFT JOIN customer ON
          inventory_hdr.recipient_id = customer.id
          LEFT JOIN inventory_ref_type ON 
          `inventory_ref_type`.`id` = `inventory_hdr`.`tran_type`
            WHERE `inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` = '".$status."' AND `inventory_hdr`.comp_id = '".$comp_id."' AND `inventory_hdr`.created_by = '".$user_id."' AND `inventory_hdr`.`tran_type` = '".$type."' ".$str2." ".$str1."  ".$str3."
            ORDER BY `inventory_hdr`.`inv_no`
            ")->result();
        return $query;
  }

  public function search_field() {
    $hint = $this->input->get('term');
    $outlet_id = $this->session->userdata('outlet_id');
    $user_id = $this->session->userdata("user_id");
    // $query = $this->db->query("SELECT supplier_code AS term, inv_no as term FROM inventroy_hdr WHERE outlet_id = '".$outlet_id."' and (supplier_code like '%".$hint."%' or inv_no like '".$hint."%') ");
    $query = $this->db->query("SELECT 
      (CASE WHEN (recipient_type = '1') THEN outlet.outlet_name 
      WHEN (recipient_type = '2') THEN customer.cust_name ELSE supplier.supp_name END) AS term, 
      inv_no AS term 
      FROM inventory_hdr
      LEFT JOIN outlet ON
      inventory_hdr.recipient_id = outlet.id
      LEFT JOIN supplier ON
      inventory_hdr.recipient_id = supplier.id
      LEFT JOIN customer ON
      inventory_hdr.recipient_id = customer.id
      WHERE inventory_hdr.outlet_id = '".$outlet_id."' AND inventory_hdr.inv_type = '1' AND created_by = '".$user_id."' AND (supp_name LIKE '%".$hint."%' OR 
      outlet_name LIKE '%".$hint."%' OR cust_name LIKE '%".$hint."%' OR inv_no LIKE '".$hint."%')
      ");
    return $query;
  }

  public function get_receive_hdr($id,$type){
    $str="";
    $str2="";
    if($type == "1"){
      $str="LEFT JOIN outlet ON 
    `outlet`.`id` = `inventory_hdr`.`recipient_id`";
    $str2="`outlet`.outlet_name as supplier_name,`outlet`.outlet_code as supplier_code2";
    }elseif($type == "2"){
      $str="LEFT JOIN customer ON 
    `customer`.`id` = `inventory_hdr`.`recipient_id`";
     $str2="`customer`.cust_name as supplier_name,`customer`.cust_code as supplier_code2";
    }
    $query = $this->db->query("SELECT  
      `inventory_hdr`.*, 
      `inventory_ref_type`.`inventory_ref_type`,
    (CASE WHEN (`inventory_hdr`.`recipient_type` = '1') THEN `outlet`.outlet_code ELSE (CASE WHEN (`inventory_hdr`.`recipient_type` = '2') THEN customer.cust_code ELSE supplier.supp_code END) END) AS supplier_code2,
    (CASE WHEN (`inventory_hdr`.`recipient_type` = '1') THEN `outlet`.outlet_name ELSE (CASE WHEN (`inventory_hdr`.`recipient_type` = '2') THEN customer.cust_name ELSE supplier.supp_name END) END) AS supplier_name
      FROM inventory_hdr 
      LEFT JOIN outlet ON 
      `outlet`.`id` = `inventory_hdr`.`recipient_id`
      LEFT JOIN customer ON 
      `customer`.`id` = `inventory_hdr`.`recipient_id`
      LEFT JOIN supplier ON 
      supplier.id = inventory_hdr.recipient_id
      INNER JOIN inventory_ref_type ON
      `inventory_hdr`.`tran_type` = `inventory_ref_type`.`id`
      WHERE `inventory_hdr`.`id` = '".$id."'")->result();
    return $query;
  }

  public function get_receive_dtl($id){
    $query = $this->db->query("SELECT 
      `inventory_dtl`.*,
      `inventory_dtl`.id AS dtl_id,
      `products`.product_name,
      `products`.product_no, 
      `product_unit`. unit_code, 
      `currency`.`curr_code`,
      `currency`.`id` AS curr_id,
      `sales_transaction_hdr`.`trans_no` AS reference
      FROM inventory_dtl 
      LEFT JOIN products 
          ON (`products`.id = `inventory_dtl`.prod_id)
      LEFT JOIN product_unit 
          ON (`product_unit`. id = `products`.stock_unit_id)
      LEFT JOIN `currency` 
          ON (`currency`.`id` = `inventory_dtl`.`currency`)
      LEFT JOIN `sales_transaction_dtl` 
          ON (`sales_transaction_dtl`.`id` = `inventory_dtl`.`sales_reference`)
      LEFT JOIN (`sales_transaction_hdr`)
          ON (`sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`)

      WHERE hdr_id = '".$id."' 
      ");
    return $query;
  }

  public function get_transfer_dtl($id){
    $query = $this->db->query("SELECT prod_id, qty as transfer_qty FROM inventory_dtl WHERE `inventory_dtl`.`hdr_id` = ?", array($id))->result();
    return $query;
  }

  // SAVING OF TRANSACTION
  public function save_hdr($receive_hdr) {
        $this->db->insert('inventory_hdr', $receive_hdr);
        return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
  }

  public function save_dtl($data,$hdr_id) {
        foreach($data as $key){
            $sub_dtl[] = array(
                    'hdr_id' =>  $hdr_id,
                    'prod_id'=>  $key['prod_id'],
                    'qty'    =>  $key['qty'],
                    'cost'   =>  $key['cost'],
                    'vat' => $key['vat'],
                    'vat_cost' => $key['vat_cost'],
                    'currency' => $key['currency'],
                    'total_cost' => $key['total_price'],
                    'net_vat' => $key['net_vat'],
                    'w_vat' => $key['w_vat'],
                    'w_o_vat' => $key['w_o_vat'],
                    'cost_w_vat' => $key['cost_w_vat'],
                    'cost_w_o_vat' => $key['cost_w_o_vat'],
                    'reason' => $key['reason'],
                    'prod_grade' => $key['prod_grade'],
                    'return_date' => $key['return_date'],
                    'sales_reference' => $key['sales_reference']
            );
        }
        $this->db->insert_batch('inventory_dtl',$sub_dtl);
        return ($this->db->affected_rows() > 0) ? true : false;
  }

  public function update_issuance_status($id, $status){
    $this->db->set("status", $status);
    $this->db->where("id", $id);
    $this->db->update("inventory_hdr");
  }

   //UPDATING OF TRANSACTION
  public function edit_receive_hdr($receive_hdr,$hdr_id) {
        $this->db->where('id',$hdr_id);
        $this->db->update('inventory_hdr',$receive_hdr);
  }

  public function edit_receive_dtl($data,$hdr_id) {
        foreach($data as $key){
            $sub_dtl[] = array(
                    'hdr_id' =>  $hdr_id,
                    'prod_id'=>  $key['prod_id'],
                    'qty'    =>  $key['qty'],
                    'cost'   =>  $key['cost'],
                    'vat' => $key['vat'],
                    'vat_cost' => $key['vat_cost'],
                    'currency' => $key['currency'],
                    'total_cost' => $key['total_price'],
                    'net_vat' => $key['net_vat'],
                    'w_vat' => $key['w_vat'],
                    'w_o_vat' => $key['w_o_vat'],
                    'cost_w_vat' => $key['cost_w_vat'],
                    'cost_w_o_vat' => $key['cost_w_o_vat'],
                    'reason' => $key['reason'],
                    'prod_grade' => $key['prod_grade'],
                    'return_date' => $key['return_date'],
                    'sales_reference' => $key['sales_reference']

            );
        }
        $this->db->where('hdr_id',$hdr_id);
        $this->db->delete('inventory_dtl');
        $this->db->insert_batch('inventory_dtl',$sub_dtl);
        return ($this->db->affected_rows() > 0) ? true : false;
  }

  public function cancel_receive($id){
    $this->db->set("status", "0");
    $this->db->where("id", $id);
    $this->db->update("inventory_hdr");
    return ($this->db->affected_rows() > 0) ? true : false;
  }
  
  public function get_trans_type(){
        $query = $this->db->query("SELECT * FROM inventory_ref_type where inventory_type = '1'")->result();
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
