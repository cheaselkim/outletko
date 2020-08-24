<?php 

if (!function_exists("tbl_process_order")){
	function tbl_process_order($query, $var_status, $closed){

		$output = "";
		$status = "";
        $onclick = "";
        $total_item = 0;

		if (!empty($query)){
			foreach ($query as $key => $value) {
				$status = "";

				if ($value->status == "1"){
					$status = "For Acknowledgement";
					$onclick = "order_table(".($value->buyer_order_id).")";
				}else if ($value->status == "2"){
                    $status = "Acknowledged";
                    $onclick = "order_table(".($value->buyer_order_id).")";
					// $onclick = "closed_table(".($value->buyer_order_id).")";
                }else if ($value->status == "3"){
                    $status = "Proof of Payment";
					$onclick = "order_table(".($value->buyer_order_id).")";
                }else if ($value->status == "4"){
                    $status = "Proof Denied";
					$onclick = "order_table(".($value->buyer_order_id).")";
                }else if ($value->status == "5"){
                    $status = "Payment Confirmed";
                    if (empty($closed)){
                        $onclick = "order_table(".($value->buyer_order_id).")";
                    }else{
                        $onclick = "closed_table(".($value->buyer_order_id).")";                        
                    }
                }
                
                if (!empty($var_status)){
                    $onclick = "delivered_table(".($value->buyer_order_id).")";
                    if ($value->status == "2"){
                        $status = "For Delivery";
                    }else if ($value->status == "3"){
                        $status = "Closed Order";
                    }
                }

                $output .= '
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-4" >

                    <div class="row border border">
                        <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                            <span class="h6 font-weight-600">ORDER '.$value->order_no.'</span>
                        </div>
                        <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right px-2">
                            <span class="h6 font-weight-600">'.date("d M Y G:i:s", strtotime($value->date_insert)).'</span>
                        </div>
                    </div>


                    <div class="row border border-top-0">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-0 my-0 text-right px-2 h5 py-1 " hidden>
                            <span class="font-weight-600">'.$status.'</span>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                            <span class="font-weight-600 h6">'.$value->buyer_name.'</span>
                        </div>
                    </div>

                    <div class="row border border-top-0">
                        <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                            <span class="font-weight-600 h6">Item/s : <span class="text-dark-green">'.$value->total_items.'</span></span>
                        </div>
                        <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                            <span class="font-weight-600 h6">Total : <span class="text-dark-green">&#8369; '.number_format($value->total_amount, 2).'</span></span>
                        </div>
                    </div>
    
                    <div class="row border border-top-0">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right py-1 px-2">
                            <button class="btn btn-success px-5 btn-order-dtls" onclick="'.$onclick.'">Update</button>
                        </div>
                    </div>

                </div>';

			}

		}


		return $output;

	}
}

if (!function_exists("tbl_products")){
    function tbl_products($query){

        $output = "";
        $total_items = 0;
        

        if (!empty($query)){
            for ($x=0; $x < COUNT($query); $x++) { 

                $prod_var = "";

                $total_items += (int)$query[$x]['prod_qty'];

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
                                <p class="mb-0">'.$query[$x]['product_name'].'</p>
                                <p>'.$prod_var.'</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 text-right">
                                <p><span class="d-inline-block d-sm-none">x</span> '.number_format($query[$x]['prod_qty']).'</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-3 col-sm-12 text-right">
                                <p class="font-weight-600 text-dark-green">&#8369; '.number_format($query[$x]['prod_price'], 2).'</p>
                            </div>                                                            
                        </div>
                    </div>
                </div>';

            }
        }

        return array("output" => $output, "total_items" => $total_items);

    }
}


// if (!function_exists("tbl_process_order")){
// 	function tbl_process_order($query, $var_status, $closed){

// 		$output = "";

// 		$output .= "<table class='table table-striped table-sm table-bordered'>
// 						<thead>
// 							<tr>
// 								<th>Order No</th>
// 								<th>Order Date</th>
// 								<th>From</th>
// 								<th>Total Amount</th>
// 								<th>Delivery Type</th>
// 								<th>Status</th>
// 							</tr>
// 						</thead>
// 						<tbody>";
// 		$status = "";
// 		$onclick = "";

// 		if (!empty($query)){
// 			foreach ($query as $key => $value) {
// 				$status = "";

// 				if ($value->status == "1"){
// 					$status = "For Acknowledgement";
// 					$onclick = "order_table(".($value->buyer_order_id).")";
// 				}else if ($value->status == "2"){
//                     $status = "Acknowledged";
//                     $onclick = "order_table(".($value->buyer_order_id).")";
// 					// $onclick = "closed_table(".($value->buyer_order_id).")";
//                 }else if ($value->status == "3"){
//                     $status = "Proof of Payment";
// 					$onclick = "order_table(".($value->buyer_order_id).")";
//                 }else if ($value->status == "4"){
//                     $status = "Proof Denied";
// 					$onclick = "order_table(".($value->buyer_order_id).")";
//                 }else if ($value->status == "5"){
//                     $status = "Payment Confirmed";
//                     if (empty($closed)){
//                         $onclick = "order_table(".($value->buyer_order_id).")";
//                     }else{
//                         $onclick = "closed_table(".($value->buyer_order_id).")";                        
//                     }
//                 }
                
//                 if (!empty($var_status)){
//                     $onclick = "delivered_table(".($value->buyer_order_id).")";
//                     if ($value->status == "2"){
//                         $status = "For Delivery";
//                     }else if ($value->status == "3"){
//                         $status = "Closed Order";
//                     }
//                 }

// 				$output .= "<tr onclick='".$onclick."' class='cursor-pointer'>
// 								<td>".$value->order_no."</td>
// 								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
// 								<td>".$value->buyer_name."</td>
// 								<td>".number_format($value->total_amount, 2)."</td>
// 								<td>".$value->delivery_type_name."</td>
// 								<td>".$status."</td>
// 							</tr>";

// 			}

// 		}

// 		$output .= "</tbody>
// 					</table>";

// 		return $output;

// 	}
// }
