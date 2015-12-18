<?php 
session_start();
if(!isset($_SESSION["user_logged"])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
	
include('.\templates\db_conx.php');
$user= $_SESSION["user_logged"];

$updateid = $_POST["id"];

$sqlulp = "UPDATE textupdates SET likes=likes-1 WHERE id='$updateid'";
$queryulp = mysqli_query($db_conx,$sqlulp);

$sqllikes = "SELECT likes FROM textupdates WHERE id='$updateid'";
$queryulikes = mysqli_query($db_conx,$sqllikes); 
$rowqueryupl = mysqli_fetch_row($queryulikes);
$likesamount = $rowqueryupl[0];

$sqluunliker = "DELETE FROM textupdatelikes WHERE likername='$user' AND postid='$updateid'";
$queryinserttoupdateunliker = mysqli_query($db_conx,$sqluunliker);

echo $likesamount;

?>