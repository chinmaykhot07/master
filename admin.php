<html>
<head>
	<title>Home</title>	
</head>
<body>
	<h1>ADMIN Panel</h1>
	<p>All changes can be done nly by Admin</p>

	

	<div id="box">
		<div class="box-top">Pagination</div>
		<div class="box-panel">
			<?php
			include("config.php");
			$sql =" SELECT * FROM movies Order by id desc ";
			$uploadmessage = "return confirm('Data will be updated');";
			$deletemessage = "return confirm('Are u sure to delete');";
			$result = mysql_query($sql);			
			while($row = mysql_fetch_array($result))
			{
				$idrow = $row[0]; 

				echo '<div class="show-image"><img height="213" width="207" src="uploads/'.$row[5].'.jpg "/>';
				echo '<a href="updateform.php?id='.$idrow.'" ><input class="update_button" type="button" value="Update" onclick="'.$uploadmessage.'" /></a>';
				echo '<a href="delete.php?id='.$idrow.'"><input class="delete_button" type="button" value="Delete" onclick="'.$deletemessage.'"/></a></div>';
			}
			mysql_close($conn);  
			?>
		</div>				
	</div>


	<script type="text/javascript">
	var Image = <? echo json_encode($image); ?>;	
	var Image_Number = 0;
	var Image_Length = 4;

	function change_image(num) {
		Image_Number = Image_Number + num;
		if(Image_Number > Image_Length) {
			Image_Number = 0;
		}
		if(Image_Number < 0) {
			Image_Number = Image_Length;
		}
		document.slideshow.src= 'uploads/' + Image[Image_Number] + '.jpg';
		return false;
	}	
	setInterval("change_image(1)",3000);	
	</script>
</body>
</html>