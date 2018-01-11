<?php
	session_start();
	if(isset($_POST["user_id"]))
		$_SESSION["user_id"] = $_POST["user_id"];
	if(isset($_SESSION["user_id"]))
		$user_id = $_SESSION["user_id"];
	else
		$user_id = 0; 

	$passlist = file("password.php");
   	$passwd = rtrim($passlist[0]);
   	$passwd = preg_replace('/%/','', $passwd);
   	
	$mealname = $_REQUEST['mealname'];
	$description = $_REQUEST['description'];
	$numserve = $_REQUEST['numserve'];
	$rlink = $_REQUEST['rlink'];
	$date = $_REQUEST['date'];
	$time = $_REQUEST['time'];
	$ingr_list = $_REQUEST['ingr_list'];


	$db = mysqli_connect('localhost','rmahoney',"$passwd",'hooscooking');
   	if (!$db) {
    	die('Could not connect: ' . mysqli_error($db));
	}

	$datetime = new DateTime();
	$datetime = $datetime->format('Y-m-d H:iA');
   	$query = "INSERT INTO `meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`, `recipe_link`) 
                  VALUES ('".$date."', '".$mealname."', '".$description."', '".$ingr_list."', '".$user_id."', '".$time."', '".$numserve."', '".$rlink."');";

   	mysqli_query($db,$query);

   	echo "Your meal, ".$mealname.", has been submitted! Thanks for using HoosCooking!";

   	mysqli_close($db);
?>