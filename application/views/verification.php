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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/store_register.css') ?>">

    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"; </script>

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/parsleyjs/dist/parsley.js')?>"></script>

</head>
<body>

<div class="container-fluid pb-4">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row" style="background-color:rgb(78, 98, 42)">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-md">
                        <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
                            <span class="fas fa-bars" style="font-size: 25px;"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="z-index: 999999;">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                   <a class="navbar-brand font-small" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/img/logo-10.png')?>" class="border img-header-website" alt=""></a>
                                </li>                    
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item py-1 pad-right">
                                    <button class="btn btn-block bg-white" id="btn_mod_signin" data-toggle="modal" data-target="#modal_signup_user"><i class="fas fa-sign-in-alt text-black"></i> <span class="text-black">Sign in</span></button>
                                </li>    
                                <li class="nav-item py-1 pad-left" >
                                    <button class="btn btn-block btn-transparent btn-orange" id="btn_mod_signup" data-toggle='modal' data-target="#modal_signup"><i class="fas fa-user text-white"></i> <span class="text-white">Sign Up</span></button>
                                </li>
                            </ul>
                        </div>  
                    </nav>
                </div>
            </div>

            <div class="container-fluid navbar pt-5 mt-5 " id="div-info"> 
                <div class="row w-100">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                <span class="font-weight-600 font-size-50 text-orange">Congratulations!!!!</span><br>
                                <span class="font-weight-600 font-size-30">Email has been verified</span><br>
                                <span class="font-weight-600 font-italic">Please see your email for invoice and user accounts</span><br><br>
                                <span class="font-size-50 text-orange"><i class="fas fa-check-circle"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>






        </div>
    </div>
</div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="total_amount">

</body>
</html>