<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query){

		$output = "";
		$img = "";

										// <div style='border: 1px solid black;background: url('../\\\/images/\\\/profile/\\\/".$img[0]."')'>
										// </div>
		$address = "";
		foreach ($query as $key => $value) {
			$img = unserialize($value->loc_image);
			$img_loc = base_url().'images/profile/'.$img[0];
			$href = base_url()."store/".str_replace(' ', '', strtolower($value->account_name))."";

			$address .= ($value->street == null ? "" : ($value->street == "" ? "" : $value->street.", "));
			$address .= ($value->village == null ? "" : ($value->village == "" ? "" : $value->village.", "));
			$address .= ($value->barangay == null ? "" : ($value->barangay == "" ? "" : $value->barangay.", "));
			$address .= ($value->city_desc == null ? "" : ($value->city_desc == "" ? "" : $value->city_desc.", "));
			$address .= ($value->province_desc == null ? "" : ($value->province_desc == "" ? "" : $value->province_desc));

			$output .= "<a class='row py-3'  style='border-bottom:1px solid gray;' href='".$href."'>
							<div class='col-12 pr-0'>
								<div class='row'>
									<div class='col-sm-auto px-0'>
										<img src='".$img_loc."' class='img-prof img-thumbnail'>
									</div>
									<div class='col-sm-10 pr-0'>
										<span class='text-black h5'>".$value->account_name."</span><br>
										<small class='text-black'>".$address."</small><br>
										<small class='text-black' hidden>+63".$value->mobile_no."</small>
										<span class='text-black'>".substr($value->about_us, 0, 120)."...</span><br>
									</div>
								</div>
							</div>
						</a>";

		}

		return $output;

	}
}