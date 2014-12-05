<?php
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();

$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  

}
if(isset($_POST['act_submit'])){
	$place = mysqli_real_escape_string($con, $_POST['p_place']);

	
	//GET USERNAME AND USER'S NAME
	$usernameRequest = mysqli_query($con,"SELECT name, username FROM tab_users WHERE id = $LS->user");
	$row = mysqli_fetch_array($usernameRequest);
	$loggedInUser = $row['name'];
	$loggedInUsername = $row['username'];
	
	//GET ADDRESS/DESTINATION OF THE HOME ADDRESS
	$homeAddress = $place;
	
	//PREPARE THE ADDRESS TO BE SENT VIA URL
	$homeAddress = str_replace(' ','+',$homeAddress);
	
	//USE GOOGLE API TO GET LAT AND LONG OF HOME ADDRESS
	$homeGeocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $homeAddress . 'Champaign,IL&sensor=false');
	$homeOutput= json_decode($homeGeocode);
	
	$homeLat = $homeOutput->results[0]->geometry->location->lat;
	$homeLong = $homeOutput->results[0]->geometry->location->lng;
	
	//GET ADDRESS/DESTINATION OF THE DESTINATION ADDRESS
	$today = date("l");
	$destAddressRequest = $result = mysqli_query($con,"(SELECT name AS name1, location AS location1, date AS date1, time AS time1, Type AS type1 FROM tab_event WHERE user = '$loggedInUsername' AND date = curdate() AND time >= now())
				UNION (SELECT class, location, day, time, Type FROM tab_class WHERE user = '$loggedInUsername' AND day LIKE '%$today%' AND time >= now())
				UNION (SELECT concat(class_name, ' ', exam_name), location, date, time, Type FROM tab_exam WHERE user = '$loggedInUsername' AND date = curdate() AND time >= now())
	
				ORDER BY time1
				");		
				
	if($destAddressRequest){//HERE BE DRAGONS FIX THIS IF STATEMENT SO THAT IT IS TRUE WHEN THERE IS AN EVENT
		$destRow = mysqli_fetch_array($destAddressRequest);
		$destAddress = $destRow['location1'];
		}
	else {
		echo "No events";
		exit;
	}
	
	$resultAddress=$destAddress;

	
	//PREPARE THE ADDRESS TO BE SENT VIA URL
	$destAddress = str_replace(' ','+',$destAddress);
	
	//USE GOOGLE API TO GET LAT AND LONG OF DEST ADDRESS
	$destGeocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $destAddress . 'Champaign,IL&sensor=false');
	$destOutput= json_decode($destGeocode);
	
	$destLat = $destOutput->results[0]->geometry->location->lat;
	$destLong = $destOutput->results[0]->geometry->location->lng;
	
	
	$currtime = date("H:i");
	
	//PLUG LAT AND LONGS INTO THE CUMTD API
	$routeJson = file_get_contents('https://developer.cumtd.com/api/v2.2/json/GetPlannedTripsByLatLon?key=0023d1c244bf4e9fbfe5da8213a5a9d8&origin_lat=' . $homeLat . '&origin_lon=' . $homeLong . '&destination_lat=' . $destLat 	. '&destination_lon=' . $destLong . '&time=' . $currtime . '&max_walk=9999');
	$routeOutput = json_decode($routeJson);
	
	//PARSE THAT JSON $bus_->trip->direction .
	if(!strcmp($routeOutput->status->msg, 'ok') == 0){
		echo $routeOutput->status->msg;
	}
	else {
	echo "<body background='images/calander.jpg'>";

?>


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
  	
  	Catch a Bus From <?php echo $homeAddress;?>
  	
  	
  	</div> 								





<?php




echo "<div class='content' style='position: absolute; top: 25%;font-size : 25; left: 38%; width:25%; height:48%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px' >";
	
		foreach($routeOutput->itineraries[0]->legs as &$obj_){
			if(strcmp($obj_->type, "Walk") ==0){
				if(!strpos($obj_->walk->end->name, '.'))
					echo 'Walk ' . $obj_->walk->distance . ' miles ' . $obj_->walk->direction . ' to ' . $obj_->walk->end->name . '.<br>';
				else echo 'Walk ' . $obj_->walk->distance . ' miles ' . $obj_->walk->direction . ' to ' . $resultAddress . '.<br>';
			}
			if(strcmp($obj_->type, "Service") == 0){
				foreach($obj_->services as &$bus_){
					if(!strpos($bus_->end->name, '.'))
						echo 'Take the ' . $bus_->route->route_id . ' ' . $bus_->trip->direction . ' from ' . $bus_->begin->name . ' to ' . $bus_->end->name . '.<br>';
					else echo 'Take the ' . $bus_->route->route_id . ' ' . $bus_->trip->direction . ' from ' . $bus_->begin->name . ' to ' . $resultAddress . '.<br>';
				}
			}
		}	
	}
}
//echo $routeJson;
?>
