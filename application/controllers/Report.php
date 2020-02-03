<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper("report");
	    $this->load->helper("print");
	    $this->load->model("Report_model");
		$result = $this->login_model->check_session();
		if ($result != true){
			redirect("/");
		}
	}

	public function report_type (){
		$data['result'] = $this->Report_model->report_type();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function reports(){
		$report_type = $this->input->post('report_type');
		$window_width = $this->input->post("window_width");
		$data['result'] = $this->Report_model->reports($report_type, $window_width);
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function outlet(){
		$data['result'] = $this->Report_model->outlet();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function agent(){
		$data['result'] = $this->Report_model->agent();
		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}


	public function report(){
		$report = $this->input->post("report");
		$fdate = date("Y-m-d", strtotime($this->input->post("fdate")));
		$tdate = date("Y-m-d", strtotime($this->input->post("tdate")));
		$outlet = $this->input->post("outlet");
		$month = $this->input->post("month");
		$year = $this->input->post("year");
		$agent = $this->input->post("agent");
		$tbl = "";
		$result = "";

        $this->activity_model->insert_activity("6", $report, "3");

		if ($report == "1"){
			$result = $this->Report_model->sales_summary($fdate, $tdate, $outlet);
			$tbl = report_17($result);
		}else if ($report == "2"){
			$result = $this->Report_model->monthly_sales_summary($month, $year, $outlet);
			$tbl = monthly_sales_summary($month, $year, $result);
		}else if ($report == "3"){
			$result = $this->Report_model->sales_transaction($fdate, $tdate, $outlet,"2");
			$tbl = sales_transaction($result);
		}else if ($report == "4"){
			$result = $this->Report_model->sales_transaction($fdate, $tdate, $outlet,"0");
			$tbl = sales_transaction($result);
		}else if ($report == "5"){
			$result = $this->Report_model->sales_transaction($fdate, $tdate, $outlet,"");
			$tbl = sales_transaction($result);
		}else if ($report == "6"){
			$result = $this->Report_model->sales_per_product_category($fdate, $tdate, $outlet);
			$tbl = sales_per_product_category($result);
		}else if ($report == "7"){
			$result = $this->Report_model->sales_per_product_class($fdate, $tdate, $outlet);
			$tbl = sales_per_product_class($result);
		}else if ($report == "8"){
			$result = $this->Report_model->sales_per_agent($fdate, $tdate, $outlet);
			$tbl = sales_per_agent($result);
		}else if ($report == "9"){
			$result = $this->Report_model->sales_trans_per_agent($fdate, $tdate, $agent);
			$tbl = sales_trans_per_agent($result);
		}else if ($report == "10"){
			$result = $this->Report_model->sales_per_product($fdate, $tdate, $outlet, "1");
			$tbl = sales_per_product($result);
		}else if ($report == "11"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "1");
			$tbl = inventory_transaction($result);
		}else if ($report == "12"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "2");
			$tbl = inventory_transaction($result);
		}else if ($report == "13"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "3");
			$tbl = inventory_transaction($result);
		}else if ($report == "14"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "4");
			$tbl = inventory_transaction($result);
		}else if ($report == "15"){
		}else if ($report == "16"){
			$result = $this->Report_model->stock_onhand($fdate, $tdate, $outlet);
			$tbl = stock_onhand($result);
		}else if ($report == "17"){
			$result = $this->Report_model->end_of_day($fdate, $tdate, $outlet);
				$tbl = end_of_day($result);			
		}else if ($report == "18"){
			$result = $this->Report_model->sales_target_vs_actual($year, $outlet);
			$sales_target = $this->Report_model->get_sales_target($outlet);
			$tbl = sales_target_vs_actual($year, $sales_target, $result);						

		}

		
		$data['token'] = $this->security->get_csrf_hash();
		$data['data'] = $tbl;
		echo json_encode($data);
	}
	
	public function print_report($report,$fdate,$tdate,$outlet){

        $this->activity_model->insert_activity("6", $report, "6");

		if ($report == "1"){
			$result = $this->Report_model->sales_summary($fdate, $tdate, $outlet);
			$tbl = report_17_print($result);
		}else if ($report == "2"){
			$result = $this->Report_model->sales_transaction($fdate, $tdate, $outlet,"1");
			$tbl = sales_transaction_print($result);
		}else if ($report == "3"){
			$result = $this->Report_model->sales_transaction($fdate, $tdate, $outlet,"0");
			$tbl = sales_transaction_print($result);
		}else if ($report == "4"){
			$result = $this->Report_model->sales_transaction($fdate, $tdate, $outlet,"");
			$tbl = sales_transaction_print($result);
		}else if ($report == "5"){
		}else if ($report == "6"){
		}else if ($report == "7"){
			$result = $this->Report_model->sales_per_product($fdate, $tdate, $outlet, "1");
			$tbl = sales_per_product_print($result);
		}else if ($report == "8"){
			$result = $this->Report_model->sales_per_agent($fdate, $tdate, $outlet);
			$tbl = sales_per_agent_print($result);
		}else if ($report == "9"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "1");
			$tbl = inventory_transaction_print($result);
		}else if ($report == "10"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "2");
			$tbl = inventory_transaction_print($result);
		}else if ($report == "11"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "3");
			$tbl = inventory_transaction_print($result);
		}else if ($report == "12"){
			$result = $this->Report_model->inventory_transaction($fdate, $tdate, $outlet, "4");
			$tbl = inventory_transaction_print($result);
		}else if ($report == "14"){
			$result = $this->Report_model->stock_onhand($fdate, $tdate, $outlet);
			$tbl = stock_onhand_print($result);
		}
        //$days = $this->sales_model->get_days_number($date,$month,$year);
        //$result = $this->sales_model->monthly_sales_report($month,$year);
        //$table_report = monthly_sales_report($result,$days);
        
        // instantiate and use the dompdf class
        //$dompdf = new Dompdf();
        //$dompdf->loadHtml("123");

        // (Optional) Setup the paper size and orientation
       // $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        //$dompdf->render();

        // Output the generated PDF to Browser
        //$dompdf->stream();



        $this->load->library('pdf');

        // set document information
        //$this->pdf->SetSubject('TCPDF Tutorial');
        //$this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        
        // set font
        //$this->pdf->SetFont('times', 'BI', 16);
        
        // add a page
        $this->pdf->AddPage();	
        
     	$this->pdf->writeHTML($tbl, true, false, true, false, '');

        //Close and output PDF document
        $this->pdf->Output('Report.pdf', 'I');  

        
    }


}