<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("reset_password_model");
    }

    public function reset_email(){
        $this->load->view("admin/email/reset_email");
    }

    public function reset_buyer(){
        $buyer_email = $this->input->post("email");
        $temp_password = $this->randomString();
        $result = $this->reset_password_model->find_email($buyer_email, "", $temp_password);

        if (!empty($result)){
            $email_result = $this->send_email($buyer_email, $temp_password, $result);
        }else{
            $email_result = 0;
        }

        $data['result'] = $email_result;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function reset_seller(){
        $seller_email = $this->input->post("email");
        $seller_username = $this->input->post("username");
        $temp_password = $this->randomString();
        $result = $this->reset_password_model->find_email($seller_email, $seller_username, $temp_password);

        if (!empty($result)){
            $email_result = $this->send_email($seller_email, $temp_password, $result);
        }else{
            $email_result = 0;
        }

        $data['result'] = $email_result;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
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

	public function send_email($email, $password, $firstname){
		$this->load->library("email");
		$status = 0;

	        // $config = array(
	        //             'protocol' => 'smtp',
	        //             'smtp_host' => 'ssl://smtp.gmail.com',
	        //             'smtp_port' => 465,
	        //             'smtp_user' => 'epgmcompany@gmail.com',
	        //             'smtp_pass' => 'epgmcompany101'
	        //         );
            
            $data['email'] = $email;
            $data['password'] = $password;
            $data['firstname'] = $firstname;
                
            $message = $this->load->view("admin/email/reset_email", $data, TRUE);

            $config = array(
                'protocol' => 'mail',
                'mail_type' => 'html',
                'smtp_host' => 'mail.outletko.com',
                'smtp_port' => '465',
                'smtp_user' => 'noreply@outletko.com',
                'smtp_pass' => 'eoutletsuite_noreply',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );            

            $this->email->initialize($config)
                      ->set_newline("\r\n")
                      ->from('noreply@outletko.com', 'OutletSuite Application')
                      ->to($email)
                      ->subject('Outletko Reset Password')
                      ->message($message);

	        if($this->email->send()) {
	        	$status = 1;
	        }else {
                // $status = $this->email->print_debugger();
                $status = 0;
            }

        return $status;
	}    

}