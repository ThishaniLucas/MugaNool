<?php 
session_start();
$_SESSION = array();
session_destroy();
header("Location: http://localhost/SocialNetworkingApp/signup.php");
exit();
?>