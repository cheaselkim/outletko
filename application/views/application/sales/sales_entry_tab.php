<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/sales_tab.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/header.js') ?>"></script>
<input type="hidden" id="prod_id">
<input type="hidden" id="tbl_item_row">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

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
                    <input type="text" class="form-control txt-box-text-size" id="partner" readonly placeholder="Agent">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <input type="text" class="form-control txt-box-text-size" placeholder="Customer Name" id="cust_name">
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
                            <input type="text" class="form-control ml-1 txt-box-text-size" id="stock_qty" readonly placeholder="On Hand">
                        </div>
                        <input type="text" class="form-control ml-1 txt-box-text-size" id="stock_uom" readonly placeholder="Unit">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 mt-1">
            <div class="row">
                <div class="col-12 col-md-12">
                    <input type="text" class="form-control txt-box-text-size" id="prod_name" placeholder="Product Name">
                </div>
            </div>
        </div>
    </div>
</div>

<hr style="color: black;" class="my-2">

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
                            <span class="col-6 text-sales" for="text-input">Quantity Price</span>
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
                            <span class="col-3 text-sales" for="text-input">Vol. Disc.</span>
                            <div class="col-3">
                                <input class="form-control text-right vol-disc-text-size" id="" type="text" placeholder="0.00" >
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
                                <input class="form-control text-right txt-box-text-size" id="share_per" type="text" placeholder="5.00" value="5.00" readonly>
                            </div>
                            <div class="col-6">
                                <input class="form-control text-right txt-box-text-size" id="share_amount" type="text" placeholder="0.00" readonly>
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
                                <button class="form-control btn-info btn-block cust-text" data-toggle="modal" data-target="#payment_modal">Payment Type</button>
                                <button class="form-control btn-danger btn-block cust-text" onclick="reset_input();" hidden>Cancel</button>
                            </div>
                            <div class="col-6">
                                <button class="form-control btn-primary btn-block cust-text" id="add_item">Enter</button>
                            </div>
                        </div>
                        <div class="form-group row mb-2" hidden>
                            <div class="col-6">
                                <button class="form-control btn-block btn-warning cust-text" data-toggle="modal" data-target="#preview_modal" onclick="preview_data();">Preview</button>
                            </div>
                            <div class="col-6">
                                <button class="form-control btn-block btn-success cust-text" data-toggle="modal" data-target="#trans_modal" id="save_trans">Save</button> 
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
            <thead>
                <tr>
                    <th  class="d-xl-table-cell d-lg-none d-md-none d-none">PN</th>
                    <th class="th-table-wd">Product Name</th>
                    <th >Qty.</th>
                    <th  hidden="">UM</th>
                    <th  class="d-xl-table-cell d-lg-none d-md-none d-none">Curr</th>
                    <th  hidden="">Selling Price</th>
                    <th >Total Price</th>
                    <th  class="text-center text-red"><span class="fa fa-minus-circle"></span></th>
                </tr>
            </thead>
            <tbody>                                                  
            <?php for ($i=1; $i <= 20; $i++) { ?>
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
            <?php } ?>
            </tbody>
        </table>
    <!-- </div> -->

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">Total Amount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" id="sales_discount" placeholder="0.00">
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">Trans Discount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" placeholder="0.00" id="vat_amount" readonly>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-6">
            <span class="text-sales">Trans Amount</span>
        </div>
        <div class="col-6">
            <input type="text" class="form-control text-right txt-box-text-size" placeholder="0.00" id="trans_amount" readonly>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-6">
            <button class="form-control btn-warning cust-text" id="back_trans">Back</button>
        </div>
        <div class="col-6">
            <button class="form-control btn-info cust-text" data-toggle="modal" data-target="#trans_modal" id="save_trans">Preview</button>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-6">
            <button class="form-control btn-danger cust-text" id="back_trans">Cancel</button>
        </div>
        <div class="col-6">
            <button class="form-control btn-success cust-text" data-toggle="modal" data-target="#trans_modal" id="save_trans">Save</button>
        </div>
    </div>
</div>

<!-- Modal for Payment -->
<div class="modal" id="payment_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-small">
        <div class="modal-content">
            <div class="modal-header modal-hdr-height">
                <div class="col-12 col-md-12">
                    <div class="form-group row">
                        <div class="col-10 col-md-10">
                            <h3>Payment Details</h3>
                        </div>
                        <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12 col-md-12">
                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Payment Date</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <input type="date" class="form-control txt-box-text-size" id="payment_date">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Payment Term</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <select class="form-control border-black txt-box-text-size" id="payment_term">
                                <option>COD</option>
                                <option>Terms</option>
                                <option>Terms w/PDC</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Payment Type</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <select class="form-control border-black txt-box-text-size" id="payment_type">
                                <option>Cash</option>
                                <option>Check</option>
                                <option>Card</option>
                                <option>Bank Deposit</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Currency</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <select class="form-control border-black txt-box-text-size" id="currency">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Amount</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <select class="form-control border-black txt-box-text-size" id="amount">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Bank Name</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <select class="form-control border-black txt-box-text-size" id="bank_name">
                                <option selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Check/Card No.</span>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control txt-box-text-size" id="check_no">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Check Date</span>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control txt-box-text-size" id="check_date">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Depository Bank</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <select class="form-control border-black txt-box-text-size" id="dep_bank">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>No. of Days</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <input type="text" class="form-control text-right txt-box-text-size" id="no_days" value="0.00">
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-6 col-md-6 ">
                            <span>Due Date</span>
                        </div>
                        <div class="col-6 col-md-6 ">
                            <input type="date" class="form-control txt-box-text-size" id="due_date">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-sales modal-ftr-height">
                <div class="col-12 col-md-12 2">
                    <div class="form-group row">
                        <div class="col-6 col-md-6  left">
                            <button class="btn btn-danger btn-block text-lg cust-text" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6 col-md-6  right">
                            <button class="btn btn-warning btn-block text-lg cust-text" data-dismiss="modal">Continue</button>
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
<div class="modal" id="trans_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-small">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12 col-md-12">
                    <div class="form-group row">
                        <div class="col-10">
                            <h3>Transaction</h3>
                        </div>
                        <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal-size">
                <div class="col-12">
                    <div class="form-group row text-sales">
                        <div class="col-7">
                            <span class="text-modal">Payment Type</span>
                        </div>
                        <div class="col-5">
                            <span id="mod_payment_type">CASH</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-7">
                            <span class="text-modal">Total Sales</span>
                        </div>
                        <div class="col-5">
                            <span id="mod_total_sales">950.00</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-7">
                            <span class="text-modal">Discount</span>
                        </div>
                        <div class="col-5">
                            <span id="mod_discount">50.00</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-7">
                            <span class="text-modal">Grand Total Sales</span>
                        </div>
                        <div class="col-5">
                            <span class="text-date" id="mod_grand_total">900.00</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-7">
                            <span class="text-modal">Amount Paid</span>
                        </div>
                        <div class="col-5">
                            <span class="text-date" id="mod_amount_paid">1,000.00</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-7">
                            <span class="text-modal">Change</span>
                        </div>
                        <div class="col-5">
                            <span class="text-date" id="mod_change">100.00</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-7">
                            <span class="text-modal">Partner / Agent</span>
                        </div>
                        <div class="col-5">
                            <span class="text-date" id="mod_partner">Francis</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <span class="text-modal">Share %:</span>
                        </div>
                        <div class="col-3">
                            <span>5 %</span>
                        </div>
                        <div class="col-5">
                            <span class="text-date" id="mod_share">45.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

