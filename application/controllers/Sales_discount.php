<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_discount extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("sales_discount_model");
	    	$this->load->helper("sales_discount");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

	public function company(){
		$data['data'] = $this->sales_discount_model->company();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['data'] = $this->sales_discount_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function sales_discount_wo_id(){
        $sales_discount = $this->input->post("sales_discount_code", TRUE);
        $data['result'] = $this->sales_discount_model->sales_discount_wo_id($sales_discount);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function sales_discount_w_id(){
        $sales_discount = $this->input->post("sales_discount_code", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->sales_discount_model->sales_discount_w_id($sales_discount, $id);
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function entry_query(){
		$app_func = $this->input->post("app_func", TRUE);
		$sales_discount = $this->input->post("sales_discount", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->sales_discount_model->query_sales_discount($sales_discount, $outlet);
		$tbl_result = entry_query($result);
		$count=count($result);
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'result' => $this->security->get_csrf_hash()));
	}

	public function insert_sales_discount(){
		$insert_array = array(
				"comp_id" => $this->session->userdata("comp_id"),
				"outlet_id" => $this->input->post("outlet", TRUE),
				"sales_discount_code" => $this->input->post("sales_discount_code", TRUE),
				"sales_discount_name" => $this->input->post("sales_discount_name", TRUE),
				"sales_discount_percent" => $this->input->post("sales_discount_percent", TRUE),
				"sales_discount_amount" => $this->input->post("sales_discount_amount", TRUE)
				);

        $this->activity_model->insert_activity("4", "23", "1");
		$data['result'] = $this->sales_discount_model->insert_sales_discount($insert_array);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function query_sales_discount(){
		$app_func = $this->input->post("app_func", TRUE);
		$sales_discount = $this->input->post("sales_discount", TRUE);
		$outlet = $this->input->post("outlet", TRUE);
		$result = $this->sales_discount_model->query_sales_discount($sales_discount, $outlet);
		$tbl_result = tbl_query($result,$app_func);
		$count=count($result);
        $this->activity_model->insert_activity("4", "23", "3");
		echo json_encode(array('output' => $tbl_result,'count' => $count, 'token' => $this->security->get_csrf_hash()));

	}

	public function delete_sales_discount(){
		$id = $this->input->post("id");
        $this->activity_model->insert_activity("4", "23", "5");
		$result = $this->sales_discount_model->delete_sales_discount($id);
		echo json_encode($result);
	}

	public function get_transaction(){
		$id = $this->input->post("id", TRUE);
		$result = $this->sales_discount_model->get_transaction($id);
		$data = array();
		$data['outlet'] = $result->outlet_id;
		$data['sales_discount_code'] = $result->sales_discount_code;
		$data['sales_discount_name'] = $result->sales_discount_name;
		$data['sales_discount_percent'] = $result->sales_discount_percent;
		$data['sales_discount_amount'] = $result->sales_discount_amount;
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function update_sales_discount(){
		$update_array = array(
				"outlet_id" => $this->input->post("outlet"),
				"sales_discount_code" => $this->input->post("sales_discount_code", TRUE),
				"sales_discount_name" => $this->input->post("sales_discount_name", TRUE),
				"sales_discount_percent" => $this->input->post("sales_discount_percent", TRUE),
				"sales_discount_amount" => $this->input->post("sales_discount_amount", TRUE)
				);

        $this->activity_model->insert_activity("4", "23", "2");
		$data['result'] = $this->sales_discount_model->update_sales_discount($update_array, $this->input->post("id"));
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);

	}	

	
	public function search_field() {
        $result = $this->sales_discount_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }

}
