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
header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/profile.php" );
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$newname = $_POST['newname'];
$newemail = $_POST['newemail'];
$newphone = $_POST['newphone'];
$newstreet = $_POST['newstreet'];
$newcity = $_POST['newcity'];
$newstate = $_POST['newstate'];
$newzip = $_POST['newzip'];
$newtype = $_POST['newtype'];
$username = $_POST['newuser'];








$sql="
UPDATE tab_users
SET name='$newname', email='$newemail', phone='$newphone', street='$newstreet', city='$newcity', zip='$newzip',  state='$newstate'
WHERE username='$loggedInUser'
";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Record Updated";




?>