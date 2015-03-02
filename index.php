<?php
	
	if ( isset($_POST['osallistu_submit']) )
	{
		include 'php/osallistu.php';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LETGEE Cup</title>
	<link rel="icon" href="static/images/15.ico">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '1384482955200774',
		  xfbml      : true,
		  version    : 'v2.2'
		});
	  };

	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/fi_FI/sdk.js#xfbml=1&appId=1384482955200774&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	
	<div id="scary"></div>
		<audio id="audio" src="static/images/wat/noise.ogg"></audio>
	<script>
		var show = false;
		window.onkeydown = function ( key )
		{
			if ( key.keyCode == 9 )
			{
				show = !show;
				document.getElementById("scary").style.display = (show == true ? "block" : "none");
				
				if ( show == true )
				{
					document.getElementById("audio").play ();
					document.getElementById("audio").loop = true;
				}
				else
				{
					document.getElementById("audio").loop = false;
					document.getElementById("audio").stop ();
				}
			}
		}
	</script>


	<div id="wrapper">
		
		<div id="header">
			<span class="logo"><a href="index.php"><img src="static/images/letgee_cup_logo.png"><img class="tinylogo" src="static/images/15.png"></a></span>
			<div id="navbar">
				<nav>
					<a href="#livestream">Livestream</a>
					<a href="#tulokset">Tulokset</a>
					<a href="#osallistu">Osallistu</a>
				</nav>
			</div>
		</div>


		<div id="body">
			
			<div class="entry" id="info">
				<div class="title block">LETGEE Cup</div>
				<div class="content">
					Tule selvittämään kuka on Lohjan Fifamestari vuosimallia 2015!<br><br>

Letgee Creative yhdessä Ravintola Hehkun kanssa järjestää ainutlaatuisen jalkapallotapahtuman Lohjalla 28.03.2015.<br><br>

LetgeeCup15 –turnauksen tarkoituksena on selvittää Lohjan mestaruus Fifa 15 Xbox-jalkapallopelissä. Mestaruus selvitetään pelaamalla 32 henkilön välinen turnaus, jonka voittaja kruunataan Lohjan ensimmäiseksi Fifamestariksi<br><br>

<b>PIEKSE KAIKKI JA VOITA XBOX ONE ITSELLESI!</b>
				</div>
			</div>
			
			<div class="entry" id="livestream">
				<div class="title block">Yhteistyössä</div>
				<!--<video id="video" controls></video>-->
				<div class="content" id="spons">
						<a href="http://www.ravintolahehku.fi/" target="_blank"><img class="sponsor" src="static/images/logos/hehku.png"></a>
						<a href="http://lohja.ramon.fi/" target="_blank"><img class="sponsor" src="static/images/logos/ramon.png"></a>
						<a href="http://www.plastex.fi/" target="_blank"><img class="sponsor" src="static/images/logos/plastex.png"></a>
						<a href="http://letgee.fi" target="_blank"><img class="sponsor" src="static/images/logos/letgee.png"></a>
						<a href="http://www.trendi-liikennekoulu.fi/" target="_blank"><img class="sponsor" src="static/images/logos/trendi.jpg"></a>
				</div>
			</div>

			<div class="entry" id="tulokset">
				<div class="title">Tulokset</div>
				<div class="content">
					
					<div id="tulos_lista"></div>

				</div>
				
				
			</div>


			<div class="entry" id="osallistu">
				<div class="title block">Osallistu</div>
				<div class="content">
					
					<div id="message">
						<?php
							if ( isset($message) )
							{
								echo $message;
							}
						?>
					</div>
					Osallistuminen 7.3. klo 16:00 alkaen.
					
					<?php /* 
					<!--<form action="index.php#osallistu" method="POST">
						
						<table border="0">
							<tr>
								<td>
									<label>Nimimerkki:</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="textinput" id="username" maxlength="8" type="text" name="username" value="<?= isset($username_value) ? $username_value : ''; ?>" placeholder="Nimimerkki" />
								</td>
							</tr>

							<tr>
								<td>
									<label>Etunimi:</label>
								</td>

								<td>
									<label>Sukunimi:</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="textinput" id="firstname" type="text" name="firstname" value="<?= isset($firstname_value) ? $firstname_value : ''; ?>" placeholder="Etunimi" />
								</td>

								<td>
									<input class="textinput" id="lastname" type="text" name="lastname" value="<?= isset($lastname_value) ? $lastname_value : ''; ?>" placeholder="Sukunimi" />
								</td>
							</tr>

							<tr>
								<td>
									<label>Sähköposti:</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="textinput" id="email" type="email" name="email" value="<?= isset($email_value) ? $email_value : ''; ?>" placeholder="Sähköposti" />
								</td>
							</tr>

							<tr>
								<td>
									<label>Joukkue:</label>
								</td>
							</tr>

							<tr>
								<td>
									<input class="textinput" id="team" type="text" name="team" title="Joni vituttaako?" value="<?= isset($team_value) ? $team_value : ''; ?>" placeholder="esim. FC Barcelona" />
								</td>
							</tr>


							<tr>
								<td>
									<input class="button disabled" disabled="true" id="submit" type="submit" name="osallistu_submit" value="Osallistu" />
								</td>
							</tr>

						</table>

					</form>-->*/?>
				</div>
				
				<div id="facebookfeed">
					<div class="fb-like-box" data-href="https://www.facebook.com/letgee" data-width="720" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="true" data-show-border="false"></div>
				</div>
				
			</div>
			
		</div>

		<div id="footer">
			
			<div class="title block">
				<a href="http://letgee.fi" target="_blank">Copyright&copy; LETGEE Creative Oy</a>
			</div>

		</div>

	</div>

<?php /*
<!---
	<script type="text/javascript">

	function check () {
		var username, firstname, lastname, email, submit;

		username 	= document.getElementById ( "username" );
		firstname 	= document.getElementById ( "firstname" );
		lastname 	= document.getElementById ( "lastname" );
		email 		= document.getElementById ( "email" );
		team 		= document.getElementById ( "team" );
		submit		= document.getElementById ( "submit" );

		setInterval ( function () {

			if ( username.value.length >= 3 && firstname.value.length >= 3 && lastname.value.length >= 3 && email.value.length >= 3 && team.value.length >= 3 )
			{
				submit.disabled = false;
				submit.className = "button";
			}

			else
			{
				submit.disabled = true;
				submit.className = "button disabled";
			}

		}, 200 );
	}

	</script>
	<script type="text/javascript">check ();</script>
-->*/?>
	
	<script type="text/javascript" src="static/js/jquery.js"></script>
	<script type="text/javascript">

		function get_score_board ()
		{
			$.ajax({
				type:"GET",
				url:"php/tulokset.php",
			}).done(function(data){
				$("#tulos_lista").html(data);
			});
		}

		get_score_board ();

		setInterval ( function () {
			get_score_board ();
		}, 2500 );

	</script>	

</body>
</html>
