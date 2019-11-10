<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query, $app_func){

		$output = "";
		$button = "";

		$output .= "<table class='table table-striped table-fixed fixed_header text-table table-hover table-sm' id='tbl-data'>
						<thead class='w-100'>
							<tr>
							<th class='text-left' style='width: 10%;'>Returned No</th>
                            <th class='text-left' style='width: 12%;'>Returned Date</th>
                            <th class='text-left' style='width: 15%;'>Transaction Type</th>
                            <th class='text-left' style='width: 43%;'>Outlet / Vendor Name</th>
                            <th class='text-left' style='width: 8%;'>Outlet</th>
                            <th style='width: 5%;' class='text-center'>Action</th>
							</tr>
						</thead>
						<tbody>";

		if (!empty($query)){

			foreach ($query as $key => $value) {

				if ($app_func == "2"){
					$button = "<button class='btn btn-primary btn-block btn-block py-0 btn-query' onclick = 'edit_return(".$value->id.")'>Edit</button>";
				}else if ($app_func == "3"){
					$button = "<button class='btn btn-success btn-block btn-block py-0 btn-query' onclick =  'view_return(".$value->id.", ".$value->recipient_type.")'>View</button>";
				}else if ($app_func == "4"){
					$button = "<button class='btn btn-danger btn-block btn-block py-0 btn-query' onclick = 'cancel_return(".$value->id.", ".$key.")'>Cancel</button>";
				}

				$output .= "<tr>
								<td class='text-left' style='width: 10%;'>".$value->inv_no."</td>
								<td class='text-left' style='width: 12%;'>".date('m/d/Y', strtotime($value->inv_date))."</td>
								<td class='text-left' style='width: 15%;'>".$value->inventory_ref_type."</td>
								<td class='text-left' style='width: 43%;'>".$value->outlet_name."</td>
								<td class='text-left' style='width: 8%;'>".$value->outlet_code."</td>
								<td  class='text-left' style='width: 5%;'>".$button."</td>
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

if (!function_exists("tbl_items")){
	function tbl_items($query){
		$output = "";

		foreach ($query as $key => $value) {
			$output .= "<tr  class='item_row_table'>
							<td class='tbl_id' hidden>".$value->id."</td>
							<td class='tbl_prod_no'>".$value->product_no."</td>
							<td class='tbl_prod_name'>".$value->product_name."</td>
							<td class='tbl_prod_unit'>".$value->unit_code."</td>
							<td class='tbl_prod_onhand_qty'>".$value->inventory_qty."</td>
							<td class='tbl_prod_return_qty'>".$value->qty."</td>
							<td class='tbl_prod_curr'>PHP</td>
							<td class='tbl_prod_price'>".$value->reg_selling_price."</td>
							<td class='tbl_prod_total_price'>".($value->reg_selling_price * $value->qty)."</td>
							<td class='text-center text-red remove_item'><i class='fa fa-minus-circle delete_item_table' style='color:red;cursor:pointer;' id='delete_item_table'></i></td>
							<td class='tbl_prod_id' hidden>".$value->prod_id."</td>
						</tr>";
		}

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
							<th class='text-left'>Selling Price</th>
							<th class='text-left'>Total Price</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {
			$output .= "<tr>
							<td class='text-left'>".$value->product_no."</td>
							<td class='text-left'>".$value->product_name."</td>
							<td class='text-left'>".number_format($value->qty, 2)."</td>
							<td class='text-left'>".$value->unit_code."</td>
							<td class='text-left'>".number_format($value->reg_selling_price, 2)."</td>
							<td class='text-left'>".number_format(($value->reg_selling_price * $value->qty), 2)."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}