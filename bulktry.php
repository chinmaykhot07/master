<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<style type="text/css">
body {
	background: #E3F4FC;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #2b2b2b;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
a:hover {
	color:#CC0033;
}

h1 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #CC0033;
}
h2 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #898989;
}
#bulkuploadcontainer {
	background: #CCC;
	margin: 100px auto;
	width: 945px;
}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
</head>
<body>
<div id="bulkuploadcontainer">
<div id="form">

<?php
include("config.php");
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['filename']['tmp_name']);
	}
	$result = "SELECT * from test";
	mysql_query($result);
	$count = mysql_num_rows(mysql_query($result));
	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
	{
		if($data[0] > $count)
		{
			$import="INSERT into test(name,gender) values('$data[1]','$data[2]')";
			mysql_query($import) or die(mysql_error());
		}
		else
		{
			$import="UPDATE test SET name='$data[1]' ,gender='$data[2]' WHERE id='$data[0]'";
			mysql_query($import) or die(mysql_error());
		}		
	}
	fclose($handle);
	print "Import done";	
}else {
	print "Upload new csv by browsing to file and clicking on Upload<br />\n";
	print "<form enctype='multipart/form-data' action='bulktry.php' method='post'>";
	print "File name to import:<br />\n";
	print "<input size='50' type='file' name='filename'><br />\n";
	print "<input type='submit' name='submit' value='Upload'></form>";
}
?>
</div>
</div>
</body>
</html>
