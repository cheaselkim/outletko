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

    <script type="text/javascript">var base_url = "<?php echo base_url(); ?>"</script>

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/style.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>

    <script src="<?php echo base_url('js/outletko/signup_login.js') ?>"></script>
    <script src="<?php echo base_url('js/login.js') ?>"></script>


    <style type="text/css">
      option {
        max-height: 15px;
        overflow: auto;
      }

      #modal_signup input, select{
        font-size: 16px !important;
        font-family: 'Arial' !important;
      }

      #modal_signup  .container  span{
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
      
      $(document).ready(function(){
/*        $("#birth_month").change(function(){
          month_date();
        });

        $("#birth_year").change(function(){
          month_date();
        }); 
*/
      });

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

<!-- The Modal -->
<div class="modal" id="website_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header my-0 py-1">
        <h4 class="modal-title">Password</h4>
      </div>
      <div class="modal-body my-0 py-1">
        <h5 class="text-red" id="wrong_pass">Wrong Password!!!</h5>
        <input type="password" class="form-control" placeholder="Password" id="website_password">
      </div>
      <div class="modal-footer my-0 py-1">
        <button type="button" class="btn btn-success" id="go">GO!</button>
      </div>

    </div>
  </div>
</div>

    <div class="container-fluid" id="div-body" style="">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="row">
                    <div class="col-lg-7 col-md-5 col-sm-7 left pl-4">

                        <nav class="navbar navbar-expand-md pl-0 d-block d-sm-none">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style='color: white;background: rgb(87, 107, 45);'>
                            <span class="fas fa-bars"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="collapsibleNavbar" >
                            <ul class="navbar-nav">
                              <li class="nav-item py-1">
                                <button class="btn btn-block btn-transparent bd-yellow" data-toggle='modal' data-target="#modal_signup"><span class="text-yellow" >Register your store</span></button>
                              </li>
                              <li class="nav-item py-1">
                                <button class="btn btn-block btn-transparent bd-yellow" data-toggle="modal" data-target="#modal_signup_user"><span class="text-yellow">Outletko login</span></button>
                              </li>
                              <li class="nav-item py-1">
                                <button class="btn btn-block btn-transparent bd-yellow" data-toggle="modal" data-target="#modal_login"><span class="text-white">eOutlet</span><span class="text-gold">Suite</span><span class="text-white"> Login</span></button>
                              </li>    
                            </ul>
                          </div>  
                        </nav>

                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12" id="div-title">
                              <div class="row">
                                 <div class="col-lg-2 col-md-2 col-sm-12" hidden>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-12 pt-2">
                                  <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 70%;'>
                                  <span class="font-size-45"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-light-gray">.com</span></span><br>                                
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-12 d-none d-sm-block text-right px-0 py-2" style="z-index: 1;"> 
                                <button class="btn  btn-transparent" style="margin-left: 200px;z-index: 9999;"  data-toggle='modal' data-target="#modal_signup"><span class="text-yellow" >Register your store</span></button>
                            </div>
                        </div>


                        <div class="row pl-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 px-5" id="div-search-engine">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="text-black font-size-28">Connecting you to outlet stores and service providers</span>                                
                                    </div>                            
                                </div>
                                <!-- <?php echo form_open('Search/Search'); ?> -->
                                  <form action="<?php echo base_url('Search/index') ?>" method="get">
                                    <div class="row pr-4">
                                        <div class="col-lg-3 col-md-12 col-sm-12 py-1 pad-right">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                                                </div>
                                                <input type="text" class="form-control textbox-orange border-left-0 pl-1" name="location" data-id="" data-prov="" placeholder="Metro Manila" aria-label="Username" aria-describedby="basic-addon1">
                                                <input type="hidden" name="city_id" value="1024">
                                                <input type="hidden" name="prov_id" value="52">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12 col-sm-12 py-1 pad-center">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text textbox-orange bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
                                                </div>
                                            <input type="text" class="form-control textbox-orange border-left-0 pl-1" name="product_outlet" placeholder="Search Products or Outlet" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12 py-1 pad-center">
                                        <input type="submit" class="btn btn-orange btn-block " value="Search" id="search" name="search">
                                        </div>                
                                    </div>
                                  </form>  
                                  <!-- <?php echo form_close(); ?> -->               

                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 pr-4" id="div-were">
                                    <span class="font-size-36 text-white" >We're Coming Very Soon</span>
                                  </div>
                                </div>
                            </div>
                        </div>         

                        <div class="row pl-3">
                            <div class="col-lg-12 d-none d-lg-block px-5" style="position: absolute; bottom: 10px;">
                                <div class="row pl-3 pr-5">  

                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 line-height-20 font-weight-600 bg-white"  id="" style="border: 1px solid orange; height: 125px;">

                                        <div class="row font-size-20" id="ads-1">
                                            <div class="col-lg-9 py-2 pr-0">
                                                <span>Gumamit ng <span class="text-green">eOutlet</span><span class="text-orange">Suite</span> sa iyong negosyo para</span><br>
                                                <span>lalong maging matagumpay</span><br>
                                                <button class="btn btn-orange btn-sm mt-2 font-weight-bold">LEARN MORE</button>
                                            </div>
                                            <div class="col-lg-3" style="background: url('<?php echo base_url('/assets/img/ads/ads-1.png') ?>'); background-size: 100% 100%; background-repeat: no-repeat;">
                                            </div>
                                        </div>

                                        <div class="row font-size-18" id="ads-2" >
                                            <div class="col-lg-9 pt-2 pb-1 pr-0">
                                                <span>Automate your Store Operation and Run you business<br>
                                                <span>like Big companies do.</span><br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button class="btn btn-orange btn-sm mt-2 font-weight-bold">LEARN MORE</button>                    
                                                    </div>
                                                    <div class="col-6 text-right pt-4" style="font-size: 25px;">              
                                                        <span class="mt-1"><span class="text-green">eOutlet</span><span class="text-orange">Suite</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" style="background: url('/assets/img/ads/ads-2.png'); background-size: 100% 120px; background-repeat: no-repeat;">
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5 col-md-7 d-none d-sm-block right">
                        <div class="row" style="margin-left: -23px;">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="background: rgb(74, 69, 42); height: 3vh; border-left: 7px solid rgb(119, 147, 60);border-bottom: 60px solid transparent;">
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 py-2">
                                        <button class="btn btn-block btn-transparent"><span class="text-yellow" data-toggle="modal" data-target="#modal_signup_user">Outletko login</span></button>
                                    </div>
                                    <div class="col-lg-6 col-md-7 py-2">
                                        <button class="btn btn-block btn-transparent bd-yellow" data-toggle="modal" data-target="#modal_login"><span class="text-white">eOutlet</span><span class="text-gold">Suite</span><span class="text-white"> Login</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12" style="background: linear-gradient(180deg,  white 25%, rgb(87, 107, 45) 0%); min-height: 70vh; height: auto;">
                    
                    <div class="row pt-2">
                      
                      <div class="col-lg-10 col-md-10 col-sm-12 pt-5 pb-3" >
                        
                        <div class="row" style="padding-right: 40px; padding-left: 40px;">
                            
                          <div class="col-lg-3 pr-2" style="height: auto;">
                          
                            <div class="row">
                              
                              <div class="col-lg-12 col-md-12">
                                
                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQafA3tvem0NxnhvaHEECW3otcD5NOuWFnsUBNH0kAGXVyVGRg3" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2' style="bottom: 25%;">
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">
                                    </div>
                                  <div class='div-outlet-title pt-4'>
                                    <div class="row text-center py-2">
                                      
                                      <div class="col-lg-12">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-1">
                                        <span>Check Out  the List of Outlets in Taytay</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>

                              </div>

                              <div class="col-lg-12 col-md-12 mt-3">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="https://s3-media1.fl.yelpcdn.com/bphoto/a8ulD0lHUvWMLJYtGB9Haw/348s.jpg" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2' style="bottom: 40%;">
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">                                  
                                    </div>
                                  <div class='div-outlet-title'>
                                    <div class="row text-center py-2">
                                      
                                      <div class="col-lg-12 pt-2  ">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-2 pb-1">
                                        <span>See Why Shoppers Flock to Greenhills Premium Outlets</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                
                              </div>


                            </div>
                          
                          </div>

                          <div class="col-lg-3 px-2" style="height: auto;">
                          
                            <div class="row">
                              
                              <div class="col-lg-12 col-md-12">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="https://s3-media1.fl.yelpcdn.com/bphoto/ffk90qX2-eDsYTwMJ4zkXQ/ls.jpg" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2'>
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">
                                    </div>
                                  <div class='div-outlet-title pt-4'>
                                    <div class="row text-center py-2">
                                      
                                      <div class="col-lg-12">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-1">
                                        <span>Do You Know Where Your Shoe Outlet Store Is?</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                
                              </div>

                              <div class="col-lg-12 col-md-12 mt-3">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="data:image/jpeg;base64,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" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2'>
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">
                                    </div>
                                  <div class='div-outlet-title pt-4'>
                                    <div class="row text-center pt-1 pb-2">
                                      
                                      <div class="col-lg-12">
                                        <span class="text-red font-weight-600">OUTLETS</span> 
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-1 pb-1">
                                        <span>Save Big at  Riverbank  Premium Outlets  in Marikina</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                
                              </div>

                            </div>
                          
                          </div>

                          <div class="col-lg-3 px-2" style="height: auto;">
                          
                            <div class="row">
                              
                              <div class="col-lg-12 col-md-12">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="https://cdn8.bigcommerce.com/s-ybxns/product_images/uploaded_images/outlet4.png" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2' style="bottom: 25%;">
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">                                  
                                    </div>
                                  <div class='div-outlet-title pt-4'>
                                    <div class="row text-center py-2">
                                      
                                      <div class="col-lg-12">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-1">
                                        <span>Locations of Over Run Outlet Stores</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>

                              </div>

                              <div class="col-lg-12 col-md-12 mt-3">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="https://media-cdn.tripadvisor.com/media/photo-s/16/b9/59/b8/welcome-to-manila-chinatown.jpg" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2' style="bottom: 20%;">
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">
                                    </div>
                                  <div class='div-outlet-title pt-2'>
                                    <div class="row text-center py-2">
                                      
                                      <div class="col-lg-12">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-1">
                                        <span>Find Out Places To Eat In Chinatown </span>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                
                              </div>


                            </div>
                          
                          </div>

                          <div class="col-lg-3 pl-2" style="height: auto;">
                            
                            <div class="row">
                              
                              <div class="col-lg-12 col-md-12">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="https://cdn.shopify.com/s/files/1/0018/9556/3317/products/ODS_MS_1050x.png?v=1529958777" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2' style="bottom: 32%;">
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">
                                    </div>
                                  <div class='div-outlet-title pt-4'>
                                    <div class="row text-center py-3 pb-2">
                                      
                                      <div class="col-lg-12">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-1">
                                        <span>Spa /  Massage Parlors That You Should Check Out</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                
                              </div>

                              <div class="col-lg-12 col-md-12 mt-3">

                                <div class="main">
                                  <div class='div-outlet-img'>
                                    <img src="http://www.wheninmanila.com/wp-content/uploads/2017/02/The-Yard-Underground-1.jpg" class="img-fluid">
                                  </div>
                                    <div class='div-circle rounded-circle pt-2' style="bottom: 40%;">
                                      <img src="<?php echo base_url('assets/img/outlet-icon.png') ?>">
                                    </div>
                                  <div class='div-outlet-title pt-2'>
                                    <div class="row text-center py-3">
                                      
                                      <div class="col-lg-12 pt-2 ">
                                        <span class="text-red font-weight-600">OUTLETS</span>
                                      </div>

                                      <div class="col-lg-9 mx-auto pt-2">
                                        <span>Check Out  the List of Food Parks in Baguio City</span>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                
                              </div>

                            </div>
                          
                          </div>

                        </div>

                      </div>

                      <div class="col-lg-2 col-md-2 col-sm-12" style="background: white; min-height: 70vh; height: auto;border-left: 1px solid rgb(87, 107, 45);">
                          
                        <div class="row py-3">
                          
                          <div class="col-lg-12">
                            <img src="https://c78820e6bdf33554b318-88b83edc83d507c684c65e4b3094e792.ssl.cf1.rackcdn.com/BDO-PIAa.jpg" class="img-fluid">
                          </div>

                          <div class="col-lg-12 mt-2">
                            <img src="https://i.pinimg.com/originals/d0/12/db/d012dbf736caea99d0f3848b86a8e369.jpg" class="img-fluid">
                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
                </div>

                <div class="row" style="">
                  
                  <div class="col-lg-12 col-md-12 col-sm-12" style="background: linear-gradient(180deg,  rgb(87, 107, 45) 48%, white 0%); min-height: 91.5vh; height: 91.5vh;">
                    
                    <div class="row">
                      
                      <div class="col-lg-10 col-md-10" style="min-height: 91.5vh; height: 91.5vh;">
                        
                        <div class="row">
                          
                          <div class="col-lg-11 mx-auto ">
                            
                            <div style="background: url('<?php echo base_url('assets/img/outlet-furniture.png') ?>'); height: 260px; width: 100%; background-size: 100% 100%; background-repeat: no-repeat;" class="mt-1">
                              
                            </div>

                          </div>

                        </div>

                        <div class="row pt-5">
                          
                          <div class="col-lg-11 col-md-11 mx-auto mt-3">
                            
                            <span style="font-size: 18px; font-family: 'Arial';"><span class="font-weight-bold">Latest</span> <span class="text-red">Videos</span> (Featured Outlets)</span>

                            <!-- border: 0.3px solid rgb(206, 237, 140); -->
                            <hr class="my-1" style="border-width: thin; border-color: #ceed8c;">

                            <div class="row mt-4">
                                
                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">

                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sZ0YvqkyzOI" allowfullscreen></iframe>

                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div  class=" py-2 rounded-bottom-75" style="border: 1px solid #ceed8c; color: green;">
                                      <span>AL Book Shop</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0X7TDnRTlic" allowfullscreen></iframe>
                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div  class=" py-2 rounded-bottom-75" style="border: 1px solid #ceed8c; color: green;">
                                      <span>The Flower Shop</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">

                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YleuIFYahoo" allowfullscreen></iframe>
                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div  class=" py-2 rounded-bottom-75" style="border: 1px solid #ceed8c; color: green;">
                                      <span>Freshy Fruits</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-pwDSfqP87c" allowfullscreen></iframe>
                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div  class=" py-2 rounded-bottom-75" style="border: 1px solid #ceed8c; color: green;">
                                      <span>Art Park</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>


                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="col-lg-2 col-md-2" style="background: white;min-height: 91.5vh; height: auto; border-left: 1px solid rgb(87, 107, 45);">
                        
                        <div class="row py-3">
                          
                          <div class="col-lg-12">
                            <img src="https://pldthome.com/images/default-source/news/google-wifi-plans_600px.jpg?sfvrsn=eb147213_0" class="img-fluid">
                          </div>

                          <div class="col-lg-12 mt-3">
                            <img src="https://cf.shopee.ph/file/071146be5d6de9ad5c666ea0619229ce" class="img-fluid">
                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="row" style="">

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    
                    <div class="row"  style="background: white; height: 130vh;">
                      
                      <div class="col-lg-10">

                        <div class="row">
                          
                          <div class="col-lg-11 mx-auto">

                            <div class="row mt-4">
                                
                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">

                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sZ0YvqkyzOI" allowfullscreen></iframe>

                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div class=" py-2 rounded-bottom-75"  style="border: 1px solid #ceed8c; color: green;">
                                      <span>AL Book Shop</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0X7TDnRTlic" allowfullscreen></iframe>
                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div class=" py-2 rounded-bottom-75"  style="border: 1px solid #ceed8c; color: green;">
                                      <span>The Flower Shop</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">

                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YleuIFYahoo" allowfullscreen></iframe>
                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div class=" py-2 rounded-bottom-75"  style="border: 1px solid #ceed8c; color: green;">
                                      <span>Freshy Fruits</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-4by3 rounded-top-75">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-pwDSfqP87c" allowfullscreen></iframe>
                                    </div>

                                  </div>

                                  <div class="col-lg-12 text-center">
                                    <div class=" py-2 rounded-bottom-75" style="border: 1px solid #ceed8c; color: green;">
                                      <span>Art Park</span>                                      
                                    </div>
                                  </div>

                                </div>

                              </div>


                            </div>
                            
                          </div>

                        </div>

                        <div class="row">
                          
                          <div class="col-lg-11 mx-auto py-2">

                            <div class="row my-5">
                                
                              <div class="col-lg-8 col-md-8 mx-auto" style="height: 200px;">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-12" >

                                    <div class="embed-responsive embed-responsive-16by9">

                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sZ0YvqkyzOI" allowfullscreen></iframe>

                                    </div>

                                  </div>

                                </div>

                              </div>

                            </div>
                            
                          </div>

                        </div>

                        
                      </div>

                      <div class="col-lg-2 col-md-2" style="background: white;height: 130vh; border-left: 1px solid rgb(87, 107, 45);">
                        
                        <div class="row py-3">
                          
                          <div class="col-lg-12">
                            <img src="https://pldthome.com/images/default-source/news/google-wifi-plans_600px.jpg?sfvrsn=eb147213_0" class="img-fluid">
                          </div>



                        </div>

                      </div>

                    </div>

                    <div class="row " >
                      
                      <div class="col-lg-10 mr-auto" style="height: 200px; display: block; position: absolute; z-index: 999; top: 60%;">
                        <div class="row">
                          <div class="col-lg-11 mx-auto px-4" >
                            
                            <div class="row px-1">
                              
                              <div class="col-lg-12 py-2" style="background: white; border: 1px solid gray;height: 250px; ">
                                
                                <div class="row">
                                  
                                  <div class="col-lg-4 pr-0">
                                    
                                    <div style="background: url('https://previews.123rf.com/images/stillab/stillab1709/stillab170900053/86689096-men-s-accessories-with-brown-leather-bag-brown-shoes-classic-hat-sunglasses-and-blue-bow-tie-on-wood.jpg'); height: 232px; background-size: 100% 100%;">
                                      
                                    </div>

                                  </div>

                                  <div class="col-lg-6">
                                    
                                    <div class="row" style="margin-top: 118px;">
                                      <div class="col-lg-12">
                                        <h2 class="font-weight-bold">Everyday</h2>
                                      </div>
                                      <div class="col-lg-12 h4" style="line-height: 27px;">
                                        <span style="color: rgb(148, 138, 84);">+A Rating. Over A 1000s of Products</span><br>
                                        <span style="color: rgb(148, 138, 84);">Ready to Ship. Order Online Today</span>
                                      </div>
                                    </div>

                                  </div>

                                  <div class="col-lg-2">
                                    <img src="https://cdn0.iconfinder.com/data/icons/mathematical-symbols-2-colored/640/cc_greaterthan-512.png" style="max-width: 55%; margin-top: 55%;">
                                  </div>

                                </div>

                              </div>

                            </div>

                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row" style="background: rgb(87, 107, 45); height: 45vh;">
                      
                      <div class="col-lg-12 pl-0">
                        
                        <div class="row">
                          
                          <div class="col-lg-6 pl-0" style="margin-top: 16%;">
                            <ul style="list-style: none;" class="text-white">
                              <li>About Us</li>
                              <li>Our Partners</li>
                              <li>Contact Us</li>
                            </ul>
                            
                          </div>

                          <div class="col-lg-6 pr-0" style="margin-top: 16%;">

                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                  <div class="col-lg-6 col-md-2 col-sm-12 text-right pr-0">
                                    <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 70%;'>
                                  </div>
                                  <div class="col-lg-6 col-md-10 col-sm-12 pt-2 pr-5 pl-0" style="line-height: 20px;margin-top: 10px;">
                                    <span class="font-size-55"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-light-gray">.com</span></span><br>   
                                    <span class="text-white mx-auto text-center">@ Copyright <?php echo date("Y"); ?> Outletko</span>                             
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

            </div>
        </div>

    </div>

    <footer class="text-center fixed-bottom bg-white">
        <span style="font-size: 13px;"><a href="<?php echo base_url('/terms') ?>" style='color: rgb(119,147,60)'>Terms</a> | <a href="<?php echo base_url('/privacy') ?>" style="color: rgb(119,147,60)">Privacy</a></span>  
    </footer>
        <input type="hidden" value="<?php echo $this->session->flashdata("log_error") ?>" id="login_error">

  <div class="modal" id="modal_login" style="top: 10%;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header py-2" hidden>
          <div class="container">

            <div class="row">
              <div class="col-lg-12 text-center">
              </div>
            </div>          
 
          </div>
        </div>
        <div class="modal-body">
          <div class="container font-size-18">

            <div class="row pb-5">
              <div class="col-lg-12 text-center">
                <h4 class="modal-title">eOutlet<span class="text-orange">Suite</span></h4>            
              </div>
            </div>          
            
            <div class="row pb-3">
              <div class="col-lg-12 pb-2 text-center">
                <span class="text-gray font-size-20">Login to your account</span>
              </div>
            </div>

            <div class="row" id="error_message">
              <div class="col-lg-12 pb-2 text-center text-red">
                <span class="text-red font-size-16">Invalid Username or Password</span>
              </div>
            </div>

            <div class="row">

              <?php echo form_open('Login/check_login'); ?>

                <div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-2 ">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 pb-1 pt-1 pad-right">
                      <span class="font-size-14">User ID</span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 pb-1 pad-left">
                      <input type="text" class="form-control textbox-green textbox-30 px-2" placeholder="" name="uname" id="uname" required="required">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 pb-1 pt-1 pad-right">
                      <span class="font-size-14">Password </span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 pb-1 pad-left text-right">
                      <input type="password" class="form-control textbox-green textbox-30 px-2" placeholder="" name="pword" id="pword" required="required">
                      <small class="text-red ml-auto">Forgot Password?</small>
                    </div>                  
                  </div>
                  <div class="row pt-4  pb-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-1 ml-auto">
                      <input type="submit" class="btn btn-block btn-green px-0 py-0 textbox-30" name="login" value="Login">
                    </div>                  
                  </div>
                  <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center line-height-20 text-red">
                      <span>Don't share your</span><br>
                      <span>User ID and Password</span>
                    </div>
                  </div>
                </div>

              <?php echo form_close(); ?>

              
            </div>


          </div>
        </div>
        <div class="modal-footer py-2" hidden>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal_signup">
    <div class="modal-dialog" style="max-width: 460px;">
      <div class="modal-content">
        <div class="modal-header py-2" style="background: rgb(195, 214, 155);">
          <div class="container">
            <div class="row">
              <div class="col-lg-2 pr-0">
                <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
              </div>
              <div class="col-lg-10 text-left pl-0">
                <span class="font-size-30"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-white">.com</span></span><br>                                
              </div>
            </div>          
          </div>
        </div>
        <div class="modal-body">
          <input type="hidden" id="singup_id">
          <div class="container font-size-18" id="div-form" >
            
            <div class="row">
              <div class="col-lg-12 pb-2" style="line-height: 25px;">
                <span class="font-size-18" style="font-size: 18px !important;">Create an Outletko Account for your business.</span><br>
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

        </div>
        <div class="modal-footer py-2" id="signup_footer">
          <button type="button" class="btn btn-danger" id="signup_back">Back</button>
          <button type="button" class="btn btn-success" id="signup_next">Next</button>
          <button type="button" class="btn btn-success"  id="signup_save">Save</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="signup_cancel">Cancel</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="signup_close">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal_login_outletko" style="top: 10%;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header py-2" hidden>
          <div class="container">

            <div class="row">
              <div class="col-lg-12 text-center">
              </div>
            </div>          
 
          </div>
        </div>
        <div class="modal-body">
          <div class="container font-size-18">

            <div class="row pb-5">
              <div class="col-lg-12 text-center">
                <h4 class="modal-title">Outlet<span class="text-orange">ko</span></h4>            
              </div>
            </div>          
            
            <div class="row pb-3">
              <div class="col-lg-12 pb-2 text-center">
                <span class="text-gray font-size-20">Login to your account</span>
              </div>
            </div>

            <div class="row" id="error_message" hidden>
              <div class="col-lg-12 pb-2 text-center text-red">
                <span class="text-red font-size-16">Invalid Username or Password</span>
              </div>
            </div>

            <div class="row">

              <?php echo form_open('Login/check_login'); ?>

                <div class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-2 ">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 pb-1 pt-1 pad-right">
                      <span class="font-size-14">Username</span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 pb-1 pad-left">
                      <input type="text" class="form-control textbox-green textbox-30 px-2" placeholder="" name="uname2" id="" required="required">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 pb-1 pt-1 pad-right">
                      <span class="font-size-14">Password </span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 pb-1 pad-left text-right">
                      <input type="password" class="form-control textbox-green textbox-30 px-2" placeholder="" name="pword2" id="" required="required">
                      <small class="text-red ml-auto">Forgot Password?</small>
                    </div>                  
                  </div>
                  <div class="row pt-4  pb-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-1 ml-auto">
                      <input type="submit" class="btn btn-block btn-green px-0 py-0 textbox-30" name="login" value="Login">
                    </div>                  
                  </div>
                  <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center line-height-20 text-red">
                      <span>Don't share your</span><br>
                      <span>Username and Password</span>
                    </div>
                  </div>
                </div>

              <?php echo form_close(); ?>

              
            </div>


          </div>
        </div>
        <div class="modal-footer py-2" hidden>
        </div>
      </div>
    </div>
  </div>

   <div class="modal" id="modal_signup_user">
    <div class="modal-dialog" style="max-width: 460px;">
      <div class="modal-content">
        <div class="modal-header py-2" style="background: rgb(195, 214, 155);">
          <div class="container">
            <div class="row">
              <div class="col-lg-2 pr-0">
                <img src="<?php echo base_url('assets/img/outletko-logo.png') ?>" style='height: 50px;'>
              </div>
              <div class="col-lg-10 text-left pl-0">
                <span class="font-size-30"><span class="text-white">Outlet</span><span class="text-yellow">ko</span><span class="text-white">.com</span></span><br>                                
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
                <small>New member? <a class="cursor-pointer" id="a_register"><u>Register here</u></a> </small>
              </div>
            </div>
                
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <span>Username</span>
                    <input type="text" class="form-control form-control-sm textbox-green" id="login_email">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <span>Password</span>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-sm textbox-green" id="login_password">
                        <div class="input-group-append" style="height: 31px;">
                            <span class="input-group-text show_conf_pass cursor-pointer textbox-green">
                                <i class="fa fa-eye-slash" id="conf_pass_icon"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                    <span class="text-red">Forgot Password?</span>
                </div>
            </div>

          </div>

          <div class="container font-size-18" id="div-signup-form">

            <div class="row">
              <div class="col-lg-12 pb-2" style="line-height: 25px;">
                <span class="font-size-18" style="font-size: 18px !important;">Create your Outletko Account. </span><br>
                <small>Already a member? <a class="cursor-pointer" id="a_login"><u>Login here</u></a> </small>
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

                    <input type="text" class="form-control" id="verify_code">
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


<!-- <input type="hidden" name="<?php echo $this->security->get_csrf_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->

</body>
</html>


