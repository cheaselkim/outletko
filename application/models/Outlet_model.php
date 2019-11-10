<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }


    public function outlet_available(){
        $query = $this->db->query("
            SELECT 
                account_application.id AS comp_id ,
                COUNT(outlet.id),
                COALESCE(account_application.outlet_no - COALESCE(COUNT((CASE WHEN (outlet.outlet_status) = '1' THEN outlet.id END)),0), 0) AS available
            FROM account_application
            LEFT JOIN outlet ON
            account_application.id = outlet.comp_id
            WHERE account_application.id = '".$this->session->userdata('comp_id')."'
            GROUP BY comp_id")->row();
        return $query->available;
    }

    public function outlet_no(){
        $outlet_no = "";
        $query = $this->db->query("SELECT * FROM outlet WHERE comp_id = ? ORDER BY id DESC LIMIT 1", array($this->session->userdata("comp_id")));

        if ($query->num_rows() < 1){
            $outlet_no = "001";
        }else{
            $data = $query->row();
            $outlet_no = str_pad(($data->outlet_code + 1), 3, "0", STR_PAD_LEFT);
        }

        return $outlet_no;
    }

    public function outlet_type(){
        $query = $this->db->query("SELECT * FROM outlet_type WHERE comp_id IN ? AND outlet_id IN ? ORDER BY id ASC ", array(array("0",$this->session->userdata("comp_id")), array("0", $this->session->userdata("outlet_id"))))->result();
        return $query;
    }

    public function currency(){
        $query = $this->db->query("SELECT currency.id ,currency.curr_code FROM account_application
                  INNER JOIN currency ON
                  account_application.currency = currency.id
                  WHERE account_application.id = ?", array($this->session->userdata('comp_id')))->row();
        return $query->curr_code;        
    }

    public function search_outlet_city($outlet_city){
        $query = $this->db->query("SELECT 
            province_desc,
            city_desc,
             `city`.`province_id` AS prov_id,
             `city`.`id` AS city_id
            FROM province 
            INNER JOIN city ON
            `city`.`province_id` = `province`.`id`
            WHERE CONCAT(city_desc, ', ' , province_desc) LIKE ?
            ORDER BY city_desc, province_desc
            LIMIT 10", array($outlet_city.'%'))->result();
        return $query;
    }

    public function save_outlet($outlet_hdr) {
        $this->db->insert('outlet', $outlet_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function outlet_list($type,$status,$term){
        
        if($type!=""){
            $str1 = "and `outlet`.`outlet_type` = '".$type."'";
        }else{
            $str1="";
        }

        if($status!=""){
            $str2 = "and outlet_status = '".$status."'";
        }else{
            $str2="";
        }

        if($term!=""){
            $str3 = "and (outlet_code like '%".$term."%' or outlet_name like '%".$term."%')";
        }else{
            $str3="";
        }


        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT 
        outlet.*, 
        `outlet_type`.`outlet_type_name` AS outlet_type_desc,
        `city`.`city_desc`,
        `province`.`province_desc`
        FROM outlet 
            LEFT JOIN outlet_type ON 
            `outlet_type`.`id` = `outlet`.`outlet_type` 
            LEFT JOIN `city` 
                ON (`outlet`.`outlet_city` = `city`.`id`)
            LEFT JOIN `province` 
                ON (`outlet`.`outlet_province` = `province`.`id`)
            WHERE `outlet`.`comp_id` = '".$comp_id."' ".$str1." ".$str2." ".$str3." ")->result();
        return $query;
    }

    public function get_outlet_dtl($id){
        $query = $this->db->query("SELECT
            `outlet`.*
            , `city`.`city_desc`
            , `province`.`province_desc`
            , `outlet_type`.`outlet_type_name` AS `outlet_type_desc`
            , `status`.`status` AS `status_desc`
        FROM
            `outlet`
            LEFT JOIN `city` 
                ON (`outlet`.`outlet_city` = `city`.`id`)
            LEFT JOIN `province` 
                ON (`outlet`.`outlet_province` = `province`.`id`)
            LEFT JOIN `outlet_type` 
                ON (`outlet`.`outlet_type` = `outlet_type`.`id`)
            LEFT JOIN `status` 
                ON (`outlet`.`outlet_status` = `status`.`id`)
            WHERE `outlet`.`id` = '".$id."' ")->result();
        return $query;
    }

    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT outlet_code as term, outlet_name as term FROM outlet where comp_id = '".$comp_id."' and (outlet_code like '%".$hint."%' or outlet_name like '%".$hint."%') ");
        return $query;
    }

    public function update_outlet($outlet_hdr,$outlet_id) {
        $this->db->where('id',$outlet_id);
        $this->db->update('outlet',$outlet_hdr);
    }

    public function delete_outlet($id){
        $query = $this->db->query("DELETE FROM outlet WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function cancel_outlet($id) {
        $this->db->set("outlet_status", "0");
        $this->db->where('id',$id);
        $this->db->update('outlet');
    }

    public function all_outlet_list(){
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT 
        *,
        `outlet`.id as outlet_id,
        `city`.`city_desc`,
        `province`.`province_desc`
        
        FROM outlet 
            LEFT JOIN outlet_type ON 
            `outlet_type`.`id` = `outlet`.`outlet_type` 
            LEFT JOIN `city` 
                ON (`outlet`.`outlet_city` = `city`.`id`)
            LEFT JOIN `province` 
                ON (`outlet`.`outlet_province` = `province`.`id`)
            WHERE `outlet`.`comp_id` = '".$comp_id."' ")->result();
        return $query;
    }

}
