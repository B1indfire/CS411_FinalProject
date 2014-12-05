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


header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/current_exams.php" );

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345","scheduli_data");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security

$class_name = mysqli_real_escape_string($con, $_POST['p_class']);
$exam_name = mysqli_real_escape_string($con, $_POST['p_name']);
$date = date('Y-m-d', strtotime($_POST['p_date']));
$location = mysqli_real_escape_string($con, $_POST['p_location']);
$time = date('H:i:s', strtotime($_POST['p_time']));
$grade = mysqli_real_escape_string($con, $_POST['p_grade']);

$sql="INSERT INTO tab_exam (class_name, exam_name, date, location, time,  user)
VALUES ('$class_name', '$exam_name', '$date', '$location', '$time', '$loggedInUser')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added<br><br>";
echo "If you are not automatically redirected in 5 seconds...<br><br>";
echo '<a href="http://schedulizer.web.engr.illinois.edu/main_menu.php">Go back to the main menu</a>';

mysqli_close($con);
?> 