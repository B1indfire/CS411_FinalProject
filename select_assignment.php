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
$result = mysqli_query($con,"SELECT * FROM tab_assignment WHERE due_date >= curdate() AND user = '$loggedInUser' order by due_date");

?>
<body background="images/calander.jpg">
	
	<a href="http://schedulizer.web.engr.illinois.edu/current_assignments.php"><img src="images/blue_button.png" style=" position:absolute;
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
  	
  	edit an assignment
  	
  	
  	</div>
	
	
 	 <div class="content" style="position: absolute; margin-left:auto; margin-right:auto; top: 25%; left: 0%; right:0; width:25%; height:70%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px" >


	<div style="background-color: #00AAFF;
    width: 80%;
    height: 85%;
    overflow: scroll;
    posititon:absolute;
    margin-left:auto;
    margin-right:auto;
    margin-top: auto;
    left:0;
    right:0;
    margin-top:3%;
    margin-bottom:5%;
    overflow-x:hidden;">
<table border='1' style='width:100%; font-size:25px;'>

<?php

   	echo"<tr>
	<th>Assignment</th>
	</tr>";


while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['class'] . " " . $row['assignment_name'] . "</td>";
  echo "</tr>";
}

echo "</table>";
echo "<br>";
echo "</div>";







echo "<form action='edit_assignment.php' method='post'>";
$sql = "SELECT * FROM tab_assignment WHERE due_date >= curdate() AND user = '$loggedInUser' order by due_date";
$result = mysqli_query($con, $sql);

echo "<select name='id'>";

while ($row = mysqli_fetch_array($result))
{
    echo '<option value="' . $row['assignment_id']  .  '">' . $row['class'] . ' ' . $row['assignment_name'] . '</option>';
}
echo "</select><br>";
echo "<input type='submit'>";
echo "</form>";
?>