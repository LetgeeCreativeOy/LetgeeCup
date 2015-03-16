<?php
	
	session_start();
	
	if ( isset($_POST['submit']) )
	{
		include ('php/login.php');
	}

	if (isset($_POST['update']) || isset($_POST['create']) ) 
	{
		include('php/updateadmin.php');
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LETGEE Cup Admin</title>
		<link rel="icon" href="static/images/15.ico">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
	</head>
	<body>

		<div id="wrapper">
			
			<div id="header">
				<span class="logo"><a href="admin.php"><img src="static/images/letgee_cup_logo.png"><img class="tinylogo" src="static/images/15.png"></a> Admin</span>
				<div id="navbar">
					<nav>
					</nav>

					<form action="admin.php" method="POST">
						
						<input class="textinput" type="text" name="loguser" placeholder="Username">
						<input class="textinput" type="password" name="logpass" placeholder="Password">

						<input type="submit" id="submit" name="submit" value="Log in">

					</form>

				</div>
			</div>


			<div id="body">
				
				<div id="message">
					<?php
						if ( isset($message) )
						{
							echo $message;
						}
					?>
				</div>

				<div id="list"></div>
				
			</div>

			<div id="footer">
				
				<div class="title block">
					<a href="http://letgee.fi" target="_blank">Copyright&copy; LETGEE Creative Oy</a>
				</div>

			</div>

		</div>

		<script type="text/javascript" src="static/js/jquery.js"></script>
		<script type="text/javascript">
			function getscore()
			{
				$.ajax({
					type:'GET',
					url:'php/resultsadmin.php',
				}).done(function(data){
					$('#list').html(data);
				});
			}
		</script>
		<?php

			if(function_exists(getscorejs))
			{

				getscorejs();

			}

		?>

	</body>
</html>