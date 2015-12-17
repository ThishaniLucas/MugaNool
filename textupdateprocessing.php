<?php 
session_start();
if(!isset($_SESSION["user_logged"])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
	
include('.\templates\db_conx.php');
$user= $_SESSION["user_logged"];

$textcontent = $_POST["tc"];
if($textcontent==""){
	echo 'write some thing to post!';	
	exit();
}

$sqlinserttextupdate = "INSERT INTO `textupdates`(`username`, `textupdate`, `posted_at`) VALUES ('$user','$textcontent',NOW())";

$sqlinserttextupdatequery = mysqli_query($db_conx,$sqlinserttextupdate);
if($sqlinserttextupdatequery){
echo 'updated';
}else{
echo 'some thing went wrong!';	
}
?>