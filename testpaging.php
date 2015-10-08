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
	$perPage = 5;
}

$lastPage = ceil($count/$perPage);

if($page < 1) {
	$page =  $lastPage ;
}elseif ($page > $lastPage) {
	$page = 1;
}

$limit = ($page-1)*$perPage.",$perPage";

$query = mysql_query("SELECT * FROM movies ORDER BY id DESC LIMIT $limit");

if($lastPage !=1) {

	if($page != 1) {
		$prev = $page -1;
		$pagination .='<a href="'.$HOME.'&page='.$prev.'&perpage='.$perPage.'">Previous</a>';	
	}

	if($page != $lastPage) {
		$next = $page +1;
		$pagination .='<a href="'.$HOME.'?page='.$next.'&perpage='.$perPage.'">Next</a>';
	}	
}

while($row = mysql_fetch_array($query)){

	$idrow = $row[0]; 

	echo '<a href="'.$MOVIEDETAILS.'&id='.$row[5] .'"><img height="213" width="207" src="uploads/'.$row[5].'.jpg "/></a>';
	
}

?>