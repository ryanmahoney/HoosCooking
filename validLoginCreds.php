<?php
	session_start();
	$passlist = file("password.php");
   	$passwd = rtrim($passlist[0]);
   	$passwd = preg_replace('/%/','', $passwd);

	$un = $_REQUEST['username'];
	$pw = $_REQUEST['password'];
	$password = hash('sha256', $pw);
	$con = mysqli_connect('localhost','rmahoney',"$passwd",'hooscooking');
	if (!$con) {
    	die('Could not connect: ' . mysqli_error($con));
	}

	$users_q = "SELECT `id` FROM `users_info` WHERE `username` = '".$un."' AND `password` = '".$password."'";

	$q_result = mysqli_query($con,$users_q);

	if(mysqli_num_rows($q_result) != 0) {
		$result_array = mysqli_fetch_array($q_result, MYSQLI_BOTH);
		$id = $result_array[0];
		echo $id;
	}
	else
		echo "0";

	mysqli_close($con);
?>