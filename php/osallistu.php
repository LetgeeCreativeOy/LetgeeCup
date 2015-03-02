<?php
	$message = "";

	$username_value = "";
	$firstname_value = "";
	$lastname_value = "";
	$email_value = "";
	$team_value = "";

	if ( isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['team']) )
	{
		if ( !empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['team']) )
		{
			mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" );
			mysql_select_db ("letgeewa_letgeecup");

			$username_value = $_POST['username'];
			$firstname_value = $_POST['firstname'];
			$lastname_value = $_POST['lastname'];
			$email_value = $_POST['email'];
			$team_value = $_POST['team'];
		
			$username 	= mysql_real_escape_string(htmlspecialchars($_POST['username']));
			$firstname 	= mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
			$lastname 	= mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
			$email 		= mysql_real_escape_string(htmlspecialchars($_POST['email']));	
			$team		= mysql_real_escape_string(htmlspecialchars($_POST['team']));	



			$rows = mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE `username` = '$username'"));

			if ( $rows == 0 )
			{
				$rows = mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE `email` = '$email'"));

				if ( $rows == 0 )
				{
					mysql_query ( "INSERT INTO `users` VALUES ('', '$username', '$firstname', '$lastname', '$email', '$team')" );

					$username_value = "";
					$firstname_value = "";
					$lastname_value = "";
					$email_value = "";
					$team_value = "";

					$message = "<p class='success'>Osallistuminen suoritettu!</p>";
				}
				else
				{
					$message = "<p class='error'>Sähköposti on jo käytössä!</p>";
				}
			}

			else
			{
				$message = "<p class='error'>Käyttäjänimi on jo käytössä!</p>";
			}
			

			

			mysql_close ();
		}

		else
		{
			$message = "<p class='error'>Täytä kaikki kentät!</p>";
		}
	}

	else
	{
		$message = "<p class='error'>Täytä kaikki kentät!</p>";
	}
?>