<link rel="stylesheet" href="<?php echo base_url('assets/css/admin/blog.css'); ?>">
<script src="<?php echo base_url('js/admin/blog/blog_edit.js') ?>"></script>

<input type="hidden" id="trans_id" value="<?php echo $trans_id ?>">

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
                                    Upload Image
                                    <input type="file" id="UploadImgBlog" class="img-upload-modal btn btn-success">
                            </button>
                            <label for="display" class="cursor-pointer mt-3" id="lbl-display"><input type="checkbox" id="display"> Display Image to Background header?</label>
                            <i class="text-red ml-4">Note : Only 1 images are allowed to display</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-lg-10 col-md-10 col-sm-12">
                    <span class="font-weight-600 font-size-18">Title : </span>
                    <input type="text" class="form-control" placeholder="Title" id="title">
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12">
                    <span class="font-weight-600 font-size-18">Status</span>
                    <select class="form-control" id="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
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