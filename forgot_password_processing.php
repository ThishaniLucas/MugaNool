<?php 
session_start();
if(isset($_SESSION["user_logged"]) || isset($_COOKIE["user_logged"])){
	header('Location: http://localhost/SocialNetworkingApp/profile.php?u='.$_SESSION["user_logged"]);
	exit();
	}
include('.\templates\db_conx.php'); 
$e = $_GET["e"];
$changed_password = "muganooluser";
$hash_changed_password = md5($changed_password);

$sqlfu = "UPDATE users SET password='$hash_changed_password' WHERE email='$e'";
$queryfu = mysqli_query($db_conx,$sqlfu);

header("Location: http://localhost/SocialNetworkingApp/signup.php");
?>