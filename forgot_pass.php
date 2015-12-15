<?php 
session_start();
if(isset($_SESSION["user_logged"]) || isset($_COOKIE["user_logged"])){
	header('Location: http://localhost/SocialNetworkingApp/profile.php?u='.$_SESSION["user_logged"]);
	exit();
	}
?>
<?php 
include('.\templates\db_conx.php');
$changed_password = "muganooluser";
$hash_changed_password = md5($changed_password);

$e = $_POST["forgot_Password_email"];

$sqlr = "SELECT username FROM users WHERE email='$e'";
$queryr=mysqli_query($db_conx,$sqlr);
$row=mysqli_fetch_row($queryr);

$u = $row[0];

$to = $e;
	$from = "charlesrajendran44@gmail.com";
	$subject="Muganool Activation";
	
	$message='<!DOCTYPE html><html lang="en"><body style="background-color:#ffffff"><div align="center" style="font-size:18px;color:#ff0000">Hello '.$u .',<br>as per your requirement you password will be changed to<br /><b>Password:&nbsp;'.$changed_password.'</b><br />Please click the link below to confirm your decision of changing password. <br /><br /><a href="http://localhost/SocialNetworkingApp/forgot_password_processing.php?e='.$e.'">Change Password</a><br />change your password soon as you logged in(make sure you have a secure password)<br /><br />&copy;Muganool Team</div></body>';
	
	$header ='From: charlesrajendran44@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
	
	if(mail($to,$subject,$message,$header)){
		$_SESSION["message"]="mail was sent to ".$e;
	}else{
		$_SESSION["message"]="mail was not sent to ".$e;
	}
	
header("Location: http://localhost/SocialNetworkingApp/forgot_pass_message.php?u=".$u);
exit();
?>