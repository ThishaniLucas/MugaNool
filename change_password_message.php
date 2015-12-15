<?php
session_start();
include_once('.\templates\header_tem.php'); 
if(!isset($_SESSION["user_logged"])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
?>
<?php include_once('.\templates\non_menu.php');
	  include('.\templates\db_conx.php');
 ?>
<?php 

$u = $_SESSION["user_logged"];
$sql ="SELECT gender FROM users WHERE username='$u'";
$query=mysqli_query($db_conx,$sql);
if(mysqli_num_rows($query)<1){
echo '<h1 style="color:orange;">no such record!</h1>';
exit();
}

$row = mysqli_fetch_row($query);

$gender = $row[0];

?>

<div align="center"><img src="img/logo.gif" /></div>
<div id="signup_message" class="well" style="margin-top:1%;font-size:16px;" align="center" >
Hello <span style="color:#DF1619;"> <?php if($gender=="m"){ echo "Mr. ";}
else{ echo "Ms. "; }
 ?><?php echo $u; ?>,</span> <br /><?php echo $_SESSION["confirm_pass_message"]; ?><br /> <span>Thank you,<br /> <span style="color:#EF830A;">Muganool team</span></span>
</div>
<?php include_once('.\templates\footer_tem.php'); ?>