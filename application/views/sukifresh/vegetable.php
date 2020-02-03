<script type="text/javascript" src="<?php echo base_url('js/sukifresh/veg.js') ?>"></script>

    <div class="row mt-2">
<!--     	<div class="col-12 col-lg-3 col-md-3 col-sm-12 div-categories d-none d-md-block div-sidebar"> -->
        <div class="col-auto div-categories d-none d-md-block div-sidebar">
    		<div class="div-vegetable ">
    			<p class="text-uppercase mt-2 font-weight-600 mb-1 font-size-18">Vegetables</p>
    			<div class="row px-2">
    				<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 bg-white py-1">
    					<ul class="list-unstyled list-items">
    						<li onclick="veg(1);">Asparagus</li>
    						<li onclick="veg(2);">Beans & Peas</li>
    						<li onclick="veg(3);">Brocolli & Cauliflower</li>
    						<li onclick="veg(4);">Cabbage</li>
    						<li onclick="veg(5);">Carrots</li>
    						<li onclick="veg(6);">Celery</li>
    						<li onclick="veg(7);">Corn</li>
    						<li onclick="veg(8);">Cucumber</li>
    						<li onclick="veg(9);">Eggplant</li>
    						<li onclick="veg(10);">Lettuce</li>
    						<li onclick="veg(11);">Mushroom</li>
    						<li onclick="veg(12);">Onion & Garlic</li>
    						<li onclick="veg(13);">Potatoes</li>
    						<li onclick="veg(14);">Pepper</li>
    						<li onclick="veg(15);">Squash & Zucchini</li>
                            <li onclick="veg(16);">Tomatoes</li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
<!--     	<div class="col-12 col-lg-9 col-md-9 col-sm-12 div-product"> -->
        <div class="col-auto div-product">
    		<div class="row">
    			<div class="col-lg-12">
                    <div class="row pad-left">
                        <div class="div-header-products">
                            
                        </div>                 
                    </div>
                    <div class="row pad-left">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="row" id="div-veg">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-0">
                                <span class="font-weight-600 font-size-24">Vegetables</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                <div class="row">

                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/asparagus.png') ?>">
                                        <p class="text-black">Asparagus</p>
                                    </div>                                    
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/beans.png') ?>">
                                        <p>Beans & Peas</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/brocolli.png') ?>">
                                        <p>Brocolli & Cauliflower</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="veg(4);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage.png') ?>">
                                        <p>Cabbage</p>                                    
                                    </div>


                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/carrots.png') ?>">
                                        <p>Carrots</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/celery.png') ?>">
                                        <p>Celery</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/corn.png') ?>">
                                        <p>Corn</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cucumber.png') ?>">
                                        <p>Cucumber</p>                                    
                                    </div>


                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/eggplant.png') ?>">
                                        <p>Eggplant</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/lettuce.png') ?>">
                                        <p>Lettuce</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/mushroom.png') ?>">
                                        <p>Mushroom</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/onion.png') ?>">
                                        <p>Onion & Garlic</p>                                    
                                    </div>


                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/potatoes.png') ?>">
                                        <p>Potatoes</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/pepper.png') ?>">
                                        <p>Pepper</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/squash.png') ?>">
                                        <p>Squash & Zucchini</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/tomatoes.png') ?>">
                                        <p>Tomatoes</p>                                    
                                    </div>

                                </div>
                            </div>
                            
                        </div>

                        <div class="row" id="div-veg-prod-list">
                            
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                                <span class="font-weight-600 font-size-24">Cabbage</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                <div class="row">

                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer prod-1 div-prod-item-2"  onclick="veg_prod(4, 1)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/napa_cabbage.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name mt-2">Napa Cabbage</p>
                                        <p class="text-black prod-price">PHP 100.00/Kg</p>
                                    </div>                                    
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer prod-2 div-prod-item-2" onclick="veg_prod(4, 2)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/green_cabbage.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name mt-2">Green Cabbage</p>
                                        <p class="text-black prod-price">PHP 90.00/Kg</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green  py-2 cursor-pointer prod-3 div-prod-item-2" onclick="veg_prod(4, 3)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/red_cabbage.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name mt-2">Red Cabbage</p>
                                        <p class="text-black prod-price">PHP 90.00/Kg</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-4 div-prod-item-2"  onclick="veg_prod(4, 4)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/shredded_cabbage.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Shredded Red Cabbage</p>
                                        <p class="text-black prod-price">PHP 120.00/Kg</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row" id="div-veg-prod">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/green.png') ?>" id="img-prod" class="img-prod">
                                        <p class="font-size-30 font-weight-600 mb-0">Guaranteed Fresh</p>
                                        <p class="font-size-20">At least 5 days from delivery</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-3">
                                <div class="row">
                                    <div class="col-12 pl-2">
                                        <p class="mb-0 font-size-30 font-weight-600 mb-0" id="text-prod-name">Green Cabbage</p>
                                        <p class="font-size-24" id="text-prod-price">PHP 90.00/kg</p>
                                        <p class="font-size-24" id="text-prod-price-number" hidden>90.00</p>
                                        <p class="font-size-24" id="text-prod-veg" hidden>1</p>
                                    </div>
                                    <div class="col-12 pl-4 mb-3">
                                        <div class="row">
                                            <div class="col-12 pl-0">
                                                <span class="font-weight-600 font-size-20">Wholesale Price</span>                                        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 border-light-green pl-1 py-1">
                                                <p class="mb-0 font-size-16">25kg - 50kg</p>
                                                <p class="mb-0 font-size-16">PHP 80.00/kg</p>
                                            </div>
                                            <div class="col-4 border-light-green pl-1 py-1">
                                                <p class="mb-0 font-size-16">51kg - 75kg</p>
                                                <p class="mb-0 font-size-16">PHP 70.00/kg</p>                                                
                                            </div>
                                            <div class="col-4 border-light-green pl-1 py-1">
                                                <p class="mb-0 font-size-16">> 75kg</p>
                                                <p class="mb-0 font-size-16">PHP 60.00/kg</p>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pl-4">
                                        <div class="row bg-light-green pl-4 py-3">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-6 col-lg-5 col-md-8 col-sm-6">
                                                        <div class="row">
                                                            <div class="col-3 px-1">
                                                                <button class="btn btn-orange btn-block px-0" id="btn_minus"><i class="fas fa-minus"></i></button>
                                                            </div>
                                                            <div class="col-4 px-1">
                                                                <input type="text" class="form-control border-dark-green text-center font-size-16 px-0 py-1" id="qty" value="1">
                                                            </div>
                                                            <div class="col-3 px-1">
                                                                <button class="btn btn-orange btn-block px-0" id="btn_add"><i class="fas fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-2 pl-1">
                                                <p class="font-size-20">Total Amount : PHP <span id="text-prod-total-price">90.00</span></p>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-2 pl-1">
                                                <button class="btn btn-orange btn-block font-weight-600" id="btn_cart">Add to Cart</button>
                                                <button class="btn btn-danger btn-block font-weight-600" id="btn_back">Back</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                            
                        <div class="row" id="div-cart">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Now in Cart</h3>                                        
                                    </div>
                                    <div class="col-12 text-center">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/green.png') ?>" id="cart-img-prod" class="img-prod">
                                        <p class="font-size-30 font-weight-600 mb-0">Guaranteed Fresh</p>
                                        <p class="font-size-20">At least 5 days from delivery</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-5">
                                <div class="row">
                                    <div class="col-12 ">
                                        <p class="mb-0 font-size-30 font-weight-600 mb-0" id="cart-prod-name">Green Cabbage</p>
                                        <p class="font-size-20 mb-0">Quantity : <span id="cart-prod-qty">PHP 90.00/kg</span></p>
                                        <p class="font-size-20">Unit Price : <span id="cart-prod-price">PHP 90.00/kg</span></p>
                                        <p class="font-size-24">Total Order : <span id="cart-prod-total-price">PHP 90.00</span></p>
                                    </div>
                                    <div class="col-12 pt-2">
                                        <a href="<?php echo base_url('sukifresh/myaccount') ?>" class='text-light-green-2'>View Cart</a>
                                    </div>
                                    <div class="col-12 pl-4">
                                        <div class="row  pt-3">
                                            <div class="col-6 pt-3 pl-1">
                                                <button class="btn btn-dark-green text-white btn-block font-weight-600" id="btn_continue">Continue</button>
                                            </div>
                                            <div class="col-6 pt-3 pl-1">
                                                <button class="btn btn-orange btn-block font-weight-600" id="btn_process">Process Order</button>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-1">
                                                <button class="btn btn-danger btn-block font-weight-600 mt-2" id="btn_cancel">Cancel</button>                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        </div>

                        </div>
                    </div>

    			</div>
    		</div>
    	</div>
    </div>
