<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>eOutletSuite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="eoutletsuite, eoutletsuite, eoutletsuite.com, outletko">
    <meta name="keywords" content="eoutletsuite, eoutletsuite.com, outletko">

    <link rel="icon" href="assets/img/icon2.png" type="image/png" sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll_words.css') ?>">

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script>

    <script src="<?php echo base_url('js/login.js') ?>"></script>
</head>
<body>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="row">
                    <div class="col-lg-7 col-md-5 col-sm-7 left pl-4">

                        <nav class="navbar navbar-expand-md pl-0 d-block d-sm-none">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style='color: white;background: rgb(87, 107, 45);'>
                            <span class="fas fa-bars"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="collapsibleNavbar" >
                            <ul class="navbar-nav">
                              <li class="nav-item py-1">
                                <button class="btn btn-block btn-transparent bd-yellow" data-toggle='modal' data-target="#modal_signup"><span class="text-yellow" >Register your store</span></button>
                              </li>
                              <li class="nav-item py-1">
                                <button class="btn btn-block btn-transparent bd-yellow"><span class="text-yellow">Store owner login</span></button>
                              </li>
                              <li class="nav-item py-1">
                                <button class="btn btn-block btn-transparent bd-yellow" data-toggle="modal" data-target="#modal_login"><span class="text-white">eOutlet</span><span class="text-gold">Suite</span><span class="text-white"> Login</span></button>
                              </li>    
                            </ul>
                          </div>  
                        </nav>

                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12" id="div-title">
                                <span class="font-size-55"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-light-gray">.com</span></span><br>
                            </div>
                            <div class="col-lg-4 col-md-12 d-none d-sm-block text-right px-0 py-2" style="z-index: 1;"> 
                                <button class="btn  btn-transparent" style="margin-left: 200px;z-index: 9999;"  data-toggle='modal' data-target="#modal_signup"><span class="text-yellow" >Register your store</span></button>
                            </div>
                        </div>

                        <div class="row" style="margin-top: -14px;">
                            <div class="col-lg-12">
                                <span class="text-black font-size-30">Connecting you to outlet stores and service providers</span>                                
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" id="div-search-engine">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 pr-4" id="div-were">
                                    <span class="font-size-36" style="color: #FFB6C1; text-shadow: 1px 2px #4b4b4b;">We're Coming Very Soon</span>
                                  </div>
                                </div>
                                <form class="<?php echo site_url('outletko/search') ?>" method="POST">
                                    <div class="row pr-4">
                                        <div class="col-lg-3 col-md-12 col-sm-12 py-1 pad-right">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                                                </div>
                                                <input type="text" class="form-control textbox-orange border-left-0 pl-1" placeholder="Metro Manila" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12 col-sm-12 py-1 pad-center">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
                                                </div>
                                            <input type="text" class="form-control textbox-orange border-left-0 pl-1" placeholder="Search Products or Outlet" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12 py-1 pad-center">
                                        <input type="submit" class="btn btn-orange btn-block " value="Search" id="search" name="search">
                                        </div>                
                                    </div>                
                                </form>
                            </div>
                        </div>         

                        <div class="row">
                            <div class="col-lg-12 pl-4 pr-5 d-none d-lg-block" style="position: absolute; bottom: 10px;">
                                <div class="row pl-2">  

                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 line-height-20 font-weight-600 bg-white"  id="" style="border: 1px solid orange; height: 125px;">

                                        <div class="row font-size-20" id="ads-1">
                                            <div class="col-lg-9 py-2 pr-0">
                                                <span>Gumamit ng <span class="text-green">eOutlet</span><span class="text-orange">Suite</span> sa iyong negosyo para</span><br>
                                                <span>lalong maging matagumpay</span><br>
                                                <button class="btn btn-orange btn-sm mt-2 font-weight-bold">LEARN MORE</button>
                                            </div>
                                            <div class="col-lg-3" style="background: url('<?php echo base_url('/assets/img/ads/ads-1.png') ?>'); background-size: 100% 100%; background-repeat: no-repeat;">
                                            </div>
                                        </div>

                                        <div class="row font-size-18" id="ads-2" >
                                            <div class="col-lg-9 pt-2 pb-1 pr-0">
                                                <span>Automate your Store Operation and Run you business<br>
                                                <span>like Big companies do.</span><br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button class="btn btn-orange btn-sm mt-2 font-weight-bold">LEARN MORE</button>                    
                                                    </div>
                                                    <div class="col-6 text-right pt-4" style="font-size: 25px;">              
                                                        <span class="mt-1"><span class="text-green">eOutlet</span><span class="text-orange">Suite</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" style="background: url('/assets/img/ads/ads-2.png'); background-size: 100% 120px; background-repeat: no-repeat;">
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5 col-md-7 d-none d-sm-block right">
                        <div class="row" style="margin-left: -23px;">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="background: rgb(74, 69, 42); height: 3vh; border-left: 7px solid rgb(119, 147, 60);border-bottom: 60px solid transparent;">
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 py-2">
                                        <button class="btn btn-block btn-transparent"><span class="text-yellow">Store owner login</span></button>
                                    </div>
                                    <div class="col-lg-6 col-md-7 py-2">
                                        <button class="btn btn-block btn-transparent bd-yellow" data-toggle="modal" data-target="#modal_login"><span class="text-white">eOutlet</span><span class="text-gold">Suite</span><span class="text-white"> Login</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

    <footer class="text-center fixed-bottom bg-white">
        <span style="font-size: 13px;"><a href="<?php echo base_url('/terms') ?>" style='color: rgb(119,147,60)'>Terms</a> | <a href="<?php echo base_url('/privacy') ?>" style="color: rgb(119,147,60)">Privacy</a></span>  
    </footer>
        <input type="hidden" value="<?php echo $this->session->flashdata("log_error") ?>" id="login_error">

  <div class="modal" id="modal_login" style="top: 10%;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header py-2" hidden>
          <div class="container">

            <div class="row">
              <div class="col-lg-12 text-center">
              </div>
            </div>          
 
          </div>
        </div>
        <div class="modal-body">
          <div class="container font-size-18">

            <div class="row pb-5">
              <div class="col-lg-12 text-center">
                <h4 class="modal-title">eOutlet<span class="text-orange">Suite</span></h4>            
              </div>
            </div>          
            
            <div class="row pb-3">
              <div class="col-lg-12 pb-2 text-center">
                <span class="text-gray font-size-20">Login to your account</span>
              </div>
            </div>

            <div class="row" id="error_message">
              <div class="col-lg-12 pb-2 text-center text-red">
                <span class="text-red font-size-16">Invalid Username or Password</span>
              </div>
            </div>

            <div class="row">

              <?php echo form_open('Login/check_login'); ?>

                <div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-2 ">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 pb-1 pt-1 pad-right">
                      <span class="font-size-14">User ID</span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 pb-1 pad-left">
                      <input type="text" class="form-control textbox-green textbox-30 px-2" placeholder="" name="uname" id="uname" required="required">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 pb-1 pt-1 pad-right">
                      <span class="font-size-14">Password </span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 pb-1 pad-left text-right">
                      <input type="password" class="form-control textbox-green textbox-30 px-2" placeholder="" name="pword" id="pword" required="required">
                      <small class="text-red ml-auto">Forgot Password?</small>
                    </div>                  
                  </div>
                  <div class="row pt-4  pb-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-1 ml-auto">
                      <input type="submit" class="btn btn-block btn-green px-0 py-0 textbox-30" name="login" value="Login">
                    </div>                  
                  </div>
                  <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center line-height-20 text-red">
                      <span>Don't share your</span><br>
                      <span>User ID and Password</span>
                    </div>
                  </div>
                </div>

              <?php echo form_close(); ?>

              
            </div>


          </div>
        </div>
        <div class="modal-footer py-2" hidden>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal_signup">
    <div class="modal-dialog" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-2 btn-warning">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h4 class="modal-title">Welcome to Outletko</h4>            
              </div>
            </div>          
          </div>
        </div>
        <div class="modal-body">
          <div class="container font-size-18">
            
            <div class="row">
              <div class="col-lg-12 pb-2">
                <span>Please enter the required <span class="text-red">(*)</span> information</span>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 pad-right">
                <span>First Name <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_first_name">
              </div>
              <div class="col-lg-3 pad-center">
                <span>Middle Initial</span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_middle_name">
              </div>
              <div class="col-lg-5 pad-left">
                <span>Last Name <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_last_name">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Username <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_username">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Password <span class="text-red">*</span></span>
                <div class="input-group">
                    <input type="password" class="form-control form-control-sm textbox-green" id="signup_password">
                    <div class="input-group-append border border-dark" style="height: 31px;"  >
                        <span class="input-group-text show_pass cursor-pointer">
                        <i class="fa fa-eye-slash" id="pass_icon"></i>
                        </span>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Confirm Password <span class="text-red">*</span></span>
                <div class="input-group">
                    <input type="password" class="form-control form-control-sm textbox-green" id="signup_conf_password">
                    <div class="input-group-append border border-dark" style="height: 31px;">
                        <span class="input-group-text show_conf_pass cursor-pointer">
                        <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                        </span>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Address <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_address">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 pad-right">
                <span>Town, Province <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_town">
              </div>
              <div class="col-lg-6 pad-left">
                <span>Country <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_country" value="Philippines">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 pad-right">
                <span>Mobile No <span class="text-red">*</span></span>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="form-control-sm textbox-green border-right-0 pr-0">+63</span>
                  </div>
                <input type="text" class="form-control form-control-sm textbox-green border-left-0 pl-1" id="signup_mobile">
                </div>
              </div>
              <div class="col-lg-6 pad-left">
                <span>Email <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_email">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Business Category <span class="text-red">*</span></span>
                <select class="form-control form-control-sm textbox-green" id="signup_bussiness_category">
                  
                </select>                
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Business Name <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_businessname">
              </div>
            </div>

            <div class="row pt-2">
              <div class="col-lg-12 col-md-12 col-sm-12 ">
                <small>By creating an account, you agree to our <a href="<?php echo base_url('/terms') ?>">Terms</a> & <a href="<?php echo base_url('/privacy') ?>">Privacy</a>.</small>                
              </div>
            </div>


          </div>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="signup_save">Save</button>
          <button type="button" class="btn btn-orange" data-dismiss="modal" id="signup_cancel">Cancel</button>
        </div>
      </div>
    </div>
  </div>



</body>
</html>


