<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/my_order.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/checkout.css')?>">
<script src="<?php echo base_url('js/ecommerce/profile/checkout_guest.js')?>"></script>


<div class="container py-4 px-0 container-checkout">

    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
            <!-- div-checkout-details-1 -->

            <div class="container px-0" id="div-accordion">
                <div id="accordion" class="accordion">

                    <div class="card div-billing" id="div-billing" data-id="0">
                        <div class="card-header py-1">
                            <a class="collapsed card-link  font-size-20" data-toggle="collapse"
                                href="#collapse-billing">
                                <i class="fa fa-angle-down"></i> Delivery & Billing Address <span
                                    class="text-orange font-size-20 font-weight-400" id="deliver-icon"><i
                                        class="far fa-check-circle"></i></span>
                            </a>
                        </div>

                        <div id="collapse-billing" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                    <span class="font-size-16 mb-1">First Name<span
                                                            class="text-red">*</span></span>
                                                    <input type="text" class="form-control bg-white textbox-green"
                                                        id="bill_fname" value="">
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                    <span class="font-size-16 mb-1">Middle Name</span>
                                                    <input type="text" class="form-control bg-white textbox-green"
                                                        id="bill_mname" value="">
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                    <span class="font-size-16 mb-1">Last Name<span
                                                            class="text-red">*</span></span>
                                                    <input type="text" class="form-control bg-white textbox-green"
                                                        id="bill_lname" value="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                    <span class="font-size-16 mb-1">Email <span
                                                            class="text-red">*</span> </span>
                                                    <input type="text" class="form-control textbox-green"
                                                        id="bill_email">
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                    <span class="font-size-16 mb-1">Mobile No <span
                                                            class="text-red">*</span> </span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white textbox-green"
                                                                id="bill_mobile_icon"
                                                                style="border-right: 0 !important;">+63</span>
                                                        </div>
                                                        <input type="text" class="form-control textbox-green"
                                                            id="bill_mobile">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                    <span class="font-size-16 mb-1">Phone No</span>
                                                    <input type="text" class="form-control textbox-green"
                                                        id="bill_phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span class="font-size-16 mb-1">Address <span class="text-red">*</span>
                                            </span>
                                            <input type="text" class="form-control textbox-green" id="bill_address">
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                                                    <span class="font-size-16 mb-1">Barangay</span>
                                                    <input type="text" class="form-control textbox-green"
                                                        id="bill_barangay">
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-3 col-sm-12">
                                                    <span class="font-size-16 mb-1">Town / City <span
                                                            class="text-red">*</span></span>
                                                    <input type="text" class="form-control textbox-green"
                                                        id="bill_city">
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-3 col-sm-12">
                                                    <span class="font-size-16 mb-1">Province <span
                                                            class="text-red">*</span> </span>
                                                    <input type="text" class="form-control textbox-green"
                                                        id="bill_province" readonly>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                                                    <span class="font-size-16 mb-1">Zip Code</span>
                                                    <input type="text" class="form-control textbox-green" id="bill_zip">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span class="font-size-16 mb-1">Contact Person</span>
                                            <input type="text" class="form-control textbox-green" id="bill_contact">
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                            <span class="font-size-16 mb-1">Delivery Instructions</span>
                                            <textarea class="form-control textbox-green" id="bill_notes"
                                                rows="3"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3 div-shipping-method" id="div-shipping-method" data-id="0">
                        <div class="card-header py-1">
                            <a class="collapsed card-link font-size-20" data-toggle="collapse"
                                href="#collapse-shipping">
                                <i class="fa fa-angle-down"></i> Shipping Details <span
                                    class="text-orange font-size-20 font-weight-400" id="arrive-icon"><i
                                        class="far fa-check-circle"></i></span>
                            </a>
                        </div>
                        <div id="collapse-shipping" class="collapse" data-parent="#accordion">
                            <div class="card-body">

                                <div class="container-fluid px-0">

                                    <div class="row" id="div-del-not-avail">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                            <span class="text-red font-weight-600 font-size-20">Delivery is not
                                                available in your area.</span>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                            <span>Delivery Type <span class="text-red">*</span></span>
                                            <select class="form-control" id="delivery_type">

                                            </select>
                                        </div>

                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-modal-delivery-details"
                                            id="div-courier">
                                            <span>Courier</span>
                                            <select class="form-control" id="courier"></select>
                                        </div>



                                    </div>

                                    <div class="row div-modal-delivery-details">
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-modal-delivery-details">
                                            <span>Delivery Fee</span>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-black">PHP</span>
                                                </div>
                                                <input type="text" class="form-control text-right" id="delivery_fee"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row div-modal-delivery-details" hidden>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span>Standard Delivery</span>
                                            <input type="text" class="form-control" id="std_delivery" readonly>
                                        </div>
                                    </div>

                                    <div class="row div-modal-delivery-details" hidden>
                                        <div class="col-12 col-lg-9 col-md-10 col-sm-12 mx-auto">

                                            <div class="row px-0">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 py-2 px-0 text-center">
                                                    <div id="datepicker"></div>
                                                    <span class="font-italic text-red" id="deliver_date_note">Note : You
                                                        are not allowed to choose delivery date</span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 mx-auto" hidden>
                                                    <span>Your Order will be delivered on :</span>
                                                    <input type="text" class="form-control" id="order_delivered_date"
                                                        readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mt-3 div-hdr-payment" id="div-hdr-payment" data-id="0">
                        <div class="card-header py-1">
                            <a class="collapsed card-link font-size-20" data-toggle="collapse" href="#collapse-payment">
                                <i class="fa fa-angle-down"></i> Payment Method <span
                                    class="text-orange font-size-20 font-weight-400" id="payment-icon"><i
                                        class="far fa-check-circle"></i></span>
                            </a>
                        </div>
                        <div id="collapse-payment" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row" id="div-payment">

                                    </div>
                                    <div class="row" id="div-payment-method">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
                                            <hr style="border-top:2px solid rgb(119, 147, 60);" class="mb-0">
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0">
                                            <span class="font-weight-600 font-size-16">Payment Method</span>
                                            <select class='form-control' id="summ-payment-type-list"></select>
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

    <div class="row mt-3">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="div-order-details">
            <span class="font-weight-600">Order Items</span>
            <div class="row">
                <div class="col-12 py-2">
                    <div class="row" id="div_order_1">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <table class="table table-sm " id="prod_dtls" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="" colspan="2"
                                            style="width: 70%;background: white !important;color: black;">Product</th>
                                        <th class="text-right"
                                            style="width: 5%;background: white !important;color: black;">Qty</th>
                                        <th class="text-right"
                                            style="width: 10%;background: white !important;color: black;">Unit Price
                                        </th>
                                        <th class="text-right"
                                            style="width: 15%;background: white !important;color: black;">Total Amount
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <hr class="my-1" style="border-top: 1px solid gray;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 col-lg-10 col-md-10 col-sm-8 text-right pr-0">
                            <span class="font-weight-600 font-size-20">Sub Total</span>
                        </div>
                        <div class="col-4 col-lg-2 col-md-2 col-sm-4 text-right pl-0">
                            <span class="font-weight-600 font-size-20">&#8369; <span id="sub_total">0.00</span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 col-lg-10 col-md-10 col-sm-8 text-right pr-0">
                            <span class="font-weight-600 font-size-20">Shipping Fee</span>
                        </div>
                        <div class="col-4 col-lg-2 col-md-2 col-sm-4 text-right pl-0">
                            <span class="font-weight-600 font-size-20">&#8369; <span
                                    id="shipping_fee">100.00</span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-10 col-md-10 col-sm-8 text-right pr-0">
                            <span class="font-weight-600 font-size-30 text-dark-green">Grand Total</span>
                        </div>
                        <div class="col-6 col-lg-2 col-md-10 col-sm-4 text-right pl-0">
                            <span class="font-weight-600 font-size-30 text-dark-green">&#8369; <span
                                    id="total_amount">PHP 0.00</span></span>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
            <div class="bg-green py-2 text-right px-2">
                <a class="btn btn-danger font-size-20" href="<?php echo base_url('my-order'); ?>">Cancel</a> &nbsp;
                &nbsp;
                <button class="btn btn-orange  font-size-20" id="btn_confirm_order">Checkout Order</button>
            </div>
        </div>
    </div>

</div>

<input type="hidden" id="seller_id">
<input type="hidden" id="payment_type_id">