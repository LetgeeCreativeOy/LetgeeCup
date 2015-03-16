<?php

	mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" ) or die (mysql_error());
	mysql_select_db ("letgeewa_letgeecup") or die (mysql_error());

	$result = mysql_query ( "SELECT * FROM `tulokset` ORDER BY `id` DESC" ) or die (mysql_error());

	$rows = mysql_num_rows($result);

	echo "<div class='entry'>";
	
	if ( $rows != 0 )
	{
		echo "<table>";
		$i = 0;
		while(($row = mysql_fetch_array($result)))
		{
			
			if($i == 0)
			{
				echo "<tr>";
			}

			$user1 = mysql_query ("SELECT `username` FROM `users` WHERE `id` = '$row[user_1_id]'") or die (mysql_error());
			$user2 = mysql_query ("SELECT `username` FROM `users` WHERE `id` = '$row[user_2_id]'") or die (mysql_error());

			$user1 = mysql_fetch_assoc($user1);
			$user2 = mysql_fetch_assoc($user2);

			echo "<td><div class='title inline'>";
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
			echo "</div><br/></td>";

			if ($i == 1) 
			{
				echo "</tr>";
				$i = 0;
			}
			$i++;
		}
		echo "</table>";
	}

	else
	{
		echo "Tuloksia ei ole saatavilla";
	}

	echo "</div>";

	mysql_close () or die (mysql_error());
?>
