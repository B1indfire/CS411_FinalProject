			
<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT username FROM tab_people";
$result = mysqli_query($con, $sql);

echo "<select name='user'>";
while ($row = mysqli_fetch_array($result))
{
    echo "<option value=" . $row['username'] . ">" . $row['username'] . "</option>";
}
echo "</select><br>";









