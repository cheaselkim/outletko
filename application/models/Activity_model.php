<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insert_activity($module, $submodule, $function){

    $sql = "INSERT INTO activity_log (user_id, outlet_id, module_id, sub_module_id, function_id) VALUES(?,?,?,?,?)";

    $this->db->query($sql, array($this->session->userdata("user_id"), $this->session->userdata("outlet_id"), $module, $submodule, $function));

  }


}
