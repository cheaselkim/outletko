<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/payment_type.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/payment_type/payment_type_entry.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/payment_type/payment_type_edit.js') ?>"></script>
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">
<input type="hidden" id="submodule_id" value="0">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-title">
                        <h2>Payment Type</h2>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12 px-0">
                <div class="container" id="div-prod">
                    <div class="col-lg-4 px-0">
                        <div class="form-group py-0 my-2">
                            <label class="text-prod mb-2">Company</label>
                            <input type="text" class="form-control" id="payment_type_comp" readonly>
                        </div>
                        <div class="form-group py-0 my-2">
                            <label class="text-prod mb-2">Oultet</label>
                            <select class="form-control" id="payment_type_outlet">
                                <option value="0">ALL</option>
                            </select>
                        </div>
                        <div class="form-group py-0 my-2">
                            <label class="text-prod mb-2">Payment Type <span class="required">*</span></label>
                            <input type="text" class="form-control text-uppercase" id="payment_type_desc">
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
                            <button type="button" class="btn btn-block" id="update">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1 pr-0">
                            <button type="button" class="btn btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


