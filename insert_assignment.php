<?php
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  

}
$usernameRequest = mysqli_query($con,"SELECT username FROM tab_users WHERE id = $LS->user");
$row = mysqli_fetch_array($usernameRequest);
$loggedInUser = $row['username'];

?>
<?php

header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/current_assignments.php" );

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345","scheduli_data");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security

$assignment_name = mysqli_real_escape_string($con, $_POST['p_name']);
$due_date = date('Y-m-d', strtotime($_POST['p_date']));
$class = mysqli_real_escape_string($con, $_POST['p_class']);
$grade_received = mysqli_real_escape_string($con, $_POST['p_grade']);
/*
if($due_date < (time()-(60*60*24)))
	{
	echo "Sorry, hat date has alredy passed";
	
	
	}


else{
*/
$sql="INSERT INTO tab_assignment (assignment_name, due_date, class, user)
VALUES ('$assignment_name', '$due_date', '$class', '$loggedInUser')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added<br><br>";
echo "If you are not automatically redirected in 5 seconds...<br><br>";
echo '<a href="http://schedulizer.web.engr.illinois.edu/main_menu.php">Go back to the main menu</a>';

mysqli_close($con);

?> 