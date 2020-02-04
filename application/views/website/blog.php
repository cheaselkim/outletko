<link rel="stylesheet" href="<?php echo base_url('assets/css/website/blog.css')?>">
<script src="<?php echo base_url('js/website/blog.js')?>"></script>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="trans_id">

<div class="container  mt-3 mb-3" style="min-height: 87vh;">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="d-none d-md-block">
                <div class="row mt-4">
                    <div class="col-12 col-lg-9 col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-img-header-row-1 div-img-header-1">
                            </div>
                            <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-img-header-row-1 div-img-header-2">
                            </div>
                            <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-img-header-row-1 div-img-header-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center my-2">
                                <span class="font-weight-600 font-size-35">Small Businesss Owner Ako</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-img-header-row-2 div-img-header-4">
                            </div>
                            <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-img-header-row-2 div-img-header-5">
                            </div>
                            <div class="col-12 col-lg-4 col-md-4 col-sm-12 div-img-header-row-2 div-img-header-6">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center px-0">
                                <span class="text-gray font-weight-600 font-size-58">Tara na!!! Mag <span class="text-green">Outletko</span> na tayo.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-12 d-none d-lg-block">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-side">
                                <img src="<?php echo base_url('assets/images/blog/blog-side.png') ?>" class=''>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row" id="div-blog-content">
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>