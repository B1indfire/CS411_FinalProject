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



 



$result = mysqli_query($con,"SELECT * FROM tab_assignment WHERE due_date >= curdate() AND user = '$loggedInUser'   ORDER BY due_date ASC");
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
  	
  	
  	
  	<a href="select_assignment.php"><img src="images/green_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:30%;
   								top:65%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="view_assignment.php"><img src="images/green_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:30%;
  								right:0;
   								top:65%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="insert_assignment.html"><img src="images/green_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:0%;
   								top:79%;
   								height:8%;
   								width:28%;
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
  	
  	Upcoming Assignments
  	
  	
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
  		  left:30%;
  		  right:0;
  		  top:67.5%;
 		   pointer-events:none;"> 
	
	
	Remove Assignment
	
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
  		  right:30%;
  		  top:67.5%;
 		   pointer-events:none;"> 
	
	
	Edit Assignments
	
	</div>
	
	
	
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
  		  top:81.5%;
 		   pointer-events:none;"> 
	
	
	add new Assignment
	
	</div>
  	
  	
  	
  	
   	<div id="scroll">
   	
   	<table border="1" style="width:100%; font-size:25px;">
   	<?php
   	
   	echo"<tr>
	<th>Assignment</th>
	<th>Class</th>
	<th>Due Date</th>
	</tr>";
   	

		while($row = mysqli_fetch_array($result)) {
  		echo "<tr>";
 		 echo "<td>" . $row['assignment_name'] . "</td>";
 		 echo "<td>" . $row['class'] . "</td>";
 		  echo "<td>" . date("m/d/Y", strtotime($row['due_date'])) . "</td>";
 		
 		 echo "</tr>";
		}
  		
  		?>
	</table>
   	
   	</div>
   </div>
   
   
   
</div>
</body>
</html>