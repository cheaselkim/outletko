
<script type="text/javascript" src="<?php echo base_url() ?>js/application/master_data/customer/customer_edit.js"></script>
<input type="hidden" id="customer_id" value="<?php echo $trans_id; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<body>

<div class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Customer Information</h3>
                    </div>
                    <div class="col-xs-6 col-md-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Entry</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">


        <!-- Entry Customer Information -->
        <div class="row">
            <div class="col-xs-12 col-md-7 col-lg-7 pl-0 font-size-18 pr-2" >
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-2 pr-1" hidden>
                            <span>Outlet No. <span class="required">*</span></span>
                            <select class="form-control" id="outlet_no">
                                <option value="0">All</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3 pr-1">
                            <span>Customer No. </span>
                            <input type="text" class="form-control" id="cust_id">
                        </div>
                        <div class="col-xs-12 col-md-6 px-1">
                            <span>Customer Name <span class="required">*</span></span>
                            <input type="text" class="form-control" id="cust_name">
                        </div>
                        <div class="col-xs-12 col-md-3 pl-1">
                            <span>Customer Status</span>
                            <select class="form-control" id="cust_status">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-12">
                            <span>Address </span>
                            <input type="text" class="form-control" id="cust_address">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 pr-1">
                            <span>Town/City </span>
                            <input type="text" class="form-control" id="cust_city">
                            <input type="hidden" class="form-control" id="cust_city_id" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 px-1">
                            <span>Province</span>
                            <input type="text" class="form-control" id="cust_province" readonly>
                            <input type="hidden" class="form-control" id="cust_province_id" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 pl-1">
                            <span>Country </span>
                            <input type="text" class="form-control" id="cust_country" value="Philippines" >
                        </div>                                
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 pr-1">
                            <span>Contact No. </span>
                            <input type="text" class="form-control" id="contact_no" onkeypress="return isNumber(event)">
                        </div>

                        <div class="col-xs-12 col-md-4 px-1">
                            <span>Customer Type </span>
                            <select class="form-control" id="cust_type">
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-4 pl-1">
                            <span>Credit Limit</span>
                            <input type="text" class="form-control text-right" id="credit_limit" value="0">
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-md-12" hidden>
                    <div class="col-xs-12 col-md-2 pr-1" hidden>
                        <span>Zip Code</span>
                        <input type="text" class="form-control" id="cust_zip_code">
                    </div>
                    <div class="col-xs-12 col-md-4 px-1" hidden>
                        <span>Industry</span>
                        <input type="text" class="form-control" id="industry">
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 px-1">
                            <span>Contact Person <span class="required">*</span></span>
                            <input type="text" class="form-control" id="contact_person">
                        </div>
                        <div class="col-xs-12 col-md-4 pl-1">
                            <span>Email Address</span>
                            <input type="text" class="form-control" id="email_add">
                        </div>
                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-3 pad-right">
                            <span>Website</span>
                            <input type="text" class="form-control" id="website">
                        </div>
                        <div class="col-xs-12 col-md-3 pad-center">
                            <span>Fax No.</span>
                            <input type="text" class="form-control" id="fax">
                        </div>
                        <div class="col-xs-12 col-md-3 pad-center">
                            <span>Tax No.</span>
                            <input type="text" class="form-control" id="tax" >
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-md-5 col-lg-5  d-md-none d-lg-block" style="border-left: 1px solid gray;height: 275px;" > 
                <div style="height: 275px; overflow-y: auto;"> 
                    <table class="table table-sm table-striped" id="tbl-customer">
                        <thead> 
                            <tr>
                                <th>Customer No</th>    
                                <th>Customer Name</th>    
                                <th>Town / City</th>    
                            </tr>
                        </thead> 
                        <tbody> 
                        </tbody>
                    </table>  
                </div>
            </div>

        </div>
        <!-- END Entry Customer Information -->

        <div class="row mt-5">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2"></div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block btn-success btn-height-35 cust-text font-weight-bold" id="save">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a href="<?php echo base_url('/') ?>"><button type="button" class="btn btn-block btn-orange cust-text font-weight-bold btn-height-35">Cancel</button></a>
                        </div>
                        <div class="col-xs-12 col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Save Customer Info -->
<div class="modal fade" id="save_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-xs-12 col-md-12">
                    <span>New Customer Succesfully Added.</span>
                </div>
            </div>

            <div class="modal-footer">
                <div class="col-xs-12 col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <button class="btn btn-grey btn-block">OK</button>
                </div>
                <div class="col-xs-12 col-md-4"></div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal for Save Customer Info -->

</body>
