<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function __construct(){
        parent::__construct();
        
		$this->load->database();
            $result = $this->login_model->check_session();
            if ($result != true){
                redirect("/");
            }
	}

	public function check_menu($module, $sub_module, $function){
		$query = $this->db->query("SELECT * FROM user_roles_trans
			WHERE user_id = ? AND outlet_id = ? 
			AND module_id = ? AND sub_module_id = ? 
			AND function_id = ?", array($this->session->userdata("user_id"), $this->session->userdata("outlet_id"), $module, $sub_module, $function))->num_rows();
		return $query;
	}

	public function check_owner(){
		$query = 0;
		if ($this->session->userdata("user_type") != "2"){
			$query = 0;
		}else{
			$query = $this->db->query("SELECT * FROM account_application WHERE account_id = ?", $this->session->userdata("account_id"))->num_rows();
		}
		
		return $query;
	}


}
