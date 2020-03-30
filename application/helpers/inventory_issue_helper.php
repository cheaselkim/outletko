<?php 

if (!function_exists("table_issue")){
	function table_issue($query, $function){

		$output = "";

		$output .= "<table class='table table-striped table-fixed fixed_header text-table table-hover table-sm table-bordered' id='tbl-issue'>
					<thead class='w-100'>
						<tr>
							<th class='text-left' style='width: 11%;'>Transfer No</th>
                            <th class='text-left  d-none d-lg-table-cell' style='width: 10%;'>Transfer Date</th>
                            <th class='text-left d-none d-lg-table-cell' style='width: 15%;'>Transaction Type</th>
                            <th class='text-left' style='width: 23%;'>Outlet / Vendor Name</th>
                            <th class='text-left  d-none d-lg-table-cell' style='width: 8%;'>Outlet</th>
                            <th style='width: 8%;' class='text-center'>Action</th>
						</tr>
					</thead>
					<tbody>";

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
					$btn = "<button class='btn btn-primary btn-query py-0' onclick='edit_issue(".$id.")' ".$disabled.">Edit</button>";					
				}else if ($function == "3"){
					$btn = "<button class='btn btn-success btn-query py-0' onclick='view_issue(".$id.", ".$value->recipient_type.")' >View</button>";
				}else{
					$btn = "<button class='btn btn-danger btn-query py-0' onclick='delete_issue(".$id.", ".$key.")' ".$disabled.">Delete</button>";
				}

				$output .= "<tr>
								<td class='text-left' style='width: 11%;'>".$value->inv_no."</td>
								<td class='text-left  d-none d-lg-table-cell' style='width: 10%;'>".date('m/d/Y', strtotime($value->inv_date))."</td>
								<td class='text-left d-none d-lg-table-cell' style='width: 15%;'>".$value->inventory_ref_type."</td>
								<td class='text-left' style='width: 23%;'>".$value->recipient."</td>
								<td class='text-left  d-none d-lg-table-cell' style='width: 8%;'>".$value->recipient_code."</td>
								<td style='width: 8%;' class='text-center'>".$btn."</td>
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

if (!function_exists("sales_register")){
	function sales_register($query, $outlet_code){

		$output = "";

		$output .= "<table class='table table-striped table-hover table-bordered table-sm' id='tbl-sales-register'>
					<thead class='w-100'>
						<tr>
							<th class='text-left' style='width: 8%;'>Trans No</th>
							<th class='text-left d-none d-lg-table-cell' style='width: 10%;'>Trans Date</th>
							<th class='text-left  d-none d-lg-table-cell' style='width: 10%;'>Cust Code</th>
							<th class='text-left' style='width: 30%;'>Cust Name</th>
							<th class='text-left  d-none d-lg-table-cell' style='width: 5%;'>Outlet</th>
							<th class='text-left' style='width: 10%;'>Total Amount</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {

				$output .= "<tr class='cursor-pointer' onclick='sales_register_products(".$value->id.")'>
								<td class='text-left ' style='width: 8%;'>".$value->trans_no."</td>
								<td class='text-left  d-none d-lg-table-cell' style='width: 10%;'>".date('m/d/Y', strtotime($value->trans_date))."</td>
								<td class='text-left  d-none d-lg-table-cell' style='width: 10%;'>".$value->cust_code."</td>
								<td class='text-left' style='width: 30%;'>".$value->cust_name."</td>
								<td class='text-left  d-none d-lg-table-cell' style='width: 5%;'>".$outlet_code."</td>
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
	function sales_register_products($query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-hover table-sm' id='tbl-sales-register-dtl'>
					<thead class='w-100'>
						<tr>
							<th class='text-left ' style='width: 7%;'>Product No</th>
							<th class='text-left  d-none d-lg-table-cell' style='width: 20%;'>Product Name</th>
							<th class='text-left ' style='width: 5%;'>Qty</th>
							<th class='text-left  d-none d-lg-table-cell' style='width: 3%;'>Unit</th>

							<th class='text-left ' style='width: 7%;'>Product No</th>
							<th class='text-left  d-none d-lg-table-cell' style='width: 20%;'>Product Name</th>
							<th class='text-left ' style='width: 7%;'>Replace Qty</th>

							<th class='text-left ' style='width: 7%;'>Action</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			foreach ($query as $key => $value) {

				$output .= "<tr class='cursor-pointer'>
								<td style='width :7%;'class='tbl-prod-no bg-button'>".$value->product_no."</td>
								<td style='width :20%;'class='tbl-prod-name bg-button  d-none d-lg-table-cell'>".$value->product_name."</td>
								<td style='width :5%;' class='tbl-qty bg-button'>".$value->qty."</td>
								<td style='width :3%;' class='tbl-unit bg-button  d-none d-lg-table-cell'>".$value->unit_code."</td>

								<td style='width :7%;' class='tbl-prod-no-replace'></td>
								<td style='width :20%;' class='tbl-prod-name-replace  d-none d-lg-table-cell'></td>
								<td style='width :7%;' class='tbl-qty-replace'></td>
								<td style='width :7%;' class='tbl-unit-replace' hidden></td>
								<td style='width :7%;' class='tbl-unit-price-replace' hidden></td>

								<td style='width :5%;' class='tbl-unit-price' hidden>".$value->selling_price."</td>
								<td style='width :5%;' class='tbl-prod-grade' hidden>1</td>
								<td style='width :5%;' class='tbl-date-replace' hidden></td>
								<td style='width :5%;' class='tbl-reason' hidden></td>
								<td style='width :5%;' class='tbl-reference' hidden>".$value->trans_no."</td>
								<td style='width :5%;' class='tbl-vat' hidden>".$value->vat."</td>
								<td style='width :5%;' class='tbl-prod-id' hidden>".$value->prod_id."</td>
								<td style='width :5%;' class='tbl-prod-id-replace' hidden></td>

								<td style='width :5%;' class='tbl-id' hidden>".$value->id."</td>
								<td style='width :7%;'><button class='btn btn-orange btn-block btn-query px-0 py-0' onclick='replace_product(".$value->id.", ".$key.")'>Replace</button></td>
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

if (!function_exists("inventory_dtl")){
	function inventory_dtl($query){

		$output = "";

		$output .= "<table class='table table-sm table-striped'>
					<thead class='w-100'>
						<tr>
							<th class='text-left' style='width:10%;'>Prod No</th>
							<th class='text-left'>Product Name</th>
							<th class='text-left' style='width:7%;'>Qty</th>
							<th class='text-left' style='width:7%;'>Unit</th>
							<th class='text-left' style='width:9%;'> Price</th>
							<th class='text-left' style='width:13%;'>Total Price</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {
			$output .= "<tr>
							<td class='text-left' style='width:10%;'>".$value->product_no."</td>
							<td class='text-left'>".$value->product_name."</td>
							<td class='text-left' style='width:7%;'>".number_format($value->qty, 2)."</td>
							<td class='text-left' style='width:7%;'>".$value->unit_code."</td>
							<td class='text-left' style='width:9%;'>".number_format($value->cost, 2)."</td>
							<td class='text-left' style='width:13%;'>".number_format(($value->cost * $value->qty), 2)."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}