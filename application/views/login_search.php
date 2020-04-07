<!DOCTYPE html>
<html lang="en">
<head>
    <title>Outletko</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="eoutletsuite, eoutletsuite, eoutletsuite.com, outletko">
    <meta name="keywords" content="eoutletsuite, eoutletsuite.com, outletko">

    <link rel="icon" href="assets/img/icon2.png" type="image/png" sizes="2x2">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login3.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll_words.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/outletko/login_search.css') ?>">

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>

    <script src="<?php echo base_url('js/login.js') ?>"></script>

    <style type="text/css">
        
      .img-prof{
        height: 100px;
        width: 100px;

      }

    </style>

</head>
<body>

<input type="hidden" name="prov_id" value="<?php echo $prov_id ?>">
<input type="hidden" name="city_id" value="<?php echo $city_id ?>">
<input type="hidden" name="product" value="<?php echo $product ?>">

<div class="container pt-3 pb-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10">

            <div class="row bg-white" style="min-height: 600px; height: auto;">
                <div class="col-12 px-4 py-3">
                    
                    <?php 
                        echo $tbl;
                     ?>

                </div>
            </div>

<!--             <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 div-header">

                </div>
            </div>
 -->
            <!-- DIV HOME -->
<!--             <div class="row pt-2" id="div-home">
                <div class="col-auto px-0">
                    <div class="div-left-aboutus" style="min-height: 430px;width: 205px;background:#c3d69b;height: auto;">
                        
                    </div>
                </div>
                <div class="col pad-right">
                    <div class="" style="min-height: 430px;background: white;height: auto;">
                    </div>
                </div>
            </div>
 -->
            <!-- DIV HOME -->

        </div>
        <div class="col-2 col-sm-12 col-md-2 col-lg-2 pr-0 pl-1">
            <div class="row">

            </div>
        </div>
    </div>

</div>


<!-- <div class="container py-5">
  <?php echo $tbl; ?>
</div> -->

</body>
</html>


