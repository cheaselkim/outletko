<script src="<?php echo base_url('js/ecommerce/profile/payment.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ecommerce/user.css') ?>">

<div class="container mt-2 bg-white py-3 px-3" style="min-height: 750px;">

    <div class="row mx-2 ">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <p class="mb-3"><span class="font-weight-600">Intrunctions : </span> Please send your Proof of Payment after you pay. Thank you</p>
        </div>
    </div>

    <div class="row mx-2 ">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-inline" action="/action_page.php">
                <label for="payment-method" class="mr-sm-2 font-weight-600">Payment Method:</label>
                <input type="text" class="form-control mb-2 mr-sm-2 bd-green text-black font-weight-400 w-25" id="payment-method" value="Pay via Metrobank">
            </div>
        </div>
    </div>
    
    <div class="row mx-3 ">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="payment-table">
        </div>
    </div>

    <div class="row border alert alert-success my-2 rounded-0 py-2 mx-3 div-proof" id="div-proof">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-2">
            <div class="row mb-1">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12 px-1">
                    <h5>Proof of Payment</h5>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-12 col-lg-1 col-md-2 col-sm-12 px-1">
                    <span class="font-weight-600">Order No</span>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 px-1">
                    <input type="text" class="form-control textbox-green bg-white" id="proof-order-no" data-id="" readonly>
                </div>
                <div class="col-12 col-lg-auto col-md-2 col-sm-12 pr-1">
                    <span class="font-weight-600">Upload Files <span class="text-red">*</span></span>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 px-1 ">
                    <button class="btn btn-modal-img-upload btn-outline-success btn-block ml-0 w-100" id="btn-upload-proof-file" style="height:35px !important;border-radius:.25rem !important">
                        Upload File
                        <input type="file" id="btn-upload-proof" class="img-upload-modal btn btn-success" style="height:35px !important;border-radius:.25rem !important">
                    </button>
                </div>
                <div class="col-12 col-lg-2 col-md-3 col-sm-12">
                    <span id="span-upload-proof"></span>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-12 col-lg-1 col-md-4 col-sm-12 px-1">
                    <span class="font-weight-600">Message <span class="text-red">*</span></span>
                </div>
                <div class="col-12 col-lg-11 col-md-8 col-sm-12 px-1">
                    <textarea  id="proof-message"  rows="3" class="form-control textbox-green"></textarea>
                </div>
            </div>
            <div class="row mt-2 mb-1">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right px-1">
                    <button class="btn btn-success" id="btn-send-proof" >Send Proof of Payment</button>                                            
                </div>
            </div>
        </div>
    </div>


</div>

<input type="hidden" id="order-id" value="<?php echo $order_id; ?>">

