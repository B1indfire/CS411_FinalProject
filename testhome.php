<?php
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  

}
$usernameRequest = mysqli_query($con,"SELECT name FROM tab_users WHERE id = $LS->user");
$row = mysqli_fetch_array($usernameRequest);
$loggedInUser = $row['name'];

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
    height: 30%;
    overflow: scroll;
    padding: 10px;
    position: absolute;
    top:25%;
    left: 25%;
    border-radius: 25px;
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

  	
  	<div id= table_header>
  	<p>WELCOME BACK <?php echo $loggedInUser;?></p>
  	
  	
  	
  	</div>
  	
  	
   	<div id="scroll">
   	
   	<table border="1" style="width:100%; font-size:35px;">
 	 	<?php
 	 	echo "
		<tr>
		<th>Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Location</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
  		echo "<tr>";
 		 echo "<td>" . $row['name'] . "</td>";
 		 
 		 echo "<td>" . date("j/d/Y", strtotime($row['date'])) . "</td>";
 		 echo "<td>" . $row['time'] . "</td>";
 		 echo "<td>" . $row['location'] . "</td>";
 		 echo "</tr>";
		}
  		
  		?>
	</table>
   	
   	</div>
   </div>
   
   
   
</div>
</body>
</html>