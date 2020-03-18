
<script type="text/javascript" src="<?php echo base_url() ?>js/application/users/subscription.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/store_register.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/login4.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css')?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="total_amount" value="0">
<input type="hidden" id="active-outlet">

<div class="container-fluid pt-2" id="account_query">
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Outletko.com Subscription Renewal</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">
        
        <div class="row pt-2" id="div-info">
            <div class="col-12 col-lg-9 col-md-12 col-sm-12">

                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>First Name</span>
                        <input type="text" class="form-control" id="info-fname">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Last Name</span>
                        <input type="text" class="form-control" id="info-lname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Business Name</span>
                        <input type="text" class="form-control" id="info-business-name">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Business Category</span>
                        <select class="form-control" id="info-business-category"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Registration Date</span>
                        <input type="date" class="form-control" id="info-registration-date">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Renewal Date</span>
                        <input type="date" class="form-control" id="info-renewal-date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Partner </span>
                        <input type="text" class="form-control" id="info-partner">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <span>Plan</span>
                        <input type="text" class="form-control" id="info-plan">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 co-lg-12 col-md-12 col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <button class="btn btn-success btn-block" id="btn-next-info">Continue</button>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <button class="btn btn-orange btn-block" >Cancel</button>
                    </div>
                </div>


            </div>
        </div>

        <div class="row pt-2" id="div-plan">
            <div class="container-fluid px-0">
                <input type="hidden" class="form-control" id="plan-type">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-plan-header">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white div-plan-font-header">
                                <span class="font-header">Start using Outletko.com </span><br>
                                <span class="font-header">in your business</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white">
                                <span class="font-subheader">Choose Payment Plan for your outletko.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row pt-2">
                            <div class="col-12 col-lg-3 col-md-6 col-sm-12 px-0 mt-2">
                                <div class="mx-auto text-center div-plan-d div-plan" id="div-plan-b">
                                    <p class="font-size-25 font-weight-600 mb-0">Plan A : Annually</p>
                                    <span class="font-size-36 font-weight-600">PHP 9,500.00</span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan" id="btn-plan-d" value="1"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 col-sm-12 px-0 mt-2">
                                <div class="mx-auto text-center div-plan-c div-plan" id="div-plan-c">
                                    <p class="font-size-25 font-weight-600 mb-0">Plan B : Semi - Annual</p>
                                    <span class="font-size-36 font-weight-600">PHP 5,200.00</span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan" id="btn-plan-c" value="2"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 col-sm-12 px-0 mt-2">
                                <div class="mx-auto text-center div-plan-b div-plan" id="div-plan-b">
                                    <p class="font-size-25 font-weight-600 mb-0">Plan C : Quarterly</p>
                                    <span class="font-size-36 font-weight-600">PHP 2,875.00</span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan" id="btn-plan-b" value="3"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 col-sm-12 px-0 mt-2">
                                <div class="mx-auto text-center div-plan-a div-plan" id="div-plan-a">
                                    <p class="font-size-25 font-weight-600 mb-0">Plan D : Monthly</p>
                                    <span class="font-size-36 font-weight-600">PHP 995.00</span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan" id="btn-plan-a" value="4"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3">
                                <span class="font-size-20 font-weight-500">Plans are for Three (3) Outlets or Branches Only</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>

        <div class="row" id="div-cart">
            <div class="container-fluid px-0" >
            <input type="hidden" id="plan-price">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-cart-header">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white div-cart-font-header">
                                <span class="font-header">Outletko.com for your business </span><br>
                                <span class="font-header">is just a few clicks away</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row navbar w-100">
                            <div class="col-12 col-lg-8 col-md-12 col-sm-12 table-responsive pt-3 d-none d-md-block" >
                                <table class="table border-green table-sm">
                                    <thead class="bg-gray border-bottom">
                                        <tr>
                                            <th>ITEM</th>
                                            <th>PRICE</th>
                                            <th class="text-center">QUANTITY</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Outletko.com Subscription <br> <span id='cart-plan-name'>Payment Plan A : Monthly</span></td>
                                            <td class="pt-4"><span id="cart-plan-price">PHP 2,850.00</span></td>
                                            <td class="text-center pt-4"><input type="text" class="textbox-green text-center" value="1" readonly style="width: 50px;"></td>
                                            <td class="pt-4">PHP <span id="cart-plan-total-price">2,850.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>No. of Additional Branches or Outlets <input type="text" class="textbox-green text-center" value="0" style="width: 50px;" id="cart-plan-outlet-qty"></td>
                                            <td><span id="cart-plan-outlet-price">PHP 0.00</span></td>
                                            <td class="text-center"><input type="text" class="textbox-green text-center" value="0" readonly style="width: 50px;" id="cart-plan-outlet-qty-dp"></td>
                                            <td><span id="cart-plan-outlet-total-price">PHP 0.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-lg-8 col-md-12 col-sm-12 pt-3 table-responsive px-0 d-none d-sm-block d-md-none">
                                <table class="table border-green">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-600 border-0 bg-gray">ITEM</td>
                                            <td class="border-0">Outletko.com Subscription <br> Payment Plan A : Quarterly</td>
                                            <td class="border-0">No. of Additional Branches or Outlets <input type="text" class="textbox-green text-center" value="0" style="width: 50px;"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600 bg-gray">PRICE</td>
                                            <td>PHP 2,850.00</td>
                                            <td>PHP 0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600 bg-gray">QUANTITY</td>                                        
                                            <td class="text-center"><input type="text" class="textbox-green text-center" value="1" readonly style="width: 50px;"></td>
                                            <td class="text-center"><input type="text" class="textbox-green text-center" value="1" readonly style="width: 50px;"></td>
                                        </tr>
                                        <tr class="bg-gray">
                                            <td class="font-weight-600">TOTAL</td>
                                            <td>PHP 2,850.00</td>
                                            <td>PHP 0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-lg-4 col-md-12 col-sm-12 div-cart-total border-green py-2">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                                        <span class="font-size-20 font-weight-600">CART TOTALS</span><br>
                                        <span class="font-size-25 font-weight-bold mt-2">Grand Total : <span id="cart-grand-total"></span></span>
                                        <button class="btn btn-success btn-block mt-4" id="btn-next-cart">Proceed to Checkout</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-warning btn-block" id="btn-back-cart">Back</button>
                                    </div>
                                    <div class="col-12 co-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-danger btn-block" onclick="window.location.reload();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="div-bill">
            <div class="container-fluid navbar pt-2">
                <div class="row w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <span class="font-size-30 font-weight-600">Billing Details</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <hr class="mt-1 mb-3" style="border-top: 1px solid rgb(195, 214, 155)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <form id="bill-form">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-7 col-sm-12">

                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>First Name <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-fname" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Last Name <span class="text-red">*</span> </span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-lname" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                            </div>    
                                            <div class="row" hidden>
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                    <span>Company (optional)</span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-company">
                                                </div>            
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                    <span>Address <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" placeholder="Number/Street/Village/" id="bill-address" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Town / City <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-town" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Province <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-province" readonly >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Zip Code</span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-zipcode">
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Country <span class="text-red">*</span></span>
                                                    <select class="form-control form-control-sm textbox-green" data-parsley-trigger="focusin focusout"  required id="bill-country">
                                                        <option value="" selected hidden></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Email Address <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-email" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Mobile No <span class="text-red">*</span></span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="height: 35px;">
                                                            <span class="input-group-text textbox-green text-black bg-white" style="border-radius: 0;">+63</span>
                                                        </div>
                                                        <input class="form-control form-control-sm textbox-green w-75" id="bill-mobile" data-parsley-trigger="focusin focusout"  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Phone No</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="height: 35px;">
                                                            <input type="text" class="form-control form-control-sm textbox-green text-center" value="02" id="bill-phone-code" style="width:40px;">
                                                        </div>
                                                        <input type="password" class="form-control form-control-sm textbox-green" id="bill-phone">
                                                    </div>                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-5 col-sm-12">
                                            <div class="row mx-0">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 border-green div-bill-total">
                                                    <div class="row ">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                            <span class="font-size-25 font-weight-600">Bill TOTALS</span><br>
                                                            <span class="font-size-25 font-weight-bold mt-2">Grand Total : <span id="bill-grand-total"></span></span>
                                                            <button class="btn btn-success btn-block mt-4" id="btn-next-bill" type="button">Proceed to Checkout</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                                            <button class="btn btn-warning btn-block" id="btn-back-bill" type="button">Back</button>
                                                        </div>
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                                            <button class="btn btn-danger btn-block " onclick="window.location.reload();">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="div-payment">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-payment-header">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white">
                                <span class="font-header">How would you like to pay?</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row navbar mt-3">
                    <input type="hidden" id="payment-type">
                    <div class="col-12 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="div-card-payment w-100 border-green div-payment-divider div-payment-type px-3 py-5 cursor-pointer" id="div-card-payment">
                                    <img src="<?php echo base_url('assets/images/payment_type/visa.png')?>" alt="visa/mastercard" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="div-bank-payment text-center w-100 border-green div-payment-divider div-payment-type py-5 cursor-pointer" id="div-bank-payment">
                                    <span class="font-size-30 text-green font-weight-600">Bank Payment</span><br>
                                    <span class="font-size-30 text-green font-weight-600">(Over the counter)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row mx-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 border-green div-payment-divider">
                                <div class="row ">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                                        <span class="font-size-25 font-weight-600" hidden>Bill TOTALS</span>
                                        <span class="font-size-30 font-weight-600">Grand Total : </span><br>
                                        <button class="btn btn-success btn-block mt-4" id="btn-next-payment" hidden>Proceed to Checkout</button>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center pt-4">
                                        <span class="font-size-40 font-weight-bold mt-2" id="payment-grand-total">PHP 2,850.00</span>
                                    </div>
                                </div>
                                <div class="row" hidden>
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-warning btn-block" id="btn-back-payment">Back</button>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-danger btn-block " onclick="window.location.reload();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://www.paypal.com/sdk/js?client-id=ASjHWK-MMBPqa9sv1TtpRIruH_OiCph7pWvgnWO0DNE2plWjIAOMHHff7TRRH9Gd7j0R5mKQFSWjMho9&currency=PHP&locale=en_PH"></script>
        <div class="row" id="div-payment-details">
            <div class="container-fluid navbar">
                <div class="row w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row" id="div-card-payment-details">
                            <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto">
                                <div id="paypal-button-container" class="mt-3"></div>
                            </div>
                        </div>
                        <div class="row" id="div-bank-payment-details">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class=row>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    	<table class="table table-sm table-bordered">
                                    		<thead>
                                    			<tr>
                                    				<th>Bank Name</th>
                                    				<th>Account Number</th>
                                    				<th>Account Name</th>
                                    			</tr>
                                    		</thead>
                                    		<tbody>
                                    			<tr>
                                    				<td>BDO Unibank</td>
                                    				<td>0000 0000 0000 0000 </td>
                                    				<td>Outletko Corporation</td>
                                    			</tr>
                                    		</tbody>
                                    	</table>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-12 col-lg-4 col-md-12 col-sm-12 mx-auto">
                                		<button class="btn btn-orange btn-block" id="btn-bank-payment">Continue</button>
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