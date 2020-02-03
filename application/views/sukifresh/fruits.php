<script type="text/javascript" src="<?php echo base_url('js/sukifresh/fruits.js') ?>"></script>

    <div class="row mt-2">
<!--         <div class="col-12 col-lg-3 col-md-3 col-sm-12 div-categories d-none d-md-block div-sidebar"> -->
        <div class="col-auto div-categories d-none d-md-block div-sidebar">
    		<div class="div-fruits-container">
    			<p class="text-uppercase mt-2 font-weight-600 mb-1 font-size-18">Fruits</p>
    			<div class="row px-2">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 bg-white py-1">
    					<ul class="list-unstyled list-items">
    						<li>Apples</li>
    						<li>Avocados</li>
    						<li>Bananas</li>
    						<li>Berries & Cherries</li>
    						<li>Citrus</li>
    						<li>Melons</li>
    						<li>Pears</li>
    						<li>Tropical</li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
<!--         <div class="col-12 col-lg-9 col-md-9 col-sm-12 div-product"> -->
        <div class="col-auto div-product">
    		<div class="row">
    			<div class="col-lg-12">
                    <div class="row pad-left">
                        <div class="div-header-fruits">
                            
                        </div>                 
                    </div>
                    <div class="row pl-3">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="row" id="div-fruits">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-0">
                                <span class="font-weight-600 font-size-24">Fruits</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                <div class="row">

                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(1);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/apples.png') ?>">
                                        <p class="text-black">Apples</p>
                                    </div>                                    
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(2);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/avocados.png') ?>">
                                        <p>Avocados</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(3);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/bananas.png') ?>">
                                        <p>Bananas</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(4);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/berries.png') ?>">
                                        <p>Berries & Cherries</p>                                    
                                    </div>


                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(5);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/citrus.png') ?>">
                                        <p>Citrus</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(6);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons.png') ?>">
                                        <p>Melons</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(7);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/pears.png') ?>">
                                        <p>Pears</p>                                    
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer div-prod-item" onclick="fruit(8);">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/tropical.png') ?>">
                                        <p>Tropical</p>                                    
                                    </div>

                                </div>
                            </div>
                            
                        </div>

                        <div class="row" id="div-fruits-prod-list">
                            
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                                <span class="font-weight-600 font-size-24">Melons</span>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                <div class="row">

                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-1 div-prod-item-2"  onclick="fruit_prod(6, 1)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/watermelon.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Fresh Watermelon Whole</p>
                                        <p class="text-black prod-price">PHP 120.00/kg</p>
                                    </div>                                    
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-2 div-prod-item-2" onclick="fruit_prod(6, 2)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/honeydew.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Honeydew Lemon Whole</p>
                                        <p class="text-black prod-price">PHP 90.00/kg</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-3 div-prod-item-2" onclick="fruit_prod(6, 3)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/cantaloupe.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name mt-2">Cantaloupe Whole</p>
                                        <p class="text-black prod-price">PHP 90.00/kg</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-4 div-prod-item-2"  onclick="fruit_prod(6, 4)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/sharlyn.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name mt-2">Sharlyn Melon Whole</p>
                                        <p class="text-black prod-price">PHP 80.00/kg</p>
                                    </div>

                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-5 div-prod-item-2"  onclick="fruit_prod(6, 5)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/seedless.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Seedless Watermelon Chunkz, 10oz</p>
                                        <p class="text-black prod-price">PHP 0.00/each</p>
                                    </div>                                    
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-6 div-prod-item-2" onclick="fruit_prod(6, 6)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/chunks.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Cantaloupe Chunks, 10oz</p>
                                        <p class="text-black prod-price">PHP 0.00/each</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-7 div-prod-item-2" onclick="fruit_prod(6, 7)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/spears.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Cantaloupe Spears, 16oz</p>
                                        <p class="text-black prod-price">PHP 0.00/each</p>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center border-light-green py-2 cursor-pointer prod-8 div-prod-item-2"  onclick="fruit_prod(6, 8)">
                                        <img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/medley.png') ?>">
                                        <p class="text-dark-green2 mb-0 prod-name">Melon Medley Chunks, 32oz</p>
                                        <p class="text-black prod-price">PHP 0.00/each</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row" id="div-fruits-prod">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/green.png') ?>" id="img-prod" class="img-prod-fruit">
                                        <p class="font-size-30 font-weight-600 mb-0">Guaranteed Fresh</p>
                                        <p class="font-size-20">At least 5 days from delivery</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-5">
                                <div class="row">
                                    <div class="col-12 ">
                                        <p class="mb-0 font-size-30 font-weight-600 mb-0" id="text-prod-name">Green Cabbage</p>
                                        <p class="font-size-24" id="text-prod-price">PHP 90.00/kg</p>
                                        <p class="font-size-24" id="text-prod-price-number" hidden>90.00</p>
                                        <p class="font-size-24" id="text-prod-fruit" hidden>1</p>
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
                                        <img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/green.png') ?>" id="cart-img-prod" class="cart-img-prod-fruit">
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
                                        <div class="row pt-3">
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
