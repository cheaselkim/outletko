<script type="text/javascript" src="<?php echo base_url() ?>js/application/users/commission.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-2" id="account_query">
    <div class="container">
    
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Outletko.com Registration Production</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2">
    
        <div class="row">
            <div class="col-12 col-lg-8 col-md-12 col-sm-12">

                <div class="row">
                    <div class="col-12 col-lg-5 col-md-5 col-sm-12 pad-right">
                        <span>Report</span>
                        <select class="form-control" id="report">
                            <option value="1">Production Summary</option>
                            <option value="2">Production Summary (Plan Only)</option>
                            <option value="3">Production Summary (Extra Outlet Only)</option>
                        </select>
                    </div> 
                    <div class="col-12 col-lg-3 col-md-3 col-sm-12 pad-center">
                        <span>Month</span>
                        <select class="form-control" id="month_date">
                            <?php 
                                for ($i=1; $i < 13; $i++) { 
                                ?>
                            <option value="<?php echo $i ?>"><?php echo date("F", mktime(0,0,0,$i, 10)); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-2 col-md-2 col-sm-12 pad-center">
                        <span>Year</span>
                        <select class="form-control" id="year_date">
                            <option value="<?php echo date('Y') ?>" hidden><?php echo date('Y'); ?></option>
                            <?php 
                                for ($i=2019; $i <= date("Y"); $i++) { 
                                ?>
                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-2 col-md-2 col-sm-12 pad-left pt-4">
                        <button class="btn btn-block btn-orange" id="btn-search">Search</button>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive" id="div-query">

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>