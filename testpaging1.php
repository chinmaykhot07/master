<?php
include("config.php");
$count_query = mysql_query("SELECT NULL FROM movies");
$count = mysql_num_rows($count_query);

if(isset($_GET['page'])) {
	$page = preg_replace("#[^0-9]#","",$_GET['page']);
}
else
{
	$page =1;
}

if(isset($_GET['perpage'])) {
	$perPage = preg_replace("#[^0-9]#","",$_GET['perpage']);
}
else
{
	$perPage = 5 ;
}

if(isset($_GET['order'])) {
	$order = mysql_real_escape_string($_GET['order']);
}
else
{
	$order = "ORDER BY id DESC" ;
} 

$lastPage = ceil($count/$perPage);

if($page < 1) {
	$page =  $lastPage ;
}elseif ($page > $lastPage) {
	$page = 1;
}

$limit = ($page-1)*$perPage.",$perPage";

$query = mysql_query("SELECT * FROM movies $order LIMIT $limit");

if($lastPage !=1) {

	if($page != 1) {
		$prev = $page -1;
		$pagination .='<a href="testpaging1.php?page='.$prev.'&perpage='.$perPage.'&order='.$order.'">Previous</a>';	
	}

	if($page != $lastPage) {
		$next = $page +1;
		$pagination .='<a href="testpaging1.php?page='.$next.'&perpage='.$perPage.'&order='.$order.'">Next</a>';
	}	
}

while($row = mysql_fetch_array($query)){

	$idrow = $row[0]; 

	echo '<img height="213" width="207" src="uploads/'.$row[5].'.jpg "/>';
	
}

?>
<html>
<head>
	<title>Pagination</title>
</head>
<body>


<?php echo $output;?>
</br>
<?php echo $pagination; ?>

<form action="testpaging1.php" method="get">
	<input type="hidden" name="page" value="<?php echo $page;?>">
	<input type="hidden" name="order" value= "<?php echo $order;?>" >
	<select name="perpage">
		<option value="5">5 Items by default</option>
		<option value="3">3</option>
		<option value="10">10</option>
		<option value="15">15</option>
		<option value="20">20</option>		
	</select>	
	<input type="submit" value="make changes">
</form>

<form action="testpaging1.php" method="get">
	<input type="hidden" name="page" value="<?php echo $page;?>">
	<input type="hidden" name="perpage" value="<?php echo $perPage;?>">
	<select name="order">
		<option value="">Choose an order</option>
		<option value="ORDER BY id DESC">By ID</option>
		<option value="ORDER BY name ASC">By Name</option>			
	</select>	
	<input type="submit" value="make changes">
</form>
</body>
</html>