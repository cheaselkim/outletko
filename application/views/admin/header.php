<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/main_menu.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/admin/header.js') ?>"></script>
<input type="hidden" id="main_menu_module" value="<?php echo $menu_module ?>">
<input type="hidden" id="comp_id" value="<?php echo $this->session->userdata('comp_id') ?>">
<input type="hidden" id="outelt_id" value="<?php echo $this->session->userdata('outelt_id') ?>">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

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
                        <div class="col-8"></div>
                        <div class="col-4">
                          <div class="ml-auto">
                            <span>User :</span><br>
                            <span><?php echo $this->session->userdata("user_fullname"); ?></span>                            
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-0" >
        <div class="div-subheader">
            <div class="row">
                <div class="col-3">
                    <span class="span-date text-white"><?php echo date("F d, Y"); ?></span>
                </div>
                <div class="col-7 div-subheader-trans">
                    <div class="row" hidden>
                        <ul class="list-inline  my-0">
                            <li class="list-inline-item li-subheader"><label>Last Tran No. :&nbsp;</label><span class="last_tran_no text-white" id="last_tran_no">00000</span></li>
                            <li class="list-inline-item li-subheader"><label>No. of Trans :&nbsp;</label><span class="no_of_trans text-white" id="no_of_trans"></span></li>
                            <li class="list-inline-item li-subheader"><label>Total Sales :&nbsp;</label><span class="sub-header-curr text-white"> PHP </span></li>
                            <li class="list-inline-item"><input type="text" class="form-control text-right px-2" id="total_sales_for_today" placeholder="000,000,000.00" readonly></li>
                            <li class="list-inline-item"><button class="btn btn-primary btn-block py-2" id="sales_reports">Sales Reports</button></li>
                        </ul>
                    </div>
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

<!-- The Modal -->
<div class="modal" id="modal_outlet" hidden>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">List of Outlets</h4>
        <button type="button" class="close" data-dismiss="modal" hidden>&times;</button>
      </div>
      <div class="modal-body">
        <div class="div_list_outlet" id="div_list_outlet">
        </div>     
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('/logout') ?>"><button type="button" class="btn btn-danger" >Logout</button></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sales_modal" role="dialog">
  <div class="modal-dialog" style='max-width:800px;'>
    <div class="modal-content">
      <div class="modal-header pt-2 pb-0" style="background: rgb(235,241,222);">
        <h3 id="header-menu"></h3>
      </div>
      <div class="modal-body">
        <div id="menu-content">
        </div>
      </div>
      <div class="modal-footer py-2">
        <a href="<?php echo base_url('/') ?>"><button class="btn btn-warning"><span class="font-weight-bold">Main Menu</span></button></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="prod_modal" role="dialog" hidden>
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="header-menu"></h5>
      </div>
      <div class="modal-body">
        <div class="menu-content">

          <div class="row">

            <div class="col-3"> 
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="<?php echo base_url('assets/images/app_menu/history.png') ?>" alt="Avatar" style="width:200px;height:200px;">
                    <label>Receive Inventory</label>
                  </div>
                  <div class="flip-card-back">
                    <div class="list-group h-100 rounded-0">
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Add</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Edit</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Cancel</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Query</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-3"> 
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="<?php echo base_url('assets/images/app_menu/history.png') ?>" alt="Avatar" style="width:200px;height:200px;">
                    <label>Issuance Inventory</label>
                  </div>
                  <div class="flip-card-back">
                    <div class="list-group h-100 rounded-0">
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Add</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Edit</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Cancel</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Query</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-3"> 
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="<?php echo base_url('assets/images/app_menu/history.png') ?>" alt="Avatar" style="width:200px;height:200px;">
                    <label>Transfer Inventory</label>
                  </div>
                  <div class="flip-card-back">
                    <div class="list-group h-100 rounded-0">
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Add</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Edit</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Cancel</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Query</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-3"> 
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="<?php echo base_url('assets/images/app_menu/history.png') ?>" alt="Avatar" style="width:200px;height:200px;">
                    <label>Returns Inventory</label>
                  </div>
                  <div class="flip-card-back">
                    <div class="list-group h-100 rounded-0">
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Add</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Edit</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Cancel</span></a>
                      <a href="#" class="list-group-item list-group-item-action h-25 rounded-0 d-table"><span class="prod-submenu">Query</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('/') ?>"><button class="btn btn-danger" >Main Menu</button></a>
      </div>
    </div>
  </div>
</div>