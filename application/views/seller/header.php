<!--     <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/outletko/profile.css') ?>"> -->

<script type="text/javascript" src="<?php echo base_url('js/outletko/seller/header.js') ?>"></script>
<!-- NAVRBAR -->
<nav class="navbar navbar-expand-md " style="height: 40px;background: rgb(79, 98, 40);">
	<a class="navbar-brand font-small" href="<?php echo base_url() ?>"><span class="text-white">Outlet</span><span class="text-yellow">Ko</span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">

		<ul class="navbar-nav">
			<li class="nav-item" hidden>
				<a class="nav-link font-small" href="#"><span class="span-eprocurement">Outlet</span><span class="text-red">Ko</span></a>
			</li>
			<li class="nav-item">
<!-- 				<a class="nav-link font-small" href="#"><span class="span-eprocurement">eOutlet</span><span class="span-suite">Suite</span></a> -->
				<a class="nav-link font-small cursor-pointer" data-toggle="modal" data-target="#modal_myorders"><span class="text-uppercase text-white">My Orders </span> <span class="badge badge-light" id="order_no">
					<?php 
						if (!empty($this->session->userdata("order_no"))){
							echo $this->session->userdata("order_no");
						}else{
							echo 0;
						}
					 ?>					
				</span></span></a></a>
			</li>
			<li class="nav-item">
<!--  				<a class="nav-link font-small cursor-pointer" id="a_account"><span class="text-uppercase text-white">Account</span></a> -->
				<div class="dropdown">
					<a class="nav-link font-small cursor-pointer text-uppercase text-white dropdown-toggle" data-toggle="dropdown">
						My Account
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item py-0 cursor-pointer" id="user_settings" data-toggle="modal" data-target="#modal-setting">Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item py-0" href="<?php echo base_url('/logout') ?>">Logout</a>
					</div>
				</div>

<!--  				<a class="nav-link font-small" href="<?php echo base_url('/logout') ?>"><span class="text-uppercase text-white">Logout</span></a>  -->
			</li>    
		</ul>
	</div>  
</nav>

<!-- END NAVBAR -->

<!-- SEARCH -->
<div class="container pt-2 " hidden>
	<div class="row">
		<div class="col-12 col-md-12 px-0">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-5 pad-right">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
						</div>
						<input type="text" class="form-control textbox-orange border-left-0 pl-1" id="searchbox" aria-describedby="basic-addon1">
					</div>
				</div>

				<div class="col-12 col-md-3 col-lg-2 pad-center">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
						</div>
						<input type="text" class="form-control textbox-orange border-left-0 pl-1" id="location" placeholder="Metro Manila" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>

				<div class="col-12 col-md-2 col-lg-2 pad-left">
					<button class="btn btn-block btn-warning font-small font-weight-600">Search</button>
				</div>
			</div>
		</div>
		
	</div>
</div>
<!-- END SEARCH -->