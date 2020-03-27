
<script type="text/javascript" src="<?php echo base_url() ?>js/application/master_data/supplier/supplier_edit.js"></script>
<input type="hidden" id="supplier_id" value="<?php echo $trans_id; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<body>

<div class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Supplier Information</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Entry</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">
        <!-- Entry Supplier Information -->
        <div class="row">
            <div class="col-xs-12 col-md-12 pl-0 pr-2 font-size-18">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-2 pad-right" hidden>
                            <span>Outlet <span class="required">*</span></span>
                            <select class="form-control" id="outlet_no">
                                <option value="0">All</option>
                            </select>
                        </div>                        
                        <div class="col-xs-12 col-md-3 pad-right">
                            <span>Supplier No </span>
                            <input type="text" class="form-control" id="supp_code">
                        </div>
                        <div class="col-xs-12 col-md-6 pad-center">
                            <span>Supplier Name <span class="required">*</span></span>
                            <input type="text" class="form-control" id="supp_name">
                        </div>
                        <div class="col-xs-12 col-md-3 pad-left">
                            <span>Supplier Status</span>
                            <select class="form-control" id="supp_status">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-12 ">
                            <span>Address </span>
                            <input type="text" class="form-control" id="supp_address">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 pad-right">
                            <span>City </span>
                            <input type="text" class="form-control" id="supp_city">
                            <input type="hidden" class="form-control" id="supp_city_id" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 pad-center">
                            <span>Province</span>
                            <input type="text" class="form-control" id="supp_province" readonly>
                            <input type="hidden" class="form-control" id="supp_province_id" readonly>
                        </div>
                        <div class="col-xs-12 col-md-4 pad-left">
                            <span>Country</span>
                            <input type="text" class="form-control" id="supp_country" value="Philippines">
                        </div>                
                    </div>

                    <div class="form-group row mb-0"> 
                        <div class="col-xs-12 col-md-6 pad-right">
                            <span>Supplier Type</span>
                            <select class="form-control" id="supp_type"></select>
                        </div>
                        <div class="col-xs-12 col-md-6 pad-left">
                            <span>Contact No. </span>
                            <input type="text" class="form-control" id="contact_no" onkeypress="return isNumber(event)">
                        </div>

                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-6 pad-right">
                            <span>Factory Address</span>
                            <input type="text" class="form-control" id="factory_add">
                        </div>    
                        <div class="col-xs-12 col-md-2 pad-center">
                            <span>Region</span>
                            <input type="text" class="form-control" id="supp_region">
                        </div>
                        <div class="col-xs-12 col-md-2 pad-left">
                            <span>Zip Code</span>
                            <input type="text" class="form-control" id="supp_zip_code">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12" hidden>
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-3 pad-right">
                            <span>Nature of Business</span>
                            <select class="form-control" id="nat_bus"></select>
                        </div>
                        <div class="col-xs-12 col-md-3 pad-center">
                            <span>Form of Organization</span>
                            <select class="form-control" id="form_org"></select>
                        </div>
                        <div class="col-xs-12 col-md-3 pad-center">
                            <span>Classification</span>
                            <select class="form-control" id="classif"></select>
                        </div>
                        <div class="col-xs-12 col-md-3 pad-left">
                            <span>Date Organized <span class="required">*</span></span>
                            <input type="date" class="form-control" id="date_org">
                        </div>
                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-4 pad-right">
                            <span>Contact Person <span class="required">*</span></span>
                            <input type="text" class="form-control" id="contact_person">
                        </div>
                        <div class="col-xs-12 col-md-4 pad-left">
                            <span>Email Address</span>
                            <input type="text" class="form-control" id="email_add">
                        </div>
                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-4 pad-right">
                            <span>Fax No.</span>
                            <input type="text" class="form-control" id="fax">
                        </div>
                        <div class="col-xs-12 col-md-4 pad-center">
                            <span>Facebook</span>
                            <input type="text" class="form-control" id="facebook">
                        </div>
                        <div class="col-xs-12 col-md-4 pad-left">
                            <span>Website</span>
                            <input type="text" class="form-control" id="website">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-md-5" hidden>   
                <div style="height: 275px; overflow: auto;">
                    <table class="table table-sm table-striped" id="tbl-supplier"> 
                        <thead> 
                            <tr>    
                                <th>Supplier No</th>
                                <th>Supplier Name</th>
                                <th>Town / City</th>
                            </tr>
                        </thead>
                        <tbody> 
                        </tbody>
                    </table>   
                </div>
            </div>

        </div>

        <!-- END Entry Supplier Information -->

        <div class="row mt-3">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <br>
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2"></div>
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-success btn-height-35 cust-text font-weight-bold" id="save">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-orange btn-height-35 cust-text font-weight-bold" id="cancel">Cancel</button>
                        </div>
                        <div class="col-xs-12 col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Save Supplier Info -->
<div class="modal fade" id="save_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-xs-12 col-md-12">
                    <span>New Supplier Succesfully Added.</span>
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
<!-- END Modal for Save Supplier Info -->

</body>
