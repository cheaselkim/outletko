<script type="text/javascript" src="<?php echo base_url('js/sukifresh/admin.js') ?>"></script>

    <div class="row mt-2">
    	<!-- <div class="col-12 col-lg-3 col-md-3 col-sm-12 div-categories d-none d-md-block div-sidebar"> -->
        <div class="col-auto div-categories d-none d-md-block div-sidebar">
    		<div class="div-vegetable ">
    			<p class="text-uppercase mt-2 font-weight-600 mb-1 font-size-18">Menu</p>
    			<div class="row px-2">
    				<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 bg-white py-1">

    					<ul class="list-unstyled list-items" id="main_menu">
    						<li onclick="main_menu(1);">Sales Admin</li>
                            <li onclick="main_menu(2);">Inventory</li>
                            <li onclick="main_menu(3);">Sales Returns</li>
                            <li onclick="main_menu(4);">Delivery</li>
                            <li onclick="main_menu(5);">Sales Force</li>
                            <li onclick="main_menu(6);">Master Data</li>
                            <li onclick="main_menu(7)">EIS</li>
                            <li onclick="main_menu(8);">System Admin</li>
    					</ul>

                        <ul class="list-unstyled list-items" id="sales_menu">
                            <li onclick="menu(1,1);">Sales Orders</li>
                            <li onclick="menu(1,2);">Delivery Receipt</li>
                            <li onclick="menu(1,3);">Credit Application</li>
                            <li onclick="menu(1,4);">Queries & Reports</li>
                        </ul>

                        <ul class="list-unstyled list-items" id="master_data_menu">
                            <li onclick="menu(1,1);">Customer</li>
                            <li onclick="menu(1,2);">Product</li>
                            <li onclick="menu(1,3);">Customer Type</li>
                            <li onclick="menu(1,4);">Discount</li>
                            <li onclick="menu(1,5);">Supplier</li>
                            <li onclick="menu(1,6);">Payment Type</li>
                            <li onclick="menu(1,7);">Payment Terms</li>
                            <li onclick="menu(1,8);">Queries & Reports</li>
                        </ul>

    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- <div class="col-12 col-lg-9 col-md-9 col-sm-12 div-product"> -->
        <div class="col-auto div-product">
    		<div class="row">
    			<div class="col-lg-12">
                    <div class="row pad-left" hidden>
                        <div class="div-header-products">
                            
                        </div>                 
                    </div>
                    <div class="row pad-left">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-main-admin">
                             
                            <div class="row" id="div-main-menu">
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(1);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales_admin.png') ?>" class='img-menu'>
                                    <p class="mb-0">Sales Admin</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(2);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/inventory.png') ?>" class='img-menu'>
                                    <p class="mb-0">Inventory</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(3);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales_returns.png') ?>" class='img-menu'>
                                    <p class="mb-0">Sales Returns</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(4);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/delivery.png') ?>" class='img-menu'>
                                    <p class="mb-0">Delivery</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(5);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales_force.png') ?>" class='img-menu'>
                                    <p class="mb-0">Sales Force</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(6);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data.png') ?>" class='img-menu'>
                                    <p class="mb-0">Master Data</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(7);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/eis.png') ?>" class='img-menu'>
                                    <p class="mb-0">EIS</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(8;">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/system_admin.png') ?>" class='img-menu'>
                                    <p class="mb-0">System Admin</p>                                       
                                </div>
                            </div>

                            <div class="row" id="div-sales-menu">
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,2);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales/sales_orders.png') ?>" class='img-menu'>
                                    <p class="mb-0">Sales Orders</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,2);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales/delivery_receipt.png') ?>" class='img-menu'>
                                    <p class="mb-0">Delivery Receipt</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,3);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales/credit_application.png') ?>" class='img-menu'>
                                    <p class="mb-0">Credit Application</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,4);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/sales/queries.png') ?>" class='img-menu'>
                                    <p class="mb-0">Queries & Reports</p>                                       
                                </div>
                            </div>

                            <div class="row" id="div-master-data-menu">
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,2);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/customer.png') ?>" class='img-menu'>
                                    <p class="mb-0">Customer</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,2);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/product.png') ?>" class='img-menu'>
                                    <p class="mb-0">Product</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,3);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/customer_type.png') ?>" class='img-menu'>
                                    <p class="mb-0">Customer Type</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,4);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/discount.png') ?>" class='img-menu'>
                                    <p class="mb-0">Discount</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,5);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/supplier.png') ?>" class='img-menu'>
                                    <p class="mb-0">Supplier</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,6);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/payment_type.png') ?>" class='img-menu'>
                                    <p class="mb-0">Payment Type </p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,7);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/payment_terms.png') ?>" class='img-menu'>
                                    <p class="mb-0">Payment Terms</p>                                       
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="menu(1,8);">
                                    <img src="<?php echo base_url('assets/images/sukifresh/menu/master_data/queries.png') ?>" class='img-menu'>
                                    <p class="mb-0">Queries & Reports</p>                                       
                                </div>
                            </div>



                        </div>
                    </div>

    			</div>
    		</div>
    	</div>
    </div>
