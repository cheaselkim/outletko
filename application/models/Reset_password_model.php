<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function find_email($email, $username, $temp_password){

        if (!empty($username)){
            $query = $this->db->query("SELECT * FROM users WHERE username = ? AND email = ?", array($username, $email));
        }else{
            $query = $this->db->query("SELECT * FROM users WHERE email = ? AND user_type = ? ", array($email, "5"));
        }

        if (!empty($query)){
            foreach ($query->result() as $key => $value) {
                $this->db->where("id", $value->id);
                $this->db->set("password", password_hash($temp_password, PASSWORD_DEFAULT));
                $this->db->set("otp", "1");
                $this->db->update("users");
            }
        }

        $query = $query->row();
        return $query->first_name;
    }

}