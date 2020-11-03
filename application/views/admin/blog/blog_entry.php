<link rel="stylesheet" href="<?php echo base_url('assets/css/admin/blog.css'); ?>">
<script src="<?php echo base_url('js/admin/blog/blog_entry.js') ?>"></script>

<div class="container bg-white-smoke " style="min-height: 100vh;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-3">

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
                    <button class="btn btn-orange px-4" id="btn_save">Save</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7 col-md-12 col-sm-12 mx-auto ">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="div-img-blog" id="div-img-blog">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <button class="btn btn-modal-img-upload btn-outline-success btn-block">
                                <i class="fas fa-camera" aria-hidden="true"></i>
                                Upload Media
                                <input type="file" id="UploadImgBlog" class="img-upload-modal btn btn-success">
                            </button>
                            <label for="display" class="cursor-pointer mt-3 mb-0" id="lbl-display"><input
                                    type="checkbox" id="display" class="mb-0"> Display Blog to header?</label>
                            <p class="my-0"><i class="text-red ml-4">Note : Only 1 images are allowed to display</i></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600 font-size-18">Category : </span>
                    <select name="" id="category" class="form-control">
                        <option value="1">Agriculture</option>
                        <option value="2">Technology</option>
                        <option value="3">SME</option>
                    </select>
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600 font-size-18">Title : </span>
                    <input type="text" class="form-control" placeholder="Title" id="title">
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="font-weight-600 font-size-18">Author : </span>
                    <input type="text" class="form-control text-capitalize" placeholder="Author" id="author">
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div id="summernote"></div>
                </div>
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