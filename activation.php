<?php 
include_once('.\templates\header_tem.php');
include_once('.\templates\non_menu.php');
include_once('.\templates\db_conx.php');
$u = $_GET["u"];

$sql = "UPDATE users SET activated='1' WHERE username='$u'";

$query = mysqli_query($db_conx,$sql);
//already activate and click should not give same output
header("Location: http://localhost/SocialNetworkingApp/activation_success_message.php?u=$u");
exit();
?>