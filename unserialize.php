<?php

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "SELECT * FROM tab_class";
$result = mysqli_query($con, $sql);

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


while ($row = mysqli_fetch_array($result)){
	if(!unserialize($row['day'])) {echo 'cannot unserialize '; echo $row['class']; echo '<br>';}	//checks if null or an error with serialized array
	
	else{ 												//Unserializes and print the array
		echo $row['class']; 
		$arr = unserialize($row['day']); 
		foreach($arr as $val)
			echo htmlspecialchars($val);
		echo '<br>';
	}
}

?>