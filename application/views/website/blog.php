<link rel="stylesheet" href="<?php echo base_url('assets/css/website/blog.css')?>">
<script src="<?php echo base_url('js/website/blog.js')?>"></script>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="trans_id">

<style>
.p-content{
    font-size: 18px;
}
</style>

<div class="container  mt-3 mb-3" style="min-height: 87vh;">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-3 pad-left pad-right">

            <!-- <div class="d-none d-md-block">
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
            </div> -->

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600 blog-title" id="blog-title">Let Customers Come to You</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <hr class="my-1" style="border-top: 1px solid rgb(195, 214, 155)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
                    <span class="text-gray font-size-20" id="blog-date"><?php echo date("F d, Y");?></span>
                </div>
            </div>


            <div class="row pt-3">
                <div class="col-12 col-lg-6 col-md-7 col-sm-12">
                    <div class="div-blog-header-img" id="div-blog-header-img">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-5 col-sm-12 pad-left-0">
                    <div id="div-blog-header-text" class="mb-2" style="font-size: 18px;">
                    </div>
                    <a id="blog-url">Read More >>></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row px-2" id="div-blog-content">
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>