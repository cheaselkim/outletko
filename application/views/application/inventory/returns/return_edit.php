<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/inventory.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/inventory/return/return_edit.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/application/inventory/return/return_entry.js') ?>"></script>
<input type="hidden" id="tbl_item_row">
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">

<div class="container-fluid pt-2">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Return Inventory</h3>
                    </div>
                    <div class="col-xs-6 col-md-6 pt-3 text-right" >
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
                        <div class="col-8">
                            <div class="form-group row mb-0">
                                <div class="col-xs-12 col-md-3 px-1">
                                    <span>Return No.  <span class="required">*</span></span>
                                    <input class="form-control txt-box-text-size" id="return_no">
                                </div>
                                <div class="col-xs-12 col-md-3 px-1">
                                    <span>Return Date <span class="required">*</span></span>
                                    <input type="Date" class="form-control txt-box-text-size" value="<?php echo date("Y-m-d") ?>" id="return_date">
                                </div>
                                <div class="col-xs-12 col-md-6 px-1">
                                    <span>Transaction Type <span class="required">*</span></span>
                                    <select class="form-control txt-box-text-size" id="tran_type">
                                        <option value="8">Purchase Returns</option>
                                        <option value="9">Transfer</option>
                                    </select>
                                </div>
                            </div>    
                        </div>
                        <div class="col-4">
                            <div class="form-group row mb-0">  
                                <div class="col-xs-12 col-md-6 px-1 ml-auto">
                                    <span>Source Outlet</span>
                                    <input type="text" class="form-control txt-box-text-size" value="<?php echo $this->session->userdata('outlet_code') ?>" readonly>   
                                </div> 
                            </div>   
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-8">   
                            <div class="form-group row mb-0">
                                <div class="col-xs-12 col-md-3 px-1">
                                    <span>Returned To Code <span class="required">*</span></span>
                                    <input class="form-control txt-box-text-size" id="recipient_code" data-type_1="0" data-id = "">
                                </div>
                                <div class="col-xs-12 col-md-9 px-1">
                                    <span>Returned To Name <span class="required">*</span></span>
                                    <input class="form-control txt-box-text-size" id="recipient_name">
                                </div>
                            </div>
                        </div>   
                        <div class="col-4"> 
                            <div class="form-group row mb-0"> 
                                <div class="col-xs-12 col-md-6 px-1">
                                    <span>Ref Trans No.</span>
                                    <input class="form-control txt-box-text-size" id="ref_trans_no">
                                </div>
                                <div class="col-xs-12 col-md-6 px-1">
                                    <span>Ref Trans Date</span>
                                    <input type="Date" class="form-control txt-box-text-size" id="ref_trans_date">
                                </div>                              
                            </div>                          
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12">   
                            <div class="form-group row mb-0">
                                <div class="col-xs-12 col-md-12 px-1">
                                    <span>Reason</span>
                                    <input class="form-control txt-box-text-size" id="reason">
                                </div>
<!--                                 <div class="col-xs-12 col-md-4 px-1">
                                    <span>Source Outlet</span>
                                    <input class="form-control txt-box-text-size">
                                </div> -->
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
                    <div class="form-group row py-1 my-0 mx-0 bg-button">
                        <div class="col-xs-12 col-md-6"></div>
                        <div class="col-xs-12 col-md-2 pr-1">
                            <button class="btn btn-block btn-danger btn-exit p-0 btn-prod">Exit</button>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <button class="btn btn-block btn-primary btn-enter p-0 btn-prod" id="enter_item">Enter</button>
                        </div>
                        <div class="col-xs-12 col-md-2 ml-auto pl-1">
                            <button class="btn btn-block btn-add btn-success p-0 btn-prod">Add Item</button>
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

                    <div class="form-group row mb-0" >
                        <div class="col-xs-12 col-md-4 px-1">
                            <span>Product No.</span>
                            <input class="form-control txt-box-text-size" id="prod_no" data-unit="" data-id = "">
                        </div>
                        <div class="col-xs-12 col-md-8 px-1">
                            <span>Product Name</span>
                            <input class="form-control txt-box-text-size" id="prod_name">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-2 px-1">
                            <span>Qty on Hand</span>
                            <input class="form-control text-right txt-box-text-size" id="qty_on_hand" value="0" readonly>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span>Qty to issue</span>
                            <input class="form-control text-right txt-box-text-size" id="qty">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span>Unit</span>
                            <input class="form-control txt-box-text-size" id="prod_unit" readonly>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span>Currency</span>
                            <select class="form-control txt-box-text-size" id="currency">
                                
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span>Unit Price</span>
                            <input class="form-control txt-box-text-size text-right" id="prod_price" value="0" readonly>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span>Total (w/VAT)</span>
                            <input class="form-control text-right txt-box-text-size" id="prod_total_price" value="0" readonly>
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
                                    <th style="width: 7%;" class="text-left">Product Name</th>
                                    <th style="width: 1.5%;" class="text-left">Qty</th>
                                    <th style="width: 1%;" class="text-left">Unit</th>
                                    <th style="width: 1.5%;" class="text-left">Currency</th>
                                    <th style="width: 2%;" class="text-left">Unit Price</th>
                                    <th style="width: 2%;" class="text-left">Total Price</th>
                                    <th style="width: 1%;" class="text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block btn-warning cust-text font-weight-bold" id="preview">Preview</button>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block btn-success cust-text font-weight-bold"  id="update">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-4">
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
                    <span>Return No. S000001 has been saved.</span>
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


<div class="modal" id="preview_modal">
    <div class="modal-dialog modal-dialog-scrollable modal-full modal-xl">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <div class="container-fluid mx-0 ">
                    <div class="row">
                        <div class="col-lg-6 col-md-9 pl-0">
                            <h3>Return Inventory</h3>
                        </div>
                        <div class="col-auto text-right ml-auto pr-3">
                            <div class="row ml-auto pad-right">
                                <div class="col-auto">
                                    <span class="font-weight-600 font-size-18">Transaction Type :</span>
                                </div>
                                <div class="col-auto pad-left">
                                    <span class="font-size-18" id="mod_tran_type"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-modal pb-0 font-size-18">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group row mb-0">
                                <span class="font-weight-bold">Account ID : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_accoount_d"><?php echo  $this->session->userdata('account_id'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group row mb-0">
                                <span class="font-weight-bold">Return No. : </span>
                                <div class="col-xs-12 col-md-6 pl-2 ">
                                    <span id="mod_trans_no">00000012</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 pr-0">
                            <div class="form-group row mb-0" >
                                <span class="font-weight-bold">Returned By : </span>
                                <div class="col-xs-12 col-md-8 pr-0 pl-2">
                                    <span><?php echo $this->session->userdata("user_fullname"); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0" >
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group row mb-0">
                                <span class="font-weight-bold">Outlet No. : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span><?php echo $this->session->userdata("outlet_code"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group row mb-0">
                                <span class="font-weight-bold">Return Date : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_trans_date">09/12/2019</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group row mb-0">
                                <span class="font-weight-bold">Source Outlet : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span><?php echo $this->session->userdata("outlet_code"); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group row mb-0">
                            <span class="font-weight-bold">Recipient Code : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_recipient_code">00000125</span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                            <span class="font-weight-bold" style="padding-left: 69px;">Name : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_recipient_name">John Rey</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group row mb-0">
                            <span class="font-weight-bold">Ref Trans No : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_ref_no">00000125</span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                            <span class="font-weight-bold" style="">Ref Trans Date : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_ref_date">John Rey</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group row">
                                <span class="font-weight-bold">Reason : </span>
                                <div class="col-xs-12 col-md-6 pl-2">
                                    <span id="mod_ref_remarks">This a test .</span> 
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
                                    <th style="width: 9%;" class="text-left">Product Name</th>
                                    <th style="width: 1.5%;" class="text-left">Qty</th>
                                    <th style="width: 1%;" class="text-left">Unit</th>
                                    <th style="width: 1.5%;" class="text-left">Currency</th>
                                    <th style="width: 2%;" class="text-left">Unit Price</th>
                                    <th style="width: 2%;" class="text-left">Total Price</th>
                                </tr>
                            </thead>
                            <tbody style="height:200px;">                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-sales">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span>Total Qty : </span>   
                                        </div>   
                                        <div class="col-auto">
                                            <span id="mod_total_qty">0</span>   
                                        </div>
                                    </div>   
                                </div>   
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="row">
                                        <div class="col-auto">   
                                            <span>Total Amount : </span>
                                        </div>   
                                        <div class="col-auto"> 
                                            <span id="mod_total_amount">1,000,000.00</span>  
                                        </div>
                                    </div>   
                                </div>
                            </div>   
                        </div>   
                        <div class="col-lg-2">   
                            <button class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>