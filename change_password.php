<?php include_once('.\templates\header_tem.php'); ?>
<?php 
	if(!isset($_SESSION['user_logged'])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
?>

<?php include_once('.\templates\menu_item.php'); ?>

<?php include('.\templates\db_conx.php'); ?>
<div align="center">
<div class="well" style="margin-top: 3%;width:50%;" align="center">
<div align="center"><img src="img/logo.gif" /></div>
<form role="form" action="confirm_password_processing.php" method="post">
 
 <div class="form-group text-primary">
    <label for="currentpassword">Current Password</label>
    <input type="password" name="currentpassword" class="form-control" id="currentpassword" placeholder="Enter your current password">
  </div>
  <hr />
  <div class="form-group text-primary">
    <label for="newpassword">New Password</label>
    <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Enter your new password">
  </div>
   <hr />
   <div class="form-group text-primary">
    <label for="confirmnewpassword">Confirm New Password</label>
    <input type="password" name="confirmnewpassword" class="form-control" id="confirmnewpassword" placeholder="confirm your new password">
  </div>
   <hr />
  <button type="submit" class="btn btn-warning btn-lg">Change Password</button><hr />
</form>
</div>
</div>


<?php include_once('.\templates\footer_tem.php'); ?>