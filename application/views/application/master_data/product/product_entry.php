<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/product.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/application/master_data/product/product_entry.js') ?>"></script>
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

                        <h3 class="font-weight-bold">Entry</h3>

                    </div>

                </div>

            </div>

        </div>



        <hr style="color: black;" class="mt-0 mb-2">



        <!-- Entry Product Master Data -->

        <div class="row">

            <div class="col-xs-12 col-md-12">

                <div class="col-xs-12 col-md-12 px-0">

                    <div class="form-group row">

                        <div class="col-xs-12 col-md-9 col-lg-10">                            

                            <div class="form-group row py-0 my-1">

                                <div class="col-xs-12 col-md-4">

                                    <span>Product No. <span class="required">*</span></span>

                                    <input type="text" class="form-control" id="product_no">

                                </div>

                                <div class="col-xs-12 col-md-2 col-lg-4"></div>

                                <div class="col-xs-12 col-md-3 col-lg-2 pad-right">

                                    <span>Outlet No. <span class="required">*</span></span>

                                    <select class="form-control" id="outlet_no">

                                        <option value="0">All</option>

                                    </select>

                                </div>

                                <div class="col-xs-12 col-md-3 col-lg-2 pad-left">

                                    <span>Status <span class="required">*</span></span>

                                    <select class="form-control" id="product_status">

                                        <option value="1">Active</option>

                                        <option value="3">Hold</option>

                                        <option value="4">Phase Out</option>

                                    </select>

                                </div>

                            </div>



                            <div class="form-group row py-0 my-1">

                                <div class="col-xs-12 col-md-12">

                                    <span>Product Name <span class="required">*</span></span>

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



                        <div class="col-xs-12 col-md-3 col-lg-2 pad-left">

                            <img id='img-upload' class="img-fluid img-thumbnail mx-auto d-block p-1 text-center img-prod" />                            

                            <div class="input-group">

                                <span class="input-group-btn pt-2">

                                    <span class="btn btn-primary btn-file">

                                        Browse… <input type="file" id="imgInp">

                                    </span>

                                </span>

                                <span class="text-img ml-3"></span><br>

                            </div>

                        </div>

                    </div>

                </div>



                <hr class="my-3">



                <div class="col-xs-12 col-md-12 px-0">



                    <div class="form-group row py-0 my-1">

                        <div class="col-xs-12 col-md-4 pad-right">

                            <div class="row">

                                <div class="col-md-6 col-sm-12 pad-right">

                                    <span>Product Type <span class="required">*</span></span>

                                    <select class="form-control" id="product_type">

                                        <option></option>

                                    </select>

                                </div>

                                <div class="col-md-6 col-sm-12 pad-left">

                                    <span> Unit <span class="required">*</span></span>

                                    <select class="form-control" id="product_stock_unit">

                                        <option value="0"></option>

                                        

                                    </select>

                                </div>                                

                            </div>                            

                        </div>

                        <div class="col-xs-12 col-md-4">

                            <div class="row">

                                <div class="col-xs-12 col-md-6 pad-right">

                                    <span>Brand</span>

                                    <select class="form-control" id="product_brand">

                                        <option value="0"></option>

                                        

                                    </select>

                                </div>

                                <div class="col-xs-12 col-md-6 pad-left">

                                    <span>Model</span>
                                    <input type="text" class="form-control" id="product_model">

                                </div>                                 

                            </div>                           

                        </div>

                        <div class="col-xs-12 col-md-4 pad-left">

                            <div class="row">

                                <div class="col-xs-12 col-md-6 pad-right">

                                    <span>Cost Price (Average) </span>

                                    <input type="text" class="form-control text-right" value="0" id="cost_price" readonly>          

                                </div>

                                <div class="col-xs-12 col-md-6 pad-left">

                                    <span>Sales Tax (VAT) %</span>

                                    <input type="text" class="form-control text-right" id="vat" value="0">

                                </div>

                            </div>

                            

                        </div>

                    </div>



                    <div class="form-group row py-0 my-1">

                        <div class="col-md-4 col-xs-12">

                            <div class="row">

                                <div class="col-xs-12 col-md-12 pad-right">

                                    <span>Category <span class="required">*</span></span>

                                    <select class="form-control" id="product_category">

                                        <option ></option>

                                        

                                    </select>

                                </div>

                            </div>                            

                        </div>

                        <div class="col-xs-12 col-md-4">

                            <div class="row">

                                <div class="col-xs-12 col-md-6 pad-right">

                                    <span>Color </span>

                                    <select class="form-control" id="product_color"> 

                                        <option ></option>

                                        

                                    </select>

                                </div>

                                <div class="col-xs-12 col-md-6 pad-left">

                                    <span>Size </span>

                                    <select class="form-control" id="product_size">

                                        <option></option>
                                        

                                    </select>

                                </div>                                

                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4 pad-left">

                            <div class="row">

                                <div class="col-xs-12 col-md-6 pad-right">

                                    <span>Selling Price <span class="required">*</span></span>

                                    <input type="text" class="form-control text-right" id="selling_price" value="" placeholder="0.00">

                                </div>

                                <div class="col-xs-12 col-md-6 pad-left">

                                    <span>Discount </span>

                                    <input type="text" class="form-control text-right" id="discount" value="" placeholder="0.00">

                                </div>                                

                            </div>                             

                        </div>                        

                    </div>



                    <div class="form-group row py-0 my-1">

                        <div class="col-md-4 col-xs-12">

                            <div class="row">

                                <div class="col-xs-12 col-md-12 pad-right">

                                    <span>Class <span class="required">*</span></span>

                                    <select class="form-control" id="product_class">

                                        <option></option>
                                        

                                    </select>

                                </div>


                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4">
                            
                            <div class="row">

                                <div class="col-xs-12 col-md-6 pad-right">

                                    <span>Re Order Level </span>

                                    <input type="text" class="form-control text-right" id="product_level" value="" placeholder="0">

                                </div>                                

                                <div class="col-xs-12 col-md-6 pad-left">

                                    <span>Stock Item <span class="required">*</span></span>

                                    <select class="form-control" id="product_stock">

                                        <option value="1">Yes</option>

                                        <option value="0">No</option>

                                    </select>

                                </div>                                
                                
                            </div>

                        </div>



                    </div>



                </div>


                <hr class="my-3">



                <div class="col-xs-12 col-md-12 px-0">

                    <div class="form-group row py-0 my-1">

                        <div class="col-xs-12 col-md-3">

                        </div>

                        <div class="col-xs-12 col-md-2"></div>

                        <div class="col-xs-12 col-md-7">

                           

                        </div>

                    </div>

                </div>



            </div>

        </div>

        <!-- END Entry Product Master Data -->



        <div class="row">

            <div class="col-xs-12 col-md-12">

                <div class="container">

                    <div class="form-group row">

                        <div class="col-xs-12 col-md-2"></div>

                        <div class="col-xs-12 col-md-4 mt-2">

                            <button type="button" class="btn btn-block btn-success" id="save_product">Save</button>

                        </div>

                        <div class="col-xs-12 col-md-4 mt-2">

                            <a href="<?php echo base_url('/') ?>"><button type="button" class="btn btn-block btn-orange">Cancel</button></a>

                        </div>

                        <div class="col-xs-12 col-md-2"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- Modal for Save Products -->

<div class="modal fade" id="save_modal" role="dialog">

    <div class="modal-dialog modal-dialog-centered modal-md">

        <div class="modal-content">

            <div class="modal-body">

                <div class="col-xs-12 col-md-12">

                    <span>Product No. S000001 has been saved.</span>

                </div>

            </div>



            <div class="modal-footer">

                <div class="col-xs-12 col-md-4"></div>

                <div class="col-xs-12 col-md-4">

                    <button class="btn btn-grey btn-block">OK</button>

                </div>

                <div class="col-xs-12 col-md-4"></div>

            </div>

        </div>

    </div>

</div>

<!-- END Modal for Save Products -->







<script>



</script>