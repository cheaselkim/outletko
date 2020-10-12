<link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<nav class="navbar navbar-expand-md " style="height: 40px;background: #006600;">
	<a class="navbar-brand font-small font-weight-bold" href="<?php echo base_url() ?>" id="search-header-title"><span class="text-white">Outlet</span><span class="text-yellow">ko</span></a>
    <a href="<?php echo base_url('my-order')?>"><span class='nav-link font-small text-yellow d-block d-sm-none' style="color: yellow;">Cart: PHP <span id="total-cart-2"><?php echo number_format($this->session->userdata('cart_total'), 2); ?></span> </span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="margin-top: -5%;border:1px solid orange;">
        <span class="fas fa-bars text-orange" style="font-size: 25px;"></span>
	</button>
	<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">

		<ul class="navbar-nav">
			<li class="nav-item" hidden>
				<a class="nav-link font-small" href="#"><span class="text-white font-bahaus-93">Outletko</span></a>
			</li>
			<li class="nav-item" hidden>
				<a class="nav-link font-small cursor-pointer" data-toggle="modal" data-target="#modal_signup"><span class=" text-white">Register your Store</span></a>
			</li>
            <?php if ($this->session->userdata("user_type") != "1"){?>
            <li class="nav-item d-none d-sm-block">
                <span class='nav-link font-small text-yellow' style="color: yellow;">Cart Total : PHP <span id="total-cart"><?php echo number_format($this->session->userdata('cart_total'), 2); ?></span> </span>
            </li>
			<li class="nav-item">
				<a class="nav-link font-small cursor-pointer" href="<?php echo base_url('/my-order') ?>"><span class="text-uppercase text-white">My Orders <span class="badge badge-light" id="order_no">
					<?php 
						if (!empty($this->session->userdata("order_no"))){
							echo $this->session->userdata("order_no");
						}else{
							echo 0;
						}
					 ?>					
				</span></span></a>
			</li>
			<li class="nav-item">
              <button class="btn btn-block btn-transparent d-none d-md-block" id="btn_mod_signin" data-toggle="modal" data-target="#modal_signup_user"><i class="fas fa-sign-in-alt text-white"></i> <span class="text-white">Sign in</span></button>
              <a class="btn btn-block btn-transparent d-block d-sm-none text-left pl-0" href="<?php echo base_url('login')?>"><i class="fas fa-sign-in-alt text-white"></i> <span class="text-white">Sign in</span></a>
			</li>    
			<li class="nav-item" hidden>
                  <button class="btn btn-block btn-transparent bd-orange" id="btn_mod_signup" data-toggle='modal' data-target="#modal_signup"><i class="fas fa-store text-white"></i> <span class="text-white">Register</span></button>
			</li>    
            <?php }?>
		</ul>
	</div>  
</nav>

<!-- END NAVBAR -->

<!-- SEARCH -->
<div class="container pt-2 ">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12 mx-auto div-search-bar">

			<form action="<?php echo site_url('Search/query') ?>" method="GET">
				<div class="row  ">
					<div class="col-12 col-md-10 col-lg-6 pad-center pt-1">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
							</div>
							<input type="text" class="form-control textbox-orange border-left-0 pl-1" name="product_outlet" id="searchbox" aria-describedby="basic-addon1" style="border-top-right-radius: .35rem; border-bottom-right-radius: .35rem;">
							<!-- <input type="hidden" name="city_id" value="">
                            <input type="hidden" name="prov_id" value=""> -->
						</div>
					</div>

					<div class="col-12 col-md-4 col-lg-2 pad-center" hidden>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
							</div>
							<input type="text" class="form-control textbox-orange border-left-0 pl-1" name="location" id="location" placeholder="Metro Manila" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>

					<div class="col-12 col-md-2 col-lg-2 pad-left pt-1">
						<button class="btn btn-block btn-warning font-small font-weight-600" type="submit">Search</button>
					</div>
				</div>
			 </form> 
			<!--<?php echo form_close(); ?>-->               



		</div>
		
	</div>
</div>
<!-- END SEARCH -->