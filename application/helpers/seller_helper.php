<?php 

if (!function_exists("tbl_process_order")){
	function tbl_process_order($query, $var_status, $closed){

		$output = "";

		$output .= "<table class='table table-striped table-sm table-bordered'>
						<thead>
							<tr>
								<th>Order No</th>
								<th>Order Date</th>
								<th>From</th>
								<th>Total Amount</th>
								<th>Delivery Type</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>";
		$status = "";
		$onclick = "";

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

				$output .= "<tr onclick='".$onclick."' class='cursor-pointer'>
								<td>".$value->order_no."</td>
								<td>".date('m/d/Y', strtotime($value->date_insert))."</td>
								<td>".$value->buyer_name."</td>
								<td>".number_format($value->total_amount, 2)."</td>
								<td>".$value->delivery_type_name."</td>
								<td>".$status."</td>
							</tr>";

			}

		}

		$output .= "</tbody>
					</table>";

		return $output;

	}
}

