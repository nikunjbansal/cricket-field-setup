<?php
if(!isset($_SESSION))
{?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sign-In</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body id="body-color">
	<div id="Sign-In" style="float:left;margin:13%">
		<fieldset style="width:30%"><legend>LOG-IN HERE</legend>
		<form method="POST" action="login.php">
		UserName <br><input type="text" name="user" size="40"><br>
		Password <br><input type="password" name="pass" size="40"><br>
		<input id="button" type="submit" name="submit" value="Log-In">
		</form>
		</fieldset>
	</div>
	<div id="Sign-Up" style="float:left;margin:13%">
		<fieldset style="width:30%"><legend>SIGN-UP HERE</legend>
		<form method="POST" action="signup.php">
		UserName <br><input type="text" name="user" size="40"><br>
		Password <br><input type="password" name="pass" size="40"><br>
		<input id="button" type="submit" name="submit" value="SIGN-UP">
		</form>
		</fieldset>
	</div>
	
</body>
</html> 
<?php
} 
else 
{ 
	header("location: home.php");
}
?>