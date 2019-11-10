<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function privacy(){
		$this->load->view("website/privacy");
	}

	public function terms(){
		$this->load->view("website/terms");
	}

	public function email2(){
		$data['first_name'] = "Peter";
		$data['account_id'] = "116986556";
		$data['password'] = "aksfjaf";	
		$this->load->view("admin/email/email_register.php", $data);
	}

}
