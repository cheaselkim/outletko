<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_roles extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("User_roles_model");
	      	$this->load->helper("user_roles");
			$result = $this->login_model->check_session();
    			if ($result != true){
    				redirect("/");
    			}
	}

    public function get_roles_function(){
        $module = $this->User_roles_model->get_module();
        $function = $this->User_roles_model->get_roles_function();
        $data['result'] = roles_function($module, $function);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_sales_force(){
        $sales_force = $this->User_roles_model->get_sales_force();
        $data['result'] = sales_force($sales_force);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_roles(){
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->User_roles_model->get_roles($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

}
