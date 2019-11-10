<?php 

if (!function_exists("table_product")){
	function table_product($query, $function){

		$output = "";

		$output .= "<table class='table table-sm table-bordered table-striped'>
					<thead class='w-100'>
						<tr>
							<th style='width: 10%;'>Product No</th>
                            <th style='width: 30%;'>Product Name</th> 
                            <th style='width: 5%;'>Unit</th>
                            <th style='width: 15%;'>Class</th>
                            <th style='width: 7%;'>Price</th>
							<th style='width: 5%;'>Outlet</th>
                            <th style='width: 5%;' class='text-center'>Action</th>
						</tr>
					</thead>
					<tbody>";
		if (!empty($query)){
			foreach ($query as $key => $value) {

				if ($function == '2'){
					$btn = "<button class='btn btn-primary btn-block py-0 btn-query' onclick='edit_product(".$value->id.")'>Edit</button>";		
				}else if ($function == "3"){
					$btn = "<button class='btn btn-success btn-block py-0 btn-query' onclick='view_product(".$value->id.")'>View</button>";
				}else{
					$btn = "<button class='btn btn-danger btn-block py-0 btn-query' onclick='delete_product(".$value->id.", ".$key.")'>Delete</button>";
				}
				$output .= "<tr>
								<td style='width: 10%;'>".$value->product_no."</td>
								<td style='width: 30%;'>".$value->product_name."</td>
								<td style='width: 5%;'>".$value->unit_code."</td>
								<td style='width: 15%;'>".$value->class_name."</td>
								<td style='width: 7%;' class='text-right'>".number_format($value->reg_selling_price, 2)."</td>
								<td style='width: 5%;'>".$value->outlet_code."</td>
								<td style='width: 5%;'>".$btn."</td>
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

 ?>