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

      background: #f8f9fa!important;

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

      height: 325px;

    }



    footer{
      text-align: center;
      height: 80px;
/*        height: auto;*/

      /*padding: 10px 10px 10px 10px;*/

      padding-left: 20px;

      padding-right: 20px;

      padding-top: 5px;

/*      background: #45914E;

      color: white;*/
      background: #EDEDED;

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

        <h2 class="header-left" style="margin-top: 10px;font-weight: normal;"><span style="color: green;">Outlet</span><span style="color: #ffae42;">ko</span><span style="color: green;">.com</span></h2>

    </header>



    <section style="background: rgb(119, 147, 60);height: 50px;width: 100%;text-align: center;padding: 20px;">

        <h1 style="font-size: 45px;margin-top: 3px;">Welcome to eOutlet<span style="color: yellow;">Suite</span>!</h1>
    </section>



    <section>

        <article class="pb-3" style="padding-left: 70px;">


            <h2 style="color: black;">Hi <?php echo $first_name; ?>,</h2>

            <h3 style="color: black;">Thank you very much for creating an eOutletSuite account.</h3>

            <p style="font-size: 18px;">Get started by logging into your eOutletSuite account at <a href="https://www.outletko.com" target="_blank">www.outletko.com</a></p>

            <br><br>

            <div class="row col-12">

                <p style="padding-right: 37px;"><b>Your User ID is:</b>  <?php echo $account_id; ?></p>

                <p></p>

            </div>



            <div class="row col-12">

                <p style="padding-right: 20px;"><b>Your Password is:</b>  <?php echo $password; ?></p>

            </div>

            <div class="row col-12" style="margin-top: 30px;">
                <p>Thank You!</p>
            </div>

        </article>

        



<!--         <article class="pb-3" style="position: fixed; bottom: 100px;width: 79%;padding-left: 70px;">

            <hr style="color: black;">

            <h4 style="margin: 0;">Need Support?</h4>

            <p style="margin-top: 10px;">Feel free to email us if you have any questions, comments or suggestions. We'll be happy resolve all your issues.</p>

        </article> -->



        

    </section>



    <footer class="font-text-footer">
        <span  style="font-weight: normal;font-size: 30px;"><span style="color: green;">Outlet</span><span style="color: #ffae42;">ko</span><span style="color: green;">.com</span></span><br>
        <p>@ 2019 Zugriff Corporation</p>
    </footer>

</div>



</body>

</html>