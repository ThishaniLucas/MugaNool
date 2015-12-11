<?php include_once('.\templates\header_tem.php'); ?>
<?php include_once('.\templates\non_menu.php');
	  include('.\templates\db_conx.php');
 ?>
<?php 

$u = $_GET["u"];
$sql ="SELECT email,gender,password FROM users WHERE username='$u'";
$query=mysqli_query($db_conx,$sql);

$row = mysqli_fetch_row($query);

$email = $row[0];
$gender = $row[1];
$pass = $row[2];

?>

<div align="center"> <img src="img/logo.gif" /> </div>
<div align="center" style="font-size:18px;">
Dear&nbsp; <span style="color:#DF1619;"> <?php if($gender=="m"){ echo "Mr. ";}
else{ echo "Ms. "; }
 ?><?php echo $u; ?>, </span><br /><br /> 
Welcome to Muganool. Please click the button below to confirm your email address and activate your account. <br /><br />
<button class="btn btn-warning btn-lg" onClick="window.location='http://localhost/SocialNetworkingApp/activation_success_message.php?u=<?php echo $u; ?>'">Activate Account</button> 
<br /><br />
after activating your account, login with your credentials hear<br /><br />
<a href="http://localhost/SocialNetworkingApp/signup.php">http://localhost/SocialNetworkingApp/signup.php</a>
</div>

<?php include_once('.\templates\footer_tem.php'); ?>