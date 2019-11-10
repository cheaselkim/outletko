<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_type.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/application/master_data/customer_type/customer_type_edit.js') ?>"></script>

<input type="hidden" id="trans_id" value="<?php echo $trans_id; ?>">

<input type="hidden" id="submodule_id" value="0">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


<div class="container-fluid pt-2">

    <div class="container">



        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="row">

                    <div class="col-xs-6 col-md-6 pt-3">

                        <h3 class="font-weight-bold">Customer Type Data</h3>

                    </div>

                    <div class="col-xs-6 col-md-6 pt-3 text-right" >

                        <h3 class="font-weight-bold">Edit</h3>

                    </div>

                </div>

            </div>

        </div>



        <hr class="my-2">



        <div class="row">

            <div class="col-xs-12 col-md-12 px-0">

                <div class="container" id="div-prod">

                    <div class="col-lg-4 px-0">

                        <div class="form-group py-0 my-2" hidden>

                            <label class="text-prod mb-2">Company</label>

                            <input type="text" class="form-control" id="cust_type_comp" readonly>

                        </div>

                        <div class="form-group py-0 my-1">

                            <label class="text-prod">Oultet</label>

                            <select class="form-control" id="cust_type_outlet">

                                <option value="0">ALL</option>

                            </select>

                        </div>

                        <div class="form-group py-0 my-1">

                            <label class="text-prod">Customer Code Type <span class="required">*</span></label>

                            <input type="text" class="form-control text-uppercase" id="cust_type_code">

                        </div>

                        <div class="form-group py-0 my-1">

                            <label class="text-prod">Customer Name Type <span class="required">*</span></label>

                            <input type="text" class="form-control " id="cust_type_desc">

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

                            <button type="button" class="btn btn-block btn-success py-0 cust-text font-weight-bold" id="update">Save</button>

                        </div>

                        <div class="col-xs-12 col-md-2 pl-1 pr-0">

                            <button type="button" class="btn btn-block btn-orange py-0 cust-text font-weight-bold" id="cancel">Cancel</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>





