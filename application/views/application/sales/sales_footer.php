
<div class="container-fluid px-0 mx-0">
  <div class="row mx-0">

    <div class="div-sub-main-trans col-12">
      <div class="row">
      <div class="col-4 pt-0 pb-0" id="color-sub-trans">
        <div class="form-group row" style="float: right;">
         <div class="col-12">
            <button class="btn btn-danger text-small">Cancel</button>
            <button class="btn btn-warning text-lg" id="add_item">Enter</button>
          </div>
        </div>
      </div>

      <div class="col-8 pt-0 pb-0" id="color-trans">
        <div id="color-trans">
            <div class="form-group row" style="float: left;">
             <div class="col-12">
                <button class="btn btn-success text-small" data-toggle="modal" data-target="#trans_modal">Save</button>
                <button class="btn btn-primary text-lg" data-toggle="modal" data-target="#preview_modal">Preview</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Preview -->
<div class="modal fade" id="preview_modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div class="form-group row col-12">
          <div class="col-7">
            <h5>SALES TRANSACTION</h5>
          </div>
          <div class="col-5">
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <span>DATE: </span>
                </div>
                <div class="col-6">
                  <span>12/26/2018</span>
                </div>
              </div>
            </div>
             <div class="col-12">
              <div class="row ">
                <div class="col-6">
                  <span>Outlet ID: </span>
                </div>
                <div class="col-6">
                  <span>QC01</span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row ">
                <div class="col-6">
                  <span>User ID: </span>
                </div>
                <div class="col-6">
                  <span>CAS01</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-body">
        <div class="col-12">
          <div class="row">
            <div class="col-3">
              <span>Transaction No: </span>
            </div>
            <div class="col-3">
              <span>0000001</span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-3">
              <span>Customer No: </span>
            </div>
            <div class="col-3">
              <span>0000001</span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-3">
              <span>Customer Name: </span>
            </div>
            <div class="col-3">
              <span>CASH SALES</span>
            </div>
          </div>
        </div>
        <br>
        <div class="col-12">
          <div class="row">
            <div class="col-12" style="height: auto;">
            <table class="table table-striped" id="table-items">
              <thead>
                <tr>
                  <th>LN</th>
                  <th>PN</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Unit Price</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>TOQ642</td>
                  <td>Black Shoes for Men</td>
                  <td>2</td>
                  <td>pc/s</td>
                  <td>250.00</td>
                  <td>500.00</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>HDYEU3</td>
                  <td>Keenter Custom design 100% cotton Men T-Shirt XXL</td>
                  <td>1</td>
                  <td>pc/s</td>
                  <td>450.00</td>
                  <td>450.00</td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
              <div class="row">
                <div class="col-6">
                  <span>Discount : </span>
                </div>
                <div class="col-6 px-5">
                  <span> - </span>
                </div>
              </div>  
            </div>
          </div>

          <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
              <div class="row">
                <div class="col-6">
                  <span>Total PHP : </span>
                </div>
                <div class="col-6 px-5">
                  <span>900.00</span>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="col-12">
          <div class="form-group row right">
            <div class="col-6 ">
              <button class="btn btn-grey text-lg" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Modal for Preview -->

<!-- Modal for Save Transaction -->
<div class="modal fade" id="trans_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Transaction 000001</h5>
      </div>

      <div class="modal-body">
        <div class="col-12">
          <div class="form-group row">
            <div class="col-6">
              <span>Payment Type</span>
            </div>
            <div class="col-6">
              <span>CASH</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Total Sales</span>
            </div>
            <div class="col-6">
              <span>950.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Discount</span>
            </div>
            <div class="col-6">
              <span>50.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Grand Total Sales</span>
            </div>
            <div class="col-6">
              <span class="text-date">900.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Amount Paid</span>
            </div>
            <div class="col-6">
              <span class="text-date">1,000.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Change</span>
            </div>
            <div class="col-6">
              <span class="text-date">100.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Partner / Agent</span>
            </div>
            <div class="col-6">
              <span class="text-date">Francis</span>
            </div>
          </div>

          <div class="form-group row">
           <div class="col-3">
              <span>Share %:</span>
            </div>
             <div class="col-3 col-auto">
              <span>5 %</span>
            </div>
            <div class="col-5">
              <span class="text-date">45.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Modal for Save Transaction -->

