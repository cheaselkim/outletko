<!DOCTYPE html>
<html lang="en">
<head>
    <title>Outletko</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="eoutletsuite, eoutletsuite, eoutletsuite.com, outletko">
    <meta name="keywords" content="eoutletsuite, eoutletsuite.com, outletko">

    <link rel="icon" href="assets/img/logo-10.png" type="image/png" sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll_words.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">

    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"; </script>

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>

    <script src="<?php echo base_url('js/outletko/signup_login.js') ?>"></script>
    <script src="<?php echo base_url('js/login.js') ?>"></script>
    <script src="<?php echo base_url('js/featured_outlet.js')?>"></script>


    <style type="text/css">
      option {
        max-height: 15px;
        overflow: auto;
      }

      #modal_signup input, select{
        font-size: 16px !important;
        font-family: 'Arial' !important;
      }

      #modal_signup  .container  span{
        font-size: 15px;
        font-family: 'Arial' !important;
      }

      #modal_signup_user #div-login-form span{
        font-size: 15px;
        font-family: 'Arial' !important;        
      }

      #modal_signup_user #div-signup-form span{
        font-size: 15px;
        font-family: 'Arial' !important;
      }


      .font-size-30{
        font-size: 30px !important;
      }

      .text-red{
        color: red;
      }
    </style>

    <script type="text/javascript">      
      function month_date(){
        var year = $("#birth_year").val();
        var month = $("#birth_month").val();
        var last_day = new Date(year, month, 0).getDate();

        $("#birth_day").find('option').not(':first').remove();

        for(i = 1; i <= last_day; i++){
          var $date = i.length < 2 ? pad("0" + i, 2) : i;
          $("#birth_day").append("<option value='"+$date+"'>"+$date+"</option>")
        }

      }

    </script>
</head>
<body>

<div class="container-fluid pb-4">
      <!-- rgb(119, 147, 60) -->
  <div class="row" hidden>
    <div class="col-lg-12 text-center text-white py-2" style="background:rgb(119,147,60); min-height: 3vh;">
      <span class="font-weight-525 font-italic">Introducing Outletko Suite &mdash; A Business Suite for your Outlet &nbsp; <button class="btn btn-orange py-0 px-2 font-weight-600">JOIN NOW</button> </span>
    </div>
  </div>
  <!-- https://images.pexels.com/photos/449559/pexels-photo-449559.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=627&w=1200/ -->
  <div class="row header" style="min-height:50vh;">
    <div class="col-lg-12" >
      
      <div class="row" style="">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-md">
            <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
              <span class="fas fa-bars" style="font-size: 25px;"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar" style="z-index: 999999;">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item py-1">
                  <button class="btn btn-block btn-transparent" data-toggle="modal" data-target="#modal_signup_user"><i class="fas fa-sign-in-alt text-white"></i> <span class="text-white">Sign in</span></button>
                </li>    
                <li class="nav-item py-1">
                  <button class="btn btn-block btn-transparent bd-orange" data-toggle='modal' data-target="#modal_signup"><i class="fas fa-store text-white"></i> <span class="text-white">Register</span></button>
                </li>
              </ul>
            </div>  
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-4 mx-auto pt-3 text-center">
          <img src="<?php echo base_url('/assets/img/logo-10.png') ?>" alt="logo" class="img-logo">
        </div>
      </div>
      
      <div class="row pt-5">
        <div class="col-lg-8 mx-auto">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
              <p class="line-1 anim-typewriter text-white text-shadow-white" hidden>Find Outlet Store Near You!</p>
              <p class="line-1 anim-typewriter text-white text-shadow-black h4" >Connecting Stores and Service Providers to Community People</p>
            </div>
          </div>
          <form action="<?php echo base_url('Search/index') ?>" method="get">
            <div class="row mt-2">
              <div class="col-lg-3 col-md-4 col-sm-12 pad-right pt-1">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                  </div>
                  <input type="text" class="form-control textbox-orange border-left-0 pl-1" name="location" placeholder="Search location" aria-label="location" aria-describedby="basic-addon1">
                </div>    
              </div>
              <div class="col-lg-7 col-md-6 col-sm-12 pad-center pt-1">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
                  </div>
                  <input type="text" class="form-control textbox-orange border-left-0 pl-1" name="product_outlet" placeholder="Search Products or Outlet" aria-label="Username" aria-describedby="basic-addon1">
                </div>
          
              </div>
              <div class="col-lg-2 col-md-2 col-sm-12 pad-left pt-1">
                <button class="btn btn-orange btn-block font-weight-600">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <div class="row" hidden>
    <div class="col-lg-8 col-md-12 col-sm-8 mx-auto pt-3">
      <div class="row">
        <div class="col-lg-12 text-center">
          <span class="font-weight-525 h3">Popular Categories</span>
          <hr class="my-2" style="width: 10%;border-top: 3px solid orange;">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center pb-2 px-0">
                <i class="fas fa-utensils fa-2x text-orange"></i>
                <h4 class="card-title text-green mt-4">Restaurant </h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center pb-2 px-0">
                <i class="fas fa-mobile-alt fa-2x text-orange"></i>
                <h4 class="card-title text-green mt-2">Electronic <br> Store</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center pb-2 px-0">
                <i class="fa fa-book fa-2x text-orange"></i>
                <h4 class="card-title text-green mt-4">Book Store</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center pb-2 px-0">
                <i class="fas fa-tshirt fa-2x text-orange"></i>
                <h4 class="card-title text-green mt-2">Clothing <br> Boutique</h4>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center pb-2 px-0">
                <i class="fas fa-gem fa-2x text-orange"></i>
                <h4 class="card-title text-green mt-4">Jewelry Store</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center px-0">
                <i class="fab fa-pagelines fa-2x text-orange"></i>
                <h4 class="card-title text-green">Agriculutral Products</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center px-0">
                <i class="fas fa-blender fa-2x text-orange"></i>
                <h4 class="card-title text-green mt-2">Appliance <br> Store</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3 col-md-3 col-sm-6 px-2 pt-2">
          <a href="">
            <div class="card">
              <div class="card-body text-center px-0">
                <i class="fas fa-couch fa-2x text-orange"></i>
                <h4 class="card-title text-green">Furniture and Handicraft</h4>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center mx-auto">
          <button class="btn btn-orange btn-block font-weight-600">All Categories</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-9 col-md-12 col-sm-8 mx-auto pt-3 px-0">
      <div class="row">
        <div class="col-lg-12 text-center">
          <span class="font-weight-525 h3">Featured Stores for the Month</span>
          <hr class="my-2" style="width: 25%;border-top: 3px solid orange;">
        </div>
      </div>
      <div class="row" id="div-featured-outlet" >
      </div>
      <div class="row my-4">
        <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center mx-auto">
          <button class="btn btn-orange btn-block font-weight-600" hidden>All Stores</button>
        </div>
      </div>
    </div>
  </div>

<script>
 $(document).ready(function () {          

  setInterval(function(){ 
    if ($("#hideMe").is(":visible")){
      $('#hideMe').hide("slow");
    }else{
      setTimeout(function() {
        $('#hideMe').show("slow");
      }, 5000);
    }
  }, 8000);


});
</script>

<div class="row px-3" id="hideMe" style="position:fixed;margin-top:-28%;z-index:9999;">
  <div class="col-7 py-2" style="background: rgb(192, 219, 136);">
    <div class="row">
      <div class="col-auto">
        <img src="<?php echo base_url('assets/img/logo-10.png');?>" alt="logo" style="height:56px; width:60px;border:1px solid white;"><br>
      </div>
      <div class="col-8 pl-0 pr-1">
        <div class="row">
          <div class="col-12">
            <p class="my-0" style="font-size:13px;">New Enterprise from Baguio just registered to Outletko</p>
          </div>
          <div class="col-12 text-right">
            <p class="my-0" style="font-size:12px;">8 HOURS AGO</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="row" style="background: rgb(119,147,60);">
  <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-4 pb-2" style="padding-left: 100px; padding-right:100px;">
    <div class="row">
      <div class="col-4 text-center pr-5">
        <img src="<?php echo base_url('assets/img/logo-10.png');?>" alt="logo" style="height:50px; width:60px;border:1px solid white;"><br>
        <p class="text-white font-size-14">Outletko is a complete digital platform exclusively designed for micro and small business</p>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-6 text-white" style="line-height:30px;">
            <a href="<?php echo base_url('aboutus') ?>" class="text-white">About Us</a><br>
            <a href="<?php echo base_url('terms') ?>" class="text-white">Terms and Conditions</a><br>
            <a href="<?php echo base_url('privacy'); ?>" class="text-white">Privacy Policy</a>
          </div>
          <div class="col-6 text-white" style="line-height:30px;">
            <a href="<?php echo base_url('reviews')?>" class="text-white">Reviews</a><br>
            <a href="<?php echo base_url('contactus')?>" class="text-white">Contact Us</a><br>
            <a href="" class="text-white">Be our Partner</a>
          </div>
        </div>
      </div>
      <div class="col-4 text-right">
        <div class="mt-5 text-right">
          <span style="font-size: 25px;"><span class="text-white">Follow us on :</span> <i class="fab fa-facebook-f text-orange"></i>&nbsp;<i class="fab fa-twitter text-orange"></i>&nbsp;<i class="fab fa-youtube text-orange"></i>&nbsp;</span>
        </div>
      </div>
    </div>
  </div>
</div>

  <footer class="text-center fixed-bottom py-1" style="background: #F5F5F5;">
    <span>© Copyright Outletko • <?php echo date('Y') ?> • All Rights Reserved</span>
  </footer>


</div>

<div class="modal" id="modal_signup_user">
    <div class="modal-dialog" style="max-width: 460px;">
      <div class="modal-content">
        <div class="modal-header py-2" style="background: rgb(195, 214, 155);">
          <div class="container">
            <div class="row">
              <div class="col-lg-2 pr-0">
                <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
              </div>
              <div class="col-lg-10 text-left pl-0">
                <span class="font-size-30"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-white">.com</span></span><br>                                
              </div>
            </div>          
          </div>
        </div>
        <div class="modal-body">
          <input type="hidden" id="singup_id">
          
          <div class="container font-size-18" id="div-login-form">

            <div class="row">
              <div class="col-lg-12 pb-2" style="line-height: 25px;">
                <span class="font-size-18" style="font-size: 18px !important;">Welcome! Please Login to continue. </span><br>
                <!-- <small>New member? <a class="cursor-pointer" id="a_register"><u>Register here</u></a> </small> -->
              </div>
            </div>
                
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <span>Username</span>
                    <input type="text" class="form-control form-control-sm textbox-green" id="login_email">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <span>Password</span>
                    <input type="password" class="form-control form-control-sm textbox-green" id="login_password">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                    <span class="text-red">Forgot Password?</span>
                </div>
            </div>

          </div>



          <div class="container font-size-18" id="div-confirm-email">
            <input type="hidden" id="acc_id">
            <div class="row">
              <div class="col-lg-12 pb-2" style="line-height: 25px;">
                <span class="font-size-18" style="font-size: 18px !important;">Account Verification</span><br>
                <small>Enter your 6-digit verification code that was sent to your email.</small>
              </div>
              <div class="col-12 text-right">
                  <small class="text-red">Resend Verification Code? </small>
              </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                    <input type="text" class="form-control" id="verify_code">
                </div>
            </div>

          </div>

        </div>
        <div class="modal-footer py-2" id="signup_footer">
          <button type="button" class="btn btn-success" id="btn_confirm">Confirm</button>
          <button type="button" class="btn btn-success" id="btn_login">Login</button>
          <button type="button" class="btn btn-success"  id="btn_signup">Sign Up</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="signup_cancel">Cancel</button>
        </div>
      </div>
    </div>
</div>

<div class="modal" id="modal_signup">
  <div class="modal-dialog" style="max-width: 460px;">
    <div class="modal-content">
      <div class="modal-header py-2" style="background: rgb(195, 214, 155);">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 pr-0">
              <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
            </div>
            <div class="col-lg-10 text-left pl-0">
              <span class="font-size-30"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-white">.com</span></span><br>                                
            </div>
          </div>          
        </div>
      </div>
      <div class="modal-body">
        <input type="hidden" id="singup_id">

        <div class="container font-size-18" id="div-signup-form">

          <div class="row">
            <div class="col-lg-12 pb-2" style="line-height: 25px;">
              <span class="font-size-18" style="font-size: 18px !important;">Create your Outletko Account. </span><br>
              <small>Register you store? <a class="cursor-pointer" id="a_register_store"><u>Register here</u></a> </small>
            </div>
          </div>

          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <span >First Name <span class="text-red">*</span></span>
                  <input type="text" class="form-control form-control-sm textbox-green" id="signup_user_fname">
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <span>Last Name <span class="text-red">*</span></span>
                  <input type="text" class="form-control form-control-sm textbox-green" id="signup_user_lname">
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <span>Email Address <span class="text-red">*</span></span>
                  <input type="text" class="form-control form-control-sm textbox-green" id="signup_user_email">
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <span>Password <span class="text-red">*</span></span>
                  <div class="input-group">
                      <input type="password" class="form-control form-control-sm textbox-green" id="signup_user_password">
                      <div class="input-group-append" style="height: 31px;">
                          <span class="input-group-text show_conf_pass cursor-pointer textbox-green">
                              <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                          </span>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <span>Confirm Password <span class="text-red">*</span></span>
                  <div class="input-group">
                      <input type="password" class="form-control form-control-sm textbox-green" id="signup_user_conf_password">
                      <div class="input-group-append" style="height: 31px;">
                          <span class="input-group-text show_conf_pass cursor-pointer textbox-green">
                              <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                          </span>
                      </div>
                  </div>
              </div>
          </div>
            
        </div>


        <div class="container font-size-18" id="div-form" >
          
          <div class="row">
            <div class="col-lg-12 pb-2" style="line-height: 25px;">
              <span class="font-size-18" style="font-size: 18px !important;">Create an Outletko Account for your business.</span><br>
              <small>User Sign Up? <a class="cursor-pointer" id="a_signup"><u>Sign Up here</u></a> </small><br>
              <small>Please enter the required <span class="text-red">(*)</span> information</small>
            </div>
          </div>

          <div id="div-name">

            <div class="row">
              <div class="col-lg-6 pr-1">
                <span>First Name <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_first_name">
              </div>
              <div class="col-lg-3 pad-center" hidden>
                <span>Middle Initial</span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_middle_name">
              </div>
              <div class="col-lg-6 pl-1">
                <span>Last Name <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green text-uppercase" id="signup_last_name">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <hr class="mt-2 mb-0 py-0">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <span>Username <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_username">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 pr-1">
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
              <div class="col-lg-6 pl-1">
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
              <div class="col-lg-6">
                <span>Birthday</span>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <select class="input-group-text textbox-green px-1 bg-white" id="birth_month">
                      <option value="">Month</option>
                      <?php for ($i=1; $i <= 12; $i++) { ?>
                      <option value="<?php echo $i ?>"><?php echo date("M", mktime(0, 0, 0, $i, 10) ); ?></option>
                    <?php } ?>
                    </select>
                    <select class="input-group-text textbox-green px-0 bg-white" id="birth_day">
                      <option value="">Day</option>
                      <option value="">Year</option>
                      <?php for ($i=1; $i <= 31 ; $i++) { ?>
                        <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT);; ?></option>
                      <?php } ?>
                    </select>
                    <select class="input-group-text textbox-green px-1 bg-white" id="birth_year">
                      <option value="">Year</option>
                      <?php for ($i=1950; $i <= (date('Y') - 17); $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <div id="div-business">
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
          </div>

          <div id="div-address" >
            <div class="row">
              <div class="col-lg-12">
                <span>Address <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_address">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 ">
                <span>Town, Province <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_town">
              </div>
              <div class="col-lg-12">
                <span>Country <span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_country" value="Philippines">
              </div>
            </div>


            <div class="row">
              <div class="col-lg-12">
                <span>Mobile No <span class="text-red">*</span></span>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="form-control-sm textbox-green border-right-0 pr-0" style="font-size: 16px;">+63</span>
                  </div>
                <input type="text" class="form-control form-control-sm textbox-green border-left-0 pl-1" id="signup_mobile">
                </div>
              </div>
              <div class="col-lg-12">
                <span>Email Address<span class="text-red">*</span></span>
                <input type="text" class="form-control form-control-sm textbox-green" id="signup_email">
              </div>
            </div>                
          </div>

          <div class="row pt-2">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
              <small>By continuing you agree to the following <a href="<?php echo base_url('/terms') ?>">Terms of Service</a> & <a href="<?php echo base_url('/privacy') ?>">Privacy Policy</a>.</small>                
            </div>
          </div>

          <div class="row pt-2">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center text-light-gray font-size-18">
              <span class="fas fa-circle text-black" id="next-1"></span>
              <span class="fas fa-circle" id="next-2"></span>
              <span class="fas fa-circle" id="next-3"></span>
            </div>
          </div>

        </div>

        <div class="container" id="div-save">
          
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center font-size-40">
              <i class="fas fa-check-circle text-green"></i><br>
              <h3>Congratulations!</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 text-center mx-auto pt-3">
              <span>Please Check your inbox form confirmation email. Click the link in the email to confirm your email address.</span><br>
              <button class="btn btn-orange mt-3" id="resend">Re-send confirmation email</button>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 text-center mx-auto pt-5">
              <span>Let potential customers find you and learn more about your business, products and services. </span>
            </div>
          </div>


        </div>

        <div class="container font-size-18" id="div-confirm-email2">
          <input type="hidden" id="acc_id">
          <div class="row">
            <div class="col-lg-12 pb-2" style="line-height: 25px;">
              <span class="font-size-18" style="font-size: 18px !important;">Account Verification</span><br>
              <small>Enter your 6-digit verification code that was sent to your email.</small>
            </div>
            <div class="col-12 text-right">
                <small class="text-red">Resend Verification Code? </small>
            </div>
          </div>
          
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                  <input type="text" class="form-control" id="verify_code">
              </div>
          </div>

        </div>

      </div>
      <div class="modal-footer py-2" id="signup_footer">
        <button type="button" class="btn btn-success" id="btn_confirm2">Confirm</button>
        <button type="button" class="btn btn-success"  id="btn_signup2">Sign Up</button>
        <button type="button" class="btn btn-danger" id="signup_back">Back</button>
        <button type="button" class="btn btn-success" id="signup_next">Next</button>
        <button type="button" class="btn btn-success"  id="signup_save">Save</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="signup_cancel">Cancel</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="signup_close">Close</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</body>
</html>


