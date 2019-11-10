<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/my_order.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/outletko/buyer/user.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="seller_id" value="0">

<div class="container pt-3 pb-4">
	<div class="row">

		<div class="col-12 col-sm-12 col-md-10 col-lg-10">

			<!-- DIV HOME -->
			<div class="row" id="div-home">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-body pt-4 pb-5">

					<div class="row">
						<div class="col-4">
							<span class="font-weight-600">Username</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_uname" value="<?php echo $this->session->userdata('user_uname') ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-4">
							<span class="font-weight-600">Password</span>
							<div class="input-group">
								<input type="password" class="form-control form-control-sm textbox-green" id="user_pass">
								<div class="input-group-append" style="height: 31px;"  >
									<span class="input-group-text show_pass cursor-pointer" id="show_pass">
										<i class="fa fa-eye-slash" id="pass_icon"></i>
									</span>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-4">
							<span class="font-weight-600">New Password</span>
							<div class="input-group">
								<input type="password" class="form-control form-control-sm textbox-green" id="user_new_pass">
								<div class="input-group-append" style="height: 31px;"  >
									<span class="input-group-text show_new_pass cursor-pointer" id="show_new_pass">
										<i class="fa fa-eye-slash" id="new_pass_icon"></i>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-4">
							<span class="font-weight-600">Confirm Password</span>
							<div class="input-group">
								<input type="password" class="form-control form-control-sm textbox-green" id="user_conf_pass">
								<div class="input-group-append" style="height: 31px;"  >
									<span class="input-group-text show_conf_pass cursor-pointer" id="show_conf_pass">
										<i class="fa fa-eye-slash" id="conf_pass_icon"></i>
									</span>
								</div>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-12">
							<h5 class="font-weight-600">Personal Information</h5>
						</div>
					</div>

					<div class="row">
						<div class="col-4 pad-right">
							<span class="font-weight-600">First Name</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_fname">
						</div>
						<div class="col-4 pad-center">
							<span class="font-weight-600">Middle Name</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_mname">
						</div>
						<div class="col-4 pad-left">
							<span class="font-weight-600">Last Name</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_lname">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span class="font-weight-600">Address <!-- <label class="ml-auto"><input type="checkbox" name=""> Delivery Address?</label> --> </span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_address">
						</div>
					</div>

					<div class="row">
						<div class="col-4 pad-right">
							<span class="font-weight-600">Barangay</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_barangay">
						</div>
						<div class="col-4 pad-center">
							<span class="font-weight-600">City</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_city" data-id = "0">
						</div>
						<div class="col-4 pad-left">
							<span class="font-weight-600">Province</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_province" data-id = "0" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-4 pad-right">
							<span class="font-weight-600">Mobile</span>
							<div class="input-group">
								<div class="input-group-prepend" style="height: 31px;"  >
									<span class="input-group-text bg-white">
										+63
									</span>
								</div>
								<input type="text" class="form-control form-control-sm textbox-green border-left-0" id="user_mobile">
							</div>							
						</div>
						<div class="col-4 pad-center">
							<span class="font-weight-600">Email</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_email">
						</div>
					</div>

					<div class="row pt-5">
						<div class="col-2"></div>
						<div class="col-4">
							<button class="btn btn-orange btn-block btn-sm font-weight-600" id="save">Save</button>
						</div>
						<div class="col-4">
							<button class="btn btn-danger btn-block btn-sm font-weight-600" id="cancel">Cancel</button>
						</div>
						<div class="col-2"></div>
					</div>

				</div>
			</div>

			<!-- DIV HOME -->

		</div>

		<!-- ADS -->
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
		<!-- ADS -->
	</div>

</div>


