
<body>

<div class="container-fluid px-0 mx-0">
  <div class="row mx-0">
    <div class="div-trans col-12 ">
      <div class="row">
        <div class="col-3 text-date pt-2 pr-0 mx-2">
          <span>Trans No :</span>
          <span style="font-weight: bold; font-size: 25px;">000001</span>
        </div>
        <div class="col-1 text-date pt-2 pr-0 px-0">
          <span>Customer</span>
        </div>
        <div class="col-6 pt-2 pr-0 px-0">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <input type="text" class="form-control" id="text-box-cust-code" placeholder="0000" >
            </div>
              <input type="text" class="form-control" id="text-box-cust-name" placeholder="CASH">
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
          <div class="img-item-box">
            
          </div>
        </div>
        <div class="col-7 px-0">
         <div class="row pt-2 pb-1">
            <div class="col-5 px-0">
              <div class="form-inline">
                <label for="prod_no" style="font-size: 20px;">Product No. </label>
                <input type="text" class="form-control" style="margin-left: 38px;" id="prod_no" >                
              </div>
            </div>
            <div class="col-7 pr-0" style="padding-left: 119px;">
              <div class="form-inline">
                <div class="col-auto px-0 px-2" style="margin-top: -7px;">
                  <span style="font-size: 20px;">Stock Qty</span>
                </div>
                <div class="col-auto input-group pr-0">
                  <div class="input-group-prepend pr-2">
                    <input type="text" class="form-control" id="text-box-stock2">
                  </div>
                    <input type="text" class="form-control" id="text-box-stock2">
                </div>          
              </div>              
            </div>
          </div>
          <div class="row">
            <div class="col-12 px-0">
              <div class="form-inline">
                <label for="prod_name" style="font-size: 20px;">Product Name </label>
                <input type="text" class="form-control ml-3" id="prod_name">
              </div>              
            </div>
          </div>
        </div>
        <div class="col-2 px-0">
          <div class="row mx-0">
            <div class="col-12 px-0">
              <button class="btn btn-bg-green2 btn-select-item text-md2" data-toggle="modal" data-target="#select_item_modal"><i class="fas fa-plus"></i> Select Item</button>
            </div>
          </div>
          <div class="row mx-0"> 
            <div class="col-12 text-agent">
              <div class="form-group pt-4">
                <span class="text-date" >Partner / Agent</span>
                <input type="text" class="form-control" value="Francis" style="width: 165px;margin: 0 auto;">
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
            <input type="text" class="form-control text-right"  placeholder="250.00">
          </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Selling Price:</span>
          </div>
          <div class="col-7 col-auto">
              <input type="text" class="form-control text-right"  placeholder="250.00">
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Quantity:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right"  placeholder="2">
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Total Price:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right"  placeholder="500.00">
          </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Volume Discount:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right"  placeholder="0.00">
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Total Selling Price:</span>
          </div>
          <div class="col-7 col-auto">
            <input type="text" class="form-control text-right"  placeholder="500.00">
          </div>
        </div>

        <hr style="color: black;" class="my-2">
        <div class="form-group row mb-1">
          <div class="col-5">
            <span>Share %:</span>
          </div>
          <div class="col-3 col-auto">
            <input type="text" class="form-control text-right" placeholder="5%">
          </div>
          <div class="col-4">
            <input type="text" class="form-control text-right" placeholder="25.00">
          </div>
        </div>

        <div class="form-group row mb-1">
          <div class="col-5">
            <button class="btn btn-bg-green2" data-toggle="modal" data-target="#payment_modal">Payment Type</button>
          </div>
          <div class="col-3">
            <input type="text" class="form-control" placeholder="CASH">
          </div>
          <div class="col-4">
            <input type="text" class="form-control text-right" placeholder="1,000.00">
          </div>
        </div>
      </div>
      <!-- END Product Details Input -->

      <!-- List of products display -->
      <div class="col-8" id="color-trans">
        <div id="color-trans">
          <div class="col-auto spx-0" id="tbl-size" >
            <table class="table table-sm" id="table-products" style="background: white;">
              <thead>
                <tr>
                  <th>PN</th>
                  <th>Product Name</th>
                  <th>Qty.</th>
                  <th>UM</th>
                  <th>Total Price</th>
                </tr>
              </thead>
              <tbody style="overflow-y: auto;">
                <?php   for ($i=0; $i <1 ; $i++) { ?>
                <tr>
                  <td class="filterable-cell">TOQ642<?php echo $i; ?></td>
                  <td class="filterable-cell">Shoes</td>
                  <td class="filterable-cell">2</td>
                  <td class="filterable-cell">pc/s</td>
                  <td class="filterable-cell">500.00</td>
                </tr>
                <tr>
                  <td class="filterable-cell">HDYEU3<?php echo $i; ?></td>
                  <td class="filterable-cell">T-Shirt</td>
                  <td class="filterable-cell">1</td>
                  <td class="filterable-cell">pc/s</td>
                  <td class="filterable-cell">450.00</td>
                </tr>
              <?php  } ?>
              </tbody>
            </table>
          </div>

          <div class="col-auto pt-3">
            <div class="row">
              <div class="col-6 pt-3 text-date">
                <span>No of items: </span>
                <span>2</span>
              </div>
              <div class="col-6">
                <div class="form-inline text-date">
                  <span class="px-2 mx-1" >Sales Discount </span>
                  <input type="text" class="form-control" placeholder="50.00">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6"></div>
              <div class="col-6">
                <div class="form-inline text-date">
                  <span class="px-2 text-date">Total</span>
                  <span class="px-4 mx-1 text-date">PHP</span>
                  <input type="text" class="form-control" placeholder="900.00">
                </div>
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

<?php $this->load->view("application/sales/sales_header"); ?>


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
              <input type="date" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Payment Type</span>
            </div>
            <div class="col-6">
              <select class="form-control">
                <option>Cash</option>
                <option>Check</option>
                <option>Credit Card</option>
                <option>Gift Check</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Bank Name</span>
            </div>
            <div class="col-6">
              <select class="form-control">
                <option>BPI</option>
                <option>BDO</option>
                <option>Land Bank</option>
                <option>Security Bank</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Check/Card No.</span>
            </div>
            <div class="col-6">
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Check Date</span>
            </div>
            <div class="col-6">
              <input type="date" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Currency</span>
            </div>
            <div class="col-6">
              <input type="text" class="form-control" value="Php">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Amount</span>
            </div>
            <div class="col-6">
              <input type="text" class="form-control text-right" value="1000.00">
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="col-12">
          <div class="form-group row">
            <div class="col-6 left">
              <button class="btn btn-danger text-lg">Cancel</button>
            </div>
            <div class="col-6 right">
              <button class="btn btn-warning text-lg">Continue</button>
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
              <select class="form-control">
                <option >Categories</option>
                <option>Ladies Shoes</option>
                <option>Men's Shoes</option>
                <option>Bags</option>
                <option>T-Shirts</option>
                <option>Dresses</option>
              </select>
            </div>
            <div class="col-9">
              <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control" placeholder="Search" aria-label="Search">
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
            <table class="table table-striped" id="table-items">
              <thead>
                <tr>
                  <th><input type="checkbox"></th>
                  <th>PN</th>
                  <th>Product Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox"></td>
                  <td class="filterable-cell">YTD901</td>
                  <td class="filterable-cell">Keenter Custom design 100% cotton Men T-Shirt XXL</td>
                  <td><button class="btn cstmbtn"></button></td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="col-12">
          <div class="form-group row right">
            <div class="col-6 ">
              <button class="btn btn-success text-lg"><i class="fas fa-check"></i> Select</button>
            </div>
            <div class="col-6 ">
              <button class="btn btn-grey text-lg">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Modal for Select Other Item -->

</body>

