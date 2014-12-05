<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM tab_people where username != ''");

echo "<table border='1'>
<tr>
<th>Username</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
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







echo "Delete a user";
echo "<form action='delete_user.php' method='post'>";
$sql = "SELECT username FROM tab_people where username !=''";
$result = mysqli_query($con, $sql);

echo "<select name='user'>";

while ($row = mysqli_fetch_array($result))
{
    echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
    /*echo "<option value=" . $row['name'] . ">" . $row['name'] . "</option>";
    echo "<option value=" . $row['email'] . ">" . $row['email'] . "</option>";
    echo "<option value=" . $row['phone'] . ">" . $row['phone'] . "</option>";
    echo "<option value=" . $row['street'] . ">" . $row['street'] . "</option>";
    echo "<option value=" . $row['city'] . ">" . $row['city'] . "</option>";
    echo "<option value=" . $row['state'] . ">" . $row['state'] . "</option>";
    echo "<option value=" . $row['zip'] . ">" . $row['name'] . "</option>";
    echo "<option value=" . $row['type'] . ">" . $row['type'] . "</option>";*/
}
echo "</select><br>";

echo "<input type='submit' value='Delete'>";
echo "</form>";


echo '<a href="http://schedulizer.web.engr.illinois.edu/main_menu.php">Go back to the main menu</a>';
?>