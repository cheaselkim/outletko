<?php 

if (!function_exists("product_transfer")){
	function product_transfer($query){
		$output = "";

		$output .= "<table class='table table-striped table-fixed fixed_header text-table table-hover table-sm' id='tbl-product-transfer'>
					<thead style='width: 100%;'>
						<tr>
							<th class='text-left' style='width: 15%;'>Issuance No</th>
                            <th class='text-left' style='width: 15%;'>Transfer Date</th>
                            <th class='text-left' style='width: 15%;'>From (Oultet)</th>
                            <th class='text-left' style='width: 15%;'>To (Outlet)</th>
                            <th class='text-left' style='width: 30%;'>Transferred By</th>
						</tr>
					</thead>
					<tbody >";

		if (!empty($query)){
			$status = "";
			foreach ($query as $key => $value) {
								$output .= "<tr class='cursor-pointer' onclick='product_transfer_tbl(".$key.")'>
								<td class='text-left' style='width: 15%;'>".$value->inv_no."</td>
								<td class='text-left' style='width: 15%;'>".date('m/d/Y', strtotime($value->inv_date))."</td>
								<td class='text-left' style='width: 15%;'>".$value->comp_outlet_code."</td>
								<td class='text-left' style='width: 15%;'>".$value->recipient_outlet_code."</td>
								<td class='text-left' style='width: 30%;'>".$value->created_name."</td>
  						    </tr>";
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

if (!function_exists("sales_register")){
	function sales_register($query, $outlet_code){

		$output = "";

		$output .= "<table class='table table-striped table-hover table-bordered table-sm' id='tbl-sales-register'>
					<thead class='w-100'>
						<tr>
							<th class='text-left' style='width: 8%;'>Trans No</th>
							<th class='text-left' style='width: 10%;'>Trans Date</th>
							<th class='text-left' style='width: 10%;'>Cust Code</th>
							<th class='text-left' style='width: 30%;'>Cust Name</th>
							<th class='text-left' style='width: 5%;'>Outlet</th>
							<th class='text-left' style='width: 10%;'>Total Amount</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {

				$output .= "<tr class='cursor-pointer' onclick='sales_register_products(".$value->id.")'>
								<td class='text-left' style='width: 8%;'>".$value->trans_no."</td>
								<td class='text-left' style='width: 10%;'>".date('m/d/Y', strtotime($value->trans_date))."</td>
								<td class='text-left' style='width: 10%;'>".$value->cust_code."</td>
								<td class='text-left' style='width: 30%;'>".$value->cust_name."</td>
								<td class='text-left' style='width: 5%;'>".$outlet_code."</td>
								<td class='text-left' style='width: 10%;'>".number_format($value->total_amount, 2)."</td>
							</tr>";
			}
		}

		$output .= "</tbody>
					</table>";

		return $output;

	}
}

if (!function_exists("sales_register_products")){
	function sales_register_products($query, $query2){

		$output = "";
		$return_qty = "0";

		$output .= "<table class='table table-striped table-bordered table-hover table-sm' id='tbl-sales-register-dtl'>
					<thead class='w-100'>
						<tr>
							<th class='text-left ' style='width: 10%;'>Product No</th>
							<th class='text-left ' style='width: 43%;'>Product Name</th>
							<th class='text-left ' style='width: 5%;'>Qty Sold</th>
							<th class='text-left ' style='width: 5%;'>Returned</th>
							<th class='text-left ' style='width: 7%;'>For Return</th>
							<th class='text-left ' style='width: 5%;'>Unit</th>
							<th class='text-left ' style='width: 5%;'>Action</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {
				$return_qty = "0";

				if (!empty($query2)){
					for ($i=0; $i < COUNT($query2); $i++) { 
						if($query2[$i]['prod_id'] == $value->prod_id){
							$return_qty = $query2[$i]['return_qty'];
						}
					}

				}

				$output .= "<tr class='cursor-pointer'>
								<td style='width :10%;'class='tbl-prod-no'>".$value->product_no."</td>
								<td style='width :43%;'class='tbl-prod-name'>".$value->product_name."</td>
								<td style='width :5%;' class='tbl-qty'>".number_format($value->qty, 2)."</td>
								<td style='width :5%;' class='tbl-qty-returned'>".number_format($return_qty, 2)."</td>
								<td style='width :7%;' class='tbl-qty-return'></td>
								<td style='width :5%;' class='tbl-unit'>".$value->unit_code."</td>
								<td style='width :5%;' class='tbl-unit-price' hidden>".$value->selling_price."</td>
								<td style='width :5%;' class='tbl-prod-grade' hidden></td>
								<td style='width :5%;' class='tbl-date-return' hidden></td>
								<td style='width :5%;' class='tbl-reason' hidden></td>
								<td style='width :5%;' class='tbl-reference' hidden>".$value->trans_no."</td>
								<td style='width :5%;' class='tbl-vat' hidden>".$value->vat."</td>
								<td style='width :5%;' class='tbl-prod-id' hidden>".$value->prod_id."</td>
								<td style='width :5%;' class='tbl-id' hidden>".$value->id."</td>
								<td style='width :5%;'><button class='btn btn-orange btn-block btn-query px-0 py-0' onclick='return_sales(".$value->id.", ".$key.")'>Return</button></td>
							</tr>";
			}
		}else{
			$output .= "<tr>
							<td>Products already selected OR Products is Services</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}

if (!function_exists("table_receive")){
	function table_receive($query, $function, $outlet_code){

		$output = "";

		$output .= "<table class='table table-striped table-fixed fixed_header text-table table-hover table-sm table-bordered' id='tbl-receive' >
					<thead style='width: 100%;'>
						<tr>
							<th class='text-left' style='width: 12%;'>Receive No</th>
                            <th class='text-left' style='width: 15%;'>Receive Date</th>
                            <th class='text-left d-none d-lg-block w-100' style='width: 12%;'>Transaction Type</th>
                            <th class='text-left' style='width: 40%;'>Outlet / Vendor Name</th>
                            <th class='text-left' style='width: 8%;'>Outlet</th>
                            <th style='width: 7%;' class='text-center'>Action</th>
						</tr>
					</thead>
					<tbody >";

		if (!empty($query)){
			$status = "";
			$id = "";
			$disabled = "";
			foreach ($query as $key => $value) {
				
				if ($value->inv_status == "1"){
					$id = $value->hdr_id;
					$disabled = "";
				}else{
					$id = "0";
					$disabled = "disabled";
				}

				if ($function == '2'){
					$btn = "<button class='btn btn-primary btn-query btn-block py-0' onclick='edit_receive(".$id.")' ".$disabled.">Edit</button>";					
				}else if ($function == "3"){
					$btn = "<button class='btn btn-success btn-query btn-block py-0' onclick='view_receive(".$id.", ".$value->recipient_type.")' ".$disabled.">View</button>";
				}else{
					$btn = "<button class='btn btn-danger btn-query btn-block py-0' onclick='cancel_receive(".$id.", ".$key.", ".$value->ref_trans_id.")' ".$disabled.">Cancel</button>";
				}

				$output .= "<tr>
								<td class='text-left' style='width: 12%;'>".$value->inv_no."</td>
								<td class='text-left' style='width: 15%;'>".date('m/d/Y', strtotime($value->inv_date))."</td>
								<td class='text-left d-none d-lg-block w-100' style='width: 12%;'>".$value->inventory_ref_type."</td>
								<td class='text-left' style='width: 40%;'>".$value->supplier_name2."</td>
								<td class='text-left' style='width: 8%;'>".$outlet_code."</td>
								<td style='width: 7%;' class='text-center'>".$btn."</td>
  						    </tr>";
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

if (!function_exists("inventory_dtl")){
	function inventory_dtl($query){

		$output = "";

		$output .= "<table class='table table-sm table-striped'>
					<thead>
						<tr>
							<th class='text-left'>Product No</th>
							<th class='text-left'>Product Name</th>
							<th class='text-left'>Qty</th>
							<th class='text-left'>Unit</th>
							<th class='text-left'>Cost</th>
							<th class='text-left'>VAT</th>
							<th class='text-left'>Total Price</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {
			$output .= "<tr>
							<td class='text-left'>".$value->product_no."</td>
							<td class='text-left'>".$value->product_name."</td>
							<td class='text-left'>".number_format($value->qty, 2)."</td>
							<td class='text-left'>".$value->unit_desc."</td>
							<td class='text-left'>".number_format($value->cost, 2)."</td>
							<td class='text-left'>".$value->cost."</td>
							<td class='text-left'>".number_format(($value->cost * $value->qty), 2)."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}