
	<?php
	include("config.php");
	$sql = "SELECT name FROM country";
	$result = mysql_query($sql);
	?>
	<form method="POST" action="signupdetails.php">
		<table style="background-color:white" align="center">
			<th colspan="2 align="center" ">Enter your Login Details</th>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Firstname</td>
				<td><input type="text" name="firstname"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Lastname</td>
				<td><input type="text" name="lastname"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="radio" name="gender" value="Male">Male
			<input type="radio" name="gender" value="Female">Female</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>D.O.B.</td>
				<td><input type="date" name="dateofbirth"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Country</td>
				<td><?php 
				echo "<select name='country'>";
				while ($row = mysql_fetch_array($result)) {
				    echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";
				    }
				    echo "</select>"; ?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Zip/Postal code</td>
				<td><input type="text" minlength="4" maxlength="6" name="zip"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="mail"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" minlength="8" name="password"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Confirm password</td>
				<td><input type="password" minlength="8" name="cpassword"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="signup_btn" value="SIGN-UP"></td>
			</tr>
		</table>
	</form>
