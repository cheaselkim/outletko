<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/inventory.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/inventory/adjustment/adjustment_query.js') ?>"></script>
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
                        <h3 class="font-weight-bold">Query</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row my-0" >
                        <div class="col-6 col-xs-12 col-md-2 pr-1 pl-0">
                            <label class="font-size-18">Adjustment Date</label>
                            <input type="date" class="form-control" id="adjustment_date" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-6 col-xs-12 col-md-2 pr-1 pl-0">
                            <label class="font-size-18">Adjustment Type</label>
                            <select class="form-control" id="adjustment_type">
                                
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-6 px-1">
                            <label class="font-size-18">Keyword</label>
                            <input type="text" class="form-control" placeholder="Search Adjustment No, Product No, Product name" data-id = "" id="search_box">
                        </div>
                        <div class="col-xs-12 col-md-2 pr-0 pl-1" >
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
                        <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto pad-center">
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

