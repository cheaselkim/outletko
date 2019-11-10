<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
	    parent::__construct();
            $this->load->model("activity_model");
	      	$this->load->model("customer_model");
	      	$this->load->helper("customer");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}

		/* 
			Note for function 
			1 = Insert
			2 = Edit / Update
			3 = Delete / Cancel
			4 = Query
	
			model function for history is already autoload;
			$this->activity_model->insert_activity($module, $submodule, $function);
			(if module has no submodule, submodule automatically 0);
		 */
	}

    public function customer_no(){
        $data['data'] = $this->customer_model->customer_no();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function customer_type(){
		$data['data'] = $this->customer_model->customer_type();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function outlet(){
        $result = $this->customer_model->outlet();
        echo json_encode(array("all_access" => $result['all_access'], "data" => $result['result'], 'token' => $this->security->get_csrf_hash()));
    }

	public function search_cust_city(){
		$cust_city = $this->input->post("cust_city");
		$data = array();
		$data['response'] = "false";

		$result = $this->customer_model->search_cust_city($cust_city);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => ($value->city_desc.", ".$value->province_desc), "cust_province" => $value->province_desc, "prov_id" => $value->prov_id, "city_id" => $value->city_id);
			}
		}

        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function customer_wo_id(){
        $cust_name = $this->input->post("cust_name", TRUE);
        $data['result'] = $this->customer_model->customer_wo_id($cust_name);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function customer_w_id(){
        $cust_name = $this->input->post("cust_name", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->customer_model->customer_w_id($cust_name, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function cust_name(){
        $cust_name = $this->input->post("cust_name", TRUE);
        $data['result'] = $this->customer_model->cust_name($cust_name);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function save_customer() {
        $customer_hdr = $this->input->post('customer_hdr', TRUE);
        $customer_hdr['comp_id'] =  $this->session->userdata('comp_id');
        $customer_hdr['date_insert'] =  date('Y-m-d H:i:s');
        // var_dump($customer_hdr);
        $this->activity_model->insert_activity("4", "6", "1");
        $query = $this->customer_model->save_customer($customer_hdr);
        // $query = true;
        
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        // $this->output->set_content_type('application/json');
        $this->activity_model->insert_activity("4", "6", "1");
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

	public function search_field() {
        $result = $this->customer_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }

    public function customer_list(){
    	$term = $this->input->post('term', TRUE);
    	$type = $this->input->post('type', TRUE);
    	$outlet = $this->input->post('outlet', TRUE);
    	$status = $this->input->post('status', TRUE);
    	$function = $this->input->post("app_func", TRUE);
		$result = $this->customer_model->customer_list($term,$type,$outlet,$status);
		$data['result'] = table_customer($result,$function);
        $data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("4", "6", "3");
		echo json_encode($data);
	}

	public function get_customer_dtl(){
    	$id = $this->input->post('id');
    	$result = $this->customer_model->get_customer_dtl($id);
		echo json_encode(array('customer_dtl' => $result, 'token' => $this->security->get_csrf_hash()));
    }


    //FOR UPDATE
    public function update_customer() {
		$customer_id = $this->input->post('id', TRUE);
        $customer_hdr = $this->input->post('customer_hdr', TRUE);
        $this->activity_model->insert_activity("4", "6", "2");
        $query = $this->customer_model->update_customer($customer_hdr,$customer_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->activity_model->insert_activity("4", "6", "2");
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function delete_customer(){
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->customer_model->delete_customer($id);
        $data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("4", "6", "5");
        echo json_encode($data);        
    }

}
    