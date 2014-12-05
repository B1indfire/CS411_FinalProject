<?php
header( "refresh:.5; url=http://schedulizer.web.engr.illinois.edu/past_assignments.php" );
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$newdate = $_POST['newdate'];
$newclass = $_POST['newclass'];
$name = $_POST['newname'];
$newgrade = $_POST['newgrade'];
$id = $_POST['id'];

$sql="
UPDATE tab_assignment
SET grade_received='$newgrade'
WHERE assignment_id='$id'
";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Record Updated";




?>