<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("password_model");
	}

	public function forgot_password() {
		$this->load->view("forgot_password"); 
	} 

	public function send_email(){
		$this->load->library("email");
		$status = 0;
		$email = $this->input->post("email", TRUE);

		$randomString = $this->randomString();
		$result = $this->password_model->find_email($email, $randomString);

		if ($result > 0){
	        $config = array(
	                    'protocol' => 'smtp',
	                    'smtp_host' => 'ssl://smtp.gmail.com',
	                    'smtp_port' => 465,
	                    'smtp_user' => 'epgmcompany@gmail.com',
	                    'smtp_pass' => 'epgmcompany101'
	                );


	        $this->email->initialize($config)
	                    ->set_newline("\r\n")
	                    ->from('noreply@epgmcompany.com', 'eOutletSuite Application')
	                    ->to($email)
	                    ->subject('eOutletSuite Change Password')
	                    ->message("Your Password is : ".$randomString);

	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
	        	}
	    }else{
	    	$status = 0;
	    }

        echo json_encode(array("result" => $status, "token" => $this->security->get_csrf_hash()));
	}

	public function randomString($length = 6) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	public function change_password(){
		$password = $this->input->post("password", TRUE);
		$data['result'] = $this->password_model->change_password($password);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
	
	public function change_password2(){
		$password = $this->input->post("password", TRUE);
		$vat = $this->input->post("vat", TRUE);
		$bus_name = $this->input->post("bus_name", TRUE);
		$mobile_no = $this->input->post("mobile_no", TRUE);
		$buss_address = $this->input->post("bus_address", TRUE);
		$buss_city = $this->input->post("bus_city", TRUE);
		$buss_prov = $this->input->post("buss_prov", TRUE);

		$this->password_model->change_password2($vat,$bus_name,$mobile_no, $buss_address, $buss_city, $buss_prov);
		$data['result'] = $this->password_model->change_password($password);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}


}
