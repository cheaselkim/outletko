<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/outlet.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/eoutlet/outlet_query.js') ?>"></script>
<input type="hidden" id="outlet_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-3">
    <div class="container">

      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">
                        <?php 
                          if ($function == "2"){
                            echo "Outlet Information";
                          }else if ($function == "3"){
                            echo "Outlet Information";
                          }else if ($function == "4"){
                            echo "Close an Outlet";
                          }
                         ?>                                                
                      </h3>
                  </div>
                  <div class="col-xs-6 col-md-6 pt-3 text-right" >
                      <h3 class="font-weight-bold">
                        <?php 
                          if ($function == "2"){
                            echo "Edit / Update";
                          }else if ($function == "3"){
                            echo "Query";
                          }else if ($function == "4"){
                            echo "";
                          }
                         ?>
                      </h3>
                  </div>
              </div>
          </div>
      </div>

      <hr style="color: black;" class="mt-0 mb-2">

        <div class="row mb-0 pb-0">
            <div class="col-xs-12 col-md-12 px-0 pb-0">
                <div class="container mb-0 pb-0">
                    <div class="form-group row text-sales mb-0">
                        <div class="col-xs-12 col-md-2 pr-1">
                            <span class="font-size-18">Type</span>
                            <select class="form-control txt-box-text-size" type="text" id="outlet_type">
                                <option value="">All</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-8 px-1">
                            <span class="font-size-18">Search</span>
                            <input type="text" class="form-control txt-box-text-size" placeholder="Search Outlet Code, Outlet Name..." aria-label="Recipient's username" aria-describedby="basic-addon2" id="search_box">
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1" id="div-outlet-status">
                            <span class="font-size-18">Status</span>
                            <select class="form-control txt-box-text-size" type="text" id="outlet_status">
                                <option value="1">Operational</option>
                                <option value="2">Close</option>
                            </select>
                        </div>
                    </div>


                      <div class="row pt-2">
                        <div class="col-xs-12 col-md-12">
                          <div class="container">
                            <div class="form-group row bg-button my-0">
                              <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto pr-1">
                                <button class="btn btn-success btn-height-30 btn-block p-0" id="search">Search</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row py-2">
                        <div class="col-xs-12 col-md-12">
                          <div class="container">
                            <div class="form-group row my-0">
                              <div class="col-lg-10 text-right pt-1 pr-0">
                                <label class="font-size-18">No. of Outlets : </label>
                              </div>
                              <div class="col-lg-2 text-right pr-0 pl-3">
                                <input type="text" class="form-control text-center ml-auto" value="0" id="no_trans" readonly>
                              </div>
                            </div>              
                          </div>
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-xs-2 col-md-12" id="query-table">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal" id="modal_query">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header py-1">
      <h4 class="modal-title">Outlet Query</h4>
    </div>
    <div class="modal-body">
        <div class="container px-0">
            <div class="form-group row mb-0">
                <div class="col-xs-12 col-md-3 col-lg-2 pr-1">
                    <span>Outlet No.</span>
                    <input type="text" class="form-control" id="mod_no" >
                </div>
                <div class="col-xs-12 col-md-9 col-lg-10 pl-1">
                    <span>Outlet Name</span>
                    <input type="text" class="form-control" id="mod_name" >
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-xs-12 col-md-6 col-lg-6 pr-1">
                    <span>Location</span>
                    <input type="text" class="form-control" id="mod_loc" >
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 px-1">
                    <span>City/Town</span>
                    <input type="text" class="form-control" id="mod_city" >
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 pl-1">
                    <span>Province</span>
                    <input type="text" class="form-control" id="mod_province" >
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-xs-12 col-md-3 col-lg-3 pr-1">
                    <span>Outlet Status</span>
                    <input type="text" class="form-control" id="mod_status" >
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 px-1">
                    <span>Outlet Type</span>
                    <input type="text" class="form-control" id="mod_type" >
                </div>
                <div class="col-xs-12 col-md-2 col-lg-2 px-1">
                    <span>Currency</span>
                    <input type="text" class="form-control txt-box-text-size" id="mod_currency" value="PHP" >
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 pl-1">
                    <span>Monthly Quota</span>
                    <input type="text" class="form-control text-right txt-box-text-size" id="mod_quota" placeholder="0.00" >
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer py-1">
      <button type="button" class="btn btn-danger px-3" data-dismiss="modal">Close</button>
    </div>    
  </div>
</div>
</div>
  