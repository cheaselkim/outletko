<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>EPGM eOutletSuite</title>

<!--     <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>">  
<!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css') ?>">


    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
<!--     <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('js/template.js') ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/colorpicker/css/colorpicker.css') ?>">
    <script src="<?php echo base_url('assets/node_modules/colorpicker/js/colorpicker.js') ?>"></script>    


    <script>var base_url = '<?php echo base_url() ?>';</script>

  </head>

  <body>


<?php 
    if ($this->session->userdata("validated") == true){
      $this->load->view($header); 
      $this->load->view($page);    
    }else{
      $this->load->view("login");
    }
 ?>

</body>
</html>