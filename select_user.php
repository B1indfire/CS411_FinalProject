<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM tab_people where username != '' order by username");

echo "<table border='1'>
<tr>
<th>Username</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "</tr>";
}

echo "</table>";
echo "<br>";








echo "<form action='edit_user_data.php' method='post'>";
$sql = "SELECT username FROM tab_people where username !=''";
$result = mysqli_query($con, $sql);

echo "<select name='user'>";

while ($row = mysqli_fetch_array($result))
{
    echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
}
echo "</select><br>";
echo "<input type='submit'>";
echo "</form>";
?>