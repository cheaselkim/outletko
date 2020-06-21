<!DOCTYPE html>
<html lang="en">
<head>
    <title>Outletko</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="eoutletsuite, eoutletsuite, eoutletsuite.com, outletko">
    <meta name="keywords" content="eoutletsuite, eoutletsuite.com, outletko">

    <link rel="icon" href="assets/img/logo-13.png" type="image/png" sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link async rel="stylesheet" href="<?php echo base_url('assets/css/login4.min.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/login3.min.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" >
    <link defer rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link async rel="stylesheet" href="<?php echo base_url('assets/css/store_register.css') ?>">

    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"; </script>

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script async src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/all.min.js') ?>" ></script>
    <script defer src="<?php echo base_url('assets/js/style.js') ?>"></script>
    <script defer src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script defer src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script defer src="<?php echo base_url('assets/node_modules/parsleyjs/dist/parsley.js')?>"></script>

    <script defer src="<?php echo base_url('assets/vendors/creditcardvalidator/creditCardValidator.js')?>"></script>
    <script defer src="<?php echo base_url('js/credit_card.js') ?>"></script>
    <script defer src="<?php echo base_url('js/ecommerce/subscription/upgrade_store.js') ?>"></script>    
    <script defer src="<?php echo base_url('js/login.js')?>"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row" style="background-color:rgb(78, 98, 42)">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-md py-1">
                    <a class="navbar-brand font-small" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/img/logo-13.png')?>" class="border img-header-website" alt=""></a>
                        <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
                            <span class="fas fa-bars" style="font-size: 25px;"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="z-index: 999999;">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item py-1 pad-right">
                                    <a class="btn btn-block bg-transparent text-white d-none d-sm-block" style="border: 1px solid white;" href="<?php echo base_url('/')?>"><i class="fas fa-store-alt text-white"></i> <span class="text-white"><?php echo $this->session->userdata('account_name')?></span></a>
                                    <a class="btn btn-block bg-transparent text-white d-block d-sm-none" href="<?php echo base_url('/')?>" style="border: 1px solid white;"><i class="fas fa-store-alt text-white"></i> <span class="text-white"><?php echo $this->session->userdata('account_name')?></span></a>
                                </li>    
                            </ul>
                        </div>  
                    </nav>
                </div>
            </div>

            <div class="container-fluid px-0" id="div-plan">
                <input type="hidden" class="form-control" id="plan-type">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-plan-header">
                        <div class="row">  
                            <div class="col-11 col-lg-7 col-md-9 col-sm-10 text-center text-white mx-auto div-plan-discount">
                                <span class="font-header-discount font-weight-600">Outlet<span class="text-yellow">ko</span> gives an Online Store</span><br>
                                <span class="font-header-discount font-weight-600">for your business</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-auto col-md-auto col-sm-8 text-center mx-auto div-plan-btn">
                                <button class="btn btn-success btn-block btn-header-plan font-weight-600" data-toggle="modal" data-target="#modal-features">Key Features of the Online Store</button>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white div-plan-font-header">
                                <span class="font-header">Start using Outletko </span><br>
                                <span class="font-header">in your business</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white div-plan-subheader">
                                <span class="font-subheader">Choose Payment Plan for your Outletko Standard Online Store</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row pt-2 px-3" id="div-plan-dtls">

                            <!-- <div class="col-12 col-lg-15 col-md-6 col-sm-12 px-0 mt-2">
                                <div class="mx-auto text-center div-plan-e div-plan" id="div-plan-e">
                                    <p class="font-size-35 font-weight-600 mb-0 plan-type-name">Outletko <span class="font-weight-bold">Basic</span></p>
                                    <p class="font-size-25 font-weight-600 mb-0">FREE</p>
                                    <span class="font-size-36 font-weight-600" hidden>PHP <span class="text-decoration-line">5,750.00</span></span>
                                    <span class="plan-discount-price font-weight-600">PHP <span class="span-plan-price">0.00</span></span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan mt-3" id="btn-plan-e" value="0"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-15 col-md-6 col-sm-12 px-0 mt-2 order-4">
                                <div class="mx-auto text-center div-plan-d div-plan" id="div-plan-b">
                                    <p class="font-size-35 font-weight-600 mb-0">Outletko <span class="font-weight-bold">Pro</span> <img src="https://c.mql5.com/6/702/1monthfreeSticker1.jpg" alt="Free 1 Month" class="img-free-month"></p>
                                    <p class="font-size-25 font-weight-600 mb-0">Annual</p>
                                    <span class="font-size-36 font-weight-600" hidden>PHP <span class="text-decoration-line">5,750.00</span></span>
                                    <span class="plan-discount-price font-weight-600">PHP <span class="span-plan-price">2,900.00</span></span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan mt-3" id="btn-plan-d" value="1"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-15 col-md-6 col-sm-12 px-0 mt-2 order-3">
                                <div class="mx-auto text-center div-plan-c div-plan" id="div-plan-c">
                                    <p class="font-size-35 font-weight-600 mb-0 plan-type-name">Outletko <span class="font-weight-bold">Pro</span>  </p>
                                    <p class="font-size-25 font-weight-600 mb-0">Semi - Annual</p>
                                    <span class="font-size-36 font-weight-600" hidden>PHP <span class="text-decoration-line">3,000.00</span></span>
                                    <span class="plan-discount-price font-weight-600">PHP <span class="span-plan-price">1,500.00</span></span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan mt-3" id="btn-plan-c" value="2"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-15 col-md-6 col-sm-12 px-0 mt-2 order-2">
                                <div class="mx-auto text-center div-plan-b div-plan" id="div-plan-b">
                                    <p class="font-size-35 font-weight-600 mb-0 plan-type-name">Outletko <span class="font-weight-bold">Pro</span>  </p>
                                    <p class="font-size-25 font-weight-600 mb-0">Quarterly</p>
                                    <span class="font-size-36 font-weight-600" hidden>PHP <span class="text-decoration-line">1,500.00</span></span>
                                    <span class="plan-discount-price font-weight-600">PHP <span class="span-plan-price">795.00</span></span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan mt-3" id="btn-plan-b" value="3"><span class="text-black">Select</span></button><br>
                                </div>
                            </div>
                            <div class="col-12 col-lg-15 col-md-6 col-sm-12 px-0 mt-2 order-1" >
                                <div class="mx-auto text-center div-plan-a div-plan" id="div-plan-a">
                                    <p class="font-size-35 font-weight-600 mb-0 plan-type-name">Outletko <span class="font-weight-bold">Pro</span>  </p>
                                    <p class="font-size-25 font-weight-600 mb-0">Monthly</p>
                                    <span class="font-size-36 font-weight-600" hidden>PHP <span class="text-decoration-line">500.00</span></span>
                                    <span class="plan-discount-price font-weight-600">PHP <span class="span-plan-price">265.00</span></span><br>
                                    <button class="font-weight-600 btn btn-orange px-5 btn-plan mt-3" id="btn-plan-a" value="4"><span class="text-black">Select</span></button><br>
                                </div>
                            </div> -->

                        </div>
                        <div class="row" hidden>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3">
                                <span class="font-size-20 font-weight-500">Plans are for Three (3) Outlets or Branches Only</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid navbar pt-3 " id="div-info"> 
                <div class="row w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <span class="font-weight-600 font-size-30">Outletko Account Information</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <hr class="my-1" style="border-top: 1px solid rgb(195, 214, 155)">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                                <form id="info-form" >
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>First Name <span class="text-red">*</span> </span>
                                            <input type="text" class="form-control form-control-sm textbox-green text-capitalize" id="info-fname" data-parsley-trigger="focusin focusout"  required>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-12" hidden>
                                            <span>Middle Name  </span>
                                            <input type="text" class="form-control form-control-sm textbox-green" id="info-mname" >
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Last Name <span class="text-red">*</span></span>
                                            <input type="text" class="form-control form-control-sm textbox-green text-capitalize" id="info-lname" data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                    <div class="row" hidden>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Gender <span class="text-red">*</span></span><br>
                                            <div class="form-check-inline mt-2 ml-5">
                                                <input type="radio" class="form-check-input info-gender" name="gender" id="info-gender-male" value="M" >Male
                                                <input type="radio" class="form-check-input info-gender ml-3" name="gender" id="info-gender-female" value="F" >Female
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Birthday <span class="text-red">*</span></span>
                                            <input type="text" class="form-control form-control-sm textbox-green readonly bg-white cursor-pointer" id="info-bday" >
                                        </div>
                                    </div>
                                    <div class="row" hidden>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span>Facebook Profile/Page Link<span class="text-red">*</span> (This is for supporting user through facebook)</span>
                                            <input type="text" class="form-control form-control-sm textbox-green" id="info-fb" > 
                                            <!-- data-parsley-trigger="focusin focusout change" required -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <hr class="mt-2 mb-1" style="border-top: 1px solid rgb(195, 214, 155)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Business Name <span class="text-red">*</span></span>
                                            <input type="text" class="form-control form-control-sm textbox-green text-capitalize" id="info-business-name" data-parsley-trigger="focusin focusout" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Business Category <span class="text-red">*</span></span>
                                            <select class="form-control form-control-sm textbox-green text-capitalize" id="info-business-category" data-parsley-trigger="focusin focusout" required>
                                                <option value="" selected hidden></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <span>Business Address <span class="text-red">*</span></span>
                                            <input type="text" class="form-control form-control-sm textbox-green text-capitalize" id="info-business-address" placeholder="Number/Street/Village/" data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Town / City <span class="text-red">*</span></span>
                                            <input type="text" class="form-control form-control-sm textbox-green text-capitalize" id="info-town" data-parsley-trigger="focusin focusout" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Province <span class="text-red">*</span></span>
                                            <input type="text" class="form-control form-control-sm textbox-green text-capitalize" id="info-province" data-parsley-trigger="focusin focusout" required readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Zip Code  </span>
                                            <input type="text" class="form-control form-control-sm textbox-green" id="info-zipcode" >
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Country <span class="text-red">*</span></span>
                                            <select class="form-control form-control-sm textbox-green text-capitalize" id="info-country" data-parsley-trigger="focusin focusout" required>
                                                <option value="" selected hidden></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 div-email">
                                            <span>Email Address <span class="text-red">*</span></span>
                                            <input type="email" class="form-control form-control-sm textbox-green" id="info-email" data-exists="0" data-parsley-trigger="focusin focusout" data-parsley-type="email" required>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Mobile No <span class="text-red">*</span></span>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="height: 31px;">
                                                    <span class="input-group-text textbox-green text-black bg-white">+63</span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm textbox-green w-75" id="info-mobile" data-parsley-length="[10, 10]" data-parsley-length-message="This value should be exactly 10 digits long" data-parsley-type="digits" data-parsley-trigger="focusin focusout" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Phone No</span>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="height: 31px;">
                                                    <input type="text" class="form-control form-control-sm textbox-green text-center" value="02" style="width:40px;" id="info-phone-code" data-parsley-trigger="focusin focusout" data-parsley-type="number">
                                                </div>
                                                <input type="text" class="form-control form-control-sm textbox-green w-75" id="info-phone" data-parsley-type="number" data-parsley-trigger="focusin focusout">
                                            </div>                                        
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span>Partner <span class="text-red">*</span></span>
                                            <input readonly disabled type="text" class="form-control form-control-sm textbox-green" value="HOUSE ACCOUNT  (000001)" id="info-partner" data-parsley-trigger="focusin focusout" required data-id="1" data-lvl-2="0" data-lvl-3="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <div class="g-recaptcha" data-sitekey="6Lceu-UUAAAAAIEI5p99WGEi9w5EH8AMnNo4AZg0"></div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <span>By clicking <span class="font-weight-600">"Continue"</span>, I agree to Outletko's <a href="<?php echo base_url('terms'); ?>">Terms and Conditions</a> and <a href="<?php echo base_url('privacy'); ?>">Privacy Policy</a> </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                            <hr class="mt-3 mb-1" style="border-top: 1px solid rgb(195, 214, 155)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <button class="btn btn-success btn-block" id="btn-next-info" type="button">Continue</button>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <button class="btn btn-orange btn-block" id="btn-back-info" type="button">Back</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                            <button class="btn btn-danger btn-block" onclick="window.location.reload();">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid px-0" id="div-cart">
                <input type="hidden" id="plan-price">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-cart-header">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white div-cart-font-header">
                                <span class="font-header">Outletko for your business </span><br>
                                <span class="font-header">is just a few clicks away</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row navbar w-100 div-cart-details">
                            <div class="col-12 col-lg-8 col-md-12 col-sm-12 table-responsive pt-3 d-none d-md-block" >
                                <table class="table border-green">
                                    <thead class="bg-gray border-bottom">
                                        <tr>
                                            <th>ITEM</th>
                                            <th>PRICE</th>
                                            <th class="text-center">QUANTITY</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span id='cart-plan-name'>Payment Plan A : Monthly</span></td>
                                            <td class="pt-4"><span id="cart-plan-price">PHP 2,850.00</span></td>
                                            <td class="text-center pt-4" ><input type="text" class="textbox-green text-center" value="1" readonly style="width: 50px;"></td>
                                            <td class="pt-4"><span id="cart-plan-total-price">2,850.00</span></td>
                                        </tr>
                                        <tr id="tbl-row-cart-plan-outlet">
                                            <td>No. of Additional Branches or Outlets <input type="text" class="textbox-green text-center" value="0" style="width: 50px;" id="cart-plan-outlet-qty"></td>
                                            <td><span id="cart-plan-outlet-price">PHP 0.00</span></td>
                                            <td class="text-center" ><input type="text" class="textbox-green text-center" value="0" readonly style="width: 50px;" id="cart-plan-outlet-qty-dp"></td>
                                            <td><span id="cart-plan-outlet-total-price">PHP 0.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-lg-8 col-md-12 col-sm-12 pt-3 table-responsive px-0 d-block d-sm-none d-md-none">
                                <table class="table border-green">
                                    <tbody >
                                        <tr>
                                            <td class="font-weight-600 border-0 bg-gray px-1">ITEM</td>
                                            <td class="border-0"><span id="sml-cart-plan-name"><br> Payment Plan A : Quarterly</span></td>
                                            <td class="border-0 sml-tbl-row-cart-plan-outlet">No. of Additional Branches or Outlets <input type="text" class="textbox-green text-center" value="0" style="width: 50px;" id="sml-cart-plan-outlet-qty"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600 bg-gray px-1">PRICE</td>
                                            <td><span id="sml-cart-plan-price">PHP 2,850.00</span></td>
                                            <td class="sml-tbl-row-cart-plan-outlet"><span id="sml-cart-plan-outlet-price">PHP 0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-600 bg-gray px-1">QUANTITY</td>                                        
                                            <td class="text-left"><input type="text" class="textbox-green text-center" value="1" readonly style="width: 50px;"></td>
                                            <td class="text-center sml-tbl-row-cart-plan-outlet" ><input type="text" class="textbox-green text-center" value="1" readonly style="width: 50px;" id="sml-cart-plan-outlet-qty-dp"></td>
                                        </tr>
                                        <tr class="bg-gray">
                                            <td class="font-weight-600 px-1">TOTAL</td>
                                            <td><span id="sml-cart-plan-total-price">2,850.00</span></td>
                                            <td class="sml-tbl-row-cart-plan-outlet"><span id="sml-cart-plan-outlet-total-price">PHP 0.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-lg-4 col-md-12 col-sm-12 div-cart-total border-green py-2">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                                        <span class="font-size-20 font-weight-600" hidden>CART TOTALS</span>
                                        <span class="font-size-30 font-weight-bold" >Grand Total : <span id="cart-grand-total"></span></span>
                                        <button class="btn btn-success btn-block mt-4" id="btn-next-cart"> <span class=""> Proceed to Checkout</span> </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-warning btn-block" id="btn-back-cart">Back</button>
                                    </div>
                                    <div class="col-12 co-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-danger btn-block" onclick="window.location.reload();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid navbar pt-2" id="div-bill">
                <div class="row w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <span class="font-size-30 font-weight-600">Billing Details</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <hr class="mt-1 mb-3" style="border-top: 1px solid rgb(195, 214, 155)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <form id="bill-form">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-7 col-sm-12">

                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>First Name <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-fname" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Last Name <span class="text-red">*</span> </span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-lname" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                            </div>    
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                    <span>Company (optional)</span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-company">
                                                </div>            
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                    <span>Address <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" placeholder="Number/Street/Village/" id="bill-address" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Town / City <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-town" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Province <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-province" readonly >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Zip Code</span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-zipcode">
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Country <span class="text-red">*</span></span>
                                                    <select class="form-control form-control-sm textbox-green" data-parsley-trigger="focusin focusout"  required id="bill-country">
                                                        <option value="" selected hidden></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Email Address <span class="text-red">*</span></span>
                                                    <input type="text" class="form-control form-control-sm textbox-green" id="bill-email" data-parsley-trigger="focusin focusout"  required>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Mobile No <span class="text-red">*</span></span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="height: 31px;">
                                                            <span class="input-group-text textbox-green text-black bg-white">+63</span>
                                                        </div>
                                                        <input class="form-control form-control-sm textbox-green w-75" id="bill-mobile" data-parsley-trigger="focusin focusout"  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <span>Phone No</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="height: 31px;">
                                                            <input type="text" class="form-control form-control-sm textbox-green text-center" value="02" id="bill-phone-code" style="width:40px;">
                                                        </div>
                                                        <input type="password" class="form-control form-control-sm textbox-green" id="bill-phone">
                                                    </div>                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-5 col-sm-12">
                                            <div class="row mx-0">
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 border-green div-bill-total">
                                                    <div class="row ">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                            <span class="font-size-25 font-weight-600">Bill TOTALS</span><br>
                                                            <span class="font-size-25 font-weight-bold mt-2">Grand Total : <span id="bill-grand-total"></span></span>
                                                            <button class="btn btn-success btn-block mt-4" id="btn-next-bill" type="button">Proceed to Checkout</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                                            <button class="btn btn-warning btn-block" id="btn-back-bill" type="button">Back</button>
                                                        </div>
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                                            <button class="btn btn-danger btn-block " onclick="window.location.reload();">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-0" id="div-payment">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-payment-header">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center text-white">
                                <span class="font-header">How would you like to pay?</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row navbar mt-3">
                    <input type="hidden" id="payment-type" value="1">
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12 pt-3">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="div-card-payment w-100 border-green div-payment-divider div-payment-type px-3 py-5 cursor-pointer" id="div-card-payment">
                                    <img src="<?php echo base_url('assets/images/payment_type/visa.png')?>" alt="visa/mastercard" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="div-bank-payment text-center w-100 border-green div-payment-divider div-payment-type py-5 cursor-pointer" id="div-bank-payment">
                                    <span class="font-size-30 text-green font-weight-600">Bank Payment</span><br>
                                    <span class="font-size-30 text-green font-weight-600">(Over the counter)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12 pt-3">
                        <div class="row mx-0">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 border-green div-payment-divider">
                                <div class="row ">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                                        <span class="font-size-25 font-weight-600" hidden>Bill TOTALS</span>
                                        <span class="font-size-30 font-weight-600">Grand Total : </span><br>
                                        <button class="btn btn-success btn-block mt-4" id="btn-next-payment" hidden>Proceed to Checkout</button>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center pt-4">
                                        <span class="font-size-40 font-weight-bold mt-2" id="payment-grand-total">PHP 2,850.00</span>
                                    </div>
                                </div>
                                <div class="row" hidden>
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-warning btn-block" id="btn-back-payment">Back</button>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <button class="btn btn-danger btn-block " onclick="window.location.reload();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://www.paypal.com/sdk/js?client-id=AWTIdNavxpjfG_d_VIoMCzm0BOBEORPY9hHbUOAQtc7Oh8a1qXrAgUb72lU7TxQwmoQ-6X0gHz3rTqrP&currency=PHP&locale=en_PH"></script>
            <div class="container-fluid navbar" id="div-payment-details">
                <!-- <div class="row pt-5 w-100" id="div-card-details">
                    <div class="col-12 col-lg-4 col-md-7 col-sm-12 mx-auto">
                        <div class="row py-1">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <span>Card Number</span>
                                <input type="text" class="form-control form-control-sm textbox-green" id="card_number" maxlength="20">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                <span>Month</span>
                                <input type="text" class="form-control form-control-sm textbox-green" placeholder="MM" id="expiry_month" maxlength="2">
                            </div>
                            <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                <span>Year</span>
                                <input type="text" class="form-control form-control-sm textbox-green" placeholder="YYYY" id="expiry_year" maxlength="4">
                            </div>
                            <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                <span>CVV</span>
                                <input type="text" class="form-control form-control-sm textbox-green" placeholder="123" id="cvv" maxlength="3">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <span>Name on Card</span>
                                <input type="text" class="form-control form-control-sm textbox-green" placeholder="Juan Dela Cruz" id="name_on_card">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                <button class="btn btn-success btn-block" id="btn-next-payment-details">Proceed to Payment</button>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                <button class="btn btn-warning btn-block" id="btn-back-payment-details">Back</button>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-2">
                                <button class="btn btn-danger btn-block" onclick="window.location.reload();">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row" id="div-card-payment-details">
                            <div class="col-12 col-lg-4 col-md-6 col-sm-12 mx-auto">
                                <div id="paypal-button-container" class="mt-3"></div>
                            </div>
                        </div>
                        <div class="row" id="div-bank-payment-details">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class=row>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                    	<table class="table table-sm table-bordered">
                                    		<thead>
                                    			<tr>
                                    				<th>Bank Name</th>
                                    				<th>Account Number</th>
                                    				<th>Account Name</th>
                                    			</tr>
                                    		</thead>
                                    		<tbody>
                                    			<tr>
                                    				<td>BDO Unibank</td>
                                    				<td>0000 0000 0000 0000 </td>
                                    				<td>Outletko Corporation</td>
                                    			</tr>
                                    		</tbody>
                                    	</table>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-12 col-lg-4 col-md-12 col-sm-12 mx-auto">
                                		<button class="btn btn-orange btn-block" id="btn-bank-payment">Continue</button>
                                	</div>
                                </div>
                            </div>
                        </div>
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
                <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
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
                <span class="font-size-18" style="font-size: 18px !important;">Welcome! Please Login to continue. </span><br>
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
              <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
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
              <span class="font-size-18" style="font-size: 18px !important;">Create your Outletko Account. </span><br>
              <small class="text-red font-weight-600" style="font-size-15px;"> Register your store? <a class="cursor-pointer text-red" href="<?php echo base_url('register-store'); ?>" ><u>Register here</u></a> </small> 
              <!-- id="a_register_store" -->
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
              <span>An email has been sent to you. Please check your inbox and follow the instruction in the message.</span><br>
              <button class="btn btn-orange mt-3" id="resend" hidden>Re-send confirmation email</button>
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

<div class="modal" id="modal-features">
    <div class="modal-dialog" style="max-width:600px;">
        <div class="modal-content">
            <div class="modal-header pb-0 pt-1">
                <h4 class="modal-title">Features of your Outletko Online Store :</h4>
                <button type="button" class="close" data-dismiss="modal" hidden>&times;</button>
            </div>
            <div class="modal-body py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <!-- <span><i class="fas fa-minus"></i> Allow Business Owner to post/display upto 30 Product Items in their Online Store.</span><br>
                            <span><i class="fas fa-minus"></i> Can setup different payment mode (COD,  Bank Deposit, Remittance).</span><br>
                            <span><i class="fas fa-minus"></i> * Card Payment/Online Payment can also be setup for your Online Store.</span><br> -->
                            <ul class="px-2" style="font-size:18px;">
                                <li>You will have your OWN Online Store or e-commerce Store.</li>
                                <li>Very easy and fast to activate, setup and maintain your Online Store.</li>
                                <li>All you need is your smartphone to setup your Online Store.</li>
                                <li>Enables you to display or post your Products in your Online Store.</li>
                                <li>Able to Setup and Display Products by Category</li>
                                <li>Can Setup the following Mode of Payments in your Store. - Cash on Delivery, Bank Deposit/Payment, Remittances</li>
                                <li>Online/Card Payment can be configured upon payment of the One time setup fee.</li>
                                <li>Able to Set-up Delivery Mode : - Delivery or Pick-up</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1 text-center">
                <button type="button" class="btn btn-success mx-auto" data-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="total_amount">

</body>
</html>