<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_type.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/admin/master_data/business_type/business_type_entry.js') ?>"></script>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


<input type="hidden" id="submodule_id" value="0">

<div class="container-fluid pt-2">

    <div class="container">



        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="row">

                    <div class="col-xs-6 col-md-6 pt-3">

                        <h3 class="font-weight-bold">Business Type</h3>

                    </div>

                    <div class="col-xs-6 col-md-6 pt-3 text-right" >

                        <h3 class="font-weight-bold">Entry</h3>

                    </div>

                </div>

            </div>

        </div>



        <hr class="mt-0 mb-2">



        <div class="row">

            <div class="col-xs-12 col-md-12 px-0">

                <div class="container" id="div-prod">

                    <div class="row">

                        <div class="col-lg-4 col-md-2 col-sm-12">

                            <div class="form-group py-0 my-1">

                                <label class="text-prod">Business Type <span class="required">*</span></label>

                                <input type="text" class="form-control" id="business_type">

                            </div>

                            <div class="form-group row my-3">

                                <div class="col-xs-12 col-md-6 pr-1">

                                    <button type="button" class="btn btn-block btn-success cust-text font-weight-bold py-0" id="save">Save</button>

                                </div>

                                <div class="col-xs-12 col-md-6 pl-1">

                                    <button type="button" class="btn btn-block btn-orange cust-text font-weight-bold py-0" id="cancel">Cancel</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12"></div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div id="div-query" style="height: 500px; overflow: auto;">
                                
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>



        <br>    

        <div class="row">

            <div class="col-xs-12 col-md-12">

                <div class="container">



                </div>

            </div>

        </div>

    </div>

</div>





