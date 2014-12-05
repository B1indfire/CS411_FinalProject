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
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$today = date("l");

$result = mysqli_query($con,"(SELECT name AS name1, location AS location1, date AS date1, time AS time1, Type AS type1 FROM tab_event WHERE user = '$loggedInUser' AND date = curdate() AND time >= now())
			UNION (SELECT class, location, day, time, Type FROM tab_class WHERE user = '$loggedInUser' AND day LIKE '%$today%' AND time >= now())
			UNION (SELECT concat(class_name, ' ', exam_name), location, date, time, Type FROM tab_exam WHERE user = '$loggedInUser' AND date = curdate() AND time >= now())

			ORDER BY time1
			");

echo "<h3>View all upcoming events for today!</h3>";

	echo "<table border='1' font-size:25px;'>";

   	echo"<tr>
	<th>Occasion</th>
	<th>Type of Occasion</th>
	<th>Location</th>
	<th>Date</th>
	<th>Time</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $row['name1'] . "</td>";
	  echo "<td>" . $row['type1'] . "</td>";
	  echo "<td>" . $row['location1'] . "</td>";
	  if(strcmp("a:", substr($row['date1'], 0, 2)) == 0){ //check if it is a Class, which doesnt use date
	  	echo "<td>" . date("Y-m-d") . "</td>";
	  }
	  else {
	  	echo "<td>" . $row['date1'] . "</td>";
	  }
	  echo "<td>" . $row['time1'] . "</td>";
	  echo "</tr>";
	}
	
	echo "</table>";


?>

