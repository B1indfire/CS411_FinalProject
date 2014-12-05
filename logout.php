<?php
require "class.loginsys.php";
$LS = new LoginSystem();
$LS->init();
$LS->logout();
?>