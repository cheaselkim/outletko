<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sukifresh2 extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}

	public function homepage(){
		$data['page_type'] = "";

		if ($this->session->userdata('login') != "1"){
			$this->session->set_userdata('login', '0');
		}

		$this->load->view('sukifresh/sukifresh', $data);

	}

	public function page($page_type){

		$data['page_type'] = $page_type;

		if ($page_type == "myaccount"){
			$this->session->set_userdata('login', "1");
		}else if ($page_type == "logout"){
			$this->session->set_userdata('login', '0');
			$data['page_type'] = '';
		}else if ($page_type == "admin"){
			$this->session->set_userdata('login', "1");
		}else{
			$this->session->set_userdata('login', '0');
		}

		$this->load->view('sukifresh/sukifresh', $data);

	}

	public function login(){

		$email = $this->input->get('email');

		$this->session->set_userdata('login', "1");
		if ($email == "admin"){
			redirect('sukifresh/admin');
			// $data['page_type'] = 'admin';
		}else{
			redirect('sukifresh/myaccount');
			// $data['page_type'] = 'myaccount';
		}

		// $this->load->view('sukifresh/sukifresh', $data);
	}

	public function process_order(){
		
		$prod_veg_type = $this->input->post("prod_type");
		$prod_name = $this->input->post("prod_name");
		$prod_qty = $this->input->post("prod_qty");
		$prod_price = $this->input->post("prod_price");
		$prod_total_price = $this->input->post("prod_total_price");

		$veg = array(
				"prod_type" => $prod_veg_type,
				"prod_name" => $prod_name,
				"prod_qty" => $prod_qty,
				"prod_price" => $prod_price,
				"prod_total_price" => $prod_total_price
			);

		$this->session->set_userdata($veg);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_product(){

		$data['token'] = $this->security->get_csrf_hash();

		$data['prod_type'] = $this->session->userdata('prod_type');
		$data['prod_name'] = $this->session->userdata('prod_name');
		$data['prod_qty'] = $this->session->userdata('prod_qty');
		$data['prod_price'] = $this->session->userdata('prod_price');
		$data['prod_total_price'] = $this->session->userdata('prod_total_price');

		echo json_encode($data);
	}

}
