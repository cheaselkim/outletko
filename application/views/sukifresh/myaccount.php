<script type="text/javascript">
  $(function(){
    $('#datepicker').datepicker({
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      changeMonth: true,
      changeYear : true
    });
  });
</script>

<style type="text/css">

.ui-datepicker{
	margin: 0 auto;
}
	
.img-prod-account{
	height: 60px;
}

</style>

<script type="text/javascript" src="<?php echo base_url('js/sukifresh/myaccount.js') ?>"></script>

<div class="row mt-2">

	<div class="col-12 col-lg-12 col-md-12 col-sm-12">
		
		<div class="row">
			<div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-0">
				<span class="h2 text-light-green-2">Process Order</span>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-12 col-md-12 col-sm-12">
				<div class="row div-process-order">
					<div class="col-12 col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<div class="col-12 col-lg-8 col-md-7 col-sm-12">
								<div class="row">
									<div class="col-12 col-lg-6 col-md-6 col-sm-12 div-deliver">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center py-1 border-bottom-light-green">
												<span class="font-size-24">1. Deliver to</span>
											</div>
										</div>
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center div-process-btn">
												<button class="btn btn-orange" data-toggle="modal" data-target="#modal_address">Enter Address</button>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-6 col-md-6 col-sm-12 div-arrive">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center py-1 border-bottom-light-green">
												<span class="font-size-24">2. Delivery Schedule</span>
											</div>
										</div>								
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center div-process-btn">
												<button class="btn btn-light-green-2" data-toggle="modal" data-target="#modal_schedule">Enter Delivery Date</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-5 col-sm-12 div-payment-type">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center py-1 border-bottom-light-green">
										<span class="font-size-24">3. Payment Type</span>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center div-payment-btn">
										<button class="btn btn-warning" data-toggle="modal" data-target="#modal_payment">Select Payment Type</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<div class="col-12 col-lg-12 col-md-12 col-sm-12">
						<div class="row div-deliver-account">
							<div class="col-12 col-lg-3 text-center">
								<p class="mb-0 font-size-20">Delivery Fee</p>
								<p class="mb-0 font-size-20">PHP 0.00</p>
							</div>
							<div class="col-12 col-lg-9">
								<div class="row">
									<div class="col-12 col-lg-4"></div>
									<div class="col-12 col-lg-3 text-center">
										<p class="mb-0 font-size-20">Order Total</p>
										<p class="mb-0 font-size-20 font-weight-bold">PHP <span id="order_total">0.00</span></p>										
									</div>
									<div class="col-12 col-lg-5 ml-auto pt-3">
										<button class="btn btn-gray btn-block font-size-24">Place Order</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row div-order-details">
					<div class="col-12 col-lg-12 col-md-12 col-sm-12 border-bottom-blue">
						<div class="row">
							<div class="col-6 col-lg-6 col-md-6 col-sm-6 py-1 pl-0">
								<span class="font-size-24">Order Details</span>
							</div>
							<div class="col-6 col-lg-6 col-md-6 col-sm-6 text-right py-1">
								<button class="btn border-light-green text-light-green-2">Modify Order</button>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-2 px-0">
						<table class="table table-sm " id="tbl-products">
							<thead>
								<tr>
									<th class="col-7 font-weight-600" style="background: white !important;color: black;">Products</th>
									<th class="col-1 text-center font-weight-600" style="background: white !important;color: black;">Qty</th>
									<th class="col-2 text-right font-weight-600" style="background: white !important;color: black;">Unit Price</th>
									<th class="col-2 text-right font-weight-600" style="background: white !important;color: black;">Total Price</th>
								</tr>
							</thead>
							<tbody></tbody>
							<tfoot>
								<td colspan="3"  class="text-right font-weight-600">Total</td>
								<td class="text-right font-weight-600 text-right" id="tbl-total">0.00</td>
							</tfoot>
						</table>
<!-- 						<div class="row">
							<div class="col-7">
								<div class="row">
									<p class="mb-0 font-size-18">Products</p>
								</div>
								<div class="row">
									<div class="col-2">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/red.png') ?>" class='img-prod-account' id="prod-img">
									</div>
									<div class="col-10 pt-3">
										<span class="font-size-17" id="prod-name">Red Cabbage</span>
									</div>
								</div>
							</div>
							<div class="col-1">
								<div class="row text-center">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<p class="mb-0 font-size-18">Qty</p>											
									</div>
								</div>								
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 pt-3 text-center">
										<p class="mb-0 font-size-17" id="prod-qty">1</p>										
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
										<p class="mb-0 font-size-18">Unit Price</p>									
									</div>
								</div>								
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 pt-3 text-center">
										<p class="mb-0 font-size-17" id="prod-price">90.00</p>										
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
										<p class="mb-0 font-size-18">Total Price</p>									
									</div>
								</div>								
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 pt-3 text-center">
										<p class="mb-0 font-size-17" id="prod-total-price">90.00</p>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>


	</div>

</div>

<!-- The Modal -->
<div class="modal" id="modal_address">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-1">
				<h4 class="modal-title">Delivery Address Details</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
			<div class="modal-body px-1">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>First Name</span>
							<input type="text" class="form-control" placeholder="">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Last Name</span>
							<input type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span>Address</span>
							<input type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Barangay</span>
							<input type="text" class="form-control" placeholder="">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Town/City</span>
							<input type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Province</span>
							<input type="text" class="form-control" placeholder="">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Zip Code</span>
							<input type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Mobile No</span>
							<input type="text" class="form-control" placeholder="">
						</div>
						<div class="col-12 col-lg-6 col-md-6 col-sm-12">
							<span>Phone No.</span>
							<input type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span>Delivery Instructions</span>
							<textarea class="form-control" cols="5" placeholder="Please provide any information necessary for us to get your order to your door"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pl-0">				
							<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
						</div>
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pr-0 text-right">				
							<button type="button" class="btn btn-dark-green btn-block text-white" data-dismiss="modal">Continue</button>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>


<!-- The Modal -->
<div class="modal" id="modal_schedule">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-1">
				<h4 class="modal-title">Delivery Schedule</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
							<span>Standard Delivery</span>
							<input type="text" class="form-control" value="5 Days from placement of Order">
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-12 col-lg-8 col-md-12 col-sm-12 px-0 mx-auto">
							<div class="row">
								<div class="col-12 col-lg-12 col-md-12 col-sm-12">
									<span>Delivery Fee</span>
									<input type="text" class="form-control" value="100.00">
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-2">
									<div id="datepicker"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-12 col-md-12 col-sm-12">
									<span>Your Order will be delivered on : </span>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-4 col-lg-6 col-md-6 col-sm-6 pl-0">
							<button type="button" class="btn bg-danger text-white btn-block" data-dismiss="modal">Cancel</button>							
						</div>
						<div class="col-8 col-lg-6 col-md-6 col-sm-6 pr-0">
							<button type="button" class="btn btn-dark-green text-white btn-block" data-dismiss="modal">Proceed to Place Order</button>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- The Modal -->
<div class="modal" id="modal_payment">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-1">
				<h4 class="modal-title">Payment Type</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
							<span class="text-uppercase">Please choose your payment type / method</span>
						</div>
					</div>
					<div class="row py-3">
						<div class="col-12 col-gl-12 col-md-12 col-sm-12 div-modal-payment-type text-center mt-2 py-3 cursor-pointer">
							<img src="<?php echo base_url('assets/images/sukifresh/payment/visa.png') ?>" class='img-fluid' style="height: 70px;">
						</div>
						<div class="col-12 col-gl-12 col-md-12 col-sm-12 div-modal-payment-type text-center mt-2 py-2 cursor-pointer">
							<img src="<?php echo base_url('assets/images/sukifresh/payment/cash.png') ?>" class='img-fluid' style="height: 80px;">
						</div>
						<div class="col-12 col-gl-12 col-md-12 col-sm-12 div-modal-payment-type text-center mt-2 py-2 cursor-pointer">
							<img src="<?php echo base_url('assets/images/sukifresh/payment/bank.png') ?>" class='img-fluid' style="height: 75px;">
						</div>
						<div class="col-12 col-gl-12 col-md-12 col-sm-12 div-modal-payment-type text-center mt-2 py-2 cursor-pointer">
							<img src="<?php echo base_url('assets/images/sukifresh/payment/credit.png') ?>" class='img-fluid' style="height: 80px;">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer py-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pl-0">
							<button type="button" class="btn bg-danger text-white btn-block" data-dismiss="modal">Cancel</button>							
						</div>
						<div class="col-6 col-lg-6 col-md-6 col-sm-6 pr-0">
							<button type="button" class="btn btn-dark-green text-white btn-block" data-dismiss="modal">Continue</button>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
