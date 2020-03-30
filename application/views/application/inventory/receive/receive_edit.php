<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/inventory.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/inventory/receive/receive_edit.js') ?>"></script>
<body>
<input type="hidden" id="tbl_item_row" hidden readonly>
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>" readonly>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<!-- <style type="text/css">
body { display:block; }


@media only screen and (orientation:portrait){

  body {

/*    height: 100vw;*/

    -webkit-transform: rotate(90deg);

    -moz-transform: rotate(90deg);

    -o-transform: rotate(90deg);

    -ms-transform: rotate(90deg);

    transform: rotate(90deg);

  }

}

@media only screen and (orientation:landscape){

  #container, #header-container {

     -webkit-transform: rotate(0deg);

     -moz-transform: rotate(0deg);

     -o-transform: rotate(0deg);

     -ms-transform: rotate(0deg);

     transform: rotate(0deg);

  }

}
</style> -->

<div class="container-fluid pt-2">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Receive Inventory</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Edit</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">


        <!-- Receiving Entry -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container text-sales">

                    <div class="row mb-0">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <div class="form-group row mb-0">
                                <div class="col-6 col-xs-12 col-md-3 px-1">
                                    <span>Receive No. <span class="required">*</span></span>
                                    <input class="form-control txt-box-text-size" id="receive_no">
                                </div>
                                <div class="col-6 col-xs-12 col-md-3 px-1">
                                    <span>Receive Date <span class="required">*</span></span>
                                    <input type="Date" class="form-control txt-box-text-size" id="receive_date" value="<?php echo date("Y-m-d") ?>">
                                </div>
                                <div class="col-12 col-xs-12 col-md-6 px-1">
                                    <span>Transaction Type</span>
                                    <select class="form-control txt-box-text-size" id="trans_type">
                                    </select>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-12 col-xs-12 col-md-12 col-lg-4">
                            <div class="form-group row mb-0">  
                                <div class="col-xs-12 col-md-6 px-1" id="div-type-action">
                                    <span>Type of Action</span>
                                    <select class="form-control" id="type_action">
                                        <option value="1">For Refund</option>
                                        <option value="2">For Replacement</option>
                                    </select>
                                </div>
                                <div class="col-12 col-xs-12 col-md-6 px-1 ml-auto">
                                    <span>Receiving Outlet</span>
                                    <input type="text" class="form-control txt-box-text-size" id="outlet_rec" value="<?php echo $this->session->userdata('outlet_code') ?>" readonly>   
                                </div> 
                            </div>   
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8">   
                            <div class="form-group row mb-0">
                                <div class="col-12 col-xs-12 col-md-3 px-1">
                                    <span id="span_recipient_code">Customer Code <span class="required">*</span></span>
                                    <input class="form-control txt-box-text-size" id="outlet_code" data-type_1="0" data-id = "">
                                </div>
                                <div class="col-12 col-xs-12 col-md-9 px-1">
                                    <span id="span_recipient_name">Customer Name <span class="required">*</span></span>
                                    <input class="form-control txt-box-text-size" id="outlet_name">
                                </div>
                            </div>
                        </div>   
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4"> 
                            <div class="form-group row mb-0"> 
                                <div class="col-6 col-xs-12 col-md-6 px-1">
                                    <span>Ref Trans No.</span>
                                    <input class="form-control txt-box-text-size" id="trans_no">
                                </div>
                                <div class="col-6 col-xs-12 col-md-6 px-1">
                                    <span>Ref Trans Date</span>
                                    <input type="Date" class="form-control txt-box-text-size" id="trans_date">
                                </div>                              
                            </div>                          
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12">   
                            <div class="form-group row mb-0">
                                <div class="col-xs-12 col-md-12 px-1">
                                    <span>Remarks</span>
                                    <input class="form-control txt-box-text-size" id="remarks">
                                </div>
                            </div>
                        </div>   
                    </div>

                </div>
            </div>
        </div>

        <div class="row my-0 py-0">
            <div  class="col-xs-12 col-md-12 p-0 m-0">
                <div class="container">
                    <hr style="color: black;" class="my-2">
                    <div class="form-group row my-0 mx-0 bg-button">
                        <div class="col-xs-12 col-md-2 col-lg-3" id="div-btn-item"></div>
                        <div class="col-xs-12 col-md-4 col-lg-3 pad-center my-1" id="div-sales-register" hidden>
                            <button class="btn btn-block btn-warning p-0 btn-prod font-weight-600 btn-sales" id="sales_register">Select Sales Register</button>
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 ml-auto pad-left my-1" hidden>
                            <button class="btn btn-block btn-add btn-success p-0 btn-prod">Add Item</button>
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 pad-right">
                            <button class="btn btn-block btn-danger btn-exit p-0 my-1 btn-prod">Exit</button>
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 pad-center">
                            <button class="btn btn-block btn-primary btn-enter my-1 p-0 btn-prod" id="enter_item">Enter</button>
                        </div>
                    </div>                                    

                </div>
            </div>
        </div>

        <!-- Product Details Entry -->
        <div class="row prod_entry pb-2 bg-button m-0 collapse hide"> <!-- -->
            <div class="col-xs-12 col-md-12 text-sales">
                <div class="col-xs-12 col-md-12 ">
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group row mb-0" hidden>
                                <div class="col-xs-12 col-md-4 px-1">
                                    <span>Product Type</span>
                                    <input class="form-control txt-box-text-size" id="product_type"  readonly>
                                </div>
                                <div class="col-xs-12 col-md-8 px-1">
                                    <span>Product Specification</span>
                                    <input class="form-control txt-box-text-size" id="product_specs" readonly>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-xs-12 col-md-12">

                    <div class="form-group row mb-0" id="div-prod-tran-type-1">
                        <div class="col-12 col-xs-12 col-md-2 col-lg-2 px-1">
                            <span>Product No.</span>
                            <input class="form-control txt-box-text-size" id="prod_no" data-unit="" data-id = "0s">
                        </div>
                        <div class="col-12 col-xs-12 col-md-6 col-lg-8 px-1">
                            <span>Product Name</span>
                            <input class="form-control txt-box-text-size" id="prod_name">
                        </div>
                        <div class="col-12 col-xs-12 col-md-2 col-lg-2 px-1" hidden>
                            <span>Product Quality</span>
                            <select class="form-control" id="prod_grade">
                                <option value="1">Good Stock</option>
                                <option value="2">Damaged / B.O.</option>
                            </select>
                        </div>
                        <div class="col-6 col-xs-12 col-md-2 col-lg-1 px-1">
                            <span>Qty</span>
                            <input class="form-control text-right txt-box-text-size" id="qty">
                        </div>
                        <div class="col-6 col-xs-12 col-md-2 col-lg-1 px-1">
                            <span>Unit</span>
                            <input class="form-control txt-box-text-size" id="prod_unit" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0" id="div-prod-tran-type-2">
                        <div class="col-6 col-xs-12 col-md-2 col-lg-1 px-1">
                            <span>Cur</span>
                            <select class="form-control txt-box-text-size" id="currency">
                                
                            </select>
                        </div>
                        <div class="col-6 col-xs-12 col-md-4 col-lg-2 px-1">
                            <span>Unit Price</span>
                            <input class="form-control txt-box-text-size text-right" id="cost" >
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-1 px-1">
                            <span>VAT</span>
                            <select class="form-control txt-box-text-size" id="vat">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1" hidden>
                            <span>Total VAT</span>
                            <input class="form-control text-right txt-box-text-size" id="net_vat" value="0" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-2 px-1">
                            <span>U.C. w/o Vat</span>
                            <input type="text" class="form-control text-right txt-box-text-size" id="uc_w_o_vat" value="0" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-2 px-1">
                            <span>U.C. w/ Vat</span>
                            <input type="text" class="form-control text-right txt-box-text-size" id="uc_w_vat" value="0" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-2 px-1">
                            <span>Total (w/o VAT)</span>
                            <input class="form-control text-right txt-box-text-size" id="tot_w_o_vat" value="0" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-2 px-1">
                            <span>Total (w/VAT)</span>
                            <input class="form-control text-right txt-box-text-size" id="tot_w_vat" value="0" readonly>
                        </div>

                    </div>

                    <div class="form-group row mb-0" id="div-prod-transfer-dtl-1" >
                        <div class="col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Product No</span>
                            <input type="text" class="form-control" id="prod_no_transfer" data-id="0">
                        </div>
                        <div class="col-lg-10 col-md-10 col-xs-12 px-1">
                            <span>Product Name</span>
                            <input type="text" class="form-control" id="prod_name_transfer">
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 px-1" hidden>
                            <span>Product Quality</span>
                            <input type="text" class="form-control" id="prod_quality_transfer" value="Good Stock" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0" id="div-prod-transfer-dtl-2" >
                        <div class="col-6 col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Qty Issued</span>
                            <input type="text" class="form-control text-right" id="prod_qty_issued_transfer" value="0" readonly>
                        </div>
                        <div class="col-6 col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Qty Received</span>
                            <input type="text" class="form-control text-right" id="prod_qty_received_transfer">
                        </div>
                        <div class="col-6 col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Unit</span>
                            <input type="text" class="form-control" id="prod_unit_transfer" readonly>
                        </div>
                        <div class="col-6 col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Currency</span>
                            <select class="form-control" id="prod_curr_transfer" disabled> 
                                <option value="121">PHP</option>
                            </select>
                        </div>
                        <div class="col-6 col-lg-2 col-md-2 col-xs-12" hidden>
                            <span>VAT</span>
                            <select class="form-control" id="prod_vat_transfer">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Unit Price</span>
                            <input type="text" class="form-control text-right" id="prod_unit_price_transfer" readonly>
                        </div>
                        <div class="col-12 col-lg-2 col-md-2 col-xs-12 px-1">
                            <span>Total Amount</span>
                            <input type="text" class="form-control text-right" id="prod_total_amount_transfer" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Brand</span>
                            <input class="form-control" id="product_brand" readonly>
                              
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Model</span>
                            <input class="form-control" id="product_model" readonly>
                               
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Category</span>
                            <input class="form-control" id="product_category" readonly>
                            
                        </div>
                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Color</span>
                            <input class="form-control" id="product_color" readonly> 
                             
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Size</span>
                            <input class="form-control" id="product_class" readonly>
                            
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Class</span>
                            <input class="form-control" id="product_size" readonly>
                               
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Purchase Cost</span>
                            <input class="form-control" id="cost">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END Product Details Entry -->


        <!-- Table for Product Details Entry -->
        <div class="row pt-2">
            <div class="col-xs-12 col-md-12 px-3">
                <div class="container">
                    <div class="form-group row">

                        <table class="table table-striped table-fixed fixed_header text-table table-hover table-sm" id="tbl-products">
                            <thead style="width: 100%;">
                                <tr>
                                    <th style="width: 2.5%;" class="text-left">Product No</th>
                                    <th style="width: 7%;" class="text-left d-none d-lg-table-cell">Product Name</th>
                                    <th style="width: 1%;" class="text-left">Qty</th>
                                    <th style="width: 1%;" class="text-left d-none d-lg-table-cell">Unit</th>
                                    <th style="width: 1%;" class="text-left d-none d-lg-table-cell">Cur</th>
                                    <th style="width: 1%;" class="text-left d-none d-lg-table-cell">Cost</th>
                                    <th style="width: 1%;" class="text-center d-none d-lg-table-cell">VAT</th>
                                    <th style="width: 2%;" class="text-left">Total Price</th>
                                    <th style="width: 1%;" class="text-center"><i class='fa fa-minus-circle' style='color:red;'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <table class="table table-striped table-fixed fixed_header text-table table-hover table-sm" id="tbl-sales-products">
                            <thead style="width: 100%;">
                                <tr>
                                    <th style="width: 2.5%;" class="text-left">Product No</th>
                                    <th style="width: 7%;" class="text-left d-none d-lg-table-cell">Product Name</th>
                                    <th style="width: 2%;" class="text-left">Returned Qty</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">Unit</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">Reference</th>
                                    <th style="width: 1%;" class="text-center"><i class='fa fa-minus-circle' style='color:red;'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <table class="table table-striped table-fixed fixed_header text-table table-hover table-sm" id="tbl-transfer-products" >
                            <thead class="w-100">
                                <tr>
                                    <th style="width: 2.5%;" class="text-left">Product No</th>
                                    <th style="width: 7%;" class="text-left d-none d-lg-table-cell">Product Name</th>
                                    <th style="width: 2%;" class="text-left">Qty Issued</th>
                                    <th style="width: 2%;" class="text-left">Qty Received</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">Unit</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">UC</th>
                                    <th style="width: 2%;" class="text-left">Total Price</th>
                                    <th style="width: 1%;" class="text-center"><i class='fa fa-minus-circle' style='color:red;'></i></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        <!-- END Table for Product Details Entry -->
 
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-warning cust-text font-weight-bold"  id="preview">Preview</button>
                        </div>
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-success cust-text font-weight-bold"  id="save">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-orange cust-text font-weight-bold" id="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Receiving Entry -->
    </div>
</div>



<!-- Modal for Saving Receiving Product -->
<div class="modal fade" id="save_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-xs-12 col-md-12">
                    <span>Receive No. S000001 has been saved.</span>
                </div>
            </div>

            <div class="modal-footer">
                <div class="col-xs-12 col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <button class="btn btn-grey btn-block">OK</button>
                </div>
                <div class="col-xs-12 col-md-4"></div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for Saving Receiving Product -->

<!-- Modal for Sales Register -->
<div class="modal" id="modal_sales_register" style="top: 0% !important;">
    <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title">Sales Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body pt-0">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-4 pr-1">
                                <span class="font-size-18">Trans Date</span>
                                <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="sales_register_trans_date">
                            </div>
                            <div class="col-lg-4 px-1">
                                <span class="font-size-18">Trans No</span>
                                <input type="text" class="form-control" id="sales_register_trans_no">
                            </div>
                            <div class="col-lg-4 px-1">
                                <span class="font-size-18">Cust Code</span>
                                <input type="text" class="form-control" id="sales_register_cust_code">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 px-1">
                        <span class="font-size-18">Customer Name</span>
                        <input type="text" class="form-control" id="sales_register_cust_name">
                    </div>
                    <div class="col-lg-2 pl-1">
                        <span class="font-size-18">Agent</span>
                        <input type="text" class="form-control" id="sales_register_agent">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="bg-button py-1">
                            <div class="col-lg-2 ml-auto text-right pr-1">
                                <button class="btn btn-success py-0 btn-height-30 " id="sales_register_search">Search</button>                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12" >
                        <div style="height: 150px;overflow: auto;border: 1px solid gray;" id="sales_register_hdr">
                            
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12" >
                        <div style="height: 225px;overflow:auto;border: 1px solid gray;" id="sales_register_dtl">
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-orange px-3 btn-height-35" id="sales_register_continue">Continue</button>
                <button type="button" class="btn btn-danger px-3 btn-height-35" id="sales_register_cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modal for Sales Register -->

<!-- Modal for Sales Returns Details -->
<div class="modal" id="sales_returns_modal">
  <div class="modal-dialog" style="max-width: 600px !important;">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h4 class="modal-title">Sales Returns Details</h4>
        <input type="hidden" id="sales_returns_row">
        <input type="hidden" id="sales_returns_type">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body pt-1 pb-2">
        <div class="row">
            <div class="col-lg-4 pad-right">
                <span>Qty to Return</span>
                <input type="text" class="form-control text-right" id="sales_returns_qty">
            </div>
            <div class="col-lg-3 pad-center">
                <span>Unit</span>
                <input type="text" class="form-control" id="sales_returns_unit" readonly>
            </div>
            <div class="col-lg-3 pad-center" hidden>
                <span>Product Quality</span>
                <select class="form-control" id="sales_returns_product_grade"> 
                    <option value="2">Damaged / B.O.</option>
                    <option value="1">Good Stock</option>
                </select>
            </div>
            <div class="col-lg-5 pad-left">
                <span>Date Returned</span>
                <input type="date" class="form-control" id="sales_returns_date" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="form-group pt-1 mb-0">
                    <label for="sales_returns_reason">Reason:</label>
                    <textarea class="form-control" rows="3" id="sales_returns_reason"></textarea>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer py-2">
        <div class="container">
            <div class="col-lg-12 px-0">
                <div class="row">
                    <div class="col-lg-6 pad-left">
                        <button class="btn btn-block btn-danger" id="sales_returns_cancel">Cancel</button>
                    </div>
                    <div class="col-lg-6 pad-right">
                        <button class="btn btn-block btn-success" id="sales_returns_continue">Continue</button>
                    </div>
                </div>                
            </div>            
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Modal for Sales Returns Details -->


<div class="modal" id="preview_modal"  style="margin-top: -5%;">
    <div class="modal-dialog modal-dialog-scrollable modal-full modal-xl">
        <div class="modal-content">
            <div class="modal-header pb-0 pt-2">
                <div class="container-fluid mx-0 ">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pl-0">
                            <h3 class="">Account No. <?php echo $this->session->userdata("user_uname"); ?></h3>
                        </div>
                        <div class="col-lg-6 col-md-6 pl-0 text-right">
                            <h3 class="">Receiving From <span id="mod_tran_type"></span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal pb-0 font-size-18">
                <div class="col-xs-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-8">
    
                            <div class="form-group row mb-0">
                                <span class="font-weight-600 col-md-2 px-0">Receive From</span>
                                <div class="col-xs-12 col-md-2 pr-0">
                                    <span id="mod_recipient_code">00000125</span>                                    
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <span id="mod_recipient_name">John Rey</span>
                                </div>
                            </div>

                            <div class="form-group row mb-0" >
                                <span class="font-weight-600 col-md-2">Received By</span>
                                <div class="col-xs-12 col-md-10 ">
                                    <span>: <?php echo $this->session->userdata("user_fullname"); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="font-weight-600 col-md-2 px-0">Remarks</span>
                                <div class="col-xs-12 col-md-10">
                                    <span id="mod_ref_remarks">This a test .</span> 
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-4 px-0">

                            <div class="form-group row mb-0">
                                <span class="font-weight-600 col-md-5 px-0">Receive No.</span>
                                <div class="col-xs-12 col-md-7 pl-0">
                                    <span id="mod_trans_no" class="font-weight-600">00000012</span>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <span class="font-weight-600 col-md-5 px-0">Receive Date</span>
                                <div class="col-xs-12 col-md-7 pl-0">
                                    <span id="mod_trans_date">09/12/2019</span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <span class="font-weight-600 col-md-5 px-0">Receiving Outlet</span>
                                <div class="col-xs-12 col-md-7 pl-0">
                                    <span>: <?php echo $this->session->userdata("outlet_code"); ?></span>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <span class="font-weight-600 col-md-5 px-0">Reference No</span>
                                <div class="col-xs-12 col-md-7 pl-0">
                                    <span id="mod_ref_no">00000125</span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <span class="font-weight-600 col-md-5 px-0" style="">Reference Date</span>
                                <div class="col-xs-12 col-md-7 pl-0">
                                    <span id="mod_ref_date">John Rey</span>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12">
                    <div class="row" style="padding-right: 10px;"> 

                        <table class="table table-striped table-fixed text-table table-sm mb-0" id="mod-tbl-products">
                            <thead class="w-100">
                                <tr>
                                    <th style="width: 2.5%;" class="text-left">Product No</th>
                                    <th style="width: 8%;" class="text-left d-none d-lg-table-cell">Product Name</th>
                                    <th style="width: 1%;" class="text-left">Qty</th>
                                    <th style="width: 1%;" class="text-left d-none d-lg-table-cell">Unit</th>
                                    <th style="width: 1%;" class="text-left d-none d-lg-table-cell">Curr</th>
                                    <th style="width: 1%;" class="text-left d-none d-lg-table-cell">Cost</th>
                                    <th style="width: 1%;" class="text-center d-none d-lg-table-cell">VAT</th>
                                    <th style="width: 2%;" class="text-left">Total Price</th>
                                </tr>
                            </thead>
                            <tbody style="height:200px;">                                 
                            </tbody>
                        </table>

                        <table class="table table-striped table-fixed fixed_header text-table table-hover table-sm" id="mod-tbl-sales-products">
                            <thead style="width: 100%;">
                                <tr>
                                    <th style="width: 2.5%;" class="text-left">Product No</th>
                                    <th style="width: 7%;" class="text-left d-none d-lg-table-cell">Product Name</th>
                                    <th style="width: 2%;" class="text-left" id='pre-rtn-qty'>Returned Qty</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">Unit</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">Reference</th>
                                    <th style="width: 1%;" class="text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <table class="table table-striped table-fixed fixed_header text-table table-hover table-sm" id="mod-tbl-transfer-products" >
                            <thead class="w-100">
                                <tr>
                                    <th style="width: 2.5%;" class="text-left">Product No</th>
                                    <th style="width: 7%;" class="text-left d-none d-lg-table-cell">Product Name</th>
                                    <th style="width: 2%;" class="text-left" id='pre-iss-qty'>Qty Issued</th>
                                    <th style="width: 2%;" class="text-left" id='pre-rcvd-qty'>Qty Received</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">Unit</th>
                                    <th style="width: 1.5%;" class="text-left d-none d-lg-table-cell">UC</th>
                                    <th style="width: 2%;" class="text-left">Total Price</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="modal-footer text-sales">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2">   
                            <button class="btn btn-orange btn-block" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-lg-5 ml-auto">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 ml-auto">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="font-weight-600">Total Qty : </span>   
                                        </div>   
                                        <div class="col-auto">
                                            <span id="mod_total_qty">0</span>   
                                        </div>
                                    </div>   
                                </div>   
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-auto">   
                                            <span class="font-weight-600">Total Amount : </span>
                                        </div>   
                                        <div class="col-auto"> 
                                            <span id="mod_total_amount">1,000,000.00</span>  
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


