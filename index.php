<?php include_once('.\templates\header_tem.php'); ?>
<?php 
	if(!isset($_SESSION['user_logged'])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
?>

<?php include_once('.\templates\menu_item.php'); ?>

<?php include('.\templates\db_conx.php'); ?>

<?php 
	session_start();
	$u_ses = $_SESSION['user_logged'];
	$sqln = "UPDATE users SET notescheck=NOW() WHERE username='$u_ses'";
	$queryn = mysqli_query($db_conx,$sqln);
?>
<?php 
$u = $_GET["u"];
$sql ="SELECT avatar FROM users WHERE username='$u' LIMIT 1";
$query=mysqli_query($db_conx,$sql);
if(mysqli_num_rows($query)<1){
	echo '<h1 style="color:orange;">no such record!</h1>';
}

$row = mysqli_fetch_row($query);
$img = $row[0];

//echo $img;
?> 

<div id="tem"> <img src="<?php echo $img; ?>"/></div>

<?php include_once('.\templates\footer_tem.php'); ?>