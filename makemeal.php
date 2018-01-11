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

		h3 {
			text-align: center;
			color: #5D6E55;
			font-family: Georgia;
			padding-top: 5%;
			padding-bottom: 5%;
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

		#new_ingredient {
			font-size:15px;
			padding:8px 20px;

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


		#existing_form, #submitted_meal {
			text-align: center;
			display: none;
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

		.ingr_name {
			width: 200px;
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
	<script type="text/javascript">
		function submitMeal() {
			var mealname = document.getElementById("new_meal_name").value;
			var description = document.getElementById("meal_desc").value;
			var numserve = document.getElementById("num_servings").value;
			var rlink = document.getElementById("rec_link").value;
			var date = document.getElementById("date").value;
			var time = document.getElementById("time").value;
			var ingr_list = "";
			var num_ingr = parseInt(document.getElementById("num_ingr").value);
			for( i = 0 ; i <= num_ingr - 1 ; i++) {
				var ingr_name = document.getElementById("ingr_name_" + i).value;
				if(ingr_name != "") {
					var ingr_amt = document.getElementById("ingr_amt_" + i).value;
					var ingr_unit = document.getElementById("ingr_unit_" + i).value;
					ingr_list = ingr_list + ingr_amt + " " + ingr_unit + " " + ingr_name + ", ";
				}
			}

			var xmlhttp; 
			if(window.XMLHttpRequest)
				xmlhttp = new XMLHttpRequest();
			else
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.onreadystatechange = function() {
          		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            		document.getElementById("dynField").innerHTML = xmlhttp.responseText;
          		}
        	}
			xmlhttp.open("POST", "mealSubmission.php", true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("mealname=" + mealname + "&description=" + description + "&numserve=" + numserve + "&rlink=" + rlink + "&date=" + date + "&time=" + time + "&ingr_list=" + ingr_list);

			document.getElementById("submitted_meal").style.display="block";
			document.getElementById("new_form").style.display="none";
		}

	</script>
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
				<h1 id="title">Make A Meal</h1>
				<p class="desc">Stuff about making a meal would go here...</p>
				<div class="two_buttons">
					<button type="button" class="choice_button" id="new_button">Enter A New Meal</button>
					<button type="button" class="choice_button" id="existing_button">Use An Existing Meal</button>
				</div>
				<form id="new_form">
					<table align="center" id="new_tbl">
						<tr>
							<th colspan="6">General Information</th>
						</tr>
						<tr>
							<td class="label" colspan="3">Meal Name:</td>
							<td colspan="3"><input type="text" id="new_meal_name" class="text_input" required></td>
						</tr>
						<tr>
							<td class="label" colspan="3">Meal Description:</td>
							<td colspan="3"><textarea id="meal_desc" rows="5" cols="30"></textarea></td>
						</tr>
						<tr>
							<td class="label" colspan="3">Number of Servings:</td>
							<td colspan="3"><input type="number" id="num_servings" class="small_input" required></td>
						</tr>
						<tr>
							<td class="label" colspan="3">Recipe Link:</td>
							<td colspan="3"><input type="text" id="rec_link" class="text_input"></td>
						</tr>
						<tr>
							<td class="label" colspan="3">Date:</td>
							<td colspan="3"><input type="date" id="date" class="date_time" required></td>
						</tr>
						<tr>
							<td class="label" colspan="3">Approximate Time:</td>
							<td colspan="3"><input type="time" id="time" class="date_time" required></td>
						</tr>
						<tr>
							<th colspan="6">Ingredients</th>
						</tr>
						<tr>
							<input type='hidden' id='num_ingr' value='1'>
							<td class="label">Amount:</td>
							<td><input type="number" step=".01" id="ingr_amt_0" class="small_input"></td>
							<td class="label">Units:</td>
							<td><input list="units" id="ingr_unit_0" class="small_input">
								<datalist id="units">
									<option value="cup">
									<option value="gallon">
									<option value="liter">
									<option value="oz">
									<option value="piece">
									<option value="pint">
									<option value="pinch">
									<option value="quart">
									<option value="tbsp">
									<option value="tsp">
									<option value="whole">
								</datalist>
							</td>
							<td class="label">Ingredient:</td>
							<td><input type="text" id="ingr_name_0" class="ingr_name"></td>
						</tr>
						<tr>
							<td colspan="6" class="centered"><button type="button" class="choice_button" id="new_ingredient">Add Ingredient</button></td>
						</tr>
						<tr>
							<td colspan="6" class="centered"><button type="button" class="choice_button" id="submit_meal" value="Submit This Meal!" onclick="submitMeal()">Submit This Meal!</button></td>
						</tr>
					</table>
				</form>
				<form id="existing_form">
					<h3>Sorry! This feature in under construction!</h3>
				</form>
				<form id="submitted_meal">
					<h3 id="dynField">Your meal has been submitted!</h3>
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

	<script type="text/javascript">
		document.getElementById("new_button").onclick = function () {
        	document.getElementById("new_form").style.display="block";
        	document.getElementById("existing_form").style.display="none";
        	document.getElementById("submitted_meal").style.display="none";
    	};

        document.getElementById("existing_button").onclick = function () {
        	document.getElementById("existing_form").style.display="block";
        	document.getElementById("new_form").style.display="none";
        	document.getElementById("submitted_meal").style.display="none";
        };

        document.getElementById("new_ingredient").onclick = function () {
        	var form = document.getElementById("new_form");
        	var tbl = document.getElementById("new_tbl");
        	var num = parseInt(document.getElementById("num_ingr").value);
        	var tbl_row = tbl.insertRow(8+num);
        	var td_0 = tbl_row.insertCell(0);
        	var td_1 = tbl_row.insertCell(1);
        	var td_2 = tbl_row.insertCell(2);
        	var td_3 = tbl_row.insertCell(3);
        	var td_4 = tbl_row.insertCell(4);
        	var td_5 = tbl_row.insertCell(5);
        	td_0.innerHTML = "Amount:";
        	td_0.class = "label";
        	td_1.innerHTML = "<input type='number' step='.01' id='ingr_amt_" + num + "' class='small_input'>";
        	td_2.innerHTML = "Units:";
        	td_2.class = "label";
        	td_3.innerHTML = "<input list='units' id='ingr_unit_" + num + "' class='small_input'>";
        	td_4.innerHTML = "Ingredient:";
        	td_4.class = "label";
        	td_5.innerHTML = "<input type='text' id='ingr_name_" + num + "' class='ingr_name'>";
        	document.getElementById("num_ingr").value= num+1;
        };
	</script>
</body>
</html>