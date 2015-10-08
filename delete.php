<?php
	include ("config.php");
	$del = $_GET['id'];
	$qry="DELETE from movies where id = $del";
	$result=mysql_query($qry,$conn);
	header('Location:'. $HOME);
?>