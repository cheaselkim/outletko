<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/sales.css') ?>"> -->
<style type="text/css">
  .font-size-modal{
    font-size: 16px;
  }
</style>
<script type="text/javascript" src="<?php echo base_url('js/application/sales/sales_query.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
<input type="hidden" id="app_func" value="<?php echo $function; ?>">

<div class="container-fluid" >
<div class="container" style="height: auto;min-height: 85vh;" id="div_query">



      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">Sales</h3>
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
              <div class="col-xs-12 col-md-3 col-lg-2 pr-1 pl-0">
                <label class="font-size-18">Transaction Date</label>
                <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="trans_date">
              </div>
              <div class="col-xs-12 col-md-7 col-lg-8 px-1">
                <label class="font-size-18">Keyword</label>
                <input type="text" class="form-control" placeholder="Search Transaction No" id="keyword">
              </div>
              <div class="col-xs-12 col-md-2 col-lg-2 px-1">
                <label class="font-size-18">Status</label>
                <select class="form-control" id="status">
                    <option value="" >ALL</option>
                    <option value="1">Open</option>
                    <option value="2">Closed</option>
                    <option value="0">Cancelled</option>
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
  
      <div class="row py-2">
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0">
              <div class="col-lg-6 col-md-4 text-right pt-1">
                <label class="font-size-18">No. of Sales Transaction : </label>
              </div>
              <div class="col-lg-5 col-md-6 text-right ">
                <div class="row">
                  <div class="col-lg-4 col-md-4 px-1">
                    <input type="text" class="form-control text-right ml-auto" id="total_amount" value="0" readonly>                    
                  </div>
                  <div class="col-lg-4 col-md-4 px-1">
                    <input type="text" class="form-control text-right ml-auto" id="sales_discount" value="0" readonly>                    
                  </div>
                  <div class="col-lg-4 col-md-4 px-1">
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

  <div class="row">
    <div class="col-12">
      <div id="div_query_tbl">
        
      </div>
    </div>
    <div class="col-1"></div>
  </div>

</div>

</div>

<div class="modal fade" id="modal_query" role="dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header pt-3 pb-0">
        <h5>Sales Query</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-sm-12 mr-auto">
            <label class="font-size-modal">Customer</label>
            <div class="row">
              <div class="col-lg-4 col-md-4 pr-1">
                <input type="text" class="form-control" id="mod_cust_code" readonly>
              </div>
              <div class="col-lg-8 col-md-8 pl-1">
                <input type="text" class="form-control" id="mod_cust_name" readonly>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 ml-auto">
            <label class="font-size-modal">Transaction No</label>
            <input type="text" class="form-control" id="mod_trans_no" readonly>
          </div>
        </div>
        <div class="row pt-2">
          <div class="col-lg-5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <label class="font-size-modal">Sales Discount</label>
                <input type="text" class="form-control text-right" id="mod_discount_sales" value="0.00" readonly>
              </div>
              <div class="col-lg-6 col-md-6">
                <label class="font-size-modal">Total Amount</label>
                <input type="text" class="form-control text-right" id="mod_tot_amount" value="0.00"  readonly>
              </div>
            </div>
          </div>
          <div class="col-lg-2"></div>
          <div class="col-lg-5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <label class="font-size-modal">Total VAT Amount</label>
                <input type="text" class="form-control text-right" id="mod_tot_vat" value="0.00"  readonly>
              </div>
              <div class="col-lg-6 col-md-6">
                <label class="font-size-modal">Total Net of VAT</label>
                <input type="text" class="form-control text-right" id="mod_net_vat" value="0.00"  readonly>
              </div>
            </div>            
          </div>
        </div>
        <div class="row pt-3">
          <div class="col-lg-12">
            <div id="div_query_items" class="table-responsive" style="height: 200px;">
              
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
