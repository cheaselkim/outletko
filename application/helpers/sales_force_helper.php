<?php 



if (!function_exists("table_sales_force")){

	function table_sales_force($query, $function){



		$output = "";

		$status = "";



		$output .= "<table style='width: 100%' class='table table-striped table-bordered table-sm' id='tbl-sales_force'>

					<thead>

						<tr>

							<th style='width: 5%;'>User ID</th>

                            <th style='width: 35%;'>Name</th>

                            <th style='width: 13%;'>Position</th>

                            <th style='width: 10%;'>Type</th>

							<th style='width: 5%;'>Outlet</th>

							<th style='width: 8%;'>All Access</th>

                            <th style='width: 5%;'>Status</th>

                            <th style='width: 5%;'>Action</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			$status = "";
			$all_access = "";

			foreach ($query as $key => $value) {



				if ($function == '2'){

					$btn = "<button class='btn btn-primary btn-query btn-block p-0' onclick='edit_sales_force(".$value->table_id.")'>Edit</button>";					

				}else if ($function == "3"){

					$btn = "<button class='btn btn-primary btn-query btn-block p-0' onclick='view_sales_force(".$value->table_id.")'>View</button>";

				}else{

					$btn = "<button class='btn btn-danger btn-query btn-block p-0' onclick='delete_sales_force(".$value->table_id.", ".$key.")'>Delete</button>";

				}



				if ($value->active == "1"){

					$status = "Active";

				}else{

					$status = "Inactive";

				}

				if ($value->all_access == "1"){
					$all_access = "Yes";
				}else{
					$all_access = "No";
				}


				$output .= "<tr>

								<td>".$value->account_id."</td>

								<td>".$value->name."</td>

								<td>".$value->position."</td>

								<td>".$value->sales_force_type."</td>

								<td>".$value->outlet_code."</td>

								<td>".$all_access."</td>

								<td>".$status."</td>

								<td>".$btn."</td>

  						    </tr>";

			}

		}else{

			$output .= "<tr>

						<td colspan='5'>No Data....</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}





if (!function_exists("sales_force_list")){

	function sales_force_list($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-sm' id='tbl-sales_force'>

					<thead style='width: 100%;'>

						<tr>

							<th style='width: 5%;'>User ID</th>

                            <th style='width: 35%;'>Name</th>

                            <th style='width: 17%;'>Position</th>

                            <th style='width: 10%;'>Type</th>

							<th style='width: 5%;'>Outlet</th>

							<th style='width: 8%;'>All Access</th>

                            <th style='width: 5%;'>Status</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			$status = "";
			$all_access = "";

			foreach ($query as $key => $value) {

				if ($value->active == "1"){

					$status = "Active";

				}else{

					$status = "Inactive";

				}

				if ($value->all_access == "1"){
					$all_access = "Yes";
				}else{
					$all_access = "No";
				}


				$output .= "<tr>

								<td>".$value->account_id."</td>

								<td>".$value->name."</td>

								<td>".$value->position."</td>

								<td>".$value->sales_force_type."</td>

								<td>".$value->outlet_code."</td>

								<td>".$all_access."</td>

								<td>".$status."</td>


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