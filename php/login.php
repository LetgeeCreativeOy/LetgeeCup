<?php
	$message = "";

	mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" ) or die (mysql_error());
	mysql_select_db ("letgeewa_letgeecup") or die (mysql_error());

	$username = mysql_real_escape_string(htmlspecialchars($_POST['loguser']));
	$adminlist = mysql_query ( "SELECT `salt` FROM `admins` WHERE `username` = '$username'" ) or die (mysql_error());


	if($row = mysql_fetch_array($adminlist)) 
	{
		$salt = $row["salt"];
		$hashpass = hash("sha256", $salt . $_POST['logpass']);

		$result = mysql_query ( "SELECT * FROM `admins` WHERE `password` = '$hashpass'" );
		$rows = mysql_num_rows($result);

		if(!($rows == 0)) 
		{

			$message = "Login Succesful";

			$_SESSION["status"] = 1;

		} else 
		{
			$message = "Wrong password";
		}


	} else
	{
		$message = "No such username";
	}
	
	function getscorejs()
	{

		echo "<script type='text/javascript'>getscore();</script>";

	}




?>
