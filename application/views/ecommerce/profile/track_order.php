<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/css/ecommerce/track_order.css')?>">
<script src="<?php echo base_url('js/ecommerce/profile/track_order.js')?>"></script>

<div class="container container-track my-2 py-3">

    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                    <span class="h2 font-weight-600">Track My Order</span>
                </div>
            </div>
            <!-- <div class="row mt-3">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto text-center">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bd-green" id="order-number" placeholder="Enter your Order Number">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" id="btn-track-order">Track</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row mt-3">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto text-center">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 my-1">
                            <input type="text" name="order-number" placeholder="Enter your Order Number"
                                id="order-number" class="form-control bd-green">
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 my-1">
                            <input type="text" name="order-email" placeholder="Enter your Email" id="order-email"
                                class="form-control bd-green">
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 my-1">
                            <button class="btn btn-success btn-block" id="btn-track-order">Track My Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-0 mt-4 alert alert-danger" id="div-alert-track" hidden>
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
            <span class="font-weight-600 text-uppercase">Order Number not Found</span>
        </div>
    </div>

    <div class="row mx-0 mt-4 bd-green" id="div-track-status" hidden>
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 bg-green text-white text-center py-3">
                    <span class="font-weight-600 span-order-no">ORDER NO : <span id="track-order-no">123123123</span></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 alert alert-success py-2 my-0"
                    style="border-radius: 0;">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 text-center">
                            <span><span class="font-weight-600">Outlet : </span><span id="track-outlet"></span></span>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 text-center">
                            <span><span class="font-weight-600">Status : </span><span id="track-status"></span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 bd-green py-2">

                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <ul id="progressbar" class="list-group list-group-horizontal">
                                <li class="list-group-item text-center list-group-item-success"><span><i class="fa fa-check-circle mb-2 fa-lg "></i> <br>Pending to Acknowledges</span></li>
                                <li class="list-group-item text-center "><span><i class="fa fa-check-circle mb-2 fa-lg"></i> <br>Acknowledge</span></li>
                                <li class="list-group-item text-center "><span><i class="fa fa-check-circle mb-2 fa-lg"></i> <br>Proof of Payment Sent</span></li>
                                <li class="list-group-item text-center "><span><i class="fa fa-check-circle mb-2 fa-lg"></i> <br>Payment denied by Seller</span></li>
                                <li class="list-group-item text-center "><span><i class="fa fa-check-circle mb-2 fa-lg"></i> <br>Payment Confirmed by Seller</span></li>
                                <li class="list-group-item text-center "><span><i class="fa fa-check-circle mb-2 fa-lg"></i> <br>Delivery</span></li>
                                <li class="list-group-item text-center "><span><i class="fa fa-check-circle mb-2 fa-lg"></i> <br>Completed</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> -->
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12" style="z-index:0;">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 px-0">
                            <ul id="progressbar" class="text-center">
                                <li class="active step0 track-progress" id="track-progress-order"><p class="mt-2 mb-0 font-weight-600 text-green">Order</p></li>
                                <li class="active step0 track-progress" id="track-progress-confirm"><p class="mt-2 mb-0 font-weight-600 text-green">Confirmed</p></li>
                                <li class="active step0 track-progress" id="track-progress-payment"><p class="mt-2 mb-0 font-weight-600 text-green">Payment</p></li>
                                <li class="active step0 track-progress" id="track-progress-delivery"><p class="mt-2 mb-0 font-weight-600 text-green">Delivery</p></li>
                                <li class="step0 track-progress" id="track-progress-completed"><p class="mt-2 mb-0 font-weight-600 text-green">Completed</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>