<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_subscription extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model("subscription_model");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
    }

    public function upgrade(){
        $this->load->view("ecommerce/subscription/upgrade");
    }

    public function renew(){
        $this->load->view("ecommerce/subscription/renew");
    }

    public function plan(){
        $data['result'] = $this->subscription_model->plan();
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

    public function get_data(){
        $data['result'] = $this->subscription_model->get_data();

        foreach ($data['result'] as $key => $value) {
            $this->session->set_userdata("comp_id2", $value->id);
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function update_account(){

        $info_bill = $this->input->post("info_bill");
        $renew_date = $this->input->post("renew_date");
        // $plan_data = $this->Subscription_model->plan_data($info_bill['plan_type']);

        $bill_data = array(
            "comp_id" => $this->session->userdata('comp_id2'),
            "invoice_type" => "2",
            "invoice_date" => date("Y-m-d"),
            "payment_type" => $info_bill['payment_type'],
            "plan_type" => $info_bill['plan_type'],
            "outlet" => $info_bill['plan_outlet_qty'],
            "plan_price" => $info_bill['plan_price'],
            "plan_outlet_price" => $info_bill['plan_outlet_price'],
            "total_price" => $info_bill['plan_total_amount'],
            "total_vat" => $info_bill['plan_total_vat'],
            "total_amount" => $info_bill['plan_total_amount'],
            "first_name" => $info_bill['bill_fname'],
            "last_name" => $info_bill['bill_lname'],
            "company" => $info_bill['bill_company'],
            "address" => $info_bill['bill_address'],
            "city" => $info_bill['bill_town'],
            "province" => $info_bill['bill_province'],
            "zip_code" => $info_bill['bill_zipcode'],
            "country" => $info_bill['bill_country'],
            "email" => $info_bill['bill_email'],
            "mobile_no" => $info_bill['bill_mobile'],
            "phone_code" => $info_bill['bill_phone_code'],
            "phone" => $info_bill['bill_phone'],
            "date_insert" => date("Y-m-d H:i:s")
        );

        if ($info_bill['plan_outlet_qty'] != "0"){
            $outlet_qty = "3" + $info_bill['plan_outlet_qty'];
        }else{
            $outlet_qty = "3";
        }

        if ($renew_date == "0000-00-00" || $renew_date == "FREE"){
            $renew_date = date("Y-m-d");
        }else{
            $renew_date = date("Y-m-d", strtotime($renew_date));
        }

        $plan_result = $this->subscription_model->get_plan_type($info_bill['plan_type']);
        $plan_days = 0;

        // var_dump($plan_result); 

        if (!empty($plan_result)){
            foreach ($plan_result as $key => $value) {
                $plan_days = $value->plan_days;
            }
        }

        if ($info_bill['plan_type'] != "0"){
            $renewal_date = date("Y-m-d", strtotime("+".$plan_days." days", strtotime($renew_date)));
        }else{
            $renewal_date = "0000-00-00";
            // $renewal_date = date('Y-m-d', strtotime("+11 days"));
        }

        $user_data = $this->subscription_model->get_data();

        // var_dump($info_bill['plan_type']);
        // var_dump($renew_date);
        // var_dump($renewal_date);
        // var_dump(date($renew_date, strtotime("+365 days")));
        $account_status = "";
        if (!empty($user_data)){
            foreach ($user_data as $key => $value) {
                
                if ($value->subscription_type <= 4){
                    if ($info_bill['plan_type'] > 4){
                        $send_user_email = $this->send_eoutletsuite_email($value->email, $value->account_id, $info_bill['plan_type']);
                        $account_status = 1;
                    }
                }

                if ($value->subscription_type > 4){
                    if ($info_bill['plan_type'] <= 4){
                        $account_status = 0;
                    }
                }

            }
        }


        $account_app = $this->subscription_model->update_account($outlet_qty, $renewal_date, $info_bill['plan_type'], $account_status);
        $account_pro = $this->subscription_model->update_account_pro();
        $bill_result = $this->subscription_model->insert_bill($bill_data);
        $send_email = $this->send_invoice_email($info_bill['bill_email']);



        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function send_invoice_email($email){

        // $email = "dooleycheasel@gmail.com";
        // $account_id = "19440082";

        $account_id = $this->session->userdata("account_id");

        $this->load->library("email");
        $status = 0;
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = array();

        $result = $this->subscription_model->get_data();

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

        $data['account_id'] = password_hash($account_id, PASSWORD_DEFAULT);
        $data['email'] = password_hash($email, PASSWORD_DEFAULT);

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
                    // ->from('noreply@outletko.com', 'OutletSuite Receipt')
                    ->from('noreply@outletko.com', 'OutletSuite Acknowledgement')
                    ->to($email)
                    ->subject('Outletko Acknowledgement')
                    ->message($message);

        if($this->email->send()) {
            $status = 1;
        }else {
            $status = $this->email->print_debugger();
        }       
    
        return $status;
    }

    public function send_eoutletsuite_email($email, $account_id, $plan){
        // $email, $account_id,$outletko_pass,$eoutletsuite_pass
  
        // $email = "dooleycheasel@gmail.com";
        // $account_id = "19440082";
        // $email = "eapurugganan@gmail.com";
        // $account_id = "2012010103";

        // var_dump($plan);

        $eoutletsuite_pass = $this->randomString();
        $outletko_pass = $this->randomString();
        $message = "";

  
  
            $this->subscription_model->update_user_password($eoutletsuite_pass, $outletko_pass, $account_id);
  
            $this->load->library("email");
            $status = 0;
            $hashed_email = password_hash($email, PASSWORD_DEFAULT);
            $data = array();
        
            $data['account_id'] = $account_id;
            $data['eoutletsuite_pass'] = $eoutletsuite_pass;
            $data['outletko_pass'] = $outletko_pass;
            $data['email'] = $email;

            $message = $this->load->view("admin/email/email_eoutletsuite", $data, TRUE);                
  
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

        // var_dump($message);
        return $status;
    }

}