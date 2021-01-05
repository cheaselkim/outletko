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
    <meta property="og:image" content="<?php echo base_url()."images/blog/".$img; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $url; ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:author" content="<?php echo $author; ?>" />
    <meta property="og:description" content="<?php echo $desc_content; ?>" />
    <meta property="og:image:alt" content="<?php echo base_url('assets/img/logo-13x.png')?>">
    <title>Outletko</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163137526-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-163137526-1');
    </script>


    <link rel="icon" href="<?php echo base_url('assets/img/logo-13x.png')?>" type="image/png" sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>">  
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">


    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>var base_url = '<?php echo base_url() ?>';</script>


  </head>

  <body>


<?php 

    $this->load->view("website/header"); 
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/website/blog.css')?>">
<script src="<?php echo base_url('js/website/blog.js')?>"></script>


<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="trans_id" value="<?php echo $id ?>">

<div class="container my-3 " style="min-height: 85vh;">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                    <span class="font-weight-600 blog-title" id="blog_title">Let Customers Come to You</span>
                </div>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                    <span class="font-size-20">by <span id="blog_author" class="text-capitalize ">Juan Dela Cruz</span> </span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <hr class="my-1" style="border-top: 1px solid rgb(195, 214, 155)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
                    <span class="text-gray font-size-20" id="blog_date"><?php echo date("F d, Y");?></span>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-12 col-lg-6 col-md-8 col-sm-12 mx-auto ">
                    <div class="div-img-blog border" id="div-img-blog">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12" id="div-blog-content">
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
    $this->load->view("templates/footer");
?>

</body>
</html>
