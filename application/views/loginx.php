<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>EPGM eOutletSuite</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/@coreui/icons/css/coreui-icons.min.css') ?>"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/flag-icon-css/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/css/eqcss.css') ?>'>

    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/font-awesome/js/all.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/pace-progress/pace.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/@coreui/coreui/dist/js/coreui.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/eqcss/element-queries.js') ?>"></script> 
    <script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
<!--     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.9.1/EQCSS.min.js"></script>
 -->
  </head>



  <body class="app flex-row align-items-center">
    <div class="container">
      <form  action="<?php echo site_url('login/check_login'); ?>" method="POST">
        <div class="row justify-content-center">
          <div class="col-md-5" id="div_login">
            <div class="card-group">
              <div class="card p-4">
                <div class="card-body">
                  <div class="pb-4 text-center">
                    <img class="navbar-brand-full" src="<?php echo base_url('assets/img/latest.png') ?>" width="89" height="30" >
                    <span  style="font-size: 20px; color:#759e3e;vertical-align: bottom;" class="ml-1"> eOutlet</span><span style="font-size: 20px;vertical-align: bottom; color: #fba717;" class="ml-1">Suite</span>
                  </div>
                  <div>

                  </div>
                  <p class="text-muted">Sign In to your account</p>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input class="form-control" type="text" placeholder="Username" name="uname">
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="Password" name="pword">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <input class="btn btn-secondary px-4" type="submit" value="Login">
                    </div>
                    <div class="col-6 text-right">
                      <a href="<?php echo base_url('/forgot_password'); ?>"><button class="btn btn-link px-0" type="button">Forgot password?</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
</body>
</html>