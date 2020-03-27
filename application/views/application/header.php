<link rel="stylesheet" href="<?php echo base_url('assets/css/header.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/header.css') ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/main_menu.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/application/header.js') ?>"></script>

<input type="hidden" id="main_menu_module" value="<?php echo $menu_module ?>">

<input type="hidden" id="comp_id" value="<?php echo $this->session->userdata('comp_id') ?>">

<input type="hidden" id="outlet_id" value="<?php echo $this->session->userdata('outelt_id') ?>">

<input type="hidden" id="user_all_access" value="<?php echo $this->session->userdata('all_access') ?>">

<input type="hidden" id="user_menu" value="0">

<div class="container-fluid px-0 mx-0">

    <div class="row mx-0">

        <div class="div-header">

            <div class="row">

                <div class="col-lg-3 col-md-2 col-sm-12 div-title">

                    <span class="span-eoutletsuite"><span class="span-eoutlet" >eOutlet</span><span class="span-suite">Suite</span></span>

                </div>

                <div class="col-lg-1 col-md-2 col-sm-12"></div>

                <div class="col-lg-8 col-md-8 col-sm-12 div-account">

                    <div class="row ">

                        <div class="col-lg-4 col-md-12">

                          

                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12 px-0">
                          <div class="float-right">
                            <span>Account ID :</span><br>

                            <span id="span_account_id"><?php echo $this->session->userdata("account_id"); ?></span>
                            
                          </div>

                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12">

                          <div class="float-right">

                            <span>Outlet No :</span><br>

                            <span id="span_outlet_id"><?php echo $this->session->userdata("outlet_code"); ?></span>
                           
                          </div>

                        </div>

                        <div class="col-lg-4 col-md-7 col-sm-12">

                          <div >  
                            
                            <span>User :</span><br>

                            <span><?php echo $this->session->userdata("user_fullname"); ?></span>

                          </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="row mx-0 my-0 py-0">

        <div class="div-subheader" id="div-subheader-1">

            <div class="row my-0 py-0">

                <div class="col-auto div-subheader-trans mr-auto my-0 py-0" >

                  <span class="text-white span-date"><?php echo date("F d, Y"); ?></span>

                </div>

                <div class="col-auto div-subheader-trans mx-auto my-0 py-0">

                    <div class="row my-0 py-0">

                        <ul class="list-inline  my-0 py-0">

                            <li class="list-inline-item li-subheader" id="li_last_trans"><label>Last Tran No. :&nbsp;</label><span class="last_tran_no text-white" id="last_tran_no">00000</span></li>

                            <li class="list-inline-item li-subheader"><label>No. of Trans :&nbsp;</label><span class="no_of_trans text-white" id="no_of_trans"></span></li>

                            <li class="list-inline-item li-subheader"><label>Total Sales :&nbsp;</label><span class="sub-header-curr text-white"> PHP </span></li>

                            <li class="list-inline-item li-subheader"><span id="total_sales_for_today" class="font-weight-bold total text-white total_sales_for_today">1000000.00</span></li>

                        </ul>

                    </div>

                </div>

                <div class="col-auto div-subheader-trans ml-auto py-0">

                  <div class="row my-0 py-0">

                    <ul class="list-inline float-right my-0 py-0" style="margin-top: -4.5% !important;">

                        <li class="list-inline-item li-button"><a onclick='count_outlet();'><button class="btn btn-light btn-block" id="btn_outlet"><i class="fas fa-building"></i></button></a></li>

<!--                         <li class="list-inline-item li-button"><a href="<?php echo base_url('/') ?>"><button class="btn btn-light btn-block"><i class="fas fa-user"></i></button></a></li> -->

                        <li class="list-inline-item li-button"><button class="btn btn-light btn-block" id="btn_main_menu"><i class="fas fa-lock"></i></button></li>

                        <li class="list-inline-item li-button"><a href="<?php echo base_url('/logout') ?>"><button class="btn btn-light btn-block"><i class="fas fa-power-off" ></i></button></a></li>

                    </ul>                    

                  </div>

                </div>

            </div>

        </div>

    </div>



    <div class="row mx-0 py-0 my-0" >

      <div class="div-subheader py-2" id="div-subheader-2">

        <div class="row py-0 my-0">

          <div class="col-1 px-0 pl-2 text-white" >

<!--             <a class="fas fa-chart-line" id="icon-menu" onclick="report_menu();" ></a> -->
            <a  href="<?php echo base_url(); ?>" class="text-white"><span class="fas fa-bars" id="icon-menu"></span></a>

          </div>

          <div class="col-9 text-center">

            <a onclick="sign_out();" id="sign_out"><span class="font-weight-bold text-white" style="font-size: 20px;"><?php echo $this->session->userdata("account_id"); ?></span></a>

          </div>

          <div class="col-1 pr-4 text-white" >

            <a  href="<?php echo base_url("/logout"); ?>" class="text-white"><span class="fas fa-power-off" id="icon-menu"></span></a>

          </div>

          <div class="col-1" >

            <a href="<?php echo base_url('/logout') ?>" class="text-white"><i class="fas fa-sign-out-alt" id="icon-menu"></i></a>

          </div>

        </div>

      </div>

    </div>



    <div class="row mx-0 py-0 my-0" >

      <div class="div-subheader py-2" id="div-subheader-3">

        <div class="row py-0 my-0">

          <div class="col-1 pr-4 text-white pl-0" >

            <a  href="<?php echo base_url(); ?>" class="text-white icon-menu"><span class="fas fa-bars" id="icon-menu"></span></a>

          </div>

          <div class="col-9 text-center">

            <a onclick="sign_out();" id="sign_out"><span class="font-weight-bold text-white" style="font-size: 20px;"><?php echo $this->session->userdata('account_id'); ?></span></a>

          </div>

          <div class="col-1 pr-0 text-right" >

            <a onclick='count_outlet();' class="text-white icon-menu"><i class="fas fa-building" id="icon-menu"></i></a>          

          </div>

          <div class="col-1 ">

            <a href="<?php echo base_url('/logout') ?>" class="text-white icon-menu"><i class="fas fa-sign-out-alt" id="icon-menu"></i></a>

          </div>

        </div>

        <div class="row py-2 my-0">

<!--           <div class="col-3 text-white pl-0 pr-1" >

            <span class="font-weight-bold"><?php echo date("F d, Y"); ?></span>

          </div> -->

          <div class="col-4 text-white pl-0 pr-1" >

            <span class="font-weight-600 font-size-17"><span class="text-yellow">Last Trans No : </span><span class="last_tran_no_tab" id="last_tran_no_tab"></span></span>

          </div>

          <div class="col-3 text-white pl-0 pr-1">

            <span class="font-weight-600 font-size-17"><span class="text-yellow">No. of Trans : </span><span class="no_of_trans_tab" id="no_of_trans_tab"></span></span>

          </div>

          <div class="col-5 text-white pl-0 pr-0">

            <span class="font-weight-600 font-size-17"><span class="text-yellow">Total Sales : PHP </span><span class="total_sales_for_today_tab" id="total_sales_for_today_tab"></span></span>

          </div>

        </div>

      </div>

    </div>





</div>



<div id="div-report-menu" >

<!--   <?php $this->load->view("application/reports/report_menu"); ?> -->

</div>





<!-- The Modal -->

<div class="modal" id="modal_outlet">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header pt-2 pb-0">

        <h4 class="modal-title">List of Outlets</h4>

        <button type="button" class="close" data-dismiss="modal" hidden>&times;</button>

      </div>

      <div class="modal-body py-2">

        <div class="div_list_outlet" id="div_list_outlet">

        </div>     

      </div>

      <div class="modal-footer " hidden>

        <a href="<?php echo base_url('/logout') ?>"><button type="button" class="btn btn-danger" >Logout</button></a>

      </div>

    </div>

  </div>

</div>



<div class="modal fade" id="sales_modal" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header pt-2 pb-0" style="background: rgb(235,241,222);">
            
            <div class='container'>
                <div class='row pb-1'>
                    <div class='col-7 col-lg-8 col-md-8 pl-0'>
                        <h3 id="header-menu"></h3>
                    </div>
                    <div class='col-5 col-lg-4 col-md-4 text-right pr-0'>
                        <a href="<?php echo base_url('/') ?>"><button class="btn btn-warning"><span class="font-weight-bold">Main Menu</span></button></a>
                    </div>
                </div>
            </div>

      </div>

      <div class="modal-body">

        <div id="menu-content">

        </div>

      </div>

      <div class="modal-footer py-2" hidden>


      </div>

    </div>

  </div>

</div>

<div class="modal fade" id="user_modal" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header pt-2 pb-0" style="background: rgb(235,241,222);">
            
            <div class='container'>
                <div class='row'>
                    <div class='col-7 col-lg-8 col-md-8 pl-0 pb-1'>
                        <h3 class="menu-title">My Account Menu</h3>
                    </div>
                    <div class='col-5 col-lg-4 col-md-4 text-right pr-0'>
                        <a href="<?php echo base_url('/') ?>"><button class="btn btn-warning"><span class="font-weight-bold">Main Menu</span></button></a>
                    </div>
                </div>
            </div>

      </div>

      <div class="modal-body">

        <div id="menu-content">

            <div class='card-deck'>
                <a onclick='menu(8)' class='card mx-2 cursor-pointer' readonly>
                    <div class='h-100".$disabled."w-100'>
                        <div class=' menu-img-box  text-center pt-3'>
                        <img src='<?php echo base_url("/assets/icons/menu/user-details.png") ?>' class='img-fluid mb-2'>  		                
                            <span class='mt-2 font-weight-bold'>Outletko Details</span>
                        </div>
                    </div>             
                </a>

                <a onclick='select_function(0, 9)' class='card mx-2 cursor-pointer' readonly>
                    <div class='h-100".$disabled."w-100'>
                        <div class=' menu-img-box  text-center pt-3'>
                        <img src='<?php echo base_url("/assets/icons/menu/subscription.png") ?>' class='img-fluid mb-2'>  		                
                            <span class='mt-2 font-weight-bold'>Subscription</span>
                        </div>
                    </div>             
                </a>

                <a onclick='select_function(0, 10)' class='card mx-2 cursor-pointer' readonly>
                    <div class='h-100".$disabled."w-100'>
                        <div class=' menu-img-box  text-center pt-3'>
                        <img src='<?php echo base_url("/assets/icons/menu/commission.png") ?>' class='img-fluid mb-2'>  		                
                            <span class='mt-2 font-weight-bold'>Commission</span>
                        </div>
                    </div>             
                </a>
            </div>

        </div>

      </div>

      <div class="modal-footer py-2" hidden>


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



<style type="text/css">

  .flip-link:hover{

    background: rgb(215,228,189);

  }



  .modal-backdrop {

     background-color: rgb(119,147,60);

  }



</style>