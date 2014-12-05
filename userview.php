<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<link rel='stylesheet' href='stuff.css'>";
echo "<div id='main_menu'>";
$result = mysqli_query($con,"SELECT * FROM tab_people where username != ''");

echo "<table border='1' align='center'>
<tr>
<th>Username</th>
<th>Name</th>
<th>Email</th>
<th>Phone>/th>
<th>Street</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Type</th>


</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['phone'] . "</td>";
  echo "<td>" . $row['street'] . "</td>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['state'] . "</td>";
  echo "<td>" . $row['zip'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "</tr>";
}

echo "</table>";
echo "<br>";
?>