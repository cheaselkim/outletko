<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_class.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/product_class/product_class_entry.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/product_class/product_class_edit.js') ?>"></script>
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">
<input type="hidden" id="submodule_id" value="0">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


<div class="container-fluid pt-2">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 pr-4">
                <div class="row">
                    <div class="col-xs-6 col-md-6 col-sm-6 pt-3">
                        <h3 class="font-weight-bold">Product Class</h3>
                    </div>
                    <div class="col-xs-6 col-md-6 col-sm-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Edit</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2 mr-2">

        <div class="row">
            <div class="col-xs-12 col-md-12 px-0">
                <div class="container" id="div-prod">
                    <div class="col-lg-4 px-0">
                        <div class="form-group py-0 my-1" hidden>
                            <label class="text-prod">Company</label>
                            <input type="text" class="form-control" id="prod_class_comp" readonly>
                        </div>
                        <div class="form-group py-0 my-1">
                            <label class="text-prod">Outlet</label>
                            <select class="form-control" id="prod_class_outlet">
                                <option value="0">ALL</option>
                            </select>
                        </div>
                        <div class="form-group py-0 my-1">
                            <label class="text-prod">Product Category <span class="required">*</span></label>
                            <select class="form-control" id="prod_class_cat">
                                
                            </select>
                        </div>
                        <div class="form-group py-0 my-1">
                            <label class="text-prod">Product Class Code<span class="required">*</span></label>
                            <input type="text" class="form-control text-uppercase" id="prod_class_code">
                        </div>
                        <div class="form-group py-0 my-1">
                            <label class="text-prod">Product Class Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="prod_class_name">
                        </div>
                        <div class="form-group py-0 my-1">
                            <label class="text-prod">Product Class Description<span class="required">*</span></label>
                            <textarea  rows="4" class="form-control " id="prod_class_desc"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>    
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2 pl-0 pr-1">
                            <button type="button" class="btn btn-block btn-success cust-text font-weight-bold py-0" id="save">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1 pr-0">
                            <button type="button" class="btn btn-block btn-orange cust-text font-weight-bold py-0" id="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


