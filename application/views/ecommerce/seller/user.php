<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/header.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/my_order2.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/ecommerce/seller/user.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="pickr-setting" value="0">

<div class="container pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-11 col-lg-12 mx-auto">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-header pr-0">
					<div class="row">
						<div class="col-12 col-lg-auto col-md-auto py-1 pad-left">
							<div class="div-prod-img cursor-pointer div-prof-pic mx-auto" id="div-prod-img"   style="background-image: url('<?php echo base_url('assets/images/add_pic.png') ?>'); background-size: 100% 100%;">
								<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2" id="div-update-button" data-toggle="modal" data-target="#modal_prof_pic"> <!-- data-toggle="modal" data-target="#modal_prof_pic" -->
									<i class="fas fa-camera text-white"></i><br>
									<span class="text-white font-weight-bold font-size-18">Update</span>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-9 col-md-9 col-sm-8 pad-left py-1 pad-right">
							<div class="div-prof-details">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class="font-weight-bold text-buss-name " id="text-buss-name"></span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class=" text-buss-type" id="text-buss-type"></span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<span class=" text-buss-address" id="text-buss-address"></span>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right pt-2 text-span-header-clickable pr-0">
										<span class=" font-weight-bold mr-2 cursor-pointer" id="span_home">Home</span>
										<span class=" font-weight-bold cursor-pointer" id="span_setting">Settings</span>
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
						<div class="div-left-contacts bg-white">					
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
					<div  class="col-12 col-sm-12 col-md-12 col-lg-12 div-center pt-2 pb-3 bg-white">
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
									<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2 cursor-pointer div-store-img-btn"  id="div-store-img-btn-1">
										<i class="fas fa-camera text-white"></i><br>
										<span class="text-white font-weight-bold font-size-18">Update</span>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0">
								<div class="div-store-img mt-1" id="div-store-img-2" >
									<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2 cursor-pointer div-store-img-btn"  id="div-store-img-btn-2">
										<i class="fas fa-camera text-white"></i><br>
										<span class="text-white font-weight-bold font-size-18">Update</span>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0">
								<div class="div-store-img mt-1" id="div-store-img-3" >
									<div style="background: rgb(0,0,0,0.5);height: 70px;" class="text-center pt-2 cursor-pointer div-store-img-btn" id="div-store-img-btn-3">
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
										</div>	
									</div>

									<div class="col-lg-12 col-md-4 pt-3">
										<div class="div-ads-img">	
										</div>	
									</div>

									<div class="col-lg-12 col-md-4 pt-3">
										<div class="div-ads-img">	
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
				<div class="col pr-0 pad-md-right pb-5">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2  pb-3" id="div-aboutus">
				
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Header Background</span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
								<div style="height: 35px; width: 50px;border: 1px solid black; background-color: #77933c;" class="cursor-pointer" id="colorpicker">
								</div>
                                <!-- <input id="demo" type="text" class="form-control" value="rgb(255, 128, 0)" /> -->
								<input type="hidden" id="color-val">
							</div>
						</div>

						<hr class="mt-2 mb-0 hr-green">

						<div class="row mt-2">
							<div class="col-lg-3 col-md-4 col-sm-12">
								<span class="text-capitalize">Store Status <span class="text-red">*</span></span>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-12">
                                <!-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input cursor-pointer " id="input_store_status" checked>
                                    <label class="custom-control-label cursor-pointer" for="input_store_status"></label>
                                </div> -->

                                <div class="custom-control custom-switch cursor-pointer" id="div_store_status">
                                    <input type="checkbox" class="custom-control-input cursor-pointer" id="input_store_status" checked>
                                    <label class="custom-control-label cursor-pointer" for="input_store_status"></label>
                                </div>
                            
							</div>
						</div>


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
                                <small class="text-red" id="span-linkname-error">This Link Name is not available</small>
								<input type="text" class="form-control textbox-green2 text-lowercase" maxlength="20" onkeypress="avoidSplChars(event);" id="input_linkname">
								<div class="row">
									<div class="col-6">
										<small class="text-green" id="span-linkname">The limit is 20 Characters</small>
									</div>
									<div class="col-6 text-right">
										<small class="text-green"><span id="input_linkname_length">0</span> / 20</small>
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

                        <div class="row pt-2">
                            <div class="col-12 col-lg-3 col-md-4 col-sm-12">
                                <span class="text-capitalize">Store Association</span>
                            </div>
                            <div class="col-12 col-lg-9 col-md-8 col-sm-12">
                                <input type="text" class="form-control textbox-green2 text-capitalize" id="input_store_assoc">
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
									<input type="text" class="form-control textbox-green2 text-lowercase" value="<?php echo base_url().str_replace(' ', '',$this->session->userdata("link_name")) ?>" id="input_outletko" readonly>
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

					<div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2 pb-3" id="div-payment">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-5">

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

										<div class="row pb-4">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12">
												<div id="div-delivery-type">
												
												</div>
	
											</div>
										</div>

									</div>
								</div>

								<hr class="my-2 hr-green">								

								<div class="row pb-4">
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

                                        <div class="row my-2">
                                            <div class="col-12 col-lg-8 col-md-7 col-sm-12">
                                                <input type="text" class="form-control" id="remitt_acct_name" placeholder="Account Name">
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-5 col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-white" id="remittbasic-addon1" style="border-right: 0 !important;">+63</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="remitt_contact_no" placeholder="Contact No" onkeypress="return isNumber(event)">
                                                </div>
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

                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                                <span class="font-size-16 font-weight-600 ">Delivery Coverage Area</span>			                                                
                                            </div>
                                        </div>

                                        <div class="row">	

                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-12 col-lg-2 col-md-4 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input cursor-pointer del_cov" id="cov_mm" name="cov_1" value="1">
                                                            <label class="custom-control-label cursor-pointer" for="cov_mm">Metro Manila</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-md-8 col-sm-12">
                                                        <button class="btn btn-outline-orange py-0" id="btn-cov-mm">Select City/Province</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-12 col-lg-2 col-md-4 col-sm-12">
                                                        <div class="custom-control custom-checkbox cursor-pointer">
                                                            <input type="checkbox" class="custom-control-input cursor-pointer del_cov" id="cov_luz" name="cov_2" value="2">
                                                            <label class="custom-control-label cursor-pointer" for="cov_luz">Luzon</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-md-8 col-sm-12">
                                                        <button class="btn btn-outline-orange py-0" id="btn-cov-luz">Select City/Province</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-12 col-lg-2 col-md-4 col-sm-12">
                                                        <div class="custom-control custom-checkbox cursor-pointer">
                                                            <input type="checkbox" class="custom-control-input cursor-pointer del_cov" id="cov_vis" name="cov_3" value="3">
                                                            <label class="custom-control-label cursor-pointer" for="cov_vis">Visayas</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-md-8 col-sm-12">
                                                        <button class="btn btn-outline-orange py-0" id="btn-cov-vis">Select City/Province</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-12 col-lg-2 col-md-4 col-sm-12">
                                                        <div class="custom-control custom-checkbox cursor-pointer del_cov">
                                                            <input type="checkbox" class="custom-control-input cursor-pointer" id="cov_min" name="cov_4" value="4">
                                                            <label class="custom-control-label cursor-pointer" for="cov_min">Mindanao</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-md-8 col-sm-12">
                                                        <button class="btn btn-outline-orange py-0" id="btn-cov-min">Select City/Province</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="row" id="div-shipping-fee">
											<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
												<button class="btn btn-outline-success px-5 ml-auto mb-2" id="btn_add_ship" data-toggle="modal" data-target="#modal-coverage-ship">Add Shipping Fee</button>
											</div>
											<div class="col-12 col-lg-12 col-md-12 col-sm-12" style="height: 300px; overflow: auto;" hidden>
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
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12" style="height: 300px; overflow:auto;">
                                                <table class="table table-bordered table-sm" id="tbl-cov-ship">
                                                    <thead>
                                                        <tr>
                                                            <th>Courier</th>
                                                            <th>Area</th>
                                                            <th>Province</th>
                                                            <th>City</th>
                                                            <th>Weight(Kg)</th>
                                                            <th>Fee</th>
                                                            <th colspan="2" class="text-center" style="width: 5%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
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
			<div class="row mt-3 pb-5" id="div-my-orders">
				<div class="col-12 col-md-12 col-lg-12  py-3" >
                <input type="hidden" id="acknowledge_order_id" value="0">

					<div class="row" id="div_order_table">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="h4">Orders</span>							
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<div class="form-inline">
								<label for="order_status">Status</label>
								<select class="form-control ml-2" id="order_status">
									<option value="1">For Acknowledgement</option>
                                    <option value="2">Acknowledged</option>
                                    <option value="3">Proof of Payment</option>
                                    <option value="4">Payment Denied</option>
                                    <option value="5">Payment Confirmed</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-3">
							<div id="div-tbl-process-order" style="overflow: auto;">
							</div>
						</div>
					</div>

					<div class="row mx-0" id="div_order">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-0">
                                    <button class="btn btn-warning" id="btn_back_acknowledge">Back</button>
                                    <button class="btn btn-danger" id="btn_cancel_acknowledge">Cancel</button>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal_acknowledge" id="btn_acknowledge">Acknowledge</button>
                                    <button class="btn btn-danger" id="btn_notconfirm_payment">Denied</button>
                                    <button class="btn btn-success" id="btn_confirm_payment">Confirmed</button>
                                </div>
                            </div>

                            <div class="row border mt-3">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 alert-success">
                                    <span class="font-weight-600" id="vw_order_status">Status</span>
                                </div>
                            </div>

                            <div class="row border border-top-0">
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                    <span>ORDER <span id="tbl_order_no"></span> </span>
                                </div>
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right">
                                    <span id="tbl_order_date"></span>
                                </div>
                            </div>

                            <div class="row py-2 alert-primary my-2" id="div-proof-payment">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <span class="h4">Proof of Payment</span>
                                            <div class="fotorama text-center" id="div-fotorama-3" 
                                            data-width="100%"
                                            data-ratio="4/3"
                                            data-minheight="200px"
                                            data-maxheight="400px"
                                            data-nav="thumbs"  
                                            data-auto="false" 
                                            data-allowfullscreen="true" 
                                            data-fit="contain">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span id="proof-message"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <p class="mb-0"><span class="font-weight-600">Payment Type</span> <br></p>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-4">
                                    <p class='mb-0' id="po_payment_types"></p>
                                    <p class='mb-0' id="po_payment_method"></p>
                                    <input type="hidden" id="po_payment_method_id">
                                    <input type="hidden" id="po_payment_type_id">
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <p class="mb-0"><span class="font-weight-600">Delivery Type</span></p>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-4">
                                    <p class='mb-0' id="po_delivery_type"></p>
                                    <p class='mb-0' id="po_delivery_date"></p>
                                    <p class='mb-0' id="po_delivery_courier"></p>
                                    <input type="hidden" id="po_delivery_type_id">
                                    <input type="hidden" id="po_delivery_courier_id">												
                                    <input type="hidden" id="po_delivery_date_id">																								
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col -12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <span class="font-weight-600">Delivery & Billing Address</span>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <p class="mb-0" id="tbl_from"></p>
                                    <p class="mb-0" id="addr_mobile"></p>
                                    <p class="mb-0" id="addr_phone"></p>
                                    <p class="mb-0" id="addr_email"></p>
                                    <p class="mb-0" id="addr_contact_person"></p>
                                    <p class="mb-0" id="addr_1"></p>
                                    <p class="mb-0" id="addr_notes"></p>
                                </div>
                            </div>

                            <div class="row border pb-2 mt-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                                    <div class="row mb-2">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                            <span class="font-weight-600">Products</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-order-prod">
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                                    <span class="font-weight-600">Item : <span id="vw_total_items">1</span></span>
                                </div>
                                <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                                    <p class="font-weight-400 mb-0">Sub Total : <span class="font-weight-600">&#8369; <span id="tbl_subtotal">800,000.00</span></span></p>
                                    <p class="font-weight-400 mb-0">Shipping Fee : <span class="font-weight-600">&#8369; <span id="tbl_ship">800,000.00</span></span></p>
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-2">
                                    <p class="font-weight-600 mb-0 text-dark-green">Grand Total : <span>&#8369; <span id="tbl_total">800,000.00</span></span></p>
                                </div>
                            </div>

                        </div>
					</div>


				</div>				
			</div>
			<!-- DIV MY ORDERS -->

			<!-- DIV MY CLOSED -->

			<div class="row mt-3 pb-5" id="div-my-closed">
				<div class="col-12 col-md-12 col-lg-12 post-body py-3" id="">
                <input type="hidden" id="close_order_id" value="0">

					<div class="row" id="div_closed_table">
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

					<div class="row mx-0" id="div_closed">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-0">
                                    <button class="btn btn-warning">Cancel</button>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal_deliver">Deliver</button>
                                </div>
                            </div>

                            <div class="row border mt-3">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 alert-success">
                                    <span class="font-weight-600" id="close_order_status">Status</span>
                                </div>
                            </div>

                            <div class="row border border-top-0">
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                    <span>ORDER <span id="tbl_close_order_no"></span> </span>
                                </div>
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right">
                                    <span id="tbl_close_order_date"></span>
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <p class="mb-0"><span class="font-weight-600">Payment Type</span> <br></p>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-4">
                                    <p class='mb-0' id="close_payment_type"></p>
                                    <p class='mb-0' id="close_payment_method"></p>
                                    <input type="hidden" id="close_payment_method_id">
                                    <input type="hidden" id="close_payment_type_id">
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <p class="mb-0"><span class="font-weight-600">Delivery Type</span></p>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-4">
                                    <p class='mb-0' id="close_delivery_type"></p>
                                    <p class='mb-0' id="close_delivery_date"></p>
                                    <p class='mb-0' id="close_delivery_courier"></p>
                                    <input type="hidden" id="close_delivery_type_id">
                                    <input type="hidden" id="close_delivery_courier_id">												
                                    <input type="hidden" id="close_delivery_date_id">																								
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col -12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <span class="font-weight-600">Delivery & Billing Address</span>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <p class="mb-0" id="tbl_close_from"></p>
                                    <p class="mb-0" id="close_addr_mobile"></p>
                                    <p class="mb-0" id="close_ddr_phone"></p>
                                    <p class="mb-0" id="close_addr_email"></p>
                                    <p class="mb-0" id="close_addr_contact_person"></p>
                                    <p class="mb-0" id="close_addr_1"></p>
                                    <p class="mb-0" id="close_addr_notes"></p>
                                </div>
                            </div>

                            <div class="row border pb-2 mt-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                                    <div class="row mb-2">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                            <span class="font-weight-600">Products</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="close-div-order-prod">
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                                    <span class="font-weight-600">Item : <span id="close_total_items">1</span></span>
                                </div>
                                <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                                    <p class="font-weight-400 mb-0">Sub Total : <span class="font-weight-600">&#8369; <span id="tbl_close_subtotal">800,000.00</span></span></p>
                                    <p class="font-weight-400 mb-0">Shipping Fee : <span class="font-weight-600">&#8369; <span id="tbl_close_ship">800,000.00</span></span></p>
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-2">
                                    <p class="font-weight-600 mb-0 text-dark-green">Grand Total : <span>&#8369; <span id="tbl_close_total">800,000.00</span></span></p>
                                </div>
                            </div>

                        </div>
					</div>


				</div>
			</div>

			<!-- DIV MY CLOSED -->

			<!-- DIV MY DELIVERED -->

			<div class="row mt-3 pb-5" id="div-my-delivered">
				<div class="col-12 col-md-12 col-lg-12 post-body py-3" id="">
                <input type="hidden" id="close_order_id" value="0">

					<div class="row" id="div_delivered_table">
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
							<span class="h4">Orders</span>							
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-2 col-sm-12">
                                    <div class="form-inline">
                                        <label for="delivered-status">Status</label>
                                        <select class="form-control ml-2" id="delivered-status">
                                            <option value="2">For Delivery</option>
                                            <option value="3">Delivered</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-2 col-sm-12">
                                    <div class="form-inline">
                                        <label for="delivered-fdate">From</label>
                                        <input type="date" class="form-control ml-2" id="delivered-fdate" value="<?php echo date('Y-m-01')?>"> 
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-2 col-sm-12">
                                    <div class="form-inline">
                                        <label for="delivered-tdate">To</label>
                                        <input type="date" class="form-control ml-2" id="delivered-tdate" value="<?php echo date('Y-m-d')?>"> 
                                    </div>
                                </div>
                                <div class="col-12 col-lg-1 col-md-3 col-sm-12">
                                    <button class="btn btn-success btn-block" id="btn-delivered-search">Search</button>
                                </div>                                
                            </div>
						</div>
						<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-3">
							<div id="div-tbl-delivered-order" style="overflow: auto;">  
							</div>
						</div>
					</div>

					<div class="row mx-0" id="div_delivered">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-0">
                                    <button class="btn btn-warning">Cancel</button>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal_deliver">Deliver</button>
                                </div>
                            </div>

                            <div class="row border mt-3">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 alert-success">
                                    <span class="font-weight-600" id="span-delivered-status">Status</span>
                                </div>
                            </div>

                            <div class="row border border-top-0">
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2">
                                    <span>ORDER <span id="tbl_delivered_order_no"></span> </span>
                                </div>
                                <div class="col-6 col-lg-auto col-md-6 col-sm-6 px-2 text-right">
                                    <span id="tbl_delivered_order_date"></span>
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <p class="mb-0"><span class="font-weight-600">Payment Type</span> <br></p>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-4">
                                    <p class='mb-0' id="delivered_payment_type"></p>
                                    <p class='mb-0' id="delivered_payment_method"></p>
                                    <input type="hidden" id="delivered_payment_method_id">
                                    <input type="hidden" id="delivered_payment_type_id">
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <p class="mb-0"><span class="font-weight-600">Delivery Type</span></p>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-4">
                                    <p class='mb-0' id="delivered_delivery_type"></p>
                                    <p class='mb-0' id="delivered_delivery_date"></p>
                                    <p class='mb-0' id="delivered_delivery_courier"></p>
                                    <input type="hidden" id="delivered_delivery_type_id">
                                    <input type="hidden" id="delivered_delivery_courier_id">												
                                    <input type="hidden" id="delivered_delivery_date_id">																								
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col -12 col-lg-12 col-md-12 col-sm-12 px-2">
                                    <span class="font-weight-600">Delivery & Billing Address</span>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <p class="mb-0" id="tbl_delivered_from"></p>
                                    <p class="mb-0" id="delivered_addr_mobile"></p>
                                    <p class="mb-0" id="delivered_addr_phone"></p>
                                    <p class="mb-0" id="delivered_addr_email"></p>
                                    <p class="mb-0" id="delivered_addr_contact_person"></p>
                                    <p class="mb-0" id="delivered_addr_1"></p>
                                    <p class="mb-0" id="delivered_addr_notes"></p>
                                </div>
                            </div>

                            <div class="row border pb-2 mt-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                                    <div class="row mb-2">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
                                            <span class="font-weight-600">Products</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="delivered-div-order-prod">
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-4 col-lg-6 col-md-6 col-sm-6 px-2">
                                    <span class="font-weight-600">Item : <span id="delivered_total_items">1</span></span>
                                </div>
                                <div class="col-8 col-lg-6 col-md-6 col-sm-6 text-right px-2">
                                    <p class="font-weight-400 mb-0">Sub Total : <span class="font-weight-600">&#8369; <span id="tbl_delivered_subtotal">800,000.00</span></span></p>
                                    <p class="font-weight-400 mb-0">Shipping Fee : <span class="font-weight-600">&#8369; <span id="tbl_delivered_ship">800,000.00</span></span></p>
                                </div>
                            </div>

                            <div class="row border my-2">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-2">
                                    <p class="font-weight-600 mb-0 text-dark-green">Grand Total : <span>&#8369; <span id="tbl_delivered_total">800,000.00</span></span></p>
                                </div>
                            </div>

                        </div>
					</div>


				</div>
			</div>

			<!-- DIV MY DELIVERED -->

            <!-- DIV MY PERFORMANCE  -->
            <div class="row mt-3 pb-5 " id="div-my-performance">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 bg-white py-3 h-100 div-my-performance">
                    
                    <div class="row mb-2">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="h4">My Performance</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 py-1">
                            <select name="" id="report-type" class="form-control">
                                <option value="0">Chart</option>
                                <option value="1">Sales Summary</option>
                                <option value="2">Sales per Category (Summary)</option>
                                <option value="3">Sales per Product (Summary)</option>
                                <option value="4" hidden>Sales per Product Variations (Summary)</option>
                                <option value="5">Sales per Payment Type (Summary)</option>
                                <option value="6">Sales per Delivery Type (Summary)</option>
                                <option value="7">Sales per Category (Detailed)</option>
                                <option value="8">Sales per Product (Detailed)</option>
                                <option value="9" hidden>Sales per Product Variations (Detailed)</option>
                                <option value="10">Sales per Payment Type (Detailed)</option>
                                <option value="11">Sales per Delivery Type (Detailed)</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-2 col-md-2 col-sm-12 py-1">
                            <input type="date" name="" id="report-fdate" class="form-control" value="<?php echo date('Y-m-01')?>">
                        </div>
                        <div class="col-12 col-lg-2 col-md-2 col-sm-12 py-1">
                            <input type="date" name="" id="report-tdate" class="form-control" value="<?php echo date('Y-m-d')?>">
                        </div>
                        <div class="col-12 col-lg-3 col-md-3 col-sm-12 py-1">
                            <select name="" id="report-status" class="form-control">
                                <option value="0" hidden></option>
                                <option value="1">For Acknowledgement</option>
                                <option value="2">Acknowledgement</option>
                                <option value="3">Proof of Payment</option>
                                <option value="4">Payment Denied</option>
                                <option value="5">Payment Confirmed</option>
                                <option value="6">For Delivery</option>
                                <option value="7">Delivered</option>
                                <option value="0">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-1 col-md-1 col-sm-12 py-1">
                            <button class="btn btn-orange btn-block" id="report-filter">Filter</button>
                        </div>
                    </div>

                    <div class="row mt-3" id="div-my-performance-chart">
                        <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                            <div class="div-chart">
                                <canvas id="chart-year" width="200" height="200"></canvas>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                            <div class="div-chart">
                                <canvas id="chart-week" width="200" height="200"></canvas>                            
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-my-performance-report">
                        
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- DIV MY PERFORMANCE -->

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
								</div>	
							</div>

							<div class="col-lg-12 col-md-4 pt-3">
								<div class="div-ads-img">	
								</div>	
							</div>

							<div class="col-lg-12 col-md-4 pt-3">
								<div class="div-ads-img">	
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

<div class="modal" id="modal_myorders" style="top: 15%">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: transparent;border: 0">
      <div class="modal-header py-2 btn-success" hidden>
        <h4 class="modal-title">Variations</h4>
      </div>
      <div class="modal-body" style="background: transparent;">

      	<div class="row">
      		<div class="col-12 col-md-4 col-lg-4 px-4" id="div-img-process-order">
				<img src="<?php echo base_url() ?>assets/images/process_order.png" id="img_process_order" class='img-fluid cursor-pointer'>
      		</div>

      		<div class="col-12 col-md-4 col-lg-4 px-4" id="div-img-close-order">      			
				<img src="<?php echo base_url() ?>assets/images/close_order.png" id="img_close_order" class='img-fluid cursor-pointer' >
      		</div>

      		<div class="col-12 col-md-4 col-lg-4 px-4" id="div-img-delivered-order">
				<img src="<?php echo base_url() ?>assets/images/delivered_order.png" id="img_delivered_order" class='img-fluid cursor-pointer'>
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
    <div class="modal-dialog modal-lg modal-dialog-scrollable"> <!-- modal-dialog-scrollable modal-half -->
        <div class="modal-content">
            <div class="modal-header modal-hdr-bg pt-2 pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-12 col-lg-12 text-center">
                            <h4>Products/Services Entry</h4f>
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
									<div class="modal-img-upload" id="modal-img-upload" onclick="get_image();">
										<!-- <img src="<?php echo base_url('assets/images/add_pic.png') ?>" id='img-upload'> -->
									</div>
		                        </div>
		                    </div>

		                    <div class="form-group mb-3 row">
		                    	<div class="col-12 col-md-12 col-lg-12">
									<!-- <button class="btn  btn-success bg-white"> -->
                                    <span class="btn btn-block btn-success btn-file btn-modal-img-upload bg-white" style="border-top: 0;border-radius: 0;">
									<!--    <i class="fa fa-camera" aria-hidden="true">-->
									    	Choose Image
									    	<input type="file" id="imgInp" class="img-upload-modal btn btn-success" multiple>
									<!--  	</i>-->
                                    </span>
									<!-- </button> -->
								</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-not-avail">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input cursor-pointer" id="not_avail" name="not_avail" value="0">
                                        <label class="custom-control-label cursor-pointer" for="not_avail">Not Available?</label>
                                    </div>
                                </div>
                            </div>

		                </div>

	                	<div class="col-12 col-md-7 col-lg-7 pad-left">
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

		                </div>


		            </div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-0 row">
		                    	<div class="col-6 col-md-4 col-lg-4 mt-1">
		                    		<span class="font-weight-600">For Online Sale? <span class="text-red">*</span></span>
		                    		<select class="form-control textbox-green2" id="prod_online">
		                    			<option value="1">Yes</option>
		                    			<option value="0">No</option>
		                    		</select>
		                    	</div>
		                    	<div class="col-6 col-md-4 col-lg-4 mt-1">
		                    		<span class="font-weight-600">Unit Price <span class="text-red" >*</span></span>
		                    		<input type="text" class="form-control textbox-green2 text-right" placeholder="0.00" id="prod_price">
		                    		<input type="text" class="form-control textbox-green2 text-right" placeholder="0.00" id="prod_price2" readonly>
		                    	</div>
		                    	<div class="col-6 col-md-4 col-lg-4 mt-1">
			                    	<span class="font-weight-600">Category <span class="text-red">*</span></span>
			                    	<select class="form-control textbox-green2" id="prod_category">
			                    		<option></option>
			                    	</select>
		                    	</div>
		                    	<div class="col-6 col-md-4 col-lg-4 mt-1 d-none d-sm-block">
		                    		<span class="font-weight-600">Condition <span class="text-red">*</span></span>
		                    		<select class="form-control textbox-green2" id="prod_condition">
		                    			<option value="1">New</option>
		                    			<option value="2">Used</option>
		                    		</select>
	                    		</div>
		                    	<div class="col-6 col-md-4 col-lg-4 mt-1">
		                    		<span class="font-weight-600">Weight (g) <span class="text-red" hidden>*</span></span>
		                    		<input type="text" class="form-control textbox-green2 text-right" id="prod_weight">
		                    	</div>
		                    	<div class="col-6 col-md-4 col-lg-4 mt-1 d-none d-sm-block">
		                    		<span class="font-weight-600">Stock</span>
		                    		<input type="text" class="form-control textbox-green2 text-right" id="prod_stock">
		                    		<input type="text" class="form-control textbox-green2 text-right" id="prod_stock2" readonly>
		                    	</div>

		                    </div>

		                    <div class="form-group mb-0 mt-2 row" >
		                    	<div class="col-12 col-md-12 col-lg-12">
		                    		<button class="btn btn-outline-success btn-block" id="btn-variation">Variations</button>
		                    	</div>
		                    </div>

                            <div class="form-group-mb-0 mt-2 row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <button class="btn btn-outline-success btn-block" data-toggle="collapse" data-target="#div-discount">Discount</button>
                                </div>
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 collapse pt-3" id="div-discount">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="alert alert-warning mt-1 mb-0 py-2">
                                                <span>Recompute the Discount, Please save to update the data.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-lg-3 col-md-3 col-sm-6 pad-right">
                                            <span class="font-weight-600">Variation</span>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-2 col-sm-6 pad-center">
                                            <span class="font-weight-600">Unit Price (<?php echo $this->session->userdata('IPCurrencySymbol'); ?>)</span>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-2 col-sm-6 pad-center">
                                            <span class="font-weight-600">Discount (<?php echo $this->session->userdata('IPCurrencySymbol'); ?>)</span>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-2 col-sm-6 pad-centers">
                                            <span class="font-weight-600">Discount (%)</span>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-3 col-sm-6 pad-left">
                                            <span class="font-weight-600">New Price (<?php echo $this->session->userdata('IPCurrencySymbol'); ?>)</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-variation-price">
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

		                    <div class="form-group mb-0 row" >
		                    	<div class="col-12 col-md-12 col-lg-12 mt-1">
		                    		<span class="font-weight-600">Standard Delivery</span>
		                    		<input type="text" class="form-control textbox-green2" id="prod_std_delivery">
		                    		<!-- <select class="form-control textbox-green2" id="prod_std_delivery">
		                    			
		                    		</select> -->
		                    	</div>
								<div class="col-12 col-md-6 col-lg-6 mt-1" hidden>
									<span class="font-weight-600">Delivery Options <span class="text-red">*</span> </span>
                                    <select class="form-control" id="prod_del_opt">
                                        <option value="00" selected hidden></option>
                                    </select>
									<!-- <input type="text" class="form-control textbox-green2" id="prod_del_opt" placeholder="1 to 3 days Delivery"> -->
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
							</div>

							<div class="form-group mb-3 row">
								<div class="col-12 col-md-12 col-lg-12">
									<span class="font-weight-600">Returns & Warranty <span class="text-red">*</span></span>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-1">
                                            <input type="text" class="form-control textbox-green2" id="prod_return" placeholder="7 Days Return">    
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-1">
        									<input type="text" class="form-control textbox-green2" id="prod_warranty" placeholder="30 Days Warranty">
                                        </div>
                                    </div>
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
      		<div class="col-10 col-lg-8 col-md-8 col-sm-12 mx-auto px-0" id="div-img-prof" style="height: 230px;border: 1px solid #28a745;">
      		</div>
      		<div class="col-10 col-lg-8 col-md-8 col-sm-12 mx-auto px-0 cursor-pointer">
				<span class="btn btn-block btn-outline-success btn-file" style="border-top: 0;border-radius: 0;">
                    Browse
			    	<input type="file" id="imgProf" class="img-upload-modal">
				</span>      			
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
              <span class="btn btn-block btn-outline-success btn-file" style="border-top: 0;border-radius: 0;">
                    Browse
			    	<input type="file" id="imgStore" class="img-upload-modal">
				</span>      			
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

<div class="modal" id="modal_variations" style="top: 5% !important">
  <div class="modal-dialog  modal-dialog-scrollable" style="height: 500px;">
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
      <div class="modal-footer py-1">
        <!-- <button type="button" class="btn btn-success" id="save-prod-variation">Save</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
      <div class="modal-header py-1">
        <h4 class="modal-title">Delivery Order</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>
      <!-- Modal body -->
      <div class="modal-body py-1">
      	<div class="container">
      		<div class="row">
      			<div class="col-12">
      				<span>Courier <span class="text-red">*</span> </span>
      				<input type="text" class="form-control textbox-green" id="delivery_courier">
      			</div>
      			<div class="col-12">
      				<span>Track No <span class="text-red">*</span> </span>
      				<input type="text" class="form-control textbox-green" id="delivery_track">
      			</div>
      		</div>
      	</div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer py-1">
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
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600">First Name</span>
      				<input type="text" class="form-control textbox-green2 text-capitalize" value="<?php echo $this->session->userdata("user_fname") ?>" id="fname">                
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600">Middle Name</span>
      				<input type="text" class="form-control textbox-green2 text-capitalize" value="<?php echo $this->session->userdata("user_mname") ?>" id="mname">                
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600">Last Name</span>
      				<input type="text" class="form-control textbox-green2 text-capitalize" value="<?php echo $this->session->userdata("user_lname") ?>" id="lname">                
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <hr class="mt-2 mb-1" style="border-top: 1px solid black;">
                </div>
            </div>
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
							<span class="input-group-text show_pass cursor-pointer" id="btn_curr_pass">
								<i class="fa fa-eye-slash" id="curr_pass_icon"></i>
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
							<span class="input-group-text show_pass cursor-pointer" id="btn_new_pass">
								<i class="fa fa-eye-slash" id="new_pass_icon"></i>
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
							<span class="input-group-text show_pass cursor-pointer" id="btn_conf_pass">
								<i class="fa fa-eye-slash" id="conf_pass_icon"></i>
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
					<div class="col-8 col-lg-10 col-md-8 col-sm-8 pr-1">
						<input type="text" class="form-control" id="prod_cat">
					</div>
					<div class="col-4 col-lg-2 col-md-4 col-sm-4 pl-1">
						<button class="btn btn-orange btn-block" style="height: 35px;" id="save_category">Add</button>
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
      <div class="modal-header py-1">
        <h4 class="modal-title">Shipping Fee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <input type="hidden" id="ship_id">
	  	<div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 pb-2">
                    <span class="text-red font-italic">Note: Search "My Store Shipping" for personal courier service</span>
                </div>
            </div>
			<div class="row">
				<div class="col-4">
					<span class="font-weight-600">Courier <span class="text-red">*</span></span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control" id="ship_courier" data-id = "" placeholder="Search Courier Service">
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
					<span class="font-weight-600">Metro Manila <span class="text-red">*</span></span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_mm">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Luzon <span class="text-red">*</span></span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_luz">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Visayas <span class="text-red">*</span></span>
				</div>
				<div class="col-8">
					<input type="text" class="form-control text-right" value="0" id="ship_vis">
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-4">
					<span class="font-weight-600">Mindanao <span class="text-red">*</span></span>
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

<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

<!-- The Modal -->
<div class="modal" id="modal-product-image" style="top: 10%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1 btn-success">
                <h4 class="modal-title">Product Image</h4>
                <button type="button" class="close" data-dismiss="modal" hidden>&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="fotorama text-center" id="div-fotorama" data-width="100%" data-ratio="4/3" data-nav="thumbs" data-allowfullscreen="true">
                            <!-- <img src="" alt=""> -->
                            <!-- <img src="https://s.fotorama.io/okonechnikov/1-lo.jpg">
                            <img src="https://ucarecdn.com/3ed25902-4a51-4628-a057-1e55fbca7856/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/4facbe78-b4e8-4b7d-8fb0-d3659f46f1b4/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/5b0b329d-050e-4143-bc92-7f40cdde46f5/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/7ca0e7f6-90eb-4254-82ea-58c77e74f6a0/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/3ed25902-4a51-4628-a057-1e55fbca7856/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/4facbe78-b4e8-4b7d-8fb0-d3659f46f1b4/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/5b0b329d-050e-4143-bc92-7f40cdde46f5/-/stretch/off/-/resize/760x/">
                            <img src="https://ucarecdn.com/7ca0e7f6-90eb-4254-82ea-58c77e74f6a0/-/stretch/off/-/resize/760x/">  -->
                    </div>

                    <div class="row" hidden>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div style="width: 200px; height:200px;border:1px solid green;" class="mx-auto" id="variation-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" id="close-modal-products-image" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-product-image-2" style="top: 10%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1 btn-success">
                <h4 class="modal-title">Product Image</h4>
                <button type="button" class="close" data-dismiss="modal" hidden>&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="text-center" id="div-fotorama-2" data-width="100%" data-ratio="4/3" data-nav="thumbs" data-allowfullscreen="true">

                    </div>

                    <div class="row" hidden>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div style="width: 200px; height:200px;border:1px solid green;" class="mx-auto" id="variation-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" id="close-modal-products-image" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- MODAL COVERAGE AREA -->
<div class="modal" id="modal-coverage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title font-weight-600">City / Provinces</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body py-1">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="font-weight-600 h4" id="coverage-group">Metro Manila</span>
                        </div>
                        <div class="col-12 col-lg-12 co-md-12 col-sm-12 px-4 pt-2">
                           <div class="custom-control custom-checkbox" >
                                <input type="checkbox" class="custom-control-input cursor-pointer" id="cov_all" name="cov_all" value="0">
                                <label class="custom-control-label cursor-pointer font-weight-600" for="cov_all">All</label>
                            </div>                    
                        </div>
                    </div>
                    <div class="row" style="height: 200px; overflow: auto;"> 
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-4 pt-1" id="coverage_area"> 
                        </div>
                    </div>
                    <div class="row pt-2" id="div-coverage-city">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="row">
                                <div class="col-12 col-lg-5 col-md-5 col-sm-12 pad-right">
                                    <select class="form-control" id="cov-prov">
                                        <option value="" hidden>Province</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-5 col-md-6 col-sm-12 pad-center">
                                    <select  class="form-control" id="cov-prov-city">
                                        <option value="0">All</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-2 col-md-1 col-sm-12 pad-left">
                                    <button class="btn btn-outline-orange" id="add-prov-city">Add</button>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12" style="height: 200px; overflow: auto;">
                                    <table class="table table-bordered table-sm" id="tbl-prov-city">
                                        <thead>
                                            <tr>
                                                <th style="width: 40%;">Province</th>
                                                <th style="width: 55%;">City</th>
                                                <th style="width: 5%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" class='btn btn-orange' id="btn-save-prov-city">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-coverage-ship">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title">Shipping Fee</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cov-ship-id" value="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 pb-2">
                            <span class="text-red font-italic">Note: Search "My Store Shipping" for personal courier service</span>
                        </div>
                    </div>
                    <div class="row" id="alert-cov-ship">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="alert alert-danger py-1">
                                <span>This Shipping details is already saved.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span class="font-weight-600">Courier <span class="text-red">*</span></span>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="cov-ship-courier" data-id = "" placeholder="Search Courier Service">
                        </div>
                    </div> 
                    <div class="row mt-1">
                        <div class="col-4">
                            <span class="font-weight-600">Area <span class="text-red">*</span></span>
                        </div>
                        <div class="col-8">
                            <select class="form-control" id="cov-ship-area">
                                <option value="" hidden>Area</option>
                                <!-- <option value="1">Metro Manila</option>
                                <option value="2">Luzon</option>
                                <option value="3">Visayas</option>
                                <option value="4">Mindanao</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <span class="font-weight-600">Province<span class="text-red">*</span></span>
                        </div>
                        <div class="col-8">
                            <select name="" id="cov-ship-prov" class="form-control">
                                <!-- <option value="0" hidden>All</option> -->
                                <option value="" selected hidden></option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <span class="font-weight-600">City <span class="text-red">*</span></span>
                        </div>
                        <div class="col-8">
                            <select name="" id="cov-ship-city" class="form-control">
                                <option value="0" >All</option>
                                <!-- <option value="" selected hidden></option> -->
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <span class="font-weight-600">Kilo (Kg) <span class="text-red" hidden>*</span></span>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control text-right" value="0" id="cov-ship-kg">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <span class="font-weight-600">Amount Fee <span class="text-red">*</span></span>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control text-right" value="0" id="cov-ship-fee">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"  id="btn-save-cov-ship">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="clear_cov_ship();">Cancel</button>
            </div>
        </div>
    </div>
</div>


<style>

@media only screen and (min-width: 1920px) {

.div-chart{
    height: 350px;
}
	
}
</style>