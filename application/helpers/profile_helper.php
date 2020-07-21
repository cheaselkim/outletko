<?php 
if (!function_exists("img_display")){
    function img_display($data){

        $output = "";

        // var_dump($data);

        if (!empty($data)){
            // foreach ($data as $key => $value) {
            //     foreach ($value as $key2 => $value2) {
            //         // $img = base_url()."images/products/".$value2->img;
            //         // $output += "<img src='".$img."'>";
            //     }
            // }    

            // for ($i=0; $i < COUNT($data); $i++) { 
            //     $img = base_url()."images/products/".$data[$i];
            //     $output += "<img src='".$img."'>";
            // }

            foreach ($data  as $key => $value) {
                $img = base_url()."images/products/".$value;
                $output .= "<img src='".$img."'>";
            }

        }

        return $output;
    }
}

if (!function_exists("reviews")){
    function reviews($data){
        $output = "";
        $border = "";

        foreach ($data as $key => $value) {

            if ($key > 0){
                $border = 'style="border-top: 1px solid orange;"';
            }

            $output .= '<div class="row mx-0" '.$border.'>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0 pt-2">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="rating-emoji">&#x'.$value->rating.';</span><br>
                            <p class="mb-0">'.$value->review.'</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <hr class="mb-0 mt-1">
                            <p class="mb-0">'.$value->user_name.'</p>
                            <span>'.date('d M Y', strtotime($value->date_insert)).'</span>
                        </div>
                    </div>
                </div>
            </div>';


        }

        return $output;

    }
}

if (!function_exists("tbl_products_no_order")){

	function tbl_products_no_order($query){

		$output = "";
        $account_id = "";
        $variation = "";
        $div = 0;
        $checked = "";
        $bg = "";
        $prod_hidden = "";

        for ($x=0; $x < COUNT($query); $x++) { 
        
			$img = unserialize($query[$x]['img_location']);
			$img_loc = base_url().'images/products/'.$img[0];
            $i = $x + 1;

            if (!empty($query[$x]['prod_var1'])){
                $variation = "<span>Variation : ".$query[$x]['prod_var1']."</span>";
            }else{
                // $variation = "<span>Variation : N\A</span>";
            }

            if (!empty($query[$x]['prod_var1']) && !empty($query[$x]['prod_var2'])){
                $variation = "<span>Variation : ".$query[$x]['prod_var1'].", ".$query[$x]['prod_var2']."</span>";
            }

            if ($query[$x]['prod_avail'] == "1"){
                $checked = "checked";
                $bg = "";
                $prod_hidden = "hidden";
            }else{
                $checked = "disabled";
                $bg = "background:#D3D3D3";
                $prod_hidden = "";
            }

            $checkbox = '
            <div class="col-12 text-center"  style="height: 75px;padding-top: 10px;">           
                <div class="custom-control custom-checkbox checkbox-xl" style="padding-left: 1.0rem;">
                <input type="checkbox" name="checkbox_'.$i.'" id="checkbox_'.$i.'" class="custom-control-input" value="'.$query[$x]['prod_id'].'" data-id="'.$i.'" data-prod-var1="'.$query[$x]['prod_var1_id'].'" data-prod-var-2="'.$query[$x]['prod_var2_id'].'" data-item="'.$query[$x]['item_id'].'" '.$checked.'>
                <label for="checkbox_'.$i.'" class="custom-control-label"></label>
                    </div>
            </div>';

            
			if ($account_id  != $query[$x]['account_id']){
				$div++;
				if ($i > 1){
					$output .= "</div>
								<div class='col-12 px-0'>
									<hr class='my-3' style='border-top: 1.5px dashed red;'>
								</div>
								";
                }
                

                $checbox_raw = '<div class="col-12 text-center" style="height: 85px;padding-top: 15px;">
                    <input type="checkbox" name="checkbox_'.$i.'" id="checkbox_'.$i.'" class="css-checkbox" value="'.$query[$x]['prod_id'].'" data-id="'.$i.'" data-prod-var1="'.$query[$x]['prod_var1_id'].'" data-prod-var-2="'.$query[$x]['prod_var2_id'].'" checked>
                    <label for="checkbox_'.$i.'" class="css-label"></label>
                </div>';

				$output .= '<div class="col-12 col-sm-12 col-md-12 col-lg-12 py-0 item div-prod" id="div_prod_'.$div.'"> 
							<div class="row py-1 bg-white-smoke" style="border: 1px solid black;">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<span class="h5 font-weight-600">'.$query[$x]['account_name'].'</span>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 text-right">
									<button class="btn btn-orange font-weight-600 btn-sm btn_checkout" id="btn_checkout" onclick="get_order_checkout('.$div.')">Proceed to Checkout</button>
								</div>
							</div>
							<div class="row border-1" style="'.$bg.'">
								<div class="col-4 col-lg-1 col-md-3 col-sm-4"  style="border-right: 1px solid gray;" hidden>
									<div class="row">
										'.$checkbox.'
										<div class="col-12 text-center" style="height: 75px;border-top: 1px solid gray;padding-top: 20px;">
											<button class="btn btn-danger btn_del" id="btn_del" onclick="remove_item('.$query[$x]['item_id'].')"><i class="fas fa-minus-circle"></i></button>
										</div> 
									</div>
								</div>
								<div class="col-4 col-lg-auto col-md-auto py-2"> 
									<div class="div-img-prod" >
										<img src="'.$img_loc.'" class="img-prod">
									</div>
								</div>
								<div class="col-8 col-lg-7 col-md-4 col-sm-12 py-2 div-prod-info">
									<div class="row">
										<div class="col-12">
											<span class="font-weight-600">'.$query[$x]['product_name'].'</span><br>
                                            <span hidden>details</span>
                                            '.$variation.'
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-12 col-lg-6 col-md-12 col-sm-12">
													<span class="font-weight-600">Price : PHP <span class="prod_price" id="prod_price_'.$i.'">'.number_format($query[$x]['product_unit_price'], 2).'</span></span>
												</div>
												<div class="col-12 col-lg-6 col-md-12 col-sm-12">
													<span class="font-weight-600">Total Price : PHP <span class="prod_total_price" id="prod_total_price_'.$i.'">'.number_format(($query[$x]['product_unit_price'] * $query[$x]['prod_qty']), 2).'</span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-8 col-lg-3 col-md-10 col-sm-6 pt-2">
											<div class="input-group mb-0">
												<div class="input-group-prepend">
													<button class="btn btn-outline-dark btn-append btn_minus" id="btn_minus_'.$i.'" value="'.$i.'"><i class="fas fa-minus"></i></button>
												</div>
												<input type="text" class="form-control text-center px-1 input-qty prod_qty" id="prod_qty_'.$i.'" value="'.$query[$x]['prod_qty'].'" data-id="'.$i.'"  style="'.$bg.'">
												<div class="input-group-append">
													<button class="btn btn-outline-dark btn-append btn_plus" id="btn_plus_'.$i.'" value="'.$i.'"><i class="fas fa-plus"></i></button>
												</div>
											</div>											
										</div>
                                    </div>
                                    <div class="row" '.$prod_hidden.'>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span class="font-italic text-red">This product is not available</span>
                                        </div>
                                    </div>
								</div>
							</div>
						';
			}else{
                $checbox_raw = '										
                <div class="col-12 text-center" style="height: 85px;padding-top: 15px;">
                    <input type="checkbox" name="checkbox_'.$i.'" id="checkbox_'.$i.'" class="css-checkbox" value="'.$query[$x]['prod_id'].'" data-id="'.$i.'" checked>
                    <label for="checkbox_'.$i.'" class="css-label"></label>
                </div>';

                $output .= '<div class="row border-1 "  style="'.$bg.'">
								<div class="col-4 col-lg-1 col-md-3 col-sm-4"  style="border-right: 1px solid gray;" hidden>
                                    <div class="row">
                                        '.$checkbox.'
										<div class="col-12 text-center" style="height: 75px;border-top: 1px solid gray;padding-top: 20px;">
											<button class="btn btn-danger btn_del" id="btn_del" onclick="remove_item('.$query[$x]['item_id'].')"><i class="fas fa-minus-circle"></i></button>
										</div> 
									</div>
								</div>
								<div class="col-4 col-lg-auto col-md-auto py-2"> 
									<div class="div-img-prod" >
										<img src="'.$img_loc.'" class="img-prod">
									</div>
								</div>
								<div class="col-8 col-lg-7 col-md-4 col-sm-12 py-2 div-prod-info">
									<div class="row">
										<div class="col-12">
											<span class="font-weight-600">'.$query[$x]['product_name'].'</span><br>
											<span hidden>details</span>
                                            '.$variation.'
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-12 col-lg-6 col-md-12 col-sm-12">
													<span class="font-weight-600">Price : PHP <span class="prod_price" id="prod_price_'.$i.'">'.number_format($query[$x]['product_unit_price'], 2).'</span></span>
												</div>
												<div class="col-12 col-lg-6 col-md-12 col-sm-12">
													<span class="font-weight-600">Total Price : PHP <span class="prod_total_price" id="prod_total_price_'.$i.'">'.number_format(($query[$x]['product_unit_price'] * $query[$x]['prod_qty']), 2).'</span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-8 col-lg-3 col-md-10 col-sm-6 pt-2">
											<div class="input-group mb-0">
												<div class="input-group-prepend">
													<button class="btn btn-outline-dark btn-append btn_minus" id="btn_minus_'.$i.'" value="'.$i.'"><i class="fas fa-minus"></i></button>
												</div>
												<input type="text" class="form-control text-center px-1 input-qty prod_qty" id="prod_qty_'.$i.'" value="'.$query[$x]['prod_qty'].'" data-id="'.$i.'"  style="'.$bg.'">
												<div class="input-group-append">
													<button class="btn btn-outline-dark btn-append btn_plus" id="btn_plus_'.$i.'" value="'.$i.'"><i class="fas fa-plus"></i></button>
												</div>
											</div>											
										</div>
                                    </div>
                                    <div class="row" '.$prod_hidden.'>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span class="font-italic text-red">This product is not available</span>
                                        </div>
                                    </div>                                    
								</div>
							</div>';
			}

            $account_id = $query[$x]['account_id'];
            $variation = "";
		}

		return $output;

	}

}
?>