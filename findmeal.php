<?php
	session_start();
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
		.navbar {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			max-height: 50px;
			min-height: 40px;
			height: 15%;
			background-color: #122A12;
			z-index: 1;
			vertical-align: middle;
			box-shadow: 0px 2px 20px #122A12;
		}

		.logo_container {
			position: relative;
			text-align: center;
			float: left;
			top: 23%;
			left: 5%;
		}

		.nav_container {
			position: relative;
			text-align: center;
			float: right;
			top: 25%;
			right: 5%;
		}

		.left_navbar {
			font-family: Georgia;
			font-size: 22px;
			font-weight: bold;
			text-decoration: none;
			color: white;
		}

		.right_navbar {
			font-family: Georgia;
			font-size: 18px;
			color: white;
			text-decoration: none;
		}

		.main_content_container {
			position: relative;
			height: 85%;
			width: 100%;
			margin-top: 50px;
			padding-bottom: 100px;
		}

		#content {
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

		h1#title {
			text-align: center;
			color: #354d2a;
			font-family: Georgia;
		}

		p.desc {
			padding-left: 3%;
			padding-right: 3%;
			padding-bottom: 3%;
			color: #5D6E55;
			font-family: Georgia;
			text-align: center;
		}

		.select_button {
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
			font-size:9pt;
			font-style:italic;
			padding:6px 6px;
			text-decoration:none;
			text-shadow:0px 2px 2px #5b8a3c;
		}
		.select_button:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #aad197), color-stop(1, #354d2a));
			background:-moz-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-webkit-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-o-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-ms-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:linear-gradient(to bottom, #aad197 5%, #354d2a 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#aad197', endColorstr='#354d2a',GradientType=0);
			background-color:#aad197;
		}
		.select_button:active {
			position:relative;
			top:1px;
		}

		.label {
			font-family: Georgia;
			font-size: 15pt;
			color: #354d2a;
			padding-top: 40px;
		}

		.loc_op {
			padding-top: 45px;
			padding-left: 0px;
		}

		.date_op {
			padding-top: 45px;
			padding-left: 0px;
		}

		.text_field {
			padding-top: 42px;
		}

		.date_field {
			padding-top: 42px;
		}

		#another_date {
			width: 135px;
		}

		.radbut {
			padding-top: 42px;
			padding-left: 30px;
		}

		td {
			color: #354d2a;
			font-weight: bold;
			padding-top:20px;
			padding-left: 10px;
		}

		td.sub_label {
			padding-top: 0;
		}

		p.sub_label {
			color: #5D6E55;
			font-weight: normal;
			margin-top: 0px;
			font-size: 10pt;
			max-width: 300px;
		}

		input {
			border: 2px solid #5D6E55;
			border-radius:3px;
			font-family: Georgia;
			color: #5D6E55;
			font-size: 10pt;
		}

		input:focus {
			outline: none !important;
			box-shadow: 0 0 10px #5CE65C;
		}

		input.rad:focus {
			box-shadow: none;
		}

		.buffer {
			height: 75px;
		}

		#blank {
			background-color: transparent;
			border: none;
		}

		.sort {
			color: white;
			font-family: Georgia;
			font-size: 10pt;
			border: 2px solid #122A12;
			border-radius:3px;
			padding: 3px;
			background-color: #354d2a;
		}		

		th {
			color: white;
			font-family: Georgia;
			border: 2px solid #122A12;
			border-radius:3px;
			padding: 8px;
			background-color: #354d2a;
		}

		td.results{
			color: #354d2a;
			font-family: Georgia;
			border: 2px solid #122A12;
			border-radius:3px;
			text-align: center;
			vertical-align: center;
			padding: 8px;
			font-size: 10pt;
			background-color: #ADC299;
		}

		#results {
			width: 100%;
			border-collapse: separate;
			border: 2px solid #122A12;
			border-radius: 3px;
			background-color: white;
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
			width: 8%;
			padding: 1.5%;
			padding-top: 1%;
			padding-bottom: 1%;
			margin: 0;
			vertical-align: middle;
			text-align: center;
		}

		#f_cont {
			width: 20%;
			padding-left: 19%;
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
</head>
<body>
	<div id="wrapper">   
		<div id="navbar" class="navbar">
			<div class="logo_container">
				<a href="home.php" id="logo" class="left_navbar">HoosCooking</a>
			</div>

			<div class="nav_container">
				<a href="home.php" id="home" class="right_navbar">Home</a>
				<a class="right_navbar">&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<a href="settings.php" id="settings" class="right_navbar">Settings</a>
				<a class="right_navbar">&nbsp;&nbsp;&nbsp;</a>
				<a class="right_navbar">|</a>
				<a class="right_navbar">&nbsp;&nbsp;&nbsp;</a>
				<a href="login.php" id="logout" class="right_navbar">Log Out, <?php echo $user_id;?></a>
			</div>

		</div>

		<div class="main_content_container">

			<div id="content">
				<h1 id="title">Find A Meal</h1>
				<p class="desc">Too busy to cook? Maybe you just want to take a night off from kitchen duty. Use the tools below in order to find the meals being prepared by the people around you!</p>
				<form>
					<table align="center">
						<tr id="loc_top">
							<td class="label">What is your current location?</td>
							<td class="radbut"><input type="radio" class="rad" name="location" value="home"></td>
							<td class="loc_op">Home</td>
							<td class="radbut"><input type="radio" class="rad" name="location" value="other"></td>
							<td class="loc_op">Other</td>
							<td class="text_field"><input type="text" id="other_address" size="35"></td>
						</tr>
						<tr>
							<td class="sub_label"><p class="sub_label">Entering your current location allows for HoosCooking to find the home-cooked meals closest to you.</p></td>
						</tr>
					</table>
				</form>
				<form>
					<table align="center">
						<tr id="date_q">
							<td class="label">For what date are you looking for a meal?</td>
							<td class="radbut"><input type="radio" class="rad" name="date_search" value="today"></td>
							<td class="date_op">Today</td>
							<td class="radbut"><input type="radio" class="rad" name="date_search" value="another"></td>
							<td class="date_op">Another Day</td>
							<td class="date_field"><input type="date" id="another_date"></td>
							<td class="radbut"><input type="radio" class="rad" name="date_search" value="any"></td>
							<td class="date_op">Any Day</td>
						</tr>
						<tr>
							<td class="sub_label"><p class="sub_label">Choosing a date allows HoosCooking to filter your search for an easier experience.</p></td>
						</tr>
					</table>
				</form>
				<div class="buffer"></div>
				<form>
					<table align="center" id="results">
						<tr class="headers">
							<th id="blank"></th>
							<th>Distance</th>
							<th>Meal Name</th>
							<th>Home Cook</th>
							<th>Time</th>
							<th>Date</th>
							<th># Servings Left</th>
							<th>Other Details</th>
						</tr>
						<tr class="sort">
							<th class="sort">Sort By:</th>
							<th class="sort"><input type="radio" class="rad" name="sort" value="dist"></th>
							<th class="sort"><input type="radio" class="rad" name="sort" value="name"></th>
							<th class="sort"><input type="radio" class="rad" name="sort" value="cook"></th>
							<th class="sort"><input type="radio" class="rad" name="sort" value="time"></th>
							<th class="sort"><input type="radio" class="rad" name="sort" value="date"></th>
							<th class="sort"><input type="radio" class="rad" name="sort" value="serv"></th>
							<th class="sort"></th>
						</tr>
						<tr>
							<td class="results"><button type="button" class="select_button" id="select_12">Request Meal!</button></td>
							<td class="results">12</td>
							<td class="results">Chicken Parmesan with Brocolli and Italian Bread</td>
							<td class="results">Ryan Mahoney</td>
							<td class="results">7:00 PM</td>
							<td class="results">07/23/2015</td>
							<td class="results">3</td>
							<td class="results"><button type="button" class="select_button" id="more_12">See Details</button></td>
						</tr>
					</table>
				</form>
			</div>

		</div>

		<footer>
			<p class="footer_content" id="f_home"><a href="home.php">Home</a></p>
			<p class="footer_content" id="f_make"><a href="makemeal.php">Make A Meal</a></p>
			<p class="footer_content" id="f_find"><a href="findmeal.php">Find A Meal</a></p>
			<p class="footer_content" id="f_hist"><a href="mealhistory.php">My Meal History</a></p>
			<p class="footer_content" id="f_about"><a href="about.php">About HoosCooking</a></p>
			<p class="footer_content" id="f_cont">Contact information: Ryan Mahoney - <a href="mailto:rtm8mg@virginia.edu">rtm8mg@virginia.edu</a>.</p>
		</footer>
	</div>	

</body>
</html>