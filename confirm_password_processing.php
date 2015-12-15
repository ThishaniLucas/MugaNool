<?php 
session_start();
if(!isset($_SESSION["user_logged"])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
	
include('.\templates\db_conx.php');
$user= $_SESSION["user_logged"];

$cp = $_POST["currentpassword"];
$hash_cp = md5($cp);
$np = $_POST["newpassword"];
$ncp = $_POST["confirmnewpassword"];

$sqlcp = "SELECT password FROM users WHERE username='$user'";
$querycp=mysqli_query($db_conx,$sqlcp);
$row = mysqli_fetch_row($querycp);

$pass = $row[0];

if($pass != $hash_cp){
	$_SESSION["confirm_pass_message"]="current password you entered is not same as your actual current password, make sure you enter the correct password!<br />to goto change password page click the link below<br /><a href='http://localhost/SocialNetworkingApp/change_password.php'>http://localhost/SocialNetworkingApp/change_password.php</a>";
	
	header("Location: http://localhost/SocialNetworkingApp/change_password_message.php");
	exit();
	}
else if($np!= $ncp){
	$_SESSION["confirm_pass_message"]="new password confirmation failed!, the new password and the confirmation of the new password is not the same<br /><a href='http://localhost/SocialNetworkingApp/change_password.php'>http://localhost/SocialNetworkingApp/change_password.php</a>";
	header("Location: http://localhost/SocialNetworkingApp/change_password_message.php");
	exit();
}else if(strlen($np)<8){
	$_SESSION["confirm_pass_message"]="your new password length is less than 8 charecters!, make sure you enter a password length of 8 characters!<br /><a href='http://localhost/SocialNetworkingApp/change_password.php'>http://localhost/SocialNetworkingApp/change_password.php</a>";
	header("Location: http://localhost/SocialNetworkingApp/change_password_message.php");
	exit();
}else{
	$hash_p = md5($np);
	$sqlupcp = "UPDATE users SET password='$hash_p' WHERE username='$user'";
	mysqli_query($db_conx,$sqlupcp);
	$_SESSION["confirm_pass_message"]="password is changed successfully!";	
	header("Location: http://localhost/SocialNetworkingApp/change_password_message.php");
	exit();
}

?>