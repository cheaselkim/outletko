<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_roles_model extends CI_Model {

	public function __construct(){
		parent::__construct();
			$this->load->database();
			$result = $this->login_model->check_session();
				if ($result != true){
					redirect("/");
				}
	}

	public function get_module(){
		$query = $this->db->query("
		SELECT
		    `module`.`id` 
		    , `module`.`module_desc` AS module 
		    , `sub_module`.`id` AS sub_module_id
		    , `sub_module`.`sub_module_desc` AS sub_module 
		FROM
		    `module`
		    LEFT JOIN `sub_module` 
		        ON (`module`.`id` = `sub_module`.`module_id`)
		    WHERE `module`.`id` NOT IN ('7','8', '6') AND `module`.`user_group` = '2'
		ORDER BY `module`.`id`, `sub_module`.`id` ")->result();

		return $query;
	}

	public function get_roles_function(){
		$query = $this->db->query("
		SELECT  
            `module`.`id` AS module_id
            , `module`.`module_desc` 
            , `sub_module`.`id` AS sub_module_id
            , `sub_module`.`sub_module_desc`
            , (CASE WHEN (`function_modules`.`function` = 5) THEN 1 ELSE 0 END) AS delete_1
            , (CASE WHEN (`function_modules`.`function` = 4) THEN 1 ELSE 0 END) AS cancel
        FROM `sub_module` 
        LEFT JOIN module ON
        sub_module.module_id = module.id
        LEFT JOIN function_modules ON
        `module`.`id` = `function_modules`.`module`
        WHERE (`module`.`user_group` = '2') AND function_modules.function IN ('5', '4')
        GROUP BY `function_modules`.`function`, `sub_module`.`id`
        ORDER BY `module`.`id` ASC, `sub_module`.`id` ASC, `function_modules`.`function` ASC")->result();
		return $query;
	}

	public function get_sales_force(){
		$result = $this->db->query("SELECT * FROM sales_force WHERE comp_id = ? AND type != ?", array($this->session->userdata('comp_id'), '1'))->result();
		return $result;
	}

	public function get_roles ($id){
		$result = $this->db->query("SELECT * FROM user_roles_trans WHERE user_id = ?", array($id))->result();
		return $result;
	}

}