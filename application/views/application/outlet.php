
<body>
<link rel="stylesheet" href="<?php echo base_url('assets/css/main_menu.css') ?>">

<div class="container-fluid">
  <div class="row">
<!--     <div class="div-header col-12">
      <div class="row mx-0">
        <div class="col-6">
         <span class="span-eprocurementsuite"><span class="span-eprocurement">eOutlet</span><span class="span-suite">Suite</span></span>
        </div>
        <div class="col-6 pl-4 mx-0 px-0 flt">
          <div class="row">
            <div class="col-4">
              <span>Account ID :</span>
              <span>EPGM</span>
            </div>
            <div class="col-4">
              <span>Outlet No :</span>
              <span>QC01</span>
            </div>
            <div class="col-4">
              <span>Cashier ID :</span>
              <span>QC01</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="div-sub-header col-12 px-0">
      <div class="row mx-0">
        <div class="col-6 div-date">
          <div class="row">
            <div class="col-4">
              <span class="text-white text-date"><?php echo date("M d, Y"); ?></span>
            </div>
            <div class="col-4 text-white px-1">
              <span class="text-date"><span class="text-yellow">Last Trans No :</span>
              <span>000001</span></span>
            </div>
            <div class="col-4 text-white px-1">
              <span class="text-date"><span class="text-yellow">No of Trans : </span>
              <span>000001</span></span>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="row">
            <div class="col-auto px-0">
              <ul class="navbar-nav ml-auto ul-total-sales">
                <li class="list-inline-item text-date pr-3"><span class="text-yellow">Total Sales</span> <span class="text-white">PHP</span></li>
              </ul>
            </div>
            <div class="col-auto pt-2 px-0">
              <input type="text" class="form-control input-sm text-right text-box-total" value="0,000,000.00" readonly>
            </div>
            <div class="col-auto pr-2 pl-0 pt-2 col-size flt">
              <nav class="navbar navbar-expand-lg sticky-top p-0" >
                <button class="navbar-toggler custom-toggler"  type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon" ></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto" >
                    <li class="list-inline-item"><button class="btn btn-light"><i class="fas fa-list"></i></button></li>
                    <li class="list-inline-item"><button class="btn btn-light"><i class="fas fa-user"></i></button></li>
                    <li class="list-inline-item"><button class="btn btn-light"><i class="fas fa-lock"></i></button></li>
                    <li class="list-inline-item"><a href="<?php echo base_url('/logout') ?>"><button class="btn btn-light"><i class="fas fa-power-off"></i></button></a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> -->


    <div class="div-body-menu col-12 px-0">
      <div class="div-menu">
  
        <div class="card-deck">
          <?php 
            for ($i=1; $i <= 4; $i++) {
              if ($i % 5 == 0){
                echo "</div>";
                echo "<div class='card-deck mt-4'>";
              } 
           ?>
          <div class="card">
            <div class="card-body card-body-menu text-center">
              <img src="<?php echo base_url('assets/images/app_menu/outlet.png') ?>" class='img-fluid'>
              <label>Outlet # <?php echo $i; ?></label>
            </div>
          </div>
        <?php  } ?>
        </div>




      </div>
    </div>



  </div>
</div>

</body>

<style>
  .div-body-menu{
    min-height: 658px;
    height: auto;
    background: rgb(219, 238, 244);
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
