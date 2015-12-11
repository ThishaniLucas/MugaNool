<?php include_once('.\templates\header_tem.php'); ?>
<?php include_once('.\templates\menu_item.php'); ?>
<?php include('.\templates\db_conx.php'); ?>

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