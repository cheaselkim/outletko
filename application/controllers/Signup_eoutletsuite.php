<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_eoutletsuite extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model("Signup_eoutletsuite_model");
    }


    public function business_category(){
        $data['result'] = $this->Signup_eoutletsuite_model->business_type();
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

        $randomPass = $this->randomString();
        $fname = $this->input->post("first_name");
        $lname = $this->input->post("last_name");
        $email = $this->input->post("email");
        $buss_type = $this->input->post("business_type");
        $account_id = date("y").$buss_type.$this->Signup_eoutletsuite_model->account_id();


        $data = array(
            "last_name" => strtoupper($this->input->post("last_name", TRUE)),
            "first_name" => strtoupper($this->input->post("first_name", TRUE)),
            "email" => $this->input->post("email", TRUE),
            "account_id" => $account_id,
            "account_status" => "1",
            "account_class" => "1",
            "account_type" => "1",
            "business_type" => $this->input->post("business_type", TRUE),
            "outlet_no" => "2",
            "currency" => "121",
            "subscription_type" => "5",
            "subscription_date" => date("Y-m-d"),
            "recruited_by" => "000001",
            "renewal_date" => date("Y-m-d", strtotime("+1 Year")),
            "online_register" => "1",
            "date_insert" => date('Y-m-d H:i:s')            
        );

        $comp_id = $this->Signup_eoutletsuite_model->insert_account($data);
        $password = password_hash($randomPass, PASSWORD_DEFAULT)    ;

        $users = array(
            "comp_id" => $comp_id,
            "account_id" => $account_id,
            "account_type" => "1",
            "first_name" => strtoupper($this->input->post("first_name", TRUE)),
            "last_name" => strtoupper($this->input->post("last_name", TRUE)),
            "username" => $account_id,
            "email" => $this->input->post("email", TRUE),
            "password" => $password,
            "otp" => "1",
            "user_type" => "2",
            "online_register" => "1",
            "all_access" => "1"
        );

        $users_result = $this->Signup_eoutletsuite_model->insert_users($users);
        $outlet_result = $this->Signup_eoutletsuite_model->insert_outlet(array("user_id" => $users_result, "outlet_id" => "0"));
        $product_color = $this->Signup_eoutletsuite_model->insert_product_color($comp_id);
        $product_unit = $this->Signup_eoutletsuite_model->insert_product_unit($comp_id);
        $sales_discount = $this->Signup_eoutletsuite_model->insert_sales_discount($comp_id);
        $sales_force = $this->Signup_eoutletsuite_model->insert_sales_force($comp_id, $account_id);
        $customer = $this->Signup_eoutletsuite_model->insert_customer($comp_id);
        $email_result = $this->send_email($this->input->post("email", TRUE), $account_id, $randomPass, $fname);

        echo json_encode(array("user_app" => $comp_id, "users" => $outlet_result, "email" => $email_result, 'token' => $this->security->get_csrf_hash()));

    }


    public function send_email($email, $account_id, $password, $first_name){
        $this->load->library("email");
        $status = 0;
        $data = array();

        $data['account_id'] = $account_id;
        $data['password'] = $password;
        $data['first_name'] = $first_name;
        $result = 1;

        $message = $this->load->view("admin/email/email_register", $data, TRUE);

        if ($result > 0){
            $config = array(
                        'protocol' => 'mail',
                        'mail_type' => 'html',
                        'smtp_host' => 'mail.outletko.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'noreply@outletko.com',
                        'smtp_pass' => 'eoutletsuite_noreply',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE

                    );


            $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('noreply@outletko.com', 'eOutletSuite Application')
                        ->to($email)
                        ->subject('eOutletSuite Account Register')
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

}
