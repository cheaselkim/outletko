<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/outletko/user/user.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-11 col-lg-12 mx-auto">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-header pr-0">
					<div class="row">
						<div class="col-3 col-lg-auto d-none d-lg-block py-1 pad-left">
							<div class="div-prod-img cursor-pointer div-prof-pic" id="div-prod-img"  style="background-image: url('<?php echo base_url('assets/images/add_pic.png') ?>'); background-size: 100% 100%;">
								<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2" id="div-update-button" data-toggle="modal" data-target="#modal_prof_pic">
									<i class="fas fa-camera text-white"></i><br>
									<span class="text-white font-weight-bold font-size-18">Update</span>
								</div>
							</div>
						</div>
						<div class="col-9 pad-left py-1 pr-0">
							<div class="div-prof-details">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="font-weight-bold text-white text-buss-name" id="text-buss-name">Business Name</span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="text-yellow text-buss-type" id="text-buss-type">Business Type</span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="text-white text-buss-address" id="text-buss-address">Business Address</span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right pt-2 text-span-header-clickable pr-0">
										<span class="text-white font-weight-bold mr-2 cursor-pointer" id="span_home">Home</span>
										<span class="text-yellow font-weight-bold cursor-pointer" id="span_setting">Setting</span>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- DIV HOME -->
			<div class="row pt-2" id="div-home">
				<div class="col-lg-auto col-md-auto col-sm-12 px-0"> <!--col-lg-auto -->
					<div class="div-left-panel">
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
						<div class="div-left-contacts">					
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
								<div class="row">
									<div class="col-6">								
										<span class="font-weight-bold">Category</span>
									</div>
									<div class="col-5 text-right pr-0">
										<span class="ml-auto btn btn-orange btn-sm font-weight-600" data-toggle="modal" data-target="#modal_category">Edit</span>								
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="div-list-category">
									<ul id="list-category">
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col pad-right pad-md-right" >
					<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center pt-2 pb-3">
						<!-- POST DETAILS -->
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<textarea class="form-control write-post-box font-size-18" id="account_post" placeholder="What's new with your business, products or service?"></textarea>
								<div class="row">
									<div class="col-12 col-lg-12">
										<div class="form-control-post py-1 px-1">
											<button class="btn float-right btn-orange font-small ml-auto font-weight-600" id="btn-post">Post</button>	
										</div>
									</div>
								</div>	
							</div>
						</div>

						<div class="row posted-store mt-2" id="posted_store" style="padding-left: 12px;padding-right:12px;">
							<div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0">
								<div class="div-store-img mt-1" id="div-store-img-1" >
									<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2 cursor-pointer"  id="div-store-img-btn-1">
										<i class="fas fa-camera text-white"></i><br>
										<span class="text-white font-weight-bold font-size-18">Update</span>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0">
								<div class="div-store-img mt-1" id="div-store-img-2" >
									<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2 cursor-pointer"  id="div-store-img-btn-2">
										<i class="fas fa-camera text-white"></i><br>
										<span class="text-white font-weight-bold font-size-18">Update</span>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0">
								<div class="div-store-img mt-1" id="div-store-img-3" >
									<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2 cursor-pointer" id="div-store-img-btn-3">
										<i class="fas fa-camera text-white"></i><br>
										<span class="text-white font-weight-bold font-size-18">Update</span>
									</div>
								</div>
							</div>
						</div>

						<!-- ADD PRODUCTS -->
						<div class="row posted-prod" id="posted_prod"> 
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

			<!-- DIV HOME -->

			<!-- DIV SETTING -->

			<div class="row pt-2" id="div-setting">
				<div class="col-sm-12 col-lg-auto col-md-auto px-0">

					<div class="div-left-setting">					
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2">
							<ul class="list-group list-group-flush" style="width: 100%;">
								<li class="list-group-item cursor-pointer px-1 span_link" id="list_aboutus" style="background: transparent;">About Us</li>
								<li class="list-group-item cursor-pointer px-1 span_link" id="list_payment" style="background: transparent;">Payment & Delivery</li>
							</ul>
						</div>
					</div>

				</div>
				<div class="col pad-right pad-md-right pb-5">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 bg-white pt-2  pb-3" id="div-aboutus">
				
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Header Background</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<div style="height: 35px; width: 50px;border: 1px solid black; background-color: #77933c;" class="cursor-pointer" id="colorpicker">
								</div>
								<input type="hidden" id="color-val">
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">

						<div class="row mt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Business Name <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_businessname">
							</div>
						</div>

						<div class="row mt-2">
 							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Link Name <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2 text-lowercase" maxlength="15" onkeypress="avoidSplChars(event);" id="input_linkname">
								<div class="row">
									<div class="col-6">
										<small class="text-green" id="span-linkname">The limit is 15 Characters</small>
									</div>
									<div class="col-6 text-right">
										<small class="text-green"><span id="input_linkname_length">0</span> / 15</small>
									</div>
								</div>
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">
					
						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">About Us</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<textarea rows="5" class="form-control textbox-green2" id="input_aboutus" maxlength="400"></textarea>
								<div class="row">
									<div class="col-6">
										<small class="text-green" id="span-aboutus">The limit is 400 Characters</small>
									</div>
									<div class="col-6 text-right">
										<small class="text-green"><span id="input_aboutus_length"></span> / 400</small>
									</div>
								</div>
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Business Category <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<select class="form-control textbox-green2" id="input_bussinesscategory">
									
								</select>
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">

						<div class="row my-2">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<span class="text-uppercase font-size-18 font-weight-600">Business Address</span>								
							</div>
						</div>
						
						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Bldg No. / Street <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_bldg">
							</div>
						</div>


						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Subdivision / Village </span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_subdivision">
							</div>
						</div>

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Barangay</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_barangay">
							</div>
						</div>

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">City / Town <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_city" data-id="0">
							</div>
						</div>

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Province <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_province" data-id="0" readonly>
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-normal">Email Address <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<input type="text" class="form-control textbox-green2" id="input_email">
							</div>
						</div>


						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Phone Number</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								 <input type="text" class="form-control textbox-green2" id="input_phone">
							</div>
						</div>

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Mobile Number <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
	                            <div class="input-group">
	                            	<div class="input-group-prepend">
	                            		<span class="input-group-text bg-white border px-1 textbox-green2" >+63</span>
	                              </div>
	                              <input type="text" class="form-control textbox-green2 pl-1" id="input_mobile" name="mobile" style='border-left: 0 !important;' onkeypress="return isNumber(event)">
	                            </div>
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Outletko</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
	                            <div class="input-group">
									<input type="text" class="form-control textbox-green2 text-lowercase" value="<?php echo base_url().'store/'.str_replace(' ', '',$this->session->userdata("account_name")) ?>" id="input_outletko" readonly>
	                            	<div class="input-group-append" onclick="copyToClipboard('#input_outletko')">
	                            		<span class="input-group-text bg-white border px-1 textbox-green2 px-3 cursor-pointer"><i class="far fa-copy"></i></span>
		                            </div>
	                            </div>
							</div>
						</div>

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Website</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
	                            <div class="input-group">
									<input type="text" class="form-control textbox-green2 text-lowercase" id="input_website">
	                            	<div class="input-group-append" onclick="copyToClipboard('#input_website')">
	                            		<span class="input-group-text bg-white border px-1 textbox-green2 px-3 cursor-pointer"><i class="far fa-copy"></i></span>
		                            </div>
	                            </div>
							</div>
						</div>

						<div class="row pt-2 ">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Facebook</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
	                            <div class="input-group">
									<input type="text" class="form-control textbox-green2 text-lowercase" id="input_facebook">
	                            	<div class="input-group-append" onclick="copyToClipboard('#input_facebook')">
	                            		<span class="input-group-text bg-white border px-1 textbox-green2 px-3 cursor-pointer"><i class="far fa-copy"></i></span>
		                            </div>
	                            </div>
							</div>
						</div>

						<div class="row pt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Instagram</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
	                            <div class="input-group">
									<input type="text" class="form-control textbox-green2 text-lowercase" id="input_instagram">
	                            	<div class="input-group-append" onclick="copyToClipboard('#input_instagram')">
	                            		<span class="input-group-text bg-white border px-1 textbox-green2 px-3 cursor-pointer"><i class="far fa-copy"></i></span>
		                            </div>
	                            </div>
							</div>
						</div>

						<div class="row pt-2" hidden>
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Shopee</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
	                            <div class="input-group">
									<input type="text" class="form-control textbox-green2 text-lowercase" id="input_shopee">
	                            	<div class="input-group-append">
	                            		<span class="input-group-text bg-white border px-1 textbox-green2 px-3 cursor-pointer"><i class="far fa-copy"></i></span>
		                            </div>
	                            </div>
							</div>
						</div>

						<div class="row pt-3">
							<div class="col-lg-3 col-md-3 col-sm-12 pt-1"></div>
							<div class="col-lg-3 col-md-3 col-sm-12 pt-1">
								<button class="btn btn-green2 btn-block text-white font-weight-600" id="save_aboutus">Save</button>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 pt-1">
								<button class="btn btn-danger btn-block text-white font-weight-600" id="cancel_aboutus">Cancel</button>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-12 col-md-12 col-lg-12 bg-white pt-2 pb-3" id="div-payment">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-5 bg-white">

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span class="font-size-18 font-weight-600 text-uppercase font-weight-600">Delivery Types <span class="text-red">*</span> </span>									
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<div class="custom-control custom-switch cursor-pointer">
													<input type="checkbox" class="custom-control-input cursor-pointer" id="cust_del_date">
													<label class="custom-control-label cursor-pointer" for="cust_del_date">Customer allowed to choose delivery date?</label>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<div id="div-delivery-type">
												
												</div>
	
											</div>
										</div>

									</div>
								</div>

								<hr class="my-2 hr-green">								

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<span class="font-size-18 font-weight-600 text-uppercase font-weight-600">Payment Types <span class="text-red">*</span> </span>									
										
										<div class="" id="div-payment-types">
											
										</div>

									</div>
								</div>


								<div class="row" id="div-bank-list">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<hr class="my-2 hr-green">								
									</div>
									<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
										<div class="row ">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span class="font-size-18 font-weight-600">For Bank Deposit</span>
												<input type="hidden" id="bank_id" value="0">
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-12 col-lg-3 col-md-3 col-sm-12 pad-right">
												<select class="form-control" id="bank_name">
													
												</select>
											</div>
											<div class="col-12 col-lg-4 col-md-3 col-sm-12 pad-center">
												<input type="text" class="form-control" id="account_name" placeholder="Account Name">
											</div>
											<div class="col-12 col-lg-2 col-md-3 col-sm-12 pad-center">
												<input type="texet" class="form-control" id="account_no" placeholder="Account Number">
											</div>
											<div class="col-12 col-lg-3 col-md-3 col-sm-12 pad-left">
												<div class="row">
													<div class="col-12 col-lg-6 col-md-6 col-sm-12 pad-right">												
														<select class="form-control" id="bank_status">
															<option value="" hidden>Status</option>
															<option value="1">Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
													<div class="col-12 col-lg-6 col-md-6 col-sm-12 pad-left">												
														<button class="btn btn-orange text-white btn-block font-weight-600" id="btn_save_bank">Add</button>
													</div>													
												</div>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<table class="table table-sm table-bordered" id="tbl-bank">
													<thead>
														<tr>
															<th style="width: 15%;">Bank Name</th>
															<th style="width: 20%;">Account Name</th>
															<th style="width: 10%;">Account No</th>
															<th style="width: 5%;">Status</th>
															<th style="width: 3%;" colspan="2" class="text-center">Action</th>
														</tr>
													</thead>
													<tbody></tbody>
												</table>
											</div>
										</div>
									</div>
								</div>


								<div class="row" id="div-remittance-list">
									
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<hr class="my-2 hr-green">									
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12">

										<div class="row ">
											<div class="col-12 col-lg-6 col-md-6 col-sm-12">
												<span class="font-size-18 font-weight-600">For Remittance</span>
											</div>
											<div class="col-12 col-lg-6 col-md-6 col-sm-12 text-right" hidden>
												<button class="btn btn-orange px-5 text-white" id="btn_remitt_save">Save</button>
											</div>
										</div>

										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12" id="">
												<div class="row" id="div-remitt-list">
													
												</div>
											</div>
										</div>

									</div>
								</div>

								<div class="row" id="div-for-delivery">

									<div class="col-lg-12 col-md-12 col-sm-12">
									<hr class="my-2 hr-green">

										<div class="row">
											<div class="col-lg-3 col-md-4 col-sm-12 pr-0">
												<span class="font-size-18 font-weight-600 text-uppercase">Standard Delivery</span>			
											</div>
											<div class="col-lg-9 col-md-8 col-sm-12">
												<input type="text" class="form-control textbox-green2" id="std_del">
											</div>
										</div>

										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<div class="custom-control custom-checkbox cursor-pointer">
													<input type="checkbox" class="custom-control-input free_shipping cursor-pointer" id="free_shipping" name="free_shipping" value="0">
													<label class="custom-control-label cursor-pointer" for="free_shipping">Free Shipping?</label>
												</div>											
											</div>
										</div>
										
										<div class="row" id="div-shipping-fee">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
												<button class="btn btn-outline-success px-5 ml-auto mb-2" id="btn_add_ship" data-toggle="modal" data-target="#modal_ship">Add Shipping Fee</button>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12" style="height: 300px; overflow: auto;">
												<table class="table table-bordered table-sm" id="tbl-ship-fee">
													<thead>
														<tr>
															<th style="width: 25%;" class="text-center">Courier</th>
															<th style="width: 10%"  class="text-center">Kilo (Kg)</th>
															<th style="width: 15%;" class="text-center">Metro Manila</th>
															<th style="width: 15%;" class="text-center">Luzon</th>
															<th style="width: 15%;" class="text-center">Visayas</th>
															<th style="width: 15%;" class="text-center">Mindanao</th>
															<th style="width: 5%;" colspan="2" class="text-center">Action</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
										</div>

										<div class="row pt-3" hidden>
											<div class="col-lg-5 col-md-4 col-sm-6 pl-4">
												<span class="text-capitalize">Shipping Fee (within Metro Manila)</span>
											</div>
											<div class="col-lg-3 col-md-2 col-sm-2">

					                            <div class="input-group">
					                            	<div class="input-group-prepend ">
				                                		<span class="input-group-text bg-white border px-2 textbox-green2" style="height: 35px;border-right: 1px solid #AEDCBF !important;">&#8369;</span>
					                              </div>
												<input type="text" class="form-control textbox-green2 checkbox text-right" placeholder="0.00" id="ship_w_mm">
					                            </div>

											</div>
										</div>


										<div class="row pt-2" hidden>
											<div class="col-lg-5 col-md-4 col-sm-6 pl-4">
												<span class="text-capitalize">Shipping Fee (Outside Metro Manila)</span>
											</div>
											<div class="col-lg-3 col-md-2 col-sm-2">

					                            <div class="input-group mb-3">
					                            	<div class="input-group-prepend">
				                                		<span class="input-group-text bg-white border px-2 textbox-green2" style="height: 35px;border-right: 1px solid #AEDCBF !important;">&#8369;</span>
					                              </div>
												<input type="text" class="form-control textbox-green2 checkbox text-right" placeholder="0.00" id="ship_o_mm">
					                            </div>

											</div>
										</div>



									</div>
								</div>


								<div class="row" id="div-for-appointment" hidden>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<hr class="my-2 hr-green">

										<div class="row">
											<div class="col-lg-3 col-md-5 col-sm-12 pr-0">
												<span class="font-size-18 font-weight-600 text-uppercase">For Appointment</span>			
											</div>
										</div>
										
										<div class="row pt-3">
											<div class="col-lg-5 col-md-4 col-sm-6 pl-4">
												<span class="text-capitalize">Available Dates</span>
											</div>
											<div class="col-lg-7 col-md-7 col-sm-2">
												<div class="row pl-3">
													<button class="btn btn-outline-success btn-width-small mr-1 mt-1" id="btn-day-1" onclick="btn_day(1)" value="0">Mon</button>
													<button class="btn btn-outline-success btn-width-small mx-1 mt-1" id="btn-day-2" onclick="btn_day(2)" value="0">Tue</button>
													<button class="btn btn-outline-success btn-width-small mx-1 mt-1" id="btn-day-3" onclick="btn_day(3)" value="0">Wed</button>
													<button class="btn btn-outline-success btn-width-small mx-1 mt-1" id="btn-day-4" onclick="btn_day(4)" value="0">Thu</button>
													<button class="btn btn-outline-success btn-width-small mx-1 mt-1" id="btn-day-5" onclick="btn_day(5)" value="0">Fri</button>
													<button class="btn btn-outline-success btn-width-small mx-1 mt-1" id="btn-day-6" onclick="btn_day(6)" value="0">Sat</button>
													<button class="btn btn-outline-success btn-width-small mx-1 mt-1" id="btn-day-7" onclick="btn_day(7)" value="0">Sun</button>
												</div>
											</div>
										</div>


										<div class="row pt-2">
											<div class="col-lg-5 col-md-4 col-sm-6 pl-4">
												<span class="text-capitalize">Available Time</span>
											</div>
											<div class="col-lg-7 col-md-2 col-sm-2">
												<div class="row">
													<div class="col-6 col-lg-6 col-md-6 col-sm-6">
														<input type="text" class="form-control bg-white textbox-green2" id="ftime" readonly>
														<!-- <input type="time" class="form-control" id="ftime" value="<?php echo date('08:00:00') ?>"> -->
													</div>
													<div class="col-6 col-lg-6 col-md-6 col-sm-6">
														<input type="text" class="form-control bg-white textbox-green2" id="ttime" readonly>
														<!-- <input type="time" class="form-control" id="ttime" value="<?php echo date('17:00:00') ?>"> -->
													</div>
												</div>
											</div>
										</div>



									</div>
								</div>

								<div class="row" id="div-for-warranty">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<hr class="my-2 hr-green">

										<div class="row mb-3">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<span class="font-size-18 font-weight-600 text-uppercase">Returns & Warranty</span>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-2 col-md-4 col-sm-12">
												<span class="font-size-18">Returns <span class="text-red">*</span> </span>
											</div>
											<div class="col-lg-10 col-md-8 col-sm-12">
												<input type="text" class="form-control textbox-green2" id="inp_return" placeholder="7 Days Return">
											</div>
										</div>

										<div class="row mt-1">
											<div class="col-lg-2 col-md-4 col-sm-12">
												<span class="font-size-18">Warranty <span class="text-red">*</span> </span>
											</div>
											<div class="col-lg-10 col-md-8 col-sm-12">
												<input type="text" class="form-control textbox-green2" id="inp_warranty" placeholder="30 Days Warranty">
											</div>
										</div>

									</div>
								</div>

								<hr class="my-4 hr-green">


								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 pt-1"></div>
									<div class="col-lg-3 col-md-3 col-sm-12 pt-1">
										<button class="btn btn-success btn-block text-white " id="save_payment">Save</button>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12 pt-1">
										<button class="btn btn-danger btn-block text-white " id="cancel_payment">Cancel</button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- DIV SETTING -->

			<!-- DIV MY ORDERS  -->
			<div class="row pt-2 pb-5" id="div-my-orders">
				<div class="col-12 col-md-12 col-lg-12 bg-white py-3" >

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
							<div id="div-tbl-process-order" style="overflow: auto;">
							</div>
						</div>
					</div>

					<div class="row" id="div_order">

						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="row">

								<div class="col-lg-8 col-md-8 col-sm-12">
									<div class="row">
										<input type="hidden" id="acknowledge_order_id" value="0">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span class="h4" id="title_order"></span>							
										</div>

										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span class="h4">Status : For Acknowledgement</span>							
										</div>

										<div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-3">
											<div class="row">
												<div class="col-4 col-lg-2 col-md-3 col-sm-4">
													<span class="font-weight-600">Order No : </span>
												</div>
												<div class="col-8 col-lg-10 col-md-9 col-sm-8">
													<span id="tbl_order_no"></span>
												</div>
											</div>
											<div class="row">
												<div class="col-4 col-lg-2 col-md-3 col-sm-4">
													<span class="font-weight-600">Order Date : </span>
												</div>
												<div class="col-8 col-lg-10 col-md-9 col-sm-8">
													<span id="tbl_order_date"></span>
												</div>
											</div>
											<div class="row">
												<div class="col-4 col-lg-2 col-md-3 col-sm-4">
													<span class="font-weight-600">Customer : </span>
												</div>
												<div class="col-8 col-lg-10 col-md-9 col-sm-8">
													<span id="tbl_from"></span>
												</div>
											</div>
												<!-- <div class="col-12 col-lg-12 col-md-12 col-sm-12">
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
																<td id="tbl_order_no"></td>
																<td id="tbl_order_date"></td>
																<td id="tbl_from"></td>
															</tr>
														</tbody>
													</table>
												</div> -->
										</div>

										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<hr class="my-1" style="border-top: 1px dashed #77933c">
										</div>

										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<div class="row">
												<div class="col-12 col-lg-6 col-md-6 col-sm-12">

													<div class="row">
														<div class="col-6 col-lg-4 col-md-4 col-sm-6">
															<span class="font-weight-600">Delivery Type : </span>
														</div>
														<div class="col-6 col-lg-8 col-md-8 col-sm-6">
															<span id="po_delivery_type">For Delivery</span>
															<input type="hidden" id="po_delivery_type_id">												
														</div>
													</div>

													<div class="row">
														<div class="col-6 col-lg-4 col-md-4 col-sm-6">
															<span class="font-weight-600">Delivery Date : </span>
														</div>
														<div class="col-6 col-lg-8 col-md-8 col-sm-6">
															<span id="po_delivery_date"></span>
															<input type="hidden" id="po_delivery_date">												
														</div>
													</div>

													<div class="row">
														<div class="col-6 col-lg-4 col-md-4 col-sm-6">
															<span class="font-weight-600">Courier : </span>
														</div>
														<div class="col-6 col-lg-8 col-md-8 col-sm-6">
															<span id="po_delivery_courier">For Delivery</span>
															<input type="hidden" id="po_delivery_courier_id">												
														</div>
													</div>
													
												</div>
												<div class="col-12 col-lg-6 col-md-6 col-sm-12">
													
													<div class="row">
														<div class="col-6 col-lg-5 col-md-6 col-sm-6">
															<span class="font-weight-600">Payment Type : </span>
														</div>
														<div class="col-6 col-lg-7 col-md-6 col-sm-6">
															<span id="po_payment_type">Cash on Delivery</span>
															<input type="hidden" id="po_payment_type_id">
														</div>
													</div>

													<div class="row">
														<div class="col-6 col-lg-5 col-md-6 col-sm-6">
															<span class="font-weight-600">Payment Method : </span>
														</div>
														<div class="col-6 col-lg-7 col-md-6 col-sm-6">
															<span id="po_payment_method">Cash on Delivery</span>
															<input type="hidden" id="po_payment_method_id">
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<hr class="my-1" style="border-top: 1px dashed #77933c">
										</div>										

										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<div style="height: 300px; overflow: auto;">

												<table class="table table-sm table-bordered" id="tbl-po-products">
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
													<tfoot >
														<tr style="border-top: 2px dotted black;">
															<td colspan="3" class="font-weight-600">Subtotal</td>
															<td id="tbl_subtotal" class="font-weight-600"></td>
														</tr>
														<tr>
															<td colspan="3" class="font-weight-600">Shipping</td>
															<td id="tbl_ship" class="font-weight-600"></td>
														</tr>
														<tr>
															<td colspan="3" class="font-weight-600">Total</td>
															<td id="tbl_total" class="font-weight-600"></td>
														</tr>
													</tfoot>
												</table>
												
											</div>
										</div>



									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="row">
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span class="h4">Information</span>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>House no., Building and Street Name</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_1" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Barangay</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_barangay" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>City / Municipilaty</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_city" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Province</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_prov" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Zip Code</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_zip" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Mobile Number</span>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text bg-white" id="basic-addon1" style="border-right: 0 !important;">+63</span>
												</div>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_mobile" readonly>
											</div>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>PHONE Number</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_phone" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Email Address</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_email" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Contact Person</span>
											<input type="text" class="form-control textbox-green2 textbox-readonly" id="addr_contact_person" readonly>
										</div>
										<div class="col-12 col-lg-12 col-md-12 col-sm-12">
											<span>Delivery Instructions</span>
											<textarea class="form-control textbox-green2 textbox-readonly" rows="3" id="addr_notes" readonly></textarea>
										</div>
									</div>
								</div>

							</div>
						</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12">

							<!-- <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Delivery Type : </span>
										<span id="po_delivery_type">For Delivery</span>
										<input type="hidden" id="po_delivery_type_id">												
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Delivery Date : </span>
										<span id="po_delivery_date"></span>
										<input type="hidden" id="po_delivery_date">												
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Courier : </span>
										<span id="po_delivery_courier">For Delivery</span>
										<input type="hidden" id="po_delivery_courier_id">												
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Payment Type : </span>
										<span id="po_payment_type">Cash on Delivery</span>
										<input type="hidden" id="po_payment_type_id">
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-12 col-md-12 col-sm-12">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<span>Payment Method : </span>
										<span id="po_payment_method">Cash on Delivery</span>
										<input type="hidden" id="po_payment_method_id">
									</div>
								</div>
							</div> -->

							<div class="col-12 col-lg-12 col-md-12 col-sm-12 pb-1 pt-3">
								<div class="row">
									<div class="col-12 col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-warning" id="btn_back_acknowledge">Back</button>
										<button class="btn btn-danger" id="btn_cancel_acknowledge">Cancel</button>
										<button class="btn btn-success" data-toggle="modal" data-target="#modal_acknowledge" id="btn_acknowledge">Acknowledge</button>
									</div>
								</div>
							</div>


						</div>


					</div>


				</div>				
			</div>
			<!-- DIV MY ORDERS -->

			<!-- DIV MY DELIVER -->

			<div class="row pt-2 pb-5" id="div-my-deliver">
				<div class="col-12 col-md-12 col-lg-12 post-body bg-white py-3" id="">

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
							<div id="div-tbl-close-order" style="overflow: auto;">  
							</div>
						</div>
					</div>

					<div class="row" id="div_deliver">
						<input type="hidden" id="close_order_id" value="0">

							<div class="col-lg-12 col-md-12 col-sm-12">

								<div class="row">

									<div class="col-lg-8 col-md-8 col-sm-12">
										<div class="row">

											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span class="h4" id="close_title">Order 10001</span>							
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
																	<td id="tbl_close_order_no"></td>
																	<td id="tbl_close_order_date"></td>
																	<td id="tbl_close_from"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<div style="height: 300px; overflow: auto;">

													<table class="table table-sm table-bordered" id="tbl-close-products"> 
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
																<td id="tbl_close_subtotal">0.00</td>
															</tr>
															<tr>
																<td colspan="3">Shipping</td>
																<td id="tbl_close_ship">0.00</td>
															</tr>
															<tr>
																<td colspan="3">Total</td>
																<td id="tbl_close_total">0.00</td>
															</tr>
														</tfoot>
													</table>
													
												</div>
											</div>

										</div>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span class="h4">Address</span>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>House no., Building and Street Name</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_1" readonly>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Barangay</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_barangay" readonly>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>City / Municipilaty</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_city" readonly>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Province</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_prov" readonly>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Mobile Number</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_mobile" readonly>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Email Address</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_email" readonly>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Contact Person</span>
												<input type="text" class="form-control textbox-green2 textbox-readonly" id="close_addr_contact_person" readonly>
											</div>

										</div>
									</div>

								</div>

								<div class="row">

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Delivery Type : </span>
												<span id="close_delivery_type">For Delivery</span>		
												<input type="hidden" id="close_delivery_type_id">										
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<span>Payment Type : </span>
												<span id="close_payment_type">Cash on Delivery</span>
												<input type="hidden" id="close_payment_type_id">										
											</div>
										</div>
									</div>

									<div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-3 pb-1">
										<div class="row">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<button class="btn btn-warning">Cancel</button>
												<button class="btn btn-success" data-toggle="modal" data-target="#modal_deliver">Delivered</button>
											</div>
										</div>
									</div>

								</div>

							</div>

					</div>


				</div>
			</div>

			<!-- DIV MY DELIVER -->

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
										<img src="<?php echo base_url('assets/images/add_pic.png') ?>" id='img-upload'>
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
		                            <span class="font-weight-600">Short Description <span class="text-red">*</span> </span>
		                            <textarea class="form-control text-prod-desc textbox-green2" id="prod_desc" rows="2" maxlength="200"></textarea>
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
		                            <span class="font-weight-600">Remarks / Other Details</span>
		                            <textarea class="form-control text-prod-desc textbox-green2" id="prod_remarks" rows="4"></textarea>
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">For Online Sale?</span>
		                    		<select class="form-control textbox-green2" id="prod_online">
		                    			<option value="1">Yes</option>
		                    			<option value="0">No</option>
		                    		</select>
		                    	</div>
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Unit Price</span>
		                    		<input type="text" class="form-control textbox-green2 text-right" placeholder="0.00" id="prod_price">
		                    		<input type="text" class="form-control textbox-green2 text-right" placeholder="0.00" id="prod_price2" readonly>
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-6 col-lg-6">
			                    	<span class="font-weight-600">Category <span class="text-red">*</span></span>
			                    	<select class="form-control textbox-green2" id="prod_category">
			                    		<option></option>
			                    	</select>
		                    	</div>
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Condition <span class="text-red">*</span></span>
		                    		<select class="form-control textbox-green2" id="prod_condition">
		                    			<option value="1">New</option>
		                    			<option value="2">Used</option>
		                    		</select>
	                    		</div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Stock</span>
		                    		<input type="text" class="form-control textbox-green2 text-right" id="prod_stock">
		                    		<input type="text" class="form-control textbox-green2 text-right" id="prod_stock2" readonly>
		                    	</div>
		                    	<div class="col-6 col-md-6 col-lg-6">
		                    		<span class="font-weight-600">Weight</span>
		                    		<input type="text" class="form-control textbox-green2 text-right" id="prod_weight">
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 mt-2 row" hidden>
		                    	<div class="col-12 col-md-12 col-lg-12">
		                    		<button class="form-control textbox-green2" id="btn-variation">Variations</button>
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 row" >
		                    	<div class="col-12 col-md-12 col-lg-12">
		                    		<span class="font-weight-600">Standard Delivery</span>
		                    		<!-- <input type="text" class="form-control textbox-green2" id=""> -->
		                    		<select class="form-control textbox-green2" id="prod_std_delivery">
		                    			
		                    		</select>
		                    	</div>
		                    </div>

		                    <div class="form-group mb-0 row mt-2" id="div-prod-ship-fee">
		                    	<div class="col-12 col-md-12 col-lg-12">
		                    		
		                    		<div class="row my-2">
		                    			<div class="col-lg-8">
		                    				<span>Shipping Fee (Within Metro Manila)</span>
		                    			</div>
		                    			<div class="col-lg-4">

				                            <div class="input-group">
				                            	<div class="input-group-prepend ">
			                                		<span class="input-group-text bg-white border px-2 textbox-green2" style="height: 35px;border-right: 1px solid #AEDCBF !important;">&#8369;</span>
				                              </div>
		                    				<input type="text" class="form-control textbox-green2 text-right" id="prod_ship_fee_w_mm" value="0">
				                            </div>

		                    			</div>
		                    		</div>

		                    		<div class="row">
		                    			<div class="col-lg-8">
		                    				<span>Shipping Fee (Outside Metro Manila)</span>
		                    			</div>
		                    			<div class="col-lg-4">
				                            <div class="input-group">
				                            	<div class="input-group-prepend ">
			                                		<span class="input-group-text bg-white border px-2 textbox-green2" style="height: 35px;border-right: 1px solid #AEDCBF !important;">&#8369;</span>
				                              </div>
		                    				<input type="text" class="form-control textbox-green2 text-right" id="prod_ship_fee_o_mm" value="0">
				                            </div>
		                    			</div>
		                    		</div>

		                    	</div>
		                    </div>


							<div class="form-group mb-0 row">
								<div class="col-12 col-md-12 col-lg-12">
									<span class="font-weight-600">Delivery Options <span class="text-red">*</span> </span>
									<input type="text" class="form-control textbox-green2" id="prod_del_opt" placeholder="1 to 3 days Delivery">
								</div>
							</div>

							<div class="form-group mb-0 row">
								<div class="col-12 col-md-12 col-lg-12">
									<span class="font-weight-600">Returns & Warranty <span class="text-red">*</span></span>
									<input type="text" class="form-control textbox-green2" id="prod_return" placeholder="7 Days Return">
									<input type="text" class="form-control textbox-green2 mt-1" id="prod_warranty" placeholder="30 Days Warranty">
								</div>
							</div>

		                </div>


		            </div>
                </div>
            </div>

            <div class="modal-footer text-sales modal-ftr-bg py-2">
            	<div class="container px-0">	
	            	<div class="row">
	            		<div class="col-lg-6"></div>
						<div class="col-lg-2 pad-right pt-1">
							<button class="btn btn-danger btn-block font-weight-600" id="delete_product" data-dismiss="modal">Delete</button>
						</div>
	            		<div class="col-lg-2 pad-center pt-1">
			            	<button class="btn btn-green2 btn-block font-weight-600" id="save_product" data-dismiss="modal">Save</button>            			
	            		</div>	
	            		<div class="col-lg-2 pad-left pt-1">
			            	<button class="btn btn-orange btn-block font-weight-600" onclick="clear_prod_model()" data-dismiss="modal" >Cancel</button>
	            		</div>	
	            	</div>

            	</div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for Image Upload -->

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

<!-- MODAL FOR STORE -->
<div class="modal" id="modal_store_img">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-1">
        <h4 class="modal-title">Store Picture</h4>
		<input type="hidden" id="store_id">
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-lg-8 col-md-8 col-sm-12 mx-auto px-0" id="div-img-store" style="height: 270px;border: 1px solid black;">
      		</div>
      		<div class="col-lg-8 col-md-8 col-sm-12 mx-auto px-0 cursor-pointer">
				<button class="btn btn-block btn-outline-success " style="border-top: 0;border-radius: 0;">
			    	Choose Image
			    	<input type="file" id="imgStore" class="img-upload-modal">
				</button>      			
      		</div>
      	</div>

      </div>
      <div class="modal-footer py-1">
        <button type="button" class="btn btn-success" id="save_store_img" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL FOR VARIATION  -->

<div class="modal" id="modal_variations" style="top: 15% !important">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-2 btn-success">
        <h4 class="modal-title">Variations</h4>
      </div>
      <div class="modal-body">

      	<div class="row">
      		<div class="col-10 col-md-10 col-lg-10">
	      		<input type="text" class="form-control textbox-green2" placeholder="Variation" id="variation">  			
      		</div>
      		<div class="col-2 col-md-2 col-lg-2 pad-left">
      			<button class="btn btn-success btn-block" id="btn_add_variation">Add</button>
      		</div>
      	</div>

      	<div class="row mt-2 div-card-variation" id="div-card-variation">
      	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="save-prod-variation">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL FOR VARIATION -->

<!-- The Modal -->
<div class="modal" id="modal_deliver">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delivery Order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      	<div class="container">
      		<div class="row">
      			<div class="col-12">
      				<span>Courier <span class="text-red">*</span> </span>
      				<input type="text" class="form-control" id="delivery_courier">
      			</div>
      			<div class="col-12">
      				<span>Track No <span class="text-red">*</span> </span>
      				<input type="text" class="form-control" id="delivery_track">
      			</div>
      		</div>
      	</div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn_save_deliver">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>


<div class="modal" id="modal-setting">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-1">
        <h4 class="modal-title">Settings</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	<div class="container">
      		<div class="row">
      			<div class="col-12">
      				<span class="font-weight-600">Username</span>
      				<input type="text" class="form-control textbox-green2" value="<?php echo $this->session->userdata("user_uname") ?>" id="uname">
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-12">
      				<span class="font-weight-600">Current Password</span>
					<div class="input-group">
						<input type="password" class="form-control form-control-sm textbox-green" id="curr_pass">
						<div class="input-group-append" style="height: 31px;"  >
							<span class="input-group-text show_pass cursor-pointer">
								<i class="fa fa-eye-slash" id="pass_icon"></i>
							</span>
						</div>
					</div>

      			</div>
      		</div>
      		<div class="row">
      			<div class="col-12">
      				<span class="font-weight-600">New Password</span>
					<div class="input-group">
						<input type="password" class="form-control form-control-sm textbox-green" id="new_pass">
						<div class="input-group-append" style="height: 31px;"  >
							<span class="input-group-text show_pass cursor-pointer">
								<i class="fa fa-eye-slash" id="pass_icon"></i>
							</span>
						</div>
					</div>

      			</div>
      		</div>
      		<div class="row">
      			<div class="col-12">
      				<span class="font-weight-600">Confirm Password</span>
					<div class="input-group">
						<input type="password" class="form-control form-control-sm textbox-green" id="conf_pass">
						<div class="input-group-append" style="height: 31px;"  >
							<span class="input-group-text show_pass cursor-pointer">
								<i class="fa fa-eye-slash" id="pass_icon"></i>
							</span>
						</div>
					</div>

      			</div>
      		</div>
      	</div>
      </div>
      <div class="modal-footer py-1">
        <button type="button" class="btn btn-success" id="save_setting" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_category">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header btn-warning pt-2 pb-0">
				<h4 class="modal-title">Product Category</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="prod_cat_id">
				<div class="row">
					<div class="col-10">
						<input type="text" class="form-control" id="prod_cat">
					</div>
					<div class="col-2">
						<button class="btn btn-orange btn-block" id="save_category">Add</button>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="div-prod-cat-tbl">
							<table class="table table-sm table-bordered" id="prod_cat_tbl">
								<thead>
									<tr>
										<th style="width: 90%;">Category</th>
										<th style="width: 10%;" colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>						
					</div>
				</div>

			</div>
			<div class="modal-footer modal-ftr-bg pt-2 pb-2 text-right">
				<button class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_ship">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Shipping Fee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <input type="hidden" id="ship_id">
	  	<div class="container">
			<div class="row">
				<div class="col-4">
					<span class="font-weight-600">Courier</span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control" id="ship_courier" data-id = "">
				</div>
			</div> 
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Kilo (Kg)</span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_kg">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Metro Manila</span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_mm">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Luzon</span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_luz">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Visayas</span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_vis">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Mindanao</span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_min">
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
   	    <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-save-ship">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>