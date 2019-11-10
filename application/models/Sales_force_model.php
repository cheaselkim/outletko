<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_force_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function get_outlet(){
        // $user_id = $this->session->userdata('user_id');
        // $query = $this->db->query("SELECT * 
        // FROM `user_outlet` as user
        // LEFT JOIN `outlet`
        // ON `outlet`.id = `user`.outlet_id
        // WHERE user_id = '".$user_id."'")->result();
        $query = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
        return $query;
    }

    public function sales_force_type(){
        $query = $this->db->query("SELECT * FROM sales_force_type")->result();
        return $query;
    }

    public function account_id($outlet){
        $result = $this->db->query("SELECT (MAX(account_id)) AS account_id FROM sales_force WHERE comp_id = ?", array($this->session->userdata("comp_id")))->row();
        $result2 = $this->db->query("SELECT account_id FROM account_application WHERE id = ?", array($this->session->userdata('comp_id')))->row();

        $account_no = "";

        if (!empty($result->account_id)){
            $account_id = $result->account_id + 1;
        }else{
            $account_id = $result2->account_id."1";
        }



        // return (date("y").($result2->business_type).str_pad($outlet, 2, '0', STR_PAD_LEFT).str_pad((substr($account_id, -3) + 1), 3, '0', STR_PAD_LEFT)); 
        return $account_id;
    }

    public function insert_users($users){
        $this->db->insert("users", $users);
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0;                
    }

    public function insert_user_outlet($user_outlet){
        $this->db->insert_batch("user_outlet", $user_outlet);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function save_sales_force($data_hdr) {
        $this->db->insert('sales_force', $data_hdr);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function sales_force_list($term,$type,$outlet,$status){

        if($term !=""){
            $str3 = "and (CONCAT(first_name,' ',last_name) like '%".$term."%')";
        }else{
            $str3="";
        }

        if ($type == "0" || $type == ""){
            $str4 = "";
        }else{
            $str4 = "and type = '".$type."'";
        }

        if ($outlet == "0" || $outlet == ""){
            $str5 = "";
        }else{
            $str5 = "  and outlet = '".$outlet."'";
        }

        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT 
            sales_force.*,
            `sales_force`.id as table_id, 
            CONCAT(`sales_force`.`first_name`,' ',`sales_force`.`last_name`) as name, 
            `sales_force_type`.`desc` AS sales_force_type,
            `users`.`all_access`,
            `outlet`.`outlet_code`
            FROM sales_force  
            LEFT JOIN outlet ON 
            `outlet`.`id` = `sales_force`.`outlet`
            LEFT JOIN sales_force_type ON 
            `sales_force_type`.`id` = `sales_force`.`type`
            LEFT JOIN users ON
            `sales_force`.`user_id` = `users`.`id`
            WHERE `sales_force`.`comp_id` = '".$comp_id."' and active = '".$status."'  ".$str3." ".$str4." ".$str5." 
            ORDER BY `sales_force`.`account_id` DESC")->result();
        return $query;
    }

    public function get_sales_force_dtl($id){
        $query = $this->db->query("SELECT * from sales_force 
            where id = '".$id."' ")->result();
        return $query;
    }

    public function get_all_access($user_id){
        $query = $this->db->query("SELECT all_access FROM users WHERE id = ?", array($user_id))->row();
        return $query->all_access;
    }

    public function open_transaction($account_id, $outlet_id){
        $query = $this->db->query("
            SELECT `sales_transaction_hdr`.`id`
            FROM sales_transaction_hdr 
            INNER JOIN  users ON
            `sales_transaction_hdr`.`user` = `users`.`id`
            WHERE outlet_id = ? 
            AND `users`.`account_id` = ? 
            AND `sales_transaction_hdr`.`status` = ?", array($outlet_id, $account_id, "1"))->num_rows();

        return $query;    
    }

    public function search_field() {
        $hint = $this->input->get('term');
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT  CONCAT(first_name,' ',last_name) as term FROM sales_force where comp_id = '".$comp_id."' and first_name like '%".$hint."%' || last_name like '%".$hint."%'");
        return $query;
    }

    public function user_id($account_id){
        $query = $this->db->query("SELECT id FROM users WHERE account_id = ?", array($account_id))->row();
        return $query->id;
    }

    public function update_sales_force($sales_force_hdr,$sales_force_id) {
        $this->db->where('id',$sales_force_id);
        $this->db->update('sales_force',$sales_force_hdr);
    }

    public function update_user_outlet($data_outlet, $outlet, $user_id){
        // $this->db->query("DELETE FROM user_outlet WHERE user_id = ?", array($user_id));

        // $this->db->insert_batch("user_outlet", $user_outlet);
        // return ($this->db->affected_rows() > 0) ? true : false;

        $this->db->set("outlet_id", $outlet);
        $this->db->where("user_id", $user_id);
        $this->db->update("user_outlet");
    }

    public function update_user_roles($outlet, $user_id){
        $this->db->set("outlet_id", $outlet);
        $this->db->where("user_id", $user_id);
        $this->db->update("user_roles_trans");
    }

    public function delete_sales_force($id){
        $query = $this->db->query("DELETE FROM sales_force WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function user_list(){
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT id,CONCAT(first_name ,' ', last_name) as name from sales_force WHERE comp_id = '".$comp_id."'")->result();
        return $query;
    }

    public function save_user_roles($table_data) {
        $user_id = "";
        foreach($table_data as $key){
            $user_id = $key['user_id'];
            $sub_dtl[] = array(                    
                    'user_id'   =>  $key['user_id'],
                    'outlet_id' => $key['outlet_id'],
                    'module_id'=>  $key['module_id'],
                    'sub_module_id'  =>  $key['sub_module_id'],
                    'function_id'  =>  $key['function_id']
            );
        }
        $this->db->where("user_id", $user_id);
        $this->db->delete("user_roles_trans");
        $this->db->insert_batch('user_roles_trans',$sub_dtl);
        //$this->db->insert('user_roles_trans', $table_data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function list_sales_force(){
        $comp_id = $this->session->userdata('comp_id');
        $query = $this->db->query("SELECT  
            sales_force.*,
            `sales_force`.id as table_id, 
            CONCAT(`sales_force`.`first_name`,' ',`sales_force`.`last_name`) as name, 
            `sales_force_type`.`desc` AS sales_force_type,
            `users`.`all_access`,
            `outlet`.`outlet_code`
            FROM sales_force 
            LEFT JOIN status ON 
            `status`.`id` = `sales_force`.`active`  
            LEFT JOIN outlet ON 
            `outlet`.`id` = `sales_force`.`outlet`
            LEFT JOIN sales_force_type ON 
            `sales_force_type`.`id` = `sales_force`.`type`
            LEFT JOIN users ON
            `sales_force`.`user_id` = `users`.`id`
            WHERE `sales_force`.`comp_id` = '".$comp_id."'
            ORDER BY `sales_force`.`account_id` DESC")->result();
        return $query;
    }

}
