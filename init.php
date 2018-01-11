<?php
	session_start();
   session_destroy();
   $passlist = file("password.php");
   $passwd = rtrim($passlist[0]);
   $passwd = preg_replace('/%/','', $passwd);

   $db = new mysqli('localhost', "rmahoney", "$passwd", "hooscooking");

	if ($db->connect_error)
      die ("Could not connect to db: " . $db->connect_error);

   $db->query("drop table friendships");
   $db->query("drop table meals_info");
   $db->query("drop table meals_shared");
   $db->query("drop table users_info");


   $db->query("create table friendships (friendship_id int(11) primary key not null auto_increment, 
               friend_1 int(11) not null,
               friend_2 int(11) not null)") or die ("Invalid: " . $db->error);

   $db->query("create table meals_info (meal_id int(11) primary key not null auto_increment, 
               date_cooked timestamp not null default current_timestamp, 
               meal_name varchar(255) not null, 
               meal_description text not null,
               ingredients text not null,
               cooked_by_id int(11) not null,
               time_cooked time not null,
               num_servings int(11) not null,
               rating tinyint(1) unsigned null,
               num_ratings int(11) not null default '0',
               recipe_link text null)") or die ("Invalid: " . $db->error);

   $db->query("create table meals_shared (shared_id int(11) primary key not null auto_increment,
               meal_id int(11) not null, 
               user_id int(11) not null, 
               rating tinyint(1) unsigned null)") or die ("Invalid: " . $db->error);

   $db->query("create table users_info (id int(11) primary key not null auto_increment, 
               username varchar(255) not null,
               email varchar(255) not null, 
               first_name varchar(255) not null, 
               last_name varchar(255) not null,
               phone varchar(20) null default null,
               password char(100) not null,
               address_1 varchar(255) not null, 
               address_2 varchar(255) null, 
               city varchar(255) not null,
               state enum('AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY') not null,
               ZIP char(5) not null)") or die ("Invalid: " . $db->error);
   
   $pwd = 'ryanmahoney';
   $pwd = hash('sha256', $pwd);
   $u1_q1 = "INSERT INTO `users_info` VALUES (NULL, 'ryanm', 'rtm8mg@virginia.edu', 'Ryan', 'Mahoney', '(631)974-2785', '".$pwd."', '1021 Wertland St', 'Apartment 4', 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u1_q1);
   $u1_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u1_q2 = mysqli_query($db, $u1_q2);
   $ryan_id = mysqli_fetch_object($result_u1_q2)->id;
   mysqli_free_result($result_u1_q2);

   $pwd = 'tomfijal';
   $pwd = hash('sha256', $pwd);
   $u2_q1 = "INSERT INTO `users_info` VALUES (NULL, 'tomf', 'rtm8mg@virginia.edu', 'Thomas', 'Fijal', '(631)974-2785', '".$pwd."', '225 14th Street NW', 'Apartment 101', 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u2_q1);
   $u2_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u2_q2 = mysqli_query($db, $u2_q2);
   $tom_id = mysqli_fetch_object($result_u2_q2)->id;
   mysqli_free_result($result_u2_q2);

   $pwd = 'scottymorris';
   $pwd = hash('sha256', $pwd);
   $u3_q1 = "INSERT INTO `users_info` VALUES (NULL, 'scottym', 'rtm8mg@virginia.edu', 'Scotty', 'Morris', '(631)974-2785', '".$pwd."', '1021 Wertland Street', 'Apartment 4', 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u3_q1);
   $u3_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u3_q2 = mysqli_query($db, $u3_q2);
   $scotty_id = mysqli_fetch_object($result_u3_q2)->id;
   mysqli_free_result($result_u3_q2);

   $pwd = 'mattrohr';
   $pwd = hash('sha256', $pwd);
   $u4_q1 = "INSERT INTO `users_info` VALUES (NULL, 'mattr', 'rtm8mg@virginia.edu', 'Matthew', 'Rohr', '(631)974-2785', '".$pwd."', '7 University Court', NULL, 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u4_q1);
   $u4_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u4_q2 = mysqli_query($db, $u4_q2);
   $matt_id = mysqli_fetch_object($result_u4_q2)->id;
   mysqli_free_result($result_u4_q2);

   $pwd = 'hannahsater';
   $pwd = hash('sha256', $pwd);
   $u5_q1 = "INSERT INTO `users_info` VALUES (NULL, 'hannahs', 'rtm8mg@virginia.edu', 'Hannah', 'Sater', '(631)974-2785', '".$pwd."', '7 University Court', NULL, 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u5_q1);
   $u5_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u5_q2 = mysqli_query($db, $u5_q2);
   $hannah_id = mysqli_fetch_object($result_u5_q2)->id;
   mysqli_free_result($result_u5_q2);

   $pwd = 'allenqui';
   $pwd = hash('sha256', $pwd);
   $u6_q1 = "INSERT INTO `users_info` VALUES (NULL, 'allenq', 'rtm8mg@virginia.edu', 'Allen', 'Qui', '(631)974-2785', '".$pwd."', '225 14th Street NW', 'Apartment 101', 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u6_q1);
   $u6_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u6_q2 = mysqli_query($db, $u6_q2);
   $allen_id = mysqli_fetch_object($result_u6_q2)->id;
   mysqli_free_result($result_u6_q2);

   $pwd = 'michellegahagan';
   $pwd = hash('sha256', $pwd);
   $u7_q1 = "INSERT INTO `users_info` VALUES (NULL, 'michelleg', 'rtm8mg@virginia.edu', 'Michelle', 'Gahagan', '(631)974-2785', '".$pwd."', '109 N Patrick St', NULL, 'Alexandria', 'VA', '22314');";
   mysqli_query($db, $u7_q1);
   $u7_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u7_q2 = mysqli_query($db, $u7_q2);
   $michelle_id = mysqli_fetch_object($result_u7_q2)->id;
   mysqli_free_result($result_u7_q2);

   $pwd = 'debbiemahoney';
   $pwd = hash('sha256', $pwd);
   $u8_q1 = "INSERT INTO `users_info` VALUES (NULL, 'debbiem', 'rtm8mg@virginia.edu', 'Debbie', 'Mahoney', '(631)974-2785', '".$pwd."', '67 Lindron Ave', NULL, 'Smithtown', 'NY', '11787');";
   mysqli_query($db, $u8_q1);
   $u8_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u8_q2 = mysqli_query($db, $u8_q2);
   $deb_id = mysqli_fetch_object($result_u8_q2)->id;
   mysqli_free_result($result_u8_q2);

   $pwd = 'juliapedrick';
   $pwd = hash('sha256', $pwd);
   $u9_q1 = "INSERT INTO `users_info` VALUES (NULL, 'juliap', 'rtm8mg@virginia.edu', 'Julia', 'Pedrick', '(631)974-2785', '".$pwd."', '611 Madison Avenue', NULL, 'Charlottesville', 'VA', '22903');";
   mysqli_query($db, $u9_q1);
   $u9_q2 = "SELECT `id` FROM `users_info` WHERE `email` = 'rtm8mg@virginia.edu' AND `password` = '".$pwd."';";
   $result_u9_q2 = mysqli_query($db, $u9_q2);
   $julia_id = mysqli_fetch_object($result_u9_q2)->id;
   mysqli_free_result($result_u9_q2);

// Add friendship between Tom and Ryan
   $f1_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$tom_id.");";
   mysqli_query($db, $f1_q1);

// Add friendship between Scotty and Ryan
   $f2_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$scotty_id.");";
   mysqli_query($db, $f2_q1);

// Add friendship between Matt and Ryan
   $f3_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$matt_id.");";
   mysqli_query($db, $f3_q1);

// Add friendship between Hannah and Ryan
   $f4_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$hannah_id.");";
   mysqli_query($db, $f4_q1);

// Add friendship between Allen and Ryan
   $f5_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$allen_id.");";
   mysqli_query($db, $f5_q1);

// Add friendship between Michelle and Ryan
   $f6_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$michelle_id.");";
   mysqli_query($db, $f6_q1);

// Add friendship between Debbie and Ryan
   $f7_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$deb_id.");";
   mysqli_query($db, $f7_q1);

// Add friendship between Julia and Ryan
   $f8_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$ryan_id.", ".$julia_id.");";
   mysqli_query($db, $f8_q1);

// Add friendship between Allen and Tom
   $f9_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$tom_id.", ".$allen_id.");";
   mysqli_query($db, $f9_q1);

// Add friendship between Matt and Scotty
   $f10_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$matt_id.", ".$scotty_id.");";
   mysqli_query($db, $f10_q1);

// Add friendship between Hannah and Scotty
   $f11_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$hannah_id.", ".$scotty_id.");";
   mysqli_query($db, $f11_q1);

// Add friendship between Hannah and Matt
   $f12_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$hannah_id.", ".$matt_id.");";
   mysqli_query($db, $f12_q1);

// Add friendship between Tom and Scotty
   $f13_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$tom_id.", ".$scotty_id.");";
   mysqli_query($db, $f13_q1);

// Add friendship between Debbie and Michelle
   $f14_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$deb_id.", ".$michelle_id.");";
   mysqli_query($db, $f14_q1);

// Add friendship between Julia and Michelle
   $f15_q1 = "INSERT INTO `friendships` VALUES (NULL, ".$julia_id.", ".$michelle_id.");";
   mysqli_query($db, $f15_q1);



// Auto generated meals
   $m1_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES (CURRENT_TIMESTAMP, 
                           'Chicken Parmesan', 
                           'Sides: Broccoli, Italian Bread
                           Used low fat mozzerella cheese and homemade marinara sauce.', 
                           'Chicken, Bread crumbs, Salt, Butter, Broccoli, Italian Bread, other stuff', 
                           ".$ryan_id.", '19:15:00', '1');";
   mysqli_query($db, $m1_q1);

   $s1_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '1', ".$allen_id.", NULL);";
   mysqli_query($db, $s1_q1);


   $m2_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES ('2015-07-28 00:00:00', 
                           'Spaghetti and Meatballs', 
                           'Sides: Garlic Italian Bread', 
                           'Spaghetti, Meatballs', 
                           ".$ryan_id.", '18:45:00', '2');";
   mysqli_query($db, $m2_q1);

   $s2_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '2', ".$julia_id.", NULL);";
   mysqli_query($db, $s2_q1);
   $s2_q2 = "INSERT INTO `meals_shared` VALUES (NULL, '2', ".$michelle_id.", NULL);";
   mysqli_query($db, $s2_q2);

   $m3_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES (CURRENT_TIMESTAMP, 
                           'Steak and Eggs', 
                           'You know you want it.', 
                           'Steak, Eggs', 
                           ".$tom_id.", '17:45:00', '2');";
   mysqli_query($db, $m3_q1);

   $s3_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '3', ".$allen_id.", NULL);";
   mysqli_query($db, $s3_q1);

   $m4_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES (CURRENT_TIMESTAMP, 
                           'Cereal', 
                           'They are magically delicious.', 
                           'Marshmallows, High-fructose Corn Syrup, Milk', 
                           ".$matt_id." , '18:30:00', '2');";
   mysqli_query($db, $m4_q1);

   $s4_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '4', ".$hannah_id.", NULL);";
   mysqli_query($db, $s4_q1);
   $s4_q2 = "INSERT INTO `meals_shared` VALUES (NULL, '4', ".$scotty_id.", NULL);";
   mysqli_query($db, $s4_q2);

   $m5_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES (CURRENT_TIMESTAMP, 
                           'New England Clam Chowder', 
                           'Clams are fresh from Long Island Sound', 
                           'Clams, Potatoes, Cream', 
                           ".$deb_id.", '19:45:00', '7');";
   mysqli_query($db, $m5_q1);

   $s5_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '5', ".$ryan_id.", NULL);";
   mysqli_query($db, $s5_q1);

   $m6_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES ('2015-11-26 00:00:00', 
                           'Roasted Turkey Dinner', 
                           'Thanksgiving!', 
                           'Mashed Potatoes, Gravy, Corn, Green Beans, Turkey', 
                           ".$julia_id.", '17:45:00', '5');";
   mysqli_query($db, $m6_q1);

   $s6_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '6', ".$ryan_id.", NULL);";
   mysqli_query($db, $s6_q1);

   $m7_q1 = "INSERT INTO `hooscooking`.`meals_info` (`date_cooked`, `meal_name`, `meal_description`, `ingredients`, `cooked_by_id`, `time_cooked`, `num_servings`) 
                  VALUES ('2015-7-22 00:00:00', 
                           'Meatloaf', 
                           'Just like mom used to make it.', 
                           'Surprise', 
                           ".$michelle_id.", '20:15:00', '1');";
   mysqli_query($db, $m7_q1);

   $s7_q1 = "INSERT INTO `meals_shared` VALUES (NULL, '7', ".$deb_id.", NULL);";
   mysqli_query($db, $s7_q1);


?>
<!DOCTYPE html>
<html>
<head>
	<title>init.php</title>
</head>
<body>
	<h1 align="center">HoosCooking Initialization Page</h1>
	<table align="center">
		<tr>
			<td><a href = "home.php">Go to HoosCooking Site</a></td>
		</tr>
	</table>
</body>
</html>