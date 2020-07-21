
<script src="<?php echo base_url('js/admin/resend_email/resend_email.js')?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


<input type="hidden" id="submodule_id" value="0">

<div class="container-fluid pt-2">

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-md-6 pt-3">
                        <h3 class="font-weight-bold">Resend Email</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-0 mb-2">

        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-3">

                <div class="row">
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                        <span>Category</span>
                        <select class="form-control" id="">
                            <option value="1">Account Email</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                        <span>Class</span>
                        <select class="form-control" id="">
                            <option value="1">Account Verification</option> 
                            <option value="2">Account User Credentials</option> 
                            <option value="3">Account Invoice</option>
                            <option value="4">Account Plan Details</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                        <span>Email</span>
                        <input type="text" class="form-control" id="email" placeholder="Search Account Email">
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-12">
                        <span>Account No</span>
                        <input type="text" class="form-control" id="account_no" placeholder="Search Account No">
                    </div>
                    <div class="col-12 col-lg-5 col-md-4 col-sm-12">
                        <span>Account Name</span>
                        <input type="text" class="form-control text-capitalize" id="account_name"  placeholder="Search Account Name">
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                <button class="btn btn-success">Send</button>
                <button class="btn btn-danger ">Cancel</button>
            </div>
        </div>


    </div>

</div>





