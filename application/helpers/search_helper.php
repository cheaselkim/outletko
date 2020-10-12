<?php 

if (!function_exists("tbl_query")){
	function tbl_query($query){

		$output = "";
		$img = "";

										// <div style='border: 1px solid black;background: url('../\\\/images/\\\/profile/\\\/".$img[0]."')'>
										// </div>
		$address = "";
		foreach ($query as $key => $value) {
            $img_alt = base_url().'assets/images/no-image.jpg';

            if (!empty($value->loc_image)){
                $img = unserialize($value->loc_image);
                $img_loc = base_url().'images/profile/'.$img[0];
            }else{
                $img_loc = $img_alt;
            }

			// $href = base_url()."store/".str_replace(' ', '', strtolower($value->account_name))."";
			$link_name = str_replace(' ', '', strtolower($value->account_name));
			$link_name = preg_replace("/[^a-zA-Z]/", "", $link_name);
			$href = base_url().$value->link_name;

			$address .= ($value->street == null ? "" : ($value->street == "" ? "" : $value->street.", "));
			$address .= ($value->village == null ? "" : ($value->village == "" ? "" : $value->village.", "));
			$address .= ($value->barangay == null ? "" : ($value->barangay == "" ? "" : $value->barangay.", "));
			$address .= ($value->city_desc == null ? "" : ($value->city_desc == "" ? "" : $value->city_desc.", "));
			$address .= ($value->province_desc == null ? "" : ($value->province_desc == "" ? "" : $value->province_desc));

			$output .= "<a class='row py-3'  style='border-bottom:1px solid gray;' href='".$href."'>
							<div class='col-12 pr-0'>
								<div class='row'>
									<div class='col-3 col-sm-auto px-0'>
										<img src='".$img_loc."' alt='logo' class='img-prof img-thumbnail'>
									</div>
									<div class='col-9 col-sm-10 pr-0'>
										<span class='text-black h5'>".$value->account_name."</span><br>
										<small class='text-black'>".$address."</small><br>
										<small class='text-black' hidden>+63".$value->mobile_no."</small>
										<span class='text-black d-none d-md-block'>".substr($value->about_us, 0, 120)."...</span>
									</div>
								</div>
							</div>
						</a>";

            $address = "";
        }

		return $output;

	}
}

if (!function_exists("tbl_prod")){
    function tbl_prod($query, $resolution, $curr){

        $output = "";

        if (!empty($query)){
            foreach ($query as $key => $value) {

                $active = "";
                $pad = "";
                $pad_div = "";

                $img_prod = unserialize($value->img_location);
                $prod_img = base_url()."images/products/".$img_prod[0];
    
    
                $comp_id = randomNumber(5).$value->comp_id.randomNumber(3);
                $prod_id = randomNumber(2).$value->id.randomNumber(3);
    
                $href_url = base_url()."products/".str_replace(" ", "-", preg_replace('/[^A-Za-z0-9\-]/', '', $value->product_name))."?".randomNumber(150)."&OS=".$comp_id."&pd=".$prod_id;
    
    
                $css_product = "background-image: url('".$prod_img."');background-size: auto 100%;background-repeat: no-repeat;background-position: center center;";
                $product_name = $value->product_name;
    
                if ($resolution < 768){
    
                    if (strlen($value->product_name) > 14){
                        $product_name = substr($value->product_name, 0, 14)."..";
                    }
    
                    if ($key % 2 == 0){
                        $margin = "ml-auto";
                    }else{
                        $margin = "mr-auto";
                    }
                    $pad = "pt-2";
                    $pad_div = "px-4";
        
                }else if ($resolution >= 768 && $resolution < 992){
    
                    if (strlen($value->product_name) > 15){
                        $product_name = substr($value->product_name, 0, 15)."..";
                    }
                    $margin = "";
                    $pad = "pt-2";
                    $pad_div = "px-3";
    
    
                }else if ($resolution >= 992 && $resolution < 1220){
                    if (strlen($value->product_name) > 12){
                        $product_name = substr($value->product_name, 0, 12)."..";
                    }
                    $margin = "";
                    $pad = "pt-4";
                    $pad_div = "px-3";
    
                }else if ($resolution >= 1220 && $resolution < 1440){
                    if (strlen($value->product_name) > 25){
                        $product_name = substr($value->product_name, 0, 25)."..";
                    }
                    $margin = "";
                    $pad = "pt-4";
                    $pad_div = "px-4";

                }else if ($resolution >= 1440 && $resolution < 1970){
                    if (strlen($value->product_name) > 25){
                        $product_name = substr($value->product_name, 0, 25)."..";
                    }
                    $margin = "";
                    $pad = "pt-4";
                    $pad_div = "px-4";

                }else{
    
                    if (strlen($value->product_name) > 25){
                        $product_name = substr($value->product_name, 0, 25)."..";
                    }
    
                    $margin = "";
                    $pad = "pt-4";
                    $pad_div = "px-4";
    
                }

 


                    $output .= '<div class="col-6 col-lg-3 col-md-4 col-sm-6 '.$pad_div.' '.$pad.'">
                        <a href="'.$href_url.'">
                            <div class="div-hot-prod bd-green">
                                <div class="card div-hot-prod-img mb-0" id="div-card-prod-i" style="'.$css_product.'"> 
                                </div> 
                                <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                                    <p class="card-title prod-title text-white font-weight-600 text-capitalize align-middle mb-0">'.$product_name.'</p>
                                    <p class="text-yellow font-weight-600 prod-price mb-0">'.$curr.' '.number_format($value->product_unit_price, 2).'</p> 
                                </div>
                            </div>
                        </a>
                    </div>   ';

            }
        }

        return $output;

    }
}

function randomNumber($length) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
    }
    return str_shuffle($str);
}