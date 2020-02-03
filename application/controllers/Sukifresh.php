<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sukifresh extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}

	public function homepage(){
		$data['page_type'] = "";

		if (empty($this->session->userdata('total_amount'))){
			$this->session->set_userdata("total_amount", "0");
		}

		if ($this->session->userdata('login') == "2"){
			redirect('sukifresh/admin');
		}else{
			if ($this->session->userdata('login') != "1"){
				$this->session->set_userdata('login', '0');
			}
			$this->load->view('sukifresh/sukifresh', $data);			
		}


	}

	public function page($page_type){

		$data['page_type'] = $page_type;

		if ($page_type == "myaccount"){
			if ($this->session->userdata('login') == "0"){
				redirect('sukifresh/account');
			}else{
				$this->session->set_userdata('login', "1");
			}
		}else if ($page_type == "logout"){
			$this->session->sess_destroy();
			$this->session->set_userdata('login', '0');
			$this->session->set_userdata("total_amount", "0");
			redirect('/sukifresh');
			$data['page_type'] = '';
		}else if ($page_type == "admin"){
			$this->session->set_userdata('login', "2");
		}else{
			if ($this->session->userdata('login') == "0"){
				$this->session->set_userdata('login', '0');
			}
		}

		$this->load->view('sukifresh/sukifresh', $data);

	}

	public function login(){

		$email = $this->input->post('email');

		var_dump($email);

		// $this->session->set_userdata('login', "1");
		// if ($email == "admin"){
		// 	$data['page_type'] = 'admin';
		// }else{
		// 	$data['page_type'] = 'myaccount';
		// }

		// $this->load->view('sukifresh/sukifresh', $data);
	}

	public function process_order(){
		
		$type = $this->input->post("type");
		$prod_veg_type = $this->input->post("prod_type");
		$prod_name = $this->input->post("prod_name");
		$prod_qty = $this->input->post("prod_qty");
		$prod_price = $this->input->post("prod_price");
		$prod_total_price = $this->input->post("prod_total_price");

		$products = array(
				"type" => $type,
				"prod_type" => $prod_veg_type,
				"prod_name" => $prod_name,
				"prod_qty" => $prod_qty,
				"prod_price" => $prod_price,
				"prod_total_price" => $prod_total_price
			);

		// $veg = array( 0 => $products);
		$session_products = $this->session->userdata('products');

		if (!empty($this->session->userdata('products'))){
			$veg = array( (COUNT($this->session->userdata('products'))) => $products);
			$join = $veg + $session_products;
		}else{
			$veg = array( 0 => $products);
			$join = $veg;
		}

		$total_amount = 0;

		foreach ($join as $key => $value) {
			$total_amount += $join[$key]['prod_total_price'];
		}

		// var_dump($total_amount);

		// var_dump("veg");
		// var_dump($veg);
		// var_dump("session");
		// var_dump($session_products);
		// var_dump("join");
		// var_dump($join);

		$this->session->set_userdata("total_amount", $total_amount);
		$this->session->set_userdata("products", $join);
		$data['token'] = $this->security->get_csrf_hash();
		$data['login'] = $this->session->userdata('login');
		echo json_encode($data);
	}

	public function process_product(){
		// $this->session->unset_userdata('products');
		// var_dump(COUNT($this->session->userdata('products')));
		// var_dump($this->session->userdata('products'));

		// $join = $this->session->userdata('products');

		// foreach ($join as $key => $value) {
		// 	var_dump($join[$key]['prod_name']);
		// 	var_dump($join[$key]['prod_total_price']);
		// }

		// var_dump($join[0]['prod_total_price']);
		// $total_amount = 0;
		// var_dump($join);
		$total_amount = $this->session->userdata('total_amount');
		var_dump($total_amount);

	}

	public function get_product(){

		$data['token'] = $this->security->get_csrf_hash();

		// $data['prod_type'] = $this->session->userdata('prod_type');
		// $data['prod_name'] = $this->session->userdata('prod_name');
		// $data['prod_qty'] = $this->session->userdata('prod_qty');
		// $data['prod_price'] = $this->session->userdata('prod_price');
		// $data['prod_total_price'] = $this->session->userdata('prod_total_price');

		$data['products'] = $this->session->userdata('products');
		$data['count'] = COUNT($this->session->userdata('products'));

		echo json_encode($data);
	}

}
