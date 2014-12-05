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

$id = $_POST['id'];



$sql = "SELECT * FROM tab_assignment WHERE assignment_id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result)



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
  	
  	edit  <?php echo $row['class'] . " " . $row['assignment_name']; ?>
  	
  	
  	</div>
	
	
 	  <div class="content" style="position: absolute; margin-left:auto; margin-right:auto; top: 35%; left: 0%; right:0; width:25%; height:28%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px" >








<?php




echo "<form action='update_assignment.php' method='post'>";



    echo "<br>Assignment Name <br> <input name='newname' value='" . $row['assignment_name'] . "'>  <br>";
    echo "Due Date<br>             <input type='date' name='newdate' value='" . $row['due_date'] . "'>  <br>";
    echo "Class<br>                <input name='newclass' value='" . $row['class'] . "'> <br>";
    echo "                         <input type = 'hidden' name='newgrade' value='" . $row['grade_received'] . "'>  <br>";
     echo "<input type='hidden' name='newid' value='" . $row['assignment_id'] . "'>";



echo "<input type='submit'>";
echo "</form>";


?>