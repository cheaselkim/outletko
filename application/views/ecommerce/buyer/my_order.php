<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/my_order.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/ecommerce/buyer/my_order.js') ?>"></script>
<input type="hidden" id="seller_id" value="0">
<input type="hidden" id="payment_type_id" value="0">

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
									<a class="nav-link active tab-item" data-toggle="tab" href="#div-cart" id="btn-tab-cart">Cart</a>
								</li>
								<li class="nav-item">
									<a class="nav-link tab-item" data-toggle="tab" href="#div-ongoing" id="btn-tab-ongoing">Ongoing <span class="ml-auto"><span class="badge badge-info" id="span-confirm">0</span> <span class="badge badge-danger" id="span-denied">0</span>  <span class="badge badge-warning" id="span-proof">0</span> <span class="badge badge-primary" id="span-acknowledge">0</span> <span class="badge badge-light" style="border: 1px solid black;" id="span-pending">0</span> </span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link tab-item" data-toggle="tab" href="#div-complete" id="btn-tab-complete">Delivery</a>
								</li>
								<li class="nav-item">
									<a class="nav-link tab-item mr-0" data-toggle="tab" href="#div-transactions" id="btn-tab-transaction">Transactions</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="tab-content  pt-2">

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

                                <div class="row mx-0 alert-success py-2 my-1" id="div-proof">
                                    <div class="col-12">

                                    <div class="row" hidden>
                                        <div class="col-12">
                                            <hr style="border-top: 1px solid green;" class="my-2">
                                        </div>
                                    </div>


                                        <div class="row">
                                            <div class="col-12 overlay-text alert-danger text-center">
                                                <span class="">Proof of Payment already sent</span>
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                <h5>Proof of Payment</h5>
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 text-right">
                                                <button class="btn btn-success" id="btn-send-proof" >Send Proof of Payment</button>                                            
                                            </div>
                                        </div>
                                        <div class="row mb-1 div-proof-denied alert alert-danger py-1" id="div-proof-denied">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <span class="font-weight-600">Payment Denied by Seller</span>
                                                <p class="mb-0">Reason : <span id="reason-denied"></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 pr-0">
                                                <span class="font-weight-600">Order No</span>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                                                <input type="text" class="form-control textbox-green bg-white" id="proof-order-no" data-id="" readonly>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-2 col-sm-12 pr-0">
                                                <span class="font-weight-600">Upload Files <span class="text-red">*</span></span>
                                            </div>
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                                                <button class="btn btn-modal-img-upload btn-outline-success btn-block ml-0 w-100" id="btn-upload-proof-file" style="height:35px !important;border-radius:.25rem !important">
                                                    Upload File
                                                    <input type="file" id="btn-upload-proof" class="img-upload-modal btn btn-success" style="height:35px !important;border-radius:.25rem !important">
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-12 col-lg-2 col-md-4 col-sm-12 pr-0">
                                                <span class="font-weight-600">Message <span class="text-red">*</span></span>
                                            </div>
                                            <div class="col-12 col-lg-10 col-md-8 col-sm-12">
                                                <textarea  id="proof-message"  rows="3" class="form-control textbox-green"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <hr style="border-top: 1px solid green;" class="my-2">
                                            </div>
                                        </div>


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
												<span id="vw_order_date"></span>
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
                                                <span id="vw_status" class="alert alert-success my-0 py-0"></span>
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
								<div class="row px-3 pt-2" id="div-list-prod">
								</div>							
							</div>
						</div>

						<div class="row tab-pane fade" id="div-ongoing" >
							<div class="col-12">
								<div class="row px-3" id="div-list-ongoing">
								</div>							
							</div>							
						</div>

						<div class="row tab-pane fade" id="div-complete" >
							<div class="col-12">
								<div class="row px-3" id="div-list-complete">
								</div>							
							</div>							 
						</div>

						<div class="row tab-pane fade" id="div-transactions">
							<div class="col-12">
								<div class="row px-3" id="div-list-transactions">
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

						<!-- <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-checkout-details-1">
							<div class="row">
								<div class="col-12 col-lg-4 col-md-4 col-sm-12 div-deliver">
									<div class="row">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center border-bottom-light-green">
											<span class="font-weight-600 font-size-24">1. Deliver to <span class="text-dark-green font-size-24 font-weight-400"  id="deliver-icon"><i class="far fa-check-circle"></i></span> </span>
										</div>
										<div class="col-10 col-lg-8 col-md-10 col-sm-10 mx-auto div-process-btn text-center">
											<button class="btn btn-orange btn-block" data-toggle="modal" data-target="#modal_address">
                                                <span class="font-weight-400 text-white">Enter an Address</span>
                                            </button>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-4 col-md-4 col-sm-12 div-arrive">
									<div class="row">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center border-bottom-light-green">
											<span class="font-weight-600 font-size-24">2. Arrive by <span class="text-dark-green font-size-24 font-weight-400" id="arrive-icon"><i class="far fa-check-circle"></i></span></span>
										</div>
										<div class="col-10 col-lg-8 col-md-10 col-sm-10 mx-auto div-process-btn">
											<button class="btn btn-yellow-gold btn-block" data-toggle="modal" data-target="#modal_delivery" id="btn-modal-delivery">Select Type</button>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-4 col-md-4 col-sm-12 div-payment">
									<div class="row">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center border-bottom-light-green">
											<span class="font-weight-600 font-size-24">3. Payment Type <span class="text-dark-green font-size-24 font-weight-400" id="payment-icon"><i class="far fa-check-circle"></i></span></span>
										</div>
										<div class="col-10 col-lg-8 col-md-10 col-sm-10 mx-auto div-process-btn">
											<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal_payment">Select Payment Type</button>
										</div>
									</div>
								</div>
							</div>
							<div class="row div-checkout-footer">
								<div class="col-12 col-lg-4 col-md-4 col-sm-12 text-center pt-2 div-checkout-footer-fee">
									<div class="row">
										<div class="col-12 col-lg-6 col-md-6 col-sm-12 ">
											<p class="mb-0 font-weight-400 font-size-20">Delivery Fee</p>
											<p class="mb-0 font-weight-600 font-size-20">PHP <span id="vw_delivery_fee">0.00</span></p>
										</div>
										<div class="col-12 col-lg-6 col-md-6 col-sm-12">
											<p class="mb-0 font-weight-400 font-size-20">Total Order</p>
											<p class="mb-0 font-weight-600 font-size-20">PHP <span id="vw_total_order">0.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-4 col-md-4 col-sm-12 text-center div-checkout-footer-total pt-2">
									<p class="mb-0 font-weight-400 font-size-20">Grand Total</p>
									<p class="mb-0 font-weight-600 font-size-20">PHP <span id="vw_grand_total">0.00</span></p>
								</div>
								<div class="col-12 col-lg-4 col-md-4 col-sm-12 pt-2 div-checkout-footer-button">
									<div class="row">
										<div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-2">
											<button class="btn btn-danger btn-block font-size-24" id="btn_cancel_order">Cancel</button>
										</div>
										<div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-2">
											<button class="btn btn-gray btn-block font-size-24" id="btn_confirm_order">Place Order</button>
										</div>
									</div>
								</div>
							</div>
						</div> -->

                        <div class="col-12 col-lg-12 col-md-12 col-sm-12"> <!-- div-checkout-details-1 -->

                            <div class="container mx-0" id="div-accordion">
                                <div id="accordion" class="accordion">
            
                                    <div class="card div-billing" id="div-billing" data-id="0">
                                        <div class="card-header py-1">
                                            <a class="collapsed card-link  font-size-20" data-toggle="collapse" href="#collapse-billing">
                                            <i class="fa fa-angle-down"></i> Delivery & Billing Address <span class="text-orange font-size-20 font-weight-400"  id="deliver-icon"><i class="far fa-check-circle"></i></span>
                                            </a>
                                        </div>

                                        <div id="collapse-billing" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Full Name</span>
                                                                    <input type="text" class="form-control bg-white textbox-green" id="bill_name"  value="<?php echo $this->session->userdata('user_fullname'); ?>" readonly>                                                                
                                                                </div>
                                                                <div class="col-12 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Email <span class="text-red">*</span> </span>
                                                                    <input type="text" class="form-control textbox-green" id="bill_email">
                                                                </div>
                                                                <div class="col-12 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Mobile No <span class="text-red">*</span> </span>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-white textbox-green" id="basic-addon1" style="border-right: 0 !important;">+63</span>
                                                                        </div>
                                                                        <input type="text" class="form-control textbox-green" id="bill_mobile">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Phone No</span>
                                                                    <input type="text" class="form-control textbox-green" id="bill_phone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                            <span class="font-size-16 mb-1">Address <span class="text-red">*</span> </span>
                                                            <input type="text" class="form-control textbox-green" id="bill_address">
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Barangay</span>
                                                                    <input type="text" class="form-control textbox-green" id="bill_barangay">
                                                                </div>
                                                                <div class="col-12 col-lg-4 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Town / City <span class="text-red">*</span></span>
                                                                    <input type="text" class="form-control textbox-green" id="bill_city">
                                                                </div>
                                                                <div class="col-12 col-lg-4 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Province <span class="text-red">*</span> </span>
                                                                    <input type="text" class="form-control textbox-green" id="bill_province" readonly>
                                                                </div>
                                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                                                                    <span class="font-size-16 mb-1">Zip Code</span>
                                                                    <input type="text" class="form-control textbox-green" id="bill_zip">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                            <span class="font-size-16 mb-1">Contact Person <span class="text-red">*</span> </span>
                                                            <input type="text" class="form-control textbox-green" id="bill_contact" value="<?php echo $this->session->userdata('user_fullname'); ?>">
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="save_info" name="example1">
                                                                <label class="custom-control-label" for="save_info">Save this information for next time?</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <span class="font-size-16 mb-1">Delivery Instructions</span>
                                                            <textarea class="form-control textbox-green" id="bill_notes" rows="3"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-3 div-shipping-method" id="div-shipping-method" data-id="0">
                                        <div class="card-header py-1">
                                            <a class="collapsed card-link font-size-20" data-toggle="collapse" href="#collapse-shipping">
                                                <i class="fa fa-angle-down"></i> Shipping Details <span class="text-orange font-size-20 font-weight-400" id="arrive-icon"><i class="far fa-check-circle"></i></span>
                                            </a>
                                        </div>
                                        <div id="collapse-shipping" class="collapse" data-parent="#accordion">
                                            <div class="card-body">

                                                <div class="container-fluid px-0">
    
                                                    <div class="row" id="div-del-not-avail">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                            <span class="text-red font-weight-600 font-size-20">Delivery is not available in your area.</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="row">

                                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                            <span>Delivery Type <span class="text-red">*</span></span>
                                                            <select class="form-control" id="delivery_type">

                                                            </select>
                                                        </div>

                                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-modal-delivery-details"  id="div-courier" hidden>
                                                            <span>Courier</span>
                                                            <select class="form-control" id="courier"></select>
                                                        </div>



                                                    </div>
    
                                                    <div class="row div-modal-delivery-details">
                                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-modal-delivery-details">
                                                            <span>Delivery Fee</span>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text text-black">PHP</span>
                                                                </div>
                                                            <input type="text" class="form-control text-right" id="delivery_fee" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row div-modal-delivery-details" hidden>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" >
                                                            <span>Standard Delivery</span>
                                                            <input type="text" class="form-control" id="std_delivery" readonly>
                                                        </div>
                                                    </div>
        
                                                    <div class="row div-modal-delivery-details" hidden>
                                                        <div class="col-12 col-lg-9 col-md-10 col-sm-12 mx-auto">
            
                                                            <div class="row px-0">
                                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-2 px-0 text-center">
                                                                    <div id="datepicker"></div>
                                                                    <span class="font-italic text-red" id="deliver_date_note">Note : You are not allowed to choose delivery date</span>								 
                                                                </div>
                                                            </div>
                    
                                                            <div class="row">
                                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 mx-auto" hidden>
                                                                    <span>Your Order will be delivered on :</span>
                                                                    <input type="text" class="form-control" id="order_delivered_date" readonly>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card mt-3 div-hdr-payment" id="div-hdr-payment" data-id="0">
                                        <div class="card-header py-1">
                                            <a class="collapsed card-link font-size-20" data-toggle="collapse" href="#collapse-payment">
                                                <i class="fa fa-angle-down"></i> Payment Method <span class="text-orange font-size-20 font-weight-400" id="payment-icon"><i class="far fa-check-circle"></i></span>
                                            </a>
                                        </div>
                                        <div id="collapse-payment" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="container-fluid">
                                                    <div class="row" id="div-payment">

                                                    </div>
                                                    <div class="row" id="div-payment-method">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
                                                            <hr style="border-top:2px solid rgb(119, 147, 60);" class="mb-0">
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
                                                            <span class="font-weight-600 font-size-16">Payment Method</span>
                                                            <select class='form-control' id="summ-payment-type-list"></select>
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

					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12" id="div-order-details">
							<span class="font-weight-600">Order Items</span>
							<div class="row">
								<div class="col-12 py-2">
									<div class="row" id="div_order_1">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<table class="table table-sm " id="prod_dtls" style="width: 100%;">
												<thead>
													<tr>
														<th class="" colspan="2" style="width: 70%;background: white !important;color: black;">Product</th>
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
											<hr class="my-1" style="border-top: 1px solid gray;" >																										
										</div>
									</div>
									<div class="row">
										<div class="col-8 col-lg-10 col-md-10 col-sm-8 text-right pr-0">
											<span class="font-weight-600 font-size-20">Sub Total</span>
										</div>
										<div class="col-4 col-lg-2 col-md-2 col-sm-4 text-right pl-0">
                                        <span class="font-weight-600 font-size-20">&#8369; <span id="sub_total">0.00</span></span>
										</div>
									</div>
									<div class="row">
										<div class="col-8 col-lg-10 col-md-10 col-sm-8 text-right pr-0">
											<span class="font-weight-600 font-size-20">Shipping Fee</span>
										</div>
										<div class="col-4 col-lg-2 col-md-2 col-sm-4 text-right pl-0">
											<span class="font-weight-600 font-size-20">&#8369; <span id="shipping_fee">100.00</span></span>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-lg-10 col-md-10 col-sm-8 text-right pr-0">
											<span class="font-weight-600 font-size-30 text-dark-green">Grand Total</span> 
										</div>
										<div class="col-6 col-lg-2 col-md-10 col-sm-4 text-right pl-0">
											<span class="font-weight-600 font-size-30 text-dark-green">&#8369; <span id="total_amount">PHP 0.00</span></span>
										</div>
									</div>


								</div>
							</div>
						</div>

					</div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                            <div class="bg-green py-2 text-right px-2">
                                <button class="btn btn-danger font-size-20" id="btn_cancel_order">Cancel</button> &nbsp; &nbsp;
                                <button class="btn btn-orange  font-size-20" id="btn_confirm_order">Checkout Order</button>
                            </div>
                        </div>
                    </div>

				</div>
			</div>

			<div class="row pt-2" id="div-order-summary">
				<div class="col-12 col-lg-12 col-md-12 col-sm-12">

					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="h2">Summary</span>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12 col-lg-4 col-md-12 col-sm-12">
							<!-- <select class='form-control' id="summ-payment-type-list"></select> -->
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<table class="table table-sm table-bordered">
								<tbody>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Name</td>
										<td><?php echo $this->session->userdata('user_fullname') ?></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Address</td>
										<td id="summ-address"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Contact No</td>
										<td id="summ-contact-no"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Contact Person</td>
										<td id="summ-contact-person"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Notes</td>
										<td id="summ-notes"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<table class="table table-sm table-bordered">
								<tbody>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Delivery Type</td>
										<td id="summ-delivery"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Courier</td>
										<td id="summ-courier"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Shipping Fee (PHP)</td>
										<td id="summ-shipping-fee"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Payment Type</td>
										<td id="summ-payment-type"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Payment Method</td>
										<td id="summ-payment-method"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<table class="table table-sm table-bordered">
								<tbody>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Total Order (PHP)</td>
										<td id="summ-total-order"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Shipping Fee (PHP)</td>
										<td id="summ-delivery-fee"></td>
									</tr>
									<tr>
										<td style="width: 15%;" class="font-weight-600">Grand Total (PHP)</td>
										<td id="summ-grand-total"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
							<button class="btn btn-danger" id="btn_cancel_place">Cancel</button>
							<button class="btn btn-orange" id="btn_confirm_order_2">Confirm my Order</button>
						</div>
					</div>


				</div>
			</div>

			<div class="row pt-2" id="div-order-confirm">
				<div class="col-12 col-lg-12 col-md-12 col-sm-12">

					<div class="row mb-1">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<!-- <p class="mb-0">Please click <span class="font-weight-600">"Place my order" button to place your order</span></p>							 -->
							<p class="mb-0 font-weight-600">Payment Instructions</p>							
                            </div>						
					</div>

					<div class="row mb-2">
						<div class="col-12 col-lg-4 col-md-8 col-sm-12">
							<input type="text" class="form-control bg-white" id="oc-payment-method" readonly>
						</div>
					</div>

					<div class="row" id="div-bank-payment">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<table class="table table-sm table-bordered">
								<thead>
									<tr hidden>
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

					<div class="row" hidden>
						<div class="col-12 col-lg-6 col-md-6 col-sm-6" >
							<button class="btn btn-primary" id="btn_order_payment">Other Payment Type</button>
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12 text-right pt-4">
							<button class="btn btn-danger" id="btn_cancel_place_2" Hidden>Cancel</button>
							<button class="btn btn-orange" id="btn_place_order" hidden>Place my Order</button>
						</div>
					</div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <a href="<?php echo base_url('my-order'); ?>" class="btn btn-primary px-5">Cart</a>
                        </div>
                    </div>

				</div>
			</div>

		</div>

	</div>

</div>

<div class="modal" id="modal_address">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-1">
				<h4 class="modal-title">Delivery Details</h4>
			</div>
			<div class="modal-body pt-1 pb-3">
				<div class="container-fluid px-0">
					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="font-size-16 mb-1">Full Name</span>
							<input type="text" class="form-control" id="bill_name"  value="<?php echo $this->session->userdata('user_fullname'); ?>" readonly>
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="font-size-16 mb-1">Address <span class="text-red">*</span> </span>
							<input type="text" class="form-control" id="bill_address">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span class="font-size-16 mb-1">Barangay</span>
							<input type="text" class="form-control" id="bill_barangay">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span class="font-size-16 mb-1">Town / City <span class="text-red">*</span></span>
							<input type="text" class="form-control" id="bill_city">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span class="font-size-16 mb-1">Province <span class="text-red">*</span> </span>
							<input type="text" class="form-control" id="bill_province" readonly>
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span class="font-size-16 mb-1">Zip Code</span>
							<input type="text" class="form-control" id="bill_zip">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span class="font-size-16 mb-1">Mobile No <span class="text-red">*</span> </span>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white" id="basic-addon1" style="border-right: 0 !important;">+63</span>
								</div>
								<input type="text" class="form-control" id="bill_mobile">
							</div>
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span class="font-size-16 mb-1">Phone No</span>
							<input type="text" class="form-control" id="bill_phone">
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="font-size-16 mb-1">Email <span class="text-red">*</span> </span>
							<input type="text" class="form-control" id="bill_email">
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="font-size-16 mb-1">Contact Person <span class="text-red" hidden>*</span> </span>
							<input type="text" class="form-control" id="bill_contact" value="<?php echo $this->session->userdata('user_fullname'); ?>">
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="save_info" name="example1">
								<label class="custom-control-label" for="save_info">Save this information for next time?</label>
							</div>
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
							<span class="font-size-16 mb-1">Delivery Instructions</span>
							<textarea class="form-control" id="bill_notes" rows="3"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-left">
							<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
						</div>
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-right">
							<button type="button" class="btn btn-orange btn-block" data-dismiss="modal" id="btn_save_delivery_address">Continue</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_delivery">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-1">
				<h4 class="modal-title">Delivery Schedule</h4>
			</div>
			<div class="modal-body pt-1 pb-3">
				<div class="container-fluid px-0">
                    <div class="row" id="div-del-not-avail">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <span class="text-red font-weight-600 font-size-20">Delivery is not available in your area.</span>
                        </div>
                    </div>
					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span>Delivery Type <span class="text-red">*</span></span>
							<select class="form-control" id="delivery_type">

							</select>
						</div>
					</div>
					<div class="row div-modal-delivery-details">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12" >
							<span>Standard Delivery</span>
							<input type="text" class="form-control" id="std_delivery" readonly>
						</div>
					</div>
					<div class="row div-modal-delivery-details" id="div-courier">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span>Courier</span>
							<select class="form-control" id="courier"></select>
						</div>
					</div>
					<div class="row div-modal-delivery-details">
						<div class="col-12 col-lg-9 col-md-10 col-sm-12 mx-auto">
							<div class="row">
								<div class="col-12 col-lg-12 col-md-12 col-sm-12">
									<span>Delivery Fee</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-black">PHP</span>
                                        </div>
                                            <input type="text" class="form-control text-right" id="delivery_fee" readonly>
                                    </div>
								</div>
							</div>
							<div class="row px-0">
								<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-2 px-0 text-center">
									<div id="datepicker"></div>
									<span class="font-italic text-red" id="deliver_date_note">Note : You are not allowed to choose delivery date</span>								 
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-12 col-md-12 col-sm-12 mx-auto" hidden>
									<span>Your Order will be delivered on :</span>
									<input type="text" class="form-control" id="order_delivered_date" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-left">
							<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
						</div>
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-right">
							<button type="button" class="btn btn-success btn-block" data-dismiss="modal" id="btn_save_delivery_details">Continue</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_payment">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-1">
				<h4 class="modal-title">Payment Type</h4>
			</div>
			<div class="modal-body pt-1 pb-3">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
							<span class="text-uppercase font-weight-400 font-size-20">Please choose your payment type / method</span>
						</div>
					</div>
					<div class="row" id="div-payment">

					</div>
                    <div class="row" id="div-payment-method">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
                            <hr style="border-top:2px solid rgb(119, 147, 60);" class="mb-0">
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
                            <span class="font-weight-600 font-size-16">Payment Method</span>
                            <select class='form-control' id="summ-payment-type-list"></select>
                        </div>
                    </div>
				</div>
			</div>
			<div class="modal-footer py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-left">
							<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
						</div>
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-right">
							<button type="button" class="btn btn-orange btn-block" data-dismiss="modal" id="btn_delivery_payment_type">Continue</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal-review" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title">Review</h4>
            </div>
            <div class="modal-body pt-1 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <input type="hidden" id="review-store-id">
                            <span id="review-store-name" class="font-weight-600 h3">Store Name</span>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mx-auto text-center">
                                <span class="rating-emoji">&#128544;</span>
                                <span class="rating-emoji">&#128542;</span>
                                <span class="rating-emoji">&#128528;</span>
                                <span class="rating-emoji">&#128512;</span>
                                <span class="rating-emoji">&#128525;</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-3">
                            <textarea name="" id="review-text" rows="5" class="form-control textbox-orange" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button class="btn btn-orange text-white" id="review-save">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- <div id="modal-proof" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title">Proof of Payment</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" class="btn btn-success" id="btn-send-proof">Send</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div> -->
