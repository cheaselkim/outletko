<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
      $result = $this->login_model->check_session();
      if ($result != true){
        redirect("/");
      }
  }

  public function open_transaction(){
    $query = $this->db->query("SELECT id FROM sales_transaction_hdr WHERE outlet_id = ? AND user = ? AND status = ? AND DATE(`sales_transaction_hdr`.`date_insert`) < ?", array($this->session->userdata('outlet_id'), $this->session->userdata("user_id"), "1", date("Y-m-d")))->num_rows();
    return $query;    
  }

  public function closed_transaction(){
    $query = $this->db->query("SELECT id FROM sales_transaction_hdr WHERE outlet_id = ? AND user = ? AND status = ? AND DATE(`sales_transaction_hdr`.`date_insert`) = ?", array($this->session->userdata('outlet_id'), $this->session->userdata("user_id"), "2", date("Y-m-d")))->num_rows();
    return $query;
  }

  public function max_transno(){
    $query = $this->db->query("SELECT LPAD((MAX(trans_no) + 1), 5, '0') AS max_transno FROM sales_transaction_hdr WHERE outlet_id = ? AND user = ?", array($this->session->userdata('outlet_id'), $this->session->userdata("user_id")))->row();

    if (empty($query->max_transno)){
      $max_transno = "00001";
    }else{
      $max_transno = $query->max_transno;
    }

    return $max_transno;
  }

  public function currency(){
    $query = $this->db->query("SELECT id, curr_code FROM currency ORDER BY FIELD(curr_code, 'CNY', 'USD', 'PHP') DESC LIMIT 3")->result();         
    return $query;
  }

  public function payment_type(){
    $query = $this->db->query("SELECT * FROM payment_type")->result();
    return $query;
  }

  public function payment_term(){
    $query = $this->db->query("SELECT * FROM payment_term")->result();
    return $query;
  }

  public function bank_list(){
    $query = $this->db->query("SELECT * FROM bank_list ")->result();
    return $query;
  }

  public function comp_bank(){
    $query = $this->db->query("SELECT * FROM comp_bank WHERE comp_id = ? AND outlet_id IN ?", array($this->session->userdata('comp_id'), array("0", $this->session->userdata("outlet_id"))))->result();
    return $query;
  }
  
  public function outlet(){
  	$result = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
  	return $result;
  }

  public function item_type(){
    $result = $this->db->query("SELECT * FROM product_type")->result();
    return $result;
  }
  
  public function item_category(){
  	$result = $this->db->query("SELECT * FROM product_category WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
  	return $result;
  }

  public function item_class($category){
    $category_query = "";

    if (!empty($category)){
      $category_query = "AND class_category = '".$category."' ";
    }

    $result = $this->db->query("SELECT * FROM product_class WHERE comp_id = ? ".$category_query." ", array($this->session->userdata("comp_id")))->result();
    return $result;
  }

  public function item_brand(){
    $result = $this->db->query("SELECT * FROM product_brand WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
    return $result;
  }

  public function item_color(){
    $result = $this->db->query("SELECT * FROM product_color WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
    return $result;
  }

  public function item_size(){
    $result = $this->db->query("SELECT * FROM product_size WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
    return $result;
  }

  public function discount(){
    $query = $this->db->query("SELECT * FROM sales_discount WHERE comp_id IN  ?", array(array("0", $this->session->userdata("comp_id"))))->result();
    return $query;
  }

  public function agent($id){
    $query = $this->db->query("SELECT id,CONCAT(first_name,' ',last_name) AS name, share, account_id  FROM sales_force WHERE id = ?", array($id))->row();
    return $query;    
  }

  public function search_custcode($cust_code){
    $query = $this->db->query("SELECT id, cust_code, cust_name FROM customer WHERE comp_id IN ? AND cust_code LIKE ? AND outlet_id IN ?", array(array($this->session->userdata("comp_id"), "0"), '%'.$cust_code.'%', array($this->session->userdata('outlet_id'), "0")))->result();
    return $query;
  }

  public function search_custname($cust_name){
    $query = $this->db->query("SELECT id, cust_code, cust_name FROM customer WHERE comp_id IN ? AND cust_name LIKE ? AND outlet_id IN ?", array(array($this->session->userdata("comp_id"), "0"), '%'.$cust_name.'%', array($this->session->userdata('outlet_id'), "0")))->result();
    return $query;
  }
  
  public function customer($cust_code){
      $query = $this->db->query("SELECT id, cust_code FROM customer WHERE cust_name = ? AND comp_id = ? ORDER BY cust_code ASC LIMIT 1 ", array("CASH", $this->session->userdata("comp_id")))->result();
      return $query;
  }

  //new
  public function search_partner($partner){
    // $query = $this->db->query("SELECT id,CONCAT(first_name,' ',last_name) AS name, share FROM sales_force WHERE type != '2' AND comp_id IN ? AND first_name LIKE ? OR last_name LIKE ?", array( array($this->session->userdata("comp_id"), "0"), '%'.$partner.'%' , '%'.$partner.'%'))->result();
    $query = $this->db->query("SELECT id,CONCAT(first_name,' ',last_name) AS name, share, account_id FROM sales_force WHERE type != '2' AND comp_id IN ? AND outlet = ? AND (first_name LIKE ? OR last_name LIKE ?)", array( array($this->session->userdata("comp_id"), "0"), $this->session->userdata('outlet_id'), '%'.$partner.'%' , '%'.$partner.'%'))->result();
    return $query;
  }

  public function search_partner_id($id){
    $query = $this->db->query("SELECT id,CONCAT(first_name,' ',last_name) AS name, share FROM sales_force WHERE id = '".$id."' ")->result();
    return $query;
  }


  public function search_item($item_no, $item_name, $item_type, $item_category, $item_class, $item_brand, $item_color, $item_size, $item_model){
    $sql = "";
    $item_no_query = "";
    $item_name_query = "";
    $item_category_query = "";
    $item_class_query = "";
    $item_brand_query = "";
    $item_color_query = "";
    $item_size_query = "";
    $item_model_query = "";

    if (!empty($item_no)){
      $item_no_query = " AND `products`.`product_no` = '".$item_no."'";
    }

    if (!empty($item_name)){
      $item_name_query = " AND  `products`.`product_name` = '".$item_name."'";
    }

    if (!empty($item_category)){
      $item_category_query = " AND `products`.`category_id` = '".$item_category."'";
    }

    if (!empty($item_class)){
      $item_class_query = " AND `products`.`class_id` = '".$item_class."'";
    }

    if (!empty($item_brand)){
      $item_brand_query = " AND `products`.`brand_id` = '".$item_brand."'";
    }

    if (!empty($item_color)){
      $item_color_query = " AND `products`.`color_id` = '".$item_color."'";
    }

    if (!empty($item_size)){
      $item_size = " AND `products`.`size_id` = '".$item_size."'";
    }

    if (!empty($item_model)){
      $item_model = " AND `products`.`model_id` = '".$item_model."'";
    }


      // COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0) - COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0), 0) AS inventory_qty 



    $sql .= "SELECT 
      `products`.`id`,
      `products`.`product_no`,
      `products`.`product_name`,
      `product_category`.`category_desc`,
      `products`.`for_stock`,
      COALESCE(`inv`.`inventory_qty`, 0) AS inventory_qty,
      `product_unit`.`unit_code`,
      `product_unit`.`unit_name`,
      `product_unit`.`unit_desc`,
      `products`.`reg_selling_price`,
      `products`.`discount`
      FROM `products`
      LEFT JOIN (SELECT prod_id, 

      COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '13') THEN `inventory_dtl`.`qty` END)), 0) + 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '12') THEN  `inventory_dtl`.`qty` END)), 0)
      , 0) AS inventory_qty


      FROM inventory_dtl  LEFT JOIN inventory_hdr ON `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id` WHERE `inventory_hdr`.`outlet_id` = '".$this->session->userdata('outlet_id')."' GROUP BY prod_id) AS inv
      ON `inv`.prod_id = `products`.id
      LEFT JOIN `product_unit` ON
      `product_unit`.`id` = `products`.`stock_unit_id`
      LEFT JOIN `product_category` ON
      `products`.`category_id` = `product_category`.`id`
      WHERE `products`.`comp_id` = ?
      ".$item_no_query."".$item_name_query." ".$item_category_query." 
      ".$item_class_query." ".$item_brand_query." ".$item_color_query."
      ".$item_size_query." ".$item_model_query."
      ORDER BY products.id";
      /*AND 
      (CASE WHEN (`products`.`outlet_id` = '0') THEN `products`.`outlet_id` = '0' ELSE `products`.`outlet_id` = '".$this->session->userdata("outlet_id")."' END)*/

    // if ($item_keyword != ""){
    //   $sql .= "AND product_name LIKE '%".$item_keyword."%'";
    //   $item_search = $item_keyword;
    // }else{
    //   $sql .= "AND `products`.`category_id` = '".$item_cat."'";
    //   $item_search = $item_cat;
    // }

    $result = $this->db->query($sql, array($this->session->userdata("comp_id")))->result();

    return $result;
  }  

  public function sales_qty_groupby_prod(){
    $query = $this->db->query("
      SELECT SUM(`sales_transaction_dtl`.`qty`) AS sales_qty, product_id
      FROM sales_transaction_hdr  
      INNER JOIN sales_transaction_dtl ON
      `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
      WHERE outlet_id = ? AND `sales_transaction_hdr`.`status` != ?
      GROUP BY product_id
      ORDER BY product_id", array($this->session->userdata("outlet_id"), "0"))->result();
    return $query;
  }


  public function select_item($prod_id){

    $sql = "SELECT 
      `products`.`id`,
      `products`.`product_no`,
      `products`.`product_name`,
      `products`.`type_id`,
      `products`.`for_stock`,
      `inv`.`inventory_qty`,
      `product_unit`.`unit_desc`,
      `product_unit`.`unit_code`,
      `product_unit`.`unit_name`,
      `products`.`reg_selling_price`,
      `products`.`image_loc`,
      `products`.`vat`,
      `products`.`discount`
      FROM `products`
      LEFT JOIN (SELECT prod_id, 

      COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '13') THEN `inventory_dtl`.`qty` END)), 0) + 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '12') THEN  `inventory_dtl`.`qty` END)), 0)
      , 0) AS inventory_qty


      FROM inventory_dtl LEFT JOIN inventory_hdr ON `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id` WHERE `inventory_hdr`.`outlet_id` = '".$this->session->userdata('outlet_id')."'
        GROUP BY prod_id) AS inv
      ON `inv`.prod_id = `products`.id
      LEFT JOIN `product_unit` ON
      `product_unit`.`id` = `products`.`stock_unit_id`
      WHERE `products`.`id` = ? ";

    $result = $this->db->query($sql, $prod_id)->result();
    return $result;
  }

  public function inv_qty ($prod_id){
    $query = $this->db->query("
      SELECT 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) AS receive_inv, 
      COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) AS issuance_inv,
        COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0'  AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0) - COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0), 0) AS inv_qty
      FROM inventory_hdr
      LEFT JOIN inventory_dtl ON
      `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`
      WHERE `inventory_dtl`.`prod_id` = ? AND `inventory_hdr`.`outlet_id` = ? 
      ", array($prod_id, $this->session->userdata("outlet_id")))->row();
    return $query->inv_qty;
  }

  public function sales_qty($prod_id){

    $query = $this->db->query("
      SELECT SUM(`sales_transaction_dtl`.`qty`) AS sales_qty 
      FROM sales_transaction_hdr  
      INNER JOIN sales_transaction_dtl ON
      `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
      WHERE product_id = ? AND outlet_id = ? AND status != ?", 
      array($prod_id, $this->session->userdata("outlet_id"), "0"))->row();
    return $query->sales_qty;
  }
  
  public function search_field($term) {
    $comp_id = $this->session->userdata('comp_id');
    $query = $this->db->query("SELECT * FROM products WHERE comp_id = '".$comp_id."' and product_name like '%".$term."%' LIMIT 10")->result();
    return $query;
  }

  public function search_item_name($term) {
    $comp_id = $this->session->userdata('comp_id');
    $query = $this->db->query("SELECT * FROM products WHERE comp_id = '".$comp_id."' and product_no like '%".$term."%'  LIMIT 10")->result();
    return $query;
  }

  public function search_item_model($term) {
    $comp_id = $this->session->userdata('comp_id');
    $query = $this->db->query("SELECT * FROM products WHERE comp_id = '".$comp_id."' and model_id like '%".$term."%'  LIMIT 10")->result();
    return $query;
  }
    
    public function search_trans() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT  trans_no as term FROM sales_transaction_hdr where comp_id = '".$comp_id."' and trans_no like '%".$hint."%' ");
        return $query;
    }

  public function sales_query($keyword, $status, $trans_date, $outlet){

    $outlet_query = "";
    $status_query = "";
    $trans_date_query = "";
    $keyword_query = "";

    // if (!empty($outlet) || ($outlet != "0")){
    //   $outlet_query = "AND (sales_transaction_hdr.outlet_id = '".$outlet."')";
    // }

    if (!empty($keyword)){
      $keyword_query = "AND (`customer`.`cust_name` LIKE '%".$keyword."%' or `sales_transaction_hdr`.`trans_no` LIKE '%".$keyword."%')";
    }

    if (!empty($trans_date)){
      $trans_date_query = "AND (DATE(sales_transaction_hdr.date_insert) = '".$trans_date."')";
    }

    if (!empty($status)){
      $status_query = "AND (status = '".$status."')";
    }


    $sql = "SELECT 
    `customer`.`cust_name`, 
    `sales_transaction_hdr`.* 
    FROM sales_transaction_hdr 
    LEFT JOIN customer ON 
    `customer`.`id` = `sales_transaction_hdr`.`customer_id`
    WHERE `sales_transaction_hdr`.`comp_id` = '".$this->session->userdata("comp_id")."' AND `sales_transaction_hdr`.`outlet_id` = '".$this->session->userdata('outlet_id')."'
    AND `sales_transaction_hdr`.`user` = '".$this->session->userdata('user_id')."'
    ".$status_query." ".$trans_date_query." ".$keyword_query." ".$outlet_query."  ";
    // var_dump($sql);
    /*AND ((`customer`.`cust_name` LIKE '%".$keyword."%' or `sales_transaction_hdr`.`trans_no` LIKE '%".$keyword."%') AND status = '".$status."') AND DATE(date_insert) = '".date("Y-m-d")."'*/
    // $result = $this->db->query($sql, array($this->session->userdata("comp_id"), $keyword, $keyword, $status))->result();
    $result = $this->db->query($sql)->result();
    return $result;
  }

  

  public function get_transaction_hdr($id){
    $query = $this->db->query("SELECT  
    `sales_transaction_hdr`.*,
    `customer`.`cust_code`,
    `customer`.`cust_name`
    FROM sales_transaction_hdr
    LEFT JOIN customer ON 
    `customer`.`id` = `sales_transaction_hdr`.`customer_id`
    WHERE `sales_transaction_hdr`.`id` = '".$id."' ")->result();
    return $query;
  }

  public function get_transaction_dtl($id){
    $query = $this->db->query(" SELECT 
      sales_transaction_dtl.*,
      `sales_transaction_dtl`.`vat` as sale_vat,
      `products`.`product_no`,
      `products`.`product_name`,
      `products`.`reg_selling_price`,
      `product_unit`.`unit_code` 
      FROM sales_transaction_dtl 
      LEFT JOIN products ON `products`.id = `sales_transaction_dtl`.product_id
      LEFT JOIN product_unit ON `product_unit`. id = `products`.stock_unit_id
      WHERE sales_hdr_id = '".$id."' ");
    return $query;
  }

  public function get_transaction_payment($id){
    $query = $this->db->query("SELECT * from payment_transaction where sales_hdr_id = '".$id."' ")->result();
    return $query;
  }

  // SAVING OF TRANSACTION
  public function save_transaction_hdr($sales_hdr) {
    $this->db->insert('sales_transaction_hdr', $sales_hdr);
    return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
  }

  public function save_transaction_dtl($data,$hdr_id) {
        foreach($data as $key){
            $sub_dtl[] = array(
                    'sales_hdr_id' =>  $hdr_id,
                    'product_id'   =>  $key['product_id'],
                    'qty'          =>  $key['qty'],
                    'selling_price'=>  $key['selling_price'],
                    'total_price'  =>  $key['total_price'],
                    'discount_id' => $key['discount_id'],
                    'volume_discount'  =>  $key['volume_discount'],
                    'volume_discount_per'  =>  $key['volume_discount_percent'],
                    'total_selling_price'  =>  $key['total_selling_price'],
                    'vat'  =>  $key['vat'],
                    'net_vat'  =>  $key['net_vat'],
                    'agent_id' => $key['agent_id'],
                    'share'  =>  $key['share'],
                    'share_amount'  =>  $key['share_amount'],
                    'total_amount'  =>  $key['total_amount']
            );
        }
        $this->db->insert_batch('sales_transaction_dtl',$sub_dtl);
        return ($this->db->affected_rows() > 0) ? true : false;
  }

  public function save_payment_dtl($data) {
        $this->db->insert('payment_transaction', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
  }

  // ANOTHER WAY OF SAVING
  public function save_transaction($sales_hdr,$sales_dtl,$payment_dtl) {
        
        $db->trans_begin();
        $this->db->insert('sales_transaction_hdr2', $sales_hdr);
        $hdr_id = $this->db->insert_id() ;

        foreach($data as $key){
            $sub_dtl[] = array(
                    'sales_hdr_id' =>  $hdr_id,
                    'product_id'   =>  $key['product_id'],
                    'qty'          =>  $key['qty'],
                    'selling_price'=>  $key['selling_price'],
                    'total_price'  =>  $key['total_price'],
                    'volume_discount'  =>  $key['volume_discount'],
                    'total_selling_price'  =>  $key['total_selling_price'],
                    'share'  =>  $key['share'],
                    'share_amount'  =>  $key['share_amount'],
                    'total_amount'  =>  $key['total_amount']
            );
        }
        $this->db->insert_batch('sales_transaction_dtl',$sub_dtl);

        $data = array(
                    'sales_hdr_id'   => $hdr_id,
                    'payment_date'   => $payment_dtl['payment_date'],
                    'payment_type_id'=> $payment_dtl['payment_type_id'],
                    'bank_id'        => $payment_dtl['bank_id'],
                    'check_card_no'  => $payment_dtl['check_card_no'],
                    'check_date'     => $payment_dtl['check_date'],
                    'curr_id'        => $payment_dtl['curr_id'],
                    'amount'         => $payment_dtl['amount']
                );
        $this->db->insert('payment_transaction', $data);

        if($db->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $db->trans_rollback();
            return $db_error;
        }else{  
             $db->trans_commit();
           return true;
        }   
  }

  public function update_product_cost($product){


  }

  //  UPDATING OF TRANSACTION
  public function edit_transaction_hdr($sales_hdr,$hdr_id) {
        $this->db->where('id',$hdr_id);
        $this->db->update('sales_transaction_hdr',$sales_hdr);
  }

  public function edit_transaction_dtl($data,$hdr_id) {
        foreach($data as $key){
            $sub_dtl[] = array(
                    'sales_hdr_id' =>  $hdr_id,
                    'product_id'   =>  $key['product_id'],
                    'qty'          =>  $key['qty'],
                    'selling_price'=>  $key['selling_price'],
                    'total_price'  =>  $key['total_price'],
                    'discount_id' => $key['discount_id'],
                    'volume_discount'  =>  $key['volume_discount'],
                    'volume_discount_per'  =>  $key['volume_discount_percent'],
                    'total_selling_price'  =>  $key['total_selling_price'],
                    'vat'  =>  $key['vat'],
                    'net_vat'  =>  $key['net_vat'],
                    'agent_id' => $key['agent_id'],
                    'share'  =>  $key['share'],
                    'share_amount'  =>  $key['share_amount'],
                    'total_amount'  =>  $key['total_amount']
            );
        }
        $this->db->where('sales_hdr_id',$hdr_id);
        $this->db->delete('sales_transaction_dtl');
        $this->db->insert_batch('sales_transaction_dtl',$sub_dtl);
        return ($this->db->affected_rows() > 0) ? true : false;
  }

  public function edit_payment_dtl($data,$hdr_id) {
        $this->db->where('sales_hdr_id',$hdr_id);
        $this->db->update('payment_transaction',$data);
        return ($this->db->affected_rows() > 0) ? true : false;
  }

  public function cancel_trans($id){
    $this->db->where("id", $id);
    $this->db->set("status", "0");
    $this->db->update("sales_transaction_hdr");
    return ($this->db->affected_rows() > 0) ? true : false;
  }
  
  public function end_day_query($fdate, $tdate, $status){
    $comp_outlet = "";
    $comp_outlet_id = "";
    $user = "";
    $user_id = "";

    if ($this->session->userdata("owner") != "0"){
      $comp_outlet = "comp_id";
      $comp_outlet_id = $this->session->userdata("comp_id");
    }else{
      $user = " AND `sales_transaction_hdr`.`user` = '".$this->session->userdata("user_id")."'";
      $comp_outlet = "outlet_id";
      $comp_outlet_id = $this->session->userdata("outlet_id");
    }


    $query = $this->db->query("
      SELECT 
      `sales_transaction_hdr`.`status`,
      DATE(`sales_transaction_hdr`.`date_insert`) AS trans_date, 
      `outlet`.`outlet_code`,
      `outlet`.`id` AS outlet_id,
      COUNT(`sales_transaction_hdr`.`id`) AS total_trans,
      `currency`. `curr_code`,
      SUM(`sales_transaction_hdr`.`total_amount`)AS total_amount,
      SUM(`sales_transaction_hdr`.`vat_amount`) AS total_vat,
      SUM(`sales_transaction_hdr`.`net_vat`) AS total_net_vat,
      `users`.`account_id`,
      `users`.`id` AS user_id
      FROM sales_transaction_hdr 
      LEFT JOIN outlet ON
      `outlet`.`id` = `sales_transaction_hdr`.`outlet_id`
      LEFT JOIN account_application ON 
      `account_application`.`id` = `sales_transaction_hdr`.`comp_id`
      LEFT JOIN currency ON
      `currency`.`id` = `account_application`.`currency`
      LEFT JOIN users ON
      `users`.`id` = `sales_transaction_hdr`.`user`
      WHERE `sales_transaction_hdr`.`status` = ? AND prev_trans = '0'
      AND (DATE(`sales_transaction_hdr`.`date_insert`) >= ? AND DATE(`sales_transaction_hdr`.`date_insert`) <= ?)
      AND `sales_transaction_hdr`.`".$comp_outlet."` = ?
      ".$user."
      GROUP BY DATE(`sales_transaction_hdr`.`date_insert`), `sales_transaction_hdr`.`user`
    ", array($status, $fdate, $tdate, $comp_outlet_id))->result();

    return $query;
  }  

  public function end_day_payment_transaction($trans_date, $user_id, $outlet_id){
    $query = $this->db->query("
    SELECT 
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '1') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS cash_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '2') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS card_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '3') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS check_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '4') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS pdc_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '5') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS online_payment
    FROM sales_transaction_hdr 
    INNER JOIN payment_transaction ON
    `payment_transaction`.`sales_hdr_id` = `sales_transaction_hdr`.`id`
    WHERE `sales_transaction_hdr`.`user` = ? 
    AND `sales_transaction_hdr`.`outlet_id` = ?
    AND DATE(`sales_transaction_hdr`.`date_insert`) = ? ", 
    array($user_id, $outlet_id, date("Y-m-d", strtotime($trans_date))))->result();
    return $query;
  }

  public function process_end_day($trans_date, $user_id, $outlet_id, $status){

    $this->db->set("status", $status);
    $this->db->set("user_close", $this->session->userdata("user_id"));
    $this->db->set("date_close", date("Y-m-d H:i:s"));
    $this->db->where("DATE(date_insert)", date("Y-m-d", strtotime($trans_date)));
    $this->db->where("user", $user_id);
    $this->db->where("outlet_id", $outlet_id);
    $this->db->update("sales_transaction_hdr");

    return ($this->db->affected_rows() > 0) ? 1 : 0;
  }

  public function prev_trans_list($fdate, $tdate, $status){
    $comp_outlet = "";
    $comp_outlet_id = "";
    $user = "";
    $user_id = "";

    if ($this->session->userdata("owner") != "0"){
      $comp_outlet = "comp_id";
      $comp_outlet_id = $this->session->userdata("comp_id");
    }else{
      $user = " AND `sales_transaction_hdr`.`user` = '".$this->session->userdata("user_id")."'";
      $comp_outlet = "outlet_id";
      $comp_outlet_id = $this->session->userdata("outlet_id");
    }


    $query = $this->db->query("
      SELECT 
      `sales_transaction_hdr`.`status`,
      DATE(`sales_transaction_hdr`.`date_prev`) AS trans_date, 
      `outlet`.`outlet_code`,
      `outlet`.`id` AS outlet_id,
      COUNT(`sales_transaction_hdr`.`id`) AS total_trans,
      `currency`. `curr_code`,
      SUM(`sales_transaction_hdr`.`total_amount`)AS total_amount,
      SUM(`sales_transaction_hdr`.`vat_amount`) AS total_vat,
      SUM(`sales_transaction_hdr`.`net_vat`) AS total_net_vat,
      `users`.`account_id`,
      `users`.`id` AS user_id
      FROM sales_transaction_hdr 
      LEFT JOIN outlet ON
      `outlet`.`id` = `sales_transaction_hdr`.`outlet_id`
      LEFT JOIN account_application ON 
      `account_application`.`id` = `sales_transaction_hdr`.`comp_id`
      LEFT JOIN currency ON
      `currency`.`id` = `account_application`.`currency`
      LEFT JOIN users ON
      `users`.`id` = `sales_transaction_hdr`.`user`
      WHERE `sales_transaction_hdr`.`status` = ? AND prev_trans = '1'
      AND (DATE(`sales_transaction_hdr`.`date_prev`) >= ? AND DATE(`sales_transaction_hdr`.`date_prev`) <= ?)
      AND `sales_transaction_hdr`.`".$comp_outlet."` = ?
      ".$user."
      GROUP BY DATE(`sales_transaction_hdr`.`date_insert`), `sales_transaction_hdr`.`user`
    ", array($status, $fdate, $tdate, $comp_outlet_id))->result();

    return $query;
  }  

  public function prev_end_day($trans_date, $user_id, $outlet_id){
    $query = $this->db->query("
    SELECT 
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '1') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS cash_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '2') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS card_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '3') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS check_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '4') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS pdc_payment,
      COALESCE(SUM(CASE WHEN (`payment_transaction`.`payment_type_id` = '5') THEN `sales_transaction_hdr`.`total_amount` END), 0) AS online_payment
    FROM sales_transaction_hdr 
    INNER JOIN payment_transaction ON
    `payment_transaction`.`sales_hdr_id` = `sales_transaction_hdr`.`id`
    WHERE `sales_transaction_hdr`.`user` = ? AND `sales_transaction_hdr`.`prev_trans` = '1'
    AND `sales_transaction_hdr`.`outlet_id` = ?
    AND DATE(`sales_transaction_hdr`.`date_prev`) = ? ", 
    array($user_id, $outlet_id, date("Y-m-d", strtotime($trans_date))))->result();
    return $query;
  }

  public function process_prev_end_day($trans_date, $user_id, $outlet_id, $status){

    $this->db->set("status", $status);
    $this->db->set("user_close", $this->session->userdata("user_id"));
    $this->db->set("date_close", date("Y-m-d H:i:s"));
    $this->db->where("DATE(date_prev)", date("Y-m-d", strtotime($trans_date)));
    $this->db->where("user", $user_id);
    $this->db->where("outlet_id", $outlet_id);
    $this->db->update("sales_transaction_hdr");

    return ($this->db->affected_rows() > 0) ? 1 : 0;
  }

}
