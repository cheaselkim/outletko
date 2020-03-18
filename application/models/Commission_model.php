<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commission_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $CI = &get_instance(); 
        $this->load->database();
        $this->db2 = $CI->load->database('admin', TRUE);
        $result = $this->login_model->check_session();
        if ($result != true){
            redirect("/");
        }

    }

    public function prod_summary_lvl_1($month, $year){

        $query = $this->db2->query("SELECT 
            `account_invoice`.`plan_type`,
            COALESCE(COUNT(`account_invoice`.`plan_type`)) AS total_qty,
            COALESCE(SUM(`plan_type`.`level_1`)) AS plan_lvl_1,
            COALESCE(SUM(`plan_type`.`lvl_outlet_1`)) AS outlet_lvl_1,
            COALESCE(SUM(`account_invoice`.`outlet`)) AS total_extra_outlet,
            COALESCE(SUM(`plan_type`.`lvl_outlet_1` * `account_invoice`.`outlet`)) AS total_amount_extra_outlet
        FROM account_application
        INNER JOIN account_invoice ON 
            `account_application`.`id` = `account_invoice`.`comp_id`
        INNER JOIN plan_type ON 
            `plan_type`.`id` = `account_invoice`.`plan_type`
        WHERE invoice_type = '1' 
            AND `account_application`.`recruited_by` = ?
            AND MONTH(`account_invoice`.`date_insert`) = ? AND YEAR(`account_invoice`.`date_insert`) = ?
        GROUP BY plan_type        
        ", array($this->session->userdata('comp_id'), $month, $year))->result();
        return $query;

    }

    public function prod_summary_lvl_2($month, $year){

        $query = $this->db2->query("SELECT 
            `account_invoice`.`plan_type`,
            COALESCE(COUNT(`account_invoice`.`plan_type`)) AS total_qty,
            COALESCE(SUM(`plan_type`.`level_2`)) AS plan_lvl_2,
            COALESCE(SUM(`plan_type`.`lvl_outlet_2`)) AS outlet_lvl_2,
            COALESCE(SUM(`account_invoice`.`outlet`)) AS total_extra_outlet,
            COALESCE(SUM(`plan_type`.`lvl_outlet_2` * `account_invoice`.`outlet`)) AS total_amount_extra_outlet
        FROM account_application
        INNER JOIN account_invoice ON 
            `account_application`.`id` = `account_invoice`.`comp_id`
        INNER JOIN plan_type ON 
            `plan_type`.`id` = `account_invoice`.`plan_type`
        WHERE invoice_type = '1' 
            AND `account_application`.`level_2` = ?
            AND MONTH(`account_invoice`.`date_insert`) = ? AND YEAR(`account_invoice`.`date_insert`) = ?
        GROUP BY plan_type        
        ", array($this->session->userdata('comp_id'), $month, $year))->result();
        return $query;

    }

    public function prod_summary_lvl_3($month, $year){

        $query = $this->db2->query("SELECT 
            `account_invoice`.`plan_type`,
            COALESCE(COUNT(`account_invoice`.`plan_type`)) AS total_qty,
            COALESCE(SUM(`plan_type`.`level_3`)) AS plan_lvl_3,
            COALESCE(SUM(`plan_type`.`lvl_outlet_3`)) AS outlet_lvl_3,
            COALESCE(SUM(`account_invoice`.`outlet`)) AS total_extra_outlet,
            COALESCE(SUM(`plan_type`.`lvl_outlet_3` * `account_invoice`.`outlet`)) AS total_amount_extra_outlet
        FROM account_application
        INNER JOIN account_invoice ON 
            `account_application`.`id` = `account_invoice`.`comp_id`
        INNER JOIN plan_type ON 
            `plan_type`.`id` = `account_invoice`.`plan_type`
        WHERE invoice_type = '1' 
            AND `account_application`.`level_3` = ?
            AND MONTH(`account_invoice`.`date_insert`) = ? AND YEAR(`account_invoice`.`date_insert`) = ?
        GROUP BY plan_type        
        ", array($this->session->userdata('comp_id'), $month, $year))->result();
        return $query;

    }


}