<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_transfer extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("Inventory_transfer_model");
	    	$this->load->helper("inventory_transfer");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function currency(){
		$query = $this->inventory_transfer_model->currency();
		echo json_encode($query);
	}

	public function search_recipient($type){
		$recipient = $this->input->post("recipient");
		$data = array();
		$data['response'] = "false";

		if ($type == "1"){
			$result = $this->inventory_transfer_model->search_recipient_code($recipient);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->outlet_code, "recipient_name" => $value->outlet_name, "recipient_type" => $value->recipient_type, "recipient_id" => $value->id);
				}
			}
		}else{
			$result = $this->inventory_transfer_model->search_recipient_name($recipient);
			if (!empty($result)){
				$data['response'] = "true";
				foreach ($result as $key => $value) {
					$data['result'][] = array("label" => $value->outlet_name, "recipient_code" => $value->outlet_code, "recipient_type" => $value->recipient_type, "recipient_id" => $value->id);
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
		$currency = $this->inventory_transfer_model->currency();


		if ($type == "1"){
			$result = $this->inventory_transfer_model->search_product_code($product);
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
			$result = $this->inventory_transfer_model->search_product_name($product);
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

	public function select_item(){
		$id = $this->input->post("id");
		$data = array();
		$result = $this->inventory_transfer_model->select_item($id);
		foreach ($result as $key => $value) {
			$data['result'] = array(
				"prod_code" => $value->prod_code, 
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
				"prod_price" => $value->prod_price);
		}

		echo json_encode($data);
	}

	public function inv_no_wo_id(){
		$transfer_no = $this->input->post("transfer_no");
		$result = $this->inventory_transfer_model->inv_no_wo_id($transfer_no);
		echo json_encode($result);
	}

	public function inv_no_w_id(){
		$transfer_no = $this->input->post("transfer_no");
		$id = $this->input->post("id");
		$result = $this->inventory_transfer_model->inv_no_w_id($transfer_no, $id);
		echo json_encode($result);
	}

	public function select_transfer_no(){
		$transfer_no = $this->input->post("transfer_no");
		$result = $this->inventory_transfer_model->select_transfer_no($transfer_no);
		echo json_encode($result);
	}

	public function insert_inventory_transfer(){
		$result = 1;
		$result_hdr = "";
		$result_dtl = false;

		$transfer_no = $this->input->post("transfer_no");
		$transfer_hdr = $this->input->post("transfer_hdr");
		$transfer_dtl = $this->input->post("transfer_dtl");
		$transfer_result = $this->inventory_transfer_model->inv_no_wo_id($transfer_no);

		if ($transfer_result == 0){
			$result_hdr = $this->inventory_transfer_model->insert_transfer_hdr($transfer_hdr);
			$result_dtl = $this->inventory_transfer_model->insert_transfer_dtl($transfer_dtl,$result_hdr);	
			$result_activity = $this->activity_model->insert_activity("3", "3", "1");		
		}


		if (!empty($result_hdr) && $result_dtl == true){
			$result = 1;
		}else{
			$result = 0;
		}
		// $result = 1;

		echo json_encode($result);
	}

	public function query_inventory_transfer(){
	    $tbldata = "";
		$keyword = $this->input->post("keyword");
		$app_func = $this->input->post("app_func");
		$type = $this->input->post('type');
    	$outlet = $this->input->post('outlet');
    	$trans_date = $this->input->post('trans_date');
		$result = $this->Inventory_transfer_model->query_inventory_transfer($keyword,$type,$outlet,$trans_date);
		$result_activity = $this->activity_model->insert_activity("3", "3", "3");		
		$tbldata = tbl_query($result,$app_func);
		echo json_encode($tbldata); 
	}

	public function get_inventory_transfer_data(){	
		$trans_id = $this->input->post("trans_id");
		$result_hdr = $this->inventory_transfer_model->get_inventory_transfer_hdr($trans_id);
		$result_dtl = $this->inventory_transfer_model->get_inventory_transfer_dtl($trans_id);

		$data = "";

		foreach ($result_hdr as $key => $value) {
			$data = array(
				"transfer_no" => $value->inv_no,
				"transfer_date" => $value->inv_date,
				"recipient_type" => $value->recipient_type,
				"recipient_id" => $value->recipient_id,
				"recipient_code" => $value->outlet_code,
				"recipient_name" => $value->outlet_name,
				"ref_trans_no" => $value->ref_trans_no,
				"ref_trans_date" => $value->ref_trans_date,
				"purpose" => $value->remarks			
			);
		}

		$data['table'] = tbl_items($result_dtl);

		echo json_encode($data);
	}

	public function delete_transfer_dtl(){
		$id = $this->input->post("id");
		$result = $this->inventory_transfer_model->delete_transfer_dtl($id);
		echo json_encode($result);
	}

	public function update_inventory_transfer(){
		$result = 1;
		$id = $this->input->post("id");
		$transfer_hdr = $this->input->post("transfer_hdr");
		$update_transfer_dtl = $this->input->post("update_transfer_dtl");
		$insert_transfer_dtl = $this->input->post("insert_transfer_dtl");

		$result_hdr = $this->inventory_transfer_model->update_transfer_hdr($transfer_hdr,$id);
		$result_dtl2 = $this->inventory_transfer_model->update_transfer_dtl($update_transfer_dtl);
		$result_dtl = $this->inventory_transfer_model->insert_transfer_dtl($insert_transfer_dtl,$id);
		$result_activity = $this->activity_model->insert_activity("3", "3", "2");		

		if (!empty($result_hdr) && $result_dtl == true){
			$result = 1;
		}else{
			$result = 0;
		}

		echo json_encode($result);

	}

	public function cancel_transfer(){
		$id = $this->input->post("id");
		$result = $this->inventory_transfer_model->cancel_transfer($id);
		$result_activity = $this->activity_model->insert_activity("3", "3", "4");		
		echo json_encode($result);
	}

    public function view_transfer(){
    	$data = array();
    	$id = $this->input->post("id");
    	$rcpt_type = $this->input->post("rcpt_type");
    	$result = $this->inventory_transfer_model->get_inventory_transfer_dtl($id);
    	$data['header'] = $this->inventory_transfer_model->get_inventory_transfer_hdr($id);
    	$data['detail'] = inventory_dtl($result);
    	echo json_encode($data);
    }
    
    public function get_trans_type(){
		$result = $this->Inventory_transfer_model->get_trans_type();
		//var_dump($result);
		echo json_encode($result);		
	}
	
	public function get_outlet(){
		$result = $this->Inventory_transfer_model->get_outlet();
		echo json_encode($result);		
	}

}