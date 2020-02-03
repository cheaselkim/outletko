<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Outletko</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>">  
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sukifresh/sukifresh.css') ?>">


    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/colorpicker/css/colorpicker.css') ?>">
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/colorpicker.js') ?>"></script>    


    <script>var base_url = '<?php echo base_url() ?>';</script>

</head>

<body>

<div class="container-fluid mb-3">
    <div class="row div-header-0">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <div class="row">
                    <?php if ($this->session->userdata('login') == "0"){ ?>
                    <div class="col-12 col-lg-12 pl-0 py-1">
                        <div class="row">
                            <div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-right-1">
                                <div class="row">
                                    <div class="col-12 col-lg-5 col-md-12 col-sm-12">
                                        <a href="<?php echo base_url('sukifresh/account') ?>" class="text-decoration-none"><button class="btn btn-light-green-2 py-1 btn-block">Sign In</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-6 col-md-6 col-sm-6 pad-right-1 ml-auto">
                                <div class="row">
                                    <div class="col-12 col-lg-5 col-md-12 col-sm-12 ml-auto">
                                        <a href="<?php echo base_url('sukifresh/myaccount') ?>" class='text-decoration-none'><button class="btn border-light-green btn-height-35 bg-white py-1 text-light-green-2 btn-block">Cart PHP <span ><?php echo number_format($this->session->userdata('total_amount'), 2); ?></span></button></a>                                        
                                    </div>
                                </div>
                            </div>                                                    
<!--                             <div class="col-3 col-lg-4 pad-left-1">
                                <button class="btn btn-light-green-2 btn-height-35 btn-block py-1 "></button>                            
                            </div>                             -->
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('login') == "1"){ ?>
                    <div class="col-12 col-lg-6 text-right pr-0 py-1 ml-auto">
                        <div class="row">
                            <div class="col-12 col-lg-2"></div>
                            <div class="col-6 col-lg-5 pad-right-1 pl-0">
                                <a href="<?php echo base_url('sukifresh/myaccount-order') ?>" class='text-decoration-none'><button class="btn border-light-green btn-height-35 bg-white py-1 text-light-green-2 btn-block">Hi! Eapurug....</button></a>
                            </div>
                            <div class="col-6 col-lg-5 pad-left-1 ml-auto">
                                <a href="<?php echo base_url('sukifresh/myaccount') ?>" class='text-decoration-none'><button class="btn border-light-green btn-height-35 bg-white py-1 text-light-green-2 btn-block">Cart PHP <span id="hdr_total"><?php echo number_format($this->session->userdata('total_amount'), 2); ?></span></button></a>                                                    
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <?php $this->load->view('sukifresh/homepage'); ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center pt-2">
            <span class="text-gray">&copy; <?php echo date('Y'); ?> Sukifresh. All Rights Reserved</span>
        </div>
    </div>

</div>
        

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</body>
</html>