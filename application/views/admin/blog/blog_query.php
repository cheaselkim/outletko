<link rel="stylesheet" href="<?php echo base_url('assets/css/admin/blog.css'); ?>">
<script src="<?php echo base_url('js/admin/blog/blog_query.js'); ?>"></script>

<input type="hidden" id="type" value="<?php echo $function ?>">
<div class="container py-4">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-12 col-lg-2 col-md-3 col-sm-12 pad-right">
                    <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="blog_date">
                </div>
                <div class="col-12 col-lg-7 col-md-5 col-sm-12 pad-center">
                    <input type="text" class="form-control" placeholder="Title" id="blog_title">
                </div>
                <div class="col-12 col-lg-2 col-md-3 col-sm-12 pad-center">
                    <select class="form-control" id="blog_status">
                        <option value="" hidden>Status</option>
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-12 col-lg-1 col-md-1 col-sm-12 pad-left">
                    <button class="btn btn-success" id="btn_search">Search</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-tbl">

                </div>
            </div>

        </div>
    </div>
</div>