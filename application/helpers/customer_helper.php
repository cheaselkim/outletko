<?php 

if (!function_exists("table_customer")){
	function table_customer($query, $function){

		$output = "";

		$output .= "<table style='width: 100%' class='table table-striped table-sm table-bordered' id='tbl-customer'>
					<thead>
						<tr>
							<th style='width: 7%;'>Customer No</th>
                            <th style='width: 35%;'>Customer Name</th>
                            <th style='width: 10%;'>Town / City</th>
                            <th style='width: 5%;'>Type</th>
                            <th style='width: 5%;'>Status</th>
                            <th style='width: 3%;'>Action</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			$status = "";
			$btn = "";	
			foreach ($query as $key => $value) {
				

				if ($function == '2'){
					$btn = "<button class='btn btn-primary btn-block btn-query py-0' onclick='edit_customer(".$value->id.")'>Edit</button>";					
				}else if ($function == "3"){
					$btn = "<button class='btn btn-success btn-block btn-query py-0' onclick='view_customer(".$value->id.")'>View</button>";
				}else{
					$btn = "<button class='btn btn-danger btn-block btn-query py-0' onclick='delete_customer(".$value->id.", ".$key.")'>Delete</button>";
				}

				if ($value->cust_status == "1"){
					$status = "Active";
				}else{
					$status = "Inactive";
				}

				$output .= "<tr>
								<td style='width: 7%;'>".$value->cust_code."</td>
								<td style='width: 35%;'>".$value->cust_name."</td>
								<td style='width: 10%;'>".$value->city_desc."</td>
								<td style='width: 5%;'>".$value->customer_type."</td>
								<td style='width: 5%;'>".$status."</td>
								<td style='width: 3%;'>".$btn."</td>
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

 ?>