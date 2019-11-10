<!DOCTYPE html>
<html>
<head>
	<title>eOutletSuite</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/css/eqcss.css') ?>'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">


    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/font-awesome/js/all.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/@coreui/coreui/dist/js/coreui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/forgot_password.js') ?>"></script>
    <script>var base_url = '<?php echo base_url() ?>';</script>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

    <style type="text/css">
    	
    	.form-control, .input-group-text{
    		border-radius: 0 !important;
    		height: 35px !important;
    		border: 1px solid green;
    	}

    	.error{
    		border: 1px solid red;
    	}

    </style>

</head>
<body style="background-color: white;">

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12 mx-auto py-3 px-2" style="background: white;margin-top: 100px;">

				<div class="row" style="height: auto;border: 1px solid gray;">
					<div class="col-lg-12 col-md-12 col-sm-12">
				        <span  style="font-weight: normal;font-size: 30px;"><span style="color: green;">Outlet</span><span style="color: #ffae42;">ko</span><span style="color: green;">.com</span></span><br>						
					</div>
				</div>
				
				<div class="row text-center" style="background-color: rgb(119, 147, 60);min-height: 70px;height: auto;border: 1px solid gray;">
					<div class="col-lg-12 col-md-12 col-sm-12 px-5 text-center" style="color: white; font-size: 20px;">
						<span>You are required to change your password and supply other information</span>
						
					</div>
				</div>

				<div class="row text-center" style="background-color: #ffbd44;min-height: 70px;height: auto;">
					<h3 class="text-white mx-auto mt-3">You are required to enter new password.</h3>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="alert alert-danger" id="alert-danger">
							<span>Password does not match.</span>
						</div>
						<div class="alert alert-success" id="alert-success">
							<span>Your password has been changed successfully! Thank you</span><br>
							<small>You will redirect to login page in <span id="time">04</span> secs..</small>
						</div>
					</div>
				</div>


				<div class="row pt-2" style="background-color: #e5e5e5;border: 1px solid gray;">

					<div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
						<div class="form-horizontal">

							<div class="form-group row mb-1">
<!-- 								<label class="control-label col-sm-5 text-right pl-0" style="font-size: 16px;">Enter New Password</label> -->
								<div class="col-sm-12 ">
									<div class="input-group" >
										<input type="password" class="form-control" id="new_pass" placeholder="New Password">
											<div class="input-group-append">
												<button class="input-group-text" id="new_pass_eye" ><i class="fas fa-eye-slash" id="new_pass_icon"></i></button>
											</div>
									</div>														
								</div>
							</div>

							<div class="form-group row mb-1">
<!-- 								<label class="control-label col-sm-5 pl-0 text-right" style="font-size: 16px;">Re-type new Password</label> -->
								<div class="col-sm-12">
									<div class="input-group ">
										<input type="password" class="form-control" id="conf_pass" placeholder="Re-type New Password">
											<div class="input-group-append">
												<button class="input-group-text" id="conf_pass_eye"><i class="fas fa-eye-slash" id="conf_pass_icon"></i></button>
											</div>
									</div>														
								</div>
							</div>

<!-- 							<div class="form-group row pt-2 pl-4">
								<div class=" col-sm-8 ml-auto pl-4">
									<button class="btn btn-success btn-block py-0" id="save" style="font-size: 16px;height: 35px;">Save Changes</button>								
								</div>
							</div> -->
							
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
						<hr style="border-top: 1px solid rgba(0, 0, 0, 0.5)" class="my-2">
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 mb-1">
								<input type="text" class="form-control text-uppercase" placeholder="What is the Name of your Business?" id="bus_name">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 mb-1">
								<input type="text" class="form-control" placeholder="What is the Address of your Business?" id="bus_address">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 mb-1">
								<input type="text" class="form-control" placeholder="City, Province" id="bus_city">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 mb-1">
								<select class="form-control" id="vat">
									<option selected disabled>Is your business Non Vat or With Vat? </option>
									<option value="1">VAT</option>
									<option value="0">Non Vat</option>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">+63</span>
									</div>
									<input type="text" class="form-control" placeholder="Mobile No" id="mobile_no">
								</div>
							</div>
							<div class="col-lg-4 mx-auto my-4">
								<button class="btn btn-success btn-block" id="save2">Save Changes</button>
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>
	</div>

	<script type="text/javascript">
		

	</script>

</body>
</html>

