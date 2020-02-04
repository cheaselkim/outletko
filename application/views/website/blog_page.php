<link rel="stylesheet" href="<?php echo base_url('assets/css/website/blog.css')?>">
<script src="<?php echo base_url('js/website/blog.js')?>"></script>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="trans_id" value="<?php echo $id ?>">

<div class="container my-3 " style="min-height: 85vh;">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                    <span class="font-size-40 font-weight-600" id="blog_title">Let Customers Come to You</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <hr class="my-1" style="border-top: 1px solid rgb(195, 214, 155)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
                    <span class="text-gray font-size-20" id="blog_date"><?php echo date("F d, Y");?></span>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-12 col-lg-6 col-md-8 col-sm-12 mx-auto ">
                    <div class="div-img-blog border" id="div-img-blog">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-blog-content">
                </div>
            </div>

        </div>
    </div>
</div>