<?php
	
	

	if (isset($_POST["match_update"]))
	{

		mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" );
		mysql_select_db ("letgeewa_letgeecup")

		$user1 = mysql_real_escape_string(htmlspecialchars($_POST['user1']));
		$user2 = mysql_real_escape_string(htmlspecialchars($_POST['user2']));
		$goals1 = mysql_real_escape_string(htmlspecialchars($_POST['goals1']));
		$goals2 = mysql_real_escape_string(htmlspecialchars($_POST['goals2']));
		$id = mysql_real_escape_string(htmlspecialchars($_POST['matchid']));

		mysql_query ("UPDATE `tulokset` 
			SET `user_1_id` = '$user1', `user_2_id` = '$user2', `user_1_goals` = '$goals1', `user_2_goals` = '$goals2' 
			WHERE `id` = '$id' ") or die (mysql_error());

		mysql_close ();

	}

	if (isset($_POST["match_create"]))
	{

		mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" );
		mysql_select_db ("letgeewa_letgeecup");

		mysql_query ( "INSERT INTO `tulokset` VALUES ('','','','','')" );
		
		mysql_close ();

	}



?>