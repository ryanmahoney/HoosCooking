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
		body, html {
			height: 100%;

		}
		html {
			min-height: 400px;
			min-width: 800px;
			background-color: #ADC299;
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
		}

		#content_top {
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

		#content_bottom {
			height: inherit;
		}

		.content_column {
			position: absolute;
			width: 26%;
			padding: 1%;
			border-width: 1%;
			border-style: solid;
			border-color: #456245;
			border-radius: 3px;
			margin: 2%;
			height: inherit;
			max-height: 325px;
			overflow: auto;
			background-color: #FFCC99;
		}

		#content_left {
			position: absolute;
		}
		#content_middle {
			position: absolute;
			left: 33%;
		}
		#content_right {
			position: absolute;
			left: 66%;
		}

		h1#title {
			text-align: center;
			color: #354d2a;
			font-family: Georgia;
		}

		h3#subtitle {
			text-align: center;
			color: #5D6E55;
			font-family: Georgia;
		}

		h2.col_title {
			text-align: center;
			color: #354d2a;
			font-family: Georgia;
		}
		p.col_desc {
			padding-left: 3%;
			padding-right: 3%;
			padding-bottom: 3%;
			color: #5D6E55;
			font-family: Georgia;
		}

		p#about_desc {
			text-align: center;

		}
		.col_button {
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
		}
		.col_button:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #aad197), color-stop(1, #354d2a));
			background:-moz-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-webkit-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-o-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:-ms-linear-gradient(top, #aad197 5%, #354d2a 100%);
			background:linear-gradient(to bottom, #aad197 5%, #354d2a 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#aad197', endColorstr='#354d2a',GradientType=0);
			background-color:#aad197;
		}
		.col_button:active {
			position:relative;
			top:1px;
		}

		footer {
			position: relative;
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
	<script type="text/javascript">

    	function logout() {
    		var xmlhttp;
			if(window.XMLHttpRequest)
				xmlhttp = new XMLHttpRequest();
			else
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.open("POST", "endSession.php", false);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			
    	}
	</script>
</head>
<body>
	<?php 
		if($user_id != 0) {
	?>

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
			<a href="login.php" id="logout" class="right_navbar" onclick="logout()">Log Out, <?php echo $user_id;?></a>
		</div>

	</div>

	<div class="main_content_container">

		<div id="content_top">
			<h1 id="title">HoosCooking</h1>
			<h3 id="subtitle">A home-cooked meal should always be an option.</h3>
			<p id="about_desc" class="col_desc">HoosCooking connects you to the people around you in a whole new way - through food! Sharing home-cooked meals benefits all parties involved in a multitude of ways while establishing and strengthening relationships through food. To read more about our philosophy, go to our <a href="about_us.php" id="about_link">About HoosCooking</a> page.</p>
		</div>

		<div id="content_bottom">
			<div id="content_left" class="content_column">
				<h2 class="col_title">Cook A Meal</h2>
				<p class="col_desc">If you're already cooking, why not prepare food for four instead of just one? Enter a new meal to share with your friends on HoosCooking!</p>
				<button type="button" class="col_button" id="cook_button">Cook A Meal!</button>
			</div>
			
			<div id="content_middle" class="content_column">
				<h2 class="col_title">Find A Meal</h2>
				<p class="col_desc">Time and energy are among the many ingredients necessary in preparing a meal. Don't have those today? No problem! Search for meals being prepared at home by the people around you!</p>
				<button type="button" class="col_button" id="find_button">Find A Meal!</button>
			</div>
			
			<div id="content_right" class="content_column">
				<h2 class="col_title">My Meal History</h2>
				<p class="col_desc">Want to remember what you had for dinner last week or use the recipe from a meal that was shared with you in the past? Maybe you want to give a meal a good rating? View your meal history to view the meals that you've cooked and/or consumed!</p>
				<button type="button" class="col_button" id="history_button">My Meal History</button>
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
	<script type="text/javascript">
		document.getElementById("cook_button").onclick = function () {
        	location.href = "makemeal.php";
    	};

        document.getElementById("find_button").onclick = function () {
        	location.href = "findmeal.php";
        };

        document.getElementById("history_button").onclick = function () {
        	location.href = "mealhistory.php";
    	};
	</script>
	
	<?php
		}
		else {
	?>
	<a>You're not logged in</a>
	<?php
		}
	?>
</body>
</html>