<?php 
session_start();
if(!isset($_SESSION["user_logged"])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
	
include('.\templates\db_conx.php');
$user= $_SESSION["user_logged"];

$friend_requested_to = $_POST["f"];

$sqlinsertfriereq = "INSERT INTO `friendrequest`(`requester`, `requeste_to`, `requested_at`) VALUES ('$user','$friend_requested_to',NOW())";

$queryinsertfriereq = mysqli_query($db_conx,$sqlinsertfriereq);

if($queryinsertfriereq){
	echo 'request_send';	
}else{
	echo 'request_send_fail';	
}

?>