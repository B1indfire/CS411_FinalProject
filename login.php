<?php
/*
.---------------------------------------------------------------------------.
|  Software: PHP Login System - PHP logSys                                  |
|   Version: 0.3                                                            |
|   Contact: http://github.com/subins2000/logsys  (also subinsb.com)        |
|      Info: http://github.com/subins2000/logsys                            |
|   Support: http://subinsb.com/ask/php-logsys                              |
| ------------------------------------------------------------------------- |
|    Author: Subin Siby (project admininistrator)                           |
| Copyright (c) 2014, Subin Siby. All Rights Reserved.                      |
| ------------------------------------------------------------------------- |
|   License: Distributed under the General Public License (GPL)             |
|            http://www.gnu.org/licenses/gpl-3.0.html                       |
| This program is distributed in the hope that it will be useful - WITHOUT  |
| ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or     |
| FITNESS FOR A PARTICULAR PURPOSE.                                         |
'---------------------------------------------------------------------------'
*/

require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();
if(isset($_POST['act_login'])){
	$user=$_POST['login'];
	$pass=$_POST['pass'];
	if($user == "" || $pass==""){
		$msg = array("Error", "Username / Password Wrong !");
	}else{
		$login = $LS->login($user, $pass);
		if($login === false){
			$msg = array("Error", "Username / Password Wrong !");
		}else if(is_array($login) && $login['status'] == "blocked"){
			$msg = array("Error", "Too many login attempts. You can attempt login after ". $login['minutes'] ." minutes (". $login['seconds'] ." seconds)");
		}
	}
}
?>

<html>

 <head></head>
 <body background="images/calander.jpg">
  <div class="content" style="position: absolute; top: 25%; left: 38%; width:25%; height:48%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px" >
  <br>
  
  
  <H1> Login </H1>
   <form method="POST">
    <label>Username / E-Mail</label><br/>
    <input name="login" type="text"/><br/>
    <label>Password</label><br/>
    <input name="pass" type="password"/><br/>
    <label>
     <input type="checkbox" name="remember_me"/> Remember Me
    </label>
    <button name="act_login">Log In</button><br>
    <a href="http://schedulizer.web.engr.illinois.edu/resetpass.php">Forgot Password</a><br>
    <a href="http://schedulizer.web.engr.illinois.edu/register.php">Register</a>
   </form>
  </div>
 </body>
</html>