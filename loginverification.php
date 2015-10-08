<?php
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("interntest",$conn);
$result = mysql_query("SELECT * FROM user WHERE email='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["fname"] = $row[fname];
$_SESSION["lname"] = $row[lname];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["fname"])) {
header("Location:responsive.php?page=home");
}
?>