<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/inventory.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/inventory/issue/issue_query.js') ?>"></script>
<input type="hidden" id="issue_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">



<div class="container-fluid pt-3">
    <div class="container">
      
      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">Issuance Inventory</h3>
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

      <hr style="color: black;" class="mt-0 mb-1">

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0" >
              <div class="col-xs-12 col-md-2 col-lg-2 px-1">
                <label class="text-sales">Issued Date</label>
                <input type="date" class="form-control px-1 txt-box-text-size" id="iss_date" value="<?php echo date('Y-m-d') ?>">
              </div>
              <div class="col-xs-12 col-md-5 col-lg-5 px-1">
                <label class="text-sales">Keyword</label>
                <input type="text" class="form-control txt-box-text-size" placeholder="Search Receive No, Vendor Name" id="search_box">
              </div>
              <div class="col-xs-12 col-md-3 col-lg-3 px-1">
                <label class="text-sales">Transaction Type</label>
                <select class="form-control txt-box-text-size" id="trans_type">
                  
                </select>
              </div>
              <div class="col-xs-12 col-md-2 col-lg-2 px-1" hidden>
                <label class="text-sales">Outlet</label>
                <select class="form-control txt-box-text-size" id="outlet">
                  <option value="0">ALL</option>
                </select>
              </div>
              <div class="col-xs-12 col-md-2 col-lg-2 px-1">
                <label class="text-sales">Status</label>
                <select class="form-control" id="status">
                  <option value="1">Active</option>
                  <option value="2">Received</option>
                  <option value="0">Cancelled</option>
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
              <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto pl-0 pr-1">
                <button class="btn btn-success btn-prod btn-block p-0" id="search">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row py-2">
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0">
              <div class="col-lg-10 text-right pt-1">
                <label class="text-sales">No. of Issued Transaction : </label>
              </div>
              <div class="col-lg-2 text-right px-0">
                <input type="text" class="form-control text-center ml-auto" id="issue_trans" value="0" readonly>
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

<div class="modal" id="modal_query">
  <div class="modal-dialog modal-lg" style="top: -5%;">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h4 class="modal-title">Issuance Query</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 pr-1">
            <label class="font-size-modal">Issuance No</label>
            <input type="text" class="form-control" id="mod_issuance_no" readonly>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 px-1">
            <label class="font-size-modal">Issuance Date</label>
            <input type="date" class="form-control" id="mod_issuance_date" readonly>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 px-1">
            <label class="font-size-modal">Ref. Trans. No</label>
            <input type="text" class="form-control" id="mod_ref_no" readonly>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pl-1">
            <label class="font-size-modal">Ref. Trans. Date</label>
            <input type="date" class="form-control" id="mod_ref_date" readonly>
          </div>
        </div>
        <div class="row pt-2">
          <div class="col-lg-8 col-md-6 col-sm-12 mr-auto">
            <label class="font-size-modal">Outlet/Supplier/Customer</label>
            <div class="row">
              <div class="col-lg-4">
                <input type="text" class="form-control" id="mod_cust_code" readonly>
              </div>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="mod_cust_name" readonly>
              </div>
            </div>
          </div>
          <div class="col-lg-4 ml-auto">
            <label class="font-size-modal">Transaction Type</label>
            <input type="text" class="form-control" id="mod_trans_type" readonly>
          </div>
        </div>
        <div class="row pt-2">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6">
                <label class="font-size-modal">Average Selling Cost</label>
                <input type="text" class="form-control text-right" id="mod_ave_cost" value="0.00" readonly>
              </div>
              <div class="col-lg-6">
                <label class="font-size-modal">Total Amount</label>
                <input type="text" class="form-control text-right" id="mod_tot_amount" value="0.00"  readonly>
              </div>
            </div>
          </div>
          <div class="col-lg-1"></div>
        </div>
        <div class="row pt-3">
          <div class="col-lg-12">
            <div id="div_query_items" style="height: 230px;">
              
            </div>
          </div>
        </div>        
      </div>
      <div class="modal-footer py-2">
        <button type="button" class="btn btn-danger px-3" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
    });
</script>