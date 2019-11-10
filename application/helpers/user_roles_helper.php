<?php 

if (!function_exists("roles_function")){
	function roles_function($module_data, $function){

		$output = "";

		$output .= "<table class='table table-bordered table-sm' id='function_tbl'>
					<thead>
						<tr>
							<th style='width: 20%;'>Module</th>
							<th style='width: 40%;'>Sub Module</th>
							<th style='width: 7%;' text-center'>All</th>
							<th style='width: 7%;' text-center'>Add</th>
							<th style='width: 7%;' text-center'>Edit</th>
							<th style='width: 5%;' text-center'>View</th>
							<th style='width: 5%;' text-center'>Cancel</th>
							<th style='width: 5%;' text-center'>Delete</th>
						</tr>
					</thead>
					<tbody>";

			$module = "";
			$module_desc = "";
			$module_count = "";
			$sub_module = "";
			$module_id = "";
			$rowspan = 1;
			$count = 0;

			foreach ($module_data as $key => $value) {

				if ($key > 1){
					if ($module === $value->module){
						$module_desc = "";
						$rowspan++;
					}else{
						$module_desc = $value->module;
						$rowspan = $rowspan;
					}						

					$output .= "<tr>
									<td rowspan='1'><span class='module_id' hidden>".$value->id."</span>".$module_desc."</td>
									<td><span class='sub_module_id' hidden>".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."</span>".$value->sub_module."</td>
								";

					if ($value->id != "6"){
						$output .= "<td class='text-center'><input type='checkbox' class='check_all' value='0'></td>
									<td class='text-center'><input type='checkbox' class='add' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='1'></td>
									<td class='text-center'><input type='checkbox' class='edit' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='2'></td>
									<td class='text-center'><input type='checkbox' class='view' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='3'></td>";
					}else{
						$output .= "<td></td>
									<td></td>
									<td></td>
									<td class='text-center'><input type='checkbox'  class='view' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='3'></td>
									<td></td>
									<td></td>";
					}

					foreach ($function as $key => $value2) {
						if ($value2->module_id != "6"){

							$module = $value->module;
							$sub_module = $value->sub_module;

							if ($module == $value2->module_desc && $sub_module == $value2->sub_module_desc){

								if ($value2->cancel == "1"){
									$output .= "<td class='text-center'><input type='checkbox' class='cancel' data-module='".$value->id."'  data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='4'></td>";
								}else{
									$output .= "<td></td>";
								}

								if ($value2->delete_1 == "1"){
									$output .= "<td class='text-center'><input type='checkbox' class='delete' data-module='".$value->id."'  data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='5'></td>";
								}else{
									$output .= "<td></td>";
								}

							}else{
							}							
						}
					}

					$output .= "</tr>";

				}else{
					$output .= "<tr>
									<td><span class='module_id' hidden>".$value->id."</span>".$value->module."</td>
									<td><span class='sub_module_id' hidden>".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."</span>".$value->sub_module."</td>
									<td class='text-center'><input type='checkbox' class='check_all' value='0'></td>
									<td class='text-center'><input type='checkbox' class='add' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='1'></td>
									<td class='text-center'><input type='checkbox' class='edit' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='2'></td>
									<td class='text-center'><input type='checkbox' class='view' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='3'></td>
									";
					if ($key == "0"){
						$output .= "<td class='text-center'><input type='checkbox' class='cancel' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='4'></td><td></td>";
					}else{
						$output .= "<td></td><td class='text-center'><input type='checkbox' class='delete' data-module='".$value->id."' data-submodule='".($value->sub_module_id == '' ? '0' : $value->sub_module_id)."' value='5'></td>";
					}


					$output .= "</tr>";

				}

				$module = $value->module;
				$sub_module = $value->sub_module;
			}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}

if (!function_exists("sales_force")){
	function sales_force($data){
		$output = "";
		$name = "";

		$output .= "<table class='table table-bordered table-sm' id='sales_force_tbl'>
					<thead>
						<tr>
							<th colspan='2' class='w-100'>Sales Force</th>
							<th class='d-sm-none d-lg-block d-xs-none d-sm-none w-100'>Position</th>
						</tr>
					</thead>
					<tbody>";

		foreach ($data as $key => $value) {
			$name = $value->first_name . " ". $value->last_name;
			$output .= "<tr>
							<td style='width: 10%;'><input type='checkbox' class='sales_check' value='".$value->user_id."' data-outlet = '".$value->outlet."'></td>
							<td style='width: 50%;' class='w-100'>".$name."</td>
							<td style='width: 40%;' class='d-sm-none d-lg-block d-xs-none d-sm-none w-100'>".$value->position."</td>
						</tr>";
		}

		$output .= "</tbody>
					</table>";

		return $output;
	}
}