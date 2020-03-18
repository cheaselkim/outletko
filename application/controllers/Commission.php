<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("commission_model");
	    	$this->load->helper("commission");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
    }

    public function report(){
        $report = $this->input->post("report");
        $month = $this->input->post("month");
        $year = $this->input->post("year");
        $result = "";

        if ($report == "1"){
            $data_1 = $this->commission_model->prod_summary_lvl_1($month, $year);
            $data_2 = $this->commission_model->prod_summary_lvl_2($month, $year);
            $data_3 = $this->commission_model->prod_summary_lvl_3($month, $year);
            $result = tbl_prod_summary($data_1, $data_2, $data_3);
        }else if ($report == "2"){
            $data_1 = $this->commission_model->prod_summary_lvl_1($month, $year);
            $data_2 = $this->commission_model->prod_summary_lvl_2($month, $year);
            $data_3 = $this->commission_model->prod_summary_lvl_3($month, $year);
            $result = tbl_plan_summary($data_1, $data_2, $data_3);
        }else if ($report == "3"){
            $data_1 = $this->commission_model->prod_summary_lvl_1($month, $year);
            $data_2 = $this->commission_model->prod_summary_lvl_2($month, $year);
            $data_3 = $this->commission_model->prod_summary_lvl_3($month, $year);
            $result = tbl_outlet_summary($data_1, $data_2, $data_3);
        }

        $data['data'] = $result;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }
    
}