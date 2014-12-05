<?php
header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/current_exams.php" );
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
$id = $_POST['newid'];


$sql="
UPDATE tab_exam
SET date='$newdate', grade='$newgrade', time='$newtime', location='$newlocation', exam_name='$newname ', class_name ='$class'
WHERE exam_id='$id'
";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

echo "Record Updated";




?>