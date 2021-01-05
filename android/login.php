<?php 
// require "conn.php";
$mysql_server = "localhost"; //139.162.29.44
$mysql_username = "outletk1_admin";
$mysql_password = "@outletko123";
$mysql_database = "outletk1_dbase";

$conn=mysqli_connect($mysql_server, $mysql_username , $mysql_password , $mysql_database);

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
      echo "connected successfully";
   }


$username = $_GET['username'];
$password = $_GET['password'];

echo "\n username :" . $username."\n";
echo "password : " . $password."\n";

if (!empty($username) && !empty($password)){

    echo "\n Not Empty";
    echo "\n SELECT * FROM eoutletsuite_users WHERE username = '".$username."'";    

	$mysql_query = "SELECT * FROM eoutletsuite_users WHERE username = '".$username."'";
	$result = mysql_query($mysql_query);
    
    echo $result;

	if (mysqli_num_rows($result > 0)){
	    $row = mysql_fetch_assoc($result);
	    $name = $row['username'];
	    echo "Login Success!!!, Welcome User";
	}else{
	    echo "Login not success";
	}
	mysqli_close($con);

}else{
	echo "\nempty";
}




?>