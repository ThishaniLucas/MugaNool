<?php include_once('.\templates\header_tem.php'); ?>
<?php include_once('.\templates\non_menu.php');
	  include('.\templates\db_conx.php');
 ?>
<?php 

$u = $_GET["u"];
$sql ="SELECT email,gender FROM users WHERE username='$u'";
$query=mysqli_query($db_conx,$sql);
if(mysqli_num_rows($query)<1){
echo '<h1 style="color:orange;">no such record!</h1>';
exit();
}

$row = mysqli_fetch_row($query);

$email = $row[0];
$gender = $row[1];

?>

<div align="center"><img src="img/logo.gif" /></div>
<div id="signup_message" class="well" style="margin-top:1%;font-size:16px;" >
Thank you for activating you account<span style="color:#DF1619;"> <?php if($gender=="m"){ echo "Mr. ";}
else{ echo "Ms. "; }
 ?><?php echo $u; ?>.</span> now you loggin to <span style="color:#EF830A;">muganool</span> with your username or email and with your password, click the link to loggin.<a href="signup.php" style="color:orange;">click to login</a> <br /> <br /><span>Thank you,<br /> <span style="color:#EF830A;">Muganool team</span></span>
</div>
<?php include_once('.\templates\footer_tem.php'); ?>