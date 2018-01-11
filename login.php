<?php
	session_start();
	session_unset();
	if(isset($_POST["user_id"]))
		$_SESSION["user_id"] = $_POST["user_id"];
	if(isset($_SESSION["user_id"]))
		$user_id = $_SESSION["user_id"];
	else
		$user_id = 0; 
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		html,body {
			height: 100%;
			margin-bottom: 0;
		}
		html {
			min-height: 400px;
			min-width: 800px;
			background-color: #ADC299;
		}

		#wrapper {
			min-height:100%;
			position:relative;
		}

		a:link#about_link {
			color: #354d2a;
		}

		.main_content_container {
			position: relative;
			height: 85%;
			width: 100%;
			margin-top: 50px;
			padding-bottom: 100px;
		}

		#content, #login_content {
			width: 92%;
			padding: 1%;
			border-width: 1%;
			border-style: solid;
			border-color: #456245;
			border-radius: 3px;
			margin: 2%;
			margin-top: 65px;
			height: auto;
			overflow: auto;
			background-color: #FFCC99;
		}

		#login_content {
			margin-top: 10px;
			text-align: center;
		}

		#login_table {
			margin-left: auto;
			margin-right: auto;
		}

		h1#title {
			text-align: center;
			color: #354d2a;
			font-family: Georgia;
			font-size: 30pt;
			margin-bottom: 0;
		}

		h2#login_title {
			text-align: center;
			color: #354d2a;
			font-family: Georgia;
			font-size: 22pt;
		}

		h3#subtitle {
			text-align: center;
			color: #5D6E55;
			font-family: Georgia;
			padding-bottom: 5%;
			margin-top: 5px;
		}

		p.desc {
			padding-left: 3%;
			padding-right: 3%;
			padding-bottom: 3%;
			color: #5D6E55;
			font-family: Georgia;
			text-align: center;
		}

		p#inc_message {
			color: red;
			font-family: Georgia;
			margin-bottom: 0;
			display: none;
		}

		.two_buttons {
			width: 100%;
			height: auto;
			text-align: center;
			padding-bottom: 20px;
		}

		.choice_button {
			-moz-box-shadow:inset 0px 0px 2px 1px #3e7327;
			-webkit-box-shadow:inset 0px 0px 2px 1px #3e7327;
			box-shadow:inset 0px 0px 2px 1px #3e7327;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #354d2a), color-stop(1, #aad197));
			background:-moz-linear-gradient(top, #354d2a 5%, #aad197 100%);
			background:-webkit-linear-gradient(top, #354d2a 5%, #aad197 100%);
			background:-o-linear-gradient(top, #354d2a 5%, #aad197 100%);
			background:-ms-linear-gradient(top, #354d2a 5%, #aad197 100%);
			background:linear-gradient(to bottom, #354d2a 5%, #aad197 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#354d2a', endColorstr='#aad197',GradientType=0);
			background-color:#354d2a;
			-moz-border-radius:3px;
			-webkit-border-radius:3px;
			border-radius:3px;
			border:2px solid #5D6E55;
			display: block;
			margin: 0 auto;
			cursor:pointer;
			color:#f5f5f5;
			font-family:Georgia;
			font-size:17px;
			font-style:italic;
			padding:10px 29px;
			text-decoration:none;
			text-shadow:0px 2px 2px #5b8a3c;
			display: inline-block;
			margin-left: 4%;
			margin-right: 4%;
		}
		.choice_button:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #aad197), color-stop(1, #354d2a));
			background:-moz-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-webkit-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-o-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-ms-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:linear-gradient(to bottom, #aad197 5%, #354d2a 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#aad197', endColorstr='#354d2a',GradientType=0);
			background-color:#aad197;
		}
		.choice_button:active {
			position:relative;
			top:1px;
		}

		#new_form {
			display: none;
		}

		th {
			font-family: Georgia;
			font-size: 18pt;
			color: #354d2a;
			padding-top: 40px;
		}

		td {
			color: #354d2a;
			font-weight: bold;
			padding-top:20px;
			padding-left: 10px;
		}

		td.label {
			text-align: right;
			padding-right: 10px;
		}

		td.centered {
			text-align: center;
		}

		input, textarea{
			border: 2px solid #5D6E55;
			border-radius:3px;
			font-family: Georgia;
			color: #5D6E55;
			font-size: 10pt;
		}

		input {
			height: 22px;		
		}

		input.choice_button {
			height: 50px;
			margin-bottom: 20px;
		}

		input:focus {
			outline: none !important;
			box-shadow: 0 0 10px #5CE65C;
		}

		.small_input {
			width: 70px;
		}

		.buffer {
			height: 75px;
		}

		footer {
			position: absolute;
			background-color: #122A12;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-top-width: 1%;
			border-left-width: 1%;
			border-right-width: 1%;
			border-top-color: #122A12;
			border-left-color: #122A12;
			border-right-color: #122A12;
			border-top-right-radius: 3px;
			border-top-left-radius: 3px;
			margin-top: 8%;
			color: white;
			width: 99%;
			height: auto;
			left:0;
			bottom:0;
		}

		.footer_content {
			position: relative;
			display: inline-block;
			width: 100%;
			padding: 1.5%;
			padding-top: 1%;
			padding-bottom: 1%;
			margin: 0;
			vertical-align: middle;
			text-align: center;
		}

		footer a:link {
			color: white;
		}
		footer a:visited {
			color: white;
		}
		footer a:hover {
			color: #5D6E55;
		}
	</style>

	<script type="text/javascript">
		function updateLogin() {
			var username = document.forms["login"]["username"].value;
			var password = document.forms["login"]["password"].value;

			var xmlhttp;
			if(window.XMLHttpRequest)
				xmlhttp = new XMLHttpRequest();
			else
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("hidden_id").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "validLoginCreds.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("username=" + username + "&password=" + password);
		}

		function validateLogin() {
			var h_id = document.getElementById("hidden_id").innerHTML;
			if(h_id == 0){
				document.getElementById("inc_message").style.display="block";
				return false;
			}
			else {
				var xmlhttp;
				if(window.XMLHttpRequest)
					xmlhttp = new XMLHttpRequest();
				else
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				xmlhttp.open("POST", "setCurrentID.php", false);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("id=" + h_id);
				document.getElementById("inc_message").style.display="none";
			}
		}

		function logout() {
			var xmlhttp;
			if(window.XMLHttpRequest)
				xmlhttp = new XMLHttpRequest();
			else
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.open("POST", "endSession.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
    	}
	</script>
</head>
<body>
	<div id="wrapper"> 
		
		<div class="main_content_container">
			
			<div id="content">
				<h1 id="title">HoosCooking</h1>
				<h3 id="subtitle">A home-cooked meal should always be an option.</h3>
				<p id="about_desc" class="desc">HoosCooking connects you to the people around you in a whole new way - through food! Sharing home-cooked meals benefits all parties involved in a multitude of ways while establishing and strengthening relationships through food.</p>
			</div>
			
			<div id="login_content">
				<?php 
					if($user_id == 0) {
				?>
				<h2 id="login_title">Log In</h2>
				<p id="inc_message">Incorrect Username/Password</p>
				<form name="login" action="home.php" onsubmit="return validateLogin()" method="POST">
					<span hidden id="hidden_id"></span>
					<table id="login_table">
						<tr>
							<td>Username:</td>
							<td><input type="text" name="username" size="30" required oninput="updateLogin()"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="password" size="30" required oninput="updateLogin()"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" class="choice_button" value="Log In to HoosCooking"</td>
						</tr>
					</table>
				</form>
				<?php
					}
					else {
				?>
				<h2 id="login_title">Whoops!</h2>
				<h4 id="already_in">It looks like you're already logged in! To continue as <?php echo $user_id;?>, go to the <a href="home.php">HoosCooking home page</a>. This isn't you? Please <a href="login.php" onclick="logout()">Log Out</a>.</h4>
				<?php
					}
				?>
			</div>

		</div>

		<footer>
			<p class="footer_content">HoosCooking Contact Information: Ryan Mahoney - <a href="mailto:rtm8mg@virginia.edu">rtm8mg@virginia.edu</a>.</p>
		</footer>
	</div>	

	<script type="text/javascript">
	</script>
</body>
</html>