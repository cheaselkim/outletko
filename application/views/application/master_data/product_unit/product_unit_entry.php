<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_unit.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/product_unit/product_unit_entry.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="submodule_id" value="0">

<div class="container-fluid pt-2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 pr-4">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 col-sm-6 pt-3">
                        <h3 class="font-weight-bold">Product Unit</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 col-sm-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Entry</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2 mr-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container" id="div-prod">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 px-0">
                            <div class="form-group py-0 my-1" hidden>
                                <label class="text-prod">Company</label>
                                <input type="text" class="form-control" id="prod_unit_comp" readonly>
                            </div>
                            <div class="form-group py-0 my-1">
                                <label class="text-prod">Outlet</label>
                                <select class="form-control" id="prod_unit_outlet">
                                    <option value="0">ALL</option>
                                </select>
                            </div>
                            <div class="form-group py-0 my-1">
                                <label class="text-prod">Product Unit Code  <span class="required">*</span></label>
                                <input type="text" class="form-control text-uppercase" id="prod_unit_code">
                            </div>
                            <div class="form-group py-0 my-1">
                                <label class="text-prod">Product Unit Name  <span class="required">*</span></label>
                                <input type="text" class="form-control text-capitalize" id="prod_unit_name">
                            </div>
                            <div class="form-group py-0 my-1" hidden>
                                <label class="text-prod">Product Unit Description <span class="required">*</span></label>
                                <input type="text" class="form-control text-capitalize" id="prod_unit_desc">
                            </div>
                            <div class="form-group row mt-1 mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12 pad-right mt-2">
                                    <button type="button" class="btn btn-block btn-success cust-text font-weight-bold btn-height-35 py-0" id="save">Save</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 pad-left mt-2">
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

        <br>    
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 px-0" >
                <div class="container">
                    <div class="col-sm-4 col-md-4 col-sm-12 px-0">
                     
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


