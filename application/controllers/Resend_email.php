<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resend_email extends CI_Controller {

	public function __construct(){
	    parent::__construct();
            $this->load->model("resend_email_model");
            $this->load->model("signup_model");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

    public function search_account($type){
		$input = $this->input->post("input", TRUE);
		$data = array();
		$data['response'] = "false";

		if ($type == "1"){
			$result = $this->resend_email_model->search_email($input);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->email, "account_name" => $value->account_name, "account_no" => $value->account_id, "account_id" => $value->id);
				}
            }            
        }else if ($type == "2"){
			$result = $this->resend_email_model->search_account_id($input);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->account_id, "email" => $value->email, "account_name" => $value->account_name, "account_id" => $value->id);
				}
            } 
		}else{
			$result = $this->resend_email_model->search_account_name($input);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->account_name, "email" => $value->email, "account_no" => $value->account_id, "account_id" => $value->id);
				}
			}
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

    }

    public function resend_email(){

        $category = $this->input->post("category");
        $class = $this->input->post("class");
        $account_id = $this->input->post("account_id");
        $account_no = $this->input->post("account_no");
        $account_name = $this->input->post("account_name");
        $email = $this->input->post("email");
        $status = 0;

        $result = $this->resend_email_model->get_account_data($account_no);

        if (!empty($result)){
            foreach ($result as $key => $value) {

                if ($value->email == $email && $value->account_no == $account_no){

                    if ($category == "1"){
                        if ($class == "1"){
                            $this->send_confirm_email($value->email, $value->account_no);
                        }else if ($class == "2"){
                            $this->send_email($value->email, $value->account_no, $value->subscription_type);
                            $this->send_invoice_email($value->email, $value->account_no, $value->id);
                            $this->send_plan_email($value->email, $value->account_no, $value->id);
                        }else if ($class == "3"){
                            $this->send_invoice_email($value->email, $value->account_no, $value->id);                            
                        }else if ($class == "4"){
                            $this->send_plan_email($value->email, $value->account_no, $value->id);
                        }
                    }

                }

            }
        }

        $data['status'] = $status;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function send_confirm_email($email, $account_id){

        $this->load->library("email");
        $status = 0;
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = array();
    
        $data['account_id'] = password_hash($account_id, PASSWORD_DEFAULT);
        $data['email'] = password_hash($email, PASSWORD_DEFAULT);

        $message = $this->load->view("admin/email/email_activate", $data, TRUE);

        //   $config = array(
        //               'protocol' => 'mail',
        //               'mail_type' => 'html',
        //               'smtp_host' => 'secure203.servconfig.com',
        //               'smtp_port' => 465,
        //               'smtp_user' => 'epgmcompany@eoutletsuite.com',
        //               'smtp_pass' => 'epgmcompany101',
        //               'charset' => 'iso-8859-1',
        //               'wordwrap' => TRUE

        //           );

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

        //   $config = array(
        //               'protocol' => 'smtp',
        //               'mail_type' => 'html',
        //               'smtp_host' => 'ssl://smtp.gmail.com',
        //               'smtp_port' => '465',
        //               'smtp_user' => 'epgmcompany@gmail.com',
        //               'smtp_pass' => 'epgmcompany101',
        //               'charset' => 'iso-8859-1',
        //               'wordwrap' => TRUE
        //           );

          $this->email->initialize($config)
                      ->set_newline("\r\n")
                      ->from('noreplys@outletko.com', 'Outletko')
                    //   ->from('epgmcompany@gmail.com', 'Outletko')
                      ->to($email)
                      ->bcc("verify@outletko.com")
                      ->subject('Please activate your Outletko Account')
                      ->message($message);

          if($this->email->send()) {
            $status = 1;
          }else {
            $status = $this->email->print_debugger();
          }       
        

          return $status;


    }

    public function send_email($email, $account_id, $plan){
      // $email, $account_id,$outletko_pass,$eoutletsuite_pass


        $eoutletsuite_pass = $this->randomString();
        $outletko_pass = $this->randomString();
        $message = "";

        // $check_send_email = $this->signup_model->check_send_email($account_id);
        $check_send_email = 0;

        if ($check_send_email == 0){

            $this->signup_model->update_user_password($eoutletsuite_pass, $outletko_pass, $account_id);

            $this->load->library("email");
            $status = 0;
            $hashed_email = password_hash($email, PASSWORD_DEFAULT);
            $data = array();
        
            $data['account_id'] = $account_id;
            $data['eoutletsuite_pass'] = $eoutletsuite_pass;
            $data['outletko_pass'] = $outletko_pass;
            $data['email'] = $email;

            if ($plan <= 4){
                $message = $this->load->view("admin/email/email2", $data, TRUE);
            }else{
                $message = $this->load->view("admin/email/email_user_access_eoutletsuite", $data, TRUE);                
            }

            // $config = array(
            //             'protocol' => 'mail',
            //             'mail_type' => 'html',
            //             'smtp_host' => 'secure203.servconfig.com',
            //             'smtp_port' => 465,
            //             'smtp_user' => 'epgmcompany@eoutletsuite.com',
            //             'smtp_pass' => 'epgmcompany101',
            //             'charset' => 'iso-8859-1',
            //             'wordwrap' => TRUE

            //         );

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

            // $config = array(
            //             'protocol' => 'smtp',
            //             'mail_type' => 'html',
            //             'smtp_host' => 'ssl://smtp.gmail.com',
            //             'smtp_port' => '465',
            //             'smtp_user' => 'epgmcompany@gmail.com',
            //             'smtp_pass' => 'epgmcompany101',
            //             'charset' => 'iso-8859-1',
            //             'wordwrap' => TRUE
            // );

            $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('noreply@outletko.com', 'Outletko')
                        // ->from('epgmcompany@gmail.com', 'Outletko')
                        // ->to("dooleycheasel@gmail.com")
                        ->to($email )
                        ->bcc("accounts@outletko.com")
                        // ->bcc("epgmcompany@gmail.com")
                        ->subject('Your Outletko Login Detail')
                        ->message($message);

            if($this->email->send()) {
                $status = 1;
            }else {
                $status = $this->email->print_debugger();
            }       
        }else{
            $status = 1;
        }

        // var_dump($message);
          return $status;
    }

    public function send_invoice_email($email, $account_id, $id){

        // $email = "dooleycheasel@gmail.com";
        // $account_id = "19440082";
        // $email = "eapurugganan@gmail.com";
        // $account_id = "2012010103";

        $this->load->library("email");
        $status = 0;
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = array();

        $check_send_email = $this->signup_model->check_send_email($account_id);

        if ($check_send_email > 0){
            $result = $this->signup_model->get_data($id);

            // var_dump($result);
        
            $data['account_id'] = password_hash($account_id, PASSWORD_DEFAULT);
            $data['email'] = password_hash($email, PASSWORD_DEFAULT);

            if (!empty($result)){
                foreach ($result as $key => $value) {
                    $data['plan'] = $value->plan_name;
                    $data['plan_price'] = number_format(($value->price) + ($value->outlet_price * ($value->outlet_no - 3)), 2);
                    $data['plan_vat'] = number_format(($value->price * 0.12), 2);
                    $data['invoice_no'] = $value->invoice_no;
                    $data['name'] = ucwords(strtolower($value->first_name))." ".ucwords(strtolower($value->last_name));
                    $data['address'] = $value->address.", ".$value->city_desc.", ".$value->province_desc;
                }
            }else{
                $data['plan'] = "";
                $data['plan_price'] = "";
                $data['plan_vat'] = "";
                $data['invoice_no'] = "";
                $data['name'] = "";
                $data['address'] = "";
            }

            if ($data['plan_price'] == "0"){
                $data['plan_price'] = "FREE";
            }

            $message = $this->load->view("admin/email/invoice", $data, TRUE);


            $config = array(
                            'protocol' => 'mail',
                            'mail_type' => 'html',
                            'smtp_host' => 'mail.outletko.com',
                            'smtp_port' => '465',
                            'smtp_user' => 'noreply@outletko.com',
                            'smtp_pass' => 'eoutletsuite_noreply',
                            'charset' => 'utf-8',
                            'wordwrap' => TRUE
                    );

            $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('noreply@outletko.com', 'Outletko')
                        ->to($email)
                        ->bcc("receipt@outletko.com")
                        ->subject('Outletko Acknowledgement')
                        ->message($message);

            if($this->email->send()) {
                $status = 1;
            }else {
                $status = $this->email->print_debugger();
            }       

            $this->email->clear(TRUE);
        }else{
            $status = 1;
        }
          // var_dump($status);

        return $status;
    }

    public function send_plan_email($email, $account_id, $id){

        // $email = "dooleycheasel@gmail.com";
        // $account_id = "19440082";
        // $email = "eapurugganan@gmail.com";
        // $account_id = "2012010103";

        $this->load->library("email");
        $status = 0;
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = array();

        $check_send_email = $this->signup_model->check_send_email($account_id);

        if ($check_send_email > 0){
            $result = $this->signup_model->get_data($id);
        
            $data['account_id'] = password_hash($account_id, PASSWORD_DEFAULT);
            $data['email'] = password_hash($email, PASSWORD_DEFAULT);

            if (!empty($result)){
                foreach ($result as $key => $value) {
                    $plan = $data['plan_type_id'];
                    $data['name'] = ucwords(strtolower($value->first_name))." ".ucwords(strtolower($value->last_name));
                }
            }

            if ($plan == "0"){
                $plan_html = "admin/email/email_plan_free";
            }else{
                $plan_html = "admin/email/email_plan_pro";                
            }

            $message = $this->load->view($plan_html, $data, TRUE);


            $config = array(
                            'protocol' => 'mail',
                            'mail_type' => 'html',
                            'smtp_host' => 'mail.outletko.com',
                            'smtp_port' => '465',
                            'smtp_user' => 'noreply@outletko.com',
                            'smtp_pass' => 'eoutletsuite_noreply',
                            'charset' => 'utf-8',
                            'wordwrap' => TRUE
                    );

            $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('noreply@outletko.com', 'Outletko')
                        ->to($email)
                        ->bcc("receipt@outletko.com")
                        ->subject('Your Outletko Plan')
                        ->message($message);

            if($this->email->send()) {
                $status = 1;
            }else {
                $status = $this->email->print_debugger();
            }       

            $this->email->clear(TRUE);
        }else{
            $status = 1;
        }
          // var_dump($status);

        return $status;
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


}
