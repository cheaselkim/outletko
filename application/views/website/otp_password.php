<!DOCTYPE html>
<html>
<head>
	<title>Outletko</title>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163137526-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-163137526-1');
    </script>


    <link rel="icon" href="assets/img/logo-13.png" type="image/png" sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll_words.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">

    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"; </script>

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
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
							<small>You will redirect to your page in <span id="time">05</span> secs..</small>
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

<input type="hidden" id="user_type" value="<?php echo $this->session->userdata('user_type'); ?>">
</body>
</html>

