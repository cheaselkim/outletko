    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">

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
				<a class="nav-link font-small cursor-pointer" data-toggle="modal" data-target="#modal_signup"><span class=" text-white">Register your Store</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link font-small cursor-pointer" data-toggle="modal" data-target="#modal_signup_user"><span class=" text-white">Store owner login</span></a>				
			</li>    
			<li class="nav-item">
				<a class="nav-link font-small cursor-pointer" data-toggle="modal" data-target="#modal_login"><span class="text-white">eOutlet<span class="text-yellow">Suite</span> </span></a>				
			</li>    
		</ul>
	</div>  
</nav>

<!-- END NAVBAR -->

<!-- SEARCH -->
<div class="container pt-2 ">
	<div class="row">
		<div class="col-12 col-md-11 col-lg-12 mx-auto px-0">

			<?php echo form_open('Search/Search'); ?>
			<!-- <form action="<?php echo site_url('search') ?>" method="GET"> -->
				<div class="row">
					<div class="col-12 col-md-6 col-lg-5 pad-right">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
							</div>
							<input type="text" class="form-control textbox-orange border-left-0 pl-1" name="product_outlet" id="searchbox" aria-describedby="basic-addon1">
							<input type="hidden" name="city_id" value="">
                            <input type="hidden" name="prov_id" value="">
						</div>
					</div>

					<div class="col-12 col-md-4 col-lg-2 pad-center">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
							</div>
							<input type="text" class="form-control textbox-orange border-left-0 pl-1" name="location" id="location" placeholder="Metro Manila" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>

					<div class="col-12 col-md-2 col-lg-2 pad-left">
						<button class="btn btn-block btn-warning font-small font-weight-600" type="submit">Search</button>
					</div>
				</div>
			<!-- </form> -->
			<?php echo form_close(); ?>               



		</div>
		
	</div>
</div>
<!-- END SEARCH -->