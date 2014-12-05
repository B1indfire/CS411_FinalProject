<?php
header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/current_events.php" );
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$newdate = $_POST['newdate'];
$newlocation = $_POST['newlocation'];
$name = $_POST['namef'];
$newtime = $_POST['newtime'];

echo $namef;

$sql="
UPDATE tab_event
SET date='$newdate', location='$newlocation', time='$newtime'
WHERE name='$name'
";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Record Updated";




?>