<?php 
if (!function_exists("entry_query")){
	function entry_query($query, $sales_query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm' id='tbl-query'>
						<thead class='w-100'>
							<tr>
								<th style='width: 5%;'  class='font-weight-bold'>Product No</th>
								<th style='width: 20%;' class='font-weight-bold d-none d-lg-table-cell'>Product Nane</th>
								<th style='width: 7%;' class='font-weight-bold'>Product Quality</th>
								<th style='width: 5%;'  class='font-weight-bold  d-none d-lg-table-cell'>Unit Price</th>
								<th style='width: 7%;'  class='font-weight-bold  d-none d-lg-table-cell'>Stock on Hand</th>
								<th style='width: 3%;'  class='font-weight-bold  d-none d-lg-table-cell'>Unit</th>
								<th style='width: 5%;'  class='font-weight-bold'>Action</th>
							</tr>
						</thead>
						<tbody>";

		if (!empty($query)){
			$inv_qty = 0;
			$prod_grade = "";
			foreach ($query as $key => $value) {
				$inv_qty = $value->inventory_qty;

				if ($value->prod_grade == "1"){
					foreach ($sales_query as $key2 => $value2) {
						if ($value->id == $value2->product_id ){
							$inv_qty -= $value2->sales_qty;
							break;
						}
					}			
					$prod_grade = "Good Stock";		
				}else if ($value->prod_grade == "2"){
					$prod_grade = "Damaged / B.O.";
				}else{
					$prod_grade = "";
				}


				$output .= "<tr>
								<td style='width: 5%;' class='product_no'>".$value->product_no."</td>
								<td style='width: 20%;' class='product_name  d-none d-lg-table-cell'>".$value->product_name."</td>
								<td style='width: 7%;' class='product_grade'>".$prod_grade."</td>
								<td style='width: 5%;' class='product_price d-none d-lg-table-cell text-right'>".number_format($value->reg_selling_price, 2)."</td>
								<td style='width: 7%;' class='product_qty d-none d-lg-table-cell text-right'>".number_format($inv_qty, 2)."</td>
								<td style='width: 3%;' class='product_unit d-none d-lg-table-cell'>".$value->unit_code."</td>
								<td style='width: 5%;'><button class='btn btn-success btn-block btn-query py-0' onclick='adjust(".$value->id.", ".$key.")'>Adjust</td>
								<td class='product_tax' hidden>".$value->vat."</td>
								<td class='product_grade_id' hidden>".$value->prod_grade."</td>
							</tr>";
			}

		}


		$output .= "</tbody>
					</table>";

		return $output;

	}
}

if (!function_exists("query")){
	function query($query){

		$output = "";

		$output .= "<table class='table table-striped table-bordered table-sm' id='tbl-query'>
					<thead class='w-100'>
						<tr>
							<th class='font-weight-bold' style='width: 7%;'>Adjustment No</th>
							<th class='font-weight-bold  d-none d-lg-table-cell' style='width: 7%;'>Adjustment Date</th>
							<th class='font-weight-bold' style='width: 5%;'>Product No</th>
							<th class='font-weight-bold  d-none d-lg-table-cell' style='width: 20%; '>Product Name</th>
							<th class='font-weight-bold' style='width: 7%;'>Product Grade</th>
							<th class='font-weight-bold' style='width: 7%;'>Adjustment Qty</th>
							<th class='font-weight-bold  d-none d-lg-table-cell' style='width: 3%;'>Unit</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {
			$prod_grade = "";

			if ($value->prod_grade == "1"){
				$prod_grade = "Good Stock";
			}else if ($value->prod_grade == "2"){
				$prod_grade = "Damaged / B.O.";
			}else{
				$prod_grade = "";
			}

			$output .= "<tr>
							<td style='width: 7%;'>".$value->inv_no."</td>
							<td style='width: 7%;' class=' d-none d-lg-table-cell'>".date('m/d/Y', strtotime($value->inv_date))."</td>
							<td style='width: 5%;'>".$value->product_no."</td>
							<td style='width: 20%;' class=' d-none d-lg-table-cell'>".$value->product_name."</td>
							<td style='width: 7%;'>".$prod_grade."</td>
							<td style='width: 7%;' class='text-right'>".number_format($value->qty, 2)."</td>
							<td style='width: 3%;' class=' d-none d-lg-table-cell'>".$value->unit_code."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}
























