<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_adjustment_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $result = $this->login_model->check_session();
            if ($result != true){
                redirect("/");
            }
    }

    public function adjustment_no($tran_type){
        $query = $this->db->query("SELECT MAX(inv_no) AS inv_no FROM inventory_hdr WHERE outlet_id = ? AND inv_type = ? AND created_by = ? AND tran_type = ?", array($this->session->userdata('outlet_id'), "5", $this->session->userdata("user_id"), $tran_type))->row();

        if (empty($query->inv_no)){
          $max_no = "5".$tran_type."-000001";
        }else{
          $max_no = "5".$tran_type."-".str_pad((substr($query->inv_no, -6) + 1), 6, '0', STR_PAD_LEFT);
        }

        return $max_no;

    }

    public function adjustment_type(){
        $query = $this->db->query("SELECT * FROM inventory_ref_type WHERE inventory_type = ?", array("5"))->result();
        return $query;
    }

    public function product_type(){
        $query = $this->db->query("SELECT * FROM product_type")->result();
        return $query;
    }

    public function product_class(){
        $query = $this->db->query("SELECT * FROM product_class WHERE comp_id = ? AND outlet_id IN ? ", array($this->session->userdata("comp_id"), array("0", $this->session->userdata("outlet_id"))))->result();
        return $query;
    }

    public function entry_query($product_type, $product_class, $product_id, $status){
        $product_id_query = "";
        $product_class_query = "";

        if (!empty($product_id)){
            $product_id_query = " AND  `products`.`id` = '".$product_id."'";
        }

        if (!empty($product_class)){
            $product_class_query = "AND class_id = '".$product_class."'";
        }

        $query = $this->db->query("
            SELECT 
            products.*,
            product_unit.`unit_code`,
            COALESCE(`inv`.`inventory_qty`, 0) AS inventory_qty,
            inv.prod_grade
            FROM products 
            INNER JOIN (
                SELECT 
                prod_id, 
                prod_grade,
                COALESCE(COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '1' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
                COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '2' AND `inventory_hdr`.`status` != '0') THEN `inventory_dtl`.`qty` END)), 0) - 
                COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '13') THEN `inventory_dtl`.`qty` END)), 0) + 
                COALESCE((SUM(CASE WHEN (`inventory_hdr`.`inv_type` = '5' AND `inventory_hdr`.`status` != '0' AND `inventory_hdr`.`tran_type` = '12') THEN  `inventory_dtl`.`qty` END)), 0)
                , 0) AS inventory_qty   
                FROM inventory_dtl  
                LEFT JOIN inventory_hdr ON 
                `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id` 
                WHERE `inventory_hdr`.`outlet_id` = '".$this->session->userdata('outlet_id')."' GROUP BY prod_id) AS inv     
            ON `inv`.prod_id = `products`.id
            
            INNER JOIN product_unit ON 
            `products`.`stock_unit_id` = `product_unit`.`id`
            WHERE 
            `products`.`comp_id` = ? 
            AND `products`.`outlet_id` IN ? 
            AND type_id = ? 
            AND product_status = ?  
            ".$product_id_query." 
            ".$product_class_query." 
            ORDER BY products.product_no, inv.prod_grade",
            array($this->session->userdata("comp_id"), 
                array("0", $this->session->userdata("outlet_id")), $product_type, $status) )->result();
        
        return $query;
    }

    public function sales_qty(){
        $query = $this->db->query("
            SELECT 
                SUM(`sales_transaction_dtl`.`qty`) AS sales_qty, product_id
            FROM sales_transaction_hdr  
            INNER JOIN sales_transaction_dtl ON
                `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
            WHERE outlet_id = ? AND `sales_transaction_hdr`.`status` = ?
            GROUP BY product_id
            ORDER BY product_id", array($this->session->userdata('outlet_id'), "1"))->result();
        return $query;
    }

    public function search_item($prod){
        $comp_id = $this->session->userdata("comp_id");
        $outlet_id = $this->session->userdata("outlet_id");

        $sql = "SELECT product_no AS term, id, type_id, class_id, product_status  FROM products WHERE product_no LIKE '%".$prod."%' AND comp_id = '".$comp_id."' AND outlet_id IN (0,".$outlet_id.")
                UNION 
                SELECT product_name, id, type_id, class_id, product_status AS term FROM products WHERE product_name LIKE '%".$prod."%' AND comp_id = '".$comp_id."' AND outlet_id IN (0, ".$outlet_id.")";

        $query = $this->db->query($sql)->result();
        return $query;       
    }

    public function insert_adjustment_hdr($adjustment_hdr){
        $this->db->insert('inventory_hdr', $adjustment_hdr);
        return ($this->db->affected_rows() == 1) ? $this->db->insert_id() : false;
    }

    public function insert_adjustment_dtl($adjustment_dtl){
        $this->db->insert('inventory_dtl',$adjustment_dtl);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query($adjustment_date, $adjustment_type, $keyword, $status){

        $adjustment_date_query = "";
        $keyword_query = "";

        if (!empty($adjustment_date)){
            $adjustment_date_query = " AND `inventory_hdr`.`inv_date` = '".$adjustment_date."'";
        }

        if (!empty($keyword)){
            $keyword_query = " AND (`inventory_hdr`.`inv_no` = '".$keyword."' OR `products`.`product_no` = '".$keyword."' OR `products`.`product_name` = '".$keyword."'";
        }

        $query = $this->db->query("SELECT 
                                    `inventory_hdr`.*,
                                    `inventory_dtl`.`qty`,
                                    `inventory_dtl`.`prod_grade`,
                                    `products`.`product_no`,
                                    `products`.`product_name`,
                                    `product_unit`.`unit_code`
                                    FROM inventory_hdr
                                    INNER JOIN inventory_dtl ON
                                    `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`
                                    LEFT JOIN products ON
                                    `inventory_dtl`.`prod_id` = `products`.`id`
                                    LEFT JOIN product_unit ON 
                                    `products`.`stock_unit_id` = `product_unit`.`id`
                                    WHERE 
                                    `inventory_hdr`.`comp_id` = ? AND 
                                    `inventory_hdr`.`outlet_id` = ? AND 
                                    `inventory_hdr`.`created_by` = ? AND 
                                    `inventory_hdr`.`inv_type` = ? AND 
                                    `inventory_hdr`.`tran_type` = ? AND 
                                    `inventory_hdr`.`status` = ? 
                                    ".$adjustment_date_query." ".$keyword_query."

                                    ORDER BY `inventory_hdr`.`inv_no`
                                    ", array($this->session->userdata("comp_id"), 
                                             $this->session->userdata("outlet_id"), 
                                             $this->session->userdata("user_id"),
                                             "5", $adjustment_type, $status))->result();

        return $query;
    }

}
