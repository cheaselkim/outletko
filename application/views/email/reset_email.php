
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/email.css') ?>"> -->







<!DOCTYPE html>

<html>

<head>

    <title>eOutletSuite</title>

    <style type="text/css">

    body{

      background: gray;

      font-family: Arial;

    }

    .email-body{

      width: 60%;

      margin: auto;

/*      padding-left: 250px;*/

    }



    header{

      height: 40px;

      width: 100%;

/*      border: 1px solid gray;*/

/*      background: #45914E;*/

      /* background: #f8f9fa!important; */
      background : rgb(79, 98, 40);

      padding-left: 20px;

      padding-right: 20px;

    }



    h2{

      font-family: Arial;

      color: white;

    }



    h1{

      color: white; 

    }    



/*    nav{

      background: #EDA634;

      height: 150px;

      width: 100%;

      text-align: center;

      padding: 20px;

    }*/



    p{

      padding: 0px;

      margin: 0px;

      line-height: 20px;

      font-size: 15px;

    }



    .font-text-footer{

      font-size: 13px !important;

    }



    section{

      background: #EDEDED;

      padding: 20px;

      width: 100%;

      height: 375px;

    }



    footer{

      height: 30px;

      /*padding: 10px 10px 10px 10px;*/

      padding-left: 20px;

      padding-right: 20px;

      padding-top: 5px;

      background: #45914E;

      color: white;

      width: 100%;

    }        

 

     .span-eprocurement{

        color: orange;

    }



    .span-suite{

        color:green;

    }



    .header-right {

      float: right;

    }



    .header-left {

      float: left;

      color: black;

      text-align: center;

      text-decoration: none;

    }





    </style>

</head>

<body class="container">



<div class="email-body">

    <header style="margin-top: 10px;">
    
        <h2 class="header-left" style="margin-top: 10px;"><span style="color: white;">Outlet</span><span style="color: yellow;">ko</span></h2>        

        <div class="header-right" >

            <h2 style="margin-top: 10px;"><span style="color: white;">Outletko</span><span class="span-eprocurement">Suite</span></h2>

        </div>

    </header>



    <section style="background: #EDA634;height: 50px;width: 100%;text-align: center;padding: 20px;">
        <h1 style="font-size: 45px;margin-top: 3px;">Password Reset Request!</h1>
    </section>

    <section>

        <article class="" style="padding-left: 70px;">

            <h2 style="color: black;margin-bottom: 0;text-transform: capitalize;">Hi  <?php echo $firstname; ?>! </h2>
            <p style="font-size: 18px">You sent us a request to reset your password therefore we create a temporary password for your site. </p>
            <small style="font-size: 15px;">Please see below details: </small>
            <br><br>
            <p style="font-size: 18px;">Get started by logging into your Outletko account at </p>
            <p style="padding-right: 37px;font-size: 18px;"><a href="https://www.outletko.com" target="_blank">https://www.outletko.com</a></p>

            <div class="row col-12" style="margin-top: 20px;">
                <p style="padding-right: 37px;"><b>Temporary Password:</b>  <?php echo $password; ?></p>
            </div>

        </article>

        



        <article class="pb-3" style="position: fixed; bottom: 100px;width: 79%;padding-left: 70px;">

            <hr style="color: black;">

            <h4 style="margin: 0;">Need Support?</h4>

            <p style="margin-top: 10px;">Feel free to email us if you have any questions, comments or suggestions. We'll be happy resolve all your issues.</p>

        </article>



        

    </section>



    <footer class="font-text-footer">
        <p style="float: right;">Copyright @ 2019 Outletko</p>
    </footer>

</div>



</body>

</html>