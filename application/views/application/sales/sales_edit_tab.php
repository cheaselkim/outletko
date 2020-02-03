<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/sales_tab.css') ?>">
<!-- <script type="text/javascript" src="<?php echo base_url('js/application/header.js') ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/application/sales/sales_edit_tab.js') ?>"></script>
<input type="hidden" id="prod_id">
<input type="hidden" id="tbl_item_row">
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">
<input type="hidden" id="outlet_id" value="<?php echo $this->session->userdata('outlet_id');?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>

<style type="text/css">
    input[type='text'], select, button{
        height: 45px !important;
        font-size: 25px !important;
    }

    .btn{
        height: 45px !important;
    }

</style>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 text-date">
            <div class="row mb-1">
                <div class="col-12 col-md-12">
                    <span class="text-date">Trans. No.: </span><span class="text-date" id="sales_trans_no">00001</span>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-6 col-md-6">
                    <input type="text" class="form-control txt-box-text-size" placeholder="Customer No." id="cust_code" data-id = "0">
                </div>

                <div class="col-6 col-md-6">
                    <input type="text" class="form-control txt-box-text-size" id="partner"  placeholder="Agent">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <input type="text" class="form-control txt-box-text-size" placeholder="Customer Name" id="cust_name" value="CASH">
                </div>
            </div>
        </div>
    </div>
</div>

<hr style="color: black;" class="my-2">

<div class="container-fluid bg-button pt-2 pb-2" id="prod_entry">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6 col-md-6">
                    <input type="text" class="form-control txt-box-text-size" id="prod_no" readonly placeholder="Product No.">
                </div>

                <div class="col-6 col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend stock_qty_wd px-0">
                            <input type="text" class="form-control ml-1 txt-box-text-size text-right" id="stock_qty" readonly placeholder="On Hand" value="0">
                        </div>
                        <input type="text" class="form-control ml-1 txt-box-text-size" id="stock_uom" readonly placeholder="Unit">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 mt-1">
            <div class="row">
                <div class="col-12 col-md-12">
                    <input type="text" class="form-control txt-box-text-size" id="prod_name" placeholder="Product Name" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 pt-2">
                    <!-- data-toggle="modal" data-target="#select_item_modal" -->
                    <button class="btn btn-success btn-block" id="btn_select_item" data-toggle="modal" data-target="#select_item_modal">Select Item</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <hr style="color: black;" class="my-2"> -->

<div class="container-fluid" id="sales_entry">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-horizontal">
                        <div class="form-group row mb-1">
                            <span class="col-6 text-sales" for="text-input">Regular Price PHP</span>
                            <div class="col-6">
                                <input class="form-control text-right txt-box-text-size" id="reg_price" type="text" placeholder="0.00" readonly>
                            </div>
                        </div>
                        <hr class="my-1">

                        <div class="form-group row mb-1">
                            <span class="col-6 text-sales" for="text-input">Selling Price</span>
                            <div class="col-6">
                                <input class="form-control text-right txt-box-text-size" id="sel_price" type="text" placeholder="0.00" >
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <span class="col-6 text-sales" for="text-input">Quantity </span>
                            <div class="col-6">
                                <input class="form-control text-right txt-box-text-size" id="qty" type="text" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <span class="col-6 text-sales" for="text-input">Total Price</span>
                            <div class="col-6">
                                <input class="form-control text-right txt-box-text-size" id="total_price" type="text" placeholder="0.00" readonly>
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class="form-group row mb-1">
                            <span class="col-3 text-sales cursor-pointer" for="text-input" id="span-discount">Discount</span>
                            <input type="hidden" id="dis_id" value="0">
                            <div class="col-3">
                                <input class="form-control text-right vol-disc-text-size" id="volume_discount_per px-1" type="text" placeholder="0.00" >
                            </div>
                            <div class="col-6">
                                <input class="form-control text-right vol-disc-text-size" id="volume_discount" type="text" placeholder="0.00" >
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <span class="col-6 text-sales" for="text-input">Total Selling Price</span>
                            <div class="col-6">
                                <input class="form-control text-right total-price-text-size" id="total_selling_price" type="text" placeholder="0.00" readonly>
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class="form-group row mb-1">
                            <span class="col-3 text-sales" for="text-input">Share %</span>
                            <div class="col-3"> 
                                <input class="form-control text-right txt-box-text-size" id="share_per px-1" type="text" placeholder="5.00" value="5.00" >
                            </div>
                            <div class="col-6">
                                <input class="form-control text-right txt-box-text-size" id="share_amount" type="text" placeholder="0.00" >
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <input class="form-control txt-box-text-size" id="pay_hdr_type" type="text" placeholder="CASH" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-6">
                                <button class="btn btn-info btn-block cust-text" data-toggle="modal" data-target="#payment_modal">Payment Type</button>
                                <button class="btn btn-danger btn-block cust-text" onclick="reset_input();" hidden>Cancel</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-block cust-text" id="add_item">Enter</button>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-12">
                                <button class="btn btn-secondary btn-block cust-text" id="next_page">See Details</button>
                            </div>
                        </div>
                        <div class="form-group row mb-2" hidden>
                            <div class="col-6">
                                <button class="form-control btn-block btn-warning cust-text" data-toggle="modal" data-target="#preview_modal" onclick="preview_data();">Preview</button>
                            </div>
                            <div class="col-6">
                                <button class="form-control btn-block btn-success cust-text" id="save_trans2">Save</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="table_sales">
    <!-- <div class="row"> -->
        <table class="table table-striped table-bordered table-hover table-responsive text-table" id="tbl-products">
            <thead class="w-100">
                <tr>
                    <th class="d-xl-table-cell d-lg-none d-md-none d-none">PN</th>
                    <th style="width: 50%;" class="th-table-wd">Product Name</th>
                    <th style="width: 10%;">Qty.</th>
                    <th hidden="">UM</th>
                    <th class="d-xl-table-cell d-lg-none d-md-none d-none">Curr</th>
                    <th style="width: 10%;">Unit Price</th>
                    <th style="width: 15%;">Total Price</th>
                    <th  class="text-center text-red"><span class="fa fa-minus-circle"></span></th>
                </tr>
            </thead>
            <tbody>                                                  
<!--             <?php for ($i=1; $i <= 20; $i++) { ?>
              <tr>
                    <td class="d-xl-table-cell d-lg-none d-md-none d-none">130010<?php echo $i; ?></td>
                    <td class="th-table-wd">T-Shirt Red <?php echo $i; ?></td>
                    <td class="text-center px-2">10<?php echo $i; ?></td>
                    <td class="text-center px-2" hidden="">pcs </td>
                    <td class="text-center px-2 d-xl-table-cell d-lg-none d-md-none d-none">PHP </td>
                    <td class="text-right px-2" hidden=""><?php echo number_format("100".$i, 2); ?></td>
                    <td class="text-right px-2"><?php echo number_format("100".$i, 2); ?></td>
                    <td class="text-red text-center"><span class="fa fa-minus-circle"></span></td>
                </tr>
            <?php } ?> -->
            </tbody>
        </table>
    <!-- </div> -->

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">Total Amount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" placeholder="0.00" id="total_selling" readonly>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">VAT Amount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" placeholder="0.00" id="total_vat" readonly>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">Trans Discount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" id="sales_discount" placeholder="0.00">
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">Total Trans Amount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" placeholder="0.00" id="grand_total" readonly>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-6">
            <button class="btn btn-block btn-warning cust-text" id="back_trans">Back</button>
        </div>
        <div class="col-6">
            <button class="btn btn-block btn-warning cust-text" onclick="preview_data();">Preview</button>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-6">
            <button class="btn btn-block btn-danger cust-text" id="back_trans">Cancel</button>
        </div>
        <div class="col-6">
            <!-- data-toggle="modal" data-target="#trans_modal" -->
            <button class="btn btn-block btn-success cust-text"  id="save_trans">Save</button>
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
                            <input type="text" class="form-control text-right txt-box-text-size" id="no_days" value="0"  pattern="[\d]*" inputmode="numeric">
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
                            <input class="form-control border-black text-right txt-box-text-size" id="payment_amount" value="0" pattern="[\d]*" inputmode="numeric">
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


<!-- Modal for Preview -->
<div class="modal" id="preview_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-small">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-xs-12 col-md-12 text-modal-size">
                    <div class="row">
                        <div class="col-10">
                            <h3>SALES TRANSACTION</h3>
                        </div>
                        <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-5">
                                    <span class="text-modal">DATE: </span>
                                </div>
                                <div class="col-5">
                                    <span><?php echo date("m/d/Y"); ?></span>
                                </div>
                            </div>

                            
                            <div class="row ">
                                <div class="col-5">
                                    <span class="text-modal">Outlet ID: </span>
                                </div>
                                <div class="col-5">
                                    <span><?php echo $this->session->userdata("outlet_code"); ?></span>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-5">
                                    <span class="text-modal">User ID: </span>
                                </div>
                                <div class="col-5">
                                    <span>CAS01</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <span class="text-modal">Transaction No: </span>
                        </div>
                        <div class="col-6">
                            <span id="mod_prev_trans_no"></span>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <span class="text-modal">Customer No: </span>
                        </div>
                        <div class="col-6">
                            <span id="mod_prev_cust_code"></span>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <span class="text-modal">Customer Name: </span>
                        </div>
                        <div class="col-6">
                            <span id="mod_prev_cust_name"></span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12" style="height: auto;" id="div-tbl-prev-items">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-3 col-md-4"></div>
                        <div class="col-9 col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <span class="text-modal">Discount : </span>
                                </div>
                                <div class="col-6 px-5">
                                    <span id="mod_prev_discount"> - </span>
                                </div>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-md-4"></div>
                        <div class="col-9 col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <span class="text-modal">Total PHP : </span>
                                </div>
                                <div class="col-6 px-5">
                                    <span id="mod_prev_grand_total">900.00</span>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
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
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <h4>Trans No : <span id="trasaction_trans_no"></span></h4>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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
<div class="modal" id="select_item_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-full" style="height: 100%;">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-10 col-lg-10">
                            <h3>Products / Services</h3>
                        </div>
<!--                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                </div>
            </div>

             <div class="modal-body text-modal-size">
                <div class="col-12">

                    <div class="form-group row btn-info mb-0 py-2 mb-1" style="background: #8ac7d1;">
                        <div class="col-sm-12 col-md-6 col-lg-2 pr-1" hidden>
                            <select class="form-control font-size-18" id="item_type">
                                <option value="" selected disabled>Item Type</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-2 px-1 pt-2">
                            <input type="text" class="form-control txt-box-text-size font-size-18" placeholder="Product No" id="item_no" style="height: 40px !important;">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-8 px-1 pt-2">
                            <input type="text" class="form-control txt-box-text-size font-size-18" placeholder="Product Name" id="item_name" style="height: 40px !important;">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 px-1 pt-2">
                            <button class='btn btn-success btn-height-35 btn-block font-size-18' id="search" style="height: 40px !important;">Search</button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4 col-lg-2 px-1 pt-2">
                            <select class="form-control font-size-18 btn-height-30" id="item_category" style="height: 30px !important;">
                                <option value="" selected disabled>Item Category</option>
                            </select>
                        </div>                        
                        <div class="col-sm-6 col-md-4 col-lg-2 px-1 pt-2">
                            <select class="form-control font-size-18 btn-height-30" id="item_class" style="height: 30px !important;">
                                <option value="" selected disabled>Item Class</option>
                            </select>
                        </div>                        
                        <div class="col-sm-6 col-md-4 col-lg-2 px-1 pt-2">
                            <select class="form-control font-size-18 btn-height-30" id="item_brand" style="height: 30px !important;">
                                <option value="" selected disabled>Item Brand</option>
                            </select>
                        </div>                        
                        <div class="col-sm-6 col-md-4 col-lg-2 px-1 pt-2">
                            <select class="form-control font-size-18 btn-height-30" id="item_color" style="height: 30px !important;">
                                <option value="" selected disabled>Item Color</option>
                            </select>
                        </div>                        
                        <div class="col-sm-6 col-md-4 col-lg-2 px-1 pt-2">
                            <select class="form-control font-size-18 btn-height-30" id="item_size" style="height: 30px !important;">
                                <option value="" selected disabled>Item Size</option>
                            </select>
                        </div>                        
                        <div class="col-2 pl-1" hidden>
                            <input type="text" class="form-control txt-box-text-size font-size-18" placeholder="Product Model" id="item_model">
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-12 px-1" style="height: auto;">
                            <div id="div-tbl-items">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer py-1">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group row mb-0">
                        <div class="col-6 col-md-6 col-lg-6">
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 right" >
                            <!--btn-info-->
                            <button class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <select class="form-control" id="mod-select-discount" style="height: 45px !important;">
                                <option value="0" hidden selected> Discount</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12 pad-left">
                            <div class="input-group ">
                                <input type="text" class="form-control text-right border-right-0 pr-0" value="0" id="mod-text-discount" readonly>
                                <div class="input-group-append bg-white btn-height-35 px-0">
                                    <span class="input-group-text form-control" id="mod-text-type" style="height: 45px !important;">%</span>
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

<script>
    $(document).ready( function() { 

        $("#table_sales").hide();

        $("#add_item").click(function(){
            $("#table_sales").show();
            $("#sales_entry").hide();
            $("#prod_entry").hide();
        });

        $("#back_trans").click(function(){
            $("#table_sales").hide();
            $("#sales_entry").show();
            $("#prod_entry").show();
        });
    });

    
</script>

