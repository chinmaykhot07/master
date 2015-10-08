<?php 
include ("config.php");
//$updateid = $_POST['id'];
$name = $_POST['name'];
$rating = $_POST['rating'];
$genre = $_POST['genre'];
$year =$_POST['year'];
//$image;
//echo $id;

if(isset($_POST['update']))
{
        
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable
    //echo $image."<br/>";
    //echo $name."<br/>";
    //echo $year."<br/>";
    //echo $genre."<br/>";
    //echo $rating."<br/>";
    $insert = "UPDATE movies SET name ='$name' ,year='$year' ,genre='$genre',rating='$rating', image='$image' WHERE id= '$updateid' ";
    if (mysql_query($insert)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert . "<br>" . mysql_error();
    }

}
header('Location: master.php?page=disp');
echo basename( $_FILES["imageUpload"]["name"],".jpg");

?>
































   <!-- UPDATE movies SET name='$name' ,year='$year' ,genre='$genre',rating='$rating' image='$image' WHERE id=$updateid " ;