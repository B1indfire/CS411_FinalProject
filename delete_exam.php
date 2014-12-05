<?php
header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/view_exam.php" );

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Takes passed in username
$id = $_POST['id'];
echo $id;



$sql = "DELETE FROM tab_exam WHERE exam_id='$id'";
$result = mysqli_query($con, $sql);

echo "Exam deleted.<br><br>";
echo "If you are not automatically redirected in 5 seconds...<br><br>";
echo '<a href="http://schedulizer.web.engr.illinois.edu/view_exam.php">Go back to the view menu.</a>';

mysqli_close($con);
?>