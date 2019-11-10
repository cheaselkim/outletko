<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query){

		$output = "";
		$img = "";

										// <div style='border: 1px solid black;background: url('../\\\/images/\\\/profile/\\\/".$img[0]."')'>
										// </div>

		foreach ($query as $key => $value) {
			$img = unserialize($value->loc_image);
			$img_loc = base_url().'images/profile/'.$img[0];
			$href = base_url()."search/outlet?store=".str_replace(' ', '-', strtolower($value->account_name))."&strid=".$value->id."";

			$output .= "<a class='row py-3'  style='border-bottom:1px solid gray;' href='".$href."'>
							<div class='col-12'>
								<div class='row'>
									<div class='col-sm-auto pr-0'>
										<img src='".$img_loc."' class='img-prof img-thumbnail'>
									</div>
									<div class='col-sm-10'>
										<span class='text-black'>".$value->account_name."</span><br>
										<small class='text-black'>".$value->city_desc.", ".$value->province_desc."</small><br>
										<span class='text-black'>".substr($value->about_us, 0, 100)."...</span><br>
									</div>
								</div>
							</div>
						</a>";

		}

		return $output;

	}
}