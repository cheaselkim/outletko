<script type="text/javascript" src="<?php echo base_url('js/application/users/user_change_password.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-3 ">
    <div class="container ">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-md-12 pt-3">
                        <h3 class="font-weight-bold">Change Password</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container px-0">

                    <div class="form-group row mb-1">
                        <div class="col-xs-12 col-md-3">
                            <span>User ID  </span>
                            <input class="form-control text-black" id="username" value="<?php echo $this->session->userdata('user_uname') ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-xs-12 col-md-3">
                            <span>Current Password <span class="required">*</span></span>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control cur_pass" data-toggle="password">
                                <div class="input-group-append border border-dark">
                                    <span class="input-group-text show_cur_pass">
                                    <i class="fa fa-eye-slash" id="cur_pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="col-xs-12 col-md-3">
                            <span>New Password <span class="required">*</span></span>
                            <div class="input-group">
                                <input type="password" name="password" id="new_password" class="form-control new_pass" data-toggle="password">
                                <div class="input-group-append border border-dark">
                                    <span class="input-group-text show_new_pass">
                                    <i class="fa fa-eye-slash" id="new_pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-xs-12 col-md-3">
                            <span>Confirm Password <span class="required">*</span></span>
                            <div class="input-group">
                                <input type="password" name="password" id="confirm_password" class="form-control confirm_pass" data-toggle="password">
                                <div class="input-group-append border border-dark">
                                    <span class="input-group-text show_confirm_pass">
                                    <i class="fa fa-eye-slash" id="confirm_pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2"></div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block btn-success btn-height-30 p-0 font-size-18 font-weight-bold" id="update">Update</button>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block btn-orange btn-height-30 p-0 font-size-18 font-weight-bold" id="cancel">Cancel</button>
                        </div>
                        <div class="col-xs-12 col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



