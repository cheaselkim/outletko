<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_color.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/outlet_type/outlet_type_edit.js') ?>"></script>
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">
<input type="hidden" id="submodule_id" value="0">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-2">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 pr-4">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 col-sm-6 pt-3">
                        <h3 class="font-weight-bold">Outlet Type</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 col-sm-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Edit</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2 mr-3">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container" id="div-prod">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 px-0">
                            <div class="form-group py-0 my-1" hidden>
                                <label class="text-prod">Company</label>
                                <input type="text" class="form-control" id="prod_color_comp" readonly>
                            </div>
                            <div class="form-group py-0 my-1" hidden>
                                <label class="text-prod">Outlet</label>
                                <select class="form-control" id="outlet_type_outlet">
                                    <option value="0">ALL</option>
                                </select>
                            </div>
                            <div class="form-group py-0 my-1">
                                <label class="text-prod">Outlet Type Code<span class="required">*</span></label>
                                <input type="text" class="form-control text-uppercase" id="outlet_type_code">
                            </div>
                            <div class="form-group py-0 my-1">
                                <label class="text-prod">Outlet Type Name<span class="required">*</span></label>
                                <input type="text" class="form-control text-capitalize " id="outlet_type_name">
                            </div>
                            <div class="form-group py-0 my-1" hidden>
                                <label class="text-prod">Product Color Description</label>
                                <input type="text" class="form-control text-uppercase" id="outlet_type_desc">
                            </div>
                            <div class="form-group row my-3">
                                <div class="col-lg-6 col-md-6 col-sm-12 pad-right">
                                    <button type="button" class="btn btn-block btn-success cust-text font-weight-bold btn-height-35 py-0" id="update">Save</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 pad-left">
                                    <button type="button" class="btn btn-block btn-orange cust-text font-weight-bold btn-height-35 py-0" id="cancel">Cancel</button>
                                </div>
                            </div>                        
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12"></div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div id="div-table">
                                
                            </div>
                        </div>                                               
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2 pad-center mt-2">
                            <button type="button" class="btn btn-block btn-success cust-text font-weight-bold py-0" id="save">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-2 pad-center mt-2">
                            <button type="button" class="btn btn-block btn-orange cust-text font-weight-bold py-0" id="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
