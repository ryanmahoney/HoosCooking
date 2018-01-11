<?php
	session_start();
	$id = $_REQUEST['id'];
	$_SESSION['user_id'] = $id;
	$_POST['user_id'] = $id;
?>