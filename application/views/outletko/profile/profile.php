<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/profile.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/outletko/profile/profile.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="id" value="<?php echo $id ?>">

<div class="container pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-10 col-lg-10">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-header">
					<div class="row">
						<div class="col-3 col-lg-auto py-1 pad-left">
							<div class="div-prod-img cursor-pointer div-prof-pic" id="div-prod-img" data-toggle="modal" data-target="#modal_prof_pic" style="background-image: url('<?php echo base_url('assets/images/add_pic.png') ?>'); background-size: 100% 100%;">
							</div>
						</div>
						<div class="col-9 pad-left py-1">
							<div class="div-prof-details">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="font-weight-bold text-white text-buss-name" id="text-buss-name">Business Name</span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="text-white text-buss-type" id="text-buss-type">Business Type</span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="text-white text-buss-address" id="text-buss-address">Business Address</span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<div class="row">
											<div class="col-4">
												<span class="text-white text-buss-address" id="text-buss-contact-no">Business Address</span>												
											</div>
											<div class="col-4">
												<span class="text-white text-buss-address" id="text-buss-email">Business Address</span>												
											</div>
											<div class="col-4">
												<span class="text-white text-buss-address" id="text-buss-facebook">Business Address</span>												
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- DIV HOME -->
			<div class="row pt-2" id="div-home">
				<div class="col-3 col-lg-auto px-0">
					<div class="div-left-aboutus">					
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<span class="font-weight-bold">About Us</span>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<div class="div-aboutus-details">
								<p id="text_aboutus"></p>								
							</div>
						</div>
					</div>
					<div class="div-left-contacts" hidden>					
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<span class="font-weight-bold">Contact Details</span>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<i class="fas fa-store"></i>							
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<i class="fas fa-mobile"></i> 
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<i class="fas fa-envelope"></i> 
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<i class="fab fa-facebook"></i>
						</div>
					</div>
				</div>
				<div class="col pad-right">
					<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center pt-2 pb-3" id="div-display-products">
						<!-- POST DETAILS -->
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-control write-post-box font-size-18" id="account-post" style="height: 100px !important;">
									
								</div>
							</div>
						</div>
						<!-- ADD PRODUCTS -->
						<div class="row posted-prod" id="posted_prod"> 
						</div>

					</div>

					<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center py-3" id="div-product-details">
						<!-- PRODUCT DETAILS -->
						<input type="hidden" id="prod_id">
						<div class="row">
							<div class="col-auto mb-4">
								<div class="div-product-details-img mb-2" id="div-product-details-img">
								</div>
								<span class="font-size-25" id="prod-name">Abaca Seedlings</span><br>
								<span class="font-size-20" id="prod-price">PHP 25.00</span>
							</div>
							<div class="col-6">
								
								<div class="row">
									<div class="col-10">
										<span class="font-size-25">Product Details</span>								
									</div>
									<div class="col-2 pr-0">
										<button class="btn btn-danger btn-block" id="btn_back"><i class="fas fa-arrow-alt-circle-left"></i></button>
									</div>
								</div>

								<div class="col-12 my-2 div-prod-dtls" >
									<p id="prod-condition"></p>
									<p id="prod-stock"></p>
									<p id="prod-weight"></p>
									<p id="prod-dtls"></p>
								</div>

								<br>
								<span class="font-weight-600" id="std_lbl">Standard Delivery</span><br>
								<span class="ml-2" id="std_del">Seeds are delivered by LBC</span>

								<div class="row" id="div-ship-fee">
									<div class="col-11 ml-4 pl-1 border">
										
										<div class="row">
											<div class="col-9 pr-0">
												 <span>Shipping Fee (Within Metro Manila)</span>
											</div>
											<div class="col-3 px-1">
												<span id="shipp_w_mm">&#8369; 0.00</span>
											</div>
										</div>

										<div class="row">
											<div class="col-9 pr-0">
												 <span>Shipping Fee (Outside Metro Manila)</span>
											</div>
											<div class="col-3 px-1">
												<span id="shipp_o_mm">&#8369; 0.00</span>
											</div>
										</div>

									</div>
								</div>

								<div class="row mt-15px" id="div-btn-order">
									<div class="col-2 pad-right	">
										<input type="text" class="form-control he-38 text-center textbox-green2 px-1" value="1" id="prod_qty">
									</div>
									<div class="col-5 pad-center">
										<button class="btn btn-success btn-block font-weight-600" id="btn_cart">Add to Cart</button>
									</div>
									<div class="col-5 pad-left">
										<button class="btn btn-orange btn-block font-weight-600" id="btn_order">Order Now</button>										
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>
			</div>

			<!-- DIV HOME -->

		</div>
		<div class="col-2 col-sm-12 col-md-2 col-lg-2 pr-0 pl-1">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 " >
					<div class="div-ads px-2 pt-2">
						<span class="text-green">Ads Space</span>

						<!-- ADS IMAGES -->
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
						<!-- END ADS IMAGES -->

					</div>
				</div>
			</div>
		</div>
	</div>

</div>

