<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="Outletko, eoutletsuite, outletko, zugriff products, zugriff outletko">
    <meta name="description" content="Outletko is a digital platform technology and service that enables enterprises to connect to people and the community, and gives growth to business. It provides facility for full digital transformation for micro and small enterprises.">
    
    <meta property="og:locale" content="en_US" />
    <meta property="og:image" content="<?php echo base_url()?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo base_url()?>" />
    <meta property="og:title" content="blog" />
    <meta property="og:description" content="X" />
    <title>Outletko</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163137526-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-163137526-1');
    </script>


    <link rel="icon" href="<?php echo base_url('assets/img/logo-13.png')?>" type="image/png" sizes="2x2">
<!--     <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>">  
<!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">


    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
<!--     <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('js/login.js') ?>"></script>
    <script src="<?php echo base_url('js/template_login2.js') ?>"></script>
    <script src="<?php echo base_url('js/template.js') ?>"></script>

    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/colorpicker/css/colorpicker.css') ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/colorpicker/css/layout.css') ?>"> -->
    <!-- <script src="<?php echo base_url('assets/node_modules/colorpicker/js/colorpicker.js') ?>"></script>     -->
    <!-- <script src="<?php echo base_url('assets/node_modules/colorpicker/js/eye.js') ?>"></script>    
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/layout.js') ?>"></script>    
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/util.js') ?>"></script>    
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/jquery.js') ?>"></script>     -->

    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/fotorama/fotorama.css')?>"> -->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <!-- <script src="<?php echo base_url('assets/node_modules/fotorama/fotorama.js'); ?>"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>


    <script>var base_url = '<?php echo base_url() ?>';</script>

    <style type="text/css">
      option {
        max-height: 15px;
        overflow: auto;
      }

      #modal_signup input, select{
        font-size: 16px !important;
        font-family: 'Arial' !important;
      }

/*      #modal_signup  .container  span{
        font-size: 15px;
        font-family: 'Arial' !important;
      }*/

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


<?php 

    if ($header != ""){
        $this->load->view($header); 
    }
    $this->load->view($page);    
    //   var_dump("template 2");
    //   var_dump($header);

    if ($page == "ecommerce/profile/profile"){
      $this->load->view("ecommerce/profile/footer");
    }else{
      $this->load->view("templates/footer");
    }
 ?>

<div class="modal" id="modal_signup_user">
    <div class="modal-dialog" style="max-width: 460px;">
      <div class="modal-content">
        <div class="modal-header py-2" style="background: rgb(119,147,60)">
          <div class="container">
            <div class="row">
              <div class="col-lg-2 pr-0" hidden>
                <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
              </div>
              <div class="col-lg-12 text-center">
                <span class="h1 text-white font-bauhaus-93">Outletko</span><br>                                
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
      <div class="modal-header py-2" style="background: rgb(119,147,60)">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 pr-0" hidden>
              <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
            </div>
            <div class="col-lg-12 text-center">
                <span class="h1 text-white font-bauhaus-93">Outletko</span><br>                                
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


</body>
</html>
