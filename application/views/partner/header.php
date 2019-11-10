<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">
<script type="text/javascript" src="<?php echo base_url('js/admin/header.js') ?>"></script>
<input type="hidden" id="main_menu_module" value="<?php echo $menu_module ?>">
<input type="hidden" id="comp_id" value="<?php echo $this->session->userdata('comp_id') ?>">
<input type="hidden" id="outelt_id" value="<?php echo $this->session->userdata('outelt_id') ?>">

<div class="container-fluid px-0 mx-0">
    <div class="row mx-0">
        <div class="div-header">
            <div class="row">
                <div class="col-3">
                    <span class="span-eoutletsuite"><span class="span-eoutlet">eOutlet</span><span class="span-suite">Suite</span></span>
                </div>
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <span>User :</span><br>
                            <span><?php echo $this->session->userdata("user_fullname"); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-0" >
        <div class="div-subheader">
            <div class="row">
                <div class="col-2">
                    <span class="span-date text-white"><?php echo date("F d, Y"); ?></span>
                </div>
                <div class="col-8 div-subheader-trans">
                </div>
                <div class="col-2">
                    <ul class="list-inline float-right my-0">
                        <li class="list-inline-item"><a href="<?php echo base_url('/') ?>"><button class="btn btn-light btn-block"><i class="fas fa-user"></i></button></a></li>
                        <li class="list-inline-item"><button class="btn btn-light btn-block" id="btn_main_menu"><i class="fas fa-lock"></i></button></li>
                        <li class="list-inline-item"><a href="<?php echo base_url('/logout') ?>"><button class="btn btn-light btn-block"><i class="fas fa-power-off" ></i></button></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
