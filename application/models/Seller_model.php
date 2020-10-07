<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$CI = &get_instance(); 
		$this->load->database();
		$this->db2 = $CI->load->database('outletko', TRUE);
	}

	public function get_order(){
        $result = $this->db2->query("SELECT COUNT(*) AS order_no FROM buyer_order WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array("1", $this->session->userdata("comp_id")))->row();	
        return $result->order_no;
	}

	public function get_process_order($status){
        $result = $this->db2->query("SELECT buyer_order.*,
        	`delivery_type`.`delivery_type` AS delivery_type_name,
			CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
			`buyer_order`.`id` as buyer_order_id
			FROM buyer_order
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
			WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array($status, $this->session->userdata("comp_id")))->result();	
        return $result;

	}

	public function get_order_id($id){
		$result = $this->db2->query("
			SELECT 
				`province`.`province_desc`,
				`city`.`city_desc`,
				`courier`.`courier` AS courier_name,
				DATE_FORMAT(`buyer_order`.`date_insert`, '%m/%d/%Y %H:%i:%s') AS order_date,
				DATE_FORMAT(`buyer_order`.`delivery_date`, '%m/%d/%Y') AS delivery_date_format,
				buyer_order.*,
				CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
				`account_buyer`.`email`,
				`delivery_type`.`delivery_type` AS `delivery_type_desc`,
				`payment_type`.`payment_type` AS `payment_type_desc`,
				`delivery_type`.`id` AS `delivery_type_id`,
				`payment_type`.`id` AS `payment_type_id`,
				(CASE WHEN (`buyer_order`.`payment_type` = '5') THEN `bank_list`.`bank_name` ELSE `remittance_list`.`name` END) AS payment_method_desc
			FROM 
			buyer_order 
			LEFT JOIN province ON 
			`province`.`id` = `buyer_order`.`province`
			LEFT JOIN city ON 
			`city`.`id` = `buyer_order`.`city`
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
			LEFT JOIN payment_type ON 
			`payment_type`.`id` = `buyer_order`.`payment_type`
			LEFT JOIN bank_list ON 
			`bank_list`.`id` = `buyer_order`.`payment_method`
			LEFT JOIN remittance_list ON 
			`remittance_list`.`id` = `buyer_order`.`payment_method`
			LEFT JOIN account_courier ON 
			`account_courier`.`id` = `buyer_order`.`courier`
			LEFT JOIN courier ON 
			`courier`.`id` = `account_courier`.`courier_id`
			WHERE `buyer_order`.`id` = ?", array($id))->result();
		return $result;
	}

    
	public function get_order_products($id){
		$result = $this->db2->query("
		SELECT 
			`products`.`product_name`,
            `products`.`product_unit_price`,
            `products`.`img_location`,
			buyer_order_products.*
		FROM buyer_order_products
		LEFT JOIN products ON 
		`buyer_order_products`.`prod_id` = `products`.`id`
		WHERE `buyer_order_products`.`order_id` = ?
		", array($id))->result();
		return $result;
	}

    public function get_variation($prod_var){
        $query = $this->db2->query("SELECT * FROM account_variation_type WHERE id = ? ", array($prod_var))->result();
        
        if (!empty($query)){
            foreach ($query as $key => $value) {
                return $value->type;
            }
        }else{
            return "";
        }

    }

    public function get_variation_price($prod_var){
        $query = $this->db2->query("SELECT * FROM account_variation_type WHERE id = ? ", array($prod_var))->result();
        
        if (!empty($query)){
            foreach ($query as $key => $value) {
                return $value->unit_price;
            }
        }else{
            return 0;
        }

    }

    public function get_proof($id){
        $query = $this->db2->query("SELECT * FROM buyer_proof WHERE order_id = ? ORDER BY id DESC LIMIT 1", array($id))->result();
        return $query;
    }

    // Updating Buyer Order

	public function acknowledge_order($id){
        $query = $this->db2->query("SELECT * FROM buyer_order WHERE id = ?", array($id))->result();
        $status = "";

        if (!empty($query)){
            foreach ($query as $key => $value) {
                if ($value->payment_type == "1"){
                    $status = "5";
                }else{
                    $status = "2";
                }
            }
        }

		$this->db2->where("id", $id);
		$this->db2->set("status", $status);
		$this->db2->update("buyer_order");
	}

	public function cancel_acknowledge_order($id){
		$this->db2->where("id", $id);
		$this->db2->set("status", "0");
		$this->db2->set("date_acknowledge", date("Y-m-d H:i:s"));
		$this->db2->update("buyer_order");
	}

	public function get_close_order(){
        $result = $this->db2->query("SELECT buyer_order.*,
        	`delivery_type`.`delivery_type` AS delivery_type_name,
			CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
			`buyer_order`.`id` as buyer_order_id
			FROM buyer_order
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
			WHERE `buyer_order`.`status` = ? AND seller_id = ? ", array("5", $this->session->userdata("comp_id")))->result();	
        return $result;

	}

	public function delivery_order($id, $courier, $track_no){
		$this->db2->where("id", $id);
		$this->db2->set("status", "6");
		$this->db2->set("courier", $courier);
		$this->db2->set("track_no", $track_no);
		$this->db2->set("date_delivered", date("Y-m-d H:i:s"));
		$this->db2->update("buyer_order");
	}

    public function get_delivered_order($status, $fdate, $tdate){

        if (!empty($fdate) && !empty($tdate)){
            $date_qry = "AND (DATE(`buyer_order`.`date_insert`) >= '".$fdate."' AND DATE(`buyer_order`.`date_insert`) <= '".$tdate."')";
        }else{
            $date_qry = "";
        }

        $result = $this->db2->query("SELECT buyer_order.*,
        	`delivery_type`.`delivery_type` AS delivery_type_name,
			CONCAT(`account_buyer`.`first_name`, ' ', `account_buyer`.`last_name`) AS buyer_name,
			`buyer_order`.`id` as buyer_order_id
			FROM buyer_order
			LEFT JOIN account_buyer ON 
			`account_buyer`.`id` = `buyer_order`.`comp_id` 
			LEFT JOIN delivery_type ON 
			`delivery_type`.`id` = `buyer_order`.`delivery_type`
            WHERE `buyer_order`.`status` = ? AND seller_id = ?
            ".$date_qry."
            ", array($status, $this->session->userdata("comp_id")))->result();	
        return $result;        
    }

    // Confirm Payment
    public function confirm_payment($id, $status, $message){

        $this->db2->set("status", $status);
        $this->db2->set("payment_message", $message);
        if ($status == "5"){
            $this->db2->set("date_denied_payment", date("Y-m-d H:i:s"));
        }else{
            $this->db2->set("date_confirm_payment", date("Y-m-d H:i:s"));
        }
        $this->db2->where("id", $id);
        $this->db2->update("buyer_order");

        if ($status == "5"){
            $this->db2->set("status", "0");
            $this->db2->where("order_id", $id);
            $this->db2->update("buyer_proof");
        }

    }

    // Report

    public function report_year(){

        $query = $this->db2->query("SELECT 
        MONTH(buyer_order.date_insert) AS date_insert,
        SUM(buyer_order_products.prod_total_price) AS total_price
        FROM buyer_order
        INNER JOIN buyer_order_products ON 
        buyer_order_products.order_id = buyer_order.id
        WHERE MONTH(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status != ? AND YEAR(buyer_order.date_insert) = ? AND buyer_order.seller_id = ?
        GROUP BY MONTH(buyer_order.date_insert)
        ORDER BY (buyer_order.date_insert)", array(1, 12, 0, date("Y"), $this->session->userdata("comp_id")))->result();

        $data['jan'] = 0;
        $data['feb'] = 0;
        $data['mar'] = 0;
        $data['apr'] = 0;
        $data['may'] = 0;
        $data['jun'] = 0;
        $data['jul'] = 0;
        $data['aug'] = 0;
        $data['sep'] = 0;
        $data['oct'] = 0;
        $data['nov'] = 0;
        $data['dec'] = 0;


        if (!empty($query)){
            foreach ($query as $key => $value) {
                if ($value->date_insert == "1"){
                    $data['jan'] = $value->total_price;
                }else if ($value->date_insert == "2"){
                    $data['feb'] = $value->total_price;
                }else if ($value->date_insert == "3"){
                    $data['mar'] = $value->total_price;
                }else if ($value->date_insert == "4"){
                    $data['apr'] = $value->total_price;
                }else if ($value->date_insert == "5"){
                    $data['may'] = $value->total_price;
                }else if ($value->date_insert == "6"){
                    $data['jun'] = $value->total_price;
                }else if ($value->date_insert == "7"){
                    $data['jul'] = $value->total_price;
                }else if ($value->date_insert == "8"){
                    $data['aug'] = $value->total_price;
                }else if ($value->date_insert == "9"){
                    $data['sep'] = $value->total_price;
                }else if ($value->date_insert == "10"){
                    $data['oct'] = $value->total_price;
                }else if ($value->date_insert == "11"){
                    $data['nov'] = $value->total_price;
                }else if ($value->date_insert == "12"){
                    $data['dec'] = $value->total_price;
                }
            }
        }

        return $data;
    }

    public function report_week(){

        $sunday = date( 'Y-m-d', strtotime( 'last sunday' ));
        $saturday = date('Y-m-d', strtotime("+6 days", strtotime($sunday)));

        $query = $this->db2->query("SELECT 
        DATE_FORMAT(buyer_order.date_insert, '%a') AS date_name,
        DATE(buyer_order.date_insert) AS date_insert,
        SUM(buyer_order_products.prod_total_price) AS total_price
        FROM buyer_order
        INNER JOIN buyer_order_products ON 
        buyer_order_products.order_id = buyer_order.id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status != ? AND buyer_order.seller_id = ?
        GROUP BY DATE(buyer_order.date_insert)
        ORDER BY (buyer_order.date_insert)
        ", array($sunday, $saturday, "0", $this->session->userdata("comp_id")))->result();
        
        $data['sun'] = 0;
        $data['mon'] = 0;
        $data['tue'] = 0;
        $data['wed'] = 0;
        $data['thu'] = 0;
        $data['fri'] = 0;
        $data['sat'] = 0;

        if (!empty($query)){
            foreach ($query as $key => $value) {
                if ($value->date_name == "Sun"){
                    $data['sun'] = $value->total_price;
                }else if ($value->date_name == "Mon"){
                    $data['mon'] = $value->total_price;
                }else if ($value->date_name == "Tue"){
                    $data['tue'] = $value->total_price;
                }else if ($value->date_name == "Wed"){
                    $data['wed'] = $value->total_price;
                }else if ($value->date_name == "Thu"){
                    $data['thu'] = $value->total_price;
                }else if ($value->date_name == "Fri"){
                    $data['fri'] = $value->total_price;
                }else if ($value->date_name == "Sat"){
                    $data['sat'] = $value->total_price;
                }
            }
        }

        return $data;
    }

    public function report_sales_summary($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        DATE(buyer_order.date_insert) AS order_date,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        INNER JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY DATE(buyer_order.date_insert)
        ORDER BY (buyer_order.date_insert)", array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }

    public function report_product_category($fdate, $tdate, $status){
        
        $query = $this->db2->query("SELECT 
        product_category.product_category,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT  JOIN products ON 
        buyer_order_products.prod_id = products.id
        LEFT JOIN product_category ON 
        product_category.id = products.product_category
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY product_category.id
        ORDER BY product_category.product_category",
        array($fdate, $tdate, $status, $this->session->userdata('comp_id')))->result();
        return $query;

    }

    public function report_products($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        products.product_name,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT  JOIN products ON 
        buyer_order_products.prod_id = products.id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY DATE(buyer_order.date_insert)
        ORDER BY (buyer_order.date_insert)", array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }

    public function report_payment_type($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        payment_type.payment_type,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT JOIN account_payment_type ON 
        account_payment_type.payment_type_id = buyer_order.payment_type
        LEFT JOIN payment_type ON 
        payment_type.id = account_payment_type.payment_type_id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY buyer_order.payment_type
        ORDER BY payment_type.payment_type"
        , array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }

    public function report_delivery_type($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        delivery_type.delivery_type,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT JOIN account_delivery_type ON 
        account_delivery_type.delivery_type_id = buyer_order.delivery_type
        LEFT JOIN delivery_type ON 
        delivery_type.id = account_delivery_type.delivery_type_id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY buyer_order.delivery_type
        ORDER BY delivery_type.delivery_type"
        , array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }

    public function report_product_category_dtl($fdate, $tdate, $status){
        
        $query = $this->db2->query("SELECT 
        DATE(buyer_order.date_insert) AS order_date,
        product_category.product_category,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT  JOIN products ON 
        buyer_order_products.prod_id = products.id
        LEFT JOIN product_category ON 
        product_category.id = products.product_category
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY product_category.id, DATE(buyer_order.date_insert)
        ORDER BY product_category.product_category, DATE(buyer_order.date_insert)",
        array($fdate, $tdate, $status, $this->session->userdata('comp_id')))->result();
        return $query;

    }

    public function report_products_dtl($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        DATE(buyer_order.date_insert) AS order_date,
        products.product_name,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT  JOIN products ON 
        buyer_order_products.prod_id = products.id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY DATE(buyer_order.date_insert), DATE(buyer_order.date_insert)
        ORDER BY (buyer_order.date_insert), DATE(buyer_order.date_insert)", array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }

    public function report_payment_type_dtl($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        DATE(buyer_order.date_insert) AS order_date,
        payment_type.payment_type,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT JOIN account_payment_type ON 
        account_payment_type.payment_type_id = buyer_order.payment_type
        LEFT JOIN payment_type ON 
        payment_type.id = account_payment_type.payment_type_id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY buyer_order.payment_type, DATE(buyer_order.date_insert)
        ORDER BY payment_type.payment_type, DATE(buyer_order.date_insert)"
        , array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }

    public function report_delivery_type_dtl($fdate, $tdate, $status){

        $query = $this->db2->query("SELECT 
        DATE(buyer_order.date_insert) AS order_date,
        delivery_type.delivery_type,
        COUNT(buyer_order.order_no) AS total_order,
        SUM(buyer_order_products.prod_qty) AS total_qty,
        SUM(buyer_order_products.prod_price) AS total_amount
        FROM buyer_order
        LEFT  JOIN buyer_order_products ON 
        buyer_order.id = buyer_order_products.order_id
        LEFT JOIN account_delivery_type ON 
        account_delivery_type.delivery_type_id = buyer_order.delivery_type
        LEFT JOIN delivery_type ON 
        delivery_type.id = account_delivery_type.delivery_type_id
        WHERE DATE(buyer_order.date_insert) BETWEEN ? AND ? AND buyer_order.status = ? AND buyer_order.seller_id = ?
        GROUP BY buyer_order.delivery_type, DATE(buyer_order.date_insert)
        ORDER BY delivery_type.delivery_type, DATE(buyer_order.date_insert)"
        , array($fdate, $tdate, $status, $this->session->userdata("comp_id")))->result();
        return $query;

    }


}