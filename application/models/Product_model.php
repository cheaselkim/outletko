<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function account_tax(){
        $query = $this->db->query("SELECT vat FROM account_application WHERE id = ?", array($this->session->userdata("comp_id")))->row();
        return $query->vat;
    }

    public function product_type(){
        $query = $this->db->query("SELECT * FROM product_type")->result();
        return $query;
    }

    public function product_brand(){
        $query = $this->db->query("SELECT * FROM product_brand
            WHERE comp_id = ? AND
            (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $this->session->userdata('outlet_id')))->result();
        return $query;
    }

    public function product_model(){
        $query = $this->db->query("SELECT * FROM product_model
            WHERE comp_id = ? AND
            (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $this->session->userdata('outlet_id')))->result();
        return $query;
    }

    public function product_category(){
        $query = $this->db->query("SELECT * FROM product_category
            WHERE comp_id = ? AND
            (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $this->session->userdata('outlet_id')))->result();
        return $query;
    }

    public function product_color(){
        $query = $this->db->query("SELECT * FROM product_color
            WHERE comp_id = ? AND
            (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $this->session->userdata('outlet_id')))->result();
        return $query;
    }

    public function product_size(){
        $query = $this->db->query("SELECT * FROM product_size
            WHERE comp_id = ? AND
            (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $this->session->userdata('outlet_id')))->result();
        return $query;
    }

    public function product_class($prod_cat){
        if (!empty($prod_cat)){
            $query = $this->db->query("SELECT * FROM product_class
                WHERE comp_id = ? AND  class_category = ? AND
                (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $prod_cat, $this->session->userdata('outlet_id')))->result();

        }else{
            $query = $this->db->query("SELECT * FROM product_class WHERE comp_id = ?", array($this->session->userdata('comp_id')))->result();
        }

        return $query;
    }

    public function product_unit(){
        $query = $this->db->query("SELECT * FROM product_unit
            WHERE comp_id = ? AND
            (CASE WHEN (outlet_id = '0') THEN outlet_id = '0' ELSE outlet_id = ? END)", array($this->session->userdata('comp_id'), $this->session->userdata('outlet_id')))->result();
        return $query;
    }

    public function product_tax(){
        $query = $this->db->query("SELECT * FROM vat")->result();
        return $query;
    }

    public function product_ave_cost($id){
        $query = $this->db->query("
            SELECT 
                COALESCE(SUM(`inventory_dtl`.`qty`), 0) AS tot_qty,
                COALESCE(SUM(`inventory_dtl`.`cost`), 0) AS tot_cost,
                COALESCE(SUM(`inventory_dtl`.`total_cost`), 0) AS total_cost,
                COALESCE((SUM(`inventory_dtl`.`total_cost`) / SUM(`inventory_dtl`.`qty`)), 0) AS ave_cost 
            FROM 
                inventory_hdr
                INNER JOIN inventory_dtl ON
                `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`
                WHERE `inventory_hdr`.`inv_type` = ? AND `inventory_dtl`.`prod_id` = ? AND outlet_id = ?", array("1", $id, $this->session->userdata('outlet_id')))->row();
        return $query->ave_cost;
    }

    public function outlet(){
        $data = array();
        $query = $this->db->query("SELECT all_access FROM users WHERE id = '".$this->session->userdata('user_id')."'")->row();

        if ($query->all_access == "1"){
            $result = $this->db->query("SELECT * FROM outlet WHERE comp_id = '".$this->session->userdata('comp_id')."'")->result();
        }else{
            $result = $this->db->query("SELECT
                `outlet`.`id`
                , `outlet`.`outlet_code`
                , `outlet`.`outlet_name`
            FROM
                `user_outlet`
                INNER JOIN `outlet` 
                    ON (`user_outlet`.`outlet_id` = `outlet`.`id`)
            WHERE (`user_outlet`.`user_id` = '".$this->session->userdata('user_id')."');")->result();
        }

        $data['all_access'] = $query->all_access;
        $data['result'] = $result;
        return $data;
    }

    public function product_wo_id($product_no){
        $query = $this->db->query("SELECT * FROM products WHERE  comp_id = ? AND product_no = ?", array($this->session->userdata("comp_id"), $product_no))->num_rows();
        return $query;
    }

    public function product_w_id($product_no, $id){
        $query = $this->db->query("SELECT * FROM products WHERE  comp_id = ? AND product_no = ? AND id != ?", array($this->session->userdata("comp_id"), $product_no, $id))->num_rows();
        return $query;
    }

    public function save_product($product_hdr) {
        $this->db->insert('products', $product_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function upload_image_file($data, $product_no){
        $status = "";
        $this->db->trans_begin();

        $this->db->where('product_no',$this->input->post('product_no'));
        $this->db->update('products',$data);     

        if($this->db->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db->trans_rollback();
           $status = $db_error;
        }else{  
            $this->db->trans_commit();
            $status = "success";
        }   

        return $status;
    }

    public function product_list($type,$term, $outlet, $status, $prod_class, $prod_cat, $prod_brand, $prod_color, $prod_size){
        if($type!=""){
            $str1 = "AND type_id = '".$type."'";
        }else{
            $str1="";
        }
        if($term!=""){
            $str3 = "AND (product_no LIKE '%".$term."%' or product_name LIKE '%".$term."%')";
        }else{
            $str3="";
        }

        if ($outlet != "0"){
            $str4 = "AND (`products`.outlet_id = '".$outlet."')";
        }else{
            $str4 = "";
        }

        if ($prod_class != "0"){
            $str2 = "AND class_id = '".$prod_class."'";
        }else{
            $str2 = "";
        }

        if ($prod_cat != "0"){
            $prod_cat_query = "AND category_id = '".$prod_cat."'";
        }else{
            $prod_cat_query = "";
        }

        if ($prod_brand != "0"){
            $prod_brand_query = "AND brand_id = '".$prod_brand."'";
        }else{
            $prod_brand_query = "";
        }

        if ($prod_color != "0"){
            $prod_color_query = "AND color_id = '".$prod_color."'";
        }else{
            $prod_color_query = "";
        }

        if ($prod_size != "0"){
            $prod_size_query = "AND size_id = '".$prod_size."'";
        }else{
            $prod_size_query = "";
        }

        $str5 = "AND product_status = '".$status."'";

        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT 
            outlet_name, 
            outlet_code, products.*, 
            `product_type`.`prod_type_desc`,
            `product_class`.`class_name`,
            `product_unit`.`unit_code`,
            `status`.`status` 
            FROM products 
            LEFT JOIN product_type ON 
            `products`.type_id = `product_type`.id 
            LEFT JOIN outlet ON
            `outlet`.`id` = `products`.`outlet_id`
            LEFT JOIN status ON
            `status`.`id` = `products`.`product_status`
            LEFT JOIN `product_class` ON
            `product_class`.`id` = `products`.`class_id`
            LEFT JOIN `product_unit` ON
            `product_unit`.`id` = `products`.`stock_unit_id`
            WHERE `products`.comp_id = '".$comp_id."' ".$prod_cat_query." ".$prod_brand_query." ".$prod_color_query." ".$prod_size_query."
            ".$str1."  ".$str3." ".$str4." ".$str5." ".$str2."  ")->result();
        return $query;
    }

    public function inv_qty ($prod_id, $outlet){

        if ($outlet == "0"){
            $comp_outlet = "comp_id";
            $comp_outlet_id = $this->session->userdata("comp_id");
        }else{
            $comp_outlet = "outlet_id";
            $comp_outlet_id = $outlet;
        }

        $query = $this->db->query("
        SELECT
            COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0) AS good_stock, 
            COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` != '1') THEN `inventory_dtl`.`qty` END)), 0) AS damage,
            COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0'  AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0) - COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` END)), 0), 0) AS inv_qty_good_stock,
            COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0'  AND `inventory_dtl`.`prod_grade` != '1') THEN `inventory_dtl`.`qty` END)), 0) - COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0' AND `inventory_dtl`.`prod_grade` != '1') THEN `inventory_dtl`.`qty` END)), 0), 0) AS inv_qty_damage
        FROM inventory_hdr
            LEFT JOIN inventory_dtl ON
              `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`
          WHERE `inventory_dtl`.`prod_id` = ? AND `inventory_hdr`.".$comp_outlet." = ? 
          ", array($prod_id, $comp_outlet_id))->result();
        return $query;
    }

    public function sales_qty($prod_id, $outlet){
        $query = $this->db->query("
          SELECT COALESCE(SUM(`sales_transaction_dtl`.`qty`), 0) AS sales_qty 
          FROM sales_transaction_hdr  
          INNER JOIN sales_transaction_dtl ON
          `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
          WHERE product_id = ? AND outlet_id = ? AND status = ?", array($prod_id, $outlet, "1"))->row();
        return $query->sales_qty;
    }


    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT product_no as term, product_name as term FROM products where comp_id = '".$comp_id."' and (product_no like '%".$hint."%' or product_name like '%".$hint."%') ");
        return $query;
    }

    public function update_product($id,$product_hdr) {
        $this->db->where('id',$id);
        $this->db->update('products',$product_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_product_dtl($id){
    $query = $this->db->query("SELECT * from products where id = '".$id."' ")->result();
    return $query;
    }

    public function delete_product($id){
        $this->db->query("DELETE FROM products WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
   


}
