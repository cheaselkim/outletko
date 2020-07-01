<!DOCTYPE html>
<html lang="en">
<head>
    <title>Outletko</title>
    <meta charset="utf-8">
    <meta name="theme-color" content="#77933c">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Outletko is a digital platform technology and service that enables enterprises to connect to people and the community, and gives growth to business. It provides facility for full digital transformation for micro and small enterprises.">
    <meta name="keywords" content="eoutletsuite, eoutletsuite.com, outletko">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163137526-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-163137526-1');

    </script>

    <link rel="manifest" href="./manifest.json">
    <link rel="icon" href="assets/img/logo-13.png" type="image/png" sizes="2x2">
    <link rel="apple-touch-icon" href="assets/img/logo-13.png" type="image/png", sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"  >
    <link async rel="stylesheet" href="<?php echo base_url('assets/css/login5.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"; </script>
    <script  src="<?php echo base_url('assets/js/jquery.min.js') ?>" ></script>
    <script async src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/all.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script defer src="<?php echo base_url('js/login.js') ?>" ></script>
    <script  src="<?php echo base_url('js/featured_outlet.js')?>" ></script>
    <!-- <script src="<?php echo base_url('/app.js')?>"></script> -->

</head>
<body>

<div class="row div-header bg-green">
    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">

            <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                <nav class="navbar navbar-expand-lg py-0 my-0">
                    <div class=" py-0 my-0 div-logo">
                        <div class="navbar-header py-0 my-0">
                            <a href="#" class="navbar-brand font-weight-bold text-white font-logo">Outlet<span class="text-yellow">Ko</span> </a>
                        </div>
                    </div>
                    <div class="py-0 my-0 div-header-searchbar">
                        <form action="<?php echo base_url('Search/query ') ?>" method="get">
                            <div class="input-group mx-auto">
                                <input type="text" class="form-control bd-orange" name="product_outlet" placeholder="What are you looking for?">
                                <div class="input-group-append">
                                    <!-- <span class="input-group-text bd-orange bg-orange"></span> -->
                                    <button class="btn btn-orange" type="submit"><i class="fa fa-search text-white"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="py-0 my-0 div-button">
                        <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
                            <span class="fas fa-bars text-orange" style="font-size: 25px;"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar" style="z-index: 999999;">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item py-1 pad-right" >
                                <a href="<?php echo base_url('/blog'); ?>" class="btn btn-block bg-transparent text-white" style="font-size:17px;"><i class="fas fa-rss"></i> <span class="text-white">News & Insights</span></a>
                            </li>
                            <?php if ($this->session->userdata("validated")){ ?>
                            <li class="nav-item py-1 pad-left" >
                                <a class="btn btn-block btn-transparent btn-orange" href="<?php echo base_url('my-order')?>"><i class="fas fa-user text-black" ></i> <span class="text-black">My Account</span></a>
                            </li>
                            <?php }else {?>
                            <li class="nav-item py-1 pad-right">
                                <button class="btn btn-block bg-transparent text-white d-none d-sm-block" style="border: 1px solid white;" id="btn_mod_signin" data-toggle="modal" data-target="#modal_signup_user"><i class="fas fa-sign-in-alt text-white"></i> <span class="text-white">Sign in</span></button>
                                <a class="btn btn-block bg-transparent text-white d-block d-sm-none" href="<?php echo base_url('login')?>" style="border: 1px solid white;"><i class="fas fa-sign-in-alt text-white"></i> <span class="text-white">Sign in</span></a>
                            </li>
                            <li class="nav-item py-1 pad-left" >
                                <button class="btn btn-block btn-transparent btn-orange" id="btn_mod_signup" data-toggle='modal' data-target="#modal_signup"><i class="fas fa-user text-black"></i> <span class="text-black">Sign Up</span></button>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </nav>

            </div>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="row div-featured-stores">
        
        <div id="div-slideshow" class="carousel slide w-100" data-ride="carousel" data-interval="5000" >

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#div-slideshow" data-slide-to="0" class="active"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" id="div-carousel-inner">
    

                <!-- <div class="carousel-item active w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12"> 
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                                <div class="row div-outlet" id="div-outlet">
                                    <div class="col-12 col-lg-auto col-md-5 col-sm-12 div-outlet-product">
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6 col-sm-12 div-outlet-details">
                                        <div class="row">
                                            <div class="col-12 col-lg-3 col-md-4 col-sm-12">
                                                <div class="div-outlet-logo"></div>
                                            </div>
                                            <div class="col-12 col-lg-9 col-md-8 col-sm-12 div-outlet-name">
                                                <span class="span-outlet-name font-weight-600">Makarios Brothers</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-outlet-about">
                                                <span class="span-outlet-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been t....</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-outlet-button">
                                                <a href="" class="btn btn-orange px-5 text-black btn-see-more">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->





            </div>

            <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-featured" id="">
                <span>Featured Outlet Stores</span>
            </div>


            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#div-slideshow" data-slide="prev">
                <!-- <span class="carousel-control-prev-icon"></span> -->
                <span class="fa fa-angle-left fa-2x icon-prev"></span>
            </a>
            <a class="carousel-control-next" href="#div-slideshow" data-slide="next">
                <!-- <span class="carousel-control-next-icon"></span> -->
                <span class="fa fa-angle-right fa-2x icon-next"></span>
            </a>

        </div>    


    </div>

    <div class="row div-featured-product">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <span class="span-featured-products text-white">Featured Products</span>
                </div>
            </div>

            <div class="row div-list-product" id="div-list-product">

                <!-- <div class="tile px-3 pt-1 "> 
                    <a href="href_url"> 
                        <div class="card div-card-prod" id="div-card-prod-i" > 
                        </div> 
                        <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                            <p class="card-title prod-title text-green-white font-weight-600 text-capitalize align-middle mb-0">  Product Name  </p>
                            <p class="text-red font-weight-600 prod-price">PHP 100.00</p> 
                        </div>
                    </a>
                </div>            

                <div class="tile px-3 pt-1 "> 
                    <a href="href_url"> 
                        <div class="card div-card-prod" id="div-card-prod-i" > 
                        </div> 
                        <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                            <p class="card-title prod-title text-green-white font-weight-600 text-capitalize align-middle mb-0">  Product Name  </p>
                            <p class="text-red font-weight-600 prod-price">PHP 100.00</p> 
                        </div>
                    </a>
                </div>            

                <div class="tile px-3 pt-1 "> 
                    <a href="href_url"> 
                        <div class="card div-card-prod" id="div-card-prod-i" > 
                        </div> 
                        <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                            <p class="card-title prod-title text-green-white font-weight-600 text-capitalize align-middle mb-0">  Product Name  </p>
                            <p class="text-red font-weight-600 prod-price">PHP 100.00</p> 
                        </div>
                    </a>
                </div>            

                <div class="tile px-3 pt-1 "> 
                    <a href="href_url"> 
                        <div class="card div-card-prod" id="div-card-prod-i" > 
                        </div> 
                        <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                            <p class="card-title prod-title text-green-white font-weight-600 text-capitalize align-middle mb-0">  Product Name  </p>
                            <p class="text-red font-weight-600 prod-price">PHP 100.00</p> 
                        </div>
                    </a>
                </div>            

                <div class="tile px-3 pt-1 "> 
                    <a href="href_url"> 
                        <div class="card div-card-prod" id="div-card-prod-i" > 
                        </div> 
                        <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                            <p class="card-title prod-title text-green-white font-weight-600 text-capitalize align-middle mb-0">  Product Name  </p>
                            <p class="text-red font-weight-600 prod-price">PHP 100.00</p> 
                        </div>
                    </a>
                </div>             -->


            </div>

        </div>
    </div>

    <div class="row" style="background: white;">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-4 pb-2 div-footer-1" >
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center div-footer-col-2">
                    <img src="<?php echo base_url('assets/img/logo-13.png');?>" alt="logo" style="height:50px; width:60px;border:1px solid black;"><br>
                    <p class="text-black font-size-14">Outletko is a complete digital platform exclusively designed for micro and small business</p>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 pl-1">
                    <div class="row">
                        <div class="col-6 text-white pr-0" style="line-height:30px;">
                            <a href="<?php echo base_url('aboutus') ?>" class="text-black">About Us</a><br>
                            <a href="<?php echo base_url('terms') ?>" class="text-black">Terms and Conditions</a><br>
                            <a href="<?php echo base_url('privacy'); ?>" class="text-black">Privacy Policy</a>
                        </div>
                        <div class="col-6 text-white pl-5" style="line-height:30px;">
                            <a href="<?php echo base_url('reviews')?>" class="text-black">Reviews</a><br>
                            <a href="<?php echo base_url('contactus')?>" class="text-black">Contact Us</a><br>
                            <a href="<?php echo base_url('blog')?>" class="text-black">Blog</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-right">
                    <div class="mt-5 text-right">
                        <span style="font-size: 25px;"><span class="text-black">Follow us on :</span> <i class="fab fa-facebook-f text-orange"></i>&nbsp;<i class="fab fa-twitter text-orange"></i>&nbsp;<i class="fab fa-youtube text-orange"></i>&nbsp;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="modal" id="modal_signup_user" style="z-index: 999999;">
    <div class="modal-dialog" style="max-width: 460px;">
        <div class="modal-content">
            <div class="modal-header py-2" style="background: rgb(119,147,60);">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-lg-2 pr-0" hidden>
                            <img src="<?php echo base_url('assets/img/logo-13.png') ?>" alt="logo" style='height: 50px;'>
                        </div>
                        <div class="col-12 col-lg-12 text-center ">
                            <span class="h1 font-weight-bold"><span class="text-white">Outlet</span><span class="text-yellow">Ko</span></span>
                            <!-- <span class="h1 text-white font-bauhaus-93">Outletko</span><br>                                 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" id="singup_id">
                <div class="container font-size-18" id="div-login-form">
                    <div class="row">
                        <div class="col-lg-12 pb-2" style="line-height: 25px;">
                            <span class="font-size-18" style="font-size: 18px !important;">Welcome! Please Login to continue. </span><br>
                            <!-- <small>New member? <a class="cursor-pointer" id="a_register"><u>Register here</u></a> </small> -->
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger py-1 px-2 mb-1" id="login-error">
                            <span>Invalid Username or Password</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Username</span>
                            <input type="text" class="form-control form-control-sm textbox-green bd-orange" id="login_email">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Password</span>
                            <input type="password" class="form-control form-control-sm textbox-green bd-orange" id="login_password">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                            <a href="<?php echo base_url('forgot_password')?>"><span class="text-red">Forgot Password?</span></a>
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
                            <input type="text" class="form-control" id="verify_codex">
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
    <div class="modal-dialog" style="max-width: 480px;">
        <div class="modal-content">
            <div class="modal-header py-2" style="background:rgb(119,147,60);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 pr-0" hidden>
                            <img src="<?php echo base_url('assets/img/logo-13.png') ?>" alt="logo" style='height: 50px;'>
                        </div>
                        <div class="col-lg-12 text-center">
                            <span class="h1 font-weight-bold"><span class="text-white">Outlet</span><span class="text-yellow">Ko</span></span>
                            <!-- <p class="h1 text-white font-bauhaus-93 mb-0">Outletko</p>                              -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" id="singup_id">
                <div class="container font-size-18" id="div-signup-form">
                    <div class="row">
                        <div class="col-lg-12 pb-2" style="line-height: 25px;">
                            <span class="font-size-18" style="font-size: 18px !important;">Create your Outletko Account. </span><br>
                            <!-- <small class="text-red font-weight-600" style="font-size-15px;"> Register your store? <a class="cursor-pointer text-red" href="<?php echo base_url('register-store'); ?>" ><u>Register here</u></a> </small>  -->
                            <!-- id="a_register_store" -->
                            <span class="text-green">For Business Owner Account? </span>
                            <a class="btn btn-success btn-block" href="<?php echo base_url('register-store'); ?>" >Click Here to Register Your Business</a>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <hr class="my-0" style="border-top: 1px solid green;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="text-green">For Outletko User Account</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span >First Name <span class="text-red">*</span></span>
                            <input type="text" class="form-control form-control-sm textbox-green bd-orange" id="signup_user_fname">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Last Name <span class="text-red">*</span></span>
                            <input type="text" class="form-control form-control-sm textbox-green bd-orange" id="signup_user_lname">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Email Address <span class="text-red">*</span></span>
                            <input type="text" class="form-control form-control-sm textbox-green bd-orange" id="signup_user_email">
                            <span class="text-red" id="span-email" >Email Already Exists</span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Password <span class="text-red">*</span></span>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-sm textbox-green bd-orange" id="signup_user_password">
                                <div class="input-group-append" style="height: 31px;">
                                    <span class="input-group-text show_conf_pass cursor-pointer textbox-green bd-orange">
                                    <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Confirm Password <span class="text-red">*</span></span>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-sm textbox-green bd-orange" id="signup_user_conf_password">
                                <div class="input-group-append" style="height: 31px;">
                                    <span class="input-group-text show_conf_pass cursor-pointer textbox-green bd-orange">
                                    <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-2" style="line-height: 1;">
                            <span>By clicking <span class="font-weight-600">"SIGN UP"</span>, I agree to Outletko's <a href="<?php echo base_url('terms'); ?>">Terms and Conditions</a> and <a href="<?php echo base_url('privacy'); ?>">Privacy Policy</a> </span>
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
                            <span>An email has been sent to you. Please check your inbox and follow the instruction in the message.</span><br>
                            <button class="btn btn-orange mt-3" id="resend" hidden>Re-send confirmation email</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-12 text-center mx-auto pt-5">
                            <span>Let potential customers find you and learn more about your business, products and services. </span>
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

<div id="modal-image" class="modal" style="z-index: 9999;">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header" hidden>
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body py-0 px-0">
                <div class="container">
                    <div class="row d-none d-md-block">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 bg-outletko-modal pl-4 pt-4">
                            <p class="mb-3 text-body-0 text-black font-weight-600">Grabe totoo nga ang balita!</p>
                            <p class="text-body text-black text-micro">Outletko brings <br> Micro Entrepreneurs closer <br> to customers.</p>
                            <p class="mb-0 mt-4 text-body text-black">Good News is, it's FREE!</p>                                    
                        </div>
                    </div>
                    <div class="row d-block d-sm-none">
                        <div class="col-12 col-lg-8 col-md-8 col-sm-12 pl-4 pt-3 pr-0">
                            <p class="mb-2 text-body-0 text-black font-weight-600">Totoo nga ang balita!</p>
                            <p class="text-body text-black text-micro">Outletko brings <br> Micro Entrepreneurs closer <br> to customers.</p>
                            <p class="mb-0 mt-1 text-body text-black">Good News is, it's FREE!</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0 div-body-image text-right">
                            <img src="<?php echo base_url('assets/img/outletko-man-woman.png')?>" alt="logo" class="img-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-success pt-1 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center px-0">
                            <p class="mb-1 text-white text-modal-footer"><span class="font-weight-bold font-size-45">Outlet<span class="text-yellow">ko</span>!</span><br>
                            <span class="font-weight-600 font-size-35">Kasama mo sa Negosyo </span></p>
                            <button class="btn btn-orange text-black px-5 font-weight-600" data-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>


<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</body>
</html>