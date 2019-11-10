<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("user_model");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function currency(){
		$data['data'] = $this->user_model->currency();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function business_type(){
		$data['data'] = $this->user_model->business_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_user(){
		$data = array();
		$password = $this->input->post("password", TRUE);
		$username = $this->input->post("username", TRUE);
		$new_password = $this->input->post("new_password", TRUE);

		$check_username = $this->user_model->check_username($username);
		$check_password = $this->user_model->check_password();

		if ((password_verify($password, $check_password) == true) && ($check_username < 1)){
			$data['status'] = $this->user_model->update_user($new_password,$username);
		}else{
			$data['status'] = 0;
			$data['password'] = "0";

			if ($check_username > 0){
				$data['username'] = "0";
			}else{
				$data['username'] = "1";
			}

			if (password_verify($password, $check_password) == false){
				$data['password'] = "0";
			}else{
				$data['password'] = "1";
			}
		}

        $this->activity_model->insert_activity("8", "0", "2");
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_user_owner(){
		$data['result'] = $this->user_model->get_user_owner();
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("8", "0", "3");
		echo json_encode($data);
	}

	public function update_owner(){
		$data['result'] = $this->user_model->update_owner($this->input->post("data_owner"), $this->input->post("data_user"));

		if ($this->input->post("vat") == "0"){
			$result2 = $this->user_model->update_product_vat();
		}

        $this->activity_model->insert_activity("8", "0", "2");
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_user_account(){
		$data['all_access'] = $this->user_model->get_user_access();
		$data['result'] = $this->user_model->get_user_account();
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("8", "0", "3");
		echo json_encode($data);
	}

	public function update_user_account(){
		$data['result'] = $this->user_model->update_user_account($this->input->post("data_sales"), $this->input->post("data_user"));
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("8", "0", "2");
		echo json_encode($data);
	}

}