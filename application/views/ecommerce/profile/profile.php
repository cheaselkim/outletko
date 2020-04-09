<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/profile.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/ecommerce/profile/profile.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="id" value="<?php echo $id ?>">

<style type="text/css">
	.opt-hide{
		display: none;
	}
</style>

<div class=" pt-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-header pt-3">
		<div class="container">
			
			<div class="row">
				<div class="col-12 col-lg-12 d-lg-block py-1 pad-left text-center">
					<div class="div-prod-img cursor-pointer div-prof-pic mx-auto" id="div-prod-img" data-toggle="modal" data-target="#modal_prof_pic" style="background-image: url('<?php echo base_url('assets/images/add_pic.png') ?>'); background-size: 100% 100%;">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 pad-left" style="margin-top: -10px;">
					<div class="div-prof-details">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
								<span class="font-weight-600 text-white text-buss-name" id="text-buss-name">Business Name</span>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: -12px;" hidden>
								<span class="text-yellow text-buss-type" id="text-buss-type">Business Type</span>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center div-buss-address" >
								<span class="text-white text-buss-address" id="text-buss-address">Business Address</span>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 div-buss-contact-no" style="margin-top: -0.5%;">
										<span class="text-white text-buss-address" id="text-buss-contact-no"></span>												
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 div-buss-email" style="margin-top: -0.5%;">
										<span class="text-white text-buss-address" id="text-buss-email"></span>												
										<span class="text-white text-buss-address" id="text-buss-tel-no" hidden></span>												
									</div>
									<div class="col-3" hidden>
										<span class="text-white text-buss-address" id="text-buss-facebook"></span>												
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: -0.75%;">
								<span class="text-white text-buss-address" id="text-buss-email2"></span>												
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-12 col-lg-12 col-md-12 col-sm-12 div-header-2 pb-2 d-none d-lg-block" style="margin-top: -5px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 text-center mb-3 px-5">
				<span class="font-weight-400 mx-2" id="header_aboutus"></span>
			</div>
		</div>
	</div>
</div>

<div class="container pt-3 div-header-3">
	<div class="row">
		<div class="col-12 col-lg-12 col-md-12 col-sm-12">
			<span class="font-weight-600 font-size-18 text-capitalize" style="font-size:22px;" id="header_whats_new">hello world</span>
		</div>
	</div>
</div>

<div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2 div-header-4 d-none d-lg-block">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-1 px-0">
				<div class="div-store-img" id="div-store-img-1" style="height: 315px;">
				</div>
			</div>
			<div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-1 px-0">
				<div class="div-store-img" id="div-store-img-2" style="height: 315px;">
				</div>
			</div>
			<div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-1 px-0">
				<div class="div-store-img" id="div-store-img-3" style="height: 315px;">
				</div>
			</div>
		</div>
	</div>
</div>
 
<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0"> 
	<hr class="mt-3 mb-1">
</div>

<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center" id="div-display-products" style="padding-bottom: 80px;">
	<div class="row">
		<div class="col-12 col-lg-12 col-md-12 col-sm-12">
			<div class="container">
				<span class="font-size-20 font-weight-600">Products and Services</span>
			</div>
		</div>
	</div>
	<div class="row" id="div-posted-prod">
		<!-- <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="">
			<div class="container">
			</div>
		</div> -->
	</div>
</div>

<div class="container">
	<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center py-3" id="div-product-details">
						<!-- PRODUCT DETAILS -->
		<input type="hidden" id="prod_id">
						
		<div class="row">
			<div class="col-9 col-lg-11 col-md-10 col-sm-9">
				<span class="font-size-25" hidden>Product Details</span>								
			</div>
		</div>
				
		<div class="row">
			<div class="col-lg-auto col-sm-12 mb-4">
				<div class="div-product-details-img mb-2 mt-2" id="div-product-details-img">
				</div>
			</div>
			<div class="col-lg-auto col-sm-12 px-0" id="div-details">
				
				<div class="col-12 mb-2 div-prod-dtls" >
					<span class="font-weight-600 font-size-25" hidden>Product Description</span>
					<p id="prod-condition" hidden></p>
					<p id="prod-stock" hidden></p>
					<p id="prod-weight" hidden></p>
					<!-- <p id="prod-dtls" ></p> -->

                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="font-size-22 font-weight-600" id="prod-name">Abaca Seedlings</span><br>
							<span class="font-size-18 font-weight-500" id="prod-desc"></span><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-7 col-sm-12">
            				<span class="font-size-20 text-orange font-weight-600" id="prod-price">PHP 25.00</span><br>
							<span id="prod_payment_type" class="font-size-15"></span><br>
							<span id="prod_delivery_type" class="font-size-15 " hidden></span>
							<span>Delivery Area : <span id="prod_del_opt" class="font-size-15 "></span></span><br>
							<span id="prod_del_std" class="font-size-15 "></span><br>
							<span id="prod_return" class="font-size-15 "></span><br>
							<span id="prod_warranty" class="font-size-15 "></span>
                        </div>
                        <div class="col-12 col-lg-6 col-md-5 col-sm-12">
                            <div style="border: 1px solid gray;min-height: 150px; height: auto;background: #F0F0F0;" class="p-2 w-100">
								<p id="prod-other-details"></p>
							</div>
                        </div>
                    </div>

					<!-- <div class="row">
						<div class="col-12" hidden>
							<span calss="font-size-16">Details : </span>
						</div>
						<div class="col-12 "> 
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span class="font-size-16">Payment Type : </span>
						</div>
						<div class="col-12 pl-4">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span class="font-size-16">Delivery Type : </span>
						</div>
						<div class="col-12 pl-4">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span class="font-size-16">Area Coverage : </span>
						</div>
						<div class="col-12 pl-4">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span class="font-size-16">Standard Delivery : </span>
						</div>
						<div class="col-12 pl-4">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span class="font-size-16">Returns & Warranty : </span>
						</div>
						<div class="col-12 pl-4">
						</div>
						<div class="col-12 pl-4">
						</div>
					</div> -->


				</div>

				<div class="col-12">

					<div class="row" hidden>
						<div class="col-12">
							<span class="font-size-16" id="std_lbl">Standard Delivery</span><br>
						</div>
						<div class="col-12">
							<span class="ml-2 font-size-18 font-weight-600" id="std_del">Seeds are delivered by LBC</span>
						</div>
					</div>

					<div class="row" id="div-ship-fee" hidden>
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

					<div class="row">
						<div class="col-12">
						</div>						
					</div>


                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="row mt-3 div-btn-order py-3 mx-1" id="div-btn-order">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-3 col-lg-1 col-md-2 col-sm-3 pad-right">
                                            <button class="btn btn-orange btn-block px-0" id="btn_minus"><i class="fas fa-minus"></i></button>
                                        </div>
                                        <div class="col-2 col-lg-1 col-md-2 col-sm-2 pad-center">
                                            <input type="text" class="form-control he-38 text-center textbox-green2 px-1" value="1" id="prod_qty">
                                        </div>								
                                        <div class="col-3 col-lg-1 col-md-2 col-sm-3 pad-left">
                                            <button class="btn btn-orange btn-block px-0" id="btn_add"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span class="font-weight-600 font-size-20">Total Amount : PHP <span id="cart_total_amount">0.00</span></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-5 col-sm-12 pad-right">
                                            <button class="btn btn-success btn-block font-weight-600" id="btn_cart">Add to Cart</button>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-5 col-sm-12 pad-left">
                                            <button class="btn btn-orange btn-block font-weight-600" id="btn_order">Order Now</button>										
                                        </div>								
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


				</div>

			</div>
			<div class="col-3 col-lg-auto col-md-2 col-sm-3 text-right ml-auto">
				<button class="btn btn-danger btn-block" id="btn_back"><i class="fas fa-arrow-alt-circle-left"></i></button>
			</div>
		</div>

	</div>
</div>
 
<div class="container pb-4" hidden>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-11 col-lg-12 mx-auto">

			<div class="row pt-3">
				<div class="col-lg-12 col-md-12 col-sm-12 text-left pl-4">
				</div>
			</div>

			<!-- DIV HOME -->
			<div class="row pt-0" id="div-home">
				<div class="col-lg-auto col-md-auto col-sm-12 px-0" hidden>
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
				<div class="col px-0"> <!-- pad-right pad-md-right pad-left -->
					<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center pt-2 pb-3" id="div-display-products">
						<!-- POST DETAILS -->
						<div class="row" hidden>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-control write-post-box font-size-18" id="account-post" style="height: 100px !important;">
									
								</div>
							</div>
						</div>
						<!-- ADD PRODUCTS -->
						<div class="row posted-prod" id=""> 
							<div class="col-12 col-lg-12 col-md-12" id="div-posted-prod">
							</div>
						</div>

						<!-- <div class="row posted-prod-1" id="posted-prod-1">
						</div> -->


					</div>

					<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center py-3" id="div-product-details">
						<!-- PRODUCT DETAILS -->
						<input type="hidden" id="prod_id">
						
						<div class="row">
							<div class="col-9 col-lg-11 col-md-10 col-sm-9" >
								<span class="font-size-25" >Product Details</span>								
							</div>
							<div class="col-3 col-lg-1 col-md-2 col-sm-3">
								<button class="btn btn-danger btn-block" id="btn_back"><i class="fas fa-arrow-alt-circle-left"></i></button>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-auto col-sm-12 mb-4 text-center">
								<div class="div-product-details-img mb-2" id="div-product-details-img">
								</div>
								<span class="font-size-25" id="prod-name">Abaca Seedlings</span><br>
								<span class="font-size-20" id="prod-price">PHP 25.00</span>
							</div>
							<div class="col-lg-7 col-sm-12">
								
								<div class="col-12 my-2 div-prod-dtls" >
									<p id="prod-condition" hidden></p>
									<p id="prod-stock" hidden></p>
									<p id="prod-weight"></p>
									<!-- <p id="prod-dtls"></p> -->

									<div class="row">
										<div class="col-12">
											<span class="font-weight-600 font-size-18">Payment Type : </span>
										</div>
										<div class="col-12 pl-4">
											<span id="prod_payment_type" class="font-size-16"></span>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<span class="font-weight-600 font-size-18">Delivery Type : </span>
										</div>
										<div class="col-12 pl-4">
											<span id="prod_delivery_type" class="font-size-16"></span>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<span class="font-weight-600 font-size-18">Standard Delivery : </span>
										</div>
										<div class="col-12 pl-4">
											<span id="prod_del_opt" class="font-size-16"></span>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<span class="font-weight-600 font-size-18">Returns & Warranty : </span>
										</div>
										<div class="col-12 pl-4">
											<span id="prod_return" class="font-size-16"></span>
										</div>
										<div class="col-12 pl-4">
											<span id="prod_warranty" class="font-size-16"></span>
										</div>
									</div>


								</div>

								<div class="col-12">

									<div class="row">
										<div class="col-12">
											<span class="font-weight-600" id="std_lbl">Standard Delivery</span><br>
										</div>
										<div class="col-12">
											<span class="ml-2" id="std_del">Seeds are delivered by LBC</span>
										</div>
									</div>

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

									<div class="row mt-3" id="div-btn-order2">
										<div class="col-12 col-lg-2 col-md-2 col-sm-12 pad-right pt-1">
											<input type="text" class="form-control he-38 text-center textbox-green2 px-1" value="1" id="prod_qty-1">
										</div>
										<div class="col-12 col-lg-5 col-md-5 col-sm-12 pad-center pt-1">
											<button class="btn btn-success btn-block font-weight-600" id="btn_cart">Add to Cart</button>
										</div>
										<div class="col-12 col-lg-5 col-md-5 col-sm-12 pad-left pt-1">
											<button class="btn btn-orange btn-block font-weight-600" id="btn_order">Order Now</button>										
										</div>
									</div>


								</div>

							</div>
						</div>

					</div>

				</div>

				<div class="col-2 col-sm-12 col-md-2 col-lg-2 pr-0 pl-1" hidden>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 " >
							<div class="div-ads px-2 pt-2">
								<span class="text-green">Ads Space</span>

								<!-- ADS IMAGES -->
								<div class="row">

									<div class="col-lg-12 col-md-4 pt-3">
										<div class="div-ads-img">	
											<!-- <img src="https://5d973bb52ee8692cdb78-ae7e48b6a1da5e36e0a688675ec574a6.ssl.cf1.rackcdn.com/34/56/78/34567836/ad_34567836_c4edf44e26169131_web.jpg" class="img-fluid"> -->
										</div>	
									</div>

									<div class="col-lg-12 col-md-4 pt-3">
										<div class="div-ads-img">	
											<!-- <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/a41d8529540325.5732a809bcc1b.png" class="img-fluid"> -->
										</div>	
									</div>

									<div class="col-lg-12 col-md-4 pt-3">
										<div class="div-ads-img">	
											<!-- <img src="http://www.wheninmanila.com/wp-content/uploads/2016/05/FA_Vikings_Dress-like-a-Viking-Promo-promo_5x5-01-e1462723075238.jpg" class="img-fluid"> -->
										</div>	
									</div>



								</div>
								<!-- END ADS IMAGES -->

							</div>
						</div>
					</div>
				</div>



			</div>

			<!-- DIV HOME -->

		</div>
	</div>

</div>

