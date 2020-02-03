<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_receive extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("inventory_receive_model");
	      	$this->load->helper("inventory_receive");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function session_outlet(){
		$data['data'] = $this->session->userdata("outlet_code");
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function trans_type(){
		$data['data'] = $this->inventory_receive_model->trans_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function currency(){
		$data['data'] = $this->inventory_receive_model->currency();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function account_currency(){
		$data['data'] = $this->inventory_receive_model->account_currency();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function max_transno(){
		$trans_type = $this->input->post("trans_type");
		$data['data'] = $this->inventory_receive_model->max_transno($trans_type);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function search_outlet($type){
		$keyword = $this->input->post("keyword");
		$trans_type = $this->input->post("trans_type");
		$data = array();
		$data['response'] = "false";

		if ($trans_type == "1"){
			$result = $this->inventory_receive_model->search_customer($type, $keyword);
		}else if ($trans_type == "2"){
			$result = $this->inventory_receive_model->search_outlet($type, $keyword);
		}else if ($trans_type == "3" || $trans_type == "4"){
			$result = $this->inventory_receive_model->search_supplier($type, $keyword);
		}

			if (!empty($result)){
					$data['response'] = "true";

					if ($type == "1"){
						foreach ($result as $key => $value) {
							$data['result'][] = array("label" => $value->CODE, "outlet_name" => $value->NAME, "type1" => $value->TYPE , "id" => $value->ID);
						}						
					}else{
				        foreach ($result as $key => $value) {
				         	$data['result'][] = array("label" => $value->NAME, "outlet_code" => $value->CODE, "type1" => $value->TYPE, "id" => $value->ID);
				        }						
					}
			}


		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function search_field() {
        $result = $this->inventory_receive_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }

	public function search_item($type){
		$prod = $this->input->post("prod", TRUE);
		$data = array();
		$data['response'] = "false";

		if ($type == "1"){
			$result = $this->inventory_receive_model->search_item_code($prod);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->product_no, 
											"prod_id" => $value->prod_id,
 											"prod_name" => $value->product_name,
											"prod_specs" => $value->product_specs,
											"prod_type" => $value->prod_type_desc,
											"brand" => $value->brand_desc,
											"model" => $value->model_desc,
											"color" => $value->color_desc,
											"class" => $value->class_desc,
											"category" => $value->category_desc,
											"size" => $value->size_desc,
											"unit" => $value->stock_unit_id,
											"prod_unit" => $value->unit_code,
											"unit_price" => $value->reg_selling_price,
											"image" => unserialize($value->image_loc));
				}
			}
		}else{
			$result = $this->inventory_receive_model->search_item_name($prod);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->product_name, 
											"prod_id" => $value->prod_id,
											"prod_no" => $value->product_no,
											"prod_specs" => $value->product_specs,
											"prod_type" => $value->prod_type_desc,
											"brand" => $value->brand_desc,
											"model" => $value->model_desc,
											"color" => $value->color_desc,
											"class" => $value->class_desc,
											"category" => $value->category_desc,
											"size" => $value->size_desc,
											"unit" => $value->stock_unit_id,
											"prod_unit" => $value->unit_code,
											"unit_price" => $value->reg_selling_price,
											"image" => unserialize($value->image_loc));
				}
			}
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function product_transfer(){
		$result = $this->inventory_receive_model->product_transfer();
		$data['result'] = product_transfer($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function sales_register(){
		$trans_date = $this->input->post("trans_date", TRUE);
		$trans_no = $this->input->post("trans_noo", TRUE);
		$cust_id = $this->input->post("cust_id", TRUE);
		$agent_id = $this->input->post("agent_id", TRUE);
		$arr_id = $this->input->post("arr_id", TRUE) == '' ? array(0) : $this->input->post("arr_id", TRUE);
		$result = $this->inventory_receive_model->sales_register($trans_date, $trans_no, $cust_id, $agent_id, $arr_id);
		$data['result'] = sales_register($result, $this->session->userdata("outlet_code"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function sales_register_products(){
		$result3 = array();
		$id = $this->input->post("id", TRUE);
		$arr_id = $this->input->post("arr_id", TRUE) == '' ? array(0) : $this->input->post("arr_id", TRUE);
		$result = $this->inventory_receive_model->sales_register_products($id, $arr_id);

		foreach ($result as $key => $row) {
			$result2 = $this->inventory_receive_model->get_sales_return_dtl($row->id);

			if (!empty($result2)){
				foreach ($result2 as $key => $value) {
					$result3[] = array(
						"prod_id" => $value->prod_id,
						"return_qty" => $value->return_qty
					);
				}				
			}

		}

		$data['result'] = sales_register_products($result, $result3);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function inv_no_wo_id(){
		$receive_no = $this->input->post("receive_no", TRUE);
		$data['result'] = $this->inventory_receive_model->inv_no_wo_id($receive_no);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function inv_no_w_id(){
		$receive_no = $this->input->post("receive_no", TRUE);
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->inventory_receive_model->inv_no_w_id($receive_no, $id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function select_inventory_receive(){
		$receive_no = $this->input->post("receive_no", TRUE);
		$data['result'] = $this->inventory_receive_model->select_inventory_receive($receive_no);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($result);
	}

	public function get_product_transfer(){
		$id = "";
		$data = array();
		$trans_no = $this->input->post("trans_no", TRUE);
		$data['hdr'] = $this->inventory_receive_model->get_product_transfer_hdr($trans_no);

		if (!empty($data['hdr'])){
			$id = $data['hdr'][0]->id;
		}
			$data['dtl'] = $this->inventory_receive_model->get_product_transfer_dtl($id);

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function receive_list(){
    	$term = $this->input->post('term', TRUE);
    	$type = $this->input->post('type', TRUE);
    	$outlet = $this->input->post('outlet', TRUE);
    	$rec_date = $this->input->post('rec_date', TRUE);
    	$function = $this->input->post("app_func", TRUE);
    	$status = $this->input->post("status", TRUE);
		$result = $this->inventory_receive_model->receive_list($term,$type,$outlet,$rec_date, $status);	
		$data['result'] = table_receive($result,$function, $this->session->userdata('outlet_code'));
		$data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("3", "1", "3");
		echo json_encode($data);
	}

	public function save_data() {
		$status = "failed";
		$receive_no = $this->input->post("receive_no", TRUE);
        $receive_hdr = $this->input->post('receive_hdr', TRUE);
        $receive_dtl = $this->input->post('receive_dtl', TRUE);
        $inv_trans_type = $this->input->post("trans_type", TRUE);
        $ref_id = $this->input->post("ref_id");
        $receive_hdr['comp_id'] = $this->session->userdata('comp_id');
        $receive_hdr['outlet_id'] =  $this->session->userdata('outlet_id');
        $receive_hdr['created_by'] =  $this->session->userdata('user_id');
        $receive_hdr['date_insert'] = date("Y-m-d H:i:s");
        $result_receive = $this->inventory_receive_model->inv_no_wo_id($receive_no);

        if (empty($result_receive)){
	        $hdr_id = $this->inventory_receive_model->save_hdr($receive_hdr);
	        $query = $this->inventory_receive_model->save_dtl($receive_dtl,$hdr_id);

	        $cost = "";

	        if ($receive_hdr['tran_type'] == "3"){
	        	for ($i=0; $i < COUNT($receive_dtl); $i++) { 
	        		$prod_id = $receive_dtl[$i]['prod_id'];
	        		$prod_cost = $receive_dtl[$i]['cost'];
	        		$prod_qty = $receive_dtl[$i]['qty'];

	        		$inv_qty = $this->inventory_receive_model->inv_qty($prod_id); //0
	        		$sales_qty = $this->inventory_receive_model->sales_qty($prod_id); //0
	        		$ave_cost = $this->inventory_receive_model->ave_cost($prod_id); //0


	        		$inv_total_qty = $inv_qty - $sales_qty; //0

	        		if ($ave_cost == "0" || $ave_cost == ""){
	        			$cost = $receive_dtl[$i]['cost']; //1000
	        		}else{
	        			$cost = $ave_cost;
	        		}

	        		$inv_total_cost = $inv_total_qty * $cost; //0
	        		$prod_total_cost = $prod_qty * $prod_cost; //100 * 1000 = 100,000
	        		
	        		$total_qty = $inv_total_qty + $prod_qty; // 0 + 100
	        		$total_cost = $inv_total_cost + $prod_total_cost; // 0 + 100,000

	        		$ave_cost = $total_cost/$total_qty; // 100,000 / 100 


	        		$update_ave_cost = $this->inventory_receive_model->update_ave_cost($prod_id, $ave_cost);

	        	}
	        }


        }

        if ($inv_trans_type == "2"){
        	$update_issuance = $this->inventory_receive_model->update_issuance_status($ref_id, "2");
        }

        if($query == true){
            $status = "success";
			$this->activity_model->insert_activity("3", "1", "1");        	
        }else{
            $status = "failed";
        }

        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function update_data() {
		$hdr_id = $this->input->post('hdr_id', TRUE);
        $receive_hdr = $this->input->post('receive_hdr', TRUE);
        $receive_dtl = $this->input->post('receive_dtl', TRUE);

        $result = $this->inventory_receive_model->edit_receive_hdr($receive_hdr,$hdr_id);
        $query = $this->inventory_receive_model->edit_receive_dtl($receive_dtl,$hdr_id);
        $this->activity_model->insert_activity("3", "1", "2");
        $query = true;
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        // $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function get_receive(){
    	$id = $this->input->post('id', TRUE);
    	$type = $this->input->post('type', TRUE);
    	$hdr_data = array();
    	$dtl_data = array();
    	$hdr_id = "";
    	$result = "";
    	$vat_desc = "";
    	$transfer_qty = "";
    	$result = $this->inventory_receive_model->get_receive_hdr($id,$type);
		$result2 = $this->inventory_receive_model->get_receive_dtl($id);
		$result3 = $this->inventory_receive_model->get_transfer_dtl($result[0]->ref_trans_id);

		foreach ($result2->result() as $row) { 
			$transfer_qty = "";
			if ($row->vat == "1"){
				$vat_desc = "Yes";
			}else{
				$vat_desc = "No";
			}

			foreach ($result3 as $key => $value) {
				if ($value->prod_id == $row->prod_id){
					$transfer_qty = $value->transfer_qty;
				}
			}

			$dtl_data[] = array(
					'dtl_id' => $row->dtl_id,
					'product_id' => $row->prod_id,
					'product_no' => $row->product_no,
					'product_name' => $row->product_name,
					'qty' => $row->qty,
					'transfer_qty' => $transfer_qty,
					'unit' => $row->unit_code,
					'cost' => $row->cost,
					'vat_id' => $row->vat,
					'vat' => $vat_desc,
					'total_price' => ($row->qty * $row->cost),
					'net_vat' => $row->net_vat,
					'w_vat' => $row->w_vat,
					'w_o_vat' => $row->w_o_vat,
					'cost_w_vat' => $row->cost_w_vat,
					'cost_w_o_vat' => $row->cost_w_o_vat,
					'currency' => $row->curr_code,
					'curr_id' => $row->curr_id,
					'prod_grade' => $row->prod_grade,
					'return_date' => $row->return_date,
					'reason' => $row->reason,
					'sales_reference' => $row->sales_reference,
					'reference' => ($row->sales_reference == "0" ? "" : $row->reference)
			); 
		}

		$trans_dtl = inventory_dtl($result2->result());
		echo json_encode(array('trans_hdr' => $result,'trans_dtl' => $trans_dtl, 'token' => $this->security->get_csrf_hash()));
    }

    public function cancel_receive(){
        $id = $this->input->post("id", TRUE);
        $ref_id = $this->input->post("ref_id", TRUE);
        $data['result'] = $this->inventory_receive_model->cancel_receive($id);

        if (!empty($ref_id) || $ref_id == "0"){
	        $result2 = $this->inventory_receive_model->update_issuance_status($ref_id, "1");
        }
        $this->activity_model->insert_activity("3", "1", "4");
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);        
    }

    public function view_receive(){
    	$data = array();
    	$id = $this->input->post("id", TRUE);
    	$rcpt_type = $this->input->post("rcpt_type", TRUE);
    	$result = $this->inventory_receive_model->get_receive_dtl($id);
    	$data['header'] = $this->inventory_receive_model->get_receive_hdr($id, $rcpt_type);
    	$data['detail'] = inventory_dtl($result->result());
		$data['token'] = $this->security->get_csrf_hash();
    	echo json_encode($data);
    }
    
    public function get_trans_type(){
		$data['data'] = $this->inventory_receive_model->get_trans_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}
	
	public function get_outlet(){
		$data['result'] = $this->inventory_receive_model->get_outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}


}
