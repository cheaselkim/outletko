<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query, $app_func){

		$output = "";
		$button = "";

		$output .= "<table class='table table-striped' id='tbl-data'>
					<thead>
						<tr>
							<th class='col-sm-1'>#</th>
							<th class='col-sm-4'>Outlet</th>
							<th class='col-sm-6'>Product Type</th>
							<th class='col-sm-1'>Action</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {

			if ($app_func == "2"){
				$button = "<button class='btn btn-primary btn-block' onclick = 'edit_prod_type(".$value->id.")'>Edit</button>";
			}else if ($app_func == "3"){
				$button = "<button class='btn btn-success btn-block' onclick = 'view_prod_type(".$value->id.", ".$key.")'>View</button>";
			}else if ($app_func == "5"){
				$button = "<button class='btn btn-danger btn-block' onclick = 'delete_prod_type(".$value->id.", ".$key.")'>Delete</button>";
			}

			$output .= "<tr>
							<td>".($key + 1)."</td>
							<td>".$value->outlet_desc."</td>
							<td>".$value->prod_type_desc."</td>
							<td>".$button."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}
