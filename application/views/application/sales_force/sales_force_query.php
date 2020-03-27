<script type="text/javascript" src="<?php echo base_url() ?>js/application/sales_force/sales_force_query.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<body>
<input type="hidden" id="force_func" value="<?php echo $function; ?>">
<div class="container-fluid pt-2">
    <div class="container">

      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-8 col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">Sales Force</h3>
                  </div>
                  <div class="col-4 col-xs-6 col-md-6 pt-3 text-right" >
                      <h3 class="font-weight-bold">
                        <?php 
                          if ($function == "2"){
                            echo "Edit / Update";
                          }else if ($function == "3"){
                            echo "Query";
                          }else if ($function == "4"){
                            echo "Cancel";
                          }
                         ?>
                      </h3>
                  </div>
              </div>
          </div>
      </div>

      <hr style="color: black;" class="mt-0 mb-2">

        <div class="row">
            <div class="col-xs-12 col-md-12 px-0">
                <div class="container">
                    <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-2 col-lg-2 pad-right">
                            <span class="font-size-18">Outlet</span>
                            <select class="form-control" id="outlet">
                                <option value="0">ALL</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-2 pad-center">
                            <span class="font-size-18">Sales Force Type</span>
                            <select class="form-control" id="type">
                                <option value="0">ALL</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-5 col-lg-6 pad-center">
                            <span class="font-size-18">Keyword</span>
                            <input type="text" class="form-control" id="search_box">
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 pad-left">
                            <span class="font-size-18">Status</span>
                            <select class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-xs-12 col-md-12">
              <div class="container">
                <div class="form-group row bg-button my-0">
                  <div class="col-xs-12 col-md-2 col-lg-2 py-1 ml-auto pr-1">
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
                  <div class="col-8 col-lg-10 col-md-10 text-right pt-1 pr-0">
                    <label class="font-size-18">No. of Sales Force : </label>
                  </div>
                  <div class="col-4 col-lg-2 col-md-2 text-right pr-0 pl-3">
                    <input type="text" class="form-control text-center ml-auto" value="0" id="no_sales_force" readonly>
                  </div>
                </div>              
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-md-12" id="query-table">
            </div>
        </div>

      <!-- The Modal -->
      <div class="modal" id="modal_query">
        <div class="modal-dialog" style="max-width: 1000px;">
          <div class="modal-content">
            <div class="modal-header py-1">
              <h4 class="modal-title">Sales Force</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-12 col-md-12 px-0">
                    <div class="container">
                      <div class="form-group row mb-0">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                          <span class="font-size-18">SR / User ID <span class="required">*</span></span>
                          <input type="text" class="form-control" id="account_id" readonly>
                        </div>
                        <div class="col-lg-3 d-sm-none d-lg-block d-xs-none d-sm-none"></div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                          <span class="font-size-18">All Access <span class="required">*</span></span>
                          <select class="form-control px-0" id="all_access">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            </select>                            
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 px-1">
                          <span class="font-size-18">Type <span class="required">*</span></span>
                          <select class="form-control px-0" id="sales_force_type">
                          </select>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 pl-1">
                          <span class="font-size-18">Status</span>
                          <select class="form-control" id="status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                          </select>
                        </div>
                      </div>                            
                      <div class="form-group row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-12 pr-1">
                          <span class="font-size-18">Last Name <span class="required">*</span></span>
                          <input class="form-control text-uppercase" id="last_name">
                       </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 px-1">
                          <span class="font-size-18">First Name <span class="required">*</span></span>
                          <input class="form-control text-uppercase" id="first_name">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 pl-1">
                          <span class="font-size-18">Middle Name <span class="required">*</span></span>
                          <input class="form-control text-uppercase" id="mid_name">
                        </div>
                      </div>                            
                      <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 pr-1">
                          <span class="font-size-18">Position</span>
                          <input class="form-control" id="position">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                          <span class="font-size-18">Date Hired</span>
                          <input type="date" class="form-control" id="date_hired">
                        </div>
                        <div class="col-md-2 col-sm-12 px-1">
                          <span class="font-size-18">Mobile No </span>
                          <input class="form-control" id="mobile">
                        </div>
                        <div class="col-md-4 col-sm-12 pl-1">
                          <span class="font-size-18">Email <span class="required">*</span></span>
                          <input class="form-control" id="email">
                        </div>
                      </div>                            
                      <div class="form-group row mb-0">
                        <div class="col-xs-12 col-md-4 pr-1">
                          <span class="font-size-18">Outlet No/Area <span class="required">*</span></span>
                          <select class="form-control" id="outlet_no">
                            <option value="0">ALL</option>
                          </select>
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                          <span class="font-size-18">Start Date</span>
                          <input type="date" class="form-control" id="date_start">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                          <span class="font-size-18">End Date</span>
                          <input type="date" class="form-control" id="date_end">
                        </div>
                        <div class="col-xs-12 col-md-2 px-1">
                          <span class="font-size-18">Monthly Quota</span>
                          <input type="text" class="form-control text-right" id="monthly_quota" value="0">
                        </div>
                        <div class="col-xs-12 col-md-2 pl-1">
                          <span class="font-size-18">% of Share (PHP)  </span>
                          <input type="text" class="form-control text-right" id="share" value="0">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
            </div>

          </div>
        </div>
      </div>        

    </div>
</div>



</body>

