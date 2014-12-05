<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345","scheduli_data");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security

$username = mysqli_real_escape_string($con, $_POST['p_username']);
$tempsql="
SELECT *
FROM tab_people
WHERE username='$username'";

//echo $username;

$result=mysqli_query($con, $tempsql);
//echo $result;

if(!$result)
{ 
	die('Could not get username: ' . mysql_error());
}

$name = mysqli_real_escape_string($con, $_POST['p_name']);
if(is_null('$name'))
{
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		echo $name;
	}
}

$type = mysqli_real_escape_string($con, $_POST['p_type']);
if($type=="")
{
	while($row=mysqli_fetch_array($result))
	{
		$type=$row['type'];
	}
}

$state = mysqli_real_escape_string($con, $_POST['p_state']);
if($state=='')
{
	while($row=mysqli_fetch_array($result))
	{
		$state=$row['state'];
		echo $state;
	}
}

$street = mysqli_real_escape_string($con, $_POST['p_street']);
if($street=='')
{
	while($row=mysqli_fetch_array($result))
	{
		$street=$row['street'];
		echo $street;
	}
}

$zipcode = mysqli_real_escape_string($con, $_POST['p_zipcode']);
if($zipcode=='')
{
	while($row=mysqli_fetch_array($result))
	{
		$zipcode=$row['zip'];
		echo $zipcode;
	}
}

$phone = mysqli_real_escape_string($con, $_POST['p_phone']);
if($phone=='')
{
	while($row=mysqli_fetch_array($result))
	{
		$phone=$row['phone'];
		echo $phone;
	}
}

$email = mysqli_real_escape_string($con, $_POST['p_email']);
if($email=='')
{
	while($row=mysqli_fetch_array($result))
	{
		$email=$row['email'];
		echo $email;
	}
}

$city = mysqli_real_escape_string($con, $_POST['p_city']);
if($city=='')
{
	while($row=mysqli_fetch_array($result))
	{
		$city=$row['city'];
		echo $city;
	}
}




$sql="
UPDATE tab_people
SET name='$name', email='$email', phone='$phone', street='$street', city='$city', zip='$zipcode', type='$type', state='$state'
WHERE username='$username'
";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?> 