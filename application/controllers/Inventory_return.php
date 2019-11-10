<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_return extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("Inventory_return_model");
	    	$this->load->helper("inventory_return");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function currency(){
		$query = $this->inventory_return_model->currency();
		echo json_encode($query);
	}

	public function search_recipient($type){
		$recipient = $this->input->post("recipient");
		$data = array();
		$data['response'] = "false";

		if ($type == "1"){
			$result = $this->Inventory_return_model->search_recipient_code($recipient);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->recipient_code, "recipient_name" => $value->recipient_name, 'recipient_type' => $value->recipient_type, 'recipient_id' => $value->recipient_id);
				}
			}
		}else{
			$result = $this->Inventory_return_model->search_recipient_name($recipient);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->recipient_name, "recipient_code" => $value->recipient_code, 'recipient_type' => $value->recipient_type, 'recipient_id' => $value->recipient_id);
				}
			}
		}

		echo json_encode($data);
	}

	public function search_products($type){
		$product = $this->input->post("product");
		$data = array();
		$data['response'] = "false";
		$currency = "";
		$currency = $this->Inventory_return_model->currency();

		if ($type == "1"){
			$result = $this->Inventory_return_model->search_product_code($product);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array(
						"label" => $value->prod_code, 
						"prod_id" => $value->prod_id,
						"prod_name" => $value->prod_name, 
						"prod_specs" => $value->prod_specs, 
						"prod_type" => $value->prod_type, 
						"prod_brand" => $value->prod_brand, 
						"prod_category" => $value->prod_category, 
						"prod_class" => $value->prod_class, 
						"prod_color" => $value->prod_color, 
						"prod_model" => $value->prod_model, 
						"prod_unit" => $value->prod_unit, 
						"prod_size" => $value->prod_size, 
						"prod_qty" => $value->prod_qty, 
						"prod_price" => $value->prod_price,
						"prod_curr" => $currency);
				}
			}
		}else{
			$result = $this->Inventory_return_model->search_product_name($product);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array(
						"label" => $value->prod_name, 
						"prod_id" => $value->prod_id,
						"prod_no" => $value->prod_no,
						"prod_code" => $value->prod_code, 
						"prod_specs" => $value->prod_specs, 
						"prod_type" => $value->prod_type, 
						"prod_brand" => $value->prod_brand, 
						"prod_category" => $value->prod_category, 
						"prod_class" => $value->prod_class, 
						"prod_color" => $value->prod_color, 
						"prod_model" => $value->prod_model, 
						"prod_unit" => $value->prod_unit, 
						"prod_size" => $value->prod_size, 
						"prod_qty" => $value->prod_qty, 
						"prod_price" => $value->prod_price,
						"prod_curr" => $currency);
				}
			}
		}

		echo json_encode($data);
	}

	public function inv_no_wo_id(){
		$return_no = $this->input->post("return_no");
		$result = $this->inventory_return_model->inv_no_wo_id($return_no);
		echo json_encode($result);
	}

	public function inv_no_w_id(){
		$return_no = $this->input->post("return_no");
		$id = $this->input->post("id");
		$result = $this->inventory_return_model->inv_no_w_id($return_no, $id);
		echo json_encode($result);
	}

	public function select_return_no(){
		$return_no = $this->input->post("return_no");
		$result = $this->Inventory_return_model->select_return_no($return_no);
		echo json_encode($result);
	}

	public function insert_inventory_return(){
		$result = 1;
		$result_hdr = "";
		$result_dtl = false;

		$return_hdr = $this->input->post("return_hdr");
		$return_dtl = $this->input->post("return_dtl");
		$return_no = $this->input->post("return_no");
		$return_result = $this->inventory_return_model->inv_no_wo_id($return_no);

		if (empty($return_result)){
			$result_hdr = $this->inventory_return_model->insert_return_hdr($return_hdr);
			$result_dtl = $this->inventory_return_model->insert_return_dtl($return_dtl,$result_hdr);
			$result_activity = $this->activity_model->insert_activity("3", "4", "1");		
		}


		if (!empty($result_hdr) && $result_dtl == true){
			$result = 1;
		}else{
			$result = 0;
		}

		echo json_encode($result);
	}

	public function query_inventory_return(){
		$tbldata = "";
		$keyword = $this->input->post("keyword");
		$app_func = $this->input->post("app_func");
		$type = $this->input->post('type');
    	$outlet = $this->input->post('outlet');
    	$ret_date = $this->input->post('ret_date');
    	
		$result = $this->Inventory_return_model->query_inventory_return($keyword,$type,$outlet,$ret_date);
		$tbldata = tbl_query($result,$app_func);
		echo json_encode($tbldata);
	}

	public function get_inventory_return_data(){	
		$trans_id = $this->input->post("trans_id");
		$result_hdr = $this->inventory_return_model->get_inventory_return_hdr($trans_id);
		$result_dtl = $this->inventory_return_model->get_inventory_return_dtl($trans_id);

		$data = "";

		foreach ($result_hdr as $key => $value) {
			$data = array(
				"return_no" => $value->inv_no,
				"return_date" => $value->inv_date,
				"recipient_type" => $value->recipient_type,
				"recipient_id" => $value->recipient_id,
				"recipient_code" => $value->outlet_code,
				"recipient_name" => $value->outlet_name,
				"ref_trans_no" => $value->ref_trans_no,
				"ref_trans_date" => $value->ref_trans_date,
				"reason" => $value->remarks			
			);
		}

		$data['table'] = tbl_items($result_dtl);

		echo json_encode($data);
	}

	public function delete_return_dtl(){
		$id = $this->input->post("id");
		$result = $this->Inventory_return_model->delete_return_dtl($id);
		echo json_encode($result);
	}

	public function update_inventory_return(){
		$result = 1;
		$id = $this->input->post("id");
		$return_hdr = $this->input->post("return_hdr");
		$update_return_dtl = $this->input->post("update_return_dtl");
		$insert_return_dtl = $this->input->post("insert_return_dtl");

		$result_hdr = $this->Inventory_return_model->update_return_hdr($return_hdr,$id);
		$result_dtl2 = $this->Inventory_return_model->update_return_dtl($update_return_dtl);

		if (!empty($insert_return_dtl)){
			$result_dtl = $this->Inventory_return_model->insert_return_dtl($insert_return_dtl,$id);
		}

		if (!empty($result_hdr) && $result_dtl2 == true){
			$result = 1;
		}else{
			$result = 0;
		}

		echo json_encode($result);

	}

	public function cancel_return(){
		$id = $this->input->post("id");
		$result = $this->Inventory_return_model->cancel_return($id);
		echo json_encode($result);
	}

    public function view_return(){
    	$data = array();
    	$id = $this->input->post("id");
    	$rcpt_type = $this->input->post("rcpt_type");
    	$result = $this->Inventory_return_model->get_inventory_return_dtl($id);
    	$data['header'] = $this->Inventory_return_model->get_inventory_return_hdr($id);
    	$data['detail'] = inventory_dtl($result);
    	echo json_encode($data);
    }
    
    public function get_trans_type(){
		$result = $this->Inventory_return_model->get_trans_type();
		//var_dump($result);
		echo json_encode($result);		
	}
	
	public function get_outlet(){
		$result = $this->Inventory_return_model->get_outlet();
		echo json_encode($result);		
	}


}