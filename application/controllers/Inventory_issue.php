<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_issue extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("inventory_issue_model");
	      	$this->load->helper("inventory_issue");
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

	public function account_vat(){
		$data['result'] = $this->inventory_issue_model->account_vat();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function trans_type(){
		$data['data'] = $this->inventory_issue_model->trans_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function currency(){
		$data['data'] = $this->inventory_issue_model->currency();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function max_transno(){
		$trans_type = $this->input->post("trans_type", TRUE);
		$data['data'] = $this->inventory_issue_model->max_transno($trans_type);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function search_recipient($type){
		$keyword = $this->input->post("recipient");
		$trans_type = $this->input->post("trans_type");
		$data = array();
		$data['response'] = "false";

		if ($trans_type == "5"  || $trans_type == "8"){
			$result = $this->inventory_issue_model->search_customer($type, $keyword);
		}else if ($trans_type == "6"){
			$result = $this->inventory_issue_model->search_outlet($type, $keyword);
		}else if ($trans_type == "7"){
			$result = $this->inventory_issue_model->search_supplier($type, $keyword);
		}

			if (!empty($result)){
					$data['response'] = "true";

					if ($type == "1"){
						foreach ($result as $key => $value) {
							$data['result'][] = array("label" => $value->CODE, "name" => $value->NAME, "type1" => $value->TYPE , "id" => $value->ID);
						}						
					}else{
				        foreach ($result as $key => $value) {
				         	$data['result'][] = array("label" => $value->NAME, "code" => $value->CODE, "type1" => $value->TYPE, "id" => $value->ID);
				        }						
					}
			}


		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}


	public function search_field() {
        $result = $this->inventory_issue_model->search_field();
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

	public function search_item($type){
		$prod = $this->input->post("prod", TRUE);
		$currency = "";
		$data = array();
		$data['response'] = "false";
		$currency = $this->inventory_issue_model->currency();

		if ($type == "1"){
			$result = $this->inventory_issue_model->search_item_code($prod);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->product_no, 
											"prod_name" => $value->product_name,
											"prod_id" => $value->prod_id,
											"prod_specs" => $value->product_specs,
											"prod_type" => $value->prod_type_desc,
											"brand" => $value->brand_desc,
											"model" => $value->model_desc,
											"color" => $value->color_desc,
											"class" => $value->class_desc,
											"category" => $value->category_desc,
											"size" => $value->size_desc,
											"unit" => $value->stock_unit_id,
											"vat" => $value->vat,
											"image" => unserialize($value->image_loc),
											"prod_unit" => $value->unit_code,
											"prod_price" => $value->reg_selling_price,
											"prod_curr" => $currency);
				}
			}
		}else{
			$result = $this->inventory_issue_model->search_item_name($prod);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->product_name, 
											"prod_no" => $value->product_no,
											"prod_id" => $value->prod_id,
											"prod_specs" => $value->product_specs,
											"prod_type" => $value->prod_type_desc,
											"brand" => $value->brand_desc,
											"model" => $value->model_desc,
											"color" => $value->color_desc,
											"class" => $value->class_desc,
											"category" => $value->category_desc,
											"size" => $value->size_desc,
											"unit" => $value->stock_unit_id,
											"vat" => $value->vat,
											"image" => unserialize($value->image_loc),
											"prod_unit" => $value->unit_code,
											"prod_price" => $value->reg_selling_price,
											"prod_curr" => $currency);
				}
			}
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function product_onhand(){
		$prod_id = $this->input->post("prod_id", TRUE);
		$inv_qty = $this->inventory_issue_model->inv_qty($prod_id);
		$sales_qty = $this->inventory_issue_model->sales_qty($prod_id);
		$data['result'] = $inv_qty - $sales_qty;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function sales_register(){
		$trans_date = $this->input->post("trans_date", TRUE);
		$trans_no = $this->input->post("trans_noo", TRUE);
		$cust_id = $this->input->post("cust_id", TRUE);
		$agent_id = $this->input->post("agent_id", TRUE);
		$arr_id = $this->input->post("arr_id", TRUE) == '' ? array(0) : $this->input->post("arr_id", TRUE);
		$result = $this->inventory_issue_model->sales_register($trans_date, $trans_no, $cust_id, $agent_id, $arr_id);
		$data['result'] = sales_register($result, $this->session->userdata("outlet_code"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function sales_register_products(){
		$id = $this->input->post("id", TRUE);
		$arr_id = $this->input->post("arr_id", TRUE) == '' ? array(0) : $this->input->post("arr_id", TRUE);
		$result = $this->inventory_issue_model->sales_register_products($id, $arr_id);
		$data['result'] = sales_register_products($result);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function inv_no_wo_id(){
		$issue_no = $this->input->post("issue_no", TRUE);
		$data['result'] = $this->inventory_issue_model->inv_no_wo_id($issue_no);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function inv_no_w_id(){
		$issue_no = $this->input->post("issue_no", TRUE);
		$id = $this->input->post("id", TRUE);
		$data['result'] = $this->inventory_issue_model->inv_no_w_id($issue_no, $id);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function select_issue_no(){
		$issue_no = $this->input->post("issue_no", TRUE);
		$data['result'] = $this->inventory_issue_model->select_issue_no($issue_no);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function issue_list(){
    	$term = $this->input->post('term', TRUE);
    	$type = $this->input->post('type', TRUE);
    	$outlet = $this->input->post('outlet', TRUE);
    	$iss_date = $this->input->post('iss_date', TRUE);
    	$status = $this->input->post("status", TRUE);
    	$function = $this->input->post("app_func", TRUE);
		$result = $this->inventory_issue_model->issue_list($term,$type,$outlet,$iss_date, $status);	
        $this->activity_model->insert_activity("3", "2", "3");
		$data['result'] = table_issue($result,$function);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function save_data() {
        $issue_hdr = $this->input->post('issue_hdr', TRUE);
        $issue_dtl = $this->input->post('issue_dtl', TRUE);

        $issue_hdr['date_insert'] = date("Y-m-d H:i:s");
        $issue_hdr['comp_id'] = $this->session->userdata('comp_id');
        $issue_hdr['outlet_id'] =  $this->session->userdata('outlet_id');
        $issue_hdr['created_by'] =  $this->session->userdata('user_id');

        $hdr_id = $this->inventory_issue_model->save_hdr($issue_hdr);
        $query = $this->inventory_issue_model->save_dtl($issue_dtl,$hdr_id);

        $query = true;

        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }

        $this->activity_model->insert_activity("3", "2", "1");
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function update_data() {
		$hdr_id = $this->input->post('hdr_id', TRUE);
        $issue_hdr = $this->input->post('issue_hdr');
        $issue_dtl = $this->input->post('issue_dtl');

        $this->inventory_issue_model->edit_issue_hdr($issue_hdr,$hdr_id);
        $query = $this->inventory_issue_model->edit_issue_dtl($issue_dtl,$hdr_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }

        $this->activity_model->insert_activity("3", "2", "2");
        // $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function get_issue(){
    	$id = $this->input->post('id', TRUE);
    	$hdr_data = array();
    	$dtl_data = array();
    	$hdr_id = "";
    	$result = $this->inventory_issue_model->get_issue_hdr($id);
		$result2 = $this->inventory_issue_model->get_issue_dtl($id);
		//var_dump($result2);
		// foreach ($result2->result() as $row) { 
		// 	$dtl_data[] = array(
		// 			'product_id' => $row->prod_id,
		// 			'product_no' => $row->product_no,
		// 			'product_name' => $row->product_name,
		// 			'unit' => $row->unit_code,
		// 			'qty' => $row->qty,
		// 			''
		// 		); 
		// }

		$issue_dtl = inventory_dtl($result2->result());			
		echo json_encode(array('trans_hdr' => $result,'trans_dtl' => $issue_dtl, 'token' => $this->security->get_csrf_hash()));
		// echo json_encode($id);
    }

    public function sales_product_dtl(){
    	$data = array();
    	$id = $this->input->post("id", TRUE);
    	$result = $this->inventory_issue_model->sales_product_dtl($id);

    	foreach ($result as $key => $value) {
    		$data['prod_no'] = $value->product_no;
    		$data['prod_name'] = $value->product_name;
    		$data['qty'] = $value->qty;
    	}

		$data['token'] = $this->security->get_csrf_hash();
    	echo json_encode($data);
    }

    public function delete_issue(){
        $id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("3", "2", "4");
        $data['result'] = $this->inventory_issue_model->cancel_issue($id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);        
    }

    public function get_outlet_name(){
    	$id = $this->input->post('id', TRUE);
    	$data['data'] = $this->inventory_issue_model->get_outlet_name($id);
		$data['token'] = $this->security->get_csrf_hash();
    	echo json_encode($data);
    }
    
    public function get_trans_type(){
		$data['data'] = $this->inventory_issue_model->get_trans_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}
	
	public function get_outlet(){
		$data['data'] = $this->inventory_issue_model->get_outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

}
