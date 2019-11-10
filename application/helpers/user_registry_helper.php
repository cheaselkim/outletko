<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query, $app_func){

		$output = "";
		$button = "";
		$status = "";

		$output .= "<table class='table table-striped table-sm table-hover table-bordered' id='tbl-data'>
					<thead class='w-100'>
						<tr>
							<th>Account ID</th>
							<th>Account Name</th>
							<th>Account Class</th>
							<th>Account Type</th>
							<th>Account Status</th>
							<th>Business Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($query as $key => $value) {

			if ($app_func == "2"){
				$button = "<button class='btn btn-primary btn-block py-0 btn-query' onclick = 'edit_user_registry(".$value->id.")'>Edit</button>";
			}else if ($app_func == "3"){
				$button = "<button class='btn btn-success btn-block py-0 btn-query' onclick = 'view_user_registry(".$value->id.")'>View</button>";
			}else if ($app_func == "5"){
				$button = "<button class='btn btn-danger btn-block py-0 btn-query' onclick = 'delete_user_registry(".$value->id.", ".$key.")'>Delete</button>";
			}

			if ($value->account_status == "1"){
				$status = "Active";
			}else{
				$status = "Inactive";
			}

			$output .= "<tr>
							<td>".$value->account_id."</td>
							<td>".$value->account_name."</td>
							<td>".$value->account_class_desc."</td>
							<td>".$value->account_type_desc."</td>
							<td>".$status."</td>
							<td>".$value->business_type_desc."</td>
							<td>".$button."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}