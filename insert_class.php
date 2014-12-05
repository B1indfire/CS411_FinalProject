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
header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/all_classes.php" );

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345","scheduli_data");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security

$class = mysqli_real_escape_string($con, $_POST['p_class']);
$location = mysqli_real_escape_string($con, $_POST['p_location']);
$time = date('H:i:s', strtotime($_POST['p_time']));
$days = $_POST['days'];
$day = serialize($days);


$sql="INSERT INTO tab_class (class, location, time, day, user)
VALUES ('$class', '".$location."', '$time', '".$day."', '".$loggedInUser."')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added<br><br>";
echo "If you are not automatically redirected in 5 seconds...<br><br>";
echo '<a href="http://schedulizer.web.engr.illinois.edu/main_menu.php">Go back to the main menu</a>';

mysqli_close($con);
?> 