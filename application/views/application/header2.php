<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">
<!-- <script type="text/javascript" src="<?php echo base_url('js/application/header.js') ?>"></script> -->
    
<div class="container-fluid px-0 mx-0">
  <div class="row mx-0">
    <div class="div-header col-12">
      <div class="row mx-0">
        <div class="col-6">
         <span class="span-eprocurementsuite"><span class="span-eprocurement">eOutlet</span><span class="span-suite">Suite</span></span>
        </div>
        <div class="col-6 pl-4 mx-0 px-0 flt">
          <div class="row">
            <div class="col-4">
              <span>Account ID :</span>
              <span><?php echo $this->session->userdata("account_id"); ?></span>
            </div>
            <div class="col-4">
              <span>Outlet No :</span>
              <span id="span_outlet_id"><?php echo $this->session->userdata("outlet_code"); ?></span>
            </div>
            <div class="col-4">
              <span>Cashier ID :</span>
              <span><?php echo $this->session->userdata("cashier_id"); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="div-sub-header col-12">
      <div class="row mx-0">
        <div class="col-6 div-date">
          <div class="row">
            <div class="col-4 px-0">
              <span class="text-white text-date"><?php echo date("M d, Y"); ?></span>
            </div>
            <div class="col-4 text-white px-0">
              <span class="text-date"><span class="text-yellow">Last Trans No:</span>
              <span>000001</span></span>
            </div>
            <div class="col-4 text-white px-0">
              <span class="text-date"><span class="text-yellow">No of Trans:</span>
              <span>000001</span></span>
            </div>
          </div>
        </div>
        <div class="col-6 ">
          <div class="row">
            <div class="col-3 px-0">
              <ul class="navbar-nav ml-auto ul-total-sales">
                <li class="list-inline-item text-date pr-3"><span class="text-yellow">Total Sales</span> <span class="text-white">PHP</span></li>
              </ul>
            </div>
            <div class="col-3 pt-2 px-0">
              <input type="text" class="form-control text-right" value="0,000,000.00" readonly="">
            </div>
            <div class="col-4 pr-2 pt-2 col-size flt" style="margin-left: 65px;">
              <nav class="navbar navbar-expand-lg sticky-top p-0" >
                <button class="navbar-toggler custom-toggler"  type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon" ></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto" >
                    <li class="list-inline-item"><button class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Sales Report"><i class="fas fa-list"></i></button></li>
                    <li class="list-inline-item"><a href="<?php echo base_url('/') ?>"><button class="btn btn-light"><i class="fas fa-cog" data-toggle="tooltip" data-placement="bottom" title="Maintenance"></i></button></a></li>
                    <li class="list-inline-item"><a href="<?php echo base_url('/') ?>"><button class="btn btn-light"><i class="fas fa-user" data-toggle="tooltip" data-placement="bottom" title="Change User"></i></button></a></li>
                    <li class="list-inline-item"><button class="btn btn-light" onclick="submenu('<?php echo $this->session->userdata('menu') ?>');"><i class="fas fa-lock" data-toggle="tooltip" data-placement="bottom" title="Lock"></i></button></li>
                    <li class="list-inline-item"><a href="<?php echo base_url('/logout') ?>"><button class="btn btn-light"><i class="fas fa-power-off" data-toggle="tooltip" data-placement="bottom" title="Log Out"></i></button></a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="modal_outlet">
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

<!-- sales modal -->
<div class="modal fade" id="sales_modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Sales Menu</h5>
      </div>
      <div class="modal-body">
        <div id="menu-content">
<!--           <div class="card-deck">
            <a href="<?php echo base_url('app/1/1') ?>" class="card" style="cursor: pointer;">
              <div class="">
                <div class="card-body card-body-menu text-center">
                  <img src="<?php echo base_url('assets/images/app_menu/sales.png') ?>" class='img-fluid'>
                  <label>Entry</label>
                </div>
              </div>             
            </a>
            <a href="<?php echo base_url('app/1/2') ?>" class="card"> 
              <div class="">
                <div class="card-body card-body-menu text-center">
                  <img src="<?php echo base_url('assets/images/app_menu/outlet.png') ?>" class='img-fluid'>
                  <label>Edit / Update</label>
                </div>
              </div>
            </a>
            <a href="<?php echo base_url('app/1/3') ?>" class="card"> 
              <div class="">
                <div class="card-body card-body-menu text-center">
                  <img src="<?php echo base_url('assets/images/app_menu/products.png') ?>" class='img-fluid'>
                  <label>Cancel</label>
                </div>
              </div>
            </a>
            <a href="<?php echo base_url('app/1/4') ?>" class="card"> 
              <div class="">
                <div class="card-body card-body-menu text-center">
                  <img src="<?php echo base_url('assets/images/app_menu/vendors.png') ?>" class='img-fluid'>
                  <label>Query</label>
                </div>
              </div>  
            </a>
          </div>                   -->
        </div>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('/') ?>"><button class="btn btn-danger" >Main Menu</button></a>
      </div>
    </div>
  </div>
</div>
<!-- sales modal -->

<!-- product modal -->
<div class="modal fade" id="prod_modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Product Menu</h5>
      </div>
      <div class="modal-body">
        <div class="card-deck">
          <a href="<?php echo base_url('app/1/1') ?>" class="card" style="cursor: pointer;">
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/insert2.png') ?>" class='img-fluid img-card'>
                <label>Entry</label>
              </div>
            </div>             
          </a>
          <a href="<?php echo base_url('app/1/2') ?>" class="card"> 
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/edit.png') ?>" class='img-fluid img-card'>
                <label>&nbsp;&nbsp;Edit </label>
              </div>
            </div>
          </a>
          <a href="<?php echo base_url('app/1/3') ?>" class="card"> 
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/insert2.png') ?>" class='img-fluid img-card'>
                <label>Cancel</label>
              </div>
            </div>
          </a>
          <a href="<?php echo base_url('app/1/4') ?>" class="card"> 
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/query.png') ?>" class='img-fluid img-card'>
                <label>Query</label>
              </div>
            </div>  
          </a>
        </div>        

        <div class="card-deck mt-4">
          <a href="<?php echo base_url('app/1/1') ?>" class="card" style="cursor: pointer;">
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/received.png') ?>" class='img-fluid img-card'>
                <label>Receive</label>
              </div>
            </div>             
          </a>
          <a href="<?php echo base_url('app/1/2') ?>" class="card"> 
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/issue.png') ?>" >
                <label>Issue</label>
              </div>
            </div>
          </a>
          <a href="<?php echo base_url('app/1/3') ?>" class="card"> 
            <div class="">
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/transfer.png') ?>" >
                <label>Transfer</label>
              </div>
            </div>
          </a>
          <a href="<?php echo base_url('app/1/4') ?>" class="card"> 
            <div class="" >
              <div class="card-body card-body-menu text-center">
                <img src="<?php echo base_url('assets/icons/menu/home.png') ?>" >
                <label>Main Menu</label>
              </div>
            </div>  
          </a>
        </div>        

      </div>
      <div class="modal-footer" >
<!--         <a href="<?php echo base_url('/') ?>"><button class="btn btn-danger" >Main Menu</button></a> -->
      </div>
    </div>
  </div>
</div>
<!-- product modal -->

<style type="text/css">
  
  .card-body-menu img{
    height: 50px;
    width: 50px;
  }

</style>