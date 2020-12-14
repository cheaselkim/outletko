<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("login_model");
	}

    public function test(){
        // $this->load->helper("cookie");
        // $this->load->library('encryption');
        $account_id = $this->session->userdata("account_id");
        // var_dump($account_id);

        // var_dump($cookie);
        // $this->encryption->initialize(array('driver' => 'mcrypt'));
        // var_dump($this->encryption->encrypt("test"));

        // $this->encryption->initialize(
        //     array(
        //             'cipher' => 'des',
        //             'mode' => 'CFB8',
        //             'key' => '<a 24-character random string>'
        //     )
        // );

        $expire = time() + 21600; // 12 hour expiry

        $account_id = $this->encryption->encrypt($this->session->userdata('account_id'));
        $user_id = $this->encryption->encrypt($this->session->userdata('user_id') == "" ? "1"  :  $this->session->userdata("user_id"));        

        // var_dump($account_id);
        // var_dump($user_id);

        var_dump(time());

        $cookie_accountid = array(
            'name'   => 'remember_me',
            'value'  => $account_id,                            
            'expire' => '300',                                                                                   
            'secure' => TRUE
        );

        $cookie_userid = array(
            'name'   => 'user_id',
            'value'  => $user_id,                            
            'expire' => '300',                                                                                   
            'secure' => TRUE
        );

        // set cookies
        $this->input->set_cookie($cookie_accountid);
        $this->input->set_cookie($cookie_userid);
        // set_cookie($account_id);
        // var_dump($this->input->cookie('remember_me'));

        // get cookies
        $account = $this->input->cookie("remember_me");
        $user = $this->input->cookie("user_id");

        // var_dump($this->encryption->decrypt($account));
        var_dump($this->encryption->decrypt($user));
    }

    public function test_cookies(){
        if(!empty($this->input->cookie('uid_token'))){
            // $this->load->library('encryption');

            // $this->encryption->initialize(
            //     array(
            //             'cipher' => 'des',
            //             'mode' => 'CFB8',
            //             'key' => '<a 24-character random string>'
            //     )
            // );
    

            $user = $this->input->cookie("uid_token");          
            var_dump($user);  
            var_dump($this->encryption->decrypt($user));
        }
    }

	public function login(){		
		$result = $this->login_model->check_session();

        if (empty($this->session->userdata("IPCountryCode"))){

            $ip = $_SERVER['REMOTE_ADDR']; // This will contain the ip of the request
            $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

            if ($ip == "::1"){
                $this->session->set_userdata("IPCountryID", "173");
                $this->session->set_userdata("IPCountryCode", "PH");
                $this->session->set_userdata("IPCountry", "Philippines");
                $this->session->set_userdata("IPContinent", "Asia");
                $this->session->set_userdata("IPCurrencyCode", "PHP");
                $this->session->set_userdata("IPTimeZone", "Asia/Manila");  
                $this->session->set_userdata("IPCurrencySymbol", '&#8369;');
            }else{
                $result = $this->login_model->search_currency($dataArray->geoplugin_countryCode);
                if (!empty($result)){
                    foreach ($result as $key => $value) {
                        $this->session->set_userdata("IPCountryID", $value->id);
                        $this->session->set_userdata("IPCountryCode", $value->code);
                        $this->session->set_userdata("IPCountry", $value->country);
                        $this->session->set_userdata("IPContinent", $value->area);
                        $this->session->set_userdata("IPCurrencyCode", $value->currency);
                        $this->session->set_userdata("IPTimeZone", date_default_timezone_get());    
                    }
                }else{
                    $this->session->set_userdata("IPCountryID", "173");
                    $this->session->set_userdata("IPCountryCode", "PH");
                    $this->session->set_userdata("IPCountry", "Philippines");
                    $this->session->set_userdata("IPContinent", "Asia");
                    $this->session->set_userdata("IPCurrencyCode", "PHP");
                    $this->session->set_userdata("IPTimeZone", "Asia/Manila");    
                }
            }
        }

        if ($this->session->userdata("IPCountryCode") == "PH"){
            $this->session->set_userdata("IPCurrencySymbol", '&#8369;');
        }

		// var_dump($result);

		if ($result != true){
			$this->template->load("", ($data = null));
		}else{
			$result = $this->login_model->check_otp();
			
			// if ($this->session->userdata("user_type") == "5"){
			// 	redirect('/my-order');
			// }else{
				if ($result > 0){
					$this->load->view("website/otp_password");
				}else{
                    $this->session->unset_userdata("otp");
					// $data['edit'] = 0;
					// $data['function'] = 0;
					// $data['sub_module'] = "";
					// $data['menu_module'] = 0;
					// $data['menu_module'] = 0;
					// $data['user_type'] = $this->session->userdata('user_type');
					// $data['account_id'] = $this->session->userdata("account_id");
					// $this->template->load("0", $data);		

					if ($this->session->userdata("user_type") == "4"){
						// redirect("store/".str_replace(' ', '', strtolower($this->session->userdata("account_name"))));
						// $link_name = str_replace(' ', '', strtolower($this->session->userdata("link_name")));
						// $link_name = preg_replace("/[^a-zA-Z]/", "", $link_name);

						// redirect(str_replace(' ', '', strtolower($link_name)));
						redirect($this->session->userdata("link_name"));
					}else{
						if (($this->session->userdata("login") == "1") && ($this->session->userdata("all_access") == "1") && ($this->session->userdata("user_type") == "2")){
							$this->session->set_userdata("login", "0");
							redirect('app/6/17/0');
						// }else if ($this->session->userdata("user_type") == "3"){
						// 	redirect('/');
						}else{
							$data['sub_module'] = 0;
							$data['menu_module'] = 0;
							$data['edit'] = 0;
							$data['function'] = 0;
							$data['width'] = 1366;
							$data['user_type'] = $this->session->userdata('user_type');
							$data['account_id'] = $this->session->userdata("account_id");
                            $data['owner'] = 0;

                            if ($this->session->userdata("user_type") == "5"){
                                $this->template->load("", $data);							
                            }else{
                                $this->template->load("0", $data);							
                            }
						}					
					}				

				}

			// }

		}
	}

	public function loginpage(){		
        $result = $this->login_model->check_session();

		if ($result != true){
            $this->load->view("login2");
		}else{
            redirect("/");
		}
	}

	public function nologin(){
		// $this->load->view("admin/email/email");
			$this->load->library("email");
			$status = 0;
			// $randomString = $this->randomString();
			// $result = $this->password_model->find_accountid($account_id, $randomString);
			$data = array();
	
			$data['account_id'] = 'test';
			$data['password'] = 'askdjfaskdf';
			$data['email'] = 'dooleycheasel@gmail.com';
			$result = 1;
			$email = 'dooleycheasel@gmail.com';

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
	
			var_dump($status);

			// var_dump($email);        
	
			// var_dump($this->email->initialize($config));
	
			// var_dump($this->email->print_debugger());        
	
			// var_dump($status);
			// die($status);
			// return $status;

	}

	public function check_login(){
	    $result = $this->login_model->login();
	    if ($result == false){
			$this->session->set_flashdata("log_error", "1");
        }
        
        $this->load->helper("cookie");
        $this->load->library('encryption');

        $expire = time() + 21600; // 12 hour expiry
        // $this->encryption->initialize(
        //     array(
        //             'cipher' => 'des',
        //             'mode' => 'CFB8',
        //             'key' => '<a 24-character random string>'
        //     )
        // );

        $account_id = $this->encryption->encrypt($this->session->userdata('account_id'));
        $user_id = $this->encryption->encrypt($this->session->userdata('user_id'));        

        $cookie_accountid = array(
            'name'   => 'aid_token',
            'value'  => $account_id,                            
            'expire' => '300',                                                                                   
            'secure' => TRUE
        );

        $cookie_userid = array(
            'name'   => 'uid_token',
            'value'  => $user_id,                            
            'expire' => '300',                                                                                   
            'secure' => TRUE
        );

        $this->input->set_cookie($cookie_accountid);
        $this->input->set_cookie($cookie_userid);


	    redirect('/');
	}

	public function logout(){
        $value_account_id = $this->session->userdata("account_id");
        session_destroy();
        // setcookie("account_id", $value_account_id, 0,"/", "outletko.com", 0);
        $this->load->helper("cookie");
        // $this->input->delete_cookie("remember_me");
        // $this->input->delete_cookie("account_id");
        delete_cookie("aid_token");
        delete_cookie("uid_token");
        delete_cookie("rtoken");
        redirect("/");
	}

	public function menu(){
		$this->load->view("event/menu");
	}

	public function featured_outlet(){
		$result = $this->login_model->featured_outlet();
		$data['token'] = $this->security->get_csrf_hash();

		foreach ($result as $key => $value) {
			$data['data'][$key] = array(
				"account_name" => $value->account_name,
				"about_us" => $value->about_us,
				"loc_image" => ($value->loc_image == null ? null : unserialize($value->loc_image))
 			);
		}

		echo json_encode($data);
	}

    public function curr_session(){
        $code = trim($this->input->post("code"));

        $result = $this->login_model->search_currency($code);

        if (!empty($result)){
            foreach ($result as $key => $value) {
                $this->session->set_userdata("IPCountryID", $value->id);
                $this->session->set_userdata("IPCountryCode", $value->code);
                $this->session->set_userdata("IPCountry", $value->country);
                $this->session->set_userdata("IPContinent", $value->area);
                $this->session->set_userdata("IPCurrencyCode", $value->currency);
                $this->session->set_userdata("IPTimeZone", date_default_timezone_get());    
            }
        }else{
            $this->session->set_userdata("IPCountryID", "173");
            $this->session->set_userdata("IPCountryCode", "PH");
            $this->session->set_userdata("IPCountry", "Philippines");
            $this->session->set_userdata("IPContinent", "Asia");
            $this->session->set_userdata("IPCurrencyCode", "PHP");
            $this->session->set_userdata("IPTimeZone", "Asia/Manila");    
        }

        // $data['curr'] = $curr;
        $data['result'] = $result;
        $data['token'] = $this->security->get_csrf_hash();
        $data['country'] = $this->session->userdata("IPCountryCode");
        echo json_encode($data);
    }

}
