<style type="text/css">
  .font-size-modal{
    font-size: 16px;
  }
</style>
<script type="text/javascript" src="<?php echo base_url('js/admin/user_registry/user_registry_query.js') ?>"></script>
<input type="hidden" id="app_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid" >
<div class="container" style="height: auto;min-height: 85vh;" id="div_query">



      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">User Registry</h3>
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
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0" >
              <div class="col-xs-12 col-md-3 pr-1 pl-0">
                <label class="font-size-18">Transaction Date</label>
                <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="trans_date">
              </div>
              <div class="col-xs-12 col-md-5 px-1">
                <label class="font-size-18">Keyword</label>
                <input type="text" class="form-control" placeholder="Search Business Name, Account ID" id="keyword">
              </div>
              <div class="col-xs-12 col-md-2 px-1">
                <label class="font-size-18">Account Status</label>
                <select class="form-control" id="account_status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="col-xs-12 col-md-2 pr-0 pl-1">
                <label class="font-size-18">Account Class</label>
                <select class="form-control" id="account_class">
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
              <div class="col-xs-12 col-md-3 col-lg-2 py-1 pr-1 pl-0 ml-auto">
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
              <div class="col-lg-10 col-md-9 text-right pt-1">
                <label class="font-size-18">No. of Sales Transaction : </label>
              </div>
              <div class="col-lg-2 col-md-3 text-right px-0">
                <input type="text" class="form-control text-center ml-auto" id="trans" value="0" readonly>
              </div>
            </div>              
          </div>
        </div>
      </div>

  <div class="row">
    <div class="col-12">
      <div id="div_query_tbl">
        
      </div>
    </div>
    <div class="col-1"></div>
  </div>

</div>

</div>

<div class="modal" id="modal-user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title">User Registry</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body py-1">
                <div class="container">
                    <div class="row"> 
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12"> 

                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <span>User Name</span>
                                    <input type="text" class="form-control" id="user-name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <hr class="mt-3 mb-2" style="border-top: 1px solid green;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Account ID</span>
                                    <input type="text" class="form-control" id="user-account-id">
                                </div>
                                <div class="col-12 col-lg-8 col-md-8 col-sm-12">
                                    <span>Account Name</span>
                                    <input type="text" class="form-control" id="user-account-name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <span>Link Name</span>
                                    <input type="text" class="form-control" id="user-link-name">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Business Category</span>
                                    <input type="text" class="form-control" id="user-business-category">
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Account Pro</span>
                                    <input type="text" class="form-control" id="user-account-pro">
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Account Status</span>
                                    <input type="text" class="form-control" id="user-account-status">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Plan</span>
                                    <input type="text" class="form-control" id="user-plan">
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Subscription Date</span>
                                    <input type="text" class="form-control" id="user-subscribe-date">
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                    <span>Renewal Date</span>
                                    <input type="text" class="form-control" id="user-renewal-date">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <hr class="mt-3 mb-2" style="border-top: 1px solid green;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    <span>Address</span>
                                    <input type="text" class="form-control" id="user-address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <span>Email</span>
                                    <input type="text" class="form-control" id="user-email">
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <span>Mobile No</span>
                                    <input type="text" class="form-control" id="user-mobile">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>