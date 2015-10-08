<!DOCTYPE html>
<html>
	<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  </head>
	<body>

		<form method="POST" action="update.php" enctype="multipart/form-data">
			Add IMAGES<br><br>
			Name: <input type="text" name="name" value=""><br><br>
			Genre: <select name="genre">
							<option value="comedy">Comedy</option>
							<option value="action">Action</option>
							<option value="thriller">Thriller</option>
							<option value="romance">Romantic</option>
							<option value="horror">Horror</option>	
				   </select><br><br>
			Rating: <input type="radio" name="rating" value="1">1
			<input type="radio" name="rating" value="2">2
			<input type="radio" name="rating" value="3">3
			<input type="radio" name="rating" value="4">4
			<input type="radio" name="rating" value="5">5
			<br><br>
			Year: <input type="text" name="year" value=""><br><br>
			Image : <input type="file" name="imageUpload" ><br><br>
			<input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
			<input type="submit" name="update" value="UPDATE"   >
		</form>

	</body>
</html>