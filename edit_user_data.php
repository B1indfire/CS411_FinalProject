<?php
$con=mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","scheduli_d","12345", "scheduli_data");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$userf =$_POST['user'];
//echo "<h1>'$userf'</h1>";
echo "<form action='update_user.php' method='post'>";

$sql = "SELECT * FROM tab_people WHERE username='$userf'";
$result = mysqli_query($con, $sql);


while ($row = mysqli_fetch_array($result))
{
    echo "<input name='newuser' value='" . $row['username'] . "'> Username <br>";
    echo "<input name='newname' value='" . $row['name'] . "'> Name <br>";
    echo "<input name='newemail' value='" . $row['email'] . "'> Email <br>";
    echo "<input name='newphone' value='" . $row['phone'] . "'> Phone <br>";
    echo "<input name='newstreet' value='" . $row['street'] . "'>  Street  <br>";
    echo "<input name='newcity' value='" . $row['city'] . "'> City <br>";
    //echo "<input name='newstate' value='" . $row['state'] . "'> State <br>";
    echo "<select id='state' selected='" . $row['state'] . "' name='newstate'>";
    echo "<option value='' style='color:#A9A9A9;'>Select a User State</option>";
if($row['state'] == 'AL'){
echo "<option selected='selected' value='AL'>AL</option>";
}
else
{echo "<option value='AL'>AL</option>";}
if($row['state'] == 'AK'){
echo "<option selected='selected' value='AK'>AK</option>";
}
else
{echo "<option value='AK'>AK</option>";}
if($row['state'] == 'AZ'){
echo "<option selected='selected' value='AZ'>AZ</option>";
}
else
{echo "<option value='AZ'>AZ</option>";}
if($row['state'] == 'AR'){
echo "<option selected='selected' value='AR'>AR</option>";
}
else
{echo "<option value='AR'>AR</option>";}
if($row['state'] == 'CA'){
echo "<option selected='selected' value='CA'>CA</option>";
}
else
{echo "<option value='CA'>CA</option>";}
if($row['state'] == 'CO'){
echo "<option selected='selected' value='CO'>CO</option>";
}
else
{echo "<option value='CO'>CO</option>";}
if($row['state'] == 'CT'){
echo "<option selected='selected' value='CT'>CT</option>";
}
else
{echo "<option value='CT'>CT</option>";}
if($row['state'] == 'DE'){
echo "<option selected='selected' value='DE'>DE</option>";
}
else
{echo "<option value='DE'>DE</option>";}
if($row['state'] == 'FL'){
echo "<option selected='selected' value='FL'>FL</option>";
}
else
{echo "<option value='FL'>FL</option>";}
if($row['state'] == 'GA'){
echo "<option selected='selected' value='GA'>GA</option>";
}
else
{echo "<option value='GA'>GA</option>";}
if($row['state'] == 'HI'){
echo "<option selected='selected' value='HI'>HI</option>";
}
else
{echo "<option value='HI'>HI</option>";}
if($row['state'] == 'ID'){
echo "<option selected='selected' value='ID'>ID</option>";
}
else
{echo "<option value='ID'>ID</option>";}
if($row['state'] == 'IL'){
echo "<option selected='selected' value='IL'>IL</option>";
}
else
{echo "<option value='IL'>IL</option>";}
if($row['state'] == 'IN'){
echo "<option selected='selected' value='IN'>IN</option>";
}
else
{echo "<option value='IN'>IN</option>";}
if($row['state'] == 'IA'){
echo "<option selected='selected' value='IA'>IA</option>";
}
else
{echo "<option value='IA'>IA</option>";}
if($row['state'] == 'KS'){
echo "<option selected='selected' value='KS'>KS</option>";
}
else
{echo "<option value='KS'>KS</option>";}
if($row['state'] == 'KY'){
echo "<option selected='selected' value='KY'>KY</option>";
}
else
{echo "<option value='KY'>KY</option>";}
if($row['state'] == 'LA'){
echo "<option selected='selected' value='LA'>LA</option>";
}
else
{echo "<option value='LA'>LA</option>";}
if($row['state'] == 'ME'){
echo "<option selected='selected' value='ME'>ME</option>";
}
else
{echo "<option value='ME'>ME</option>";}
if($row['state'] == 'MD'){
echo "<option selected='selected' value='MD'>MD</option>";
}
else
{echo "<option value='MD'>MD</option>";}
if($row['state'] == 'MA'){
echo "<option selected='selected' value='MA'>MA</option>";
}
else
{echo "<option value='MA'>MA</option>";}
if($row['state'] == 'MI'){
echo "<option selected='selected' value='MI'>MI</option>";
}
else
{echo "<option value='MI'>MI</option>";}
if($row['state'] == 'MN'){
echo "<option selected='selected' value='MN'>MN</option>";
}
else
{echo "<option value='MN'>MN</option>";}
if($row['state'] == 'MS'){
echo "<option selected='selected' value='MS'>MS</option>";
}
else
{echo "<option value='MS'>MS</option>";}
if($row['state'] == 'MO'){
echo "<option selected='selected' value='MO'>MO</option>";
}
else
{echo "<option value='MO'>MO</option>";}
if($row['state'] == 'MT'){
echo "<option selected='selected' value='MT'>MT</option>";
}
else
{echo "<option value='MT'>MT</option>";}
if($row['state'] == 'NE'){
echo "<option selected='selected' value='NE'>NE</option>";
}
else
{echo "<option value='NE'>NE</option>";}
if($row['state'] == 'NV'){
echo "<option selected='selected' value='NV'>NV</option>";
}
else
{echo "<option value='NV'>NV</option>";}
if($row['state'] == 'NH'){
echo "<option selected='selected' value='NH'>NH</option>";
}
else
{echo "<option value='NH'>NH</option>";}
if($row['state'] == 'NJ'){
echo "<option selected='selected' value='NJ'>NJ</option>";
}
else
{echo "<option value='NJ'>NJ</option>";}
if($row['state'] == 'NM'){
echo "<option selected='selected' value='NM'>NM</option>";
}
else
{echo "<option value='NM'>NM</option>";}
if($row['state'] == 'NY'){
echo "<option selected='selected' value='NY'>NY</option>";
}
else
{echo "<option value='NY'>NY</option>";}
if($row['state'] == 'NC'){
echo "<option selected='selected' value='NC'>NC</option>";
}
else
{echo "<option value='NC'>NC</option>";}
if($row['state'] == 'ND'){
echo "<option selected='selected' value='ND'>ND</option>";
}
else
{echo "<option value='ND'>ND</option>";}
if($row['state'] == 'OH'){
echo "<option selected='selected' value='OH'>OH</option>";
}
else
{echo "<option value='OH'>OH</option>";}
if($row['state'] == 'OK'){
echo "<option selected='selected' value='OK'>OK</option>";
}
else
{echo "<option value='OK'>OK</option>";}
if($row['state'] == 'OR'){
echo "<option selected='selected' value='OR'>OR</option>";
}
else
{echo "<option value='OR'>OR</option>";}
if($row['state'] == 'PA'){
echo "<option selected='selected' value='PA'>PA</option>";
}
else
{echo "<option value='PA'>PA</option>";}
if($row['state'] == 'RI'){
echo "<option selected='selected' value='RI'>RI</option>";
}
else
{echo "<option value='RI'>RI</option>";}
if($row['state'] == 'SC'){
echo "<option selected='selected' value='SC'>SC</option>";
}
else
{echo "<option value='SC'>SC</option>";}
if($row['state'] == 'SD'){
echo "<option selected='selected' value='SD'>SD</option>";
}
else
{echo "<option value='SD'>SD</option>";}
if($row['state'] == 'TN'){
echo "<option selected='selected' value='TN'>TN</option>";
}
else
{echo "<option value='TN'>TN</option>";}
if($row['state'] == 'TX'){
echo "<option selected='selected' value='TX'>TX</option>";
}
else
{echo "<option value='TX'>TX</option>";}
if($row['state'] == 'UT'){
echo "<option selected='selected' value='UT'>UT</option>";
}
else
{echo "<option value='UT'>UT</option>";}
if($row['state'] == 'VT'){
echo "<option selected='selected' value='VT'>VT</option>";
}
else
{echo "<option value='VT'>VT</option>";}
if($row['state'] == 'VA'){
echo "<option selected='selected' value='VA'>VA</option>";
}
else
{echo "<option value='VA'>VA</option>";}
if($row['state'] == 'WA'){
echo "<option selected='selected' value='WA'>WA</option>";
}
else
{echo "<option value='WA'>WA</option>";}
if($row['state'] == 'WV'){
echo "<option selected='selected' value='WV'>WV</option>";
}
else
{echo "<option value='WV'>WV</option>";}
if($row['state'] == 'WI'){
echo "<option selected='selected' value='WI'>WI</option>";
}
else
{echo "<option value='WI'>WI</option>";}
if($row['state'] == 'WY'){
echo "<option selected='selected' value='WY'>WY</option>";
}
else
{echo "<option value='WY'>WY</option>";}
   echo "</select>";
   echo"                                     State <br>";
    
    echo "<input name='newzip' value='" . $row['zip'] . "'> Zip <br>";
    //echo "<input name='newtype' value='" . $row['type'] . "'> Type <br>";
    echo "<select id='type' selected='" . $row['type'] . "' name='newtype'>";
    echo "<option value='' style='color:#A9A9A9;'>Select a User Type</option>";
    if($row['type'] == 'Student'){
    echo "<option selected='selected' value='Student'>Student</option>";
    }
    else
    {echo "<option value='Student'>Student</option>";}
    
    if($row['type'] == 'Professor'){
    echo "<option selected='selected' value='Professor'>Professor</option>";
    }
    else
    {echo "<option value='Professor'>Professor</option>";}
    
    
   // echo "<option value='Professor'>Professor</option>";
    echo "</select>";
    echo " Type<br>";
    
   /* Type: <select id="type" name="p_type">
				<option value="" style="color:#A9A9A9;">Select a User Type</option>
				<option value="Student">Student</option>
				<option value="Professor">Professor</option>
			</select><br>*/
   
    
}

echo "<input type='submit'>";
echo "</form>";







?>