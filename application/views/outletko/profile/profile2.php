<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/profile.css') ?>">

<script type="text/javascript" src="<?php echo base_url() ?>js/outletko/profile/profile.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


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
						<div class="div-prod-img">
						</div>
					</div>
					<!-- END HEADER IMAGE -->

					<!-- HEADER DETAILS -->
					<div class="col-7 col-md-9 pl-5 text-white">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 py-0 my-0">
								<span class="font-weight-700 h4">Business Name</span>
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 py-0 my-0">
								<span class="font-weight-700 h5">Owner Name</span>						
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<span class="font-small">Location</span>						
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<span class="font-small">email@email.com</span>						
							</div>
						</div>

						<div class="row">
							<div class="col-6 col-md-4 ">
								<span class="font-small">Mobile No: </span>
								<span class="font-small">+639123456789</span>
							</div>

							<div class="col-6 col-md-8">
								<span class="font-small">Telephone No: </span>
								<span class="font-small">0123456</span>
							</div>
						</div>
					</div>
					<!-- END HEADER DETAILS -->

					<!-- HEADER EDIT BUTTON -->
					<div class="col-1 col-md-1 pl-1 pr-0" >
						<div class="row">
							<div class="col-lg-12 pr-1 position-absolute bottom-0">
								<button class="btn btn-block btn-orange font-small ml-auto" data-toggle="modal" data-target="#modal_profile" style="height: 10px; width: 50px;"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>					
							</div>
						</div>
					</div>
					<!-- END HEADER EDIT BUTTON -->
				</div>
			</div>
		</div>
		<!-- END HEADER -->

		
		<!-- DETAILS -->
		<div class="row">
			<div class="col-12 col-md-12 pt-2" >
				<div class="row ">
					<!-- LIST BODY -->
					<div class="col-12 col-md-5 col-lg-2 div-body-left">
						<div class="">
							<!-- BUSINESS CATEGORY -->
							<div class="row">
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
											<span class="font-size-18">Wholesaler - Jewelry</span>
										</div>
									</div>
								</div>
							</div>
							<!-- END BUSINESS CATEGORY -->

							<!-- MAIN SERVICES -->
							<div class="row">
								<div class="col-lg-12">
									<div class="row div-body-left-header text-black">
										<div class="col-lg-10 pad-right py-1">
											<span class="font-size-18">Business Category</span>
										</div>
										<div class="col-lg-2 text-right pr-0 pl-0 py-1">
											<button class=" btn-orange font-small btn-icon px-0" id="btnclick" data-toggle="modal" data-target="#products_list"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
										</div>
									</div>
									<div class="row text-black">
										<div class="col-lg-12 py-2" style="height: 285px;">
											<ul class="pl-3">
											<?php for ($i=1; $i <= 7; $i++) {  ?>
												<li class="pl-0 font-size-16">Products <?php echo $i; ?></li>
											<?php } ?>												
											</ul>
										</div>
									</div>
								</div>								
							</div>

							<!-- END MAIN SERVICES -->

							<!-- CONTACT US -->

							<div class="row">
								<div class="col-lg-12">
									<div class="row div-body-left-header text-black">
										<div class="col-lg-12 pad-right py-1">
											<span class="font-size-20">Contact Us</span>
										</div>
									</div>
									<div class="row text-black font-size-16 py-3">
										<div class="col-lg-12 text-justify">
											<a href="mailto:sales@epgmcompany.com">
											<span class="text-black"><i class="fab fa-google"></i> sales@gmail.com</span>
											</a>
										</div>
										<div class="col-lg-12 text-justify">
											<a href="mailto:sales@epgmcompany.com">
											<span class="text-black"><i class="fab fa-yahoo	"></i> sales@yahoo.com</span>
											</a>
										</div>
										<div class="col-lg-12 text-justify">
											<a href="https://facebook.com/epgmcompany" target="_blank">
												<span class="text-black"><i class="fab fa-facebook-square"></i> epgmcompany</span>
											</a>
										</div>
										<div class="col-lg-12 ">
											<a href="https://twitter.com/epgmcompany">
												<span class="text-black"><i class="fab fa-twitter-square"></i> epgmcompany</span>
											</a>
										</div>
										<div class="col-lg-12 ">
											<span class="text-black"><i class="fa fa-phone-square"></i> (02) 0123456</span>
										</div>
									</div>
								</div>								
							</div>

							<!-- END CONTACT US -->
						</div>
					</div>
					<!-- END LIST BODY -->

					<!-- POST AND IMAGE BODY -->
					<div class="col-12 col-md-7 col-lg-8 pl-4 post-body" >
						<!-- POST BOX -->
						<div class="row ">
							<div class="col-12 col-md-12 write-post py-0 my-0 px-1">
								<textarea class="form-control write-post-box font-size-18" placeholder="What's new with your business, products or service?"></textarea>
								<div class="row">
									<div class="col-12 col-lg-12">
										<div class="form-control-post">
											<button class="btn float-right btn-orange font-small ml-auto font-weight-600">Post</button>																		
										</div>
									</div>
								</div>								
							</div>
						</div>
						<!-- END POST BOX -->

						<!-- EDIT POST BUTTON -->
						<div class="row row-image-div">
							<div class="col-12 col-md-12">
							</div>
						</div>
						<!-- END EDIT POST BUTTON -->

						<!-- IMAGES 1ST ROW-->
						<div class="row pt-2">
							<div class="col-6 col-md-4 pad-center">
								<div class="div-list-img" >
									<img src="images/products/a.png"  alt="image">
									<div class="btn" data-toggle="modal" data-target="#img_upload">
										<i class="fa fa-camera"></i>
									</div>
								</div>
							</div>
	
							<div class="col-6 col-md-4 pad-center">
								<div class="div-list-img" >
									<img src="images/products/a.png"  alt="image">
									<div class="btn">
										<i class="fa fa-camera"></i>
									</div>
								</div>
							</div>

							<div class="col-6 col-md-4 pad-center">
								<div class="div-list-img" >
									<img src="images/products/a.png"  alt="image">
									<div class="btn">
										<i class="fa fa-camera"></i>
									</div>
								</div>
							</div>
						</div>
						<!-- END IMAGES 1ST ROW-->

						<!-- IMAGES 2ND ROW -->
						<div class="row pt-3">
							<div class="col-6 col-md-4 pad-center">
								<div class="div-list-img" >
									<img src="images/products/a.png"  alt="image">
									<div class="btn">
										<i class="fa fa-camera"></i>
									</div>
								</div>
							</div>
	
							<div class="col-6 col-md-4 pad-center">
								<div class="div-list-img" >
									<img src="images/products/a.png"  alt="image">
									<div class="btn">
										<i class="fa fa-camera"></i>
									</div>
								</div>
							</div>

							<div class="col-6 col-md-4 pad-center">
								<div class="div-list-img" >
									<img src="images/products/a.png"  alt="image">
									<div class="btn">
										<i class="fa fa-camera"></i>
									</div>
								</div>
							</div>
						</div>
						<!-- END IMAGES 2ND ROW -->
					</div>
					<!-- END POST AND IMAGE BODY -->

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
	                	<div class="col-12 col-md-7 col-lg-7">
		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
		                            <span class="font-bold">Product Name</span>
		                            <input type="text" class="form-control textbox-green2">
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
		                            <span class="font-bold">Product Description</span>
		                            <textarea class="form-control text-prod-desc textbox-green2"></textarea>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-12 col-md-5 col-lg-5">
		                    <div class="form-group mb-0 row">
		                        <div class="col-12 col-md-12 col-lg-12">
									<div class="modal-img-upload" >
										<img src="images/products/a.png">
									</div>
		                        </div>
		                    </div>

		                    <div class="form-group mb-0 row">
		                    	<div class="col-12 col-md-12 col-lg-12">
									<button class="btn btn-modal-img-upload ">
									    <i class="fa fa-camera" aria-hidden="true">
									    	Choose Image
									    	<input type="file" class="img-upload-modal" data-toggle="modal" data-target="#img_upload">
									  	</i>
									</button>
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
			            	<button class="btn btn-green2 btn-block font-weight-600" data-dismiss="modal">Save</button>            			
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
                            <input type="text" class="form-control mt-2 textbox-green2">
                            <input type="text" class="form-control mt-2 textbox-green2">
                            <input type="text" class="form-control mt-2 textbox-green2">
                            <input type="text" class="form-control mt-2 textbox-green2">
                            <input type="text" class="form-control mt-2 textbox-green2">
                            <input type="text" class="form-control mt-2 textbox-green2">
                            <input type="text" class="form-control mt-2 textbox-green2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-sales modal-ftr-bg py-2">
            	<div class="container px-0">	
	            	<div class="row">
	            		<div class="col-lg-8"></div>
	            		<div class="col-lg-2 pad-right">
			            	<button class="btn btn-green2 btn-block font-weight-600" data-dismiss="modal">Save</button>            			
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


<div class="modal" id="modal_business">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header btn-warning pt-2 pb-0">
				<h4 class="modal-title">Business Category</h4>
			</div>
			<div class="modal-body">
				<select class="form-control textbox-green2">
					<option></option>
				</select>
			</div>
			<div class="modal-footer modal-ftr-bg pt-2 pb-2">
				<div class="container ">
	            	<div class="row">
	            		<div class="col-lg-4"></div>
	            		<div class="col-lg-4 pad-center">
			            	<button class="btn btn-green2 btn-block font-weight-600" data-dismiss="modal">Save</button>            			
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
				<h4 class="modal-title">Business Profile1</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid font-size-18">
					
					<div class="row">
						<div class="col-lg-12 pad-center">
							<span>Business Name</span>
							<input type="text" id="bus_name" class="form-control textbox-green2">
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

					<div class="row">
						<div class="col-lg-12 pad-center">
							<span>Email</span>
							<input type="text" class="form-control textbox-green2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 pad-center">
							<span>Mobile No</span>
							<input type="text" class="form-control textbox-green2">
						</div>
						<div class="col-lg-6 pad-center">
							<span>Telephone No</span>
							<input type="text" class="form-control textbox-green2">
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
