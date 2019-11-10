<?php 

if (!function_exists("table_user")){
	function table_user($query){

		$output = "";

		$output .= "<table class='table table-striped table-responsive' style='height: 450px;'>
                            <thead>
                                <tr>
                                    <th colspan='2'>Name</th>
                                </tr>
                            </thead>
					<tbody>";

		if (!empty($query)){
			$status = "";
			foreach ($query as $key => $value) {
			
				$output .= "<tr>
								<td style='width: 10%;'><input type='checkbox' class='form-control' data-id=".$value->id."></td>
                                <td style='width: 90%;' >".$value->name."</td>
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