<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<script type="text/javascript" src="<?php echo base_url('js/admin/user_registry/user_registry_entry.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>


<div class="container-fluid pt-2">
    <div class="container">


        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Account Information</h3>
                    </div>
                    <div class="col-xs-6 col-md-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Edit</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row bg-button mb-0 pb-1">
                        <div class="col-xs-12 col-md-1 pl-0 pr-1">
                            <span class="font-size-18">Account ID </span>
                            <input class="form-control px-1" readonly id='account_no'>
                        </div>
                        <div class="col-xs-12 col-md-5 px-1">
                            <span class="font-size-18">Account Name <span class='required'>*</span></span>
                            <input class="form-control text-uppercase" id="account_name">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Account Class <span class='required'>*</span></span>
                            <select class="form-control" id="account_class"> 
                            </select>                                    
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Account Type <span class='required'>*</span></span>
                            <select class="form-control" id="account_type"> 
                            </select>                                    
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1 pr-0">
                            <span class="font-size-18">Account Status <span class='required'>*</span></span>
                            <select class="form-control" id="account_status"> 
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>                                    
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-2 pl-0 pr-1">
                            <span class="font-size-18">Business Type <span class='required'>*</span></span>
                            <select class="form-control" id="business_type">
                                <option value="0" hidden selected></option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-1 px-1">
                            <span class="font-size-18">VAT <span class='required'>*</span></span>
                            <select class="form-control" id="vat">
                                <option value="0">No</option> 
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-1 px-1">
                            <span class="font-size-18">Currency <span class='required'>*</span></span>
                            <select class="form-control" id="currency">
                                
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Subscription Type</span>
                            <select class="form-control" id="subscription_type">
                                
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Start Date <span class='required'>*</span></span>
                            <input class="form-control" id="start_date" data-date="" data-date-format="MM/DD/YYYY" type='date' value='<?php echo date('Y-m-d') ?>'>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Renewal Date</span>
                            <input class="form-control" id="renewal_date" data-date="" data-date-format="MM/DD/YYYY" type='date'>
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1 pr-0">
                            <span class="font-size-18">Partner's ID <span class='required'>*</span></span>
                            <input class="form-control" id="partner_id"  onkeypress="return isNumber(event)">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-6 pl-0 pr-1">
                            <span class="font-size-18">Address <span class='required'>*</span></span>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Town / City <span class='required'>*</span></span>
                            <input type="text" class="form-control" id="town">
                            <input type="hidden" class="form-control" id="town_id">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Province</span>
                            <input type="text" class="form-control" id="province" readonly>
                            <input type="hidden" class="form-control" id="prov_id" readonly>
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1 pr-0">
                            <span class="font-size-18">Country</span>
                            <input type="text" class="form-control" id="coutnry" value="Philippines">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 pl-0 pr-1">
                            <span class="font-size-18">Email Address <span class='required'>*</span></span>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Mobile No <span class='required'>*</span></span>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-white border px-1" style='border-radius: 0 !important;border: 1px solid black !important; border-right: 0 !important; color: black !important;'>+63</span>
                              </div>
                              <input type="text" class="form-control" id="mobile" name="mobile" style='border-left: 0 !important;' onkeypress="return isNumber(event)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                            <span class="font-size-18">Phone No</span>
                            <input type="text" class="form-control" id="phone" onkeypress="return isNumber(event)">
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1 pr-0 ml-auto">
                            <span class="font-size-18">No. of Outlet <span class='required'>*</span></span>
                            <input type="text" class="form-control"  id="no_outlet" onkeypress="return isNumber(event)">
                        </div>
                    </div>

                    <div class="form-group row mb-0" hidden>
                        <div class="col-xs-12 col-md-12 col-lg-12 px-0">
                            <span class="font-size-18">Company Description</span>
                            <textarea class="form-control" rows="4" cols="4" id="description">
                                
                            </textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Owner / Authorized Representative</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-3 pl-0 pr-1">
                            <span class="font-size-18">Last Name <span class='required'>*</span></span>
                            <input class="form-control text-uppercase" id="last_name">
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span class="font-size-18">First Name <span class='required'>*</span></span>
                            <input class="form-control text-uppercase" id="first_name">
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span class="font-size-18">Middle Name <span class='required'>*</span></span>
                            <input class="form-control text-uppercase" id="middle_name">
                        </div>
                        <div class="col-xs-12 col-md-3 pl-1 pr-0">
                            <span class="font-size-18">Cash Card No.</span>
                            <input class="form-control" placeholder="0000-0000-0000" id='cash_card' onkeypress="return isNumber(event)">
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                        <div class="col-xs-12 col-md-3 pl-0 pr-1">
                            <span>Birth Date</span>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Mobile No.</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3 px-1">
                            <span>Phone No.</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3 pl-1 pr-0">
                            <span>Email Address</span>
                            <input class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row pt-3">
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-4">
                <button type="button" class="btn btn-block btn-success btn-height-30 p-0 font-size-18" id="save">Save</button>
            </div>
            <div class="col-xs-12 col-md-4">
                <button type="button" class="btn btn-block btn-orange btn-height-30 p-0 font-size-18" id="cancel">Cancel</button>
            </div>
            <div class="col-xs-12 col-md-2"></div>
        </div>



    </div>
</div>


