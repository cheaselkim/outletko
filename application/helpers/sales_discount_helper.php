<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query, $app_func){

		$output = "";
		$button = "";
		$amount = "";
		$sign = "";

		$output .= "<table class='table table-striped table-sm table-bordered' id='tbl-data'>
					<thead>
						<tr>
							<th style='width: 20%;' class='d-none d-lg-table-cell'>Sales Discount Code</th>
							<th style='width: 50%;'>Sales Discount Name</th>
							<th style='width: 20%;'>Percent / Amount </th>
							<th style='width: 10%;'>Outlet</th>
							";
							if ($app_func != "3"){
								$output .= "<th style='width: 10%;'>Action</th>";
							}

		$output .= 		"</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {

			if ($app_func == "2"){
				$button = "<button class='btn btn-primary btn-block btn-query py-0 ' onclick = 'edit_sales_discount(".$value->id.")'>Edit</button>";
			}else if ($app_func == "3"){
				$button = "<button class='btn btn-success btn-block btn-query py-0'>View</button>";
			}else if ($app_func == "5"){
				$button = "<button class='btn btn-danger btn-block btn-query py-0' onclick = 'delete_sales_discount(".$value->id.", ".$key.")'>Delete</button>";
			}

			if ($value->sales_discount_percent != 0){
				$amount = $value->sales_discount_percent."%";
			}else{
				$amount = "&#8369; ".$value->sales_discount_amount;
			}

			$output .= "<tr>
							<td class='d-none d-lg-table-cell'>".$value->sales_discount_code."</td>
							<td>".$value->sales_discount_name."</td>
							<td class='text-right'>".$amount."</td>
							<td>".$value->outlet_desc."</td>
							";
	
							if ($app_func  != "3"){
								$output .= "<td>".$button."</td>";
							}

						"</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}


if (!function_exists("entry_query")){
	function entry_query($query){

		$output = "";
		$button = "";
		$amount = "";
		$sign = "";

		$output .= "<table class='table table-striped table-sm table-bordered' id='tbl-data'>
					<thead>
						<tr>
							<th style='width: 15%;' class='text-center'>Disc. Code</th>
							<th style='width: 30%;' class='text-center'>Discount Name</th>
							<th style='width: 23%;' class='text-center'>% / Amount </th>
							<th style='width: 5%;' class='text-center'>Outlet</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {

			if ($value->sales_discount_percent != 0){
				$amount = $value->sales_discount_percent."%";
			}else{
				$amount = "&#8369; ".$value->sales_discount_amount;
			}

			$output .= "<tr>
							<td>".$value->sales_discount_code."</td>
							<td>".$value->sales_discount_name."</td>
							<td class='text-right'>".$amount."</td>
							<td>".$value->outlet_desc."</td>
							</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}
