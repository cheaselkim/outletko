<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->model("Login_Model");
	}


	public function index()
	{
		$this->load->view('login');
	}

	public function login(){
		$this->eSales_entry();
	}

	public function eSales_entry(){
		$this->load->view('templates/header');
		$this->load->view('application/sales/sales_header');
		$this->load->view('application/sales/sales_entry');
		$this->load->view('application/sales/sales_footer');
	}

	public function eOutlet_main_menu(){
		$this->load->view('templates/header');
		$this->load->view('main_menu');
	}


}
