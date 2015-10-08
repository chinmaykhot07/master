	<h1>LATEST RELEASE</h1>
	<p>The new movies are shown first</p>

	<div id="box">
		<div class="box-top">Showbiz News</div>
		<div class="box-panel">
			<?php
			include("config.php");
			$sql =" SELECT * FROM movies Order by id desc ";
			$result1 = mysql_query($sql);
			$image = array ();
				
			while($row = mysql_fetch_array($result1))
			{		
				array_push($image,$row[5]);		
			}				 
			?>
			<img height="213" width="75%" src="uploads/<?php echo  $image[0] ?>.jpg " name="slideshow" /> 
			<table align="center">
				<tr>
					<td align="left"><a href="javascript:change_image(-1) ">Previous</a></td>
					<td align="right"><a href="javascript:change_image(1)">Next</a></td>		
				</tr>
			</table>
		</div>				
	</div>

	<div id="box">
		<div class="box-top">Pagination</div>
		<div class="box-panel">
			<?php	

			include("testpaging.php");
			echo "</br>";
			echo $pagination ;				
			
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
	setInterval("change_image(1)",8000);	
	</script>
