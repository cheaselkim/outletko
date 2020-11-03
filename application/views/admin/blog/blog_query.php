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
                <div class="col-12 col-lg-6 col-md-5 col-sm-12 pad-center">
                    <input type="text" class="form-control" placeholder="Title" id="blog_title">
                </div>
                <div class="col-12 col-lg-2 col-md-3 col-sm-12 pad-center">
                    <select class="form-control px-1" id="blog_author">
                        <option value="" hidden>Author</option>
                        <option value="">All</option>
                    </select>
                </div>
                <div class="col-12 col-lg-1 col-md-3 col-sm-12 pad-center">
                    <select class="form-control px-1" id="blog_status">
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

<!-- Modal -->
<div id="modal_blog" class="modal fade" role="dialog" style="top: 0%;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title font-weight-600">Blog</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body py-2 px-0">
                <div class="container-fluid">
                    <div class="row my-1">
                        <div class="col-12 col-lg-5 col-md-12 col-sm-12 mx-auto">
                            <div class="modal-div-img-blog" id="modal-div-img-blog">
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="h3 font-weight-600" id="blog-title">Title</span>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-blog-content">
                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-overwrite-blog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h4 class="modal-title">Display Blog</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body py-1">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <p class="mb-2 text-red">Please Choose which display to remove</p>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="display-blog">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" class="btn btn-success" id="ovewrite-confirm" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>