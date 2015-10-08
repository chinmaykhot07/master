<div id="subscribe_box">
<?php 
include("config.php");
require("../master/sendgrid-php/sendgrid-php.php");
$sendgrid = new SendGrid('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');
if($_SESSION["fname"]) {

	$firstName = $_SESSION["fname"];
}
$getname = mysql_query("SELECT email from user where fname='$firstName' ");
$row = mysql_fetch_row($getname);
$emailreq = $row[0];






	if (isset($_POST['subscribe_submit'])) 
	{
		$Email2	= $_POST['subscribe_txt'];
		$insert = "INSERT INTO subscribelist (email) VALUES ('$Email2')";		

		$data = mysql_query ($insert)or die(mysql_error());		
		
		$email = new SendGrid\Email();
		$email
		    ->addTo($Email2)
		    ->setFrom('subscribeinfo@movies.sj')
		    ->setSubject('Registration Successfull')
		    ->setText('Welcome.!!')
		    ->setHtml('<strong>You have subscribed for the Newletter and latest happening in Entertainment WORLD !</strong>')
		;
		$sendgrid->send($email);		
	}	
?>



<h2>Stay Connected with Latest NEWS in Movies</h2>
<h5>Subscribe now to get updates of latest happenings in the Emtertainment World</h5><br><br>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=subscribe" method="POST" >
	<input type="text" name="subscribe_txt" placeholder="Enter your Email HERE.." value="<?php echo $emailreq ?>">
<input type="submit" name="subscribe_submit" value="Subscribe">	
</form>


</div>

