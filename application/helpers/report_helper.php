<?php 

if (!function_exists("report_17")){

	function report_17($query){



		$output = "";

		$currency = "";

		$total_trans = 0;

		$total_amount = 0;

		$total_vat = 0;

		$total_net_vat = 0;



		$output .= "<table class='table table-striped table-bordered table-sm'>

					<thead style='width: 100%;' class=''>

						<tr>

							<th class='text-center' style='width: 30%;'>Outlet</th>

							<th class='text-center' style='width: 15%;'>No. of Trans</th>

							<th class='text-center d-none d-md-table-cell' style='width: 10%;'>Currency</th>

							<th class='text-center' style='width: 15%;'>Total Amount</th>

							<th class='text-center d-none d-md-table-cell' style='width: 15%;'>VAT Amount</th>

							<th class='text-center d-none d-md-table-cell' style='width: 15%;'>Net of VAT</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			foreach ($query as $key => $value) {

				$output .= "<tr>

								<td class='text-center' style='width: 30%;'>".$value->outlet_code."</td>

								<td class='text-center' style='width: 15%;'>".number_format($value->total_transaction)."</td>

								<td class='text-center d-none d-md-table-cell' style='width: 10%;'>".$value->curr_code."</td>

								<td class='text-center' style='width: 15%;'>".number_format($value->total_amount,2)."</td>

								<td class='text-center d-none d-md-table-cell' style='width: 15%;'>".number_format($value->total_vat_amount, 2)."</td>

								<td class='text-center d-none d-md-table-cell' style='width: 15%;'>".number_format($value->total_amount - $value->total_vat_amount, 2)."</td>

							</tr>";

				$currency = $value->curr_code;

				$total_trans += $value->total_transaction;

				$total_amount += $value->total_amount;

				$total_vat += $value->total_vat_amount;

				$total_net_vat += $value->total_net_vat;



			}			

		}



		$output .= "</tbody>

					</tfoot class='bg-button'>

						<tr class='bg-button'>

							<th class='text-center bg-button' style='width: 30%;'>Total</th>

							<th class='text-center bg-button' style='width: 15%;'>".number_format($total_trans)."</th>

							<th class='text-center bg-button d-none d-md-table-cell' style='width: 10%;'>".$currency."</th>

							<th class='text-center bg-button' style='width: 15%;'>".number_format($total_amount,2)."</th>

							<th class='text-center bg-button d-none d-md-table-cell' style='width: 15%;'>".number_format($total_vat,2)."</th>

							<th class='text-center bg-button d-none d-md-table-cell' style='width: 15%;'>".number_format(($total_amount - $total_vat),2)."</th>

						</tr>

					</tfoot>

					</table>";





		return $output;



	}

}

if (!function_exists("monthly_sales_summary")){
	function monthly_sales_summary($month, $year, $query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm'>
					<thead>
						<tr>
							<th style='width: 14%;'>Date</th>
							<th style='width: 15%;'>No. of Transaction</th>
							<th class='d-none d-md-table-cell' style='width: 22%;'>Gross Amount</th>
							<th class='d-none d-md-table-cell' style='width: 16%;'>VAT</th>
							<th  style='width: 21%;'>Net Amount</th>
						</tr>
					</thead>
					<tbody>";


		$last_day_month = date("t", strtotime(date($year."-".$month."-d")));
		$current_day = date("d", strtotime(date($year."-".$month."-d")));

		$day = "";

		if (date("m") != $month){
			$day = $last_day_month;
		}else{
			$day = $current_day;
		}

		// $year = 2019;

		$total_trans = "0";
		$trans_total = "0";
		$trans_vat = "0";
		$gross_amount = "0";

		for($i = 1; $i <= $day; $i++){

			$date_i = str_pad($month, 2, "0", STR_PAD_LEFT)."/".str_pad($i, 2, '0', STR_PAD_LEFT)."/".$year;



			$output .= "<tr>
							<td>".$date_i."</td>";

			if (!empty($query)){
					foreach ($query as $key => $value) {

						if (date("m/d/Y", strtotime($value->trans_date)) == $date_i){
							$total_trans = $value->total_trans;
							$trans_total = $value->trans_total;
							$trans_vat = $value->trans_vat;
							$gross_amount = ($value->trans_total - $value->trans_vat);
							break;
						}else{
							$total_trans = "0";
							$trans_total = "0";
							$trans_vat = "0";
							$gross_amount = "0";
						}

					}

					$output .= "<td class='text-center'>".number_format($total_trans)."</td>
								<td class='text-right d-none d-md-table-cell'>".number_format($trans_total, 2)."</td>
								<td class='text-right d-none d-md-table-cell'>".number_format($trans_vat, 2)."</td>
								<td class='text-right'>".number_format($gross_amount, 2)."</td>";

			}else{
					$output .= "<td class='text-center'>0</td>
								<td class='text-right d-none d-md-table-cell'>0.00</td>
								<td class='text-right d-none d-md-table-cell'>0.00</td>
								<td class='text-right'>0.00</td>";
			}

				$output .= "</tr>";
		}

		return $output;
	}
}

if (!function_exists("sales_transaction")){

	function sales_transaction($query){



		$output = "";

		$status = "";



		$output .= "<table style='width: 100%' class='table table-striped table-bordered table-sm' id='tbl-receive'>

					<thead>

						<tr>

							<th style='width: 5%;'>Trans No.</th>

                            <th style='width: 7%;'>Trans Date</th>

                            <th style='width: 20%;'>Customer Name</th>

                            <th style='width: 3%;'>Currency</th>

                            <th style='width: 7%;'>Trans Amount</th>

                            <th style='width: 3%;' class='text-center'>Outlet</th>

                            <th style='width: 5%;'>Status</th>


						</tr>

					</thead>

					<tbody>";

                            // <th style='width: 1%;'>Action</th>


		if (!empty($query)){

			foreach ($query as $key => $value) {



				if ($value->status == "2"){

						$status = "Served";

				}else if ($value->status){
					$status = "Not Served";

				}else{

					$status = "Cancelled";

				}



				$output .= "<tr>

								<td>".$value->trans_no."</td>

								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>

								<td>".$value->cust_name."</td>

								<td>".$value->currency."</td>

								<td class='text-right'>".number_format($value->total_amount, 2)."</td>

								<td class='text-center'>".$value->outlet_code."</td>

								<td>".$status."</td>


  						    </tr>";

								// <td><a href=''>View</a></td>
			}

		}else{

			$output .= "<tr>

						<td colspan='8'>No Data...</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}

if (!function_exists("sales_per_product_category")){
	function sales_per_product_category($query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm'>
					<thead>
						<tr>
							<th>Code</th>
							<th>Category Name</th>
							<th>Net Amount</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {
				$output .= "<tr>
								<td>".$value->category_code."</td>
								<td>".$value->category_name."</td>
								<td class='text-right'>".number_format(($value->total_amount - $value->total_vat), 2)."</td>
							</tr>";
			}			
		}else{
			$output .= "<tr>
							<td colspan='3'>No Data</td>
						</tr>";
		}

		return $output;

	}
}

if (!function_exists("sales_per_product_class")){
	function sales_per_product_class($query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm'>
					<thead>
						<tr>
							<th>Class Code</th>
							<th>Class Name</th>
							<th>Category</th>
							<th>Net Amount</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {
				$output .= "<tr>
								<td>".$value->class_code."</td>
								<td>".$value->class_name."</td>
								<td>".$value->category_name."</td>
								<td class='text-right'>".number_format(($value->total_amount - $value->total_vat),2)."</td>
							</tr>";
			}			
		}else{
			$output .= "<tr>
							<td colspan='3'>No Data</td>
						</tr>";
		}

		return $output;

	}
}

if (!function_exists("sales_per_product")){

	function sales_per_product($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-bordered table-sm' id='tbl-receive'>

					<thead>

						<tr>

							<th class='d-none d-md-table-cell' style='width: 10%;'>Product No</th>

                            <th style='width: 25%;'>Product Name</th>

                            <th style='width: 5%;'>Qty</th>

                            <th class='d-none d-md-table-cell' style='width: 5%;'>Unit</th>

                            <th style='width: 10%;'>Total Amount</th>
						</tr>

					</thead>

					<tbody>";

                            // <th style='width: 5%;'>Category</th>

                            // <th style='width: 10%;'>Class</th>


		if (!empty($query)){

			foreach ($query as $key => $value) {

			

				if (!empty($value->product_no)){				

					$output .= "<tr>

									<td class='d-none d-md-table-cell'>".$value->product_no."</td>

									<td>".$value->product_name."</td>

									<td>".$value->total_qty."</td>

									<td class='d-none d-md-table-cell'>".$value->unit_code."</td>

									<td class='text-right'>".number_format($value->total_amount, 2)."</td>

	  						    </tr>";

				}

									// <td>".$value->category_desc."</td>

									// <td>".$value->class_desc."</td>


			}

		}else{

			$output .= "<tr>

						<td colspan='8'>No Data</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}


//-------FOR AGENT REPORT------------

if (!function_exists("sales_per_agent")){

	function sales_per_agent($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-bordered table-sm' id='tbl-receive'>

					<thead>

						<tr>

							<th style='width: 5%;' class='d-none d-md-table-cell'>Agent/Partner ID</th>

                            <th style='width: 20%;'>Agent/Partner Name</th>

                            <th style='width: 5%;' class='d-none d-md-table-cell'>Currency</th>

                            <th style='width: 10%;'>Total Amount</th>

                            <th style='width: 10%;'>Share Amount</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			foreach ($query as $key => $value) {

			



				$output .= "<tr>

								<td class='d-none d-md-table-cell'>".$value->account_id."</td>

								<td>".$value->agent_name."</td>

								<td class='d-none d-md-table-cell'>".$value->currency."</td>

								<td class='text-right'>".number_format($value->total_amount, 2)."</td>

								<td class='text-right'>".number_format($value->share, 2)."</td>

  						    </tr>";

			}

		}else{

			$output .= "<tr>

						<td colspan='8'>No Data</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}

if (!function_exists("sales_trans_per_agent")){
	function sales_trans_per_agent($query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm'>
					<thead>
						<tr>
							<th style='width: 5%;'>Agent ID</th>
							<th style='width: 15%;'>Agent Name</th>
							<th style='width: 5%;'>Trans No</th>
							<th style='width: 5%;'>Trans Date</th>
							<th style='width: 20%;'>Product Name</th>
							<th style='width: 8%;'>Amount</th>
							<th style='width: 8%;'>Share Amount</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {
			$output .= "<tr>
							<td>".$value->account_id."</td>
							<td>".$value->agent_name."</td>
							<td>".$value->trans_no."</td>
							<td>".DATE('m/d/Y', strtotime($value->date_insert))."</td>
							<td>".$value->product_name."</td>
							<td class='text-right'>".number_format($value->total_selling_price, 2)."</td>
							<td class='text-right'>".number_format($value->share_amount, 2)."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;

	}
}

/*INVENTORY REPORT*/
if (!function_exists("inventory_transaction")){

	function inventory_transaction($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped' id='tbl-receive'>

					<thead>

						<tr>

							<th style='width: 5%;'>Trans No.</th>

                            <th style='width: 5%;'>Trans Date</th>

                            <th style='width: 5%;'>Code</th>

                            <th style='width: 30%;'>Name</th>

                            <th style='width: 10%;'>Trans Type</th>

                            <th style='width: 5%;'>Outlet</th>

                            <th style='width: 2%;' hidden>Action</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			foreach ($query as $key => $value) {

			



				$output .= "<tr>

								<td>".$value->inv_no."</td>

								<td>".$value->inv_date."</td>

								<td>".$value->supplier_code2."</td>

								<td>".$value->supplier_name2."</td>

								<td>".$value->inventory_ref_type."</td>

								<td>".$value->outlet_code."</td>

								<td hidden><a href=''>View</a></td>

  						    </tr>";

			}

		}else{

			$output .= "<tr>

						<td colspan='8'>No Data</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}

if (!function_exists("stock_onhand")){

	function stock_onhand($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-bordered table-sm' id='tbl-receive'>

					<thead>

						<tr>

							<th style='width: 5%;'>PN</th>

                            <th style='width: 20%;'>Product Name</th>

                            <th style='width: 5%;'>UM</th>

                            <th style='width: 10%;'>Stock on Hand</th>

                            <th style='width: 10%;'>Good Stock</th>

                            <th style='width: 5%;'>Damage</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			foreach ($query as $key => $value) {

			



				$output .= "<tr>

								<td>".$value->product_no."</td>

								<td>".$value->product_name."</td>

								<td>".$value->unit_name."</td>

								<td class='text-right'>".number_format($value->onhand, 2)."</td>

								<td class='text-right'>".number_format($value->good, 2)."</td>
								
								<td class='text-right'>".number_format($value->bad, 2)."</td>
								

  						    </tr>";

			}

		}else{

			$output .= "<tr>

						<td colspan='8'>No Data</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}

if (!function_exists("end_of_day")){
	function end_of_day($query){

		$output = "";
		$btn = "";

		$output .= "<table class='table table-bordered table-striped table-sm' id='end_day_tbl'>
						<thead>
							<tr>
								<th style='width: 5%;' class='font-weight-600'>Trans Date</th>
								<th style='width: 5%;' class='font-weight-600'>Outlet No</th>
								<th style='width: 5%;' class='font-weight-600'>User ID</th>
								<th style='width: 5%;' class='font-weight-600'>Total Trans</th>
								<th style='width: 5%;' class='font-weight-600'>Currency</th>
								<th style='width: 7%;' class='font-weight-600'>Sales Amount</th>
								<th style='width: 7%;' class='font-weight-600'>VAT Amount</th>
								<th style='width: 7%;' class='font-weight-600'>Net of VAT</th>
								<th style='width: 5%;' class='font-weight-600'>Status</th>
							</tr>
						</thead>
						<tbody>";

		if (!empty($query)){

			foreach ($query as $key => $value) {

				if ($value->status == "1"){
					$btn = "Open";
				}else {
					$btn = "Closed";
				}

				$output .= "<tr>
								<td class='tbl_trans_date'>".date('m/d/Y', strtotime($value->trans_date))."</td>
								<td class='tbl_outlet'>".$value->outlet_code."</td>
								<td class='tbl_account_id'>".$value->account_id."</td>
								<td class='text-center tbl_total_trans'>".$value->total_trans."</td>
								<td class='text-center tbl_curr_code'>".$value->curr_code."</td>
								<td class='text-right tbl_total_amount'>".number_format($value->total_amount, 2)."</td>
								<td class='text-right tbl_total_vat'>".number_format($value->total_vat,2)."</td>
								<td class='text-right tbl_total_net_vat'>".number_format(($value->total_amount - $value->total_vat),2)."</td>
								<td class='text-left'>".$btn."</td>
							</tr>";

			}

		}

		return $output;


	}
}

if (!function_exists("sales_target_vs_actual")){
	function sales_target_vs_actual($year, $sales_target, $query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm'>
					<thead>
						<tr>
							<th>Month</th>
							<th>Target Sales</th>
							<th>Actual Sales</th>
							<th class='d-none d-md-table-cell'>Variance</th>
							<th>%</th>
						</tr>
					</thead>
					<tbody>";

		$total_sales_target = "0";
		$actual_sales = "0";
		$date_month = date('m');

		foreach ($sales_target as $key => $value) {
			$total_sales_target += $value->outlet_monthly_quota;
		}

		if ($year == date('Y')){
			$date_month = date('m');
		}else{
			$date_month = 12;
		}

		for ($i = 1; $i <= $date_month; $i++) { 

			$output .= "<tr>
						<td>".date("F", mktime(0,0,0,$i, 10))."</td>
						<td class='text-right'>".number_format($total_sales_target, 2)."</td>
						";


			foreach ($query as $key => $value) {
				if ($i == $value->month_date){
					$actual_sales = ($value->total_amount - $value->total_vat);
					break;
				}else{
					$actual_sales = "0";
				}
			}

			$output .= "<td class='text-right'>".number_format($actual_sales, 2)."</td>
						<td class='text-right d-none d-md-table-cell'>".number_format(($total_sales_target - $actual_sales), 2)."</td>
						<td class='text-right'>".number_format((($actual_sales / $total_sales_target) * 100), 2)."%</td>";

			$output .= "</tr>";
		}

		return $output;

	}
}


