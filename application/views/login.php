<!DOCTYPE html>
<html lang="en">
<head>
    <title>Outletko</title>
    <meta charset="utf-8">
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
    <link rel="icon" href="assets/img/logo-13.png" type="image/png" sizes="2x2">
    <link    rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"  >
    <link async rel="stylesheet" href="<?php echo base_url('assets/css/login4.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/login3.min.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" >
    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"; </script>
    <script  src="<?php echo base_url('assets/js/jquery.min.js') ?>" ></script>
    <script async src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/all.min.js') ?>" async></script>
    <script defer src="<?php echo base_url('js/login.js') ?>" ></script>
    <script defer src="<?php echo base_url('js/featured_outlet.min.js')?>" ></script>
    <style type="text/css">
        option {
        max-height: 15px;
        overflow: auto;
        }
        #modal_signup input, select{
        font-size: 16px !important;
        font-family: 'Arial' !important;
        }
        #modal_signup  .modal-body .container  span{
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
    <div class="row header">
        <div class="col-lg-12">
            <div class="row" style="border-bottom: 0.1px solid #F8DE7E;">
                <div class="col-lg-12 pl-4">
                    <nav class="navbar navbar-expand-md py-0 my-0">
                        <div class=" py-0 my-0">
                            <div class="navbar-header py-0 my-0">
                                <a href="#" class="navbar-brand font-weight-bold text-white font-size-35 my-0 py-0">Outlet<span class="text-yellow">Ko</span> </a>
                                <span class="btn text-yellow bg-transparent border-white py-0 span-partner" hidden><span class="font-weight-600">PARTNER </span> NG MGA <span class="font-weight-600">MICRO BUSINESS & SMALL BUSINESS</span></span>
                            </div>
                        </div>
                        <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
                        <span class="fas fa-bars text-orange" style="font-size: 25px;"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="z-index: 999999;">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item py-1 pad-right" hidden>
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
            <div class="row" hidden>
                <div class="col-lg-2 col-md-2 col-sm-4 mx-auto pt-3 text-center">
                    <img src="<?php echo base_url('/assets/img/logo-13.png') ?>" alt="logo" class="img-logo">
                </div>
            </div>
            <div class="navbar">
                <div class="container-fluid pl-4">
                    <div class="row pt-5 pb-3">
                        <div class="col-lg-12 mr-auto div-body pl-0" >
                            <div class="row">
                                <div class="col-12 col-xl-8 col-lg-8 col-md-8 col-sm-12 text-left">
                                    <p class="text-shadow-white font-weight-600 text-white text-community" >Connecting Stores and Service Providers to Community.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-xl-7 col-lg-7 col-md-8 col-sm-12">
                                    <form action="<?php echo base_url('Search/query ') ?>" method="get">
                                        <div class="row mt-2 div-search-box">
                                            <div class="col-lg-3 col-md-4 col-sm-12 pad-right pt-1" hidden>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control textbox-orange border-left-0 pl-1" name="location" placeholder="Search location" aria-label="location" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 pad-right pt-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control textbox-orange border-left-0 pl-1" name="product_outlet" placeholder="Search Products or Outlet" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 pad-left pt-2">
                                                <button class="btn btn-orange btn-block font-weight-600 "> <span class="text-black">Search</span> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <div class="col-12 col-xl-9 col-lg-10 col-md-12 col-sm-8 mx-auto pt-3 px-0">
            <div class="row mb-0">
                <div class="col-lg-12 text-center">
                    <span class="font-weight-525 h4">Featured Stores of the Month</span>
                    <hr class="my-2" style="width: 15%;border-top: 3px solid orange;">
                </div>
            </div>
            <div class="row" id="div-featured-outlet">
                <div class="col-md-12 col-md-offset-1" hidden>
                    <div class="tile-container">
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-6 col-lg-3 col-md-4 col-sm-6 text-center mx-auto">
                    <button class="btn btn-orange btn-block font-weight-600" hidden>All Stores</button>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .card{
        height: 150px;
        }
        .tile-container{
        position: relative;
        /*    border: solid #BDBDBD 2px;*/
        margin: 5px 0px;
        width:100%;
        }
        .div-card-name{
        height: auto;
        min-height: 50px;
        border: 1px solid green;
        border-top: 0;
        border-bottom-left-radius: .25rem;
        border-bottom-right-radius: .25rem;
        text-align: center;
        line-height: 50px;
        }
        .div-card-name p{
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
        }
        .div-store-about{
        height: 150px;
        overflow: hidden;
        }
    </style>
    <script>
        $(document).ready(function () {          
            $("#hideMe").hide();
        
            setTimeout(function(){ 
                $("#hideMe").show("slow");
            }, 2000);
        
            // setInterval(function(){ 
            //   if ($("#hideMe").is(":visible")){
            //     $('#hideMe').hide("slow");
            //   }else{
            //     setTimeout(function() {
            //       $('#hideMe').show("slow");
            //     }, 5000);
            //   }
            // }, 8000);
        
            var text = ["A Store from Marikina just registered to Outletko", 
                        "New Enterprise from Caloocan just registered to Outletko",
                        "An Outlet from Pasay just registered to Outletko",
                        "New Enterprise from Manila just registered to Outletko",
                        "New Enterprise from Las Pinas just registered to Outletko",
                        "New Enterprise from Paranaque just registered to Outletko",
                        "An Enterprise from La Union just registered to Outletko",
                        "New Enterprise from Baguio just registered to Outletko"];
        
            var hours = ["12 HOURS AGO",
                        "4 HOURS AGO",
                        "10 HOURS AGO",
                        "8 HOURS AGO",
                        "4 HOURS AGO",
                        "6 HOURS AGO",
                        "7 HOURS AGO",
                        "8 HOURS AGO"]
            var counter = 0;
            // var elem = document.getElementById("changeText");
            var inst = "";
        
            var seconds = 0;
        
            function incrementSeconds() {
                seconds += 1;
                // console.log(seconds);
            }
        
            var cancel = setInterval(incrementSeconds, 1000);
        
            setInterval(function(){ 
            if ($("#hideMe").is(":visible")){
                $("#hideMe").hide("slow");
            }else{
                change();
                $("#hideMe").show("slow");
            }
            // $("#hideMe").show();
            // setTimeout(function() {
            //   change();
            //     $('#hideMe').hide();
            // }, 3000);  
            }, 10000);
        
        
            function change() {
            // elem.innerHTML = text[counter];
            $("#notif-text").text(text[counter]);
            $("#notif-hour").text(hours[counter]);
            counter++;
            if (counter >= text.length) {
                counter = 0;
                // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
            }
        }
        
        
        });
    </script>
    <div class="row px-3" id="hideMe" style="position:fixed;margin-top:-25%;z-index:9999;">
        <div class="col-7 py-2" style="background: rgb(192, 219, 136);">
            <div class="row">
                <div class="col-auto">
                    <img src="<?php echo base_url('assets/img/logo-13.png');?>" alt="logo" style="height:56px; width:60px;border:1px solid white;"><br>
                </div>
                <div class="col-8 pl-0 pr-1">
                    <div class="row">
                        <div class="col-12">
                            <p class="my-0" style="font-size:13px;" id="notif-text">New Enterprise from Baguio just registered to Outletko</p>
                        </div>
                        <div class="col-12 text-right">
                            <p class="my-0" id="notif-hour" style="font-size:12px;">8 HOURS AGO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background: rgb(119,147,60);">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-4 pb-2 div-footer-1" >
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-center div-footer-col-2">
                    <img src="<?php echo base_url('assets/img/logo-13.png');?>" alt="logo" style="height:50px; width:60px;border:1px solid white;"><br>
                    <p class="text-white font-size-14">Outletko is a complete digital platform exclusively designed for micro and small business</p>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 pl-1">
                    <div class="row">
                        <div class="col-6 text-white pr-0" style="line-height:30px;">
                            <a href="<?php echo base_url('aboutus') ?>" class="text-white">About Us</a><br>
                            <a href="<?php echo base_url('terms') ?>" class="text-white">Terms and Conditions</a><br>
                            <a href="<?php echo base_url('privacy'); ?>" class="text-white">Privacy Policy</a>
                        </div>
                        <div class="col-6 text-white pl-5" style="line-height:30px;">
                            <a href="<?php echo base_url('reviews')?>" class="text-white">Reviews</a><br>
                            <a href="<?php echo base_url('contactus')?>" class="text-white">Contact Us</a><br>
                            <a href="<?php echo base_url('blog')?>" class="text-white">Blog</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-right">
                    <div class="mt-5 text-right">
                        <span style="font-size: 25px;"><span class="text-white">Follow us on :</span> <i class="fab fa-facebook-f text-orange"></i>&nbsp;<i class="fab fa-twitter text-orange"></i>&nbsp;<i class="fab fa-youtube text-orange"></i>&nbsp;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center fixed-bottom py-1" style="background: #F5F5F5;" hidden>
        <span>© Copyright Outletko • <?php echo date('Y') ?> • All Rights Reserved</span>
    </footer>
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
                            <input type="text" class="form-control form-control-sm textbox-green" id="login_email">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Password</span>
                            <input type="password" class="form-control form-control-sm textbox-green" id="login_password">
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
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-8 col-sm-12 pl-4 pt-3">
                            <p class="mb-0 text-body text-black font-weight-600">Outletko enables <br> Micro and Small Enterprises to create a DIGITAL DISPLAY and ONLINE STORE for their business.</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0 div-body-image text-right">
                            <img src="<?php echo base_url('assets/img/outletko-man.png')?>" alt="logo" class="img-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-success pt-1 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center px-0">
                            <p class="mb-1 text-white"><span class="font-weight-600 font-size-35">Mag Register na sa </span><span class="font-weight-bold font-size-45">Outlet<span class="text-yellow">ko</span>!</span></p>
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