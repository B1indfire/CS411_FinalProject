<?php
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();
?>
<html>

<head>

<link rel="stylesheet" href="stuff.css">
</head>

<body bgcolor = #aaaaee>
<div id="main_menu">



	
	<h1>MAIN MENU</h1>
	
	<h2><a href="http://schedulizer.web.engr.illinois.edu/register.php">Create New User!</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/view_ppl.php">View/Delete Users</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/select_user.php">Modify User Data<br><br></a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/insert_event.html">Add an Event</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/view_event.php">View/Delete Events</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/select_event.php">Modify an Event<br><br></a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/insert_class.html">Add a Class</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/view_class.php">View/Delete Classes</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/unserialze.php">Unserialized Days for each Class. Serializing was some serious shit.<br><br></a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/insert_assignment.html">Add an Assignment</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/view_assignment.php">View/Delete Assignments</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/select_assignment.php">Modify an Assignment<br><br></a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/insert_exam.html">Add an Exam</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/view_exam.php">View/Delete Exams</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/select_exam.php">Modify an Exam<br><br></a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/logout.php">Logout</a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/changepass.php">Change Password<br><br></a></h2>
	<h2><a href="http://schedulizer.web.engr.illinois.edu/all_upcoming.php">Upcoming events for today. Used for bus schedule and home page.</a></h2>
	
	<h2><a href="http://schedulizer.web.engr.illinois.edu/bus_sched.php">Get to Class<br><br></a></h2>
	
	
	
       


</body>

</html>