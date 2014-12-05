<?
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();
?>
<html>
 <head></head>
 <body>
  <div class="content">
  <? 
  $LS->changePassword();
  ?>
  </div>
 </body>
</html>