<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/profile.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/header.css') ?>">

<script type="text/javascript" src="<?php echo base_url() ?>js/outletko/user/user.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/outletko/profile/profile.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="account_id" value="<?php echo $this->session->userdata("account_id");?>">

<style type="text/css">
	
	.cursor-pointer{
		cursor: pointer;
	}

</style>

<body>
	<div class="container pt-1 pb-4">
		<!-- FOR PHONE ONLY -->
		<div class="row">
			<div class="col-12 col-md-12 div-small-hdr font-ssmall font-bold">
				<div class="row">
					<div class="col-4">
						<span>Products</span>
						<button class="btn btn-block btn-for-product">
							<img src="images/products/box.png" class="btn-img-product">
						</button>
					</div>
					<div class="col-4">
						<span>Images</span>
						<button class="btn btn-block btn-for-list">
							<img src="images/products/images.png" class="btn-img-list">
						</button>
					</div>
					<div class="col-4">
						<span>Profile</span>
						<button class="btn btn-block btn-for-profile">
							<img src="images/products/profile.png" class="btn-img-profile">
						</button>
					</div>
				</div>
			</div>
			
		</div>
		<!-- END FOR PHONE ONLY -->

		<!-- HEADER -->
		<div class="row">
			<div class="col-12 col-md-12 pr-0 div-header" >
				<div class="row">
					<!-- HEADER IMAGE -->
					<div class="col-4 col-md-2 py-2 pr-0">
						<div class="div-prod-img cursor-pointer" id="div-prod-img" data-toggle="modal" data-target="#modal_prof_pic" style="background-image: url('<?php echo base_url('assets/images/add_pic.png') ?>'); background-size: 100% 100%;">
						</div>
					</div>
					<!-- END HEADER IMAGE -->

					<!-- HEADER DETAILS -->
					<div class="col-8 col-md-10 px-5 text-white pt-2">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 py-0 my-0">
								<span class="font-weight-700 h3" id="bus_name_text"></span>
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 py-0 my-0 pt-1">
								<span class="font-weight-700 h4" id="owner_name_text"></span>						
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 pt-1 text-left">
								<span class="font-small" id="business_cat">asfasdf</span>						
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 pt-1 text-right">
								<span class="font-small" id="location_text"></span>						
							</div>
						</div>

						<div class="row  position-absolute bottom-0" style="right: 75px;">
							<div class="col-lg-12 col-sm-12 col-md-12 text-right pr-0">
								<div class="row">
									<span class="cursor-pointer" id="span_home">Home &nbsp;&nbsp;</span>
									<span class="text-yellow cursor-pointer" id="span_setting">Setting</span>
								</div>
							</div>
						</div>

					</div>
					<!-- END HEADER DETAILS -->

					<!-- HEADER EDIT BUTTON -->

<!-- 					<div class="col-5 col-md-6 pl-1 pr-0" >
						<div class="row">
							<div class="col-lg-12 pr-1 position-absolute bottom-0">
								<div class="row">
									<button class="btn btn-block btn-orange font-small ml-auto" data-toggle="modal" data-target="#modal_profile" 
									style="height: 10px;">Home</button>														
									<button class="btn btn-block btn-orange font-small ml-auto" data-toggle="modal" data-target="#modal_profile" 
									style="height: 10px;">Setting</button>														
								</div>
							</div>
						</div>
					</div> -->
					<!-- END HEADER EDIT BUTTON -->
				</div>
			</div>
		</div>
		<!-- END HEADER -->

		
		<!-- DETAILS -->
		<div class="row" id="div_details_1">
			<div class="col-12 col-md-12 pt-2" >
				<div class="row ">
					<!-- LIST BODY -->
					<div class="col-12 col-md-5 col-lg-2 div-body-left" id="div-body-left">
						<div class="">
							<!-- BUSINESS CATEGORY -->
							<div class="row" hidden>
								<div class="col-lg-12">
									<div class="row div-body-left-header text-black">
										<div class="col-lg-10 pr-0 py-1">
											<span class="font-size-18">Business Category</span>
										</div>
										<div class="col-lg-2 text-right pr-0 pl-0 py-1">
											<button class=" btn-orange font-small btn-icon px-0" id="btnclick" data-toggle="modal" data-target="#modal_business"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
										</div>
									</div>
									<div class="row text-black">
										<div class="col-lg-12 py-2">
											<span class="font-size-18" id="bus_category_text"></span>
										</div>
									</div>
								</div>
							</div>
							<!-- END BUSINESS CATEGORY -->

							<!-- MAIN SERVICES -->
							<div class="row" id="div_left_aboutus">
								<div class="col-lg-12">
									<div class="row div-body-left-header text-black">
										<div class="col-lg-10 pad-right py-1">
											<span class="font-size-18">Products / Services</span>
										</div>
										<div class="col-lg-2 text-right pr-0 pl-0 py-1">
											<button class=" btn-orange font-small btn-icon px-0" id="btnclick" data-toggle="modal" data-target="#products_list"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
										</div>
									</div>
									<div class="row text-black" style="background: rgb(119, 147, 60, 0.3);">
										<div class="col-lg-12 py-2 pl-4" style="height: 285px;" id="prod_cat_list">
											<ul class="pl-3 ml-2">
																					
											</ul>
										</div>
									</div>
								</div>								
							</div>

							<div class="row" id="div_left_setting">
								<div class="col-lg-12">
									<div class="row div-body-left-header text-black" style="height: 285px;">
										<ul class="list-group list-group-flush" style="width: 100%;">
											<li class="list-group-item cursor-pointer" id="list_aboutus">About Us</li>
											<li class="list-group-item cursor-pointer" id="list_payment">Payment & Delivery</li>
										</ul>
									</div>
								</div>								
							</div>


							<!-- END MAIN SERVICES -->

							<!-- CONTACT US -->

							<div class="row">
								<div class="col-lg-12">
									<div class="row div-body-left-header text-black bg-white">
										<div class="col-lg-10 pad-right py-1">
											<span class="font-size-20">Contacts</span>
										</div>
										<div class="col-lg-2 text-right pr-0 pl-0 py-1">
											<button class=" btn-orange font-small btn-icon px-0" id="btnclick" data-toggle="modal" data-target="#modal_contacts"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
										</div>
									</div>
									<div class="row text-black font-size-16 py-3">
										<div class="col-lg-12 text-justify">
											<span class="text-black" id="email_text"><i class="fas fa-envelope-square"></i></span>
										</div>
										<div class="col-lg-12 ">
											<span class="text-black" id="tel_text"><i class="fa fa-phone-square"></i></span>
										</div>
										<div class="col-lg-12 ">
											<span class="text-black" id="mobile_text"><i class="fa fa-phone-square"></i></span>
										</div>
										<div class="col-lg-12 text-justify">
											<span class="text-black" id="fb_text"><i class="fab fa-facebook-square"></i></span>
										</div>
										<div class="col-lg-12 ">
											<span class="text-black" id="twitter_text"><i class="fab fa-twitter-square"></i></span>
										</div>
										<div class="col-lg-12 ">
											<span class="text-black" id="insta_text"><i class="fab fa-instagram"></i></span>
										</div>
										<div class="col-lg-12 " >
											<!-- <img src="http://www.2cents.my/wp-content/uploads/2018/02/shopee-logo.png" style="height: 15px; width: 15px;filter: grayscale(100%);"> -->
											<span class="text-black" id="shopee_text"><i class="fas fa-shopping-bag"></i></span>
										</div>
									</div>
								</div>								
							</div>

							<!-- END CONTACT US -->
						</div>
					</div>
					<!-- END LIST BODY -->

					<!-- POST AND IMAGE BODY -->
					<div class="col-12 col-md-7 col-lg-8 pl-4 post-body" id="div-post-body">
						<!-- POST BOX -->
						<div class="row " id="div_textbox_post"> 
							<div class="col-12 col-md-12 write-post py-0 my-0 px-1">
								<textarea class="form-control write-post-box font-size-18" placeholder="What's new with your business, products or service?"></textarea>
								<div class="row">
									<div class="col-12 col-lg-12">
										<div class="form-control-post py-1 px-1">
											<button class="btn float-right btn-orange font-small ml-auto font-weight-600">Post</button>																		
										</div>
									</div>
								</div>								
							</div>
						</div>
						<!-- END POST BOX -->

						<!-- EDIT POST BUTTON -->
						<div class="row row-image-div">
							<div class="col-12 col-md-12 px-0">
							</div>
						</div>
						<!-- END EDIT POST BUTTON -->

						<!-- IMAGES 1ST ROW-->
						<div class="row pt-2" id="posted_prod">
							
						</div>
						<!-- END IMAGES 1ST ROW-->

						<div class="row" id="div_setting">
							<div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-5 bg-white">

								<div class="row">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Business Name</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2" id="textbox_businessname">
									</div>
								</div>

								<hr class="mt-2 mb-0 hr-green">
							
								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">About US</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<textarea rows="5" class="form-control textbox-green2" id="textbox_aboutus"></textarea>
										<small class="text-green" id="span-aboutus">The limit is 400 Characters</small>
									</div>
								</div>

								<hr class="mt-2 mb-0 hr-green">

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Business Category</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<select class="form-control textbox-green2" id="textbox_bussinesscategory">
											
										</select>
									</div>
								</div>

								<hr class="mt-2 mb-0 hr-green">

								<div class="row my-2">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<span class="text-capitalize font-size-18 font-weight-600">Business Address</span>								
									</div>
								</div>
								
								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Building No. / Street</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>


								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Subdivision / Village</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Barangay</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">City / Town</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Province</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<hr class="mt-2 mb-0 hr-green">

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Email Address</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>


								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Phone Number</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										 <input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Mobile Number</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
			                            <div class="input-group">
			                            	<div class="input-group-prepend">
		                                		<span class="input-group-text bg-white border px-1 textbox-green2" style="height: 35px;border-right: 2px solid #AEDCBF !important;">+63</span>
			                              </div>
			                              <input type="text" class="form-control textbox-green2 pl-1" id="mobile" name="mobile" style='border-left: 0 !important;' onkeypress="return isNumber(event)">
			                            </div>
									</div>
								</div>

								<hr class="mt-2 mb-0 hr-green">

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Website</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2 ">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Facebook</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Instagram</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-2">
									<div class="col-lg-3 col-md-4 col-sm-12">
										<span class="text-uppercase">Shoppee</span>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-12">
										<input type="text" class="form-control textbox-green2">
									</div>
								</div>

								<div class="row pt-4">
									<div class="col-lg-3 col-md-3 col-sm-12"></div>
									<div class="col-lg-3 col-md-3 col-sm-12">
										<button class="btn btn-green2 btn-block text-white ">Save</button>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12">
										<button class="btn btn-danger btn-block text-white ">Cancel</button>
									</div>
								</div>

							</div>
						</div>

						<div class="row" id="div_payment">
							<div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-5 bg-white">
								
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<span class="font-size-18 font-weight-600 text-uppercase">Payment Types</span>									
										
										<div class="row pt-3">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">Cash on Delivery</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="paymet_cod" class="css-checkbox">
												<label for="paymet_cod" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>


										<div class="row pt-2">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">Advance Payment</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="payment_ap" class="css-checkbox">
												<label for="payment_ap" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>

										<div class="row pt-2">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">Card Payment</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="payment_cp" class="css-checkbox">
												<label for="payment_cp" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>

										<div class="row pt-2">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">Online Payment</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="payment_op" class="css-checkbox">
												<label for="payment_op" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>


									</div>
								</div>

								<hr class="my-2 hr-green">

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<span class="font-size-18 font-weight-600 text-uppercase">Delivery Types</span>									
										
										<div class="row pt-3">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">For Appointment</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="delivery_fa" class="css-checkbox">
												<label for="delivery_fa" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>


										<div class="row pt-2">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">For Pick Up</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="delivery_fpu" class="css-checkbox">
												<label for="delivery_fpu" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>

										<div class="row pt-2">
											<div class="col-lg-3 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">For Delivery</span>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-2">
												<input type="checkbox" name="checkboxG4" id="delivery_fd" class="css-checkbox">
												<label for="delivery_fd" class="css-label"></label>
												<!-- <input type="checkbox" class="form-control textbox-green2 checkbox"> -->
											</div>
										</div>


									</div>
								</div>

								<hr class="my-2 hr-green">


								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">

										<div class="row">
											<div class="col-lg-3 col-md-4 col-sm-12 pr-0">
												<span class="font-size-18 font-weight-600 text-uppercase">Standard Delivery</span>			
											</div>
											<div class="col-lg-9 col-md-8 col-sm-12">
												<input type="text" class="form-control textbox-green2">
											</div>
										</div>
										
										<div class="row pt-3">
											<div class="col-lg-5 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">Shipping Fee (within Metro Manila)</span>
											</div>
											<div class="col-lg-3 col-md-2 col-sm-2">

					                            <div class="input-group">
					                            	<div class="input-group-prepend">
				                                		<span class="input-group-text bg-white border px-2 textbox-green2" style="height: 35px;border-right: 1px solid #AEDCBF !important;">&#8369;</span>
					                              </div>
												<input type="text" class="form-control textbox-green2 checkbox text-right" placeholder="0.00">
					                            </div>

											</div>
										</div>


										<div class="row pt-2">
											<div class="col-lg-5 col-md-4 col-sm-6 pl-4">
												<span class="text-uppercase">Shipping Fee (Outside Metro Manila)</span>
											</div>
											<div class="col-lg-3 col-md-2 col-sm-2">

					                            <div class="input-group mb-3">
					                            	<div class="input-group-prepend">
				                                		<span class="input-group-text bg-white border px-2 textbox-green2" style="height: 35px;border-right: 1px solid #AEDCBF !important;">&#8369;</span>
					                              </div>
												<input type="text" class="form-control textbox-green2 checkbox text-right" placeholder="0.00">
					                            </div>

											</div>
										</div>

										<div class="row pt-4">
											<div class="col-lg-3 col-md-3 col-sm-12"></div>
											<div class="col-lg-3 col-md-3 col-sm-12">
												<button class="btn btn-green2 btn-block text-white ">Save</button>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-12">
												<button class="btn btn-danger btn-block text-white ">Cancel</button>
											</div>
										</div>


									</div>
								</div>


							</div>
						</div>

						<!-- IMAGES 2ND ROW -->
						<div class="row pt-3">
							<!--<div class="col-6 col-md-4 pad-center">-->
							<!--	<div class="div-list-img" >-->
							<!--		<img src="images/products/a.png"  alt="image">-->
							<!--		<div class="btn">-->
							<!--			<i class="fa fa-camera"></i>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
	
							
						</div>
						<!-- END IMAGES 2ND ROW -->
					</div>
					<!-- END POST AND IMAGE BODY -->

					<!-- START DIV MY ORDERS -->
					<div class="col-12 col-md-7 col-lg-10 post-body bg-white py-3" id="div-my-orders">

						<div class="row" id="div_order_table">
							<div class="col-12 col-lg-12 col-md-12 col-sm-12">
								<span class="h4">Orders</span>							
							</div>
							<div class="col-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-inline">
									<label for="order_status">Status</label>
									<select class="form-control ml-2" id="order_status">
										<option>For Acknowledgement</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-3">
								<table style='width: 100% !important' class='table table-striped table-sm table-bordered'>
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
									<tbody>
										<tr onclick="order_table(1)" class="cursor-pointer">
											<td>10001</td>
											<td><?php echo date("m/d/Y"); ?></td>
											<td>Enrique Purugganan</td>
											<td>350.00</td>
											<td>For Deliver</td>
											<td>For Acknowledgement</td>
										</tr>
									</tbody>
								</table>								
							</div>
						</div>

						<div class="row" id="div_order">
							
							<div class="col-8 col-lg-8 col-md-8 col-sm-8">
								<div class="row">

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span class="h4">Order 10001</span>							
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span class="h4">Status : For Acknowledgement</span>							
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<table class="table table-sm table-bordered">
													<thead>
														<tr>
															<th>Order No</th>
															<th>Order Date</th>
															<th>From</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>10001</td>
															<td><?php echo date('m/d/Y'); ?></td>
															<td>Enrique Purugganan</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<div style="height: 300px; overflow: auto;">

											<table class="table table-sm table-bordered">
												<thead>
													<tr>
														<th>Product</th>
														<th>Qty</th>
														<th>Unit Price</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Abracada Seedlings</td>
														<td>10</td>
														<td>25.00</td>
														<td>250.00</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="3">Subtotal</td>
														<td>250.00</td>
													</tr>
													<tr>
														<td colspan="3">Shipping</td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>
											
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Delivery Type : </span>
												<span>For Delivery</span>												
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Payment Type</span>
												<span>Cash on Delivery</span>
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<button class="btn btn-warning">Cancel</button>
												<button class="btn btn-success" data-toggle="modal" data-target="#modal_acknowledge">Acknowledge</button>
											</div>
										</div>
									</div>

								</div>
							</div>

							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span class="h4">Address</span>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>House no., Building and Street Name</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Barangay</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>City / Municipilaty</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Province</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Mobile Number</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Email Address</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>

								</div>
							</div>
						</div>

					</div>
					<!-- END DIV MY ORDERS  -->

					<!-- START DIV MY DELIVER -->

					<div class="col-12 col-md-7 col-lg-10 post-body bg-white py-3" id="div-my-deliver">

						<div class="row" id="div_deliver_table">
							<div class="col-12 col-lg-12 col-md-12 col-sm-12">
								<span class="h4">Orders</span>							
							</div>
							<div class="col-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-inline">
									<label for="order_status">Status</label>
									<select class="form-control ml-2" id="order_status">
										<option>For Delivery</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-3">
								<table style='width: 100% !important' class='table table-striped table-sm table-bordered'>
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
									<tbody>
										<tr onclick="deliver_table(1)" class="cursor-pointer">
											<td>10001</td>
											<td><?php echo date("m/d/Y"); ?></td>
											<td>Enrique Purugganan</td>
											<td>350.00</td>
											<td>For Deliver</td>
											<td>For Acknowledgement</td>
										</tr>
									</tbody>
								</table>								
							</div>
						</div>

						<div class="row" id="div_deliver">
							
							<div class="col-8 col-lg-8 col-md-8 col-sm-8">
								<div class="row">

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span class="h4">Order 10001</span>							
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span class="h4">Status : For Delivery</span>							
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<table class="table table-sm table-bordered">
													<thead>
														<tr>
															<th>Order No</th>
															<th>Order Date</th>
															<th>From</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>10001</td>
															<td><?php echo date('m/d/Y'); ?></td>
															<td>Enrique Purugganan</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<div style="height: 300px; overflow: auto;">

											<table class="table table-sm table-bordered">
												<thead>
													<tr>
														<th>Product</th>
														<th>Qty</th>
														<th>Unit Price</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Abracada Seedlings</td>
														<td>10</td>
														<td>25.00</td>
														<td>250.00</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="3">Subtotal</td>
														<td>250.00</td>
													</tr>
													<tr>
														<td colspan="3">Shipping</td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>
											
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Delivery Type : </span>
												<span>For Delivery</span>												
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Payment Type</span>
												<span>Cash on Delivery</span>
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<button class="btn btn-warning">Cancel</button>
												<button class="btn btn-success" data-toggle="modal" data-target="#modal_deliver">Delivered</button>
											</div>
										</div>
									</div>

								</div>
							</div>

							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span class="h4">Address</span>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>House no., Building and Street Name</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Barangay</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>City / Municipilaty</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Province</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Mobile Number</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Email Address</span>
										<input type="text" class="form-control textbox-green2" readonly>
									</div>

								</div>
							</div>
						</div>

					</div>
					<!-- END DIV MY DELIVER -->

					<!-- POST BODY FOR SMALL SCREEN -->
					<div class="col-12 col-md-7 post-body-small font-ssmall" hidden>
						<!-- POST BOX -->
						<div class="row">
							<div class="col-12 col-md-12 post-dtl-small">
								<span class="font-bold">Business Product Description</span>
							</div>
						</div>
						<!-- END POST BOX -->

						<!-- EDIT POST BUTTON -->
						<div class="row">
							<div class="col-12 col-md-12 post-dtl-small">
								<span id="bus_desc">HELLO HELLO</span>
								<button class="btn float-right btn-orange font-small btn-edit-dtl edit_bus_desc"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<!-- END EDIT POST BUTTON -->

						<!-- IMAGES-->
						<div class="row pb-2">
							<div class="col-6 col-md-4 div-list-div-img-for-small">
								<div class="div-list-img-for-small">
									<img src="images/products/a.png">
									<button class="btn" data-toggle="modal"  data-target="#img_upload">
	                                    <i class="fa fa-camera" aria-hidden="true">
	                                  	</i>
	                                </button>
								</div>
							</div>
						</div>
						<!-- END IMAGES-->
					</div>
					<!-- END POST BODY FOR SMALL SCREEN -->

					<!-- ADS SPACE -->
					<div class="col-12 col-md-12 col-lg-2 pad-center" >
						<div class="row div-ads py-2">
							<div class="col-lg-12">	
							<!-- TITLE AD -->
								<div class="row">
									<div class="col-lg-12">	
										<span class="font-green">Ads Space</span>
									</div>
								</div>
								<!-- END TITLE AD -->

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
					<!-- END ADS SPACE -->

					<!-- PROFILE SCREEN FOR SMALL -->
					<div class="col-12 col-md-12 col-lg-3 div-profile-small">
						<div class="row">
							<div class="col-4 col-md-4 div-ads-div-img-for-small">
								<div class="div-ads-img-for-small">
									<img src="images/products/a.png">
								</div>
							</div>

							<div class="col-8 col-md-8">
								<!-- BUSINESS NAME -->
								<div class="row">
									<div class="col-12 col-md-12 profile-name-small">
										<span id="bus_name" class="profile-name-small">HELLO HELLO</span>
										<button class="btn float-right btn-orange font-small btn-edit-profile edit_bus_name"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									</div>
								</div>
								<!-- END EDIT BUS. NAME BUTTON -->
							</div>
						</div>

						<div class="row dtls-profile-small pt-2">
							<div class="col-12 col-md-12 height-profile">
								<span id="owner_name">HELLO HELLO</span>
								<button class="btn float-right btn-orange font-small btn-edit-dtl edit_name"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
							<div class="col-12 col-md-12 height-profile">
								<span id="owner_loc">HELLO HELLO</span>
								<button class="btn float-right btn-orange font-small btn-edit-dtl edit_loc"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
							<div class="col-12 col-md-12 height-profile">
								<span id="owner_email">HELLO HELLO</span>
								<button class="btn float-right btn-orange font-small btn-edit-dtl edit_email"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
							<div class="col-12 col-md-12 height-profile">
								<div class="row">
									<div class="col-5 col-md-5">
										<span id="owner_mob_num">HELLO HELLO</span>
									</div>

									<div class="col-7 col-md-7">
										<span id="owner_tel_num">HELLO HELLO</span>
										<button class="btn float-right btn-orange font-small btn-edit-dtl edit_number"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-12 height-profile">
								<span id="owner_fb">HELLO HELLO</span>
								<button class="btn float-right btn-orange font-small btn-edit-dtl edit_fb"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
							<div class="col-12 col-md-12 height-profile">
								<span id="owner_shopee">HELLO HELLO</span>
								<button class="btn float-right btn-orange font-small btn-edit-dtl edit_shopee"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
					<!-- END PROFILE SCREEN FOR SMALL -->
				</div>
			</div>
			
		</div>
		<!-- END DETAILS -->
	</div>

<!-- Modal for Image Upload -->
<div class="modal" id="img_upload">
    <div class="modal-dialog modal-dialog-scrollable modal-half">
        <div class="modal-content">
            <div class="modal-header modal-hdr-bg pt-2 pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-12 col-lg-12 text-center">
                            <h3>Enter your Products and Services</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12 col-md-12 col-lg-12">
                	<div class="row">

		                <div class="col-12 col-md-5 col-lg-5">
		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
									<div class="modal-img-upload" >
										<img src="assets/images/add_pic.png" id='img-upload'>
									</div>
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-12 col-md-12 col-lg-12">
									<button class="btn btn-modal-img-upload btn-success bg-white">
									<!--    <i class="fa fa-camera" aria-hidden="true">-->
									    	Choose Image
									    	<input type="file" id="imgInp" class="img-upload-modal btn btn-success">
									<!--  	</i>-->
									</button>
								</div>
		                    </div>
		                </div>

	                	<div class="col-12 col-md-7 col-lg-7 pl-0">
		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
		                            <span class="font-weight-600">Product Name <span class="text-red">*</span></span>
		                            <input type="text" class="form-control textbox-green2" id="prod_name">
		                            <input type="hidden" class="form-control textbox-green2" id="unserialized_files">
		                            <input type="hidden" class="form-control textbox-green2" id="prod_id">
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
		                            <span class="font-weight-600">Details <span class="text-red">*</span> </span>
		                            <textarea class="form-control text-prod-desc textbox-green2" id="prod_desc" rows="5"></textarea>
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">For Online Sale?</span>
		                    		<select class="form-control textbox-green2">
		                    			<option value="1">Yes</option>
		                    			<option value="0">No</option>
		                    		</select>
		                    	</div>
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Unit Price</span>
		                    		<input type="text" class="form-control textbox-green2 text-right" placeholder="0.00">
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-6 col-lg-6">
			                    	<span class="font-weight-600">Category <span class="text-red">*</span></span>
			                    	<select class="form-control textbox-green2">
			                    		<option></option>
			                    	</select>
		                    	</div>
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Condition <span class="text-red">*</span></span>
		                    		<select class="form-control textbox-green2">
		                    			<option value="1">New</option>
		                    			<option value="2">Used</option>
		                    		</select>
	                    		</div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Stock</span>
		                    		<input type="text" class="form-control textbox-green2">
		                    	</div>
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Weight</span>
		                    		<input type="text" class="form-control textbox-green2">
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 mt-2 row">
		                    	<div class="col-12 col-md-12 col-lg-12">
		                    		<button class="form-control textbox-green2" data-toggle="modal" data-target="#modal_variations">Variations</button>
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-12 col-md-12 col-lg-12">
		                    		<span class="font-weight-600">Standard Delivery</span>
		                    		<input type="text" class="form-control textbox-green2">
		                    	</div>
		                    </div>

		                </div>


		            </div>
                </div>
            </div>

            <div class="modal-footer text-sales modal-ftr-bg py-2">
            	<div class="container px-0">	
	            	<div class="row">
	            		<div class="col-lg-8"></div>
	            		<div class="col-lg-2 pad-right">
			            	<button class="btn btn-green2 btn-block font-weight-600" id="save_product" data-dismiss="modal">Save</button>            			
	            		</div>	
	            		<div class="col-lg-2 pad-left">
			            	<button class="btn btn-orange btn-block font-weight-600" onclick="clear_prod_model()" data-dismiss="modal" >Cancel</button>
	            		</div>	
	            	</div>

            	</div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for Image Upload -->

<!-- Modal for List of Products -->
<div class="modal" id="products_list">
    <div class="modal-dialog modal-dialog-scrollable modal-half">
        <div class="modal-content">
            <div class="modal-header modal-hdr-bg pt-2 pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-12 col-md-12 col-lg-12 text-center">
                            <h3 >Enter your List of Products and Services</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                            <span class="font-bold">Products / Services Name <span style="color: red;">* Maximum of 7 main products and services</span>
                            <table id="prod_tbl">
                                <?php for ($i=1; $i <= 7; $i++) {  ?>
									<tr>
                                        <td>
                                            <input type="text" class="form-control mt-2 textbox-green2 prod_inp">
                                        </td>
                                    </tr>
								<?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-sales modal-ftr-bg py-2">
            	<div class="container px-0">	
	            	<div class="row">
	            		<div class="col-lg-8"></div>
	            		<div class="col-lg-2 pad-right">
			            	<button class="btn btn-green2 btn-block font-weight-600" id="save_prod_cat" data-dismiss="modal">Save</button>            			
	            		</div>	
	            		<div class="col-lg-2 pad-left">
			            	<button class="btn btn-orange btn-block font-weight-600" data-dismiss="modal">Cancel</button>
	            		</div>	
	            	</div>

            	</div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for List of Products -->

<!-- Modal for contacts -->
<div class="modal" id="modal_contacts">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header modal-hdr-bg pt-2 pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-12 col-md-12 col-lg-12 text-center">
                            <h3 >List of Contacts</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Email</span>
							<input type="text" class="form-control" id="email">
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Mobile</span>
							<div class="input-group">
								<div class="input-group-prepend" style="height: 35px;">
									<span class="input-group-text">+63</span>
								</div>
								<input type="text" class="form-control" id="mobile">
							</div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Telephone</span>
							<input type="text" class="form-control" id="telephone">
                        </div>
                    </div>


                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Facebook</span>
							<div class="input-group">
								<div class="input-group-prepend" style="height: 35px;">
									<span class="input-group-text">facebook.com/</span>
								</div>
								<input type="text" class="form-control" id="facebook">
							</div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Twitter</span>
							<div class="input-group">
								<div class="input-group-prepend" style="height: 35px;">
									<span class="input-group-text">twitter.com/</span>
								</div>
								<input type="text" class="form-control" id="twitter">
							</div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Instagram</span>
							<div class="input-group">
								<div class="input-group-prepend" style="height: 35px;">
									<span class="input-group-text">instagram.com/</span>
								</div>
								<input type="text" class="form-control" id="instagram">
							</div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-12 col-md-12 col-lg-12">
                        	<span>Shoppee</span>
							<div class="input-group">
								<div class="input-group-prepend" style="height: 35px;">
									<span class="input-group-text">shoppee.com/</span>
								</div>
								<input type="text" class="form-control" id="shoppee">
							</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer text-sales modal-ftr-bg py-2">
            	<div class="container px-0">	
	            	<div class="row">
	            		<div class="col-lg-6"></div>
	            		<div class="col-lg-3 pad-right">
			            	<button class="btn btn-green2 btn-block font-weight-600" data-dismiss="modal" id="save_contact">Save</button>            			
	            		</div>	
	            		<div class="col-lg-3 pad-left">
			            	<button class="btn btn-orange btn-block font-weight-600" data-dismiss="modal">Cancel</button>
	            		</div>	
	            	</div>

            	</div>
            </div>
        </div>
    </div>
</div>

<!-- END Modal for contacts -->

<div class="modal" id="modal_business">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header btn-warning pt-2 pb-0">
				<h4 class="modal-title">Business Category</h4>
			</div>
			<div class="modal-body">
				<select class="form-control textbox-green2" id="bus_category">
					<option></option>
				</select>
			</div>
			<div class="modal-footer modal-ftr-bg pt-2 pb-2">
				<div class="container ">
	            	<div class="row">
	            		<div class="col-lg-4"></div>
	            		<div class="col-lg-4 pad-center">
			            	<button class="btn btn-green2 btn-block font-weight-600" data-dismiss="modal" id="save_category">Save</button>            			
	            		</div>	
	            		<div class="col-lg-4 pad-center">
			            	<button class="btn btn-orange btn-block font-weight-600" data-dismiss="modal">Cancel</button>
	            		</div>	
	            	</div>					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_profile">
	<div class="modal-dialog" style="max-width: 600px;">
		<div class="modal-content">
			<div class="modal-header pt-1 pb-1 btn-warning">
				<h4 class="modal-title">Business Profile</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid font-size-18">
					
					<div class="row">
						<div class="col-lg-12 pad-center">
							<span>Business Name</span>
							<input type="text" id="business_name" class="form-control textbox-green2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 pad-center">
							<span>Business Category</span>
							<select class="form-control textbox-green2" id="modal_buss_category">
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 pad-center">
							<span>First Name</span>
							<input type="text" id="first_name" class="form-control textbox-green2">							
						</div>
						<div class="col-lg-4 pad-center">
							<span>Middle Name</span>
							<input type="text" id="mid_name" class="form-control textbox-green2">							
						</div>
						<div class="col-lg-4 pad-center">
							<span>Last Name</span>
							<input type="text" id="last_name" class="form-control textbox-green2">							
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 pad-center">
							<span>Address</span>
							<input type="text" id="address" class="form-control textbox-green2">														
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 pad-center">
							<span>Town, Province</span>
							<input type="text" id="town" class="form-control textbox-green2">														
						</div>
						<div class="col-lg-6 pad-center">
							<span>Country</span>
							<input type="text" id="country" class="form-control textbox-green2">														
						</div>
					</div>

				</div>
			</div>
			<div class="modal-footer pt-2 pb-2 modal-ftr-bg">
				<div class="container-fluid">
	            	<div class="row">
	            		<div class="col-lg-4"></div>
	            		<div class="col-lg-4 pad-center">
			            	<button class="btn btn-green2 btn-block font-weight-600" id="save_info" data-dismiss="modal">Save</button>            			
	            		</div>	
	            		<div class="col-lg-4 pad-center">
			            	<button class="btn btn-orange btn-block font-weight-600" data-dismiss="modal">Cancel</button>
	            		</div>	
	            	</div>					
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal" id="modal_prof_pic">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-1">
        <h4 class="modal-title">Profile Picture</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-lg-8 col-md-8 col-sm-12 mx-auto px-0" id="div-img-prof" style="height: 230px;border: 1px solid black;baclgro">
      		</div>
      		<div class="col-lg-8 col-md-8 col-sm-12 mx-auto px-0 cursor-pointer">
				<button class="btn btn-block btn-outline-success " style="border-top: 0;border-radius: 0;">
			    	Choose Image
			    	<input type="file" id="imgProf" class="img-upload-modal">
				</button>      			
      		</div>
      	</div>

      </div>
      <div class="modal-footer py-1">
        <button type="button" class="btn btn-success" id="save_prof_pic" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="modal_variations" style="top: 15% !important">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-2 btn-success">
        <h4 class="modal-title">Variations</h4>
      </div>
      <div class="modal-body">

      	<div class="row">
      		<div class="col-10 col-md-10 col-lg-10">
	      		<input type="text" class="form-control textbox-green2" placeholder="Variation">  			
      		</div>
      		<div class="col-2 col-md-2 col-lg-2 pad-left">
      			<button class="btn btn-success btn-block">Add</button>
      		</div>
      	</div>

      	<div class="row mt-2" id="div-card-variation">
      		<div class="col-12 col-md-12 col-lg-12">
      			<div class="card">
      				<div class="card-header py-1 pl-2">
      					<label class="font-weight-600 mb-0">Color</label>
      				</div>
      				<div class="card-body py-1 pl-1">
      					<div class="row" id="div_variation_type">
				      		<div class="col-10 col-md-10 col-lg-10">
					      		<input type="text" class="form-control textbox-green2" placeholder="Color">  			
				      		</div>
				      		<div class="col-2 col-md-2 col-lg-2 pad-left">
				      			<button class="btn btn-success btn-block">Add</button>
				      		</div>
      					</div>
      					<div class="row pt-2">
      						<div class="col-lg-12 col-md-12 col-sm-12">
		      					<button class="btn btn-outline-dark">Red</button>
		      					<button class="btn btn-outline-dark">White</button>
		      					<button class="btn btn-outline-primary" id="btn_add_variation_type">Add</button>      							
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_myorders" style="top: 15% !important">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: transparent;border: 0">
      <div class="modal-header py-2 btn-success" hidden>
        <h4 class="modal-title">Variations</h4>
      </div>
      <div class="modal-body" style="background: transparent;">

      	<div class="row">
      		<div class="col-5 col-md-5 col-lg-5 px-4">
				<img src="<?php echo base_url() ?>assets/images/process_order.png" id="img_process_order" class='img-fluid cursor-pointer'>
      		</div>

      		<div class="col-2 col-md-2 col-lg-2"></div>

      		<div class="col-5 col-md-5 col-lg-5 px-4">      			
				<img src="<?php echo base_url() ?>assets/images/close_order.png" id="img_close_order" class='img-fluid cursor-pointer' >
      		</div>
      	</div>


      </div>
      <div class="modal-footer" hidden>
        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_acknowledge" style="top: 15% !important">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-2 btn-success">
        <h4 class="modal-title">Acknowledgement</h4>
      </div>
      <div class="modal-body">

      	<div class="row">
      		<div class="col-12 col-lg-12 col-md-12 col-sm-12">
      			<textarea class="form-control textbox-green2" rows="5"></textarea>
      		</div>
      	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_deliver" style="top: 15% !important">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-2 btn-success">
        <h4 class="modal-title">Acknowledgement</h4>
      </div>
      <div class="modal-body">

      	<div class="row">
      		<div class="col-12 col-lg-12 col-md-12 col-sm-12">
      			<textarea class="form-control textbox-green2" rows="5"></textarea>
      		</div>
      	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(".btn-for-product").click(function(){
		$(".list-body").css("display", "block");
		$(".div-header").css("display", "none");
		$(".post-body").css("display", "none");
		$(".table-tri").css("display", "none");
		$(".post-body-small").css("display", "none");
		$(".div-profile-small").css("display", "none");
	});

	$(".btn-for-list").click(function(){
		$(".post-body-small").css("display", "block");
		$(".post-body").css("display", "none");
		$(".table-tri").css("display", "none");
		$(".list-body").css("display", "none");
		$(".div-header").css("display", "none");
		$(".div-profile-small").css("display", "none");
	});

	$(".btn-for-profile").click(function(){
		$(".div-profile-small").css("display", "block");
		$(".div-header").css("display", "none");
		$(".post-body").css("display", "none");
		$(".list-body").css("display", "none");
		$(".ads-body").css("display", "none");
		$(".post-body-small").css("display", "none");
	});

	$(function () {
	    //Loop through all Labels with class 'editable'.
	    $(".edit_name").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#owner_name");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control' style = 'display:none; width:90%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_loc").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#owner_loc");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control' style = 'display:none; width:90%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_email").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#owner_email");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control' style = 'display:none; width:90%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_number").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#owner_number");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control' style = 'display:none; width:90%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_fb").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#owner_fb");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control' style = 'display:none; width:90%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_shopee").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#owner_shopee");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control' style = 'display:none; width:90%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_bus_desc").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#bus_desc");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control business-desc' style = 'display:none; width:100%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });

	    $(".edit_bus_name").each(function () {
	        //Reference the Label.
	        var label = $(this);
	        var span = $("#bus_name");
	 
	        //Add a TextBox next to the Label.
	        label.after("<input type = 'text' class='form-control business-name' style = 'display:none; width:98%;' />");
	 
	        //Reference the TextBox.
	        var textbox = $(this).next();
	 
	        //Set the name attribute of the TextBox.
	        textbox[0].name = this.id.replace("span", "txt");
	 
	        //Assign the value of Label to TextBox.
	        textbox.val(span.html());
	 
	        //When Label is clicked, hide Label and show TextBox.
	        label.click(function () {
	            span.hide();
	            $(this).next().show();
	        });
	 
	        //When focus is lost from TextBox, hide TextBox and show Label.
	        textbox.focusout(function () {
	            $(this).hide();
	            label.prev().html($(this).val());
	            label.prev().show();
	        });
	    });
	});
</script>
