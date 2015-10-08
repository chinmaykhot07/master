<?php

include("config.php");
require("../master/sendgrid-php/sendgrid-php.php");
$sendgrid = new SendGrid('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');


$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
$Gender = $_POST['gender'];
$DOB = $_POST['dateofbirth'];
$Country = $_POST['country'];
$Postal = $_POST['zip'];
$Email1 = $_POST['mail'];
$Pass = $_POST['password'];
$Cpass = $_POST['cpassword'];


echo $Pass;
if (isset($_POST['signup_btn'])) 
{
	if($Pass === $Cpass){	
		
		$insert = "INSERT INTO user (fname,lname,gender,dob,country,zipcode,email,password) VALUES ('$Firstname','$Lastname','$Gender','$DOB','$Country','$Postal','$Email1','$Pass')";

		$data = mysql_query ($insert)or die(mysql_error());
		if($data) {
			echo '<script language="javascript">';
  			echo 'alert(OUR REGISTRATION IS COMPLETED...)';  //not showing an alert box.
  			echo '</script>'; 
			//echo "YOUR REGISTRATION IS COMPLETED..."; 
		}
		$email = new SendGrid\Email();
		$email
		    ->addTo($Email1)
		    ->setFrom('subscribeinfo@movies.sj')
		    ->setSubject('Registration Successfull')
		    ->setText('Welcome.!!')
		    ->setHtml('<strong>Welcome to the world of ENTERTAINMENT !</strong>')
		;
		$sendgrid->send($email);
		header('Location:'.$LOGIN);
	}
	else
	{
		header('Location:'.$SIGNUP);

	}
	/*

	if (mysql_query($insert)) {
           echo "New record created successfully";
    } else {
           echo "Error: " . $insert . "<br>" . mysql_error();
    }*/
 

}

?>