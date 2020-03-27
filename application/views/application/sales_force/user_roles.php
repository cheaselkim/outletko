<script type="text/javascript" src="<?php echo base_url() ?>js/application/sales_force/user_roles.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<div class="container-fluid pt-3">
<input type="hidden" id="outlet_id" value="<?php echo $this->session->userdata('comp_id');?>">
<input type="hidden" id="sales_force_id" value="1">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-date">
                        <span>User Roles</span>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-lg-5" id="user-table">
                        
                    </div>

                    <div class="col-xs-12 col-md-8 col-lg-7" id="user-function">
                    </div>

                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-lg-2 col-md-2"></div>
                    <div class="col-lg-4 col-md-4 pad-left mt-2">
                        <button id="save" class="btn btn-block btn-success btn-height-30 font-size-18 p-0 font-weight-bold">Save</button>
                    </div>                     
                    <div class="col-lg-4 col-md-4 pad-right mt-2">
                        <a href="<?php echo base_url(); ?>" class="btn btn-block btn-orange btn-height-30 font-size-18 p-0 font-weight-bold">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

