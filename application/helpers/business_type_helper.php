<?php 



if (!function_exists("tbl_query")){

	function tbl_query($query, $app_func){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-sm table-bordered' id='tbl-customer'>

					<thead>

						<tr>

							<th style='width: 80%;'>Business Type</th>";



							if ($app_func != "3"){

								$output .= "<th class='col-sm-1'>Action</th>";

							}



		$output .= 		"</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			$status = "";

			$btn = "";

			foreach ($query as $key => $value) {

				



				if ($app_func == '2'){

					$btn = "<button class='btn btn-primary btn-block py-0 btn-query' onclick='edit_business_type(".$value->id.")'>Edit</button>";					

				}else if ($app_func == "3"){

					$btn = "<button class='btn btn-primary btn-block py-0 btn-query' onclick='view_business_type(".$value->id.")'>View</button>";

				}else{

					$btn = "<button class='btn btn-danger btn-block py-0 btn-query' onclick='delete_business_type(".$value->id.", ".$key.")'>Delete</button>";

				}


				$output .= "<tr>

								<td>".$value->desc."</td>";

								if ($app_func  != "3"){

									$output .= "<td>".$btn."</td>";

								}



						"</tr>";

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


if (!function_exists("entry_query")){

	function entry_query($query){



		$output = "";



		$output .= "<table style='width: 100%' class='table table-striped table-sm table-bordered' id='tbl-customer'>

					<thead>

						<tr>
							
							<th style='width: 80%;'>Business Type</th>";

		$output .= 		"</tr>

					</thead>

					<tbody>";



		if (!empty($query)){

			$status = "";

			$btn = "";

			foreach ($query as $key => $value) {

				
				$output .= "<tr>
								<td>".$value->desc."</td>
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