<?php
	
	session_start();

	if($_SESSION["status"] == 1) {
	mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" ) or die (mysql_error());
	mysql_select_db ("letgeewa_letgeecup") or die (mysql_error());

	$result = mysql_query ( "SELECT * FROM `tulokset` ORDER BY `id` DESC" ) or die (mysql_error());
	$userlist = mysql_query ("SELECT * FROM `users`") or die (mysql_error());

	echo "<div class='entry'>";
	echo "<table>";
	while ( ($row = mysql_fetch_array($result)) )
	{
		$user1 = mysql_query ("SELECT `username` FROM `users` WHERE `id` = '$row[user_1_id]'") or die (mysql_error());
		$user2 = mysql_query ("SELECT `username` FROM `users` WHERE `id` = '$row[user_2_id]'") or die (mysql_error());

		$user1 = mysql_fetch_assoc($user1);
		$user2 = mysql_fetch_assoc($user2);
		
		echo "<tr><td><div class='title inline'>";
			echo $user1['username'];
		echo "</div></td>";
		
		echo "<td><div class='title inline'>";
			echo $row['user_1_goals'];
		echo "</div></td>";
		
		echo "<td><div class='title inline'>";
			echo "-";
		echo "</div></td>";
		
		echo "<td><div class='title inline'>";
			echo $row['user_2_goals'];
		echo "</div></td>";
		
		echo "<td><div class='title inline'>";
			echo $user2['username'];
		echo "</div><br/></td></tr>";
		
		//edit
		echo "<form action='php/matchupdate.php'>";

			echo "<tr class='matchinput'><td><div class='title inline'>";
				echo "<select name='user1'>";
					while ($row2 = mysql_fetch_array($userlist)) 
					{
						//foreach ($variable as $key => $value) 
						//{
							echo "<option value'".$row2['id']."'>".$row2['username']."</option>";
						//}
					}
				echo "</select>";
			echo "</div></td>";
			
			echo "<td><div class='title inline'>";
				echo "<input class='numberinput' type='number' name='goals1'>";
			echo "</div></td>";
			
			echo "<td><div class='title inline'>";
				echo "-";
			echo "</div></td>";
			
			echo "<td><div class='title inline'>";
				echo "<input class='numberinput' type='number' name='goals2'>";
			echo "</div></td>";
			
			echo "<td><div class='title inline'>";
				echo "<select name='user2'>";
					while ($row2 = mysql_fetch_array($userlist)) 
					{
						//foreach ($variable as $key => $value) 
						//{
							echo "<option value'".$row2['id']."'>".$row2['username']."</option>";
						//}
					}
				echo "</select>";
			echo "</div><br/></td></tr>";
			
			echo "<input type='hidden' name='matchid' value='".$row["id"]."'>";
			echo "<input class='button' id='submit' type='submit' name='match_update' value='Update' />";

		echo "</form>";

	}
	echo "<form action='php/matchupdate.php' method='POST'>";

		echo "<div id='matchcreate'><input class='.submitbutton' type='submit' name='match_create' value='Create new Match'></div>";

	echo "</form>";


	echo "</table>";
	echo "</div>";

	mysql_close () or die (mysql_error());
	}
?>
