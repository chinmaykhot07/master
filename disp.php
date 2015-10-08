<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="pagination">
	<div id="pagenumber">
		<?php
		echo $no;
		include('config.php');	
		$Number  = $_POST["noofitem"];

		$tbl_name="movies";		
		$adjacents = 3;

		$query = "SELECT COUNT(*) as num FROM $tbl_name";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages[num];

		$targetpage = "master.php"; 

		$limit = 5; 								
		$page = $_GET['page'];
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;								


		$sql =" SELECT * FROM $tbl_name Order by id desc LIMIT $start, $limit";
		$result = mysql_query($sql);


		if ($page == 0) $page = 1;					
		$prev = $page - 1;							
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$lpm1 = $lastpage - 1;						


		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
							//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
			else
				$pagination.= "<span class=\"disabled\">previous</span>";	

			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
								//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
								//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
				}
			}

							//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
			else
				$pagination.= "<span class=\"disabled\">next</span>";
			$pagination.= "</div>\n";		
		}
		?>
		<?=$pagination?>
		</div>
	<div>
		<form method="post" action="master.php"> 
			<select name="noofitem" onchange="changeFunction(this.value)">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
			</select><br><br>
		</form>	
	</div>
</div>

<div id="section">
	<?php
	include('config.php');
	$tbl_name="movies";	
	$limit = 5; 
	$sql =" SELECT * FROM $tbl_name Order by id desc LIMIT $limit ";
	$result = mysql_query($sql);
	$uploadmessage = "return confirm('Data will be updated');";
	$deletemessage = "return confirm('Are u sure to delete');";
	while($row = mysql_fetch_array($result))
	{
		$idrow = $row[0]; 

		echo '<div class="show-image"><img height="213" width="213" src="uploads/'.$row[5].'.jpg "/>';
		echo '<a href="updateform.php?id='.$idrow.'" ><input class="the-buttons" type="button" value="Update" onclick="'.$uploadmessage.'" /></a>';
		echo '<a href="delete.php?id='.$idrow.'"><input class="the-buttons1" type="button" value="Delete" onclick="'.$deletemessage.'"/></a></div>';
	}
	mysql_close($conn);

	?>
					<!--<a href="form.php"><img height="250" width="250" src="images/add.png "/></a>-->

		</div>			
	</div>
</body>
</html>