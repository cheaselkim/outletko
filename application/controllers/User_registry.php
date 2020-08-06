<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registry extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("user_registry_model");
	    	$this->load->model("password_model");
			$this->load->helper("user_registry");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function account_id(){
		$data = array();
		$data['year'] = date("y");
		$data['account_id'] = $this->user_registry_model->account_id();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function account_class(){
		$data['data'] = $this->user_registry_model->account_class();
		$data['result'] = $this->user_registry_model->account_class();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function account_type(){
		$data['data'] = $this->user_registry_model->account_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function business_type(){
		$data['data'] = $this->user_registry_model->business_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function subscription_type(){
		$data['data'] = $this->user_registry_model->subscription_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function currency(){
		$data['data'] = $this->user_registry_model->currency();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function partner(){
        $partner = $this->input->post("partner", TRUE);
        $data['result'] = $this->user_registry_model->partner($partner);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function cash_card(){
        $last_name = $this->input->post("last_name", TRUE);
        $first_name = $this->input->post("first_name", TRUE);
        $middle_name = $this->input->post("middle_name", TRUE);
        $cash_card = $this->input->post("cash_card", TRUE);
        
        $data['result'] = $this->user_registry_model->cash_card($last_name, $first_name, $middle_name, $cash_card);
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

	public function insert_account(){
		$outletko_comp = $this->user_registry_model->insert_outletko();
		$user_app_result = 0;
		$users_result = 0;
		$email_result = 0;
        $user_type = 2;
        
        if ($this->input->post("subscription_type", TRUE) == "0"){
            $renewal_date = "0000-00-00";
        }else{
            $renewal_date = $this->input->post("renewal_date", TRUE);
        }

		$user_app = array(
			"last_name" => strtoupper($this->input->post("last_name", TRUE)),
			"middle_name" => strtoupper($this->input->post("middle_name", TRUE)),
			"first_name" => strtoupper($this->input->post("first_name", TRUE)),
			"email" => $this->input->post("email", TRUE),
			"mobile_no" => $this->input->post("mobile_no", TRUE),
			// "area_code" => $this->input->post("area_code", TRUE),
			"telephone_no" => $this->input->post("phone_no", TRUE),
			"address" => $this->input->post("address", TRUE),
			"city" => $this->input->post("town", TRUE),
			"province" => $this->input->post("province", TRUE),
			"account_id" => $this->input->post("account_id", TRUE),
			"account_name" => strtoupper($this->input->post("account_name", TRUE)),
			"account_status" => $this->input->post("account_status", TRUE),
			"account_class" => $this->input->post("account_class", TRUE),
			"account_type" => $this->input->post("account_type", TRUE),
			"business_type" => $this->input->post("business_type", TRUE),
			"subscription_type" => $this->input->post("subscription_type", TRUE),
			"subscription_date" => $this->input->post("subscription_date", TRUE),
			"renewal_date" => $renewal_date,
            "level_2" => 0,
            "level_3" => 0,
            // "payment_date" => $this->input->post("payment_date", TRUE),
            // "recruited_by" => $this->input->post("recruited_by", TRUE),
            "recruited_by" => 1,
			"outlet_no" => $this->input->post("outlet", TRUE),
			"cash_card" => $this->input->post("cash_card", TRUE),
			"vat" => $this->input->post("vat", TRUE),
			"currency" => $this->input->post("currency", TRUE),
			"date_insert" => date('Y-m-d H:i:s')
			);

		$user_app_result = $this->user_registry_model->insert_account($user_app);

		if ($this->input->post('account_class') == "1"){
			$user_type = 2;
		}else{
			$user_type = 3;
		}


		$users = array(
			"comp_id" => $user_app_result,
			"account_id" => $this->input->post("account_id", TRUE),
			"account_type" => "1",
			"first_name" => strtoupper($this->input->post("first_name", TRUE)),
			"middle_name" => strtoupper($this->input->post("middle_name", TRUE)),
			"last_name" => strtoupper($this->input->post("last_name", TRUE)),
			"username" => $this->input->post("account_id", TRUE),
			"email" => $this->input->post("email", TRUE),
			"user_type" => $user_type,
			"all_access" => "1",
			"status" => "1"
		);

		$user_outletko = array(
			'account_id' => $this->input->post("account_id", TRUE),
			'status' => "1",
			'comp_id' => $outletko_comp,
			'first_name' => strtoupper($this->input->post("first_name", TRUE)),
			'middle_name' => strtoupper($this->input->post("middle_name", TRUE)),
			'last_name'=> strtoupper($this->input->post("last_name", TRUE)),
			'user_type'=> "4",
			'password' => password_hash("password", PASSWORD_DEFAULT),
			'email' => $this->input->post("email", TRUE),
			'username' => $this->input->post("email", TRUE),
			'account_type' => "0",
			'otp' => "0",
			'all_access' => "1"  
		);

			$link_name = $this->input->post("account_name", TRUE);
			$link_name = str_replace(' ', '', strtolower($link_name));
			$link_name = preg_replace("/[^a-zA-Z]/", "", $link_name);
			$link_name = substr($link_name, 0, 15);

            $check_linkname = $this->user_registry_model->check_linkname($link_name, 0, 15);

            if ($check_linkname > 0){
                $link_name = substr($link_name, 0, 8);
                $link_name = $link_name.$account_id;
            }else{
                $link_name = substr($link_name, 0, 15);
            }
    

		$account_outletko=array(
			'account_id'=>$this->input->post('account_id', TRUE),
			'link_name' => $link_name,
			'account_name'=> ucwords($this->input->post('account_name', TRUE)),
            'account_status'=> 1,
            'account_pro' => 0,
			'confirm_email' => 1,
            'bg_color' => '#77933c',
            'about_us' => '',
			'business_category'=> $this->input->post("business_type", TRUE),
			'first_name' => strtoupper($this->input->post("first_name" ,TRUE)),
			'middle_name'=> strtoupper($this->input->post("middle_name", TRUE)),
			'last_name'=> strtoupper($this->input->post("last_name", TRUE)),
			'address'=> $this->input->post("address", TRUE),
			'street'=> $this->input->post("address", TRUE),
			'city'=> $this->input->post("city", TRUE),
			'email'=> $this->input->post("email", TRUE),
            'mobile_no' => $this->input->post("mobile", TRUE),
            'date_insert'=>date("Y-m-d H:i:s")
		  );
	  

		// OutletkoSuite
		$users_result = $this->user_registry_model->insert_users($users);
		$outlet_result = $this->user_registry_model->insert_outlet(array("user_id" => $users_result, "outlet_id" => "0"));
		$product_color = $this->user_registry_model->insert_product_color($user_app_result);
		$product_unit = $this->user_registry_model->insert_product_unit($user_app_result);
		$sales_discount = $this->user_registry_model->insert_sales_discount($user_app_result);
		$customer = $this->user_registry_model->insert_customer($user_app_result);

		// OutletkoAdmin
		$account_outletko = $this->user_registry_model->insert_account_outletko($account_outletko, $outletko_comp);
		$user_outletko = $this->user_registry_model->insert_user_outletko($user_outletko, $outletko_comp);

		// $email_result = $this->send_email($this->input->post("email", TRUE), $this->input->post("account_id", TRUE));

		// if ($email_result == 1){
		// 	$email_result2 = $this->send_admin_email($this->input->post("email", TRUE), $this->input->post("account_id", TRUE));
		// }

        $email_result = 1;
        $email_result2 = 1;

		// $user_app_result = 1;
		// $outlet_result = 1;
		// $email_result = 1;

		echo json_encode(array("user_app" => $user_app_result, "users" => $outlet_result, "email" => $email_result, 'token' => $this->security->get_csrf_hash()));

	}
	
	public function email(){
	    $data = array();
        $data['account_id'] = "";
        $data['password'] = "";
        $this->load->view("admin/email/email", $data);  
	}

	public function send_email($email, $account_id){
		$this->load->library("email");
		$status = 0;
		$randomString = $this->randomString();
		$result = $this->password_model->find_accountid($account_id, $randomString);
        $data = array();

        $data['account_id'] = $account_id;
		$data['password'] = $randomString;
		$data['email'] = $email;

        $message = $this->load->view("admin/email/email", $data, TRUE);

		if ($result > 0){
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
			// 	'protocol' => 'smtp',
			// 	'mail_type' => 'html',
			// 	'smtp_host' => 'ssl://smtp.gmail.com',
			// 	'smtp_port' => '465',
			// 	'smtp_user' => 'epgmcompany@gmail.com',
			// 	'smtp_pass' => 'epgmcompany101',
			// 	'charset' => 'iso-8859-1',
			// 	'wordwrap' => TRUE
			// );

	        $this->email->initialize($config)
	                    ->set_newline("\r\n")
	                    ->from('noreply@outletko.com', 'OutletSuite Application')
	                    ->to($email)
	                    ->subject('Outletko Account Register')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
        // $status = 1;

		// var_dump($email);        

	    // var_dump($this->email->initialize($config));

        // var_dump($this->email->print_debugger());        

	    // var_dump($status);
	    
	    return $status;

	}	

	public function send_admin_email($email, $account_id){
		$this->load->library("email");
		$status = 0;
		$randomString = "";
		$result = 1;
        $data = array();

        $data['account_id'] = $account_id;
		$data['password'] = $randomString;
		$data['email'] = $email;

        $message = $this->load->view("admin/email/email_admin", $data, TRUE);

		if ($result > 0){
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
	                    ->from('noreply@outletko.com', 'OutletkoSuite Application')
	                    ->to("accounts@outletko.com")
	                    ->subject('OutletkoSuite Account Register')
	                    ->message($message);


	        if($this->email->send()) {
	        	$status = 1;
	        }else {
	        	$status = $this->email->print_debugger();
        	}
	    }else{
	    	$status = 0;
	    }
        // $status = 1;

		// var_dump($email);        

	    // var_dump($this->email->initialize($config));

        // var_dump($this->email->print_debugger());        

	    // var_dump($status);
	    
	    return $status;

	}	

	public function data_query(){
        $fdate = $this->input->post("fdate");
        $tdate = $this->input->post("tdate");
		$keyword = $this->input->post("keyword");
		$account_status = $this->input->post("account_status");
		$account_class = $this->input->post("account_class");
		$app_func = $this->input->post("app_func");

		$result = $this->user_registry_model->data_query($fdate, $tdate, $keyword, $account_status, $account_class);
		$data['result'] = tbl_query($result, $app_func);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function get_data(){
		$id = $this->input->post("id", TRUE);
		$data['data'] = $this->user_registry_model->get_data($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function get_outletko_data(){
		$id = $this->input->post("id", TRUE);
		$data['data'] = $this->user_registry_model->get_outletko_data($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
    }

	public function update_account(){
		$user_app_result = 0;
		$users_result = 0;
		$email_result = 0;
		$id = $this->input->post("id", TRUE);

		$user_app = array(
			"last_name" => strtoupper($this->input->post("last_name", TRUE)),
			"middle_name" => strtoupper($this->input->post("middle_name", TRUE)),
			"first_name" => strtoupper($this->input->post("first_name", TRUE)),
			"email" => $this->input->post("email", TRUE),
			"mobile_no" => $this->input->post("mobile_no", TRUE),
			"telephone_no" => $this->input->post("phone_no", TRUE),
			"address" => $this->input->post("address", TRUE),
			"city" => $this->input->post("town", TRUE),
			"province" => $this->input->post("province", TRUE),
			"account_id" => $this->input->post("account_id", TRUE),
			"account_name" => strtoupper($this->input->post("account_name", TRUE)),
			"account_status" => $this->input->post("account_status", TRUE),
			"account_class" => $this->input->post("account_class", TRUE),
			"account_type" => $this->input->post("account_type", TRUE),
			"business_type" => $this->input->post("business_type", TRUE),
			"subscription_type" => $this->input->post("subscription_type", TRUE),
			"subscription_date" => $this->input->post("subscription_date", TRUE),
			"renewal_date" => $this->input->post("renewal_date", TRUE),
			"recruited_by" => $this->input->post("recruited_by", TRUE),
			"outlet_no" => $this->input->post("outlet", TRUE),
			"cash_card" => $this->input->post("cash_card", TRUE),
			"vat" => $this->input->post("vat", TRUE),
			"currency" => $this->input->post("currency", TRUE),
			"date_update_admin" => date('Y-m-d H:i:s')
			);

		$user_app_result = $this->user_registry_model->update_account($user_app, $id);

		$users = array(
			"first_name" => strtoupper($this->input->post("first_name", TRUE)),
			"middle_name" => strtoupper($this->input->post("middle_name", TRUE)),
			"last_name" => strtoupper($this->input->post("last_name", TRUE)),
			"username" => $this->input->post("account_id", TRUE),
			"email" => $this->input->post("email", TRUE),
		);

		// $users_result = $this->user_registry_model->update_users($users);
		// $email_result = $this->send_email($this->input->post("email"), $this->input->post("account_id"));
		$email_result = 1;

		echo json_encode(array("user_app" => $user_app_result, "users" => $users_result, "email" => $email_result, 'token' => $this->security->get_csrf_hash()));

	}

}












