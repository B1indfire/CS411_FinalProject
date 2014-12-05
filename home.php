<?php
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  

}
$usernameRequest = mysqli_query($con,"SELECT * FROM tab_users WHERE id = $LS->user");
$row = mysqli_fetch_array($usernameRequest);
$loggedInUser = $row['username'];
$loggedInName = $row['name'];

?>
<?php



 



$result = mysqli_query($con,"SELECT name, date, time, location FROM tab_event WHERE date > NOW()  ORDER BY date ASC");
?>
 
 
 <html>
<head>




<style type='text/css'>
    #scroll {
    background-color: #00AAFF;
    width: 50%;
    height: 20%;
    overflow: scroll;
    posititon:absolute;
    margin-left:auto;
    margin-right:auto;
    margin-top: auto;
    left:0;
    right:0;
    margin-top:37%;
    overflow-x:hidden;
	}

    #table_header {
    text-transform: uppercase;
    font-weight:bold;
   
    padding:1px;
    text-align:center;
    font-size:35px;
    position:absolute;
    margin-left:auto;
    margin-right:auto;
    left:0;
    right:0;
    top:6%;
    pointer-events:none;
	}
	 #option1 {
    text-transform: uppercase;
    font-weight:bold;
   
    padding:1px;
    text-align:center;
    font-size:25px;
    position:absolute;
    margin-left:auto;
    margin-right:auto;
    left:0;
    right:0;
    top:22.5%;
        pointer-events:none;
	}
	 #option2_left {
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
    top:32.5%;
    pointer-events:none;
	}
	
	 #option2_right {
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
    top:32.5%;
    pointer-events:none;
	}
	 #option3_right {
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
    top:42.5%;
    pointer-events:none;
    
	}
	#option3_left {
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
    top:42.5%;
    pointer-events:none;
    
	}
	
#option4_right {
    text-transform: uppercase;
    font-weight:bold;
    font-size:25px;
    padding:1px;
    text-align:center;
   
    position:absolute;
    margin-left:auto;
    margin-right:auto;
    left:30%;
    right:0;
    top:52.5%;
    pointer-events:none;
    
	}
	#option4_left {
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
    top:52.5%;
    pointer-events:none;
    
	}
	
#option5 {
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
    top:62.5%;
    pointer-events:none;
    
	}
	
	#option7 {
    text-transform: uppercase;
    font-weight:bold;
    
    padding:1px;
    text-align:center;
    font-size:25px;
    position:absolute;
    margin-left:auto;
    margin-right:auto;
    left:63%;
    right:0%;
    top:81%;
   
    pointer-events:none;
    
	}

   html, body {height: 100%; margin: 0}
  
</style>
</head>
<body background="images/calander.jpg">


	


	<img src="images/red_button.png" border = "0" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0%;
  								right:0;
   								top:6%;
   								height:18%;
   								width:52%;
   								">
   								
   	<a href="view_class.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:0;
   								top:25%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="past_assignments.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:30%;
  								right:0;
   								top:35%;
   								height:8%;
   								width:28%;
   								"></a>
   	<a href="current_assignments.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:30%;
   								top:35%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="past_exams.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:30%;
  								right:0;
   								top:45%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="current_exams.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:30%;
   								top:45%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="past_events.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:30%;
  								right:0;
   								top:55%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="current_events.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:30%;
   								top:55%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="profile.php"><img src="images/yellow_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:0;
  								right:0;
   								top:65%;
   								height:8%;
   								width:28%;
   								"></a>
   								
   	<a href="bus_sched.php"><img src="images/green_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:65%;
  								right:0;
   								top:80%;
   								height:16%;
   								width:15%;
   								"></a>
   								
   	<a href="http://schedulizer.web.engr.illinois.edu/logout.php"><img src="images/blue_button.png" style=" position:absolute;
   								margin-left:auto;
  								margin-right:auto;
  								left:92%;
  								right:0%;
   								top:1%;
   								height:40px;
   								width:150px;
   								"> </a>
   								
   								
   								
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
  		  top:3%;
 		   pointer-events:none;"> 
	
	
	log out
	
	</div>
   								
   								
   	

  	
  	<div id= table_header>
  	<p>WELCOME BACK <?php echo $loggedInName;?></p>
  	</div>
  	
  	
  	
  	<div id= option1>
  	<p>Classes</p>
  	</div>
  	
  	<div id= option2_right>
  	<p> Current Assignments </p>
  	</div>
  	
  	<div id= option2_left>
  	<p> Past Assignments </p>
  	</div>
  	
  	<div id= option3_right>
  	<p>Past Exams </p>
  	</div>
  	
  	<div id= option3_left>
  	<p>Current Exams </p>
  	</div>
  	
  	<div id= option4_right>
  	<p>Past Events </p>
  	</div>
  	
  	
  	<div id= option4_left>
  	<p>Current Events</p>
  	</div>
  	
  	<div id= option5>
  	<p> Edit Profile<p>
  	</div>
  	
  	<div id= option7>
  	<p> Grab a Bus!<p>
  	</div>
  	
  	
 
   	
   	</div>
   </div>
   
   <div id="scroll">
   	
   	<table border="1" style="width:100%; font-size:15px;">
   	<?php 
   	$today = date("l");

$result = mysqli_query($con,"(SELECT name AS name1, location AS location1, date AS date1, time AS time1, Type AS type1 FROM tab_event WHERE user = '$loggedInUser' AND date = curdate() AND time >= now())
			UNION (SELECT class, location, day, time, Type FROM tab_class WHERE user = '$loggedInUser' AND day LIKE '%$today%' AND time >= now())
			UNION (SELECT concat(class_name, ' ', exam_name), location, date, time, Type FROM tab_exam WHERE user = '$loggedInUser' AND date = curdate() AND time >= now())

			ORDER BY time1
			");

//echo "<h3>View all upcoming events for today!</h3>";



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
   
   
</div>
</body>
</html>