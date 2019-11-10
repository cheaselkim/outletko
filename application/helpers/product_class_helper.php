<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query, $app_func){

		$output = "";
		$button = "";

		$output .= "<table class='table table-striped table-bordered table-sm' id='tbl-data'>
					<thead>
						<tr>
							<th style='width: 5%;'> Class Code</th>
							<th style='width: 20%;'> Class Name</th>
							<th style='width: 20%;'> Category</th>
							<th style='width: 3%;'>Outlet</th>
							";
							if ($app_func != "3"){
								$output .= "<th style='width: 5%;'>Action</th>";
							}

		$output .= 		"</tr>
					</thead>
					<tbody>";


		foreach ($query as $key => $value) {

			if ($app_func == "2"){
				$button = "<button class='btn btn-primary btn-block btn-query py-0' onclick = 'edit_prod_class(".$value->id.")'>Edit</button>";
			}else if ($app_func == "3"){
				$button = "<button class='btn btn-success btn-block btn-query'>View</button>";
			}else if ($app_func == "5"){
				$button = "<button class='btn btn-danger btn-block btn-query py-0' onclick = 'delete_prod_class(".$value->id.", ".$key.")'>Delete</button>";
			}

			$output .= "<tr>
							<td>".$value->class_code."</td>
							<td>".$value->class_name."</td>
							<td>".$value->category_name."</td>
							<td>".$value->outlet_desc."</td>
							";
	
							if ($app_func  != "3"){
								$output .= "<td>".$button."</td>";
							}

						"</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}

if (!function_exists("entry_query")){
	function entry_query($query){

		$output = "";
		$button = "";

		$output .= "<table class='table table-striped table-bordered table-sm' id='tbl-data'>
					<thead>
						<tr>
							<th style='width: 20%;'> Category</th>
							<th style='width: 20%;'> Class Code</th>
							<th style='width: 30%;'> Class Name</th>
							<th style='width: 10%;'>Outlet</th>";
		$output .= 		"</tr>
					</thead>
					<tbody>";


		foreach ($query as $key => $value) {

			$output .= "<tr>
							<td>".$value->category_name."</td>
							<td>".$value->class_code."</td>
							<td>".$value->class_name."</td>
							<td>".$value->outlet_desc."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}
