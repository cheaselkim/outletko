<script type="text/javascript" src="<?php echo base_url('js/application/sales/sales_insert.js') ?>"></script>

<input type="hidden" id="prod_id">
<input type="hidden" id="tbl_item_row">
<div class="container-fluid px-0 mx-0">
  <div class="row mx-0">
    <div class="div-trans col-12 ">
      <div class="row">
        <div class="col-3 text-date pt-2 pr-0 mx-2">
          <span>Trans No :</span>
          <span style="font-weight: bold; font-size: 25px;" id="trans_no">000001</span>
        </div>
        <div class="col-1 text-date pt-2 pr-0 px-0">
          <span>Customer</span>
        </div>
        <div class="col-6 pt-2 pr-0 px-0">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <input type="text" class="form-control text-box-cust-code" id="cust_code" value="0000" >
            </div>
              <input type="text" class="form-control text-box-cust-name" id="cust_name" value="CASH">
          </div>   
        </div>
        <div class="col-1 pt-2 pr-0">
            <button class="btn btn-customer">+ Customer</button> 
        </div>
      </div>
    </div>

    <div class="div-item col-12">
      <div class="row">
        <div class="col-3 pl-2">
          <div class="img-item-box" id="image-box">
          </div>
        </div>
        <div class="col-7 px-0">
         <div class="row pt-2 pb-1">
            <div class="col-5 px-0">
              <div class="form-inline">
                <label for="prod_no" style="font-size: 20px;">Product No. </label>
                <input type="text" class="form-control" style="margin-left: 38px;" id="prod_no"  readonly>                
              </div>
            </div>
            <div class="col-7 pr-0" style="padding-left: 119px;">
              <div class="form-inline">
                <div class="col-auto px-0 px-2" style="margin-top: -7px;">
                  <span style="font-size: 20px;">Stock Qty</span>
                </div>
                <div class="col-auto input-group pr-0">
                  <div class="input-group-prepend pr-2">
                    <input type="text" class="form-control text-box-stock2 text-right" id="stock_qty" readonly style="width: 120px;">
                  </div>
                    <input type="text" class="form-control text-box-stock2" id="stock_uom" readonly style="width: 120px;">
                </div>          
              </div>              
            </div>
          </div>
          <div class="row">
            <div class="col-12 px-0">
              <div class="form-inline">
                <label for="prod_name" style="font-size: 20px;">Product Name </label>
                <input type="text" class="form-control ml-3" id="prod_name" readonly>
              </div>              
            </div>
          </div>
        </div>
        <div class="col-2 px-0">
          <div class="row mx-0">
            <div class="col-12 px-0">
              <button class="btn btn-bg-green2 btn-select-item text-md2" data-toggle="modal" data-target="#select_item_modal" id="btn_select_item"><i class="fas fa-plus"></i> Select Item</button>
            </div>
          </div>
          <div class="row mx-0"> 
            <div class="col-12 text-agent px-0">
              <div class="form-group pt-4">
                <span class="text-date" >Partner / Agent</span>
                <input type="text" class="form-control" value="Francis" style="width: 150px;margin-left:35px;"  readonly>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="div-sub-main-trans col-12 pb-0">
      <div class="row">
      <!-- Product Details Input -->
      <div class="col-4 pt-3" id="color-sub-trans">
        <div class="form-group row mb-0">
          <div class="col-5">
            <span>Regular Price:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right" id="reg_price"  placeholder="0.00" readonly>
          </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Selling Price:</span>
          </div>
          <div class="col-7 col-auto">
              <input type="text" class="form-control text-right" id="sel_price" placeholder="0.00" >
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Quantity:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right" id="qty" placeholder="0" >
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Total Price:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right" id="total_price" placeholder="0.00" readonly>
          </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Volume Discount:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right" id="volume_discount" placeholder="0.00" >
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Total Selling Price:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right" id="total_selling_price" placeholder="0.00" readonly>
          </div>
        </div>

        <hr style="color: black;" class="my-2">
        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Share %:</span>
          </div>
          <div class="col-3 col-auto">
            <input type="text" class="form-control text-right" id="share_per" placeholder="0%" value="5" readonly>
          </div>
          <div class="col-4">
            <input type="text" class="form-control text-right" id="share_amount" placeholder="0.00"  readonly>
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <button class="btn btn-bg-green2" data-toggle="modal" data-target="#payment_modal">Payment Type</button>
          </div>
          <div class="col-3">
            <input type="text" class="form-control" value ="CASH" id="pay_hdr_type" readonly>
          </div>
          <div class="col-4">
            <input type="text" class="form-control text-right" placeholder="0.00" id="pay_total_amount" readonly>
          </div>
        </div>
      </div>
      <!-- END Product Details Input -->

      <!-- List of products display -->
      <div class="div-main-trans col-8" style="overflow:auto;">
        <div class="col-auto pl-1" id="tbl-size">
          <table class="table table-striped table-sm" id="tbl-products">
            <thead>
              <tr>
                <th>PN</th>
                <th>Product Name</th>
                <th>Qty.</th>
                <th>UM</th>
                <th>Regular Price</th>
                <th>Selling Price</th>
                <th>Total Price</th>
                <th>Volume Discount</th>
                <th>Total Selling Price</th>
                <th>Share Percent</th>
                <th>Share Amount</th>
                <th>Total Amount</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

        <div class="col-auto pt-2">
          <div class="row">
            <div class="col-6 pt-4 text-date">
              <span>No of items: </span>
              <span>2</span>
            </div>
            <div class="col-6">
              <div class="form-inline text-date">
                <span class="px-2 mx-1" >Sales Discount </span>
                <input type="text" class="form-control text-right" id="sales_discount" placeholder="0.00">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
              <div class="form-inline text-date">
                <span class="px-2 text-date">Total</span>
                <span class="px-4 mx-1 text-date">PHP</span>
                <input type="text" class="form-control text-right" id="grand_total" value="0.00" readonly>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END List of products display -->
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("application/sales/sales_footer"); ?>


<!-- Modal for Payment -->
<div class="modal fade" id="payment_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Payment Details</h5>
      </div>

      <div class="modal-body">
        <div class="col-12">
          <div class="form-group row">
            <div class="col-6">
              <span>Payment Date</span>
            </div>
            <div class="col-6">
              <input type="date" class="form-control" id="payment_date">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Payment Type</span>
            </div>
            <div class="col-6">
              <select class="form-control border-black" id="payment_type">
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Bank Name</span>
            </div>
            <div class="col-6">
              <select class="form-control border-black" id="bank_name">
                <option selected hidden></option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Check/Card No.</span>
            </div>
            <div class="col-6">
              <input type="text" class="form-control" id="check_no">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Check Date</span>
            </div>
            <div class="col-6">
              <input type="date" class="form-control" id="check_date">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Currency</span>
            </div>
            <div class="col-6">
              <select class="form-control border-black" id="currency">
                
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Amount</span>
            </div>
            <div class="col-6">
              <input type="text" class="form-control text-right" id="payment_amount" value="0.00">
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="col-12">
          <div class="form-group row">
            <div class="col-6 left">
              <button class="btn btn-danger text-lg" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6 right">
              <button class="btn btn-warning text-lg" data-dismiss="modal">Continue</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Modal for Payment -->

<!-- Modal for Select Other Item -->
<div class="modal fade" id="select_item_modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Products / Services</h5>
      </div>

      <div class="modal-body">
        <div class="col-12">
          <div class="form-group row">
            <div class="col-3">
              <select class="form-control" id="item_category">
<!--                 <option selected hidden>Categories</option> -->
                <option value="1">T-Shirt</option>
              </select>
            </div>
            <div class="col-9">
              <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control" placeholder="Search" aria-label="Search" id="item_keyword">
                <div class="input-group-append">
                  <span class="input-group-button">
                    <button class="btn btn-info btn-md" type="button">
                      <i class="fas fa-search text-grey" aria-hidden="true"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12" style="height: auto;">
              <div id="div-tbl-items">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="col-12">
          <div class="row">
            <div class="col-9 text-right">
              <button class="btn btn-success text-lg" hidden><i class="fas fa-check"></i> Select</button>
            </div>
            <div class="col-3 text-right">
              <button class="btn btn-grey text-lg" data-dismiss="modal">Close</button>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Modal for Select Other Item -->

