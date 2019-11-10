<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_type.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/payment_type/payment_type_query.js') ?>"></script>
<input type="hidden" id="submodule_id" value="0">
<input type="hidden" id="app_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-title">
                        <h2>Payment Type Query</h2>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-2">

        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12 pr-2">
                <select class="form-control" id="payment_type_outlet">
                    <option hidden value="">Outlet</option>
                    <option value="0">ALL</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 px-2">
                <input type="text" class="form-control" placeholder="Search Product Type..." id="type_desc">
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12 px-2">
                <button class="btn btn-primary btn-block" id="search">Search</button>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="div-query">
                    
                </div>
            </div>
        </div>

    </div>
</div>


