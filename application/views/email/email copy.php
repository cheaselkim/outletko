<!DOCTYPE html>
<html>
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Outletko</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/@coreui/icons/css/coreui-icons.min.css') ?>"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/flag-icon-css/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/css/eqcss.css') ?>'>

    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/font-awesome/js/all.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/pace-progress/pace.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/@coreui/coreui/dist/js/coreui.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/eqcss/element-queries.js') ?>"></script> 
    <script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('js/forgot_password.js') ?>"></script>
    <script>var base_url = '<?php echo base_url() ?>';</script>


</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-8 col-sm-10 mx-auto py-3 text-center" style="min-height: 100px; height: auto; background:white;margin-top: 250px;border-radius: 5px;">

                <a href="<?php echo base_url(); ?>"><span style="color:#759e3e;font-size: 40px;">eOutlet</span><span style="color: #fba717;font-size: 40px;" class="ml-1">Suite</span></a>

                <br><br>
                	<div class=" alert alert-success py-1" id="alert-success">
                		<label style="font-size: 20px;">Email Sent</label>
                	</div>

                	<div class=" alert alert-danger py-1" id="alert-danger">
                		<label style="font-size: 20px;">Email not Found</label>
                	</div>

				<input type="text" class="form-control" id="email" style="font-size: 20px;height: 50px;" placeholder="Email"><br>
				<button class="btn btn-block btn-primary" style="font-size: 20px;" id="reset_pass">Reset Password</button>
				<a href="<?php echo base_url(); ?>" class="btn btn-block btn-danger" style="font-size: 20px;">Cancel</a>

			</div>
		</div>
	</div>

</body>
</html>