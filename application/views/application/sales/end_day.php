<script type="text/javascript" src="<?php echo base_url('js/application/sales/end_day.js') ?>"></script>
<input type="hidden" id="app_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<div class="container-fluid" >
<div class="container" style="height: auto;min-height: 85vh;" id="div_query">



      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-xs-12 col-md-12 pt-3">
                      <h3 class="font-weight-bold">Sales Register - End of Day Closing</h3>
                  </div>
              </div>
          </div>
      </div>

      <hr style="color: black;" class="mt-0 mb-2">

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0" >
              <div class="col-xs-12 col-md-4 col-lg-2 pr-1 pl-0">
                <label class="font-size-18">From</label>
                <input type="date" class="form-control" value="<?php echo date('Y-m-01') ?>" id="fdate">
              </div>
              <div class="col-xs-12 col-md-4 col-lg-2 pr-1 pl-0">
                <label class="font-size-18">To</label>
                <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="tdate">
              </div>
              <div class="col-xs-12 col-md-4 col-lg-2 px-1">
                <label class="font-size-18">Status</label>
                <select class="form-control" id="status">
                    <option value="1">Open</option>
                    <option value="2">Closed</option>
                </select>
              </div>
              <div class="col-xs-12 col-md-2 pr-0 pl-1" hidden>
                <label class="font-size-18">Outlet</label>
                <select class="form-control" id="outlet">
                  <option value="0">All</option>
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
                <button class="btn btn-success btn-height-30 btn-block p-0" id='btn_search'>Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="row py-2" hidden>
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0">
              <div class="col-lg-6 col-md-4 text-right pt-1">
                <label class="font-size-18">No. of Sales Transaction : </label>
              </div>
              <div class="col-lg-5 col-md-6 text-right ">
                <div class="row">
                  <div class="col-lg-4 px-1">
                    <input type="text" class="form-control text-right ml-auto" id="total_amount" value="0" readonly>                    
                  </div>
                  <div class="col-lg-4 px-1">
                    <input type="text" class="form-control text-right ml-auto" id="sales_discount" value="0" readonly>                    
                  </div>
                  <div class="col-lg-4 px-1">
                    <input type="text" class="form-control text-right ml-auto" id="grand_total" value="0" readonly>                    
                  </div>
                </div>
              </div>
              <div class="col-lg-1 col-md-2 text-right pl-1 pr-0 ml-auto">
                <input type="text" class="form-control text-center ml-auto" id="sales_trans" value="0" readonly>
              </div>
            </div>              
          </div>
        </div>
      </div>

  <div class="row pt-3">
    <div class="col-12">
      <div id="div_query_tbl">
        
      </div>
    </div>
    <div class="col-1"></div>
  </div>

</div>

</div>

<div class="modal" id="modal_end_day" style="top: 4%;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header pt-1 pb-0">
        <h4 class="modal-title">Sales Register - End Day Closing</h4>
      </div>
      <div class="modal-body">
        <div class="container">

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Account ID</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="mod_account_id" data-id = "" readonly>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Outlet</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="mod_outlet_id" data-id = "" readonly>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Transaction Date</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="mod_trans_date" readonly>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>No of Transactions</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="mod_trans_no" readonly>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Currency</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="mod_curr" readonly>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Total Sales</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control text-right" id="mod_total_sales" readonly>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-12">
              <hr>
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Cash Payment</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control text-right" id="mod_cash" readonly>              
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Card Payment</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control text-right" id="mod_card" readonly>              
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Dated Checks</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control text-right" id="mod_dated" readonly>              
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Post Dated Checks</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control text-right" id="mod_post_dated" readonly>              
            </div>
          </div>

          <div class="row pb-1">
            <div class="col-lg-5">
              <span>Online Payment</span>
            </div>
            <div class="col-lg-7">
              <input type="text" class="form-control text-right" id="mod_online" readonly>              
            </div>
          </div>


        </div>
      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-orange" id="process">Proceed End of Day</button>
        <button type="button" class="btn btn-orange" id="unprocess">Unprocess the Transaction</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel">Cancel</button>
      </div>

    </div>
  </div>
</div>

