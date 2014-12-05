<?php

require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();
//header( "refresh:2; url=http://schedulizer.web.engr.illinois.edu/main_menu.html" );



// escape variables for security

if(isset($_POST['act_login'])){
	$username = $_POST['p_username'];
	$password = $_POST['p_password'];
	$name = $_POST['p_name'];
	$email = $_POST['p_email'];
	$type = $_POST['p_type'];
	$state = $_POST['p_state'];
	$street = $_POST['p_street'];
	$zipcode = $_POST['p_zipcode'];
	$phone = $_POST['p_phone'];
	$city = $_POST['p_city'];

	
	$extraValues = array("email" => $email, "name" => $name, "type" => $type, "state" => $state, "street" => $street, "zip" => $zipcode, "phone" => $phone, "city" => $city);

	if($LS->register($username, $password, $extraValues)){
		echo "Created User!<br><br>";
		//echo "If you are not automatically redirected in 5 seconds...<br><br>";
		echo '<a href="http://schedulizer.web.engr.illinois.edu/login.php">Log In</a>';
	}
	else echo "nope";
}

?> 

<html>
<head>
<link rel="stylesheet" href="stuff.css">
</head>

	<body background="images/calander.jpg">
  <div class="content" style="position: absolute; top: 15%; left: 38%; width:25%; height:80%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px" >
  <br>
		<div style="font-size:25">Please fill out all fields</div><br>
		<form method="post">
			Username: <br><input type="text" name="p_username"><br>
			Password:<br> <input type="password" name="p_password"><br>
			Name: <br><input type="text" name="p_name"><br>
			Type: <br><select id="type" name="p_type">
				<option value="" style="color:#A9A9A9;">Select a User Type</option>
				<option value="Student">Student</option>
				<option value="Professor">Professor</option>
			</select><br>
			Street:<br> <input type="text" name="p_street"><br>
            		City: <br><input type="text" name="p_city"><br>
			State: <br><select id="state" name="p_state">
        			<option value="" style="color:#A9A9A9;">Select a State</option>
	                	<option value="AL" class="optionSelect">Alabama</option>
		                <option value="AK" class="optionSelect">Alaska</option>
	        	        <option value="AZ" class="optionSelect">Arizona</option>
	                	<option value="AR" class="optionSelect">Arkansas</option>
	                	<option value="CA" class="optionSelect">California</option>
		                <option value="CO" class="optionSelect">Colorado</option>
		                <option value="CT" class="optionSelect">Connecticut</option>
		                <option value="DE" class="optionSelect">Delaware</option>
		                <option value="DC" class="optionSelect">District of Columbia</option>
		                <option value="FL" class="optionSelect">Florida</option>
		                <option value="GA" class="optionSelect">Georgia</option>
		                <option value="HI" class="optionSelect">Hawaii</option>
		                <option value="ID" class="optionSelect">Idaho</option>
		                <option value="IL" class="optionSelect">Illinois</option>
		                <option value="IN" class="optionSelect">Indiana</option>
		                <option value="IA" class="optionSelect">Iowa</option>
		                <option value="KS" class="optionSelect">Kansas</option>
		                <option value="KY" class="optionSelect">Kentucky</option>
		                <option value="LA" class="optionSelect">Louisiana</option>
		                <option value="ME" class="optionSelect">Maine</option>
		                <option value="MD" class="optionSelect">Maryland</option>
		                <option value="MA" class="optionSelect">Massachusetts</option>
		                <option value="MI" class="optionSelect">Michigan</option>
		                <option value="MN" class="optionSelect">Minnesota</option>
		                <option value="MS" class="optionSelect">Mississippi</option>
		                <option value="MO" class="optionSelect">Missouri</option>
		                <option value="MT" class="optionSelect">Montana</option>
		                <option value="NE" class="optionSelect">Nebraska</option>
		                <option value="NV" class="optionSelect">Nevada</option>
		                <option value="NH" class="optionSelect">New Hampshire</option>
		                <option value="NJ" class="optionSelect">New Jersey</option>
		                <option value="NM" class="optionSelect">New Mexico</option>
		                <option value="NY" class="optionSelect">New York</option>
		                <option value="NC" class="optionSelect">North Carolina</option>
		                <option value="ND" class="optionSelect">North Dakota</option>
		                <option value="OH" class="optionSelect">Ohio</option>
		                <option value="OK" class="optionSelect">Oklahoma</option>
		                <option value="OR" class="optionSelect">Oregon</option>
		                <option value="PA" class="optionSelect">Pennsylvania</option>
		                <option value="RI" class="optionSelect">Rhode Island</option>
		                <option value="SC" class="optionSelect">South Carolina</option>
		                <option value="SD" class="optionSelect">South Dakota</option>
		                <option value="TN" class="optionSelect">Tennessee</option>
		                <option value="TX" class="optionSelect">Texas</option>
		                <option value="UT" class="optionSelect">Utah</option>
		                <option value="VT" class="optionSelect">Vermont</option>
		                <option value="VA" class="optionSelect">Virginia</option>
		                <option value="WA" class="optionSelect">Washington</option>
		                <option value="WV" class="optionSelect">West Virginia</option>
		                <option value="WI" class="optionSelect">Wisconsin</option>
		                <option value="WY" class="optionSelect">Wyoming</option>
              
            		</select><br>
			Zip Code:<br> <input type="number" name="p_zipcode"><br>
			Phone:<br> <input type="tel" name="p_phone"><br>
			Email: <br><input type="email" name="p_email"><br>
			<button name="act_login">Register</button>
		</form>
	</body>
</html>