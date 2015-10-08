<?php 
session_start();
include ("config.php");
    //$id = $_POST['id'];
$name = $_POST['name'];
$rating = $_POST['rating'];
$genre = $_POST['genre'];
$year =$_POST['year'];
echo $id;

if(isset($_POST['submit']))
{
    if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
    {
        echo "Correct Code Entered";
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
        $insert = "INSERT INTO movies (name,year,genre,rating,image) VALUES ('$name','$year','$genre','$rating','$image')";
        if (mysql_query($insert)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert . "<br>" . mysql_error();
        }
        
        header('Location: '. $HOME);
    }
    else
    {
        die("Wrong Code Entered");
        header('Location: '. $LOGIN);
    }
}
//
echo basename( $_FILES["imageUpload"]["name"],".jpg");

?>

