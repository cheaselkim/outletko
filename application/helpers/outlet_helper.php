<?php 



if (!function_exists("table_outlet")){

	function table_outlet($query, $function){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-bordered table-sm' id='tbl-outlet'>

					<thead class='w-100'>

						<tr>

							<th style='width: 8%;' class='text-left'>Outlet No</th>

                            <th style='width: 15%;' class='text-left'>Outlet Name</th>

                            <th style='width: 22%;' class='text-left'>Address</th>

                            <th style='width: 10%;'  class='text-left'>Type</th>

                            <th style='width: 11%;' class='text-left'>Montly Quota</th>

                            <th style='width: 5%;'  class='text-left'>Status</th>

                            <th style='width: 5%;'  class='text-left'>Action</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			$status = "";
			$disabled = "";

			foreach ($query as $key => $value) {

				if ($value->outlet_status == "1"){
					$disabled = "";
					$status = "Operational";

				}else{
					$disabled = "disabled";
					$status = "Closed";

				}



				if ($function == '2'){

					$btn = "<button class='btn btn-primary btn-block py-0 btn-query' onclick='edit_outlet(".$value->id.")' ".$disabled.">Edit</button>";					

				}else if ($function == "3"){

					$btn = "<button class='btn btn-primary btn-block py-0 btn-query' onclick='view_outlet(".$value->id.")'>View</button>";

				}else{
					$btn = "<button class='btn btn-danger btn-block py-0 btn-query' onclick='cancel_outlet(".$value->id.", ".$key.")' ".$disabled.">Close</button>";

				}



				$output .= "<tr>

								<td style='width: 6%;'>".$value->outlet_code."</td>

								<td style='width: 20%;'>".$value->outlet_name."</td>

								<td style='width: 20%;'>".$value->outlet_location."</td>

								<td style='width: 10%;'>".$value->outlet_type_desc."</td>

								<td style='width: 8%;' class='text-right'>".number_format($value->outlet_monthly_quota, 2)."</td>

								<td style='width: 5%;'>".$status."</td>

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



if (!function_exists("list_outlet")){

	function list_outlet($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-sm' id='tbl-outlet'>

					<thead class='w-100'>

						<tr>

							<th style='width: 12%;' class='text-left'>Outlet No</th>

                            <th style='width: 35%;' class='text-left'>Outlet Name</th>

                            <th style='width: 10%;' class='text-left'> Outlet Status</th>

                            <th style='width: 20%;' class='text-left'>City / Province</th>

                            <th style='width: 10%;' class='text-left'>Sales Target</th>

						</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			$status = "";

			foreach ($query as $key => $value) {

				if ($value->outlet_status == "1"){

					$status = "Operational";

				}else{

					$status = "Closed";

				}



				$output .= "<tr>

								<td class='text-left' style='width: 12%;'>".$value->outlet_code."</td>

								<td class='text-left' style='width: 35%;'>".$value->outlet_name."</td>

								<td class='text-left' style='width: 10%;'>".$status."</td>

								<td class='text-left' style='width: 20%;'>".$value->city_desc.", ".$value->province_desc."</td>

								<td class='text-left' style='width: 10%;' class='text-right'>".number_format($value->outlet_monthly_quota, 2)."</td>

  						    </tr>";

			}

		}else{

			$output .= "<tr>

						<td colpan='8' style='text-align: center;'>No Data</td>

					  </tr>";

		}





		$output .= "</tbody>

					</table>";





		return $output;





	}

}



 ?>