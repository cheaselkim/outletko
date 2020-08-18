<?php 

if (!function_exists("tbl_products_no_order")){

	function tbl_products_no_order($query, $prod_sess_id){

		$output = "";
        $account_id = "";
        $variation = "";
        $div = 0;
        $seller_id = "";
        $checked = "";
        $bg = "";
        $prod_hidden = "";
        $link_name = "";

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

            $link_name = base_url().$query[$x]['link_name'];
            
			if ($account_id  != $query[$x]['account_id']){
				$div++;

                if ($prod_sess_id == $query[$x]['prod_id']){
                    $seller_id = $div;
                }    

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
									<a href="'.$link_name.'" class="h5 font-weight-600 text-black">'.$query[$x]['account_name'].'</a>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 text-right">
									<button class="btn btn-orange font-weight-600 btn-sm btn_checkout" id="btn_checkout" onclick="get_order_checkout('.$div.')">Proceed to Checkout</button>
								</div>
							</div>
							<div class="row border-1" style="'.$bg.'">
								<div class="col-4 col-lg-1 col-md-3 col-sm-4"  style="border-right: 1px solid gray;">
									<div class="row">
										'.$checkbox.'
										<div class="col-12 text-center" style="height: 75px;border-top: 1px solid gray;padding-top: 20px;">
											<button class="btn btn-danger btn_del" id="btn_del" onclick="remove_item('.$query[$x]['item_id'].')"><i class="fas fa-minus-circle"></i></button>
										</div> 
									</div>
								</div>
								<div class="col-auto py-2"> 
									<div class="div-img-prod" >
										<img src="'.$img_loc.'" class="img-prod">
									</div>
								</div>
								<div class="col-12 col-lg-7 col-md-4 col-sm-12 py-2 div-prod-info">
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
										<div class="col-6 col-lg-3 col-md-10 col-sm-6 pt-2">
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
								<div class="col-4 col-lg-1 col-md-3 col-sm-4"  style="border-right: 1px solid gray;">
                                    <div class="row">
                                        '.$checkbox.'
										<div class="col-12 text-center" style="height: 75px;border-top: 1px solid gray;padding-top: 20px;">
											<button class="btn btn-danger btn_del" id="btn_del" onclick="remove_item('.$query[$x]['item_id'].')"><i class="fas fa-minus-circle"></i></button>
										</div> 
									</div>
								</div>
								<div class="col-auto py-2"> 
									<div class="div-img-prod" >
										<img src="'.$img_loc.'" class="img-prod">
									</div>
								</div>
								<div class="col-12 col-lg-7 col-md-4 col-sm-12 py-2 div-prod-info">
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
										<div class="col-6 col-lg-3 col-md-10 col-sm-6 pt-2">
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

		// return $output;

        return array("output" => $output, "seller_id" => $seller_id);

    

	}

}

if (!function_exists("tbl_ongoing_orders")){
	function tbl_ongoing_orders($query){

		$output = "";
        $pending = 0;
        $acknowledge = 0;
        $confirm = 0;
        $denied = 0;
        $proof = 0;
        $status = "";
        $account_id = "";
        $order_no = "";
        $prod_var = "";
        $img = "";
        $order_id = "";
        $item = 0;
        $btn_text = "";

        if (!empty($query)){
            for ($x=0; $x < COUNT($query); $x++) { 

                $prod_var = "";

                if ($query[$x]['status'] == "1"){
                    $pending++;
                    $status = "Pending to Acknowledge";
                    // $class = "btn-warning";
                    $class = "btn btn-light";
                    // $btn_text = "See More";
				}else if ($query[$x]['status'] == "2"){
                    $acknowledge++;
                    $status = "Acknowledged";
                    $class = "btn-primary";
                    // $btn_text = "Send Payment";
				}else if ($query[$x]['status'] == "3"){
                    $proof++;
                    $status = "Proof of Payment Sent";
                    $class = "btn-warning";
                    // $btn_text = "See More";
                }else if ($query[$x]['status'] == "4"){
                    $denied++;
                    $status = "Payment denied by Seller";
                    $class = "btn-danger";
                    // $btn_text = "Resend Payment";
                }else if ($query[$x]['status'] == "5"){
                    $confirm++;
                    $status = "Payment Confirm by Seller";
                    $class = "btn-info";
                    // $btn_text = "See More";
                }

                $img = unserialize($query[$x]['img_location']);
                $img_loc = base_url().'images/products/'.$img[0];
    
                if (!empty($query[$x]['prod_var1'])){
                    $prod_var = "<p class='mb-0 text-gray'>".$query[$x]['prod_var1']."</p>";
                }else{
                    // $variation = "<span>Variation : N\A</span>";
                }
    
                if (!empty($query[$x]['prod_var1']) && !empty($query[$x]['prod_var2'])){
                    $prod_var = "<p class='mb-0 text-gray'>".$query[$x]['prod_var1'].", ".$query[$x]['prod_var2']."</p>";
                }
                    

                if ($x == 0){
                    $output .= '
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >
    
                        <div class="row border">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2 h5 py-1 '.$class.'">
                                <span class="font-weight-600">'.$status.'</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                <span class="font-weight-600">'.$query[$x]['account_name'].'</span>
                            </div>
                        </div>
    
                        <div class="row border border-top-0">
                            <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                <span>ORDER '.$query[$x]['order_no'].'</span>
                            </div>
                            <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                                <span>'.date("d M Y G:i:s", strtotime($query[$x]['order_date'])).'</span>
                            </div>
                        </div>

                        <div class="row border py-2 border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">

                                    <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                        <div class="border text-center w-100 ong-prod-img">
                                            <img src="'.$img_loc.'" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                <p>'.$query[$x]['product_name'].'</p>
                                                '.$prod_var.'
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                            </div>                                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    ';
    
                }else{
                    if ($order_no != $query[$x]['order_no']){
                        $output .= '
                        <div class="row border border-top-0">
                            <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                                <span class="font-weight-600">Item/s : <span class="text-dark-green">'.$item.'</span></span>
                            </div>
                            <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                                <span class="font-weight-600">Total : <span class="text-dark-green">&#8369; '.number_format($total_amount, 2).'</span></span>
                            </div>
                        </div>
        
                        <div class="row border border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                                <button class="btn btn-success px-5 btn-order-dtls"  onclick="view_order(2, '.$order_id.')">'.$btn_text.'</button>
                            </div>
                        </div>';
                        $output .= "</div>";    

                        $item = 0;

                        $output .= '
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >
        
                            <div class="row border">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2  h5 py-1 '.$class.'">
                                    <span class="font-weight-600">'.$status.'</span>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <span class="font-weight-600">'.$query[$x]['account_name'].'</span>
                                </div>
                            </div>
        
                            <div class="row border border-top-0">
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                    <span>ORDER '.$query[$x]['order_no'].'</span>
                                </div>
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                                    <span>'.date("d M Y G:i:s", strtotime($query[$x]['order_date'])).'</span>
                                </div>
                            </div>
    
                            <div class="row border py-2 border-top-0">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
    
                                        <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                            <div class="border text-center w-100 ong-prod-img">
                                                <img src="'.$img_loc.'" alt="Product">
                                            </div>
                                        </div>
                                        <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                            <div class="row">
                                                <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                    <p>'.$query[$x]['product_name'].'</p>
                                                    '.$prod_var.'
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                    <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                    <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                                </div>                                                            
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        ';
    
                    }else{
                        $output .= '                       
                        <div class="row border py-2 border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">

                                    <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                        <div class="border text-center w-100 ong-prod-img">
                                            <img src="'.$img_loc.'" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                <p>'.$query[$x]['product_name'].'</p>
                                                '.$prod_var.'
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                            </div>                                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
                    }
    
                }


                $item += $query[$x]['prod_qty'];
                $total_amount = $query[$x]['total_amount'];

                if ($query[$x]['status'] == "1"){
                    $btn_text = "See More";
				}else if ($query[$x]['status'] == "2"){
                    $btn_text = "Send Payment";
				}else if ($query[$x]['status'] == "3"){
                    $btn_text = "See More";
                }else if ($query[$x]['status'] == "4"){
                    $btn_text = "Resend Payment";
                }else if ($query[$x]['status'] == "5"){
                    $btn_text = "See More";
                }


                if (($x + 1) == COUNT($query)){
                    $output .= '
                    <div class="row border border-top-0">
                        <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                            <span class="font-weight-600">Item/s : <span class="text-dark-green">'.$item.'</span></span>
                        </div>
                        <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                            <span class="font-weight-600">Total : <span class="text-dark-green">&#8369; '.number_format($query[$x]['total_amount'], 2).'</span></span>
                        </div>
                    </div>
    
                    <div class="row border border-top-0">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                            <button class="btn btn-success px-5 btn-order-dtls" onclick="view_order(2, '.$order_id.')">'.$btn_text.'</button>
                        </div>
                    </div>';
                    $output .= "</div>";                        
                }

                $order_no = $query[$x]['order_no'];
                $order_id = $query[$x]['order_id'];

            }
        }


		return array("output" => $output, "pending" => $pending, "acknowledge" => $acknowledge, "proof" => $proof, "confirm" => $confirm, "denied" => $denied);

	}
}

if (!function_exists("tbl_products")){
    function tbl_products($query){

        $output = "";
        $total_items = 0;

        if (!empty($query)){
            foreach ($query as $key => $value) {
                $total_items += (int)$value->prod_qty;

                $img = unserialize($value->img_location);
                $img_loc = base_url().'images/products/'.$img[0];

                $output .= '
                <div class="row my-2">
                    <div class="col-3 col-lg-1 col-md-6 col-sm-6">
                        <div class="border text-center w-100 ong-prod-img px-2">
                            <img src="'.$img_loc.'" alt="Product">
                        </div>
                    </div>
                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details px-2">
                        <div class="row">
                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                <p>'.$value->product_name.'</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($value->prod_qty).'</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($value->prod_price, 2).'</p>
                            </div>                                                            
                        </div>
                    </div>
                </div>';

            }
        }

        return array("output" => $output, "total_items" => $total_items);

    }
}

// if (!function_exists("tbl_ongoing_orders")){
// 	function tbl_ongoing_orders($query){

// 		$output = "";
//         $pending = 0;
//         $acknowledge = 0;
//         $confirm = 0;
//         $denied = 0;
//         $proof = 0;


// 		$output .= "<table class='table table-bordered table-sm tbl-order'>
// 					<thead>
// 						<tr>
// 							<th>LN</th>
// 							<th>Order No</th>
// 							<th>Order Date</th>
// 							<th>Seller</th>
// 							<th>Total Amount</th>
// 							<th>Status</th>
// 						</tr>
// 					</thead>
// 					<tbody>";

// 		if (!empty($query)){
//             $status = "";
// 			foreach ($query as $key => $value) {

// 				if ($value->status == "1"){
//                     $status = "Pending to Acknowledge";
//                     // $class = "btn-warning";
//                     $class = "";
//                     $pending++;
// 				}else if ($value->status == "2"){
//                     $status = "Acknowledged";
//                     $class = "btn-primary";
//                     $acknowledge++;
// 				}else if ($value->status == "3"){
//                     $proof++;
//                     $status = "Proof of Payment Sent";
//                     $class = "btn-warning";
//                 }else if ($value->status == "4"){
//                     $denied++;
//                     $status = "Payment denied by Seller";
//                     $class = "btn-danger";
//                 }else if ($value->status == "5"){
//                     $confirm++;
//                     $status = "Confirm Payment by Seller";
//                     $class = "btn-info";
//                 }

// 				$output .= "<tr class='cursor-pointer ".$class."' onclick='view_order(2, ".$value->id.")'>
// 								<td>".($key + 1)."</td>
// 								<td>".$value->order_no."</td>
// 								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
// 								<td>".$value->account_name."</td>
// 								<td class='text-right'>".number_format($value->total_amount, 2)."</td>
// 								<td>".$status."</td>
// 							</tr>";

// 			}

// 		}

// 		return array("output" => $output, "pending" => $pending, "acknowledge" => $acknowledge, "proof" => $proof, "confirm" => $confirm, "denied" => $denied);

// 	}
// }


if (!function_exists("tbl_complete_orders")){
	function tbl_complete_orders($query){

		$output = "";
        $pending = 0;
        $acknowledge = 0;
        $confirm = 0;
        $denied = 0;
        $proof = 0;
        $status = "";
        $account_id = "";
        $order_no = "";
        $prod_var = "";
        $img = "";
        $order_id = "";
        $item = 0;
        $btn_text = "";

        if (!empty($query)){
            for ($x=0; $x < COUNT($query); $x++) { 

                $prod_var = "";
                $class = "btn btn-orange";
                $status = "Order Delivered";
                $img = unserialize($query[$x]['img_location']);
                $img_loc = base_url().'images/products/'.$img[0];
    
                if (!empty($query[$x]['prod_var1'])){
                    $prod_var = "<p class='mb-0 text-gray'>".$query[$x]['prod_var1']."</p>";
                }else{
                    // $variation = "<span>Variation : N\A</span>";
                }
    
                if (!empty($query[$x]['prod_var1']) && !empty($query[$x]['prod_var2'])){
                    $prod_var = "<p class='mb-0 text-gray'>".$query[$x]['prod_var1'].", ".$query[$x]['prod_var2']."</p>";
                }
                    

                if ($x == 0){
                    $output .= '
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >
    
                        <div class="row border">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2 h5 py-1 '.$class.'">
                                <span class="font-weight-600">'.$status.'</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                <span class="font-weight-600">'.$query[$x]['account_name'].'</span>
                            </div>
                        </div>
    
                        <div class="row border border-top-0">
                            <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                <span>ORDER '.$query[$x]['order_no'].'</span>
                            </div>
                            <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                                <span>'.date("d M Y G:i:s", strtotime($query[$x]['order_date'])).'</span>
                            </div>
                        </div>

                        <div class="row border py-2 border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">

                                    <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                        <div class="border text-center w-100 ong-prod-img">
                                            <img src="'.$img_loc.'" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                <p>'.$query[$x]['product_name'].'</p>
                                                '.$prod_var.'
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                            </div>                                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    ';
    
                }else{
                    if ($order_no != $query[$x]['order_no']){
                        $output .= '
                        <div class="row border border-top-0">
                            <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                                <span class="font-weight-600">Item/s : <span class="text-dark-green">'.$item.'</span></span>
                            </div>
                            <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                                <span class="font-weight-600">Total : <span class="text-dark-green">&#8369; '.number_format($total_amount, 2).'</span></span>
                            </div>
                        </div>
        
                        <div class="row border border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                                <button class="btn btn-orange px-5 btn-order-dtls"  onclick="complete_order('.$order_id.')">Delivered</button>
                            </div>
                        </div>';
                        $output .= "</div>";    

                        $item = 0;

                        $output .= '
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >
        
                            <div class="row border">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2  h5 py-1 '.$class.'">
                                    <span class="font-weight-600">'.$status.'</span>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <span class="font-weight-600">'.$query[$x]['account_name'].'</span>
                                </div>
                            </div>
        
                            <div class="row border border-top-0">
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                    <span>ORDER '.$query[$x]['order_no'].'</span>
                                </div>
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                                    <span>'.date("d M Y G:i:s", strtotime($query[$x]['order_date'])).'</span>
                                </div>
                            </div>
    
                            <div class="row border py-2 border-top-0">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
    
                                        <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                            <div class="border text-center w-100 ong-prod-img">
                                                <img src="'.$img_loc.'" alt="Product">
                                            </div>
                                        </div>
                                        <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                            <div class="row">
                                                <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                    <p>'.$query[$x]['product_name'].'</p>
                                                    '.$prod_var.'
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                    <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                    <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                                </div>                                                            
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        ';
    
                    }else{
                        $output .= '                       
                        <div class="row border py-2 border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">

                                    <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                        <div class="border text-center w-100 ong-prod-img">
                                            <img src="'.$img_loc.'" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                <p>'.$query[$x]['product_name'].'</p>
                                                '.$prod_var.'
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                            </div>                                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
                    }
    
                }


                $item += $query[$x]['prod_qty'];
                $total_amount = $query[$x]['total_amount'];

                if (($x + 1) == COUNT($query)){
                    $output .= '
                    <div class="row border border-top-0">
                        <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                            <span class="font-weight-600">Item/s : <span class="text-dark-green">'.$item.'</span></span>
                        </div>
                        <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                            <span class="font-weight-600">Total : <span class="text-dark-green">&#8369; '.number_format($query[$x]['total_amount'], 2).'</span></span>
                        </div>
                    </div>
    
                    <div class="row border border-top-0">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                            <button class="btn btn-success px-5 btn-order-dtls" onclick="complete_order('.$order_id.')">Delivered</button>
                        </div>
                    </div>';
                    $output .= "</div>";                        
                }

                $order_no = $query[$x]['order_no'];
                $order_id = $query[$x]['order_id'];

            }
        }

        return $output;

	}
}


if (!function_exists("tbl_transactions_orders")){
	function tbl_transactions_orders($query){

		$output = "";
        $pending = 0;
        $acknowledge = 0;
        $confirm = 0;
        $denied = 0;
        $proof = 0;
        $status = "";
        $account_id = "";
        $order_no = "";
        $prod_var = "";
        $img = "";
        $order_id = "";
        $item = 0;
        $btn_text = "";

        if (!empty($query)){
            for ($x=0; $x < COUNT($query); $x++) { 

                $prod_var = "";
                $btn_text = "See More";

                if ($query[$x]['status'] == "7"){
                    $class = "btn btn-success";
                    $status = "Completed Order";    
                }else{
                    $class = "btn btn-danger";
                    $status = "Cancelled Order";    
                }


                $img = unserialize($query[$x]['img_location']);
                $img_loc = base_url().'images/products/'.$img[0];
    
                if (!empty($query[$x]['prod_var1'])){
                    $prod_var = "<p class='mb-0 text-gray'>".$query[$x]['prod_var1']."</p>";
                }else{
                    // $variation = "<span>Variation : N\A</span>";
                }
    
                if (!empty($query[$x]['prod_var1']) && !empty($query[$x]['prod_var2'])){
                    $prod_var = "<p class='mb-0 text-gray'>".$query[$x]['prod_var1'].", ".$query[$x]['prod_var2']."</p>";
                }
                    

                if ($x == 0){
                    $output .= '
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >
    
                        <div class="row border">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2 h5 py-1 '.$class.'">
                                <span class="font-weight-600">'.$status.'</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                <span class="font-weight-600">'.$query[$x]['account_name'].'</span>
                            </div>
                        </div>
    
                        <div class="row border border-top-0">
                            <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                <span>ORDER '.$query[$x]['order_no'].'</span>
                            </div>
                            <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                                <span>'.date("d M Y G:i:s", strtotime($query[$x]['order_date'])).'</span>
                            </div>
                        </div>

                        <div class="row border py-2 border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">

                                    <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                        <div class="border text-center w-100 ong-prod-img">
                                            <img src="'.$img_loc.'" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                <p>'.$query[$x]['product_name'].'</p>
                                                '.$prod_var.'
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                            </div>                                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    ';
    
                }else{
                    if ($order_no != $query[$x]['order_no']){
                        $output .= '
                        <div class="row border border-top-0">
                            <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                                <span class="font-weight-600">Item/s : <span class="text-dark-green">'.$item.'</span></span>
                            </div>
                            <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                                <span class="font-weight-600">Total : <span class="text-dark-green">&#8369; '.number_format($total_amount, 2).'</span></span>
                            </div>
                        </div>
        
                        <div class="row border border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                                <button class="btn btn-success px-5 btn-order-dtls"  onclick="view_order(4, '.$order_id.')">'.$btn_text.'</button>
                            </div>
                        </div>';
                        $output .= "</div>";    

                        $item = 0;

                        $output .= '
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >
        
                            <div class="row border">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2  h5 py-1 '.$class.'">
                                    <span class="font-weight-600">'.$status.'</span>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <span class="font-weight-600">'.$query[$x]['account_name'].'</span>
                                </div>
                            </div>
        
                            <div class="row border border-top-0">
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                    <span>ORDER '.$query[$x]['order_no'].'</span>
                                </div>
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                                    <span>'.date("d M Y G:i:s", strtotime($query[$x]['order_date'])).'</span>
                                </div>
                            </div>
    
                            <div class="row border py-2 border-top-0">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
    
                                        <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                            <div class="border text-center w-100 ong-prod-img">
                                                <img src="'.$img_loc.'" alt="Product">
                                            </div>
                                        </div>
                                        <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                            <div class="row">
                                                <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                    <p>'.$query[$x]['product_name'].'</p>
                                                    '.$prod_var.'
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                    <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                    <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                                </div>                                                            
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        ';
    
                    }else{
                        $output .= '                       
                        <div class="row border py-2 border-top-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">

                                    <div class="col-3 col-lg-1 col-md-6 col-sm-6 px-2">
                                        <div class="border text-center w-100 ong-prod-img">
                                            <img src="'.$img_loc.'" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-9 col-lg-11 col-md-6 col-sm-6 px-2 ong-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 col-md-5 col-sm-12 text-left">
                                                <p>'.$query[$x]['product_name'].'</p>
                                                '.$prod_var.'
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty'], 0).'</p>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['product_unit_price'], 2).'</p>
                                            </div>                                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
                    }
    
                }


                $item += $query[$x]['prod_qty'];
                $total_amount = $query[$x]['total_amount'];

                if ($query[$x]['status'] == "1"){
                    $btn_text = "See More";
				}else if ($query[$x]['status'] == "2"){
                    $btn_text = "Send Payment";
				}else if ($query[$x]['status'] == "3"){
                    $btn_text = "See More";
                }else if ($query[$x]['status'] == "4"){
                    $btn_text = "Resend Payment";
                }else if ($query[$x]['status'] == "5"){
                    $btn_text = "See More";
                }


                if (($x + 1) == COUNT($query)){
                    $output .= '
                    <div class="row border border-top-0">
                        <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                            <span class="font-weight-600">Item/s : <span class="text-dark-green">'.$item.'</span></span>
                        </div>
                        <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                            <span class="font-weight-600">Total : <span class="text-dark-green">&#8369; '.number_format($query[$x]['total_amount'], 2).'</span></span>
                        </div>
                    </div>
    
                    <div class="row border border-top-0">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                            <button class="btn btn-success px-5 btn-order-dtls" onclick="view_order(4, '.$order_id.')">'.$btn_text.'</button>
                        </div>
                    </div>';
                    $output .= "</div>";                        
                }

                $order_no = $query[$x]['order_no'];
                $order_id = $query[$x]['order_id'];

            }
        }


        // return array("output" => $output, "pending" => $pending, "acknowledge" => $acknowledge, "proof" => $proof, "confirm" => $confirm, "denied" => $denied);
        return $output;

	}
}


// if (!function_exists("tbl_transctions_orders")){
// 	function tbl_transctions_orders($query){

// 		$output = "";

// 		$output .= "<table class='table table-bordered table-sm tbl-order'>
// 					<thead>
// 						<tr>
// 							<th>LN</th>
// 							<th>Order No</th>
// 							<th>Order Date</th>
// 							<th>Seller</th>
// 							<th>Total Amount</th>
// 							<th>Status</th>
// 						</tr>
// 					</thead>
// 					<tbody>";
// 		$status = "";
// 		if (!empty($query)){

// 			foreach ($query as $key => $value) {

// 				if ($value->status == "4"){
// 					$status = "Completed Order";
// 				}else{
// 					$status = "Cancelled Order";
// 				}

// 				$output .= "<tr class='cursor-pointer' onclick='view_order(4, ".$value->id.")'>
// 								<td>".($key + 1)."</td>
// 								<td>".$value->order_no."</td>
// 								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
// 								<td>".$value->account_name."</td>
// 								<td class='text-right'>".number_format($value->total_amount, 2)."</td>
// 								<td>".$status."</td>
// 							</tr>";

// 			}

// 		}

// 		return $output;

// 	}
// }
