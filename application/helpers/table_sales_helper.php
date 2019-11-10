<?php 

if (!function_exists("table_item")){
	function table_item($query,$item_array, $sales_query){

		$output = "";

		$output .= "<table style='width: 100%' class='table table-striped table-sm table-bordered' id='table_item' style=''>
					<thead class='w-100'>
						<tr class='bg-success'>
							<th style='width: 10%;font-size:16px;' class='text-left'>Product No</th>
							<th style='width: 50%;font-size:16px;' class='text-left'>Product Name</th>
							<th style='width: 7%;font-size:16px;' class='text-left'>Qty</th>
							<th style='width: 5%;font-size:16px;' class='text-left'>Unit</th>
							<th style='width: 10%;font-size:16px;' class='text-left'>Price</th>
							<th style='width: 10%;font-size:16px;' class='text-left'>Discount</th>
						</tr>
					</thead>
					<tbody>";
        $prod_no_qry = "";
        $prod_no_tbl = "";
        $sales_prod_id = "";
        $sales_qty = 0;
        $inv_qty = "";
		if (!empty($query)){
		    
		    foreach ($query as $key => $qryval) {
                $prod_no_qry = $qryval->id;
                
                foreach ((array)$item_array as $label => $values) {
                    $prod_no_tbl = $values["item"];
                    // if (!empty($item_array)){
                    //     var_dump($prod_no_tbl);
                    //     var_dump($prod_no_qry);
                    // }
                    if ($prod_no_tbl == $prod_no_qry){
                        unset($query[$key]);
                    }
                }

            }
                    
			foreach ($query as $key => $value) {
				$prod_no_qry = $value->id;
				$for_stock = $value->for_stock;
				$sales_qty = 0;
                foreach ((array)$sales_query as $key2 => $value2) {
                	$sales_prod_id = $value2->product_id;

                	if ($sales_prod_id == $prod_no_qry){
						$sales_qty = $value2->sales_qty;                		
						break;
                	}
                }

                if ($for_stock == "1"){
	                $inv_qty = number_format($value->inventory_qty - $sales_qty, 2);
	                $unit = $value->unit_code;
                }else{
                	$inv_qty = "";
                	$unit = "";
                }

				$output .= "<tr onclick='select_item(".$value->id.")' style='cursor:pointer'>
								<td style='width: 10%;font-size:16px;'>".$value->product_no."</td>
								<td style='width: 50%;font-size:16px;'>".$value->product_name."</td>
								<td style='width: 7%;font-size:16px;' class='text-right pr-1'>".$inv_qty."</td>
								<td style='width: 5%;font-size:16px;'>".$unit."</td>
								<td style='width: 10%;font-size:16px;' class='text-right pr-1'>".number_format($value->reg_selling_price, 2)."</td>
								<td style='width: 10%;font-size:16px;' class='text-right pr-1'>".number_format($value->discount, 2)."</td>
  						    </tr>";
			}

			// foreach ($sales_query as $key => $value) {
			// 	$output .= "<tr onclick='select_item(".$value->id.")' style='cursor:pointer'>
			// 					<td style='width: 10%;font-size:16px;'>".$value->product_id."</td>
			// 					<td style='width: 50%;font-size:16px;'>".$value->product_id."</td>
			// 					<td style='width: 7%;font-size:16px;' class='text-right pr-1'>".number_format($product_id, 2)."</td>
			// 					<td style='width: 5%;font-size:16px;'>".$value->product_id."</td>
			// 					<td style='width: 10%;font-size:16px;' class='text-right pr-1'>".number_format($value->product_id, 2)."</td>
			// 					<td style='width: 10%;font-size:16px;' class='text-right pr-1'>".number_format($value->product_id, 2)."</td>
  	// 					    </tr>";
			// }
		}else{
			$output .= "<tr>
							<td colspan='6'>No Data</td>
					  	</tr>";
		}


		$output .= "</tbody>
					</table>";


		return $output;


	}
}

if (!function_exists("table_query")){
	function table_query($query, $function){
		$output = "";
		$btn = "";
		$total_amount = 0;
		$total_discount = 0;
		$grand_total = 0;
		$total_trans = 0;

		foreach ($query as $key => $value) {
			$total_amount += $value->total_amount - $value->sales_discount;
			$total_discount += $value->sales_discount;
			$grand_total += $value->total_amount;
			$total_trans++;
		}

						// <tr>
						// 	<th colspan='3'></th>
						// 	<th style='width: 10%;' class='text-right'>".number_format($total_amount, 2)."</th>
						// 	<th style='width: 10%;' class='text-right'>".number_format($total_discount, 2)."</th>
						// 	<th style='width: 10%;' class='text-right'>".number_format($grand_total,2)."</th>
						// 	<th class='text-center' style='width: 5%;'>".number_format($total_trans,0)."</th>
						// </tr>

		$output .= "<table class='table table-striped table-bordered table-sm'>
					<thead>

						<tr>
							<th style='width: 5%;'>Trans No</th>
							<th style='width: 5%;'>Trans Date</th>
							<th style='width: 23.5%;'>Customer</th>
							<th style='width: 10%;'>Total Amount</th>
							<th style='width: 10%;'>Sales Discount</th>
							<th style='width: 9.8%;'>Grand Total</th>
							<th class='text-center' style='width: 5%;'>Action</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {

				if ($function == '2'){
					$btn = "<button class='btn btn-primary py-0 btn-query btn-block' onclick='edit_sales(".$value->id.")'>Edit</button>";			
				}else if ($function == "3"){
					$btn = "<button class='btn btn-success py-0 btn-query btn-block' onclick='view_query(".$value->id.")'>View</button>";
				}else{
					$btn = "<button class='btn btn-danger py-0 btn-query btn-block' onclick='view_cancel(".$value->id.", ".$value->trans_no.")'>Cancel</button>";
				}

				$output .= "<tr>
								<td>".$value->trans_no."</td>
								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
								<td>".$value->cust_name."</td>
								<td class='text-right'>".number_format(($value->total_amount - $value->sales_discount), 2)."</td>
								<td class='text-right'>".number_format($value->sales_discount, 2)."</td>
								<td class='text-right'>".number_format($value->total_amount, 2)."</td>
								<td>".$btn."</td>
							</tr>";
			}
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}


if (!function_exists("sales_dtl_query")){
	function sales_dtl_query($query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm' style='font-size: 16px;'>
					<thead>
						<tr>
							<th class='text-center' style='width: 3%;'>#</th>
							<th class='text-center'>Product No</th>
							<th class='text-center'>Product Name</th>
							<th class='text-center'>Qty</th>
							<th class='text-center'>UoM</th>
							<th class='text-center'>Selling Price</th>
							<th class='text-center'>Vol Discount</th>
							<th class='text-center'>Total Selling Price</th>
						</tr>
					</thead>
					<tbody style='height: auto !important'>";

		if (!empty($query)){
			foreach ($query as $key => $value) {
				$output .= "<tr>
								<td class='text-center' style='width: 3%;'>".($key+1)."</td>
								<td class='text-center'>".$value->product_no."</td>
								<td class='text-center'>".$value->product_name."</td>
								<td class='text-center'>".$value->qty."</td>
								<td class='text-center'>".$value->unit_code."</td>
								<td class='text-right'>".number_format($value->selling_price, 2)."</td>
								<td class='text-right'>".number_format($value->volume_discount, 2)."</td>
								<td class='text-right'>".number_format($value->total_selling_price, 2)."</td>
							</tr>";
			}
		}else{

		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}

if (!function_exists("end_day_query")){
	function end_day_query($query, $account_id){

		$output = "";
		$btn = "";

		$output .= "<table class='table table-bordered table-striped table-sm' id='end_day_tbl'>
						<thead>
							<tr>
								<th>Trans Date</th>
								<th>Outlet No</th>
								<th>User ID</th>
								<th>No. of Trans</th>
								<th>Currency</th>
								<th>Total Sales</th>
								<th>Total VAT Amount</th>
								<th>Net of VAT</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>";

		if (!empty($query)){

			foreach ($query as $key => $value) {

				if ($value->status == "1"){
					$btn = "<button class='btn btn-query btn-primary btn-block px-0 py-0' onclick='closed(".$key.")'>Close</button>";		
				}else if ($value->status == "2" && $value->trans_date == date("Y-m-d")){
					$btn = "<button class='btn btn-query btn-warning btn-block px-0 py-0' onclick='open_process(".$key.")'>Open</button>";										
				}else{
					$btn = "<button class='btn btn-query btn-success btn-block px-0 py-0' onclick='view(".$key.")'>View</button>";					
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
								<td class='text-center'>".$btn."</td>
								<td class='tbl_outlet_id' hidden>".$value->outlet_id."</td>
								<td class='tbl_user_id' hidden>".$value->user_id."</td>
							</tr>";

			}

		}

		return $output;

	}
}