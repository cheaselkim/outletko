<script type="text/javascript" src="<?php echo base_url('js/application/sales/sales_query.js') ?>"></script>
<input type="hidden" id="app_func" value="<?php echo $function; ?>">

<div class="container-fluid" id="div_edit">
  
</div>

<div class="container-fluid" style="height: auto;min-height: 85vh;" id="div_query">
  
  <div class="row pt-5">
    <div class="col-1"></div>
    <div class="col-10">
      <div class="form-inline">
        <label for="searching" class="font-weight-bold">Search : </label>
        <input type="text" class="form-control ml-3" id="keyword" placeholder="Customer/Transaction No" style="width: 300px;">
        <label class="ml-3" id="lbl_status">Status</label>
        <select class="form-control input-sm ml-3" id="status"> 
          <option value="0">All</option>
          <option value="1">Transaction</option>
          <option value="2">Cancelled</option>
        </select>
        <button class="btn btn-primary ml-3" id="btn_search">Search</button>
      </div>                    
    </div>
    <div class="col-1"></div>
  </div>
  
  <div class="row pt-4">
    <div class="col-1"></div>
    <div class="col-10">
      <div id="div_query_tbl">
        
      </div>
    </div>
    <div class="col-1"></div>
  </div>

</div>

<div class="modal fade" id="modal_query" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Sales Query</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 px-0">
            <div class="form-inline">
              <label class="ml-3">Transaction No : </label>
              <input type="text" class="form-control ml-3" id="keyword" id="trans_no_query" style="width: 100px;">
              <label for="searching" class="ml-3">Customer : </label>
              <input type="text" class="form-control ml-3" id="keyword" id="cust_code_query" style="width: 100px;">
              <input type="text" class="form-control ml-3" id="keyword" id="cust_name_query" style="width: 300px;">
            </div>                    
<!--             <div class="form-inline">
              <label class="ml-3">Total Amount</label>
              <input type="text" class="form-control ml-3" id="keyword" id="trans_no_query" style="width: 100px;">
              <label for="searching">Sales Discount</label>
              <input type="text" class="form-control ml-3" id="keyword" id="cust_code_query" style="width: 100px;">
              <label for="searching">Grand Total</label>
              <input type="text" class="form-control ml-3" id="keyword" id="cust_name_query" style="width: 300px;">
            </div> -->
<!--             <div class="col-12 mt-4">
              <div class="div_item_tblquery">
                
              </div>
            </div>                     -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger">Close</button>
      </div>
    </div>
  </div>
</div>
