<?php
   $mysql_server = "localhost"; //139.162.29.44
   $mysql_username = "outletk1_dbase";
   $mysql_password = "@outletko123";
   $mysql_database = "outletk1_dbase";
   
   $con=mysqli_connect($mysql_server, $mysql_username , $mysql_password , $mysql_database);

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
      echo "connected successfully";
   }


   mysqli_close($con);
?>