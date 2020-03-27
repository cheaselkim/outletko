<script type="text/javascript" src="<?php echo base_url() ?>js/application/sales_force/sales_force_entry.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<body>

<div class="container-fluid pt-2">
    <div class="container">
 
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Sales Force</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 pt-3 text-right" >
                        <h3 class="font-weight-bold">Entry</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">

        <div class="row">
            <div class="col-xs-12 col-md-12 px-0">
                <div class="container">
                    <div class="form-group row mb-0">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <span class="font-size-18">SR / User ID <span class="required">*</span></span>
                            <input type="text" class="form-control" id="account_id" readonly>
                        </div>
                        <div class="col-lg-5 col-md-3"></div>
                        <div class="col-lg-2 col-md-3 col-sm-12" hidden>
                            <span class="font-size-18">All Access <span class="required">*</span></span>
                            <select class="form-control px-0" id="all_access">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>                            
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 pad-center pad-center">
                            <span class="font-size-18">Type <span class="required">*</span></span>
                            <select class="form-control px-0" id="sales_force_type">
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 pad-left pad-left">
                            <span class="font-size-18">Status</span>
                            <select class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>                            
                    <div class="form-group row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-12 pad-right pad-right">
                            <span class="font-size-18">Last Name <span class="required">*</span></span>
                            <input class="form-control text-uppercase" id="last_name">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 pad-center pad-center">
                            <span class="font-size-18">First Name <span class="required">*</span></span>
                            <input class="form-control text-uppercase" id="first_name">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 pad-left pad-left">
                            <span class="font-size-18">Middle Name <span class="required">*</span></span>
                            <input class="form-control text-uppercase" id="mid_name">
                        </div>
                    </div>                            
                    <div class="form-group row mb-0">
<!--                         <div class="col-lg-4 col-md-4 col-sm-12 pr-1">
                            <span class="font-size-18">Nickname</span>
                            <input type="text" class="form-control" id="nick_name">
                        </div> -->
                        <div class="col-xs-12 col-md-3 col-lg-4 pad-right">
                            <span class="font-size-18">Position</span>
                            <input class="form-control " id="position">
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-2 pad-center">
                            <span class="font-size-18">Date Hired</span>
                            <input type="date" class="form-control" id="date_hired" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2 pad-center">
                            <span class="font-size-18">Mobile No </span>
                            <input class="form-control" id="mobile">
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-4 pad-left">
                            <span class="font-size-18">Email <span class="required">*</span></span>
                            <input class="form-control" id="email">
                        </div>
                    </div>                            
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-6 col-lg-4 pad-right pad-right">
                            <span class="font-size-18">Outlet No/Area <span class="required">*</span></span>
                            <select class="form-control" id="outlet">
                                
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-2 pad-center pad-left">
                            <span class="font-size-18">Start Date</span>
                            <input type="date" class="form-control" id="date_start" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-2 pad-center pad-right">
                            <span class="font-size-18">End Date</span>
                            <input type="date" class="form-control" id="date_end" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-2 pad-center pad-left">
                            <span class="font-size-18">Monthly Quota</span>
                            <input type="text" class="form-control text-right" id="monthly_quota" value="0">
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-2 pad-left pad-right">
                            <span class="font-size-18">% of Share (PHP)  </span>
                            <input type="text" class="form-control text-right" id="share" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row" hidden>
            <div class="col-xs-12 col-md-12 px-0">
                <div class="container">

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2">
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1">
                            <span class="font-size-18">Change Password </span>
                            <input type="text" class="form-control" id="password_days">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2"></div>
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-success btn-height-30 font-size-18 p-0 font-weight-bold" id="save">Save</button>
                        </div>
                        <div class="col-xs-12 col-md-4 mt-2">
                            <button type="button" class="btn btn-block btn-orange btn-height-30 font-size-18 p-0 font-weight-bold" id="cancel">Cancel</button>
                        </div>
                        <div class="col-xs-12 col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-4">
            <div class="col-lg-12 col-md-12 col-sm-12" id="list-sales-force" style="height: 200px; overflow: auto;">
                
            </div>
        </div>

    </div>
</div>


</body>

