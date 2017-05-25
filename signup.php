<?php

require 'db.php';


function SignUp($db)
{
	$ID = $_POST['user'];
	$Password = $_POST['pass'];
	session_start();   //starting the session for user profile page
	if(!empty($ID))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		$query = "SELECT *  FROM bowler where name = '$ID'";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		if(!empty($row['name']))
		{
			echo "This UserName already exists..";
			$_SESSION['name'] = $row['name'];
			echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
		}
		else
		{
			$query = "INSERT INTO bowler(name,password) VALUES('$ID','$Password')";
			if($db->update($query))
			{
				$_SESSION['name'] = $ID;
				header("location: home.php");
			}
			else
				echo "Error Occured. Try again later.";
		}
	}
}

if(isset($_POST['submit']))
{
	$db = new database();
	SignUp($db);
}

?>