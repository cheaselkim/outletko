<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/inventory.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/inventory/adjustment/adjustment_entry.js') ?>"></script>
<input type="hidden" id="adjustment_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-3 px-0">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold"> Inventory Adjustment</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Entry</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row my-0" >
                        <div class="col-xs-12 col-md-2 pr-1 pl-0">
                            <label class="font-size-18">Product Type</label>
                            <select class="form-control" id="product_type">
                                
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-5 px-1">
                            <label class="font-size-18">Keyword</label>
                            <input type="text" class="form-control" placeholder="Search Product No, Product name" data-id = "" id="search_box">
                        </div>
                        <div class="col-6 col-xs-12 col-md-3 px-1">
                            <label class="font-size-18">Product Class</label>
                            <select class="form-control" id="product_class">
                                <option value="0">ALL</option>
                            </select>
                        </div>
                        <div class="col-6 col-xs-12 col-md-2 pr-0 pl-1" >
                            <label class="font-size-18">Status</label>
                            <select class="form-control" id="product_status">
                                <option value="1">Active</option>
                                <option value="3">Hold</option>
                                <option value="4">Phase Out</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row bg-button my-0">
                        <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto pad-right ">
                            <button class="btn btn-success btn-prod btn-block p-0" id="search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-2">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row my-0">
                        <div class="col-9 col-lg-10 text-right pt-1">
                            <label class="font-size-18">No. of Products/Services : </label>
                        </div>
                        <div class="col-3 col-lg-2 text-right px-0">
                            <input type="text" class="form-control text-center ml-auto" value="0" id="no_products" readonly>
                        </div>
                    </div>              
                </div>
            </div>
        </div>

        <!--         <hr style="color: black;" class="my-2"> -->

        <div class="row">
            <div class="col-xs-2 col-md-12" id="query-table">

            </div>
        </div>

    </div>
</div>


<!-- The Modal -->
<div class="modal" id="modal_adjustment">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header py-2">
                <h4 class="modal-title">Inventory Adjustment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body py-2">
                <div class="container px-0">


                    <div class="row mb-1">
                        <div class="col-6 col-lg-4 col-md-4 col-sm-4 pad-right">
                            <span>Adjustment No</span>
                            <input type="text" class="form-control" id="adjustment_no" value="0001" readonly>
                        </div>
                        <div class="col-6 col-lg-4 col-md-4 col-sm-4 pad-center">
                            <span>Adjustment Date</span>
                            <input type="text" class="form-control" id="adjustment_date" value="<?php echo date('m/d/Y') ?>" readonly>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-4 pad-left">
                            <span>Outlet</span>
                            <input type="text" class="form-control" value="<?php echo  $this->session->userdata("outlet_code"); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-6 col-lg-4 col-md-4 col-sm-4 pad-right">
                            <span>Product No</span>
                            <input type="text" class="form-control" id="adjustment_prod_no" data-id = "" readonly>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3 col-sm-3 pad-center">
                            <span>Product Grade</span>
                            <input type="text" class="form-control px-0" id="adjustment_prod_grade" readonly>
                        </div>
                        <div class="col-6 col-lg-2 col-md-2 col-sm-2 pad-center">
                            <span>Unit</span>
                            <input type="text" class="form-control" id="adjustment_prod_unit" readonly>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3 col-sm-3 pad-left">
                            <span>Stock on Hand</span>
                            <input type="text" class="form-control text-right" id="adjustment_stock" readonly>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-6 col-lg-4 col-md-4 col-sm-4 pad-right">
                            <span>Adjustment Type</span>
                            <select class="form-control" id="adjustment_type" >
                            </select>
                        </div>
                        <div class="col-6 col-lg-4 col-md-4 col-sm-4 pad-center">
                            <span>Adjustment Qty <span class="required">*</span></span>
                            <input type="text" class="form-control text-right" id="adjustment_qty" >
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-4 pad-left">
                            <span>Total Qty</span>
                            <input type="text" class="form-control text-right" id="adjustment_total_qty" readonly>
                        </div>                        
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <span>Reason <span class="required">*</span> </span>
                            <textarea cols="2" class="form-control" id="adjustment_remarks"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer py-2">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                            <button type="button" class="btn btn-success btn-block" id="save">Save</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                            <button type="button" class="btn btn-orange btn-block" data-dismiss="modal">Cancel</button>                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>