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
<body background="images/calander.jpg">
	
	<a href="http://schedulizer.web.engr.illinois.edu/current_events.php"><img src="images/blue_button.png" style=" position:absolute;
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
   								height:130px;
   								width:800px;
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
  	
  	edit  <?php echo $_POST['name']; ?>
  	
  	
  	</div>
	
	
 	  <div class="content" style="position: absolute; margin-left:auto; margin-right:auto; top: 35%; left: 0%; right:0; width:25%; height:28%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px" >








<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name = $_POST['name'];

echo "<form action='update_event.php' method='post'>";


$sql = "SELECT * FROM tab_event WHERE name='$name' AND user = '$loggedInUser' ";
$result = mysqli_query($con, $sql);

//echo "$name";

while ($row = mysqli_fetch_array($result))
{
    echo " <br> <input type='hidden' name='namef' value='" . $row['name'] . "'> <br>";
    echo " Date <br> <input type='date' name='newdate' value='" . $row['date'] . "'> <br>";
    echo "Location  <br><input name='newlocation' value='" . $row['location'] . "'> <br>";
    echo "Time <br> <input type='time' name='newtime' value='" . $row['time'] . "'>  <br>";

}

echo "<input type='submit'>";
echo "</form>";


?>