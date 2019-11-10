<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	      	$this->load->model("supplier_model");
	      	$this->load->helper("supplier");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

    public function supplier_no(){
        $data['data'] = $this->supplier_model->supplier_no();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function supplier_type(){
		$data['data'] = $this->supplier_model->supplier_type();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function business_nature(){
        $data['data'] = $this->supplier_model->business_nature();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_classification(){
        $data['data'] = $this->supplier_model->get_classification();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_organization(){
        $data['data'] = $this->supplier_model->get_organization();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function outlet(){
        $result = $this->supplier_model->outlet();
        echo json_encode(array("all_access" => $result['all_access'], "data" => $result['result'], 'token' => $this->security->get_csrf_hash()));
    }

	public function search_supp_city(){
		$supp_city = $this->input->post("supp_city", TRUE);
		$data = array();
		$data['response'] = "false";

		$result = $this->supplier_model->search_supp_city($supp_city);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => ($value->city_desc.", ".$value->province_desc), "supp_province" => $value->province_desc, "prov_id" => $value->prov_id, "city_id" => $value->city_id);
			}
		}

        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function supplier_wo_id(){
        $supp_name = $this->input->post("supp_name", TRUE);
        $data['result'] = $this->supplier_model->supplier_wo_id($supp_name);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function supplier_w_id(){
        $supp_name = $this->input->post("supp_name", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] =  $this->supplier_model->supplier_w_id($supp_name, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function supp_name (){
        $supp_name = $this->input->post("supp_name", TRUE);
        $data['result'] = $this->supplier_model->supp_name($supp_name);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function save_supplier() {
        $supplier_hdr = $this->input->post('supplier_hdr', TRUE);
        $supplier_hdr['comp_id'] =  $this->session->userdata('comp_id');
        $supplier_hdr['date_insert'] =  date('Y-m-d H:i:s');
        $this->activity_model->insert_activity("4", "7", "1");
        $query = $this->supplier_model->save_supplier($supplier_hdr);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        // $status = "success";
        $this->activity_model->insert_activity("4", "7", "1");
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function save_supplier2(){

        echo json_encode(array("token" => $this->security->get_csrf_hash()));
    }

	public function search_field() {
        $result = $this->supplier_model->search_field();
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

    public function supplier_list(){
    	$term = $this->input->post('term', TRUE);
    	$type = $this->input->post('type', TRUE);
    	$outlet = $this->input->post('outlet', TRUE);
    	$status = $this->input->post('status', TRUE);
    	$function = $this->input->post("app_func", TRUE);
		$result = $this->supplier_model->supplier_list($term,$type,$outlet,$status);
		$table_supplier = table_supplier($result,$function);
		$count=count($result);
        $this->activity_model->insert_activity("4", "7", "3");
		echo json_encode(array('output' => $table_supplier,'count' => $count, 'token' => $this->security->get_csrf_hash()));
	}

	public function get_supplier_dtl(){
    	$id = $this->input->post('id', TRUE);
    	$result = $this->supplier_model->get_supplier_dtl($id);
		echo json_encode(array('supplier_dtl' => $result, 'token' => $this->security->get_csrf_hash()));
    }

    //FOR UPDATE
    public function update_supplier() {
		$supplier_id = $this->input->post('id', TRUE);
        $supplier_hdr = $this->input->post('supplier_hdr', TRUE);
        $query = $this->supplier_model->update_supplier($supplier_hdr,$supplier_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->activity_model->insert_activity("4", "7", "2");
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function delete_supplier(){
        $id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("4", "7", "5");
        $data['result'] = $this->supplier_model->delete_supplier($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);        
    }

}
