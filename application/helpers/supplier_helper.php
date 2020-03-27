<?php 

if (!function_exists("table_supplier")){
	function table_supplier($query, $function){

		$output = "";

		$output .= "<table style='width: 100%' class='table table-striped table-sm table-bordered' id='tbl-supplier'>
					<thead>
						<tr>
							<th style='width: 10%;'  class='d-none d-lg-table-cell'>Supplier No</th>
                            <th style='width: 35%;'>Supplier Name</th>
                            <th style='width: 10%;'  class='d-none d-lg-table-cell'>Town / City</th>
                            <th style='width: 10%;'  class='d-none d-lg-table-cell'>Type</th>
                            <th style='width: 5%;'>Status</th>
                            <th style='width: 3%;'>Action</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			$status = "";
			foreach ($query as $key => $value) {
				

				if ($function == '2'){
					$btn = "<button class='btn btn-primary btn-block btn-query py-0' onclick='edit_supplier(".$value->table_id.")'>Edit</button>";					
				}else if ($function == "3"){
					$btn = "<button class='btn btn-success btn-block btn-query py-0' onclick='view_supplier(".$value->table_id.")'>View</button>";
				}else{
					$btn = "<button class='btn btn-danger btn-block btn-query py-0' onclick='delete_supplier(".$value->table_id.", ".$key.")'>Delete</button>";
				}

				$output .= "<tr>
								<td  class='d-none d-lg-table-cell'>".$value->supp_code."</td>
								<td>".$value->supp_name."</td>
								<td  class='d-none d-lg-table-cell'>".$value->city_desc."</td>
								<td  class='d-none d-lg-table-cell'>".$value->supplier_name_type."</td>
								<td>".$value->status."</td>
								<td>".$btn."</td>
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