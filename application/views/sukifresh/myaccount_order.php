<style type="text/css">
	
.img-prod-account{
	height: 60px;
}

td{
	height: 35px;
}

</style>

<script type="text/javascript" src="<?php echo base_url('js/sukifresh/myaccount_order.js') ?>"></script>

<div class="row mt-2">

	<div class="col-12 col-lg-12 col-md-12 col-sm-12">
		
<!-- 		<div class="row">
			<div class="col-12 col-lg-12 col-md-12 col-sm-12 pl-0">
				<span class="h2 text-light-green-2">My Account</span>
			</div>
		</div> -->
		<div class="row">
			<div class="col-12 col-lg-12 col-md-12 col-sm-12">
			    <div class="row mt-2">
			    	<!-- <div class="col-12 col-lg-3 col-md-3 col-sm-12 div-categories d-none d-md-block div-sidebar"> -->
			        <div class="col-auto div-categories d-none d-md-block div-sidebar">
			    		<div class="div-vegetable ">
			    			<p class="text-capitalize mt-2 font-weight-600 mb-1 font-size-20">My Account</p>
			    			<div class="row px-2">
			    				<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2 bg-white py-1">

			    					<ul class="list-unstyled list-items" id="main_menu">
			    						<li onclick="main_menu(1);">Order History</li>
			                            <li onclick="main_menu(2);">Returns</li>
			                            <li onclick="main_menu(3);">Account Details</li>
			                            <li onclick="main_menu(4);">Change Password</li>
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
			                             
			                            <div class="row" id="div-menu">
			                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(1);">
			                                    <img src="<?php echo base_url('assets/images/sukifresh/user_menu/order_history.png') ?>" class='img-menu'>
			                                    <p class="mb-0">Order History</p>                                       
			                                </div>
			                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(2);">
			                                    <img src="<?php echo base_url('assets/images/sukifresh/user_menu/sales_returns.png') ?>" class='img-menu'>
			                                    <p class="mb-0">Sales Returns</p>                                       
			                                </div>
			                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(3);">
			                                    <img src="<?php echo base_url('assets/images/sukifresh/user_menu/account_details.png') ?>" class='img-menu'>
			                                    <p class="mb-0">Account Details</p>                                       
			                                </div>
			                                <div class="col-6 col-lg-3 col-md-4 col-sm-6 border-light-green text-center div-admin-menu-list cursor-pointer" onclick="main_menu(4);">
			                                    <img src="<?php echo base_url('assets/images/sukifresh/user_menu/change_password.png') ?>" class='img-menu'>
			                                    <p class="mb-0">Change Password</p>                                       
			                                </div>

			                            </div>

			                            <div class="row" id="div-order">
			                            	<div class="col-12 col-lg-12 col-md-12 col-sm-12">

			                            		<div class="row">
			                            			<div class="col-12 col-lg-3 col-md-3 col-sm-12 pad-left-0">
			                            				<span>Date From</span>
			                            				<input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
			                            			</div>
			                            			<div class="col-12 col-lg-3 col-md-3 col-sm-12 pad-center-0">
			                            				<span>Date To</span>
			                            				<input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
			                            			</div>
			                            			<div class="col-12 col-lg-3 col-md-3 col-sm-12 pad-right-0">
			                            				<span>Status</span>
			                            				<select class="form-control">
			                            					<option></option>
			                            					<option></option>
			                            					<option></option>
			                            				</select>
			                            			</div>
			                            			<div class="col-12 col-lg-2 col-md-3 col-sm-12 ml-auto text-right pt-3 pad-right-0">
			                            				<button class="btn btn-warning mt-2" id="btn-order-back">Back</button>
			                            			</div>
			                            		</div>

			                            		<div class="row">
			                            			<div class="col-12 px-0">
				                            			<hr style="border-top: 10px solid rgb(195, 214, 155)" class="mt-2">		                            				
			                            			</div>
			                            		</div>

			                            		<div class="row">
			                            			<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
			                            				<table class="table table-bordered table-striped table-sm">
			                            					<thead>
			                            						<tr>
			                            							<th class="text-center">Order No</th>
			                            							<th class="text-center">Order Date</th>
			                            							<th class="text-center">Delivery Date</th>
			                            							<th class="text-center">Status</th>
			                            							<th class="text-center">Total Amount</th>
			                            						</tr>
			                            					</thead>
			                            					<tbody>
			                            						<tr>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            						</tr>
			                            						<tr>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            						</tr>
			                            						<tr>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            						</tr>
			                            						<tr>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            							<td></td>
			                            						</tr>
			                            					</tbody>
			                            				</table>
			                            			</div>
			                            		</div>

			                            	</div>
			                            </div>

			                            <div class="row" id="div-sales">
			                            	<div class="col-12 col-lg-12 col-md-12 col-sm-12">

			                            		<div class="row">
			                            			<div class="col-12 col-lg-6 col-md-6 col-sm-12 pad-left-0">
			                            				<span>Product</span>
			                            				<input type="text" class="form-control">
			                            			</div>
			                            			<div class="col-12 col-lg-2 col-md-2 col-sm-12 pad-center-0">
			                            				<span>Qty to Return</span>
			                            				<input type="text" class="form-control">
			                            			</div>
			                            			<div class="col-12 col-lg-1 col-md-1 col-sm-12 pad-right-0">
			                            				<span>Unit</span>
			                            				<input type="text" class="form-control">
			                            			</div>
			                            			<div class="col-12 col-lg-3 col-md-3 col-sm-12 ml-auto text-right pt-3 pad-right-0">
			                            				<button class="btn btn-success mt-2" id="btn-sales-back" data-toggle="modal" data-target="#modal_sales_returns">Select Product</button>
			                            			</div>
			                            		</div>

			                            		<div class="row mt-2">
			                            			<div class="col-12 col-lg-6 col-md-6 col-sm-12">
			                            				
			                            			</div>
			                            			<div class="col-4 col-lg-3 col-md-3 col-sm-12 pad-center-0">
			                            				<button class="btn btn-warning btn-block">Enter</button>
			                            			</div>
			                            		</div>

			                            		<div class="row">
			                            			<div class="col-12 px-0">
				                            			<hr style="border-top: 10px solid rgb(195, 214, 155)" class="mt-2">		                            				
			                            			</div>
			                            		</div>

			                            		<div class="row">
			                            			<div class="col-12 col-lg-2 col-md-2 col-sm-12 px-0 ml-auto text-right">
			                            				<button class="btn btn-light-green-2 btn-block">Submit</button>
			                            			</div>
			                            		</div>

			                            		<div class="row">
			                            			<div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0 py-3">
			                            				<span class="text-light-gray font-size-24">No Entry to Return</span>
			                            			</div>
			                            		</div>

			                            	</div>
			                            </div>

			                            <div class="row" id="div-account">
			                            	<div class="row">
			                            		<div class="col-12 col-lg-10 col-md-12 col-sm-12">

			                            			<div class="row">
			                            				<div class="col-4 pr-1">
			                            					<span>Last Name</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            				<div class="col-4 px-1">
			                            					<span>First Name</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            				<div class="col-4 pl-1">
			                            					<span>Middle Name</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-12 col-lg-12 col-md-12 col-sm-12">
			                            					<span>Business Name</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-12 col-lg-12 col-md-12 col-sm-12">
			                            					<span>Address</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-6 pr-1">
			                            					<span>Barangay</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            				<div class="col-6 pl-1">
			                            					<span>Town/City</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-6 pr-1">
			                            					<span>Province</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            				<div class="col-6 pl-1">
			                            					<span>Zip Code</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-6 pr-1">
			                            					<span>Country</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            				<div class="col-6 pl-1">
			                            					<span>Credit Limit</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-6 pr-1">
			                            					<span>Mobile No</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            				<div class="col-6 pl-1">
			                            					<span>Account Type</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            			<div class="row">
			                            				<div class="col-6 pr-1">
			                            					<span>Email</span>
			                            					<input type="text" class="form-control">
			                            				</div>
			                            			</div>

			                            		</div>
		                            			<div class="col-12 col-lg-2 col-md-12 col-sm-12 ml-auto text-right pt-3 ">
		                            				<button class="btn btn-success mt-2 px-4" id="btn-order-back">Edit</button>
		                            			</div>
			                            	</div>
			                            </div>

			                            <div class="row" id="div-password">
			                            	<div class="col-12 col-lg-5 col-md-8 col-sm-12">
			                            		<div class="row">
			                            			<div class="col-12 py-1">
			                            				<input type="password" class="form-control" placeholder="Current Password">
			                            			</div>
			                            			<div class="col-12 py-1">
			                            				<input type="password" class="form-control" placeholder="New Password">
			                            			</div>
			                            			<div class="col-12 py-1">
			                            				<input type="password" class="form-control" placeholder="Confirm Password">
			                            			</div>
			                            			<div class="col-12 py-1">
			                            				<button class="btn btn-orange btn-block">Save</button>
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


	</div>

</div>

<!-- The Modal -->
<div class="modal" id="modal_sales_returns">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header py-1">
				<h4 class="modal-title">Products</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body py-1">
				<table class="table table-sm mb-0">
					<tbody>
						<tr class="cursor-pointer">
							<td><img src="<?php echo base_url('assets/images/sukifresh/veg/cabbage/green.png') ?>" style="height:50px;"> <span class="font-size-18 mt-1">Green Cabbage</span></td>
						</tr>
						<tr class="cursor-pointer">
							<td><img src="<?php echo base_url('assets/images/sukifresh/fruits/melons/watermelon.png') ?>" style="height:50px;"> <span class="font-size-18 mt-1">Fresh Watermelon Whole</span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer py-1">
				<button class="btn btn-light-green-2">Select</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>

		</div>
	</div>
</div>