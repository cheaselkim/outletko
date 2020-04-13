<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/user.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/my_order.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/ecommerce/buyer/my_account.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="seller_id" value="0">

<div class="container pt-3 pb-4">
	<div class="row">

		<div class="col-12 col-sm-12 col-md-10 col-lg-10">

			<!-- DIV HOME -->
			<div class="row" id="div-home">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 div-body pt-4 pb-5">

					<div class="row">
						<div class="col-12 col-lg-4 col-md-6 col-sm-12">
							<span class="font-weight-600">Username</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_uname" value="<?php echo $this->session->userdata('user_uname') ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-4 col-md-6 col-sm-12">
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
						<div class="col-12 col-lg-4 col-md-6 col-sm-12">
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
						<div class="col-12 col-lg-4 col-md-6 col-sm-12">
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
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-right">
							<span class="font-weight-600">First Name</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_fname">
						</div>
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-center">
							<span class="font-weight-600">Middle Name</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_mname">
						</div>
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-left">
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
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-right">
							<span class="font-weight-600">Barangay</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_barangay">
						</div>
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-center">
							<span class="font-weight-600">City</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_city" data-id = "0">
						</div>
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-left">
							<span class="font-weight-600">Province</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_province" data-id = "0" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-right">
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
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pad-center">
							<span class="font-weight-600">Email</span>
							<input type="text"  class="form-control form-control-sm textbox-green" id="user_email">
						</div>
					</div>

					<div class="row pt-3">
						<div class="col-2"></div>
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pt-2">
							<button class="btn btn-orange btn-block btn-sm font-weight-600" id="save">Save</button>
						</div>
						<div class="col-12 col-lg-4 col-md-4 col-sm-12 pt-2">
							<a href="<?php echo base_url('my-order')?>"><button class="btn btn-danger btn-block btn-sm font-weight-600" id="cancel">Cancel</button></a>
						</div>
						<div class="col-2"></div>
					</div>

				</div>
			</div>

			<!-- DIV HOME -->

		</div>

		<!-- ADS -->
		<div class="col-2 col-sm-12 col-md-2 col-lg-2 pr-0 pl-1" hidden>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 " >
					<div class="div-ads px-2 pt-2">
						<span class="text-green">Ads Space</span>

						<!-- ADS IMAGES -->
						<div class="row">




						</div>
						<!-- END ADS IMAGES -->

					</div>
				</div>
			</div>
		</div>
		<!-- ADS -->
	</div>

</div>


