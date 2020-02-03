  

<link rel="stylesheet" href="<?php echo base_url('assets/css/main_menu.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/application/menu.js') ?>"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>">


<div class="container-fluid">

  <div class="row">

    <div class="div-body-menu col-12 px-0">

      <div class="div-menu  pt-4" id="div-menu">

        <div class="card-deck" id="div-menu-1">

          

          <a class="card disabled" id="menu_1">

             <div class="w-100 div-list-menu" onclick="main_menu(1);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/sales.png') ?>" class='img-fluid mx-auto'>  

                <span class="h3 font-weight-bold mx-auto mt-2">Sales Register</span>
  
              </div>

            </div>              

          </a>



          <a class="card disabled" id="menu_2"> 

            <div class="w-100 div-list-menu" onclick="main_menu(2);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/outlet.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">eOutlet</span>

              </div>

            </div>

          </a>

          <a class="card disabled" id="menu_3"> 

            <div class="w-100 div-list-menu" onclick="main_menu(3);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/products.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">Inventory</span>

              </div>

            </div>

          </a>

          <a class="card disabled" id="menu_4"> 

            <div  class="w-100 div-list-menu" onclick="main_menu(4);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/data.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">Master Data</span>

              </div>

            </div>  

          </a>

        </div>



        <div class="card-deck" id="div-menu-2">

          <a class="card disabled" id="menu_5"> 

            <div  class="w-100 div-list-menu" onclick="main_menu(5);">

              <div class="card-body card-body-menu text-center" >

                <img src="<?php echo base_url('assets/images/app_menu/users.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">Users/ Sales force</span>

              </div>

            </div>

          </a>

          <a class="card " id="menu_6"> 

            <div class="w-100 div-list-menu" onclick="main_menu(6);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/statistics.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">Store Statistics</span>

              </div>

            </div>

          </a>

<!--           <a class="card " id="menu_7" >

            <div class="w-100 div-list-menu" onclick="main_menu(7);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/history.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">Activity Log</span>

              </div>

            </div>

          </a> -->

          <a class="card" id="menu_8"> 

            <div class="w-100 div-list-menu" onclick="main_menu(7);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/icons/menu/lock.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">Change Password</span>

              </div>

            </div>  

          </a>


          <a class="card" id="menu_8"> 

            <div class="w-100 div-list-menu" onclick="main_menu(8);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/account.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold mx-auto mt-2">My Account</span>

              </div>

            </div>  

          </a>

        </div>





      </div>

    </div>







  </div>

</div>



<style>



</style>

