<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_prev extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("sales_model");
	      	$this->load->helper("table_sales");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}


	public function save_transaction() {
		//$this->load->model("sales_model");
        $sales_hdr = $this->input->post('sales_hdr', TRUE);
        $sales_dtl = $this->input->post('sales_dtl', TRUE);
        $payment_dtl = $this->input->post('payment_dtl', TRUE);
    
        $sales_hdr['date_prev'] = date("Y-m-d", strtotime($sales_hdr['date_prev']));
        $sales_hdr['comp_id'] = $this->session->userdata("comp_id");
        $sales_hdr['outlet_id'] = $this->session->userdata("outlet_id");
        $sales_hdr['user'] = $this->session->userdata("user_id");
        $sales_hdr['trans_date'] = date("Y-m-d", strtotime($sales_hdr['date_prev']));
        $sales_hdr['date_insert'] = date("Y-m-d H:i:s");        
        $this->db->trans_begin();
        $hdr_id = $this->sales_model->save_transaction_hdr($sales_hdr);
        $this->sales_model->save_transaction_dtl($sales_dtl,$hdr_id);
        $this->sales_model->update_product_cost($sales_dtl);

        $data = array(
                    'sales_hdr_id'   => $hdr_id,
                    'payment_date'   => date("Y-m-d", strtotime($payment_dtl['payment_date'])),
                    'payment_type_id'=> $payment_dtl['payment_type_id'],
                    'payment_term'=> $payment_dtl['payment_term'],
                    'bank_id'        => $payment_dtl['bank_id'],
                    'check_card_no'  => $payment_dtl['check_card_no'],
                    'check_date'     => date("Y-m-d", strtotime($payment_dtl['check_date'])),
                    'curr_id'  		 => $payment_dtl['curr_id'],
                    'depository_bank'  		 => $payment_dtl['dep_bank'],
                    'no_days'  		 => $payment_dtl['no_days'],
                    'due_date'     => date("Y-m-d", strtotime($payment_dtl['due_date'])),
                    'amount'         => $payment_dtl['amount']
                );
        $query = $this->sales_model->save_payment_dtl($data);
        //$query = $this->sales_model->save_transaction($sales_hdr,$sales_dtl,$payment_dtl);
        if($this->db->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db->trans_rollback(); 
            $status = "failed ".$db_error;
        }else{  
            $this->db->trans_commit();
            $status = "success";
        } 
        // $this->output->set_content_type('application/json');
        // $this->output->set_output(json_encode(array('status' => $status)));
        $this->activity_model->insert_activity("1", "0", "1");
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function prev_trans_list(){
        $fdate = $this->input->post("fdate");
        $tdate = $this->input->post("tdate");
        $status = $this->input->post("status");

        $result = $this->sales_model->prev_trans_list($fdate, $tdate, $status);
        $data['data'] = end_day_query($result, $this->session->userdata("account_id"));
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }


    public function end_day_payment_transaction(){
        $data = array();
        $trans_date = $this->input->post("trans_date", TRUE);
        $user_id = $this->input->post("user_id", TRUE);
        $outlet_id = $this->input->post("outlet_id", TRUE);
        $result = $this->sales_model->prev_end_day($trans_date, $user_id, $outlet_id);

        foreach ($result as $key => $value) {
            $data['cash_payment'] = $value->cash_payment;
            $data['card_payment'] = $value->card_payment;
            $data['check_payment'] = $value->check_payment;
            $data['pdc_payment'] = $value->pdc_payment;
            $data['online_payment'] = $value->online_payment;
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);

    }

    public function process_end_day(){
        $trans_date = $this->input->post("trans_date", TRUE);
        $user_id = $this->input->post("user_id", TRUE);
        $outlet_id = $this->input->post("outlet_id", TRUE);
        $status = $this->input->post("status", TRUE);
        $this->activity_model->insert_activity("1", "0", "6");
        $data['result'] = $this->sales_model->process_prev_end_day($trans_date, $user_id, $outlet_id, $status);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

}