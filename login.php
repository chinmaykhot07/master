<?php
//include('loginverification.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: responsive.php");
}
?>


	<form style="background-color:white" method="POST" action="loginverification.php">
		<table style="background-color:white" align="center">
			<th colspan="2 align="center" ">Enter your Login Details</th>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" placeholder="Enter your email"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Enter your password"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login_btn" value="LOGIN">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<a href="<?php echo $SIGNUP; ?>">Register</a></td>
			</tr>
		</table>
	</form>
