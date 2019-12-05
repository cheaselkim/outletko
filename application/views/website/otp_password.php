<!DOCTYPE html>
<html>
<head>
	<title>eOutletSuite</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/clockpicker/clockpicker.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/css/eqcss.css') ?>'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">

    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/font-awesome/js/all.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/@coreui/coreui/dist/js/coreui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/forgot_password.js') ?>"></script>
    <script>var base_url = '<?php echo base_url() ?>';</script>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

    <style type="text/css">
    	
    	.form-control, .input-group-text{
    		border-radius: 0 !important;
    		height: 35px !important;
    		border: 1px solid green;
    	}

    </style>

</head>
<body style="background-color: white;">

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 mx-auto py-3 px-4" style="background: white;margin-top: 100px;">
				
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

				<div class="row pt-2" style="background-color: #e5e5e5;">

					<div class="col-lg-12 col-md-12 col-sm-12 text-center mb-3" style="line-height: 25px;font-size: 16px;">
						<span>it's a good idea to use a strong password that you're not using elsewhere.</span><br>
						<span>(Password should be minimum of 6 characters)</span>
					</div>

					<div class="col-lg-8 col-md-12 col-sm-12 mx-auto">
						<div class="form-horizontal">

							<div class="form-group row mb-1">
								<label class="control-label col-sm-5 text-right pl-0" style="font-size: 16px;">Enter New Password</label>
								<div class="col-sm-7 pl-0">
									<div class="input-group" >
										<input type="password" class="form-control" id="new_pass">
											<div class="input-group-append">
												<button class="input-group-text" id="new_pass_eye" ><i class="fas fa-eye-slash" id="new_pass_icon"></i></button>
											</div>
									</div>														
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-sm-5 pl-0 text-right" style="font-size: 16px;">Re-type new Password</label>
								<div class="col-sm-7 pl-0">
									<div class="input-group ">
										<input type="password" class="form-control" id="conf_pass">
											<div class="input-group-append">
												<button class="input-group-text" id="conf_pass_eye"><i class="fas fa-eye-slash" id="conf_pass_icon"></i></button>
											</div>
									</div>														
								</div>
							</div>

							<div class="form-group row pt-2 pl-4">
								<div class=" col-sm-8 ml-auto pl-4">
									<button class="btn btn-success btn-block py-0" id="save" style="font-size: 16px;height: 35px;">Save Changes</button>								
								</div>
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

