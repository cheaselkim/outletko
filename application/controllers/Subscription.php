<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("subscription_model");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
    }
 
    public function get_data(){
        $data['data'] = $this->subscription_model->get_data();
        $data['partner'] = $this->subscription_model->get_partner($data['data'][0]->recruited_by);
        $data['plan'] = $this->subscription_model->get_plan($data['data'][0]->subscription_type);
        $data['outlet'] = $this->subscription_model->get_active_outlet();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function update_account(){

        $info_bill = $this->input->post("info_bill");
        $renew_date = $this->input->post("renew_date");
        // $plan_data = $this->Subscription_model->plan_data($info_bill['plan_type']);

        $bill_data = array(
            "comp_id" => $this->session->userdata('comp_id'),
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

        if ($info_bill['plan_type'] == "1"){
            $renewal_date = date("Y-m-d", strtotime("+30 days", strtotime($renew_date)));
        }else if ($info_bill['plan_type'] == "2"){
            $renewal_date = date("Y-m-d", strtotime("+90 days", strtotime($renew_date)));
        }else if ($info_bill['plan_type'] == "3"){
            $renewal_date = date("Y-m-d", strtotime("+180 days", strtotime($renew_date)));
        }else if ($info_bill['plan_type'] == "4"){
            $renewal_date = date("Y-m-d", strtotime("+365 days", strtotime($renew_date)));
        }else{
            $renewal_date = date("Y-m-d", strtotime("+11 days", strtotime($renew_date)));
        }

        $account_app = $this->subscription_model->update_account($outlet_qty, $renewal_date, $info_bill['plan_type']);
        $bill_result = $this->subscription_model->insert_bill($bill_data);
        $send_email = $this->send_invoice_email($info_bill['bill_email']);

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function send_invoice_email($email){

        $email = "dooleycheasel@gmail.com";
        $account_id = "19440082";

        $this->load->library("email");
        $status = 0;
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $data = array();
    
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

          $this->email->initialize($config)
                      ->set_newline("\r\n")
                      ->from('noreply@outletko.com', 'OutletSuite Receipt')
                      ->to($email)
                      ->subject('Outletko Receipt')
                      ->message($message);

          if($this->email->send()) {
            $status = 1;
          }else {
            $status = $this->email->print_debugger();
          }       
        
          return $status;
    }

}