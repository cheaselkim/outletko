<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/customer.css') ?>">
<script type="text/javascript" src="<?php echo base_url() ?>js/application/master_data/customer/customer_query.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<body>
<input type="hidden" id="customer_func" value="<?php echo $function; ?>">
<div class="container-fluid">
    <div class="container">

      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">Customer Information</h3>
                  </div>
                  <div class="col-xs-6 col-md-6 pt-3 text-right" >
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
                        <div class="col-lg-2 col-md-3 col-sm-12 pr-1">
                            <span class="font-size-18">Customer Type</span>
                            <select class="form-control" id="cust_type">
                                <option value="0">All</option>
                            </select>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 px-1">
                            <span class="font-size-18">Keyword</span>
                            <input type="text" class="form-control" id="search_box">
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 pl-1">
                            <span class="font-size-18">Status</span>
                            <select class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 pad-left" hidden>
                            <span class="font-size-18">Outlet</span>
                            <select class="form-control" id="outlet"> 
                                <option value=''>All</option>
                            </select>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-xs-12 col-md-12">
                            <div class="container">
                                <div class="form-group row bg-button my-0">
                                    <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto pl-0 pr-1">
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
                                    <div class="col-lg-10 col-md-10 text-right pt-1">
                                        <label class="font-size-18">No. of Customers : </label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 text-right px-0">
                                        <input type="text" class="form-control text-center ml-auto" id="count" value="0" readonly>
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


</body>

