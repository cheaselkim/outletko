<?php 
if (!function_exists("report_17_print")){
	function report_17_print($query){

		$output = "";
		$currency = "";
		$total_trans = 0;
		$total_amount = 0;
		$total_vat = 0;
		$total_net_vat = 0; 

		$output .= '<table >
					<thead style="width: 100%;" class="">
						<tr>
							<th class="text-center" style="width: 30%;">Outlet</th>
							<th class="text-center" style="width: 10%;">Currency</th>
							<th class="text-center" style="width: 15%;">No. of Trans</th>
							<th class="text-center" style="width: 15%;">Total Amount</th>
							<th class="text-center" style="width: 15%;">VAT Amount</th>
							<th class="text-center" style="width: 15%;">Net of VAT3</th>
						</tr>
					</thead>
					<tbody>';

		if (!empty($query)){
			foreach ($query as $key => $value) {
				$output .= "<tr  onclick='select_outlet(".$value->id.")'>
								<td class='text-center' style='width: 30%;'>".$value->outlet_code."</td>
								<td class='text-center' style='width: 10%;'>".$value->curr_code."</td>
								<td class='text-center' style='width: 15%;'>".number_format($value->total_transaction)."</td>
								<td class='text-center' style='width: 15%;'>".number_format($value->total_amount,2)."</td>
								<td class='text-center' style='width: 15%;'>".number_format($value->total_vat_amount, 2)."</td>
								<td class='text-center' style='width: 15%;'>".number_format($value->total_net_vat, 2)."</td>
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
							<th class='text-center bg-button' style='width: 10%;'>".$currency."</th>
							<th class='text-center bg-button' style='width: 15%;'>".number_format($total_trans)."</th>
							<th class='text-center bg-button' style='width: 15%;'>".number_format($total_amount,2)."</th>
							<th class='text-center bg-button' style='width: 15%;'>".number_format($total_vat,2)."</th>
							<th class='text-center bg-button' style='width: 15%;'>".number_format($total_net_vat,2)."</th>
						</tr>
					</tfoot>
					</table>";


		return $output;

	}
}

if (!function_exists("sales_transaction_print")){
	function sales_transaction_print($query){

		$output = "";
		$status = "";

		$output .= '<table border="1"  class="table table-striped table-bordered table-sm" id="tbl-receive">
					<thead>
						<tr>
							<th align="center">Trans No.</th>
                            <th align="center">Trans Date</th>
                            <th align="center">Customer Name</th>
                            <th align="center">Currency</th>
                            <th align="center">Trans Amount</th>
                            <th align="center">Outlet</th>
                            <th align="center">Status</th>
						</tr>
					</thead>
					<tbody>';

		if (!empty($query)){
			foreach ($query as $key => $value) {

				if ($value->status == "1"){
					$status = "Served";
				}else{
					$status = "Cancelled";
				}

				$output .= '<tr>
								<td align="center">'.$value->trans_no.'</td>
								<td align="center">'.date('m/d/Y', strtotime($value->date_insert)).'</td>
								<td align="center">'.$value->cust_name.'</td>
								<td align="center">'.$value->currency.'</td>
								<td align="right">'.number_format($value->total_amount, 2).'</td>
								<td align="center">'.$value->outlet_code.'</td>
								<td align="center">'.$status.'</td>
  						    </tr>';
			}
		}else{
			$output .= "<tr>
						<td colspan='8'>No Data...</td>
					  </tr>";
		}


		$output .= '</tbody>
					</table>';


		return $output;


	}
}

if (!function_exists("sales_per_product_print")){
	function sales_per_product_print($query){

		$output = "";

		$output .= '<table>
					<thead>
						<tr>
							<th>Product No</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Class</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Currency</th>
                            <th>Total Amount</th>
						</tr>
					</thead>
					<tbody>';

		if (!empty($query)){
			foreach ($query as $key => $value) {
			
				if (!empty($value->product_no)){				
					$output .= '<tr>
									<td>'.$value->product_no.'</td>
									<td>'.$value->product_name.'</td>
									<td>'.$value->category_desc.'</td>
									<td>'.$value->class_desc.'</td>
									<td>'.$value->total_qty.'</td>
									<td>'.$value->unit_desc.'</td>
									<td>'.$value->currency.'</td>
									<td>'.number_format($value->total_amount, 2).'</td>
	  						    </tr>';
				}

			}
		}else{
			$output .= "<tr>
						<td colpan='8'>No Data</td>
					  </tr>";
		}


		$output .= "</tbody>
					</table>";


		return $output;


	}
}

//-------FOR AGENT REPORT------------
if (!function_exists("sales_per_agent_print")){
	function sales_per_agent_print($query){

		$output = "";

		$output .= '<table>
					<thead>
						<tr>
							<th>Agent/Partner ID</th>
                            <th>Agent/Partner Name</th>
                            <th>Currency</th>
                            <th>Total Amount</th>
                            <th>Share Amount</th>
						</tr>
					</thead>
					<tbody>';

		if (!empty($query)){
			foreach ($query as $key => $value) {
			

				$output .= '<tr>
								<td>'.$value->id.'</td>
								<td>'.$value->agent_name.'</td>
								<td>'.$value->currency.'</td>
								<td>'.number_format($value->total_amount, 2).'</td>
								<td>'.number_format($value->share, 2).'</td>
  						    </tr>';
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

if (!function_exists("inventory_transaction_print")){
	function inventory_transaction_print($query){

		$output = "";

		$output .= '<table>
					<thead>
						<tr>
							<th>Transaction No.</th>
                            <th>Transaction Date</th>
                            <th>Vendor/Outlet Code</th>
                            <th>Vendor/Outlet Name</th>
                            <th>Trans Type</th>
                            <th>Outlet</th>
						</tr>
					</thead>
					<tbody>';

		if (!empty($query)){
			foreach ($query as $key => $value) {
			

				$output .= '<tr>
								<td>'.$value->inv_no.'</td>
								<td>'.$value->inv_date.'</td>
								<td>'.$value->supplier_code2.'</td>
								<td>'.$value->supplier_name2.'</td>
								<td>'.$value->inventory_ref_type.'</td>
								<td>'.$value->outlet.'</td>
  						    </tr>';
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

//-------FOR SUB REPORT------------
if (!function_exists("sales_transaction_sub")){
	function sales_transaction_sub($query){

		$output = "";
		$status = "";

		$output .= '<table >
					<thead>
						<tr>
							<th>Trans No.</th>
                            <th>Trans Date</th>
                            <th>Customer No.</th>
                            <th>Customer Name</th>
                            <th>Outlet</th>
                            <th>Currency</th>
                            <th>Trans Sales</th>
                            <th>Vat Amount</th>
                            <th>Net Vat</th>
                            
						</tr>
					</thead>
					<tbody>';
		$total_trans_amount = 0;
		$total_vat_amount = 0;
		$total_net_vat = 0;
		if (!empty($query)){
			foreach ($query as $key => $value) {
				$total_trans_amount = $total_trans_amount + $value->total_amount;
				$total_vat_amount = $total_vat_amount + $value->vat_amount;
				$total_net_vat = $total_net_vat + $value->net_vat;
				if ($value->status == "1"){
					$status = "Served";
				}else{
					$status = "Cancelled";
				}

				$output .= '<tr>
								<td>'.$value->trans_no.'</td>
								<td>'.date('m/d/Y', strtotime($value->date_insert)).'</td>
								<td>'.$value->cust_code.'</td>
								<td>'.$value->cust_name.'</td>
								<td>'.$value->outlet_code.'</td>
								<td>'.$value->currency.'</td>
								<td>'.number_format($value->total_amount, 2).'</td>
								<td>'.number_format($value->vat_amount, 2).'</td>
								<td>'.number_format($value->net_vat, 2).'</td>
  						    </tr>';
			}
		}else{
			$output .= "<tr>
						<td colspan='8'>No Data...</td>
					  </tr>";
		}


		$output .= "</tbody>
					<tfoot>
						<tr>
							<td colspan ='4'>TOTAL</td>
							<td colspan ='2' >PHP</td>
							<td class='text-right'>".number_format($total_trans_amount, 2)."</td>
							<td class='text-right'>".number_format($total_vat_amount, 2)."</td>
							<td class='text-right'>".number_format($total_net_vat, 2)."</td>
						</tr>
					</tfoot>
					</table>";


		return $output;


	}
}

if (!function_exists("sales_transaction_sub_2")){
	function sales_transaction_sub_2($query,$hdr){

		$output = "";
		$status = "";
		$trans_discount = 0;
		$sub_total = 0;
		$vat_amount = 0;
		$net_vat = 0;
		foreach ($hdr as $key => $value) {
			$trans_discount = $value->sales_discount;
			$sub_total = $value->total_amount;
			$vat_amount = $value->vat_amount;
			$net_vat = $value->net_vat;
		}

		$output .= '<table>
					<thead>
						<tr>
							<th>Product No.</th>
                            <th>Product Name</th>
                            <th>Agent Code</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Total Discount</th>
                            <th>Discounted Price</th>
                            
                            
						</tr>
					</thead>
					<tbody>';
		$total_price_2 = 0;
		$total_vol_discount = 0;
		$total_selling_price = 0;
		$total_price = 0;
		if (!empty($query)){
			foreach ($query as $key => $value) {
				$total_price = $value->qty * $value->selling_price;
				$total_price_2 = $total_price_2 + $total_price;
				$total_vol_discount = $total_vol_discount + $value->volume_discount;
				$total_selling_price = $total_selling_price + $value->total_selling_price;
				
				$output .= '<tr>
								<td>'.$value->product_no.'</td>
								<td>'.$value->product_name.'</td>
								<td>'.$value->account_id.'</td>
								<td>'.$value->qty.'</td>
								<td>'.number_format($value->selling_price, 2).'</td>
								<td>".number_format($total_price, 2)."</td>
								<td>'.number_format($value->volume_discount, 2).'</td>
								<td>'.number_format($value->total_selling_price, 2).'</td>
  						    </tr>';
			}
		}else{
			$output .= "<tr>
						<td colspan='8'>No Data...</td>
					  </tr>";
		}


		$output .= "</tbody>
					<tfoot>
						<tr>
							<td colspan ='5' class='text-right'>TOTAL</td>
							<td class='text-right'>".number_format($total_price_2, 2)."</td>
							<td class='text-right'>".number_format($total_vol_discount, 2)."</td>
							<td class='text-right'>".number_format($total_selling_price, 2)."</td>
						</tr>
						<tr>
							<td colspan ='7' class='text-right'>Transaction Discount</td>
							<td class='text-right'>".number_format($trans_discount, 2)."</td>
						</tr>
						<tr>
							<td colspan ='7' class='text-right'>Sub Total</td>
							<td class='text-right'>".number_format($sub_total, 2)."</td>
						</tr>
						<tr>
							<td colspan ='7' class='text-right'>Vat Amount</td>
							<td class='text-right'>".number_format($vat_amount, 2)."</td>
						</tr>
						<tr>
							<td colspan ='7' class='text-right'>TOTAL</td>
							<td class='text-right'>".number_format($net_vat, 2)."</td>
						</tr>
					</tfoot>
					</table>";


		return $output;


	}
}


if (!function_exists("stock_onhand_print")){

	function stock_onhand_print($query){



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
