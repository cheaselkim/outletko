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

    <script src="<?php echo base_url('js/login.js') ?>"></script>
    <script src="<?php echo base_url('js/featured_outlet.js')?>"></script>

</head>
<body>

<nav class="navbar navbar-expand-md " style="height: 40px;background: rgb(79, 98, 40);">
	<a class="navbar-brand font-small font-weight-bold" href="<?php echo base_url() ?>" id="search-header-title"><span class="text-white">Outlet<span class="text-yellow">Ko</span></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
</nav>

<div class="container mb-5 pb-5">
    <div class="row mb-5 pb-5">
        <div class="col-9 col-lg-12 col-md-12 col-sm-12 mx-auto">
            
            <div class="row mt-4 mb-5">
                <div class="col-6 col-lg-12 col-md-12 col-sm-12 mx-auto">
                    <img src="assets/img/logo-13.png" alt="logo" class="img-fluid">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <input type="text" class="form-control textbox-orange" name="username" id="login_email" placeholder="username">
                </div> 
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <input type="password" class="form-control textbox-orange" name="password" id="login_password" placeholder="password">
                </div> 
            </div>

            <div classs="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right pr-0 pt-2">
                    <a href="<?php echo base_url('forgot_password')?>" class="text-red">Forgot Password?</a>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <button class="btn btn-orange btn-block" id="btn_login">Sign In</button>
                </div> 
            </div>

            <div class="row mt-2">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <a href="<?php echo base_url() ?>"><button class="btn btn-danger btn-block">Cancel</button></a>
                </div> 
            </div>


        </div>
    </div>
</div>

<?php $this->load->view("templates/footer"); ?>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</body>
</html>


