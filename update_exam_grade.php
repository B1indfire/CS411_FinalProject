<?php
header( "refresh:1; url=http://schedulizer.web.engr.illinois.edu/past_exams.php" );
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$newdate = $_POST['newdate'];
$class = $_POST['newclass'];
$newname = $_POST['newname'];
$newgrade = $_POST['newgrade'];
$newtime = $_POST['newtime'];
$newlocation = $_POST['newlocation'];
$id = $_POST['id'];


$sql="
UPDATE tab_exam
SET  grade='$newgrade'
WHERE exam_id='$id'
";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

echo "Record Updated";




?>