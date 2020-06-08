<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_register extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model("signup_model");
    }

    public function page(){
        $this->load->view("store_register");
    }

    public function invoice(){
        $this->load->view("admin/email/email_activate");
    }

    public function verification(){
      $this->load->view("verification");
    }

    public function verify_email($page){
        $this->load->view("admin/email/".$page);
    }

    public function check_email(){
        $email = $this->input->post("email");
        $data['result'] = $this->signup_model->check_email($email);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_account(){
        $info_user = $this->input->post("info_user");
        $info_bill = $this->input->post("info_bill");
        $info_outletko = $this->input->post("info_outletko");
        $info_eouteltsuite = $this->input->post("info_eoutletsuite");

        $year = date("y");
        $user_type= "4";
        $account_id_result = $this->signup_model->account_id();
        $account_id = $account_id_result['account_id'];
        $comp_id = $account_id_result['comp_id'];
        
        $outletko_pass = $this->randomString();
        $eoutletsuite_pass = $this->randomString();

        // $link_name = substr($info_outletko['link_name'], 0, 15);
        $check_linkname = $this->signup_model->check_linkname(substr($info_outletko['link_name'], 0, 15));

        var_dump($check_linkname);

        if ($check_linkname > 0){
            $link_name = substr($info_outletko['link_name'], 0, 8);
            $link_name = $link_name.$account_id;
        }else{
            $link_name = substr($info_outletko['link_name'], 0, 15);
        }


        if ($info_user['plan_type'] == "0"){
            $account_pro = "0";
        }else{
            $account_pro = "1";
        }

        $account=array(
          'account_id'=>$account_id,
          'account_name'=> ucwords(strtolower($info_user['info_business_name'])),
          'account_partner' => $info_user['info_partner'],
          'link_name' => $link_name,
          'account_status' => 0,
          'account_pro' => $account_pro,
          'about_us' => "",
          'business_category'=>$info_user['info_business_category'],
          'user_id'=> "0",
          'first_name'=> strtoupper($info_user['info_fname']),
          'middle_name' => strtoupper($info_user['info_mname']),
          'last_name'=> strtoupper($info_user['info_lname']),
          'user_fb' => $info_user['info_fb'],
          'address'=>$info_user['info_address'],
          'street' => $info_user['info_address'],
          'confirm_email'=>$info_user['info_email'],
          'city'=>$info_user['info_town'],
          'province' => $info_user['info_province'],
          'email'=>$info_user['info_email'],
          'mobile_no'=>$info_user['info_mobile'],
          "phone_code" => $info_user['info_phone_area'],
          "telephone_no" => $info_user['info_phone'],
          'date_insert'=>date("Y-m-d H:i:s")
        );
    

  
        $email_check = $this->signup_model->email_check($account['email']);
        $res = "";
        $send_email = ""; 
        // $email_check = true;

        // if($email_check){
            $res = $this->signup_model->register($account);
            $account2 = array(
                'account_id' => $account_id,
                'comp_id' => $res,
                'first_name' => strtoupper($info_user['info_fname']),
                'middle_name' => strtoupper($info_user['info_mname']),
                'last_name' => strtoupper($info_user['info_lname']),
                'gender' => $info_user['info_gender'],
                'birthday' => date('Y-m-d', strtotime($info_user['info_bday'])),
                'password' => password_hash($outletko_pass, PASSWORD_DEFAULT),
                'user_type' => $user_type,
                'email' => $info_user['info_email'],
                'username' => $info_user['info_email'],
                'account_type' => "0",
                "status" => "0",
                'all_access' => "1",
                "online_register" => "1"
            );

            $res2 = $this->signup_model->register_users($account2);

            if ($info_user['plan_type'] == "1"){
                $renewal_date = date('Y-m-d', strtotime("+30 days"));
            }else if ($info_user['plan_type'] == "2"){
                $renewal_date = date('Y-m-d', strtotime("+90 days"));
            }else if ($info_user['plan_type'] == "3"){
                $renewal_date = date('Y-m-d', strtotime("+180 days"));
            }else if ($info_user['plan_type'] == "4"){
                $renewal_date = date('Y-m-d', strtotime("+395 days"));
            }else{
                $renewal_date = "0000-00-00";
                // $renewal_date = date('Y-m-d', strtotime("+11 days"));
            }

            if ($info_user['plan_outlet_qty'] != "0"){
                $outlet_qty = "3" + $info_user['plan_outlet_qty'];
            }else{
                $outlet_qty = "3";
            }

            $user_app = array(
                "last_name" => strtoupper($info_user['info_lname']),
                'middle_name' => strtoupper($info_user['info_mname']),
                "first_name" => strtoupper($info_user['info_fname']),
                "email" => $info_user['info_email'],
                "mobile_no" => $info_user['info_mobile'],
                "phone_code" => $info_user['info_phone_area'],
                "telephone_no" => $info_user['info_phone'],
                "address" => $info_user['info_address'],
                "city" => $info_user['info_town'],
                "province" => $info_user['info_province'],
                "country" => $info_user['info_country'],
                "account_id" => $account_id,
                "account_name" => strtoupper($info_user['info_business_name']),
                "account_status" => '1',
                "account_type" => '1',
                "account_class" => '1',
                "recruited_by" => $info_user['info_partner'],
                "level_2" => $info_user['info_level_2'],
                "level_3" => $info_user['info_level_3'],
                "business_type" => $info_user['info_business_category'],
                "subscription_type" => $info_user['plan_type'],
                "subscription_date" => date('Y-m-d'),
                "renewal_date" => $renewal_date,
                "outlet_no" => $outlet_qty,
                // "cash_card" => $this->input->post("cash_card", TRUE),
                "vat" => '1',
                "currency" => '121',
                "date_insert" => date('Y-m-d H:i:s')
            );

            $user_app_result = $this->signup_model->insert_account($user_app, $comp_id);
            $randomPass = $this->randomString();

            $users = array(
                "comp_id" => $comp_id,
                "account_id" => $account_id,
                "account_type" => "1",
                "first_name" => strtoupper($info_user['info_fname']),
                'middle_name' => strtoupper($info_user['info_mname']),
                "last_name" => strtoupper($info_user['info_lname']),
                "gender" => $info_user['info_gender'],
                "birthday" => date('Y-m-d', strtotime($info_user['info_bday'])),
                "username" => $account_id,
                "password" => password_hash($eoutletsuite_pass, PASSWORD_DEFAULT),
                "email" => $info_user['info_email'],
                "user_type" => "2",
                "status" => "0",
                "all_access" => "1",
                "status" => "0",
                "online_register" => "1"
            );

            $users_result = $this->signup_model->insert_users($users);
            $outlet_result = $this->signup_model->insert_outlet(array("user_id" => $users_result, "outlet_id" => "0"));
            $product_color = $this->signup_model->insert_product_color($comp_id);
            $product_unit = $this->signup_model->insert_product_unit($comp_id);
            $sales_discount = $this->signup_model->insert_sales_discount($comp_id);
            $customer = $this->signup_model->insert_customer($comp_id);

            $invoice_id = $this->signup_model->insert_invoice();

            $bill_data = array(
                "comp_id" => $comp_id,
                "invoice_type" => "1",
                "invoice_date" => date("Y-m-d"),
                "payment_type" => $info_bill['payment_type'],
                "plan_type" => $info_bill['plan_price'],
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

            $invoice_result = $this->signup_model->update_invoice($bill_data, $invoice_id);

            // $send_email =  $this->send_email($info_user['info_email'],$account_id,$outletko_pass, $eoutletsuite_pass); 
            $send_email = $this->send_confirm_email($info_user['info_email'], $account_id);
            // $send_email = true;

        // }

        if($send_email == true){
            $status = "success";
        }else{
            $status = "failed";
        }

        echo json_encode(array('status' => $status, "email_check" => $email_check, "id" => $res, 'token' => $this->security->get_csrf_hash()));     

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

    public function send_confirm_email($email, $account_id){

        // $email = "dooleycheasel@gmail.com";
        // $account_id = "19440082";

        // $email = "eapurugganan@gmail.com";
        // $account_id = "2012010103";

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
                      ->to($email)
                      ->bcc("verify@outletko.com")
                      ->subject('Please activate your Outletko Account')
                      ->message($message);

          if($this->email->send()) {
            $status = 1;
          }else {
            $status = $this->email->print_debugger();
          }       
        
        // var_dump($email);
        // var_dump($account_id);
        // var_dump($status);

          return $status;


    }

    public function resend_email(){
        $email = "dooleycheasel@gmail.com";
        $account_id = "2012010103";

        $result = $this->send_confirm_email($email, $account_id);
        var_dump($result);
    }

    public function send_email($email, $account_id){
      // $email, $account_id,$outletko_pass,$eoutletsuite_pass

        // $email = "dooleycheasel@gmail.com";
        // $account_id = "19440082";
        // $email = "eapurugganan@gmail.com";
        // $account_id = "2012010103";

        $eoutletsuite_pass = $this->randomString();
        $outletko_pass = $this->randomString();

        $check_send_email = $this->signup_model->check_send_email($account_id);

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

            $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('noreply@outletko.com', 'Outletko')
                        ->to($email)
                        ->bcc("accounts@outletko.com")
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
        
            $data['account_id'] = password_hash($account_id, PASSWORD_DEFAULT);
            $data['email'] = password_hash($email, PASSWORD_DEFAULT);

            if (!empty($result)){
                foreach ($result as $key => $value) {
                    $data['plan'] = $value->plan_name;
                    $data['plan_price'] = number_format($value->price, 2);
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


    function verify(){
        // var_dump($_GET['emailid']);
        // $result = password_verify("19440082", $_GET['emailid']);
        // var_dump($result);

        $result = $this->signup_model->get_hash_value($_GET['emailid']); //get the hash value which belongs t
        // var_dump($result);
        if($result){ 
            if (password_verify($result[0]['email'], $_GET['hash'])) { //check whether the input hash value matches the hash value retrieved from the database
                $verified =  $this->signup_model->verify_user($_GET['emailid']); //update the status of the user as verified

                if($verified){
                    //echo "Your account is verified!";
                    $status = $this->send_email($result[0]['email'], $result[0]['account_id']);
                    if ($status == "1"){
                        $status2 = $this->send_invoice_email($result[0]['email'], $result[0]['account_id'], $result[0]['comp_id']);                    
                        $status3 = $this->send_plan_email($result[0]['email'], $result[0]['account_id'], $result[0]['comp_id']);                    
                        if ($status2 == "1"){
                            // var_dump($result[0]['id']);
                            header('Location:https://www.outletko.com/');
                        }
                    }
                }
                return false;
            }else {
            /*---Now you can redirect the user to whatever page you want---*/
            echo "Failed to Verify";
            }

        }else{
            echo "Email does not match";
        }
    }


}