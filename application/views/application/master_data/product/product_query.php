<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/product/product_query.js') ?>"></script>
<body>
<input type="hidden" id="product_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-8 col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Product Master Data</h3>
                    </div>
                    <div class="col-4 col-xs-6 col-md-6 pt-3 text-right" >
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

        <div class="row mb-2">
            <div class="col-xs-12 col-md-12">
                <div class="container pb-0">
                    
                    <div class="form-group row my-0">
                        <div class="col-xs-12 col-md-2 pl-0 pad-right">
                            <span class="font-size-18">Product Type</span>
                            <select class="form-control"type="text" id="product_type_query">
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-6 pl-0 pad-right">
                            <span class="font-size-18">Keyword</span>
                            <input type="text" class="form-control" placeholder="Search Product No, Product Name" id="search_box">
                        </div>
                        <div class="col-xs-12 col-md-2 pl-0 pad-right">
                            <span class="font-size-18">Status</span>
                            <select class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="3">Hold</option>
                                <option value="4">Phase Out</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-2 pl-0 pad-right">
                            <span class="font-size-18">Outlet</span>
                            <select class="form-control" id="outlet">
                                <option value="0">All</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group row my-0">

                        <div class="col-xs-12 col-md-3 pl-0 pad-right">
                            <span class="font-size-18">Product Category</span>
                            <select class="form-control"type="text" id="product_category_query">
                                <option value="0">ALL</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-md-3 pl-0 pad-right">
                            <span class="font-size-18">Product Class</span>
                            <select class="form-control"type="text" id="product_class_query">
                                <option value="0">ALL</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-md-2 pl-0 pad-right">
                            <span class="font-size-18">Product Brand</span>
                            <select class="form-control"type="text" id="product_brand_query">
                                <option value="0">ALL</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-md-2 pl-0 pad-right">
                            <span class="font-size-18">Product Color</span>
                            <select class="form-control"type="text" id="product_color_query">
                                <option value="0">ALL</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-md-2 pl-0 pad-right">
                            <span class="font-size-18">Product Size</span>
                            <select class="form-control"type="text" id="product_size_query">
                                <option value="0">ALL</option>
                            </select>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

      <div class="row mb-2">
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row bg-button my-0">
              <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto  pl-0 pr-1">
                <button class="btn btn-success btn-height-30 btn-block p-0" id="search">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row pb-2">
        <div class="col-xs-12 col-md-12">
          <div class="container">
            <div class="form-group row my-0">
              <div class="col-8 col-lg-10 col-md-10 text-right pt-1">
                <label class="font-size-18">No. of Products : </label>
              </div>
              <div class="col-4 col-lg-2 col-md-2 text-right px-0">
                <input type="text" class="form-control text-center ml-auto" id="no_of_prod" value="0" readonly>
              </div>
            </div>              
          </div>
        </div>
      </div>



        <div class="row">
            <div class="col-xs-2 col-md-12 mb-5" id="query-table">
                
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_query" style="top: 2%;">
  <div class="modal-dialog" style="max-width: 1050px !important;">
    <div class="modal-content">
      <div class="modal-header pb-0 pt-1">
        <h4 class="modal-title">Product Query</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body pt-2">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-md-12 px-0">
                    <span class="required"><i>Note : Choose outlet to view the product inventory</i></span>
                    <div class="col-xs-12 col-md-12 px-0">
                        <div class="form-group row">
                            <div class="col-xs-12 col-md-10">                            
                                <div class="form-group row py-0 my-1">
                                    <div class="col-xs-12 col-md-4">
                                        <span>Product No. <span class="required"></span></span>
                                        <input type="text" class="form-control" id="product_no" data-id="0">
                                    </div>

                                    <div class="col-xs-12 col-md-2"></div>

                                    <div class="col-xs-12 col-md-3">
                                        <span>Outlet No. <span class="required"></span></span>
                                        <select class="form-control" id="outlet_no">
                                            <option value="0">All</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-md-3">
                                        <span>Status <span class="required"></span></span>
                                        <select class="form-control" id="product_status">
                                            <option value="1">Active</option>
                                            <option value="3">Hold</option>
                                            <option value="4">Phase Out</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row py-0 my-1">
                                    <div class="col-xs-12 col-md-12">
                                        <span>Product Name <span class="required"></span></span>
                                        <input type="text" class="form-control" id="product_name" data-code="">
                                    </div>
                                </div>

                                <div class="form-group row py-0 my-1">
                                    <div class="col-xs-12 col-md-12">
                                        <span>Product Specification / Description </span>
                                        <textarea class="form-control" id="product_specs" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-2 pl-0 ">
                                <img id='img-upload' class="img-fluid img-thumbnail mx-auto d-block p-1 float-right text-center img-prod" />                            
                            </div>
                        </div>
                    </div>
                    
                <hr class="my-3">

                <div class="col-xs-12 col-md-12 px-0">
                    <div class="form-group row py-0 my-1">
                        <div class="col-xs-12 col-md-4">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <span>Product Type <span class="required"></span></span>
                                    <select class="form-control" id="product_type">
                                        <option></option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <span> Unit <span class="required"></span></span>
                                    <select class="form-control" id="product_stock_unit">
                                        <option value="0"></option>
                                    </select>
                                </div>                                
                            </div>                            
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <span>Brand</span>
                                    <select class="form-control" id="product_brand">
                                        <option value="0"></option>
                                    </select>

                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <span>Model</span>
                                    <input type="text" class="form-control" id="product_model">
                                </div>                                 
                            </div>                           
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-6" hidden>
                                    <span>Cost Price (Average) </span>
                                    <input type="text" class="form-control text-right" value="0" id="cost_price" readonly>          
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <span>Sales Tax (VAT) %</span>
                                    <input type="text" class="form-control text-right" id="vat" value="0" >
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <span>Good Stock on Hand</span>
                                    <input type="text" class="form-control text-right" id="onhand" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row py-0 my-1">
                        <div class="col-md-4 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <span>Category <span class="required"></span></span>
                                    <select class="form-control" id="product_category">
                                        <option></option>
                                    </select>
                                </div>
                            </div>                            
                        </div>

                        <div class="col-xs-12 col-md-4">

                            <div class="row">

                                <div class="col-xs-12 col-md-6">
                                    <span>Color </span>
                                    <select class="form-control" id="product_color"> 
                                        <option></option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <span>Size </span>
                                    <select class="form-control" id="product_size">
                                        <option></option>
                                    </select>
                                </div>                                
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <span>Discount </span>
                                    <input type="text" class="form-control text-right" id="discount" value="0">
                                </div>                                

                                <div class="col-xs-12 col-md-6">
                                    <span>Others (BO/Damage)</span>
                                    <input type="text" class="form-control text-right" id="damage" value="0" readonly>
                                </div>                                
                            </div>                             
                        </div>   

                    </div>

                    <div class="form-group row py-0 my-1">
                        <div class="col-md-4 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <span>Class <span class="required"></span></span>
                                    <select class="form-control" id="product_class">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <span>Stock Item <span class="required"></span></span>
                                    <select class="form-control" id="product_stock">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>                                

                                <div class="col-xs-12 col-md-6">
                                    <span>Re Order Level </span>
                                    <input type="text" class="form-control text-right" id="product_level" value="0">
                                </div>                                
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <span>Selling Price <span class="required"></span></span>
                                    <input type="text" class="form-control text-right" id="selling_price" value="0">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <span>Total Stock</span>
                                    <input type="text" class="form-control text-right" id="total_stock" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>

        </div>
      </div>
      <div class="modal-footer py-2">
        <button type="button" class="btn btn-orange px-5" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

