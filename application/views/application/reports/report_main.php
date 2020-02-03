
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/report.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/report/report.js') ?>"></script>
<input type="hidden" id="submodule_id" value="0">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


<div class="container-fluid" id="div-query">
    <div class="container pt-4">

        <span class="font-weight-bold" id="span-title">Executive Information System</span>

        <hr class="my-2">

        <div class="d-none d-md-block">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 pr-1">
                            <span for="report_type" class="font-size-18">Business Data</span>
                            <select class="form-control" id="report_type">
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-8 pl-1">
                            <span for="reports" class="font-size-18">Report Name</span>
                            <select class="form-control" id="reports">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 ml-auto">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 pr-1" id="div-date">
                            
                        </div>
                        <div class="col-xs-12 col-md-4 pr-1" id="div-month-date">
                            <span for="month" class="font-size-18">Month</span>
                            <select class="form-control" id="month_date">
                                <?php 
                                    for ($i=1; $i < 13; $i++) { 
                                 ?>
                                <option value="<?php echo $i ?>"><?php echo date("F", mktime(0,0,0,$i, 10)); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-4 px-1" id="div-year-date">
                            <span for="year" class="font-size-18">Year</span>
                            <select class="form-control" id="year_date">
                                <option value="<?php echo date('Y') ?>" hidden><?php echo date('Y'); ?></option>
                                <?php 
                                    for ($i=2019; $i <= date("Y"); $i++) { 
                                 ?>
                                <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-4 pr-1" id="div-fdate">
                            <span for="fdate" class="font-size-18">Date From</span>
                            <input type="date" class="form-control" id="fdate"  value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-xs-12 col-md-4 px-1" id="div-tdate">
                            <span for="tdate" class="font-size-18">Date To</span>
                            <input type="date" class="form-control" id="tdate" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-xs-12 col-md-4 pl-1" id="div-outlet">
                            <span for="outlet" class="font-size-18">Outlet</span>
                            <select class="form-control" id="outlet">
                                <?php 
                                    if ($this->session->userdata('all_access') == "1"){
                                ?>
                                    <option value="0">All</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-4 pl-1" id="div-agent">
                            <span for="outlet" class="font-size-18">Agent</span>
                            <select class="form-control" id="agent">
                                <option value="0">All</option>
                            </select>
                        </div>
                    </div>                
                </div>                
            </div>
        </div>

        <div class="row pt-2 d-none d-md-block">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row mx-0 bg-button">
                    <div class="col-xs-12 col-md-8"></div>
                    <div class="col-xs-12 col-md-2 pr-1 text-right py-1">
                        <button class="btn btn-success btn-block btn-height-30 p-0" id="view">View</button>
                    </div>
                    <div class="col-xs-12 col-md-2 pad-center text-right py-1">
                        <button class="btn btn-warning btn-block btn-height-30 p-0" id="print">Print</button>                        
                    </div>
                </div>
            </div>
        </div>


        <div class="d-sm-none d-block">

            <div class="row" >
                <div class="col-sm-12 cursor-pointer" data-toggle="collapse" data-target="#mobile_div-report" >
                    <button class="btn btn-info btn-block text-left" id="btn_date"><span class="font-weight-bold">From : </span> <span id="span_fdate"> <?php echo date("m/d/Y"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">To : </span> <span id="span_tdate"><?php echo date("m/d/Y"); ?></span></button>
                    <button class="btn btn-info btn-block text-left" id="btn_month"><span class="font-weight-bold">Month : </span> <span id="span_month"> <?php echo date("F"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">Year : </span> <span id="span_year"><?php echo date("Y"); ?></span></button>
                </div>
            </div>

           <div class="collapse" id="mobile_div-report">
                <div class="row">
                    <div class="col-sm-12 pt-2">
                        <select class="form-control" id="mobile_report_type">
                            <option disabled selected>Business Data</option>
                        </select>
                    </div>
                    <div class="col-sm-12 pt-2" >
                        <select class="form-control" id="mobile_reports">
                            <option disabled selected>Report Name</option>
                        </select>
                    </div>
                    <div class="col-sm-12 pt-2">
                        <select class="form-control" id="mobile_outlet">
                            <option disabled selected>Outlet</option>
                        </select>
                    </div>
                    <div class="col-sm-12 pt-2">
                        <select class="form-control" id="mobile_agent">
                            <option disabled selected>Agent</option>
                        </select>
                    </div>
                </div>

                <div class="row pt-2" id="div-mobile-month-date">
                    <div class="col-8 pr-1">
                        <select class="form-control" id="mobile_month">
                            <option value="" selected disabled>Month</option>
                            <?php 
                                for ($i=1; $i < 13; $i++) { 
                             ?>
                            <option value="<?php echo $i ?>"><?php echo date("F", mktime(0,0,0,$i, 10)); ?></option>
                            <?php } ?>
                        </select>
                    </div>              
                    <div class="col-4 pl-1">
                        <select class="form-control" id="mobile_year">
                            <option value="" selected disabled>Year</option>
                            <?php 
                                for ($i=2019; $i <= date("Y"); $i++) { 
                             ?>
                             <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>      
                </div>

                <div class="row pt-2" id="div-mobile-date">
                    <div class="input-group px-3">
                        <input type="text" class="form-control bg-white" id="mobile_fdate" value="<?php echo date("m/d/Y") ?>" readonly>                                
                        <div class="input-group-append" style="width: 50%;">
                        <input type="text" class="form-control bg-white" id="mobile_tdate" value="<?php echo date("m/d/Y") ?>" readonly>                                
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 pt-2">
                        <button class="btn btn-success btn-block" id="mobile_view">View</button>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="row py-2">
            <div class="col-lg-12" style="min-height: 20px;">
                <div class="row div-total" id="div-monthly-sales-summary">
                    <div class="col-lg-2 px-1">
                        
                    </div>
                    <div class="col-lg-2 px-1">
                        <input type="text" class="form-control text-right total_trans" id="total_trans" value="0" readonly>
                    </div>
                    <div class="col-lg-3 px-1">
                        <input type="text" class="form-control text-right total_gross" id="total_gross" value="0.00" readonly>
                    </div>
                    <div class="col-lg-2 px-1">
                        <input type="text" class="form-control text-right total_vat" id="total_vat" value="0.00" readonly>
                    </div>
                    <div class="col-lg-3 pl-1">
                        <input type="text" class="form-control text-right total_amount" id="total_amount" value="0.00" readonly>
                    </div>
                </div>                
            </div>
        </div>

        <div class="row py-2">
            <div class="col-lg-4 ml-auto" style="min-height: 20px;">
                <div class="row div-total" id="div-sales-transaction">
                    <div class="col-lg-4 px-1">
<!--                         <label style="color: black; font-weight: 520;">Total Trans</label> -->
                        <input type="hidden" class="form-control text-right total_trans" id="total_trans" value="0" readonly>
                    </div>
                    <div class="col-lg-3 px-1">
<!--                         <label style="color: black; font-weight: 520;">Currency</label> -->
                        <input type="text" class="form-control" id="" value="PHP" readonly>
                    </div>
                    <div class="col-lg-5 pl-1">
<!--                         <label style="color: black; font-weight: 520;">Total Amount</label> -->
                        <input type="text" class="form-control text-right total_amount" id="total_amount" value="0.00" readonly>
                    </div>
                </div>
                <div class="row div-total" id="div-sales-product">
                    <div class="col-lg-4 px-1">
<!--                         <label style="color: black; font-weight: 520;">Total Trans</label> -->
                        <input type="hidden" class="form-control text-right total_trans" id="total_trans" value="0" readonly>
                    </div>
                    <div class="col-lg-4 px-1">
<!--                         <label style="color: black; font-weight: 520;">Currency</label> -->
                        <input type="text" class="form-control" id="" value="PHP" readonly>
                    </div>
                    <div class="col-lg-4 pl-1">
<!--                         <label style="color: black; font-weight: 520;">Total Amount</label> -->
                        <input type="text" class="form-control text-right total_amount" id="total_amount" value="0.00" readonly>
                    </div>
                </div>
                <div class="row div-total" id="div-sales-agent">
                    <div class="col-lg-4 px-1">
<!--                         <label style="color: black; font-weight: 520;">Currency</label> -->
                        <input type="text" class="form-control" id="" value="PHP" readonly>
                    </div>
                    <div class="col-lg-4 pl-1">
<!--                         <label style="color: black; font-weight: 520;">Total Amount</label> -->
                        <input type="text" class="form-control text-right total_amount" id="total_amount" value="0.00" readonly>
                    </div>
                    <div class="col-lg-4 pl-1">
<!--                         <label style="color: black; font-weight: 520;">Total Share</label> -->
                        <input type="text" class="form-control text-right total_share" id="total_share" value="0" readonly>
                    </div>
                </div>
                <div class="row div-total" id="div-inventory">
                    <div class="col-lg-8 text-right pt-1">
                        <label class="font-size-18">Total Trans</label>                        
                    </div>
                    <div class="col-lg-4 pl-1 ml-auto">
                        <input type="text" class="form-control text-right" id="total_trans" value="0" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
        	<div class="col-lg-12 col-md-12 col-sm-12" id="div-report">
        		 
        	</div>
        </div>


    </div>
</div>


