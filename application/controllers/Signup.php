<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("signup_model");
    }


    public function business_category(){
        $data['result'] = $this->signup_model->business_category();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function search_city_prov(){
        $city = $this->input->post("city", TRUE);
        $country = $this->input->post("country", TRUE);
        $result = $this->signup_model->search_city_prov($city, $country);

        $data['response'] = "false";

        if (!empty($result)) {
            $data['response'] = "true";

            foreach ($result as $key => $value) {
                $data['result'][] = array("label" => ($value->city_desc . ", " . $value->province_desc), "city_id" => $value->id, "prov_id" => $value->province_id, "province" => $value->province_desc);
            }
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function search_partner(){
        $partner = $this->input->post("partner", TRUE);
        $result = $this->signup_model->search_partner($partner);

        $data['response'] = "false";

        if (!empty($result)) {
            $data['response'] = "true";

            foreach ($result as $key => $value) {
                $data['result'][] = array("label" => ($value->partner_name . " (" . $value->account_id . ")"), "partner_id" => $value->partner_id, "lvl_2" => $value->lvl_2, "lvl_3" => $value->lvl_3);
            }
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function country(){
        $data['result'] = $this->signup_model->country();
        $data['country'] = $this->session->userdata("IPCountryID");
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_prov()
    {
        $query = $this->signup_model->get_prov($this->input->post("town"), $this->input->post("country"));

        if (!empty($query)) {
            foreach ($query as $key => $value) {
                // $result = array("prov_id" => $value->prov_id, "city_id" => $value->id, "prov_desc" => $value->prov_desc);
                $data['prov_id'] = $value->province_id;
                $data['city_id'] = $value->id;
                $data['prov_desc'] = $value->prov_desc;
            }
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_data(){
        $status = "failed";
        $info_outletsuite = $this->input->post('info_outletsuite', TRUE);
        $info_outletko = $this->input->post('info_outletko', TRUE);
        $info_outletko['date_insert'] = date("Y-m-d H:i:s");
        $info_outletsuite['date_created'] =  date("Y-m-d H:i:s");

        $pass = $info_outletko['password'];
        $email = $info_outletko['email'];
        $uname = $info_outletko['username'];

        $year = date("y");
        $user_type = "4";
        $account_id_result = $this->signup_model->account_id();
        $account_id = $year . '1' . $account_id_result;

        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $link_name = $info_outletko['link_name'];
        // $link_name = str_replace(' ', '', strtolower($link_name));
        // $link_name = preg_replace("/[^a-zA-Z0-9]/", "", $link_name);
        // $link_name = substr($link_name, 0, 20);

        $account = array(
            'account_id' => $account_id,
            'link_name' => $link_name,
            'account_status' => 1,
            'about_us' => "",
            'account_name' => $info_outletko['account_name'],
            'account_status' => $info_outletko['account_status'],
            'business_category' => $info_outletko['business_category'],
            'user_id' => $info_outletko['user_id'],
            'first_name' => $info_outletko['first_name'],
            'middle_name' => $info_outletko['middle_name'],
            'last_name' => $info_outletko['last_name'],
            'address' => $info_outletko['address'],
            'street' => $info_outletko['address'],
            'confirm_email' => $info_outletko['confirm_email'],
            'city' => $info_outletko['city'],
            'province' => $info_outletko['province'],
            'email' => $info_outletko['email'],
            'mobile_no' => $info_outletko['mobile_no'],
            'date_insert' => date("Y-m-d H:i:s")
        );




        $email_check = $this->signup_model->email_check($account['email']);
        $res = "";
        $send_email = "";
        $email_check = true;

        // if($email_check){
        $res = $this->signup_model->register($account);
        $account2 = array(
            'account_id' => $account_id,
            'status' => $info_outletko['account_status'],
            'comp_id' => $res,
            'first_name' => $info_outletko['first_name'],
            'middle_name' => $info_outletko['middle_name'],
            'last_name' => $info_outletko['last_name'],
            'password' => $hashed_password,
            'user_type' => $user_type,
            'email' => $info_outletko['email'],
            'username' => $info_outletko['username'],
            'account_type' => "0",
            'otp' => "0",
            "status" => "1",
            'all_access' => "1"
        );

        $res2 = $this->signup_model->register_users($account2);

        $user_app = array(
            "last_name" => strtoupper($info_outletko['last_name']),
            "middle_name" => strtoupper($info_outletko['middle_name']),
            "first_name" => strtoupper($info_outletko['first_name']),
            "email" => $info_outletko['email'],
            "mobile_no" => $info_outletko['mobile_no'],
            "address" => $info_outletko['address'],
            "city" => $info_outletko['city'],
            "account_id" => $account_id,
            "account_name" => strtoupper($info_outletko['account_name']),
            "account_status" => '1',
            "account_class" => '1',
            "account_type" => '1',
            "recruited_by" => "000001",
            "business_type" => $info_outletko['business_category'],
            "subscription_type" => "1",
            "subscription_date" => date('Y-m-d'),
            "renewal_date" => date('Y-m-d', strtotime("+11 days")),
            // "recruited_by" => $this->input->post("recruited_by", TRUE),
            "outlet_no" => '3',
            // "cash_card" => $this->input->post("cash_card", TRUE),
            "vat" => '1',
            "currency" => '121',
            "date_insert" => date('Y-m-d H:i:s')
        );

        $user_app_result = $this->signup_model->insert_account($user_app);
        $randomPass = $this->randomString();

        $users = array(
            "comp_id" => $user_app_result,
            "account_id" => $account_id,
            "account_type" => "1",
            "first_name" => strtoupper($info_outletko['first_name']),
            "middle_name" => strtoupper($info_outletko['middle_name']),
            "last_name" => strtoupper($info_outletko['last_name']),
            "username" => $account_id,
            "password" => password_hash($randomPass, PASSWORD_DEFAULT),
            "email" => $info_outletko['email'],
            "user_type" => "2",
            "status" => "1",
            "all_access" => "1",
            "status" => "0"
        );

        $users_result = $this->signup_model->insert_users($users);
        $outlet_result = $this->signup_model->insert_outlet(array("user_id" => $users_result, "outlet_id" => "0"));
        $product_color = $this->signup_model->insert_product_color($user_app_result);
        $product_unit = $this->signup_model->insert_product_unit($user_app_result);
        $sales_discount = $this->signup_model->insert_sales_discount($user_app_result);
        $customer = $this->signup_model->insert_customer($user_app_result);

        $send_email =  $this->send_email($email, $account_id, $uname, $randomPass);
        // }else{
        //   $error = 'Email Already Exist !';
        //   $send_email = false;
        //$this->load->view('register' , $data);
        // }

        if ($send_email == true) {
            $status = "success";
        } else {
            $status = "failed";
        }

        echo json_encode(array('status' => $status, "id" => $res, 'token' => $this->security->get_csrf_hash()));
    }

    public function send_mail($res, $email, $uname, $pass){


        $this->load->library('email');
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'epgmcompany@eoutletsuite.com',
            'smtp_pass' => 'epgmcompany101',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        // var_dump($hashed_email);

        $message = $this->load->view();

        $res = $res;
        // $email = $email;

        $this->email->initialize($config);
        $this->email->set_mailtype("text");
        $this->email->set_newline("\r\n");
        $this->email->to($email);
        $this->email->from('ellednaj11@gmail.com', 'Eoutletsuite');
        $this->email->subject('Email Verification');
        $this->email->message("
        Thanks for signing up!
        You're almost ready to start your business in outletko - but first, click the link below to verify your email address

        Please click this link to activate your account:
        http://www.eoutletsuite.com/Signup/verify?id=$res&hash=$hashed_email
        ");

        // Your account has been created, you can login with you after you have activated your account by pressing the url below.

        // ------------------------
        // Username: $uname
        // Password: $pass
        // ------------------------

        //Send email
        if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "Email sent successfully.");
            $this->load->view('message');
            return true;
        } else {
            $this->session->set_flashdata("email_sent", "Error in sending Email.");
            return false;
        }
    }

    public function send_email($email, $account_id, $uname, $pass){
        $this->load->library("email");
        $status = 0;
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = array();

        $data['account_id'] = $account_id;
        $data['uname'] = $uname;
        $data['password'] = $pass;
        $data['email'] = $email;

        $message = $this->load->view("admin/email/email2", $data, TRUE);

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


        $this->email->initialize($config)
            ->set_newline("\r\n")
            ->from('noreply@outletko.com', 'OutletSuite Application')
            ->to($email)
            ->subject('Outletko Account Register')
            ->message($message);

        if ($this->email->send()) {
            $status = 1;
        } else {
            $status = $this->email->print_debugger();
        }
        return $status;
    }

    public function resend_emal(){
        $email = $this->input->post("email");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $account_id = $this->input->post("account_id");

        // var_dump($email);

        $result = $this->send_email($email,$account_id,$username,$password);

        echo json_encode(array("status" => $result, "token" => $this->security->get_csrf_hash()));
    }

    function verify(){
        $result = $this->signup_model->get_hash_value($_GET['emailid']); //get the hash value which belongs t
        if ($result) {
            if (password_verify($result[0]['email'], $_GET['hash'])) { //check whether the input hash value matches the hash value retrieved from the database
                $verified =  $this->signup_model->verify_user($_GET['emailid']); //update the status of the user as verified

                if ($verified) {
                    //echo "Your account is verified!";
                    $this->send_email($result[0]['email'], $result[0]['account_id'], $result[0]['account_id'], 'password');
                    // header('Location:localhost/outletko');

                } else {
                    /*---Now you can redirect the user to whatever page you want---*/

                    echo "Failed to Verify";
                }
            }
        } else {
            echo "Email does not match";
        }
    }

    public function randomString($length = 6){
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    /* Outletko Buyer */

    public function insert_user(){

        $account_buyer = array(
            "first_name" => $this->input->post("fname"),
            "last_name" => $this->input->post("lname"),
            "country" => $this->input->post("country"),
            "email" => $this->input->post("email"),
            "verify_code" => mt_rand(100000, 999999),
            "verify" => "0",
            "date_insert" => date("Y-m-d H:i:s")
        );

        $result = $this->signup_model->insert_account_buyer($account_buyer);


        $user_data = array(
            "comp_id" => $result['comp_id'],
            "account_id" => $result['account_id'],
            "account_type" => "0",
            "first_name" => $this->input->post("fname"),
            "last_name" => $this->input->post("lname"),
            "username" => $this->input->post("email"),
            "email" => $this->input->post("email"),
            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "user_type" => "5",
            "all_access" => "1",
            "status" => "1",
            "otp" => "0"
        );

        $result2 = $this->signup_model->register_users($user_data);

        // $this->send_email_buyer($account_buyer['verify_code'], $account_buyer['email']);

        $result3 = $this->signup_model->get_account($result['comp_id']);

        if (!empty($result3)) {
            foreach ($result3 as $key => $value) {
                $user_array = array(
                    "user_id" => $value->id,
                    "account_id" => $value->account_id,
                    "comp_id" => $value->comp_id,
                    "user_uname" => $value->username,
                    "user_fullname" => ($value->first_name . " " . $value->last_name),
                    "user_status" => $value->status,
                    "user_type" => $value->user_type,
                    "all_access" => $value->all_access,
                    "login" => 1,
                    "validated" => true
                );

                $users_log = array("user_id" => $value->id, "date_login" => date("Y-m-d H:i:s"));
            }
            $this->session->set_userdata($user_array);
            $this->signup_model->insert_user_log($users_log);
        }


        $data['comp_id'] = $result['comp_id'];
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function send_email_buyer($verify_code, $email){
        $this->load->library("email");
        $status = 0;
        $data = array();

        // $data['first_name'] = $user_data['first_name'];    
        // $data['verify_code'] = $user_data['verify_code'];
        $data['verify_code'] = $verify_code;
        $email = $email;

        $message = $this->load->view("admin/email/user_buyer", $data, TRUE);

        // $config = array(
        //   'protocol' => 'mail',
        //   'mail_type' => 'html',
        //   'smtp_host' => 'secure203.servconfig.com',
        //   'smtp_port' => 465,
        //   'smtp_user' => 'epgmcompany@eoutletsuite.com',
        //   'smtp_pass' => 'epgmcompany101',
        //   'charset' => 'iso-8859-1',
        //   'wordwrap' => TRUE
        // );

        // $config = array(
        //             'protocol' => 'smtp',
        //             'mail_type' => 'html',
        //             'smtp_host' => 'ssl://smtp.gmail.com',
        //             'smtp_port' => '465',
        //             'smtp_user' => 'epgmcompany@gmail.com',
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



        $this->email->initialize($config)
            ->set_newline("\r\n")
            ->from('noreply@outletko.com', 'Outletko User Verification')
            ->to($email)
            ->subject('Outletko User Verification')
            ->message($message);

        if ($this->email->send()) {
            $status = 1;
        } else {
            $status = $this->email->print_debugger();
        }
        return $status;
    }

    public function confirm_account(){

        $verify_code = $this->input->post("verify_code");
        $id = $this->input->post("id");

        $result = $this->signup_model->confirm_account($verify_code, $id);

        if ($result > 0) {
            $result2 = $this->signup_model->get_account($id);
            $user_array = array();
            $users_log = "";

            foreach ($result2 as $key => $value) {
                $user_array = array(
                    "user_id" => $value->id,
                    "account_id" => $value->account_id,
                    "comp_id" => $value->comp_id,
                    "user_uname" => $value->username,
                    "user_fullname" => ($value->first_name . " " . $value->last_name),
                    "user_status" => $value->status,
                    "user_type" => $value->user_type,
                    "all_access" => $value->all_access,
                    "login" => 1,
                    "validated" => true
                );

                $users_log = array("user_id" => $value->id, "date_login" => date("Y-m-d H:i:s"));
            }

            $this->session->set_userdata($user_array);
            $this->signup_model->insert_user_log($users_log);
        }

        $data['result'] = $result;
        $data['token'] = $this->security->get_csrf_hash();

        echo json_encode($data);
    }

    public function check_login(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $data['result'] = $this->signup_model->check_login($username, $password);
        $data['token'] = $this->security->get_csrf_hash();
        $data['user_type'] = $this->session->userdata("user_type");
        $data['otp'] = $this->session->userdata("otp");

        if (empty($data['result'])) {
            $data['login'] = "0";
        } else {
            $data['login'] = "1";
        }

        if (!empty($this->session->userdata("prod_id"))) {
            $data['session_prod_id'] = 1;
        } else {
            $data['session_prod_id'] = 0;
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
            'expire' => $expire
        );

        $cookie_userid = array(
            'name'   => 'uid_token',
            'value'  => $user_id,                            
            'expire' => $expire
        );

        $cookie_rememberme = array(
            'name'   => 'rtoken',
            'value'  => TRUE,                            
            'expire' => $expire
        );


        $this->input->set_cookie($cookie_accountid);
        $this->input->set_cookie($cookie_userid);
        $this->input->set_cookie($cookie_rememberme);

        echo json_encode($data);
    }
}
