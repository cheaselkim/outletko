<body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/sales.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/sales/sales_insert.js') ?>"></script> 
<input type="hidden" id="prod_id">
<input type="hidden" id="tbl_item_row">
<input type="hidden" id="outlet_id" value="<?php echo $this->session->userdata('outlet_id');?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>



<div class="container-fluid pt-1">
    <div class="div-trans-header">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-date">
                <div class="row">
                    
                    <div class="col-8 col-md-2 order-1 order-md-1 d-none d-md-block d-lg-block d-xl-block">
                        <span class="text-date">Trans. No.: </span><span class="text-date" id="sales_trans_no">00001</span>
                    </div>

                    <div class="col-12 col-md-8 order-12 order-md-2 text-date">
                        <div class="input-group">
                            <span class="span-customer">Customer</span>
                            <div class="input-group-prepend cust_code_wd">
                                <input type="text" class="form-control txt-box-text-size" placeholder="" value="" id="cust_code" data-id = "0">
                            </div>
                            <input type="text" class="form-control txt-box-text-size" placeholder="CASH" value="CASH" id="cust_name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr style="color: black;" class="my-1">

    <div class="div-trans-header bg-button py-2 px-2">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 text-date">
                <div class="row">
                    
                    <div class="col-3 col-md-2 order-1 order-md-1 order-lg-1">
                        <div class="div-prod-img" id="image-box">
                        </div>
                    </div>

                    <div class="col-8 col-md-8 order-12 order-md-2 order-lg-2 d-none d-md-block d-lg-block d-xl-block prod-dtl-med">
                        <div class="row">
                            <div class="col-12 col-md-6 pl-0">
                                <div class="input-group">
                                    <span class="span-prodno text-sales">Product No</span>
                                    <div class="input-group-prepend prod_no_wd" >
                                        <input type="text" class="form-control txt-box-text-size" id="prod_no" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 text-sales">
                                <div class="input-group">
                                    <span class="pr-5 text-sales">Stock on Hand</span>
                                    <div class="input-group-prepend stock_qty_wd">
                                        <input type="text" class="form-control ml-1 txt-box-text-size" id="stock_qty" readonly>
                                    </div>
                                    <input type="text" class="form-control ml-1" id="stock_uom" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12 col-md-12 text-sales pl-0">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="span-prod-name text-sales" style="text-align: right;">Product Name</span>
                                    </div>
                                    <input class="form-control text-date" id="prod_name" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 order-lg-12 d-none d-md-none d-lg-block d-xl-block">
                        <div class="form-group row mb-1 text-sales">
                            <span class="col-3 col-form-label" for="text-input">Agent</span>
                            <div class="col-9">
                                <input type="hidden" id="partner_id">
                                <input class="form-control txt-box-text-size px-1" id="partner" data-id = "" data-id2 = "" data-share="" style="font-size: 14px !important;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-9 order-lg-1">
                                <!--btn-success-->
                                <button class="btn  btn-block btn-success" id="btn_select_item" data-toggle="modal" data-target="#select_item_modal">Select Item</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="div-prod-header pt-2">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-horizontal  px-2 pt-2 pb-1" style="background: #8ac7d1;">
                                    <div class="form-group row mb-0">
                                        <span class="col-6 col-form-label text-sales" for="text-input">Regular Price PHP</span>
                                        <div class="col-6">
                                            <input class="form-control text-right txt-box-text-size" id="reg_price" type="text" placeholder="0.00" readonly>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-1">

                                    <div class="form-group row mb-0">
                                        <span class="col-6 col-form-label text-sales" for="text-input">Selling Price</span>
                                        <div class="col-6">
                                            <input class="form-control text-right txt-box-text-size" id="sel_price" type="text" placeholder="0.00" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <span class="col-6 col-form-label text-sales" for="text-input">Quantity</span>
                                        <div class="col-6">
                                            <input class="form-control text-right txt-box-text-size" id="qty" type="text" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <span class="col-6 col-form-label text-sales" for="text-input">Total Price</span>
                                        <div class="col-6">
                                            <input class="form-control text-right txt-box-text-size" id="total_price" type="text" placeholder="0.00" readonly>
                                        </div>
                                    </div>
                                    <hr class="mb-1 mt-0">
                                    <div class="form-group row mb-0">
                                        <span class="col-3 col-form-label text-sales pr-0" for="text-input">
                                            <span class="cursor-pointer" id="span-discount">Discount</span> 
                                            <input type="hidden" id="dis_id" value="0">
<!--                                             <span class="cursor-pointer" id="dis-info" data-toggle="tooltip" data-placement="bottom"  title="Sr Citizen Discount"><i class="fa fa-info-circle"></i></span> -->
                                        </span>
                                        <div class="col-3">
                                            <input class="form-control text-right vol-disc-text-size" id="volume_discount_per px-2" type="text" placeholder="0.00" >
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control text-right vol-disc-text-size" id="volume_discount" type="text" placeholder="0.00" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <span class="col-6 col-form-label text-sales" for="text-input">Total Selling Price</span>
                                        <div class="col-6">
                                            <input class="form-control text-right total-price-text-size font-weight-bold" id="total_selling_price" type="text" placeholder="0.00" readonly>
                                        </div>
                                    </div>
                                    <hr class="mb-1 mt-0">
                                    <div class="form-group row mb-0">
                                        <span class="col-3 col-form-label text-sales" for="text-input">Share %</span>
                                        <div class="col-3"> 
                                            <input class="form-control text-right txt-box-text-size px-2" id="share_per" type="text" placeholder="0.00" value="" >
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control text-right txt-box-text-size" id="share_amount" type="text" placeholder="0.00" >
                                        </div>
                                    </div>
                                    <div class="form-group row mt-1">
                                        <div class="col-6">
                                            <!--btn-danger-->
                                            <button class="btn btn-block cust-text btn-orange" onclick="reset_input();">Cancel</button>
                                        </div>
                                        <div class="col-6">
                                            <!-- btn-primary-->
                                            <button class="btn btn-block cust-text btn-primary" id="add_item">Enter</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="row" style="padding-right: 10px;"> 
                                    <table class="table table-bordered table-hover table-bordered table-fixed text-table table-sm" id="tbl-products">
                                        <thead class='w-100'>
                                                    <!--<tr>-->
                                                    <!--  <th class="d-xl-table-cell d-lg-none d-md-none d-sm-none">PN</th>-->
                                                    <!--  <th>Product Name</th>-->
                                                    <!--  <th>Qty.</th>-->
                                                    <!--  <th>UM</th>-->
                                                    <!--  <th hidden>Regular Price</th>-->
                                                    <!--  <th>Selling Price</th>-->
                                                    <!--  <th hidden>Total Price</th>-->
                                                    <!--  <th hidden>Volume Discount</th>-->
                                                    <!--  <th>Total Selling Price</th>-->
                                                    <!--  <th hidden>Share Percent</th>-->
                                                    <!--  <th hidden>Share Amount</th>-->
                                                    <!--  <th hidden>Total Amount</th>-->
                                                    <!--  <th class="remove_hdr text-red"><span class="fa fa-minus-circle"></span></th>-->
                                                    <!--</tr>-->
                                                    <tr>
                                                      <th style='width: 4%;' class="d-xl-table-cell d-lg-none d-md-none d-sm-none">PN</th>
                                                      <th style='width: 14%;'>Product Name</th>
                                                      <th style='width: 3%;'>Qty.</th>
                                                      <th style='width: 2.5%;'t>UM</th>
                                                      <!--<th style='width: 2.5%;'>Curr</th>-->
                                                      <th hidden>Regular Price</th>
                                                      <th style='width: 6%;'>Selling Price</th>
                                                      <th hidden>Total Price</th>
                                                      <th hidden>Volume Discount</th>
                                                      <th style='width: 8%;'>Total Selling Price</th>
                                                      <th hidden>Share Percent</th>
                                                      <th hidden>Share Amount</th>
                                                      <th hidden>Total Amount</th>
                                                      <th  style='width: 2%;'class="remove_hdr text-red"><span class="fa fa-minus-circle"></span></th>
                                                    </tr>

                                        </thead>
                                        <tbody>                                                  
                                                
                                                </tbody>
                                    </table>
                        </div>

                        <div class="row pb-2"> 
                            <div class="col-12">
                                <div class="div-total">
                                    <div class="row">
                                        <div class="col-5 px-0">
                                            <div class="row pt-2">
                                                <div class="col-6 pr-0">
                                                    <!--btn-info-->
                                                    <button class="btn btn-block cust-text btn-info" data-toggle="modal" data-target="#payment_modal">Payment Details</button>
                                                </div>
                                                <div class="col-6 pr-0">
                                                    <input class="form-control txt-box-text-size" id="pay_hdr_type" type="text"  readonly>
                                                </div>
                                            </div>
                                            <div class="row pt-2">                                                
                                                <div class="col-6 pr-0">
                                                    <!--btn-warning-->
                                                    <button class="form-control btn-warning py-1 font-weight-bold" style="height: 50px !important;font-size: 20px !important" onclick="preview_data();">Preview</button>
                                                </div>
                                                <div class="col-6 pr-0">
                                                     <!--btn-success-->
                                                    <button class="form-control py-1 btn-success text-white font-weight-bold" style="height: 50px !important;font-size: 25px !important;"   id="save_trans">Save</button> 
                                                </div>                                                
                                            </div>
                                            <div class="row pt-1">
                                            </div>
                                        </div>

                                        <div class="col-7 pr-4 pt-0 ">
                                            <div class="row pr-2">
                                                <div class="col-6 pr-0 pl-5"> 
                                                    <span class=' font-total'>Sub Total</span>
                                                </div>
                                                <div class="col-1 px-0">
                                                    <span class=' font-total'>PHP</span>
                                                </div>
                                                <div class="col-5"> 
                                                    <input type="text" class="form-control text-right" id="total_selling" value ="0.00"readonly>
                                                </div>
                                            </div>  
                                            <div class="row mt-1 pr-2"> 
                                                <div class="col-6 pr-0 pl-5"> 
                                                    <span class=' font-total'>Trans Discount</span>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5"> 
                                                    <input type="text" class="form-control text-right" placeholder="0.00" id="sales_discount" >  
                                                </div>
                                            </div>
                                            <div class="row mt-1 pr-2"> 
                                                <div class="col-6 pr-0 pl-5"> 
                                                    <span class='font-total'>VAT Amount</span>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5"> 
                                                    <input type="text" class="form-control text-right" value="0" id="total_vat" readonly>  
                                                </div>
                                            </div>
                                            <div class="row mt-1 pr-2"> 
                                                <div class="col-6 pr-0 pl-5"> 
                                                    <span class='font-weight-bold font-total'>Total Trans Amount</span>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5"> 
                                                    <input type="text" class="form-control text-right font-weight-bold" value="0" id="grand_total" readonly="true">  
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

<!-- Modal for Payment -->
<div class="modal" id="payment_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-half">
        <div class="modal-content">
            <div class="modal-header pt-1 pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-10 col-lg-10">
                            <h3>Payment Details</h3>
                        </div>
                        <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size pb-0">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Payment Term</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <select class="form-control border-black txt-box-text-size" id="payment_term">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>No. of Days</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <input type="text" class="form-control text-right txt-box-text-size" id="no_days" value="0">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Due Date</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <input type="date" class="form-control txt-box-text-size" id="due_date">
                        </div>
                    </div>

                    <hr class="my-1" style="background-color: black;">

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Payment Date</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <input type="date" class="form-control txt-box-text-size" id="payment_date">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Payment Type</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <select class="form-control border-black txt-box-text-size" id="payment_type">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Bank Name</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <select class="form-control border-black txt-box-text-size" id="bank_name">
                                <option selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Check/Card No.</span>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control txt-box-text-size" id="check_no">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Check Date</span>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control txt-box-text-size" id="check_date">
                        </div>
                    </div>

                    <hr class="my-1" style="background-color: black;">

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Currency</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <select class="form-control border-black txt-box-text-size" id="currency">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Amount</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <input class="form-control border-black text-right txt-box-text-size" id="payment_amount" value="0">
                        </div>
                    </div>

                    <hr class="my-1" style="background-color: black;">

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Deposit Date</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <input type="date" class="form-control txt-box-text-size" id="dep_date">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 col-lg-6">
                            <span>Bank Account</span>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <select class="form-control border-black txt-box-text-size" id="dep_bank">
                            </select>
                        </div>
                    </div>


                </div>
            </div>

            <div class="modal-footer text-sales py-2">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group row mb-0">
                        <div class="col-6 col-md-6 col-lg-6 left">
                            <!--btn-danger-->
                            <button class="btn btn-block text-lg btn-success" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 right">
                             <!--btn-warning-->
                            <button class="btn btn-block text-lg btn-warning " data-dismiss="modal" id="continue">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for Payment -->

<!-- Modal for Select Other Item -->
<div class="modal" id="select_item_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-full">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-10 col-lg-10">
                            <h3>Products / Services</h3>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

             <div class="modal-body text-modal-size">
                <div class="col-12">

                    <div class="form-group row btn-info mb-0 py-2 mb-1" style="background: #8ac7d1;">
                        <div class="col-2 pr-1" hidden>
                            <select class="form-control font-size-18" id="item_type">
                                <option value="" selected disabled>Item Type</option>
                            </select>
                        </div>
                        <div class="col-2 pr-1">
                            <input type="text" class="form-control txt-box-text-size font-size-18" placeholder="Product No" id="item_no" style="height: 40px !important;">
                        </div>
                        <div class="col-8 px-1">
                            <input type="text" class="form-control txt-box-text-size font-size-18" placeholder="Product Name" id="item_name" style="height: 40px !important;">
                        </div>
                        <div class="col-2 pl-1">
                            <button class='btn btn-success btn-height-35 btn-block font-size-18' id="search" style="height: 40px !important;">Search</button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-2 pr-1">
                            <select class="form-control font-size-18 btn-height-30" id="item_category" style="height: 30px !important;">
                                <option value="" selected disabled>Item Category</option>
                            </select>
                        </div>                        
                        <div class="col-2 px-1">
                            <select class="form-control font-size-18 btn-height-30" id="item_class" style="height: 30px !important;">
                                <option value="" selected disabled>Item Class</option>
                            </select>
                        </div>                        
                        <div class="col-2 px-1">
                            <select class="form-control font-size-18 btn-height-30" id="item_brand" style="height: 30px !important;">
                                <option value="" selected disabled>Item Brand</option>
                            </select>
                        </div>                        
                        <div class="col-2 px-1">
                            <select class="form-control font-size-18 btn-height-30" id="item_color" style="height: 30px !important;">
                                <option value="" selected disabled>Item Color</option>
                            </select>
                        </div>                        
                        <div class="col-2 px-1">
                            <select class="form-control font-size-18 btn-height-30" id="item_size" style="height: 30px !important;">
                                <option value="" selected disabled>Item Size</option>
                            </select>
                        </div>                        
                        <div class="col-2 pl-1" hidden>
                            <input type="text" class="form-control txt-box-text-size font-size-18" placeholder="Product Model" id="item_model">
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-12" style="height: auto;">
                            <div id="div-tbl-items">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-sales">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group row">
                        <div class="col-6 col-md-6 col-lg-6">
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 right" hidden>
                            <!--btn-info-->
                            <button class="btn btn-block text-lg " data-dismiss="modal">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for Select Other Item -->

<!-- Modal for Preview -->
<div class="modal" id="preview_modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-half-full">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-xs-12 col-md-12 text-modal-size">
                    <div class="form-group row mb-0">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-lg-2 pr-0 font-weight-600">
                                    <span><?php echo $this->session->userdata('account_id'); ?></span>
                                </div>
                                <div class="col-lg-10 pl-0 font-weight-600">
                                    <span id='mod_prev_comp_name'>Macon's Salon</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span>Outlet No. <?php echo $this->session->userdata('outlet_code'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="">Sales Transaction</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-6">
                                        <span class="">Trans No: </span>
                                    </div>
                                    <div class="col-6 text-modal">
                                        <span id="mod_prev_trans_no"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-6">
                                        <span class="">Trans Date: </span>
                                    </div>
                                    <div class="col-6 text-modal">
                                        <span id="mod_prev_trans_date"><?php echo date('m/d/Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close" onclick="close_modal();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-3 pr-0">
                                    <span class="">Cust No: </span>
                                </div>
                                <div class="col-9 pr-0 pl-0 text-modal">
                                    <span id="mod_prev_customer"></span>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-lg-3" >
                            <div class="row">
                                <div class="col-5 pr-0 text-right">
                                    <span>Term : </span>
                                </div>
                                <div class="col-6 pr-0 text-modal">
                                    <span id="mod_prev_term"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 pr-0 text-right">
                                    <span>Due Date : </span>
                                </div>
                                <div class="col-6 pr-0 text-modal">
                                    <span id="mod_prev_due_date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-5 pr-0 text-right">
                                    <span>Payment Date : </span>
                                </div>
                                <div class="col-7 pr-0 text-modal">
                                    <span id="mod_prev_pay_date"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 pr-0 text-right">
                                    <span>Payment Type : </span>
                                </div>
                                <div class="col-7 pr-0 text-modal">
                                    <span id="mod_prev_pay_type"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 pr-0 text-right">
                                    <span>Currency : </span>
                                </div>
                                <div class="col-7 pr-0 text-modal">
                                    <span id="mod_prev_currency"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12">
                    <div class="row" style="padding-right: 10px;"> 
                        <table class="table table-fixed text-table table-sm mb-0 table-bordered" id="mod_prev_tbl" style="font-size: 14px; height: 375px;">
                            <thead class="w-100">
                                <tr>
                                    <th style="width: 8%;">Product Number</th>
                                    <th style="width: 30%;">Product Name</th>
                                    <th style="width: 10%;">Agent Code</th>
                                    <th style="width: 5%;">Qty</th>
                                    <th style="width: 5%;">Unit</th>
                                    <th style="width: 7%;">Unit Price</th>
                                    <th style="width: 10%;">Total <br> Price</th>
                                    <th style="width: 10%;">Total Product Discount</th>
                                    <th style="width: 10%;">Total Selling Price</th>
                                </tr>
                            </thead>
                            <tbody >                                 
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="col-12" style="height: auto;" id="div-tbl-prev-items">
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer py-2">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- END Modal for Preview -->

<!-- Modal for Save Transaction -->
<div class="modal" id="trans_modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-half">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-6 col-lg-6">
                            <h4>Trans No : <span id="trasaction_trans_no"></span></h4>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <h4>Date : <?php echo date("m/d/Y"); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size py-2">
                <div class="col-12">
                    <div class="form-group row text-sales">
                        <div class="col-6">
                            <span class="text-modal">Payment Details</span>
                        </div>
                        <div class="col-6">
                            <span id="mod_payment_type"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <span class="text-modal">Total Sales</span>
                        </div>
                        <div class="col-6">
                            <span id="mod_total_sales"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <span class="text-modal">Discount</span>
                        </div>
                        <div class="col-6">
                            <span id="mod_discount"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <span class="text-modal">Grand Total Sales</span>
                        </div>
                        <div class="col-6">
                            <span class="text-date" id="mod_grand_total"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <span class="text-modal">Amount Paid</span>
                        </div>
                        <div class="col-6">
                            <span class="text-date" id="mod_amount_paid"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <span class="text-modal">Change</span>
                        </div>
                        <div class="col-6">
                            <span class="text-date" id="mod_change"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <span class="text-modal">Partner / Agent</span>
                        </div>
                        <div class="col-6">
                            <span class="text-date" id="mod_partner"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-3">
                            <span class="text-modal">Share %:</span>
                        </div>
                        <div class="col-3 col-auto">
                            <span class="text-date" id="mod_share_per"></span>
                        </div>
                        <div class="col-5">
                            <span class="text-date" id="mod_share"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="close_trans_modal();">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- END Modal for Save Transaction -->

<!-- Modal for Discount -->

<div class="modal" id="modal-discount">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">List of Discounts</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-xs-12 pad-right">
                            <select class="form-control" id="mod-select-discount">
                                <option value="0" hidden selected> Discount</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12 pad-left">
                            <div class="input-group ">
                                <input type="text" class="form-control text-right border-right-0 pr-0" value="0" id="mod-text-discount" readonly>
                                <div class="input-group-append bg-white btn-height-35 px-0">
                                    <span class="input-group-text btn-height-35 form-control" id="mod-text-type">%</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="mod-discount-save">Continue</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- END Modal for Discount -->


</body>

<style type="text/css">
    
    #payment_modal input{
        font-size: 18px !important;
    }

</style>