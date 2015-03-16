<?php
	
	session_start();

	if($_SESSION["status"] == 1) {
		mysql_connect ( "localhost", "letgeewa_sheep", "wormsarmageddon2" ) or die (mysql_error());
		mysql_select_db ("letgeewa_letgeecup") or die (mysql_error());

		$result = mysql_query ( "SELECT * FROM `tulokset` ORDER BY `id` DESC" ) or die (mysql_error());

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
			?>
			<?php
			echo "<tr><td>";

				echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' id='".$row['id']."' method='POST'>";
				echo "<input type='hidden' name='matchid' value='".$row['id']."'>";
				echo "<input type='submit' name='update' value='Update'>";
				echo "</form>";

			echo "</td></tr>";

			echo "<tr class='matchinput'><td><div class='title inline'>";

				echo "<select name='user1' form='".$row['id']."'>";
				
				$userlist = mysql_query ("SELECT * FROM `users`") or die (mysql_error());
					while ($row2 = mysql_fetch_array($userlist)) 
					{
						//foreach ($variable as $key => $value) 
						//{
						if($row2['id'] == $row['user_1_id']) {
							echo "<option selected value='".$row2['id']."'>".$row2['username']."</option>"; 
						}
						else {
							echo "<option value='".$row2['id']."'>".$row2['username']."</option>";
						}
						//}
					}
				echo "</select>";
			echo "</div></td>";
			
			echo "<td><div class='title inline'>
				<input class='numberinput' type='number' name='goals1' form='".$row['id']."' value='numb1'>
			</div></td>";
			
			echo "<td><div class='title inline'>
				<p>-</p>
			</div></td>";
			
			echo "<td><div class='title inline'>
				<input class='numberinput' type='number' name='goals2' form='".$row['id']."' value='numb2'>
			</div></td>";
			
			echo "<td><div class='title inline'>";
				echo "<select name='user2' form='".$row['id']."'>";
				
				$userlist = mysql_query ("SELECT * FROM `users`") or die (mysql_error());
					while ($row2 = mysql_fetch_array($userlist)) 
					{
						//foreach ($variable as $key => $value) 
						//{
							if($row2['id'] == $row['user_2_id']) {
							echo "<option selected value='".$row2['id']."'>".$row2['username']."</option>"; 
						}
						else {
							echo "<option value='".$row2['id']."'>".$row2['username']."</option>";
						}
						//}
					}
			echo "</select>";
		echo "</div><br/></td></tr>";			
	}
	?>
	<tr>
		<td>
		<form action='<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='POST'>

			<input type='submit' name="create" value='Create new Match'>

		</form>
		</td>
	</tr>
	<?php
	echo "</table>";
	echo "</div>";

	mysql_close () or die (mysql_error());
	}

	

?>
