<?php 



if (!function_exists("list_outlet")){

	function list_outlet($query){

		$output = "";

		$i = 0;

		$url = base_url()."assets/images/app_menu/outlet.png";

		$output .= "<div class='card-deck'>";

			foreach ($query as $key => $value) {

				$i++;

                if ($i % 5 == 0){

                  $output .="</div><div class='card-deck mt-4'>";

                } 

        $output .= "<div class='card' onclick='select_outlet(".$value->outlet_id.")'>

              <div class='card-block'>

                <div class='card-body card-body-menu text-center pt-1' style='height: 181px;'>	

                   <img src='".$url."' class='img-fluid'>

                  <span class='mt-3	 font-weight-bold'>".$value->outlet_code."</span>

                </div>              

              </div>

            </div>";

        	}

        $output .= "</div>";





		return $output;

	}

}



if (!function_exists("menu_roles")){

	function menu_roles($module,$submodule,$function_module, $query){



		$output = "";

		$count_roles = COUNT($query);

		$add_disabled = "";

		$edit_disabled = "";

		$cancel_disabled = "";

		$query_disabled = "";

		$delete_disabled = "";

		$disabled = "";

		$title = "";

		$icon = "";



		if ($count_roles == 1){

			foreach ($query as $key => $value) {

				$output .= $value->function_id;

			}

		}else{	

			$output .= "<div class='card-deck'>

				<input type='hidden' id='menu_module' value='".$module."'>

				<input type='hidden' id='menu_sub_module' value='".$submodule."' readonly>";	

				$img = "";

				foreach ($function_module as $key => $value) {

					$function = $value->function;

					if ($function == "1"){

						$title = "Entry";

						$icon = "fa-pencil-alt";

						$img = base_url()."/assets/icons/menu/entry-5.png";

					}else if ($function == "2"){

						$title = "Edit";

						$icon = "fa-edit";

						$img = base_url()."/assets/icons/menu/edit-2.png";

					}else if ($function == "3"){

						$title = "Query";

						$icon = "fa-info-circle";

						$img = base_url()."/assets/icons/menu/query-4.png";

					}else if ($function == "4"){

						if ($module == "2"){
							$title = "Close";
						}else{
							$title = "Cancel";
						}

						$icon = "fa-ban";

						$img = base_url()."/assets/icons/menu/cancel-2.png";

					}else if ($function == "5"){

						$title = "Delete";

						$icon = "fa-trash-alt";

						$img = base_url()."/assets/icons/menu/cancel-1.png";

					}



					foreach ($query as $key2 => $value2) {

						if ($function == $value2->function_id){

							$disabled = "";

							break;

						}else{

							$disabled = "disabled";

						}

					}



					$output .= "<a onclick='select_function(".$submodule.", ".$function.")' class='card mx-2".$disabled."' readonly>

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3'>

			                <img src='".$img."' class='img-fluid mb-2'>  
		                	<span class='mt-2 font-weight-bold mx-auto'>".$title."</span>

			              </div>


		              </div>             

		            </a>";



				}	



					// $output .= "<a onclick='select_function(".$submodule.", ".$function.")' class='card mx-1".$disabled."' style='width: 100px;' readonly>

		   //            <div class='h-100 text-center pt-2".$disabled."'>

		   //              <div class='card-body card-body-menu text-center' style='background-image: url(".$img."); background-size: 70% 90%; background-repeat: no-repeat;	background-position: center;height: 150px !important;'>

		   //              </div>

		   //                <label class='h2 mt-2'>".$title."</label>

		   //            </div>             

		   //          </a>";



		                  // <span class='font-icons'><i class='fas ".$icon."'></i></span><br>



		                // <div class='card-body card-body-menu text-center' style='background-image: url(".base_url()."/assets/icons/menu/user-roles.png"."); background-size: 70% 100%; background-repeat: no-repeat;	background-position: center;height: 120px !important;'>

		                // </div>

		                // <div class='card-body card-body-menu text-center' style='background-image: url(".base_url()."/assets/icons/menu/lock.png"."); background-size: 70% 100%; background-repeat: no-repeat;	background-position: center;height: 120px !important;'>

		                // </div>
				if ($module == "1"){

					$output .= "<a onclick='select_function(".$submodule.", 6)' class='card' readonly>

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3'>

		                	<img src='".base_url()."/assets/icons/menu/clock.png' class='img-fluid mb-2'>  		                

		                  	<span class='mt-2 font-weight-bold'>End of Day</span>

			              </div>


		              </div>             


		            </a>";					

				}else if ($module == "5"){

					$output .= "<a onclick='select_function(".$submodule.", 6)' class='card' readonly>

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3'>

		                	<img src='".base_url()."/assets/icons/menu/user-roles.png' class='img-fluid mb-2'>  		                

		                  	<span class='mt-2 font-weight-bold'>User Roles</span>

			              </div>


		              </div>             

		            </a>";					

				}else if ($module == "8"){

					$output .= "<a onclick='select_function(".$submodule.", 6)' class='card' readonly hidden>

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3'>

 		                	<img src='".base_url()."/assets/icons/menu/lock.png' class='img-fluid mb-2'>  		                

 			                <span class='mt-2 font-weight-bold'>Change Password</span>

			              </div>


		              </div>             

		            </a>";										

					$output .= "<a onclick='select_function(".$submodule.", 6)' class='card' id='menu_config' hidden readonly>

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3'>

 		                	<img src='".base_url()."/assets/icons/menu/settings.png' class='img-fluid mb-2'>  		                

		                	<span class='mt-2 font-weight-bold'>Config</span>

			              </div>


		              </div>             

		            </a>";										


					$output .= "<a onclick='select_function(0, 7)' class='card' >

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3' style='line-height: 23px;'>

 		                	<img src='".base_url()."/assets/icons/menu/back-icon.png' class='img-fluid mb-2'>  		                

 			                <span class='mt-2 font-weight-bold'>Data Entry</span>

			              </div>


		              </div>             

		            </a>";										

					$output .= "<a onclick='select_function(0, 8)' class='card' id=''  style='line-height: 23px;'>

		              <div class='h-100".$disabled."w-100'>

			              <div class=' menu-img-box  text-center pt-3'>

 		                	<img src='".base_url()."/assets/icons/menu/post-icon.png' class='img-fluid mb-2'>  		                

		                	<span class='mt-2 font-weight-bold px-1'>Post </span>

			              </div>


		              </div>             

		            </a>";										


		                // <div class='card-body card-body-menu text-center' style='background-image: url(".base_url()."/assets/icons/menu/settings.png"."); background-size: 70% 100%; background-repeat: no-repeat;	background-position: center;height: 120px !important;'>

		                // </div>


				}



			$output .= "</div>";

		}



        return $output;



	}

}



if (!function_exists("menu_roles_with_submodule")){

	function menu_roles_with_submodule($module,$submodule_query,$function_module, $query){



		$output = "";

		$submodule_name = "";

		$submodule_id = "";

		$function = "";

		$disabled = "";

		$title = "";

		$count_roles = COUNT($query);

		$add_disabled = "";

		$edit_disabled = "";

		$cancel_disabled = "";

		$query_disabled = "";

		$pt_5 = "";



		if ($count_roles == 1){

			foreach ($query as $key => $value) {

				$output .= $value->function_id;

			}

		}else{	

			$output .= '<div class="row">

			<input type="hidden" id="menu_module" value="'.$module.'">';

			$bgcolor = "";

			$my = "";

			$text_color = "";



			foreach ($submodule_query as $key => $value) {

				$submodule_id = $value->id;

				$submodule_name = $value->sub_module_desc;

				$submodule = explode(" ", $submodule_name);

				$submodule_title = "";

				$col = "col-lg-3 col-md-3 col-sm-3";

				$my = "mt-4 pt-2";



				if ($key > 3){

					$pt_5 = "pt-3";

				}else{

					$pt_5 = "";

				}



				if ($submodule[0] == "Receive"){

					$submodule_title = "Receiving";
					$col = "col-lg-4 col-md-4 col-sm-4";

				}else{

					if ($submodule_id < 5){	

						$submodule_title = $submodule[0];

						$col = "col-lg-4 col-md-4 col-sm-4";

						$my = 'mt-4 pt-2';

					}else if ($submodule_id == "27"){
						$submodule_title = $submodule[0];

						$col = "col-lg-4 col-md-4 col-sm-4";

						$my = 'mt-4 pt-2';

					}else{

						$submodule_title = $submodule_name;

						$col = "col-lg-3 col-md-3 col-sm-3";

						$my = 'mt-4 pt-2';

					}

				}



				if ($submodule_id == "1"){

					$bgcolor = "green";

					$text_color = "white";

				}else if ($submodule_id == "2"){

					$bgcolor = "skyblue";

					$text_color = "black";

				}else if ($submodule_id == "3"){

					$bgcolor = "yellow";

					$text_color = "black";

				}else if ($submodule_id == "4"){

					$bgcolor = "rgb(179,162,199)";

					$text_color = "black";

				}else if ($submodule_id > 4 && $submodule_id < 10){

					$bgcolor = "green";

					$text_color = "white";

				}else if ($submodule_id > 9 && $submodule_id < 15){

					$bgcolor = "skyblue";

					$text_color = "black";

				}else{

					$bgcolor = "yellow";

					$text_color = "black";

				}



				$output .= '<div class="'.$col.' '.$pt_5.' mx-0 px-2" style=""> 

              <div class="flip-card" style="height: 140px;width: 100%;">

                <div class="flip-card-inner">

                  <div class="flip-card-front px-2" style="background-color: '.$bgcolor.' ">

                    <label class="'.$my.'" style="font-size: 20px; color:'.$text_color.'">'.$submodule_title.'</label>

                  </div>

                  <div class="flip-card-back" style="background-color: white;">

                    <div class="list-group h-100 rounded-0">';

				foreach ($function_module as $key2 => $value2) {

					$submodule = $value2->sub_module;

					$function = $value2->function;



					if ($submodule_id == $value2->sub_module){



						if ($function == "1"){

							$title = "Entry";

							$icon = "fa-pencil-alt";

						}else if ($function == "2"){

							$title = "Edit / Update";

							$icon = "fa-edit";

						}else if ($function == "3"){

							$title = "Query";

							$icon = "fa-info-circle";

						}else if ($function == "4"){

							$title = "Cancel";

							$icon = "fa-ban";

						}else if ($function == "5"){

							$title = "Delete";

							$icon = "fa-trash-alt";

						}



						foreach ($query as $key3 => $value3) { 

							if ($function == $value3->function_id && $submodule_id == $value3->sub_module_id){

								$disabled = "";

								break;

							}else{

								$disabled = "disabled";

							}					

						}





		                $output .= '<a onclick="select_function('.$submodule_id.', '.$function.')" class="'.$disabled.' list-group-item list-group-item-action h-25 rounded-0 d-table text-black flip-link py-0" style="border: 1px solid rgb(119,147,60)"  ><span class="prod-submenu">'.$title.'</span></a>';

		            }else{



		            }

		        

		        }



                $output .= '</div>

	                  </div>

	                </div>

	              </div>

	              </div>';

			}

			$output .= '</div>';





		}



        return $output;



	}

}