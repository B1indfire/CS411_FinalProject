<?
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();
?>

<html>
 <head></head>
 <body background="images/calander.jpg">
  <div class="content" style="position: absolute; top: 25%; left: 38%; width:25%; height:28%; background-color: #60aa65; text-align:center; padding: 5px; border:2px solid; border-radius: 25px" >
  <br><br>
   <?   
   $LS->forgotPassword();
   ?>
  </div>
 </body>
</html>