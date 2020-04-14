<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Outletko is a digital platform technology and service that enables enterprises to connect to people and the community, and gives growth to business. It provides facility for full digital transformation for micro and small enterprises.">
    <meta name="keywords" content="eoutletsuite, eoutletsuite.com, outletko">
    <title>Outletko</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163137526-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-163137526-1');
    </script>


    <link rel="icon" href="assets/img/logo-13.png" type="image/png" sizes="2x2">

<!--     <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>">  
<!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/summernote/css/summernote-bs4.css') ?>">


    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
<!--     <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('js/template.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/summernote/js/summernote-bs4.js') ?>"></script>  
    <script src="<?php echo base_url('assets/node_modules/parsleyjs/dist/parsley.js')?>"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/colorpicker/css/colorpicker.css') ?>">
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/colorpicker.js') ?>"></script>     -->

    <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/colorpicker/css/colorpicker.css') ?>">
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/colorpicker.js') ?>"></script>    

    <script>var base_url = '<?php echo base_url() ?>';</script>

  </head>

  <body>


<?php 
    if ($this->session->userdata("validated") == true){
        if ($header != ""){
            $this->load->view($header);       
        }
        $this->load->view($page);    
    }else{
      $this->load->view("login");
    }
 ?>

</body>
</html>