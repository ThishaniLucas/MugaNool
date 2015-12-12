<?php 
session_start();
$_SESSION = array();
session_destroy();

//expiring by 5 days which unset the cookie
setcookie("user_logged",'',time()-(86400*5),"/");
setcookie("user_logged_email",'',time()-(86400*5),"/");
setcookie("user_logged_password",'',time()-(86400*5),"/");
	
header("Location: http://localhost/SocialNetworkingApp/signup.php");
exit();
?>