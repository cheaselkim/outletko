<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/outlet.css') ?>">
<script type="text/javascript" src="<?php echo base_url() ?>js/application/eoutlet/outlet_edit.js"></script>
<input type="hidden" id="outlet_id" value="<?php echo $trans_id ?>">
<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-2">

    <div class="container">



        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="row">

                    <div class="col-xs-6 col-md-6 pt-3">

                        <h3 class="font-weight-bold">Outlet Information</h3>

                    </div>

                    <div class="col-xs-6 col-md-6 pt-3 text-right" >

                        <h3 class="font-weight-bold">Edit</h3>

                    </div>

                </div>

            </div>

        </div>



        <hr style="color: black;" class="mt-0 mb-2">



        <div class="row text-sales">

            <div class="col-xs-12 col-md-8 col-lg-9 pr-5 pl-0">

                <div class="container">

                    <div class="form-group row mb-0">

                        <div class="col-xs-12 col-md-4 pr-1">

                            <span>Outlet No. <span class="required">*</span></span>

                            <input type="text" class="form-control" id="outlet_no" readonly>

                        </div>

                        <div class="col-xs-12 col-md-8 px-1">

                            <span>Outlet Name <span class="required">*</span></span>

                            <input type="text" class="form-control" id="outlet_name">

                        </div>

                    </div>



                    <div class="form-group row mb-0">

                        <div class="col-xs-12 col-md-12 pr-1">

                            <span>Location <span class="required">*</span></span>

                            <input type="text" class="form-control" id="outlet_location">

                        </div>

                    </div>



                    <div class="form-group row mb-0">

                        <div class="col-xs-12 col-md-4 pr-1">

                            <span>City/Town <span class="required">*</span></span>

                            <input type="text" class="form-control txt-box-text-size" placeholder="Search City/Town..." id="outlet_city">

                            <input type="hidden" class="form-control" id="outlet_city_id" readonly>

                        </div>

                        <div class="col-xs-12 col-md-4 px-1">

                            <span>Province <span class="required">*</span></span>

                            <input type="text" class="form-control txt-box-text-size" id="outlet_province" readonly>

                            <input type="hidden" class="form-control" id="outlet_province_id" readonly>

                        </div>

                        <div class="col-xs-12 col-md-4 px-1">

                            <span>Country <span class="required">*</span></span>

                            <input type="text" class="form-control txt-box-text-size" id="outlet_country" value="Philippines" readonly>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-md-4 col-lg-3 px-0">

                <div class="container">

                    <div class="form-group row mb-0">

                        <div class="col-xs-12 col-md-12 pl-1">

                            <span>Outlet Status. <span class="required">*</span></span>
                            <select class="form-control" id="outlet_status">
                                <option value="1">Operational</option>
                                <option value="2">Close</option>
                            </select>

                        </div>

                    </div>

                    <div class="form-group row mb-0">

                        <div class="col-xs-12 col-md-12 pl-1">

                            <span>Outlet Type <span class="required">*</span></span>

                            <select class="form-control" id="outlet_type">

                                <option hidden></option>

                            </select>

                        </div>

                    </div>



                    <div class="form-group row mb-0">

                        <input type="hidden" class="form-control" id="currency" value="" readonly>
                        <div class="col-xs-12 col-md-12 col-sm-12 pl-1">

                            <span>Monthly Sales Target <span class="required"></span></span>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend " style="height: 35px;">
                                    <span class="form-control" id="curr">PHP</span>
                                </div>
                                <input type="text" class="form-control text-right txt-box-text-size" id="outlet_quota" placeholder="0.00">
                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </div>



        <br>    

        <div class="row text-sales">

            <div class="col-xs-12 col-md-12">

                <div class="container">

                    <div class="form-group row">

                        <div class="col-xs-12 col-md-2"></div>

                        <div class="col-xs-12 col-md-4">

                            <button type="button" class="btn btn-block btn-success cust-text font-weight-bold btn-height-35" id="save_outlet">Save</button>

                        </div>

                        <div class="col-xs-12 col-md-4">

                            <button type="button" class="btn btn-block btn-orange cust-text font-weight-bold btn-height-35" id="cancel">Cancel</button>

                        </div>

                        <div class="col-xs-12 col-md-2"></div>

                    </div>

                </div>

            </div>

        </div>



        <div class="row mt-2">

            <div class="col-lg-12 col-md-12 col-sm-12" style="height: 230px; overflow-y:visible;" id="list-outlet" >

            </div>

        </div>



    </div>

</div>

