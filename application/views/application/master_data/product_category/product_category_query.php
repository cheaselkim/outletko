<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product_category.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/application/master_data/product_category/product_category_query.js') ?>"></script>
<input type="hidden" id="submodule_id" value="0">
<input type="hidden" id="app_func" value="<?php echo $function; ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-2">
    <div class="container">

      <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-8 col-xs-6 col-md-6 pt-3">
                      <h3 class="font-weight-bold">Product Category</h3>
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

        <div class="row">
            <div class="col-lg-2 col-md-3  col-sm-12 pad-right">
                <span class="font-size-18">Category Code</span>
                <input type="text" class="form-control"  id="prod_cat_code">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 pad-center">
                <span class="font-size-18">Category Name</span>
                <input type="text" class="form-control" id="prod_cat_name">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12 pad-left">
                <span class="font-size-18">Outlet</span>
                <select class="form-control" id="prod_cat_outlet">
                    <option value="0">ALL</option>
                </select>
            </div>

        </div>

        <div class="row pt-2">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row bg-button my-0">
                        <div class="col-xs-12 col-md-12 col-lg-2 py-1 ml-auto pl-0 pr-1">
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
                        <div class="col-8 col-lg-10 col-md-10 text-right pt-1">
                            <label class="font-size-18">No. of Outlets : </label>
                        </div>
                        <div class="col-4 col-lg-2 col-md-2 text-right px-0">
                            <input type="text" class="form-control text-center ml-auto" id="count" value="0" readonly>
                        </div>
                    </div>              
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="div-query">
                    
                </div>
            </div>
        </div>

    </div>
</div>


