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


.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
input[type="button"].btn-block, input[type="reset"].btn-block, input[type="submit"].btn-block {
    width: 100%;
}
.btn:focus, .btn:hover {
    text-decoration: none;
}
.btn-orange {
    background: orange;
    color: white;
}
.btn-block {
    display: block;
    width: 100%;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}



    </style>

</head>

<body class="container">



<div class="email-body">

    <header style="margin-top: 10px;">

        <h2 style="margin-top: 10px;"><span style="color: green;">Outlet</span><span style="color: red;">ko</span></h2>        

        <div class="header-right" >

          <h2 class="header-left" style="margin-top: 10px;"><span class="span-suite">eOutlet</span><span class="span-eprocurement">Suite</span></h2>

        </div>

    </header>



    <section style="background: #EDA634;height: 50px;width: 100%;text-align: center;padding: 20px;">

        <h1 style="font-size: 45px;margin-top: 3px;">Welcome to Outletko!</h1>
    </section>



    <section>

        <article class="pb-3" style="padding-left: 70px;">

            <h2 style="color: black;">Congratulations!</h2>

            <p style="font-size: 18px;">You're almost ready to start your business in outletko - but first, click the link below to verify your email address</p>
            <br>
            <p style="padding-right: 37px;font-size: 18px;"><a href="https://www.outletko.com/Store_register/verify?hash=<?php echo $email; ?>&emailid=<?php echo $account_id; ?>" class='btn btn-orange' style="text-decoration: none;color: white;" target="_blank" >Click Here to Verify Email Addresss</a></p>

            <br><br>



        </article>

        



        <article class="pb-3" style="position: fixed; bottom: 100px;width: 79%;padding-left: 70px;">

            <hr style="color: black;">

            <h4 style="margin: 0;">Need Support?</h4>

            <p style="margin-top: 10px;">Feel free to email us if you have any questions, comments or suggestions. We'll be happy resolve all your issues.</p>

        </article>



        

    </section>



    <footer class="font-text-footer">
        <p style="float: right;">Copyright @ <?php echo date('Y')?> Outletko</p>
    </footer>

</div>



</body>

</html>