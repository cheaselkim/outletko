<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/my_order.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/outletko/seller/my_order.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="seller_id" value="0">

<div class="container pt-3 pb-4">
	<div class="row">

		<div class="col-12 col-sm-12 col-md-12 col-lg-12">

			<!-- DIV HOME -->
			<div class="row" id="div-home">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-body py-4">

					<div class="row">
						<div class="col-12">

							<ul class="nav nav-tabs nav-justified">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#div-cart" id="btn-tab-cart">Cart</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#div-ongoing" id="btn-tab-ongoing">Ongoing</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#div-complete" id="btn-tab-complete">Complete</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#div-transactions" id="btn-tab-transaction">Transactions</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="tab-content">

						<div class="row" id="div-order-dtls">
							<div class="col-12 pt-3">
								<input type="hidden" id="div-dtls-no">
								<div class="row">
									<div class="col-6">
										<h4>Order Details</h4>
									</div>
									<div class="col-6 text-right">
										<button class="btn btn-danger" id="btn-order-dtls-back">Back</button>
									</div>
								</div>
								
								<div class="row">
									<div class="col-12 col-lg-6 col-md-6 col-sm-12">
										
										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Order No</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_order_no"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Order Date</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_order_daet"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Outlet</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_outlet"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Status</span>
											</div>
											<div class="col-6 col-lg-8">
												
											</div>
										</div>

									</div>
									<div class="col-12 col-lg-6 col-md-6 col-sm-12">
										
										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Delivery Type</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_delivery_type"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Payment Type</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_payment_type"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Scheduled Date</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_scheduled_date"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Scheduled Time</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_scheduled_time"></span>
											</div>
										</div>

										<div class="row" hidden>
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Courier</span>
											</div>
											<div class="col-6 col-lg-4">
												<span id="vw_courier"></span>
											</div>
										</div>

										<div class="row" hidden>
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Track No</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_track_no"></span>
											</div>
										</div>

									</div>
								</div>

								<hr style="border-top: 1px dashed black;">

								<div class="row">

									<div class="col-12 col-lg-6">

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Full Name</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_fullname"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Contact Person</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_contact_person"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Mobile Number</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_mobile"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Email</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_email"></span>
											</div>
										</div>

									</div>

									<div class="col-12 col-lg-6">

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Blk, Bldg No., St.</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_address"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Barangay</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_barangay"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">City</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_city"></span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Province</span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_province"></span>
											</div>
										</div>

										
									</div>

								</div>

								<div class="row">
									<div class="col-12">
										<span class="font-weight-600">Notes</span>
										<textarea class="form-control"></textarea>
									</div>
								</div>

								<hr style="border-top: 1px dashed black;">

								<div class="row">
									<div class="col-12 col-lg-6">

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Sub Total : </span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_sub_total">0.00</span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Shipping Fee : </span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_shipping_fee">0.00</span>
											</div>
										</div>

										<div class="row">
											<div class="col-6 col-lg-4">
												<span class="font-weight-600">Total Amount : </span>
											</div>
											<div class="col-6 col-lg-8">
												<span id="vw_total_amount">0.00</span>
											</div>
										</div>

									</div>
								</div>

								<div class="row mt-2">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-vw-products">
										<table class="table table-bordered table-sm" id="tbl-vw-products">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Qty</th>
													<th>Unit Price</th>
													<th>Total Price</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>


							</div>
						</div>


						<div class="row tab-pane active" id="div-cart">
							<div class="col-12">
								<div class="row px-4" id="div-list-prod">
								</div>							
							</div>
						</div>

						<div class="row tab-pane fade" id="div-ongoing" >
							<div class="col-12">
								<div class="row px-4" id="div-list-ongoing">
								</div>							
							</div>							
						</div>

						<div class="row tab-pane fade" id="div-complete" >
							<div class="col-12">
								<div class="row px-4" id="div-list-complete">
								</div>							
							</div>							 
						</div>

						<div class="row tab-pane fade" id="div-transactions">
							<div class="col-12">
								<div class="row px-4" id="div-list-transactions">
								</div>							
							</div>							
						</div>
						
					</div>


				</div>
			</div>

			<!-- DIV HOME -->

			<div class="row pt-2" id="div-checkout-details">
				
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 bg-white py-3">
					
					<div class="row">

						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							<span class="font-weight-600">Billing Address</span>
							<div class="row pt-1">
								<div class="col-12 col-lg-4 pad-right">
									<span>Full Name <span class="text-red">*</span></span>
									<input type="text" class="form-control" id="bill_name" value="<?php echo $this->session->userdata('user_fullname') ?>" readonly>
								</div>
								<div class="col-12 col-lg-8 pad-left">
									<span>House Number, Building and Street Name <span class="text-red">*</span></span>
									<input type="text" class="form-control" id="bill_address">
								</div>
							</div>
							<div class="row pt-1">
								<div class="col-12 col-lg-4 pad-right">
									<span>Barangay</span>
									<input type="text" class="form-control" id="bill_barangay">
								</div>
								<div class="col-12 col-lg-4 pad-center">
									<span>City <span class="text-red">*</span></span>
									<input type="text" class="form-control" id="bill_city" data-id="0">
								</div>
								<div class="col-12 col-lg-4 pad-left">
									<span>Province <span class="text-red">*</span></span>
									<input type="text" class="form-control" id="bill_province" data-id="0" readonly>
								</div>
							</div>
							<div class="row pt-1">
								<div class="col-12 col-lg-4 pad-right">
									<span>Mobile Number <span class="text-red">*</span></span>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text bg-white" id="basic-addon1" style="border-right: 0 !important;">+63</span>
										</div>
										<input type="text" class="form-control" id="bill_mobile">
									</div>
								</div>
								<div class="col-12 col-lg-4 pad-center">
									<span>Email <span class="text-red">*</span></span>
									<input type="text" class="form-control" id="bill_email" readonly>
								</div>
								<div class="col-12 col-lg-4 pad-left">
									<span>Contact Person</span>
									<input type="text" class="form-control" id="bill_contact" value="<?php echo $this->session->userdata('user_fullname') ?>">
								</div>
							</div>
							<div class="row pt-1">
								<div class="col-12">
									<span>Notes</span>
									<textarea class="form-control" id="bill_notes"></textarea>
								</div>
							</div>
						</div>

						<div class="col-12">
							<hr class="my-3" style="border-top: 1px dashed gray;">						
						</div>

						<div class="col-12">
							<span class="font-weight-600">Delivery & Payment</span>
							<div class="row">
								<div class="col-12 col-lg-4 col-md-6 col-sm-12">
									<span>Delivery Type</span>
									<select class="form-control" id="delivery_type">
										<option hidden></option>
									</select>
								</div>
							</div>
							<div class="row" hidden>
								<div class="col-12 col-lg-6">
									<span>Scheduled Date <span>(Available Days : <i id="sched_day">M,T,W,TH,F,S,SU</i> )</span> </span>
									<input type="date" class="form-control" id="sched_date" readonly>
								</div>
							</div>
							<div class="row" hidden>
								<div class="col-12 col-lg-6">
									<span>Scheduled Time</span>
									<!-- <select class="form-control bg-white" id="sched_time" disabled>
									</select> -->
									<input type="text" class="form-control" id="sched_time" disabled readonly> 
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-6" hidden>
									<hr class="my-2" style="border-top: 1px solid gray;">
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-4 col-md-6 col-sm-12">
									<span>Payment Type</span>
									<select class="form-control" id="payment_type" >
										<option hidden></option>
									</select>
								</div>
								<div class="col-12 col-lg-4 col-md-6 col-sm-12" id="div-bank-list">
									<span>Bank List</span>
									<select class="form-control" id="bank_list">
										<option hidden></option>
									</select>
								</div>
								<div class="col-12 col-lg-4 col-md-6 col-sm-12" id="div-remittance-list">
									<span>Remittance List</span>
									<select class="form-control" id="remittance_list">
										<option hidden></option>
									</select>
								</div>
							</div>


						</div>

						<div class="col-12">
							<hr class="my-3" style="border-top: 1px dashed gray;">						
						</div>

						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							<span class="font-weight-600">Order Summary</span>
							<div class="row">
								<div class="col-12 py-3">
									<div class="row">
										
									</div>
									<div class="row px-3" hidden>
										<div class="col-2 d-none d-md-block">
											<span class="font-weight-600">Order No</span>
										</div>
										<div class="col-4 col-lg-2 col-md-2">
											<span class="font-weight-600">Order Date</span>
										</div>
										<div class="col-8 col-lg-4 col-md-4">
											<span class="font-weight-600">Outlet Name</span>
										</div>
										<div class="col-2 d-none d-md-block">
											<span class="font-weight-600">Total Items</span>
										</div>
										<div class="col-2 d-none d-md-block">
											<span class="font-weight-600">Total Amount</span>
										</div>
									</div>
									<div class="row px-3 cursor-pointer" data-toggle="collapse" data-target="#div_order_1" hidden>
										<div class="col-2 border-1 d-none d-md-block">
											<span></span>
										</div>
										<div class="col-4 col-lg-2 col-md-2 border-1">
											<span><?php echo date("m/d/Y"); ?></span>
										</div>
										<div class="col-8 col-lg-4 col-md-4 border-1">
											<span id="comp_name"></span>
										</div>
										<div class="col-2 border-1 text-center d-none d-md-block">
											<span id="comp_total_items"></span>
										</div>
										<div class="col-2 border-1 text-right d-none d-md-block">
											<span id="comp_total_amount"></span>
										</div>
									</div>


									<div class="row px-3 " id="div_order_1">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
											<table class="table table-sm " id="prod_dtls" style="width: 100%;">
												<thead>
													<tr>
														<th class="" style="width: 70%;background: white !important;color: black;">Product</th>
														<th class="text-right" style="width: 5%;background: white !important;color: black;">Qty</th>
														<th class="text-right" style="width: 10%;background: white !important;color: black;">Unit Price</th>
														<th class="text-right" style="width: 15%;background: white !important;color: black;">Total Amount</th>
													</tr>												
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<hr class="my-3" style="border-top: 1px solid gray;">																										
										</div>
									</div>
									<div class="row">
										<div class="col-8">
											<span class="font-weight-600">Sub Total</span>
										</div>
										<div class="col-4 text-right">
											<span class="font-weight-600" id="sub_total">0.00</span>												
										</div>
									</div>
									<div class="row">
										<div class="col-8">
											<span class="font-weight-600">Shipping Fee</span>
										</div>
										<div class="col-4 text-right">
											<span class="font-weight-600" id="shipping_fee">100.00</span>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<hr style="border-top: 1px solid gray;">
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-lg-8">
											<span class="font-weight-600">Total</span> 
										</div>
										<div class="col-6 col-lg-4 text-right">
											<span class="font-weight-600" id="total_amount">PHP 0.00</span>
										</div>
									</div>
									<div class="row pt-5">
										<div class="col-12 text-right py-2 div-checkout">
											<div class="row">
												<div class="col-12 text-right">
													<button class="btn btn-danger font-weight-600" id="btn_cancel_order">Cancel</button>									
													<button class="btn btn-orange font-weight-600" id="btn_confirm_order">Confirm my Order</button>									
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>

					</div>


				</div>
			</div>

			<div class="row pt-2" id="div-order-summary">
				<div class="col-12 col-lg-12 col-md-12 col-sm-12">
					
					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="h2">Instructions</span>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12 col-lg-4 col-md-12 col-sm-12">
							<input type="text" class="form-control bg-white" id="summ-payment-type-list" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<p class="mb-0">Please click <span class="font-weight-600">"Place my order" button to place your order</span></p>							
						</div>						
					</div>

					<div class="row mt-3" id="div-bank-payment">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<table class="table table-sm table-bordered">
								<thead>
									<tr>
										<th colspan="2"></th>
									</tr>
									<tr>
										<td colspan="2" class="font-weight-600">Please make your payment/deposit to : </td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="width: 10%;">Account Name</td>
										<td style="width: 80%;" id="bank_name">Account Name</td>
									</tr>
									<tr>
										<td style="width: 10%;">Account No</td>
										<td style="width: 80%;" id="bank_no">0-1234-5-5612-12</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">After payment/deposit, please send your copy of deposit slip through email or sms: <span class="font-weight-600 text-blue" id="summ-bank-email">email@email.com</span> / <span class="font-weight-600 text-blue" id="summ-bank-mobile">09123456789</span></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>

					<div class="row" id="div-remittance-payment">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<table class="table table-sm table-bordered">
								<thead>
									<tr>
										<th colspan="2"></th>
									</tr>
									<tr>
										<td colspan="2" class="font-weight-600">Please make your payment/deposit to : </td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="width: 10%;">Name</td>
										<td style="width: 80%;" id="remittance_name">Name</td>
									</tr>
									<tr>
										<td style="width: 10%;">Mobile No</td>
										<td style="width: 80%;" id="remittance_mobile">09123456789</td>
									</tr>
									<tr>
										<td style="width: 10%;">Email</td>
										<td style="width: 80%;" id="remittance_email">email@email.com</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">After payment/deposit, please send your copy of deposit slip through email or sms: <span class="font-weight-600 text-blue" id="summ-remitt-email">email@email.com</span> / <span class="font-weight-600 text-blue" id="summ-remitt-mobile">09123456789</span></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-6 col-md-6 col-sm-6">
							<button class="btn btn-primary" id="btn_order_payment">Other Payment Method</button>
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12 text-right">
							<button class="btn btn-danger" id="btn_cancel_place">Cancel</button>
							<button class="btn btn-orange" id="btn_place_order">Place my Order</button>
						</div>
					</div>

				</div>
			</div>

		</div>

		<!-- ADS -->
<!-- 		<div class="col-2 col-sm-12 col-md-2 col-lg-2 pr-0 pl-1 d-none d-lg-block" >
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 " >
					<div class="div-ads px-2 pt-2">
						<span class="text-green">Ads Space</span>
						<div class="row">
							<div class="col-lg-12 col-md-4 pt-3">
								<div class="div-ads-img">	
									<img src="https://5d973bb52ee8692cdb78-ae7e48b6a1da5e36e0a688675ec574a6.ssl.cf1.rackcdn.com/34/56/78/34567836/ad_34567836_c4edf44e26169131_web.jpg" class="img-fluid">
								</div>	
							</div>

							<div class="col-lg-12 col-md-4 pt-3">
								<div class="div-ads-img">	
									<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/a41d8529540325.5732a809bcc1b.png" class="img-fluid">
								</div>	
							</div>

							<div class="col-lg-12 col-md-4 pt-3">
								<div class="div-ads-img">	
									<img src="http://www.wheninmanila.com/wp-content/uploads/2016/05/FA_Vikings_Dress-like-a-Viking-Promo-promo_5x5-01-e1462723075238.jpg" class="img-fluid">
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- ADS -->
	</div>

</div>


