<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/sales.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/sales/sales_insert.js') ?>"></script>
<input type="hidden" id="prod_id">
<input type="hidden" id="tbl_item_row">

<div class="container-fluid">

	<div class="row">
		<div class="div-trans-header">
			<div class="row">
				<div class="col-2">
					<span class="span-tran-no"><span>Tran No. : </span><span id="sales_trans_no">00001</span></span>
				</div>
				<div class="col-8 div-customer">
				    <div class="input-group">
				      <div class="input-group-prepend mr-3">
				        <span class="span-customer">Customer </span>
				      </div>
				      <input type="text" placeholder="0000" class="form-control" id="cust_code">
				      <input type="text" placeholder="CASH" class="form-control" id="cust_name">
				    </div> 				
				</div>
          <div class="col-2" hidden>
          	<button class="btn btn-primary btn-block py-2">+ Customer</button>
          </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="div-prod-header">
			<div class="row">
				<div class="col-2">
					<div class="div-prod-img" id="image-box">
					</div>
				</div>
				<div class="col-8 div-prod-input">
					<div class="row">
						<div class="col-5" >
							<div class="form-inline">
								<label for="prod_no" class="lbl-prodno">Product No</label>
								<input type="text" class="form-control" id="prod_no" readonly style="width: 125px;">
							</div>
						</div>
						<div class="col-7">
							<div class="form-inline float-right" >
								<label for="prod_no" class="lbl-stock">Stock Qty</label>
								<input type="text" class="form-control" id="stock_qty" readonly>							
								<input type="text" class="form-control" id="stock_uom" readonly>
							</div>
						</div>
					</div>
					<div class="row pt-1">
						<div class="col-12">
							<div class="form-inline">
									<label for="prod_no" class="lbl-prodname">Product Name</label>
									<input type="text" class="form-control" id="prod_name" readonly>							
							</div>							
						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="row">
						<div class="col-12">
							<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#select_item_modal" id="btn_select_item">Select Item</button>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center div-partner">
							<label class="text-partner">Partner / Agent</label>
							<input type="text" class="form-control" readonly id="partner" value="Francis">									
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="div-price">
			<div class="row">
				<div class="col-12">
					<div class="form-horizontal">
						<div class="form-group row mb-1">
							<label class="col-6 col-form-label" for="text-input">Regular Price PHP</label>
							<div class="col-6">
								<input class="form-control text-right" id="reg_price" type="text" placeholder="0.00" readonly>
							</div>
						</div>
						<hr class="my-1">
						<div class="form-group row mb-1">
							<label class="col-6 col-form-label" for="text-input">Selling Price</label>
							<div class="col-6">
								<input class="form-control text-right" id="sel_price" type="text" placeholder="0.00" >
							</div>
						</div>
						<div class="form-group row mb-1">
							<label class="col-6 col-form-label" for="text-input">Quantity</label>
							<div class="col-6">
								<input class="form-control text-right" id="qty" type="text" placeholder="0.00">
							</div>
						</div>
						<div class="form-group row mb-1">
							<label class="col-6 col-form-label" for="text-input">Total Price</label>
							<div class="col-6">
								<input class="form-control text-right" id="total_price" type="text" placeholder="0.00" readonly>
							</div>
						</div>
						<hr class="my-1">
						<div class="form-group row mb-1">
							<label class="col-6 col-form-label" for="text-input">Volume Discount</label>
							<div class="col-6">
								<input class="form-control text-right" id="volume_discount" type="text" placeholder="0.00" >
							</div>
						</div>
						<div class="form-group row mb-1">
							<label class="col-6 col-form-label" for="text-input">Total Selling Price</label>
							<div class="col-6">
								<input class="form-control text-right" id="total_selling_price" type="text" placeholder="0.00" readonly>
							</div>
						</div>
						<hr class="my-1">
						<div class="form-group row mb-1">
							<label class="col-3 col-form-label" for="text-input">Share %</label>
							<div class="col-3">	
								<input class="form-control text-right" id="share_per" type="text" placeholder="5.00" value="5.00" readonly>
							</div>
							<div class="col-6">
								<input class="form-control text-right" id="share_amount" type="text" placeholder="0.00" readonly>
							</div>
						</div>
						<div class="form-group row mb-4">
							<div class="col-6">
					            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#payment_modal">Payment Type</button>
							</div>
							<div class="col-6">
								<input class="form-control" id="pay_hdr_type" type="text" placeholder="CASH" readonly>
							</div>
						</div>
						<div class="form-group row mb-1">
              <div class="col-6 div-btn-cancel">
                <button class="btn btn-danger btn-block" onclick="reset_input();">Cancel</button>
              </div>
              <div class="col-6 div-btn-cancel">
                <button class="btn btn-primary btn-block" id="add_item">Enter</button>
              </div>                
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="div-tbl-products">
			<div class="row mx-0">	
				<div class="col-12 px-0">	
					<div class="div-tbl-prod">
						<div class="col-12 pl-0 pr-1">
							<div class="col-auto">
								<table class="table table-striped table-sm tbl-products" id="tbl-products">
									<thead>
										<tr>
											<th>PN</th>
											<th>Product Name</th>
											<th>Qty.</th>
											<th>UM</th>
											<th>Regular Price</th>
											<th>Selling Price</th>
											<th hidden>Total Price</th>
											<th hidden>Volume Discount</th>
											<th>Total Selling Price</th>
											<th hidden>Share Percent</th>
											<th hidden>Share Amount</th>
											<th hidden>Total Amount</th>
											<th class="remove_hdr">Remove</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mx-0 pb-2">	
				<div class="col-12">
					<div class="div-total">
						<div class="row">
							<div class="col-6">	
								<span class="span-no-of-items">No. of Items. : <span id="no_of_items">0</span></span>
                <div class="div-btn-save bottom">  
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-success btn-block" data-toggle="modal" data-target="#trans_modal" id="save_trans">Save</button>  
                    </div>  
                    <div class="col-6"> 
                      <button class="btn btn-info btn-block" data-toggle="modal" data-target="#preview_modal" onclick="preview_data();">Preview</button>
                    </div>
                  </div>
                </div>  
							</div>	
							<div class="col-6 pr-4">
								<div class="row pr-2">
									<div class="col-6">	
										<label for="sales_discount" class="lbl-total">Sales Discount</label>
									</div>
									<div class="col-6">	
										<input type="text" class="form-control text-right" id="sales_discount" placeholder="0.00">															
									</div>
								</div>	
								<div class="row mt-1 pr-2">	
									<div class="col-6">	
										<label for="grand_total" class="lbl-total">Total PHP</label>
									</div>
									<div class="col-6">	
										<input type="text" class="form-control text-right" placeholder="0.00" id="grand_total" readonly>															
									</div>
								</div>
                <div class="row mt-1 pr-2"> 
                  <div class="col-6"> 
                    <label for="vat_amount" class="lbl-total">Total VAT Amount</label>
                  </div>
                  <div class="col-6"> 
                    <input type="text" class="form-control text-right" placeholder="0.00" id="vat_amount" readonly>                              
                  </div>
                </div>
                <div class="row mt-1 pr-2"> 
                  <div class="col-6"> 
                    <label for="net_vat" class="lbl-total">Total Net of VAT</label>
                  </div>
                  <div class="col-6"> 
                    <input type="text" class="form-control text-right" placeholder="0.00" id="net_vat" readonly>                              
                  </div>
                </div>
							</div>
						</div>							
					</div>
				</div>
			</div>

<!-- 			<div class="row mx-0">
				<div class="col-12">
					<div class="div-btn-save">	
						<div class="row">
							<div class="col-6">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#trans_modal" id="save_trans">Save</button>	
							</div>	
							<div class="col-6">	
								<button class="btn btn-info btn-block" data-toggle="modal" data-target="#preview_modal" onclick="preview_data();">Preview</button>
							</div>
						</div>
					</div>	
				</div>	
			</div> -->

		</div>
	</div>

</div>

<!-- Modal for Payment -->
<div class="modal fade" id="payment_modal" role="dialog" style="margin-top: -50px;">
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
              <input type="date" class="form-control" id="payment_date" value="<?php echo date('Y-m-d') ?>">
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
              <span>Amount <span class="required">*</span></span>
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
              <select class="form-control" id="item_category" style="height: 35px;">
                <option value="1">T-Shirt</option>
              </select>
            </div>
            <div class="col-9">
              <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control" placeholder="Search" aria-label="Search" id="item_keyword" style="height: 35px;">
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
                  <span><?php echo date("m/d/Y"); ?></span>
                </div>
              </div>
            </div>
             <div class="col-12">
              <div class="row ">
                <div class="col-6">
                  <span>Outlet ID: </span>
                </div>
                <div class="col-6">
                  <span><?php echo $this->session->userdata("outlet_code"); ?></span>
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
              <span id="mod_prev_trans_no"></span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-3">
              <span>Customer No: </span>
            </div>
            <div class="col-3">
              <span id="mod_prev_cust_code"></span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-3">
              <span>Customer Name: </span>
            </div>
            <div class="col-3">
              <span id="mod_prev_cust_name"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="col-12">
          <div class="row">
            <div class="col-12" style="height: auto;" id="div-tbl-prev-items">
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
                  <span id="mod_prev_discount"> - </span>
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
                  <span id="mod_prev_grand_total">900.00</span>
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
        <h5>Transaction <span id="mod_trans_no"></span></h5>
      </div>

      <div class="modal-body">
        <div class="col-12">
          <div class="form-group row">
            <div class="col-6">
              <span>Payment Type</span>
            </div>
            <div class="col-6">
              <span id="mod_payment_type">CASH</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Total Sales</span>
            </div>
            <div class="col-6">
              <span id="mod_total_sales">950.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Discount</span>
            </div>
            <div class="col-6">
              <span id="mod_discount">50.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Grand Total Sales</span>
            </div>
            <div class="col-6">
              <span class="text-date" id="mod_grand_total">900.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Amount Paid</span>
            </div>
            <div class="col-6">
              <span class="text-date" id="mod_amount_paid">1,000.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Change</span>
            </div>
            <div class="col-6">
              <span class="text-date" id="mod_change">100.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6">
              <span>Partner / Agent</span>
            </div>
            <div class="col-6">
              <span class="text-date" id="mod_partner">Francis</span>
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
              <span class="text-date" id="mod_share">45.00</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-12 text-center">
              <button class="btn btn-primary btn-block" onclick="window.location.reload();">OK</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>