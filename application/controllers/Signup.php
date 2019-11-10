<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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
      $result = $this->signup_model->search_city_prov($city);

      $data['response'] = "false";

      if (!empty($result)){
        $data['response'] = "true";

        foreach ($result as $key => $value) {
          $data['result'][] = array("label" => ($value->city_desc.", ".$value->province_desc), "city_id" => $value->id, "prov_id" => $value->province_id);
        }

      }

      $data['token'] = $this->security->get_csrf_hash();
      echo json_encode($data);
    }

    public function save_data() {
    $status = "failed";
        $info_outletsuite = $this->input->post('info_outletsuite', TRUE);
        $info_outletko = $this->input->post('info_outletko', TRUE);
        $info_outletko['date_insert'] = date("Y-m-d H:i:s");
        $info_outletsuite['date_created'] =  date("Y-m-d H:i:s");
      
        $pass = $info_outletko['password'];
      $email = $info_outletko['email'];
      $uname = $info_outletko['username'];
      
      $year = date("y");
      $user_type= "4";
    $account_id_result = $this->signup_model->account_id();
        $account_id = $year.$user_type.$account_id_result;
    
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);  
    $account=array(
      'account_id'=>$account_id,
      'account_name'=>$info_outletko['account_name'],
      'account_status'=>$info_outletko['account_status'],
      'business_category'=>$info_outletko['business_category'],
      'user_id'=>$info_outletko['user_id'],
      'first_name'=>$info_outletko['first_name'],
      'middle_name'=>$info_outletko['middle_name'],
      'last_name'=>$info_outletko['last_name'],
      'address'=>$info_outletko['address'],
      'confirm_email'=>$info_outletko['confirm_email'],
      'city'=>$info_outletko['city'],
      'email'=>$info_outletko['email'],
      'mobile_no'=>$info_outletko['mobile_no'],
      'date_insert'=>date("Y-m-d H:i:s")
    );
    
    
    
  
    $email_check = $this->signup_model->email_check($account['email']);
    $res = "";
    $send_email = ""; 
    $email_check = true;

    // if($email_check){
        $res = $this->signup_model->register($account);
        $account2=array(
          'account_id'=>$account_id,
          'status'=>$info_outletko['account_status'],
          'comp_id'=>$res,
          'first_name'=>$info_outletko['first_name'],
          'middle_name'=>$info_outletko['middle_name'],
          'last_name'=>$info_outletko['last_name'],
          'password'=>$hashed_password,
          'user_type'=>$user_type,
          'email'=>$info_outletko['email'],
          'username'=>$info_outletko['username'],
          'account_type' => "0",
          'otp' => "0",
          'all_access' => "1"
        );
        $res2 = $this->signup_model->register_users($account2);
      $send_email =  $this->send_email($email,$res,$uname,$pass);
    // }else{
    //   $error = 'Email Already Exist !';
    //   $send_email = false;
      //$this->load->view('register' , $data);
    // }
    
        if($send_email == true){
            $status = "success";
        }else{
            $status = "failed";
        }

        echo json_encode(array('status' => $status, "id" => $res, 'token' => $this->security->get_csrf_hash()));       
    }
    
    public function send_mail($res,$email,$uname,$pass) { 
        

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
        // $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        // var_dump($hashed_email);

        $message = $this->load->view();

        $this->email->initialize($config);
        $this->email->set_mailtype("text");
        $this->email->set_newline("\r\n");
        $this->email->to($email);
        $this->email->from('ellednaj11@gmail.com','Eoutletsuite');
        $this->email->subject('Email Verification');
        $this->email->message ("
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
        if($this->email->send()) {
                return true;
                $this->session->set_flashdata("email_sent","Email sent successfully."); 
              $this->load->view('message');}
        else {
                return false;
                $this->session->set_flashdata("email_sent","Error in sending Email."); 
        }
        
    }
    
    public function send_email($email, $account_id,$uname,$pass){
    $this->load->library("email");
    $status = 0;
    $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = "";
    
        $data['account_id'] = $account_id;
        $data['uname'] = $uname;
        $data['password'] = $pass;
        $data['email'] = $hashed_email;

        $message = $this->load->view("admin/email/email_activate", $data, TRUE);

          $config = array(
                      'protocol' => 'mail',
                      'mail_type' => 'html',
                      'smtp_host' => 'secure203.servconfig.com',
                      'smtp_port' => 465,
                      'smtp_user' => 'epgmcompany@eoutletsuite.com',
                      'smtp_pass' => 'epgmcompany101',
                      'charset' => 'iso-8859-1',
                      'wordwrap' => TRUE

                  );


          $this->email->initialize($config)
                      ->set_newline("\r\n")
                      ->from('noreply@epgmcompany.com', 'Outletko Business Application')
                      ->to($email)
                      ->subject('Outletko Account Verification')
                      ->message($message);

          if($this->email->send()) {
            $status = 1;
          }else {
            $status = $this->email->print_debugger();
          }       
      return $status;
  }
  
  public function resend_emal(){
    $email = $this->input->post("email");
    $username = $this->input->post("username");
    $password = $this->input->post("password");
    $account_id = $this->input->post("account_id");

    var_dump($email);

    // $result = $this->send_email($email,$account_id,$username,$password);

    echo json_encode(array("status" => $result, "token" => $this->security->get_csrf_hash()));
  }
    
    function verify(){
         $result = $this->signup_model->get_hash_value($_GET['id']); //get the hash value which belongs t
         if($result){ 
            if (password_verify($result[0]['email'], $_GET['hash'])) { //check whether the input hash value matches the hash value retrieved from the database
            $verified =  $this->signup_model->verify_user($_GET['id']); //update the status of the user as verified

               if($verified){
                //echo "Your account is verified!";
                header('Location:http://www.eoutletsuite.com/');
                
               }else {
                /*---Now you can redirect the user to whatever page you want---*/
                  
                   echo "Failed to Verify";
              }
         
          }
        }else{
          echo "Email does not match";
         }
    }


    /* Outletko Buyer */

    public function insert_user(){

      $account_buyer = array(
        "first_name" => $this->input->post("fname"),
        "last_name" => $this->input->post("lname"),
        "email" => $this->input->post("email"),
        "verify_code" => mt_rand(100000, 999999),
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
        "all_access" => "0",
        "status" => "1",
        "otp" => "0"
      );

      $result2 = $this->signup_model->register_users($user_data);

      $this->send_email_buyer($account_buyer['verify_code'], $account_buyer['email']);

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

          $config = array(
                      'protocol' => 'smtp',
                      'mail_type' => 'html',
                      'smtp_host' => 'ssl://smtp.gmail.com',
                      'smtp_port' => '465',
                      'smtp_user' => 'epgmcompany@gmail.com',
                      'smtp_pass' => 'epgmcompany101',
                      'charset' => 'iso-8859-1',
                      'wordwrap' => TRUE
                  );



      $this->email->initialize($config)
                  ->set_newline("\r\n")
                  ->from('noreply@zugriff.com', 'Outletko User Verification')
                  ->to($email)
                  ->subject('Outletko User Verification')
                  ->message($message);

          if($this->email->send()) {
            $status = 1;
          }else {
            $status = $this->email->print_debugger();
          }       
      return $status;
  }

  public function confirm_account(){

    $verify_code = $this->input->post("verify_code");
    $id = $this->input->post("id");

    $result = $this->signup_model->confirm_account($verify_code, $id);

    if ($result > 0){
      $result2 = $this->signup_model->get_account($id);
      $user_array = array();

        foreach ($result2 as $key => $value) {
          $user_array = array(
              "user_id" => $value->id,
              "account_id" => $value->account_id,
              "comp_id" => $value->comp_id,
              "user_uname" => $value->username,
              "user_fullname" => ($value->first_name." ".$value->last_name),
              "user_status" => $value->status,
              "user_type" => $value->user_type,
              "all_access" => $value->all_access,
              "login" => 1,
              "validated" => true
          );
        }

      $this->session->set_userdata($user_array);

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
    echo json_encode($data);
  }

}


