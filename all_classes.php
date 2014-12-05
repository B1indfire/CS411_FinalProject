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
$loggedInName = $row['name'];

?>
<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM tab_class Where user = '$loggedInUser'");
?>



<html>
<head>
<style type='text/css'>
    #scroll {
    background-color: #00AAFF;
    width: 50%;
    height: 30%;
    overflow: scroll;
    posititon:absolute;
    margin-left:auto;
    margin-right:auto;
    margin-top: auto;
    left:0;
    right:0;
    margin-top:13%;
    overflow-x:hidden;
    
	}

    #table_header {
   
   
    
    text-transform: uppercase;
    font-weight:bold;
    position:relitive;
    padding:1px;
    text-align:center;
  
    font-size:45px;
	}
   html, body {height: 100%; margin: 0}
  
</style>
</head>
<body background="images/calander.jpg">

  	
  	<a href="http://schedulizer.web.engr.illinois.edu/view_class.php"><img src="images/blue_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:92%;
  								right:0%;
   								top:1%;
   								height:40px;
   								width:150px;
   								"></a>
   								
   								
   								
   	<div style="
  		  text-transform: uppercase;
   		 font-weight:bold;
   		 padding:1px;
  		  text-align:center;
  		  color:white;
   		 font-size:15px;
  		  position:absolute;
  		  margin-left:auto;
  		  margin-right:auto;
  		  left:92%;
  		  right:0;
  		  top:2.3%;
 		   pointer-events:none;"> 
	
	
	go back
	
	</div>
  	
  	
  	
  	
  	
  	
  	
  	<img src="images/red_button.png" border = "0" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0%;
  								right:0;
   								top:6%;
   								height:18%;
   								width:52%;
   								">
  	
  	
  	
  	<a href="insert_class.html"><img src="images/green_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:0%;
   								top:65%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	
   								
   	
   								"></a>
   
   	
   	<div style="
  		  text-transform: uppercase;
   		 font-weight:bold;
   		 padding:1px;
  		  text-align:center;
   		 font-size:45px;
  		  position:absolute;
  		  margin-left:auto;
  		  margin-right:auto;
  		  left:0;
  		  right:0;
  		  top:10%;
 		   pointer-events:none;"> 
  	
  	all Classes
  	
  	
  	</div>
   	
   	
   	
   	
   	
   								
   	
  	
  	
  	
  	
	
  	<div style="
  		  text-transform: uppercase;
   		 font-weight:bold;
   		 padding:1px;
  		  text-align:center;
   		 font-size:25px;
  		  position:absolute;
  		  margin-left:auto;
  		  margin-right:auto;
  		  left:0;
  		  right:0%;
  		  top:67.5%;
 		   pointer-events:none;"> 
	
	
	Add a class
	
	</div>
	
	
	
	</div>
	
	
  	
  	
  	
   	<div id="scroll">
   	
   	






<table border="1" style="width:100%; font-size:25px;">
<?php

echo"
<tr>
<th>Class</th>
<th>Location</th>
<th>Days</th>
<th>Time</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['class'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>";
  	$arr = unserialize($row['day']);
  	$num = count($arr);
  	$i = 0;
	foreach($arr as $val){
		echo htmlspecialchars($val);
		if(++$i != $num) echo ", ";
	}
  echo "</td>";
 echo "<td>" . date("g:i A",strtotime($row['time'])) . "</td>";

  echo "</tr>";
}

echo "</table>";
echo "<br>";
?>

<div style="text-align:center; font-size:20px">

<?php
echo "Delete a Class";
echo "<form action='delete_class.php' method='post'>";
$sql = "SELECT class, class_id FROM tab_class where user = '$loggedInUser'";
$result = mysqli_query($con, $sql);

echo "<select name='id'>";

while ($row = mysqli_fetch_array($result))
{
	echo '<option value="' . $row['class_id'] . '">' . $row['class'] . ' </option>';
}
echo "</select>";

echo "<input type='submit' value='Delete'>";
echo "</div>";
echo "</form>";



/*
$today = date("l"); 	//gets the day of the for the current day (ex: Monday, Tuesday, Wednesday, etc)
//echo "<h2>Only classes that you have today, ". $today. "!</h2>";

$result = mysqli_query($con,"SELECT * FROM tab_class where user = '$loggedInUser'");

while($row = mysqli_fetch_array($result)){
	$arr = unserialize($row['day']);		//unserialize the stored data into an array of strings. Each array entry is a string now.
	foreach($arr as $val){				//loops through the entire array, setting each new entry as the variable $val
		if(strcmp($today, $val) == 0){		//if the day of the week today matches one of the days you have a class
			//echo "<h4>You have " . $row['class'] . " today, " . $today . ", in " . $row['location'] . " at " . $row['time'] . ".</h4>";
		}
	}
}
?>

<table border="1" style="width:100%; font-size:25px;">

<?php

echo"<tr>
<th>Class</th>
<th>Location</th>
<th>Day</th>
<th>Time</th>

</tr>";

$result = mysqli_query($con,"SELECT * FROM tab_class where user = '$loggedInUser'");
while($row = mysqli_fetch_array($result)){
	$arr = unserialize($row['day']);		//unserialize the stored data into an array of strings. Each array entry is a string now.
	foreach($arr as $val){				//loops through the entire array, setting each new entry as the variable $val
		if(strcmp($today, $val) == 0){		//if the day of the week today matches one of the days you have a class
			  echo "<tr>";
			  echo "<td>" . $row['class'] . "</td>";
			  echo "<td>" . $row['location'] . "</td>";
			  echo "<td>" . $val . "</td>"; //$today would also work in place of $val.
			 echo "<td>" . date("g:i A",strtotime($row['time'])) . "</td>";
			
			  echo "</tr>";
		}
	}
}

echo "</table>";
*/
echo "<br><br>";

//echo '<a href="http://schedulizer.web.engr.illinois.edu/main_menu.php">Go back to the main menu</a>';
?>