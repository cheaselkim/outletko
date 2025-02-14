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

</head>
<body>

<nav class="navbar navbar-expand-md " style="height: 40px;background: #006600">
	<a class="navbar-brand font-small font-weight-bold" href="<?php echo base_url() ?>" id="search-header-title"><span class="text-white">Outlet<span class="text-yellow">ko</span></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
</nav>

<div class="container mb-5 pb-5">
    <div class="row mb-5 pb-5">
        <div class="col-9 col-lg-12 col-md-12 col-sm-12 mx-auto">
            
            <div class="row mt-4 mb-5">
                <div class="col-6 col-lg-2 col-md-3 col-sm-12 mx-auto text-center">
                    <img src="assets/img/logo-13.png" alt="logo" class="img-fluid">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-sm-4 col-md-6 col-lg-12 text-center">
                    <span class="text-blue" style="color: blue;">New Member? <span class="cursor-pointer" data-toggle="modal" data-target="#modal_signup"><u>Register Here.</u></span></span>
                </div>
            </div>

            <div class="row mt-2">
              <div class="col-12 col-sm-4 col-md-6 col-lg-12 alert alert-danger mx-auto" id="login-error">
                <span>Invalid Username or Password</span>
              </div>
            </div>


            <div class="row mt-2">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <input type="text" class="form-control textbox-orange" name="username" id="login_email" placeholder="username">
                </div> 
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <input type="password" class="form-control textbox-orange" name="password" id="login_password" placeholder="password">
                </div> 
            </div>

            <div classs="row">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 text-right pr-0 pt-2  mx-auto">
                    <a href="<?php echo base_url('forgot_password')?>" class="text-red">Forgot Password?</a>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <button class="btn btn-orange btn-block" id="btn_login">Sign In</button>
                </div> 
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <a href="<?php echo base_url() ?>"><button class="btn btn-danger btn-block">Cancel</button></a>
                </div> 
            </div>


        </div>
    </div>
</div>

<div class="modal" id="modal_signup">
    <div class="modal-dialog" style="max-width: 480px;">
        <div class="modal-content">
            <div class="modal-header py-2" style="background:green;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 pr-0" hidden>
                            <img src="<?php echo base_url('assets/img/logo-13.png') ?>" alt="logo" style='height: 50px;'>
                        </div>
                        <div class="col-lg-12 text-center">
                            <span class="h1 font-weight-bold"><span class="text-white">Outlet</span><span class="text-yellow">ko</span></span>
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
                            <input type="text" class="form-control form-control-sm textbox-green bd-green" id="signup_user_fname">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Last Name <span class="text-red">*</span></span>
                            <input type="text" class="form-control form-control-sm textbox-green bd-green" id="signup_user_lname">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Email Address <span class="text-red">*</span></span>
                            <input type="text" class="form-control form-control-sm textbox-green bd-green" id="signup_user_email">
                            <span class="text-red" id="span-email" >Email Already Exists</span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Password <span class="text-red">*</span></span>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-sm textbox-green bd-green" id="signup_user_password">
                                <div class="input-group-append" style="height: 31px;">
                                    <span class="input-group-text show_pass cursor-pointer textbox-green bd-green">
                                    <i class="fa fa-eye-slash" id="pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <span>Confirm Password <span class="text-red">*</span></span>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-sm textbox-green bd-green" id="signup_user_conf_password">
                                <div class="input-group-append" style="height: 31px;">
                                    <span class="input-group-text show_conf_pass cursor-pointer textbox-green bd-green">
                                    <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            <span>Country <span class="text-red">*</span></span>
                            <select name="" id="signup_user_country" class="form-control form-control-sm textbox-green bd-green"></select>
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
                                        <span class="input-group-text show_conf_pass-1 cursor-pointer">
                                        <i class="fa fa-eye-slash" id="conf_pass_icon-1"></i>
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
                            <button class="btn btn-orange mt-3" id="resend" >Re-send confirmation email</button>
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


<?php $this->load->view("templates/footer"); ?>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</body>
</html>


