<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

	public function __construct(){
	    parent::__construct();
            $this->load->model("activity_model");
	      	$this->load->model("outlet_model");
	      	$this->load->helper("outlet");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}

	}

    public function outlet_available(){
        $data['result'] = $this->outlet_model->outlet_available();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function outlet_no(){
        $data['data'] = $this->outlet_model->outlet_no();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function currency(){
        $data['data'] = $this->outlet_model->currency();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function outlet_type(){
		$data['data'] = $this->outlet_model->outlet_type();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function search_outlet_city(){
		$outlet_city = $this->input->post("outlet_city", TRUE);
		$data = array();
		$data['response'] = "false";

		$result = $this->outlet_model->search_outlet_city($outlet_city);
		if (!empty($result)){
			$data['response'] = "true";
			foreach ($result as $key => $value) {
				$data['result'][] = array("label" => ($value->city_desc.", ".$value->province_desc), "outlet_province" => $value->province_desc, "prov_id" => $value->prov_id, "city_id" => $value->city_id);
			}
		}

        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function save_outlet() {
        $outlet_hdr = $this->input->post('outlet_hdr', TRUE);
        $outlet_hdr['comp_id'] =  $this->session->userdata('comp_id');
        $outlet_hdr['date_created'] =  date('Y-m-d H:i:s');
        $this->activity_model->insert_activity("2", "0", "1");
        $query = $this->outlet_model->save_outlet($outlet_hdr);

        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        // $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

	public function search_field() {
        $result = $this->outlet_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }

    public function outlet_list(){
    	$type = $this->input->post('type', TRUE);
    	$status = $this->input->post('status', TRUE);
    	$term = $this->input->post('term', TRUE);
    	$function = $this->input->post("app_func", TRUE);
		$result = $this->outlet_model->outlet_list($type,$status,$term);
		$data['result'] = table_outlet($result,$function);
        $data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("2", "2", "3");
		echo json_encode($data);
	}

	public function get_outlet_dtl(){
    	$id = $this->input->post('id', TRUE);
    	$result = $this->outlet_model->get_outlet_dtl($id);
		echo json_encode(array('outlet_dtl' => $result));
    }

    public function edit_outlet() {
		
		$outlet_id = $this->input->post('outlet_id', TRUE);
        $outlet_hdr = $this->input->post('outlet_hdr', TRUE);
        $query = $this->sales_model->edit_outlet($outlet_hdr,$outlet_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status));       
    }

    //FOR UPDATE
    public function update_outlet() {
		$outlet_id = $this->input->post('outlet_id', TRUE);
        $outlet_hdr = $this->input->post('outlet_hdr', TRUE);
        $query = $this->outlet_model->update_outlet($outlet_hdr,$outlet_id);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->activity_model->insert_activity("2", "0", "2");
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function delete_outlet(){
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->outlet_model->delete_outlet($id);
        $data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("2", "0", "5");
        echo json_encode($data);        
    }

    public function cancel_outlet(){
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->outlet_model->cancel_outlet($id);
        $data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("2", "0", "4");
        echo json_encode($data);                
    }

    public function select_id(){
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->outlet_model->get_outlet_dtl($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }


    public function all_outlet_list(){
        $result = $this->outlet_model->all_outlet_list();
        $data['data'] = list_outlet($result);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

}
