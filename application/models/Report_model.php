<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Report_model extends CI_Model {



	public function __construct(){

		parent::__construct();

		$this->load->database();

            $result = $this->login_model->check_session();

            if ($result != true){

                redirect("/");

            }

	}



	public function report_type (){	

		$query = $this->db->query("SELECT report_type FROM reports GROUP BY report_type ORDER BY id")->result();

		return $query;

	}

	public function reports($report_type, $window_width){

        $mobile = array();

        if ($window_width <= 600){
            $mobile = array("1");
        }else{
            $mobile = array("0", "1");
        }


		$query = $this->db->query("SELECT * FROM reports WHERE report_type = ? AND status = ? AND mobile IN ? ORDER BY id", array($report_type, "1", $mobile))->result();

		return $query;

	}

	public function outlet(){

		$query = $this->db->query("

			SELECT

		    `user_outlet`.`user_id`

		    , `user_outlet`.`outlet_id`

		    , `outlet`.`outlet_code`

		    , `outlet`.`outlet_name`

		FROM

		    `user_outlet`

		    INNER JOIN `outlet` 

		        ON (`user_outlet`.`outlet_id` = `outlet`.`id`)

		WHERE user_id = ?", array($this->session->userdata('user_id')))->result();

		return $query;

	}

    public function agent(){
        $query = $this->db->query("
            SELECT 
            id,
            CONCAT(`sales_force`.`first_name`, ' ', `sales_force`.`last_name`, ' ', `sales_force`.`middle_name`) As agent_name
            FROM sales_force WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

	/* REPORT */



	public function sales_summary($fdate, $tdate, $outlet){

		$outlet_query = "";



		if ($outlet == "0"){

			$outlet_query = "";

		}else{

			$outlet_query = "AND sales_transaction_hdr.outlet_id = '".$outlet."'";

		}



		$query = $this->db->query("

			SELECT

			    `outlet`.`comp_id`,

			    `outlet`.`outlet_code`,

			    `outlet`.`outlet_name`,

				currency.curr_code,

				COALESCE(COUNT(sales_transaction_hdr.id), 0) AS total_transaction,

				COALESCE(SUM(sales_transaction_hdr.total_amount), 0) AS total_amount,

				COALESCE(SUM(sales_transaction_hdr.net_vat), 0) AS total_net_vat,

				COALESCE(SUM(sales_transaction_hdr.vat_amount),0) AS total_vat_amount

			FROM

			    `outlet`

			    LEFT JOIN `sales_transaction_hdr` 

			        ON (`outlet`.`id` = `sales_transaction_hdr`.`outlet_id`)

							INNER JOIN account_application ON 

								account_application.id = sales_transaction_hdr.comp_id

							INNER JOIN currency ON

								currency.id = account_application.currency

			WHERE outlet.comp_id = '".$this->session->userdata('comp_id')."' 

			AND DATE(sales_transaction_hdr.date_insert) >= '".$fdate."' 

			AND DATE(sales_transaction_hdr.date_insert) <= '".$tdate."'

			AND sales_transaction_hdr.status != '0'

			".$outlet_query."

			GROUP BY `outlet`.`id`")->result();

		return $query;

	}

    public function monthly_sales_summary($month, $year, $outlet){
        $outlet_query = "";

        if ($outlet != "0" || $outlet == ""){
            $outlet_query = "AND `sales_transaction_hdr`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("
            SELECT  
                DATE(date_insert) AS trans_date,
                COUNT(id) AS total_trans,
                SUM(sales_discount) AS trans_sales_discount,
                SUM(vat_amount) AS trans_vat,
                SUM(net_vat) As trans_net_vat,
                SUM(total_amount) AS trans_total
                FROM sales_transaction_hdr
                WHERE MONTH(date_insert) = ? 
                AND YEAR(date_insert) = ?
                AND `sales_transaction_hdr`.`comp_id` = ?
                AND `sales_transaction_hdr`.`status` != '0'
                ".$outlet_query."
                GROUP BY DATE(date_insert)", array($month, $year, $this->session->userdata("comp_id")))->result();

        return $query;

    }


    public function sales_transaction($from_date,$to_date,$outlet_no,$status){

    	$status_query = "";

    	$outlet_query = "";

        $comp_id = $this->session->userdata('comp_id');



        if ($status != ""){

			$status_query = "and hdr.status = '".$status."'";        	

        }else{

        	$status_query = "";

        }



        if ($outlet_no != "0"){

        	$outlet_query = "AND `hdr`.outlet_id = '".$outlet_no."'";

        }else{

        	$outlet_query = "";

        }



        $query = $this->db->query("

            SELECT trans_no ,DATE(hdr.date_insert) as date_insert, cust_name,'PHP' AS currency, total_amount,outlet_code,status

            FROM sales_transaction_hdr AS hdr 

            LEFT JOIN customer AS cust

            ON cust.id = hdr.customer_id

            LEFT JOIN outlet

            ON outlet.id = hdr.outlet_id

            WHERE `hdr`.comp_id = '".$comp_id."' ".$status_query." ".$outlet_query."

            AND (DATE(hdr.date_insert) BETWEEN '".$from_date."' AND '".$to_date."' )

            ORDER BY trans_no, outlet.id ASC

            ")->result();

        return $query;

    }

    public function sales_per_product_category($fdate, $tdate, $outlet){
        $outlet_query = "";

        if ($outlet != "0"){
            $outlet_query = "AND `sales_transaction_hdr`.`outlet_id` = '".$outlet."'";
        }else{
            $outlet_query = "";
        }

        $query = $this->db->query("
            SELECT 
            SUM(`sales_transaction_dtl`.`qty`) AS total_qty,
            SUM(`sales_transaction_dtl`.`vat`) AS total_vat, 
            SUM(`sales_transaction_dtl`.`total_amount`) as total_amount,
            `product_category`.`category_code`,
            `product_category`.`category_name`
            FROM sales_transaction_hdr
            LEFT JOIN sales_transaction_dtl ON
            `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
            LEFT JOIN products ON
            `products`.`id` = `sales_transaction_dtl`.`product_id`
            lEFT JOIN product_category ON
            `product_category`.`id` = `products`.`category_id`
            WHERE `products`.`comp_id` = ? AND `sales_transaction_hdr`.`status`!= '0'
            AND (DATE(`sales_transaction_hdr`.`date_insert`) BETWEEN '".$fdate."' AND '".$tdate."' )
            ".$outlet_query."
            GROUP BY `product_category`.`id`", array($this->session->userdata("comp_id")))->result();

        return $query;

    }


    public function sales_per_product_class($fdate, $tdate, $outlet){
        $outlet_query = "";

        if ($outlet != "0"){
            $outlet_query = "AND `sales_transaction_hdr`.`outlet_id` = '".$outlet."'";
        }else{
            $outlet_query = "";
        }

        $query = $this->db->query("
            SELECT 
            SUM(`sales_transaction_dtl`.`qty`) AS total_qty,
            SUM(`sales_transaction_dtl`.`vat`) AS total_vat, 
            SUM(`sales_transaction_dtl`.`total_amount`) as total_amount,
            `product_class`.`class_code`,
            `product_class`.`class_name`,
            `product_category`.`category_name`
            FROM sales_transaction_hdr
            LEFT JOIN sales_transaction_dtl ON
            `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
            LEFT JOIN products ON
            `products`.`id` = `sales_transaction_dtl`.`product_id`
            lEFT JOIN product_class ON
            `product_class`.`id` = `products`.`class_id`
            LEFT JOIN `product_category` ON
            `product_class`.`class_category` = `product_category`.`id`
            WHERE `products`.`comp_id` = ? AND `sales_transaction_hdr`.`status` != '0'
            AND (DATE(`sales_transaction_hdr`.`date_insert`) BETWEEN '".$fdate."' AND '".$tdate."' )
            GROUP BY `product_class`.`id`", array($this->session->userdata("comp_id")))->result();
        return $query;

    }


    public function sales_per_product($from_date,$to_date,$outlet_no,$status){

        $comp_id = $this->session->userdata('comp_id');



        if ($outlet_no != "0"){

        	$outlet_query = "AND `hdr`.outlet_id = '".$outlet_no."'";

        }else{

        	$outlet_query = "";

        }



        $query = $this->db->query("

            SELECT `prod`.id,product_name,product_no,category_desc,class_desc,SUM(qty) AS total_qty,unit_name,unit_code, 'PHP' AS currency,SUM(`dtl`.total_selling_price) AS total_amount

            FROM sales_transaction_hdr AS hdr

            LEFT JOIN sales_transaction_dtl AS dtl

            ON `dtl`.sales_hdr_id = `hdr`.id

            LEFT JOIN  products AS prod

            ON `prod`.id = `dtl`.product_id

            LEFT JOIN product_category AS cat

            ON `cat`.id = `prod`.category_id

            LEFT JOIN product_class AS class

            ON `class`.id = `prod`.class_id

            LEFT JOIN product_unit AS unit

            ON `unit`.id = `prod`.stock_unit_id

            WHERE `hdr`.comp_id = '".$comp_id."' ".$outlet_query."  and hdr.status != '0'

            AND (DATE(hdr.date_insert) BETWEEN '".$from_date."' AND '".$to_date."' )

            GROUP BY dtl.product_id

            ")->result();

        return $query;

    }


    public function sales_per_agent($from_date,$to_date,$outlet_no){

        $comp_id = $this->session->userdata('comp_id');

        $outlet_query = "";



        if ($outlet_no != "0"){

        	$outlet_query = "AND `hdr`.outlet_id = '".$outlet_no."'";

        }else{

        	$outlet_query = "";

        }



        $query = $this->db->query("

            SELECT 

	            `agent`.account_id,

	            CONCAT(`agent`.first_name,' ',`agent`.last_name) as agent_name,

	            'PHP' AS currency,

	            SUM(`dtl`.total_selling_price) AS total_amount,

	            SUM(share_amount)AS share 

            FROM sales_transaction_hdr AS sale

	            LEFT JOIN sales_force AS agent

		            ON `agent`.id = `sale`.agent_id

	            LEFT JOIN sales_transaction_dtl AS dtl

	    	        ON `dtl`.sales_hdr_id = `sale`.id

	            WHERE `sale`.comp_id = '".$comp_id."' and sale.status > 0 ".$outlet_query."

	        	    AND (date(`sale`.date_insert) BETWEEN '".$from_date."' AND '".$to_date."' )

            	GROUP BY `sale`.agent_id

	            ORDER BY `sale`.id DESC

            ")->result();

        return $query;

    }

    public function sales_trans_per_agent($fdate, $tdate, $agent){

/*        var_dump($fdate." ".$tdate);*/

        $agent_qry = "";

        if ($agent != "0"){
            $agent_qry = " AND `sales_force`.`id` = '".$agent."'";
        }
        // $agent_qry = "";

        // var_dump($agent);
        $query = $this->db->query("
                SELECT 
                `sales_force`.`account_id`,
                CONCAT(`sales_force`.`first_name`, ' ', `sales_force`.`last_name`, ' ', `sales_force`.`middle_name`) As agent_name,
                `sales_transaction_hdr`.`trans_no`,
                `sales_transaction_hdr`.`date_insert`,
                `products`.`product_name`,
                `sales_transaction_dtl`.`total_amount`,
                `sales_transaction_dtl`.`share_amount`
                FROM sales_transaction_hdr
                lEFT JOIN sales_transaction_dtl ON
                `sales_transaction_hdr`.`id` = `sales_transaction_dtl`.`sales_hdr_id`
                LEFT JOIN sales_force ON
                `sales_transaction_dtl`.`agent_id` = `sales_force`.`id`
                LEFT JOIN products ON
                `sales_transaction_dtl`.`product_id` = `products`.`id`
                WHERE `sales_transaction_hdr`.`comp_id` = '".$this->session->userdata("comp_id")."' AND `sales_transaction_hdr`.`status`  != '0'
                AND (date(`sales_transaction_hdr`.date_insert) BETWEEN '".$fdate."' AND '".$tdate."' )
                ".$agent_qry." ")->result();
        return $query;
    }


    public function inventory_transaction($from_date,$to_date,$outlet_no,$type){

        $comp_id = $this->session->userdata('comp_id');



        if ($outlet_no != "0"){

        	$outlet_query = "AND `inventory_hdr`.outlet_id = '".$outlet_no."'";

        }else{

        	$outlet_query = "";

        }



        $query = $this->db->query("

            SELECT inv_no,inv_date,`inventory_hdr`.id AS inv_id,

		    (CASE WHEN (`inventory_hdr`.`recipient_type` = '1') THEN `outlet`.outlet_code ELSE (CASE WHEN (`inventory_hdr`.`recipient_type` = '2') THEN customer.cust_code ELSE supplier.supp_code END) END) AS supplier_code2,

		    (CASE WHEN (`inventory_hdr`.`recipient_type` = '1') THEN `outlet`.outlet_name ELSE (CASE WHEN (`inventory_hdr`.`recipient_type` = '2') THEN customer.cust_name ELSE supplier.supp_name END) END) AS supplier_name2,

            inventory_ref_type,

            inventory_hdr.outlet_id,

		    `outlet2`.outlet_name AS outlet

            FROM inventory_hdr 

            LEFT JOIN supplier 

            ON `supplier`.id = `inventory_hdr`.recipient_id

            LEFT JOIN outlet 

            ON `outlet`.id = `inventory_hdr`.recipient_id 

            LEFT JOIN outlet AS outlet2

            ON `outlet2`.id = `inventory_hdr`.outlet_id 

            LEFT JOIN inventory_ref_type 

            ON `inventory_ref_type`.id = `inventory_hdr`.tran_type 

            LEFT JOIN `customer`

            ON `customer`.id = `inventory_hdr`.`recipient_id`

            WHERE `outlet`.comp_id = '".$this->session->userdata('comp_id')."' 

            AND inv_type = '".$type."' ".$outlet_query." 

            AND (inv_date BETWEEN '".$from_date."' AND '".$to_date."' )

            ORDER BY inv_date, inventory_hdr.outlet_id ASC

            ")->result();

        return $query;

    }
    
    
    public function stock_onhand($from_date,$to_date,$outlet_no){

        $comp_id = $this->session->userdata('comp_id');

        $outlet_query = "";



        if ($outlet_no != "0"){

        	$outlet_query = "AND `products`.outlet_id = '".$outlet_no."'";

        }else{

        	$outlet_query = "";

        }



        $query = $this->db->query("

            SELECT 
            
            `products`.`product_no`,
            
            `products`.`product_name`,
            
            `product_unit`.`unit_name`,
            
            COALESCE(SUM(`inventory_dtl`.`qty`), 0) AS onhand,
            
            SUM(CASE WHEN (`inventory_dtl`.`prod_grade` = '1') THEN `inventory_dtl`.`qty` ELSE 0 END) as good,
            
            SUM(CASE WHEN (`inventory_dtl`.`prod_grade` = '2') THEN `inventory_dtl`.`qty` ELSE 0 END) as bad
            
            FROM `products` 
            
            LEFT JOIN `inventory_dtl`
            
            ON `inventory_dtl`.`prod_id` = `products`.`id`
            
            LEFT JOIN `inventory_hdr`
            
            ON `inventory_hdr`.`id` = `inventory_dtl`.`hdr_id`
            
            LEFT JOIN `product_unit`
            
            ON `products`.`stock_unit_id` = `product_unit`.`id`
            
            WHERE `products`.comp_id = '".$comp_id."' ".$outlet_query." 
            
            AND (`inventory_hdr`.inv_date BETWEEN '".$from_date."' AND '".$to_date."' )
            
            GROUP BY `products`.`product_no`
            
            ORDER BY `products`.`product_no`

            ")->result();

        return $query;

    }


    public function end_of_day($fdate, $tdate, $outlet){
        $comp_outlet = "";
        $comp_outlet_id = "";
        $user = "";
        $user_id = "";

        if ($outlet == "0"){
          $comp_outlet = "comp_id";
          $comp_outlet_id = $this->session->userdata("comp_id");
        }else{
          $comp_outlet = "outlet_id";
          $comp_outlet_id = $outlet;
        }


        $query = $this->db->query("
          SELECT 
          `sales_transaction_hdr`.`status`,
          DATE(`sales_transaction_hdr`.`date_insert`) AS trans_date, 
          `outlet`.`outlet_code`,
          COUNT(`sales_transaction_hdr`.`id`) AS total_trans,
          `currency`. `curr_code`,
          SUM(`sales_transaction_hdr`.`total_amount`)AS total_amount,
          SUM(`sales_transaction_hdr`.`vat_amount`) AS total_vat,
          SUM(`sales_transaction_hdr`.`net_vat`) AS total_net_vat,
          `users`.`account_id`
          FROM sales_transaction_hdr 
          LEFT JOIN outlet ON
          `outlet`.`id` = `sales_transaction_hdr`.`outlet_id`
          LEFT JOIN account_application ON 
          `account_application`.`id` = `sales_transaction_hdr`.`comp_id`
          LEFT JOIN currency ON
          `currency`.`id` = `account_application`.`currency`
          LEFT JOIN users ON
          `users`.`id` = `sales_transaction_hdr`.`user`
          WHERE  (DATE(`sales_transaction_hdr`.`date_insert`) >= ? AND DATE(`sales_transaction_hdr`.`date_insert`) <= ?)
          AND `sales_transaction_hdr`.`".$comp_outlet."` = ?
          GROUP BY DATE(`sales_transaction_hdr`.`date_insert`), `sales_transaction_hdr`.`user`
        ", array($fdate, $tdate, $comp_outlet_id))->result();

        return $query;
    } 

    public function sales_target_vs_actual($year, $outlet){
        $outlet_query = "";

        if ($outlet != "0"){
            $outlet_query = "AND `sales_transaction_hdr`.`outlet_id` = '".$outlet."'";
        }


        $query = $this->db->query("
        SELECT 
            MONTH(`sales_transaction_hdr`.`date_insert`) AS month_date,
            SUM(`sales_transaction_hdr`.`total_amount`) AS total_amount,
            SUM(`sales_transaction_hdr`.`net_vat`) AS total_net_vat,
            SUM(`sales_transaction_hdr`.`vat_amount`) AS total_vat
            FROM sales_transaction_hdr 
            WHERE YEAR(`sales_transaction_hdr`.`date_insert`) = ? AND `sales_transaction_hdr`.`comp_id` = ?
            AND `sales_transaction_hdr`.`status` != '0'
            ".$outlet_query."
            GROUP BY MONTH(`sales_transaction_hdr`.`date_insert`)", array($year, $this->session->userdata("comp_id")))->result();

        return $query;
    }

    public function get_sales_target($outlet){

        $outlet_query = "";

        if ($outlet != "0"){
            $outlet_query = "AND `outlet`.`id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT * FROM outlet WHERE comp_id = ? ".$outlet_query." ", array($this->session->userdata("comp_id")))->result();

        return $query;
    }

}











