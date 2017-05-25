<?php

require 'db.php';


function SignIn($db)
{
	$ID = $_POST['user'];
	$Password = $_POST['pass'];
	session_start();   //starting the session for user profile page
	if(!empty($ID))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		$query = "SELECT *  FROM bowler where name = '$ID' AND password = '$Password'";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		if(!empty($row['name']) AND !empty($row['password']))
		{
			$_SESSION['name'] = $row['name'];
			header("location: home.php");
		}
		else
		{
			echo "Wrong Credentials.";
		}
	}
}

if(isset($_POST['submit']))
{
	$db = new database();
	SignIn($db);
}

?>