<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("login_model");
	      	$this->load->helper("url");
	}

	public function login(){		
		$result = $this->login_model->check_session();

		if ($result != true){
			$this->template->load("", ($data = null));
		}else{
			$result = $this->login_model->check_otp();
			
			if ($this->session->userdata("user_type") == "5"){
				redirect('/my-order');
			}else{


				if ($result > 0){
					$this->load->view("website/otp_password");
				}else{
					// $data['edit'] = 0;
					// $data['function'] = 0;
					// $data['sub_module'] = "";
					// $data['menu_module'] = 0;
					// $data['menu_module'] = 0;
					// $data['user_type'] = $this->session->userdata('user_type');
					// $data['account_id'] = $this->session->userdata("account_id");
					// $this->template->load("0", $data);		

					if ($this->session->userdata("user_type") == "4"){
						redirect("store/".str_replace(' ', '', strtolower($this->session->userdata("account_name"))));
					}else{
						if (($this->session->userdata("login") == "1") && ($this->session->userdata("all_access") == "1") && ($this->session->userdata("user_type") == "2")){
							$this->session->set_userdata("login", "0");
							redirect('app/6/17/0');
						}else if ($this->session->userdata("user_type") == "3"){
							redirect('partner/1/0/1');
						}else{
							$data['sub_module'] = 0;
							$data['menu_module'] = 0;
							$data['edit'] = 0;
							$data['function'] = 0;
							$data['width'] = 1366;
							$data['user_type'] = $this->session->userdata('user_type');
							$data['account_id'] = $this->session->userdata("account_id");
							$data['owner'] = 0;
							$this->template->load("0", $data);							
						}					
					}				

				}

			}

		}
	}

	public function nologin(){
		die('asfjaskfsaj');
	}

	public function check_login(){
	    $result = $this->login_model->login();
	    if ($result == false){
			$this->session->set_flashdata("log_error", "1");
	    }
	    redirect('/');
	}

	public function logout(){
		session_destroy();
		redirect("/");
	}

	public function menu(){
		$this->load->view("event/menu");
	}
}
