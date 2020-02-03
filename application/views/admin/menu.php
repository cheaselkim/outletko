
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/main_menu.css') ?>">

<script type="text/javascript" src="<?php echo base_url('js/application/menu.js') ?>"></script>



<div class="container-fluid">

  <div class="row">

    <div class="div-body-menu col-12 px-0">

      <div class="div-menu" id="div-menu">

        <div class="card-deck">

          <a class="card disabled" id="menu_1">

            <div class="w-100 div-list-menu" onclick="main_menu(1);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/sales.png') ?>" class='img-fluid mb-2'>

                <span class="h3 font-weight-bold">User Registry</span>

              </div>

            </div>             

          </a>

          <a class="card disabled" id="menu_2" disabled> 

            <div class="w-100 div-list-menu" onclick="main_menu(2);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/outlet.png') ?>" class='img-fluid mb-2'>

                <span class="h3 font-weight-bold">Business Hierarchy</span>

              </div>

            </div>

          </a>

          <a class="card disabled" id="menu_3"> 

            <div class="w-100 div-list-menu" onclick="main_menu(3);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/products.png') ?>" class='img-fluid mb-2'>

                <span class="h3 font-weight-bold">eBidding</span>

              </div>

            </div>

          </a>

          <a class="card disabled" id="menu_5"> 

            <div  class="w-100 div-list-menu" onclick="main_menu(4);">

              <div class="card-body card-body-menu text-center" >

                <img src="<?php echo base_url('assets/images/app_menu/users.png') ?>" class='img-fluid mb-2'>

                <span class="h3 font-weight-bold">Sales Force</span>

              </div>

            </div>

          </a>

        </div>



        <div class="card-deck mt-4">

          <a class="card disabled" id="menu_4"> 

            <div  class="w-100 div-list-menu" onclick="main_menu(5);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/data.png') ?>" class='img-fluid mb-2'>

                <span class="h3 font-weight-bold">Master Data</span>

              </div>

            </div>  

          </a>

          <a class="card disabled" id="menu_6"> 

            <div class="w-100 div-list-menu" onclick="main_menu(6);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/statistics.png') ?>" class='img-fluid mb-2'>

                <span class="h3 font-weight-bold">Reports</span>

              </div>

            </div>

          </a>

          <a class="card disabled" id="menu_7">

            <div class="w-100 div-list-menu" onclick="main_menu(7);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/history.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold">Activity Log</span>

              </div>

            </div>

          </a>

          <a class="card" id="menu_8"> 

            <div class="w-100 div-list-menu" onclick="main_menu(8);">

              <div class="card-body card-body-menu text-center">

                <img src="<?php echo base_url('assets/images/app_menu/account.png') ?>" class='img-fluid'>

                <span class="h3 font-weight-bold">My Account</span>

              </div>

            </div>  

          </a>

        </div>





      </div>

    </div>







  </div>

</div>



<style>

  .div-body-menu{

/*    min-height: 658px;*/

    min-height: 85vh;

    height: auto;

    background: rgb(235, 241, 222);

    padding-top: 80px;

  }



  .div-menu{

    width: 88%;

    margin: 0 auto;

    min-height: 450px;

    height: auto; 

  }



  .img{

    width: 100%;

    max-width: 115px;

    height: 115px;

  }



  .btnpadding{

    padding-top: 75px;

    padding-left: 250px;

  }

</style>

