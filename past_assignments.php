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



 



$result = mysqli_query($con,"SELECT * FROM tab_assignment WHERE due_date < curdate() AND user = '$loggedInUser'   ORDER BY due_date ASC");
?>
 
 
<html>
<head>
<style type='text/css'>
    #scroll {
    background-color: #00AAFF;
    width: 50%;
    height: 45%;
    overflow: scroll;
    posititon:absolute;
    margin-left:auto;
    margin-right:auto;
    margin-top: auto;
    left:0;
    right:0;
    margin-top:15%;
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

  	
  	<a href="http://schedulizer.web.engr.illinois.edu/home.php"><img src="images/blue_button.png" style=" position:absolute;
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
  	
  	
  	
  	<
   	
   	
   								
   	
  	
  	
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
  	
  	past Assignments
  	
  	
  	</div>
  	
  	
  	
  	
   	<div id="scroll">
   	
   	<table border="1" style="width:100%; font-size:25px;">
   	<?php
   	
   		echo"<tr>
		<th>Assignment</th>
		<th>Class</th>
		<th>Due Date</th>
		<th>Grade</th>
		</tr>";
	
		while($row = mysqli_fetch_array($result)) {
  		echo "<tr>";
 		 echo "<td>" . $row['assignment_name'] . "</td>";
 		 echo "<td>" . $row['class'] . "</td>";
 		  echo "<td>" . date("m/d/Y", strtotime($row['due_date'])) . "</td>";
 		echo "<td>" . $row['grade_received'] . "</td>";
 		 echo "</tr>";
		}
  		
  		?>
	</table>
   	
   	
   	<div style="text-align:center; font-size:20px;">
   	
   	<?php
	echo "<form action='update_assignment_grade.php' method='post'>";
	
	$sql = "SELECT * FROM tab_assignment WHERE due_date < curdate() AND user = '$loggedInUser'   ORDER BY due_date ASC";
	$result = mysqli_query($con, $sql);
	echo "<bR>Update Grade Received <br>";
	echo "<select name='id'>";
	
	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value="' . $row['assignment_id']  .  '">' . $row['class'] . ' ' . $row['assignment_name'] . '</option>';
		
	}
	echo "</select> ";
	
	 echo "   <input name='newgrade' value='" . $row['grade'] . "'> <br>";
	
	echo "<input type='submit'>";
	echo "</form>";
	?>
   	
   	</div>
   	
   	
   	</div>
   </div>
   
   
   
</div>
</body>
</html>