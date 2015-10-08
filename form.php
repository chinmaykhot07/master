<!DOCTYPE html>
<html>
	<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	<div id="addform">

		<form method="post" action="add.php" enctype="multipart/form-data">
			<table style="background-color:white"  align="center">
				<th colspan="2" align="center">
					Add Movie Details
				</th>
				<tr>
					<td>Name :</td>
					<td><input type="text" name="name" value=""><br><br></td>
				</tr>
				<tr>
					<td>Genre :</td>
					<td><select name="genre">
						<option value="comedy">Comedy</option>
						<option value="action">Action</option>
						<option value="thriller">Thriller</option>
						<option value="romance">Romantic</option>
						<option value="horror">Horror</option>	
				   </select></td>
				</tr>
				<tr>
					<td>Rating :</td>
					<td><input type="radio" name="rating" value="1">1
			<input type="radio" name="rating" value="2">2
			<input type="radio" name="rating" value="3">3
			<input type="radio" name="rating" value="4">4
			<input type="radio" name="rating" value="5">5</td>
				</tr>
				<tr>
					<td>Year :</td>
					<td><input type="text" name="year" value=""></td>
				</tr>
				<tr>
					<td>Image :</td>
					<td><input type="file" name="imageUpload" ></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><img src="captcha2.php" /></td>
				</tr>
				<tr>
					<td>Enter Image Text</td>
					<td><input name="captcha" type="text"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input name="submit" type="submit" value="Submit" onclick="add.php"></td>
				</tr>
			</table>
		</form>	
	</div>
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
			$result = "SELECT * from movies";
			mysql_query($result);
			$count = mysql_num_rows(mysql_query($result));
			//Import uploaded file to Database
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			{
				if($data[0] > $count)
				{
					$import="INSERT into movies(name,year,genre,rating,image) values('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
					mysql_query($import) or die(mysql_error());
				}
				else
				{
					$import="UPDATE test SET name='$data[1]' ,year='$data[2]' ,genre='$data[3]' ,rating='$data[4]' ,image='$data[5]' WHERE id='$data[0]'";
					mysql_query($import) or die(mysql_error());
				}		
			}
			fclose($handle);
			print "Import done";	
		}else {
			print "Upload new csv by browsing to file and clicking on Upload<br />\n";
			print "<form enctype='multipart/form-data' action='form.php' method='post'>";
			print "File name to import:<br />\n";
			print "<input size='50' type='file' name='filename'><br />\n";
			print "<input type='submit' name='submit' value='Upload'></form>";
		}
		?>
		</div>
	</div>			
	</body>
</html>