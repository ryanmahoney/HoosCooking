<?php
	session_start();
	if(isset($_POST['mode']))
    	$_SESSION["list_mode"] = $_POST['mode'];
  	if(isset($_SESSION["list_mode"]))
    	$list_mode = $_SESSION["list_mode"];
  	else
    	$list_mode = 'all';

	$passlist = file("password.php");
   	$passwd = rtrim($passlist[0]);
   	$passwd = preg_replace('/%/','', $passwd);

	$id = $_POST['id'];
	$mode = $_POST['mode'];

	$con = mysqli_connect('localhost','rmahoney',"$passwd",'techsupport');
	if (!$con) {
    	die('Could not connect: ' . mysqli_error($con));
	}

	if($mode == "all") {
		$tickets_q = "SELECT * FROM `tickets_by_id`";
	}

	if($mode == "open") {
		$tickets_q = "SELECT * FROM `tickets_by_id` WHERE `status` = 'open'";
	}

	if($mode == "mine") {
		$tickets_q = "SELECT * FROM `tickets_by_id` WHERE `tech` = '".$id."'";
	}

	if($mode == "unass") {
		$tickets_q = "SELECT * FROM `tickets_by_id` WHERE `tech` IS NULL";
	}

	if($mode == "submitter") {
		$tickets_q = "SELECT * FROM `tickets_by_id` WHERE `sender_name` = '".$id."'";
	}

//	$tickets_q = "SELECT * FROM `tickets_by_id` WHERE `sender_name` = '".$fullname."'";

	$ticket_results = mysqli_query($con,$tickets_q);
?>

<!DOCTYPE html>
<html>
<head>
<style>
	table.tix {
		border: 1px solid black;
    	padding: 5px;
	}

	.tix th {
		border: 1px solid black;
    	padding: 5px;
		text-align: center;
	}

	.tix td {
		border: 1px solid black;
    	padding: 5px;
		text-align: left;
	}
</style>
</head>
<body>
<?php
	if($mode == "all")
    	echo "<h3 align='center'>techSupport All Tickets</h3>";
  	else if($mode == "open")
    	echo "<h3 align='center'>techSupport Open Tickets</h3>";
  	else if($mode == "mine")
    	echo "<h3 align='center'>techSupport ".$id."'s Tickets</h3>";
  	else if($mode == "unass")
    	echo "<h3 align='center'>techSupport Unassigned Tickets</h3>";
    else if($mode == "submitter")
    	echo "<h3 align='center'>techSupport Tickets Submitted by ".$id."</h3>";
	if(mysqli_num_rows($ticket_results) == 0) 
		echo "<p align='center'>There are currently no tickets.</p>";
	else {
		echo "<table align='center' class='tix' id='tixTbl'>
				<tr>
				<th>Ticket #</th>
				<th>Date Received</th>
				<th>Sender Name</th>
				<th>Sender Email</th>
				<th>Subject</th>
				<th>Tech</th>
				<th>Status</th>
				<th>Select</th>
				</tr>";
		while($ticket = mysqli_fetch_array($ticket_results)) {
			echo "<tr>";
			echo "<td>".$ticket['id']."</td>";
			echo "<td>".$ticket['date_submitted']."</td>";
			echo "<td>".$ticket['sender_name']."</td>";
			echo "<td>".$ticket['sender_email']."</td>";
			echo "<td>".$ticket['subject']."</td>";
			echo "<td>".$ticket['tech']."</td>";
			echo "<td>".$ticket['status']."</td>";
			echo "<td><input align='center' type='radio' name='selected' value='".$ticket['id']."'></td>";
			echo "</tr>";
		}
		echo "<tr>
				<th>Sort By:</th>
				<th><input align='center' type='radio' name='sortby' value='date_submitted'></th>
				<th><input align='center' type='radio' name='sortby' value='sender_name'></th>
				<th><input align='center' type='radio' name='sortby' value='sender_email'></th>
				<th><input align='center' type='radio' name='sortby' value='subject'></th>
				<th></th>
				<th></th>
				<th></th>
			 </tr>";
		echo "</table>";
	}

	mysqli_close($con);
?>
</body>
</html>