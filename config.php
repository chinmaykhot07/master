<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$database = "interntest";

$SIGNUP = "responsive.php?page=signup";


	$HOME = "responsive.php?page=home";
	$LOGIN = "responsive.php?page=login";
	$THEATRE = "responsive.php?page=location";
	$SUBSCRIBE ="responsive.php?page=subscribe";
	$ADMIN ="responsive.php?page=admin";
	$ADDMOVIES = "responsive.php?page=form";
	$LOGOUT = "logout.php";
	$SIGNUP = "responsive.php?page=signup";
	$MOVIEDETAILS = "responsive.php?page=moviedetails";


//connection to the database
$conn = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$select = mysql_select_db($database,$conn) 
  or die("Could not select examples");

//echo "database connected";

//close the connection
//mysql_close($conn);
?>