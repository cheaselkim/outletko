<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("sales_model");
	      	$this->load->helper("table_sales");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function open_transaction(){
		$data['result'] = $this->sales_model->open_transaction();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function closed_transaction(){
		$data['result'] = $this->sales_model->closed_transaction();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function max_transno(){
		$data['data'] = $this->sales_model->max_transno();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function currency(){
		$data['data'] = $this->sales_model->currency();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function payment_type(){
		$data['data'] = $this->sales_model->payment_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function payment_term(){
		$data['data'] = $this->sales_model->payment_term();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function bank_list(){
		$data['data'] = $this->sales_model->bank_list();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function comp_bank(){
		$data['data'] = $this->sales_model->comp_bank();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}
		
	public function outlet(){
		$data['data'] = $this->sales_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function discount(){
		$data['data'] = $this->sales_model->discount();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function customer(){
	    $cust_code = $this->input->post("cust_code", TRUE);
	    $data['result'] = $this->sales_model->customer($cust_code);
		$data['token'] = $this->security->get_csrf_hash();
	    echo json_encode($data);
	}
	
	public function item_type(){
		$data['result'] = $this->sales_model->item_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function item_category(){
		$data['result'] = $this->sales_model->item_category();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function item_class(){
		$category = $this->input->post("item_category");
		$data['result'] = $this->sales_model->item_class($category);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function item_brand(){
		$data['result'] = $this->sales_model->item_brand();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function item_color(){
		$data['result'] = $this->sales_model->item_color();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function item_size(){
		$data['result'] = $this->sales_model->item_size();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function agent(){
		$data = array();
		$id = $this->input->post("id", TRUE);
		$result = $this->sales_model->agent($id);
		$data['id'] = $result->id;
		$data['share'] = $result->share;
		$data['name'] = $result->name;
		$data['account'] = $result->account_id;
		$data['token'] = $this->security->get_csrf_hash();
 		echo json_encode($data);
	}

	public function search_customer($type){
		$customer = $this->input->post("customer", TRUE);
		$data = array();
		$data['response'] = "false";

		if ($type == "1"){
			$result = $this->sales_model->search_custcode($customer);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->cust_code, "cust_name" => $value->cust_name, "cust_id" => $value->id);
				}
			}
		}else{
			$result = $this->sales_model->search_custname($customer);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->cust_name, "cust_code" => $value->cust_code, "cust_id" => $value->id);
				}
			}
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

	//new

	public function search_partner(){
		$partner = $this->input->post("partner", TRUE);
		$data = array();
		$data['response'] = "false";
			$result = $this->sales_model->search_partner($partner);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->name, "share" => $value->share,"id" => $value->id, "account" => $value->account_id);
				}
			}
		

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}
	
	public function search_field($type) {
        $term = $this->input->post("term", TRUE);
		$data = array();
		$data['response'] = "false";

			if ($type == "1"){
				$result = $this->sales_model->search_field($term);
				if (!empty($result)){
					$data['response'] = "true";
					foreach ($result as $key => $value) {
						$data['result'][] = array(
							"label" => $value->product_name, 
							"no" => $value->product_no, 
							"type" => $value->type_id,
							"category" => $value->category_id,
							"class" => $value->class_id,
							"brand" => $value->brand_id,
							"color" => $value->color_id,
							"size" => $value->size_id,
							"model" => $value->model_id
						);
					}
				}
			}else if ($type == "2"){
				$result = $this->sales_model->search_item_name($term);
				if (!empty($result)){
					$data['response'] = "true";
					foreach ($result as $key => $value) {
						$data['result'][] = array(
							"label" => $value->product_no, 
							"name" => $value->product_name, 
							"type" => $value->type_id,
							"category" => $value->category_id,
							"class" => $value->class_id,
							"brand" => $value->brand_id,
							"color" => $value->color_id,
							"size" => $value->size_id,
							"model" => $value->model_id
						);
					}
				}

			}else if ($type == "3"){
				$result = $this->sales_model->search_item_model($term);
				if (!empty($result)){
					$data['response'] = "true";
					foreach ($result as $key => $value) {
						$data['result'][] = array(
							"label" => $value->model_id, 
							"no" => $value->product_no, 
							"name" => $value->product_name, 
							"type" => $value->type_id,
							"category" => $value->category_id,
							"class" => $value->class_id,
							"brand" => $value->brand_id,
							"color" => $value->color_id,
							"size" => $value->size_id,
							"model" => $value->model_id
						);
					}
				}				
			}


		

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
    }
    
    public function search_trans() {
        $result = $this->sales_model->search_trans();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($list);
    }

	public function search_partner_id(){
		$id = $this->input->post("id", TRUE);
		$data = array();
		$data['response'] = "false";
		$data['result'] = $this->sales_model->search_partner_id($id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}

	public function search_item(){
		$item_no = $this->input->post("item_no", TRUE);
		$item_name = $this->input->post("item_name", TRUE);
		$item_type = $this->input->post("item_type", TRUE);
		$item_category = $this->input->post("item_category", TRUE);
		$item_class = $this->input->post("item_class", TRUE);
		$item_brand = $this->input->post("item_brand", TRUE);
		$item_color = $this->input->post("item_color", TRUE);
		$item_size = $this->input->post("item_size", TRUE);
		$item_model = $this->input->post("item_model", TRUE);

		$item_array = json_decode($this->input->post("item_array"), TRUE);
		$result = "";

		$result = $this->sales_model->search_item($item_no, $item_name, $item_type, $item_category, $item_class, $item_brand, $item_color, $item_size, $item_model);
		$result2 = $this->sales_model->sales_qty_groupby_prod();

		$data['result'] = table_item($result,$item_array, $result2);

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function select_item(){
		$prod_id = $this->input->post("id", TRUE);
		$data = array();
		$result = $this->sales_model->select_item($prod_id);
		$result2 = $this->sales_model->sales_qty($prod_id);
		$result3 = $this->sales_model->inv_qty($prod_id);

		foreach ($result as $key => $value) {
			$data['prod_name'] = $value->product_name;
			$data['prod_no'] = $value->product_no;
			$data['image_loc'] = $value->image_loc;
			$data['price'] = $value->reg_selling_price;
			$data['qty'] = ($result3 - $result2);
			$data['discount'] = $value->discount;
			$data['vat'] = $value->vat;
			$data['uom'] = $value->unit_code;			
			$data['type'] = $value->type_id;
			$data['stock'] = $value->for_stock;
			$data['picture'] = unserialize($value->image_loc);
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function sales_query(){
		/* function for query and cancelled */
		$trans = 0;
		$total_amount = 0;
		$sales_discount = 0;
		$grand_total = 0;

		$trans_date = $this->input->post("trans_date");
		$status = $this->input->post("status");
		$outlet = $this->input->post("outlet");
		$keyword = $this->input->post("keyword");
		$type = $this->input->post("type");

		if ($type == "3"){
			$status = $this->input->post("status");			
		}else{
			$status = "1";
		}

		$result = $this->sales_model->sales_query($keyword, $status, $trans_date, $outlet);
		// var_dump($result);
		$table_query = table_query($result, $type);

		foreach ($result as $key => $value) {
			$total_amount += $value->total_amount;
			$sales_discount += $value->sales_discount;
			$grand_total += $value->total_amount;
			$trans++;
		}


			$total_amount = $total_amount - $sales_discount;



		echo json_encode(array("table" => $table_query, "trans" => $trans, "total_amount" => $total_amount, "sales_discount" => $sales_discount, "grand_total" => $grand_total, 'token' => $this->security->get_csrf_hash()));
	}



	public function save_transaction() {
		//$this->load->model("sales_model");
        $sales_hdr = $this->input->post('sales_hdr', TRUE);
        $sales_dtl = $this->input->post('sales_dtl', TRUE);
        $payment_dtl = $this->input->post('payment_dtl', TRUE);
    
        $sales_hdr['comp_id'] = $this->session->userdata("comp_id");
        $sales_hdr['outlet_id'] = $this->session->userdata("outlet_id");
        $sales_hdr['user'] = $this->session->userdata("user_id");
		$sales_hdr['trans_date'] = date("Y-m-d");
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

    public function edit_transaction() {
		//$this->load->model("sales_model");
		$hdr_id = $this->input->post('hdr_id', TRUE);
        $sales_hdr = $this->input->post('sales_hdr', TRUE);
        $sales_dtl = $this->input->post('sales_dtl', TRUE);
        $payment_dtl = $this->input->post('payment_dtl', TRUE);
        $this->db->trans_begin();
        $this->sales_model->edit_transaction_hdr($sales_hdr,$hdr_id);
        $this->sales_model->edit_transaction_dtl($sales_dtl,$hdr_id);
        $data = array(
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
        $query = $this->sales_model->edit_payment_dtl($data,$hdr_id);
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
        $this->activity_model->insert_activity("1", "0", "2");
        // $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function get_sale_transaction(){
    	$id = $this->input->post('id', TRUE);
    	$hdr_data = array();
    	$dtl_data = array();
    	$payment_data = array();
    	$result = $this->sales_model->get_transaction_hdr($id);
		$result2 = $this->sales_model->get_transaction_payment($id);

		$result3 = $this->sales_model->get_transaction_dtl($id);
		foreach ($result3->result() as $row) { 
			$dtl_data[] = array(
					'product_no' => $row->product_no,
					'product_id' => $row->product_id,
					'qty' => $row->qty,
					'selling_price' => $row->selling_price,
					'total_price' => $row->total_price,
					'volume_discount' => $row->volume_discount,
					'total_selling_price' => $row->total_selling_price,
					'share' => $row->share,
					'share_amount' => $row->share_amount,
					'total_amount' => $row->total_amount,
					'reg_selling_price' => $row->reg_selling_price,
					'product_name' => $row->product_name,
					'volume_discount_per' => $row->volume_discount_per,
					'vat' => $row->sale_vat,
					'net_vat' => $row->net_vat,
					'unit_desc' => $row->unit_code,
					'agent_id' => $row->agent_id,
					'discount_id' => $row->discount_id
				); 
		}

		echo json_encode(array('trans_hdr' => $result,'trans_dtl' => $dtl_data,'trans_payment' => $result2, 'token' => $this->security->get_csrf_hash()));
    }

    public function cancel_trans(){
    	$id = $this->input->post("id", TRUE);
    	$data['result'] = $this->sales_model->cancel_trans($id);
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("1", "0", "5");
    	echo json_encode($data);
    }

    public function select_id(){
    	$data = array();
    	$id = $this->input->post("id", TRUE);
    	$result = $this->sales_model->get_transaction_dtl($id);
    	$data['header'] = $this->sales_model->get_transaction_hdr($id);
    	$data['detail'] = sales_dtl_query($result->result());
		$data['token'] = $this->security->get_csrf_hash();
    	echo json_encode($data);
    }
    
	public function end_day_query(){
		$fdate = $this->input->post("fdate", TRUE);
		$tdate = $this->input->post("tdate", TRUE);
		$status = $this->input->post("status", TRUE);

		$result = $this->sales_model->end_day_query($fdate, $tdate, $status);
		$data['result'] = end_day_query($result, $this->session->userdata("account_id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}    

	public function end_day_payment_transaction(){
		$data = array();
		$trans_date = $this->input->post("trans_date", TRUE);
		$user_id = $this->input->post("user_id", TRUE);
		$outlet_id = $this->input->post("outlet_id", TRUE);
		$result = $this->sales_model->end_day_payment_transaction($trans_date, $user_id, $outlet_id);

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
		$data['result'] = $this->sales_model->process_end_day($trans_date, $user_id, $outlet_id, $status);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

}
