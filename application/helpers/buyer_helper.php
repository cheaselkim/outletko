<?php 

if (!function_exists("tbl_products_no_order")){

	function tbl_products_no_order($query){

		$output = "";
		$account_id = "";
		$div = 0;

		foreach ($query as $key => $value) {
			
			$img = unserialize($value->img_location);
			$img_loc = base_url().'images/products/'.$img[0];
			$i = $key + 1;

			if ($account_id  != $value->account_id){
				$div++;
				if ($key != 0){
					$output .= "</div>
								<div class='col-12 px-0'>
									<hr class='my-3' style='border-top: 1.5px dashed red;'>
								</div>
								";
				}

				$output .= '<div class="col-12 col-sm-12 col-md-12 col-lg-12 py-0 item div-prod" id="div_prod_'.$div.'"> 
							<div class="row py-1 bg-white-smoke" style="border: 1px solid black;">
								<div class="col-6">
									<span class="h5 font-weight-600">'.$value->account_name.'</span>
								</div>
								<div class="col-6 text-right">
									<button class="btn btn-orange font-weight-600 btn-sm btn_checkout" id="btn_checkout" onclick="get_order_checkout('.$div.')">Proceed to Checkout</button>
								</div>
							</div>
							<div class="row border-1" >
								<div class="col-1"  style="border-right: 1px solid gray;">
									<div class="row">
										<div class="col-12 text-center" style="height: 85px;padding-top: 15px;">
											<input type="checkbox" name="checkbox_'.$i.'" id="checkbox_'.$i.'" class="css-checkbox" value="'.$value->prod_id.'" data-id="'.$i.'" checked>
											<label for="checkbox_'.$i.'" class="css-label"></label>
										</div>
										<div class="col-12 text-center" style="height: 85px;border-top: 1px solid gray;padding-top: 20px;">
											<button class="btn btn-danger btn_del" id="btn_del" onclick="remove_item('.$value->item_id.')"><i class="fas fa-minus-circle"></i></button>
										</div> 
									</div>
								</div>
								<div class="col-auto py-2"> 
									<div class="div-img-prod" >
										<img src="'.$img_loc.'" class="img-prod">
									</div>
								</div>
								<div class="col-7 py-2">
									<div class="row">
										<div class="col-12">
											<span class="font-weight-600">'.$value->product_name.'</span><br>
											<span>details</span><br>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<span class="font-weight-600">Price : <span class="prod_price" id="prod_price_'.$i.'">'.number_format($value->product_unit_price, 2).'</span></span>
												</div>
												<div class="col-6">
													<span class="font-weight-600">Total Price : <span class="prod_total_price" id="prod_total_price_'.$i.'">'.number_format(($value->product_unit_price * $value->prod_qty), 2).'</span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-3 pt-2">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<button class="btn btn-outline-dark btn-append btn_minus" id="btn_minus_'.$i.'" value="'.$i.'"><i class="fas fa-minus"></i></button>
												</div>
												<input type="text" class="form-control text-center px-1 input-qty prod_qty" id="prod_qty_'.$i.'" value="'.$value->prod_qty.'" data-id="'.$i.'">
												<div class="input-group-append">
													<button class="btn btn-outline-dark btn-append btn_plus" id="btn_plus_'.$i.'" value="'.$i.'"><i class="fas fa-plus"></i></button>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						';
			}else{
				$output .= '<div class="row border-1 ">
								<div class="col-1"  style="border-right: 1px solid gray;">
									<div class="row">
										<div class="col-12 text-center" style="height: 85px;padding-top: 15px;">
											<input type="checkbox" name="checkbox_'.$i.'" id="checkbox_'.$i.'" class="css-checkbox" value="'.$value->prod_id.'" data-id="'.$i.'" checked>
											<label for="checkbox_'.$i.'" class="css-label"></label>
										</div>
										<div class="col-12 text-center" style="height: 85px;border-top: 1px solid gray;padding-top: 20px;">
											<button class="btn btn-danger btn_del" id="btn_del" onclick="remove_item('.$value->item_id.')"><i class="fas fa-minus-circle"></i></button>
										</div> 
									</div>
								</div>
								<div class="col-auto py-2"> 
									<div class="div-img-prod" >
										<img src="'.$img_loc.'" class="img-prod">
									</div>
								</div>
								<div class="col-7 py-2">
									<div class="row">
										<div class="col-12">
											<span class="font-weight-600">'.$value->product_name.'</span><br>
											<span>details</span><br>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<span class="font-weight-600">Price : <span class="prod_price" id="prod_price_'.$i.'">'.number_format($value->product_unit_price, 2).'</span></span>
												</div>
												<div class="col-6">
													<span class="font-weight-600">Total Price : <span class="prod_total_price" id="prod_total_price_'.$i.'">'.number_format(($value->product_unit_price * $value->prod_qty), 2).'</span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-3 pt-2">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<button class="btn btn-outline-dark btn-append btn_minus" id="btn_minus_'.$i.'" value="'.$i.'"><i class="fas fa-minus"></i></button>
												</div>
												<input type="text" class="form-control text-center px-1 input-qty prod_qty" id="prod_qty_'.$i.'" value="'.$value->prod_qty.'" data-id="'.$i.'">
												<div class="input-group-append">
													<button class="btn btn-outline-dark btn-append btn_plus" id="btn_plus_'.$i.'" value="'.$i.'"><i class="fas fa-plus"></i></button>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>';
			}

			$account_id = $value->account_id;
		}

		return $output;

	}

}

if (!function_exists("tbl_ongoing_orders")){
	function tbl_ongoing_orders($query){

		$output = "";

		$output .= "<table class='table table-bordered table-sm'>
					<thead>
						<tr>
							<th>LN</th>
							<th>Order No</th>
							<th>Order Date</th>
							<th>Seller</th>
							<th>Total Amount</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){
			$status = "";
			foreach ($query as $key => $value) {

				if ($value->status == "1"){
					$status = "Pending to Acknowledge";
				}else if ($value->status == "2"){
					$status = "Acknowledged";
				}

				$output .= "<tr class='cursor-pointer' onclick='view_order(2, ".$value->id.")'>
								<td>".($key + 1)."</td>
								<td>".$value->order_no."</td>
								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
								<td>".$value->account_name."</td>
								<td class='text-right'>".number_format($value->total_amount, 2)."</td>
								<td>".$status."</td>
							</tr>";

			}

		}

		return $output;

	}
}

if (!function_exists("tbl_complete_orders")){
	function tbl_complete_orders($query){

		$output = "";

		$output .= "<table class='table table-bordered table-sm'>
					<thead>
						<tr>
							<th>LN</th>
							<th>Order No</th>
							<th>Order Date</th>
							<th>Seller</th>
							<th>Total Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";

		if (!empty($query)){

			foreach ($query as $key => $value) {


				$output .= "<tr class='cursor-pointer' onclick='view_order(3, ".$value->id.")'>
								<td>".($key + 1)."</td>
								<td>".$value->order_no."</td>
								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
								<td>".$value->account_name."</td>
								<td class='text-right'>".number_format($value->total_amount, 2)."</td>
								<td><button class='btn btn-orange btn-sm' onclick='complete_order(".$value->id.")'>Complete Order</button></td>
							</tr>";

			}

		}

		return $output;

	}
}

if (!function_exists("tbl_transctions_orders")){
	function tbl_transctions_orders($query){

		$output = "";

		$output .= "<table class='table table-bordered table-sm'>
					<thead>
						<tr>
							<th>LN</th>
							<th>Order No</th>
							<th>Order Date</th>
							<th>Seller</th>
							<th>Total Amount</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>";
		$status = "";
		if (!empty($query)){

			foreach ($query as $key => $value) {

				if ($value->status == "4"){
					$status = "Completed Order";
				}else{
					$status = "Cancelled Order";
				}

				$output .= "<tr class='cursor-pointer' onclick='view_order(4, ".$value->id.")'>
								<td>".($key + 1)."</td>
								<td>".$value->order_no."</td>
								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
								<td>".$value->account_name."</td>
								<td class='text-right'>".number_format($value->total_amount, 2)."</td>
								<td>".$status."</td>
							</tr>";

			}

		}

		return $output;

	}
}